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
    ]
];

