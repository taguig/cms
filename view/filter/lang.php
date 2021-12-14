<?php
namespace base;
class lang implements filter {
    public static  function Convert (&$code , Iview $view,$data=null){
        $out=[];
      $lang=http::getInstance()->getLang();
       if(preg_match_all("/\{%lang:([a-z]{2})%\}((.|\n)*?)\{%endlang%\}/",$code,$out,PREG_SET_ORDER)!=0){
            foreach($out as $o){
           if($o[1]==$lang){
            $code=str_replace("{%lang:".$o[1]."%}".$o[2]."{%endlang%}", $o[2],$code);
           }
            
        }
         $code=preg_replace("/\{%lang:([a-z]{2})%\}((.|\n)*?)\{%endlang%\}/", "",$code);
       }
  
    }
}