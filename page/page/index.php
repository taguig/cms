<?php
class index extends page {
   public function __construct(){
      $this->isCacheHeader=false;
      $this->isCacheBody=false;
      $this->isCacheFooter=false;
   }
public  function viewHeader($data){
   $f=new view("header",["data"=>"header html"]);  
  return $f;
}
public  function viewBody($data){
   $f=new view("body",["data"=>"body html","bill"=>"hjjjj","data1"=>["data"=>"google"]]); 
  
  return $f;
}
public  function viewFooter($data){
     $f=new view("footer",["data"=>"footer html"]); 
   
  return $f;  
}

}