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
public abstract function viewHeader();
public abstract function viewBody();
public abstract function viewFooter();
}