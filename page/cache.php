<?php

class cache {
    public static function getHeadCache($name){
              $cache=file_get_contents("page/cache/head".$name.".cache");
              return $cache;     
    }

    public static function createHeadCache($name,$data){
        $file=fopen("page/cache/head".$name.".cache","w");
        fwrite($file,$data);
        return true;
    }
    
   public static function ExistsHeadCache(){
   return file_exists("page/cache/head".$name.".cache")?true:false;
   }

     public static function getBodyCache($name){
              $cache=file_get_contents("page/cache/Body".$name.".cache");
              return $cache;     
    }

   public static function ExistsBodyCache(){
   return file_exists("page/cache/Body".$name.".cache")?true:false;
   }

    public static function getFooterCache($name){
              $cache=file_get_contents("page/cache/Footer".$name.".cache");
              return $cache;     
    }

   public static function ExistsFooterCache(){
   return file_exists("page/cache/Footer".$name.".cache")?true:false;
   }


}