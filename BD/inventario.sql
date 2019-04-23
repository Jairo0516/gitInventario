-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2019 a las 09:14:25
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goods`
--
CREATE DATABASE inventario;
use inventario;

CREATE TABLE `goods` (
  `pro_id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` float NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `goods`
--

INSERT INTO `goods` (`pro_id`, `name`, `value`, `description`) VALUES
(8, 'Computador', 1566690, 'DESCRIPCION COMPUTADOR'),
(9, 'Moto', 50000000, 'DESCRIPCIÓN MOTO'),
(10, 'Celu', 50, ''),
(14, 'Producto prueba', 123, 'ESTO ES UN PRODUCTO DE PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goodsrelation`
--

CREATE TABLE `goodsrelation` (
  `id_relation` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `goodsrelation`
--

INSERT INTO `goodsrelation` (`id_relation`, `pro_id`, `user_id`) VALUES
(7, 14, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_nom` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nom`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_user` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usu_pwd` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usu_nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usu_ema` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usu_fna` date NOT NULL,
  `usu_rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_user`, `usu_pwd`, `usu_nom`, `usu_ema`, `usu_fna`, `usu_rol`) VALUES
(1, 'USER1', 'b714337aa8007c433329ef43c7b8252c', 'Administrador', 'administrador@correo.com', '2016-11-14', 1),
(9, 'User2', 'b714337aa8007c433329ef43c7b8252c', 'USUARIO 2', 'user2@correo.com', '2019-04-01', 2),
(10, 'User3', 'b714337aa8007c433329ef43c7b8252c', 'USUARIO 3', 'user3@correo.com', '2019-04-01', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`pro_id`) USING BTREE;

--
-- Indices de la tabla `goodsrelation`
--
ALTER TABLE `goodsrelation`
  ADD PRIMARY KEY (`id_relation`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `usu_rol` (`usu_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `goods`
--
ALTER TABLE `goods`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `goodsrelation`
--
ALTER TABLE `goodsrelation`
  MODIFY `id_relation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `goodsrelation`
--
ALTER TABLE `goodsrelation`
  ADD CONSTRAINT `goodsrelation_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `goods` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `goodsrelation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usu_rol`) REFERENCES `roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
