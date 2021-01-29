<?php

declare(strict_types=1);
return [
    'Micromodule switch' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ]
    ]
];