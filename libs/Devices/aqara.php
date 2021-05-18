<?php

declare(strict_types=1);
return [
    'lumi.sensor_wleak.aq1' => [
        'ZoneStatusChange' => [
            'Name'                   => 'Alarm',
            'VariableProfile'        => '~Alert',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'ZoneStatusChange'
        ]
    ],
    'lumi.weather' => [
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
        'Pressure' => [
            'Name'                   => 'Pressure',
            'VariableProfile'        => '~AirPressure',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Pressure'
        ]
    ],
    'lumi.sensor_magnet' => [
        'Contact' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Window',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Contact'
        ]
    ],
    'lumi.sensor_magnet.aq2' => [
        'Contact' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Window',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Contact'
        ]
    ],
    'lumi.sensor_cube' => [
        'AqaraCubeAction' => [
            'Name'                   => 'Action',
            'VariableProfile'        => 'T2M.AqaraCube',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'AqaraCube'
        ],
        'AqaraCubeSide' => [
            'Name'                   => 'Side',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'AqaraCubeSide'
        ],
        'AqaraCubeFromSide' => [
            'Name'                   => 'From Side',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'AqaraCubeFromSide'
        ],
        'AqaraRotate' => [
            'Name'                   => 'Rotate',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'SearchString'           => 'AqaraRotate'
        ],
    ],
    'lumi.sensor_cube.aqgl01' => [
        'AqaraCubeAction' => [
            'Name'                   => 'Action',
            'VariableProfile'        => 'T2M.AqaraCube',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'AqaraCube'
        ],
        'AqaraCubeSide' => [
            'Name'                   => 'Side',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'AqaraCubeSide'
        ],
        'AqaraCubeFromSide' => [
            'Name'                   => 'From Side',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'AqaraCubeFromSide'
        ],
        'AqaraRotate' => [
            'Name'                   => 'Rotate',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_FLOAT,
            'Action'                 => false,
            'SearchString'           => 'AqaraRotate'
        ]
    ],
    'lumi.sen_ill.mgl01' => [
        'Illuminance' => [
            'Name'                   => 'Illuminance',
            'VariableProfile'        => '~Illumination',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Illuminance'
        ],
    ],
    'lumi.sensor_motion' => [
        'Occupancy' => [
            'Name'                   => 'Occupancy',
            'VariableProfile'        => '~Motion',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Occupancy'
        ]
    ],
    'lumi.sensor_motion.aq2' => [
        'Occupancy' => [
            'Name'                   => 'Occupancy',
            'VariableProfile'        => '~Motion',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Occupancy'
        ],
        'Illuminance' => [
            'Name'                   => 'Illuminance',
            'VariableProfile'        => '~Illumination',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Illuminance'
        ]
    ],
    'lumi.sensor_swit' => [
        'MultiInValue' => [
            'Name'                   => 'State',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'MultiInValue'
        ]
    ],
    'lumi.sensor_smoke' => [
        'SmokeDensity' => [
            'Name'                   => 'Smoke Density',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'SmokeDensity'
        ],
        'Occupancy' => [
            'Name'                   => 'Occupancy',
            'VariableProfile'        => '~Motion',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Occupancy'
        ],
        'Fire' => [
            'Name'                   => 'State',
            'VariableProfile'        => '~Alert',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Fire'
        ],
    ],
    'lumi.lock.v1' => [
        'SmokeDensity' => [
            'Name'                   => 'Smoke Density',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'SmokeDensity'
        ],
        'Occupancy' => [
            'Name'                   => 'Occupancy',
            'VariableProfile'        => '~Motion',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Occupancy'
        ],
    ],
    'lumi.sens' => [
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
        ]
    ],
    'lumi.sensor_ht' => [
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
        ]
    ],
    'lumi.vibration.aq1' => [
        'AqaraVibrationMode' => [
            'Name'                   => 'Vibration',
            'VariableProfile'        => 'T2M.AqaraVibrationMode',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'AqaraVibrationMode'
        ]
    ],
    'lumi.remote.b1acn01' => [
        'click' => [
            'Name'                   => 'Click',
            'VariableProfile'        => 'T2M.Aqara.Click',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'click'
        ],
        'action' => [
            'Name'                   => 'Action',
            'VariableProfile'        => 'T2M.Aqara.Action',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'action'
        ],
    ],
    'lumi.remote.b286acn01' => [
        'click' => [
            'Name'                   => 'Click 1',
            'VariableProfile'        => 'T2M.Aqara.Click',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'click'
        ],
        'click2' => [
            'Name'                   => 'Click 2',
            'VariableProfile'        => 'T2M.Aqara.Click',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'click2'
        ],
        'action' => [
            'Name'                   => 'Action 1',
            'VariableProfile'        => 'T2M.Aqara.Action',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'action'
        ],
        'action2' => [
            'Name'                   => 'Action 2',
            'VariableProfile'        => 'T2M.Aqara.Action',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'action2'
        ],
    ],
    'lumi.sensor_switch.aq2' => [
        'Power' => [
            'Name'                   => 'Power',
            'VariableProfile'        => '',
            'VariableType'           => VARIABLETYPE_INTEGER,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
        ]
    ],
    'lumi.relay.c2acn01' => [
        'Power' => [
            'Name'                   => 'State 1',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power'
        ],
        'Power2' => [
            'Name'                   => 'State 2',
            'VariableProfile'        => '~Switch',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => 'tasmota',
            'ActionCommand'          => 'Power',
            'SearchString'           => 'Power2',
            'Endpoint'               => 2
        ],
    ],
];