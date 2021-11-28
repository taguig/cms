<?php
class pageJs {
    private $name;
    private $page;
    
   public function __construct(){
       $http=http::getInstance();
      $this->name= $http->getParam("name");
      $this->page= $http->getParam("page");
      
   }
    public function view ():string{
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