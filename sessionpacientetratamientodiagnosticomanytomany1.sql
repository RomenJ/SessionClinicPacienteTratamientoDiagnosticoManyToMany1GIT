-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2023 a las 21:11:21
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sessionpacientetratamientodiagnosticomanytomany1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id`, `name`, `description`) VALUES
(1, 'Rotura de Ligamento Cruzado', 'Una cosa que duele bastante y puede precisar operación'),
(2, 'Luxación de hombro', 'Una cosa leve que precisa rehabilitación'),
(3, 'Artrosis', 'En enfermedad crónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230321184045', '2023-03-21 19:40:52', 153);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `name`, `telephone`) VALUES
(1, 'Gustavo Sésamo', '2134321947'),
(2, 'Bulbasur', '3294293'),
(3, 'El Coyote de la Warner', '833413246');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_diagnostico`
--

CREATE TABLE `paciente_diagnostico` (
  `paciente_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente_diagnostico`
--

INSERT INTO `paciente_diagnostico` (`paciente_id`, `diagnostico_id`) VALUES
(1, 1),
(2, 3),
(3, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_tratamiento`
--

CREATE TABLE `paciente_tratamiento` (
  `paciente_id` int(11) NOT NULL,
  `tratamiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente_tratamiento`
--

INSERT INTO `paciente_tratamiento` (`paciente_id`, `tratamiento_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapeuta`
--

CREATE TABLE `terapeuta` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `name`, `description`) VALUES
(1, 'Una tirita', 'Un remedio que nunca falla'),
(2, 'radiofrecuencia 4-5', 'de 400HZ a 500 Hz'),
(3, 'radiofrecuencia 6-7', 'radiofrecuenia entre hondas de 600 a 700 Hz');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente_diagnostico`
--
ALTER TABLE `paciente_diagnostico`
  ADD PRIMARY KEY (`paciente_id`,`diagnostico_id`),
  ADD KEY `IDX_D1D4E4FD7310DAD4` (`paciente_id`),
  ADD KEY `IDX_D1D4E4FD7A94BA1A` (`diagnostico_id`);

--
-- Indices de la tabla `paciente_tratamiento`
--
ALTER TABLE `paciente_tratamiento`
  ADD PRIMARY KEY (`paciente_id`,`tratamiento_id`),
  ADD KEY `IDX_2BE190C97310DAD4` (`paciente_id`),
  ADD KEY `IDX_2BE190C944168F7D` (`tratamiento_id`);

--
-- Indices de la tabla `terapeuta`
--
ALTER TABLE `terapeuta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `terapeuta`
--
ALTER TABLE `terapeuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paciente_diagnostico`
--
ALTER TABLE `paciente_diagnostico`
  ADD CONSTRAINT `FK_D1D4E4FD7310DAD4` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D1D4E4FD7A94BA1A` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnostico` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `paciente_tratamiento`
--
ALTER TABLE `paciente_tratamiento`
  ADD CONSTRAINT `FK_2BE190C944168F7D` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamiento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2BE190C97310DAD4` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
