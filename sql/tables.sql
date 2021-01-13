-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 10.5.1.101:3306
-- Tempo de geração: 13/01/2021 às 14:26
-- Versão do servidor: 10.4.12-MariaDB
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u819903730_anima`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastrousuario`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat`
--

CREATE TABLE `chat` (
  `hora` datetime DEFAULT NULL,
  `host` int(9) DEFAULT NULL,
  `passageiro` int(9) DEFAULT NULL,
  `mensagem` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historicochat`
--

CREATE TABLE `historicochat` (
  `hora` datetime DEFAULT NULL,
  `host` int(9) DEFAULT NULL,
  `passageiro` int(9) DEFAULT NULL,
  `mensagem` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historicotransportes`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `transportesemcurso`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cadastrousuario`
--
ALTER TABLE `cadastrousuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`nomecompleto`);

--
-- Índices de tabela `ci_session`
--
ALTER TABLE `ci_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Índices de tabela `transportesemcurso`
--
ALTER TABLE `transportesemcurso`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cadastrousuario`
--
ALTER TABLE `cadastrousuario`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transportesemcurso`
--
ALTER TABLE `transportesemcurso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
