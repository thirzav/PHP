-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-11-2024 a las 22:23:09
-- Versión del servidor: 8.0.37
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `captura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `nombre_cat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_crea_cat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_cat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre_cat`, `fecha_crea_cat`, `fecha_mod_cat`) VALUES
(1, 'bodas', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(2, 'cumpleaños', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(3, 'retratos', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(4, 'familias', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(5, 'newborn', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(6, 'maternidad', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(7, 'aniversarios', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(8, 'infantil', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(9, 'publicidad', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(10, 'moda', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(11, 'paisaje', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(12, 'gastronomía', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(13, 'blanco y negro', '2024-11-11 15:22:22', '2024-11-11 15:22:22'),
(14, 'interiores', '2024-11-11 15:22:22', '2024-11-11 15:22:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_c` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido1_c` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2_c` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_calle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_crea_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`client_id`, `rol`, `pass`, `nombre_c`, `apellido1_c`, `apellido2_c`, `email`, `telefono`, `direccion_calle`, `postcode`, `ciudad`, `fecha_crea_c`, `fecha_mod_c`) VALUES
(1, 'administrador', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'admin', 'admin', 'admin', 'admin@gmail.com', '977100200', 'Avenida Libertad 1', '43200', 'Reus', '2024-11-11 12:57:14', '2024-11-24 19:36:57'),
(2, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Judith', 'Valeros', 'Sanchez', 'judith@gmail.com', '637483920', 'Avenida Girona 221', '45000', 'Barcelona', '2024-11-11 12:59:19', '2024-11-24 19:34:26'),
(3, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Pol', 'Blaix', 'Fernandez', 'pol@gmail.com', '', 'Calle Benidorm 322, 4B', '34251', 'Málaga', '2024-11-11 13:00:46', '2024-11-11 13:00:46'),
(4, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Joan', 'Vilella', 'Cap', 'joan@gmail.com', '637281928', 'Plaza de la Paz 1', '52362', 'Vilella', '2024-11-11 13:01:58', '2024-11-11 13:01:58'),
(5, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Carlos', 'González', 'Sánchez', 'carlos.gonzalez@email.com', '612345678', 'Calle Ficticia 1', '28001', 'Madrid', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(6, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Ana', 'Pérez', 'López', 'ana.perez@email.com', '612987654', 'Calle del Sol 2', '08002', 'Barcelona', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(7, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Luis', 'Martínez', 'Sánchez', 'luis.martinez@email.com', '613456789', 'Avenida Principal 3', '41003', 'Sevilla', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(8, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'María', 'Hernández', 'Jiménez', 'maria.hernandez@email.com', '614567890', 'Calle Luna 4', '50004', 'Zaragoza', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(9, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'David', 'López', 'Fernández', 'david.lopez@email.com', '615678901', 'Calle de la Paz 5', '08003', 'Valencia', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(10, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Sara', 'Gómez', 'Torres', 'sara.gomez@email.com', '616789012', 'Calle del Mar 6', '31006', 'Pamplona', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(11, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Pablo', 'Ruiz', 'Martín', 'pablo.ruiz@email.com', '617890123', 'Calle Real 7', '28007', 'Madrid', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(12, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Lucía', 'Alonso', 'Gutiérrez', 'lucia.alonso@email.com', '618901234', 'Avenida del Sol 8', '50008', 'Zaragoza', '2024-11-19 21:37:45', '2024-11-19 21:37:45'),
(15, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Juanma', 'Fernandez', 'Rodriguez', 'juanma@gmail.com', '544754784', 'Calle endroad 21', '54222', 'Málaga', '2024-11-24 19:12:18', '2024-11-24 19:12:18'),
(14, 'usuario', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Eva', 'Jiménez', 'Serrano', 'eva.jimenez@email.com', '620123456', 'Calle Nueva 10', '41010', 'Sevilla', '2024-11-19 21:37:45', '2024-11-19 21:37:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE IF NOT EXISTS `favoritos` (
  `favorito_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `fotografo_id` int NOT NULL,
  `fecha_crea_fav` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_fav` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`favorito_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`favorito_id`, `client_id`, `fotografo_id`, `fecha_crea_fav`, `fecha_mod_fav`) VALUES
(1, 2, 1, '2024-11-11 15:09:34', '2024-11-11 15:09:34'),
(2, 3, 12, '2024-11-19 21:41:22', '2024-11-19 21:41:22'),
(3, 4, 5, '2024-11-19 21:41:22', '2024-11-19 21:41:22'),
(4, 4, 10, '2024-11-19 21:41:22', '2024-11-19 21:41:22'),
(5, 6, 17, '2024-11-19 21:41:22', '2024-11-19 21:41:22'),
(6, 7, 14, '2024-11-19 21:41:22', '2024-11-19 21:41:22'),
(7, 12, 3, '2024-11-19 21:41:22', '2024-11-19 21:41:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotografos`
--

DROP TABLE IF EXISTS `fotografos`;
CREATE TABLE IF NOT EXISTS `fotografos` (
  `fotografo_id` int NOT NULL AUTO_INCREMENT,
  `nombre_f` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido1_f` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2_f` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_empresa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_calle_f` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_f` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad_f` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_f` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_perfil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_f` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_f` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_f` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_crea_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fotografo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fotografos`
--

INSERT INTO `fotografos` (`fotografo_id`, `nombre_f`, `apellido1_f`, `apellido2_f`, `nombre_empresa`, `nif`, `direccion_calle_f`, `postcode_f`, `ciudad_f`, `descripcion_f`, `foto_perfil`, `telefono_f`, `email_f`, `pass_f`, `rol`, `fecha_crea_f`, `fecha_mod_f`) VALUES
(1, 'Lluc', 'Muñoz', 'Ansel', 'filmmatx', '27163829O', 'Plaza Principal 1', '43200', 'Reus', 'Es una empresa de fotografía especializada de parejas, bodas y eventos familiares.', '../img/fotoPerfil/filmmatx.jpg', '600500400', 'filmmatx@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-11 13:20:42', '2024-11-24 22:07:14'),
(2, 'Juan', 'Pérez', 'García', 'Fotografía Juan', '12345678A', 'Calle del Sol 10', '28001', 'Madrid', 'Fotógrafo especializado en retratos, especialmente en el exterior.', '../img/fotoPerfil/Fotografía Juan.jpg', '612345678', 'juan.perez@example.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotógrafo', '2024-11-12 10:34:28', '2024-11-24 20:46:03'),
(3, 'María', 'López', 'Martínez', 'Estudio López', '87654321B', 'Avenida de la Paz 20', '08001', 'Barcelona', 'Fotógrafa de bodas y eventos.', '../img/fotoPerfil/Estudio López.jpg', '612345679', 'maria.lopez@example.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotógrafo', '2024-11-12 10:34:28', '2024-11-24 20:05:25'),
(4, 'Carlos', 'Gómez', 'Hernández', 'Gómez Fotografía', '23456789C', 'Calle de la Libertad 5', '29001', 'Málaga', 'Fotógrafo de naturaleza y paisajes, la naturaleza me encanta.', '../img/fotoPerfil/Gómez Fotografía.jpg', '612345680', 'carlos.gomez@example.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotógrafo', '2024-11-12 10:34:29', '2024-11-24 20:38:02'),
(5, 'Joan', 'Gómez', 'Otero', 'Moments', '62283948I', 'Calle Gomez 3, 4b', '25172', 'Valencia', 'Soy Joan, fotógrafo apasionado por capturar momentos únicos. Mi cámara es mi ventana al mundo, donde busco contar historias a través de la luz y la espontaneidad. Me encanta observar lo que muchos no ven, y a través de mis fotos, intento transmitir emociones y conectar con las personas.', '../img/fotoPerfil/Moments.jpg', '637940529', 'joan@moments.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-14 17:23:44', '2024-11-24 22:08:11'),
(6, 'Jana', 'López', 'Herrera', 'FotoMoment', '72839493Y', 'Calle Otero 344', '28399', 'Pamplona', 'Soy Jana, fotógrafa de corazón. Mi cámara es mi medio para explorar y expresar lo que siento sobre el mundo. Me enfoco en los detalles cotidianos que a menudo pasan desapercibidos, buscando belleza en lo simple. Cada fotografía es una oportunidad para contar una historia única y conectar con quienes la miran.', '../img/fotoPerfil/FotoMoment.jpg', '633748492', 'jana@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-14 17:27:06', '2024-11-24 22:08:11'),
(7, 'Daniela', 'Gomez', 'Sala', 'Sala', '62273849Y', 'Avenido Libertad 82', '73644', 'Pamplona', 'Soy Daniela, fotógrafa apasionada por capturar la esencia de las personas y los momentos. Mi enfoque está en los retratos y la fotografía documental, buscando siempre la autenticidad. Me gusta pensar que cada imagen tiene el poder de contar una historia profunda, de transmitir emociones y de preservar recuerdos.', '../img/fotoPerfil/Sala.jpg', '622738492', 'daniela@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-14 17:29:24', '2024-11-24 20:17:14'),
(8, 'Juan', 'Pérez', 'Gómez', 'Fotografía Creativa', '12345678A', 'Calle Mayor 1', '28001', 'Madrid', 'Fotógrafo con más de 10 años de experiencia en bodas', '../img/fotoPerfil/Fotografía Creativa.jpg', '612345678', 'juan.perez@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(9, 'Ana', 'López', 'Martín', 'Imágenes Profesionales', '87654321B', 'Calle Luna 2', '08002', 'Barcelona', 'Especialista en fotografía de moda y eventos', '../img/fotoPerfil/Imágenes Profesionales.jpg', '612987654', 'ana.lopez@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(10, 'Carlos', 'García', 'Sánchez', 'García Studio', '23456789C', 'Avenida de la Paz 3', '29003', 'Málaga', 'Fotógrafo de retratos y arquitectura, fotografía del exterior es mi pasión.', '../img/fotoPerfil/García Studio.jpg', '613456789', 'carlos.garcia@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(11, 'Laura', 'Fernández', 'Ruiz', 'Captura Perfecta', '34567890D', 'Calle Sol 4', '08003', 'Valencia', 'Fotografía artística y de paisajes', '../img/fotoPerfil/Captura Perfecta.jpg', '614567890', 'laura.fernandez@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(12, 'María', 'Martínez', 'Pérez', 'Arte Visual', '45678901E', 'Calle del Arte 5', '41004', 'Sevilla', 'Especialista en fotografía de eventos familiares', '../img/fotoPerfil/Arte Visual.jpg', '615678901', 'maria.martinez@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(13, 'Pedro', 'Hernández', 'Vázquez', 'Flash Studio', '56789012F', 'Calle Real 6', '09006', 'Valladolid', 'Fotografía publicitaria y de productos', '../img/fotoPerfil/Flash Studio.jpg', '616789012', 'pedro.hernandez@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(14, 'Sofía', 'González', 'Jiménez', 'Sofía González Photography', '67890123G', 'Avenida del Sol 7', '50007', 'Zaragoza', 'Fotografía de naturaleza y paisaje es mi profesión, me encanta.', '../img/fotoPerfil/Sofía González Photography.jpg', '617890123', 'sofia.gonzalez@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(15, 'Javier', 'Ruiz', 'Gómez', 'Fotos de Autor', '78901234H', 'Calle del Río 8', '31008', 'Pamplona', 'Fotografía documental y de viajes', '../img/fotoPerfil/Fotos de Autor.jpg', '618901234', 'javier.ruiz@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(16, 'Raquel', 'Torres', 'López', 'Raquel Torres Photography', '89012345I', 'Calle del Mar 9', '35009', 'Las Palmas', 'Fotografía de moda y belleza', '../img/fotoPerfil/Raquel Torres Photography.jpg', '619012345', 'raquel.torres@email.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-19 21:34:05', '2024-11-24 22:08:11'),
(18, 'Eileen', 'Fez', 'Venut', 'FirstMoments', '78578546K', 'Hoan 5, 7', '43200', 'Reus', 'Soy una profesional que le encanta hacer fotos de los primeros momentos tan especiales de la vida de un bebé. En las sesiones tomo el tiempo necesario para hacer la imagen perfecta, un recuerdo para siempre.', '../img/fotoPerfil/FirstMoments.jpg', '648574125', 'firstmoments@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-24 18:00:27', '2024-11-24 18:32:42'),
(19, 'Kyra', 'Luna', 'Pascal', 'Luna', '45578954P', 'Klowalski 3', '54224', 'Madrid', 'Los últimos 10 años me he dedicado a grabar los momentos más especiales de la vida.', '../img/fotoPerfil/Luna.jpg', '648952157', 'luna@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'fotografo', '2024-11-24 18:19:30', '2024-11-24 20:36:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `foto_id` int NOT NULL AUTO_INCREMENT,
  `nombre_foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_crea_foto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_foto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`foto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`foto_id`, `nombre_foto`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `fecha_crea_foto`, `fecha_mod_foto`) VALUES
(15, 'bodasMatx', '../img/fotos/filmmatx0bodasMatx.jpg', '../img/fotos/filmmatx01bodasMatx.jpg', '../img/fotos/filmmatx012bodasMatx.jpg', '../img/fotos/filmmatx0123bodasMatx.jpg', '../img/fotos/filmmatx01234bodasMatx.jpg', '2024-11-24 20:22:04', '2024-11-24 20:22:04'),
(16, 'naturaleza', '../img/fotos/Gómez Fotografía0naturaleza.jpg', '../img/fotos/Gómez Fotografía01naturaleza.jpg', '../img/fotos/Gómez Fotografía012naturaleza.jpg', '../img/fotos/Gómez Fotografía0123naturaleza.jpg', '../img/fotos/Gómez Fotografía01234naturaleza.jpg', '2024-11-24 20:26:53', '2024-11-24 20:26:53'),
(17, 'Boda', '../img/fotos/Luna0Boda.jpg', '../img/fotos/Luna01Boda.jpg', '../img/fotos/Luna012Boda.jpg', '../img/fotos/Luna0123Boda.jpg', '../img/fotos/Luna01234Boda.jpg', '2024-11-24 20:28:29', '2024-11-24 20:28:29'),
(18, 'retratos', '../img/fotos/García Studio0retratos.jpg', '../img/fotos/García Studio01retratos.jpg', '../img/fotos/García Studio012retratos.jpg', '../img/fotos/García Studio0123retratos.jpg', '../img/fotos/García Studio01234retratos.jpg', '2024-11-24 20:43:07', '2024-11-24 20:43:07'),
(19, 'nature', '../img/fotos/Sofía González Photography0nature.jpg', '../img/fotos/Sofía González Photography01nature.jpg', '../img/fotos/Sofía González Photography012nature.jpg', '../img/fotos/Sofía González Photography0123nature.jpg', '../img/fotos/Sofía González Photography01234nature.jpg', '2024-11-24 20:44:42', '2024-11-24 20:44:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

DROP TABLE IF EXISTS `opiniones`;
CREATE TABLE IF NOT EXISTS `opiniones` (
  `opinion_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_opinion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estrellas` int NOT NULL,
  `fecha_crea_o` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_o` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`opinion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`opinion_id`, `client_id`, `titulo`, `txt_opinion`, `estrellas`, `fecha_crea_o`, `fecha_mod_o`) VALUES
(1, 2, 'Fotos preciosas y trato excelente', 'Ha sido un placer trabajar con él, es un fotógrafo puntual, ha entregado las fotos con rapidez y la calidad es excelente. Estamos muy conentos con el resultado.', 5, '2024-11-12 07:39:41', '2024-11-12 08:08:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `pedido_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `product_id` int NOT NULL,
  `num_pedido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_crea_pe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_pe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pedido_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `client_id`, `product_id`, `num_pedido`, `fecha_crea_pe`, `fecha_mod_pe`) VALUES
(9, 2, 20, '1', '2024-11-24 20:47:11', '2024-11-24 20:47:11'),
(10, 2, 23, '2', '2024-11-24 20:47:22', '2024-11-24 20:47:22'),
(11, 4, 24, '3', '2024-11-24 21:59:41', '2024-11-24 21:59:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `nombre_p` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pve` int NOT NULL,
  `fecha_crea_p` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_p` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`product_id`, `nombre_p`, `duracion`, `descripcion`, `pve`, `fecha_crea_p`, `fecha_mod_p`) VALUES
(20, 'Bodas (todo el día)', '10 horas', 'La sesión de fotos de una boda de 10 horas es una experiencia intensa y llena de momentos únicos. Desde los primeros preparativos en la mañana, capturando los detalles del vestido, los nervios previos y las sonrisas nerviosas de los novios, hasta la ceremonia, donde las emociones fluyen y las promesas se sellan con un beso.\r\n\r\nA lo largo del día, se inmortalizan momentos clave: el intercambio de votos, las miradas cómplices, el primer baile, los abrazos de familiares y amigos. La luz natural al atardecer crea una atmósfera mágica para las fotos más íntimas y románticas.', 1500, '2024-11-24 20:22:04', '2024-11-24 21:58:20'),
(21, 'Fotografía de naturaleza', '3 horas', 'Una sesión de fotos de paisaje de 3 horas es una inmersión profunda en la naturaleza, buscando capturar la esencia y belleza del entorno. Comienza temprano en la mañana o al final de la tarde, cuando la luz es suave y dorada, creando sombras y texturas únicas en el paisaje. \r\n\r\nDurante estas tres horas, se exploran diferentes perspectivas: desde amplios panoramas hasta pequeños detalles como las texturas de las rocas, las hojas moviéndose con el viento o los reflejos en el agua. El fotógrafo juega con la composición, la luz y la atmósfera, buscando momentos en los que la naturaleza se revela en su forma más pura y espectacular.', 150, '2024-11-24 20:26:53', '2024-11-24 21:58:31'),
(22, 'Sesión de boda', '8 horas', 'Una sesión de fotos de boda de 8 horas es una mezcla de momentos íntimos y de celebración. Comienza con la preparación de los novios: los últimos toques antes de vestirse, los detalles del vestido, los zapatos y los anillos, mientras los amigos y familiares se reúnen, creando una atmósfera de emoción palpable. \r\n\r\nLuego, en la ceremonia, se capturan los momentos más emotivos: la entrada de la novia, los votos, la reacción de los invitados y el primer beso como pareja casada. La sesión sigue con las fotos formales y las fotos espontáneas de los recién casados, paseando por el lugar, abrazándose, riendo, disfrutando de su día.', 1250, '2024-11-24 20:28:29', '2024-11-24 21:58:40'),
(23, 'Retratos', '3 horas', '**Sesión de fotos - Retratos (3 horas)**\r\n\r\nHoy disfrutamos de una sesión de fotos de tres horas centrada en retratos, capturando la esencia del modelo en cada toma. Comenzamos con retratos clásicos, jugando con la luz natural y las sombras para crear atmósferas íntimas. A medida que avanzaba la sesión, fuimos probando diferentes fondos y estilos, adaptando la iluminación para resaltar las emociones y detalles únicos de cada momento. El ambiente relajado permitió que las expresiones naturales brillaran, resultando en una serie de retratos que reflejan la personalidad y energía del modelo.', 250, '2024-11-24 20:43:07', '2024-11-24 20:43:07'),
(24, 'Natural', '1 hora', 'Sesión de fotos - Paisaje (1 hora)\r\n\r\nDurante esta hora de sesión, nos enfocamos en capturar la belleza natural del paisaje. Aprovechamos la luz del momento para resaltar los detalles del entorno, desde los colores del cielo hasta la textura de la tierra. Cada toma buscó capturar la atmósfera única del lugar, jugando con la composición y los elementos naturales para crear imágenes que transmiten tranquilidad y la majestuosidad del paisaje. Un tiempo breve pero lleno de inspiración.', 70, '2024-11-24 20:44:42', '2024-11-24 20:44:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_fot_cat`
--

DROP TABLE IF EXISTS `prod_fot_cat`;
CREATE TABLE IF NOT EXISTS `prod_fot_cat` (
  `prodfotcat_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `fotografo_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `foto_id` int DEFAULT NULL,
  `opinion_id` int DEFAULT NULL,
  `fecha_crea_prodfot` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_mod_prodfot` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prodfotcat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prod_fot_cat`
--

INSERT INTO `prod_fot_cat` (`prodfotcat_id`, `product_id`, `fotografo_id`, `categoria_id`, `foto_id`, `opinion_id`, `fecha_crea_prodfot`, `fecha_mod_prodfot`) VALUES
(17, 20, 1, 1, 15, NULL, '2024-11-24 20:22:04', '2024-11-24 20:22:04'),
(18, 21, 4, 11, 16, NULL, '2024-11-24 20:26:53', '2024-11-24 20:26:53'),
(19, 22, 19, 1, 17, NULL, '2024-11-24 20:28:29', '2024-11-24 20:28:29'),
(20, 23, 10, 3, 18, NULL, '2024-11-24 20:43:07', '2024-11-24 20:43:07'),
(21, 24, 14, 11, 19, NULL, '2024-11-24 20:44:42', '2024-11-24 20:44:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
