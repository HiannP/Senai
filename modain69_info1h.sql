-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21-Ago-2021 às 20:09
-- Versão do servidor: 5.7.21-21
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `modain69_info1h`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_Agendamento`
--

CREATE TABLE `tb_Agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `FK_id_user` int(11) NOT NULL,
  `data_solicitacao` datetime NOT NULL,
  `data_agendada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_Categoria`
--

CREATE TABLE `tb_Categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_Categoria`
--

INSERT INTO `tb_Categoria` (`id_categoria`, `nome`, `obs`) VALUES
(1, 'Gabinete', ''),
(2, 'Mouse', ''),
(3, 'Monitor', ''),
(4, 'Headset', ''),
(5, 'Caixa de Som', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_Endereco`
--

CREATE TABLE `tb_Endereco` (
  `id_endereco` int(11) NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(6) DEFAULT NULL,
  `complemento` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` int(9) DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` int(30) DEFAULT NULL,
  `obs` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_Marcas`
--

CREATE TABLE `tb_Marcas` (
  `id_marcas` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` int(15) DEFAULT NULL,
  `obs` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_Marcas`
--

INSERT INTO `tb_Marcas` (`id_marcas`, `nome`, `email`, `telefone`, `obs`) VALUES
(1, 'Sharkoon', 'sharkoon@gmail.com', 33258731, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_Produtos`
--

CREATE TABLE `tb_Produtos` (
  `id_prod` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `valor_unit` decimal(5,2) NOT NULL,
  `fabricante` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `qntd` int(3) NOT NULL,
  `img` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `obs` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_Produtos`
--

INSERT INTO `tb_Produtos` (`id_prod`, `categoria`, `descricao`, `valor_unit`, `fabricante`, `cor`, `qntd`, `img`, `obs`) VALUES
(9, 'Gabinete', 'Gabinete Gamer Sharkoon TG4 RGB sem Fonte, Mid Tower, USB 3.0, 4 Fans, Preto com Lateral em Vidro', '470.47', 'Sharkoon', 'Preto', 15, '60b00f756f69c', 'LEDs RGB'),
(10, 'Gabinete', 'Gabinete Gamer Bluecase BG-018, Mid Tower, RGB, Lateral em Acrílico - BG018BGCASE', '352.82', 'Bluecase', 'Preto', 7, '60b0100e9ad45', ''),
(11, 'Gabinete', 'Gabinete Gamer NOX Hummer TGM, RGB Rainbow, 4 Coolers, Lateral e Frontal em Vidro - NXHUMMERTGM', '576.35', 'NOX', 'Preto', 13, '60b0146506260', 'Duas cores de LEDs'),
(15, 'Gabinete', 'Gabinete Galax Nebulosa, Preto - GX700', '317.53', 'GALAX', 'Preto', 20, '60b168118e495', ''),
(16, 'Gabinete', 'Gabinete Gamer Corsair Carbide SPEC-05 sem Fonte, Mid Tower, USB 3.0, 1 Fan LED Vermelho, Preto com Lateral em Acrílico - CC-9011138-WW', '329.29', 'CORSAIR', 'Preto', 5, '60b1693b23030', 'Simples'),
(20, 'Gabinete', 'Gabinete Gamer Sharkoon VG7-W, Mid Tower, LED Vermelho, 3 Coolers, Lateral em Acrílico, Preto', '317.53', 'Sharkoon', 'Preto', 27, '60eb57cf55914', 'Vermelho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_Usuarios`
--

CREATE TABLE `tb_Usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` int(2) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `obs` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_Usuarios`
--

INSERT INTO `tb_Usuarios` (`id_user`, `nome`, `sobrenome`, `email`, `senha`, `perfil`, `id_endereco`, `create_date`, `obs`) VALUES
(19, 'Hiann', 'Padilha', 'hiann.padilha@gmail.com', 'a8475d63e8b5d6e0fc611d74a19c86a7', 5, 1, '2021-08-20 22:12:55', 'ADM 1'),
(21, 'Patri', 'Petrik', 'patri.trik@gmail.com', 'c7a9239e4c39313ffbbd373518b888c1', 3, 0, '2021-08-20 22:18:53', 'Colab. 1'),
(22, 'Luis', 'Gustavo', 'luis.gustavo@gmail.com', 'cbed3df8cd051261e3ac873d87d026aa', 1, 0, '2021-08-20 22:31:42', NULL),
(24, 'Bill', 'Allan', 'bill.allan@gmail.com', '08bba04b7b180da3494e85a19322f551', 1, 0, '2021-08-21 15:26:06', NULL),
(25, 'Allan', 'Burk', 'allan.burk@gmail.com', 'db4854ab9e8cdba4eb8b614d06d33178', 1, 0, '2021-08-21 15:27:01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_Vendas`
--

CREATE TABLE `tb_Vendas` (
  `id_venda` int(11) NOT NULL,
  `FK_id_prod` int(11) NOT NULL,
  `FK_id_user` int(11) NOT NULL,
  `qntd` int(3) NOT NULL,
  `data_compra` datetime NOT NULL,
  `valor_unit` decimal(5,2) NOT NULL,
  `situacao` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `obs` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_Agendamento`
--
ALTER TABLE `tb_Agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `FK_id_user` (`FK_id_user`);

--
-- Índices para tabela `tb_Categoria`
--
ALTER TABLE `tb_Categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `tb_Endereco`
--
ALTER TABLE `tb_Endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `tb_Marcas`
--
ALTER TABLE `tb_Marcas`
  ADD PRIMARY KEY (`id_marcas`);

--
-- Índices para tabela `tb_Produtos`
--
ALTER TABLE `tb_Produtos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Índices para tabela `tb_Usuarios`
--
ALTER TABLE `tb_Usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `tb_Endereco` (`id_endereco`);

--
-- Índices para tabela `tb_Vendas`
--
ALTER TABLE `tb_Vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_prod` (`FK_id_prod`),
  ADD KEY `id_user` (`FK_id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_Agendamento`
--
ALTER TABLE `tb_Agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_Categoria`
--
ALTER TABLE `tb_Categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_Endereco`
--
ALTER TABLE `tb_Endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_Marcas`
--
ALTER TABLE `tb_Marcas`
  MODIFY `id_marcas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_Produtos`
--
ALTER TABLE `tb_Produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_Usuarios`
--
ALTER TABLE `tb_Usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tb_Vendas`
--
ALTER TABLE `tb_Vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
