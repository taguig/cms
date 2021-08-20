<?php
 class page {

    protected $middleware =[];
    protected $nameFacHeader="viewHeader";
    protected $nameFacBody="viewBody";
    protected $nameFacFooter="viewFooter";
    protected $isCacheHeader=true;
    protected $isCacheBody=true;
    protected $isCacheFooter=true;

    
public function execMiddleware():bool{
foreach ($this->middleware as $value) {
  if(function_exists(array($this,$value))){
 if (!call_user_func(array($this,$value))){
      throw new Exception("Erreur dans le middelware ".$value);
    }
  }else {
     throw new Exception(" middelware n'existe pas ".$value);
  }
   
}
return true;
} 

public function  View(){
$data=$this->getData();
$name=$this->getName();
$stringHeader="";
$stringBody="";
$stringFooter="";
if(cache::ExistsHeadCache($name) && $this->isCacheHeader){
$stringHeader=cache::getHeadCache($name);
}else{
  $viewHeader=call_user_func(array($this,$this->nameFacHeader),$data->getDataHeader());
   $viewHeader->Convert();
   $stringHeader=$viewHeader->toString();
  cache::createHeadCache($name,$stringHeader,$this->isCacheHeader);
}


if(cache::ExistsBodyCache($name) && $this->isCacheBody){
$stringBody=cache::getBodyCache($name);
}else{
  $viewBody=call_user_func(array($this,$this->nameFacBody),$data->getDataBody());
   $viewBody->Convert();
   $stringBody=$viewBody->toString();
  cache::createBodyCache($name,$stringBody,$this->isCacheBody);
}

if(cache::ExistsFooterCache($name) && $this->isCacheFooter){
 $stringFooter=cache::getFooterCache($name);
}else{
  $viewFooter=call_user_func(array($this,$this->nameFacFooter),$data->getDataFooter());
  $viewFooter->Convert();
   $stringFooter=$viewFooter->toString();
  cache::createFooterCache($name,$stringFooter,$this->isCacheFooter);
}

return $stringHeader."\n".$stringBody."\n".$stringFooter;
}
public  function viewHeader($data){}
public  function viewBody($data){}
public  function viewFooter($data){}
public  function getData(){
  return new dataView();
}
protected  function getName(){}
}