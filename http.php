<?php 
include "page/page/index.php";
class http {

private $param = [];
private static $instance=null;
private $ExtentionImage="png|jpg|jpeg|gif";
private $ExtentionDoc="doc|docs|pdf|xls";
private $ExtentionCss="css";
private $ExtentionJs="js";
private $ExtentionAjax="ajax";
private $adressePage = [];
private $typeUser="v";
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
           echo "ajax";
         return ;
        }else if($this->valideteExtention($this->ExtentionCss)){
           echo "css";
         return ;
        }else if($this->valideteExtention($this->ExtentionJs)){
          echo "js";
        return ;
        }else {
          $doc=new index();
         echo $doc->View();
        return ;
        }
    }
    private function valideteExtention($Extention){
       return preg_match('/\.(?:'.$Extention.')$/', $_SERVER["REQUEST_URI"]);
    }
  public function setParam($name, $value)
    {
        $this->param[$name] = $value;
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
}


?>