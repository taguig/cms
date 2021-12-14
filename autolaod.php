<?php

class autoLoad
{
    private static $path = [];
    public static function autoLoad()
    {
        spl_autoload_register(function ($class) {
            try{
           $arrClass=explode("\\",$class);
            if (empty(self::$path)) {
                self::$path = self::getPath();
            }
            if (isset(self::$path[$arrClass[0]][$arrClass[1]])) {

               require_once(self::$path[$arrClass[0]][$arrClass[1]]);
               return; 
            }
             }catch(Exception $e){
                 echo $class;
                 print_r($arrClass);
             }
           
           
            throw new Exception("class introuvable :" . $class);
            
        });
    }

    public static function getPath()
    {
        $path = [
         "base"=>["view"=>"view/view.php",
              "viewCss"=>"view/viewCss.php",
              "composion"=>"view/composion.php",
              "value"=>"view/filter/value.php",
              "filter"=>"view/filter/filter.php",
              "permission"=>"view/filter/permission.php",
              "condition" => "view/filter/condition.php",
              "composion"=>"view/filter/composion.php",
              "composion"=>"view/filter/composion.php",
              "loop"=>"view/filter/loop.php",
              "lang" => "view/filter/lang.php",
              "dataView"=>"view/dataView.php",
              "Iview"=>"view/Iview.php",
              "page"=>"page/page.php",
              "pageCss"=>"page/pageCss.php",
              "pageJs"=>"page/pageJs.php",
              "cache"=>"page/cache.php",
              "cacheCss"=>"page/cacheCss.php",
              "cacheJs"=>"page/cacheJs.php",
              "dbconfig"=>"db/dbconfig.php",
              "dbpermission" => "db/dbpermission.php",
              "dbmodel"=> "db/dbmodel.php",
              "Muser"=> "db/model/Muser.php",
              "dbquery"=>"db/dbquery.php",
              "http"=>"http.php",
              "accesSession" => "accesSession.php",
              "ajax" => "resource/ajax/ajax.php"
        ],
        "web"=>["index"=>"resource/page/pageUser/index.php"]


        ];
     
      
      
      
      
      
      
      
      
      
      
     
        return  $path;
    }
    /**
     */
    public function __construct()
    {
    }
}
