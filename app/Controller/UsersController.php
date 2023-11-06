<?php

declare(strict_types=1);

namespace app\Controller;

use app\Controller\SetoresController;
use app\Model\Setores;
use app\Model\Users;
use app\Support\Csrf;

class UsersController 
{
    private Users $usersModel;
    private Setores $setoresModel;
    private SetoresController $setoresController;

    public function __construct()
    {
        $this->usersModel = new Users();
        $this->setoresModel = new Setores();
        $this->setoresController = new SetoresController();
    }
    
    private function all()
    {
        return $this->usersModel->all();
    }

    public function index(array|bool|null $users = false)
    {
        $setoresList = $this->setoresController->all();
        $users = $users === FALSE || $users === NULL ? $this->all() : $users;
        if(!empty($users)){

            $usersList = $this->usersModel->find($users);

            if(!empty($usersList)) {

                foreach($usersList as $key => $user) {

                    if(!empty($user['setores'])) {

                        $userSetores = explode(',', $user['setores']);
                        foreach($userSetores as $setorId) {
                            
                            $setorId = intval($setorId);
                            $usersList[$key]['setores_name'][] = $this->setoresModel->findName($setorId);
                            continue;
                        }
                    } else {
                        $usersList[$key]['setores_name'][] = 'Sem resultados';
                    }
                }
            }
        }
        
        require_once __DIR__ . '/../../views/index.php';
        return;
    }
    
    public function create()
    {
        $setores = $this->setoresController->all();

        require_once __DIR__ . '/../../views/user_create.php';
        return;
    }

    public function store()
    {
        Csrf::validateToken();
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $fields['name'] = filter_input(INPUT_POST, 'name');
        $fields['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
        $setores = "";
        if (isset($_POST['setor']) && is_array($_POST['setor'])) {
            $setores = implode(',', array_keys($_POST['setor']));
        }
    
        $setores = rtrim($setores, ',');
    
        if ($id !== false && $id !== NULL) {
            $this->usersModel->update($id, $fields);
            $this->usersModel->updateRelationSetores($id, $setores);
        } else {
            $setores = explode(',', $setores);
            $id = $this->usersModel->add($fields);
            $this->usersModel->addUserSetores($id, $setores);
        }
    
        $this->index();
    }

    public function edit(int $id)
    {
        $user = $this->usersModel->find($id)[0];
        $user['setores'] = $user['setores'] ? explode(',', $user['setores']) : [];

        $setores = $this->setoresController->all();
        require_once __DIR__ . '/../../views/user_edit.php';
        return;
    }

    public function findWithFilter()
    {
        $setores = isset($_POST['setores']) && is_array($_POST['setores']) ? $_POST['setores'] : [];

        if (in_array(0, $setores) || empty($setores)) {
            $this->index();
            return;
        }
    
        $users = $this->usersModel->findUsersSetores($setores);
    
        $this->index(!empty($users) ? $users : NULL);
    }

    public function destroy() 
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->usersModel->remove($id);
        $this->index();
    }   
}
