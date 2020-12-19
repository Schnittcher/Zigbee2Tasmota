<?php

declare(strict_types=1);

return [
    'SMOK_YDLV10' => [
        'fire' => [
            'Name'                   => 'Fire',
            'VariableProfile'        => '~Alert',
            'VariableType'           => VARIABLETYPE_BOOL,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'fire'
        ],
        'battery' => [
            'Name'                   => 'battery',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'battery'
        ],
        'lowbattery' => [
            'Name'                   => 'Lowbattery',
            'VariableProfile'        => '~Battery',
            'VariableType'           => VARIABLETYPE_BOOL,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'battery'
        ],
        'tempered' => [
            'Name'                   => 'Tempered',
            'VariableProfile'        => '~Lock',
            'VariableType'           => VARIABLETYPE_BOOL,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'tempered'
        ],
    ]
];
