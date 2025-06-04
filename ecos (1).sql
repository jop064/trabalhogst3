-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04/06/2025 às 21:10
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecoS`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `escola_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `senha`, `escola_id`) VALUES
(3, 'teste1', 'teste1@gmail.com', '$2y$10$mOvyayYSknYuvmkZGY0KPO6ZsZc1SUSYzHLGkCcTx47LOhcNMyFl.', 1),
(4, 'Cerol', 'Mrcoxas@gmail.com', '$2y$10$5czQpKPn0egrYHxtTbzby.GUC6nZxSKRysSbNzwFpF0Wv3Tq9G8i6', 1),
(5, 'mamama', 'ma@gmail.com', '$2y$10$kZqK9QFIh2XKohuo/MceIeNEVVfnfEyUsFvOrvKf0bqB21s.iI53C', 1),
(6, 'ms', 'ms@gmail.com', '$2y$10$LbafE0B0KWH2CsN83tJoZecKqKev3q6mrQOWyaGOLWq2OeiwMQPpi', 1),
(7, 'giu', 'giu@gmail.com', '$2y$10$O8UfUnXYOFwQo5QNZSFeTOlhYXHttlF0rX7InpjizGhINpytTstOW', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_escola` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escola`
--

INSERT INTO `escola` (`id`, `nome`, `email`, `id_escola`) VALUES
(1, 'Escola Walter Ramos de Araújo', 'WalterRamosgmail.com', 1),
(2, 'Escola Adelino Cunha Alcântara', 'AdelinoAlcantara.com', 2),
(3, 'Escola Waldemar Alcântara', 'WalderAlcantara@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `nomeinst` varchar(100) DEFAULT NULL,
  `cnpj` int(14) DEFAULT NULL,
  `endereço` varchar(50) DEFAULT NULL,
  `nomeresp` varchar(50) DEFAULT NULL,
  `formpag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
