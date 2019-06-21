<?php

return [
    'role_structure' => [
        //admin
        'superadministrator' => [
            'users' => 'c,r,u,d',

//            'tasks' => 'c,r,u,d',
        ],
        //manager
        'administrator' => [
            'users' => 'c,r,u,d',
        ],
        //ordinary user
        'user' => [
            'tasks'=>'c,r,u,d'

        ],
    ],
    'permission_structure' => [

    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
