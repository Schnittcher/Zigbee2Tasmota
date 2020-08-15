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
        $this->BufferResponse = '';
        $this->ConnectParent('{D5C0D7CE-6A00-BDBE-C43E-678CF5CBE178}');
        $this->registerVariables();

        //Anzahl die in der Konfirgurationsform angezeigt wird - Hier Standard auf 1
        $this->RegisterPropertyString('Device', '');
        $this->RegisterPropertyString('Model', '');
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

        $model = $this->ReadPropertyString('Model');

        if (array_key_exists($model, self::$Devices)) {
            foreach (self::$Devices[$model] as $key => $device) {
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
                    $Payload = json_decode($Buffer->Payload)->ZbReceived->{$device};
                    if (is_object($Payload)) {
                        $model = $this->ReadPropertyString('Model');
                        foreach (self::$Devices[$model] as $key => $device) {
                            if (property_exists($Payload, $device['SearchString'])) {
                                if ($key == $device['SearchString']) {
                                    $this->SetValue($key, $Payload->{$key});
                                } else {
                                    switch ($device['VariableType']) {
                                        case VARIABLETYPE_BOOLEAN:
                                            $this->SetValue($key, true);
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
        $Command = self::$Devices[$model][$Ident]['ActionCommand'];

        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = 'ZbSend';

        $ZbSend['device'] = $this->ReadPropertyString('Device');

        switch ($Ident) {
            case 'Color':
                $RGB = $this->HexToRGB($Value);
                $cie = $this->RGBToCIE($RGB[0], $RGB[1], $RGB[2],true);
                $Value = strval($cie['x'].','.$cie['y']);
        }
        
        $ZbSend['send'][$Ident] = $Value;

        $Buffer['Payload'] = json_encode($ZbSend);
        $Data['Buffer'] = json_encode($Buffer);

        $this->SendDebug('JSON Reload Devices', json_encode($Data), 0);
        $this->SendDataToParent(json_encode($Data));

        $this->SendDebug('Action', $Command, 0);
    }

    public function RequestState($Command) {
        $Data['DataID'] = '{91D0FFCD-72C7-EDD1-8525-4348DAD309BA}';
        $Buffer['Topic'] = $Command;
        $Buffer['Payload'] = $this->ReadPropertyString('Device');

        $Data['Buffer'] = json_encode($Buffer);
        $this->SendDebug('RequestState JSON', json_encode($Data), 0);
        $this->SendDataToParent(json_encode($Data));
    }

    private function registerVariables()
    {
        if (!IPS_VariableProfileExists('T2M.TogglePower')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Off'), '', -1];
            $Associations[] = [1, $this->Translate('On'), '', -1];
            $Associations[] = [2, $this->Translate('Toggle'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.TogglePower', '', '', '', $Associations);
        }
    }
}
