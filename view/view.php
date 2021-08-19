<?php 
class view {
    private $dataView;
    private $data;
    private $name;
    public function  __construct($name,$data=null){
      $this->name=$name;
      $this->data=$data;
    }
    public function Convert(){
        $code="";
        if(file_exists("/view/pageview/".$this->name.".view")){
                  
        }else {
            throw new Exception("la view ".$this->name." est introuvable");
        }
    }
    public function toString(){
        return $this->dataView;
    }
}