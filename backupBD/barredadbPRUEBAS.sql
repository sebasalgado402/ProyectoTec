
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";

DELIMITER $$

CREATE DEFINER=`wsserver2` PROCEDURE `insertar_dFactura` (IN `venta_renglon` INT, IN `idFactura` INT, IN `venta_articulo` INT, IN `venta_cantidad` INT, IN `venta_precio` INT)   INSERT INTO `detalle_factura`(`dfact_renglon`, `fact_id`, `art_id`, `dfact_cantidad`, `dfact_precio`) VALUES (venta_renglon,idFactura,venta_articulo,venta_cantidad,venta_precio)$$

CREATE DEFINER=`wsserver2` PROCEDURE `mostrar_Facturas` ()   SELECT factura.fact_id ,factura.fact_fecha ,sum(dfact_precio) as precioTotal from detalle_factura 
INNER JOIN factura on detalle_factura.fact_id = factura.fact_id  GROUP BY fact_id ORDER BY fact_id DESC$$

CREATE DEFINER=`wsserver2` PROCEDURE `mostrar_Gastos` ()   SELECT
  ROW_NUMBER() OVER (ORDER BY gas_id) AS numeracion,
  gas_id,
  gas_proveedor,
  gas_fecha,
  gas_concepto,
  gas_total
FROM
  gastos ORDER BY gas_fecha DESC$$

CREATE DEFINER=`wsserver2` PROCEDURE `precioTotal_Factura` (IN `idFactura` INT)   select sum(df.dfact_precio) as total from detalle_factura as df where df.fact_id = idFactura$$

CREATE DEFINER=`wsserver2` PROCEDURE `restar_stock` (IN `idarticulo` INT(20), IN `cantidad` INT(20))   UPDATE articulos SET articulos.art_stock = articulos.art_stock-cantidad where articulos.art_id = idarticulo$$

CREATE DEFINER=`wsserver2` PROCEDURE `ver_factura` (IN `idFactura` INT(20))   select df.dfact_renglon as nroRenglon, art.art_nom as articulo, df.dfact_cantidad as cantidad, df.dfact_precio as precioFinal , art.art_precio as precioUnitario , fact.fact_fecha as fecha from detalle_factura as df 
inner JOIN articulos as art on df.art_id = art.art_id
INNER JOIN factura as fact on df.fact_id = fact.fact_id WHERE fact.fact_id = idFactura order by nroRenglon asc$$

DELIMITER ;

CREATE TABLE `articulos` (
  `art_id` int(20) NOT NULL,
  `art_cod` varchar(20) NOT NULL,
  `art_nom` varchar(255) NOT NULL,
  `art_desc` varchar(255) NOT NULL,
  `art_precio` float NOT NULL,
  `art_stock` int(20) NOT NULL,
  `art_costo` int(20) NOT NULL,
  `art_vendible` varchar(1) NOT NULL DEFAULT 'S',
  `art_deshabilitado` varchar(1) DEFAULT 'N',
  `art_categoria` int(20) DEFAULT 1,
  `art_materiales` varchar(50) NOT NULL,
  `art_notas` text NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `art_imagenes` (
  `art_id` int(11) NOT NULL,
  `ruta_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `categorias` (
  `cat_id` int(20) NOT NULL,
  `cat_nom` varchar(25) NOT NULL,
  `cat_obs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categorias` (`cat_id`, `cat_nom`, `cat_obs`) VALUES
(1, 'Sin Categoria', 'Articulo sin categoria');

DELIMITER $$
CREATE TRIGGER `trg_noborrarCategoria1` BEFORE DELETE ON `categorias` FOR EACH ROW BEGIN
    IF OLD.cat_id = 1 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No se puede eliminar la categoría con ID igual a 1.';
    END IF;
END
$$
DELIMITER ;

CREATE TABLE `detalle_factura` (
  `dfact_renglon` int(11) NOT NULL,
  `fact_id` int(11) NOT NULL,
  `art_id` int(100) NOT NULL,
  `dfact_cantidad` int(11) NOT NULL,
  `dfact_precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `factura` (
  `fact_id` int(11) NOT NULL,
  `fact_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `gastos` (
  `gas_id` int(20) NOT NULL,
  `gas_fecha` date NOT NULL,
  `gas_proveedor` varchar(50) NOT NULL,
  `gas_concepto` varchar(50) DEFAULT NULL,
  `gas_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usu_contraseña` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usu_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_contraseña`, `usu_rol`) VALUES
(1, 'id19677335_admin', 'admin', 1),
(2, 'seba', 'seba', 1),
(3, 'emilia', 'emilia', 1),
(4, 'gaston', 'gaston', 1),
(5, 'jero', 'jero', 1),
(6, 'juanpablo', 'juanpablo', 1);

ALTER TABLE `articulos`
  ADD PRIMARY KEY (`art_id`),
  ADD UNIQUE KEY `art_cod` (`art_cod`),
  ADD UNIQUE KEY `art_cod_2` (`art_cod`),
  ADD UNIQUE KEY `art_cod_3` (`art_cod`),
  ADD KEY `art_categoria` (`art_categoria`);

ALTER TABLE `art_imagenes`
  ADD KEY `art_id` (`art_id`);

ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

ALTER TABLE `detalle_factura`
  ADD KEY `fact_id` (`fact_id`,`art_id`),
  ADD KEY `art_id` (`art_id`);

ALTER TABLE `factura`
  ADD PRIMARY KEY (`fact_id`);

ALTER TABLE `gastos`
  ADD PRIMARY KEY (`gas_id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

ALTER TABLE `articulos`
  MODIFY `art_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE `categorias`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE `factura`
  MODIFY `fact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

ALTER TABLE `gastos`
  MODIFY `gas_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`art_categoria`) REFERENCES `categorias` (`cat_id`) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE `art_imagenes`
  ADD CONSTRAINT `art_imagenes_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `articulos` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_3` FOREIGN KEY (`fact_id`) REFERENCES `factura` (`fact_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
