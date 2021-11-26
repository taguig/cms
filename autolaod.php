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
      $path["viewCss"]="view/viewCss.php";
      $path["composion"]="view/composion.php";
      $path["value"]="view/filter/value.php";
      $path["filter"]="view/filter/filter.php";
      $path["permission"]="view/filter/permission.php";
        $path["condition"] = "view/filter/condition.php"; 
      $path["composion"]="view/filter/composion.php";
      $path["loop"]="view/filter/loop.php";
        $path["lang"] = "view/filter/lang.php";
      $path["dataView"]="view/dataView.php";
      $path["page"]="page/page.php";
      $path["pageCss"]="page/pageCss.php";
      $path["cache"]="page/cache.php";
      $path["cacheCss"]="page/cacheCss.php";
      $path["index"]="page/page/index.php";
      $path["dbconfig"]="db/dbconfig.php";
        $path["dbpermission"] = "db/dbpermission.php";
        $path["dbmodel"] = "db/dbmodel.php";
        $path["Muser"] = "db/model/Muser.php";
      $path["dbquery"]="db/dbquery.php";
        $path["http"] = "http.php";
     
        return  $path;
    }
    /**
     */
    public function __construct()
    {
    }
}
