<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/MQTTHelper.php';

if (!function_exists('fnmatch')) {
    function fnmatch($pattern, $string)
    {
        return preg_match('#^' . strtr(preg_quote($pattern, '#'), ['\*' => '.*', '\?' => '.']) . '$#i', $string);
    }
}

class Tasmota2ZigbeeBridge extends IPSModule
{
    use MQTTHelper;

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->BufferResponse = '';
        $this->ConnectParent('{D5C0D7CE-6A00-BDBE-C43E-678CF5CBE178}');

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

            if (array_key_exists('Name', $Device)) {
                $Name = $Device['Name'];
            } else {
                $Name = '';
            }

            if (array_key_exists('ModelId', $Device)) {
                $ModelId = $Device['ModelId'];
            } else {
                $ModelId = '';
            }

            if (array_key_exists('Manufacturer', $Device)) {
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
                    'moduleID'      => '{7FB10079-784C-EC79-4425-2941D23EEAFA}',
                    'configuration' => [
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
            $data = json_decode($JSONString);

            $Buffer = $data->Buffer;
/**

            switch ($data->DataID) {
                case '{7F7632D9-FA40-4F38-8DEA-C83CD4325A32}': // MQTT Server
                    $Buffer = $data;
                    break;
                case '{DBDA9DF7-5D04-F49D-370A-2B9153D00D9B}': //MQTT Client
                    $Buffer = json_decode($data->Buffer);
                    break;
                default:
                    $this->LogMessage('Invalid Parent'. $this->data->DataID, KL_ERROR);
                    return;
            }
 */
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

    public function reloadDevices()
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbStatus2';
        $Buffer['Payload'] = '';
        $Data['Buffer'] = json_encode($Buffer);

        $this->SendDebug('JSON Reload Devices',json_encode($Data),0);

        $this->SendDataToParent(json_encode($Data));
    }

    public function Paring($Value)
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbPermitJoin';
        $Buffer['Payload'] = strval($Value);
        $Data['Buffer'] = json_encode($Buffer, JSON_UNESCAPED_SLASHES);

        $this->SendDataToParent(json_encode($Data));
    }

    public function forgetDevice($Value) {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbForget';
        $Buffer['Payload'] = strval($Value);
        $Data['Buffer'] = json_encode($Buffer, JSON_UNESCAPED_SLASHES);

        IPS_LogMessage('test',print_r($Data,true));
        $this->SendDataToParent(json_encode($Data));
    }
}
