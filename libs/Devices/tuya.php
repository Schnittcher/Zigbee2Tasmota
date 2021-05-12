<?php

declare(strict_types=1);

return [
    'TS0011' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ]
    ],
    'TS0121' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ]
    ],
    'TS0001' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ]
    ],
    'TS0601' => [
        'LocalTemperature' => [
            'Name'                   => 'Temperature',
            'VariableProfile'        => '~Temperature',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'LocalTemperature'
        ],
        'TuyaTempTarget' => [
            'Name'                   => 'Target Temperature',
            'VariableProfile'        => '~Temperature',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => true,
            'ActionCommand'          => 'TuyaTempTarget',
            'SearchString'           => 'TuyaTempTarget'
        ],
        'TuyaValvePosition' => [
            'Name'                   => 'Valve Position',
            'VariableProfile'        => '~Intensity.100',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'TuyaValvePosition'
        ],
    ],
    'TS130F' => [
        'CurrentPositionLiftPercentage' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Intensity.100',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CurrentPositionLiftPercentage',
            'SearchString'           => 'CurrentPositionLiftPercentage'
        ]
    ],
    'TS0501B' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ]
    ],
    'Dimmer' => [
        'Name'                   => 'Brightness',
        'VariableProfile'        => '~Intensity.255',
        'VariableType'           => VARIABLETYPE_INTEGER,
        'Action'                 => 'tasmota',
        'ActionCommand'          => 'Dimmer',
        'SearchString'           => 'Dimmer'
    ],
];