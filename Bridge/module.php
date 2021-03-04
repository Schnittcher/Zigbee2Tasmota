<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/MQTTHelper.php';
require_once __DIR__ . '/../libs/Functions.php';

class Zigbee2TasmotaBridge extends IPSModule
{
    use MQTTHelper;

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->RequireParent('{D5C0D7CE-6A00-BDBE-C43E-678CF5CBE178}');

        //Anzahl die in der Konfirgurationsform angezeigt wird - Hier Standard auf 1
        $this->RegisterPropertyString('Topic', '');
        $this->RegisterPropertyString('FullTopic', '%prefix%/%topic%');
        $this->RegisterPropertyBoolean('MessageRetain', false);
        $this->SetBuffer('pairedDevices', '{}');
        $this->SetBuffer('countPairedDevices', 0);
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

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

        foreach ($Devices as $Device) {
            if (array_key_exists('Name', $Device)) {
                $Name = $Device['Name'];
            } else {
                $Name = '';
            }

            $instanceID = $this->getDeviceInstances($Device['Device']); //0; $this->getAnelInstances($Device['IP']);

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
                        'Device'    => $Name, //$Device['Device'],
                        'Model'     => $ModelId
                    ]
                ],
            ];

            $Values[] = $AddValue;
        }
        $Form['actions'][1]['items'][1]['caption'] = $this->GetBuffer('countPairedDevices');
        $Form['actions'][3]['values'] = $Values;

        return json_encode($Form);
    }

    public function ReceiveData($JSONString)
    {
        $this->SendDebug('JSON', $JSONString, 0);
        $data = json_decode($JSONString);

        $Buffer = $data->Buffer;

        if (property_exists($Buffer, 'Topic')) {
            if (fnmatch('*/SENSOR', $Buffer->Topic)) {
                $Payload = json_decode($Buffer->Payload, true);
                if (array_key_exists('ZbInfo', $Payload)) {
                    $ZbInfo = $Payload['ZbInfo'];

                    $DeviceID = array_key_first($ZbInfo);
                    $ZbInfo = $Payload['ZbInfo'][$DeviceID];
                    $this->SendDebug('ZbInfo Device', $ZbInfo['Device'], 0);

                    $Devices = json_decode($this->GetBuffer('pairedDevices'), true);
                    if (!fnmatch('*' . $ZbInfo['Device'] . '*', $this->GetBuffer('pairedDevices'))) {
                        $Name = '';
                        $Device['Device'] = $ZbInfo['Device'];
                        if (array_key_exists('Name', $ZbInfo)) {
                            $Name = $ZbInfo['Name'];
                        }
                        $Device['Name'] = $Name;
                        $Device['ModelId'] = $ZbInfo['ModelId'];
                        $Device['Manufacturer'] = $ZbInfo['Manufacturer'];
                        array_push($Devices, $Device);

                        $this->SetBuffer('pairedDevices', json_encode($Devices));
                    }
                    $this->SendDebug('Paired Devices', json_encode($Devices), 0);

                    $this->UpdateFormField('PopupProgressbar', 'visible', true);
                    $this->UpdateFormField('UpdateProgress', 'current', count($Devices));
                    $this->UpdateFormField('UpdateProgress', 'caption', count($Devices) . ' / ' . $this->GetBuffer('countPairedDevices'));
                    if ($this->GetBuffer('countPairedDevices') == count($Devices)) {
                        $this->ReloadForm();
                    }
                }
            }
            if (fnmatch('*/RESULT', $Buffer->Topic)) {
                $this->SendDebug('Topic: Result Payload', $Buffer->Payload, 0);
                $Payload = json_decode($Buffer->Payload);

                if (is_object($Payload)) {
                    if (property_exists($Payload, 'ZbStatus0')) {
                        $this->UpdateFormField('lblCountDevices', 'caption', $Payload->ZbStatus0->TotalDevices);
                        $this->UpdateFormField('UpdateProgress', 'maximum', $Payload->ZbStatus0->TotalDevices);
                        $this->SetBuffer('countPairedDevices', $Payload->ZbStatus0->TotalDevices);
                    }
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
                                $this->SendDebug('Unknown Status Code', $Payload->ZbState->Status, 0);
                                break;

                        }
                    }
                }
            }
        }
    }

    public function reloadDevices()
    {
        $this->countPairedDevices();
        $this->SetBuffer('pairedDevices', '{}');
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';

        $Buffer['Topic'] = 'Zbinfo';
        $Buffer['Payload'] = '';

        $Data['Buffer'] = json_encode($Buffer);
        $this->SendDataToParent(json_encode($Data));
    }

    public function countPairedDevices()
    {
        $this->SetBuffer('countPairedDevices', 0);
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';

        $Buffer['Topic'] = 'ZbStatus0';
        $Buffer['Payload'] = '';

        $Data['Buffer'] = json_encode($Buffer);
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

    public function forgetDevice($Value)
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbForget';
        $Buffer['Payload'] = strval($Value);
        $Data['Buffer'] = json_encode($Buffer, JSON_UNESCAPED_SLASHES);

        $this->SendDataToParent(json_encode($Data));
    }

    public function UpdateName($OldName, $NewName)
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbName';
        $Buffer['Payload'] = strval($OldName . ',' . $NewName);
        $Data['Buffer'] = json_encode($Buffer, JSON_UNESCAPED_SLASHES);

        $this->SendDataToParent(json_encode($Data));
        $this->reloadDevices();
    }

    private function getDeviceInstances($Device)
    {
        $InstanceIDs = IPS_GetInstanceListByModuleID('{7FB10079-784C-EC79-4425-2941D23EEAFA}');
        foreach ($InstanceIDs as $id) {
            if (IPS_GetProperty($id, 'Device') == $Device) {
                return $id;
            }
        }
        return 0;
    }
}
