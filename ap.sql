-- Base de dados de suporte ao projecto

SET FOREIGN_KEY_CHECKS=0;

-- Estrutura da tabela 'viagens'
CREATE TABLE `viagens` (
    `id_viagem` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
    `destino` varchar(255) NOT NULL,
    `partida` varchar(255) NOT NULL DEFAULT 'Coimbra',
    `data_viagem` date NOT NULL,
    `num_passageiros` smallint(5) unsigned NOT NULL DEFAULT 54,
    `custo_total` smallint(5) unsigned NOT NULL,
    `custo_unit` smallint(5) unsigned NOT NULL,
    `estado` varchar(10) NOT NULL,
    `observacoes` varchar(512) DEFAULT NULL,
    PRIMARY KEY (`id_viagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci

-- Estrutura da tabela 'passageiro'
CREATE TABLE `passageiro` (
    `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) NOT NULL,
    `contacto` varchar(10) NOT NULL,
    `pago` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci



