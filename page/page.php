<?php
abstract class page {

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
if(cache::ExistsHeadCache($name) && $this->isCacheHeader){
$viewHeader=cache::getHeadCache($name);
}else{
  $viewHeader=call_user_func(array($this,$this->viewHeader),$data->getDataHeader())->toString();
  cache::createHeadCache($name,$viewHeader);
}


if(cache::ExistsBodyCache($name) && $this->isCacheBody){
$viewBody=cache::getBodyCache($name);
}else{
  $viewBody=call_user_func(array($this,$this->viewBody),$data->getDataBody())->toString();
  cache::createBodyCache($name,$viewBody);
}

if(cache::ExistsFooterCache($name) && $this->isCacheFooter){
 $viewFooter=cache::getFooterCache($name);
}else{
  $viewFooter=call_user_func(array($this,$this->viewFooter),$data->getDataFooter())->toString();
  cache::createFooterCache($name,$viewFooter);
}

return $viewHeader."\n".$viewBody."\n".$viewFooter;
}
public abstract function viewHeader($data);
public abstract function viewBody($data);
public abstract function viewFooter($data);
public abstract function getData();
}