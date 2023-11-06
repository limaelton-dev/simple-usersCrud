<?php

declare(strict_types=1);

namespace app\Controller;

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

    public function index()
    {
        $setoresList = $this->setoresModel->all();

        require_once __DIR__ . '/../../views/setores_list.php';
        return;
    }

    public function store()
    {
        $fields['name'] = filter_input(INPUT_POST, 'name');

        $success = $this->setoresModel->add($fields);

        if ($success === false) {
            $this->index();
            return;
        }

        $this->index();
    }

    public function findName(int $id)
    {
        $this->setoresModel->findName($id);
    }

    public function destroy() 
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $this->setoresModel->remove($id);
        $this->index();
    }   
}
