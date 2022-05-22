-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para crednosso
CREATE DATABASE IF NOT EXISTS `crednosso` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `crednosso`;

-- Copiando estrutura para tabela crednosso.atms
CREATE TABLE IF NOT EXISTS `atms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atm` int(11) NOT NULL,
  `id_treasury` int(11) NOT NULL DEFAULT 0,
  `name_atm` varchar(150) NOT NULL,
  `shortened_name_atm` varchar(100) NOT NULL,
  `cass_A` int(11) DEFAULT 10,
  `cass_B` int(11) DEFAULT 20,
  `cass_C` int(11) DEFAULT 50,
  `cass_D` int(11) DEFAULT 100,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortened_name` (`shortened_name_atm`) USING BTREE,
  UNIQUE KEY `id_atm` (`id_atm`)
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.atms: ~242 rows (aproximadamente)
/*!40000 ALTER TABLE `atms` DISABLE KEYS */;
INSERT INTO `atms` (`id`, `id_atm`, `id_treasury`, `name_atm`, `shortened_name_atm`, `cass_A`, `cass_B`, `cass_C`, `cass_D`, `status`) VALUES
	(1, 1, 2, 'SUPER COHAMA 01', 'SUP COHAMA 01', 10, 20, 50, 100, 'Y'),
	(2, 2, 2, 'SUPER COHAMA 02', 'SUP COHAMA 02\r\n', 10, 20, 50, 100, 'Y'),
	(3, 3, 2, 'SUPER TURU 1', 'SUPER TURU 1', 10, 20, 50, 100, 'Y'),
	(4, 4, 2, 'SUPER TURU 2', 'SUPER TURU 2', 10, 20, 50, 100, 'Y'),
	(5, 5, 11, 'SUPER SANTA INES 1', 'S SANTA INES 1', 10, 20, 50, 100, 'Y'),
	(6, 6, 51, 'MIX MARABA 1', 'MIX MARABA 1', 10, 20, 50, 100, 'Y'),
	(7, 7, 51, 'MIX MARABA 2', 'MIX MARABA 2', 10, 20, 50, 100, 'Y'),
	(8, 8, 50, 'SUPER MARABA 1', 'SUPER MARABA 1', 10, 20, 50, 100, 'Y'),
	(9, 9, 11, 'MIX SANTA INES 1', 'M SANTA INES 1', 10, 20, 50, 100, 'Y'),
	(10, 10, 11, 'MIX SANTA INES 2', 'M SANTA INES 2', 10, 20, 50, 100, 'Y'),
	(11, 11, 8, 'CALHAU 1', 'CALHAU 1', 10, 20, 50, 100, 'Y'),
	(12, 12, 2, 'ATM SUPER RENASCENCA 1', 'S-RENASCENCA-1', 10, 20, 50, 100, 'N'),
	(13, 13, 5, 'ATM SUPER CAPIM DOURADO 01', 'S-CAPIM DOURA-1', 10, 20, 50, 100, 'N'),
	(14, 14, 8, 'MIX GUAJAJARAS 1', 'GUAJAJARAS-1', 10, 20, 50, 100, 'Y'),
	(15, 15, 8, 'SUPER COHATRAC 1', 'SUP COHATRAC 1', 10, 20, 50, 100, 'Y'),
	(16, 16, 8, 'MIX CURVA DO NOVENTA 1', 'M CURVA DO 90 1', 10, 20, 50, 100, 'Y'),
	(17, 17, 8, 'MIX MAIOBAO 01', 'MIX MAIOBAO 01', 10, 20, 50, 100, 'Y'),
	(18, 18, 2, 'MIX JOAO PAULO 1', 'JOAO PAULO-1', 10, 20, 50, 100, 'Y'),
	(19, 19, 8, 'CD 02 ARMAZEM BR 1', 'CD2-1', 10, 20, 50, 100, 'Y'),
	(20, 20, 8, 'MIX MAIOBAO 02', 'MIX MAIOBAO 02', 10, 20, 50, 100, 'Y'),
	(21, 21, 9, 'SUPER GOIAS 01', 'SUPER GOIAS 01', 10, 20, 50, 100, 'Y'),
	(22, 22, 9, 'SUPER MATEUS ACAILANDIA 1', 'S ACAILANDIA 1', 10, 20, 50, 100, 'Y'),
	(23, 23, 9, 'MIX BACURI 1', 'MIX BACURI 1', 10, 20, 50, 100, 'Y'),
	(24, 24, 9, 'CEARA 1', 'CEARA 1', 10, 20, 50, 100, 'Y'),
	(25, 25, 9, 'MIX TAMANDARE 1', 'MIX TAMANDARE 1', 10, 20, 50, 100, 'Y'),
	(26, 26, 7, 'HIPER BALSAS 1', 'HIPER BALSAS 1', 10, 20, 50, 100, 'Y'),
	(27, 27, 7, 'HIPER BALSAS 2', 'HIPER BALSAS 2', 10, 20, 50, 100, 'Y'),
	(28, 28, 9, 'SUPER MATEUS ACAILANDIA 2', 'S ACAILANDIA 2', 10, 20, 50, 100, 'Y'),
	(29, 29, 5, 'ATM SUPER CAPIM DOURADO 02', 'S-CAPIM DOURA-2', 10, 20, 50, 100, 'N'),
	(30, 30, 8, 'MIX GUAJAJARAS 2', 'GUAJAJARAS-2', 10, 20, 50, 100, 'Y'),
	(31, 31, 9, 'SUPER GOIAS 02', 'SUPER GOIAS 02', 10, 20, 50, 100, 'Y'),
	(32, 32, 8, 'CD 02 ARMAZEM BR 2', 'CD2-2', 10, 20, 50, 100, 'Y'),
	(33, 33, 8, 'CIDADE OPERARIA 1', 'CID OPERARIA 1', 10, 20, 50, 100, 'Y'),
	(34, 34, 9, 'MIX BACURI 2', 'MIX BACURI 2', 10, 20, 50, 100, 'Y'),
	(35, 35, 9, 'MIX TAMANDARE 2', 'MIX TAMANDARE 2', 10, 20, 50, 100, 'Y'),
	(36, 36, 2, 'COHAB 1', 'COHAB 1', 10, 20, 50, 100, 'Y'),
	(37, 37, 2, 'MIX JOAO PAULO 2', 'JOAO PAULO-2', 10, 20, 50, 100, 'Y'),
	(38, 38, 50, 'SUPER MARABA 2', 'SUPER MARABA 2', 10, 20, 50, 100, 'Y'),
	(39, 39, 2, 'CAJAZEIRAS 1', 'CAJAZEIRAS 1', 10, 20, 50, 100, 'Y'),
	(40, 40, 2, 'ATM SUPER JARACATY 1', 'S-JARACATY-1', 10, 20, 50, 100, 'N'),
	(41, 41, 2, 'TURU VELHO 1', 'TURU VELHO 1', 10, 20, 50, 100, 'Y'),
	(42, 42, 8, 'RIO ANIL 1', 'RIO ANIL 1', 10, 20, 50, 100, 'Y'),
	(43, 43, 9, 'CD87 IMPERATRIZ 01', 'CD87-01', 20, 50, 50, 100, 'Y'),
	(44, 44, 9, 'CD87 IMPERATRIZ 02', 'CD87-02', 10, 20, 50, 100, 'Y'),
	(45, 45, 40, 'SUPER PARAUAPEBAS 1', 'S PARAUAPEBAS 1', 10, 20, 50, 100, 'Y'),
	(46, 46, 40, 'SUPER PARAUAPEBAS 2', 'S PARAUAPEBAS 2', 10, 20, 50, 100, 'Y'),
	(47, 47, 2, 'SUPER COHAMA 03', 'SUP COHAMA 03', 10, 20, 50, 100, 'Y'),
	(48, 48, 8, 'PATIO NORTE 1', 'PATIO NORTE 1', 10, 20, 50, 100, 'Y'),
	(49, 49, 8, 'PATIO NORTE 2', 'PATIO NORTE 2', 10, 20, 50, 100, 'Y'),
	(50, 50, 8, 'RIO ANIL 2', 'RIO ANIL 2', 10, 20, 50, 100, 'Y'),
	(51, 51, 8, 'BACANGA 1', 'BACANGA 1', 10, 20, 50, 100, 'Y'),
	(52, 52, 8, 'BACANGA 2', 'BACANGA 2', 10, 20, 50, 100, 'Y'),
	(53, 53, 9, 'ATM SHOPPING IMPERIAL 1', 'S-S.IMPERIAL-1\r\n', 10, 20, 50, 100, 'N'),
	(54, 54, 9, 'ATM SHOPPING IMPERIAL 2', 'S-S.IMPERIAL-2', 10, 20, 50, 100, 'N'),
	(55, 55, 9, 'CEARA 2', 'CEARA 2', 10, 20, 50, 100, 'Y'),
	(56, 56, 11, 'SUPER SANTA INES 2', 'S SANTA INES 2', 10, 20, 50, 100, 'Y'),
	(57, 57, 7, 'MIX BALSAS 01', 'MIX BALSAS 01', 10, 20, 50, 100, 'Y'),
	(58, 58, 2, 'CAJAZEIRAS 2', 'CAJAZEIRAS 2', 10, 20, 50, 100, 'Y'),
	(59, 59, 8, 'MIX CURVA DO NOVENTA 2', 'M CURVA DO 90 2', 10, 20, 50, 100, 'Y'),
	(60, 60, 8, 'SUPER COHATRAC 2', 'SUP COHATRAC 2', 10, 20, 50, 100, 'Y'),
	(61, 61, 8, 'CALHAU 2', 'CALHAU 2', 10, 20, 50, 100, 'Y'),
	(62, 62, 2, 'ATM SUPER JARACATY 2', 'S-JARACATY-2', 10, 20, 50, 100, 'N'),
	(63, 63, 2, 'TURU VELHO 2', 'TURU VELHO 2', 10, 20, 50, 100, 'Y'),
	(64, 64, 2, 'COHAB 2', 'COHAB 2', 10, 20, 50, 100, 'Y'),
	(65, 65, 8, 'CIDADE OPERARIA 2', 'CID OPERARIA 2', 10, 20, 50, 100, 'Y'),
	(66, 66, 2, 'ATM SUPER RENASCENCA 2', 'S-RENASCENCA-2', 10, 20, 50, 100, 'N'),
	(67, 67, 7, 'MIX BALSAS 02', 'MIX BALSAS 02', 10, 20, 50, 100, 'Y'),
	(68, 68, 2, 'ADMINISTRATIVO COHAMA 01', 'ADM COHAMA 01', 20, 50, 50, 100, 'Y'),
	(69, 69, 15, 'SHOPPING SALINAS 01', 'SHOP SALINAS 01', 10, 20, 50, 100, 'Y'),
	(70, 70, 1, 'TOTEM SUPER COHAMA', 'TOTEM COHAMA', 10, 20, 50, 100, 'Y'),
	(71, 71, 1, 'TOTEM SUPER BALSAS 01', 'TOTEM S BALSAS1', 10, 20, 50, 100, 'Y'),
	(72, 72, 8, 'JARDIM TROPICAL 1', 'JD TROPICAL 1', 10, 20, 50, 100, 'Y'),
	(73, 73, 8, 'JARDIM TROPICAL 2', 'JD TROPICAL 2', 10, 20, 50, 100, 'Y'),
	(74, 74, 8, 'CD 02 ARMAZEM BR 3', 'CD2-3', 10, 20, 50, 100, 'Y'),
	(75, 75, 1, 'TOTEM MIX JOAO PAULO 1', 'TOTEM J. PAULO', 10, 20, 50, 100, 'Y'),
	(76, 76, 9, 'CD87 IMPERATRIZ 03', 'CD87-03', 10, 20, 50, 100, 'Y'),
	(77, 77, 8, 'SHOPPING DA ILHA 1', 'SHOP DA ILHA 1', 10, 20, 50, 100, 'Y'),
	(78, 78, 8, 'SHOPPING DA ILHA 2', 'SHOP DA ILHA 2', 10, 20, 50, 100, 'Y'),
	(79, 79, 1, 'TOTEM MIX GUAJAJARAS 1', 'T M GUAJAJARAS', 10, 20, 50, 100, 'Y'),
	(80, 80, 1, 'TOTEM S CAJAZEIRAS 1', 'T S CAJAZEIRAS', 10, 20, 50, 100, 'Y'),
	(81, 81, 1, 'TOTEM CD 87 1', 'T CD87 1', 10, 20, 50, 100, 'Y'),
	(82, 82, 8, 'MIX MAIOBAO 03', 'MIX MAIOBAO 03', 10, 20, 50, 100, 'Y'),
	(83, 83, 40, 'SUPER PARAUAPEBAS 3', 'S PARAUAPEBAS 3', 10, 20, 50, 100, 'Y'),
	(84, 84, 12, 'CD TERESINA 01', 'CD TERESINA 01', 10, 20, 50, 100, 'N'),
	(85, 85, 12, 'CD TERESINA 02', 'CD TERESINA 02', 10, 20, 50, 100, 'N'),
	(86, 86, 66, 'MIX TIMON 01', 'MIX TIMON 01', 10, 20, 50, 100, 'Y'),
	(87, 87, 66, 'MIX TIMON 02', 'MIX TIMON 02', 10, 20, 50, 100, 'Y'),
	(88, 88, 51, 'MIX MARABA 3', 'MIX MARABA 3', 10, 20, 50, 100, 'Y'),
	(89, 89, 41, 'ATM SUPER JADERLANDIA 01', 'S-JARDELANDI 01', 10, 20, 50, 100, 'Y'),
	(90, 90, 13, 'JADERLANDIA 02', 'JADERLANDIA 02', 10, 20, 50, 100, 'Y'),
	(91, 91, 48, 'JADERLANDIA 03', 'JADERLANDIA 03', 10, 20, 50, 100, 'Y'),
	(92, 92, 45, 'SUPER BELEM 01', 'SUPER BELEM 01', 10, 20, 50, 100, 'Y'),
	(93, 93, 45, 'SUPER BELEM 02', 'SUPER BELEM 02', 10, 20, 50, 100, 'Y'),
	(94, 94, 13, 'SUPER BELEM 03', 'SUPER BELEM 03', 10, 20, 50, 100, 'Y'),
	(95, 95, 36, 'SUPER CASTANHAL 01', 'S CASTANHAL 01\r\n', 10, 20, 50, 100, 'Y'),
	(96, 96, 36, 'SUPER CASTANHAL 02', 'S CASTANHAL 02', 10, 20, 50, 100, 'Y'),
	(97, 97, 2, 'ATM SUPER RENASCENCA 1', 'RENASCENCA-1', 10, 20, 50, 100, 'Y'),
	(98, 98, 2, 'ATM SUPER RENASCENCA 2', 'RENASCENCA-2', 10, 20, 50, 100, 'Y'),
	(99, 99, 8, 'MIX GUAJAJARAS 3', 'GUAJAJARAS-3', 10, 20, 50, 100, 'Y'),
	(100, 100, 36, 'SUPER CASTANHAL 03', 'S CASTANHAL 03', 10, 20, 50, 100, 'Y'),
	(101, 101, 9, 'SUPER GOIAS 03', 'SUPER GOIAS 03', 10, 20, 50, 100, 'Y'),
	(102, 102, 1, 'TOTEM SUPER COHAMA 02', 'TOTEM COHAMA 02', 10, 20, 50, 100, 'Y'),
	(103, 103, 15, 'MESSEJANA 01', 'MESSEJANA 01', 10, 20, 50, 100, 'Y'),
	(105, 104, 15, 'MESSEJANA 02', 'MESSEJANA 02', 10, 20, 50, 100, 'Y'),
	(106, 105, 15, 'SHOP EUSEBIO 01', 'SHOP EUSEBIO 01', 10, 20, 50, 100, 'Y'),
	(110, 106, 15, 'SHOP EUSEBIO 02', 'SHOP EUSEBIO 02', 10, 20, 50, 100, 'Y'),
	(111, 107, 42, 'MIX ALTAMIRA 01', 'MIX ALTAMIRA 01', 10, 20, 50, 100, 'Y'),
	(112, 108, 42, 'MIX ALTAMIRA 02', 'MIX ALTAMIRA 02', 10, 20, 50, 100, 'Y'),
	(113, 109, 13, 'CD BELEM 115 01', 'CD115-BELEM-01', 10, 20, 50, 100, 'Y'),
	(114, 110, 15, 'SHOPPING IANDE 01', 'SHOP IANDE 01', 10, 20, 50, 100, 'Y'),
	(115, 111, 15, 'SHOPPING IANDE 02', 'SHOP IANDE 02', 10, 20, 50, 100, 'Y'),
	(116, 112, 13, 'CD BELEM 115 02', 'CD115-BELEM-02', 10, 20, 50, 100, 'Y'),
	(117, 113, 44, 'SUPER MAGUARI 01', 'SUPER MAGUARI 01', 10, 20, 50, 100, 'Y'),
	(118, 114, 44, 'SUPER MAGUARI 02', 'SUPER MAGUARI 02', 10, 20, 50, 100, 'Y'),
	(119, 115, 8, 'CD ITAPERA 01', 'CD ITAPERA 01', 10, 20, 50, 100, 'Y'),
	(123, 116, 8, 'CD ITAPERA 02', 'CD ITAPERA 02', 10, 20, 50, 100, 'Y'),
	(124, 117, 46, 'SUPER MARAMBAIA 01', 'S MARAMBAIA 01', 10, 20, 50, 100, 'Y'),
	(125, 118, 46, 'SUPER MARAMBAIA 02', 'S MARAMBAIA 02', 10, 20, 50, 100, 'Y'),
	(126, 119, 7, 'HIPER BALSAS 3', 'HIPER BALSAS 3', 10, 20, 50, 100, 'Y'),
	(127, 120, 18, 'JACUNDA 01', 'JACUNDA 01', 10, 20, 50, 100, 'Y'),
	(128, 121, 18, 'BRD-JACUNDA 02', 'BRD-JACUNDA 02', 10, 20, 50, 100, 'Y'),
	(129, 122, 17, 'BRD-TUCUMA 02', 'BRD-TUCUMA 02', 10, 20, 50, 100, 'Y'),
	(130, 123, 17, 'BRD-TUCUMA 02', 'BRD-TUCUMA 02-1', 10, 20, 50, 100, 'Y'),
	(131, 124, 22, 'MIX PEDREIRAS 01', 'MIX PEDREIRAS 01', 10, 20, 50, 100, 'Y'),
	(132, 125, 22, 'MIX PEDREIRAS 02', 'MIX PEDREIRAS 02', 10, 20, 50, 100, 'Y'),
	(133, 126, 21, 'MIX CHAPADINHA 01', 'MIX CHAPADINHA 01', 10, 20, 50, 100, 'Y'),
	(134, 127, 21, 'MIX CHAPADINHA 02', 'MIX CHAPADINHA 02', 10, 20, 50, 100, 'Y'),
	(135, 128, 19, 'MIX BACABAL 01', 'BACABAL-01', 10, 20, 50, 100, 'Y'),
	(136, 129, 19, 'MIX BACABAL 02', 'BACABAL-02', 10, 20, 50, 100, 'Y'),
	(137, 130, 2, 'MIX JOAO PAULO 3', 'JOAO PAULO-3', 10, 20, 50, 100, 'Y'),
	(138, 131, 2, 'ADMINISTRATIVO COHAMA 02', 'ADM COHAMA 02', 20, 50, 50, 100, 'Y'),
	(139, 132, 2, 'SUPER COHAMA 04', 'SUP COHAMA 04', 10, 20, 50, 100, 'Y'),
	(140, 133, 34, 'MIX MATEUS ABAETETUBA 01', 'ABAETETUBA 01', 10, 20, 50, 100, 'Y'),
	(141, 134, 34, 'MIX MATEUS ABAETETUBA 02', 'ABAETETUBA 02', 10, 20, 50, 100, 'Y'),
	(142, 135, 35, 'ATM MIX CASTANHAL 01', 'MIX CASTANHAL 1', 10, 20, 50, 100, 'Y'),
	(143, 136, 35, 'ATM MIX CASTANHAL 02', 'MIX CASTANHAL 2', 10, 20, 50, 100, 'Y'),
	(144, 137, 33, 'ATM MIX PINHEIRO 01', 'MIX PINHEIRO 01', 10, 20, 50, 100, 'Y'),
	(145, 138, 33, 'ATM MIX PINHEIRO 02', 'MIX PINHEIRO 02', 10, 20, 50, 100, 'Y'),
	(146, 139, 2, 'SUPER COHAMA 05', 'SUP COHAMA 05', 10, 20, 50, 100, 'Y'),
	(147, 140, 8, 'CAMINO S J RIBAMAR 01', 'CAMINO SJR 01', 10, 20, 50, 100, 'Y'),
	(148, 141, 8, 'CAMINO S J RIBAMAR 02', 'CAMINO SJR 02', 10, 20, 50, 100, 'Y'),
	(149, 142, 6, 'SUPER GOIAS 04', 'SUPER GOIAS 04', 10, 20, 50, 100, 'N'),
	(150, 143, 6, 'SUPER GOIAS 05', 'SUPER GOIAS 05', 10, 20, 50, 100, 'N'),
	(151, 144, 8, 'MIX MAIOBAO 04', 'MIX MAIOBAO 04', 10, 20, 50, 100, 'N'),
	(152, 145, 8, 'MIX MAIOBAO 05', 'MIX MAIOBAO 05', 10, 20, 50, 100, 'N'),
	(153, 146, 7, 'MIX BALSAS 03', 'MIX BALSAS 03', 10, 20, 50, 100, 'Y'),
	(154, 150, 19, 'BRD-BACABAL 1', 'BRD-BACABAL 1', 10, 20, 50, 100, 'Y'),
	(155, 151, 21, 'BRD-CHAPADINHA 03', 'BRD-CHAPADINH 3', 10, 20, 50, 100, 'Y'),
	(156, 152, 9, 'MIX MATEUS ACAILANDIA 1', 'MIX ACAILANDIA1', 10, 20, 50, 100, 'Y'),
	(157, 153, 9, 'MIX MATEUS ACAILANDIA 2', 'MIX ACAILANDIA2', 10, 20, 50, 100, 'Y'),
	(158, 154, 26, 'BRD-NOVO COHATRAC 01', 'BRD-NOV COHA 01', 10, 20, 50, 100, 'Y'),
	(159, 155, 8, 'NOVO COHATRAC 02', 'NOVOCOHATRAC 02', 10, 20, 50, 100, 'Y'),
	(160, 156, 43, 'MIX ATACAREJO MARITUBA 01', 'MIX MARITUBA 01', 10, 20, 50, 100, 'Y'),
	(161, 157, 43, 'MIX ATACAREJO MARITUBA 02', 'MIX MARITUBA 02', 10, 20, 50, 100, 'Y'),
	(162, 158, 8, 'BRD-SUPER MATEUS ANIL 01', 'BRD-SUP ANIL 01', 10, 20, 50, 100, 'Y'),
	(163, 159, 8, 'SUPER MATEUS ANIL 02', 'SUP ANIL 02', 10, 20, 50, 100, 'Y'),
	(164, 160, 20, 'MIX ATACAREJO CAXIAS 01', 'MIX CAXIAS 01', 10, 20, 50, 100, 'Y'),
	(165, 161, 20, 'MIX ATACAREJO CAXIAS 02', 'MIX CAXIAS 02', 10, 20, 50, 100, 'Y'),
	(166, 162, 20, 'BRD-CAXIAS 03', 'BRD-CAXIAS 03', 10, 20, 50, 100, 'Y'),
	(167, 163, 22, 'BRD-PEDREIRAS 03', 'BRD-PEDREIRAS 03', 10, 20, 50, 100, 'Y'),
	(168, 164, 41, 'MIX PARAUAPEBAS 01', 'M PARAUAPEBAS 1', 10, 20, 50, 100, 'Y'),
	(169, 165, 41, 'MIX PARAUAPEBAS 02', 'M PARAUAPEBAS 2', 10, 20, 50, 100, 'Y'),
	(170, 166, 47, 'MIX INFRAERO 01', 'MIX INFRAERO 01', 10, 20, 50, 100, 'Y'),
	(171, 167, 47, 'MIX INFRAERO 02', 'MIX INFRAERO 02', 10, 20, 50, 100, 'Y'),
	(172, 168, 9, 'CD87 IMPERATRIZ 04', 'CD87-04', 10, 20, 50, 100, 'Y'),
	(173, 169, 12, 'MIX TERESINA 01', 'MIX TERESINA 01', 10, 20, 50, 100, 'N'),
	(174, 170, 12, 'MIX TERESINA 02', 'MIX TERESINA 02', 10, 20, 50, 100, 'N'),
	(175, 171, 8, 'MIX ARACAGI 01', 'MIX ARACAGI 01', 10, 20, 50, 100, 'Y'),
	(176, 172, 8, 'BRD -MIX ARACAGY 02', 'BRD-MIX ARACAGY', 10, 20, 50, 100, 'Y'),
	(177, 173, 23, 'MIX PARNAIBA 01', 'MIX PARNAIBA 01', 10, 20, 50, 100, 'Y'),
	(178, 174, 23, 'MIX PARNAIBA 02', 'MIX PARNAIBA 02', 10, 20, 50, 100, 'Y'),
	(179, 175, 23, 'BRD-MIX PARNAIBA 03', 'BRD-PARNAIBA 03', 10, 20, 50, 100, 'Y'),
	(180, 176, 24, 'BRD-CAMINO CONCEICAO DO ARAGUAIA', 'BRD-CAMI C ARAG', 10, 20, 50, 100, 'Y'),
	(181, 177, 27, 'BRD-MIX BABACULANDIA 01', 'BRD-BABACULA 01', 10, 20, 50, 100, 'Y'),
	(182, 178, 27, 'MIX BABACULANDIA 02', 'MIX BABACULA 02', 10, 20, 50, 100, 'Y'),
	(183, 179, 28, 'SUPER CODO 01', 'SUP CODO 01', 10, 20, 50, 100, 'Y'),
	(184, 180, 28, 'BRD-SUPER CODO 02', 'BRD-SUPER CODO 02', 10, 20, 50, 100, 'Y'),
	(185, 181, 29, 'CAMINO GRAJAU 01', 'CAMINO GRAJAU 01', 10, 20, 50, 100, 'Y'),
	(186, 182, 8, 'MIX FORQUILHA 01', 'MIX FORQUILHA 01', 10, 20, 50, 100, 'Y'),
	(187, 183, 8, 'BRD-MIX FORQUILHA 02', 'BRD-MIX FORQ 02', 10, 20, 50, 100, 'Y'),
	(188, 184, 12, 'CD 101 THE - 01', 'CD 101 THE - 01', 10, 20, 50, 100, 'Y'),
	(189, 185, 12, 'CD 101 THE - 02', 'CD 101 THE - 02', 10, 20, 50, 100, 'Y'),
	(190, 186, 17, 'TUCUMA 03', 'TUCUMA 03', 10, 20, 50, 100, 'Y'),
	(192, 187, 6, 'SUPER MATEUS ACAILANDIA 1', 'S ACAILANDIA 1-1', 10, 20, 50, 100, 'N'),
	(193, 188, 6, 'SUPER MATEUS ACAILANDIA 2', 'S ACAILANDIA 2-2', 10, 20, 50, 100, 'N'),
	(194, 189, 65, 'MIX TERESINA 003', 'MIX TERESINA 03', 10, 20, 50, 100, 'Y'),
	(195, 190, 30, 'MIX NOVA MARABA 1', 'NOVA MARABA 1', 10, 20, 50, 100, 'Y'),
	(197, 191, 30, 'BRD MIX NOVA MARABA 2', 'NOVA MARABA 2', 10, 20, 50, 100, 'Y'),
	(198, 192, 31, 'SUP TAILANDIA O1', 'SUP TAILANDIA O1', 10, 20, 50, 100, 'Y'),
	(199, 193, 31, 'BRD-SUP TAILANDIA 02', 'BRD-SUP TAILA 2', 10, 20, 50, 100, 'Y'),
	(200, 194, 32, 'BRD-SUP COQUEIRO 01', 'BRD-SUP COQUE 1', 10, 20, 50, 100, 'Y'),
	(201, 195, 32, 'SUP COQUEIRO 02', 'SUP COQUEIRO 02', 10, 20, 50, 100, 'Y'),
	(202, 196, 37, 'MIX P DUTRA 1', 'MIX P DUTRA 1', 10, 20, 50, 100, 'Y'),
	(203, 197, 37, 'BRD-MIX P DUTRA 2', 'BRD-MIX P DUT 2', 10, 20, 50, 100, 'Y'),
	(204, 198, 38, 'SUPER BARCARENA 01', 'S BARCARENA 1', 10, 20, 50, 100, 'Y'),
	(205, 199, 38, 'BRD-S BARCARENA 02', 'S BARCARENA 2', 10, 20, 50, 100, 'Y'),
	(206, 200, 39, 'MIX CAPANEMA 01', 'MIX CAPANEMA 01', 10, 20, 50, 100, 'Y'),
	(207, 201, 39, 'BRD-MIX CAPANEMA 02', 'MIX CAPANEMA 02', 10, 20, 50, 100, 'Y'),
	(208, 202, 52, 'MIX CEASA 01', 'MIX CEASA 01', 10, 20, 50, 100, 'Y'),
	(209, 203, 52, 'BRD - MIX CEASA 02', 'BRD-MIX CEASA 2', 10, 20, 50, 100, 'Y'),
	(210, 204, 53, 'SUPER BARRA DO CORDA 1', 'S BARRA CORDA 1', 10, 20, 50, 100, 'Y'),
	(211, 205, 53, 'BRD - SUPER BARRA DO CORDA 2', 'BRD-B CORDA 2', 10, 20, 50, 100, 'Y'),
	(212, 206, 55, 'MIX REDENCAO 01', 'MIX REDENCAO 01', 10, 20, 50, 100, 'Y'),
	(213, 207, 54, 'RECICLA COHAMA 06', 'RECI COHAMA 06', 10, 20, 50, 100, 'Y'),
	(214, 208, 56, 'CAMINO BARREIRINHAS 01', 'BARREIRINHAS 1', 10, 20, 50, 100, 'Y'),
	(215, 209, 57, 'SUPER BURITICUPU 01', 'S BURITICUPU 01', 10, 20, 50, 100, 'Y'),
	(216, 210, 14, 'CD 331 SANTA ISABEL 01', 'CD331 S ISABE 1', 10, 20, 50, 100, 'N'),
	(217, 211, 14, 'CD 331 SANTA ISABEL 02', 'CD331 S ISABE 2', 10, 20, 50, 100, 'N'),
	(218, 212, 58, 'MIX TUCURUI 01', 'MIX TUCURUI 01', 10, 20, 50, 100, 'Y'),
	(219, 213, 59, 'MIX MATEUS TIANGUA 01', 'MIX TIANGUA 01', 10, 20, 50, 100, 'Y'),
	(220, 214, 14, 'CD 331 SANTA ISABEL 03', 'CD331 S ISABE 3', 10, 20, 50, 100, 'Y'),
	(221, 215, 14, 'CD 331 SANTA ISABEL 04\r\n', 'CD331 S ISABE 4', 10, 20, 50, 100, 'Y'),
	(222, 216, 60, 'MIX MARIO COVAS 01', 'M MARIO COVAS 1', 10, 20, 50, 100, 'Y'),
	(223, 217, 61, 'MIX FLORIANO 01', 'MIX FLORIANO 01', 10, 20, 50, 100, 'Y'),
	(224, 218, 62, 'MIX SOBRAL 01', 'MIX SOBRAL 01', 10, 20, 50, 100, 'Y'),
	(225, 219, 8, 'CD ITAPERA 03', 'CD ITAPERA 03', 10, 20, 50, 100, 'Y'),
	(226, 220, 64, 'SUPER PIRIPIRI 01', 'SUPER PIRIPIRI 01', 10, 20, 50, 100, 'Y'),
	(227, 221, 2, 'ADMINISTRATIVO 02 COHAMA 01', 'ADM02 COHAMA 1', 20, 50, 50, 100, 'Y'),
	(228, 222, 67, 'CD335 CABO STO AGOSTINHO 01', 'CD335 S AGOST 1', 10, 20, 50, 100, 'Y'),
	(229, 223, 67, 'CD335 CABO STO AGOSTINHO 02', 'CD335 S AGOST 2', 10, 20, 50, 100, 'Y'),
	(230, 224, 71, 'MIX PARAGOMINAS 01', 'M PARAGOMINAS 1', 10, 20, 50, 100, 'Y'),
	(231, 225, 70, 'SUPER ESTREITO 01', 'S ESTREITO 01', 10, 20, 50, 100, 'Y'),
	(232, 226, 69, 'SUPER CANAA DOS CARAJAS 01', 'SUPER CANAA 01', 10, 20, 50, 100, 'Y'),
	(233, 227, 68, 'MIX BRAGANCA 01', 'MIX BRAGANCA 01', 10, 20, 50, 100, 'Y'),
	(234, 228, 2, 'SUPER COHAMA 07', 'SUP COHAMA 07', 10, 20, 50, 100, 'N'),
	(235, 229, 72, 'MIX TIMON ALVORADA 01', 'MIX ALVORADA 01', 10, 20, 50, 100, 'Y'),
	(236, 230, 69, 'SUPER CANAA DOS CARAJAS 02', 'SUPER CANAA 02', 10, 20, 50, 100, 'Y'),
	(237, 231, 68, 'MIX BRAGANCA 02', 'MIX BRAGANCA 02', 10, 20, 50, 100, 'Y'),
	(238, 232, 73, 'MIX JUAZEIRO 01', 'MIX JUAZEIRO 01', 10, 20, 50, 100, 'Y'),
	(239, 233, 73, 'MIX JUAZEIRO 02', 'MIX JUAZEIRO 02', 10, 20, 50, 100, 'Y'),
	(240, 234, 70, 'MIX PETROLINA 01', 'MIX PETROLINA 01', 10, 20, 50, 100, 'Y'),
	(241, 235, 70, 'MIX PETROLINA 02', 'MIX PETROLINA 02', 10, 20, 50, 100, 'Y'),
	(242, 236, 75, 'CD 336 FEIRA DE SANTANA 01', 'CD336 SANTANA 1', 10, 20, 50, 100, 'Y'),
	(243, 237, 75, 'CD 336 FEIRA DE SANTANA 02', 'CD336 SANTANA 2', 10, 20, 50, 100, 'Y'),
	(244, 238, 8, 'MIX MAIOBAO UBATUBA 01', 'MIX UBATUBA 01', 10, 20, 50, 100, 'Y'),
	(245, 239, 8, 'MIX MAIOBAO UBATUBA 02', 'MIX UBATUBA 02', 10, 20, 50, 100, 'Y'),
	(246, 240, 76, 'MIX MATEUS BENGUI 01', 'MIX BENGUI 01', 10, 20, 50, 100, 'Y'),
	(247, 241, 76, 'MIX MATEUS BENGUI 02', 'MIX BENGUI 02', 10, 20, 50, 100, 'Y'),
	(248, 242, 77, 'MIX TEIXEIRA DE FREITAS 01', 'MIX TEIXEIRA 01', 10, 20, 50, 100, 'Y'),
	(249, 243, 77, 'MIX TEIXEIRA DE FREITAS 02', 'MIX TEIXEIRA 02', 10, 20, 50, 100, 'Y'),
	(250, 244, 73, 'MIX ITAPIPOCA 01', 'MIX ITAPIPOCA 01', 10, 20, 50, 100, 'Y'),
	(251, 245, 73, 'MIX ITAPIPOCA 02', 'MIX ITAPIPOCA 02', 10, 20, 50, 100, 'Y');
/*!40000 ALTER TABLE `atms` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.authorized_token
CREATE TABLE IF NOT EXISTS `authorized_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL DEFAULT '0',
  `datetime_access` datetime DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.authorized_token: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `authorized_token` DISABLE KEYS */;
