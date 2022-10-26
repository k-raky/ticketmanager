<?php

return [
    'activated'        => true, // active/inactive all logging
    'middleware'       => ['web', 'auth'],
    'route_path'       => 'admin/user-activity',
    'admin_panel_path' => '/',
    'delete_limit'     => 30, // default 7 days

    'model' => [
        'user' => "App\User"
    ],

    'log_events' => [
        'on_login' => true,
        'on_edit'  => false,
        'on_delete'  => true,
        'on_login'  => false,
        'on_lockout'  => false,
    ]
];


