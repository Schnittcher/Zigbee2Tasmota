<?php

declare(strict_types=1);

return [
    'RGB-CCT' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'Color' => [
            'Name'                   => 'Color',
            'VariableProfile'        => 'HexColor',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Color',
            'SearchString'           => 'X'
        ],
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ],
    ],
    'ZGRC-TEUR-002' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => 'T2M.TogglePower',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'DimmerMove' => [
            'Name'                   => 'DimmerMove',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'DimmerMove'
        ],
        'DimmerStop' => [
            'Name'                   => 'DimmerStop',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'DimmerStop'
        ],
        'HueMove' => [
            'Name'                   => 'HueMove',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGR,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'HueMove'
        ],
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'CT'
        ],
        'ColorX' => [
            'Name'                   => 'Color X',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Color'
        ],
        'ColorY' => [
            'Name'                   => 'Color Y',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Color'
        ],
    ],
];
