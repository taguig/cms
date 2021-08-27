<?php
class  dbquery{
    private static $Pdoconnect;
    private static $dbtype="mysql";
    private static function getPdo(){
        if (empty(self::$Pdoconnect)){
            self::$Pdoconnect=dbconfig::$dbtype();
        }
        return self::$Pdoconnect;
    }
    public static function query(string $q,array $arrayArg){
     $stat=selef::$Pdoconnect->prepare($q);
     $stat->execute($arrayArg);
     return $stat->fetchAll();
    }
}