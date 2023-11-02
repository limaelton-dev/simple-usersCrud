<?php

namespace app\database;

use PDO;
use PDOException;

class Connection 
{
    private static $pdoInstance = null;

    public static function getConnection()
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