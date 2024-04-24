-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2024 a las 23:16:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea_24_abril_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aptitudes`
--

CREATE TABLE `aptitudes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `aptitud` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aptitudes`
--

INSERT INTO `aptitudes` (`id`, `usuario_id`, `aptitud`) VALUES
(5, 3, 'Capaz'),
(6, 3, 'asdasdadsd'),
(7, 8, 'Capaz'),
(8, 8, 'Amable'),
(9, 20, 'Capaz'),
(10, 20, 'Capazasd'),
(11, 22, 'Capaz'),
(12, 22, 'Capaz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cargo` varchar(64) NOT NULL,
  `empresa` varchar(64) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `experiencia_laboral`
--

INSERT INTO `experiencia_laboral` (`id`, `usuario_id`, `cargo`, `empresa`, `inicio`, `fin`) VALUES
(4, 3, 'prueba', 'Prueba', '2024-04-12', '2024-04-22'),
(5, 8, 'Diseñador', 'PRUEBA', '2024-04-08', '2024-04-17'),
(6, 8, 'PRUEBA', 'asdasdas', '2024-04-12', '2024-04-04'),
(8, 21, 'prueba', 'PRUEBA', '2024-04-25', '2024-04-13'),
(9, 21, 'asdasdas', '123', '2024-05-10', '2024-04-10'),
(10, 22, 'asdasdas', 'PRUEBA', '2024-04-10', '2024-05-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `institucion` varchar(64) NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formacion_academica`
--

INSERT INTO `formacion_academica` (`id`, `usuario_id`, `institucion`, `titulo`, `inicio`, `fin`) VALUES
(4, 3, 'Prueba institucion', 'Ingeniero', '2024-04-25', '2024-04-06'),
(5, 8, 'UCSP', 'Licenciado', '2024-04-03', '2024-09-19'),
(6, 8, 'UCSM', 'Ingeniero', '2024-04-06', '2024-05-11'),
(7, 22, 'Prueba institucion', 'Ingeniero', '2024-04-15', '2024-04-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `idioma` varchar(64) NOT NULL,
  `nivel` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `usuario_id`, `idioma`, `nivel`) VALUES
(4, 3, 'Italiano', 'avanzado'),
(5, 3, 'Ingles', 'intermedio'),
(6, 8, 'Italiano', 'avanzado'),
(7, 8, 'Portugues', 'principiante'),
(8, 17, 'Italiano', 'intermedio'),
(9, 17, 'Ingles', 'intermedio'),
(10, 17, 'Español', 'avanzado'),
(11, 18, 'Italiano', 'intermedio'),
(12, 18, 'Ingles', 'avanzado'),
(13, 18, 'Castellano', 'avanzado'),
(14, 22, 'Italiano', 'intermedio'),
(15, 22, 'Italiano', 'avanzado'),
(16, 22, 'Ingles', 'intermedio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `direccion`, `email`) VALUES
(3, 'Diego', 'asdasdas', 'asdasd', 'asd'),
(4, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'prueba@gmail.com'),
(5, 'Leonardo', 'Becerra', 'Av. Villa Hermosa', 'test@gmail.com'),
(6, 'Diego', 'asdasd', 'asdasd', 'asdsadasd'),
(7, 'Diego', 'asdasd', 'asdasd', 'asdsadasd'),
(8, 'Leonardo', 'Reymer', 'Socosani', 'asdlkasjdlasd@gmail.com'),
(9, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'prueba@gmail.com'),
(10, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'prueba@gmail.com'),
(11, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'prueba@gmail.com'),
(13, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'asdasd'),
(14, 'Diego', 'asdasd', 'asdasd', 'asd'),
(15, 'a', 'asd', 'asd', 'prueba@gmail.com'),
(16, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'test@gmail.com'),
(17, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'test@gmail.com'),
(18, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'asdasd'),
(19, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'prueba@gmail.com'),
(20, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'test@gmail.com'),
(21, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'prueba@gmail.com'),
(22, 'Diego', 'asdasd', 'Av. Villa Hermosa', 'prueba@gmail.com'),
(23, 'Diego', 'Hidalgo', 'Av. Villa Hermosa', 'asd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aptitudes`
--
ALTER TABLE `aptitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aptitudes_usuarios` (`usuario_id`);

--
-- Indices de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_experiencia_laboral_usuarios` (`usuario_id`);

--
-- Indices de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_formacion_academica_usuarios` (`usuario_id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idiomas_usuarios` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aptitudes`
--
ALTER TABLE `aptitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aptitudes`
--
ALTER TABLE `aptitudes`
  ADD CONSTRAINT `fk_aptitudes_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD CONSTRAINT `fk_experiencia_laboral_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD CONSTRAINT `fk_formacion_academica_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD CONSTRAINT `fk_idiomas_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
