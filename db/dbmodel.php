<?php
namespace base;
class dbmodel
{
    protected $perm;
    public function __construct()
    {
        $this->perm = new base\dbpermission(__CLASS__);
        $this->initPerm();
    }
    protected function initPerm()
    {
    }
    protected  function addPrem($nameFunc, ...$userType)
    {
        $arg = array_merge(array($nameFunc), $userType);
        call_user_func_array(array($this->perm, "addPerm"), $arg);
    }

    protected function hasPerm($nameFunc)
    {
        if ($this->perm->hasPerm($nameFunc, __CLASS__)) {
            return true;
        } else {
            return false;
        }
    }

    public function callFunction(string $nameFunc, ...$arg)
    {
        if (method_exists($this, $nameFunc)) {
            if ($this->hasPerm($nameFunc)) {
                call_user_func_array(array($this, $nameFunc), $arg);
            }
        }
    }
}