INSERT INTO `authorized_token` (`id`, `id_user`, `token`, `datetime_access`, `active`) VALUES
	(42, 1, '$2y$10$SaAvGaZB2g9v7/BczmthTuMrXjx/VIWz11RvH5OJPdPKwMI0bm51.', '2021-10-02 20:11:41', 'N'),
	(43, 1, '$2y$10$0kwQaUMnr1z/xVH6vGTVZ.0OXHTbFRIwdvEq3z01KMMjbuS.d2N3O', '2021-10-02 20:11:54', 'N'),
	(44, 1, '$2y$10$GyjBqZhaTdPgWh6r94xNo.auqhSWrdKEi0qrAlfFZy9Zf1NzEU8N.', '2021-10-02 23:51:06', 'N'),
	(45, 1, '$2y$10$GHN1nfXsmaQbmYGzkV9Guu5Y9.JiRTHWrRqQJwYe6G5D3a5nSEQTW', '2021-10-03 10:23:50', 'N'),
	(46, 1, '$2y$10$rgZhMDl2GerO8eki4ceS6.O/1r25pnUnvC3mRrXX0KKn.Cq9Z7AsG', '2021-10-03 10:27:30', 'N'),
	(47, 1, '$2y$10$sqyOr53q36erDT0k8SnY5.yz2WVEZxpDEM4SwOAKeqE4NEb2QCj2u', '2021-10-04 09:33:23', 'N'),
	(48, 1, '$2y$10$/oA5ILkWNBuiOwGxtAcxfek2Jxz/8mwZ7mCyizghEpkbJco9YlulG', '2021-10-04 19:45:20', 'N'),
	(49, 1, '$2y$10$XwxCiKwz7dIQBKCJ13ezPOPxKlGqq5Teue1KVXOEdQBf4NtT6Mu3y', '2021-10-06 11:58:50', 'N'),
	(50, 1, '$2y$10$hQgc5YUubOKCMpUzL9I.dudQaLrqqz0RzZAEgYAFTlboyY/e8FXXq', '2021-10-06 15:09:22', 'N'),
	(51, 1, '$2y$10$4HvyMvmMUnZaNQhra1fN7ujU4jPs.R9PifdkrUaPEfrWXRXYwa8QG', '2021-10-06 22:27:28', 'N'),
	(52, 1, '$2y$10$mJjcqqOBp9soyRECSIahhedUNcGfWOMLlliq3opWkQJ9BpBT.pYJS', '2021-10-11 22:43:21', 'N'),
	(53, 1, '$2y$10$4DBDZnOtOiu4L6lBiOH/Demz00Wr5nTfogjwLzLWroq2CVQEsv2u2', '2021-10-12 10:32:19', 'Y');
