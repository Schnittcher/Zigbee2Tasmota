'LINKIND bulb E27 9W A19 800lm'=> [
        'Power' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => true,
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'Dimmer' => [
            'Name'                   => 'Brightness',
            'VariableProfile'        => '~Intensity.255',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => true,
            'ActionCommand'          => 'Dimmer',
            'SearchString'           => 'Dimmer'
        ],
        'CT' => [
            'Name'                   => 'CT',
            'VariableProfile'        => 'T2M.ColorTemperature',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => true,
            'ActionCommand'          => 'CT',
            'SearchString'           => 'CT'
        ],
    ],
