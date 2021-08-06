-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2021 a las 16:19:29
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 = Inactivo 1 = Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`, `fecha`, `status`) VALUES
(1, 'Calzados', 'Zapatos de damas', NULL, '2021-07-11 07:02:08', 1),
(2, 'Telefonos', 'Celulares de alta gama', NULL, '2021-07-18 05:57:54', 0),
(6, 'respuesta', 'descripcion', NULL, '2021-07-18 11:44:57', 2),
(7, 'Ropa casual', 'Pantalones de jean', NULL, '2021-07-18 11:50:52', 1),
(8, 'otro', 'otro mas', NULL, '2021-07-18 11:51:05', 2),
(9, 'Ropa de dama', 'Camisas y franelas', NULL, '2021-07-18 11:52:17', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
