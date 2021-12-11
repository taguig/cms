<?php
class pageCss {
    private $name;
    private $page;
    private $type;
    
   public function __construct(){
       $http=http::getInstance();
      $this->name= $http->getParam("name");
      $this->page= $http->getParam("page");
      $this->type= $http->getParam("type");
      
   }
    public function view ():string{
         if($this->type=="s"){
        return file_get_contents("resource/css/simplecss/".$this->name.".css");    
        }
     $viewCss="";
     if (cacheCss::ExistCacheCSS($this->page.".".$this->name)){
         $viewCss=cacheCss::getCacheCSS($this->page.".".$this->name);
     }else {
         $data=$this->getData();
         $view=new viewCss($this->name,$data);
         $view->Convert();
         $viewCss=$view->toString();
         cacheCss::createCacheCSS($this->page.".".$this->name,$viewCss,true);
     }
        
       return $viewCss;
    }
   protected  function getData():array{
    return [];
   }
}

?>