-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2022 a las 04:47:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_archivos`
--

CREATE TABLE `tbl_archivos` (
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_archivos`
--

INSERT INTO `tbl_archivos` (`id_archivo`, `id_usuario`, `id_categoria`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(1, 15, 13, 'ANEXO I 56-01.jpg', 'jpg', '../../archivos/15/ANEXO I 56-01.jpg', '2022-06-11 11:57:39'),
(2, 15, 13, 'ANEXO I 56-02.jpg', 'jpg', '../../archivos/15/ANEXO I 56-02.jpg', '2022-06-11 11:57:39'),
(4, 15, 17, 'Anexo_II_Homologados SNTE56.pdf', 'pdf', '../../archivos/15/Anexo_II_Homologados SNTE56.pdf', '2022-06-11 12:15:16'),
(5, 15, 13, 'descarga.png', 'png', '../../archivos/15/descarga.png', '2022-06-12 19:00:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id_categoria`, `id_usuario`, `nombre`, `fechaInsert`) VALUES
(1, 14, '01.ENERO.2022', '2022-06-03 17:01:45'),
(2, 18, 'MÚSICA', '2022-06-03 17:35:55'),
(3, 18, 'LIBROS DIGITALES', '2022-06-03 17:36:05'),
(4, 18, 'YOGA', '2022-06-03 17:36:17'),
(5, 18, 'COCINA', '2022-06-03 17:36:24'),
(6, 18, 'VIAJES', '2022-06-03 17:36:32'),
(7, 19, 'Arte', '2022-06-03 17:41:04'),
(8, 19, 'Diseño Grafico', '2022-06-03 17:41:09'),
(9, 10, 'ROPA', '2022-06-03 18:36:16'),
(10, 10, 'ZAPATOS', '2022-06-03 18:36:23'),
(11, 10, 'MUEBLES', '2022-06-03 18:36:33'),
(13, 15, 'ESTADISTICA', '2022-06-06 12:10:07'),
(17, 15, 'GENERO', '2022-06-06 13:33:50'),
(18, 19, 'Educación Básica', '2022-06-06 13:37:55'),
(21, 19, 'fotografía', '2022-06-06 14:38:51'),
(22, 11, 'JAVA', '2022-06-06 14:50:50'),
(23, 11, 'PHP', '2022-06-06 14:50:55'),
(24, 11, 'JQUERY', '2022-06-06 14:51:00'),
(25, 11, 'C PLUS', '2022-06-06 14:51:07'),
(27, 11, 'Python', '2022-06-06 22:20:17'),
(29, 20, 'PROGRAMACION', '2022-06-06 23:44:15'),
(30, 20, 'DISEÑO', '2022-06-06 23:44:21'),
(31, 20, 'CABLEADO', '2022-06-06 23:44:27'),
(32, 20, 'REDES INFORMATICAS', '2022-06-06 23:44:36'),
(33, 20, 'SOPORTE TÉCNICO', '2022-06-06 23:44:46'),
(35, 5, 'Salsa', '2022-08-05 21:44:41'),
(36, 5, 'Peine', '2022-08-05 21:44:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(220) DEFAULT NULL,
  `apaterno` varchar(220) DEFAULT NULL,
  `materno` varchar(220) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `usuario` varchar(220) DEFAULT NULL,
  `password` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `nombre`, `apaterno`, `materno`, `fecha`, `email`, `usuario`, `password`, `date`) VALUES
(1, 'Florencia', 'Patzzani', 'Lascano', '1985-06-22', 'florencia@email.com', 'florencia', 'ddaa02864ebb18e56b6422e2d7cf7df4af18d6ee', '2022-05-30 19:15:06'),
(2, 'Patricia', 'Alarcon', 'Suarez', '1986-02-11', 'paty@email.com', 'paty', '6f1f8bd9bb2c4d807cccb8995cd712afa6c497a1', '2022-05-30 19:16:29'),
(3, 'Vladimir', 'Aparicio', 'Lopez', '1977-03-21', 'vladi@email.com', 'vladi', '72244a75f1ff6bd906949dc3953433e996461f1a', '2022-05-30 19:17:58'),
(4, 'Enrique', 'Garcia', 'Abad', '1984-06-22', 'quique@email.com', 'quique', '10486251ef8ca01f4c3b9fec597baa1a2cefdae1', '2022-05-30 19:28:44'),
(5, 'Efrain', 'Gastin', 'Gomour', '1988-12-28', 'efra@email.com', 'efra', '755aa24f5d66317b9edfa49486ec2723a944fc93', '2022-05-30 19:39:15'),
(6, 'Maria Patricia', 'Juarez', 'Francisco', '1988-02-28', 'paty@email.com', 'paty2', '0006648c1f048c4badc05210fe6ca217e80f9d7e', '2022-05-30 19:41:30'),
(7, 'Luis Enrique', 'Soto', 'Luna', '1984-07-23', 'quique2@email.com', 'enrique', '4452c88f01f0d61e51249dda699e3b7cbe5f438e', '2022-05-30 19:43:42'),
(8, 'Nestor', 'Galindo', 'Herrera', '1981-12-02', 'nestor@email.com', 'neto', 'neto', '2022-05-30 23:15:12'),
(9, 'Ernesto', 'Medina', 'Flores', '1977-12-02', 'neto@email.com', 'neto.medina', 'b314e0f14136dd1d789c78f8c288487f5c267c87', '2022-05-30 19:47:43'),
(10, 'Viridiana', 'Triguero', 'Molina', '1985-03-22', 'viry@email.com', 'viry', 'dbf8de2aab30ec51b2e3ddf4e694a3988559884d', '2022-05-30 19:48:44'),
(11, 'Virguinia', 'Lagunes', 'Rosado', '1979-06-21', 'vicky@email.com', 'vicky', 'e79cab55eab4c0a1a63610829a51fd51d5cfb294', '2022-05-30 19:50:01'),
(12, 'Elena', 'Díaz', 'Pazzini', '0000-00-00', 'elena@example.com', 'elena', '291c6b2df1bac379d47f5557f9e564a1f6618bf7', '2022-05-30 20:07:56'),
(13, 'Esther', 'Ceja', 'Perez', '0000-00-00', 'esther@example.com', 'tete', '3105221c1c15399d170ef540e974ef4f37f84e93', '2022-05-30 20:31:15'),
(14, 'Juan Manuel', 'Mendez', 'Aparicio', '2012-05-09', 'juanma@email.com', 'juanma', '06a7d69a0f4729ee1b5a8978fc04d75388c13448', '2022-05-30 20:35:39'),
(15, 'Miriam de los Angeles', 'Garcia', 'Medina', '1974-01-09', 'miri@email.com', 'miri', 'eb286b121fc8a496e3f515a61ff6b43e22ff1228', '2022-05-30 22:19:46'),
(16, 'Juan Manuel', 'Avendaño', 'lopez', '2022-05-05', 'juanmm@email.com', 'juanmae', '34100949e24c92d0198aaab7e9f371507d0ed4d8', '2022-05-30 22:20:24'),
(17, 'Edgardo', 'Luna', 'Alvarado', '1982-01-20', 'edgardo@email.com', 'edgardo', '41b864e849659576b85cc50d1b7f39d40150a62c', '2022-05-31 15:40:29'),
(18, 'Miroslava', 'Hernandez ', 'de la Merced', '1984-10-04', 'meche@email.com', 'miros', '907842346560471fb02d29dfef52693ee9e221b7', '2022-05-31 20:41:59'),
(19, 'Valentina', 'Avila', 'Sousa', '2013-06-11', 'vale@email.com', 'vale', '24c4de7fefa3d80bda04c5b68c8042e60fc15083', '2022-06-03 19:46:08'),
(20, 'Vicente', 'Júarez', 'Alarcón', '1983-07-19', 'juarez.vic@email.com', 'vincent', '87e1f221a672a14a323e57bb65eaea19d3ed3804', '2022-06-07 04:43:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_archivos`
--
ALTER TABLE `tbl_archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `fkArchivosCategorias_idx` (`id_categoria`),
  ADD KEY `fkUsuariosArchivos_idx` (`id_usuario`);

--
-- Indices de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fkCategoriaUsuario_idx` (`id_usuario`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_archivos`
--
ALTER TABLE `tbl_archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_archivos`
--
ALTER TABLE `tbl_archivos`
  ADD CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD CONSTRAINT `tbl_categorias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
