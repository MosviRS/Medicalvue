-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2020 a las 02:45:36
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medifast`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `fk_paciente` int(11) DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_cita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fk_paciente`, `observaciones`, `fech_cita`) VALUES
(2, 6, 'hoalkddd', '2020-09-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `fk_paciente` int(11) NOT NULL,
  `motivo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_consulta` date DEFAULT NULL,
  `diagnostico` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `examnes_medicos` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medics`
--

CREATE TABLE `datos_medics` (
  `fk_medico` int(11) NOT NULL,
  `fecha_naci` date DEFAULT NULL,
  `especialidad` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_medics`
--

INSERT INTO `datos_medics` (`fk_medico`, `fecha_naci`, `especialidad`, `telefono`) VALUES
(1, '2020-10-08', 'cardiologia', '+527225637444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_paciente`
--

CREATE TABLE `datos_paciente` (
  `id_datospaci` int(11) NOT NULL,
  `peso` double DEFAULT NULL,
  `talla` double DEFAULT NULL,
  `estatura` double DEFAULT NULL,
  `visitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `fk_paciente` int(11) NOT NULL,
  `enfermedad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `drogas` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alergias` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_sangre` char(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `operaciones` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`fk_paciente`, `enfermedad`, `drogas`, `alergias`, `tipo_sangre`, `operaciones`) VALUES
(2, 'diabets', 'michas', 'todas', 'apo', 'aborto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` int(11) NOT NULL,
  `fk_medico` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `forma_fa` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `presentacion` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `concentracion` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamento`, `fk_medico`, `nombre`, `forma_fa`, `presentacion`, `concentracion`) VALUES
(2, 1, 'die', '100mhg', 'ccf', 'vfv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `fk_medico` int(11) DEFAULT NULL,
  `nombres` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_nac` date DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `fk_medico`, `nombres`, `apellidos`, `telefono`, `direccion`, `fech_nac`, `sexo`, `email`, `edad`) VALUES
(2, 1, 'silvia', 'seded', '+527225637444', 'SAN MIGUEL PRO M16 LOTE 22\r\nEX RANCHO SANDIMAS', '2020-09-14', 'M', 'mosvi_randy@hotmail.com', 23),
(6, 1, 'vvb', 'buu', 'bhnh', 'jbjobipipnk', '2020-09-09', 'M', 'njmj', 88);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `fk_consulta` int(11) NOT NULL,
  `fk_medicamento` int(11) NOT NULL,
  `indicaciones` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombres` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `passwrd` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `passwrd`) VALUES
(1, 'Diego dios', 'Barajas', 'mosvi_randy@hotmail.com', '$2y$10$vmV6vCcqmxiOM6aQnAnkXuqnF1cgJKdFLnkxqSvlN5Dm0mCDL7MTa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_pacientesc` (`fk_paciente`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_consulta` (`fk_paciente`);

--
-- Indices de la tabla `datos_medics`
--
ALTER TABLE `datos_medics`
  ADD PRIMARY KEY (`fk_medico`),
  ADD UNIQUE KEY `fk_medico` (`fk_medico`);

--
-- Indices de la tabla `datos_paciente`
--
ALTER TABLE `datos_paciente`
  ADD PRIMARY KEY (`id_datospaci`),
  ADD UNIQUE KEY `id_datospaci` (`id_datospaci`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`fk_paciente`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`),
  ADD KEY `fk_medicsom` (`fk_medico`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_medicosp` (`fk_medico`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD KEY `fk_consultas` (`fk_consulta`),
  ADD KEY `fk_medicamentos` (`fk_medicamento`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_pacientesc` FOREIGN KEY (`fk_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consulta` FOREIGN KEY (`fk_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_medics`
--
ALTER TABLE `datos_medics`
  ADD CONSTRAINT `fk_medicos` FOREIGN KEY (`fk_medico`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_paciente`
--
ALTER TABLE `datos_paciente`
  ADD CONSTRAINT `fk_pceintedatos` FOREIGN KEY (`id_datospaci`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_pacihisto` FOREIGN KEY (`fk_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `fk_medicsom` FOREIGN KEY (`fk_medico`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `fk_medicosp` FOREIGN KEY (`fk_medico`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `fk_consultas` FOREIGN KEY (`fk_consulta`) REFERENCES `consultas` (`id_consulta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_medicamentos` FOREIGN KEY (`fk_medicamento`) REFERENCES `medicamentos` (`id_medicamento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
