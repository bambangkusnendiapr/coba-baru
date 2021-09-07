<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'beranda' => 'c,r,u,d',
            'artikel' => 'c,r,u,d',
            'formulir' => 'c,r,u,d',
            'profil' => 'c,r,u,d'
        ],
        'petugas' => [
            'beranda' => 'c,r,u,d',
            'formulir' => 'c,r,u,d',
            'profil' => 'c,r,u,d'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