/*!40000 ALTER TABLE `authorized_token` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.batchs
CREATE TABLE IF NOT EXISTS `batchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) DEFAULT NULL,
  `batch` varchar(100) DEFAULT NULL,
  `date_batch` date DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.batchs: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `batchs` DISABLE KEYS */;
INSERT INTO `batchs` (`id`, `id_type`, `batch`, `date_batch`, `status`) VALUES
	(1, 1, '1649163903', NULL, 1),
	(2, 1, '02000062880d26cd7cb', '2022-05-20', 1),
	(3, 1, '0210006288ec6cc38c1', '2022-05-21', 1);
/*!40000 ALTER TABLE `batchs` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.batch_statuss
CREATE TABLE IF NOT EXISTS `batch_statuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.batch_statuss: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `batch_statuss` DISABLE KEYS */;
INSERT INTO `batch_statuss` (`id`, `name`, `status`) VALUES
	(1, 'open', 'Y'),
	(2, 'close', 'Y'),
	(3, 'paused', 'Y');
/*!40000 ALTER TABLE `batch_statuss` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.contestations
CREATE TABLE IF NOT EXISTS `contestations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `card` varchar(16) DEFAULT NULL,
  `num_contest_system` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` set('mateus','bradesco') DEFAULT 'mateus',
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status` set('open','close') NOT NULL DEFAULT 'open',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.contestations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `contestations` DISABLE KEYS */;
INSERT INTO `contestations` (`id`, `name`, `card`, `num_contest_system`, `date`, `type`, `active`, `status`) VALUES
	(17, 'DAYSE MIRANDA', '6312919951285052', '453591', '2022-04-22', 'mateus', 'Y', 'open'),
	(27, 'Doidao Sim', '6312457896587451', '52154', '2011-01-11', 'mateus', 'Y', 'open');
