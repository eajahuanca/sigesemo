-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2018 a las 13:58:37
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsisemo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativos`
--

CREATE TABLE `correlativos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cor_cite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor_valor` int(10) UNSIGNED NOT NULL,
  `cor_gestion` int(10) UNSIGNED NOT NULL,
  `cor_depto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cor_descripcion` text COLLATE utf8mb4_unicode_ci,
  `cor_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `correlativos`
--

INSERT INTO `correlativos` (`id`, `cor_cite`, `cor_valor`, `cor_gestion`, `cor_depto`, `cor_descripcion`, `cor_estado`, `created_at`, `updated_at`) VALUES
(1, 'CUS', 4, 2018, 'GENERAL', 'Correlativo General', 1, '2018-02-18 04:00:00', '2018-02-19 02:11:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_sigechr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_depto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identidad` int(10) UNSIGNED NOT NULL,
  `pre_nota` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_nota_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_nota_check` tinyint(1) NOT NULL DEFAULT '0',
  `pre_ficha` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_ficha_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_ficha_check` tinyint(1) NOT NULL DEFAULT '0',
  `pre_legal` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_legal_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_legal_check` tinyint(1) NOT NULL DEFAULT '0',
  `pre_estado` enum('ACEPTADO','PENDIENTE','RECHAZADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_obs` text COLLATE utf8mb4_unicode_ci,
  `idregistra` int(10) UNSIGNED NOT NULL,
  `idactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `cus`, `pre_sigechr`, `pre_depto`, `identidad`, `pre_nota`, `pre_nota_nombre`, `pre_nota_check`, `pre_ficha`, `pre_ficha_nombre`, `pre_ficha_check`, `pre_legal`, `pre_legal_nombre`, `pre_legal_check`, `pre_estado`, `pre_obs`, `idregistra`, `idactualiza`, `created_at`, `updated_at`) VALUES
(1, 'CUS0001-2018', '1231-07', 'La Paz', 2, 'archivo/previous/nota/2018218-123331.pdf', '1.pdf', 1, NULL, NULL, 0, NULL, NULL, 0, 'RECHAZADO', '1.- quedan pendientes dos documentos 2.- Se rechaza la solicitud por no cumplir en la fecha de presentación de los documentos.', 2, 2, '2018-02-18 16:33:31', '2018-02-19 01:55:22'),
(2, 'CUS0002-2018', '123123-07', 'Cochabamba', 1, 'archivo/previous/nota/2018218-123829.pdf', '2.pdf', 1, 'archivo/previous/ficha/2018218-123829.pdf', '3.pdf', 1, 'archivo/previous/legal/2018218-215349.pdf', '3.pdf', 1, 'PENDIENTE', '1.- falta la documentación legal 2.- La documentación legal cuenta con algunas observaciones (por revisar)', 2, 2, '2018-02-18 16:38:29', '2018-02-19 01:53:49'),
(3, 'CUS0003-2018', '32131-131', 'Santa Cruz', 3, 'archivo/previous/nota/2018218-221144.pdf', '1.pdf', 1, 'archivo/previous/ficha/2018218-221144.pdf', '2.pdf', 1, 'archivo/previous/legal/2018218-221144.pdf', '3.pdf', 1, 'ACEPTADO', 'ninguna', 2, 2, '2018-02-19 02:11:44', '2018-02-19 02:11:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elegibles`
--

CREATE TABLE `elegibles` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ele_sigechr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ele_finanza` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_finanza_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_finanza_check` tinyint(1) NOT NULL DEFAULT '0',
  `ele_tecnica` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_tecnica_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_tecnica_check` tinyint(1) NOT NULL DEFAULT '0',
  `ele_legal` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_legal_nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ele_legal_check` tinyint(1) NOT NULL DEFAULT '0',
  `ele_estado` enum('ACEPTADO','PENDIENTE','RECHAZADO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ele_obs` text COLLATE utf8mb4_unicode_ci,
  `idregistra` int(10) UNSIGNED NOT NULL,
  `idactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `ent_nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ent_descripcion` text COLLATE utf8mb4_unicode_ci,
  `ent_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id`, `ent_nombre`, `ent_descripcion`, `ent_estado`, `created_at`, `updated_at`) VALUES
(1, 'Gobierno Autonomo Departamental', 'GAD - Gobiernos Autonomos Departamentales', 1, '2018-02-18 04:00:00', '2018-02-18 04:00:00'),
(2, 'Gobierno Autonomo Municipal', 'GAM - Gobiernos Autonomos Municipales', 1, '2018-02-18 04:00:00', '2018-02-18 04:00:00'),
(3, 'Otras Entidades', 'Otras Entidades', 1, '2018-02-18 04:00:00', '2018-02-18 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_01_20_084450_create_roles_table', 1),
(4, '2015_01_20_084525_create_role_user_table', 1),
(5, '2015_01_24_080208_create_permissions_table', 1),
(6, '2015_01_24_080433_create_permission_role_table', 1),
(7, '2015_12_04_003040_add_special_role_column', 1),
(8, '2017_10_17_170735_create_permission_user_table', 1),
(11, '2018_02_18_095040_create_entidades_table', 2),
(12, '2018_02_18_095341_create_correlativos_table', 2),
(13, '2018_02_18_100003_create_documentos_table', 2),
(14, '2018_02_19_003535_create_elegelibilidad_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Roles, listar datos', 'roles.index', 'Lista y navega todos los roles del sistema', '2018-02-08 10:16:40', '2018-02-08 10:16:40'),
(2, 'Rol, ver detalle', 'roles.show', 'Ve en detalle cada rol del sistema', '2018-02-08 10:16:40', '2018-02-08 10:16:40'),
(3, 'Rol, crear nuevo dato', 'roles.create', 'Crear nuevo rol del sistema', '2018-02-08 10:16:40', '2018-02-13 02:31:00'),
(4, 'Rol, actualizar dato', 'roles.edit', 'Actualizar datos de un rol del sistema', '2018-02-08 10:16:40', '2018-02-08 10:16:40'),
(5, 'Rol, eliminar dato', 'roles.destroy', 'Elimina un rol del sistema', '2018-02-08 10:16:40', '2018-02-08 10:16:40'),
(6, 'Permisos, listar datos', 'permisos.index', 'Listar todos los permisos registrados', '2018-02-13 00:28:22', '2018-02-13 00:28:22'),
(7, 'Permiso, ver detalle', 'permiso.show', 'Ve en detalle el Permiso del sistema', '2018-02-13 02:28:03', '2018-02-13 02:28:03'),
(8, 'Permiso, crear nuevo permiso', 'permiso.create', 'Crear nuevo permiso del sistema', '2018-02-13 02:30:17', '2018-02-13 02:30:17'),
(9, 'Permiso, actualizar permiso', 'permiso.edit', 'Actualizar datos de un Permiso del sistema', '2018-02-13 02:55:05', '2018-02-13 02:55:05'),
(10, 'Documentacion previa, listar', 'previous.index', 'Listar todas las documentaciones previas', '2018-02-14 19:08:43', '2018-02-14 19:08:43'),
(11, 'Documentacion previa, crear nuevo', 'previous.create', 'Crear un nueva nueva solicitud', '2018-02-14 19:10:34', '2018-02-14 19:10:34'),
(12, 'Documentacion previa, editar dato', 'previous.edit', 'Actualizar datos de la documentación', '2018-02-14 19:11:44', '2018-02-14 19:11:44'),
(13, 'Documentacion previa, mostrar datos', 'previous.show', 'Visualizar el detalle de la documentación previa', '2018-02-14 19:12:32', '2018-02-14 19:12:32'),
(14, 'Documentacion previa, guardar dato', 'previous.store', 'Guardar la documentación previa', '2018-02-14 22:18:54', '2018-02-14 22:18:54'),
(15, 'Documentacion previa, actualizar dato', 'previous.update', 'Actualizar los datos de la documentación previa', '2018-02-14 22:19:49', '2018-02-14 22:19:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2018-02-11 03:43:29', '2018-02-11 03:43:29'),
(2, 2, 4, '2018-02-11 03:43:29', '2018-02-11 03:43:29'),
(3, 1, 6, '2018-02-12 20:14:32', '2018-02-12 20:14:32'),
(4, 2, 6, '2018-02-12 20:14:32', '2018-02-12 20:14:32'),
(5, 10, 7, '2018-02-14 19:13:46', '2018-02-14 19:13:46'),
(6, 11, 7, '2018-02-14 19:13:46', '2018-02-14 19:13:46'),
(7, 12, 7, '2018-02-14 19:13:46', '2018-02-14 19:13:46'),
(8, 13, 7, '2018-02-14 19:13:46', '2018-02-14 19:13:46'),
(9, 14, 7, '2018-02-14 22:21:35', '2018-02-14 22:21:35'),
(10, 15, 7, '2018-02-14 22:21:35', '2018-02-14 22:21:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'Admin', 'slug', 'Super Administrador', '2018-02-08 10:16:43', '2018-02-08 10:16:43', 'all-access'),
(2, 'direccion', 'direccion.index', 'unidad de Direccion', '2018-02-09 16:26:27', '2018-02-09 16:26:27', 'all-access'),
(4, 'mi direccion de rol', 'direccion.rol', 'la direccion de este rol aun esta de prueba', '2018-02-11 03:43:29', '2018-02-11 03:43:29', NULL),
(6, 'Listar solo rol', 'slug.rol', 'Listar solo los roles para ver sus detalles', '2018-02-12 20:14:32', '2018-02-12 20:14:32', NULL),
(7, 'Documentación Previa', 'previous.index', 'Puede realizar el CRUD completo del modulo de documentación previa', '2018-02-14 19:13:45', '2018-02-14 19:13:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2018-02-02 04:00:00', '2018-02-02 04:00:00'),
(2, 1, 1, '2018-02-13 07:57:03', '2018-02-13 07:57:03'),
(4, 7, 2, '2018-02-14 19:14:45', '2018-02-14 19:14:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `us_nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_paterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_materno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_carnet` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_expedido` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_genero` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcargo` int(10) UNSIGNED NOT NULL,
  `idprofesion` int(10) UNSIGNED NOT NULL,
  `us_ingresoasis` int(11) NOT NULL DEFAULT '0',
  `us_fechaingreso` datetime DEFAULT NULL,
  `us_imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_nombreimagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_cuenta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_estado` tinyint(1) NOT NULL DEFAULT '1',
  `us_observaciones` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `us_nombre`, `us_paterno`, `us_materno`, `us_carnet`, `us_expedido`, `us_telefono`, `us_genero`, `idcargo`, `idprofesion`, `us_ingresoasis`, `us_fechaingreso`, `us_imagen`, `us_nombreimagen`, `us_cuenta`, `us_estado`, `us_observaciones`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Admin', 'Admin', '1234567', 'LP', '0', 'Masculino', 1, 1, 0, '2018-01-15 00:00:00', 'archivo/usuario/2018128-225840.jpg', 'descarga.jpg', 'admin.super', 1, NULL, 'admin@admin.com', '$2y$10$NmNBlntWzVohNEWXb5sCRu0NLp1ThA2hPOxQYbjkBGTy7vntuegeK', '4Iwz6Z0FwjDQtYOCyKF4aJJxc1THn9YERhEggiALUomvSVJmCQuneLiNW9vI', '2018-01-12 04:00:00', '2018-01-29 02:58:40'),
(2, 'Test user', 'Paterno user', 'Materno user', '552311', 'OR', '76525242', 'Masculino', 1, 1, 0, '2018-01-15 00:00:00', 'archivo/usuario/2018213-61448.png', 'avatar5.png', 'test.user', 1, '-', 'testuser@test.com', '$2y$10$oCXGsaLV.7PeyOIDPKc3OeyGEihVXW1p9AWOI25pzS17UENVvIdJy', 'W4AUJHxx10vko3sB7JidjXp2ztFnJunyjEOlxKcQuOZd7TLKYHj3bvbHOZCe', '2018-02-13 10:14:49', '2018-02-14 19:14:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correlativos`
--
ALTER TABLE `correlativos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correlativos_cor_cite_unique` (`cor_cite`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documentos_cus_unique` (`cus`),
  ADD UNIQUE KEY `documentos_pre_sigechr_unique` (`pre_sigechr`),
  ADD KEY `documentos_identidad_foreign` (`identidad`),
  ADD KEY `documentos_idregistra_foreign` (`idregistra`),
  ADD KEY `documentos_idactualiza_foreign` (`idactualiza`);

--
-- Indices de la tabla `elegibles`
--
ALTER TABLE `elegibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elegibles_idregistra_foreign` (`idregistra`),
  ADD KEY `elegibles_idactualiza_foreign` (`idactualiza`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_us_cuenta_unique` (`us_cuenta`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correlativos`
--
ALTER TABLE `correlativos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `elegibles`
--
ALTER TABLE `elegibles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_idactualiza_foreign` FOREIGN KEY (`idactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `documentos_identidad_foreign` FOREIGN KEY (`identidad`) REFERENCES `entidades` (`id`),
  ADD CONSTRAINT `documentos_idregistra_foreign` FOREIGN KEY (`idregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `elegibles`
--
ALTER TABLE `elegibles`
  ADD CONSTRAINT `elegibles_idactualiza_foreign` FOREIGN KEY (`idactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `elegibles_idregistra_foreign` FOREIGN KEY (`idregistra`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
