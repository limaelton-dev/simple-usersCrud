<?php

declare(strict_types=1);

namespace app\Controller;

use app\Database\Connection;
use app\Model\Users;

class UsersController 
{
    private Users $usersModel;

    public function __construct()
    {
        $this->usersModel = new Users(Connection::getConnection());
    }

    public function index(): void
    {
        $usersList = $this->all();
        require_once __DIR__ . '/../../views/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../../views/createUser.php';
    }

    public function store(): void
    {
        $fields['name'] = filter_input(INPUT_POST, 'name');
        $fields['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if($fields['name' === false] || $fields['email' === false]) {
            header('Location:  /');
            return;
        }

        $success = $this->usersModel->add($fields);
        if ($success === false) {
            header('Location:  /');
            return;
        }

        header('Location:  /');
    }

    private function all()
    {
        return $this->usersModel->all();
    }
}
