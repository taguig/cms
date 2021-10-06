<?php
class Muser extends dbmodel
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function initPerm()
    {
        // $this->addPrem("getEx", "u");
    }
    /* protected function getEx()
    {
        print_r(dbquery::query("SELECT * FROM utilisateurs"));
    }*/
}
