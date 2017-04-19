CREATE DATABASE peajes CHARACTER SET utf8 COLLATE utf8_general_ci;
USE peajes;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--
CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOMBRE_CATEGORIA` char(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `ID_DEPARTAMENTO` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `DEPARTAMENTO` char(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `ID_ENTIDAD` int(11) NOT NULL,
  `ENTIDAD` char(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estructura de tabla para la tabla `peaje`
--

CREATE TABLE `peaje` (
  `ID_PEAJE` int(11) NOT NULL,
  `ID_ENTIDAD` int(11) NOT NULL,
  `ID_DEPARTAMENTO` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `NOMBRE_PEAJE` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `UBICACION_PEAJE` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `ID_PEAJE` int(11) NOT NULL,
  `PRECIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`ID_ENTIDAD`);

--
-- Indices de la tabla `peaje`
--
ALTER TABLE `peaje`
  ADD PRIMARY KEY (`ID_PEAJE`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_ENTIDAD`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD KEY `FK_RELATIONSHIP_1` (`ID_CATEGORIA`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_PEAJE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62001;
--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `ID_ENTIDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65001;
--
-- AUTO_INCREMENT de la tabla `peaje`
--
ALTER TABLE `peaje`
  MODIFY `ID_PEAJE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60001;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peaje`
--
ALTER TABLE `peaje`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_ENTIDAD`) REFERENCES `entidad` (`ID_ENTIDAD`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_PEAJE`) REFERENCES `peaje` (`ID_PEAJE`);

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE_CATEGORIA`) VALUES
(62001, 'I'),
(62002, 'II'),
(62003, 'III'),
(62004, 'IV'),
(62005, 'V'),
(62006, 'VI'),
(62007, 'VII');


-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`ID_DEPARTAMENTO`, `DEPARTAMENTO`) VALUES
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
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`ID_ENTIDAD`, `ENTIDAD`) VALUES
(65001, 'ANI'),
(65002, 'INVIAS'),
(65003, 'GOB CUNDINAMARCA'),
(65004, 'GOB ANTIOQUIA');


-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `peaje`
--

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'CHUSACA', 
        POINT(4.537468, -74.271981), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'CHINAUTA', 
        POINT(4.269434, -74.500003), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'FLANDES', 
        POINT(4.192119, -74.861144), 'TOL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'GUALANDAY', 
        POINT(4.300125, -75.0498), 'TOL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, 65002, 'CAJAMARCA', 
        POINT(4.435643, -75.502682), 'TOL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'CIRCASIA', 
        POINT(4.698518, -75.606165), 'QUI');


INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'TARAPACA', 
        POINT(4.939227, -75.616593), 'CAL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'SANTAGUEDA', 
        POINT(5.048581, -75.598598), 'CAL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'SAN BERNARDO (Trinidad)', 
        POINT(5.052212,-75.94586), 'CAL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'PAPIROS', 
        POINT(11.012688, -74.889548), 'ATL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'PUERTO COLOMBIA', 
        POINT(10.967541, -74.956164), 'ATL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'MARAHUACO', 
        POINT(10.574559, -75.450719), 'BOL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'SIBERIA', 
        POINT(4.780299, -74.18502), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'GALAPA', 
        POINT(10.837531, -74.902135), 'ATL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'BAYUNCA', 
        POINT(10.546963, -75.365116), 'BOL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'RIO BLANCO', 
        POINT(7.554171 ,-73.230969), 'SAN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'RIO BOGOTA', 
        POINT(4.698566 ,-74.1793369), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65003', 'JALISCO', 
        POINT(4.901247 ,-74.426112), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'CAIQUERO', 
        POINT(5.06535 ,-74.414214), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'BICENTENARIO', 
        POINT(5.2034 ,-74.685087), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'ZAMBITO', 
        POINT(6.294217 ,-74.457301), 'SAN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'AGUAS NEGRAS', 
        POINT(6.645779 ,-73.952402), 'SAN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LA GOMEZ', 
        POINT(7.397301 ,-73.546542), 'SAN');


INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'MORRISON', 
        POINT(8.092079 ,-73.559991), 'NSA');


INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'PAILITAS', 
        POINT(8.852836 ,-73.669718), 'CES');


INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LA LOMA', 
        POINT(9.637954 ,-73.639421), 'CES');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'EL COPEY', 
        POINT(10.060341 ,-73.923798), 'CES');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'TUCURINCA', 
        POINT(10.608995 ,-74.168445), 'MAG');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'TASAJERA', 
        POINT(10.977204 ,-74.336865), 'MAG');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'PUENTE LAUREANO', 
        POINT(10.978815 ,-74.729516), 'MAG');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'CASABLANCA', 
        POINT(5.104215 ,-73.912866), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'SABOYA', 
        POINT(5.727517 ,-73.74464), 'BOY');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'ANDES', 
        POINT(4.829815 ,-74.033104), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'EL ROBLE', 
        POINT(5.030256 ,-73.839958), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'ALBARRACIN', 
        POINT(5.79496 ,-73.477682), 'CUN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'ARCABUCO', 
        POINT(5.79496 ,-73.477682), 'BOY');


INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'OIBA', 
        POINT(6.178298 ,-73.333348), 'SAN');


INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'SAN GIL', 
        POINT(6.61767 ,-73.080386), 'SAN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LOS CUROS', 
        POINT(6.825579 ,-72.99988), 'SAN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'COROZAL', 
        POINT(4.407839 ,-75.899931), 'QUI');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LA URIBE', 
        POINT(4.253782 ,-76.118687), 'VAC');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'BETANIA', 
        POINT(3.971912 ,-76.253564), 'VAC');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LOBOGUERRERO', 
        POINT(3.76302 ,-76.665616), 'VAC');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'CIAT', 
        POINT(3.523469 ,-76.343229), 'VAC');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'ESTAMBUL', 
        POINT(3.500769 ,-76.443062), 'VAC');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'COCORNA', 
        POINT(6.12462 ,-75.242995), 'ANT');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'GUARNE', 
        POINT(6.328023 ,-75.51596), 'ANT');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65004', 'PANDEQUESO', 
        POINT(6.478129 ,-75.37857), 'ANT');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'LOS LLANOS', 
        POINT(6.830591 ,-75.468169), 'ANT');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'LOS LLANOS', 
        POINT(6.830591 ,-75.468169), 'ANT');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'TARAZA', 
        POINT(7.58928 ,-75.393389), 'ANT');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LA APARTADA', 
        POINT(8.031335 ,-75.301857), 'COR');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'CARIMAGUA', 
        POINT(8.604899 ,-75.484861), 'COR');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LA ESPERANZA', 
        POINT(9.43075 ,-75.436095), 'SUC');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'SAN ONOFRE', 
        POINT(9.863653 ,-75.398929), 'SUC');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'GAMBOTE', 
        POINT(10.136179 ,-75.264265), 'BOL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'EL DIFICIL', 
        POINT(9.831153 ,-74.267811), 'MAG');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'PUENTE PLATO', 
        POINT(9.791388 ,-74.808974), 'MAG');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'EL PICACHO', 
        POINT(7.107964 ,-72.96898), 'SAN');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'LOS ACACIOS', 
        POINT(7.721241 ,-72.571604), 'NSA');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'HONDA', 
        POINT(5.201573  ,-74.820201), 'TOL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'SUPÍA', 
        POINT(5.391319 ,-75.600061), 'CAL');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'PRIMAVERA', 
        POINT(5.968952 ,-75.594089), 'ANT');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'VILLA RICA', 
        POINT(3.151235 ,-76.460179), 'CAU');


INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65001', 'TUNIA', 
        POINT(2.701516 ,-76.536503), 'CAU');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'EL BORDO', 
        POINT(2.188917 ,-76.85155), 'CAU');

INSERT INTO peaje 
(`ID_PEAJE`, `ID_ENTIDAD`, `NOMBRE_PEAJE`, 
`UBICACION_PEAJE`, `ID_DEPARTAMENTO`) 
    VALUES (NULL, '65002', 'EL PLACER', 
        POINT(1.087284 ,-77.408633), 'NAR');

-- --------------------------------------------------------



--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`ID_CATEGORIA`, `ID_PEAJE`, `PRECIO`) VALUES
(62001, 60001, 9600),
(62002, 60001, 10800),
(62003, 60001, 23100),
(62004, 60001, 37600),
(62005, 60001, 43100),
(62001, 60002, 9600),
(62002, 60002, 10800),
(62003, 60002, 23100),
(62004, 60002, 37600),
(62005, 60002, 43100),
(62001, 60003, 10400),
(62002, 60003, 11800),
(62003, 60003, 11600),
(62004, 60003, 14900),
(62005, 60003, 28000),
(62006, 60003, 36900),
(62007, 60003, 41100),
(62001, 60004, 9100),
(62002, 60004, 10800),
(62003, 60004, 25800),
(62004, 60004, 34600),
(62005, 60004, 38100),
(62001, 60005, 7900),
(62002, 60005, 8600),
(62003, 60005, 18200),
(62004, 60005, 23100),
(62005, 60005, 25900),
(62001, 60006, 12900),
(62002, 60006, 16400),
(62003, 60006, 16400),
(62004, 60006, 16400),
(62005, 60006, 40000),
(62006, 60006, 49000),
(62007, 60006, 54600),
(62001, 60007, 10800),
(62002, 60007, 14100),
(62003, 60007, 14100),
(62004, 60007, 14100),
(62005, 60007, 35500),
(62006, 60007, 47000),
(62007, 60007, 52500),
(62001, 60008, 9700),
(62002, 60008, 11700),
(62003, 60008, 11700),
(62004, 60008, 11700),
(62005, 60008, 28600),
(62006, 60008, 35000),
(62007, 60008, 41500),
(62001, 60009, 9700),
(62002, 60009, 11700),
(62003, 60009, 11700),
(62004, 60009, 11700),
(62005, 60009, 28600),
(62006, 60009, 35000),
(62007, 60009, 41500),
(62001, 60010, 4700),
(62002, 60010, 5500),
(62003, 60010, 10900),
(62004, 60010, 19000),
(62005, 60010, 59400),
(62006, 60010, 79400),
(62007, 60010, 88100),
(62001, 60011, 10800),
(62002, 60011, 16200),
(62003, 60011, 11700),
(62004, 60011, 20500),
(62005, 60011, 64100),
(62006, 60011, 85700),
(62007, 60011, 95100),
(62001, 60012, 10800),
(62002, 60012, 16200),
(62003, 60012, 11700),
(62004, 60012, 20500),
(62005, 60012, 64100),
(62006, 60012, 85700),
(62007, 60012, 95100),
(62001, 60013, 9300),
(62002, 60013, 13300),
(62003, 60013, 11200),
(62004, 60013, 14900),
(62005, 60013, 26200),
(62006, 60013, 35100),
(62007, 60013, 38600),
(62001, 60014, 7900),
(62002, 60014, 8600),
(62003, 60014, 18400),
(62004, 60014, 23500),
(62005, 60014, 26500),
(62001, 60015, 7500),
(62002, 60015, 8300),
(62003, 60015, 18500),
(62004, 60015, 24600),
(62005, 60015, 28200),
(62001, 60016, 7900),
(62002, 60016, 8600),
(62003, 60016, 18200),
(62004, 60016, 23100),
(62005, 60016, 25900),
(62001, 60017, 7500),
(62002, 60017, 11200),
(62003, 60017, 9700),
(62004, 60017, 13000),
(62005, 60017, 22000),
(62006, 60017, 29700),
(62007, 60017, 32100),
(62001, 60018, 12400),
(62002, 60018, 16800),
(62003, 60018, 14100),
(62004, 60018, 19600),
(62005, 60018, 35300),
(62006, 60018, 45700),
(62007, 60018, 55000),
(62001, 60019, 8700),
(62002, 60019, 11300),
(62003, 60019, 27900),
(62004, 60019, 33700),
(62005, 60019, 38700),
(62001, 60020, 8400),
(62002, 60020, 10800),
(62003, 60020, 25400),
(62004, 60020, 30600),
(62005, 60020, 35600),
(62001, 60021, 9800),
(62002, 60021, 12400),
(62003, 60021, 29000),
(62004, 60021, 34800),
(62005, 60021, 40800),
(62001, 60022, 9800),
(62002, 60022, 12400),
(62003, 60022, 29000),
(62004, 60022, 34800),
(62005, 60022, 40800),
(62001, 60023, 9800),
(62002, 60023, 12400),
(62003, 60023, 29000),
(62004, 60023, 34800),
(62005, 60023, 40800),
(62001, 60024, 8700),
(62002, 60024, 9600),
(62003, 60024, 19900),
(62004, 60024, 25600),
(62005, 60024, 29000),
(62001, 60025, 8700),
(62002, 60025, 9600),
(62003, 60025, 19900),
(62004, 60025, 25600),
(62005, 60025, 29000),
(62001, 60026, 7600),
(62002, 60026, 8400),
(62003, 60026, 18200),
(62004, 60026, 23400),
(62005, 60026, 26500),
(62001, 60027, 7400),
(62002, 60027, 8100),
(62003, 60027, 18900),
(62004, 60027, 24900),
(62005, 60027, 28800),
(62001, 60028, 8000),
(62002, 60028, 8700),
(62003, 60028, 20400),
(62004, 60028, 26900),
(62005, 60028, 31100),
(62001, 60029, 10700),
(62002, 60029, 12600),
(62003, 60029, 16500),
(62004, 60029, 20500),
(62005, 60029, 29700),
(62006, 60029, 39400),
(62007, 60029, 44500),
(62001, 60030, 10700),
(62002, 60030, 12600),
(62003, 60030, 16500),
(62004, 60030, 20500),
(62005, 60030, 29700),
(62006, 60030, 39400),
(62007, 60030, 44500),
(62001, 60031, 7600),
(62002, 60031, 8300),
(62003, 60031, 21300),
(62004, 60031, 26500),
(62001, 60032, 7600),
(62002, 60032, 8300),
(62003, 60032, 21300),
(62004, 60032, 26500),
(62001, 60033, 8100),
(62002, 60033, 13900),
(62003, 60033, 8900),
(62004, 60033, 20300),
(62005, 60033, 30800),
(62006, 60033, 39800),
(62007, 60033, 44000),
(62001, 60034, 7500),
(62002, 60034, 8300),
(62003, 60034, 21400),
(62004, 60034, 26500),
(62005, 60034, 31200),
(62005, 60032, 31200),
(62001, 60035, 7500),
(62002, 60035, 8300),
(62003, 60035, 21400),
(62004, 60035, 26500),
(62005, 60035, 31200),
(62001, 60036, 7700),
(62002, 60036, 8400),
(62003, 60036, 17900),
(62004, 60036, 22700),
(62005, 60036, 25600),
(62001, 60037, 8300),
(62002, 60037, 21300),
(62003, 60037, 26500),
(62004, 60037, 31000),
(62005, 60037, 31000),
(62001, 60038, 7600),
(62002, 60038, 8300),
(62003, 60038, 21300),
(62004, 60038, 26500),
(62005, 60038, 31000),
(62001, 60039, 7600),
(62002, 60039, 8300),
(62003, 60039, 21300),
(62004, 60039, 26500),
(62005, 60039, 31000),
(62001, 60040, 9700),
(62002, 60040, 11700),
(62003, 60040, 11700),
(62004, 60040, 11700),
(62005, 60040, 28600),
(62006, 60040, 35000),
(62007, 60040, 41500),
(62001, 60041, 8200),
(62002, 60041, 10600),
(62003, 60041, 25000),
(62004, 60041, 34000),
(62005, 60041, 37700),
(62001, 60042, 8200),
(62002, 60042, 10600),
(62003, 60042, 25000),
(62004, 60042, 34000),
(62005, 60042, 37700),
(62001, 60043, 7500),
(62002, 60043, 8400),
(62003, 60043, 20000),
(62004, 60043, 26200),
(62005, 60043, 29900),
(62001, 60044, 8100),
(62002, 60044, 9700),
(62003, 60044, 26100),
(62004, 60044, 33900),
(62005, 60044, 39000),
(62001, 60045, 8100),
(62002, 60045, 9700),
(62003, 60045, 26100),
(62004, 60045, 33900),
(62005, 60045, 39000),
(62001, 60046, 11000),
(62002, 60046, 17100),
(62003, 60046, 15400),
(62004, 60046, 19200),
(62005, 60046, 38500),
(62006, 60046, 52300),
(62007, 60046, 55000),
(62001, 60047, 11000),
(62002, 60047, 17100),
(62003, 60047, 15400),
(62004, 60047, 19200),
(62005, 60047, 38500),
(62006, 60047, 52300),
(62007, 60047, 55000),
(62001, 60048, 7400),
(62002, 60048, 8100),
(62003, 60048, 17200),
(62004, 60048, 22000),
(62005, 60048, 25000),
(62001, 60050, 7900),
(62002, 60050, 8600),
(62003, 60050, 18200),
(62004, 60050, 23100),
(62005, 60050, 25900),
(62001, 60051, 7900),
(62002, 60051, 8600),
(62003, 60051, 18200),
(62004, 60051, 23100),
(62005, 60051, 25900),
(62001, 60052, 11700),
(62002, 60052, 17300),
(62003, 60052, 17300),
(62004, 60052, 17300),
(62005, 60052, 31300),
(62006, 60052, 50000),
(62007, 60052, 57600),
(62001, 60053, 11100),
(62002, 60053, 16200),
(62003, 60053, 16200),
(62004, 60053, 16200),
(62005, 60053, 29400),
(62006, 60053, 46800),
(62007, 60053, 53900),
(62001, 60054, 7700),
(62002, 60054, 8300),
(62003, 60054, 17900),
(62004, 60054, 22700),
(62005, 60054, 25600),
(62001, 60055, 11700),
(62002, 60055, 17300),
(62003, 60055, 17300),
(62004, 60055, 17300),
(62005, 60055, 31300),
(62006, 60055, 50000),
(62007, 60055, 57600),
(62001, 60056, 7500),
(62002, 60056, 8300),
(62003, 60056, 18500),
(62004, 60056, 24600),
(62005, 60056, 28200),
(62001, 60057, 8600),
(62002, 60057, 10700),
(62003, 60057, 22500),
(62004, 60057, 31800),
(62005, 60057, 34100),
(62001, 60058, 8600),
(62002, 60058, 10700),
(62003, 60058, 22500),
(62004, 60058, 31800),
(62005, 60058, 34100),
(62001, 60059, 7900),
(62002, 60059, 8600),
(62003, 60059, 18200),
(62004, 60059, 23100),
(62005, 60059, 25900),
(62001, 60060, 5700),
(62002, 60060, 8100),
(62003, 60060, 18200),
(62004, 60060, 23400),
(62005, 60060, 26500),
(62001, 60061, 10000),
(62002, 60061, 10700),
(62003, 60061, 11100),
(62004, 60061, 11500),
(62005, 60061, 24700),
(62006, 60061, 33700),
(62007, 60061, 36500),
(62001, 60062, 7700),
(62002, 60062, 8400),
(62003, 60062, 17900),
(62004, 60062, 22700),
(62005, 60062, 25600),
(62001, 60063, 7700),
(62002, 60063, 8400),
(62003, 60063, 17900),
(62004, 60063, 22700),
(62005, 60063, 25600),
(62001, 60064, 8000),
(62002, 60064, 9600),
(62003, 60064, 25900),
(62004, 60064, 33800),
(62005, 60064, 38900),
(62001, 60065, 8000),
(62002, 60065, 9600),
(62003, 60065, 25900),
(62004, 60065, 33800),
(62005, 60065, 38900),
(62001, 60066, 7900),
(62002, 60066, 8600),
(62003, 60066, 18200),
(62004, 60066, 23100),
(62005, 60066, 25900),
(62001, 60067, 9200),
(62002, 60067, 9700),
(62003, 60067, 20600),
(62004, 60067, 26800),
(62005, 60067, 30900);


-- VISTAS 

CREATE OR REPLACE VIEW listar_peajes AS 
SELECT DISTINCT 
d.DEPARTAMENTO,
p.NOMBRE_PEAJE, 
X(p.UBICACION_PEAJE) AS latitud,Y(p.UBICACION_PEAJE) AS longitud,
(
    SELECT pr.PRECIO
    FROM peaje p1 
    INNER JOIN precio pr ON pr.ID_PEAJE = p1.ID_PEAJE
    WHERE pr.ID_CATEGORIA = 62001 AND p.ID_PEAJE = p1.ID_PEAJE
) AS cat_I,
(
    SELECT pr.PRECIO
    FROM peaje p1 
    INNER JOIN precio pr ON pr.ID_PEAJE = p1.ID_PEAJE
    WHERE pr.ID_CATEGORIA = 62002 AND p.ID_PEAJE = p1.ID_PEAJE
) AS cat_II,
(
    SELECT pr.PRECIO
    FROM peaje p1 
    INNER JOIN precio pr ON pr.ID_PEAJE = p1.ID_PEAJE
    WHERE pr.ID_CATEGORIA = 62003 AND p.ID_PEAJE = p1.ID_PEAJE
) AS cat_III,
(
    SELECT pr.PRECIO
    FROM peaje p1 
    INNER JOIN precio pr ON pr.ID_PEAJE = p1.ID_PEAJE
    WHERE pr.ID_CATEGORIA = 62004 AND p.ID_PEAJE = p1.ID_PEAJE
) AS cat_IV,
(
    SELECT pr.PRECIO
    FROM peaje p1 
    INNER JOIN precio pr ON pr.ID_PEAJE = p1.ID_PEAJE
    WHERE pr.ID_CATEGORIA = 62005 AND p.ID_PEAJE = p1.ID_PEAJE
) AS cat_V,
(
    SELECT pr.PRECIO
    FROM peaje p1 
    INNER JOIN precio pr ON pr.ID_PEAJE = p1.ID_PEAJE
    WHERE pr.ID_CATEGORIA = 62006 AND p.ID_PEAJE = p1.ID_PEAJE
) AS cat_VI,
(
    SELECT pr.PRECIO
    FROM peaje p1 
    INNER JOIN precio pr ON pr.ID_PEAJE = p1.ID_PEAJE
    WHERE pr.ID_CATEGORIA = 62007 AND p.ID_PEAJE = p1.ID_PEAJE
) AS cat_VII
FROM peaje p
INNER JOIN precio pr ON pr.ID_PEAJE = p.ID_PEAJE
INNER JOIN categoria c ON c.ID_CATEGORIA = pr.ID_CATEGORIA
INNER JOIN departamento d ON d.ID_DEPARTAMENTO = p.ID_DEPARTAMENTO;