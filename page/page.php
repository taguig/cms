<?php
abstract class page {

    protected $middleware =[];
    private $nameFacHeader="viewHeader";
    private $nameFacBody="viewBody";
    private $nameFacFooter="viewFooter";

    
public function execMiddleware():bool{
foreach ($this->middleware as $value) {
    if (!call_user_func(array($this,$value))){
      throw new Exception("Erreur dans le middelware ".$value);
    }
}
return true;
} 

public function  View(){
$data=$this->getData();
$viewHeader=call_user_func(array($this,$this->viewHeader),$data);
$viewBody=call_user_func(array($this,$this->viewBody),$data);
$viewFooter=call_user_func(array($this,$this->viewFooter),$data);
return $viewHeader->toString()."\n".$viewBody->toString()."\n".$viewFooter->toString();
}
public abstract function viewHeader($data);
public abstract function viewBody($data);
public abstract function viewFooter($data);
public abstract function getData();
}