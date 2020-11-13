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
        ]
    ],
    'lumi.sensor_magnet' => [
        'Power' => [
            'Name'                   => 'Window',
            'VariableProfile'        => '~Window',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
        ]
    ],
    'lumi.sensor_magnet.aq2' => [
        'Power' => [
            'Name'                   => 'Window',
            'VariableProfile'        => '~Window',
            'VariableType'           => VARIABLETYPE_BOOLEAN,
            'Action'                 => false,
            'ActionCommand'          => '',
            'SearchString'           => 'Power'
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
    ]
];