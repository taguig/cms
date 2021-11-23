<?php
 class cahceCss {
     public static function ExistCacheCSS($name){
     return file_exists("page/cacheCss/".$name.".cacheCss")?true:false;
     }
     public static function getCacheCSS(){
      $cache=file_get_contents("page/cacheCss/".$name.".cacheCss"); 
     }
         public static function createCacheCSS($name,$data,$isCache){
        if ($isCache){
        file_put_contents("page/cacheCss/".$name.".cacheCss",$data);
        return true;
        }
       return false;
    }
 }

?>