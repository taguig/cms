<?php
class dbmodel
{
    protected $perm;
    public function __construct()
    {
        $this->perm = new dbpermission(__CLASS__);
        $this->initPerm();
    }
    private  function initPerm()
    {
    }
    public function callFunction(string $nameFunc, ...$arg)
    {
        if (method_exists($this, $nameFunc)) {
            if ($this->perm->hasPerm($nameFunc, __CLASS__)) {
                call_user_func_array(array($this, $nameFunc), $arg);
            }
        }
    }
}
