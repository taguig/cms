<?php
class ModelPoduit extends dbmodel
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function initPerm()
    {
         $this->addPrem("getProduit", "u","v","a");
    }
  protected function getProduit($id){
      if(!empty($id)){
        return dbquery::query("select *  from stock left join produit on produit.id=stock.id_produit  where produit.id=:id",["id"=>$id]);       
      }
      return [];
      
  }
}