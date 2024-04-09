-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 06/03/2024 às 11:59
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `callcenter`
--
CREATE DATABASE IF NOT EXISTS `callcenter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `callcenter`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gcallcenter`
--

CREATE TABLE `gcallcenter` (
  `id` int NOT NULL,
  `member_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penalty` int DEFAULT NULL,
  `dynamic` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `calls_taken` int DEFAULT NULL,
  `last_call_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `member_description` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `gcallcenter`
--

INSERT INTO `gcallcenter` (`id`, `member_name`, `penalty`, `dynamic`, `status`, `calls_taken`, `last_call_time`, `member_description`) VALUES
(1, '7000', 1, 'Y', 'In use', 0, '2024-03-05 17:49:41', 'has taken no calls yet Chaves'),
(2, '7001', 1, 'Y', 'Ring', 0, '2024-03-05 17:49:58', 'as taken no calls yet Kiko'),
(3, '7002', 1, 'Y', 'Unavailable', 3, '2024-03-05 17:50:56', 'has taken 3 calls Chiquinha'),
(4, '7003', 1, 'Y', 'Unavailable', 48, '2024-03-05 17:51:36', 'has taken 48 calls Nhonho'),
(5, '7004', 1, 'Y', 'Not in use', 0, '2024-03-05 17:51:52', 'has taken no calls yet Godines');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ramais`
--

CREATE TABLE `ramais` (
  `id` int NOT NULL,
  `name_username` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `host` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dyn` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nat` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `acl` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `port` int DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ramais`
--

INSERT INTO `ramais` (`id`, `name_username`, `host`, `dyn`, `nat`, `acl`, `port`, `status`) VALUES
(1, '7000', '181.219.125.7', 'D', 'N', 'N', 42367, 'OK (33 ms)'),
(2, '7001', '181.219.125.7', 'D', 'N', 'N', 42368, 'OK (20 ms)'),
(3, '7002', '(Unspecified)', 'D', 'N', 'N', 0, 'UNKNOWN'),
(4, '7003', '(Unspecified)', 'D', 'N', 'N', 0, 'UNKNOWN'),
(5, '7004', '181.219.125.7', 'D', 'N', 'N', 42369, 'OK (15 ms)');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `gcallcenter`
--
ALTER TABLE `gcallcenter`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ramais`
--
ALTER TABLE `ramais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `gcallcenter`
--
ALTER TABLE `gcallcenter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ramais`
--
ALTER TABLE `ramais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
