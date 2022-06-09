CREATE TABLE `gestor`.`tbl_archivos` (
	`id_archivo` INT NOT NULL AUTO_INCREMENT,
    `id_categoria` INT NULL,
    `nombre` VARCHAR(255) NULL,
    `tipo` VARCHAR(255) NULL,
    `ruta` TEXT NULL,
    `fecha` DATETIME NOT NULL DEFAULT now(),
	PRIMARY KEY(`id_archivo`));




ALTER TABLE `gestor`.`tbl_archivos` 
ADD INDEX `fkArchivosCategorias_idx` (`id_categoria` ASC);

ALTER TABLE `gestor`.`tbl_archivos`
ADD CONSTRAINT `fkArchivosCategorias`
FOREIGN KEY (`id_categoria`)
REFERENCES `gestor`.`tbl_categorias`(`id_categoria`)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE `gestor`.`tbl_archivos`
ADD COLUMN `id_usuario` INT NOT NULL AFTER `id_archivo`;

ALTER TABLE `gestor`.`tbl_archivos`
ADD INDEX `fkUsuariosArchivos_idx` (`id_usuario` ASC);

ALTER TABLE `gestor`.`tbl_archivos`
ADD CONSTRAINT `fkUsuariosArchivos`
FOREIGN KEY (`id_usuario`)
REFERENCES `gestor`.`tbl_usuarios`(`id_usuario`)
ON DELETE NO ACTION
ON UPDATE NO ACTION;




