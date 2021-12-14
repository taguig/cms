<?php
namespace base;
class pageJs {
    private $name;
    private $page;
    private $type;
    
   public function __construct(){
       $http=base\http::getInstance();
      $this->name= $http->getParam("name");
      $this->page= $http->getParam("page");
      $this->type= $http->getParam("type");
   }
    public function view ():string{
        if($this->type=="s"){
        return file_get_contents("resource/js/simplejs/".$this->name.".js");    
        }
     $viewCss="";
     if (base\cacheJs::ExistCacheJS($this->page.".".$this->name)){
         $viewCss=base\cacheJs::getCacheJS($this->page.".".$this->name);
     }else {
         $data=$this->getData();
         $view=new base\viewJs($this->name,$data);
         $view->Convert();
         $viewCss=$view->toString();
         base\cacheJs::createCacheJS($this->page.".".$this->name,$viewCss,true);
     }
        
       return $viewCss;
    }
   protected  function getData():array{
    return [];
   }
}

?>