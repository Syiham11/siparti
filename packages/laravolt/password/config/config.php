<?php
/*
 * Set specific configuration variables here
 */
return [
    // automatic loading of routes through main service provider
    'routes'   => true,
    'emails'   => [
        'reset' => 'password::reset',
        'new'   => 'password::new',
    ],
    'redirect' => 'my/password',
    'except'   => [
        'auth/logout',
        '_debugbar/*',
    ]
];