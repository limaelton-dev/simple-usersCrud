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
        require_once __DIR__ . '/../../views/create_user.php';
    }

    public function store(): void
    {
        $fields['name'] = filter_input(INPUT_POST, 'name');
        $fields['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if($fields['name' === false] || $fields['email' === false]) {
            $this->index();
            return;
        }

        $success = $this->usersModel->add($fields);
        if ($success === false) {
            $this->index();
            return;
        }

        $this->index();
    }

    private function all()
    {
        return $this->usersModel->all();
    }

    public function find()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $usersList = $this->usersModel->find($id);
        require_once __DIR__ . '/../../views/index.php';
    }

    public function destroy() 
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->usersModel->remove($id);
        $this->index();
    }   
}
