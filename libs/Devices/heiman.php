<?php

declare(strict_types=1);

return [
    'SMOK_YDLV10' => [
        'Fire' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Alert',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Fire'
        ],
    ],
    'COSensor-EM' => [
        'CO' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Alert',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'CO'
        ],
    ]
];