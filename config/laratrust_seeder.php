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
        'admin' => [
            'users' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'cycles' => 'c,r,u,d',
            'mentions' => 'c,r,u,d',
            'parcours' => 'c,r,u,d',
            'niveaux' => 'c,r,u,d'
        ],
        'directeur' => [
            'users' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'cycles' => 'r',
            'mentions' => 'r',
            'parcours' => 'r',
            'niveaux' => 'r'

        ],
        'daarcs' => [
            'users' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'cycles' => 'r',
            'mentions' => 'r',
            'parcours' => 'r',
            'niveaux' => 'r'
        ],
        'cellule' => [
            'users' => 'c,r,u,d',
            'profile' => 'c,r,u,d',
            'cycles' => 'r',
            'mentions' => 'r',
            'parcours' => 'r',
            'niveaux' => 'r'
        ],
        'scolarite' => [
            'profile' => 'c,r,u',
            'cycles' => 'r',
            'mentions' => 'r',
            'parcours' => 'r',
            'niveaux' => 'r'
        ],
        'enseignant' => [
            'profile' => 'r,u',
            'cycles' => 'r',
            'mentions' => 'r',
            'parcours' => 'r',
            'niveaux' => 'r'
        ],
        'etudiant' => [
            'profile' => 'r,u',
            'cycles' => 'r',
            'mentions' => 'r',
            'parcours' => 'r',
            'niveaux' => 'r'
        ]
    ],


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
