<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/VariableProfileHelper.php';
require_once __DIR__ . '/../libs/ColorHelper.php';
require_once __DIR__ . '/../libs/Functions.php';
require_once __DIR__ . '/../libs/Devices.php';

class Tasmota2ZigbeeDevice extends Devices
{
    use VariableProfileHelper;
    use ColorHelper;

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->ConnectParent('{D5C0D7CE-6A00-BDBE-C43E-678CF5CBE178}');
        $this->registerVariableProfiles();

        $this->RegisterPropertyString('Device', '');
        $this->RegisterPropertyString('Model', '');
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

        //Setze Filter für ReceiveData
        $device = $this->ReadPropertyString('Device');
        $this->SendDebug('SetReceiveDataFilter - Device', $device, 0);
        $this->SetReceiveDataFilter('.*' . $device . '.*');

        $this->LogMessage(print_r($this->Devices, true), KL_NOTIFY);

        $model = $this->ReadPropertyString('Model');

        if (array_key_exists($model, $this->Devices)) {
            foreach ($this->Devices[$model] as $key => $device) {
                switch ($device['VariableType']) {
                case VARIABLETYPE_BOOLEAN:
                    $this->RegisterVariableBoolean($key, $this->Translate($device['Name']), $device['VariableProfile']);
                    break;
                case VARIABLETYPE_INTEGER:
                    $this->RegisterVariableInteger($key, $this->Translate($device['Name']), $device['VariableProfile']);
                    break;
                case VARIABLETYPE_FLOAT:
                    $this->RegisterVariableFloat($key, $this->Translate($device['Name']), $device['VariableProfile']);
                    break;
                case VARIABLETYPE_STRING:
                    $this->RegisterVariableString($key, $this->Translate($device['Name']), $device['VariableProfile']);
                    break;
                default:
                    $this->SendDebug('unknown VariableType', $model . ': ' . $key, 0);
               }
                if ($device['Action']) {
                    $this->EnableAction($key);
                }
            }
        } else {
            $this->SendDebug('unknown model', $model, 0);
        }
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
                    $Payload = json_decode($Buffer->Payload)->ZbReceived->{$device}; //get Device Payload
                    if (is_object($Payload)) {
                        $model = $this->ReadPropertyString('Model');
                        foreach ($this->Devices[$model] as $key => $device) {
                            if (property_exists($Payload, $device['SearchString'])) {
                                if ($key == $device['SearchString']) { // when key and SearchString are equal SetValue - else possible conversion
                                    $this->SetValue($key, $Payload->{$key});
                                } else {
                                    switch ($key) {
                                        case 'Color':
                                          $RGB = ltrim($this->CIEToRGB($Payload->X, $Payload->Y, $this->GetValue('Dimmer'), true), '#');
                                          $this->SetValue('Color', hexdec($RGB));
                                        break;
                                        case 'AqaraCubeAction':
                                            switch ($Payload->AqaraCube) {
                                                case 'wakeup':
                                                    $this->SetValue('AqaraCubeAction', 0);
                                                    break;
                                                case 'slide':
                                                    $this->SetValue('AqaraCubeAction', 1);
                                                    break;
                                                case 'flip90':
                                                    $this->SetValue('AqaraCubeAction', 2);
                                                    break;
                                                case 'flip180':
                                                    $this->SetValue('AqaraCubeAction', 3);
                                                    break;
                                                case 'tap':
                                                    $this->SetValue('AqaraCubeAction', 4);
                                                    break;
                                                case 'shake':
                                                    $this->SetValue('AqaraCubeAction', 5);
                                                    break;
                                            }
                                          break;
                                    default:
                                        $this->SendDebug('Unkown Key / SearchString', 'Key:' . $key . ' / SearchString: ' . $device['SearchString'], 0);
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function RequestAction($Ident, $Value)
    {
        $model = $this->ReadPropertyString('Model');
        $Command = $this->Devices[$model][$Ident]['ActionCommand'];
        $this->SendDebug('Action', $Command, 0);

        switch ($Ident) {
            case 'Color':
                $RGB = $this->HexToRGB($Value);
                $cie = $this->RGBToCIE($RGB[0], $RGB[1], $RGB[2], true);
                $Value = strval($cie['x'] . ',' . $cie['y']);
                $this->sendCommand($Command, $Value);
                $this->sendCommand('Power', true);
                break;
            case 'Power':
                switch ($Value) {
                    case true:
                        $Value = 'ON';
                        break;
                    case false:
                        $Value = 'OFF';
                        break;
                }
                $this->sendCommand($Command, $Value);
                break;
            default:
                $this->sendCommand($Command, $Value);
        }
    }

    public function RequestLightState()
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbLight';
        $Buffer['Payload'] = $this->ReadPropertyString('Device');

        $Data['Buffer'] = json_encode($Buffer);
        $this->SendDebug('RequestState JSON', json_encode($Data), 0);
        $this->SendDataToParent(json_encode($Data));
    }

    private function sendCommand($Command, $Value)
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbSend';

        $ZbSend['device'] = $this->ReadPropertyString('Device');
        $ZbSend['send'][$Command] = $Value;

        $Buffer['Payload'] = json_encode($ZbSend);
        $Data['Buffer'] = json_encode($Buffer);

        $this->SendDebug('JSON sendCommand', json_encode($Data), 0);
        $this->SendDataToParent(json_encode($Data));
    }

    private function registerVariableProfiles()
    {
        if (!IPS_VariableProfileExists('T2M.TogglePower')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Off'), '', -1];
            $Associations[] = [1, $this->Translate('On'), '', -1];
            $Associations[] = [2, $this->Translate('Toggle'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.TogglePower', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.IKEA.DimmerMove')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Up'), '', -1];
            $Associations[] = [1, $this->Translate('Down'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.IKEA.DimmerMove', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.IKEA.ArrowClick')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Right'), '', -1];
            $Associations[] = [1, $this->Translate('Left'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.IKEA.ArrowClick', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.AqaraCube')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('wakeup'), '', -1];
            $Associations[] = [1, $this->Translate('slide'), '', -1];
            $Associations[] = [2, $this->Translate('flip90'), '', -1];
            $Associations[] = [3, $this->Translate('flip180'), '', -1];
            $Associations[] = [4, $this->Translate('tap'), '', -1];
            $Associations[] = [5, $this->Translate('shake'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.AqaraCube', '', '', '', $Associations);
        }
    }
}
