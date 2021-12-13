-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2020 a las 23:51:32
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `polifago`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estatus` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` varchar(250) NOT NULL,
  `urlimg` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `urlimg`) VALUES
(1, 'Base de 3', 'Maceta con base de 3 y cactus.', '120', 'base.jpeg'),
(2, 'Base 1', 'Maceta con base cuadrada y cactus', '180', 'cuadrada.jpeg'),
(3, 'Base Piramide', 'Maceta con base de piramide Cactus', '220', 'piramide.jpeg'),
(5, 'Maceta Cilindrica', 'Maceta con cactus', '89', 'cilindro.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `rol`) VALUES
(1, 'jorge', 'admin', 'admin'),
(2, 'cliente', 'normal', 'normal'),
(3, 'admin', 'admin', 'normal'),
(4, 'jesus', '12345', 'normal');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_carrito`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_carrito` (
`id` int(11)
,`id_usuario` int(11)
,`id_producto` int(11)
,`estatus` varchar(250)
,`usuario` varchar(250)
,`nombre_producto` varchar(250)
,`descripcion` varchar(250)
,`precio` varchar(250)
,`urlimg` varchar(250)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_carrito`
--
DROP TABLE IF EXISTS `v_carrito`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_carrito`  AS  select `a`.`id` AS `id`,`a`.`id_usuario` AS `id_usuario`,`a`.`id_producto` AS `id_producto`,`a`.`estatus` AS `estatus`,`b`.`usuario` AS `usuario`,`c`.`nombre` AS `nombre_producto`,`c`.`descripcion` AS `descripcion`,`c`.`precio` AS `precio`,`c`.`urlimg` AS `urlimg` from ((`carrito` `a` join `usuarios` `b` on(`a`.`id_usuario` = `b`.`id`)) join `productos` `c` on(`a`.`id_producto` = `c`.`id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
