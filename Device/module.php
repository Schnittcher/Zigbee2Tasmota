<?php


declare(strict_types=1);

if (!function_exists('fnmatch')) {
    function fnmatch($pattern, $string)
    {
        return preg_match('#^' . strtr(preg_quote($pattern, '#'), ['\*' => '.*', '\?' => '.']) . '$#i', $string);
    }
}

require_once __DIR__ . '/../libs/VariableProfileHelper.php';

class Tasmota2ZigbeeDevice extends IPSModule
{
    use VariableProfileHelper;

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->BufferResponse = '';
        $this->ConnectParent('{D5C0D7CE-6A00-BDBE-C43E-678CF5CBE178}');
        $this->registerVariables();

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
                    IPS_LogMessage('test', print_r($Payload, true));
                    if (is_object($Payload)) {
                        if (property_exists($Payload, 'Power')) {
                            $this->RegisterVariableInteger('Power', $this->Translate('Power'), 'T2M.Power');
                            SetValue($this->GetIDForIdent('Power'), $Payload->Power);
                        }
                    }
                }
            }
        }
    }

    private function registerVariables()
    {
        if (!IPS_VariableProfileExists('T2M.Power')) {
            $Associations = [];
            $Associations[] = [0, $this->Translate('Off'), '', -1];
            $Associations[] = [1, $this->Translate('On'), '', -1];
            $Associations[] = [2, $this->Translate('Toggle'), '', -1];
            $this->RegisterProfileIntegerEx('T2M.Power', '', '', '', $Associations);
        }
    }
}
