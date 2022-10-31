-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-10-2022 a las 00:06:58
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `the_club`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit_articulo`
--

DROP TABLE IF EXISTS `audit_articulo`;
CREATE TABLE IF NOT EXISTS `audit_articulo` (
  `id_auditori` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_auditori`),
  UNIQUE KEY `id_producto` (`id_producto`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

DROP TABLE IF EXISTS `encargado`;
CREATE TABLE IF NOT EXISTS `encargado` (
  `id_encargado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `documento` int(8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_encargado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

DROP TABLE IF EXISTS `gasto`;
CREATE TABLE IF NOT EXISTS `gasto` (
  `id_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float NOT NULL,
  `fecha` date NOT NULL,
  `detalles` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gasto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id_gasto`, `monto`, `fecha`, `detalles`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 123, '2022-10-30', '1233', '2022-10-30 15:15:19', '2022-10-30 15:15:19', '2022-10-30 13:28:55'),
(2, 321231, '2022-10-12', '123323123123asdasdasd', '2022-10-30 15:28:51', '2022-10-30 15:28:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

DROP TABLE IF EXISTS `ingreso`;
CREATE TABLE IF NOT EXISTS `ingreso` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `monto` float NOT NULL,
  `fecha` date NOT NULL,
  `detalles` text COLLATE utf8mb4_spanish2_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `monto`, `fecha`, `detalles`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1503, '0000-00-00', 'Modif', '2022-10-23 19:22:45', '2022-10-23 19:22:45', NULL),
(2, 1545, '2022-10-12', 'Mod', '2022-10-23 20:11:28', '2022-10-23 20:11:28', NULL),
(3, 1503, '0000-00-00', 'Modificado', '2022-10-23 20:12:14', '2022-10-23 20:12:14', NULL),
(4, 1503, '0000-00-00', 'Modificado', '2022-10-23 20:13:34', '2022-10-23 20:13:34', NULL),
(5, 1503, '0000-00-00', 'Modificado', '2022-10-23 20:14:43', '2022-10-23 20:14:43', NULL),
(6, 1503, '0000-00-00', 'Modificado', '2022-10-23 20:21:22', '2022-10-23 20:21:22', NULL),
(7, 1503, '0000-00-00', 'Modificado', '2022-10-23 20:22:26', '2022-10-23 20:22:26', NULL),
(8, 1503, '0000-00-00', 'Modificado', '2022-10-23 20:28:55', '2022-10-23 20:28:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'admin'),
(2, 'encargado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

DROP TABLE IF EXISTS `socio`;
CREATE TABLE IF NOT EXISTS `socio` (
  `Id_socio` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `documento` int(8) NOT NULL,
  `celular` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_socio`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`Id_socio`, `nombre`, `apellido`, `documento`, `celular`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 'Maruricio', 'Gomez', 4200554, 2147483647, '2022-10-27 08:23:25', '2022-10-27 08:23:25', NULL),
(13, 'Marcela', 'asddasd', 31800931, 12312, '2022-10-23 20:23:13', '2022-10-23 20:23:13', NULL),
(4, 'Franco Nahuel', 'Malla', 42805636, 2147483647, '2022-10-22 21:38:57', '2022-10-22 21:38:57', '2022-10-23 16:39:23'),
(5, 'Franco Nahuel', 'Malla', 42805636, 2147483647, '2022-10-23 00:36:52', '2022-10-23 00:36:52', '2022-10-23 16:39:43'),
(6, 'Franco Nahuel', 'Malla', 42805636, 2147483647, '2022-10-23 00:59:57', '2022-10-23 00:59:57', '2022-10-23 16:40:01'),
(7, 'Franco Nahuel', 'Malla', 42805636, 2147483647, '2022-10-23 01:00:21', '2022-10-23 01:00:21', '2022-10-30 18:57:06'),
(8, 'Franco Nahuel', 'Malla', 42805636, 2147483647, '2022-10-23 12:05:15', '2022-10-23 12:05:15', '2022-10-23 16:40:24'),
(9, 'Franco Nahuel', 'Malla', 42805636, 2147, '2022-10-23 13:36:47', '2022-10-23 13:36:47', '2022-10-23 16:37:51'),
(10, 'Franco Nahuel', 'Malla', 42805636, 2147483647, '2022-10-23 13:52:01', '2022-10-23 13:52:01', '2022-10-23 16:38:49'),
(12, 'Marce', 'Navas', 31800931, 0, '2022-10-23 18:50:25', '2022-10-23 18:50:25', '2022-10-23 16:56:31'),
(11, 'Marcela', 'Navas', 31800931, 123, '2022-10-23 14:37:38', '2022-10-23 14:37:38', '2022-10-23 16:37:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_pago`
--

DROP TABLE IF EXISTS `socio_pago`;
CREATE TABLE IF NOT EXISTS `socio_pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `doc_encargado` int(25) NOT NULL,
  `doc_socio` int(25) NOT NULL,
  `monto` float NOT NULL,
  `fecha` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `doc_encargado` (`doc_encargado`),
  KEY `doc_socio` (`doc_socio`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `socio_pago`
--

INSERT INTO `socio_pago` (`id_pago`, `doc_encargado`, `doc_socio`, `monto`, `fecha`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 42805636, 42005554, 1503120000, '2022-10-30', '2022-10-30 19:50:26', '2022-10-30 19:50:26', NULL),
(2, 42805636, 42005554, 1503, '2022-10-30', '2022-10-30 20:29:05', '2022-10-30 20:29:05', NULL),
(3, 42805636, 42005554, 1503, '2022-10-30', '2022-10-30 20:31:58', '2022-10-30 20:31:58', '2022-10-30 19:01:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `documento` int(9) NOT NULL,
  `user` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pass` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `rol` int(2) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `documento` (`documento`),
  KEY `rol` (`rol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `documento`, `user`, `pass`, `created_at`, `updated_at`, `deleted_at`, `rol`) VALUES
(1, 'Franco Nahuel', 'Malla', 42805636, 'baka', 'tora', '2022-10-30 19:46:38', '2022-10-30 19:46:38', NULL, 2),
(2, 'encargado', 'encargado', 41000000, 'encar', 'encar', '2022-10-30 19:46:38', '2022-10-30 19:46:38', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utileria`
--

DROP TABLE IF EXISTS `utileria`;
CREATE TABLE IF NOT EXISTS `utileria` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` int(25) NOT NULL,
  `locker` int(8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_articulo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `utileria`
--

INSERT INTO `utileria` (`id_articulo`, `nombre`, `cantidad`, `locker`, `created_at`, `updated_at`, `deleted_at`, `detalle`) VALUES
(1, 'pesas 10K', 1, 1, '2022-10-30 18:56:52', '2022-10-30 18:56:52', '2022-10-30 17:23:47', 'están en perfecto'),
(2, 'pesas 10K', 1, 2, '2022-10-30 17:17:09', '2022-10-30 17:17:09', NULL, 'están en perfecto'),
(3, 'pesas 10K', 1, 2, '2022-10-30 17:18:38', '2022-10-30 17:18:38', '2022-10-30 17:32:27', 'están en perfecto'),
(4, 'pesas 10K', 1, 2, '2022-10-30 17:21:19', '2022-10-30 17:21:19', NULL, 'están en perfecto'),
(5, 'pesas 10K', 1, 2, '2022-10-30 17:22:16', '2022-10-30 17:22:16', NULL, 'están en perfecto'),
(6, 'pesas 10K', 1, 2, '2022-10-30 17:24:25', '2022-10-30 17:24:25', NULL, 'están en perfecto'),
(7, 'pesas 10K', 1, 2, '2022-10-30 17:24:46', '2022-10-30 17:24:46', NULL, 'están en perfecto'),
(8, 'pesas 10K', 1, 2, '2022-10-30 18:53:54', '2022-10-30 18:53:54', NULL, 'están en perfecto'),
(9, 'pesas 10K', 1, 2, '2022-10-30 18:54:03', '2022-10-30 18:54:03', NULL, 'están en perfecto'),
(10, 'pesas 10K', 1, 2, '2022-10-30 18:54:23', '2022-10-30 18:54:23', NULL, 'están en perfecto');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
