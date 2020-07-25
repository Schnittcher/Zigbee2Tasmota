<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/MQTTHelper.php';

class Tasmota2ZigbeeBridge extends IPSModule
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

    public function GetConfigurationForm()
    {
        $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
        $Devices = json_decode($this->GetBuffer('pairedDevices'), true);

        $Values = [];

        IPS_LogMessage('debug', print_r($Devices, true));

        foreach ($Devices as $Device) {
            $instanceID = 0; //$this->getAnelInstances($Device['IP']);

            if (array_key_exists('Name',$Device)) {
                $Name = $Device['Name'];
            } else {
                $Name = '';
            }

            if (array_key_exists('ModelId',$Device)) {
                $ModelId = $Device['ModelId'];
            } else {
                $ModelId = '';
            }

            if (array_key_exists('Manufacturer',$Device)) {
                $Manufacturer = $Device['Manufacturer'];
            } else {
                $Manufacturer = '';
            }            

            $AddValue = [
                'Device'                        => $Device['Device'],
                'name'                          => $Name,
                'ModelID'                       => $ModelId,
                'Manufacturer'                  => $Manufacturer,
                'Endpoint'                      => '',
                'instanceID'                    => $instanceID
            ];

            $AddValue['create'] = [
                [
                    'moduleID'      => '{13F0B37E-30C9-C043-A5AC-2D9B6A90E9F2}',
                    'configuration' => [
                        'Topic'     => $this->ReadPropertyString('Topic'),
                        'FullTopic' => $this->ReadPropertyString('FullTopic'),
                        'Device'    => $Device['Device']
                    ]
                ],
            ];

            $Values[] = $AddValue;
        }
        $Form['actions'][1]['values'] = $Values;
        return json_encode($Form);
    }

    public function ReceiveData($JSONString)
    {
        $this->SendDebug('JSON', $JSONString, 0);
        if (!empty($this->ReadPropertyString('Topic'))) {
            $data = json_decode($JSONString);

            switch ($data->DataID) {
                case '{7F7632D9-FA40-4F38-8DEA-C83CD4325A32}': // MQTT Server
                    $Buffer = $data;
                    break;
                case '{DBDA9DF7-5D04-F49D-370A-2B9153D00D9B}': //MQTT Client
                    $Buffer = json_decode($data->Buffer);
                    break;
                default:
                    $this->LogMessage('Invalid Parent', KL_ERROR);
                    return;
            }

            if (property_exists($Buffer, 'Topic')) {
                if (fnmatch('*/RESULT', $Buffer->Topic)) {
                    $this->SendDebug('Topic: Result Payload', $Buffer->Payload, 0);
                    $Payload = json_decode($Buffer->Payload);

                    if (property_exists($Payload, 'ZbState')) {
                        $this->SendDebug('Topic: Result ZbState', $Payload->ZbState->Status, 0);

                        switch ($Payload->ZbState->Status) {
                            case 21:
                                $this->UpdateFormField('lblParingMode', 'caption', 'Paring active');
                                break;
                            case 20:
                                $this->UpdateFormField('lblParingMode', 'caption', 'Paring inactive');
                                break;
                            case 30:
                                $this->reloadDevices();
                                break;
                            default:
                                $this->LogMessage($this->Translate('Unkwnon Status Code') . ': ' . $Payload->ZbState->Status, KL_NOTIFY);
                                break;

                        }
                    }
                    if (property_exists($Payload, 'ZbStatus2')) {
                        $this->SendDebug('Paired Devices', json_encode($Payload->ZbStatus2), 0);
                        $this->SetBuffer('pairedDevices', json_encode($Payload->ZbStatus2));
                        $this->ReloadForm();
                    }
                }
            }
        }
    }

    public function reloadDevices()
    {
        $this->sendMQTT('ZbStatus2', '');
    }

    public function Paring($Value)
    {
        $this->sendMQTT('ZbPermitJoin', strval($Value));
    }
}
