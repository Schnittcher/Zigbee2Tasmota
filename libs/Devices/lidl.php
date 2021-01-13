<?php

declare(strict_types=1);

return [
    'TS0502A' => [
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
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ]
    ],
    'TY0202' => [
        'Occupancy' => [
            'Name'                   => 'Occupancy',
            'VariableProfile'        => '~Motion',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Occupancy'
        ],
        'Tamper' => [
            'Name'                   => 'Tamper',
            'VariableProfile'        => '~Alert',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Tamper'
        ]
    ],
    'TS0502A' => [
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
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ],
        'TS1001' => [
            'Power' => [
                'Name'                   => 'State',
                'VariableProfile'        => 'T2M.TogglePower',
                'VariableType'           => VARIABLETYPE_BOOLEAN,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'Power'
            ],
            'DimmerStepUp' => [
                'Name'                   => 'DimmerStepUp',
                'VariableProfile'        => '',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'DimmerStepUp'
            ],
            'DimmerStepDown' => [
                'Name'                   => 'DimmerStepDown',
                'VariableProfile'        => '',
                'VariableType'           => VARIABLETYPE_INTEGER,
                'Action'                 => false,
                'ActionCommand'          => '',
                'SearchString'           => 'DimmerStepDown'
            ],
        ]
    ]
];