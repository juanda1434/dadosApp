-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2021 a las 01:06:41
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfrentamiento`
--

CREATE TABLE `enfrentamiento` (
  `idenfrentamiento` int(11) NOT NULL,
  `idregistro` int(11) DEFAULT NULL,
  `idpartido` int(11) DEFAULT NULL,
  `numero` tinyint(4) DEFAULT NULL,
  `ronda` tinyint(4) DEFAULT NULL,
  `puntaje` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopregunta`
--

CREATE TABLE `estadopregunta` (
  `idestadopregunta` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadopregunta`
--

INSERT INTO `estadopregunta` (`idestadopregunta`, `descripcion`) VALUES
(1, 'activa'),
(2, 'cerrada'),
(3, 'salto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idestudiante` int(11) NOT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contrasenia` varchar(45) DEFAULT NULL,
  `idsede` int(11) DEFAULT NULL,
  `logeado` datetime NOT NULL DEFAULT current_timestamp(),
  `hash` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `nombre`, `usuario`, `contrasenia`, `idsede`, `logeado`, `hash`) VALUES
(1, '\'Estudiante1\'', '\'user1\'', '\'user1\'', 1, '0000-00-00 00:00:00', 'NULL'),
(2, '\'Estudiante2\'', '\'user2\'', '\'user2\'', 1, '0000-00-00 00:00:00', 'NULL'),
(3, '\'Estudiante3\'', '\'user3\'', '\'user3\'', 1, '0000-00-00 00:00:00', 'NULL'),
(4, '\'Estudiante4\'', '\'user4\'', '\'user4\'', 1, '0000-00-00 00:00:00', 'NULL'),
(5, '\'Estudiante5\'', '\'user5\'', '\'user5\'', 1, '0000-00-00 00:00:00', 'NULL'),
(6, '\'Estudiante6\'', '\'user6\'', '\'user6\'', 1, '0000-00-00 00:00:00', 'NULL'),
(7, '\'Estudiante7\'', '\'user7\'', '\'user7\'', 1, '0000-00-00 00:00:00', 'NULL'),
(8, '\'Estudiante8\'', '\'user8\'', '\'user8\'', 1, '0000-00-00 00:00:00', 'NULL'),
(9, '\'Estudiante9\'', '\'user9\'', '\'user9\'', 1, '0000-00-00 00:00:00', 'NULL'),
(10, '\'Estudiante10\'', '\'user10\'', '\'user10\'', 1, '0000-00-00 00:00:00', 'NULL'),
(11, '\'Estudiante11\'', '\'user11\'', '\'user11\'', 1, '0000-00-00 00:00:00', 'NULL'),
(12, '\'Estudiante12\'', '\'user12\'', '\'user12\'', 1, '0000-00-00 00:00:00', 'NULL'),
(13, '\'Estudiante13\'', '\'user13\'', '\'user13\'', 1, '0000-00-00 00:00:00', 'NULL'),
(14, '\'Estudiante14\'', '\'user14\'', '\'user14\'', 1, '0000-00-00 00:00:00', 'NULL'),
(15, '\'Estudiante15\'', '\'user15\'', '\'user15\'', 1, '0000-00-00 00:00:00', 'NULL'),
(16, '\'Estudiante16\'', '\'user16\'', '\'user16\'', 1, '0000-00-00 00:00:00', 'NULL'),
(17, '\'Estudiante17\'', '\'user17\'', '\'user17\'', 1, '0000-00-00 00:00:00', 'NULL'),
(18, '\'Estudiante18\'', '\'user18\'', '\'user18\'', 1, '0000-00-00 00:00:00', 'NULL'),
(19, '\'Estudiante19\'', '\'user19\'', '\'user19\'', 1, '0000-00-00 00:00:00', 'NULL'),
(20, '\'Estudiante20\'', '\'user20\'', '\'user20\'', 1, '0000-00-00 00:00:00', 'NULL'),
(21, '\'Estudiante21\'', '\'user21\'', '\'user21\'', 1, '0000-00-00 00:00:00', 'NULL'),
(22, '\'Estudiante22\'', '\'user22\'', '\'user22\'', 1, '0000-00-00 00:00:00', 'NULL'),
(23, '\'Estudiante23\'', '\'user23\'', '\'user23\'', 1, '0000-00-00 00:00:00', 'NULL'),
(24, '\'Estudiante24\'', '\'user24\'', '\'user24\'', 1, '0000-00-00 00:00:00', 'NULL'),
(25, '\'Estudiante25\'', '\'user25\'', '\'user25\'', 1, '0000-00-00 00:00:00', 'NULL'),
(26, '\'Estudiante26\'', '\'user26\'', '\'user26\'', 1, '0000-00-00 00:00:00', 'NULL'),
(27, '\'Estudiante27\'', '\'user27\'', '\'user27\'', 1, '0000-00-00 00:00:00', 'NULL'),
(28, '\'Estudiante28\'', '\'user28\'', '\'user28\'', 1, '0000-00-00 00:00:00', 'NULL'),
(29, '\'Estudiante29\'', '\'user29\'', '\'user29\'', 1, '0000-00-00 00:00:00', 'NULL'),
(30, '\'Estudiante30\'', '\'user30\'', '\'user30\'', 1, '0000-00-00 00:00:00', 'NULL'),
(31, '\'Estudiante31\'', '\'user31\'', '\'user31\'', 1, '0000-00-00 00:00:00', 'NULL'),
(32, '\'Estudiante32\'', '\'user32\'', '\'user32\'', 1, '0000-00-00 00:00:00', 'NULL'),
(33, '\'Estudiante33\'', '\'user33\'', '\'user33\'', 1, '0000-00-00 00:00:00', 'NULL'),
(34, '\'Estudiante34\'', '\'user34\'', '\'user34\'', 1, '0000-00-00 00:00:00', 'NULL'),
(35, '\'Estudiante35\'', '\'user35\'', '\'user35\'', 1, '0000-00-00 00:00:00', 'NULL'),
(36, '\'Estudiante36\'', '\'user36\'', '\'user36\'', 1, '0000-00-00 00:00:00', 'NULL'),
(37, '\'Estudiante37\'', '\'user37\'', '\'user37\'', 1, '0000-00-00 00:00:00', 'NULL'),
(38, '\'Estudiante38\'', '\'user38\'', '\'user38\'', 1, '0000-00-00 00:00:00', 'NULL'),
(39, '\'Estudiante39\'', '\'user39\'', '\'user39\'', 1, '0000-00-00 00:00:00', 'NULL'),
(40, '\'Estudiante40\'', '\'user40\'', '\'user40\'', 1, '0000-00-00 00:00:00', 'NULL'),
(41, '\'Estudiante41\'', '\'user41\'', '\'user41\'', 1, '0000-00-00 00:00:00', 'NULL'),
(42, '\'Estudiante42\'', '\'user42\'', '\'user42\'', 1, '0000-00-00 00:00:00', 'NULL'),
(43, '\'Estudiante43\'', '\'user43\'', '\'user43\'', 1, '0000-00-00 00:00:00', 'NULL'),
(44, '\'Estudiante44\'', '\'user44\'', '\'user44\'', 1, '0000-00-00 00:00:00', 'NULL'),
(45, '\'Estudiante45\'', '\'user45\'', '\'user45\'', 1, '0000-00-00 00:00:00', 'NULL'),
(46, '\'Estudiante46\'', '\'user46\'', '\'user46\'', 1, '0000-00-00 00:00:00', 'NULL'),
(47, '\'Estudiante47\'', '\'user47\'', '\'user47\'', 1, '0000-00-00 00:00:00', 'NULL'),
(48, '\'Estudiante48\'', '\'user48\'', '\'user48\'', 1, '0000-00-00 00:00:00', 'NULL'),
(49, '\'Estudiante49\'', '\'user49\'', '\'user49\'', 1, '0000-00-00 00:00:00', 'NULL'),
(50, '\'Estudiante50\'', '\'user50\'', '\'user50\'', 1, '0000-00-00 00:00:00', 'NULL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idgrado`, `nombre`) VALUES
(1, 'Quinto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `idpartido` int(11) NOT NULL,
  `codigo` varchar(300) NOT NULL,
  `enjuego` tinyint(4) NOT NULL DEFAULT 0,
  `estaactivo` tinyint(4) NOT NULL DEFAULT 0,
  `idsede` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `numerorondas` tinyint(4) NOT NULL DEFAULT 0,
  `fechacreacion` datetime NOT NULL DEFAULT current_timestamp(),
  `finalizado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL,
  `idpartido` int(11) NOT NULL,
  `idestadopregunta` int(11) NOT NULL,
  `dadouno` tinyint(4) DEFAULT NULL,
  `dadodos` tinyint(4) DEFAULT NULL,
  `dadotres` tinyint(4) DEFAULT NULL,
  `dadocuatro` tinyint(4) DEFAULT NULL,
  `fecharegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `numero` tinyint(4) DEFAULT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

CREATE TABLE `puntaje` (
  `idpuntaje` int(11) NOT NULL,
  `idregistro` int(11) NOT NULL,
  `puntaje` tinyint(4) NOT NULL,
  `tiempopromedio` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idregistro` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL,
  `idpartido` int(11) NOT NULL,
  `on` bit(1) NOT NULL DEFAULT b'0',
  `update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL,
  `correcta` tinyint(4) NOT NULL,
  `idpregunta` int(11) NOT NULL,
  `idregistro` int(11) NOT NULL,
  `fecharegistro` datetime NOT NULL,
  `respuesta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idsede` int(11) NOT NULL,
  `nombre` varchar(400) DEFAULT NULL,
  `puntaje` int(11) NOT NULL DEFAULT 0,
  `puntajeminimo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idsede`, `nombre`, `puntaje`, `puntajeminimo`) VALUES
(1, 'Chapinero N°19', 0, 1940),
(2, 'Escuela Kennedy N°47', 0, 2900),
(3, 'Rosal', 0, 1240),
(4, 'Jose Celestino Mutis', 0, 1760);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signo`
--

CREATE TABLE `signo` (
  `idsigno` int(11) NOT NULL,
  `idversus` int(11) NOT NULL,
  `i` tinyint(4) DEFAULT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `xi` int(11) DEFAULT NULL,
  `yi` int(11) DEFAULT NULL,
  `tipo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `signo`
--

INSERT INTO `signo` (`idsigno`, `idversus`, `i`, `x`, `y`, `xi`, `yi`, `tipo`) VALUES
(1, 1, 0, 50, 220, 50, 220, b'1'),
(2, 1, 1, 50, 220, 50, 220, b'1'),
(3, 1, 2, 50, 220, 50, 220, b'1'),
(4, 1, 3, 110, 220, 110, 220, b'1'),
(5, 1, 4, 110, 220, 110, 220, b'1'),
(6, 1, 5, 110, 220, 110, 220, b'1'),
(7, 1, 6, 170, 220, 170, 220, b'1'),
(8, 1, 7, 170, 220, 170, 220, b'1'),
(9, 1, 8, 170, 220, 170, 220, b'1'),
(10, 1, 9, 230, 220, 230, 220, b'1'),
(11, 1, 10, 230, 220, 230, 220, b'1'),
(12, 1, 11, 230, 220, 230, 220, b'1'),
(13, 1, 12, 310, 220, 310, 220, b'1'),
(14, 1, 13, 310, 220, 310, 220, b'1'),
(15, 1, 14, 280, 220, 280, 220, b'1'),
(16, 1, 15, 280, 220, 280, 220, b'1'),
(17, 1, 0, 60, 160, 60, 160, b'0'),
(18, 1, 1, 135, 160, 135, 160, b'0'),
(19, 1, 2, 210, 160, 210, 160, b'0'),
(20, 1, 3, 285, 160, 285, 160, b'0'),
(21, 2, 0, 50, 220, 50, 220, b'1'),
(22, 2, 1, 50, 220, 50, 220, b'1'),
(23, 2, 2, 50, 220, 50, 220, b'1'),
(24, 2, 3, 110, 220, 110, 220, b'1'),
(25, 2, 4, 110, 220, 110, 220, b'1'),
(26, 2, 5, 110, 220, 110, 220, b'1'),
(27, 2, 6, 170, 220, 170, 220, b'1'),
(28, 2, 7, 170, 220, 170, 220, b'1'),
(29, 2, 8, 170, 220, 170, 220, b'1'),
(30, 2, 9, 230, 220, 230, 220, b'1'),
(31, 2, 10, 230, 220, 230, 220, b'1'),
(32, 2, 11, 230, 220, 230, 220, b'1'),
(33, 2, 12, 310, 220, 310, 220, b'1'),
(34, 2, 13, 310, 220, 310, 220, b'1'),
(35, 2, 14, 280, 220, 280, 220, b'1'),
(36, 2, 15, 280, 220, 280, 220, b'1'),
(37, 2, 0, 60, 160, 60, 160, b'0'),
(38, 2, 1, 135, 160, 135, 160, b'0'),
(39, 2, 2, 210, 160, 210, 160, b'0'),
(40, 2, 3, 285, 160, 285, 160, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versus`
--

CREATE TABLE `versus` (
  `idversus` int(11) NOT NULL,
  `idenfrentamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `versus`
--

INSERT INTO `versus` (`idversus`, `idenfrentamiento`) VALUES
(1, NULL),
(2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enfrentamiento`
--
ALTER TABLE `enfrentamiento`
  ADD PRIMARY KEY (`idenfrentamiento`),
  ADD KEY `fkenfrentamientopartido_idx` (`idpartido`),
  ADD KEY `fkenfrentamientoregistro_idx` (`idregistro`);

--
-- Indices de la tabla `estadopregunta`
--
ALTER TABLE `estadopregunta`
  ADD PRIMARY KEY (`idestadopregunta`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idestudiante`),
  ADD KEY `fkestudiante_sede_idx` (`idsede`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idgrado`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`idpartido`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD UNIQUE KEY `grupo_UNIQUE` (`idsede`,`idgrado`,`numero`),
  ADD KEY `fkpartido_sede_idx` (`idsede`),
  ADD KEY `fkpartido_grado_idx` (`idgrado`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idpregunta`),
  ADD KEY `fkpreguntapartido_idx` (`idpartido`),
  ADD KEY `fkpreguntaestadopregunta_idx` (`idestadopregunta`);

--
-- Indices de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD PRIMARY KEY (`idpuntaje`),
  ADD KEY `fkpuntaje_registro_idx` (`idregistro`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idregistro`),
  ADD UNIQUE KEY `idestudiante_idpartido_unique` (`idestudiante`,`idpartido`),
  ADD KEY `fkregistropartido_idx` (`idpartido`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD UNIQUE KEY `UNIQUE_registro_pregunta` (`idpregunta`,`idregistro`),
  ADD KEY `fkrespuestapregunta_idx` (`idpregunta`),
  ADD KEY `fkrespuestaregistro_idx` (`idregistro`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idsede`);

--
-- Indices de la tabla `signo`
--
ALTER TABLE `signo`
  ADD PRIMARY KEY (`idsigno`),
  ADD KEY `fksigno_versus_idx` (`idversus`);

--
-- Indices de la tabla `versus`
--
ALTER TABLE `versus`
  ADD PRIMARY KEY (`idversus`),
  ADD KEY `fkversusenfrentamiento_idx` (`idenfrentamiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enfrentamiento`
--
ALTER TABLE `enfrentamiento`
  MODIFY `idenfrentamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadopregunta`
--
ALTER TABLE `estadopregunta`
  MODIFY `idestadopregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idestudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `idpartido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  MODIFY `idpuntaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idregistro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `idsede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `signo`
--
ALTER TABLE `signo`
  MODIFY `idsigno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `versus`
--
ALTER TABLE `versus`
  MODIFY `idversus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enfrentamiento`
--
ALTER TABLE `enfrentamiento`
  ADD CONSTRAINT `fkenfrentamientopartido` FOREIGN KEY (`idpartido`) REFERENCES `partido` (`idpartido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkenfrentamientoregistro` FOREIGN KEY (`idregistro`) REFERENCES `registro` (`idregistro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fkestudiante_sede` FOREIGN KEY (`idsede`) REFERENCES `sede` (`idsede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `fkpartido_grado` FOREIGN KEY (`idgrado`) REFERENCES `grado` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkpartido_sede` FOREIGN KEY (`idsede`) REFERENCES `sede` (`idsede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fkpreguntaestadopregunta` FOREIGN KEY (`idestadopregunta`) REFERENCES `estadopregunta` (`idestadopregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkpreguntapartido` FOREIGN KEY (`idpartido`) REFERENCES `partido` (`idpartido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD CONSTRAINT `fkpuntaje_registro` FOREIGN KEY (`idregistro`) REFERENCES `registro` (`idregistro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `fkregistroestudiante` FOREIGN KEY (`idestudiante`) REFERENCES `estudiante` (`idestudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkregistropartido` FOREIGN KEY (`idpartido`) REFERENCES `partido` (`idpartido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fkrespuestapregunta` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkrespuestaregistro` FOREIGN KEY (`idregistro`) REFERENCES `registro` (`idregistro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `signo`
--
ALTER TABLE `signo`
  ADD CONSTRAINT `fksigno_versus` FOREIGN KEY (`idversus`) REFERENCES `versus` (`idversus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `versus`
--
ALTER TABLE `versus`
  ADD CONSTRAINT `fkversus_enfrentamiento` FOREIGN KEY (`idenfrentamiento`) REFERENCES `enfrentamiento` (`idenfrentamiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
