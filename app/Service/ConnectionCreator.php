<?php

namespace App\Library\Service;

use PDO;

class ConnectionCreator
{
    public static function creatorConnection(): PDO
    {
        $connection = new PDO("mysql:host=localhost;dbname=dblibrary;charset=UTF8", "root", "rR158326974+-");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        return $connection;
    }
}