/*!40000 ALTER TABLE `contestations` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(200) DEFAULT NULL,
  `id_contestation` int(11) DEFAULT 0,
  `path_image` varchar(200) DEFAULT NULL,
  `hash` varchar(200) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.images: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `path`, `id_contestation`, `path_image`, `hash`, `active`) VALUES
	(54, '02e74f10e0327ad868d138f2b4fdd6f0', 27, 'caixa crednosso part. 1', '25981d834ac845951e2b00d0fa87c44d.avi', 'N'),
	(55, '02e74f10e0327ad868d138f2b4fdd6f0', 27, 'caixa crednosso part.2', '120c326234bf5b3a5df014bc9bbee260.avi', 'N'),
	(56, '02e74f10e0327ad868d138f2b4fdd6f0', 27, 'caixa crednosso part.3', '35a3dd5fc0c5a58a8cebd52ac021fab8.avi', 'Y'),
	(58, '02e74f10e0327ad868d138f2b4fdd6f0', 27, 'Novo Documento de Texto', '472731b33e78d174ca5f3ec3bd7b7d4c.txt', 'N');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.input_type
CREATE TABLE IF NOT EXISTS `input_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.input_type: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `input_type` DISABLE KEYS */;
INSERT INTO `input_type` (`id`, `name`) VALUES
	(3, 'Abastecimento'),
	(4, 'Criação'),
	(1, 'Entrada'),
	(2, 'Saida');
