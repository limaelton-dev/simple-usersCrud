<?php

declare(strict_types=1);

return [
    '/' => [
        'GET' => 'UsersController@index',  // Rota para listar usuários (método "index")
        'POST' => 'UsersController@create', // Rota para criar usuário (método "create")
        'PUT' => 'UsersController@update',   // Rota para atualizar usuário (método "update")
        'DELETE' => 'UsersController@delete', // Rota para excluir usuário (método "delete")
    ],
    '/create' => [
        'GET' => 'UsersController@create',
        'POST' => 'UsersController@store',
    ]
];