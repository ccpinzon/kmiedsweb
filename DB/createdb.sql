-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2017 a las 23:05:22
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `depuracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_departamento` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
('AMA', 'Amazonas'),
('ANT', 'Antioquia'),
('ARA', 'Arauca'),
('ATL', 'Atlántico'),
('BOL', 'Bolívar'),
('BOY', 'Boyacá'),
('CAL', 'Caldas'),
('CAQ', 'Caquetá'),
('CAS', 'Casanare'),
('CAU', 'Cauca'),
('CES', 'Cesar'),
('CHO', 'Chocó'),
('COR', 'Córdoba'),
('CUN', 'Cundinamarca'),
('GUA', 'Guainía'),
('GUV', 'Guaviare'),
('HUI', 'Huila'),
('LAG', 'La Guajira'),
('MAG', 'Magdalena'),
('MET', 'Meta'),
('NAR', 'Nariño'),
('NSA', 'Norte de Santander'),
('PUT', 'Putumayo'),
('QUI', 'Quindío'),
('RIS', 'Risaralda'),
('SAN', 'Santander'),
('SAP', 'San andrés y providencia'),
('SUC', 'Sucre'),
('TOL', 'Tolima'),
('VAC', 'Valle del Cauca'),
('VAU', 'Vaupés'),
('VID', 'Vichada');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `id_estacion` int(5) NOT NULL,
  `ubicacion_estacion` point NOT NULL,
  `nombre_estacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_estacion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_estacion` enum('R','U') COLLATE utf8_unicode_ci NOT NULL,
  `tel_fijo_estacion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_movil_estacion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion_estacion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo_estacion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SICOM_estacion` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pago_estacion` tinyint(1) NOT NULL,
  `estado_estacion` tinyint(1) NOT NULL,
  `mayorista_id_mayorista` int(3) NOT NULL,
  `departamento_id_departamento` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `sucursal_id_sucursal` int(3) DEFAULT NULL,
  `sucursal_gremio_id_gremio` int(3) DEFAULT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `fecha_registro_estacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion_has_producto`
--

CREATE TABLE `estacion_has_producto` (
  `estacion_id_estacion` int(5) NOT NULL,
  `producto_id_producto` int(3) NOT NULL,
  `precio_estacion_has_producto` int(5) DEFAULT NULL,
  `estado_estacion_has_producto` enum('D','A') COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro_estacion_has_producto` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gremio`
--

CREATE TABLE `gremio` (
  `id_gremio` int(3) NOT NULL,
  `nombre_gremio` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mayorista`
--

