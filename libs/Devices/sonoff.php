<?php

declare(strict_types=1);

return [
    'TH01' => [
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
        ],
    ],
    'Z2TSymcon-66666' => [
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
        ],
    ],
    'DS01' => [
        'Contact' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Window',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Contact'
        ]
    ],
    'MS01' => [
        'Occupancy' => [
            'Name'                   => 'Occupancy',
            'VariableProfile'        => '~Motion',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Occupancy'
        ],
    ],
    'WB01' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => 'T2M.Sonoff.Power',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
        ],
    ],
    '01MINIZB' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
    ],
    'BASICZBR3' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
    ]
];