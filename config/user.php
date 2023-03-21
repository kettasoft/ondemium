<?php

return [
    'name' => 'User',

    'activities' => [
        'account' => [
            'update' => true
        ],

        'education' => [
            'create' => true,
            'update' => true,
            'delete' => true,
        ],

        'clinic' => [
            'only' => [
                '@helthy' => ['show' => true, 'delete' => true, 'update' => true, 'address' => true],
            ],
            'create' => true,
            'delete' => true,
            'show' => true,
        ],

        'post' => [
            'create' => true,
            'update' => true,
            'delete' => true,
            'comment' => true,
        ],

        'activities' => [
            'follow' => true,
            'like' => true
        ],

        'booking' => [
            'make' => true,
            'cancel' => true
        ],

        'access' => [
            'create' => true,
            'delete' => true,
            'update' => true,
            'show' => true
        ],

        'article' => [
            'create' => true,
            'delete' => true,
            'update' => true,
            'show' => true,
        ],

        'group' => [
            'create' => true,
            'activities' => true
        ],

        'interactions' => []
    ]
];
