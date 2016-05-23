SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `fatecmarilia_laravel` ;
CREATE SCHEMA IF NOT EXISTS `fatecmarilia_laravel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `fatecmarilia_laravel` ;

-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`users` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `plainPassword` VARCHAR(30) NULL,
  `remember_token` VARCHAR(100) NULL,
  `active` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`noticias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`noticias` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`noticias` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL COMMENT 'tiutulo da noticia ou destaque\n',
  `conteudo` LONGTEXT NOT NULL COMMENT 'texto da noticia',
  `conteudo_destaque` TEXT NOT NULL COMMENT 'texto da area de destaque\n',
  `imagem` VARCHAR(45) NULL COMMENT 'caminho imagem grande',
  `imagem_thumb` VARCHAR(45) NULL COMMENT 'caminho imagem pequena',
  `url_redirect` VARCHAR(255) NULL COMMENT 'se for destaque url de redirecionamento',
  `data_publicacao` DATE NOT NULL COMMENT 'data da publicacao que podera ser uma data futura',
  `data_expiracao` DATE NULL,
  `tipo` CHAR(1) NULL COMMENT 'tipo D ou N, destaque ou noticia',
  `flag_publicado` TINYINT(1) NOT NULL COMMENT 'exibe somente se publicado estiver como true',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_noticias_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_noticias_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`foto_noticias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`foto_noticias` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`foto_noticias` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_arquivo` VARCHAR(45) NOT NULL,
  `id_noticias` INT UNSIGNED NOT NULL,
  `tamanho` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_album_foto_noticias_noticias_idx` (`id_noticias` ASC),
  CONSTRAINT `fk_album_foto_noticias_noticias`
    FOREIGN KEY (`id_noticias`)
    REFERENCES `fatecmarilia_laravel`.`noticias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`tipos` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`tipos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(150) NOT NULL COMMENT 'Graduação Superior, Pós-Graduação',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`cursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`cursos` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`cursos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `carga_horaria` INT NULL,
  `duracao` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `tipos_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cursos_tipos1_idx` (`tipos_id` ASC),
  CONSTRAINT `fk_cursos_tipos1`
    FOREIGN KEY (`tipos_id`)
    REFERENCES `fatecmarilia_laravel`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`paginas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`paginas` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`paginas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo_destaque` VARCHAR(255) NOT NULL,
  `conteudo` LONGTEXT NOT NULL COMMENT 'conteudo da página',
  `imagem_capa` VARCHAR(45) NULL COMMENT 'imagem principal da página',
  `sigla_pagina` VARCHAR(45) NOT NULL COMMENT 'tipo de parametro da pagina, uma silga de identificacao : instituicao: INST, alimentos : ALIM, gestaoead: GESTEAD, etc',
  `flag_exibicao` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_paginas_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_paginas_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`categoria_downloads`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`categoria_downloads` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`categoria_downloads` (
  `id` INT UNSIGNED NOT NULL,
  `descricao` VARCHAR(150) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`downloads`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`downloads` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`downloads` (
  `id` INT UNSIGNED NOT NULL,
  `id_categoria_downloads` INT UNSIGNED NOT NULL,
  `nome_hash` VARCHAR(45) NULL COMMENT 'nome em hash',
  `descricao` TEXT NULL COMMENT 'descrição do arquivo',
  `tamanho` INT NULL,
  `flag_exibicao` TINYINT(1) NOT NULL COMMENT 'exibe ou não o arquivo',
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_downloads_categoria_downloads1_idx` (`id_categoria_downloads` ASC),
  CONSTRAINT `fk_downloads_categoria_downloads1`
    FOREIGN KEY (`id_categoria_downloads`)
    REFERENCES `fatecmarilia_laravel`.`categoria_downloads` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`pagina_downloads`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`pagina_downloads` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`pagina_downloads` (
  `id_paginas` INT UNSIGNED NOT NULL,
  `id_downloads` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_paginas`, `id_downloads`),
  INDEX `fk_paginas_has_downloads_downloads1_idx` (`id_downloads` ASC),
  INDEX `fk_paginas_has_downloads_paginas1_idx` (`id_paginas` ASC),
  CONSTRAINT `fk_paginas_has_downloads_paginas1`
    FOREIGN KEY (`id_paginas`)
    REFERENCES `fatecmarilia_laravel`.`paginas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paginas_has_downloads_downloads1`
    FOREIGN KEY (`id_downloads`)
    REFERENCES `fatecmarilia_laravel`.`downloads` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`grades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`grades` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`grades` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo_siga` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`disciplinas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`disciplinas` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`disciplinas` (
  `id` INT NOT NULL,
  `id_cursos` INT UNSIGNED NOT NULL,
  `id_grades` INT UNSIGNED NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `carga_horaria` INT NULL,
  `semestre` INT NOT NULL,
  `codigo_siga` VARCHAR(10) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_disciplinas_cursos1_idx` (`id_cursos` ASC),
  INDEX `fk_disciplinas_grades1_idx` (`id_grades` ASC),
  UNIQUE INDEX `codigo_siga_UNIQUE` (`codigo_siga` ASC),
  CONSTRAINT `fk_disciplinas_cursos1`
    FOREIGN KEY (`id_cursos`)
    REFERENCES `fatecmarilia_laravel`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplinas_grades1`
    FOREIGN KEY (`id_grades`)
    REFERENCES `fatecmarilia_laravel`.`grades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`agendas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`agendas` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`agendas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `dias_antecedencia` INT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`agendamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`agendamentos` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`agendamentos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `termo` INT NOT NULL,
  `turno` CHAR(1) NOT NULL COMMENT 'M - Manha\nN - Noite',
  `aula1` TINYINT(1) NULL,
  `aula2` TINYINT(1) NULL,
  `aula3` TINYINT(1) NULL,
  `aula4` TINYINT(1) NULL,
  `aula5` TINYINT(1) NULL,
  `horarioInicial` TIME NULL,
  `horarioFinal` TIME NULL,
  `comentarios` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `agendas_id` INT UNSIGNED NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_agendamentos_agendas1_idx` (`agendas_id` ASC),
  INDEX `fk_agendamentos_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_agendamentos_agendas1`
    FOREIGN KEY (`agendas_id`)
    REFERENCES `fatecmarilia_laravel`.`agendas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendamentos_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`docentes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`docentes` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`docentes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `titulacao` VARCHAR(45) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `ulr_lattes` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_docentes_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_docentes_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`empresas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`empresas` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`empresas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_empresa` VARCHAR(100) NOT NULL,
  `email_contato` VARCHAR(150) NULL,
  `responsavel_contato` VARCHAR(150) NULL,
  `telefone` VARCHAR(15) NULL,
  `observacao` VARCHAR(150) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`vaga_estagios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`vaga_estagios` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`vaga_estagios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_empresas` INT UNSIGNED NOT NULL,
  `descricao` LONGTEXT NULL,
  `conteudo` LONGTEXT NULL,
  `data_cadastro` DATETIME NULL,
  `codigo_vaga` VARCHAR(10) NULL,
  `email_contato` VARCHAR(150) NULL,
  `mostra_email_contato` CHAR(1) NULL,
  `data_expiracao` DATE NULL,
  `users_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vaga_estagios_empresas1_idx` (`id_empresas` ASC),
  INDEX `fk_vaga_estagios_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_vaga_estagios_empresas1`
    FOREIGN KEY (`id_empresas`)
    REFERENCES `fatecmarilia_laravel`.`empresas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vaga_estagios_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`roles` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`permissions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`permissions` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`permissions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`nota_rapidas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`nota_rapidas` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`nota_rapidas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nota` VARCHAR(255) NOT NULL,
  `users_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_nota_rapidas_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_nota_rapidas_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`disciplinas_docentes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`disciplinas_docentes` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`disciplinas_docentes` (
  `disciplinas_id` INT NOT NULL,
  `docentes_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`disciplinas_id`, `docentes_id`),
  INDEX `fk_disciplinas_has_docentes_docentes1_idx` (`docentes_id` ASC),
  INDEX `fk_disciplinas_has_docentes_disciplinas1_idx` (`disciplinas_id` ASC),
  CONSTRAINT `fk_disciplinas_has_docentes_disciplinas1`
    FOREIGN KEY (`disciplinas_id`)
    REFERENCES `fatecmarilia_laravel`.`disciplinas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplinas_has_docentes_docentes1`
    FOREIGN KEY (`docentes_id`)
    REFERENCES `fatecmarilia_laravel`.`docentes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`material_aulas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`material_aulas` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`material_aulas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `categorias_id` INT UNSIGNED NOT NULL,
  `nome_original` VARCHAR(255) NOT NULL,
  `nome_hash` VARCHAR(45) NOT NULL,
  `tamanho` INT NOT NULL,
  `disciplinas_id` INT NOT NULL,
  `docentes_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_material_aulas_disciplinas_docentes1_idx` (`disciplinas_id` ASC, `docentes_id` ASC),
  CONSTRAINT `fk_material_aulas_disciplinas_docentes1`
    FOREIGN KEY (`disciplinas_id` , `docentes_id`)
    REFERENCES `fatecmarilia_laravel`.`disciplinas_docentes` (`disciplinas_id` , `docentes_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`role_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`role_user` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`role_user` (
  `users_id` INT UNSIGNED NOT NULL,
  `roles_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`users_id`, `roles_id`),
  INDEX `fk_users_has_roles_roles1_idx` (`roles_id` ASC),
  INDEX `fk_users_has_roles_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_roles_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_roles_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `fatecmarilia_laravel`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`permission_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`permission_role` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`permission_role` (
  `roles_id` INT UNSIGNED NOT NULL,
  `permissions_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`roles_id`, `permissions_id`),
  INDEX `fk_roles_has_permissions_permissions1_idx` (`permissions_id` ASC),
  INDEX `fk_roles_has_permissions_roles1_idx` (`roles_id` ASC),
  CONSTRAINT `fk_roles_has_permissions_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `fatecmarilia_laravel`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_permissions_permissions1`
    FOREIGN KEY (`permissions_id`)
    REFERENCES `fatecmarilia_laravel`.`permissions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`downloads_noticias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`downloads_noticias` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`downloads_noticias` (
  `downloads_id` INT UNSIGNED NOT NULL,
  `noticias_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`downloads_id`, `noticias_id`),
  INDEX `fk_downloads_has_noticias_noticias1_idx` (`noticias_id` ASC),
  INDEX `fk_downloads_has_noticias_downloads1_idx` (`downloads_id` ASC),
  CONSTRAINT `fk_downloads_has_noticias_downloads1`
    FOREIGN KEY (`downloads_id`)
    REFERENCES `fatecmarilia_laravel`.`downloads` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_downloads_has_noticias_noticias1`
    FOREIGN KEY (`noticias_id`)
    REFERENCES `fatecmarilia_laravel`.`noticias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fatecmarilia_laravel`.`logs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fatecmarilia_laravel`.`logs` ;

CREATE TABLE IF NOT EXISTS `fatecmarilia_laravel`.`logs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `operacao` VARCHAR(6) NOT NULL,
  `tabela` VARCHAR(45) NOT NULL,
  `descricao` TEXT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_logs_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_logs_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `fatecmarilia_laravel`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
