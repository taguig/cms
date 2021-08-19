<?php

class cache {
    public static function getHeadCache($name){
              $cache=file_get_contents("page/cache/Head".$name.".cache");
              return $cache;     
    }

    public static function createHeadCache($name,$data){
        $file=fopen("page/cache/Head".$name.".cache","w");
        fwrite($file,$data);
        return true;
    }
    
   public static function ExistsHeadCache($name){
   return file_exists("page/cache/Head".$name.".cache")?true:false;
   }
public static function createBodyCache($name,$data){
        $file=fopen("page/cache/Body".$name.".cache","w");
        fwrite($file,$data);
        return true;
    }
     public static function getBodyCache($name){
              $cache=file_get_contents("page/cache/Body".$name.".cache");
              return $cache;     
    }

   public static function ExistsBodyCache(){
   return file_exists("page/cache/Body".$name.".cache")?true:false;
   }
public static function createFooterCache($name,$data){
        $file=fopen("page/cache/Footer".$name.".cache","w");
        fwrite($file,$data);
        return true;
    }
    public static function getFooterCache($name){
              $cache=file_get_contents("page/cache/Footer".$name.".cache");
              return $cache;     
    }

   public static function ExistsFooterCache(){
   return file_exists("page/cache/Footer".$name.".cache")?true:false;
   }


}