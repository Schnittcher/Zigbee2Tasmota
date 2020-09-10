<?php

declare(strict_types=1);

class Devices extends IPSModule
{
    protected static $Devices = [

        'Plug 01' => [
            'Power' => [
                'Name'                   => 'State',
                'VariableProfile'        => '~Switch',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => true,
                'ActionCommand'          => 'Power',
                'SearchString'           => 'Power'
            ]
        ],
        'TRADFRI bulb E27 CWS opal 600lm' => [
            'Power' => [
                'Name'                   => 'State',
                'VariableProfile'        => '~Switch',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => true,
                'ActionCommand'          => 'Power',
                'SearchString'           => 'Power'
            ],
            'Dimmer' => [
                'Name'                   => 'Brightness',
                'VariableProfile'        => '~Intensity.255',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => true,
                'ActionCommand'          => 'Dimmer',
                'SearchString'           => 'Dimmer'
            ],
            'Color' => [
                'Name'                   => 'Color',
                'VariableProfile'        => 'HexColor',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => true,
                'ActionCommand'          => 'Color',
                'SearchString'           => 'X'
            ]
        ],
        'TRADFRI on/off switch' => [
            'Power' => [
                'Name'                   => 'State',
                'VariableProfile'        => 'T2M.TogglePower',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Power'
            ]
        ],
        'TRADFRI motion sensor' => [
            'Power' => [
                'Name'                   => 'Motion',
                'VariableProfile'        => '~Motion',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Power'
            ]
        ],
        'lumi.sensor_wleak.aq1' => [
            'ZoneStatusChange' => [
                'Name'                   => 'Alarm',
                'VariableProfile'        => '~Alert',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'ZoneStatusChange'
            ]
        ],
        'lumi.weather' => [
            'Temperature' => [
                'Name'                   => 'Temperature',
                'VariableProfile'        => '~Temperature',
                'VariableType'           => VARIABLETYPE_FLOAT,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Temperature'
            ],
            'Humidity' => [
                'Name'                   => 'Humidity',
                'VariableProfile'        => '~Humidity.F',
                'VariableType'           => VARIABLETYPE_FLOAT,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Humidity'
            ]
        ],
        'lumi.sensor_magnet' => [
            'Power' => [
                'Name'                   => 'Window',
                'VariableProfile'        => '~Window',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Power'
            ]
        ],
        'lumi.sensor_magnet.aq2' => [
            'Power' => [
                'Name'                   => 'Window',
                'VariableProfile'        => '~Window',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Power'
            ]
        ],
        'lumi.sensor_cube' => [
            'AqaraCubeAction' => [
                'Name'                   => 'Action',
                'VariableProfile'        => 'T2M.AqaraCube',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'AqaraCube'
            ],
            'AqaraCubeSide' => [
                'Name'                   => 'Side',
                'VariableProfile'        => '',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'AqaraCubeSide'
            ],
            'AqaraCubeFromSide' => [
                'Name'                   => 'From Side',
                'VariableProfile'        => '',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'AqaraCubeFromSide'
            ],
        ],
        'lumi.sen_ill.mgl01' => [
            'Illuminance' => [
                'Name'                   => 'Illuminance',
                'VariableProfile'        => '~Illumination',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Illuminance'
            ],
        ],
        'LCT015' => [
            'Power' => [
                'Name'                   => 'State',
                'VariableProfile'        => '~Switch',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => true,
                'ActionCommand'          => 'Power',
                'SearchString'           => 'Power'
            ],
            'Dimmer' => [
                'Name'                   => 'Brightness',
                'VariableProfile'        => '~Intensity.255',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => true,
                'ActionCommand'          => 'Dimmer',
                'SearchString'           => 'Dimmer'
            ],
            'Color' => [
                'Name'                   => 'Color',
                'VariableProfile'        => 'HexColor',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => true,
                'ActionCommand'          => 'Color',
                'SearchString'           => 'X'
            ]
        ],
    ];
}
