<?php
 
 class composion {
     private static $file=[];
     public static function getComposion($name,$value=null){
         $data="";
        if (file_exists("/view/composion/".$name."composion")){
          if(!isset(self::file[$name]) || empty(self::file[$name]) ){
           self::$file[$name]=file_get_contents("/view/composion/".$name."composion");
          }
             if (isset($value) && is_array($value)){
           foreach($value as $key=>$value){

           }
         }

          
        }
      
     }
 }