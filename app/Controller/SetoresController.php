<?php

declare(strict_types=1);

namespace app\Controller;

use app\Database\Connection;
use app\Model\Setores;

class SetoresController 
{
    private Setores $setoresModel;

    public function __construct()
    {
        $this->setoresModel = new Setores();
    }
    
    public function all()
    {
        return $this->setoresModel->all();
    }

    public function index(int|bool $id = false)
    {
        $usersList = $id !== false ? $this->setoresModel->find($id) : $this->all();

        require_once __DIR__ . '/../../views/index.php';
        return;
    }
    
    public function create()
    {
        require_once __DIR__ . '/../../views/user_create.php';
    }

    public function store()
    {
        //criar validação e flash message
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $fields['name'] = filter_input(INPUT_POST, 'name');
        $fields['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $success = $id ? $this->setoresModel->update($id, $fields) : $this->setoresModel->add($fields);

        if ($success === false) {
            $this->index();
            return;
        }

        $this->index();
    }

    public function edit(int $id)
    {
        //criar validação e flash message
        $user = $this->setoresModel->find($id)[0];
        require_once __DIR__ . '/../../views/user_edit.php';
        return;
    }

    public function destroy() 
    {
        //criar validação e flash message
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->setoresModel->remove($id);
        $this->index();
    }   
}
