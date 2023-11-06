<?php
namespace app\Support;

use Exception;

require_once __DIR__."/../../vendor/autoload.php";

class Csrf
{
    public static function getToken()
    {
        if(isset($_SESSION['token'])) {
            unset($_SESSION['token']);
        }

        $_SESSION['token'] = md5(uniqid());

        return "<input type='hidden' name='token' value='{$_SESSION['token']}'>";
    }

    public static function validateToken()
    {
        // die("chegou");
        if (!isset($_SESSION['token'])) {
            throw new Exception("Token CSRF inválido");
        }
    
        $token = filter_input(INPUT_POST, 'token');
    
        if ($_SESSION['token'] !== $token) {
            throw new Exception("Token CSRF inválido");
        }
    
        unset($_SESSION['token']);
    
        return true;
    }
}