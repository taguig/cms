<?php 

class http {

private $param = [];
private static $instance=null;
private $ExtentionImage="png|jpg|jpeg|gif";
private $ExtentionDoc="doc|docs|pdf|xls";
private $ExtentionCss="css";
private $ExtentionJs="js";
private $ExtentionAjax="ajax";
private $adressePage = [];
    private $typeUser = "v";
    private $lang = "fr";


private $contentTypeImage = [ 
        "png" => "image/png",
        "jpg"=>"image/jpeg"
    ];
private $ErrorPage=[
    '404'=>""
];

    private $contentTypeDoc = [ 
        "doc" => "",
        "docs"=>"" ,
        "pdf"=>"",
        "xls"=>""
    ];
   public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getLang()
    {
        return $this->lang;
    }
    public function setLang($lang)
    {
        if (strlen($lang) > 2) {
            throw new Exception("erreur dans laungue");
        } else {
            return $this->lang = $lang;
        }
    }
    public function getTypeUser(){
        return $this->typeUser;
    }
    public function setTypeUser($value){
        if(preg_match("/(v|u|a)/",$value)){
            $this->typeUser=$value;
        }else {
            throw new Exception("valeur non accepte");
        }
    }
    public function route(){
        if ($this->valideteExtention($this->ExtentionImage)) {
            echo "image";
        return ;
        }else if($this->valideteExtention($this->ExtentionDoc)){
           echo "doc";
         return ;
        }else if($this->valideteExtention($this->ExtentionAjax)){
          try {
                $this->ajaxPage();
            } catch (Exception $e) {
                echo "error";
            }
         return ;
        }else if($this->valideteExtention($this->ExtentionCss) ){
            header("Content-type: text/css", true);
           echo (new pageCss())->view();
           return;
        }else if($this->valideteExtention($this->ExtentionJs)){
       header("Content-Type: application/javascript", true);
           echo (new pageJs())->view();
        return ;
        }else {
            try {
                $this->Page();
            } catch (Exception $e) {
                echo "error";
            }

            return;
        }
    }

    private function ajaxPage(){
             try {
            if (empty($this->getParam("pAjax")) && $this->countDirAddresse() == 0) {
          $doc=new index();
            } else if (!empty($this->getParam("pAjax"))) {
                $docName = $this->getParam("pAjax");
                $doc = new $docName();
            } else {
                throw new Exception("404");
            }
          
         echo $doc->getData();
        } catch (Exception $e) {
            throw $e;
        }
    }
    private function Page()
    {
        try {
            if (empty($this->getParam("p")) && $this->countDirAddresse() == 0) {
          $doc=new index();
            } else if (!empty($this->getParam("p"))) {
                $docName = $this->getParam("p");
                $doc = new $docName();
            } else {
                throw new Exception("404");
            }
          
         echo $doc->View();
        } catch (Exception $e) {
            throw $e;
        }
    }
    private function valideteExtention($Extention){
       return preg_match('/\.(?:'.$Extention.')$/', $_SERVER["REQUEST_URI"]);
    }
  public function setParam($name, $value)
    {
        $this->param[$name] = $value;
    }
    public function getParam($name)
    {
        if (isset($this->param[$name])) {
            return $this->param[$name];
        }
        return null;
    }
    public function getAllParam(){
        return $this->param;
    }
    private function countDirAddresse()
    {
        return count($this->adressePage);
    }
     public function extracteData()
    {
        $data = explode("/", $_SERVER["REQUEST_URI"]);
        array_map(function ($a) {
            if (stripos($a, "-") != false && stripos($a, ".") == false) {
                $tempdata = explode("-", $a);
                $this->setParam($tempdata[0], $tempdata[1]);
            } else if (!empty($a)) {
                $this->setAdressePage($a);
            }
        }, $data);
    }

       private function setAdressePage($val)
    {
        $this->adressePage[] = $val;
    }


    public function getAdressePage($i)
    {
        return $this->adressePage[$i];
    }

    public function GetValue($key)
    {
        if (isset($_GET[$key]) && ! empty($_GET[$key])) {
            return $_GET[$key];
        }
        return false;
    }

    public function PostValue($key)
    {
        if (isset($_POST[$key]) && ! empty($_POST[$key])) {
            return $_POST[$key];
        }
        return false;
    }
    public static function startSession(){
         session_start();
    }
    public static function getRefairenceAdresse(){
       return $_SERVER["HTTP_REFERER"];
    }
}


?>