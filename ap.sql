-- Base de dados de suporte ao projecto

SET FOREIGN_KEY_CHECKS=0;

-- Estrutura da tabela 'viagens'
CREATE TABLE `viagens` (
    `id_viagem` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
    `destino` varchar(255) NOT NULL,
    `partida` varchar(255) NOT NULL DEFAULT DEFAULT,
    `data_viagem` date NOT NULL,
    `num_passageiros` smallint(5) unsigned NOT NULL DEFAULT DEFAULT,
    `num_inscritos` smallint(5) unsigned NOT NULL DEFAULT 0,
    `custo_total` smallint(5) unsigned NOT NULL,
    `custo_unit` float unsigned NOT NULL,
    `estado` varchar(10) NOT NULL, --Estado pode ser "Cancelada, Agendada, Confirmada, Realizada"
    `observacoes` varchar(512) DEFAULT NULL,
    `visibilidade` BOOLEAN NOT NULL DEFAULT 1, --Actualizar este atributo no momento de apagar uma viagem. A viagem fica escondida para o utilizador, mas o seu registo pode ser recuperado
    PRIMARY KEY (`id_viagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

-- Estrutura da tabela 'passageiro'
CREATE TABLE `passageiro` (
    `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) NOT NULL,
    `contacto` varchar(10) NOT NULL,
    `visibilidade` BOOLEAN NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

CREATE TABLE `pagamento` (
    `id_passageiro` SMALLINT NOT NULL ,
    `id_viagem` SMALLINT NOT NULL ,
    `pago` BOOLEAN NOT NULL DEFAULT 0,
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

--Valores de teste
--id a NULL porque está incrementar automaticamente
INSERT INTO `passageiro` (`id`, `nome`, `contacto`) VALUES
(NULL, 'Silvestre Serra', '910123456'),
(NULL, 'Álvaro Miranda', '910123456'),
(NULL, 'Mariano Rocha', '910123456'),
(NULL, 'Catarina Oliveira', '910123451'),
(NULL, 'Ricardo Almeida', '910123456'),
(NULL, 'Eduarda Santos', '910123456'),
(NULL, 'Leonardo Pereira', '910123456'),
(NULL, 'Beatriz Silva', '910123456'),
(NULL, 'Henrique Sousa', '910123456'),
(NULL, 'Isabel Mendes', '910123456'),
(NULL, 'António Fernandes', '910123451'),
(NULL, 'Carolina Martins', '910123456'),
(NULL, 'Gustavo Ribeiro', '910123456');

INSERT INTO `viagens` (`id_viagem`, `destino`, `partida`, `data_viagem`, `num_passageiros`, `custo_total`, `custo_unit`, `estado`, `observacoes`, `visibilidade`) VALUES 
(NULL, 'Faro', DEFAULT, '2023-12-15', 108, 600, 300, 'Cancelada', NULL, '1'),
(NULL, 'Braga', DEFAULT, '2024-03-05', DEFAULT, 750, 14, 'Agendada', NULL, '1'),
(NULL, 'Porto', 'Taveiro', '2024-03-10', 108, 750, 100, 'Confirmada', NULL, '1'),
(NULL, 'Lisboa', DEFAULT, '2024-04-01', 216, 800, 100, 'Agendada', NULL, '1'),
(NULL, 'Aveiro', DEFAULT, '2023-12-18', DEFAULT, 400, 15, 'Realizada', NULL, '1'),
(NULL, 'Porto', 'Taveiro', '2024-11-30', 216, 500, 100, 'Agendada', NULL, '1'),
(NULL, 'Évora', DEFAULT, '2024-10-25', DEFAULT, 780, 14.5, 'Agendada', NULL, '1'),
(NULL, 'Évora', DEFAULT, '2023-12-05', 108, 1020, 100, 'Realizada', NULL, '1'),
(NULL, 'Bragança', 'Condeixa', '2024-02-28', DEFAULT, 1100, 15.5, 'Confirmada', NULL, '1'),
(NULL, 'Porto', DEFAULT, '2024-06-10', 108, 700, 100, 'Agendada', NULL, '1'),
(NULL, 'Aveiro', 'Cernache', '2024-04-22', DEFAULT, 540, 16.5, 'Confirmada', NULL, '1'),
(NULL, 'Braga', DEFAULT, '2023-11-18', DEFAULT, 720, 13.5, 'Realizada', NULL, '1'),
(NULL, 'Lisboa', DEFAULT, '2024-07-15', 216, 825, 100, 'Agendada', NULL, '1'),
(NULL, 'Porto', 'Condeixa', '2024-03-05', 216, 717, 100, 'Agendada', NULL, '1'),
(NULL, 'Faro', DEFAULT, '2024-10-10', DEFAULT, 1245, 14, 'Agendada', NULL, '1');

INSERT INTO `pagamento` (`id_passageiro`, `id_viagem`, `pago`, `visibilidade`) VALUES 
('2', '9', '0', '1'),
('1', '9', '0', '1'),
('3', '9', '1', '1'),
('4', '9', '0', '1'),
('5', '9', '0', '1'),
('6', '9', '0', '1'),
('7', '9', '1', '1'),
('8', '9', '1', '1'),
('9', '9', '1', '1'),
('10', '9', '0', '1');
