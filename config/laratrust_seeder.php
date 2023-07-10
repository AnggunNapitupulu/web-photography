<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'Admin' => [
            'users' => 'c,r,u,d',
            'camera' => 'c,r,u,d',
            'contact' => 'c,r,u,d',
            'catgallery' => 'c,r,u,d',
            'gallery' => 'c,r,u,d',
            'order' => 'r,d',
            'ordercamera' => 'r,d',
            'saran' => 'r,d',
            'service' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'User' => [
            'profile' => 'r,u',
            'order' => 'c,r,u,d',
            'saran' => 'c',
            'ordercamera' => 'c,r,u,d',
            'gallery' => 'r',
            'camera' => 'r',
            'contact' => 'r',
            'service' => 'r',
        ],
        'Guest' => [
            'gallery' => 'r',
            'camera' => 'r',
            'contact' => 'r',
            'service' => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
