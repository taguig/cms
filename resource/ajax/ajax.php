<?php
namespace base;
abstract class  ajax {
private $data;
public function __construct(){
    $method=$_SERVER['REQUEST_METHOD'];
    $http=base\http::getInstance();
    $dataGet=$http->getAllParam();
    $dataPost=$_POST;
    switch($method){
        case 'GET':
         return GET($dataGet);
            break;
          case 'POST':
         return POST($dataPost);
            break;
          case 'DELETE':
         return DELETE($dataGet);
            break;
          case 'PUT':
         return PUT($dataGet);
            break;
    }
}
protected function send($data){
    $this->data=$data;
}
public function getData(){
  return $this->data;
}
abstract public function GET($data);
abstract public function POST($data);
abstract public function DELETE($data);
abstract public function PUT($data);
}