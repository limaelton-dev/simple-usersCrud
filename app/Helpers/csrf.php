<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use app\Support\Csrf;

function getToken() 
{
    return Csrf::getToken();
}