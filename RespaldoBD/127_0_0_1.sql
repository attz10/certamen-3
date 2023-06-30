-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2023 a las 02:56:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `certamen3`
--
CREATE DATABASE IF NOT EXISTS `certamen3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `certamen3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `user` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`user`, `password`, `nombre`, `apellido`, `created_at`, `updated_at`, `perfil_id`, `deleted_at`) VALUES
('admin1', '$2y$10$/0Y2vgQYUv1SQYV2AGxX9.FNDUYTDYTHgEg6GJJQioCzZuiTLDkIe', 'Ricardo', 'perez', '2023-06-30 00:15:48', '2023-06-30 00:54:08', 2, NULL),
('admin2', '$2y$10$3NlhDoAFUwwh4EQJtm2VkeRKvu/jG3ZBTs/l6V8zNDuoS5tyXafku', 'Jonathan ', 'Sanhueza', '2023-06-30 00:53:08', '2023-06-30 00:53:08', 2, NULL),
('attz', '$2y$10$9BkAMmWqlFSwbaY5cp/V3Ot2gzohPXrh5um1p1DhDadfpCuOyjOFW', 'Atilio', 'Tudesca', '2023-06-29 02:26:21', '2023-06-30 00:27:06', 1, NULL),
('elporo', '$2y$10$gENqsno7BYFDSx9zWafoMORx9JAUuIiROMp841DWFcbeknmR6dBYG', 'Luciano', 'Sanchez', '2023-06-29 22:02:19', '2023-06-29 22:02:19', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `baneada` tinyint(1) NOT NULL DEFAULT 0,
  `motivo_ban` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cuenta_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2023_06_16_213054_create_perfiles_table', 1),
(29, '2023_06_16_213223_create_cuentas_table', 1),
(30, '2023_06_16_213823_create_imagenes_table', 1),
(31, '2023_06_23_204004_add_usuarios_softdelete', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'artista', '2023-06-29 00:20:37', NULL),
(2, 'administrador', '2023-06-29 00:20:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `cuentas_user_unique` (`user`),
  ADD KEY `cuentas_perfil_id_foreign` (`perfil_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_cuenta_user_foreign` (`cuenta_user`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_cuenta_user_foreign` FOREIGN KEY (`cuenta_user`) REFERENCES `cuentas` (`user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
