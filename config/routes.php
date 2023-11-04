<?php

declare(strict_types=1);

return [
        '/' => [
            'GET' => 'UsersController@index'
        ],
        '/user' => [
            'GET' => 'UsersController@index'
        ],
        '/user/create' => [
            'GET' => 'UsersController@create',
            'POST' =>  'UsersController@store'
        ],
        '/user/edit' => [
            'GET' => 'UsersController@edit',
            'POST' => 'UsersController@store',
        ],
        '/user/delete' => [
            'POST' => 'UsersController@destroy',
        ]
];