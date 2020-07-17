-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-06-2020 a las 20:02:46
-- Versión del servidor: 5.7.30-0ubuntu0.18.04.1
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `triage`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Areas`
--

CREATE TABLE `Areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_dato` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Areas`
--

INSERT INTO `Areas` (`id`, `created_at`, `updated_at`, `tipo_dato`) VALUES
(1, NULL, NULL, 'Consultorio Externo'),
(2, NULL, NULL, 'Quirofanos'),
(3, '2020-06-10 16:51:55', '2020-06-10 16:51:55', 'Clínica'),
(4, '2020-06-10 16:52:58', '2020-06-10 16:52:58', 'Shock Room'),
(5, '2020-06-21 17:31:51', '2020-06-21 17:31:51', 'Consultorios Ambulatorios'),
(6, '2020-06-24 19:49:40', '2020-06-24 19:49:40', 'Internacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Atencion`
--

CREATE TABLE `Atencion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `id_protocolo` bigint(20) UNSIGNED DEFAULT NULL,
  `Paciente_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Atencion`
--

INSERT INTO `Atencion` (`id`, `created_at`, `updated_at`, `usuario_id`, `id_protocolo`, `Paciente_id`) VALUES
(2, '2020-06-19 00:56:54', '2020-06-19 00:56:54', 1, 14, 1),
(3, '2020-06-19 01:03:58', '2020-06-19 01:03:58', 1, 18, 1),
(4, '2020-06-19 01:05:36', '2020-06-19 01:05:36', 1, 14, 1),
(5, '2020-06-19 01:06:53', '2020-06-19 01:06:53', 1, 16, 1),
(6, '2020-06-19 01:33:42', '2020-06-19 01:33:42', 1, NULL, 1),
(7, '2020-06-19 01:36:03', '2020-06-19 01:36:03', 1, NULL, 1),
(8, '2020-06-19 01:37:59', '2020-06-19 01:37:59', 1, NULL, 3),
(9, '2020-06-19 01:43:25', '2020-06-19 01:43:25', 1, NULL, 1),
(10, '2020-06-19 02:19:23', '2020-06-19 02:19:23', 1, NULL, 4),
(11, '2020-06-19 02:21:53', '2020-06-19 02:21:53', 1, NULL, 4),
(12, '2020-06-19 02:24:07', '2020-06-19 02:24:07', 1, NULL, 1),
(13, '2020-06-19 02:25:48', '2020-06-19 02:25:48', 1, NULL, 1),
(14, '2020-06-24 19:39:32', '2020-06-24 19:39:33', 1, 23, 3),
(15, '2020-06-24 19:42:47', '2020-06-24 19:42:48', 1, 23, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cie`
--

CREATE TABLE `cie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cie`
--

INSERT INTO `cie` (`id`, `descripcion`, `codigo`, `created_at`, `updated_at`) VALUES
(1, 'Cólera', 'a00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CodigosTriage`
--

CREATE TABLE `CodigosTriage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_espera` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `CodigosTriage`
--

INSERT INTO `CodigosTriage` (`id`, `created_at`, `updated_at`, `color`, `tiempo_espera`) VALUES
(1, NULL, NULL, 'verde', '120 min'),
(2, NULL, NULL, 'amarillo', '30 min'),
(3, NULL, NULL, 'rojo', '10 min');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Detalles_Sintomas_Protocolos`
--

CREATE TABLE `Detalles_Sintomas_Protocolos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_protocolo` bigint(20) UNSIGNED NOT NULL,
  `id_sintoma` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Detalles_Sintomas_Protocolos`
--

INSERT INTO `Detalles_Sintomas_Protocolos` (`id`, `created_at`, `updated_at`, `id_protocolo`, `id_sintoma`) VALUES
(1, NULL, NULL, 14, 2),
(2, NULL, NULL, 23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_atencion`
--

CREATE TABLE `detalle_atencion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_atencion` bigint(20) UNSIGNED NOT NULL,
  `id_det_profesional_sala` bigint(20) UNSIGNED DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_especialidad` bigint(20) UNSIGNED NOT NULL,
  `atendido` tinyint(1) NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sala` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_codigo_triage` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_atencion`
--

INSERT INTO `detalle_atencion` (`id`, `created_at`, `updated_at`, `id_atencion`, `id_det_profesional_sala`, `fecha`, `hora`, `id_especialidad`, `atendido`, `estado`, `sala`, `id_codigo_triage`) VALUES
(1, '2020-06-24 16:42:49', '2020-06-24 16:50:41', 15, NULL, '2020-06-24', '16:50', 2, 0, 'Internado', 'Box de varones', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_especialidad_area`
--

CREATE TABLE `det_especialidad_area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_especialidad` bigint(20) UNSIGNED NOT NULL,
  `id_area` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `det_especialidad_area`
--

INSERT INTO `det_especialidad_area` (`id`, `created_at`, `updated_at`, `id_especialidad`, `id_area`) VALUES
(1, NULL, NULL, 2, 5),
(2, NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_profesionales`
--

CREATE TABLE `det_profesionales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesional` bigint(20) UNSIGNED NOT NULL,
  `id_especialidad` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `det_profesionales`
--

INSERT INTO `det_profesionales` (`id`, `created_at`, `updated_at`, `id_profesional`, `id_especialidad`) VALUES
(1, NULL, NULL, 1, 3),
(2, NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_profesionales_salas`
--

CREATE TABLE `det_profesionales_salas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesional` bigint(20) UNSIGNED NOT NULL,
  `id_sala` bigint(20) UNSIGNED NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_protocolos`
--

CREATE TABLE `det_protocolos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_especialidad` bigint(20) UNSIGNED NOT NULL,
  `id_protocolo` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `det_protocolos`
--

INSERT INTO `det_protocolos` (`id`, `created_at`, `updated_at`, `id_especialidad`, `id_protocolo`) VALUES
(1, NULL, NULL, 3, 14),
(2, NULL, NULL, 2, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especialidades`
--

CREATE TABLE `Especialidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Especialidades`
--

INSERT INTO `Especialidades` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES
(1, NULL, NULL, 'Cirugía General', 'Es la especialidad médica que abarca las operaciones del aparato digestivo ...'),
(2, NULL, NULL, 'Clínica Médica', 'Atiende integralmente los problemas de salud en pacientes adultos...'),
(3, NULL, NULL, 'Oftalmología', 'Es la especialidad médica que estudia las enfermedades de ojo y su tratamiento ...'),
(4, NULL, NULL, 'Traumatología', 'Revisión de traumas corporales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cie` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_detalle_atencion` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `created_at`, `updated_at`, `id_cie`, `descripcion`, `fecha`, `hora`, `id_detalle_atencion`) VALUES
(1, '2020-06-24 16:48:36', '2020-06-24 16:48:36', 1, 'cualquiera', '2020-06-24', '16:48:00', 1);

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
(1, '2020_05_08_181340_create_cie_table', 1),
(2, '2020_05_13_220822_create_profesionales_table', 1),
(3, '2020_05_13_223404_create_salas_table', 1),
(4, '2020_05_13_232935_create_det_profesionales_salas_table', 1),
(5, '2020_05_14_034510_create_detalle_atencion_table', 1),
(6, '2020_05_19_221359_create_sintomas_table', 1),
(7, '2020_05_19_221526_create_detalles_sintomas_protocolos_table', 1),
(8, '2020_05_21_211227_create_preguntas_table', 1),
(13, '2020_06_20_224138_create_det_profesionales', 2),
(14, '2020_06_20_224337_create_table_profesionales_horarios', 2),
(15, '2020_06_20_224746_create_historial_table', 2),
(16, '2020_06_20_225234_create_table_det_protocolos', 2),
(17, '2020_06_21_173808_add_votes_to_salas_table', 3),
(25, '2020_06_21_213945_create_failed_jobs_table', 4),
(26, '2020_06_21_213945_create_password_resets_table', 4),
(27, '2020_06_21_213945_create_users_table', 4),
(28, '2020_06_21_213945_create_roles_table', 5),
(29, '2020_06_21_213946_create_failed_jobs_table', 6),
(30, '2020_06_21_213946_create_password_resets_table', 6),
(31, '2020_06_21_213946_create_roles_table', 6),
(32, '2020_06_21_213946_create_users_table', 6),
(36, '2020_06_24_024309_add_vote_id_profesional_to_table', 7),
(37, '2020_06_21_021412_add_votes_to_detalle_atencion_table', 8),
(38, '2020_06_21_032838_add_votes_atendido_to_detalle_atencion_table', 8),
(39, '2020_06_21_044200_create_detalle_especialidad_area', 8),
(40, '2020_06_21_232605_add_estado_to_detalle_atencion_table', 8),
(41, '2020_06_22_032013_add_detalle_to_historial_table', 8),
(42, '2020_06_22_032614_drop_ids_to_historial_table', 8),
(43, '2020_06_22_203135_add_sala_to_detalle_atencion_table', 8),
(44, '2020_06_22_004740_add_color_to_detalle_atencion_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pacientes`
--

CREATE TABLE `Pacientes` (
  `Paciente_id` bigint(20) UNSIGNED NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domicilio` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Pacientes`
--

INSERT INTO `Pacientes` (`Paciente_id`, `dni`, `nombre`, `apellido`, `telefono`, `fechaNac`, `sexo`, `created_at`, `updated_at`, `domicilio`) VALUES
(1, 37190827, 'Alejandro', 'Gonzales', '156158339', '20/11/1992', 'Masculino', '2020-06-08 19:08:45', '2020-06-08 19:08:45', NULL),
(3, 45678900, 'Cristian', 'Zalazar', '5678', '01/01/1995', 'Masculino', '2020-06-18 21:58:57', '2020-06-18 21:58:57', NULL),
(4, 39590140, 'Juan', 'Perez', '12341234', '1996/11/03', 'Masculino', '2020-06-19 02:18:17', '2020-06-19 02:18:17', NULL),
(5, 10982783, 'Juan', 'Cardoso', '158329091', '21/09/1990', 'Masculino', '2020-06-21 00:28:17', '2020-06-21 00:28:17', 'calle Mas Falsa');

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
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_atencion` bigint(20) UNSIGNED NOT NULL,
  `id_sintoma` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `created_at`, `updated_at`, `id_atencion`, `id_sintoma`) VALUES
(1, '2020-06-24 19:39:32', '2020-06-24 19:39:32', 14, 1),
(2, '2020-06-24 19:42:47', '2020-06-24 19:42:47', 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricula` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `created_at`, `updated_at`, `matricula`, `nombre`, `apellido`, `domicilio`, `disponibilidad`, `id_user`) VALUES
(1, '2020-06-24 00:34:57', '2020-06-24 00:34:57', '1111', 'Alejandro Oscar', 'Gonzales', 'Acevedo 368- Villa soledad', 1, 1),
(2, '2020-06-24 17:24:34', '2020-06-24 17:24:34', '1112', 'Juan', 'Guanca', 'calle Mas Falsa', 1, 10),
(3, '2020-06-24 18:34:18', '2020-06-24 18:34:18', '4321', 'Cristian', 'Zalazar', 'calle Mas Falsa', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales_horarios`
--

CREATE TABLE `profesionales_horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_profesional` bigint(20) UNSIGNED NOT NULL,
  `hr_ini` time NOT NULL,
  `hr_fin` time NOT NULL,
  `dia` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Protocolos`
--

CREATE TABLE `Protocolos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_codigo_triage` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Protocolos`
--

INSERT INTO `Protocolos` (`id`, `created_at`, `updated_at`, `id_codigo_triage`, `descripcion`) VALUES
(14, '2020-06-18 21:50:48', '2020-06-18 21:50:48', 3, 'Covid-19'),
(15, '2020-06-18 22:07:24', '2020-06-18 22:07:24', 1, 'Primer Protocolo'),
(16, '2020-06-18 22:08:03', '2020-06-18 22:08:03', 1, 'Segundo Protocolo'),
(17, '2020-06-18 22:09:05', '2020-06-18 22:09:05', 1, 'Tercer Protocolo'),
(18, '2020-06-18 22:11:15', '2020-06-18 22:11:15', 2, 'Cuarto Protocolo'),
(19, '2020-06-18 22:11:39', '2020-06-18 22:11:39', 1, 'Quinto Protocolo'),
(21, '2020-06-18 22:13:11', '2020-06-18 22:13:11', 3, 'Sexto Protocolo'),
(22, '2020-06-19 00:30:56', '2020-06-19 00:30:56', 1, 'Septimo Protocolo'),
(23, '2020-06-19 00:47:44', '2020-06-19 00:47:44', 1, 'Octavo Protocolo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`) VALUES
(1, '2020-06-21 23:18:04', '2020-06-21 23:18:04', 'Administrador'),
(2, '2020-06-21 23:18:04', '2020-06-21 23:18:04', 'Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `camas` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `created_at`, `updated_at`, `id_area`, `disponibilidad`, `camas`, `nombre`) VALUES
(1, '2020-06-21 14:41:14', '2020-06-21 18:48:16', 5, 1, 0, 'Consultorio 1'),
(2, '2020-06-24 19:50:14', '2020-06-24 19:50:14', 6, 1, 20, 'Box de varones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sintomas`
--

CREATE TABLE `Sintomas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Sintomas`
--

INSERT INTO `Sintomas` (`id`, `created_at`, `updated_at`, `descripcion`) VALUES
(1, '2020-06-24 19:38:02', '2020-06-24 19:38:02', 'Dolor muscular'),
(2, '2020-06-24 19:38:02', '2020-06-24 19:38:02', 'Dolor de cabeza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `id_rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alejandro', 'aledvs', 'ale368_dvs@hotmail.com', NULL, '$2y$10$fy8annBMRPZpu2BVETBtLu0szwZzKyzWFV.LlHNcp5pQ4FqubQLZe', 1, NULL, '2020-06-23 20:17:33', '2020-06-23 20:17:33'),
(2, 'Cristian', 'superior96', 'borrar@gmail.com', NULL, '$2y$10$az8clo9TNFNBn3dUSAOobeUV36UqegyXG4HdGPWGpdKYhb4T212um', 2, NULL, '2020-06-22 03:40:14', '2020-06-22 03:40:14'),
(10, 'Juan', 'juancho', 'borrar3@gmail.com', NULL, '$2y$10$v3.7WGSIBLEJqySwzUDD2OWf/Vu9iaXSCyVjtNpOFcX0/Y3q44Hx6', 2, NULL, '2020-06-23 19:47:12', '2020-06-23 19:47:12'),
(11, 'prueba', 'prueba', 'prueba@gmail.com', NULL, '$2y$10$zewhxwDU/2j5DX9ScgJCIelfMv0kXsveGXEuIygztOr06cfhHqliy', 1, NULL, '2020-06-23 20:05:36', '2020-06-23 20:05:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`usuario_id`, `usuario`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'borrar', 'borrar@gmail.com', NULL, '12345678', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Areas`
--
ALTER TABLE `Areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Atencion`
--
ALTER TABLE `Atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atencion_usuario_id_foreign` (`usuario_id`),
  ADD KEY `atencion_id_procotocolo_foreign` (`id_protocolo`),
  ADD KEY `atencion_paciente_id_foreign` (`Paciente_id`);

--
-- Indices de la tabla `cie`
--
ALTER TABLE `cie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cie_codigo_unique` (`codigo`);

--
-- Indices de la tabla `CodigosTriage`
--
ALTER TABLE `CodigosTriage`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Detalles_Sintomas_Protocolos`
--
ALTER TABLE `Detalles_Sintomas_Protocolos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_sintomas_protocolos_id_protocolo_foreign` (`id_protocolo`),
  ADD KEY `detalles_sintomas_protocolos_id_sintoma_foreign` (`id_sintoma`);

--
-- Indices de la tabla `detalle_atencion`
--
ALTER TABLE `detalle_atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_atencion_id_atencion_foreign` (`id_atencion`),
  ADD KEY `detalle_atencion_id_det_profesional_sala_foreign` (`id_det_profesional_sala`),
  ADD KEY `detalle_atencion_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `detalle_atencion_id_codigo_triage_foreign` (`id_codigo_triage`);

--
-- Indices de la tabla `det_especialidad_area`
--
ALTER TABLE `det_especialidad_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `det_especialidad_area_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `det_especialidad_area_id_area_foreign` (`id_area`);

--
-- Indices de la tabla `det_profesionales`
--
ALTER TABLE `det_profesionales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `det_profesionales_id_profesional_foreign` (`id_profesional`),
  ADD KEY `det_profesionales_id_especialidad_foreign` (`id_especialidad`);

--
-- Indices de la tabla `det_profesionales_salas`
--
ALTER TABLE `det_profesionales_salas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `det_profesionales_salas_id_profesional_foreign` (`id_profesional`),
  ADD KEY `det_profesionales_salas_id_sala_foreign` (`id_sala`);

--
-- Indices de la tabla `det_protocolos`
--
ALTER TABLE `det_protocolos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `det_protocolos_id_especialidad_foreign` (`id_especialidad`),
  ADD KEY `det_protocolos_id_protocolo_foreign` (`id_protocolo`);

--
-- Indices de la tabla `Especialidades`
--
ALTER TABLE `Especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_id_cie_foreign` (`id_cie`),
  ADD KEY `historial_id_detalle_atencion_foreign` (`id_detalle_atencion`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pacientes`
--
ALTER TABLE `Pacientes`
  ADD PRIMARY KEY (`Paciente_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_id_atencion_foreign` (`id_atencion`),
  ADD KEY `preguntas_id_sintoma_foreign` (`id_sintoma`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesionales_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `profesionales_horarios`
--
ALTER TABLE `profesionales_horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesionales_horarios_id_profesional_foreign` (`id_profesional`);

--
-- Indices de la tabla `Protocolos`
--
ALTER TABLE `Protocolos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `protocolos_id_codigo_triage_foreign` (`id_codigo_triage`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salas_id_area_foreign` (`id_area`);

--
-- Indices de la tabla `Sintomas`
--
ALTER TABLE `Sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_rol_foreign` (`id_rol`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuarios_usuario_unique` (`usuario`),
  ADD UNIQUE KEY `usuarios_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Areas`
--
ALTER TABLE `Areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Atencion`
--
ALTER TABLE `Atencion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cie`
--
ALTER TABLE `cie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `CodigosTriage`
--
ALTER TABLE `CodigosTriage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Detalles_Sintomas_Protocolos`
--
ALTER TABLE `Detalles_Sintomas_Protocolos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_atencion`
--
ALTER TABLE `detalle_atencion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `det_especialidad_area`
--
ALTER TABLE `det_especialidad_area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `det_profesionales`
--
ALTER TABLE `det_profesionales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `det_profesionales_salas`
--
ALTER TABLE `det_profesionales_salas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `det_protocolos`
--
ALTER TABLE `det_protocolos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Especialidades`
--
ALTER TABLE `Especialidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `Pacientes`
--
ALTER TABLE `Pacientes`
  MODIFY `Paciente_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profesionales_horarios`
--
ALTER TABLE `profesionales_horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Protocolos`
--
ALTER TABLE `Protocolos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Sintomas`
--
ALTER TABLE `Sintomas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `usuario_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Atencion`
--
ALTER TABLE `Atencion`
  ADD CONSTRAINT `atencion_id_procotocolo_foreign` FOREIGN KEY (`id_protocolo`) REFERENCES `Protocolos` (`id`),
  ADD CONSTRAINT `atencion_paciente_id_foreign` FOREIGN KEY (`Paciente_id`) REFERENCES `Pacientes` (`Paciente_id`),
  ADD CONSTRAINT `atencion_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `Usuarios` (`usuario_id`);

--
-- Filtros para la tabla `Detalles_Sintomas_Protocolos`
--
ALTER TABLE `Detalles_Sintomas_Protocolos`
  ADD CONSTRAINT `detalles_sintomas_protocolos_id_protocolo_foreign` FOREIGN KEY (`id_protocolo`) REFERENCES `Protocolos` (`id`),
  ADD CONSTRAINT `detalles_sintomas_protocolos_id_sintoma_foreign` FOREIGN KEY (`id_sintoma`) REFERENCES `Sintomas` (`id`);

--
-- Filtros para la tabla `detalle_atencion`
--
ALTER TABLE `detalle_atencion`
  ADD CONSTRAINT `detalle_atencion_id_atencion_foreign` FOREIGN KEY (`id_atencion`) REFERENCES `Atencion` (`id`),
  ADD CONSTRAINT `detalle_atencion_id_codigo_triage_foreign` FOREIGN KEY (`id_codigo_triage`) REFERENCES `CodigosTriage` (`id`),
  ADD CONSTRAINT `detalle_atencion_id_det_profesional_sala_foreign` FOREIGN KEY (`id_det_profesional_sala`) REFERENCES `det_profesionales_salas` (`id`),
  ADD CONSTRAINT `detalle_atencion_id_especialidad_foreign` FOREIGN KEY (`id_especialidad`) REFERENCES `Especialidades` (`id`);

--
-- Filtros para la tabla `det_especialidad_area`
--
ALTER TABLE `det_especialidad_area`
  ADD CONSTRAINT `det_especialidad_area_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `Areas` (`id`),
  ADD CONSTRAINT `det_especialidad_area_id_especialidad_foreign` FOREIGN KEY (`id_especialidad`) REFERENCES `Especialidades` (`id`);

--
-- Filtros para la tabla `det_profesionales`
--
ALTER TABLE `det_profesionales`
  ADD CONSTRAINT `det_profesionales_id_especialidad_foreign` FOREIGN KEY (`id_especialidad`) REFERENCES `Especialidades` (`id`),
  ADD CONSTRAINT `det_profesionales_id_profesional_foreign` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id`);

--
-- Filtros para la tabla `det_profesionales_salas`
--
ALTER TABLE `det_profesionales_salas`
  ADD CONSTRAINT `det_profesionales_salas_id_profesional_foreign` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id`),
  ADD CONSTRAINT `det_profesionales_salas_id_sala_foreign` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id`);

--
-- Filtros para la tabla `det_protocolos`
--
ALTER TABLE `det_protocolos`
  ADD CONSTRAINT `det_protocolos_id_especialidad_foreign` FOREIGN KEY (`id_especialidad`) REFERENCES `Especialidades` (`id`),
  ADD CONSTRAINT `det_protocolos_id_protocolo_foreign` FOREIGN KEY (`id_protocolo`) REFERENCES `Protocolos` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_id_cie_foreign` FOREIGN KEY (`id_cie`) REFERENCES `cie` (`id`),
  ADD CONSTRAINT `historial_id_detalle_atencion_foreign` FOREIGN KEY (`id_detalle_atencion`) REFERENCES `detalle_atencion` (`id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_id_atencion_foreign` FOREIGN KEY (`id_atencion`) REFERENCES `Atencion` (`id`),
  ADD CONSTRAINT `preguntas_id_sintoma_foreign` FOREIGN KEY (`id_sintoma`) REFERENCES `Sintomas` (`id`);

--
-- Filtros para la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD CONSTRAINT `profesionales_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `profesionales_horarios`
--
ALTER TABLE `profesionales_horarios`
  ADD CONSTRAINT `profesionales_horarios_id_profesional_foreign` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id`);

--
-- Filtros para la tabla `Protocolos`
--
ALTER TABLE `Protocolos`
  ADD CONSTRAINT `protocolos_id_codigo_triage_foreign` FOREIGN KEY (`id_codigo_triage`) REFERENCES `CodigosTriage` (`id`);

--
-- Filtros para la tabla `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `salas_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `Areas` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
