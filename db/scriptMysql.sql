CREATE TABLE `ecommerce`.`utilisateur` 
( `id` INT NOT NULL AUTO_INCREMENT , `nom` VARCHAR(255) NOT NULL ,
 `prenom` VARCHAR(255) NOT NULL , `motpasse` VARCHAR(255) NOT NULL , 
 `email` VARCHAR(45) NOT NULL , `tel` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`id`)) ENGINE = MyISAM;

  CREATE TABLE `ecommerce`.`produit` 
  ( `id` INT NOT NULL AUTO_INCREMENT ,
   `nom` VARCHAR(255) NOT NULL , 
   `codeBare` VARCHAR(45) NOT NULL ,
    `description` TEXT NOT NULL , 
    `idcategorie` INT NOT NULL , 
    `idjaure` INT NOT NULL , 
    `idmarque` INT NOT NULL ,
     PRIMARY KEY (`id`)) ENGINE = MyISAM;

     CREATE TABLE `ecommerce`.`vente` ( `id` BIGINT NOT NULL , 
     `idproduit` INT NOT NULL , `iduser` INT NOT NULL DEFAULT '0' ,
      `qte` BIGINT NOT NULL , `prix` REAL NOT NULL ,
       `typeVente` INT(3) NOT NULL , 
     `dateVente` DATETIME NOT NULL ) ENGINE = MyISAM;

     CREATE TABLE `ecommerce`.`fournisseur` ( `id` INT NOT NULL AUTO_INCREMENT ,
      `nom` VARCHAR(45) NOT NULL , `prenom` VARCHAR(45) NOT NULL ,
       `tel` VARCHAR(15) NOT NULL , `tel2` VARCHAR(15) NOT NULL ,
      `description` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;