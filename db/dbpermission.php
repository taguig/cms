<?php
class dbpermission
{
    private $perm = [];
    private $Model;
    public function __construct($nameModel)
    {
        $this->nameModel = $nameModel;
    }
    public function addPerm($nameFunc, ...$userType)
    {
        $this->perm[$nameFunc] = $userType;
        
    }
    public function hasPerm($nameFunc, $nameModel)
    {
       
        $perType = http::getInstance()->getTypeUser();
        if (isset($this->perm[$nameFunc])  && in_array($perType, $this->perm[$nameFunc]) && $this->nameModel === $nameModel) {
            return true;
        } else {
            return false;
        }
    }
}
