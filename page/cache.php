<?php
namespace base;
class cache {
    public static function getHeadCache($name){   
              $cache=file_get_contents("resource/page/cache/Head".$name.".cache");
              return $cache;     
    }

    public static function createHeadCache($name,$data,$isCache){
        if ($isCache){
        file_put_contents("resource/page/cache/Head".$name.".cache",$data);
        return true;
        }
       return false;
    }
    
   public static function ExistsHeadCache($name){
   return file_exists("resource/page/cache/Head".$name.".cache")?true:false;
   }
public static function createBodyCache($name,$data,$isCache){
        if ($isCache){
        file_put_contents("resource/page/cache/Body".$name.".cache",$data);
        return true;
        }
       return false;
    }
     public static function getBodyCache($name){
              $cache=file_get_contents("resource/page/cache/Body".$name.".cache");
              return $cache;     
    }

   public static function ExistsBodyCache($name){
   return file_exists("resource/page/cache/Body".$name.".cache")?true:false;
   }
public static function createFooterCache($name,$data,$isCache){
      if ($isCache){
        file_put_contents("resource/page/cache/Footer".$name.".cache",$data);
        return true;
        }
       return false;
    }
    public static function getFooterCache($name){
              $cache=file_get_contents("resource/page/cache/Footer".$name.".cache");
              return $cache;     
    }

   public static function ExistsFooterCache($name){
   return file_exists("resource/page/cache/Footer".$name.".cache")?true:false;
   }


}