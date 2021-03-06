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

ALTER TABLE `vente` ADD `idachat` BIGINT NOT NULL AFTER `dateVente`;

   CREATE TABLE  `ecommerce`.`stock` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `id_achat` bigint(20) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `ecommerce`.`fournisseur` ( `id` INT NOT NULL AUTO_INCREMENT 
, `nom` VARCHAR(25) NOT NULL , `prenom` VARCHAR(25) NOT NULL ,
 `tel` VARCHAR(30) NOT NULL , `tel2` VARCHAR(30) NOT NULL 
 , `facebook` VARCHAR(255) NOT NULL , `payer` VARCHAR(255) NOT NULL , 
`adresse` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = MyISAM;

ALTER TABLE `achat` ADD `taille` INT NOT NULL AFTER `idfounisseur`;

CREATE TABLE `ecommerce`.`prixPoduit`
 ( `id` BIGINT NOT NULL AUTO_INCREMENT , `id_achat` BIGINT NOT NULL ,
  `prixVente` BIGINT NOT NULL , `typePrix` INT NOT NULL , PRIMARY KEY (`id`)) 
  ENGINE = MyISAM;

CREATE TABLE IF NOT EXISTS `imageproduit` (
  `idImage` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `idProduit` bigint(20) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;