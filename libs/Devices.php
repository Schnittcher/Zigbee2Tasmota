<?php

declare(strict_types=1);

class IPSVarType
{
    const vtNone = -1;
    const vtBoolean = 0;
    const vtInteger = 1;
    const vtFloat = 2;
    const vtString = 3;
    const vtDualInteger = 10;
}

class Devices extends IPSModule
{
    protected static $Devices = [

        'OSRAM Plug 01' => [
            'Power' => [
                'Name'                   => 'Power',
                'VariableProfile'        => '~Switch',
                'VariableType'           => IPSVarType::vtBoolean,
                'Action'                 => true,
                'ActionCommand'          => 'Power',
                'SearchString'           => 'Power'
            ]
        ],
        'IKEA of Sweden TRADFRI bulb E27 CWS opal 600lm' => [
            'Power' => [
                'Name'                   => 'Power',
                'VariableProfile'        => '~Switch',
                'VariableType'           => IPSVarType::vtBoolean,
                'Action'                 => true,
                'ActionCommand'          => 'Power',
                'SearchString'           => 'Power'
            ],
            'Dimmer' => [
                'Name'                   => 'Brightness',
                'VariableProfile'        => '~Intensity.100',
                'VariableType'           => IPSVarType::vtInteger,
                'Action'                 => true,
                'ActionCommand'          => 'Dimmer',
                'SearchString'           => 'Dimmer'
            ]
            ],
            'IKEA of Sweden TRADFRI on/off switch' => [
                'Power' => [
                    'Name'                   => 'Power',
                    'VariableProfile'        => 'T2M.TogglePower',
                    'VariableType'           => IPSVarType::vtInteger,
                    'Action'                 => false,
                    'ActionCommand'          => '',
                    'SearchString'           => 'Power'
                ]
            ],
            'IKEA of Sweden TRADFRI motion sensor' => [
                'Motion' => [
                    'Name'                   => 'Motion',
                    'VariableProfile'        => '~Motion',
                    'VariableType'           => IPSVarType::vtBoolean,
                    'Action'                 => false,
                    'ActionCommand'          => '',
                    'SearchString'           => '0006!42'
                ]
            ],
            'LUMI lumi.sensor_wleak.aq1' => [
                'ZoneStatusChange' => [
                    'Name'                   => 'Alarm',
                    'VariableProfile'        => '~Alert',
                    'VariableType'           => IPSVarType::vtBoolean,
                    'Action'                 => false,
                    'ActionCommand'          => '',
                    'SearchString'           => 'ZoneStatusChange'
                ]
            ],
            'LUMI lumi.sensor_magnet' => [
                'Power' => [
                    'Name'                   => 'Window',
                    'VariableProfile'        => '~Window',
                    'VariableType'           => IPSVarType::vtBoolean,
                    'Action'                 => false,
                    'ActionCommand'          => '',
                    'SearchString'           => 'Power'
                ]
            ],
            'LUMI lumi.sensor_magnet.aq2' => [
                'Power' => [
                    'Name'                   => 'Window',
                    'VariableProfile'        => '~Window',
                    'VariableType'           => IPSVarType::vtBoolean,
                    'Action'                 => false,
                    'ActionCommand'          => '',
                    'SearchString'           => 'Power'
                ]
            ],
    ];
}
