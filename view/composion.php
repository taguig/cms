<?php
 
 class composion {
     private static $file=[];
     public static function getComposion($name,$data=null):string{
         $data="";
         $code="";
        if (file_exists("/view/composion/".$name."composion")){
          if(!isset(self::file[$name]) || empty(self::file[$name]) ){
           self::$file[$name]=file_get_contents("/view/composion/".$name."composion");
          }
          $code=self::$file[$name];
             if (isset($data) && is_array($data)){
           foreach($data as $key=>$value){
          $code=preg_replace("\{([\s]+)?".$key."([\s]+)?\}", $value,$code);
           }
         }
         return $code;
          
        }
      
     }

     public static function getComposonCode(&$code,$data=null):string{
       $out=[];
       preg_match_all("\{%([\s]+)?composion ([\w]+) ([\w]+)?([\s]+)?%\}",$code,$out,PREG_SET_ORDER);
      foreach($out as $value){
        $code=str_replace($val[0],self::getComposion($val[1],(isset($data[$val[2]]))?$data[$val[2]]:""),$code);
      }

     }
 }