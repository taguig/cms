<?php
class pageJs {
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
        return file_get_contents("resource/js/simplejs/".$this->name.".js");    
        }
     $viewCss="";
     if (cacheJs::ExistCacheJS($this->page.".".$this->name)){
         $viewCss=cacheJs::getCacheJS($this->page.".".$this->name);
     }else {
         $data=$this->getData();
         $view=new viewJs($this->name,$data);
         $view->Convert();
         $viewCss=$view->toString();
         cacheJs::createCacheJS($this->page.".".$this->name,$viewCss,true);
     }
        
       return $viewCss;
    }
   protected  function getData():array{
    return [];
   }
}

?>