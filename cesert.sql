-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jun-2019 às 06:28
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cesert`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curso`
--

CREATE TABLE `tb_curso` (
  `id_curso` int(11) NOT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  `nome_curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_curso`
--

INSERT INTO `tb_curso` (`id_curso`, `sigla`, `nome_curso`) VALUES
(1, 'SI', 'Sistemas de Informação'),
(2, 'ADS', 'Analise e Desenvolvimento de Sistemas'),
(3, 'ENG CP', 'Engenharia da Computação'),
(4, 'ab', 'asdf'),
(5, 'ewrwe', 'werw'),
(6, 'erwersdgt', 'gtefds'),
(7, 'alalala', 'aehooo'),
(8, 'asdf', 'si');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_despesa`
--

CREATE TABLE `tb_despesa` (
  `id_despesa` int(11) NOT NULL,
  `codigo_compra` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `local_compra` varchar(100) NOT NULL,
  `data_compra` date NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_despesa`
--

INSERT INTO `tb_despesa` (`id_despesa`, `codigo_compra`, `descricao`, `quantidade`, `local_compra`, `data_compra`, `valor_compra`) VALUES
(1, 123, 'internet', 1, 'vivo', '2019-06-29', '100.00'),
(2, 123, 'internet', 1, 'vivo', '2019-06-29', '100.00'),
(3, 1234567, 'asdf', 12, 'asdfas', '2019-06-12', '50.00'),
(4, 123421, 'asdfasd', 123, 'asdfa', '2019-06-29', '50.00'),
(5, 1234212, 'asdfasd', 234, 'asdfas', '2019-06-28', '75.75');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estudante`
--

CREATE TABLE `tb_estudante` (
  `id_estudante` int(11) NOT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `fk_estudante_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_estudante`
--

INSERT INTO `tb_estudante` (`id_estudante`, `escolaridade`, `fk_estudante_usuario`) VALUES
(13, 'Superior', 30),
(16, 'Técnico', 33),
(17, 'Superior', 36),
(22, 'Médio', 44),
(23, 'Superior', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estudante_curso`
--

CREATE TABLE `tb_estudante_curso` (
  `id_estudante_curso` int(11) NOT NULL,
  `fk_estudante_curso` int(11) DEFAULT NULL,
  `fk_curso_estudante` int(11) DEFAULT NULL,
  `data_inicio_curso` date NOT NULL,
  `data_final_curso` date NOT NULL,
  `periodo` int(11) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `instituicao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_estudante_curso`
--

INSERT INTO `tb_estudante_curso` (`id_estudante_curso`, `fk_estudante_curso`, `fk_curso_estudante`, `data_inicio_curso`, `data_final_curso`, `periodo`, `matricula`, `instituicao`) VALUES
(1, 13, 1, '2322-05-31', '2014-04-23', 23, '4434355435345345', 'Estacio'),
(2, 17, 5, '0000-00-00', '0000-00-00', 22, '23423432', '23423423423'),
(6, 22, 3, '0000-00-00', '0000-00-00', 83, '7438927482374', '739487329487239'),
(7, 22, 6, '0000-00-00', '0000-00-00', 83, '7438927482374', '739487329487239'),
(8, 23, 1, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908'),
(9, 23, 2, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908'),
(10, 23, 3, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908'),
(11, 23, 4, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908'),
(12, 23, 5, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908'),
(13, 23, 6, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908'),
(14, 23, 7, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908'),
(15, 23, 8, '0000-00-00', '0000-00-00', 89, '903480392480', '942038490832908');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `departamento`, `profissao`, `id_usuario`, `data_cadastro`) VALUES
(1, 'Admin', 'Admin', 2, '2019-05-25 16:39:06'),
(2, '234523452345', '2345234523', 21, '2019-06-01 17:44:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pagamento`
--

CREATE TABLE `tb_pagamento` (
  `id_pagamento` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo_pagamento` varchar(50) NOT NULL,
  `valor_pagamento` decimal(10,2) NOT NULL,
  `data_pagamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_pagamento_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pagamento`
--

INSERT INTO `tb_pagamento` (`id_pagamento`, `cpf`, `nome`, `tipo_pagamento`, `valor_pagamento`, `data_pagamento`, `fk_pagamento_usuario`) VALUES
(27, '09911123421', 'José Airton Nunes da Silva', 'Mensalidade', '30.00', '2019-06-02 21:03:08', 1),
(28, '09911123421', 'José Airton Nunes da Silva', 'Mensalidade', '30.00', '2019-06-02 21:04:21', 1),
(29, '09911123421', 'José Airton Nunes da Silva', 'Mensalidade', '30.00', '2019-06-02 21:04:44', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_quarto`
--

CREATE TABLE `tb_quarto` (
  `id_quarto` int(11) NOT NULL,
  `nome_quarto` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_quarto`
--

INSERT INTO `tb_quarto` (`id_quarto`, `nome_quarto`) VALUES
(1, 'Quarto 01'),
(2, 'Quarto 02'),
(3, 'Quarto 03'),
(4, 'Quarto 04'),
(5, 'Quarto 05'),
(6, 'Quarto 06'),
(7, 'Quarto 07'),
(8, 'Quarto 08'),
(9, 'Quarto 09'),
(10, 'Quarto 10'),
(11, 'Quarto 11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_saldo`
--

CREATE TABLE `tb_saldo` (
  `id_saldo` int(11) NOT NULL,
  `total_pagamento` decimal(10,2) DEFAULT NULL,
  `total_despesa` decimal(10,2) DEFAULT NULL,
  `total_saldo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `celular1` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `celular2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `cpf`, `nome`, `rg`, `data_nascimento`, `sexo`, `estado_civil`, `tipo_usuario`, `email`, `senha`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `complemento`, `celular1`, `data_cadastro`, `celular2`) VALUES
(1, '09911123421', 'José Airton Nunes da Silva', '7840128', '1992-12-08', 'M', 'Solteiro', '1', 'j.airtonnunes@hotmail.com', 'abcd@1234', '50720123', 'Rua Ricardo Salazar lado ímpar', '182', 'Madalena', 'Recife', 'PE', 'Casa do Estudante', '[\"81995672325\",\"\",\"\"]', '2019-05-25 16:37:12', ''),
(2, '01234567890', 'Sebastiana Maria', '1234567', '2964-04-24', 'F', 'Casado', '3', 'maria@teste.com.br', 'abcd@1234', '50720123', 'Rua Ricardo Salazar lado ímpar', '182', 'Madalena', 'Recife', 'PE', 'Casa do Estudante', '[\"81995672325\",\"\",\"\"]', '2019-05-25 16:39:06', ''),
(4, '094344', '234234', '234234', '2343-04-23', 'F', 'Solteiro', '2', '234325444', '342432', '2344', '23434', '2342', '234234', '43242', 'PA', '23424', '[\"2343242342\",\"3423423432\",\"4234234\"]', '2019-05-28 21:17:44', ''),
(6, '09434423', '234234', '2342343', '2343-04-23', 'F', 'Solteiro', '2', '234325444r', '342432', '2344', '23434', '2342', '234234', '43242', 'PA', '23424', '[\"2343242342\",\"3423423432\",\"4234234\"]', '2019-05-28 21:17:57', ''),
(7, '0945543', '234234', '2342258', '2343-04-23', 'F', 'Solteiro', '2', '234325454', '342432', '2344', '23434', '2342', '234234', '43242', 'PA', '23424', '[\"2343242342\",\"3423423432\",\"4234234\"]', '2019-05-28 21:18:10', ''),
(8, '0945545', '234234', '234353', '2343-04-23', 'F', 'Solteiro', '2', '2343453', '342432', '2344', '23434', '2342', '234234', '43242', 'PA', '23424', '[\"2343242342\",\"3423423432\",\"4234234\"]', '2019-05-28 21:18:20', ''),
(9, '094543543', '23443534', '234553', '2343-04-23', 'F', 'Solteiro', '2', '234345666', '342432', '2344', '23434', '2342', '234234', '43242', 'PA', '23424', '[\"2343242342\",\"3423423432\",\"4234234\"]', '2019-05-28 21:18:31', ''),
(21, '34563634563', '345624452323', '4523452', '0000-00-00', 'F', 'Casado', '3', '345rewtewt', '2345423523', '43523452', '24352345', '5234', '23452345234522', '34523452', 'AC', '245325', '[\"34523452\",\"34522542345\",\"52345\"]', '2019-06-01 17:44:03', ''),
(30, '89750374569', 'seu zezinho', '8329347', '0000-00-00', 'F', 'Solteiro', '2', 'seu@zezinho.com', '123', '32425243', 'rua abc', '24', 'futurista', 'ultrapassada', 'PI', '33a', '[\"32423423423\",\"32132345434\",\"4325234523\"]', '2019-06-01 18:05:33', ''),
(33, '58962570807', '07098', '7980723', '0000-00-00', 'M', 'Solteiro', '2', '8we97r89w7e8987', '8W79E8R7W98E7R', '897', '9889', '7', '987', '98789', 'AL', '7987QR9E87', '[\"98798\",\"708\",\"0890980980\"]', '2019-06-01 18:49:27', ''),
(36, '13293766666', 'Femino', '8806566', '0000-00-00', 'F', 'Solteiro', '2', 'maria@teqste.com', '234234234', '5660000', '3º TRAVESSA SÃO VICENTE, CASA', '2343', '23423432', 'SERTÂNIA', 'AL', '32423', '[\"23234232344\",\"23423423424\",\"4242332423\"]', '2019-06-01 19:16:00', ''),
(44, '47886943597', '987988793274829378', '9789798', '0000-00-00', 'F', 'Casado', '2', '98234798237', '8979832748927', '98798374', '9878943729847', '8974', '8947398', '7489', 'AC', '8342749724', '98743298472', '2019-06-03 21:16:54', '79438274923'),
(45, '57382978357', '89789078907032', '0979873', '0000-00-00', 'F', 'Casado', '2', '382947289374892789', '238794793294877238948', '24283904', '34908290384092', '4382', '483290482309482', '48329034820394832094890328940230', 'RN', '32498273894', '48204982340', '2019-06-03 21:46:54', '48320948209');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `tb_despesa`
--
ALTER TABLE `tb_despesa`
  ADD PRIMARY KEY (`id_despesa`);

--
-- Indexes for table `tb_estudante`
--
ALTER TABLE `tb_estudante`
  ADD PRIMARY KEY (`id_estudante`),
  ADD KEY `id_usuario_estudante` (`fk_estudante_usuario`);

--
-- Indexes for table `tb_estudante_curso`
--
ALTER TABLE `tb_estudante_curso`
  ADD PRIMARY KEY (`id_estudante_curso`),
  ADD KEY `id_estudante` (`fk_estudante_curso`),
  ADD KEY `id_curso` (`fk_curso_estudante`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_usuario_funcionario` (`id_usuario`);

--
-- Indexes for table `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `fk_pagamento_usuario` (`fk_pagamento_usuario`);

--
-- Indexes for table `tb_quarto`
--
ALTER TABLE `tb_quarto`
  ADD PRIMARY KEY (`id_quarto`);

--
-- Indexes for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `CPF` (`cpf`),
  ADD UNIQUE KEY `RG` (`rg`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_despesa`
--
ALTER TABLE `tb_despesa`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_estudante`
--
ALTER TABLE `tb_estudante`
  MODIFY `id_estudante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_estudante_curso`
--
ALTER TABLE `tb_estudante_curso`
  MODIFY `id_estudante_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_quarto`
--
ALTER TABLE `tb_quarto`
  MODIFY `id_quarto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_estudante`
--
ALTER TABLE `tb_estudante`
  ADD CONSTRAINT `id_usuario_estudante` FOREIGN KEY (`fk_estudante_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_estudante_curso`
--
ALTER TABLE `tb_estudante_curso`
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`fk_curso_estudante`) REFERENCES `tb_curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_estudante` FOREIGN KEY (`fk_estudante_curso`) REFERENCES `tb_estudante` (`id_estudante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `id_usuario_funcionario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_pagamento`
--
ALTER TABLE `tb_pagamento`
  ADD CONSTRAINT `fk_pagamento_usuario` FOREIGN KEY (`fk_pagamento_usuario`) REFERENCES `tb_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
