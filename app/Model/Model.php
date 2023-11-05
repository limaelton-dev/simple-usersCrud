<?php 

namespace app\Model;

use app\Database\Connection;
use PDO;

class Model 
{
    public PDO $pdo;

    public function __construct() 
    {
        $this->pdo = Connection::getConnection();
    }
}