/*!40000 ALTER TABLE `input_type` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.log_treasury
CREATE TABLE IF NOT EXISTS `log_treasury` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shipping` int(11) NOT NULL,
  `id_input_type` int(11) NOT NULL,
  `value_process` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.log_treasury: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `log_treasury` DISABLE KEYS */;
INSERT INTO `log_treasury` (`id`, `id_shipping`, `id_input_type`, `value_process`, `date`, `active`) VALUES
	(1, 1, 1, NULL, '0000-00-00 00:00:00', 'Y'),
	(2, 1, 1, NULL, '0000-00-00 00:00:00', 'Y'),
	(3, 1, 1, NULL, '2022-05-09 02:09:34', 'Y'),
	(4, 1, 1, NULL, '2022-05-09 02:09:34', 'Y'),
	(5, 1, 1, NULL, '2022-05-09 02:12:51', 'Y'),
	(6, 1, 1, NULL, '2022-05-09 02:13:00', 'Y'),
	(7, 1, 1, NULL, '2022-05-09 02:13:32', 'Y'),
	(8, 1, 1, 100, '2022-05-09 02:19:26', 'Y'),
	(9, 1, 2, 500, '2022-05-09 02:19:45', 'Y'),
	(10, 1, 1, 18000, '2022-05-10 02:17:58', 'Y'),
	(11, 1, 1, 36000, '2022-05-10 02:18:30', 'Y'),
	(12, 1, 2, 18000, '2022-05-10 03:42:00', 'Y'),
	(13, 1, 1, 18000, '2022-05-10 03:42:17', 'Y');
