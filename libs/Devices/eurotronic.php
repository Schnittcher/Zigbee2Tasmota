<?php

declare(strict_types=1);

return [
    'SPZB0001' => [
        'Temperature' => [
            'Name'                   => 'Temperature',
            'VariableProfile'        => '~Temperature',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Temperature'
        ],
        'TempTarget' => [
            'Name'                   => 'Target Temperature',
            'VariableProfile'        => '~Temperature',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => 'TempTarget',
            'SearchString'           => 'TempTarget'
        ],
    ]
];