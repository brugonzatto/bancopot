-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Set-2023 às 00:36
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancopot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE IF NOT EXISTS `conta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agencia` varchar(15) NOT NULL,
  `contacorrente` varchar(45) NOT NULL,
  `saldo` decimal(14,2) DEFAULT NULL,
  `pessoa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_conta_pessoa_idx` (`pessoa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `agencia`, `contacorrente`, `saldo`, `pessoa_id`) VALUES
(1, '1234', '76353', '6500.00', 1),
(2, '1234', '4470', '0.00', 7),
(3, '1234', '10278', '200.00', 2),
(4, '1234', '456643', '0.00', 5),
(5, '1234', '566798', '200.00', 4),
(6, '1234', '5999', '1000000.00', 6),
(7, '1234', '9350', '0.00', 8),
(8, '1234', '2418', '0.00', 9),
(9, '1234', '4524', '0.00', 10),
(10, '1234', '8421', '0.00', 11),
(11, '1234', '7023', '0.00', 12),
(12, '1234', '8013', '0.00', 13),
(13, '1234', '9834', '0.00', 14),
(14, '1234', '6466', '0.00', 15),
(15, '1234', '3135', '0.00', 16),
(16, '1234', '9488', '0.00', 17),
(17, '1234', '776459', '0.00', 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `acao` int NOT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `data_movimentacao` datetime NOT NULL,
  `conta_id` int NOT NULL,
  `conta_destino` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movimentacao_conta1_idx` (`conta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id`, `acao`, `valor`, `data_movimentacao`, `conta_id`, `conta_destino`) VALUES
(1, 0, '-4470', '2023-09-18 00:00:00', 1, 1),
(2, 0, '4470', '2023-09-18 00:00:00', 1, 1),
(3, 0, '-4470', '2023-09-18 00:00:00', 1, 1),
(4, 0, '4470', '2023-09-18 00:00:00', 1, 1),
(5, 0, '-4470', '2023-09-18 00:00:00', 1, 1),
(6, 0, '4470', '2023-09-18 00:00:00', 1, 1),
(7, 0, '-4470', '2023-09-18 00:00:00', 1, 1),
(8, 0, '4470', '2023-09-18 00:00:00', 1, 1),
(9, 0, '-4470', '2023-09-18 00:00:00', 1, 1),
(10, 0, '4470', '2023-09-18 00:00:00', 1, 1),
(11, 0, '-100', '2023-09-18 00:00:00', 1, 4470),
(13, 0, '-500', '2023-09-18 00:00:00', 1, 4470),
(15, 0, '-100', '2023-09-18 00:00:00', 1, 4470),
(17, 0, '-100', '2023-09-18 00:00:00', 1, 4470),
(18, 0, '-100', '2023-09-18 00:00:00', 1, 4470),
(19, 0, '-100', '2023-09-18 00:00:00', 1, 4470),
(21, 0, '-100', '2023-09-18 00:00:00', 1, 4470),
(22, 0, '-300', '2023-09-18 00:00:00', 1, 4470),
(23, 0, '300', '2023-09-18 00:00:00', 1, 4470),
(24, 0, '300', '2023-09-18 00:00:00', 1, 4470),
(25, 0, '300', '2023-09-18 00:00:00', 1, 4470),
(26, 0, '-100', '2023-09-18 00:00:00', 1, 4470);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `senha` char(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `cpf`, `nascimento`, `senha`) VALUES
(1, 'Bruna Gonzatto', 'bruugonzatto@gmail.com', '03006863070', '1993-12-29', '111'),
(2, 'Joao da Silva', 'soueujoao@confia.com', '12345678', '2000-08-20', '123'),
(4, 'maria julia', 'mjulia@oi.com', '222111999', '1967-12-03', '2020'),
(5, 'luana bil', 'lubil@gmail.com', '28812616222', '1988-12-31', '2020'),
(6, 'Rodrigo Am', 'roamo@gmail.com', '090909099', '1993-10-31', 'oioioi'),
(7, 'ana julia', 'ana@julia.com', '22292992', '1998-02-02', '222'),
(8, 'silvio santos', 'silviosantos@sbt.com', '9191972', '1799-12-12', '$2y$10$o'),
(9, 'gaia maria', 'gaia@oi.com', '992929', '2000-05-10', '6216f8a7'),
(10, 'livia oliver', 'olivia@oliver', '2717717', '2000-12-10', '12'),
(11, 'livia oliver', 'olivia@oliver', '2717717', '2000-12-10', '12'),
(12, 'olivia olivera', 'olivia@oliver', '2717717', '2000-12-10', '12'),
(13, 'mara maravilha', 'mara@mara.com', '03001293910', '2000-03-20', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(14, 'ana maria', 'ana@mama.com', '17717129', '2000-04-30', '356a192b7913b04c54574d18c28d46e6395428ab'),
(15, 'Duda maria', 'duda@maria.com', '202020', '2000-03-18', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(16, 'dona benta', 'dona@benta.com', '22202102', '2000-04-10', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(17, 'maria jose', 'maria@jose.com', '0300455', '2000-04-20', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9'),
(18, 'ze felipe', 'ze@felipe', '921829182', '2000-05-20', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(19, 'Joao da Silva', 'silva@silva.com', '02030320', '2000-02-10', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(20, 'marrom bombom', 'ma@rrom', '82392938', '1989-12-20', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(21, 'chica da silva', 'chica@dasilva.com', '83483831', '1997-06-20', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(22, 'fabio silva', 'fabio@silva.com', '2392939171', '1998-07-10', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(23, 'lua maria', 'lu@maria.com', '20203202039', '2001-05-12', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(24, 'ana ju', 'a.ju@gmail.com', '0232931', '1989-04-12', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fk_conta_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`);

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `fk_movimentacao_conta1` FOREIGN KEY (`conta_id`) REFERENCES `conta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
