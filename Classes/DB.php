<?php

namespace Classes;

use PDO;
use PDOException;

class DB
{
    protected function connect()
    {
        try {
            return (new PDO('mysql:host=localhost;dbname=ooplogin', 'root', ''));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}