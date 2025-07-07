-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/07/2025 às 04:18
-- Versão do servidor: 8.0.35
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saboaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `idCompra` int NOT NULL,
  `idUsuario` int DEFAULT NULL,
  `idProduto` int DEFAULT NULL,
  `dataCompra` date DEFAULT NULL,
  `horaCompra` time DEFAULT NULL,
  `valorCompra` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`idCompra`, `idUsuario`, `idProduto`, `dataCompra`, `horaCompra`, `valorCompra`) VALUES
(1, 3, 1, '2025-05-26', '21:39:43', 13.00),
(2, 2, 1, '2025-05-26', '21:40:12', 13.00),
(3, 3, 5, '2025-05-26', '21:40:44', 30.00),
(4, 2, 4, '2025-05-26', '22:04:58', 18.00),
(5, 2, 1, '2025-07-06', '19:40:37', 13.00),
(6, 4, 5, '2025-07-06', '22:13:33', 30.00),
(7, 4, 7, '2025-07-07', '00:59:02', 18.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int NOT NULL,
  `fotoProduto` varchar(100) NOT NULL,
  `nomeProduto` varchar(30) NOT NULL,
  `descricaoProduto` varchar(200) NOT NULL,
  `valorProduto` decimal(10,0) NOT NULL,
  `statusProduto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `fotoProduto`, `nomeProduto`, `descricaoProduto`, `valorProduto`, `statusProduto`) VALUES
(1, 'img/sabonete.m.jpg', 'Sabonete artesanal de Maracujá', 'Sabonete artesanal de Maracujá, no formato da fruta, com essência de maracujá doce. ', 13, 'disponivel'),
(2, 'img/sabonete.l.jpg', 'Sabonete artesanal de Limão', 'Sabonete artesanal de Limão Siciliano, no formato da fruta.', 15, 'disponivel'),
(3, 'img/geleia.l.jpg', 'Geleia de Limão', 'Geleia de Banho de Limão Siciliano.', 18, 'disponivel'),
(4, 'img/geleia.m.jpg', 'Geleia de Morango', 'Geleia de Banho de Morango.', 18, 'disponivel'),
(5, 'img/espuma.m.jpg', 'Espuma de Morango', 'Espuma facial de limpeza de Morango.', 30, 'disponivel'),
(6, 'img/sais.jpg', 'Sais de Banho', 'Sais de Banho.', 16, 'disponivel'),
(7, 'img/geleia.b.jpg', 'Geleia de Bergamota', 'Geleia de Banho de Bergamota.', 18, 'disponivel'),
(8, 'img/mini.m.jpg', 'Sabonete artesanal de Mexerica', 'Mini sabonete artesanal de Mexerica.', 3, 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `dataNascimentoUsuario` date NOT NULL,
  `cidadeUsuario` varchar(30) NOT NULL,
  `telefoneUsuario` varchar(20) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `tipoUsuario`, `fotoUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `cidadeUsuario`, `telefoneUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
(1, 'administrador', 'img/louslane.jpg', 'Louslane Talevi ', '2006-02-06', 'telemacoBorba', '(42)99934-7756', 'lousli@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'cliente', 'img/cristiano.jpg', 'Cristiano Ronaldo', '1985-02-05', 'telemacoBorba', '(42)99988-7452', 'cris@gmail.com', '6299b4bf69960e53b6d9a0bd27342660'),
(3, 'cliente', 'img/gisele.png', 'Gisele Bundchen', '1980-07-20', 'telemacoBorba', '(42)99942-1579', 'gisele@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'cliente', 'img/mulher.jpg', 'Joana Silva', '1984-06-20', 'telemacoBorba', '(41)99821-1368', 'joana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`idProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
