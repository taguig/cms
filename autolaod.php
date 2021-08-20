<?php

class autoLoad
{
    private static $path = [];
    public static function autoLoad()
    {
        spl_autoload_register(function ($class) {
           
            if (empty(self::$path)) {
                self::$path = self::getPath();
            }
            if (empty(self::$path[$class])) {
             
                throw new Exception("class introuvable :" . $class);
            }
            require_once(self::$path[$class]);
        });
    }

    public static function getPath()
    {
        $path = [];
      $path["view"]="view/view.php";
      $path["composion"]="view/composion.php";
      $path["dataView"]="view/dataView.php";
      $path["page"]="page/page.php";
      $path["cache"]="page/cache.php";
      $path["index"]="page/page/index.php";
     
        return  $path;
    }
    /**
     */
    public function __construct()
    {
    }
}
