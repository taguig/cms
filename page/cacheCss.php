<?php
 class cacheCss {
     public static function ExistCacheCSS($name){
     return file_exists("resource/css/cache/".$name.".cacheCss")?true:false;
     }
     public static function getCacheCSS($name){
      $cache=file_get_contents("resource/css/cache/".$name.".cacheCss"); 
      return $cache;
     }
         public static function createCacheCSS($name,$data,$isCache){
        if ($isCache){
            echo $name;
        file_put_contents("resource/css/cache/".$name.".cacheCss",$data);
        return true;
        }
       return false;
    }
 }

?>