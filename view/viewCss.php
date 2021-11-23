<?php
class viewCss {
     private $data;
    private $name;
    private $filter=[];
    public function  __construct($name,$data=null){
      $this->name=$name;
      $this->data=$data;
      $this->init();
    }
    private function init(){

    }
      public function filter($name, $func){
         $this->filter[$name]=$func;
    }
}