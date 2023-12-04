-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 13:48:32
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
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `ID` int(11) DEFAULT NULL,
  `MATERIA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`ID`, `MATERIA`) VALUES
(1, 'Matemáticas'),
(2, 'Historia'),
(3, 'Economía'),
(4, 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `DNI` varchar(20) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `FEC_NACIMIENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `DNI`, `NOMBRE`, `CORREO`, `DIRECCION`, `FEC_NACIMIENTO`) VALUES
(1, '12345678A', 'Juan Pérez', 'juan.perez@email.com', 'Calle 123', '1990-05-15'),
(2, '98765432B', 'María López', 'maria.lopez@email.com', 'Avenida 456', '1992-08-22'),
(3, '87654321C', 'Carlos Rodríguez', 'carlos.rodriguez@email.com', 'Plaza 789', '1988-04-10'),
(4, '23456789D', 'Ana Martínez', 'ana.martinez@email.com', 'Callejón 012', '1995-11-30'),
(5, '34567890E', 'Pedro Gómez', 'pedro.gomez@email.com', 'Avenida 345', '1998-07-18'),
(6, '56789012F', 'Laura Sánchez', 'laura.sanchez@email.com', 'Paseo 678', '1993-01-25'),
(7, '67890123G', 'Miguel Hernández', 'miguel.hernandez@email.com', 'Carrera 901', '1985-09-05'),
(8, '78901234H', 'Sara Jiménez', 'sara.jimenez@email.com', 'Camino 234', '1997-03-12'),
(9, '89012345I', 'Javier Ruiz', 'javier.ruiz@email.com', 'Calle 567', '1994-06-08'),
(10, '01234567J', 'Isabel Fernández', 'isabel.fernandez@email.com', 'Avenida 890', '1987-12-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase1`
--

CREATE TABLE `clase1` (
  `ID` int(11) DEFAULT NULL,
  `NOMBRE_DEL_ALUMNO` varchar(255) DEFAULT NULL,
  `CALIFICACION` decimal(5,2) DEFAULT NULL,
  `MENSAJE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clase1`
--

INSERT INTO `clase1` (`ID`, `NOMBRE_DEL_ALUMNO`, `CALIFICACION`, `MENSAJE`) VALUES
(1, 'Juan Perez', 8.50, 'Buen trabajo'),
(2, 'Maria Lopez', 7.20, 'Necesita mejorar'),
(3, 'Pedro Ramirez', 9.00, 'Excelente desempeño'),
(4, 'Laura Martinez', 6.80, 'Puede hacerlo mejor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `ID` int(11) NOT NULL,
  `CLASE` varchar(100) NOT NULL,
  `MAESTRO` varchar(100) NOT NULL,
  `ALUMNOS_INSCRITOS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`ID`, `CLASE`, `MAESTRO`, `ALUMNOS_INSCRITOS`) VALUES
(1, 'Matemáticas', 'Juan Pérez', 25),
(2, 'Historia', 'María Gómez', 18),
(3, 'Ciencias', 'Carlos Rodríguez', 30),
(4, 'Inglés', 'Laura Martínez', 15),
(5, 'Programación', 'Luis López', 20),
(6, 'Literatura', 'Ana Fernández', 12),
(7, 'Educación Física', 'Pedro Ramírez', 28),
(8, 'Arte', 'Sofía Torres', 10),
(9, 'Química', 'Diego Sánchez', 22),
(10, 'Geografía', 'Isabel Castro', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `FEC_NACIMIENTO` date DEFAULT NULL,
  `CLASE_ASIGNADA` varchar(255) DEFAULT NULL,
  `ROL` enum('Administrador','Supervisor','Profesor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`ID`, `NOMBRE`, `EMAIL`, `DIRECCION`, `FEC_NACIMIENTO`, `CLASE_ASIGNADA`, `ROL`) VALUES
(1, 'Juan Perez', 'juan@example.com', 'Calle 123', '1990-01-01', 'Matemáticas', 'Profesor'),
(2, 'María López', 'maria@example.com', 'Avenida 456', '1985-05-10', 'Historia', 'Profesor'),
(3, 'Pedro Ramirez', 'pedro@example.com', 'Calle 789', '1992-09-15', 'Inglés', 'Profesor'),
(4, 'Ana Martinez', 'ana@example.com', 'Carrera 10', '1988-03-20', 'Física', 'Profesor'),
(5, 'Luisa Torres', 'luisa@example.com', 'Avenida 789', '1995-07-25', 'Química', 'Profesor'),
(6, 'Carlos Gómez', 'carlos@example.com', 'Calle 456', '1991-12-05', 'Biología', 'Profesor'),
(7, 'Sofía Herrera', 'sofia@example.com', 'Avenida 123', '1987-06-12', 'Geografía', 'Profesor'),
(8, 'Javier Castro', 'javier@example.com', 'Carrera 20', '1993-04-18', 'Arte', 'Profesor'),
(9, 'Laura Silva', 'laura@example.com', 'Calle 789', '1994-08-30', 'Educación Física', 'Profesor'),
(10, 'Diego Vargas', 'diego@example.com', 'Avenida 456', '1989-02-15', 'Música', 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PERMISO` varchar(255) NOT NULL,
  `ESTADO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`ID`, `EMAIL`, `PERMISO`, `ESTADO`) VALUES
(1, 'admin@admin', 'Administrador', 'Activo'),
(2, 'maestro@maestro', 'Maestro', 'Activo'),
(3, 'alumno@alumno', 'Alumno', 'Activo'),
(4, 'ana@example.com', 'Maestro', 'Activo'),
(5, 'luisa@example.com', 'Maestro', 'Activo'),
(6, 'carlos@example.com', 'Maestro', 'Activo'),
(7, 'sofia@example.com', 'Maestro', 'Activo'),
(8, 'javier@example.com', 'Maestro', 'Activo'),
(9, 'laura@example.com', 'Maestro', 'Activo'),
(10, 'diego@example.com', 'Maestro', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`, `id`) VALUES
('admin@admin', 'admin', 1),
('maestro@maestro', 'maestro', 2),
('alumno@alumno', 'alumno', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
