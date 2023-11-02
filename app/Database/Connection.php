<?php

declare(strict_types=1);

namespace app\Database;

use PDO;

class Connection 
{
    private static $pdoInstance = null;

     /**
     *
     * @return PDO retorna a instância da conexão com a base
     */
    public static function getConnection() :PDO
    {
        if(empty(self::$pdoInstance)) {
            self::$pdoInstance = new PDO(
                "mysql:
                    host=localhost;
                    dbname=userscrud",
                "root",
                "1234",
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        }

        return self::$pdoInstance;
    }
}

// try {

//     $pdo = Connection::getConnection();

//     echo "conectou!";
// } catch(PDOException $e) {
//     die("não conectou: ". $e->getMEssage());
// }