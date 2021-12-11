<?php
abstract class  ajax {
private $data;
public function __construct(){
    $method=$_SERVER['REQUEST_METHOD'];
    $http=http::getInstance();
    $dataGet=$http->getAllParam();
    $dataPost=$_POST;
    switch($method){
        case 'GET':
         return GET($dataGet,$dataPost);
            break;
          case 'POST':
         return POST($dataGet,$dataPost);
            break;
          case 'DELETE':
         return DELETE($dataGet,$dataPost);
            break;
          case 'PUT':
         return PUT($dataGet,$dataPost);
            break;
    }
}
protected function send($data){
    $this->data=$data;
}
public function getData(){
  return $this->data;
}
abstract public function GET($data,$post);
abstract public function POST($data,$post);
abstract public function DELETE($data,$post);
abstract public function PUT($data,$post);
}