/*!40000 ALTER TABLE `log_treasury` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.operation_types
CREATE TABLE IF NOT EXISTS `operation_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.operation_types: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `operation_types` DISABLE KEYS */;
INSERT INTO `operation_types` (`id`, `name`, `active`) VALUES
	(1, 'Transferencia entre custodia', 'Y'),
	(2, 'Retirada loja', 'Y'),
	(3, 'Entre tesourarias', 'Y'),
	(4, 'Santander', 'Y'),
	(5, 'Seret BB', 'Y');
/*!40000 ALTER TABLE `operation_types` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.order_types
CREATE TABLE IF NOT EXISTS `order_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.order_types: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `order_types` DISABLE KEYS */;
INSERT INTO `order_types` (`id`, `name`, `active`) VALUES
	(1, 'eventual', 'Y'),
	(2, 'folha', 'Y');
/*!40000 ALTER TABLE `order_types` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_batch` int(11) DEFAULT NULL,
  `id_operation_type` int(11) NOT NULL DEFAULT 0,
  `id_order_type` int(11) NOT NULL,
  `id_status` int(11) DEFAULT 1,
  `id_origin` int(11) NOT NULL,
  `id_destiny` int(11) NOT NULL,
  `date_request` date NOT NULL,
  `qt_10` int(11) DEFAULT NULL,
  `qt_20` int(11) DEFAULT NULL,
  `qt_50` int(11) DEFAULT NULL,
  `qt_100` int(11) DEFAULT NULL,
  `value_total` float DEFAULT 0,
  `confirmed_value` float DEFAULT 0,
  `change_in_confirmation` enum('Y','N') DEFAULT 'N',
  `note` text DEFAULT NULL,
  `active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.requests: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`, `id_batch`, `id_operation_type`, `id_order_type`, `id_status`, `id_origin`, `id_destiny`, `date_request`, `qt_10`, `qt_20`, `qt_50`, `qt_100`, `value_total`, `confirmed_value`, `change_in_confirmation`, `note`, `active`) VALUES
	(41, 1, 2, 1, 1, 56, 0, '2022-04-05', 100, 100, 100, 100, 0, 0, 'N', '', 'Y'),
	(42, 1, 2, 1, 1, 76, 0, '2022-04-05', 200, 200, 200, 200, 0, 0, 'N', 'sem OBS', 'Y'),
	(43, 2, 2, 1, 1, 20, 0, '2022-05-20', 100, 100, 100, 100, 18, 0, 'N', '', 'Y'),
	(45, 3, 2, 1, 2, 21, 0, '2022-05-21', 100, 100, 100, 100, 18000, 18000, 'N', 'sem', 'Y'),
	(46, 3, 2, 1, 1, 23, 0, '2022-05-21', 100, 200, 300, 200, 40000, 0, 'N', 'mais testes', 'Y'),
	(66, 3, 1, 1, 2, 8, 2, '2022-05-21', 100, 200, 100, 200, 30000, 30000, 'N', '', 'Y'),
	(67, 3, 3, 1, 1, 8, 2, '2022-05-21', 100, 200, 100, 200, 30000, 0, 'N', '', 'Y'),
	(68, 3, 2, 1, 1, 17, 0, '2022-05-21', 100, 200, 100, 200, 30000, 30000, 'N', '', 'Y');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.request_statuss
CREATE TABLE IF NOT EXISTS `request_statuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.request_statuss: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `request_statuss` DISABLE KEYS */;
INSERT INTO `request_statuss` (`id`, `name`, `status`) VALUES
	(1, 'aberto', 'Y'),
	(2, 'confirmado', 'Y'),
	(3, 'pago', 'Y'),
	(4, 'relançado', 'Y'),
	(5, 'cancelado', 'Y');
