SET 
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET 
  AUTOCOMMIT = 0;
START TRANSACTION;
SET 
  time_zone = "+00:00";

CREATE TABLE `cadastrousuario` (
  `ID` int(255) NOT NULL, 
  `foto` longblob NOT NULL, 
  `nomecompleto` varchar(255) NOT NULL, 
  `senha` varchar(255) NOT NULL, 
  `matricula` varchar(255) NOT NULL, 
  `curso` varchar(200) DEFAULT NULL, 
  `especifica_curso` varchar(200) DEFAULT NULL, 
  `email` varchar(255) NOT NULL, 
  `logradouro` varchar(255) NOT NULL, 
  `cidade` varchar(300) DEFAULT NULL, 
  `bairro` varchar(300) DEFAULT NULL, 
  `numero` varchar(255) NOT NULL, 
  `complemento` varchar(255) NOT NULL, 
  `cep` varchar(255) NOT NULL, 
  `online` tinyint(1) NOT NULL, 
  `host` tinyint(1) NOT NULL, 
  `acompanhante` tinyint(1) NOT NULL, 
  `is_verified` tinyint(1) NOT NULL DEFAULT 0, 
  `hash` varchar(32) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `chat` (
  `hora` datetime DEFAULT NULL, 
  `host` int(9) DEFAULT NULL, 
  `passageiro` int(9) DEFAULT NULL, 
  `mensagem` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL, 
  `ip_address` varchar(45) NOT NULL, 
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0, 
  `data` blob NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `historicochat` (
  `hora` datetime DEFAULT NULL, 
  `host` int(9) DEFAULT NULL, 
  `passageiro` int(9) DEFAULT NULL, 
  `mensagem` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `historicotransportes` (
  `origem` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 
  `destino` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 
  `horario` datetime DEFAULT NULL, 
  `meiotransporte` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 
  `curso` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 
  `especifica_curso` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 
  `usuario` int(9) DEFAULT NULL, 
  `host` int(9) DEFAULT NULL, 
  `passageiro_de` int(9) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `transportesemcurso` (
  `ID` int(11) NOT NULL, 
  `origem` varchar(200) NOT NULL, 
  `destino` varchar(200) NOT NULL, 
  `horario` varchar(200) NOT NULL, 
  `meiotransporte` varchar(11) NOT NULL, 
  `usuario` varchar(240) NOT NULL, 
  `curso` varchar(300) DEFAULT NULL, 
  `especifica_curso` varchar(300) DEFAULT NULL, 
  `host` tinyint(1) NOT NULL, 
  `passageiro` int(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

ALTER TABLE 
  `cadastrousuario` 
ADD 
  PRIMARY KEY (`ID`), 
ADD 
  UNIQUE KEY `username` (`nomecompleto`);
ALTER TABLE 
  `ci_session` 
ADD 
  PRIMARY KEY (`id`), 
ADD 
  KEY `ci_sessions_timestamp` (`timestamp`);
ALTER TABLE 
  `transportesemcurso` 
ADD 
  PRIMARY KEY (`ID`);

ALTER TABLE 
  `cadastrousuario` MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE 
  `transportesemcurso` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;
