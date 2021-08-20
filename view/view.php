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
           $this->ConvertPermision($code);
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
           $code=preg_replace("\{% ".$key." %\}", $value,$code);  
           }
    }
    private function ConvertComposion(&$code){
        composion::getComposonCode($code,$this->data);
    }
       private  function ConvertPermision (&$code){
      $out=[];
      $permission=http::getInstance()->getTypeUser();
       preg_match_all("\{%user:(a|v|u)%\}((.|\n)*?)\{%enduser%\}",$code,$out,PREG_SET_ORDER);
       foreach($out as $o){
       if ($o[1]=='v'&& $o[1]==$permission ){
          $code=preg_replace("\{%user:v%\}((.|\n)*?)\{%enduser%\}", $o[2],$code);
          $code=preg_replace("\{%user:a%\}((.|\n)*?)\{%enduser%\}", "",$code);
          $code=preg_replace("\{%user:u%\}((.|\n)*?)\{%enduser%\}", "",$code);
       }else if($o[1]=='a' && $o[1]==$permission ){
           $code=preg_replace("\{%user:a%\}((.|\n)*?)\{%enduser%\}", $o[2],$code);
          $code=preg_replace("\{%user:v%\}((.|\n)*?)\{%enduser%\}", "",$code);
          $code=preg_replace("\{%user:u%\}((.|\n)*?)\{%enduser%\}", "",$code);
       }else if($o[1]=='u'&& $o[1]==$permission ){
          $code=preg_replace("\{%user:u%\}((.|\n)*?)\{%enduser%\}", $o[2],$code);
          $code=preg_replace("\{%user:v%\}((.|\n)*?)\{%enduser%\}", "",$code);
          $code=preg_replace("\{%user:a%\}((.|\n)*?)\{%enduser%\}", "",$code);

       }
        }
     }
}