/*!40000 ALTER TABLE `request_statuss` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.shippings
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shipping` int(11) DEFAULT NULL,
  `name_shipping` varchar(100) DEFAULT NULL,
  `emails` text DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_shipping` (`id_shipping`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.shippings: ~80 rows (aproximadamente)
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
INSERT INTO `shippings` (`id`, `id_shipping`, `name_shipping`, `emails`, `active`) VALUES
	(1, 1, 'MATEUS SUPERMERCADOS', 'taricisio.silva@crednosso.com.br', 'Y'),
	(2, 2, 'PROSEGUR SAO LUIS', NULL, 'Y'),
	(3, 3, 'PROSEGUR MARABA', NULL, 'Y'),
	(4, 4, 'PROSEGUR BACABAL', NULL, 'Y'),
	(5, 5, 'PROFORT', NULL, 'Y'),
	(6, 6, 'PROSEGUR IMPERATRIZ', NULL, 'Y'),
	(7, 7, 'CEFOR BALSAS', NULL, 'Y'),
	(8, 8, 'CEFOR SAO LUIS', NULL, 'Y'),
	(9, 9, 'CEFOR IMPERATRIZ', NULL, 'Y'),
	(10, 10, 'PROSEGUR PARAUAPEBAS', NULL, 'Y'),
	(11, 11, 'CEFOR BACABAL', NULL, 'Y'),
	(12, 12, 'PROSEGUR TERESINA', NULL, 'Y'),
	(13, 13, 'PROSEGUR BELEM', NULL, 'Y'),
	(14, 14, 'PROSEGUR CASTANHAL', NULL, 'Y'),
	(15, 15, 'PROSEGUR FORTALEZA', NULL, 'Y'),
	(16, 16, 'PROSEGUR ALTAMIRA', NULL, 'Y'),
	(17, 17, 'BRD CAMINO TUCUMA', NULL, 'Y'),
	(18, 18, 'BRD CAMINO JACUNDA', NULL, 'Y'),
	(19, 19, 'BRD BACABAL', NULL, 'Y'),
	(20, 20, 'BRD MIX CAXIAS', NULL, 'Y'),
	(21, 21, 'BRD CHAPADINHA', NULL, 'Y'),
	(22, 22, 'BRD PEDREIRAS', NULL, 'Y'),
	(23, 23, 'BRD PARNAIBA', NULL, 'Y'),
	(24, 24, 'BRD CONCEICAO DO ARAGUAIA', NULL, 'Y'),
	(25, 25, 'PROSEGUR PARNAIBA', NULL, 'Y'),
	(26, 26, 'BRD NOVO SUPER COHATRAC', NULL, 'Y'),
	(27, 27, 'BRD BABAÇULANDIA', NULL, 'Y'),
	(28, 28, 'BRD MATEUS CODO', NULL, 'Y'),
	(29, 29, 'BRD CAMINO GRAJAU', NULL, 'Y'),
	(30, 30, 'BRD NOVA MARABA', NULL, 'Y'),
	(31, 31, 'BRD TAILANDIA', NULL, 'Y'),
	(32, 32, 'BRD COQUEIRO', NULL, 'Y'),
	(33, 33, 'BRD PINHEIRO', NULL, 'Y'),
	(34, 34, 'BRD ABAETETUBA', NULL, 'Y'),
	(35, 35, 'BRD MIX CASTANHAL', NULL, 'Y'),
	(36, 36, 'BRD SUPER CASTANHAL', NULL, 'Y'),
	(37, 37, 'BRD PRESIDENTE DUTRA', NULL, 'Y'),
	(38, 38, 'BRD BARCARENA', NULL, 'Y'),
	(39, 39, 'BRD CAPANEMA', NULL, 'Y'),
	(40, 40, 'BRD PARAUAPEBAS 28', NULL, 'Y'),
	(41, 41, 'BRD PARAUAPEBAS 254', NULL, 'Y'),
	(42, 42, 'BRD ALTAMIRA', NULL, 'Y'),
	(43, 43, 'BRD MARITUBA', NULL, 'Y'),
	(44, 44, 'BRD MAGUARI', NULL, 'Y'),
	(45, 45, 'BRD SUPER BELEM', NULL, 'Y'),
	(46, 46, 'BRD MARAMBAIA', NULL, 'Y'),
	(47, 47, 'BRD INFRAERO', NULL, 'Y'),
	(48, 48, 'BRD JARDELANDIA', NULL, 'Y'),
	(49, 49, 'BRD SUPER BELEM', NULL, 'N'),
	(50, 50, 'BRD SUPER MARABA', NULL, 'Y'),
	(51, 51, 'BRD MIX MARABA', NULL, 'Y'),
	(52, 52, 'BRD MIX CEASA', NULL, 'Y'),
	(53, 53, 'BRD BARRA DO CORDA', NULL, 'Y'),
	(54, 54, 'COHAMA - RECICLADORA', NULL, 'Y'),
	(55, 55, 'BRD REDENÇÃO', NULL, 'Y'),
	(56, 56, 'BRD BARREIRINHAS CAMINO', NULL, 'Y'),
	(57, 57, 'BRD BURITICUPU', NULL, 'Y'),
	(58, 58, 'BRD MIX TUCURUI', NULL, 'Y'),
	(59, 59, 'BRD TIANGUA', NULL, 'Y'),
	(60, 60, 'BRD MARIO COVAS', NULL, 'Y'),
	(61, 61, 'BRD MIX FLORIANO', NULL, 'Y'),
	(62, 62, 'BRD MIX SOBRAL', NULL, 'Y'),
	(63, 63, 'TESTE', NULL, 'N'),
	(64, 64, 'SUPER PIRIPIRI', NULL, 'Y'),
	(65, 65, 'MIX TERESINA', NULL, 'Y'),
	(66, 66, 'MIX TIMON', NULL, 'Y'),
	(68, 67, 'PRESERV - RECIFE', NULL, 'Y'),
	(69, 68, 'MIX BRAGANCA', NULL, 'Y'),
	(71, 69, 'SUPER CANAA DOS CARAJAS', NULL, 'Y'),
	(72, 70, 'SUPER ESTREITO', NULL, 'Y'),
	(73, 71, 'MIX PARAGOMINAS', NULL, 'Y'),
	(74, 72, 'MIX TIMON ALVORADA', NULL, 'Y'),
	(75, 73, 'MIX JUAZEIRO', NULL, 'Y'),
	(76, 74, 'MIX PETROLINA', NULL, 'Y'),
	(77, 75, 'PROSEGUR FEIRA DE SANTANA', NULL, 'Y'),
	(78, 76, 'MIX BENGUI', NULL, 'Y'),
	(79, 77, 'TEXEIRA DE FREITAS', NULL, 'Y'),
	(80, 78, 'MIX ITAPIPOCA', NULL, 'Y'),
	(81, 444, 'SANTANDER', 'TARCISIO.SILVA@CREDNOSSO.COM.BR', 'Y'),
	(82, 555, 'SERET BB', 'DILLAN.SOUSA@CREDNOSSO.COM.BR', 'Y');
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.treasurys
CREATE TABLE IF NOT EXISTS `treasurys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_shipping` int(11) NOT NULL,
  `a_10` int(11) DEFAULT 0,
  `b_20` int(11) DEFAULT 0,
  `c_50` int(11) DEFAULT 0,
  `d_100` int(11) DEFAULT 0,
  `balance` float NOT NULL DEFAULT 0,
  `status` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_shipping` (`id_shipping`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.treasurys: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `treasurys` DISABLE KEYS */;
