<?php 
namespace base;
class dbconfig{
    private static $host="localhost";
    private static $user="root";
    private static $pw="";
    private static $dbname="ecommerce";
    public static function mysql (){
        $pdoString="mysql:host=".self::$host.";dbname=".self::$dbname;
        return new \PDO($pdoString,self::$user,self::$pw);
    }
}