CREATE TABLE `mayorista` (
  `id_mayorista` int(3) NOT NULL,
  `marca_mayorista` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_mayorista` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web_mayorista` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(3) NOT NULL,
  `nombre_producto` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`) VALUES
(200, 'Extra'),
(201, 'Corriente'),
(202, 'Diésel'),
(203, 'GNV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(3) NOT NULL,
  `nombre_servicio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_servicio` enum('P','V') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_has_estacion`
--

CREATE TABLE `servicio_has_estacion` (
  `servicio_id_servicio` int(3) NOT NULL,
  `estacion_id_estacion` int(5) NOT NULL,
  `descripcion_servicio_has_estacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_registro_servicio_has_estacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(3) NOT NULL,
  `nombre_sucursal` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `gremio_id_gremio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(6) NOT NULL,
  `nombre_usuario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `pass_usuario` varchar(120) CHARACTER SET utf8 NOT NULL,
  `tipo_usuario` enum('A','G') COLLATE utf8_unicode_ci NOT NULL,
  `fecha_registro_usuario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD UNIQUE KEY `id_departamento_UNIQUE` (`id_departamento`),
  ADD UNIQUE KEY `nombre_departamento_UNIQUE` (`nombre_departamento`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`id_estacion`,`ubicacion_estacion`(25),`mayorista_id_mayorista`,`departamento_id_departamento`,`usuario_id_usuario`),
  ADD UNIQUE KEY `fk_estacion_ubicacion1_idx` (`ubicacion_estacion`(25)),
  ADD KEY `fk_estacion_mayorista1_idx` (`mayorista_id_mayorista`),
  ADD KEY `fk_estacion_departamento1_idx` (`departamento_id_departamento`),
  ADD KEY `fk_estacion_sucursal1_idx` (`sucursal_id_sucursal`,`sucursal_gremio_id_gremio`),
  ADD KEY `fk_estacion_usuario1_idx` (`usuario_id_usuario`);

--
-- Indices de la tabla `estacion_has_producto`
--
ALTER TABLE `estacion_has_producto`
  ADD PRIMARY KEY (`estacion_id_estacion`,`producto_id_producto`),
  ADD KEY `fk_estacion_has_producto_producto1_idx` (`producto_id_producto`),
  ADD KEY `fk_estacion_has_producto_estacion1_idx` (`estacion_id_estacion`);

--
-- Indices de la tabla `gremio`
--
ALTER TABLE `gremio`
  ADD PRIMARY KEY (`id_gremio`),
  ADD UNIQUE KEY `id_AGREMIACION_UNIQUE` (`id_gremio`),
  ADD UNIQUE KEY `nombre_agremiacion_UNIQUE` (`nombre_gremio`);

--
-- Indices de la tabla `mayorista`
--
ALTER TABLE `mayorista`
  ADD PRIMARY KEY (`id_mayorista`),
  ADD UNIQUE KEY `id_MAYORISTA_UNIQUE` (`id_mayorista`),
  ADD UNIQUE KEY `marca_mayorista_UNIQUE` (`marca_mayorista`),
  ADD UNIQUE KEY `telefono_mayorista_UNIQUE` (`telefono_mayorista`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD UNIQUE KEY `id_servicio_UNIQUE` (`id_servicio`),
  ADD UNIQUE KEY `nombre_servicio` (`nombre_servicio`);

--
-- Indices de la tabla `servicio_has_estacion`
--
ALTER TABLE `servicio_has_estacion`
  ADD PRIMARY KEY (`servicio_id_servicio`,`estacion_id_estacion`),
  ADD KEY `fk_servicio_has_estacion_estacion1_idx` (`estacion_id_estacion`),
  ADD KEY `fk_servicio_has_estacion_servicio1_idx` (`servicio_id_servicio`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`,`gremio_id_gremio`),
  ADD KEY `fk_sucursal_gremio1_idx` (`gremio_id_gremio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_gerente_eds_UNIQUE` (`id_usuario`),
  ADD UNIQUE KEY `nombre_gerente_edscol_UNIQUE` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `id_estacion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;
--
-- AUTO_INCREMENT de la tabla `gremio`
--
ALTER TABLE `gremio`
  MODIFY `id_gremio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT de la tabla `mayorista`
--
ALTER TABLE `mayorista`
  MODIFY `id_mayorista` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30000;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD CONSTRAINT `fk_estacion_departamento1` FOREIGN KEY (`departamento_id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estacion_mayorista1` FOREIGN KEY (`mayorista_id_mayorista`) REFERENCES `mayorista` (`id_mayorista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estacion_sucursal1` FOREIGN KEY (`sucursal_id_sucursal`,`sucursal_gremio_id_gremio`) REFERENCES `sucursal` (`id_sucursal`, `gremio_id_gremio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estacion_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estacion_has_producto`
--
ALTER TABLE `estacion_has_producto`
  ADD CONSTRAINT `fk_estacion_has_producto_estacion1` FOREIGN KEY (`estacion_id_estacion`) REFERENCES `estacion` (`id_estacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estacion_has_producto_producto1` FOREIGN KEY (`producto_id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio_has_estacion`
--
ALTER TABLE `servicio_has_estacion`
  ADD CONSTRAINT `fk_servicio_has_estacion_estacion1` FOREIGN KEY (`estacion_id_estacion`) REFERENCES `estacion` (`id_estacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicio_has_estacion_servicio1` FOREIGN KEY (`servicio_id_servicio`) REFERENCES `servicio` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_sucursal_gremio1` FOREIGN KEY (`gremio_id_gremio`) REFERENCES `gremio` (`id_gremio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE OR REPLACE VIEW listar_por_servicio AS
SELECT DISTINCT s.id_servicio,id_estacion,e.nombre_estacion,X(e.ubicacion_estacion) AS latitud_estacion,Y(e.ubicacion_estacion) AS longitud_estacion,m.marca_mayorista,e.pago_estacion,
(
SELECT ep.precio_estacion_has_producto 
FROM producto AS p
INNER JOIN estacion_has_producto AS ep
ON p.id_producto = ep.producto_id_producto
WHERE p.id_producto=200 AND ep.estacion_id_estacion=e.id_estacion
) AS precio_extra
,(
SELECT ep.precio_estacion_has_producto 
FROM producto AS p
INNER JOIN estacion_has_producto AS ep
ON p.id_producto = ep.producto_id_producto
WHERE p.id_producto=201 AND ep.estacion_id_estacion=e.id_estacion
) AS precio_corriente
,(
SELECT ep.precio_estacion_has_producto 
FROM producto AS p
INNER JOIN estacion_has_producto AS ep
ON p.id_producto = ep.producto_id_producto
WHERE p.id_producto=202 AND ep.estacion_id_estacion=e.id_estacion
) AS precio_Diesel
,(
SELECT ep.precio_estacion_has_producto 
FROM producto AS p
INNER JOIN estacion_has_producto AS ep
ON p.id_producto = ep.producto_id_producto
WHERE p.id_producto=203 AND ep.estacion_id_estacion=e.id_estacion
) AS precio_Gnv
FROM estacion e, mayorista m,estacion_has_producto ep,servicio_has_estacion se,servicio s
WHERE e.mayorista_id_mayorista = m.id_mayorista 
AND e.id_estacion = ep.estacion_id_estacion
AND se.estacion_id_estacion = e.id_estacion
AND se.servicio_id_servicio = s.id_servicio
ORDER BY e.id_estacion;

INSERT INTO usuario
(nombre_usuario, pass_usuario, tipo_usuario)
VALUES('admin', '$2y$10$MAkKT3Dr/wFlQ1ShAiTWNeVdNFm27iseeYxMYOY7UTTgqwSJQKoxi', 'A');