INSERT INTO `treasurys` (`id`, `id_shipping`, `a_10`, `b_20`, `c_50`, `d_100`, `balance`, `status`) VALUES
	(1, 1, 0, 0, 0, 0, 0, 'Y'),
	(2, 2, 100, 200, 100, 200, 30000, 'Y'),
	(4, 21, 200, 200, 200, 200, 36000, 'Y'),
	(5, 23, 100, 200, 300, 200, 40000, 'Y'),
	(12, 8, 0, 0, 0, 0, 0, 'Y'),
	(13, 17, 0, 0, 0, 0, 0, 'Y');
/*!40000 ALTER TABLE `treasurys` ENABLE KEYS */;

-- Copiando estrutura para tabela crednosso.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nivel` enum('admin','user') NOT NULL DEFAULT 'user',
  `token` varchar(253) DEFAULT NULL,
  `date_login` date DEFAULT NULL,
  `change_date` datetime DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela crednosso.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `nivel`, `token`, `date_login`, `change_date`, `active`) VALUES
	(1, 'Tarcisio Silva', 'TARCISIOSILVA', 'tarcisio.silva@crednosso.com.br', '$2y$10$YW7P6YfkEzFg0asoolofV.J.CvvKl.jGVZyYpiZmrz0Ff/iM3JzNi', 'admin', '$2y$10$9.zqM2gmuDhxZJUINkDJf.0y3OZDkX9hBzC0S8Y2mzl26J/4B1NTC', NULL, NULL, 'Y'),
	(2, 'Dillan Andrew', 'DILLANSOUSA', 'dillan.sousa@crednosso.com.br', '$2y$10$s4196SsNI.4nNFNtfop3c.gItB3.lffP/gsGfUH24s/NlY4O886TC', 'user', NULL, NULL, NULL, 'Y'),
	(6, 'teste teste', 'TESTETESTE', 'teste@teste.com', '$2y$10$7AP.N2zJndZy2PuV0Do16exjsQVxPADqPrj2bVttSvGShMaUjXnqK', 'user', NULL, NULL, NULL, 'N');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
