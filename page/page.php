<?php
namespace base;
 class page {

    protected $middleware =[];
    protected $nameFacHeader="viewHeader";
    protected $nameFacBody="viewBody";
    protected $nameFacFooter="viewFooter";
    protected $isCacheHeader=true;
    protected $isCacheBody=true;
    protected $isCacheFooter=true;

     public function __construct(){
       $this->execMiddleware(); 
    }
    
public function execMiddleware():bool{
foreach ($this->middleware as $value) {
  if(method_exists($this,$value)){
 if (!call_user_func(array($this,$value))){
      throw new \Exception("Erreur dans le middelware ".$value);
    }
  }else {
     throw new \Exception(" middelware n'existe pas ".$value);
  }
   
}
return true;
} 

public function  View(){
$name=$this->getName();
$stringHeader="";
$stringBody="";
$stringFooter="";
$isCacheHeader=cache::ExistsHeadCache($name) && $this->isCacheHeader;
$isCacheBody=cache::ExistsBodyCache($name) && $this->isCacheBody;
$isCacheFooter=cache::ExistsFooterCache($name) && $this->isCacheFooter;
$data=$this->getData($isCacheHeader ,$isCacheBody,$isCacheFooter);
if($isCacheHeader){
$stringHeader=cache::getHeadCache($name);
}else{
  $viewHeader=call_user_func(array($this,$this->nameFacHeader),$data==null?null:$data->getDataHeader());
   $viewHeader->Convert();
   $stringHeader=$viewHeader->toString();
  cache::createHeadCache($name,$stringHeader,$this->isCacheHeader);
}


if($isCacheBody){
$stringBody=cache::getBodyCache($name);
}else{
  $viewBody=call_user_func(array($this,$this->nameFacBody),$data==null?null:$data->getDataBody());
   $viewBody->Convert();
   $stringBody=$viewBody->toString();
  cache::createBodyCache($name,$stringBody,$this->isCacheBody);
}

if($isCacheFooter){
 $stringFooter=cache::getFooterCache($name);
}else{
  $viewFooter=call_user_func(array($this,$this->nameFacFooter),$data==null?null:$data->getDataFooter());
  $viewFooter->Convert();
   $stringFooter=$viewFooter->toString();
  cache::createFooterCache($name,$stringFooter,$this->isCacheFooter);
}

return $stringHeader."\n".$stringBody."\n".$stringFooter;
}
public  function viewHeader($data){}
public  function viewBody($data){}
public  function viewFooter($data){}
protected  function getData($isCacheHeader,$isCacheBody,$isCacheFooter){
  return new base\dataView();
}
protected  function getName(){}
}