<?php
class pageCss {
    private $name;
    private $refAdresse;
   public function __construct(){
       $http=http::getInstance();
      $this->name= $http->getParam("css");
      $this->refAdresse= $http->getRefairenceAdresse();
   }
    public function view (){
     $data=$this->getData();
     

    }
   protected  function getData():array{
    return null;
   }
}

?>