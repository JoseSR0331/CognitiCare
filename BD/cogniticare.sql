-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2025 a las 22:26:43
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
-- Base de datos: `cogniticare`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_p`
--

CREATE TABLE `info_p` (
  `id_infop` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `info_p`
--

INSERT INTO `info_p` (`id_infop`, `id_us`, `nombre`, `apellidos`, `edad`) VALUES
(2, 3, 'saul', 'dasdasd', 45),
(3, 4, 'saul', 'dasdasd', 45),
(4, 5, 'saul', 'dasdasd', 45),
(5, 6, 'asd', 'asd', 342),
(6, 7, 'asd', 'asd', 342),
(7, 8, 'asd', 'asd', 342),
(8, 9, 'asdfd', 'dsfsdf', 4324),
(9, 10, 'asda', 'asdasd3', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_quest` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `id_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_quest`, `pregunta`, `id_p`) VALUES
(1, '¿Tiene alguna queja respecto a su\r\nmemoria?', 1),
(2, '¿Las demás personas creen que usted es\r\nolvidadizo?', 1),
(3, '¿Olvida usted nombres o miembros de su\r\nfamilia o amigos?', 1),
(4, '¿Olvida usted frecuentemente donde dejó\r\nlas cosas?', 1),
(5, '¿Frecuentemente usa usted notas para no\r\nolvidarse de las cosas?', 1),
(6, '¿Ha tenido dificultades para encontrar\r\nalguna palabra al hablar?\r\n', 1),
(7, '¿Alguna vez se ha perdido en su barrio o\r\nvecindario?', 1),
(8, '¿Piensa usted mas lento que antes? ', 1),
(9, '¿A veces sus pensamientos se vuelven\r\nconfusos?', 1),
(10, '¿Tiene problemas de concentración?', 1),
(11, 'Mi corazón se ha acelerado o latido más fuertemente', 2),
(12, 'Mi respiración ha sido más corta', 2),
(13, 'He tenido malestar estomacal ', 2),
(14, 'He sentido que las cosas no son reales o como si estuviera fuera de mi cuerpo', 2),
(15, 'He sentido que he perdido el control ', 2),
(16, 'He tenido miedo de ser juzgado por otros ', 2),
(17, 'He tenido miedo de ser humillado o avergonzado', 2),
(18, 'He tenido problemas para dormirme', 2),
(19, 'He tenido problemas para permanecer dormido', 2),
(20, 'He estado irritable', 2),
(21, 'He tenido estallidos de enojo ', 2),
(22, 'He tenido problemas para concentrarme', 2),
(23, 'He estado fácilmente molesto o sobresaltado', 2),
(24, 'He tenido menor interés en hacer cosas que por lo general disfruto', 2),
(25, 'Me he sentido separado o aislado de las demás personas', 2),
(26, 'Me he sentido aturdido, como en otro mundo', 2),
(27, 'Se me ha dificultado quedarme quieto', 2),
(28, 'Me he preocupado mucho', 2),
(29, 'No he podido controlar mi preocupación', 2),
(30, 'Me he sentido inquieto, sobresaltado', 2),
(31, 'Me he sentido cansado', 2),
(32, 'Mis músculos han estado tensos', 2),
(33, 'He tenido dolor de espalda, del cuello o con calambres', 2),
(34, 'He sentido que no tengo control sobre mi vida', 2),
(35, 'He sentido que algo terrible está por sucederme', 2),
(36, 'He estado preocupado por mis finanzas ', 2),
(37, 'He estado preocupado por mi salud ', 2),
(38, 'He estado preocupado por mis hijos', 2),
(39, 'He tenido miedo de morirme', 2),
(40, 'He tenido miedo de convertirme en una carga para mi familia o mis hijos', 2),
(41, '¿En general, está satisfecho(a) con su vida?', 3),
(42, '¿Ha abandonado muchas de sus tareas habituales y aficiones?', 3),
(43, '¿Siente que su vida está vacía?', 3),
(44, '¿Se siente con frecuencia aburrido(a)?', 3),
(45, '¿Se encuentra de buen humor la mayor parte del tiempo?', 3),
(46, '¿Teme que algo malo pueda ocurrirle? ', 3),
(47, '¿Se siente feliz la mayor parte del tiempo?', 3),
(48, '¿Con frecuencia se siente desamparado(a), desprotegido(a)?', 3),
(49, '¿Prefiere usted quedarse en casa, más que salir y hacer cosas nuevas?', 3),
(50, '¿Cree que tiene más problemas de memoria que la mayoría de la gente?', 3),
(51, '¿En estos momentos, piensa que es estupendo estar vivo(a)?', 3),
(52, '¿Actualmente se siente un(a) inútil?', 3),
(53, '¿Se siente lleno(a) de energía? ', 3),
(54, '¿Se siente sin esperanza en este momento?', 3),
(55, '¿Piensa que la mayoría de la gente está en mejor situación que usted? ', 3),
(56, 'Recordar los nombres de las personas más intimas (parientes, amigos).', 4),
(57, 'Recordar cosas sucedidas en los últimos meses (noticias, sucesos familiares).', 4),
(58, 'Recordar lo que se habló en una conversación mantenida unos días antes.', 4),
(59, 'Mantener una conversación sin olvidar lo que dijo pocos minutos antes, o sin pararse en medio de una frase, o sin olvidar lo que quería decir.', 4),
(60, 'Recordar la fecha en que vive.', 4),
(61, 'Conocer el sitio de los armarios de su casa y dónde se guardan las cosas.', 4),
(62, 'Saber dónde se encuentra una cosa que se dejó descolocada.', 4),
(63, 'Aprender a manejar un aparato nuevo (lavadora, secador, tocadiscos, coche).', 4),
(64, 'Recordar las cosas sucedidas recientemente.', 4),
(65, 'Aprender cosas nuevas en general.', 4),
(66, 'Comprender el significado de palabras poco corrientes (prensa, TV, etc.).', 4),
(67, 'Entender artículos de periódicos o revistas en los que está interesado.', 4),
(68, 'Seguir una historia en un libro, el cine, la radio o la televisión.', 4),
(69, 'Tomar decisiones en cuestiones cotidianas (elegir vestido o comida) o de más\r\n trascendencia (vacaciones, inversiones, compras, etc.).', 4),
(70, 'Manejar los asuntos financieros (pensión, bancos, impuestos, rentas, etc.).', 4),
(71, 'Resolver problemas aritméticos cotidianos (tiempos, cantidades, distancias).', 4),
(72, '¿Cree que su inteligencia ha cambiado algo durante los últimos 5 años?.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_respuesta`
--

CREATE TABLE `pregunta_respuesta` (
  `id_pregunta_respuesta` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `id_resp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta_respuesta`
--

INSERT INTO `pregunta_respuesta` (`id_pregunta_respuesta`, `id_quest`, `id_resp`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4),
(21, 6, 1),
(22, 6, 2),
(23, 6, 3),
(24, 6, 4),
(25, 7, 1),
(26, 7, 2),
(27, 7, 3),
(28, 7, 4),
(29, 8, 1),
(30, 8, 2),
(31, 8, 3),
(32, 8, 4),
(33, 9, 1),
(34, 9, 2),
(35, 9, 3),
(36, 9, 4),
(37, 10, 1),
(38, 10, 2),
(39, 10, 3),
(40, 10, 4),
(41, 11, 5),
(42, 11, 6),
(43, 11, 7),
(44, 11, 8),
(45, 12, 5),
(46, 12, 6),
(47, 12, 7),
(48, 12, 8),
(49, 13, 5),
(50, 13, 6),
(51, 13, 7),
(52, 13, 8),
(53, 14, 5),
(54, 14, 6),
(55, 14, 7),
(56, 14, 8),
(57, 15, 5),
(58, 15, 6),
(59, 15, 7),
(60, 15, 8),
(61, 16, 5),
(62, 16, 6),
(63, 16, 7),
(64, 16, 8),
(65, 17, 5),
(66, 17, 6),
(67, 17, 7),
(68, 17, 8),
(69, 18, 5),
(70, 18, 6),
(71, 18, 7),
(72, 18, 8),
(73, 19, 5),
(74, 19, 6),
(75, 19, 7),
(76, 19, 8),
(77, 20, 5),
(78, 20, 6),
(79, 20, 7),
(80, 20, 8),
(81, 21, 5),
(82, 21, 6),
(83, 21, 7),
(84, 21, 8),
(85, 22, 5),
(86, 22, 6),
(87, 22, 7),
(88, 22, 8),
(89, 23, 5),
(90, 23, 6),
(91, 23, 7),
(92, 23, 8),
(93, 24, 5),
(94, 24, 6),
(95, 24, 7),
(96, 24, 8),
(97, 25, 5),
(98, 25, 6),
(99, 25, 7),
(100, 25, 8),
(101, 26, 5),
(102, 26, 6),
(103, 26, 7),
(104, 26, 8),
(105, 27, 5),
(106, 27, 6),
(107, 27, 7),
(108, 27, 8),
(109, 28, 5),
(110, 28, 6),
(111, 28, 7),
(112, 28, 8),
(113, 29, 5),
(114, 29, 6),
(115, 29, 7),
(116, 29, 8),
(117, 30, 5),
(118, 30, 6),
(119, 30, 7),
(120, 30, 8),
(121, 31, 5),
(122, 31, 6),
(123, 31, 7),
(124, 31, 8),
(125, 32, 5),
(126, 32, 6),
(127, 32, 7),
(128, 32, 8),
(129, 33, 5),
(130, 33, 6),
(131, 33, 7),
(132, 33, 8),
(133, 34, 5),
(134, 34, 6),
(135, 34, 7),
(136, 34, 8),
(137, 35, 5),
(138, 35, 6),
(139, 35, 7),
(140, 35, 8),
(141, 36, 5),
(142, 36, 6),
(143, 36, 7),
(144, 36, 8),
(145, 37, 5),
(146, 37, 6),
(147, 37, 7),
(148, 37, 8),
(149, 38, 5),
(150, 38, 6),
(151, 38, 7),
(152, 38, 8),
(153, 39, 5),
(154, 39, 6),
(155, 39, 7),
(156, 39, 8),
(157, 40, 5),
(158, 40, 6),
(159, 40, 7),
(160, 40, 8),
(161, 41, 9),
(162, 41, 10),
(163, 42, 11),
(164, 42, 12),
(165, 43, 11),
(166, 43, 12),
(167, 44, 11),
(168, 44, 12),
(169, 45, 9),
(170, 45, 10),
(171, 46, 11),
(172, 46, 12),
(173, 47, 9),
(174, 47, 10),
(175, 48, 11),
(176, 48, 12),
(177, 49, 11),
(178, 49, 12),
(179, 50, 11),
(180, 50, 12),
(181, 51, 9),
(182, 51, 10),
(183, 52, 11),
(184, 52, 12),
(185, 53, 9),
(186, 53, 10),
(187, 54, 11),
(188, 54, 12),
(189, 55, 11),
(190, 55, 12),
(191, 56, 13),
(192, 56, 14),
(193, 56, 15),
(194, 56, 16),
(195, 56, 17),
(196, 57, 13),
(197, 57, 14),
(198, 57, 15),
(199, 57, 16),
(200, 57, 17),
(201, 58, 13),
(202, 58, 14),
(203, 58, 15),
(204, 58, 16),
(205, 58, 17),
(206, 59, 13),
(207, 59, 14),
(208, 59, 15),
(209, 59, 16),
(210, 59, 17),
(211, 60, 13),
(212, 60, 14),
(213, 60, 15),
(214, 60, 16),
(215, 60, 17),
(216, 61, 13),
(217, 61, 14),
(218, 61, 15),
(219, 61, 16),
(220, 61, 17),
(221, 62, 13),
(222, 62, 14),
(223, 62, 15),
(224, 62, 16),
(225, 62, 17),
(226, 63, 13),
(227, 63, 14),
(228, 63, 15),
(229, 63, 16),
(230, 63, 17),
(231, 64, 13),
(232, 64, 14),
(233, 64, 15),
(234, 64, 16),
(235, 64, 17),
(236, 65, 13),
(237, 65, 14),
(238, 65, 15),
(239, 65, 16),
(240, 65, 17),
(241, 66, 13),
(242, 66, 14),
(243, 66, 15),
(244, 66, 16),
(245, 66, 17),
(246, 67, 13),
(247, 67, 14),
(248, 67, 15),
(249, 67, 16),
(250, 67, 17),
(251, 68, 13),
(252, 68, 14),
(253, 68, 15),
(254, 68, 16),
(255, 68, 17),
(256, 69, 13),
(257, 69, 14),
(258, 69, 15),
(259, 69, 16),
(260, 69, 17),
(261, 70, 13),
(262, 70, 14),
(263, 70, 15),
(264, 70, 16),
(265, 70, 17),
(266, 71, 13),
(267, 71, 14),
(268, 71, 15),
(269, 71, 16),
(270, 71, 17),
(271, 72, 13),
(272, 72, 14),
(273, 72, 15),
(274, 72, 16),
(275, 72, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id_p` int(11) NOT NULL,
  `nombre_p` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `no_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id_p`, `nombre_p`, `descripcion`, `no_p`) VALUES
(1, 'QSM', 'Escala de quejas subjetivas de memoria', 10),
(2, 'GAS-1', 'Escala geriatrica de ansiedad', 30),
(3, 'GDS', 'Escala de depresion geriatrica', 15),
(4, 'IQCODE', 'Cuestionario para informantes sobre el deterioro cognitivo en las personas mayores', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas_realizadas`
--

CREATE TABLE `pruebas_realizadas` (
  `id_registro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_prueba` int(11) NOT NULL,
  `realizada` bit(1) NOT NULL DEFAULT b'0',
  `fecha_completada` datetime NOT NULL DEFAULT current_timestamp(),
  `id_respuestas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pruebas_realizadas`
--

INSERT INTO `pruebas_realizadas` (`id_registro`, `id_usuario`, `id_prueba`, `realizada`, `fecha_completada`, `id_respuestas`) VALUES
(35, 10, 1, b'1', '2024-11-18 20:27:52', 47),
(36, 10, 2, b'1', '2024-11-21 15:14:29', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_resp` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_resp`, `descripcion`, `puntaje`) VALUES
(1, 'No', 0),
(2, 'Si pero, no hay problema', 1),
(3, 'Si, es un problema', 2),
(4, 'Si, es un serio problema', 3),
(5, 'Nada', 0),
(6, 'Algunas veces', 1),
(7, 'La mayor parte del tiempo', 2),
(8, 'Todo el tiempo', 3),
(9, 'Si', 0),
(10, 'No', 1),
(11, 'Si', 1),
(12, 'No', 0),
(13, 'Ha mejorado mucho', 1),
(14, 'Ha mejorado un poco', 2),
(15, 'Apenas ha cambiado', 3),
(16, 'Ha empeorado Poco', 4),
(17, 'Ha empeorado Mucho', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_usuario`
--

CREATE TABLE `respuestas_usuario` (
  `id_registro` int(11) NOT NULL,
  `respuestas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`respuestas`)),
  `id_prueba` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas_usuario`
--

INSERT INTO `respuestas_usuario` (`id_registro`, `respuestas`, `id_prueba`, `id_usuario`, `fecha_registro`) VALUES
(47, '[{\"pregunta\": \"1\", \"respuesta\": \"3\"}, {\"pregunta\": \"2\", \"respuesta\": \"3\"}, {\"pregunta\": \"3\", \"respuesta\": \"3\"}, {\"pregunta\": \"4\", \"respuesta\": \"3\"}, {\"pregunta\": \"5\", \"respuesta\": \"3\"}, {\"pregunta\": \"6\", \"respuesta\": \"3\"}, {\"pregunta\": \"7\", \"respuesta\": \"3\"}, {\"pregunta\": \"8\", \"respuesta\": \"3\"}, {\"pregunta\": \"9\", \"respuesta\": \"3\"}, {\"pregunta\": \"10\", \"respuesta\": \"3\"}]', 1, 10, '2024-11-18 20:27:52'),
(48, '[{\"pregunta\": \"11\", \"respuesta\": \"3\"}, {\"pregunta\": \"12\", \"respuesta\": \"3\"}, {\"pregunta\": \"13\", \"respuesta\": \"3\"}, {\"pregunta\": \"14\", \"respuesta\": \"3\"}, {\"pregunta\": \"15\", \"respuesta\": \"3\"}, {\"pregunta\": \"16\", \"respuesta\": \"3\"}, {\"pregunta\": \"17\", \"respuesta\": \"3\"}, {\"pregunta\": \"18\", \"respuesta\": \"3\"}, {\"pregunta\": \"19\", \"respuesta\": \"3\"}, {\"pregunta\": \"20\", \"respuesta\": \"3\"}, {\"pregunta\": \"21\", \"respuesta\": \"3\"}, {\"pregunta\": \"22\", \"respuesta\": \"3\"}, {\"pregunta\": \"23\", \"respuesta\": \"3\"}, {\"pregunta\": \"24\", \"respuesta\": \"3\"}, {\"pregunta\": \"25\", \"respuesta\": \"3\"}, {\"pregunta\": \"26\", \"respuesta\": \"3\"}, {\"pregunta\": \"27\", \"respuesta\": \"3\"}, {\"pregunta\": \"28\", \"respuesta\": \"3\"}, {\"pregunta\": \"29\", \"respuesta\": \"3\"}, {\"pregunta\": \"30\", \"respuesta\": \"2\"}, {\"pregunta\": \"31\", \"respuesta\": \"1\"}, {\"pregunta\": \"32\", \"respuesta\": \"1\"}, {\"pregunta\": \"33\", \"respuesta\": \"2\"}, {\"pregunta\": \"34\", \"respuesta\": \"3\"}, {\"pregunta\": \"35\", \"respuesta\": \"0\"}, {\"pregunta\": \"36\", \"respuesta\": \"2\"}, {\"pregunta\": \"37\", \"respuesta\": \"3\"}, {\"pregunta\": \"38\", \"respuesta\": \"3\"}, {\"pregunta\": \"39\", \"respuesta\": \"3\"}, {\"pregunta\": \"40\", \"respuesta\": \"2\"}]', 2, 10, '2024-11-21 15:14:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_us` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_us`, `usuario`, `email`, `contra`, `fecha_registro`) VALUES
(3, 'asdasd', 'asdasd@s.com', '$2y$10$/YnqMRf0gHuQS216IyLipOnpeJQDtXYRQL9cPsJRe4xF3Nn0YNOy6', '2024-11-15'),
(4, 'asdasd', 'asdasd@s.com', '$2y$10$WFW1J2t1rF..WMuxJpkrmeOSNLMpSD1PLQdV0NyemWQNT9QnHDOTu', '2024-11-15'),
(5, 'asdasd', 'asdasd@s.com', '$2y$10$lD2/zdYTszbLU/gDHiWpEefHJIKTkjf2pRHRYDYQTe1.NfFeZ81G6', '2024-11-15'),
(6, 'asdasd', 'asdasd@s.com', '$2y$10$ZVxd9MyvLB7VrUb3DHgHu.TMGAniq.xMuV35mVBr330LPL2.mrTZm', '2024-11-15'),
(7, 'asdasd', 'asdasd@s.com', '$2y$10$E/KHa1CLxoDdizvKw7Ct4eJ5dUjtwjb99ed6jQX071HfxRu/rHKGO', '2024-11-15'),
(8, 'asdasd', 'asdasd@s.com', '$2y$10$CjtGDI/ZKNciKhK/wK3Fuu3FKu8WFGq2OQPORSuKL2pdD8hceeBBG', '2024-11-15'),
(9, '3465g', 'asdasd@s.com', '$2y$10$O7jDTrcJ8gelq3bAOi0.iewNXcp/OXHyYgGk4V56MkH6cWxoZernK', '2024-11-15'),
(10, 'saul', 'asdasd@s.com', '$2y$10$rxOt9qzz9BGHxE8EKXwpa.xiKQbO7Ej9IkCJ2JkRco7xPVbr0Er86', '2024-11-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_p`
--
ALTER TABLE `info_p`
  ADD PRIMARY KEY (`id_infop`),
  ADD KEY `info_p_us` (`id_us`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_quest`),
  ADD KEY `pruebaid` (`id_p`);

--
-- Indices de la tabla `pregunta_respuesta`
--
ALTER TABLE `pregunta_respuesta`
  ADD PRIMARY KEY (`id_pregunta_respuesta`),
  ADD KEY `preguntaid` (`id_quest`),
  ADD KEY `respuestaid` (`id_resp`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id_p`);

--
-- Indices de la tabla `pruebas_realizadas`
--
ALTER TABLE `pruebas_realizadas`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_respuestasFK` (`id_respuestas`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_resp`);

--
-- Indices de la tabla `respuestas_usuario`
--
ALTER TABLE `respuestas_usuario`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `info_p`
--
ALTER TABLE `info_p`
  MODIFY `id_infop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `pregunta_respuesta`
--
ALTER TABLE `pregunta_respuesta`
  MODIFY `id_pregunta_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pruebas_realizadas`
--
ALTER TABLE `pruebas_realizadas`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_resp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `respuestas_usuario`
--
ALTER TABLE `respuestas_usuario`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `info_p`
--
ALTER TABLE `info_p`
  ADD CONSTRAINT `info_p_us` FOREIGN KEY (`id_us`) REFERENCES `usuarios` (`id_us`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `pruebaid` FOREIGN KEY (`id_p`) REFERENCES `pruebas` (`id_p`);

--
-- Filtros para la tabla `pregunta_respuesta`
--
ALTER TABLE `pregunta_respuesta`
  ADD CONSTRAINT `preguntaid` FOREIGN KEY (`id_quest`) REFERENCES `preguntas` (`id_quest`),
  ADD CONSTRAINT `respuestaid` FOREIGN KEY (`id_resp`) REFERENCES `respuestas` (`id_resp`);

--
-- Filtros para la tabla `pruebas_realizadas`
--
ALTER TABLE `pruebas_realizadas`
  ADD CONSTRAINT `id_respuestasFK` FOREIGN KEY (`id_respuestas`) REFERENCES `respuestas_usuario` (`id_registro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
