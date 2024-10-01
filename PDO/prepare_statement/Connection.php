<?php

class Connection
{
    private static $host = 'localhost';
    private static $user = 'alhiefikri';
    private static $pass = '123';
    private static $db = 'latihan';

    public static function getConnection()
    {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
