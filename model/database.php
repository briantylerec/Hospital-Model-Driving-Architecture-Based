<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=dbserverbi.database.windows.net;dbname=Hospitales', 'dbserverbi.database.windows.net', 'Universidad2020');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}	
