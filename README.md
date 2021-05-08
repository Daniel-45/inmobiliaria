# Bienes Raíces

Aplicación web para una inmobiliaria.

En el directorio del proyecto ejecutar los comandos `composer install` y `npm install`

## Usuario para probar la aplicación

usuario: daniel.pompa@gmail.com

contraseña: usertar

## Requisitos

Es necesario tener instalado:

* Cualquier editor como [Atom](https://atom.io/), [Sublime Text](https://www.sublimetext.com/), [VSCode](https://code.visualstudio.com/), o cualquier otro editor/IDE

* [PHP](https://www.php.net/downloads.php)

* [Laragon](https://laragon.org/) o [Xampp](https://www.apachefriends.org/es/index.html)

* [NodeJS](https://nodejs.org/es/)

* [Composer](https://getcomposer.org/)

# Base de datos

```
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema inmobiliaria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inmobiliaria` DEFAULT CHARACTER SET utf8 ;
USE `inmobiliaria` ;

-- -----------------------------------------------------
-- Table `inmobiliaria`.`vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`vendedores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `telefono` VARCHAR(10) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inmobiliaria`.`propiedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`propiedades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(60) NULL,
  `precio` DECIMAL(10,2) NULL,
  `imagen` VARCHAR(200) NULL,
  `descripcion` LONGTEXT NULL,
  `dormitorios` INT(2) NULL,
  `wc` INT(1) NULL,
  `estacionamiento` INT(1) NULL,
  `creado` DATE NULL,
  `id_vendedor` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `FKi_d_vendedor_idx` (`id_vendedor` ASC),
  CONSTRAINT `FK_id_vendedor`
    FOREIGN KEY (`id_vendedor`)
    REFERENCES `inmobiliaria`.`vendedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `inmobiliaria`.`vendedores`
-- -----------------------------------------------------
START TRANSACTION;
USE `inmobiliaria`;
INSERT INTO `inmobiliaria`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (1, 'Oscar', 'Diaz', '656259873');
INSERT INTO `inmobiliaria`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (2, 'Carmen', 'Sanz', '652963654');
INSERT INTO `inmobiliaria`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (3, 'Ana', 'Fernández', '678908724');

COMMIT;
```

```
CREATE TABLE IF NOT EXISTS `inmobiliaria`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NULL,
  `password` CHAR(60) NULL,
  PRIMARY KEY (`id`));

INSERT INTO usuarios (email, password) VALUES ('daniel.pompa@gmail.com', '$2y$10$MfARg9r3c930TmFyppNXvOSAWHcMTCaOznvQJaxS8WmxFG2XjtZbS');
```