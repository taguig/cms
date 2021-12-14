<?php
namespace base;
class dataView {
private $dataHeader=[];
private $dataBody=[];
private $dataFooter=[];
public function getDataHeader(){
    return $this->dataHeader;
}
public function getDataBody(){
    return $this->dataBody;
}
public function getDataFooter(){
    return $this->dataFooter;
}

public function setDataHeader($data){
    $this->dataHeader=$data;
}

public function setDataBody($data){
    $this->dataBody=$data;
}

public function setDataFooter($data){
    $this->dataFooter=$data;
}
public function addBody($name,$data){
    $this->dataBody[$name]=$data;
}

public function addHeader($name,$data){
    $this->dataHeader[$name]=$data;
}

public function addFooter($name,$data){
    $this->dataFooter[$name]=$data;
}
}