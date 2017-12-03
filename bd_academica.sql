-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2017 a las 19:55:10
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_academica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(74, 1512324440, '::1', 'Wam5N0'),
(75, 1512324768, '::1', 'WwHeh9'),
(76, 1512324815, '::1', 'XNFLVy'),
(77, 1512324979, '::1', 'MdsBnt'),
(78, 1512325170, '::1', 'kbTpVt'),
(79, 1512326360, '::1', 'QRagUl'),
(80, 1512326384, '::1', 'swDfR7'),
(81, 1512326515, '::1', 'eHnB4D'),
(82, 1512326854, '::1', 'pMnmwL'),
(83, 1512327102, '::1', 'c7F0mL'),
(84, 1512327213, '::1', 'kEDYQB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id_est` int(12) NOT NULL,
  `titulo_est` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha_grado_est` date NOT NULL,
  `nivel_form_est` enum('PREGRADO','ESPECIALIZACION','MAESTRIA','DOCTORADO') COLLATE utf8_bin NOT NULL,
  `modalidad_est` enum('PRESENCIAL','VIRTUAL') COLLATE utf8_bin NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id_est`, `titulo_est`, `fecha_grado_est`, `nivel_form_est`, `modalidad_est`, `usuario`) VALUES
(1, 'Ingeniero de Sistemas', '1990-11-30', 'PREGRADO', 'PRESENCIAL', 12),
(2, 'Magister en Gerencia de Proyectos', '2010-11-14', 'MAESTRIA', 'PRESENCIAL', 1),
(3, 'Especializacion en Seguridad Informatica', '2005-09-03', 'ESPECIALIZACION', 'VIRTUAL', 11),
(6, 'Ingeniero Electronico', '1977-12-17', 'PREGRADO', 'VIRTUAL', 4),
(7, 'Especialista en Redes y Telecomunicaciones', '2000-11-06', 'ESPECIALIZACION', 'PRESENCIAL', 4),
(8, 'Administrador de Empresas', '2005-11-12', 'PREGRADO', 'VIRTUAL', 3),
(9, 'Maestria en Administracion de Negocios', '2009-08-13', 'MAESTRIA', 'PRESENCIAL', 3),
(10, 'Ingeniero de Sistemas', '1987-11-06', 'PREGRADO', 'PRESENCIAL', 7),
(11, 'Especializacion En Multimedia Educativa', '1997-12-02', 'ESPECIALIZACION', 'VIRTUAL', 7),
(12, 'Master Of Science En Ingenieria', '1999-11-28', 'MAESTRIA', 'PRESENCIAL', 2),
(13, 'Doctorado En Ingeniería', '2006-11-30', 'DOCTORADO', 'PRESENCIAL', 7),
(14, 'Ingeniero de Sistemas', '1999-09-19', 'PREGRADO', 'VIRTUAL', 5),
(15, 'Especialización en Docencia Universitaria', '2006-09-04', 'ESPECIALIZACION', 'PRESENCIAL', 5),
(16, 'Magister Universidad Autonoma de Bucaramanga Software Libre', '2015-08-21', 'MAESTRIA', 'PRESENCIAL', 1),
(17, 'Ingeniero Acuicola', '2017-11-09', 'PREGRADO', 'VIRTUAL', 13),
(22, 'Ingeniero de Sistemas', '2017-12-05', 'PREGRADO', 'PRESENCIAL', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_eve` int(10) NOT NULL,
  `nombre_eve` varchar(100) COLLATE utf8_bin NOT NULL,
  `tipo_eve` varchar(50) COLLATE utf8_bin NOT NULL,
  `lugar_eve` varchar(50) COLLATE utf8_bin NOT NULL,
  `fecha_ini_eve` date NOT NULL,
  `fecha_fin_eve` date NOT NULL,
  `valor_eve` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_eve`, `nombre_eve`, `tipo_eve`, `lugar_eve`, `fecha_ini_eve`, `fecha_fin_eve`, `valor_eve`, `usuario`) VALUES
