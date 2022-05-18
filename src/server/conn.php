<?php

class DatabaseHelper{

    private static $server = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $dbname = "post_it";

    public static $conn;

    public static function init(){
        if (self::$conn == null){
            self::$conn = new mysqli_connect(self::$server, self::$user, self::$password, self::$dbname);
            
            if (!self::$conn){
                die("<h1>[502]Could not connect to server!</h1>");
            }
        }

        return self::$conn;
    }
}