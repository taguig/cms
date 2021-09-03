<?php
class index extends page {

   public function __construct(){
      
      $this->isCacheHeader=true;
      $this->isCacheBody=false;
      $this->isCacheFooter=true;
      parent::__construct();
   }
 
public  function viewHeader($data){
   $f=new view("header",["data"=>"header html"]);  
  return $f;
}
public  function viewBody($data){
   $f=new view("body",["data"=>$data["data"],"bill"=>"hjjjj","data1"=>["data"=>"google"],"taguig"=>[["data"=>"bill"],["data"=>"taguig"]]]); 
  
  return $f;
}
public  function viewFooter($data){
     $f=new view("footer",["data"=>"footer html"]); 
   
  return $f;  
}
public  function getData(){
  $t=new dataView();
      $r=dbquery::query("select * from utilisateurs")[0]; 
      $t->addBody("data",$r["Nom"]);

  return $t;
}
}