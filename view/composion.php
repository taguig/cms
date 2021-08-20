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
           self::ConvertPermision($code,$data);
           self::ConvertValue($code,$data);
         return $code;
          
        }
      
     }

     public static function getComposonCode(&$code,$data=null):string{
       $out=[];
       preg_match_all("\{%composion ([\w]+) ([\w]+)? %\}",$code,$out,PREG_SET_ORDER);
      foreach($out as $value){
        $code=str_replace($val[0],self::getComposion($val[1],(isset($data[$val[2]]))?$data[$val[2]]:""),$code);
      }

     }
     private static function ConvertValue(&$code,$data){
  if (isset($data) && is_array($data)){
           foreach($data as $key=>$value){
          $code=preg_replace("\{%".$key."%\}", $value,$code);
           }
         }
     }
     private static function ConvertPermision (&$code ,$data){
      $out=[];
      $permission=http::getInstance()->getTypeUser();
       preg_match_all("\{%user:(a|v|u)%\}((.|\n)*?)\{%enduser%\}",$code,$out,PREG_SET_ORDER);
       foreach($out as $o){
       if ($o[1]=='v'&& $o[1]==$permission ){
          $code=preg_replace("\{%user:v%\}((.|\n)*?)\{%enduser%\}", $o[2],$code);
          $code=preg_replace("\{%user:a%\}((.|\n)*?)\{%enduser%\}", "",$code);
          $code=preg_replace("\{%user:u%\}((.|\n)*?)\{%enduser%\}", "",$code);
       }else if($o[1]=='a' && $o[1]==$permission ){
           $code=preg_replace("\{%user:a%\}((.|\n)*?)\{%enduser%\}", $o[2],$code);
          $code=preg_replace("\{%user:v%\}((.|\n)*?)\{%enduser%\}", "",$code);
          $code=preg_replace("\{%user:u%\}((.|\n)*?)\{%enduser%\}", "",$code);
       }else if($o[1]=='u'&& $o[1]==$permission ){
          $code=preg_replace("\{%user:u%\}((.|\n)*?)\{%enduser%\}", $o[2],$code);
          $code=preg_replace("\{%user:v%\}((.|\n)*?)\{%enduser%\}", "",$code);
          $code=preg_replace("\{%user:a%\}((.|\n)*?)\{%enduser%\}", "",$code);

       }
        }
     }
 }