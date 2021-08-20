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
           $code=file_get_contents("/view/pageview/".$this->name.".view");
           $this->ConvertValue($code);
           $this->ConvertComposion($code);
        }else {
            throw new Exception("la view ".$this->name." est introuvable");
        }
    }
    public function toString(){
        return $this->dataView;
    }
    private function ConvertValue(&$code){
  foreach($this->data as $key->$value ){
           $code=preg_replace("\{([\s]+)?".$key."([\s]+)?\}", $value,$code);  
           }
    }
    private function ConvertComposion(&$code){
        composion::getComposonCode($code,$this->data);
    }
}