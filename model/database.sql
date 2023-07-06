-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_bytemanager
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_bytemanager` ;

-- -----------------------------------------------------
-- Schema db_bytemanager
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_bytemanager` DEFAULT CHARACTER SET utf8 ;
USE `db_bytemanager` ;

-- -----------------------------------------------------
-- Table `db_bytemanager`.`type_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_bytemanager`.`type_product` (
  `id_type` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_bytemanager`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_bytemanager`.`product` (
  `id_product` INT NOT NULL AUTO_INCREMENT,
  `name_product` VARCHAR(255) NOT NULL,
  `price_product` VARCHAR(255) NOT NULL,
  `quantity` VARCHAR(45) NOT NULL,
  `type_product_id_type` INT NOT NULL,
  `image_name` VARCHAR(255) NULL,
  PRIMARY KEY (`id_product`),
  INDEX `fk_product_type_product_idx` (`type_product_id_type` ASC) VISIBLE,
  CONSTRAINT `fk_product_type_product`
    FOREIGN KEY (`type_product_id_type`)
    REFERENCES `db_bytemanager`.`type_product` (`id_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_bytemanager`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_bytemanager`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `cli_name` VARCHAR(255) NOT NULL,
  `cnpj` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_bytemanager`.`orcamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_bytemanager`.`orcamento` (
  `id_orcamento` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `preco` VARCHAR(45) NULL,
  `product_id_product` INT NULL,
  `cliente_id_cliente` INT NOT NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`id_orcamento`),
  INDEX `fk_orcamento_product1_idx` (`product_id_product` ASC) VISIBLE,
  INDEX `fk_orcamento_cliente1_idx` (`cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_orcamento_product1`
    FOREIGN KEY (`product_id_product`)
    REFERENCES `db_bytemanager`.`product` (`id_product`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orcamento_cliente1`
    FOREIGN KEY (`cliente_id_cliente`)
    REFERENCES `db_bytemanager`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;