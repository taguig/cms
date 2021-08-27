<?php
class composion implements filter {
     private static $file=[];
     public static function getComposion($name,view $view):string{
         $code="";
        if (file_exists("view/composion/".$name.".composion")){
          if(!isset(self::$file[$name]) || empty(self::$file[$name]) ){
           self::$file[$name]=file_get_contents("view/composion/".$name.".composion");
          }
          $code=self::$file[$name];
          $view->callFunc($code);
         return $code;
          
        }
      throw new Exception("composion non trouver");
     }
public static function Convert(&$code , view $view,$data=null){
   $out=[];
   $data=$view->getData();
     if(preg_match_all("/\{%composion ([\w]+) (.+)?%\}/",$code,$out,PREG_SET_ORDER)==0){
       return ;
     }

      foreach($out as $val){
        $code=str_replace($val[0],self::getComposion($val[1],$view,(isset($data[$val[2]]))?$data[$val[2]]:""),$code);
      }
}
}