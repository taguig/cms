<?php 
class view {
    private $data;
    public function  __construct($name,$data=null){
       if(file_exists("view/pageView/".$name.".php")){
           extract($data);
           ob_start();
           require ("view/pageView/".$name.".php");
           $this->data=ob_get_contents();
           ob_end_clean(); 
           
       }else {
           throw new Exception("le ficher n'exite pas ".$name);
       }
    }
    public function toString(){
        return $this->data;
    }
}