-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2022 a las 22:18:45
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `caebarin_colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE `codigos` (
  `id` int(11) NOT NULL,
  `clave` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1234',
  `tipo_usuario` int(3) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `listado` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id`, `clave`, `tipo_usuario`, `descripcion`, `listado`, `actualizado`) VALUES
(1, '1234', 2, 'Acceso total al sistema', '2019-09-17 18:12:23', '2019-09-17 18:12:23'),
(2, '4321', 3, 'Acceso de secretaria', '2019-09-17 18:12:23', '2019-09-17 18:12:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `year` int(10) NOT NULL DEFAULT 2019,
  `mes` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cuota` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_cuota` int(50) NOT NULL,
  `estado_cuota` int(20) NOT NULL,
  `listado` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id`, `id_usuario`, `year`, `mes`, `cuota`, `tipo_cuota`, `estado_cuota`, `listado`, `actualizado`) VALUES
(6, 4, 2019, 'FEBRERO', '50000', 1, 1, '2019-09-24 05:13:53', '2019-09-24 05:13:53'),
(7, 5, 2019, 'ENERO', '50000', 1, 1, '2019-09-25 03:57:29', '2019-09-25 03:57:29'),
(8, 5, 2019, 'FEBRERO', '50000', 1, 1, '2019-09-25 03:57:29', '2019-09-25 03:57:29'),
(9, 5, 2019, 'MARZO', '50000', 1, 0, '2019-09-25 03:57:29', '2019-09-25 03:57:29'),
(10, 5, 2019, 'ABRIL', '50000', 1, 0, '2019-09-25 03:57:29', '2019-09-25 03:57:29'),
(11, 5, 2019, 'MAYO', '50000', 1, 0, '2019-09-25 03:57:29', '2019-09-25 03:57:29'),
(12, 4, 2019, 'MARZO', '50000', 1, 1, '2019-09-26 13:22:14', '2019-09-26 13:22:14'),
(13, 4, 2019, 'ABRIL', '50000', 1, 1, '2019-09-26 13:22:14', '2019-09-26 13:22:14'),
(14, 4, 2019, 'MAYO', '50000', 1, 1, '2019-09-26 13:22:14', '2019-09-26 13:22:14'),
(16, 4, 2019, 'JULIO', '50000', 1, 1, '2019-09-26 13:22:14', '2019-09-26 13:22:14'),
(17, 4, 2019, 'AGOSTO', '50000', 1, 1, '2019-09-26 14:26:58', '2019-09-26 14:26:58'),
(20, 5, 2019, 'DICIEMBRE', '50000', 1, 0, '2019-09-30 03:58:43', '2019-09-30 03:58:43'),
(21, 5, 2019, 'OCTUBRE', '50000', 1, 0, '2019-09-30 03:59:17', '2019-09-30 03:59:17'),
(22, 4, 2092, 'ENERO', '50000', 1, 0, '2019-09-30 04:11:51', '2019-09-30 04:11:51'),
(23, 4, 2192, 'ENERO', '50000', 1, 0, '2019-09-30 04:12:24', '2019-09-30 04:12:24'),
(24, 13, 2019, 'ENERO', '50000', 1, 1, '2019-10-03 16:16:08', '2019-10-03 16:16:08'),
(25, 13, 2019, 'FEBRERO', '50000', 1, 1, '2019-10-03 16:16:08', '2019-10-03 16:16:08'),
(26, 13, 2019, 'MARZO', '50000', 1, 0, '2019-10-03 16:16:08', '2019-10-03 16:16:08'),
(27, 13, 2019, 'ABRIL', '50000', 1, 0, '2019-10-03 16:16:08', '2019-10-03 16:16:08'),
(29, 14, 2019, 'ENERO', '50000', 1, 0, '2019-10-03 16:24:33', '2019-10-03 16:24:33'),
(30, 14, 2019, 'FEBRERO', '50000', 1, 0, '2019-10-03 16:24:33', '2019-10-03 16:24:33'),
(31, 14, 2019, 'MARZO', '50000', 1, 0, '2019-10-03 16:24:33', '2019-10-03 16:24:33'),
(32, 14, 2019, 'ABRIL', '50000', 1, 0, '2019-10-03 16:24:33', '2019-10-03 16:24:33'),
(33, 14, 2019, 'MAYO', '50000', 1, 0, '2019-10-03 16:24:33', '2019-10-03 16:24:33'),
(34, 4, 2022, 'ENERO', '100', 1, 1, '2022-01-14 21:02:14', '2022-01-14 21:02:14'),
(35, 4, 2022, 'FEBRERO', '50', 1, 0, '2022-01-14 21:02:14', '2022-01-14 21:02:14'),
(36, 4, 2022, 'MARZO', '50', 1, 0, '2022-01-14 21:02:14', '2022-01-14 21:02:14'),
(37, 4, 2022, 'ABRIL', '100', 1, 0, '2022-01-14 21:02:14', '2022-01-14 21:02:14'),
(38, 4, 2022, 'MAYO', '122', 1, 0, '2022-01-14 21:02:14', '2022-01-14 21:02:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_familiares`
--

CREATE TABLE `datos_familiares` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `listado` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `datos_familiares`
--

INSERT INTO `datos_familiares` (`id`, `id_usuario`, `nombre`, `apellido`, `parentesco`, `telefono`, `listado`, `actualizado`) VALUES
(5, 5, ' Julio Jose', 'perez', 'hijo', '0414345363', '2019-09-24 04:12:31', '2019-09-24 04:12:31'),
(12, 4, ' Julio Jose', 'Osuna Aguirre', 'hijo', '04169733666', '2019-09-30 04:16:02', '2019-09-30 04:16:02'),
(17, 14, 'Julio Jose', 'Osuna Aguirre', 'hijo', '04169733666', '2019-10-03 16:23:52', '2019-10-03 16:23:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `tiempo` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `fecha`, `mensaje`, `img`, `tiempo`) VALUES
(31, 'Noticias 3', '2019-10-03', '                                                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                                \r\n                                                                                                                ', 'desarrolloWEb.jpg', '1570121440'),
(33, 'prueba  2', '2019-10-02', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                                \r\n                            ', '1483443302_397325_1483443485_noticia_normal.jpg', '1570006585'),
(34, 'Bienvenidos a nuestro Sitio Web', '2019-10-03', 'En esta pÃ¡gina web podrÃ¡s consultar informaciÃ³n de nuestro Colegio de Abogados Barinas.                                 \r\n                            ', 'contacto2.jpg', '1570119917'),
(35, 'Prueba de live', '2022-01-14', ' informacion importante                             \r\n                            ', 'amor.png', '1642194377');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `banco` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `numero_referencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `listado` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `nombre`, `cedula`, `banco`, `numero_referencia`, `fecha`, `monto`, `listado`, `actualizado`) VALUES
(2, 'Yenny Yamilex', '10873864', 'Tesoro', '12456', '2019-09-15', '50000', '2019-09-18 16:36:55', '2019-09-18 16:36:55'),
(8, 'Yenny Yamilex', '10873864', 'Tesoro', '231212', '2019-09-17', '55000', '2019-09-18 16:52:15', '2019-09-18 16:52:15'),
(9, 'Yenny Yamilex', '10873864', 'Tesoro', '123123213', '2019-09-17', '200000', '2019-09-18 18:14:13', '2019-09-18 18:14:13'),
(10, 'Jose Gregorio', '8872720', 'Tesoro movil', '123456', '2019-09-18', '200000', '2019-09-18 19:17:00', '2019-09-18 19:17:00'),
(11, 'Yenny Yamilex', '10873864', 'Tesoro', '1234567', '2019-09-18', '50000', '2019-09-18 19:53:20', '2019-09-18 19:53:20'),
(12, 'Yenny Yamilex', '10873864', 'bnc', '1234', '2019-09-10', '50000', '2019-09-30 02:38:25', '2019-09-30 02:38:25'),
(13, 'Yenny Yamilex', '10873864', 'bnc', '1231', '2019-09-05', '123123', '2019-09-30 02:51:23', '2019-09-30 02:51:23'),
(15, 'Yenny Yamilex', '10873864', 'bnc', '211', '2019-09-04', '1231222', '2019-09-30 02:52:56', '2019-09-30 02:52:56'),
(17, 'Yenny Yamilex', '10873864', 'bnc', '12312', '2019-09-04', '13123', '2019-09-30 03:01:01', '2019-09-30 03:01:01'),
(18, 'Jose Ramon', '9268841', 'bnc', '123123', '2019-09-05', '23131', '2019-09-30 03:45:51', '2019-09-30 03:45:51'),
(20, 'Jose Ramon', '9268841', 'bnc', '123123123', '2019-09-17', '213123', '2019-09-30 03:46:49', '2019-09-30 03:46:49'),
(21, 'Yenny Yamilex', '10873864', 'bnc', '1231231', '2019-09-05', '321312', '2019-09-30 03:48:21', '2019-09-30 03:48:21'),
(23, 'Yenny Yamilex', '10873864', 'bnc', '12312312312321123', '2019-10-03', '1323131231', '2019-10-03 16:11:07', '2019-10-03 16:11:07'),
(24, 'juan tres', '10873861', 'bnc', '0990009', '2019-10-03', '50000', '2019-10-03 16:19:18', '2019-10-03 16:19:18'),
(25, 'juan tres', '10873861', 'bnc', '1278564', '2019-10-03', '50000', '2019-10-03 16:20:36', '2019-10-03 16:20:36'),
(26, 'Yenny Yamilex', '10873864', 'tesoro', '100202', '2022-01-01', '100', '2022-01-14 21:04:51', '2022-01-14 21:04:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `listado` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `email`, `listado`, `actualizado`) VALUES
(1, 'yordhis.10@gmail.com', '2019-10-02 14:15:26', '2019-10-02 14:15:26'),
(4, 'cordovadavid40@gmail.com', '2019-10-02 14:26:27', '2019-10-02 14:26:27'),
(6, 'test.10@gmail.com', '2019-10-02 14:29:22', '2019-10-02 14:29:22'),
(7, 'noticias@gmail.com', '2019-10-02 14:29:46', '2019-10-02 14:29:46'),
(8, 'vernoti.10@gmail.com', '2019-10-02 14:30:09', '2019-10-02 14:30:09'),
(10, 'cordovadavid41@gmail.com', '2019-10-02 14:35:23', '2019-10-02 14:35:23'),
(12, 'tesr.10@gmail.com', '2019-10-02 14:36:16', '2019-10-02 14:36:16'),
(22, 'ssasq@pd.cpom', '2019-10-02 14:45:00', '2019-10-02 14:45:00'),
(31, 'yordhis.10s@gmail.com', '2019-10-02 14:54:32', '2019-10-02 14:54:32'),
(32, 'yordhi9s.10@gmail.com', '2019-10-03 15:43:57', '2019-10-03 15:43:57'),
(33, 'alfacapitals.pro@gmail.com', '2022-01-14 21:08:34', '2022-01-14 21:08:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `clave` text COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(15) NOT NULL DEFAULT 0,
  `edad` int(3) NOT NULL DEFAULT 0,
  `nacionalidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `lugar_nacimiento` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `n_colegio` int(20) NOT NULL,
  `tomo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `folio` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `n_impre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `universidad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_laboral` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_laboral` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `redes_sociales` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO APLICA/NO APLICA/ NO APLICA',
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `info_adicional` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_usuario` int(3) NOT NULL DEFAULT 1,
  `listado` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombres`, `apellidos`, `cedula`, `edad`, `nacionalidad`, `fecha_nacimiento`, `lugar_nacimiento`, `estado_civil`, `telefono`, `n_colegio`, `tomo`, `folio`, `fecha`, `n_impre`, `universidad`, `direccion`, `direccion_laboral`, `telefono_laboral`, `redes_sociales`, `email`, `info_adicional`, `nivel_usuario`, `listado`, `actualizado`) VALUES
(1, 'cyberstaff', '202cb962ac59075b964b07152d234b70', '', '', 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'yordhis.10@gmail.com', '', 2, '2019-09-13 04:44:15', '2019-09-13 04:44:15'),
(2, 'secretario', '202cb962ac59075b964b07152d234b70', 'Juana ', 'Mendez', 10234567, 48, 'Venezolana', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 3, '2019-09-15 04:33:59', '2019-09-15 04:33:59'),
(4, 'yenny22', '202cb962ac59075b964b07152d234b70', 'Yenny Yamilex', 'Aguirre', 10873864, 48, 'Venezolana', '2019-09-03', 'Barinas', 'CASADO', '04143556647', 501, '24', '470', '2019-09-11', '675', 'UNELLEZ', 'Urb. La Rosaleda', 'Sede Administrativa Luz y Vida', '02735463456', 'yennya/@yennya2/@yennya', 'yenny_21@gmail.com', 'Experiencia 30', 1, '2019-09-17 12:29:08', '2019-09-17 12:29:08'),
(5, 'joseespana', '1cc39ffd758234422e1f75beadfc5fb2', 'Jose Ramon', 'EspaÃƒÂ±a Marquez', 9268841, 53, 'Venezolano', '1970-09-05', 'Caracas', 'Casado', '04145673376', 0, '', '', '1989-09-04', '51243', 'Universidad Central de Venezuela', 'Av. 23 de Enero, Edificio Macri piso 2 oficina 2', 'Av. 23 de Enero, Edificio Macri piso 2 oficina 2', '02735333211', 'NO APLICA/NO APLICA/ NO APLICA', 'joseespana2001@gmail.com', '15 aÃƒÂ±os trabajando con casos penales', 1, '2019-09-18 20:11:49', '2019-09-18 20:11:49'),
(14, 'fabi', '202cb962ac59075b964b07152d234b70', 'fabiola ', 'Aguirre', 10873869, 23, 'Venezuela', '2019-10-03', 'barinas', 'Barinas', '04169733666', 0, '', '', '', '', 'Fermin toro', 'Urb. La rosaleda', 'Urb. La rosaleda', '04169733666', 'Osuna Aguirre//', 'yordhis.10@gmail.com', '15 aÃ±os trabanjando con casos penales', 1, '2019-10-03 16:23:18', '2019-10-03 16:23:18'),
(7, 'luis2019', '202cb962ac59075b964b07152d234b70', 'Luis Yorjan', 'Molina', 10873832, 22, 'Venezolano', '2019-09-10', 'Barinas', 'Soltero', '04143534567', 1234, '187', '1233', '2019-09-10', '1330', 'UNELLEZ', 'Mi casa', 'mi empresa', '', '@luis/luis/@luis', 'luis@gmail.com', '30 aÃ±os de experiecia', 1, '2019-09-23 13:05:09', '2019-09-23 13:05:09'),
(10, 'juan23', '202cb962ac59075b964b07152d234b70', 'juan', 'Osuna Aguirre', 22222, 22, 'Venezuela', '2019-09-06', 'barinas', 'Barinas', '04169733666', 123, '3213', '123', '2019-09-02', '123', 'UNELLEZ', 'Urb. La rosaleda', 'Urb. La rosaleda', '04169733666', 'Osuna Aguirre/yennya/@yennya', 'yordhis.10@gmail.com', '15 aÃ±os trabanjando con casos penales', 1, '2019-09-30 04:09:00', '2019-09-30 04:09:00'),
(11, 'lucas24', '202cb962ac59075b964b07152d234b70', 'lucas', 'Osuna Aguirre', 10873862, 22, 'Venezuela', '2019-09-12', 'barinas', 'Barinas', '04169733666', 123, '', '', '', '', '', 'Urb. La rosaleda', 'Urb. La rosaleda', '', 'Osuna Aguirre//', 'yordhis.10@gmail.com', '', 1, '2019-09-30 04:11:25', '2019-09-30 04:11:25'),
(13, 'juan43', '202cb962ac59075b964b07152d234b70', 'juan tres', 'trejo tres', 10873861, 23, 'Venezuela', '1996-03-07', 'barinas', 'Barinas', '04169733666', 0, '', '', '', '', 'UNELLEZ', 'Urb. La rosaleda', 'Urb. La rosaleda', '04169733666', 'Osuna Aguirre//', 'yordhis.10@gmail.com', '15 aÃ±os trabanjando con casos penales', 1, '2019-10-03 16:14:43', '2019-10-03 16:14:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `datos_familiares`
--
ALTER TABLE `datos_familiares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_referencia` (`numero_referencia`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `datos_familiares`
--
ALTER TABLE `datos_familiares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
