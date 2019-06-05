-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jun-2019 às 06:01
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

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
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `area` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`idarea`, `area`) VALUES
(1, 'Desenvolvedor'),
(2, 'Tecnico'),
(3, 'Testador');

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
  `idusuario` int(11) NOT NULL,
  `idlog` int(11) NOT NULL,
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
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idrecebedor` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
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
  `idexterno` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`idusuario`, `idnotificacao`, `titulo`, `mensagem`, `idexterno`, `status`) VALUES
(1, 1, 'aaaaaa', 'aaaaaa', 2, 'nao_lida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oportunidade`
--

CREATE TABLE `oportunidade` (
  `idprojeto` int(11) NOT NULL,
  `idsubarea` int(11) NOT NULL,
  `idoportunidade` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `valor` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `oportunidade`
--

INSERT INTO `oportunidade` (`idprojeto`, `idsubarea`, `idoportunidade`, `nome`, `descricao`, `vagas`, `status`, `data_cadastro`, `valor`) VALUES
(4, 5, 12, 'asdasdasd', 'asdasd', 111, NULL, '2019-05-24 05:45:10', '11'),
(4, 1, 13, 'asdadadaa', 'aaaaaaaaaaaaaa', 101, NULL, '2019-05-24 05:46:07', '1'),
(5, 11, 16, 'DUHDHDUIDUI', 'DUIHDUDDHDD', 10, NULL, '2019-05-24 06:04:14', '22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestador`
--

CREATE TABLE `prestador` (
  `idusuario` int(11) NOT NULL,
  `idprestador` int(11) NOT NULL,
  `idsubarea` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `nota` decimal(2,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestador_oportunidade`
--

CREATE TABLE `prestador_oportunidade` (
  `idprestador` int(11) NOT NULL,
  `idoportunidade` int(11) NOT NULL,
  `dataaplicacao` timestamp NULL DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `idusuario` int(11) NOT NULL,
  `idprojeto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`idusuario`, `idprojeto`, `nome`, `descricao`, `data_cadastro`) VALUES
(1, 4, 'uehieuiuiehuiehiu', 'agora acho que foi', '2019-05-22 05:16:28'),
(1, 5, 'Teste real', 'Vou atÃ© escrever bonitinho!', '2019-05-22 05:20:33'),
(1, 6, 'agora', 'eu acho que vai', '2019-05-22 05:35:08'),
(2, 7, 'Confeitaria', 'Montar uma confeitaria diferenciada no centro de Porto Alegre', '2019-05-22 06:30:44'),
(1, 8, 'Criando mais um projeto', 'Este projeto e mais um teste que esta sendo executado no dia 24 de maio de 2019, numa pequena espera', '2019-05-24 03:27:55');

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
-- Estrutura da tabela `subarea`
--

CREATE TABLE `subarea` (
  `idsubarea` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `area2` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subarea`
--

INSERT INTO `subarea` (`idsubarea`, `idarea`, `area2`) VALUES
(1, 1, 'C'),
(2, 1, 'PHP'),
(3, 1, 'Python'),
(4, 1, 'Java'),
(5, 1, 'Oracle'),
(6, 1, 'SQL Server'),
(7, 1, 'HTML'),
(8, 1, 'Node JS'),
(9, 1, 'Fullstack'),
(10, 1, 'BackEnd'),
(11, 1, 'FrontEnd'),
(12, 2, ''),
(13, 1, ''),
(14, 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

CREATE TABLE `transacao` (
  `idusuario` int(11) NOT NULL,
  `idtransacao` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `valorantes` decimal(10,2) DEFAULT NULL,
  `valordepois` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `nota` decimal(2,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `cpf`, `email`, `senha`, `telefone`, `saldo`, `nota`) VALUES
(1, 'teste', 111111, 'teste@teste.com', 'b59c67bf196a4758191e42f76670ceba', '1111111', NULL, NULL),
(2, 'Vitor Avila', 2147483647, 'vitorfragadeavila@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '51999615125', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

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
  ADD KEY `fk_log_usuario1_idx` (`idusuario`);

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
  ADD KEY `idprojeto` (`idprojeto`),
  ADD KEY `idsubarea` (`idsubarea`);

--
-- Indexes for table `prestador`
--
ALTER TABLE `prestador`
  ADD PRIMARY KEY (`idprestador`),
  ADD KEY `fk_prestador_usuario1_idx` (`idusuario`),
  ADD KEY `fk_subarea` (`idsubarea`);

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
-- Indexes for table `subarea`
--
ALTER TABLE `subarea`
  ADD PRIMARY KEY (`idsubarea`),
  ADD KEY `fk_subareafk` (`idarea`);

--
-- Indexes for table `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`idtransacao`),
  ADD KEY `fk_transacao_usuario1_idx` (`idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `idnotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oportunidade`
--
ALTER TABLE `oportunidade`
  MODIFY `idoportunidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prestador`
--
ALTER TABLE `prestador`
  MODIFY `idprestador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `idprojeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reclamacao`
--
ALTER TABLE `reclamacao`
  MODIFY `idreclamacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subarea`
--
ALTER TABLE `subarea`
  MODIFY `idsubarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transacao`
--
ALTER TABLE `transacao`
  MODIFY `idtransacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `fk_log_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `oportunidade_ibfk_1` FOREIGN KEY (`idprojeto`) REFERENCES `projeto` (`idprojeto`),
  ADD CONSTRAINT `oportunidade_ibfk_2` FOREIGN KEY (`idsubarea`) REFERENCES `subarea` (`idsubarea`);

--
-- Limitadores para a tabela `prestador`
--
ALTER TABLE `prestador`
  ADD CONSTRAINT `fk_prestador_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subarea` FOREIGN KEY (`idsubarea`) REFERENCES `subarea` (`idsubarea`);

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
-- Limitadores para a tabela `subarea`
--
ALTER TABLE `subarea`
  ADD CONSTRAINT `fk_subareafk` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`);

--
-- Limitadores para a tabela `transacao`
--
ALTER TABLE `transacao`
  ADD CONSTRAINT `fk_transacao_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
