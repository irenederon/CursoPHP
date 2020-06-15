-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2020 a las 16:10:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(4) NOT NULL,
  `nom_contacto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ape_contacto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email_contacto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tlf_contacto` int(9) NOT NULL,
  `id_usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nom_contacto`, `ape_contacto`, `email_contacto`, `tlf_contacto`, `id_usuario`) VALUES
(1, 'Laura', 'Martínez Fernández', 'lauramartinezfernandez@correo.com', 657489321, 1),
(2, 'Pepe', 'Pérez Gómez', 'pepeperezgomez@correo.com', 674125893, 1),
(3, 'Maria', 'Pérez Gómez', 'mariaperezgomez@correo.com', 632514789, 1),
(4, 'Jose', 'Pérez García', 'joselopezgarcia@correo.com', 951763824, 1),
(5, 'Julia', 'Gómez López', 'julialopezgomez@correo.com', 951763824, 1),
(6, 'Marta', 'Pérez Gómez', 'martaperezgomez@correo.com', 658749321, 1),
(43, 'Nombre', 'Apellido', 'email@email.com', 123456789, 2),
(44, 'a', 'b', 'c@d.e', 123456789, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(4) NOT NULL,
  `origen` int(4) NOT NULL,
  `destino` int(4) NOT NULL,
  `mensaje` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `origen`, `destino`, `mensaje`, `fecha`) VALUES
(13, 1, 2, 'Esto es un mensaje de prueba.\r\n\r\n¿Se guardan los saltos de línea?\r\n\r\nEspero que sí.\r\n\r\nEspero la respuesta :)', '2020-05-14'),
(14, 2, 1, 'Sí se guardan.\r\n\r\n¿Se pueden enviar emoticonos? \r\nASCII: ♥\r\nIcono WhatsApp: ?', '2020-05-14'),
(15, 1, 2, 'Si son texto plano sí,\r\n\r\n\r\nsi no sale un \"?\". A ver si consigo enviarte uno: \r\n\r\n🦕', '2020-05-14'),
(16, 2, 1, '¡Se ve! A ver estos:\r\n\r\n🥰💕😰😊😻🤨😾👏👋😹😋😨😇🤷🏻‍♀️🍫🚂🤦🏻‍♀️👍🏻😱🥳🎉💪🤢🤤🤫🎊🤭♿😅😴☹️🥵', '2020-05-14'),
(17, 1, 3, 'hola', '2020-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`) VALUES
(1, 'usuario1', 'abc123.'),
(2, 'usuario2', 'abc123.'),
(3, 'Ana', 'contra1'),
(4, 'user', 'abc123.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `usuario` (`id_usuario`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `origen` (`origen`),
  ADD KEY `destino` (`destino`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `destino` FOREIGN KEY (`destino`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `origen` FOREIGN KEY (`origen`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
