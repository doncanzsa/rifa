-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para rifa
CREATE DATABASE IF NOT EXISTS `rifa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `rifa`;

-- Volcando estructura para tabla rifa.niveles
CREATE TABLE IF NOT EXISTS `niveles` (
  `id_nivel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_nivel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rifa.niveles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `niveles` DISABLE KEYS */;
INSERT INTO `niveles` (`id_nivel`, `nom_nivel`) VALUES
	(1, 'Admin'),
	(2, 'User');
/*!40000 ALTER TABLE `niveles` ENABLE KEYS */;

-- Volcando estructura para tabla rifa.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_u` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pass_u` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_usuario` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_asigned` int(10) DEFAULT NULL,
  `asigned` int(10) DEFAULT NULL,
  `evitar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_nivel` int(10) unsigned NOT NULL DEFAULT '0',
  `std_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_niveles_usuarios` (`id_nivel`),
  CONSTRAINT `FK_niveles_usuarios` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rifa.usuarios: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `user_u`, `pass_u`, `nombre`, `sexo`, `desc_usuario`, `imagen`, `is_asigned`, `asigned`, `evitar`, `id_nivel`, `std_usuario`) VALUES
	(1, 'doncans', '670b14728ad9902aecba32e22fa4f6bd', 'Didier Alvarez', '1', 'A Didier lo conocen todos', NULL, NULL, NULL, NULL, 1, 1),
	(2, 'dani', '10002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(3, 'didier', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(4, 'Hola', '774afed60c7e2e86a288cb195801e0d1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(5, 'jojo', 'e7c522e6fc32a6d25a5ad7ff2a356af5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(6, 'danielaa', '93279e3308bdbbeed946fc965017f67a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(7, 'danielssss', '93279e3308bdbbeed946fc965017f67a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(8, 'Jolalala', '93279e3308bdbbeed946fc965017f67a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(9, 'root', 'cce492688e30ea1eeaaa637df7e44eed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL),
	(10, 'prueba', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
