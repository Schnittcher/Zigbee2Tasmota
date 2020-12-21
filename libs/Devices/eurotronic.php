<?php

declare(strict_types=1);

return [
    'SPZB0001' => [
        'LocalTemperature' => [
            'Name'                   => 'Temperature',
            'VariableProfile'        => '~Temperature.Room',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'LocalTemperature'
        ],
        'OccupiedHeatingSetpoint' => [
            'Name'                   => 'Target Temperature',
            'VariableProfile'        => '~Temperature.Room',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => 'attribute',
            'ActionCommand'          => 'OccupiedHeatingSetpoint',
            'SearchString'           => 'OccupiedHeatingSetpoint'
        ],
        'Valve' => [
            'Name'                   => 'Valve',
            'VariableProfile'        => '~Valve',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'PIHeatingDemand'
        ],
    ]
];
