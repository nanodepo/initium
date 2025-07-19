<?php

return [
    'role' => [
        'user' => [
            'title' => 'Member',
            'description' => 'Can create and manage projects',
        ],
        'manager' => [
            'title' => 'Manager',
            'description' => 'Can manage users and projects',
        ],
        'admin' => [
            'title' => 'Administrator',
            'description' => 'Full permissions',
        ],
        'root' => [
            'title' => 'Superuser',
            'description' => 'Root permissions',
        ],
    ],
];
