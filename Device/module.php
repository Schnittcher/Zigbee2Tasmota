<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/MQTTHelper.php';

class Tasmota2ZigbeeDevice extends IPSModule
{
    use MQTTHelper;

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->BufferResponse = '';
        $this->ConnectParent('{D5C0D7CE-6A00-BDBE-C43E-678CF5CBE178}');

        //Anzahl die in der Konfirgurationsform angezeigt wird - Hier Standard auf 1
        $this->RegisterPropertyString('Device', '');
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();
        $this->BufferResponse = '';

        //Setze Filter fÃ¼r ReceiveData
        $device = $this->ReadPropertyString('Device');
        $this->SendDebug('SetReceiveDataFilter - Device', $device, 0);

        $this->SetReceiveDataFilter('.*' . $device . '.*');
    }

    public function ReceiveData($JSONString)
    {
        $device = $this->ReadPropertyString('Device');
        $this->SendDebug('ReceiveData', $JSONString, 0);
        if (!empty($this->ReadPropertyString('Device'))) {
            $data = json_decode($JSONString);
            $Buffer = $data->Buffer;
            
            if (property_exists($Buffer, 'Topic')) {
                if (fnmatch('*/SENSOR', $Buffer->Topic)) {
                    //$this->SendDebug('Topic: Result Payload', $Buffer->Payload, 0);
                    $Payload = json_decode($Buffer->Payload)->ZbReceived->{$device};
                    IPS_LogMessage('test',print_r($Payload,true));
                    if (is_object($Payload)) {
                        if (property_exists($Payload, 'Power')) {
                            $this->RegisterVariableBoolean('Power', $this->Translate('Power'), '~Switch');
                            switch ($Payload->Power) {
                                case 1:
                                    SetValue($this->GetIDForIdent('Power'), true);
                                    break;
                                case 0:
                                    SetValue($this->GetIDForIdent('Power'), false);
                                    break;
                                default:
                                    $this->LogMessage('Invalid Value: '.$Payload->Power, KL_NOTIFY);
                                    break;
                            }
                        }
                    }
                }
            }
        }
    }
}
