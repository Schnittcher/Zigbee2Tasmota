<?php

declare(strict_types=1);

return [
    'TS0121' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'ActivePower' => [
            'Name'                   => 'ActivePower',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'ActivePower'
        ],
        'RMSVoltage' => [
            'Name'                   => 'RMSVoltage',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'RMSVoltage'
        ],
    ]

];