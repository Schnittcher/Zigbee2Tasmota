<?php

declare(strict_types=1);

return [
    'Plug 01' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ]
    ],
    'Gardenpole RGBW-Lightify' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'Color' => [
            'Name'                   => 'Color',
            'VariableProfile'        => 'HexColor',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Color',
            'SearchString'           => 'X'
        ],
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ]
    ],
    'Classic A60 W clear - LIGHTIFY' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ]
    ],
    'Classic A60 RGBW' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'Color' => [
            'Name'                   => 'Color',
            'VariableProfile'        => 'HexColor',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Color',
            'SearchString'           => 'X'
        ],
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ]
    ],
    'CLA60 RGBW OSRAM' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'Color' => [
            'Name'                   => 'Color',
            'VariableProfile'        => 'HexColor',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Color',
            'SearchString'           => 'X'
        ],
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ]
    ],
    'Lightify Switch Mini' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => 'T2M.TogglePower',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Dimmer'
        ],
        'DimmerMove' => [
            'Name'                   => 'DimmerMove',
            'VariableProfile'        => 'T2M.IKEA.DimmerMove',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'DimmerMove'
        ],
        'DimmerStop' => [
            'Name'                   => 'DimmerStop',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => '',
            'ActionCommand'          => '',
            'SearchString'           => 'DimmerStop'
        ],
    ],
];