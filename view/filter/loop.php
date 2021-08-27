<?php
class loop implements filter {
    //\{%lp (.+)%\}
//((.|\n)*?)
//\{%lpend%\}
public static  function Convert (&$code , view $view,$data=null){
    $out=[];
   
    if(preg_match_all("/\{%lp (.+)%\}((.|\n)*?)\{%lpend%\}/",$code,$out,PREG_SET_ORDER)!=0){
      
       $lpcode="";
       $result="";
       $fincode="";
             foreach($out as $o){
            
                 $lpdata=$data[$o[1]];
                 $lpcode=$o[2];
                 
                  if (is_array($lpdata)){
                     
                   foreach($lpdata as $d){ 
                       $result=$lpcode;
                   $view->callFunc( $result,$d);
                      $fincode.=$result;
              
                   }
               
                  
                   }else {
           throw new Exception($out[1]." ces pas un tableux");
       }
             $code= str_replace($o[0],$fincode,$code);          
         
             }
        
     
    }
}
}