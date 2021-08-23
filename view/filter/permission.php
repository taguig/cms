<?php
class permission implements filter {
      public static  function Convert (&$code , view $view){
           
      $out=[];
      $permission=http::getInstance()->getTypeUser();
       preg_match_all("/\{%user:(a|v|u)%\}((.|\n)*?)\{%enduser%\}/",$code,$out,PREG_SET_ORDER);
       
       foreach($out as $o){
            $code=str_replace("{%user:".$permission."%}".$o[2]."{%enduser%}", $o[2],$code);
        }
         $code=preg_replace("/\{%user:(a|v|u)%\}((.|\n)*?)\{%enduser%\}/", "",$code);
     }
}