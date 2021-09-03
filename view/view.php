<?php 
class view {
    private $dataView;
    private $data;
    private $name;
    private $filter=[];
    public function  __construct($name,$data=null){
      $this->name=$name;
      $this->data=$data;
      $this->init();
    }
    private  function init(){
        $this->filter("loop","Convert");
        $this->filter("permission","Convert");
        $this->filter("composion","Convert");
        $this->filter("lang","Convert");
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
        if(file_exists("view/pageview/".$this->name.".view")){
            $arrayFuncdelete=func_get_args();
            $arrayFunc= (new ArrayObject($this->filter))->getArrayCopy();
            $this->deletFun($arrayFunc,$arrayFuncdelete);
           $code=file_get_contents("view/pageview/".$this->name.".view");
              $this->callFunc($code,$this->getData(),$arrayFunc);
            $this->dataView=$code;
        }else {
            throw new Exception("la view ".$this->name." est introuvable");
        }
    }
    public function toString(){
        return $this->dataView;
    }
    function deletFun(&$af,$ad){
        foreach($ad as $val){
            if (isset($ad[$val])){
                unset($ad[$val]);
            }
        }

    }
    
  
   
      
}