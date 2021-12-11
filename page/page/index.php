<?php
class index extends page {

   public function __construct(){
  /*    $a = new Muser();
      $a->callFunction("getEx");*/
      $this->isCacheHeader=false;
      $this->isCacheBody = false;
      $this->isCacheFooter=true;
      parent::__construct();
   }
 
public  function viewHeader($data){
   $f=new view("header",["data"=>"header html"]);  
  return $f;
}
public  function viewBody($data){
      $f = new view("body", ["data"=>"jj","bill"=>"kkk"]); 
  
  return $f;
}
public  function viewFooter($data){
     $f=new view("footer",["data"=>"footer html"]); 
   
  return $f;  
}
public  function getData(){
  $t=new dataView();
  return $t;
}
}