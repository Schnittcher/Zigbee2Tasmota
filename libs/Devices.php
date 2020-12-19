<?php

declare(strict_types=1);

class Devices extends IPSModule
{
    protected $Devices;
    public function __construct($InstanceID)
    {
        parent::__construct($InstanceID);
        $this->Devices = array_merge(
            include('Devices/aqara.php'),
            include('Devices/osram.php'),
            include('Devices/philips.php'),
            include('Devices/tradfri.php'),
            include('Devices/tuya.php'),
            include('Devices/sonoff.php'),
            include('Devices/lidl.php'),
            include('Devices/eurotronic.php'),
            include('Devices/schwaiger.php')
        );
    }
}
