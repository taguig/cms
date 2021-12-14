<?php
class viewCss implements Iview {
     private $data;
    private $name;
    private $filter=[];
    public function  __construct($name,$data=null){
      $this->name=$name;
      $this->data=$data;
      $this->init();
    }
    private function init(){
    $this->filter("value","Convert");
    }
    public function getData(){
        return $this->data;
    }
     public function getName(){
        return $this->name;
    }
      public function filter($name, $func){
         $this->filter[$name]=$func;
    }
     public function callFunc(&$code,$data=null,$func=null){
         $arrayFunc=($func==null)?$this->filter:$func; 
           foreach($arrayFunc as $key=>$func){
              call_user_func_array($key."::".$func,array(&$code,$this,$data));
           }
    }
     public function Convert(){
        $code="";
        if(file_exists("../resource/css/viewCss/".$this->name.".cssview")){
           $code=file_get_contents("../resource/css/viewCss/".$this->name.".cssview");
              $this->callFunc($code,$this->getData(),$this->filter);
            $this->dataView=$code;
        }else {
            throw new \Exception("la cssview ".$this->name." est introuvable");
        }
    }
      public function toString(){
        return $this->dataView;
    }
}