<?php
namespace base;
class  dbquery{
    private static $Pdoconnect;
    private static $dbtype="dbconfig::mysql";
    private static function Pdo(){
        if (empty(self::$Pdoconnect)){
           $type=self::$dbtype;
            self::$Pdoconnect=$type();
        }
        return self::$Pdoconnect;
    }
    public static function query(string $q,array $arrayArg=[]){
        self::Pdo();
     $stat=self::$Pdoconnect->prepare($q);
     $stat->execute($arrayArg);
     return $stat->fetchAll();
    }
}