<?php
 class cacheCss {
     public static function ExistCacheJS($name){
     return file_exists("../resource/js/cache/".$name.".cacheJs")?true:false;
     }
     public static function getCacheJS($name){
      $cache=file_get_contents("../resource/js/cache/".$name.".cacheJs"); 
      return $cache;
     }
         public static function createCacheJS($name,$data,$isCache){
        if ($isCache){
            echo $name;
        file_put_contents("../resource/js/cache/".$name.".cacheJs",$data);
        return true;
        }
       return false;
    }
 }

?>