(18, 'CICOM 2017', 'Congreso', 'Cali', '2017-12-20', '2017-12-24', 230000, 5),
(19, 'CACIED 2018', 'Congreso', 'BOGOTA', '2018-01-01', '2018-10-01', 80000, 2),
(20, 'CONISOFT 2018', 'Conversatorio', 'CARTAGENA', '2018-02-02', '2018-02-08', 70000, 3),
(21, 'Seminario FAC ', 'Seminario', 'Medellin', '2018-03-03', '2018-03-05', 88999, 6),
(22, 'COLCOM 2018', 'Conversatorio', 'Cesar', '2018-05-08', '2018-05-10', 5000, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productividad`
--

CREATE TABLE `productividad` (
  `id_prod` int(11) NOT NULL,
  `titulo_prod` varchar(300) COLLATE utf8_bin NOT NULL,
  `tipo_prod` varchar(50) COLLATE utf8_bin NOT NULL,
  `fecha_real_prod` date NOT NULL,
  `lugar_prod` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion_prod` text COLLATE utf8_bin NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productividad`
--

INSERT INTO `productividad` (`id_prod`, `titulo_prod`, `tipo_prod`, `fecha_real_prod`, `lugar_prod`, `descripcion_prod`, `usuario`) VALUES
(1, 'Nuevas practicas de mineria de datos', 'Articulo', '2017-05-08', 'Pasto-Colombia', 'Articulo pare revista indexada ', 1),
(2, 'Tendecias de las Aplicaciones Moviles en el mundo de la tecnologia globalizada', 'Libro', '2015-09-03', 'Cali', 'Libro publicado en el año 2015 - Area ingenieria de software aplicada en el campo de las apps moviles', 6),
(3, 'Expectativas hacia la ingenieria de sistemas por estudiantes y profesionales', 'Ponencias', '2017-04-03', 'Bogotá', 'Ponencia realizada en el septimo congreso internacional de computacion CICOM 2017', 11),
(4, 'Administracion de Negocios en un campo de vision empresarial activa', 'Libro', '2014-05-08', 'Medellin', 'Libro de la Editorial Normal.\r\nPublicado año 2015\r\nPaginas : 120', 5),
(5, 'DISEÑO PEDAGÓGICO E IMPLEMENTACIÓN DE HERRAMIENTAS PARA EL PROYECTO \"ENSEÑANZA DE LA LÓGICA DE PROGRAMACIÓN UTILIZANDO COMPUTACIÓN GRÁFICA', 'Trabajo de Investigación', '2016-08-17', 'Pasto-Colombia', 'Estado: Tesis en curso  Ingeniería de Siatemas  ,2014,  . Persona orientada: LUISA MARÍA RAMÍREZ RIASCOS, MYRIAM DEL SOCORRO AYALA BENAVIDES  , Dirigió como: Tutor principal,  meses   ', 12),
(6, 'MEDICIÓN DE LA CALIDAD DEL SISTEMA DE INFORMACIÓN GEORREFERENCIADO DEL OBSERVATORIO DEL DELITO DE PASTO - SIGEODEP UTILIZANDO LA NORMA ISO/IEC 9126 ', 'Trabajo de Investigación', '2017-02-13', 'Popayán', 'Tesis concluida  Ingeniería de Siatemas  ,2013,  . Persona orientada: JOSE LUIS GARCÍA PARRA, EDGAR CAICEDO BRAVO, JOSE LUIS MARTINEZ DÍAZ  , Dirigió como: Tutor principal.', 3),
(8, 'Nuevas practicas para ingenieria de software', 'Conversatorio', '2017-12-05', 'Pasto', '<p>\r\n	Ponencia&nbsp;</p>\r\n', 16),
(12, 'Cacied', 'Congreso', '2017-12-07', 'San Juan de Pasto', '<p>\r\n	Congreso andino de computacion y educacion</p>\r\n', 3),
(13, 'Encuentro de Ingenierias 2017', 'Seminario', '2017-02-08', 'Cartagena de Indias', '<p>\r\n	Seminario en Cartagena</p>\r\n', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `cedula_usu` varchar(12) COLLATE utf8_bin NOT NULL,
  `nombre_usu` varchar(50) COLLATE utf8_bin NOT NULL,
  `pass_usu` varchar(50) COLLATE utf8_bin NOT NULL,
  `rol_usu` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `cedula_usu`, `nombre_usu`, `pass_usu`, `rol_usu`) VALUES
(1, '123', 'Paola Arturo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'administrador'),
(2, '456', 'Mercedes Calvache', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'docente'),
(3, '789', 'Manuel Bolaños', 'adc16fa41a38b174232f206e0b2bd006baaace68', 'docente'),
(4, '222', 'Ricardo Timaran', 'd4e7430f1534a12df46cedd1ac369935436dbb94', 'administrador'),
(5, '333', 'Javier Jimenez', '828c1a17681e8566a17a1a4801ea67306010b273', 'docente'),
(6, '414', 'Gonzalo Hernandez', 'b28a29fcb6e94e3cbbeec744bd118b3e01e8195c', 'docente'),
(7, '987', 'Franklin Jimenez', 'bc86b4718d6341a10975f676a2d3cf777d29ccb2', 'docente'),
(8, '090', 'Jairo Guerrero', '6f30063a21b45968d3f936ab307afcf2dc36e39c', 'docente'),
(10, '478', 'Luis Obeymar Estrada', 'faea5242a00c52da62a0f00df168c199b7ab748d', 'administrador'),
(11, '321', 'Nelson Jaramillo', 'd915f4e970e53654202c1cf5c62e60a7280a8219', 'docente'),
(12, '778', 'Hernando  Guerrero', '3aef3636924191a3e18fabc850c496f7e4110691', 'docente'),
(13, '99993', 'Marlon David Rosero', '4170ac2a2782a1516fe9e13d7322ae482c1bd594', 'administrador'),
(14, '7770', 'Miriam Suarez', '519c37575e05a18b307b418a3cd8539a35c79ff2', 'docente'),
(15, '555', 'Marcela Guerrero', 'cfa1150f1787186742a9a884b73a43d8cf219f9b', 'administrador'),
(16, '9613', 'Carolina Fernanda Guerrero Suarez', '08a2079339d57921a3b1c66726fbd7fac3c50360', 'docente'),
(17, '1000', 'Maria Eugenia Suarez', 'e3cbba8883fe746c6e35783c9404b4bc0c7ee9eb', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id_est`),
  ADD KEY `estudios_ibfk_1` (`usuario`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_eve`),
  ADD KEY `eventos_ibfk_1` (`usuario`);

--
-- Indices de la tabla `productividad`
--
ALTER TABLE `productividad`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `productividad_ibfk_1` (`usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD UNIQUE KEY `cedula_usu` (`cedula_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id_est` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_eve` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `productividad`
--
ALTER TABLE `productividad`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `estudios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productividad`
--
ALTER TABLE `productividad`
  ADD CONSTRAINT `productividad_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
