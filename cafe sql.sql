CREATE DATABASE portalzelatte;

CREATE TABLE `contato` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`mensagem` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`data_envio` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;


CREATE TABLE `produtos` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`descricao` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`mini_descri` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`titulo` VARCHAR(100) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=6
;


CREATE TABLE `usuario` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`usuario` VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
	`senha` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`data_cadastro` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE,
	UNIQUE INDEX `usuario` (`usuario`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5
;

CREATE TABLE `pagamentos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `produto_id` INT(11) NOT NULL,
    `produto_nome` VARCHAR(200) NOT NULL,
    `valor` DECIMAL(10,2) NOT NULL,
    `metodo` VARCHAR(50) NOT NULL,
    `status` VARCHAR(50) NOT NULL DEFAULT 'Aprovado',
    `data_pagamento` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`) USING BTREE
)
ENGINE=InnoDB
COLLATE='utf8mb4_general_ci';

