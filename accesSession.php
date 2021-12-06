<?php
class accesSession {
    private static  $Session;
    public function __construct(){
    }
    public function getInstance() {
     if(self::$Session==null){
         self::$Session=new self();
     }
     return self::$Session;
    }
    public function setValue($key,$value){
      if(isset($_SESSION[$key])){
        $_SESSION[$key]=$value;
        return true;  
      }else {
    $_SESSION[$key]=$value;
       return false;
      }
      
    }
    public function setValueObject($key,$value){
        if(isset($_SESSION[$key])){
        $_SESSION[$key]=serialize($value);
        return true;  
      }else {
    $_SESSION[$key]=serialize($value);
       return false;
      }  
    }
    public function getValue($key,&$value){
      if (isset($_SESSION[$key])){
         $value=$_SESSION[$key];
         return true;
      }
      return false;
    }
      public function getValueObject($key,&$value){
      if (isset($_SESSION[$key])){
         $value=unserialize($_SESSION[$key]);
         return true;
      }
      return false;
    }
}