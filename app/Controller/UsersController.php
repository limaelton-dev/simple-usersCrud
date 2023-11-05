<?php

declare(strict_types=1);

namespace app\Controller;

use app\Controller\SetoresController;
use app\Database\Connection;
use app\Model\Users;

class UsersController 
{
    private Users $usersModel;
    private SetoresController $setoresController;

    public function __construct()
    {
        $this->usersModel = new Users(Connection::getConnection());
        $this->setoresController = new SetoresController();
    }
    
    private function all()
    {
        return $this->usersModel->all();
    }

    public function index(int|bool $id = false)
    {
        $usersList = $id !== false ? $this->usersModel->find($id) : $this->all();

        require_once __DIR__ . '/../../views/index.php';
        return;
    }
    
    public function create()
    {
        $setores = $this->setoresController->all();
        // print_r($setores);die;
        require_once __DIR__ . '/../../views/user_create.php';
        return;
    }

    public function store()
    {
        //criar validação e flash message
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $fields['name'] = filter_input(INPUT_POST, 'name');
        $fields['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $success = $id ? $this->usersModel->update($id, $fields) : $this->usersModel->add($fields)

        ;
        if ($success === false) {
            $this->index();
            return;
        }

        $this->index();
    }

    public function edit(int $id)
    {
        //criar validação e flash message
        $user = $this->usersModel->find($id)[0];
        require_once __DIR__ . '/../../views/user_edit.php';
        return;
    }

    public function destroy() 
    {
        //criar validação e flash message
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->usersModel->remove($id);
        $this->index();
    }   
}
