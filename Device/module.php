<?php

declare(strict_types=1);

require_once __DIR__ . '/../libs/VariableProfileHelper.php';
require_once __DIR__ . '/../libs/ColorHelper.php';
require_once __DIR__ . '/../libs/Functions.php';
require_once __DIR__ . '/../libs/Devices.php';

class Zigbee2TasmotaDevice extends Devices
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

        $this->RegisterPropertyBoolean('showbattery', false);
        $this->RegisterPropertyBoolean('showlinkquality', false);
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

        //Setze Filter für ReceiveData
        $device = $this->ReadPropertyString('Device');
        $this->SendDebug('SetReceiveDataFilter - Device', $device, 0);
        $this->SetReceiveDataFilter('.*' . $device . '.*');

        $this->MaintainVariable('BatteryPercentage', $this->Translate('Battery'), 1, '~Intensity.100', 0, $this->ReadPropertyBoolean('showbattery') == true);
        $this->MaintainVariable('BatteryVoltage', $this->Translate('Battery Voltage'), 2, '~Volt', 0, $this->ReadPropertyBoolean('showbattery') == true);
        $this->MaintainVariable('LinkQuality', $this->Translate('Link Quality'), 1, '', 0, $this->ReadPropertyBoolean('showlinkquality') == true);

        $model = $this->ReadPropertyString('Model');
        if (is_numeric($model)) {
            $model = 'Z2TSymcon-' . $model;
        }
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
                if (($device['Action'] == 'attribute') || ($device['Action'] == 'tasmota')) {
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
                    $Payload = json_decode($Buffer->Payload);
                    $receivedDevices = null;
                    if (property_exists($Payload, 'ZbReceived')) {
                        $receivedDevices = $Payload->ZbReceived;
                    } elseif (property_exists($Payload, 'ZbLight')) {
                        $receivedDevices = $Payload->ZbLight;
                    }

                    if (is_object($receivedDevices)) {
                        foreach ($receivedDevices as $receivedDevice) {
                            if ($receivedDevice->Name = $device) {
                                if (is_object($receivedDevice)) {
                                    if (property_exists($receivedDevice, 'BatteryVoltage') && ($this->ReadPropertyBoolean('showbattery'))) {
                                        $this->SetValue('BatteryVoltage', $receivedDevice->BatteryVoltage);
                                    }
                                    if (property_exists($receivedDevice, 'BatteryPercentage') && ($this->ReadPropertyBoolean('showbattery'))) {
                                        $this->SetValue('BatteryPercentage', $receivedDevice->BatteryPercentage);
                                    }
                                    if (property_exists($receivedDevice, 'LinkQuality') && ($this->ReadPropertyBoolean('showlinkquality'))) {
                                        $this->SetValue('LinkQuality', $receivedDevice->LinkQuality);
                                    }

                                    $model = $this->ReadPropertyString('Model');
                                    if (is_numeric($model)) {
                                        $model = 'Z2TSymcon-' . $model;
                                    }

                                    foreach ($this->Devices[strval($model)] as $key => $device) {
                                        if (property_exists($receivedDevice, $device['SearchString'])) {
                                            switch ($key) {
                                                case 'Color':
                                                        $RGB = ltrim($this->CIEToRGB($receivedDevice->X, $receivedDevice->Y, $this->GetValue('Dimmer'), true), '#');
                                                        //$this->SetValue('Color', hexdec($RGB));
                                                        $this->SetValue('Color', hexdec($receivedDevice->RGB));
                                                        break;
                                                case 'ColorX':
                                                    $this->SetValue('ColorX', $receivedDevice->Color[0]);
                                                    break;
                                                case 'ColorY':
                                                    $this->SetValue('ColorY', $receivedDevice->Color[1]);
                                                    break;
                                                case 'AqaraVibrationMode':
                                                    switch ($receivedDevice->AqaraVibrationMode) {
                                                        case 'vibrate':
                                                            $this->SetValue('AqaraVibrationMode', 0);
                                                            break;
                                                        case 'tilt':
                                                            $this->SetValue('AqaraVibrationMode', 1);
                                                            break;
                                                        case 'drop':
                                                            $this->SetValue('AqaraVibrationMode', 2);
                                                            break;
                                                    }
                                                    break;
                                                case 'action':
                                                    switch ($receivedDevice->action) {
                                                        case 'hold':
                                                            $this->SetValue('action', 0);
                                                            break;
                                                        case 'release':
                                                            $this->SetValue('action', 1);
                                                            break;
                                                        default:
                                                            $this->SendDebug('Invalid Action', $receivedDevice->action, 0);
                                                            break;
                                                    }
                                                    break;
                                                case 'click':
                                                    switch ($receivedDevice->click) {
                                                        case 'single':
                                                            $this->SetValue('click', 0);
                                                            break;
                                                        case 'double':
                                                            $this->SetValue('click', 1);
                                                            break;
                                                        case 'triple':
                                                            $this->SetValue('click', 2);
                                                            break;
                                                        case 'quad':
                                                            $this->SetValue('click', 4);
                                                            break;
                                                        default:
                                                            $this->SendDebug('Invalid Click', $receivedDevice->click, 0);
                                                            break;
                                                    }
                                                    break;
                                                case 'AqaraCubeAction':
                                                    switch ($receivedDevice->AqaraCube) {
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
                                                        case 'fall':
                                                            $this->SetValue('AqaraCubeAction', 6);
                                                            break;
                                                    }
                                                  break;
                                                case 'Dimmer':
                                                    $this->SetValue('Dimmer', $receivedDevice->Dimmer);
                                                    break;
                                                default:
                                                if ($this->GetIDForIdent($key)) {
                                                    $this->SendDebug('SetValue Key / SearchString', 'Key:' . $key . ' / SearchString: ' . $device['SearchString'], 0);
                                                    $this->SendDebug('SetValue Value', $receivedDevice->{$key}, 0);
                                                    $this->SetValue($key, $receivedDevice->{$key});
                                                } else {
                                                    $this->SendDebug('Unkown Key / SearchString', 'Key:' . $key . ' / SearchString: ' . $device['SearchString'], 0);
                                                }
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
        }
    }

    public function RequestAction($Ident, $Value)
    {
        $model = $this->ReadPropertyString('Model');
        if (is_numeric($model)) {
            $model = 'Z2TSymcon-' . $model;
        }
        $Command = $this->Devices[$model][$Ident]['ActionCommand'];
        $Action = $this->Devices[$model][$Ident]['Action'];
        $this->SendDebug('Action', $Command, 0);

        $SendType = '';

        switch ($Action) {
            case 'attribute':
                $SendType = 'write';
                break;
            case 'tasmota':
                $SendType = 'send';
                break;
            default:
                $this->LogMessage('Error - Wrong Command Type', KL_ERROR);
                return;
        }

        switch ($Ident) {
            case 'Color':
                $RGB = $this->HexToRGB($Value);
                $cie = $this->RGBToCIE($RGB[0], $RGB[1], $RGB[2], true);
                $Value = strval($cie['x'] . ',' . $cie['y']);
                $this->sendCommand($SendType, $Command, $Value);
                $this->sendCommand('send', 'Power', 'ON');
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
                $this->sendCommand($SendType, $Command, $Value);
                break;
            default:
                $this->sendCommand($SendType, $Command, $Value);
                if ($Ident) {
                    $this->RequestLightState(); //To get tight color in IPS
                }
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

    private function sendCommand($Type, $Command, $Value)
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbSend';

        $ZbSend['device'] = $this->ReadPropertyString('Device');
        $ZbSend[$Type][$Command] = $Value;

        $Buffer['Payload'] = json_encode($ZbSend);
        $Data['Buffer'] = json_encode($Buffer);

        $this->SendDebug('JSON sendCommand', json_encode($Data), 0);
        $this->SendDataToParent(json_encode($Data));
    }

    private function readAttributes($Value)
    {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbSend';
        $ZbSend['device'] = $this->ReadPropertyString('Device');
        $ZbSend['read'] = $Value;

        $Buffer['Payload'] = json_encode($ZbSend);
        $Data['Buffer'] = json_encode($Buffer);

        $this->SendDebug('JSON readAttributes', json_encode($Data), 0);
        $this->SendDataToParent(json_encode($Data));
    }

    private function MiredToKelvin($Value)
    {
        return 1000000 / $Value;
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
        if (!IPS_VariableProfileExists('T2M.AqaraVibrationMode')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Vibrate'), '', -1];
            $Associations[] = [1, $this->Translate('Tilt'), '', -1];
            $Associations[] = [2, $this->Translate('Drop'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.AqaraVibrationMode', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.Aqara.Click')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Single'), '', -1];
            $Associations[] = [1, $this->Translate('Double'), '', -1];
            $Associations[] = [2, $this->Translate('Triple'), '', -1];
            $Associations[] = [3, $this->Translate('Quad'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.Aqara.Click', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.Aqara.Action')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Hold'), '', -1];
            $Associations[] = [1, $this->Translate('Release'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.Aqara.Action', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.Sonoff.Power')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Hold'), '', -1];
            $Associations[] = [1, $this->Translate('Double'), '', -1];
            $Associations[] = [2, $this->Translate('Single'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.Sonoff.Power', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.AqaraCube')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('wakeup'), '', -1];
            $Associations[] = [1, $this->Translate('slide'), '', -1];
            $Associations[] = [2, $this->Translate('flip90'), '', -1];
            $Associations[] = [3, $this->Translate('flip180'), '', -1];
            $Associations[] = [4, $this->Translate('tap'), '', -1];
            $Associations[] = [5, $this->Translate('shake'), '', -1];
            $Associations[] = [6, $this->Translate('fall'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.AqaraCube', '', '', '', $Associations);
        }
        if (!IPS_VariableProfileExists('T2M.ColorTemperature')) {
            IPS_CreateVariableProfile('T2M.ColorTemperature', 1);
        }
        IPS_SetVariableProfileDigits('T2M.ColorTemperature', 0);
        IPS_SetVariableProfileIcon('T2M.ColorTemperature', 'Bulb');
        IPS_SetVariableProfileText('T2M.ColorTemperature', '', ' Mired');
        IPS_SetVariableProfileValues('T2M.ColorTemperature', 153, 500, 1);

        if (!IPS_VariableProfileExists('T2M.ColorTemperature.370')) {
            IPS_CreateVariableProfile('T2M.ColorTemperature.370', 1);
        }
        IPS_SetVariableProfileDigits('T2M.ColorTemperature.370', 0);
        IPS_SetVariableProfileIcon('T2M.ColorTemperature.370', 'Bulb');
        IPS_SetVariableProfileText('T2M.ColorTemperature.370', '', ' Mired');
        IPS_SetVariableProfileValues('T2M.ColorTemperature.370', 153, 370, 1);

        if (!IPS_VariableProfileExists('T2M.Intensity.254')) {
            IPS_CreateVariableProfile('T2M.Intensity.254', 1);
        }
        IPS_SetVariableProfileDigits('T2M.Intensity.254', 0);
        IPS_SetVariableProfileIcon('T2M.Intensity.254', 'Intensity');
        IPS_SetVariableProfileText('T2M.Intensity.254', '', ' %');
        IPS_SetVariableProfileValues('T2M.Intensity.254', 1, 254, 1);
    }
}
