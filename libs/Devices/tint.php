<?php

declare(strict_types=1);

return [
    'ZBT-ExtendedColor' => [
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
            'VariableProfile'        => 'T2M.Intensity.254',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ],
        'Color' => [
            'Name'                   => 'Color',
            'VariableProfile'        => 'HexColor',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Color',
            'SearchString'           => 'X'
        ],
    ],
    'ZBT-ColorTemperature' => [
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
            'VariableProfile'        => 'T2M.Intensity.254',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'CT' => [
            'Name'                   => 'Color Temperature',
            'VariableProfile'        => 'T2M.ColorTemperature.370',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ],
    ],
    'ZBT-Remote-ALL-RGBW' => [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => 'T2M.TogglePower',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
        ],
        'DimmerStepDown' => [
            'Name'                   => 'DimmerStepDown',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'DimmerStepDown'
        ],
        'DimmerStepUp' => [
            'Name'                   => 'DimmerStepUp',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'DimmerStepUp'
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
        'MullerLightMode' => [
            'Name'                   => 'Müller Light Mode',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'MullerLightMode'
        ],
        'Group' => [
            'Name'                   => 'Group',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Group'
        ],
    ],
];