<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/MQTTHelper.php';

if (!function_exists('fnmatch')) {
    function fnmatch($pattern, $string)
    {
        return preg_match('#^' . strtr(preg_quote($pattern, '#'), ['\*' => '.*', '\?' => '.']) . '$#i', $string);
    }
}

class Tasmota2ZigbeeConnect extends IPSModule
{
    use MQTTHelper;

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->BufferResponse = '';
        $this->ConnectParent('{C6D2AEB3-6E1F-4B2E-8E69-3A1A00246850}');

        //Anzahl die in der Konfirgurationsform angezeigt wird - Hier Standard auf 1
        $this->RegisterPropertyString('Topic', '');
        $this->RegisterPropertyString('FullTopic', '%prefix%/%topic%');
        $this->RegisterPropertyBoolean('MessageRetain', false);
        $this->SetBuffer('pairedDevices', '{}');
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();
        $this->BufferResponse = '';

        //Setze Filter fÃ¼r ReceiveData
        $this->SendDebug(__FUNCTION__ . ' FullTopic', $this->ReadPropertyString('FullTopic'), 0);
        $topic = $this->FilterFullTopicReceiveData();
        $this->SendDebug(__FUNCTION__ . ' Filter FullTopic', $topic, 0);

        $this->SetReceiveDataFilter('.*' . $topic . '.*');
    }

    public function ReceiveData($JSONString)
    {

        // Empfangene Daten vom I/O
        $data = json_decode($JSONString);

        switch ($data->DataID) {
            case '{7F7632D9-FA40-4F38-8DEA-C83CD4325A32}': // MQTT Server
                $Buffer['Topic'] = $data->Topic;
                $Buffer['Payload'] = $data->Payload;
                break;
            case '{DBDA9DF7-5D04-F49D-370A-2B9153D00D9B}': //MQTT Client
                $Buffer = $data->Buffer;
                break;
            default:
                $this->LogMessage('Invalid Parent', KL_ERROR);
                return;
        }

        // Hier werden die Daten verarbeitet

        // Weiterleitung zu allen Gerät-/Device-Instanzen
        $this->SendDataToChildren(json_encode(['DataID' => '{EAC09CF4-0E77-C618-5C72-019417AE3CC8}', 'Buffer' => $Buffer]));
    }

    public function ForwardData($JSONString)
    {

        // Empfangene Daten von der Device Instanz
        $data = json_decode($JSONString);
        $buffer = json_decode($data->Buffer);

        $this->sendMQTT($buffer->Topic, $buffer->Payload);

        // Hier würde man den Buffer im Normalfall verarbeiten
        // z.B. CRC prüfen, in Einzelteile zerlegen

        // Weiterleiten zur I/O Instanz
        //$resultat = $this->SendDataToParent(json_encode(Array("DataID" => "{79827379-F36E-4ADA-8A95-5F8D1DC92FA9}", "Buffer" => $data->Buffer)));

        // Weiterverarbeiten und durchreichen
        return '';
    }
}
