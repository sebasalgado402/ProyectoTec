-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2022 a las 16:12:16
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `barredadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `art_id` int(20) NOT NULL,
  `art_cod` varchar(20) NOT NULL,
  `art_nom` varchar(30) NOT NULL,
  `art_desc` varchar(255) NOT NULL,
  `art_precio` int(20) NOT NULL,
  `art_stock` int(20) NOT NULL,
  `art_costo` int(20) NOT NULL,
  `art_vendible` varchar(1) NOT NULL DEFAULT 'S',
  `art_deshabilitado` varchar(1) DEFAULT NULL,
  `art_categoria` int(20) NOT NULL,
  `art_materiales` varchar(50) NOT NULL,
  `art_notas` text NOT NULL,
  `art_imagen` text NOT NULL DEFAULT './../images/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`art_id`, `art_cod`, `art_nom`, `art_desc`, `art_precio`, `art_stock`, `art_costo`, `art_vendible`, `art_deshabilitado`, `art_categoria`, `art_materiales`, `art_notas`, `art_imagen`) VALUES
(2, 'SC2', 'Silla Comunidad', '', 1200, 1, 600, '', '', 1, '', '', './../images/default.png'),
(3, 'SRP3', 'Silla rústica pino', '', 1400, 2, 500, '', '', 1, '', '', './../images/default.png'),
(4, 'MV4', 'Matera Vivi', '', 500, 4, 150, '', '', 2, '', '', './../images/default.png'),
(5, 'SSC5', 'Soporte simple celular', 'Una ranura', 150, 10, 30, 'S', NULL, 13, '', '', './../images/default.png'),
(6, 'SI6', 'Soporte incienso', '', 150, 6, 30, 'S', NULL, 13, '', '', './../images/default.png'),
(7, 'CM15', 'Caja Multiuso', '15x15cm, altura 7cm', 200, 2, 80, 'S', NULL, 10, '', '', './../images/default.png'),
(9, 'SCC9', 'Soporte clásico celular', 'Dos ranuras', 150, 0, 30, 'S', NULL, 13, '', '', './../images/default.png'),
(10, 'LA10', 'Llavero Aruera', 'Llavero Aruera con colgadores simples (pitones)', 300, 1, 120, 'S', NULL, 7, '', '', './../images/default.png'),
(11, 'PA11', 'Perchero Aruera', 'Perchero Aruera con colgadores fuertes, soporta prendas de ropa', 500, 2, 300, '', '', 4, '', '', './../images/default.png'),
(12, 'LJ12', 'Llavero Jane', 'Forma de casa de pajaritos, 3 colgadores, techo en colores varios.', 200, 3, 80, 'S', NULL, 7, '', '', './../images/default.png'),
(13, 'PPM13', 'Perchero de pie ', '4 colgadores dobles, 1.60 de altura', 1200, 0, 300, '', '', 4, '', '', './../images/default.png'),
(23, 'CSG', 'Cuenco grande (E.robusta)', 'Cuenco de 50 cm de largo con dos perforaciones', 1400, 2, 200, 'S', NULL, 14, 'Madera', '', './../images/default.png'),
(24, 'CSM', 'Cuenco mediano', 'Cuenco mediano', 800, 1, 100, 'S', NULL, 14, 'Madera', '', './../images/default.png'),
(25, 'CSC', 'Cuenco chico', 'Cuenco chico', 500, 5, 100, 'S', NULL, 14, 'Madera', '', './../images/default.png'),
(26, 'PC50', 'Pino 50CM colores', 'Pino cerrado 50cm, colores varios: verde, rojo y azul', 500, 0, 50, 'S', NULL, 15, 'Madera', 'Angulos a 17 grados', './../images/materamadera.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(20) NOT NULL,
  `cat_nom` varchar(25) NOT NULL,
  `cat_obs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nom`, `cat_obs`) VALUES
(1, 'Sillas', '---'),
(2, 'Materas', '---'),
(3, 'Mesas', '---'),
(4, 'Percheros', '---'),
(7, 'Llaveros', '---'),
(8, 'Estanterias', '---'),
(10, 'Cajas', NULL),
(11, 'Descuentos', NULL),
(12, 'Marcos', NULL),
(13, 'Otros accesorios', NULL),
(14, 'Tablas y Cuencos', 'tablas de picar y de asado, cuencos para servir'),
(15, 'Pinos Navidad', 'Tamaños varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `gas_id` int(20) NOT NULL,
  `gas_fecha` date NOT NULL,
  `gas_proveedor` varchar(50) NOT NULL,
  `gas_concepto` varchar(50) DEFAULT NULL,
  `gas_cantidad` int(20) NOT NULL,
  `gas_total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usu_contraseña` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usu_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_contraseña`, `usu_rol`) VALUES
(1, 'id19677335_admin', 'admin', 1),
(2, 'seba', 'seba', 1),
(3, 'emilia', 'emilia', 1),
(4, 'gaston', 'gaston', 1),
(5, 'jero', 'jero', 1),
(6, 'juanpablo', 'juanpablo', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`art_id`),
  ADD UNIQUE KEY `art_cod` (`art_cod`),
  ADD UNIQUE KEY `art_cod_2` (`art_cod`),
  ADD UNIQUE KEY `art_cod_3` (`art_cod`),
  ADD KEY `art_categoria` (`art_categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`gas_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `art_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `gas_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`art_categoria`) REFERENCES `categorias` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
