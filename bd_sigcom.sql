-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2020 a las 00:56:11
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sigcom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `ArticuloID` bigint(20) UNSIGNED NOT NULL,
  `Activo` int(1) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipo_embalaje` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Unidad_medida` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Unidad_bulto` int(11) DEFAULT NULL,
  `Punto_pedido` int(11) NOT NULL,
  `Stock_disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`ArticuloID`, `Activo`, `Descripcion`, `Tipo_embalaje`, `Unidad_medida`, `Unidad_bulto`, `Punto_pedido`, `Stock_disponible`) VALUES
(1, 0, 'Medidores', 'Caja', '1', 1, 100, 35),
(2, 0, 'Caño de PVC de 50\'', 'Sin embalaje', 'Unidad', 1, 20, 30),
(4, 0, 'Caño de PVC de 75\'', 'Sin embalaje', 'Unidad', 1, 30, 90),
(5, 0, 'articulo2', 'Bolsa', 'Unidad', 5, 0, 0),
(6, 0, 'articulo2', 'Bolsa', 'Unidad', 5, 0, 0),
(7, 0, 'articulo3', 'Bolsa', 'Unidad', 5, 0, 0),
(8, 0, 'articulo3', 'Bolsa', 'Unidad', 5, 0, 0),
(9, 0, 'articulo6', 'Bolsa', 'Unidad', 0, 0, 0),
(10, 0, 'articuo', 'Bolsa', 'Unidad', 0, 0, 0),
(11, 0, 'Caretilla', 'Sin embalaje', 'Unidad', 1, 2, 3),
(12, 0, 'Caretilla', 'Sin embalaje', 'Unidad', 1, 2, 3),
(13, 0, 'Abrazadera PVC 50 mm', 'Caja', 'Unidad', 20, 10, 60),
(14, 0, 'Abrazadera PVC 75 mm', 'Caja', 'Unidad', 20, 30, 80),
(15, 0, 'Acople de mango roscado de 1/2 para medidor corto', 'Caja', 'Unidad', 20, 20, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_proveedor`
--

CREATE TABLE `articulo_proveedor` (
  `ArticuloID` bigint(20) UNSIGNED NOT NULL,
  `ProveedorID` bigint(20) UNSIGNED NOT NULL,
  `FechaDesde` date NOT NULL,
  `FechaHasta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulo_proveedor`
--

INSERT INTO `articulo_proveedor` (`ArticuloID`, `ProveedorID`, `FechaDesde`, `FechaHasta`) VALUES
(1, 1, '2020-12-02', '2020-12-03'),
(1, 2, '2020-12-01', '2020-12-02'),
(1, 3, '2020-12-03', NULL),
(1, 4, '2020-12-01', '2020-12-02'),
(1, 5, '2020-12-02', NULL),
(1, 6, '2020-12-02', '2020-12-02'),
(1, 7, '2020-12-02', NULL),
(2, 2, '2020-12-03', NULL),
(2, 4, '2020-12-03', NULL),
(2, 5, '2020-12-03', NULL),
(2, 7, '2020-12-03', NULL),
(4, 1, '2020-12-02', NULL),
(4, 3, '2020-12-02', NULL),
(4, 5, '2020-12-02', NULL),
(4, 7, '2020-12-02', NULL),
(11, 7, '2020-12-02', NULL),
(13, 2, '2020-12-02', NULL),
(13, 4, '2020-12-02', NULL),
(13, 5, '2020-12-02', '2020-12-02'),
(13, 7, '2020-12-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_solicitud_compras`
--

CREATE TABLE `detalles_solicitud_compras` (
  `Cantidad` int(11) NOT NULL,
  `FechaResposicionEstimada` date NOT NULL,
  `ArticuloID` bigint(20) UNSIGNED NOT NULL,
  `SolicitudCompraID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2013_11_10_133032_personas', 1),
(14, '2013_11_11_123529_roles', 1),
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2020_11_01_221313_create_sessions_table', 1),
(21, '2020_11_11_125307_permisos', 1),
(22, '2020_11_11_144419_sectores', 1),
(23, '2020_11_13_210507_articulos', 1),
(24, '2020_11_13_210614_proveedores', 1),
(25, '2020_11_12_210614_proveedores', 2),
(26, '2020_11_23_142300_articulo_proveedor', 2),
(27, '2020_11_26_213746_solicitud_compras', 3),
(28, '2020_11_27_004642_detalles_solicitud_compras', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `PermisoID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `Legajo` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DNI` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cuil` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mail` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`Legajo`, `Nombre`, `Apellido`, `DNI`, `Cuil`, `telefono`, `Mail`, `Direccion`, `created_at`, `updated_at`) VALUES
(0, 'Maximiliano ', 'Robledo', '33558688', '20335586884', '0232415474109', 'maxirobledo@gmail.com', '1º de Mayo Nº 248', '2020-11-22 20:51:18', '2020-11-22 20:51:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ProveedorID` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Razon_social` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cuit` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Condicion_Iva` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mail` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Localidad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Provincia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ProveedorID`, `Nombre`, `Razon_social`, `Cuit`, `Condicion_Iva`, `Direccion`, `Telefono`, `Mail`, `Localidad`, `Provincia`) VALUES
(1, 'Juan Perez', 'Lo de Juan', '20335586884', 'RI', '1º de mayo 248', '232415474109', 'maxirobledo@gmail.com', 'Buenos Aires', 'Suipacha'),
(2, 'Angel', 'El Angel', '20335586884', 'RI', 'MI CASA', '01112451556', 'angel@sigcom.com', 'mi prov', 'mi ciudad'),
(3, 'Maxi', 'MaxiProvedor', '20335586884', 'RI', '1º DE MAYO 248', '0232415474109', 'maxirobledo@gmail.com', 'BS AS', 'SUIPACHA'),
(4, 'el pepe', 'don pepito', '20335586884', 'ri', 'la casa de peepe', '1111111111', 'asdasd@sigcom.com', 'asdasd', 'la couidad'),
(5, 'el carlos', 'carlitos', '20335586884', 'ri', 'asdasd', '11111111', 'angel@sigcom.com', 'asdasd', 'asdasd'),
(6, 'el carlos', 'carlitos', '20335586884', 'ri', 'asdasd', '11111111', 'angel@sigcom.com', 'asdasd', 'asdasd'),
(7, 'el chulo', 'chulito', '20335586884', 'ri', 'asdassda', '1111', 'maxirobledo@gmail.com', 'asdas', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `RolID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`RolID`, `created_at`, `updated_at`) VALUES
('Administrador de Compras', '2020-11-22 20:50:10', '2020-11-22 20:50:10'),
('Directivo', '2020-11-22 20:50:10', '2020-11-22 20:50:10'),
('Responsable de Sector', '2020-11-22 20:50:52', '2020-11-22 20:50:52'),
('Super Usuario', '2020-11-22 20:49:20', '2020-11-22 20:49:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `SectorID` bigint(20) UNSIGNED NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Persona_a_cargo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('w1nQyIESrapNcgbSsbuWiSCgcSugJRTZO4hKdKC8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiek5US2JHRDVPcTcyd2hLcXBVQVo5MGNDUlpKN0lJYlpURlRUT3V6NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9nZXN0aW9uQ29tcHJhcy9zb2xpY2l0dWRlc0NvbXByYXMvYWx0YV9zZWxfYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDM1Z01CbGtjazdpV2VjdnlMTTZMYXV1d3pLZG1WOFJEb3dUMzNaZXNlY3Jlc3diQ3liZlZhIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQzNWdNQmxrY2s3aVdlY3Z5TE02TGF1dXd6S2RtVjhSRG93VDMzWmVzZWNyZXN3YkN5YmZWYSI7fQ==', 1607298747),
('y0R6fZxuuJ2mh7cKuWkJS10kgETAj81P9cq2AfMC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQXVMckp6UHVEaDVjSHZRbTk0bHVHZUVJU0V0U1BFM0tobDhTVDJ2SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHA6Ly9zaWdjb20udGVzdC9nZXN0aW9uQ29tcHJhcy9zb2xpY2l0dWRlc0NvbXByYXMvYWx0YV9zZWxfYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDM1Z01CbGtjazdpV2VjdnlMTTZMYXV1d3pLZG1WOFJEb3dUMzNaZXNlY3Jlc3diQ3liZlZhIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQzNWdNQmxrY2s3aVdlY3Z5TE02TGF1dXd6S2RtVjhSRG93VDMzWmVzZWNyZXN3YkN5YmZWYSI7fQ==', 1606955840);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_compras`
--

CREATE TABLE `solicitud_compras` (
  `SolicitudCompraID` bigint(20) UNSIGNED NOT NULL,
  `FechaRegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud_compras`
--

INSERT INTO `solicitud_compras` (`SolicitudCompraID`, `FechaRegistro`) VALUES
(1, '2020-11-27'),
(2, '2020-12-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Legajo` int(11) NOT NULL,
  `RolID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `profile_photo_path`, `created_at`, `updated_at`, `Legajo`, `RolID`, `Activo`) VALUES
(1, 'maxi', 'maxirobledo@gmail.com', NULL, '$2y$10$35gMBlkck7iWecvyLM6LauuwzKdmV8RDowT33ZesecreswbCybfVa', NULL, NULL, NULL, NULL, '2020-11-22 23:53:38', '2020-11-29 23:51:03', 0, 'Super Usuario', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`ArticuloID`);

--
-- Indices de la tabla `articulo_proveedor`
--
ALTER TABLE `articulo_proveedor`
  ADD PRIMARY KEY (`ArticuloID`,`ProveedorID`),
  ADD KEY `articulo_proveedor_proveedorid_foreign` (`ProveedorID`);

--
-- Indices de la tabla `detalles_solicitud_compras`
--
ALTER TABLE `detalles_solicitud_compras`
  ADD PRIMARY KEY (`ArticuloID`,`SolicitudCompraID`),
  ADD KEY `detalles_solicitud_compras_solicitudcompraid_foreign` (`SolicitudCompraID`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`PermisoID`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`Legajo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ProveedorID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RolID`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`SectorID`),
  ADD KEY `sectores_persona_a_cargo_foreign` (`Persona_a_cargo`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `solicitud_compras`
--
ALTER TABLE `solicitud_compras`
  ADD PRIMARY KEY (`SolicitudCompraID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_legajo_foreign` (`Legajo`),
  ADD KEY `users_rolid_foreign` (`RolID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `ArticuloID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ProveedorID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `SectorID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_compras`
--
ALTER TABLE `solicitud_compras`
  MODIFY `SolicitudCompraID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo_proveedor`
--
ALTER TABLE `articulo_proveedor`
  ADD CONSTRAINT `articulo_proveedor_articuloid_foreign` FOREIGN KEY (`ArticuloID`) REFERENCES `articulos` (`ArticuloID`),
  ADD CONSTRAINT `articulo_proveedor_proveedorid_foreign` FOREIGN KEY (`ProveedorID`) REFERENCES `proveedores` (`ProveedorID`);

--
-- Filtros para la tabla `detalles_solicitud_compras`
--
ALTER TABLE `detalles_solicitud_compras`
  ADD CONSTRAINT `detalles_solicitud_compras_articuloid_foreign` FOREIGN KEY (`ArticuloID`) REFERENCES `articulos` (`ArticuloID`),
  ADD CONSTRAINT `detalles_solicitud_compras_solicitudcompraid_foreign` FOREIGN KEY (`SolicitudCompraID`) REFERENCES `solicitud_compras` (`SolicitudCompraID`);

--
-- Filtros para la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD CONSTRAINT `sectores_persona_a_cargo_foreign` FOREIGN KEY (`Persona_a_cargo`) REFERENCES `personas` (`Legajo`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_legajo_foreign` FOREIGN KEY (`Legajo`) REFERENCES `personas` (`Legajo`),
  ADD CONSTRAINT `users_rolid_foreign` FOREIGN KEY (`RolID`) REFERENCES `roles` (`RolID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
