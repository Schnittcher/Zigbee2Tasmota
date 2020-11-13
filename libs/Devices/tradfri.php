<?php

declare(strict_types=1);

return [
    'TRADFRI on/off switch' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => 'T2M.TogglePower',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
        ],
        'DimmerMove' => [
            'Name'                   => 'DimmerMove',
            'VariableProfile'        => 'T2M.IKEA.DimmerMove',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'DimmerMove'
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
    'TRADFRI transformer 30W' => [
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
    ],
    'TRADFRI transformer 10W' => [
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
    ]
];