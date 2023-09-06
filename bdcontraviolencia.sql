-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2023 a las 00:47:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29
drop database bdcontraviolencia;
create database bdcontraviolencia;
use bdcontraviolencia;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcontraviolencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ci` int(11) NOT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL,
  `contrasenia` varchar(20) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `privilegios` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agresor`
--

CREATE TABLE `agresor` (
  `ci` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agresor`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `codAlerta` int(11) NOT NULL,
  `estado` varchar(90) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `ci_usuario` int(11) DEFAULT NULL,
  `codGeo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `alerta`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_local`
--

CREATE TABLE `centro_local` (
  `codCentro` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `centro_local`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_emergencia`
--

CREATE TABLE `contacto_emergencia` (
  `ci_contacto` int(11) NOT NULL,
  `parentesco` varchar(40) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto_emergencia`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE `denuncia` (
  `codDenuncia` int(11) NOT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `testigo` varchar(80) DEFAULT NULL,
  `seguimiento` varchar(80) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `codGeo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `denuncia`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_riesgo`
--

CREATE TABLE `evaluacion_riesgo` (
  `codFormulario` int(11) NOT NULL,
  `url_cuestionario` varchar(70) DEFAULT NULL,
  `consejo` varchar(70) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluacion_riesgo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `codEvento` int(11) NOT NULL,
  `tipo` varchar(90) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `duracion` varchar(20) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evento`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `geolocalizacion`
--

CREATE TABLE `geolocalizacion` (
  `codGeo` int(11) NOT NULL,
  `latitud` varchar(20) DEFAULT NULL,
  `longitud` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `geolocalizacion`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidente_prueba`
--

CREATE TABLE `incidente_prueba` (
  `codDenuncia` int(11) NOT NULL,
  `codPrueba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidente_prueba`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_educativa`
--

CREATE TABLE `informacion_educativa` (
  `codInformacion` int(11) NOT NULL,
  `rutaDirectorio` varchar(90) DEFAULT NULL,
  `tipo` varchar(90) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informacion_educativa`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ley_normativa`
--

CREATE TABLE `ley_normativa` (
  `codLey` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_promulgacion` date DEFAULT NULL,
  `tematica` varchar(300) DEFAULT NULL,
  `informacion` varchar(300) DEFAULT NULL,
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ley_normativa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llena`
--

CREATE TABLE `llena` (
  `ci_usuario` int(11) NOT NULL,
  `codFormulario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `llena`
--




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `codMensaje` int(11) NOT NULL,
  `fechaMesaje` date DEFAULT NULL,
  `horaMensaje` varchar(20) DEFAULT NULL,
  `contenidoMensaje` varchar(100) DEFAULT NULL,
  `ci_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensaje`
--




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apePaterno` varchar(20) DEFAULT NULL,
  `apeMaterno` varchar(20) DEFAULT NULL,
  `fechaNaci` date DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `direccion` varchar(90) DEFAULT NULL,
  `estado_civil` varchar(20) DEFAULT NULL,
  `profesion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `codPrueba` int(11) NOT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prueba`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza`
--

CREATE TABLE `realiza` (
  `ci_usuario` int(11) NOT NULL,
  `codDenuncia` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `anonimo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `realiza`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibe`
--

CREATE TABLE `recibe` (
  `codMensaje` int(11) NOT NULL,
  `ci_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recibe`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `ci_contacto` int(11) NOT NULL,
  `ci_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiene`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL,
  `contrasenia` varchar(20) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `victima`
--

CREATE TABLE `victima` (
  `ci` int(11) NOT NULL,
  `relacion_perpetrador` varchar(70) DEFAULT NULL,
  `codDenuncia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `victima`
--



-- #################################################

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `agresor`
--
ALTER TABLE `agresor`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`codAlerta`),
  ADD KEY `R_30` (`codGeo`),
  ADD KEY `R_31` (`ci_usuario`);

--
-- Indices de la tabla `centro_local`
--
ALTER TABLE `centro_local`
  ADD PRIMARY KEY (`codCentro`),
  ADD KEY `R_35` (`ci`);

--
-- Indices de la tabla `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD PRIMARY KEY (`ci_contacto`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`codDenuncia`),
  ADD KEY `R_29` (`codGeo`);

--
-- Indices de la tabla `evaluacion_riesgo`
--
ALTER TABLE `evaluacion_riesgo`
  ADD PRIMARY KEY (`codFormulario`),
  ADD KEY `R_34` (`ci`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`codEvento`),
  ADD KEY `R_33` (`ci`);

--
-- Indices de la tabla `geolocalizacion`
--
ALTER TABLE `geolocalizacion`
  ADD PRIMARY KEY (`codGeo`);

--
-- Indices de la tabla `incidente_prueba`
--
ALTER TABLE `incidente_prueba`
  ADD PRIMARY KEY (`codDenuncia`,`codPrueba`),
  ADD KEY `R_28` (`codPrueba`);

--
-- Indices de la tabla `informacion_educativa`
--
ALTER TABLE `informacion_educativa`
  ADD PRIMARY KEY (`codInformacion`),
  ADD KEY `R_32` (`ci`);

--
-- Indices de la tabla `ley_normativa`
--
ALTER TABLE `ley_normativa`
  ADD PRIMARY KEY (`codLey`);

--
-- Indices de la tabla `llena`
--
ALTER TABLE `llena`
  ADD PRIMARY KEY (`ci_usuario`,`codFormulario`),
  ADD KEY `R_40` (`codFormulario`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`codMensaje`),
  ADD KEY `R_16` (`ci_usuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`codPrueba`);

--
-- Indices de la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD PRIMARY KEY (`ci_usuario`,`codDenuncia`,`ci`),
  ADD KEY `R_22` (`codDenuncia`),
  ADD KEY `R_24` (`ci`);

--
-- Indices de la tabla `recibe`
--
ALTER TABLE `recibe`
  ADD PRIMARY KEY (`codMensaje`,`ci_usuario`),
  ADD KEY `R_19` (`ci_usuario`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`ci_contacto`,`ci_usuario`),
  ADD KEY `R_15` (`ci_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci_usuario`);

--
-- Indices de la tabla `victima`
--
ALTER TABLE `victima`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `R_25` (`codDenuncia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `codAlerta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `centro_local`
--
ALTER TABLE `centro_local`
  MODIFY `codCentro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `codEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `informacion_educativa`
--
ALTER TABLE `informacion_educativa`
  MODIFY `codInformacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ley_normativa`
--
ALTER TABLE `ley_normativa`
  MODIFY `codLey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;

--
-- Filtros para la tabla `agresor`
--
ALTER TABLE `agresor`
  ADD CONSTRAINT `agresor_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `R_30` FOREIGN KEY (`codGeo`) REFERENCES `geolocalizacion` (`codGeo`),
  ADD CONSTRAINT `R_31` FOREIGN KEY (`ci_usuario`) REFERENCES `usuario` (`ci_usuario`);

--
-- Filtros para la tabla `centro_local`
--
ALTER TABLE `centro_local`
  ADD CONSTRAINT `R_35` FOREIGN KEY (`ci`) REFERENCES `administrador` (`ci`);

--
-- Filtros para la tabla `contacto_emergencia`
--
ALTER TABLE `contacto_emergencia`
  ADD CONSTRAINT `contacto_emergencia_ibfk_1` FOREIGN KEY (`ci_contacto`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `R_29` FOREIGN KEY (`codGeo`) REFERENCES `geolocalizacion` (`codGeo`);

--
-- Filtros para la tabla `evaluacion_riesgo`
--
ALTER TABLE `evaluacion_riesgo`
  ADD CONSTRAINT `R_34` FOREIGN KEY (`ci`) REFERENCES `administrador` (`ci`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `R_33` FOREIGN KEY (`ci`) REFERENCES `administrador` (`ci`);

--
-- Filtros para la tabla `ley_normativa`
--
ALTER TABLE `ley_normativa`
  ADD CONSTRAINT `R_37` FOREIGN KEY (`ci`) REFERENCES `administrador` (`ci`);

--
-- Filtros para la tabla `incidente_prueba`
--
ALTER TABLE `incidente_prueba`
  ADD CONSTRAINT `R_26` FOREIGN KEY (`codDenuncia`) REFERENCES `denuncia` (`codDenuncia`),
  ADD CONSTRAINT `R_28` FOREIGN KEY (`codPrueba`) REFERENCES `prueba` (`codPrueba`);

--
-- Filtros para la tabla `informacion_educativa`
--
ALTER TABLE `informacion_educativa`
  ADD CONSTRAINT `R_32` FOREIGN KEY (`ci`) REFERENCES `administrador` (`ci`);

--
-- Filtros para la tabla `llena`
--
ALTER TABLE `llena`
  ADD CONSTRAINT `R_38` FOREIGN KEY (`ci_usuario`) REFERENCES `usuario` (`ci_usuario`),
  ADD CONSTRAINT `R_40` FOREIGN KEY (`codFormulario`) REFERENCES `evaluacion_riesgo` (`codFormulario`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `R_16` FOREIGN KEY (`ci_usuario`) REFERENCES `usuario` (`ci_usuario`);

--
-- Filtros para la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `R_20` FOREIGN KEY (`ci_usuario`) REFERENCES `usuario` (`ci_usuario`),
  ADD CONSTRAINT `R_22` FOREIGN KEY (`codDenuncia`) REFERENCES `denuncia` (`codDenuncia`),
  ADD CONSTRAINT `R_24` FOREIGN KEY (`ci`) REFERENCES `agresor` (`ci`);

--
-- Filtros para la tabla `recibe`
--
ALTER TABLE `recibe`
  ADD CONSTRAINT `R_17` FOREIGN KEY (`codMensaje`) REFERENCES `mensaje` (`codMensaje`),
  ADD CONSTRAINT `R_19` FOREIGN KEY (`ci_usuario`) REFERENCES `usuario` (`ci_usuario`);

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `R_15` FOREIGN KEY (`ci_usuario`) REFERENCES `usuario` (`ci_usuario`),
  ADD CONSTRAINT `R_9` FOREIGN KEY (`ci_contacto`) REFERENCES `contacto_emergencia` (`ci_contacto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ci_usuario`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;

--
-- Filtros para la tabla `victima`
--
ALTER TABLE `victima`
  ADD CONSTRAINT `R_25` FOREIGN KEY (`codDenuncia`) REFERENCES `denuncia` (`codDenuncia`),
  ADD CONSTRAINT `victima_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
