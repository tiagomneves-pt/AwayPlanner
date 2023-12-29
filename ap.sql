-- Base de dados de suporte ao projecto

SET FOREIGN_KEY_CHECKS=0;

-- Estrutura da tabela 'viagens'
CREATE TABLE `viagens` (
    `id_viagem` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
    `destino` varchar(255) NOT NULL,
    `partida` varchar(255) NOT NULL DEFAULT 'Coimbra',
    `data_viagem` date NOT NULL,
    `num_passageiros` smallint(5) unsigned NOT NULL DEFAULT 54,
    `num_inscritos` smallint(5) unsigned NOT NULL DEFAULT 0,
    `custo_total` smallint(5) unsigned NOT NULL,
    `custo_unit` smallint(5) unsigned NOT NULL,
    `estado` varchar(10) NOT NULL, --Estado pode ser "Cancelada, Agendada, Confirmada, Realizada"
    `observacoes` varchar(512) DEFAULT NULL,
    PRIMARY KEY (`id_viagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

-- Estrutura da tabela 'passageiro'
CREATE TABLE `passageiro` (
    `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) NOT NULL,
    `contacto` varchar(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

CREATE TABLE `pagamento` (
    `id_passageiro` SMALLINT NOT NULL ,
    `id_viagem` SMALLINT NOT NULL ,
    `pago` BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (`id_passageiro`, `id_viagem`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

--Valores de teste
--id NULL porque está incrementar automaticamente
INSERT INTO `passageiro` (`id`, `nome`, `contacto`) VALUES
(NULL, 'Silvestre Serra', '910123456'),
(NULL, 'Álvaro Miranda', '910123456'),
(NULL, 'Mariano Rocha', '910123456');

INSERT INTO `viagens` (`id_viagem`, `destino`, `partida`, `data_viagem`, `num_passageiros`, `custo_total`, `custo_unit`, `estado`, `observacoes`) VALUES 
(NULL, 'Braga', 'Porto', '2024-01-07', '105', '550', '10', 'Agendada', NULL),
(NULL, 'Évora', DEFAULT, '2023-12-21', '23', '820', '17', 'Realizada', NULL),
(NULL, 'Ovar', DEFAULT, '2024-01-14', '54', '700', '13', 'Confirmada', 'Festival dos pães-de-ló');

