-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-12-2019 a las 17:52:41
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id11997907_rifa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(10) UNSIGNED NOT NULL,
  `nom_nivel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `nom_nivel`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `user_u` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pass_u` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_usuario` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_asigned` int(10) DEFAULT NULL,
  `asigned` int(10) DEFAULT NULL,
  `evitar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_nivel` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `std_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user_u`, `pass_u`, `nombre`, `sexo`, `desc_usuario`, `imagen`, `is_asigned`, `asigned`, `evitar`, `id_nivel`, `std_usuario`) VALUES
(1, 'doncans', '670b14728ad9902aecba32e22fa4f6bd', 'Didier Alvarez', '1', 'A Didier lo conocen todos', NULL, NULL, NULL, NULL, 1, 1),
(11, 'didier', '670b14728ad9902aecba32e22fa4f6bd', 'Didier Stanley Alvarez', '1', 'A Didier Todos lo conocen', '1576778321.jpg', 1, 27, NULL, 2, NULL),
(12, 'karla', 'e3d3e231ea7b7267f355d2b3363f0111', 'Karla Henriquez ', '2', 'Karla, Hermana mayor de Alejandro. He Hija de Soila Benavidez y Oscar Henriquez ', '1576779337.jpg', 1, 24, NULL, 2, NULL),
(13, 'jose rivera', '061b47a8f359db6dfe897750cbdc67b3', 'Jose Rivera ', '1', 'Cuñado de Didier y Esposo de Rosario (Charito)', NULL, 1, 15, NULL, 2, NULL),
(14, 'alejandro', '451c9356da0897a6fd94658b68d6d0f8', 'Alejandro Henríquez ', '1', 'Hermano menor de Karla. He Hijo de Soila Benavidez y Oscar Henriquez', '1576778804.jpeg', 1, 26, NULL, 2, NULL),
(15, 'rosario saravia ', '020cabaa02b4bad3cf5b8b8f650c88c4', 'Rosario Saravia ', '2', 'Hermana de Didier', '1576778993.jpg', 1, 18, NULL, 2, NULL),
(16, 'alba', 'abf15d414d53e540e240bfa7fc07e798', 'Alba luz Guevara ', '2', 'Mama de Didier y Rosario (Charito)', '1576779124.jpg', 1, 11, NULL, 2, NULL),
(17, 'noel', '02f0b60f513d91bdbef2b62213ecdc74', 'Hector noel', '1', 'Padre de Didier y de Rosario (Charito)', NULL, 1, 16, NULL, 2, NULL),
(18, 'soila ', '4923ebd6a888d3cbc94675089c732060', 'Soila Benavides', '2', 'Mama de Karla y Alejandro, Esposa de Oscar Henriquez', '1576779414.jpeg', 1, 14, NULL, 2, NULL),
(19, 'geannella', 'f9f6e4044c539fd9aa62e2da0d616c71', 'Geannnella Hernández ', '2', 'Hermana espiritual de Alejandro y Karla, Amiga de todos, Hija de Roxana, Comadre de Niña Soila', '1576780568.jpeg', 1, 20, NULL, 2, NULL),
(20, 'roxana ', '0485e1cfd4636999eae3209dd1d078d4', 'Roxana Hernández ', '2', 'Madrina de Karla y Alejandro, Comadre de Niña Soila, Mama de Geannella', '1576780353.jpeg', 1, 25, NULL, 2, NULL),
(22, 'migue angel', 'abc0fd3d54ee25c308da6aef902299a2', 'Miguel angel flores sorto', '1', 'Amigo de Todos y Razon de que muchos nos conoscamos, Todo un morenazo', '1576782741.jpg', 1, 23, NULL, 2, NULL),
(23, 'jennifer ', '541157d383bd7ed952c38443a2fb1a5d', 'Jennifer Ochoa ', '2', 'Hija de Ana Ruth Guevara, Prima de Didier, Hermana mayor de Ruth Ochoa', NULL, 1, 22, NULL, 2, NULL),
(24, 'david', '79b742d276466e73deb97fd1d54e4503', 'David Gonzalez', '1', 'Amigo de Todos en comun, Gordito y Simpatico', '1576798338.jpeg', 1, 17, NULL, 2, NULL),
(25, 'oscar ', 'ddc88111e7c6437760bf9c1e7f267b47', 'Oskar Henriquez', '1', 'Padre de Karla y Alejandro, Esposo de Soila Banavidez', NULL, 1, 13, NULL, 2, NULL),
(26, 'ruth ', '3a3379a692115b77ddf1a382e7b1fde4', 'Ana Ruth Ochoa', '2', 'Hija de Ana Ruth Guevara, Prima de Didier, Hermana menor de Jennyfer', NULL, 1, 12, NULL, 2, NULL),
(27, 'ana', '3a3379a692115b77ddf1a382e7b1fde4', 'Ana Ruth Guevara', '2', 'Tia de Didier, Hermana de Alba Luz', NULL, 1, 19, NULL, 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK_niveles_usuarios` (`id_nivel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_niveles_usuarios` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
