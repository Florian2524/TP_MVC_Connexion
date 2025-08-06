<?php

namespace App\Tools;

use PDO;
use PDOException;

class DB
{
    public static function connect(): PDO
    {
        try {
            return new PDO("mysql:host=localhost;dbname=connexion;charset=utf8", "root", "");
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
