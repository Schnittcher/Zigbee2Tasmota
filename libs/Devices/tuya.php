<?php

declare(strict_types=1);

return [
    'TS0011' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => true,
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
            ]
        ],
    'TS0601' => [
        'Temperature' => [
            'Name'                   => 'Temperature',
            'VariableProfile'        => '~Temperature',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'LocalTemperature'
        ],
        'TargetTemperature' => [
            'Name'                   => 'Target Temperature',
            'VariableProfile'        => '~Temperature',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => true,
            'ActionCommand'          => 'TuyaTempTarget',
            'SearchString'           => 'TuyaTempTarget'
        ],
    ]
];