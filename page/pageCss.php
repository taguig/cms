<?php
class pageCss {
    private $name;
    private $page;
    
   public function __construct(){
       $http=http::getInstance();
      $this->name= $http->getParam("name");
      $this->page= $http->getParam("page");
      
   }
    public function view ():string{
     $viewCss="";
     if (cacheCss::ExistCacheCSS($this->page."/".$this->name)){
         $viewCss=cacheCss::getCacheCSS($this->page."/".$this->name);
     }else {
         $data=$this->getData();
         $view=new viewCss($this->name,$data);
         $view->Convert();
         $viewCss=$view->toString();
         cacheCss::createCacheCSS($this->page."/".$this->name,$viewCss,true);
     }
       return $viewCss;
    }
   protected  function getData():array{
    return null;
   }
}

?>