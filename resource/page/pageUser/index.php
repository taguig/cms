<?php
namespace web;
class index extends \base\page {

   public function __construct(){
  /*    $a = new Muser();
      $a->callFunction("getEx");*/
      $this->isCacheHeader=false;
      $this->isCacheBody = false;
      $this->isCacheFooter=false;
      parent::__construct();
   }
 
public  function viewHeader($data){
   $f=new \base\view("header",["data"=>"header html"]);  
  return $f;
}
public  function viewBody($data){
      $f = new \base\view("body", ["data"=>"jj","bill"=>"kkk"]); 
  
  return $f;
}
public  function viewFooter($data){
     $f=new \base\view("footer",["data"=>"footer html"]); 
   
  return $f;  
}
public  function getData(){
  $t=new \base\dataView();
  return $t;
}
}