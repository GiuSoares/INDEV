-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2019 às 02:48
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indev`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `idusuario` int(11) NOT NULL,
  `idprestador` int(11) NOT NULL,
  `idchat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idcontato` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idfavorito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_recalamacao`
--

CREATE TABLE `dados_recalamacao` (
  `idreclamacao` int(11) NOT NULL,
  `idmensagem` int(11) NOT NULL,
  `idremetente` int(11) NOT NULL,
  `mensagem` varchar(10000) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `valor_antigo` varchar(1000) NOT NULL,
  `campo_alterado` varchar(1000) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_chat`
--

CREATE TABLE `mensagem_chat` (
  `idchat` int(11) NOT NULL,
  `idmensagem` int(11) NOT NULL,
  `idremetente` int(11) NOT NULL,
  `mensagem` varchar(1000) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `idusuario` int(11) NOT NULL,
  `idnotificacao` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `mensagem` varchar(1000) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oportunidade`
--

CREATE TABLE `oportunidade` (
  `idprojeto` int(11) NOT NULL,
  `idoportunidade` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `area2` varchar(100) DEFAULT NULL,
  `area3` varchar(100) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestador`
--

CREATE TABLE `prestador` (
  `idusuario` int(11) NOT NULL,
  `idprestador` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `area` varchar(100) NOT NULL,
  `area2` varchar(100) DEFAULT NULL,
  `area3` varchar(100) DEFAULT NULL,
  `nota` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestador_oportunidade`
--

CREATE TABLE `prestador_oportunidade` (
  `idprestador` int(11) NOT NULL,
  `idoportunidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `idusuario` int(11) NOT NULL,
  `idprojeto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reclamacao`
--

CREATE TABLE `reclamacao` (
  `idoportunidade` int(11) NOT NULL,
  `idprestador` int(11) NOT NULL,
  `idreclamacao` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `decisao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

CREATE TABLE `transacao` (
  `usuario_idusuario` int(11) NOT NULL,
  `idtransacao` int(11) NOT NULL,
  `valor` float DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `prestador` varchar(6) NOT NULL,
  `saldo` float NOT NULL,
  `nota` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `cpf`, `email`, `senha`, `telefone`, `prestador`, `saldo`, `nota`) VALUES
(1, 'Andrey', '86423886091', 'andreyrodrigues226@hotmail.com', '202cb962ac59075', '5180243582', '', 0, NULL),
(2, 'joao', '86423887897', 'joao.machado@laureate.com.br', '12', '5180243583', '', 0, NULL),
(3, 'cleber', '2222', 'cleber@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '22222', '', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idchat`),
  ADD KEY `fk_chat_usuario1_idx` (`idusuario`),
  ADD KEY `fk_chat_prestador1_idx` (`idprestador`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idcontato`),
  ADD KEY `fk_contato_usuario1_idx` (`idusuario`);

--
-- Indexes for table `dados_recalamacao`
--
ALTER TABLE `dados_recalamacao`
  ADD PRIMARY KEY (`idmensagem`),
  ADD KEY `fk_dados_recalamacao_reclamacao1_idx` (`idreclamacao`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`),
  ADD KEY `fk_log_usuario1_idx` (`usuario_idusuario`);

--
-- Indexes for table `mensagem_chat`
--
ALTER TABLE `mensagem_chat`
  ADD PRIMARY KEY (`idmensagem`),
  ADD KEY `fk_mensagem_chat_chat1_idx` (`idchat`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`idnotificacao`),
  ADD KEY `fk_notificacao_usuario1_idx` (`idusuario`);

--
-- Indexes for table `oportunidade`
--
ALTER TABLE `oportunidade`
  ADD PRIMARY KEY (`idoportunidade`),
  ADD KEY `fk_oportunidade_projeto1_idx` (`idprojeto`);

--
-- Indexes for table `prestador`
--
ALTER TABLE `prestador`
  ADD PRIMARY KEY (`idprestador`),
  ADD KEY `fk_prestador_usuario1_idx` (`idusuario`);

--
-- Indexes for table `prestador_oportunidade`
--
ALTER TABLE `prestador_oportunidade`
  ADD PRIMARY KEY (`idprestador`,`idoportunidade`),
  ADD KEY `fk_prestador_has_oportunidade_oportunidade1_idx` (`idoportunidade`),
  ADD KEY `fk_prestador_has_oportunidade_prestador1_idx` (`idprestador`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`idprojeto`),
  ADD KEY `fk_projeto_usuario1_idx` (`idusuario`);

--
-- Indexes for table `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD PRIMARY KEY (`idreclamacao`),
  ADD KEY `fk_reclamacao_oportunidade1_idx` (`idoportunidade`),
  ADD KEY `fk_reclamacao_prestador1_idx` (`idprestador`);

--
-- Indexes for table `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`idtransacao`),
  ADD KEY `fk_transacao_usuario1_idx` (`usuario_idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `idchat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `idcontato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dados_recalamacao`
--
ALTER TABLE `dados_recalamacao`
  MODIFY `idmensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mensagem_chat`
--
ALTER TABLE `mensagem_chat`
  MODIFY `idmensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `idnotificacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oportunidade`
--
ALTER TABLE `oportunidade`
  MODIFY `idoportunidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestador`
--
ALTER TABLE `prestador`
  MODIFY `idprestador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `idprojeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reclamacao`
--
ALTER TABLE `reclamacao`
  MODIFY `idreclamacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transacao`
--
ALTER TABLE `transacao`
  MODIFY `idtransacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_prestador1` FOREIGN KEY (`idprestador`) REFERENCES `prestador` (`idprestador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chat_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_contato_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dados_recalamacao`
--
ALTER TABLE `dados_recalamacao`
  ADD CONSTRAINT `fk_dados_recalamacao_reclamacao1` FOREIGN KEY (`idreclamacao`) REFERENCES `reclamacao` (`idreclamacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mensagem_chat`
--
ALTER TABLE `mensagem_chat`
  ADD CONSTRAINT `fk_mensagem_chat_chat1` FOREIGN KEY (`idchat`) REFERENCES `chat` (`idchat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `fk_notificacao_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `oportunidade`
--
ALTER TABLE `oportunidade`
  ADD CONSTRAINT `fk_oportunidade_projeto1` FOREIGN KEY (`idprojeto`) REFERENCES `projeto` (`idprojeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prestador`
--
ALTER TABLE `prestador`
  ADD CONSTRAINT `fk_prestador_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prestador_oportunidade`
--
ALTER TABLE `prestador_oportunidade`
  ADD CONSTRAINT `fk_prestador_has_oportunidade_oportunidade1` FOREIGN KEY (`idoportunidade`) REFERENCES `oportunidade` (`idoportunidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestador_has_oportunidade_prestador1` FOREIGN KEY (`idprestador`) REFERENCES `prestador` (`idprestador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD CONSTRAINT `fk_reclamacao_oportunidade1` FOREIGN KEY (`idoportunidade`) REFERENCES `oportunidade` (`idoportunidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reclamacao_prestador1` FOREIGN KEY (`idprestador`) REFERENCES `prestador` (`idprestador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `transacao`
--
ALTER TABLE `transacao`
  ADD CONSTRAINT `fk_transacao_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
