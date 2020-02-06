<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=mdaserver.mysql.database.azure.com;dbname=hospital', 'mdaserver@mdaserver', 'Universidad2020');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}	
