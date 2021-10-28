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
        'PIHeatingDemand' => [
            'Name'                   => 'Valve',
            'VariableProfile'        => '~Valve',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'PIHeatingDemand'
        ],
        'LocalTemperatureCalibration' => [
            'Name'                   => 'Temperature Calibration',
            'VariableProfile'        => '~Temperature',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'LocalTemperatureCalibration'
        ]
    ]
];