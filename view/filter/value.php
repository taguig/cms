<?php
class value implements filter {
   
    public static function Convert(&$code ,view $view,$data=null){
      foreach($data as $key=>$value ){
      if(is_string($value)){
       $code=preg_replace("/\{%".$key."%\}/", $value,$code); 
      }
            
           }
    }

}