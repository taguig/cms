<?php
class admin extends page {

    public function __construct(){
        $this->isCacheHeader=false;
        $this->isCacheBody=false;
        $this->isCacheFooter=false;
    }
}