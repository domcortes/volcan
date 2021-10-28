-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2021 a las 12:42:32
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fvolcanesv2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_eap`
--

CREATE TABLE `control_eap` (
  `ID_EAP` bigint(20) NOT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_eau`
--

CREATE TABLE `control_eau` (
  `ID_EAU` bigint(20) NOT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIO` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `control_eau`
--

INSERT INTO `control_eau` (`ID_EAU`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIO`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 1, '2021-07-30', '2021-07-30', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estandar_ecomercial`
--

CREATE TABLE `estandar_ecomercial` (
  `ID_ECOMERCIAL` bigint(20) NOT NULL,
  `CODIGO_ECOMERCIAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_ECOMERCIAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESCRIPCION_ECOMERCIAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PESO_NETO_ECOMERCIAL` decimal(20,5) DEFAULT NULL,
  `PESO_BRUTO_ECOMERCIAL` decimal(20,5) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estandar_ecomercial`
--

INSERT INTO `estandar_ecomercial` (`ID_ECOMERCIAL`, `CODIGO_ECOMERCIAL`, `NOMBRE_ECOMERCIAL`, `DESCRIPCION_ECOMERCIAL`, `PESO_NETO_ECOMERCIAL`, `PESO_BRUTO_ECOMERCIAL`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '1', 'prueba Estandar Comercial', '', '1.02000', '1.02000', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estandar_eexportacion`
--

CREATE TABLE `estandar_eexportacion` (
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `CODIGO_ESTANDAR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_ESTANDAR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CANTIDAD_ENVASE_ESTANDAR` int(11) DEFAULT NULL,
  `PESO_NETO_ESTANDAR` decimal(20,5) DEFAULT NULL,
  `PDESHIDRATACION_ESTANDAR` decimal(10,2) DEFAULT NULL,
  `PESO_BRUTO_ESTANDAR` decimal(20,5) DEFAULT NULL,
  `PESO_ENVASE_ESTANDAR` decimal(20,5) DEFAULT NULL,
  `PESO_PALLET_ESTANDAR` decimal(10,2) DEFAULT NULL,
  `TFRUTA_ESTANDAR` int(11) DEFAULT NULL,
  `EMBOLSADO` int(11) DEFAULT NULL,
  `STOCK` int(11) DEFAULT 0,
  `TCATEGORIA` int(11) DEFAULT 0,
  `TCOLOR` int(11) DEFAULT 0,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_ESPECIES` bigint(20) NOT NULL,
  `ID_TETIQUETA` bigint(20) NOT NULL,
  `ID_TEMBALAJE` bigint(20) NOT NULL,
  `ID_ECOMERCIAL` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estandar_eexportacion`
--

INSERT INTO `estandar_eexportacion` (`ID_ESTANDAR`, `CODIGO_ESTANDAR`, `NOMBRE_ESTANDAR`, `CANTIDAD_ENVASE_ESTANDAR`, `PESO_NETO_ESTANDAR`, `PDESHIDRATACION_ESTANDAR`, `PESO_BRUTO_ESTANDAR`, `PESO_ENVASE_ESTANDAR`, `PESO_PALLET_ESTANDAR`, `TFRUTA_ESTANDAR`, `EMBOLSADO`, `STOCK`, `TCATEGORIA`, `TCOLOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_ESPECIES`, `ID_TETIQUETA`, `ID_TEMBALAJE`, `ID_ECOMERCIAL`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '6100', 'Blueberries 4 x 4 oz  240', 240, '1.50000', '5.00', '2.50000', '1.00000', '19.00', 2, 0, 1, 0, 0, 1, NULL, NULL, 25, 1, 1, 1, 1, 1, 1),
(2, '5100', 'Blueberries 4x4 oz 312', 312, '2.00000', '2.00', '2.04000', '0.04000', '15.00', 2, 0, 0, 0, 0, 1, NULL, NULL, 25, 2, 1, 1, 1, 1, 1),
(3, '7100', 'cerezas 4x4 oz 312', 312, '10.00000', '0.00', '12.00000', '2.00000', '19.00', 2, 1, 0, 1, 1, 1, NULL, NULL, 73, 1, 1, 1, 1, 1, 1),
(4, '8100', 'cerezas 4 x 4 oz 240', 240, '10.00000', '0.00', '11.00000', '1.00000', '19.00', 2, 1, 0, 0, 1, 1, NULL, NULL, 73, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estandar_eindustrial`
--

CREATE TABLE `estandar_eindustrial` (
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `CODIGO_ESTANDAR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_ESTANDAR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PESO_NETO_ESTANDAR` decimal(20,5) DEFAULT NULL,
  `TFRUTA_ESTANDAR` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_ESPECIES` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estandar_eindustrial`
--

INSERT INTO `estandar_eindustrial` (`ID_ESTANDAR`, `CODIGO_ESTANDAR`, `NOMBRE_ESTANDAR`, `PESO_NETO_ESTANDAR`, `TFRUTA_ESTANDAR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_ESPECIES`, `ID_PRODUCTO`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '11', 'prueba estandar industrial', '1.00000', 3, 1, '2021-09-14', '2021-09-14', 1, 25, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estandar_erecepcion`
--

CREATE TABLE `estandar_erecepcion` (
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `CODIGO_ESTANDAR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_ESTANDAR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CANTIDAD_ENVASE_ESTANDAR` int(11) DEFAULT NULL,
  `PESO_ENVASE_ESTANDAR` decimal(20,5) DEFAULT NULL,
  `PESO_PALLET_ESTANDAR` decimal(10,2) DEFAULT NULL,
  `TFRUTA_ESTANDAR` int(11) DEFAULT NULL,
  `TRATAMIENTO1` int(11) DEFAULT 0,
  `TRATAMIENTO2` int(11) DEFAULT 0,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_ESPECIES` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estandar_erecepcion`
--

INSERT INTO `estandar_erecepcion` (`ID_ESTANDAR`, `CODIGO_ESTANDAR`, `NOMBRE_ESTANDAR`, `CANTIDAD_ENVASE_ESTANDAR`, `PESO_ENVASE_ESTANDAR`, `PESO_PALLET_ESTANDAR`, `TFRUTA_ESTANDAR`, `TRATAMIENTO1`, `TRATAMIENTO2`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_ESPECIES`, `ID_PRODUCTO`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '1001', '5 Envases de 1.8 Kilos', 5, '1.80000', '15.00', 1, 0, 0, 1, NULL, NULL, 1, 25, 1, 1, 1),
(2, '1002', 'Rejilla Cosechera Verde', 204, '0.50000', '15.00', 1, 0, 0, 0, NULL, NULL, 1, 25, NULL, 1, 1),
(3, '1003', 'Rejilla Cosehera Blanca', 240, '2.50000', '15.00', 1, 0, 0, 1, NULL, NULL, 1, 25, 2, 1, 1),
(4, '1002', 'Rejilla Cosechera Verde', 204, '1.80000', '19.00', 1, 0, 0, 1, NULL, NULL, 1, 25, 2, 1, 1),
(5, '1004', 'Rejilla Cosechera', 240, '1.50000', '19.00', 1, 1, 1, 1, NULL, NULL, 1, 73, 2, 1, 1),
(6, '1005', 'Rejilla Cosechera 2', 240, '1.90000', '19.00', 1, 1, 0, 1, NULL, NULL, 1, 73, 1, 1, 1),
(7, '10056', 'Rejilla Cosechera 3', 240, '1.50000', '19.00', 1, 0, 1, 1, NULL, NULL, 1, 73, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_aaduana`
--

CREATE TABLE `fruta_aaduana` (
  `ID_AADUANA` bigint(20) NOT NULL,
  `RUT_AADUANA` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_AADUANA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_AADUANA` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_aaduana`
--

INSERT INTO `fruta_aaduana` (`ID_AADUANA`, `RUT_AADUANA`, `DV_AADUANA`, `NUMERO_AADUANA`, `NOMBRE_AADUANA`, `RAZON_SOCIAL_AADUANA`, `GIRO_AADUANA`, `DIRECCION_AADUANA`, `CONTACTO_AADUANA`, `EMAIL_AADUANA`, `TELEFONO_AADUANA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, '1', '1', '1', 'Agente aduana 1', 'pp', 'pp', 'pp', '', '', 0, 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_acarga`
--

CREATE TABLE `fruta_acarga` (
  `ID_ACARGA` bigint(20) NOT NULL,
  `NUMERO_ACARGA` int(11) DEFAULT NULL,
  `NOMBRE_ACARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_acarga`
--

INSERT INTO `fruta_acarga` (`ID_ACARGA`, `NUMERO_ACARGA`, `NOMBRE_ACARGA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, 1, 'Aeropuerto carga', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_adestino`
--

CREATE TABLE `fruta_adestino` (
  `ID_ADESTINO` bigint(20) NOT NULL,
  `NUMERO_ADESTINO` int(11) DEFAULT NULL,
  `NOMBRE_ADESTINO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_adestino`
--

INSERT INTO `fruta_adestino` (`ID_ADESTINO`, `NUMERO_ADESTINO`, `NOMBRE_ADESTINO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'Aeropuerto destino', 1, '2021-09-06', '2021-09-06', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_agcarga`
--

CREATE TABLE `fruta_agcarga` (
  `ID_AGCARGA` bigint(20) NOT NULL,
  `NUMERO_AGCARGA` int(11) DEFAULT NULL,
  `RUT_AGCARGA` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_AGCARGA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_AGCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_AGCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_AGCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CODIGO_SAG_AGCARGA` int(11) DEFAULT NULL,
  `DIRECCION_AGCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO_AGCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_AGCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_AGCARGA` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_agcarga`
--

INSERT INTO `fruta_agcarga` (`ID_AGCARGA`, `NUMERO_AGCARGA`, `RUT_AGCARGA`, `DV_AGCARGA`, `NOMBRE_AGCARGA`, `RAZON_SOCIAL_AGCARGA`, `GIRO_AGCARGA`, `CODIGO_SAG_AGCARGA`, `DIRECCION_AGCARGA`, `CONTACTO_AGCARGA`, `EMAIL_AGCARGA`, `TELEFONO_AGCARGA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '1', '1', 'agente carga 1', 'Prueba', 'Prueba', 1, '1', '', '', 0, 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_atmosfera`
--

CREATE TABLE `fruta_atmosfera` (
  `ID_ATMOSFERA` bigint(20) NOT NULL,
  `NUMERO_ATMOSFERA` bigint(20) DEFAULT NULL,
  `NOMBRE_ATMOSFERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_atmosfera`
--

INSERT INTO `fruta_atmosfera` (`ID_ATMOSFERA`, `NUMERO_ATMOSFERA`, `NOMBRE_ATMOSFERA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'Prueba atmosfera', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_broker`
--

CREATE TABLE `fruta_broker` (
  `ID_BROKER` bigint(20) NOT NULL,
  `NUMERO_BROKER` int(11) DEFAULT NULL,
  `NOMBRE_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EORI_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO1_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO1_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL1_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO2_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO2_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL2_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO3_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO3_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL3_BROKER` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_broker`
--

INSERT INTO `fruta_broker` (`ID_BROKER`, `NUMERO_BROKER`, `NOMBRE_BROKER`, `EORI_BROKER`, `DIRECCION_BROKER`, `CONTACTO1_BROKER`, `CARGO1_BROKER`, `EMAIL1_BROKER`, `CONTACTO2_BROKER`, `CARGO2_BROKER`, `EMAIL2_BROKER`, `CONTACTO3_BROKER`, `CARGO3_BROKER`, `EMAIL3_BROKER`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, 1, 'Prueba broker 1', '1', 'Pp', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_ccalidad`
--

CREATE TABLE `fruta_ccalidad` (
  `ID_CCALIDAD` bigint(20) NOT NULL,
  `NUMERO_CCALIDAD` bigint(20) DEFAULT NULL,
  `NOMBRE_CCALIDAD` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RGB_CCALIDAD` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_ccalidad`
--

INSERT INTO `fruta_ccalidad` (`ID_CCALIDAD`, `NUMERO_CCALIDAD`, `NOMBRE_CCALIDAD`, `RGB_CCALIDAD`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, NULL, 'Prueba', '#ff0000', 0, NULL, NULL, 1, 1, 1),
(2, 1, 'Prueba', '#ff0000', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_comprador`
--

CREATE TABLE `fruta_comprador` (
  `ID_COMPRADOR` bigint(20) NOT NULL,
  `NUMERO_COMPRADOR` bigint(20) DEFAULT NULL,
  `RUT_COMPRADOR` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_COMPRADOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_COMPRADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_COMPRADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_COMPRADOR` int(11) DEFAULT NULL,
  `EMAIL_COMPRADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_comprador`
--

INSERT INTO `fruta_comprador` (`ID_COMPRADOR`, `NUMERO_COMPRADOR`, `RUT_COMPRADOR`, `DV_COMPRADOR`, `NOMBRE_COMPRADOR`, `DIRECCION_COMPRADOR`, `TELEFONO_COMPRADOR`, `EMAIL_COMPRADOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, 1, '1', '1', 'Prueba comprador', '', 0, '', 1, NULL, NULL, 1, NULL, 1, 1),
(3, 2, '1', '1', 'comprador 2', '', 0, '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_consignatario`
--

CREATE TABLE `fruta_consignatario` (
  `ID_CONSIGNATARIO` bigint(20) NOT NULL,
  `NUMERO_CONSIGNATARIO` int(11) DEFAULT NULL,
  `NOMBRE_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO1_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO1_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL1_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO2_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO2_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL2_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO3_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO3_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL3_CONSIGNATARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_consignatario`
--

INSERT INTO `fruta_consignatario` (`ID_CONSIGNATARIO`, `NUMERO_CONSIGNATARIO`, `NOMBRE_CONSIGNATARIO`, `DIRECCION_CONSIGNATARIO`, `CONTACTO1_CONSIGNATARIO`, `CARGO1_CONSIGNATARIO`, `EMAIL1_CONSIGNATARIO`, `CONTACTO2_CONSIGNATARIO`, `CARGO2_CONSIGNATARIO`, `EMAIL2_CONSIGNATARIO`, `CONTACTO3_CONSIGNATARIO`, `CARGO3_CONSIGNATARIO`, `EMAIL3_CONSIGNATARIO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, 1, 'Prueba', 'consignarario 1', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 1, NULL, 1, 1),
(3, 2, '1', 'consignarario 1', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_contraparte`
--

CREATE TABLE `fruta_contraparte` (
  `ID_CONTRAPARTE` bigint(20) NOT NULL,
  `NUMERO_CONTRAPARTE` int(11) DEFAULT NULL,
  `NOMBRE_CONTRAPARTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_CONTRAPARTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_CONTRAPARTE` int(11) DEFAULT NULL,
  `EMAIL_CONTRAPARTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_contraparte`
--

INSERT INTO `fruta_contraparte` (`ID_CONTRAPARTE`, `NUMERO_CONTRAPARTE`, `NOMBRE_CONTRAPARTE`, `DIRECCION_CONTRAPARTE`, `TELEFONO_CONTRAPARTE`, `EMAIL_CONTRAPARTE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'contraparte 1', 'pp', 0, '', 0, NULL, NULL, 1, NULL, 1, 1),
(2, 2, 'contraparte 2', 'pp', 0, '', 1, NULL, NULL, 1, NULL, 1, 1),
(3, 3, 'contraparte 3', '1', 0, '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_cuartel`
--

CREATE TABLE `fruta_cuartel` (
  `ID_CUARTEL` bigint(20) NOT NULL,
  `NUMERO_CUARTEL` int(11) DEFAULT NULL,
  `NOMBRE_CUARTEL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIEMPO_PRODUCCION_ANO_CUARTEL` int(11) DEFAULT NULL,
  `ANO_PLANTACION_CUARTEL` int(11) DEFAULT NULL,
  `HECTAREAS_CUARTEL` int(11) DEFAULT NULL,
  `PLANTAS_EN_HECTAREAS` int(11) DEFAULT NULL,
  `DISTANCIA_PLANTA_CUARTEL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_cuartel`
--

INSERT INTO `fruta_cuartel` (`ID_CUARTEL`, `NUMERO_CUARTEL`, `NOMBRE_CUARTEL`, `TIEMPO_PRODUCCION_ANO_CUARTEL`, `ANO_PLANTACION_CUARTEL`, `HECTAREAS_CUARTEL`, `PLANTAS_EN_HECTAREAS`, `DISTANCIA_PLANTA_CUARTEL`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_VESPECIES`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'Prueba cuartel', 2010, 2010, 100, 100, '10', 1, NULL, NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_cventa`
--

CREATE TABLE `fruta_cventa` (
  `ID_CVENTA` bigint(20) NOT NULL,
  `NUMERO_CVENTA` int(11) DEFAULT NULL,
  `NOMBRE_CVENTA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTA_CVENTA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_cventa`
--

INSERT INTO `fruta_cventa` (`ID_CVENTA`, `NUMERO_CVENTA`, `NOMBRE_CVENTA`, `NOTA_CVENTA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'c venta prueba 1', '', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_despachoex`
--

CREATE TABLE `fruta_despachoex` (
  `ID_DESPACHOEX` bigint(20) NOT NULL,
  `NUMERO_DESPACHOEX` int(11) DEFAULT NULL,
  `FECHA_DESPACHOEX` date DEFAULT NULL,
  `SNICARGA` int(11) DEFAULT NULL,
  `NUMERO_SELLO_DESPACHOEX` int(11) DEFAULT NULL,
  `FECHA_GUIA_DESPACHOEX` date DEFAULT NULL,
  `NUMERO_GUIA_DESPACHOEX` int(11) DEFAULT NULL,
  `NUMERO_CONTENEDOR_DESPACHOEX` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_PLANILLA_DESPACHOEX` int(11) DEFAULT NULL,
  `TERMOGRAFO_DESPACHOEX` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VGM` int(11) DEFAULT NULL,
  `TEMBARQUE_DESPACHOEX` int(11) DEFAULT NULL,
  `BOOKING_DESPACHOEX` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHAETD_DESPACHOEX` date DEFAULT NULL,
  `FECHAETA_DESPACHOEX` date DEFAULT NULL,
  `CRT_DESPACHOEX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHASTACKING_DESPACHOEX` date DEFAULT NULL,
  `NVIAJE_DESPACHOEX` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NAVE_DESPACHOEX` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CANTIDAD_ENVASE_DESPACHOEX` int(11) DEFAULT NULL,
  `KILOS_NETO_DESPACHOEX` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DESPACHOEX` decimal(11,2) DEFAULT NULL,
  `OBSERVACION_DESPACHOEX` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_ICARGA` bigint(20) DEFAULT NULL,
  `ID_EXPPORTADORA` bigint(20) DEFAULT NULL,
  `ID_RFINAL` bigint(20) DEFAULT NULL,
  `ID_AGCARGA` bigint(20) DEFAULT NULL,
  `ID_DFINAL` bigint(20) DEFAULT NULL,
  `ID_INPECTOR` bigint(20) DEFAULT NULL,
  `ID_MERCADO` bigint(20) DEFAULT NULL,
  `ID_PAIS` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE2` bigint(20) DEFAULT NULL,
  `ID_LCARGA` bigint(20) DEFAULT NULL,
  `ID_LDESTINO` bigint(20) DEFAULT NULL,
  `ID_LAREA` bigint(20) DEFAULT NULL,
  `ID_AERONAVE` bigint(20) DEFAULT NULL,
  `ID_ACARGA` bigint(20) DEFAULT NULL,
  `ID_ADESTINO` bigint(20) DEFAULT NULL,
  `ID_NAVIERA` bigint(20) DEFAULT NULL,
  `ID_PCARGA` bigint(20) DEFAULT NULL,
  `ID_PDESTINO` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_CONTRAPARTE` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_despachoex`
--

INSERT INTO `fruta_despachoex` (`ID_DESPACHOEX`, `NUMERO_DESPACHOEX`, `FECHA_DESPACHOEX`, `SNICARGA`, `NUMERO_SELLO_DESPACHOEX`, `FECHA_GUIA_DESPACHOEX`, `NUMERO_GUIA_DESPACHOEX`, `NUMERO_CONTENEDOR_DESPACHOEX`, `NUMERO_PLANILLA_DESPACHOEX`, `TERMOGRAFO_DESPACHOEX`, `VGM`, `TEMBARQUE_DESPACHOEX`, `BOOKING_DESPACHOEX`, `FECHAETD_DESPACHOEX`, `FECHAETA_DESPACHOEX`, `CRT_DESPACHOEX`, `FECHASTACKING_DESPACHOEX`, `NVIAJE_DESPACHOEX`, `NAVE_DESPACHOEX`, `PATENTE_CAMION`, `PATENTE_CARRO`, `CANTIDAD_ENVASE_DESPACHOEX`, `KILOS_NETO_DESPACHOEX`, `KILOS_BRUTO_DESPACHOEX`, `OBSERVACION_DESPACHOEX`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_ICARGA`, `ID_EXPPORTADORA`, `ID_RFINAL`, `ID_AGCARGA`, `ID_DFINAL`, `ID_INPECTOR`, `ID_MERCADO`, `ID_PAIS`, `ID_TRANSPORTE2`, `ID_LCARGA`, `ID_LDESTINO`, `ID_LAREA`, `ID_AERONAVE`, `ID_ACARGA`, `ID_ADESTINO`, `ID_NAVIERA`, `ID_PCARGA`, `ID_PDESTINO`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_CONTRAPARTE`, `ID_PLANTA`, `ID_EMPRESA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-10-06', 1, 11, '2021-10-06', 11, '111', 2021, '1111', NULL, 1, '1', '2021-09-15', '2021-09-15', '111', NULL, NULL, NULL, '111', '', 480, '720.00', '1274.00', '', 0, 1, '2021-10-06 22:24:35', '2021-10-06 22:26:32', 5, 1, 2, 1, 1, 2, 1, 22, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_despachoind`
--

CREATE TABLE `fruta_despachoind` (
  `ID_DESPACHO` bigint(20) NOT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `NUMERO_GUIA_DESPACHO` int(11) DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TDESPACHO` int(11) DEFAULT NULL,
  `OBSERVACION_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KILOS_NETO_DESPACHO` decimal(11,2) DEFAULT NULL,
  `TOTAL_PRECIO` decimal(11,2) DEFAULT NULL,
  `REGALO_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_DESPACHO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_COMPRADOR` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_despachoind`
--

INSERT INTO `fruta_despachoind` (`ID_DESPACHO`, `NUMERO_DESPACHO`, `FECHA_DESPACHO`, `NUMERO_GUIA_DESPACHO`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TDESPACHO`, `OBSERVACION_DESPACHO`, `KILOS_NETO_DESPACHO`, `TOTAL_PRECIO`, `REGALO_DESPACHO`, `ESTADO`, `ESTADO_DESPACHO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PRODUCTOR`, `ID_COMPRADOR`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-29', 11, '11', '', 3, '', '10.00', '150.00', NULL, 0, 2, 1, '2021-09-29 06:27:30', '2021-10-08 12:31:48', NULL, NULL, NULL, 2, 1, 1, 1, 1, 2, 1, 1),
(2, 2, '2021-10-27', 11, '111', '', 4, '', '11.25', '0.00', '1', 0, 2, 1, '2021-10-27 08:58:35', '2021-10-27 08:58:58', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(3, 3, '2021-10-27', 111, 'xxx', '', 1, '', '25.77', '0.00', NULL, 0, 2, 1, '2021-10-27 10:13:40', '2021-10-27 10:17:02', 2, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(4, 4, '2021-10-27', 111, 'xx', '', 2, '', '200.00', '0.00', NULL, 0, 2, 1, '2021-10-27 10:15:03', '2021-10-27 10:17:14', NULL, NULL, 1, NULL, 1, 1, 1, 1, 2, 1, 1),
(5, 5, '2021-10-27', 0, '11', '11', 3, '', '600.00', '60000.00', NULL, 0, 2, 1, '2021-10-27 10:15:21', '2021-10-27 10:17:35', NULL, NULL, NULL, 2, 2, 1, 1, 1, 2, 1, 1),
(6, 6, '2021-10-27', NULL, '111', '', 4, '', '600.00', '0.00', 'ssa', 0, 2, 1, '2021-10-27 10:15:57', '2021-10-27 10:17:50', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(7, 7, '2021-10-27', 111, '11', '', 5, '', '600.00', '0.00', NULL, 0, 2, 1, '2021-10-27 10:16:12', '2021-10-27 10:18:02', NULL, 3, NULL, NULL, 2, 2, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_despachomp`
--

CREATE TABLE `fruta_despachomp` (
  `ID_DESPACHO` bigint(20) NOT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `NUMERO_GUIA_DESPACHO` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_DESPACHO` int(11) DEFAULT NULL,
  `KILOS_NETO_DESPACHO` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DESPACHO` decimal(11,2) DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REGALO_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TDESPACHO` int(11) DEFAULT NULL,
  `OBSERVACION_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_DESPACHO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_COMPRADOR` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_despachomp`
--

INSERT INTO `fruta_despachomp` (`ID_DESPACHO`, `NUMERO_DESPACHO`, `FECHA_DESPACHO`, `NUMERO_GUIA_DESPACHO`, `CANTIDAD_ENVASE_DESPACHO`, `KILOS_NETO_DESPACHO`, `KILOS_BRUTO_DESPACHO`, `PATENTE_CAMION`, `PATENTE_CARRO`, `REGALO_DESPACHO`, `TDESPACHO`, `OBSERVACION_DESPACHO`, `ESTADO`, `ESTADO_DESPACHO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PRODUCTOR`, `ID_COMPRADOR`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-29', 11, 200, '930.00', '1320.00', '11', '', NULL, 2, '', 0, 2, 1, '2021-09-29 12:08:55', '2021-10-25 16:41:09', NULL, NULL, 1, NULL, 1, 1, 1, 1, 2, 1, 1),
(2, 2, '2021-10-13', 111, 15, '69.75', '126.75', '111', '', NULL, 5, '', 0, 2, 1, '2021-10-13 09:20:55', '2021-10-25 16:41:28', NULL, 3, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(3, 3, '2021-10-23', 1515, 240, '213.00', '660.00', '1515', '', NULL, 5, '', 0, 2, 1, '2021-10-23 17:35:16', '2021-10-25 16:42:05', NULL, 3, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(4, 4, '2021-10-23', 1515, 200, '345.00', '720.00', '1515', '', NULL, 1, '', 0, 4, 1, '2021-10-23 17:35:29', '2021-10-25 16:42:11', 2, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(5, 5, '2021-10-23', 1515, 240, '209.00', '660.00', '1515', '', NULL, 1, '', 0, 4, 1, '2021-10-23 17:35:45', '2021-10-25 16:42:48', 2, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(7, 6, '2021-10-25', 1515, 240, '213.00', '660.00', '1515', '', NULL, 3, '', 0, 2, 1, '2021-10-25 16:15:47', '2021-10-25 16:42:29', NULL, NULL, NULL, 2, 1, 1, 1, 1, 2, 1, 1),
(8, 7, '2021-10-25', 1515, 200, '345.00', '720.00', '1515', '', NULL, 2, '', 0, 2, 1, '2021-10-25 17:16:15', '2021-10-25 17:16:31', NULL, NULL, 1, NULL, 1, 1, 1, 1, 2, 1, 1),
(9, 8, '2021-10-25', 1515, 240, '213.00', '660.00', '255', '', NULL, 6, '', 0, 2, 1, '2021-10-25 17:22:35', '2021-10-25 17:23:36', NULL, NULL, 1, NULL, 1, 1, 1, 1, 2, 1, 1),
(10, 9, '2021-10-25', 123, 400, '810.00', '1560.00', '11', '', NULL, 1, '', 0, 4, 1, '2021-10-25 19:56:34', '2021-10-25 19:56:49', 2, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(11, 10, '2021-10-25', 111, 200, '205.00', '720.00', '111', '', NULL, 1, '', 0, 4, 1, '2021-10-25 20:08:11', '2021-10-25 20:18:09', 2, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(12, 11, '2021-10-25', 1111, 200, '405.00', '780.00', '111', '', NULL, 3, '', 0, 2, 1, '2021-10-25 22:12:23', '2021-10-25 22:22:15', NULL, NULL, NULL, 2, 1, 1, 1, 1, 2, 1, 1),
(13, 12, '2021-10-27', 151, 95, '441.75', '642.75', 'xxx', '', '---', 4, '', 0, 2, 1, '2021-10-27 08:55:58', '2021-10-27 08:56:10', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(14, 13, '2021-10-27', NULL, 90, '418.50', '595.50', '111', '', '11', 4, '', 0, 2, 1, '2021-10-27 10:01:54', '2021-10-27 10:02:16', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(15, 14, '2021-10-27', 122, 100, '465.00', '660.00', '111', '', NULL, 1, '', 0, 4, 1, '2021-10-27 10:02:32', '2021-10-27 10:02:41', 2, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(16, 15, '2021-10-27', 111, 5, '23.25', '47.25', '11', '', NULL, 3, '', 0, 2, 1, '2021-10-27 10:02:59', '2021-10-27 10:03:08', NULL, NULL, NULL, 2, 2, 1, 1, 1, 2, 1, 1),
(17, 16, '2021-10-27', 111, 20, '93.00', '144.00', '11', '', NULL, 2, '', 0, 2, 1, '2021-10-27 10:03:33', '2021-10-27 10:03:44', NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, 1, 1),
(18, 17, '2021-10-27', 111, 5, '23.25', '47.25', 'xxx', '', NULL, 5, '', 0, 2, 1, '2021-10-27 10:03:59', '2021-10-27 10:04:10', NULL, 3, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(19, 18, '2021-10-27', 111, 5, '23.25', '47.25', '11', '', NULL, 6, '', 0, 2, 1, '2021-10-27 10:04:26', '2021-10-27 10:04:36', NULL, NULL, 1, NULL, 1, 1, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_despachopt`
--

CREATE TABLE `fruta_despachopt` (
  `ID_DESPACHO` bigint(20) NOT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `TDESPACHO` int(11) DEFAULT NULL,
  `NUMERO_GUIA_DESPACHO` int(11) DEFAULT NULL,
  `NUMERO_SELLO_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REGALO_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VGM` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_DESPACHO` int(11) DEFAULT NULL,
  `KILOS_NETO_DESPACHO` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DESPACHO` decimal(11,2) DEFAULT NULL,
  `TOTAL_PRECIO` decimal(11,2) DEFAULT NULL,
  `OBSERVACION_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_DESPACHO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_COMPRADOR` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_despachopt`
--

INSERT INTO `fruta_despachopt` (`ID_DESPACHO`, `NUMERO_DESPACHO`, `FECHA_DESPACHO`, `TDESPACHO`, `NUMERO_GUIA_DESPACHO`, `NUMERO_SELLO_DESPACHO`, `PATENTE_CAMION`, `PATENTE_CARRO`, `REGALO_DESPACHO`, `VGM`, `CANTIDAD_ENVASE_DESPACHO`, `KILOS_NETO_DESPACHO`, `KILOS_BRUTO_DESPACHO`, `TOTAL_PRECIO`, `OBSERVACION_DESPACHO`, `ESTADO`, `ESTADO_DESPACHO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PRODUCTOR`, `ID_COMPRADOR`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-29', 3, 1515, '155', 'hgg', '', NULL, 0, 240, '360.00', '637.00', '24000.00', '', 0, 2, 1, '2021-09-29 12:57:52', '2021-10-27 10:29:02', NULL, 2, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(2, 2, '2021-10-27', 4, 1515, '111', '1', '', '1sd', 0, 240, '360.00', '637.00', NULL, '', 0, 2, 1, '2021-10-27 09:04:21', '2021-10-27 09:04:55', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(3, 3, '2021-10-27', 1, 11, '11', '11', '', NULL, 0, 240, '360.00', '637.00', NULL, '', 0, 2, 1, '2021-10-27 10:29:15', '2021-10-27 11:03:35', NULL, NULL, 2, NULL, 1, 1, 1, 1, 2, 1, 1),
(4, 4, '2021-10-27', 2, 111, '11', '11', '', NULL, 0, 312, '624.00', '663.96', NULL, '', 0, 2, 1, '2021-10-27 10:29:28', '2021-10-27 11:03:49', 1, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(5, 5, '2021-10-27', 4, NULL, NULL, 'xx', '', '11', 0, 240, '360.00', '637.00', NULL, '', 0, 2, 1, '2021-10-27 10:30:01', '2021-10-27 11:04:02', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(6, 6, '2021-10-27', 4, NULL, NULL, '11', '', '1', 0, 390, '585.00', '1023.25', NULL, '', 0, 2, 1, '2021-10-27 10:32:58', '2021-10-27 11:05:02', NULL, NULL, NULL, NULL, 2, 1, 1, 1, 2, 1, 1),
(7, 7, '2021-10-27', 5, 11, '', '111', '', NULL, 0, 390, '585.00', '1023.25', NULL, '', 0, 2, 1, '2021-10-27 10:56:32', '2021-10-27 11:05:14', NULL, NULL, NULL, 3, 1, 1, 1, 1, 2, 1, 1),
(8, 8, '2021-10-27', 4, NULL, NULL, 'x', '', 'sdds', 0, 390, '585.00', '1023.25', NULL, '', 0, 2, 1, '2021-10-27 10:57:27', '2021-10-27 11:05:31', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, 1, 1),
(9, 9, '2021-10-27', 3, 1515, '', '1515', '', NULL, 0, 390, '585.00', '1023.25', '3900.00', '', 0, 2, 1, '2021-10-27 11:05:49', '2021-10-27 11:06:09', NULL, 2, NULL, NULL, 1, 1, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_dfinal`
--

CREATE TABLE `fruta_dfinal` (
  `ID_DFINAL` bigint(20) NOT NULL,
  `NUMERO_DFINAL` int(11) DEFAULT NULL,
  `NOMBRE_DFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_dfinal`
--

INSERT INTO `fruta_dfinal` (`ID_DFINAL`, `NUMERO_DFINAL`, `NOMBRE_DFINAL`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'destino final 1', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_dicarga`
--

CREATE TABLE `fruta_dicarga` (
  `ID_DICARGA` bigint(20) NOT NULL,
  `CANTIDAD_ENVASE_DICARGA` int(11) DEFAULT NULL,
  `KILOS_NETO_DICARGA` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DICARGA` decimal(11,2) DEFAULT NULL,
  `PRECIO_US_DICARGA` decimal(11,2) DEFAULT NULL,
  `TOTAL_PRECIO_US_DICARGA` decimal(11,2) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_TCALIBRE` bigint(20) NOT NULL,
  `ID_ICARGA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_dicarga`
--

INSERT INTO `fruta_dicarga` (`ID_DICARGA`, `CANTIDAD_ENVASE_DICARGA`, `KILOS_NETO_DICARGA`, `KILOS_BRUTO_DICARGA`, `PRECIO_US_DICARGA`, `TOTAL_PRECIO_US_DICARGA`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_ESTANDAR`, `ID_TCALIBRE`, `ID_ICARGA`) VALUES
(1, 1320, '1980.00', '3418.00', '15.00', '19800.00', 0, 1, '2021-09-06 23:10:41', '2021-09-06 23:10:41', 1, 1, 4),
(2, 1320, '1980.00', '3418.00', '15.00', '19800.00', 0, 1, '2021-09-06 23:12:36', '2021-09-06 23:12:36', 1, 1, 4),
(3, 1320, '1980.00', '3418.00', '5.00', '6600.00', 0, 1, '2021-09-06 23:42:56', '2021-09-06 23:42:56', 1, 1, 3),
(4, 1320, '1980.00', '3418.00', '2.00', '2640.00', 0, 1, '2021-09-06 23:53:04', '2021-09-06 23:53:04', 1, 1, 2),
(5, 44, '66.00', '132.30', '15.65', '688.60', 0, 1, '2021-10-14 11:32:09', '2021-10-14 11:32:09', 1, 1, 5),
(6, 44, '66.00', '132.30', '15.65', '688.60', 0, 1, '2021-10-14 11:32:20', '2021-10-14 11:32:20', 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_dpexportacion`
--

CREATE TABLE `fruta_dpexportacion` (
  `ID_DPEXPORTACION` bigint(20) NOT NULL,
  `FOLIO_DPEXPORTACION` int(11) DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_DPEXPORTACION` date DEFAULT NULL,
  `CANTIDAD_ENVASE_DPEXPORTACION` int(11) DEFAULT NULL,
  `KILOS_NETO_DPEXPORTACION` decimal(11,2) DEFAULT NULL,
  `PDESHIDRATACION_DPEXPORTACION` decimal(11,2) DEFAULT NULL,
  `KILOS_DESHIDRATACION_DPEXPORTACION` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DPEXPORTACION` decimal(11,2) DEFAULT NULL,
  `EMBOLSADO` int(11) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TEMBALAJE` bigint(20) NOT NULL,
  `ID_TCALIBRE` bigint(20) NOT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_PROCESO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_dpexportacion`
--

INSERT INTO `fruta_dpexportacion` (`ID_DPEXPORTACION`, `FOLIO_DPEXPORTACION`, `FOLIO_MANUAL`, `FECHA_EMBALADO_DPEXPORTACION`, `CANTIDAD_ENVASE_DPEXPORTACION`, `KILOS_NETO_DPEXPORTACION`, `PDESHIDRATACION_DPEXPORTACION`, `KILOS_DESHIDRATACION_DPEXPORTACION`, `KILOS_BRUTO_DPEXPORTACION`, `EMBOLSADO`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TEMBALAJE`, `ID_TCALIBRE`, `ID_TMANEJO`, `ID_ESTANDAR`, `ID_FOLIO`, `ID_VESPECIES`, `ID_PRODUCTOR`, `ID_PROCESO`) VALUES
(1, 11220001, 0, '2021-09-28', 250, '500.00', '2.00', '510.00', '535.00', 0, 1, 0, '2021-09-28 16:36:40', '2021-09-29 22:48:42', 1, 1, 1, 2, 7, 1, 1, 1),
(2, 11220002, 0, '2021-09-28', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 0, '2021-09-29 10:24:45', '2021-09-29 12:04:57', 1, 1, 1, 1, 7, 1, 1, 1),
(3, 11220001, 0, '2021-09-29', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-09-29 22:49:03', '2021-09-29 22:49:03', 1, 1, 1, 1, 7, 1, 1, 1),
(4, 11220006, 0, '2021-09-29', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-04 11:24:12', '2021-10-04 11:24:12', 1, 2, 1, 1, 7, 1, 1, 1),
(5, 11220009, 0, '2021-09-29', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-05 08:59:26', '2021-10-05 08:59:26', 1, 1, 1, 1, 7, 1, 1, 1),
(6, 11220016, 0, '2021-10-12', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-12 11:30:42', '2021-10-12 11:30:42', 1, 1, 1, 1, 7, 1, 1, 2),
(7, 11220017, 0, '2021-10-12', 312, '624.00', '2.00', '636.48', '663.96', 0, 1, 1, '2021-10-12 11:30:54', '2021-10-12 11:30:54', 1, 1, 1, 2, 7, 1, 1, 2),
(8, 11220018, 0, '2021-10-12', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-12 11:31:05', '2021-10-12 11:31:05', 1, 1, 1, 1, 7, 1, 1, 2),
(9, 11220019, 0, '2021-10-18', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 0, '2021-10-18 08:51:15', '2021-10-20 13:45:53', 1, 1, 1, 1, 7, 1, 1, 3),
(10, 11220020, 0, '2021-10-18', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 0, '2021-10-18 08:59:18', '2021-10-20 13:45:49', 1, 1, 1, 1, 7, 1, 1, 3),
(11, 11220022, 0, '2021-10-20', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-20 13:46:59', '2021-10-20 18:09:01', 1, 1, 1, 1, 7, 1, 1, 3),
(12, 11220023, 0, '2021-10-20', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-20 18:09:17', '2021-10-20 18:09:17', 1, 1, 1, 1, 7, 1, 1, 3),
(13, 11220024, 0, '2021-10-20', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-20 18:10:31', '2021-10-20 18:10:31', 1, 1, 1, 1, 7, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_dpindustrial`
--

CREATE TABLE `fruta_dpindustrial` (
  `ID_DPINDUSTRIAL` bigint(20) NOT NULL,
  `FOLIO_DPINDUSTRIAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_DPINDUSTRIAL` date DEFAULT NULL,
  `KILOS_NETO_DPINDUSTRIAL` decimal(11,2) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_PROCESO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_dpindustrial`
--

INSERT INTO `fruta_dpindustrial` (`ID_DPINDUSTRIAL`, `FOLIO_DPINDUSTRIAL`, `FECHA_EMBALADO_DPINDUSTRIAL`, `KILOS_NETO_DPINDUSTRIAL`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TMANEJO`, `ID_FOLIO`, `ID_VESPECIES`, `ID_ESTANDAR`, `ID_PRODUCTOR`, `ID_PROCESO`) VALUES
(1, 11320005, '2021-09-28', '42.00', 1, 0, '2021-09-28 16:42:01', '2021-09-29 12:05:19', 1, 8, 1, 1, 1, 1),
(2, 11320005, '2021-10-04', '5.25', 1, 1, '2021-10-04 14:54:12', '2021-10-07 12:01:25', 1, 8, 1, 1, 1, 1),
(3, 11320007, '2021-10-12', '25.77', 1, 1, '2021-10-12 11:31:30', '2021-10-12 11:31:30', 1, 8, 1, 1, 1, 2),
(4, 11320008, '2021-10-18', '57.00', 1, 0, '2021-10-18 09:00:14', '2021-10-20 13:45:35', 1, 8, 1, 1, 1, 3),
(5, 11320008, '2021-10-20', '49.61', 1, 0, '2021-10-20 13:46:31', '2021-10-20 18:10:08', 1, 8, 1, 1, 1, 3),
(6, 11320008, '2021-10-20', '22.25', 1, 0, '2021-10-20 18:11:41', '2021-10-20 18:11:59', 1, 8, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_drecepcionind`
--

CREATE TABLE `fruta_drecepcionind` (
  `ID_DRECEPCION` bigint(20) NOT NULL,
  `FOLIO_DRECEPCION` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_DRECEPCION` date DEFAULT NULL,
  `KILOS_NETO_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_RECEPCION` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_drecepcionind`
--

INSERT INTO `fruta_drecepcionind` (`ID_DRECEPCION`, `FOLIO_DRECEPCION`, `FECHA_EMBALADO_DRECEPCION`, `KILOS_NETO_DRECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TMANEJO`, `ID_FOLIO`, `ID_ESTANDAR`, `ID_PRODUCTOR`, `ID_VESPECIES`, `ID_RECEPCION`) VALUES
(1, 11320001, '2021-09-28', '600.00', 1, 1, '2021-09-28 16:08:55', '2021-09-28 16:08:55', 1, 8, 1, 1, 1, 1),
(2, 11320002, '2021-09-28', '600.00', 1, 1, '2021-09-28 16:09:01', '2021-09-28 16:09:01', 1, 8, 1, 1, 1, 1),
(3, 11320003, '2021-09-28', '600.00', 1, 1, '2021-09-28 16:09:07', '2021-09-28 16:09:07', 1, 8, 1, 1, 1, 1),
(4, 11320004, '2021-09-28', '600.00', 1, 1, '2021-09-28 16:09:14', '2021-09-28 16:09:14', 1, 8, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_drecepcionmp`
--

CREATE TABLE `fruta_drecepcionmp` (
  `ID_DRECEPCION` bigint(20) NOT NULL,
  `FOLIO_DRECEPCION` int(11) DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_COSECHA_DRECEPCION` date DEFAULT NULL,
  `CANTIDAD_ENVASE_DRECEPCION` int(11) DEFAULT NULL,
  `KILOS_NETO_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `KILOS_PROMEDIO_DRECEPCION` decimal(11,5) DEFAULT NULL,
  `PESO_PALLET_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `GASIFICADO_DRECEPCION` int(11) DEFAULT NULL,
  `NOTA_DRECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_RECEPCION` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_TTRATAMIENTO1` bigint(20) DEFAULT NULL,
  `ID_TTRATAMIENTO2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_drecepcionmp`
--

INSERT INTO `fruta_drecepcionmp` (`ID_DRECEPCION`, `FOLIO_DRECEPCION`, `FOLIO_MANUAL`, `FECHA_COSECHA_DRECEPCION`, `CANTIDAD_ENVASE_DRECEPCION`, `KILOS_NETO_DRECEPCION`, `KILOS_BRUTO_DRECEPCION`, `KILOS_PROMEDIO_DRECEPCION`, `PESO_PALLET_DRECEPCION`, `GASIFICADO_DRECEPCION`, `NOTA_DRECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PRODUCTOR`, `ID_VESPECIES`, `ID_ESTANDAR`, `ID_RECEPCION`, `ID_FOLIO`, `ID_TMANEJO`, `ID_TTRATAMIENTO1`, `ID_TTRATAMIENTO2`) VALUES
(1, 11120001, 0, '2021-09-28', 100, '0.00', '660.00', '0.00000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:09', '2021-09-28 15:40:18', 1, 1, 1, 1, 6, 1, NULL, NULL),
(2, 11120002, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:22', '2021-09-28 15:40:22', 1, 1, 1, 1, 6, 1, NULL, NULL),
(3, 11120003, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:27', '2021-09-28 15:40:27', 1, 1, 1, 1, 6, 1, NULL, NULL),
(4, 11120004, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:32', '2021-09-28 15:40:32', 1, 1, 1, 1, 6, 1, NULL, NULL),
(5, 11120005, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:36', '2021-09-28 15:40:36', 1, 1, 1, 1, 6, 1, NULL, NULL),
(6, 11120006, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:41', '2021-09-28 15:40:41', 1, 1, 1, 1, 6, 1, NULL, NULL),
(7, 11120007, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:46', '2021-09-28 15:40:46', 1, 1, 1, 1, 6, 1, NULL, NULL),
(8, 11120008, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:51', '2021-09-28 15:40:51', 1, 1, 1, 1, 6, 1, NULL, NULL),
(9, 11120009, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:40:59', '2021-09-28 15:40:59', 1, 2, 1, 1, 6, 1, NULL, NULL),
(10, 11120010, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:41:11', '2021-09-28 15:41:11', 1, 2, 1, 1, 6, 1, NULL, NULL),
(11, 11120011, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:41:21', '2021-09-28 15:41:21', 1, 2, 1, 1, 6, 1, NULL, NULL),
(12, 11120012, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:41:56', '2021-09-28 15:41:56', 1, 2, 1, 1, 6, 1, NULL, NULL),
(13, 11120013, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 0, '', 1, 1, '2021-09-28 15:42:02', '2021-09-28 15:42:02', 1, 2, 1, 1, 6, 1, NULL, NULL),
(14, 11120014, 0, '2021-10-01', 41, '571.20', '660.00', '13.93171', '15.00', 0, '', 1, 0, '2021-10-01 09:57:28', '2021-10-05 15:01:33', 1, 1, 1, 2, 6, 1, NULL, NULL),
(15, 11120014, 0, '2021-10-06', 200, '405.00', '780.00', '2.02500', '15.00', 0, '', 1, 1, '2021-10-06 12:09:30', '2021-10-19 14:23:41', 1, 1, 1, 2, 6, 1, NULL, NULL),
(16, 11120015, 0, '2021-10-13', 200, '205.00', '720.00', '1.02500', '15.00', 0, '', 1, 1, '2021-10-13 12:45:52', '2021-10-13 12:45:52', 1, 1, 3, 3, 6, 1, NULL, NULL),
(17, 11120016, 0, '2021-10-06', 200, '405.00', '780.00', '2.02500', '15.00', 0, '', 1, 1, '2021-10-19 12:53:28', '2021-10-19 14:13:30', 1, 1, 4, 2, 6, 1, NULL, NULL),
(18, 11120017, 0, '2021-10-06', 200, '405.00', '780.00', '2.02500', '15.00', 0, '', 1, 1, '2021-10-19 12:55:01', '2021-10-19 14:13:23', 1, 1, 4, 2, 6, 1, NULL, NULL),
(19, 11120018, 0, '2021-10-19', 240, '213.00', '660.00', '0.88750', '15.00', 0, '', 1, 1, '2021-10-19 15:40:31', '2021-10-19 15:40:31', 1, 1, 1, 4, 6, 1, NULL, NULL),
(20, 11120019, 0, '2021-10-13', 200, '345.00', '720.00', '1.72500', '15.00', 0, '', 1, 1, '2021-10-20 13:19:00', '2021-10-20 13:19:00', 1, 1, 4, 3, 6, 1, NULL, NULL),
(21, 11120020, 0, '2021-10-13', 200, '345.00', '720.00', '1.72500', '15.00', 0, '', 1, 1, '2021-10-20 13:19:07', '2021-10-20 13:19:07', 1, 1, 1, 3, 6, 1, NULL, NULL),
(22, 11120021, 0, '2021-10-20', 240, '213.00', '660.00', '0.88750', '15.00', 0, '', 1, 0, '2021-10-20 13:30:09', '2021-10-21 11:43:36', 1, 2, 1, 5, 6, 1, NULL, NULL),
(23, 11120021, 0, '2021-10-21', 240, '213.00', '660.00', '0.88750', '15.00', 0, '', 1, 1, '2021-10-21 12:04:15', '2021-10-21 12:04:15', 1, 1, 1, 5, 6, 1, NULL, NULL),
(24, 11120022, 0, '2021-10-21', 240, '209.00', '660.00', '0.87083', '19.00', 0, '', 1, 1, '2021-10-21 12:10:07', '2021-10-21 12:10:07', 1, 1, 4, 6, 6, 1, NULL, NULL),
(25, 11120023, 0, '2021-10-21', 240, '213.00', '660.00', '0.88750', '15.00', 0, '', 1, 1, '2021-10-21 12:11:47', '2021-10-21 12:11:47', 1, 1, 1, 7, 6, 1, NULL, NULL),
(26, 11120024, 0, '2021-10-28', 240, '281.00', '660.00', '1.17083', '19.00', 0, '', 1, 1, '2021-10-28 00:49:56', '2021-10-28 00:58:53', 1, 3, 7, 8, 6, 1, NULL, 1),
(27, 11120025, 0, '2021-10-28', 240, '185.00', '660.00', '0.77083', '19.00', 0, '', 1, 1, '2021-10-28 00:59:09', '2021-10-28 00:59:09', 1, 3, 6, 8, 6, 1, 1, NULL),
(28, 11120026, 0, '2021-10-28', 240, '281.00', '660.00', '1.17083', '19.00', 0, '', 1, 1, '2021-10-28 00:59:19', '2021-10-28 00:59:19', 1, 3, 5, 8, 6, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_drecepcionpt`
--

CREATE TABLE `fruta_drecepcionpt` (
  `ID_DRECEPCION` bigint(20) NOT NULL,
  `FOLIO_DRECEPCION` int(11) DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_DRECEPCION` date DEFAULT NULL,
  `CANTIDAD_ENVASE_RECIBIDO_DRECEPCION` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_RECHAZADO_DRECEPCION` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_APROBADO_DRECEPCION` int(11) DEFAULT NULL,
  `KILOS_NETO_REAL_DRECEPCION` bigint(20) DEFAULT NULL,
  `KILOS_NETO_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `PDESHIDRATACION_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `KILOS_DESHIDRATACION_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `PESO_PALLET_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `GASIFICADO_DRECEPCION` int(11) DEFAULT NULL,
  `EMBOLSADO_DRECEPCION` int(11) DEFAULT NULL,
  `STOCK_DRECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TEMPERATURA_DRECEPCION` decimal(11,2) DEFAULT NULL,
  `PREFRIO_DRECEPCION` int(11) DEFAULT NULL,
  `NOTA_DRECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_RECEPCION` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_TEMBALAJE` bigint(20) NOT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_TCALIBRE` bigint(20) NOT NULL,
  `ID_TCATEGORIA` bigint(20) DEFAULT NULL,
  `ID_TCOLOR` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_drecepcionpt`
--

INSERT INTO `fruta_drecepcionpt` (`ID_DRECEPCION`, `FOLIO_DRECEPCION`, `FOLIO_MANUAL`, `FECHA_EMBALADO_DRECEPCION`, `CANTIDAD_ENVASE_RECIBIDO_DRECEPCION`, `CANTIDAD_ENVASE_RECHAZADO_DRECEPCION`, `CANTIDAD_ENVASE_APROBADO_DRECEPCION`, `KILOS_NETO_REAL_DRECEPCION`, `KILOS_NETO_DRECEPCION`, `KILOS_BRUTO_DRECEPCION`, `PDESHIDRATACION_DRECEPCION`, `KILOS_DESHIDRATACION_DRECEPCION`, `PESO_PALLET_DRECEPCION`, `GASIFICADO_DRECEPCION`, `EMBOLSADO_DRECEPCION`, `STOCK_DRECEPCION`, `TEMPERATURA_DRECEPCION`, `PREFRIO_DRECEPCION`, `NOTA_DRECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_RECEPCION`, `ID_PRODUCTOR`, `ID_VESPECIES`, `ID_ESTANDAR`, `ID_FOLIO`, `ID_TEMBALAJE`, `ID_TMANEJO`, `ID_TCALIBRE`, `ID_TCATEGORIA`, `ID_TCOLOR`) VALUES
(1, 11220002, 0, '2021-10-02', 240, 10, 230, 400, '345.00', '611.25', '5.00', '362.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 0, '2021-10-02 09:53:00', '2021-10-02 10:00:00', 1, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(2, 11220003, 0, '2021-10-02', 240, 0, 240, 360, '360.00', '637.00', '5.00', '378.00', NULL, 0, 0, '0', '0.00', 0, '', 1, 0, '2021-10-02 09:59:44', '2021-10-02 10:00:06', 1, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(3, 11220004, 0, '2021-10-02', 240, 0, 240, 360, '360.00', '637.00', '5.00', '378.00', NULL, 0, 0, '0', '0.00', 0, '', 1, 0, '2021-10-02 09:59:53', '2021-10-02 10:00:09', 1, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(4, 11220002, 0, '2021-10-02', 240, 10, 230, 400, '345.00', '611.25', '5.00', '362.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-02 10:00:37', '2021-10-02 10:00:37', 1, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(5, 11220003, 0, '2021-10-02', 240, 10, 230, 400, '345.00', '611.25', '5.00', '362.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-02 10:00:41', '2021-10-02 10:00:41', 1, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(6, 11220004, 0, '2021-10-02', 240, 10, 230, 400, '345.00', '611.25', '5.00', '362.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-02 10:00:44', '2021-10-02 10:00:44', 1, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(7, 11220005, 0, '2021-10-02', 240, 10, 230, 400, '345.00', '611.25', '5.00', '362.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-02 10:00:48', '2021-10-02 10:00:48', 1, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(8, 11220010, 0, '2021-10-06', 390, 0, 390, 600, '585.00', '1023.25', '5.00', '614.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-06 22:58:11', '2021-10-06 22:58:11', 2, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(9, 11220011, 0, '2021-10-06', 390, 0, 390, 600, '585.00', '1023.25', '5.00', '614.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-06 22:58:16', '2021-10-06 22:58:16', 2, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(10, 11220012, 0, '2021-10-06', 390, 0, 390, 600, '585.00', '1023.25', '5.00', '614.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-06 22:58:21', '2021-10-06 22:58:21', 2, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(11, 11220013, 0, '2021-10-06', 390, 0, 390, 600, '585.00', '1023.25', '5.00', '614.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-06 22:58:26', '2021-10-06 22:58:26', 2, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(12, 11220014, 0, '2021-10-06', 390, 0, 390, 600, '585.00', '1023.25', '5.00', '614.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-06 22:58:30', '2021-10-06 22:58:30', 2, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(13, 11220015, 0, '2021-10-06', 390, 0, 390, 600, '585.00', '1023.25', '5.00', '614.25', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-06 22:58:34', '2021-10-06 22:58:34', 2, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(14, 11220019, 0, '2021-10-21', 240, 0, 240, 0, '360.00', '637.00', '5.00', '378.00', NULL, 0, 0, '0', '0.00', 0, '', 1, 0, '2021-10-21 11:09:06', '2021-10-22 10:52:49', 3, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(15, 11220025, 0, '2021-10-22', 240, 0, 240, 3600, '360.00', '637.00', '5.00', '378.00', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-22 10:53:46', '2021-10-22 10:53:46', 3, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(16, 11220026, 0, '2021-10-22', 240, 0, 240, 3600, '360.00', '637.00', '5.00', '378.00', NULL, 0, 0, '0', '0.00', 0, '', 1, 1, '2021-10-22 12:29:21', '2021-10-22 12:29:21', 3, 1, 1, 1, 7, 1, 1, 1, NULL, NULL),
(19, 11220019, 0, '2021-10-22', 240, 0, 240, 3600, '2400.00', '2899.00', '0.00', '2400.00', NULL, 0, 1, NULL, '0.00', 0, '', 1, 1, '2021-10-28 07:37:02', '2021-10-28 07:38:55', 3, 1, 3, 3, 7, 1, 1, 1, 1, 1),
(20, 11220020, 0, '2021-10-22', 240, 0, 240, 3600, '2400.00', '2659.00', '0.00', '2400.00', NULL, 0, 1, NULL, '0.00', 0, '', 1, 0, '2021-10-28 07:39:12', '2021-10-28 07:41:36', 3, 1, 3, 4, 7, 1, 1, 1, NULL, 1),
(21, 11220022, 0, '2021-10-22', 240, 0, 240, 3600, '2400.00', '2899.00', '0.00', '2400.00', NULL, 0, 1, NULL, '0.00', 0, '', 1, 0, '2021-10-28 07:39:56', '2021-10-28 07:40:33', 3, 1, 3, 3, 7, 1, 1, 1, 1, 1),
(22, 11220022, 0, '2021-10-22', 240, 0, 240, 3600, '2400.00', '2899.00', '0.00', '2400.00', NULL, 0, 1, NULL, '0.00', 0, '', 1, 0, '2021-10-28 07:39:59', '2021-10-28 07:40:28', 3, 1, 3, 3, 7, 1, 1, 1, 1, 1),
(23, 11220022, 0, '2021-10-22', 240, 0, 240, 3600, '2400.00', '2899.00', '0.00', '2400.00', NULL, 0, 1, NULL, '0.00', 0, '', 1, 0, '2021-10-28 07:40:14', '2021-10-28 07:40:22', 3, 1, 3, 3, 7, 1, 1, 1, 1, 1),
(24, 11220022, 0, '2021-10-22', 240, 0, 240, 3600, '2400.00', '2899.00', '0.00', '2400.00', NULL, 0, 1, NULL, '0.00', 0, '', 1, 0, '2021-10-28 07:40:46', '2021-10-28 07:41:31', 3, 1, 3, 3, 7, 1, 1, 1, 1, 1),
(25, 11220028, 0, '2021-10-22', 240, 0, 240, 3600, '2400.00', '2899.00', '0.00', '2400.00', NULL, 0, 1, NULL, '0.00', 0, '', 1, 1, '2021-10-28 07:41:42', '2021-10-28 07:41:42', 3, 1, 3, 3, 7, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_drepaletizajeex`
--

CREATE TABLE `fruta_drepaletizajeex` (
  `ID_DREPALETIZAJE` bigint(20) NOT NULL,
  `FOLIO_NUEVO_DREPALETIZAJE` bigint(20) DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_DREPALETIZAJE` date DEFAULT NULL,
  `CANTIDAD_ENVASE_DREPALETIZAJE` int(11) DEFAULT NULL,
  `KILOS_NETO_DREPALETIZAJE` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DREPALETIZAJE` int(11) DEFAULT NULL,
  `EMBOLSADO` int(11) DEFAULT NULL,
  `STOCK` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TMANEJO` bigint(20) DEFAULT NULL,
  `ID_TCALIBRE` bigint(20) DEFAULT NULL,
  `ID_TEMBALAJE` bigint(20) DEFAULT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_REPALETIZAJE` bigint(20) NOT NULL,
  `ID_EXIEXPORTACION` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_drepaletizajeex`
--

INSERT INTO `fruta_drepaletizajeex` (`ID_DREPALETIZAJE`, `FOLIO_NUEVO_DREPALETIZAJE`, `FOLIO_MANUAL`, `FECHA_EMBALADO_DREPALETIZAJE`, `CANTIDAD_ENVASE_DREPALETIZAJE`, `KILOS_NETO_DREPALETIZAJE`, `KILOS_BRUTO_DREPALETIZAJE`, `EMBOLSADO`, `STOCK`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TMANEJO`, `ID_TCALIBRE`, `ID_TEMBALAJE`, `ID_FOLIO`, `ID_ESTANDAR`, `ID_PRODUCTOR`, `ID_VESPECIES`, `ID_REPALETIZAJE`, `ID_EXIEXPORTACION`) VALUES
(1, 11220022, 0, '2021-10-18', 200, '300.00', 534, 0, NULL, 1, 0, '2021-10-18 11:20:55', '2021-10-18 11:20:55', 1, 1, 1, 7, 1, 1, 1, 1, 29),
(2, 11220022, 0, '2021-10-18', 200, '300.00', 534, 0, NULL, 1, 0, '2021-10-18 11:20:55', '2021-10-18 11:20:55', 1, 1, 1, 7, 1, 1, 1, 1, 30),
(3, 11220020, 0, '2021-10-18', 40, '60.00', 122, 0, NULL, 1, 0, '2021-10-18 11:21:03', '2021-10-18 11:21:03', 1, 1, 1, 7, 1, 1, 1, 1, 30),
(4, 11220019, 0, '2021-10-18', 40, '60.00', 122, 0, NULL, 1, 0, '2021-10-18 11:21:03', '2021-10-18 11:21:03', 1, 1, 1, 7, 1, 1, 1, 1, 29),
(5, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:24:51', '2021-10-20 15:24:51', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(6, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:26:52', '2021-10-20 15:26:52', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(7, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:28:12', '2021-10-20 15:28:12', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(8, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:31:33', '2021-10-20 15:31:33', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(9, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:32:47', '2021-10-20 15:32:47', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(10, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:35:16', '2021-10-20 15:35:16', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(11, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:37:40', '2021-10-20 15:37:40', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(12, 11220022, 0, '2021-10-20', 6, '9.00', 34, 0, NULL, 1, 0, '2021-10-20 15:42:29', '2021-10-20 15:42:29', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(13, 11220019, 0, '2021-10-20', 100, '150.00', 277, 0, NULL, 1, 0, '2021-10-27 16:36:10', '2021-10-27 16:36:10', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(14, 11220020, 0, '2021-10-20', 140, '210.00', 380, 0, NULL, 1, 0, '2021-10-27 16:37:03', '2021-10-27 16:37:03', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(15, 11220022, 0, '2021-10-20', 140, '210.00', 380, 0, NULL, 1, 0, '2021-10-27 16:38:22', '2021-10-27 16:38:22', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(16, 11220019, 0, '2021-10-20', 100, '150.00', 277, 0, NULL, 1, 0, '2021-10-27 16:40:13', '2021-10-27 16:40:13', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(17, 11220020, 0, '2021-10-20', 140, '210.00', 380, 0, NULL, 1, 0, '2021-10-27 16:43:39', '2021-10-27 16:43:39', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(18, 11220027, 0, '2021-10-20', 200, '300.00', 534, 0, NULL, 1, 1, '2021-10-27 16:53:41', '2021-10-27 16:53:41', 1, 1, 1, 7, 1, 1, 1, 1, 36),
(19, 11220022, 0, '2021-10-20', 40, '60.00', 122, 0, NULL, 1, 1, '2021-10-27 16:53:48', '2021-10-27 16:53:48', 1, 1, 1, 7, 1, 1, 1, 1, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_drepaletizajemp`
--

CREATE TABLE `fruta_drepaletizajemp` (
  `ID_DREPALETIZAJE` bigint(20) NOT NULL,
  `FOLIO_NUEVO_DREPALETIZAJE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_COSECHA_DREPALETIZAJE` date DEFAULT NULL,
  `CANTIDAD_ENVASE_DREPALETIZAJE` int(11) DEFAULT NULL,
  `KILOS_NETO_DREPALETIZAJE` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DREPALETIZAJE` int(11) DEFAULT NULL,
  `KILOS_PROMEDIO_DREPALETIZAJE` decimal(11,3) DEFAULT NULL,
  `PESO_PALLET_DREPALETIZAJE` decimal(11,2) DEFAULT NULL,
  `FECHA_INGRESO` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `ALIAS_FOLIO_DREPALETIZAJE` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GASIFICADO` int(11) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_TMANEJO` bigint(20) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_REPALETIZAJE` bigint(20) NOT NULL,
  `ID_EXIMATERIAPRIMA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_drexportacion`
--

CREATE TABLE `fruta_drexportacion` (
  `ID_DREXPORTACION` bigint(20) NOT NULL,
  `FOLIO_DREXPORTACION` int(11) DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_DREXPORTACION` date DEFAULT NULL,
  `CANTIDAD_ENVASE_DREXPORTACION` int(11) DEFAULT NULL,
  `KILOS_NETO_DREXPORTACION` decimal(11,2) DEFAULT NULL,
  `PDESHIDRATACION_DREXPORTACION` decimal(11,2) DEFAULT NULL,
  `KILOS_DESHIDRATACION_DREXPORTACION` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_DREXPORTACION` decimal(11,2) DEFAULT NULL,
  `EMBOLSADO` int(11) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_TCALIBRE` bigint(20) NOT NULL,
  `ID_TEMBALAJE` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_REEMBALAJE` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_drexportacion`
--

INSERT INTO `fruta_drexportacion` (`ID_DREXPORTACION`, `FOLIO_DREXPORTACION`, `FOLIO_MANUAL`, `FECHA_EMBALADO_DREXPORTACION`, `CANTIDAD_ENVASE_DREXPORTACION`, `KILOS_NETO_DREXPORTACION`, `PDESHIDRATACION_DREXPORTACION`, `KILOS_DESHIDRATACION_DREXPORTACION`, `KILOS_BRUTO_DREXPORTACION`, `EMBOLSADO`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TMANEJO`, `ID_TCALIBRE`, `ID_TEMBALAJE`, `ID_FOLIO`, `ID_ESTANDAR`, `ID_VESPECIES`, `ID_PRODUCTOR`, `ID_REEMBALAJE`) VALUES
(1, 11220007, 0, '2021-10-04', 312, '624.00', '2.00', '636.48', '663.96', 0, 1, 1, '2021-10-04 15:14:33', '2021-10-04 15:14:33', 1, 1, 1, 7, 2, 1, 1, 1),
(2, 11220008, 0, '2021-10-04', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 0, '2021-10-04 16:07:27', '2021-10-04 16:10:50', 1, 1, 1, 7, 1, 1, 1, 1),
(3, 11220008, 0, '2021-10-04', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-04 16:19:28', '2021-10-04 16:19:28', 1, 1, 1, 7, 1, 1, 1, 1),
(4, 11220021, 0, '2021-10-18', 240, '360.00', '5.00', '378.00', '637.00', 0, 1, 1, '2021-10-18 09:19:16', '2021-10-18 09:19:16', 1, 1, 1, 7, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_drindustrial`
--

CREATE TABLE `fruta_drindustrial` (
  `ID_DRINDUSTRIAL` bigint(20) NOT NULL,
  `FOLIO_DRINDUSTRIAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_DRINDUSTRIAL` date DEFAULT NULL,
  `KILOS_NETO_DRINDUSTRIAL` decimal(11,2) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_REEMBALAJE` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_drindustrial`
--

INSERT INTO `fruta_drindustrial` (`ID_DRINDUSTRIAL`, `FOLIO_DRINDUSTRIAL`, `FECHA_EMBALADO_DRINDUSTRIAL`, `KILOS_NETO_DRINDUSTRIAL`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TMANEJO`, `ID_FOLIO`, `ID_VESPECIES`, `ID_ESTANDAR`, `ID_PRODUCTOR`, `ID_REEMBALAJE`) VALUES
(1, 11320006, '2021-10-04', '10.00', 1, 0, '2021-10-04 16:11:17', '2021-10-04 16:13:58', 1, 8, 1, 1, 1, 1),
(2, 11320006, '2021-10-04', '30.00', 1, 1, '2021-10-04 16:14:29', '2021-10-04 16:21:18', 1, 8, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_especies`
--

CREATE TABLE `fruta_especies` (
  `ID_ESPECIES` bigint(20) NOT NULL,
  `NOMBRE_ESPECIES` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CODIGO_SAG_ESPECIES` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_especies`
--

INSERT INTO `fruta_especies` (`ID_ESPECIES`, `NOMBRE_ESPECIES`, `CODIGO_SAG_ESPECIES`, `ESTADO_REGISTRO`) VALUES
(1, 'Aceitunas', '10311300', 1),
(2, 'Acelga', '10110300', 1),
(3, 'Achicorias', '10114600', 1),
(4, 'Agapanthus', '0', 1),
(5, 'Aji', '10110100', 1),
(6, 'Aji Jalapeño', '0', 1),
(7, 'Aji Jalapeño En Polvo', '0', 1),
(8, 'Ajos', '10110200', 1),
(9, 'Ajos Elefante', '0', 1),
(10, 'Alamo', '0', 1),
(11, 'Alamo Blanco', '0', 1),
(12, 'Albahaca', '10113800', 1),
(13, 'Alcachofas', '10110600', 1),
(14, 'Alchemilla', '0', 1),
(15, 'Alfalfa', '0', 1),
(16, 'Algodón', '0', 1),
(17, 'Allium', '', 1),
(18, 'Almendras', '0', 1),
(19, 'Almendras C/C', '10310100', 1),
(20, 'Almendras S/C', '10350100', 1),
(21, 'Anemona', '0', 1),
(22, 'Anis', '0', 1),
(23, 'Apio', '10110400', 1),
(24, 'Aprium', '10315400', 1),
(25, 'Arandanos', '10314200', 1),
(26, 'Arroz', '0', 1),
(27, 'Arroz Paddy', '0', 1),
(28, 'Arveja Verde', '0', 1),
(29, 'Astilbe', '0', 1),
(30, 'Avellanas', '0', 1),
(31, 'Avellanas C/C', '10311700', 1),
(32, 'Avellanas S/C', '10351700', 1),
(33, 'Avellano', '0', 1),
(34, 'Avena', '0', 1),
(35, 'Babaco', '0', 1),
(36, 'Baby Kiwi', '10315600', 1),
(37, 'Ballica', '0', 1),
(38, 'Ballica Inglesa', '0', 1),
(39, 'Banana', '0', 1),
(40, 'Banksia', '0', 1),
(41, 'Baya De Nieve', '0', 1),
(42, 'Berenjenas', '10113900', 1),
(43, 'Berries Mixtos', '0', 1),
(44, 'Berros', '10110900', 1),
(45, 'Berzelia', '0', 1),
(46, 'Betarraga', '10110800', 1),
(47, 'Bola De Nieve', '0', 1),
(48, 'Boldo', '0', 1),
(49, 'Boysenberry', '0', 1),
(50, 'Brevas', '10314100', 1),
(51, 'Brocoli', '10114400', 1),
(52, 'Cala', '0', 1),
(53, 'Calabaza', '0', 1),
(54, 'Camote', '10111400', 1),
(55, 'Canela', '0', 1),
(56, 'Canelo', '0', 1),
(57, 'Cannonbal', '0', 1),
(58, 'Canola', '0', 1),
(59, 'Cañihua', '0', 1),
(60, 'Caquis', '10311500', 1),
(61, 'Cardo', '0', 1),
(62, 'Cascara De Limon', '0', 1),
(63, 'Cascara De Naranja', '0', 1),
(64, 'Cascara De Pomelo', '0', 1),
(65, 'Cascara Rosa Mosqueta', '0', 1),
(66, 'Castañas', '10311600', 1),
(67, 'Castañas Europeas', '0', 1),
(68, 'Cebada', '10114700', 1),
(69, 'Cebollas', '10111000', 1),
(70, 'Cebollin', '0', 1),
(71, 'Cedron', '0', 1),
(72, 'Centeno', '0', 1),
(73, 'Cerezas', '10310200', 1),
(74, 'Cereza Agria', '0', 1),
(75, 'Chalotas', '10114000', 1),
(76, 'Chaura', '10314900', 1),
(77, 'Champiñones', '0', 1),
(78, 'Chia', '0', 1),
(79, 'Chicharos', '0', 1),
(80, 'Chirimoyas', '10312500', 1),
(81, 'Choclo', '0', 1),
(82, 'Choclo En Verde', '0', 1),
(83, 'Chupon', '0', 1),
(84, 'Ciboulette', '0', 1),
(85, 'Cilantro', '10111200', 1),
(86, 'Ciruelas', '10310300', 1),
(87, 'Clementinas', '10315300', 1),
(88, 'Cocos', '10312700', 1),
(89, 'Coliflor', '10111300', 1),
(90, 'Comino', '0', 1),
(91, 'Copo De Nieve', '0', 1),
(92, 'Cranberry', '0', 1),
(93, 'Crataegus', '0', 1),
(94, 'Cubos De Alfalfa Con Avena', '0', 1),
(95, 'Cubos De Alfalfa Con Paja De Trigo', '0', 1),
(96, 'Cubos De Alfalfa Con Trigo', '0', 1),
(97, 'Cymbidium', '0', 1),
(98, 'Damascos', '10310400', 1),
(99, 'Datil', '0', 1),
(100, 'Dragon Fruit', '0', 1),
(101, 'Duraznos', '10310500', 1),
(102, 'Endivia', '10114300', 1),
(103, 'Eremurus', '0', 1),
(104, 'Esparragos', '10111600', 1),
(105, 'Espinacas', '10111700', 1),
(106, 'Estragon', '0', 1),
(107, 'Eucalipto', '0', 1),
(108, 'Euterpe Oleracea', '0', 1),
(109, 'Exochordo', '0', 1),
(110, 'Fabiana Densa', '0', 1),
(111, 'Fatsia', '0', 1),
(112, 'Feijoas', '10314300', 1),
(113, 'Flor De Alstroemeria', '0', 1),
(114, 'Flor De Amaryllis', '0', 1),
(115, 'Flor De Arnica', '0', 1),
(116, 'Flor De Azucena', '0', 1),
(117, 'Flor De Cera', '0', 1),
(118, 'Flor De Clavel', '0', 1),
(119, 'Flor De Copihue', '0', 1),
(120, 'Flor De Crisantemo', '0', 1),
(121, 'Flor De Gerbera', '0', 1),
(122, 'Flor De Gloriosa', '0', 1),
(123, 'Flor De Helleborus', '0', 1),
(124, 'Flor De Leucadendron', '0', 1),
(125, 'Flor De Leucocoryne', '0', 1),
(126, 'Flor De Liatris', '0', 1),
(127, 'Flor De Ranunculo', '0', 1),
(128, 'Flor De Ranunculo', '0', 1),
(129, 'Flor De Rosa', '0', 1),
(130, 'Flor De Sandersonia', '0', 1),
(131, 'Flor De Tilo', '0', 1),
(132, 'Flor De Tulipan', '0', 1),
(133, 'Flor Mixta', '0', 1),
(134, 'Flourensia', '0', 1),
(135, 'Follaje De Arbolito', '0', 1),
(136, 'Follaje De Avellano', '0', 1),
(137, 'Follaje De Cola De Caballo', '0', 1),
(138, 'Follaje De Eryngium', '0', 1),
(139, 'Follaje De Eucaliptus', '0', 1),
(140, 'Follaje De Falso Pimiento', '0', 1),
(141, 'Follaje De Feather', '0', 1),
(142, 'Follaje De Helecho', '0', 1),
(143, 'Follaje De Helecho Costilla', '0', 1),
(144, 'Follaje De Lycopodium', '0', 1),
(145, 'Follaje De Mañio', '0', 1),
(146, 'Follaje De Mora', '0', 1),
(147, 'Follaje De Musgo Licopodium', '0', 1),
(148, 'Follaje De Musgo Pinito', '0', 1),
(149, 'Follaje De Ñocha', '0', 1),
(150, 'Follaje De Palmilla', '0', 1),
(151, 'Follaje De Pichiromero', '0', 1),
(152, 'Follaje De Ponpon', '0', 1),
(153, 'Follaje De Rombus', '0', 1),
(154, 'Follaje De Romerillo', '0', 1),
(155, 'Follajes Mixtos', '0', 1),
(156, 'Frambuesas', '10312800', 1),
(157, 'Frejol', '10112700', 1),
(158, 'Frutillas', '10310600', 1),
(159, 'Granadas', '10315100', 1),
(160, 'Grosellas', '10314000', 1),
(161, 'Guayaba', '10313900', 1),
(162, 'Guinda', '0', 1),
(163, 'Habas', '10111800', 1),
(164, 'Higos', '10313500', 1),
(165, 'Honey Berry O Haskap', '10356200', 1),
(166, 'Jengibre', '0', 1),
(167, 'Jojoba', '0', 1),
(168, 'Kiwis', '10313000', 1),
(169, 'Lechugas', '10111900', 1),
(170, 'Lenteja', '10114800', 1),
(171, 'Lilium', '0', 1),
(172, 'Lima', '10356000', 1),
(173, 'Limones', '10310700', 1),
(174, 'Longberries', '10314500', 1),
(175, 'Lonicera Caerulea', '0', 1),
(176, 'Lucumas', '10313800', 1),
(177, 'Lufa', '0', 1),
(178, 'Lupino', '10316000', 1),
(179, 'Maca', '0', 1),
(180, 'Macadamia', '0', 1),
(181, 'Maiz', '10111500', 1),
(182, 'Mandarinas', '10312200', 1),
(183, 'Mangos', '10313100', 1),
(184, 'Mani', '0', 1),
(185, 'Manila', '0', 1),
(186, 'Manzanas', '10310800', 1),
(187, 'Manzanilla', '0', 1),
(188, 'Manzano', '0', 1),
(189, 'Maqui', '0', 1),
(190, 'Maquinaria', '0', 1),
(191, 'Maracuya', '10314700', 1),
(192, 'Maravilla', '0', 1),
(193, 'Melones', '10112000', 1),
(194, 'Menbrillos', '10311400', 1),
(195, 'Menta', '0', 1),
(196, 'Minicedonia', '0', 1),
(197, 'Moras', '10312900', 1),
(198, 'Moras Hibridas', '10313600', 1),
(199, 'Mostaza', '0', 1),
(200, 'Muerdago', '0', 1),
(201, 'Murta', '0', 1),
(202, 'Murtilla', '10314600', 1),
(203, 'Nabos', '10112100', 1),
(204, 'Naranjas', '10312400', 1),
(205, 'Naranjilla China', '0', 1),
(206, 'Nectarines', '10310900', 1),
(207, 'Nerine', '0', 1),
(208, 'Nisperos', '10313700', 1),
(209, 'Nueces C/C', '10311000', 1),
(210, 'Nueces S/C', '0', 1),
(211, 'Oregano', '10112200', 1),
(212, 'Paltas', '10312100', 1),
(213, 'Papas', '10112300', 1),
(214, 'Papayas', '10313400', 1),
(215, 'Pasas', '0', 1),
(216, 'Pepinillos', '10113400', 1),
(217, 'Pepinos Ensalada', '10113300', 1),
(218, 'Pepinos Fruta', '10311800', 1),
(219, 'Pera', '0', 1),
(220, 'Peras Asiaticas', '10315000', 1),
(221, 'Peras Europeas', '10311100', 1),
(222, 'Perejil', '10112400', 1),
(223, 'Physalis', '10114500', 1),
(224, 'Pimenton', '10112600', 1),
(225, 'Pimienta', '0', 1),
(226, 'Pimientos', '10112500', 1),
(227, 'Piñas', '10313200', 1),
(228, 'Pistachos', '10312000', 1),
(229, 'Platanos/Bananos', '10312600', 1),
(230, 'Plumcot', '10315200', 1),
(231, 'Pluot', '10315500', 1),
(232, 'Pomelos', '10312300', 1),
(233, 'Poroto', '0', 1),
(234, 'Poroto Verde', '0', 1),
(235, 'Puerros', '10113700', 1),
(236, 'Quihuanos', '10114100', 1),
(237, 'Quinoa', '10315700', 1),
(238, 'Rabanitos', '10112900', 1),
(239, 'Radicchios', '10114200', 1),
(240, 'Repollos', '10112800', 1),
(241, 'Rosa Mosqueta', '0', 1),
(242, 'Sandias', '10113600', 1),
(243, 'Tamarilos', '10314400', 1),
(244, 'Tangelos', '10314800', 1),
(245, 'Tomates', '10113000', 1),
(246, 'Tunas', '10311900', 1),
(247, 'Uvas', '10311200', 1),
(248, 'Zanahorias', '10113100', 1),
(249, 'Zapallos', '10113200', 1),
(250, 'Zapallo Italiano', '0', 1),
(251, 'Zarzaparrilla', '10313300', 1),
(252, 'Zarzaparrilla Negra', '0', 1),
(253, 'Zarzaparrilla Roja', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_exiexportacion`
--

CREATE TABLE `fruta_exiexportacion` (
  `ID_EXIEXPORTACION` bigint(20) NOT NULL,
  `FOLIO_EXIEXPORTACION` int(11) DEFAULT NULL,
  `FOLIO_AUXILIAR_EXIEXPORTACION` int(11) DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_EXIEXPORTACION` date DEFAULT NULL,
  `CANTIDAD_ENVASE_EXIEXPORTACION` int(11) DEFAULT NULL,
  `KILOS_NETO_EXIEXPORTACION` decimal(11,2) DEFAULT NULL,
  `PDESHIDRATACION_EXIEXPORTACION` decimal(11,2) DEFAULT NULL,
  `KILOS_DESHIRATACION_EXIEXPORTACION` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_EXIEXPORTACION` decimal(11,2) DEFAULT NULL,
  `OBSERVACION_EXIESPORTACION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_DINAMICO_FOLIO_EXIESPORTACION` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_ESTATICO_FOLIO_EXIESPORTACION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STOCK` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMBOLSADO` int(11) DEFAULT NULL,
  `GASIFICADO` int(11) DEFAULT NULL,
  `PREFRIO` int(11) DEFAULT NULL,
  `TESTADOSAG` int(11) DEFAULT NULL,
  `PRECIO_PALLET` decimal(11,2) DEFAULT NULL,
  `VGM` int(11) DEFAULT 0,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `FECHA_PROCESO` date DEFAULT NULL,
  `FECHA_REEMBALAJE` date DEFAULT NULL,
  `FECHA_REPALETIZAJE` date DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `FECHA_DESPACHOEX` date DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TCALIBRE` bigint(20) NOT NULL,
  `ID_TEMBALAJE` bigint(20) NOT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_RECEPCION` bigint(20) DEFAULT NULL,
  `ID_PROCESO` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_REPALETIZAJE` bigint(20) DEFAULT NULL,
  `ID_REEMBALAJE` bigint(20) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) DEFAULT NULL,
  `ID_DESPACHO2` bigint(20) DEFAULT NULL,
  `ID_DESPACHOEX` bigint(20) DEFAULT NULL,
  `ID_INPSAG` bigint(20) DEFAULT NULL,
  `ID_PCDESPACHO` bigint(20) DEFAULT NULL,
  `ID_ICARGA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_exiexportacion`
--

INSERT INTO `fruta_exiexportacion` (`ID_EXIEXPORTACION`, `FOLIO_EXIEXPORTACION`, `FOLIO_AUXILIAR_EXIEXPORTACION`, `FOLIO_MANUAL`, `FECHA_EMBALADO_EXIEXPORTACION`, `CANTIDAD_ENVASE_EXIEXPORTACION`, `KILOS_NETO_EXIEXPORTACION`, `PDESHIDRATACION_EXIEXPORTACION`, `KILOS_DESHIRATACION_EXIEXPORTACION`, `KILOS_BRUTO_EXIEXPORTACION`, `OBSERVACION_EXIESPORTACION`, `ALIAS_DINAMICO_FOLIO_EXIESPORTACION`, `ALIAS_ESTATICO_FOLIO_EXIESPORTACION`, `STOCK`, `EMBOLSADO`, `GASIFICADO`, `PREFRIO`, `TESTADOSAG`, `PRECIO_PALLET`, `VGM`, `FECHA_RECEPCION`, `FECHA_PROCESO`, `FECHA_REEMBALAJE`, `FECHA_REPALETIZAJE`, `FECHA_DESPACHO`, `FECHA_DESPACHOEX`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TCALIBRE`, `ID_TEMBALAJE`, `ID_TMANEJO`, `ID_FOLIO`, `ID_ESTANDAR`, `ID_PRODUCTOR`, `ID_VESPECIES`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_RECEPCION`, `ID_PROCESO`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_REPALETIZAJE`, `ID_REEMBALAJE`, `ID_DESPACHO`, `ID_DESPACHO2`, `ID_DESPACHOEX`, `ID_INPSAG`, `ID_PCDESPACHO`, `ID_ICARGA`) VALUES
(1, 11220001, 11220001, 0, '2021-09-28', 250, '500.00', '2.00', '510.00', '535.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220001', '11220001', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-09-28', NULL, NULL, NULL, NULL, 0, 0, '2021-09-28 16:36:40', '2021-09-29 22:48:42', 1, 1, 1, 7, 2, 1, 1, 1, 1, 2, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(2, 11220002, 11220002, 0, '2021-09-28', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220002', '11220002', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-09-28', NULL, NULL, NULL, NULL, 0, 0, '2021-09-29 10:24:45', '2021-09-29 12:04:57', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 11220001, 11220001, 0, '2021-09-29', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220001', '11220001', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-09-28', NULL, NULL, NULL, NULL, 2, 1, '2021-09-29 22:49:03', '2021-10-21 14:49:33', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 11220002, 11220002, 0, '2021-10-02', 240, '360.00', '5.00', '378.00', '637.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:1_FOLIO:11220002', '11220002', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-02', NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-10-02 09:59:33', '2021-10-02 10:00:00', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 11220003, 11220003, 0, '2021-10-02', 240, '360.00', '5.00', '378.00', '637.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:1_FOLIO:11220003', '11220003', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-02', NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-10-02 09:59:44', '2021-10-02 10:00:06', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 11220004, 11220004, 0, '2021-10-02', 240, '360.00', '5.00', '378.00', '637.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:1_FOLIO:11220004', '11220004', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-02', NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-10-02 09:59:53', '2021-10-02 10:00:09', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11220002, 11220002, 0, '2021-10-02', 230, '345.00', '5.00', '362.25', '611.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:1_FOLIO:11220002', '11220002', '0', 0, 0, 0, 2, NULL, 0, '2021-10-02', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-02 10:00:37', '2021-10-06 22:56:43', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(12, 11220003, 11220003, 0, '2021-10-02', 230, '345.00', '5.00', '362.25', '611.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:1_FOLIO:11220003', '11220003', '0', 0, 0, 0, 2, NULL, 0, '2021-10-02', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-02 10:00:41', '2021-10-06 22:56:43', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(13, 11220004, 11220004, 0, '2021-10-02', 230, '345.00', '5.00', '362.25', '611.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:1_FOLIO:11220004', '11220004', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-02', NULL, NULL, NULL, NULL, NULL, 6, 1, '2021-10-02 10:00:44', '2021-10-04 18:33:57', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 11220005, 11220005, 0, '2021-10-02', 230, '345.00', '5.00', '362.25', '611.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:1_FOLIO:11220005', '11220005', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-02', NULL, NULL, NULL, NULL, NULL, 6, 1, '2021-10-02 10:00:48', '2021-10-04 18:33:57', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 11220006, 11220006, 0, '2021-09-29', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220006', '11220006', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-09-28', NULL, NULL, NULL, NULL, 6, 1, '2021-10-04 11:24:12', '2021-10-04 18:33:57', 2, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 11220007, 11220007, 0, '2021-10-04', 312, '624.00', '2.00', '636.48', '663.96', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220007', '11220008', NULL, 0, NULL, NULL, 2, NULL, 0, NULL, NULL, '2021-09-29', NULL, NULL, NULL, 2, 1, '2021-10-04 15:14:33', '2021-10-06 22:56:43', 1, 1, 1, 7, 2, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 2, NULL, NULL),
(17, 11220008, 11220008, 0, '2021-10-04', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220008', '11220009', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-09-29', NULL, NULL, NULL, 0, 0, '2021-10-04 16:07:27', '2021-10-04 16:14:15', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 11220008, 11220008, 0, '2021-10-04', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220008', '11220009', NULL, 0, NULL, NULL, 2, NULL, 0, NULL, NULL, '2021-09-29', NULL, NULL, '2021-10-06', 8, 1, '2021-10-04 16:19:28', '2021-10-06 22:26:32', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 3, NULL, NULL),
(19, 11220009, 11220009, 0, '2021-09-29', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:1_FOLIO:11220009', '11220009', NULL, 0, NULL, NULL, 2, NULL, 0, NULL, '2021-09-28', NULL, NULL, NULL, '2021-10-06', 8, 1, '2021-10-05 08:59:26', '2021-10-06 22:26:32', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, NULL, NULL),
(20, 11220010, 11220010, 0, '2021-10-06', 390, '585.00', '5.00', '614.25', '1023.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:2_FOLIO:11220010', '11220010', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-06', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-06 22:58:11', '2021-10-06 22:58:36', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 11220011, 11220011, 0, '2021-10-06', 390, '585.00', '5.00', '614.25', '1023.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:2_FOLIO:11220011', '11220011', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-06', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-06 22:58:16', '2021-10-06 22:58:36', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 11220012, 11220012, 0, '2021-10-06', 390, '585.00', '5.00', '614.25', '1023.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:2_FOLIO:11220012', '11220012', '0', 0, 0, 0, NULL, '10.00', 0, '2021-10-06', NULL, NULL, NULL, '2021-10-27', NULL, 8, 1, '2021-10-06 22:58:21', '2021-10-27 11:06:09', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL),
(23, 11220013, 11220013, 0, '2021-10-06', 390, '585.00', '5.00', '614.25', '1023.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:2_FOLIO:11220013', '11220013', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-06', NULL, NULL, NULL, '2021-10-27', NULL, 8, 1, '2021-10-06 22:58:26', '2021-10-27 11:05:31', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL),
(24, 11220014, 11220014, 0, '2021-10-06', 390, '585.00', '5.00', '614.25', '1023.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:2_FOLIO:11220014', '11220014', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-06', NULL, NULL, NULL, '2021-10-27', NULL, 8, 1, '2021-10-06 22:58:30', '2021-10-27 11:05:14', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL),
(25, 11220015, 11220015, 0, '2021-10-06', 390, '585.00', '5.00', '614.25', '1023.25', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:2_FOLIO:11220015', '11220015', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-06', NULL, NULL, NULL, '2021-10-27', NULL, 8, 1, '2021-10-06 22:58:34', '2021-10-27 11:05:02', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL),
(26, 11220016, 11220016, 0, '2021-10-12', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:2_FOLIO:11220016', '11220016', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-12', NULL, NULL, '2021-10-27', NULL, 8, 1, '2021-10-12 11:30:42', '2021-10-27 11:04:02', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 2, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL),
(27, 11220017, 11220017, 0, '2021-10-12', 312, '624.00', '2.00', '636.48', '663.96', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:2_FOLIO:11220017', '11220017', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-12', NULL, NULL, '2021-10-27', NULL, 8, 1, '2021-10-12 11:30:54', '2021-10-27 11:03:49', 1, 1, 1, 7, 2, 1, 1, 1, 1, 2, NULL, 2, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL),
(28, 11220018, 11220018, 0, '2021-10-12', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:2_FOLIO:11220018', '11220018', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-12', NULL, NULL, '2021-10-27', NULL, 9, 1, '2021-10-12 11:31:05', '2021-10-27 11:03:35', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 2, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL),
(29, 11220019, 11220019, 0, '2021-10-18', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220019', '11220019', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-18 08:51:15', '2021-10-20 13:45:53', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 11220020, 11220020, 0, '2021-10-18', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220020', '11220020', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-18 08:59:18', '2021-10-20 13:45:49', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 11220021, 11220021, 0, '2021-10-18', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:2_FOLIO:11220021', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2021-10-18', NULL, NULL, NULL, 1, 1, '2021-10-18 09:19:16', '2021-10-18 09:19:16', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 11220019, 11220022, 0, '2021-10-18', 200, '300.00', '5.00', '315.00', '534.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220019', '11220019', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-18 08:51:15', '2021-10-18 12:35:43', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 11220020, 11220022, 0, '2021-10-18', 200, '300.00', '5.00', '315.00', '534.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220020', '11220020', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-18 08:59:18', '2021-10-18 12:35:45', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 11220020, 11220020, 0, '2021-10-18', 40, '60.00', '5.00', '63.00', '122.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220020', '11220020', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-18 08:59:18', '2021-10-20 13:45:49', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 11220019, 11220019, 0, '2021-10-18', 40, '60.00', '5.00', '63.00', '122.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220019', '11220019', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-18 08:51:15', '2021-10-20 13:45:53', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 11220022, 11220022, 0, '2021-10-20', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 4, 1, '2021-10-20 13:46:59', '2021-10-27 16:54:04', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:24:51', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:26:52', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:28:12', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:31:33', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:32:47', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:41:23', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:42:14', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 11220022, 11220022, 0, '2021-10-20', 6, '9.00', '5.00', '9.45', '34.45', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-20 15:42:49', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 11220023, 11220023, 0, '2021-10-20', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220023', '11220023', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, NULL, '2021-10-27', NULL, 8, 1, '2021-10-20 18:09:17', '2021-10-27 09:04:55', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL),
(46, 11220024, 11220024, 0, '2021-10-20', 240, '360.00', '5.00', '378.00', '637.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220024', '11220024', NULL, 0, NULL, NULL, NULL, '10.00', 0, NULL, '2021-10-13', NULL, NULL, '2021-09-29', NULL, 8, 1, '2021-10-20 18:10:31', '2021-10-27 10:29:02', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(47, 11220019, 11220019, 0, '2021-10-21', 240, '360.00', '5.00', '378.00', '637.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:3_FOLIO:11220019', '11220019', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-10-21 11:09:06', '2021-10-22 10:52:49', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 11220025, 11220025, 0, '2021-10-22', 240, '360.00', '5.00', '378.00', '637.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:3_FOLIO:11220025', '11220025', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-22 10:53:46', '2021-10-28 07:42:12', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 11220026, 11220026, 0, '2021-10-22', 240, '360.00', '5.00', '378.00', '637.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:3_FOLIO:11220026', '11220026', '0', 0, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-22 12:29:21', '2021-10-28 07:42:12', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 11220022, 11220019, 0, '2021-10-20', 100, '150.00', '5.00', '157.50', '276.50', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-27 16:39:56', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 11220022, 11220020, 0, '2021-10-20', 140, '210.00', '5.00', '220.50', '379.50', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-27 16:37:46', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 11220022, 11220022, 0, '2021-10-20', 140, '210.00', '5.00', '220.50', '379.50', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-27 16:39:20', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 11220022, 11220019, 0, '2021-10-20', 100, '150.00', '5.00', '157.50', '276.50', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-27 16:47:35', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 11220022, 11220020, 0, '2021-10-20', 140, '210.00', '5.00', '220.50', '379.50', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 0, 0, '2021-10-20 13:46:59', '2021-10-27 16:47:33', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 11220022, 11220027, 0, '2021-10-20', 200, '300.00', '5.00', '315.00', '534.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 2, 1, '2021-10-20 13:46:59', '2021-10-27 16:54:04', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 11220022, 11220022, 0, '2021-10-20', 40, '60.00', '5.00', '63.00', '122.00', NULL, 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_PROCESO:3_FOLIO:11220022', '11220022', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-13', NULL, '2021-10-18', NULL, NULL, 2, 1, '2021-10-20 13:46:59', '2021-10-27 16:54:04', 1, 1, 1, 7, 1, 1, 1, 1, 1, 2, NULL, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 11220019, 11220019, 0, '2021-10-22', 240, '2400.00', '0.00', '2400.00', '2899.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:3_FOLIO:11220019', '11220019', NULL, 1, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-28 07:38:55', '2021-10-28 07:42:12', 1, 1, 1, 7, 3, 1, 3, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 11220020, 11220020, 0, '2021-10-22', 240, '2400.00', '0.00', '2400.00', '2659.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:3_FOLIO:11220020', '11220020', NULL, 1, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-10-28 07:39:49', '2021-10-28 07:41:36', 1, 1, 1, 7, 4, 1, 3, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 11220022, 11220022, 0, '2021-10-22', 240, '2400.00', '0.00', '2400.00', '2899.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:3_FOLIO:11220022', '11220022', NULL, 1, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-10-28 07:40:14', '2021-10-28 07:41:31', 1, 1, 1, 7, 3, 1, 3, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 11220022, 11220022, 0, '2021-10-22', 240, '2400.00', '0.00', '2400.00', '2899.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:3_FOLIO:11220022', '11220022', NULL, 1, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 0, 0, '2021-10-28 07:40:46', '2021-10-28 07:41:31', 1, 1, 1, 7, 3, 1, 3, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 11220028, 11220028, 0, '2021-10-22', 240, '2400.00', '0.00', '2400.00', '2899.00', '', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO TERMINADO_RECEPCION:3_FOLIO:11220028', '11220028', NULL, 1, 0, 0, NULL, NULL, 0, '2021-10-21', NULL, NULL, NULL, NULL, NULL, 2, 1, '2021-10-28 07:41:42', '2021-10-28 07:42:12', 1, 1, 1, 7, 3, 1, 3, 1, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_exiindustrial`
--

CREATE TABLE `fruta_exiindustrial` (
  `ID_EXIINDUSTRIAL` bigint(20) NOT NULL,
  `FOLIO_EXIINDUSTRIAL` int(11) DEFAULT NULL,
  `FOLIO_AUXILIAR_EXIINDUSTRIAL` int(11) DEFAULT NULL,
  `FECHA_EMBALADO_EXIINDUSTRIAL` date DEFAULT NULL,
  `KILOS_NETO_EXIINDUSTRIAL` decimal(11,2) DEFAULT NULL,
  `NETO_DESPACHO` decimal(11,2) DEFAULT NULL,
  `PRECIO_KILO` decimal(11,2) DEFAULT NULL,
  `ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `FECHA_PROCESO` date DEFAULT NULL,
  `FECHA_REEMBALAJE` date DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_RECEPCION` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_PROCESO` bigint(20) DEFAULT NULL,
  `ID_REEMBALAJE` bigint(20) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) DEFAULT NULL,
  `ID_DESPACHO2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_exiindustrial`
--

INSERT INTO `fruta_exiindustrial` (`ID_EXIINDUSTRIAL`, `FOLIO_EXIINDUSTRIAL`, `FOLIO_AUXILIAR_EXIINDUSTRIAL`, `FECHA_EMBALADO_EXIINDUSTRIAL`, `KILOS_NETO_EXIINDUSTRIAL`, `NETO_DESPACHO`, `PRECIO_KILO`, `ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL`, `ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL`, `FECHA_RECEPCION`, `FECHA_PROCESO`, `FECHA_REEMBALAJE`, `FECHA_DESPACHO`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TMANEJO`, `ID_FOLIO`, `ID_ESTANDAR`, `ID_PRODUCTOR`, `ID_VESPECIES`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_RECEPCION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PROCESO`, `ID_REEMBALAJE`, `ID_DESPACHO`, `ID_DESPACHO2`) VALUES
(1, 11320001, 11320001, '2021-09-28', '600.00', NULL, NULL, '11320001', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320001', '2021-09-28', NULL, NULL, '2021-10-27', 4, 1, '2021-09-28 16:08:55', '2021-10-27 10:18:02', 1, 8, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 7, NULL),
(2, 11320002, 11320002, '2021-09-28', '600.00', NULL, NULL, '11320002', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320002', '2021-09-28', NULL, NULL, '2021-10-27', 4, 1, '2021-09-28 16:09:01', '2021-10-27 10:17:50', 1, 8, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 6, NULL),
(3, 11320003, 11320003, '2021-09-28', '600.00', NULL, '100.00', '11320003', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320003', '2021-09-28', NULL, NULL, '2021-10-27', 4, 1, '2021-09-28 16:09:07', '2021-10-27 10:17:35', 1, 8, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 5, NULL),
(4, 11320004, 11320004, '2021-09-28', '200.00', NULL, NULL, '11320004', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320004', '2021-09-28', NULL, NULL, '2021-10-27', 4, 1, '2021-09-28 16:09:14', '2021-10-27 10:17:14', 1, 8, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 4, NULL),
(5, 11320005, 11320005, '2021-10-04', '5.25', NULL, NULL, '11320005', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320005', NULL, '2021-09-28', NULL, NULL, 0, 0, '2021-09-28 16:42:01', '2021-10-07 12:01:25', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(6, 11320004, 11320006, '2021-10-04', '30.00', NULL, NULL, '11320006', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_DESPACHO:1_FOLIO:11320006', NULL, NULL, '2021-09-29', NULL, 0, 0, '2021-09-28 16:09:14', '2021-10-04 16:21:18', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, 1, 1, 1),
(7, 11320004, 11320006, '2021-09-28', '50.00', NULL, NULL, '11320006', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_DESPACHO:1_FOLIO:11320006', NULL, NULL, NULL, NULL, 0, 0, '2021-09-28 16:09:14', '2021-10-04 16:13:58', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, 1, 1, 1),
(8, 11320004, 11320006, '2021-09-28', '50.00', NULL, NULL, '11320006', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_DESPACHO:1_FOLIO:11320006', NULL, NULL, NULL, NULL, 0, 0, '2021-09-28 16:09:14', '2021-10-04 16:13:58', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, 1, 1, 1),
(9, 11320004, 11320006, '2021-09-28', '150.00', NULL, NULL, '11320006', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_DESPACHO:1_FOLIO:11320006', NULL, NULL, NULL, NULL, 0, 0, '2021-09-28 16:09:14', '2021-10-04 16:13:58', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, 1, NULL, 1),
(10, 11320005, 11320005, '2021-10-04', '11.25', NULL, NULL, '11320005', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320005', NULL, '2021-09-28', NULL, '2021-10-27', 4, 1, '2021-10-04 14:54:12', '2021-10-27 08:58:58', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 1, NULL, 2, NULL),
(11, 11320006, 11320006, '2021-10-04', '10.00', NULL, NULL, '11320006', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320006', NULL, NULL, '2021-09-29', NULL, 0, 0, '2021-10-04 16:11:17', '2021-10-04 16:13:58', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(12, 11320006, 11320006, '2021-10-04', '10.00', NULL, '15.00', '11320006', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:1_FOLIO:11320006', NULL, NULL, '2021-09-29', '2021-09-29', 4, 1, '2021-10-04 16:14:29', '2021-10-08 12:31:48', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, NULL, 1, 1, NULL),
(13, 11320007, 11320007, '2021-10-12', '25.77', NULL, NULL, '11320007', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:2_FOLIO:11320007', NULL, '2021-10-12', NULL, '2021-10-27', 5, 1, '2021-10-12 11:31:30', '2021-10-27 10:17:02', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 2, NULL, 3, NULL),
(14, 11320008, 11320008, '2021-10-20', '49.61', NULL, NULL, '11320008', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:3_FOLIO:11320008', NULL, '2021-10-13', NULL, NULL, 0, 0, '2021-10-18 09:00:14', '2021-10-20 18:11:59', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(15, 11320008, 11320008, '2021-10-20', '8.14', NULL, NULL, '11320008', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:3_FOLIO:11320008', NULL, '2021-10-13', NULL, NULL, 0, 0, '2021-10-20 13:46:31', '2021-10-20 18:11:59', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(16, 11320008, 11320008, '2021-10-20', '22.25', NULL, NULL, '11320008', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:PRODUCTO INDUSTRIAL_PROCESO:3_FOLIO:11320008', NULL, '2021-10-13', NULL, NULL, 0, 0, '2021-10-20 18:11:41', '2021-10-20 18:11:59', 1, 8, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_eximateriaprima`
--

CREATE TABLE `fruta_eximateriaprima` (
  `ID_EXIMATERIAPRIMA` bigint(20) NOT NULL,
  `FOLIO_EXIMATERIAPRIMA` int(11) DEFAULT NULL,
  `FOLIO_AUXILIAR_EXIMATERIAPRIMA` int(11) DEFAULT NULL,
  `FOLIO_MANUAL` int(11) DEFAULT NULL,
  `FECHA_COSECHA_EXIMATERIAPRIMA` date DEFAULT NULL,
  `CANTIDAD_ENVASE_EXIMATERIAPRIMA` int(11) DEFAULT NULL,
  `KILOS_NETO_EXIMATERIAPRIMA` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_EXIMATERIAPRIMA` decimal(11,2) DEFAULT NULL,
  `KILOS_PROMEDIO_EXIMATERIAPRIMA` decimal(11,5) DEFAULT NULL,
  `PESO_PALLET_EXIMATERIAPRIMA` decimal(11,2) DEFAULT NULL,
  `ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GASIFICADO` int(11) DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `FECHA_PROCESO` date DEFAULT NULL,
  `FECHA_REPALETIZAJE` date DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_TMANEJO` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_RECEPCION` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_PROCESO` bigint(20) DEFAULT NULL,
  `ID_REPALETIZAJE` bigint(20) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) DEFAULT NULL,
  `ID_DESPACHO2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_eximateriaprima`
--

INSERT INTO `fruta_eximateriaprima` (`ID_EXIMATERIAPRIMA`, `FOLIO_EXIMATERIAPRIMA`, `FOLIO_AUXILIAR_EXIMATERIAPRIMA`, `FOLIO_MANUAL`, `FECHA_COSECHA_EXIMATERIAPRIMA`, `CANTIDAD_ENVASE_EXIMATERIAPRIMA`, `KILOS_NETO_EXIMATERIAPRIMA`, `KILOS_BRUTO_EXIMATERIAPRIMA`, `KILOS_PROMEDIO_EXIMATERIAPRIMA`, `PESO_PALLET_EXIMATERIAPRIMA`, `ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA`, `ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA`, `GASIFICADO`, `FECHA_RECEPCION`, `FECHA_PROCESO`, `FECHA_REPALETIZAJE`, `FECHA_DESPACHO`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TMANEJO`, `ID_FOLIO`, `ID_ESTANDAR`, `ID_PRODUCTOR`, `ID_VESPECIES`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_RECEPCION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PROCESO`, `ID_REPALETIZAJE`, `ID_DESPACHO`, `ID_DESPACHO2`) VALUES
(1, 11120001, 11120001, 0, '2021-09-28', 50, '232.50', '337.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120001', '11120001', 0, '2021-09-28', NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:09', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 3, NULL, NULL, NULL),
(2, 11120002, 11120002, 0, '2021-09-28', 25, '116.25', '176.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120002', '11120002', 0, '2021-09-28', NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:22', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 3, NULL, NULL, NULL),
(3, 11120003, 11120003, 0, '2021-09-28', 50, '232.50', '337.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120003', '11120003', 0, '2021-09-28', NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:27', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 3, NULL, NULL, NULL),
(4, 11120004, 11120004, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120004', '11120004', 0, '2021-09-28', NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:32', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 1, NULL, NULL, NULL),
(5, 11120005, 11120005, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120005', '11120005', 0, '2021-09-28', NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:36', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 2, NULL, NULL, NULL),
(6, 11120006, 11120006, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120006', '11120006', 0, '2021-09-28', NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:41', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 2, NULL, NULL, NULL),
(7, 11120007, 11120007, 0, '2021-09-28', 50, '232.50', '337.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120007', '11120007', 0, '2021-09-28', NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:46', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 1, NULL, NULL, NULL),
(8, 11120008, 11120008, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120008', '11120008', 0, '2021-09-28', NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:40:51', '2021-10-27 10:03:08', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 1, NULL, 16, NULL),
(9, 11120009, 11120009, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120009', '11120009', 0, '2021-09-28', NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:40:59', '2021-10-27 11:14:23', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 15, NULL),
(10, 11120010, 11120010, 0, '2021-09-28', 10, '46.50', '79.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120010', '11120010', 0, '2021-09-28', NULL, NULL, '2021-10-13', 8, 1, '2021-09-28 15:41:11', '2021-10-25 16:41:28', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 2, NULL),
(11, 11120011, 11120011, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120011', '11120011', 0, '2021-09-28', NULL, NULL, '2021-10-13', 8, 1, '2021-09-28 15:41:21', '2021-10-25 16:41:28', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 2, NULL),
(12, 11120012, 11120012, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120012', '11120012', 0, '2021-09-28', NULL, NULL, '2021-09-29', 8, 1, '2021-09-28 15:41:56', '2021-10-25 16:41:09', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 1, NULL),
(13, 11120013, 11120013, 0, '2021-09-28', 100, '465.00', '660.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:1_FOLIO:11120013', '11120013', 0, '2021-09-28', NULL, NULL, '2021-09-29', 8, 1, '2021-09-28 15:42:02', '2021-10-25 16:41:09', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 1, NULL),
(15, 11120008, 11120008, 0, '2021-09-28', 25, '116.25', '176.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, NULL, 4, 1, '2021-09-28 15:40:51', '2021-10-07 12:01:32', 1, 6, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(16, 11120008, 11120008, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, NULL, 4, 1, '2021-09-28 15:40:51', '2021-10-07 12:01:32', 1, 6, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(17, 11120008, 11120008, 0, '2021-09-28', 20, '93.00', '144.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, NULL, 4, 1, '2021-09-28 15:40:51', '2021-10-07 12:01:32', 1, 6, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(18, 11120007, 11120007, 0, '2021-09-28', 50, '232.50', '337.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120007', '11120007', 0, NULL, NULL, NULL, NULL, 4, 1, '2021-09-28 15:40:46', '2021-10-12 11:31:37', 1, 6, 1, 1, 1, 1, 1, 2, NULL, NULL, NULL, 2, NULL, NULL, NULL),
(19, 11120008, 11120008, 0, '2021-09-28', 20, '93.00', '144.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:40:51', '2021-10-27 10:03:44', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 1, NULL, 17, NULL),
(20, 11120001, 11120001, 0, '2021-09-28', 50, '232.50', '337.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120001', '11120001', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:09', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 11120001, 11120001, 0, '2021-09-28', 50, '232.50', '337.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120001', '11120001', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:09', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 2, NULL, NULL, NULL),
(22, 11120008, 11120008, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:40:51', '2021-10-27 10:04:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 1, NULL, 18, NULL),
(23, 11120008, 11120008, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:40:51', '2021-10-27 10:04:36', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 2, NULL, 19, NULL),
(24, 11120008, 11120008, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:51', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 1, NULL, NULL, NULL),
(25, 11120014, 11120014, 0, '2021-10-01', 41, '571.20', '660.00', '13.93171', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:2_FOLIO:11120014', '11120014', 0, '2021-10-01', NULL, NULL, NULL, 0, 0, '2021-10-01 09:57:28', '2021-10-05 15:01:33', 1, 6, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 11120008, 11120008, 0, '2021-09-28', 10, '46.50', '79.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:1_FOLIO:11120008', '11120008', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:51', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 1, NULL, NULL, NULL),
(27, 11120014, 11120014, 0, '2021-10-06', 200, '405.00', '780.00', '2.02500', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:2_FOLIO:11120014', '11120014', 0, '2021-10-01', NULL, NULL, '2021-10-25', 8, 1, '2021-10-06 12:09:30', '2021-10-25 22:22:15', 1, 6, 1, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 12, NULL),
(28, 11120011, 11120011, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:2_FOLIO:11120011', '11120011', 0, NULL, NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:41:21', '2021-10-27 08:56:11', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 13, NULL),
(29, 11120011, 11120011, 0, '2021-09-28', 90, '418.50', '595.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:2_FOLIO:11120011', '11120011', 0, NULL, NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:41:21', '2021-10-27 08:56:11', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 13, NULL),
(30, 11120003, 11120003, 0, '2021-09-28', 25, '116.25', '176.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:3_FOLIO:11120003', '11120003', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:27', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 3, NULL, NULL, NULL),
(31, 11120002, 11120002, 0, '2021-09-28', 25, '116.25', '176.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:3_FOLIO:11120002', '11120002', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:22', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 11120003, 11120003, 0, '2021-09-28', 20, '93.00', '144.00', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:3_FOLIO:11120003', '11120003', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:27', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 3, NULL, NULL, NULL),
(33, 11120003, 11120003, 0, '2021-09-28', 5, '23.25', '47.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:3_FOLIO:11120003', '11120003', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:27', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 11120002, 11120002, 0, '2021-09-28', 25, '116.25', '176.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:3_FOLIO:11120002', '11120002', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:22', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 11120002, 11120002, 0, '2021-09-28', 25, '116.25', '176.25', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:3_FOLIO:11120002', '11120002', 0, NULL, NULL, NULL, NULL, 2, 1, '2021-09-28 15:40:22', '2021-10-21 12:09:10', 1, 6, 1, 1, 1, 1, 1, 2, 1, NULL, NULL, 3, NULL, NULL, NULL),
(36, 11120010, 11120010, 0, '2021-09-28', 90, '418.50', '595.50', '4.65000', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_DESPACHO:2_FOLIO:11120010', '11120010', 0, NULL, NULL, NULL, '2021-10-27', 8, 1, '2021-09-28 15:41:11', '2021-10-27 10:02:16', 1, 6, 1, 1, 2, 1, 1, 2, 1, NULL, NULL, NULL, NULL, 14, NULL),
(37, 11120015, 11120015, 0, '2021-10-13', 200, '205.00', '720.00', '1.02500', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:3_FOLIO:11120015', '11120015', 0, '2021-10-13', NULL, NULL, '2021-10-25', 8, 1, '2021-10-13 12:45:52', '2021-10-25 20:18:25', 1, 6, 3, 1, 1, 1, 1, 2, 3, NULL, NULL, 3, NULL, 11, NULL),
(38, 11120016, 11120016, 0, '2021-10-06', 200, '405.00', '780.00', '2.02500', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:2_FOLIO:11120016', '11120016', 0, '2021-10-01', NULL, NULL, '2021-10-25', 8, 1, '2021-10-19 12:53:28', '2021-10-25 20:06:16', 1, 6, 4, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 10, NULL),
(39, 11120017, 11120017, 0, '2021-10-06', 200, '405.00', '780.00', '2.02500', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:2_FOLIO:11120017', '11120017', 0, '2021-10-01', NULL, NULL, '2021-10-25', 8, 1, '2021-10-19 12:55:01', '2021-10-25 20:06:16', 1, 6, 4, 1, 1, 1, 1, 2, 2, NULL, NULL, NULL, NULL, 10, NULL),
(40, 11120018, 11120018, 0, '2021-10-19', 240, '213.00', '660.00', '0.88750', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:4_FOLIO:11120018', '11120018', 0, '0000-00-00', NULL, NULL, '2021-10-25', 8, 1, '2021-10-19 15:40:31', '2021-10-25 17:23:36', 1, 6, 1, 1, 1, 1, 1, 2, 4, NULL, NULL, NULL, NULL, 9, NULL),
(41, 11120019, 11120019, 0, '2021-10-13', 200, '345.00', '720.00', '1.72500', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:3_FOLIO:11120019', '11120019', 0, '2021-10-13', NULL, NULL, '2021-10-25', 8, 1, '2021-10-20 13:19:00', '2021-10-25 17:16:31', 1, 6, 4, 1, 1, 1, 1, 2, 3, NULL, NULL, NULL, NULL, 8, NULL),
(42, 11120020, 11120020, 0, '2021-10-13', 200, '345.00', '720.00', '1.72500', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:3_FOLIO:11120020', '11120020', 0, '2021-10-13', NULL, NULL, '2021-10-23', 8, 1, '2021-10-20 13:19:07', '2021-10-25 19:44:55', 1, 6, 1, 1, 1, 1, 1, 2, 3, NULL, NULL, NULL, NULL, 4, NULL),
(43, 11120021, 11120021, 0, '2021-10-20', 240, '213.00', '660.00', '0.88750', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:5_FOLIO:11120021', '11120021', 0, '2021-10-20', NULL, NULL, NULL, 0, 0, '2021-10-20 13:30:09', '2021-10-21 11:43:36', 1, 6, 1, 1, 2, 1, 1, 2, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 11120021, 11120021, 0, '2021-10-21', 240, '213.00', '660.00', '0.88750', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:5_FOLIO:11120021', '11120021', 0, '2021-10-20', NULL, NULL, '2021-10-25', 8, 1, '2021-10-21 12:04:15', '2021-10-25 16:42:29', 1, 6, 1, 1, 1, 1, 1, 2, 5, NULL, NULL, NULL, NULL, 7, NULL),
(45, 11120022, 11120022, 0, '2021-10-21', 240, '209.00', '660.00', '0.87083', '19.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:6_FOLIO:11120022', '11120022', 0, '2021-10-21', NULL, NULL, '2021-10-23', 8, 1, '2021-10-21 12:10:07', '2021-10-25 19:44:32', 1, 6, 4, 1, 1, 1, 1, 2, 6, NULL, NULL, NULL, NULL, 5, NULL),
(46, 11120023, 11120023, 0, '2021-10-21', 240, '213.00', '660.00', '0.88750', '15.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:7_FOLIO:11120023', '11120023', 0, '2021-10-21', NULL, NULL, '2021-10-23', 8, 1, '2021-10-21 12:11:47', '2021-10-25 16:42:05', 1, 6, 1, 1, 1, 1, 1, 2, 7, NULL, NULL, NULL, NULL, 3, NULL),
(47, 11120024, 11120024, 0, '2021-10-28', 240, '281.00', '660.00', '1.17083', '19.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:8_FOLIO:11120024', '11120024', 0, '0000-00-00', NULL, NULL, NULL, 2, 1, '2021-10-28 00:49:56', '2021-10-28 00:59:32', 1, 6, 7, 1, 3, 1, 1, 2, 8, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 11120025, 11120025, 0, '2021-10-28', 240, '185.00', '660.00', '0.77083', '19.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:8_FOLIO:11120025', '11120025', 0, '0000-00-00', NULL, NULL, NULL, 2, 1, '2021-10-28 00:59:09', '2021-10-28 00:59:32', 1, 6, 6, 1, 3, 1, 1, 2, 8, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 11120026, 11120026, 0, '2021-10-28', 240, '281.00', '660.00', '1.17083', '19.00', 'EMPRESA:1_PLANTA:1_TEMPORADA:2_TIPO_FOLIO:MATERIA PRIMA_RECEPCION:8_FOLIO:11120026', '11120026', 0, '0000-00-00', NULL, NULL, NULL, 2, 1, '2021-10-28 00:59:19', '2021-10-28 00:59:32', 1, 6, 5, 1, 3, 1, 1, 2, 8, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_exportadora`
--

CREATE TABLE `fruta_exportadora` (
  `ID_EXPORTADORA` bigint(20) NOT NULL,
  `RUT_EXPORTADORA` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_EXPORTADORA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO1_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL1_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO1_EXPORTADORA` int(11) DEFAULT NULL,
  `CONTACTO2_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL2_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO2_EXPORTADORA` int(11) DEFAULT NULL,
  `LOGO_EXPORTADORA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_exportadora`
--

INSERT INTO `fruta_exportadora` (`ID_EXPORTADORA`, `RUT_EXPORTADORA`, `DV_EXPORTADORA`, `NOMBRE_EXPORTADORA`, `RAZON_SOCIAL_EXPORTADORA`, `GIRO_EXPORTADORA`, `DIRECCION_EXPORTADORA`, `CONTACTO1_EXPORTADORA`, `EMAIL1_EXPORTADORA`, `TELEFONO1_EXPORTADORA`, `CONTACTO2_EXPORTADORA`, `EMAIL2_EXPORTADORA`, `TELEFONO2_EXPORTADORA`, `LOGO_EXPORTADORA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '1', '1', 'Prueba', '1', '1', '1', '', '', 0, '', '', 0, '', 1, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_folio`
--

CREATE TABLE `fruta_folio` (
  `ID_FOLIO` bigint(20) NOT NULL,
  `NUMERO_FOLIO` int(10) DEFAULT NULL,
  `ALIAS_DINAMICO_FOLIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_ESTATICO_FOLIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `TFOLIO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_folio`
--

INSERT INTO `fruta_folio` (`ID_FOLIO`, `NUMERO_FOLIO`, `ALIAS_DINAMICO_FOLIO`, `ALIAS_ESTATICO_FOLIO`, `ESTADO_REGISTRO`, `TFOLIO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(6, 11120000, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIA PRIMA_TEMPORADA:2020-2021', '11120000', 1, 1, NULL, NULL, 1, 1, 2, 1, 1),
(7, 11220000, '11220000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:EXPORTACION_TEMPORADA:2020-2021', '11220000', 1, 2, NULL, NULL, 1, 1, 2, 1, 1),
(8, 11320000, '11320000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:INDUSTRIAL_TEMPORADA:2020-2021', '11320000', 1, 3, NULL, NULL, 1, 1, 2, 1, 1),
(9, 12220000, '12220000_EMPRESA:Pruebas_PLANTA:Planta El Alamo_TIPO_FOLIO:EXPORTACION_TEMPORADA:2020-2021', '12220000', 1, 2, NULL, NULL, 1, 2, 2, 1, 1),
(10, 12120000, '12120000_EMPRESA:Pruebas_PLANTA:Planta El Alamo_TIPO_FOLIO:MATERIA PRIMA_TEMPORADA:2020-2021', '12120000', 1, 1, NULL, NULL, 1, 2, 2, 1, 1),
(11, 12320000, '12320000_EMPRESA:Pruebas_PLANTA:Planta El Alamo_TIPO_FOLIO:INDUSTRIAL_TEMPORADA:2020-2021', '12320000', 1, 3, NULL, NULL, 1, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_fpago`
--

CREATE TABLE `fruta_fpago` (
  `ID_FPAGO` bigint(20) NOT NULL,
  `NUMERO_FPAGO` int(11) DEFAULT NULL,
  `NOMBRE_FPAGO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_PAGO_FPAGO` date DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_fpago`
--

INSERT INTO `fruta_fpago` (`ID_FPAGO`, `NUMERO_FPAGO`, `NOMBRE_FPAGO`, `FECHA_PAGO_FPAGO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'prueba formato pago', '2021-08-17', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_icarga`
--

CREATE TABLE `fruta_icarga` (
  `ID_ICARGA` bigint(20) NOT NULL,
  `NUMERO_ICARGA` int(11) DEFAULT NULL,
  `FECHA_ICARGA` date DEFAULT NULL,
  `TEMBARQUE_ICARGA` int(11) DEFAULT NULL,
  `BOOKING_ICARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHAETD_ICARGA` date DEFAULT NULL,
  `FECHAETA_ICARGA` date DEFAULT NULL,
  `NVIAJE_ICARGA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FDA_ICARGA` bigint(20) DEFAULT NULL,
  `CRT_ICARGA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NAVE_ICARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHASTACKING_ICARGA` date DEFAULT NULL,
  `FUMIGADO_ICARGA` int(11) DEFAULT NULL,
  `T_ICARGA` decimal(11,2) DEFAULT NULL,
  `O2_ICARGA` decimal(11,2) DEFAULT NULL,
  `C02_ICARGA` decimal(11,2) DEFAULT NULL,
  `ALAMPA_ICARGA` decimal(11,2) DEFAULT NULL,
  `DUS_ICARGA` int(11) DEFAULT NULL,
  `BOLAWBCRT_ICARGA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NETO_ICARGA` decimal(11,2) DEFAULT NULL,
  `REBATE_ICARGA` decimal(11,2) DEFAULT NULL,
  `PUBLICA_ICARGA` decimal(11,0) DEFAULT NULL,
  `COSTO_FLETE_ICARGA` decimal(11,2) DEFAULT NULL,
  `OBSERVACION_ICARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NREFERENCIA_ICARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TOTAL_ENVASE_ICAGRA` int(11) DEFAULT NULL,
  `TOTAL_NETO_ICARGA` decimal(11,2) DEFAULT NULL,
  `TOTAL_BRUTO_ICARGA` decimal(11,2) DEFAULT NULL,
  `TOTAL_US_ICARGA` decimal(11,2) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_ICARGA` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_TSERVICIO` bigint(20) DEFAULT NULL,
  `ID_EXPPORTADORA` bigint(20) DEFAULT NULL,
  `ID_CONSIGNATARIO` bigint(20) DEFAULT NULL,
  `ID_NOTIFICADOR` bigint(20) DEFAULT NULL,
  `ID_BROKER` bigint(20) DEFAULT NULL,
  `ID_RFINAL` bigint(20) DEFAULT NULL,
  `ID_MERCADO` bigint(20) DEFAULT NULL,
  `ID_AADUANA` bigint(20) DEFAULT NULL,
  `ID_AGCARGA` bigint(20) DEFAULT NULL,
  `ID_DFINAL` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) DEFAULT NULL,
  `ID_LCARGA` bigint(20) DEFAULT NULL,
  `ID_LDESTINO` bigint(20) DEFAULT NULL,
  `ID_LAREA` bigint(20) DEFAULT NULL,
  `ID_AEROLINEA` bigint(20) DEFAULT NULL,
  `ID_AERONAVE` bigint(20) DEFAULT NULL,
  `ID_ACARGA` bigint(20) DEFAULT NULL,
  `ID_ADESTINO` bigint(20) DEFAULT NULL,
  `ID_NAVIERA` bigint(20) DEFAULT NULL,
  `ID_PDESTINO` bigint(20) DEFAULT NULL,
  `ID_PCARGA` bigint(20) DEFAULT NULL,
  `ID_FPAGO` bigint(20) DEFAULT NULL,
  `ID_CVENTA` bigint(20) DEFAULT NULL,
  `ID_MVENTA` bigint(20) DEFAULT NULL,
  `ID_TFLETE` bigint(20) DEFAULT NULL,
  `ID_TCONTENEDOR` bigint(20) DEFAULT NULL,
  `ID_ATMOSFERA` bigint(20) DEFAULT NULL,
  `ID_PAIS` bigint(20) DEFAULT NULL,
  `ID_SEGURO` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_icarga`
--

INSERT INTO `fruta_icarga` (`ID_ICARGA`, `NUMERO_ICARGA`, `FECHA_ICARGA`, `TEMBARQUE_ICARGA`, `BOOKING_ICARGA`, `FECHAETD_ICARGA`, `FECHAETA_ICARGA`, `NVIAJE_ICARGA`, `FDA_ICARGA`, `CRT_ICARGA`, `NAVE_ICARGA`, `FECHASTACKING_ICARGA`, `FUMIGADO_ICARGA`, `T_ICARGA`, `O2_ICARGA`, `C02_ICARGA`, `ALAMPA_ICARGA`, `DUS_ICARGA`, `BOLAWBCRT_ICARGA`, `NETO_ICARGA`, `REBATE_ICARGA`, `PUBLICA_ICARGA`, `COSTO_FLETE_ICARGA`, `OBSERVACION_ICARGA`, `NREFERENCIA_ICARGA`, `TOTAL_ENVASE_ICAGRA`, `TOTAL_NETO_ICARGA`, `TOTAL_BRUTO_ICARGA`, `TOTAL_US_ICARGA`, `ESTADO`, `ESTADO_ICARGA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_TEMPORADA`, `ID_TSERVICIO`, `ID_EXPPORTADORA`, `ID_CONSIGNATARIO`, `ID_NOTIFICADOR`, `ID_BROKER`, `ID_RFINAL`, `ID_MERCADO`, `ID_AADUANA`, `ID_AGCARGA`, `ID_DFINAL`, `ID_TRANSPORTE`, `ID_LCARGA`, `ID_LDESTINO`, `ID_LAREA`, `ID_AEROLINEA`, `ID_AERONAVE`, `ID_ACARGA`, `ID_ADESTINO`, `ID_NAVIERA`, `ID_PDESTINO`, `ID_PCARGA`, `ID_FPAGO`, `ID_CVENTA`, `ID_MVENTA`, `ID_TFLETE`, `ID_TCONTENEDOR`, `ID_ATMOSFERA`, `ID_PAIS`, `ID_SEGURO`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, 3, '2021-09-06', 3, '1515', '2021-09-06', '2021-09-06', '111', 1, NULL, '111', '2021-09-06', 2, '0.00', '0.02', '0.01', '0.02', 0, '111', '1.00', '1.00', '0', '0.00', '', 'v2.25', 1320, '1980.00', '3418.00', '2640.00', 0, 3, 1, '2021-09-06 20:37:26', '2021-09-08 15:42:30', 1, 2, 1, 1, 2, 2, 2, 2, 1, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 4, 1, 1, 1, 1, 1, 1, 44, 1, 1, 1),
(3, 2, '2021-09-06', 2, '1515', '2021-09-06', '2021-09-06', '1', 1, NULL, 'SSS', NULL, 2, '0.00', '0.01', '0.01', '0.02', 0, '1111', '0.00', '0.00', '0', '0.00', '', 'v2.25', 1320, '1980.00', '3418.00', '6600.00', 0, 2, 1, '2021-09-06 20:37:33', '2021-09-06 23:47:35', 1, 2, 1, 1, 2, 2, 2, 2, 1, 2, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, 2, 1, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 44, 1, 1, 1),
(4, 1, '2021-09-06', 1, '1515', '2021-09-06', '2021-09-06', NULL, 1, '1515', NULL, NULL, 2, '-2.00', '-0.02', '-0.02', '0.04', 0, '151', '0.00', '0.00', '0', '0.03', '', 'V2.001', 2640, '3960.00', '6836.00', '39600.00', 0, 2, 1, '2021-09-06 20:37:53', '2021-09-06 23:28:08', 1, 2, 1, 1, 2, 2, 2, 2, 1, 2, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 44, 1, 1, 1),
(5, 4, '2021-09-15', 1, '1', '2021-09-15', '2021-09-15', NULL, 1, '111', NULL, NULL, 2, '0.00', '0.03', '0.04', '0.06', 0, '11', '0.00', '0.00', '0', '0.00', '', '1', 88, '132.00', '264.60', '1377.20', 0, 2, 1, '2021-09-15 22:17:11', '2021-10-21 11:19:36', 1, 2, 1, 1, 2, 2, 2, 2, 1, 2, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 22, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_inpector`
--

CREATE TABLE `fruta_inpector` (
  `ID_INPECTOR` bigint(20) NOT NULL,
  `NUMERO_INPECTOR` int(11) DEFAULT NULL,
  `NOMBRE_INPECTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_INPECTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_INPECTOR` int(11) DEFAULT NULL,
  `EMAIL_INPECTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_inpector`
--

INSERT INTO `fruta_inpector` (`ID_INPECTOR`, `NUMERO_INPECTOR`, `NOMBRE_INPECTOR`, `DIRECCION_INPECTOR`, `TELEFONO_INPECTOR`, `EMAIL_INPECTOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, 1, 'prueba inspector 1', 'pp', 0, '', 1, NULL, NULL, 1, NULL, 1, 1),
(3, 2, 'inspector 2', '1', 0, '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_inpsag`
--

CREATE TABLE `fruta_inpsag` (
  `ID_INPSAG` bigint(20) NOT NULL,
  `NUMERO_INPSAG` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_INPSAG` date DEFAULT NULL,
  `CANTIDAD_ENVASE_INPSAG` int(11) DEFAULT NULL,
  `KILOS_NETO_INPSAG` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_INPSAG` decimal(11,2) DEFAULT NULL,
  `CIF_INPSAG` int(11) DEFAULT NULL,
  `OBSERVACION_INPSAG` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `TESTADOSAG` bigint(20) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_PAIS1` bigint(20) DEFAULT NULL,
  `ID_PAIS2` bigint(20) DEFAULT NULL,
  `ID_PAIS3` bigint(20) DEFAULT NULL,
  `ID_PAIS4` bigint(20) DEFAULT NULL,
  `ID_INPECTOR` bigint(20) NOT NULL,
  `ID_CONTRAPARTE` bigint(20) NOT NULL,
  `ID_TINPSAG` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_inpsag`
--

INSERT INTO `fruta_inpsag` (`ID_INPSAG`, `NUMERO_INPSAG`, `FECHA_INPSAG`, `CANTIDAD_ENVASE_INPSAG`, `KILOS_NETO_INPSAG`, `KILOS_BRUTO_INPSAG`, `CIF_INPSAG`, `OBSERVACION_INPSAG`, `ESTADO`, `ESTADO_REGISTRO`, `TESTADOSAG`, `INGRESO`, `MODIFICACION`, `ID_PAIS1`, `ID_PAIS2`, `ID_PAIS3`, `ID_PAIS4`, `ID_INPECTOR`, `ID_CONTRAPARTE`, `ID_TINPSAG`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '1', '2021-09-08', 3960, '5940.00', '10311.00', 0, '', 0, 1, 2, '2021-09-08 12:13:21', '2021-09-08 15:08:36', 44, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(2, '2', '2021-10-06', 772, '1314.00', '1886.46', 15, '', 0, 1, 2, '2021-10-06 22:25:06', '2021-10-06 22:56:43', 44, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(3, '3', '2021-10-06', 480, '720.00', '1274.00', 15, '', 0, 1, 2, '2021-10-06 22:25:53', '2021-10-06 22:26:09', 44, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(4, '4', '2021-10-26', 0, '0.00', '0.00', 0, '', 1, 1, 1, '2021-10-26 15:36:15', '2021-10-26 15:47:57', 43, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(5, '5', '2021-10-26', 0, '0.00', '0.00', 0, '', 1, 1, 1, '2021-10-26 15:45:52', '2021-10-26 15:45:52', 5, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(6, '6', '2021-10-26', 0, '0.00', '0.00', 0, '', 1, 1, 1, '2021-10-26 15:48:32', '2021-10-26 15:48:32', 43, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(7, '7', '2021-10-26', 0, '0.00', '0.00', 0, '', 1, 1, 1, '2021-10-26 15:51:44', '2021-10-26 15:51:44', 3, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1),
(8, '8', '2021-10-26', 0, '0.00', '0.00', 0, '', 1, 1, 1, '2021-10-26 15:52:40', '2021-10-26 15:52:40', 3, NULL, NULL, NULL, 2, 2, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_lcarga`
--

CREATE TABLE `fruta_lcarga` (
  `ID_LCARGA` bigint(20) NOT NULL,
  `NUMERO_LCARGA` int(11) DEFAULT NULL,
  `NOMBRE_LCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_lcarga`
--

INSERT INTO `fruta_lcarga` (`ID_LCARGA`, `NUMERO_LCARGA`, `NOMBRE_LCARGA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'lugar carga 1', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_ldestino`
--

CREATE TABLE `fruta_ldestino` (
  `ID_LDESTINO` bigint(20) NOT NULL,
  `NUMERO_LDESTINO` int(11) DEFAULT NULL,
  `NOMBRE_LDESTINO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_ldestino`
--

INSERT INTO `fruta_ldestino` (`ID_LDESTINO`, `NUMERO_LDESTINO`, `NOMBRE_LDESTINO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'lugar destino 1', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_mercado`
--

CREATE TABLE `fruta_mercado` (
  `ID_MERCADO` bigint(20) NOT NULL,
  `NUMERO_MERCADO` int(11) DEFAULT NULL,
  `NOMBRE_MERCADO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_mercado`
--

INSERT INTO `fruta_mercado` (`ID_MERCADO`, `NUMERO_MERCADO`, `NOMBRE_MERCADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'mercado prueba', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_mguiaind`
--

CREATE TABLE `fruta_mguiaind` (
  `ID_MGUIA` bigint(20) NOT NULL,
  `NUMERO_MGUIA` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `NUMERO_GUIA` int(11) DEFAULT NULL,
  `MOTIVO_MGUIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_mguiamp`
--

CREATE TABLE `fruta_mguiamp` (
  `ID_MGUIA` bigint(20) NOT NULL,
  `NUMERO_MGUIA` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `NUMERO_GUIA` int(11) DEFAULT NULL,
  `MOTIVO_MGUIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_mguiamp`
--

INSERT INTO `fruta_mguiamp` (`ID_MGUIA`, `NUMERO_MGUIA`, `INGRESO`, `NUMERO_DESPACHO`, `NUMERO_GUIA`, `MOTIVO_MGUIA`, `ESTADO_REGISTRO`, `ID_DESPACHO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_PLANTA2`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-10-25 20:16:23', 10, 111, 'SS', 1, 11, 1, 2, 2, 1, 1, 1),
(2, 2, '2021-10-25 20:16:54', 10, 111, 'SS', 1, 11, 1, 2, 2, 1, 1, 1),
(3, 3, '2021-10-25 20:17:06', 10, 111, 'PRUEBAS', 1, 11, 1, 2, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_mguiapt`
--

CREATE TABLE `fruta_mguiapt` (
  `ID_MGUIA` bigint(20) NOT NULL,
  `NUMERO_MGUIA` int(11) DEFAULT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `NUMERO_GUIA` int(11) DEFAULT NULL,
  `MOTIVO_MGUIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `ID_DESPACHO` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_mventa`
--

CREATE TABLE `fruta_mventa` (
  `ID_MVENTA` bigint(20) NOT NULL,
  `NUMERO_MVENTA` int(11) DEFAULT NULL,
  `NOMBRE_MVENTA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTA_MVENTA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_mventa`
--

INSERT INTO `fruta_mventa` (`ID_MVENTA`, `NUMERO_MVENTA`, `NOMBRE_MVENTA`, `NOTA_MVENTA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'Prueba modalidad venta', '', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_notificador`
--

CREATE TABLE `fruta_notificador` (
  `ID_NOTIFICADOR` bigint(20) NOT NULL,
  `NUMERO_NOTIFICADOR` int(11) DEFAULT NULL,
  `NOMBRE_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EORI_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO1_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO1_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL1_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO2_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO2_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL2_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO3_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO3_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL3_NOTIFICADOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_notificador`
--

INSERT INTO `fruta_notificador` (`ID_NOTIFICADOR`, `NUMERO_NOTIFICADOR`, `NOMBRE_NOTIFICADOR`, `EORI_NOTIFICADOR`, `DIRECCION_NOTIFICADOR`, `CONTACTO1_NOTIFICADOR`, `CARGO1_NOTIFICADOR`, `EMAIL1_NOTIFICADOR`, `CONTACTO2_NOTIFICADOR`, `CARGO2_NOTIFICADOR`, `EMAIL2_NOTIFICADOR`, `CONTACTO3_NOTIFICADOR`, `CARGO3_NOTIFICADOR`, `EMAIL3_NOTIFICADOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, NULL, 'notificador 1', '1', 'Prueba', '', '', '', '', '', '', '', '', '', 0, NULL, NULL, 1, NULL, 1, 1),
(2, 1, 'notificador 2', '1', 'Ppp', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_pcarga`
--

CREATE TABLE `fruta_pcarga` (
  `ID_PCARGA` bigint(20) NOT NULL,
  `NUMERO_PCARGA` int(11) DEFAULT NULL,
  `NOMBRE_PCARGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_pcarga`
--

INSERT INTO `fruta_pcarga` (`ID_PCARGA`, `NUMERO_PCARGA`, `NOMBRE_PCARGA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(4, 1, 'puerto carga 1', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_pcdespacho`
--

CREATE TABLE `fruta_pcdespacho` (
  `ID_PCDESPACHO` bigint(20) NOT NULL,
  `NUMERO_PCDESPACHO` int(11) DEFAULT NULL,
  `MOTIVO_PCDESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_PCDESPACHO` date DEFAULT NULL,
  `FECHA_INGRESO_PCDESPACHO` datetime DEFAULT NULL,
  `FECHA_MODIFCIACION_PCDESPACHO` datetime DEFAULT NULL,
  `CANTIDAD_ENVASE_PCDESPACHO` int(11) DEFAULT NULL,
  `KILOS_NETO_PCDESPACHO` decimal(11,2) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_PCDESPACHO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_DESPACHOEX` bigint(20) DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_pdestino`
--

CREATE TABLE `fruta_pdestino` (
  `ID_PDESTINO` bigint(20) NOT NULL,
  `NUMERO_PDESTINO` int(11) DEFAULT NULL,
  `NOMBRE_PDESTINO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_pdestino`
--

INSERT INTO `fruta_pdestino` (`ID_PDESTINO`, `NUMERO_PDESTINO`, `NOMBRE_PDESTINO`, `INGRESO`, `MODIFICACION`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, NULL, 'puerto destino 1', NULL, NULL, 0, 1, 1, 1),
(2, 1, 'puerto destino 2', NULL, NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_proceso`
--

CREATE TABLE `fruta_proceso` (
  `ID_PROCESO` bigint(20) NOT NULL,
  `NUMERO_PROCESO` int(11) DEFAULT NULL,
  `FECHA_PROCESO` date DEFAULT NULL,
  `TURNO` int(11) DEFAULT NULL,
  `OBSERVACIONE_PROCESO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KILOS_NETO_PROCESO` decimal(11,2) DEFAULT NULL,
  `KILOS_EXPORTACION_PROCESO` decimal(11,2) DEFAULT NULL,
  `KILOS_INDUSTRIAL_PROCESO` decimal(11,2) DEFAULT NULL,
  `PDEXPORTACION_PROCESO` decimal(11,2) DEFAULT NULL,
  `PDINDUSTRIAL_PROCESO` decimal(11,2) DEFAULT NULL,
  `PORCENTAJE_PROCESO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_TPROCESO` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_proceso`
--

INSERT INTO `fruta_proceso` (`ID_PROCESO`, `NUMERO_PROCESO`, `FECHA_PROCESO`, `TURNO`, `OBSERVACIONE_PROCESO`, `KILOS_NETO_PROCESO`, `KILOS_EXPORTACION_PROCESO`, `KILOS_INDUSTRIAL_PROCESO`, `PDEXPORTACION_PROCESO`, `PDINDUSTRIAL_PROCESO`, `PORCENTAJE_PROCESO`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_VESPECIES`, `ID_PRODUCTOR`, `ID_TPROCESO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-28', 1, '', '1085.25', '1134.00', '5.25', '99.52', '0.48', '100', 0, 1, '2021-09-28 16:32:57', '2021-10-07 12:01:32', 1, 1, 1, 1, 1, 2, 1, 1),
(2, 2, '2021-10-12', 1, '', '1369.77', '1392.48', '25.77', '98.12', '1.88', '100', 0, 1, '2021-10-12 11:30:21', '2021-10-12 11:31:37', 1, 1, 1, 1, 1, 2, 1, 1),
(3, 3, '2021-10-13', 1, '', '1080.00', '1134.00', '0.00', '97.14', '0.00', '97.144142118282', 0, 1, '2021-10-13 10:03:34', '2021-10-20 18:22:31', 1, 1, 1, 1, 1, 2, 1, 1),
(4, 4, '2021-10-21', 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', '0', 1, 1, '2021-10-21 11:03:39', '2021-10-21 11:03:39', 1, 2, 1, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_productor`
--

CREATE TABLE `fruta_productor` (
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `NUMERO_PRODUCTOR` int(11) DEFAULT NULL,
  `RUT_PRODUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_PRODUCTOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_PRODUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_PRODUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_PRODUCTOR` bigint(30) DEFAULT NULL,
  `EMAIL_PRODUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_PRODUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CSG_PRODUCTOR` int(11) DEFAULT NULL,
  `SDP_PRODUCTOR` int(11) DEFAULT NULL,
  `PRB_PRODUCTOR` int(11) DEFAULT NULL,
  `CODIGO_ASOCIADO_PRODUCTOR` int(11) DEFAULT NULL,
  `NOMBRE_ASOCIADO_PRODUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_TPRODUCTOR` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_productor`
--

INSERT INTO `fruta_productor` (`ID_PRODUCTOR`, `NUMERO_PRODUCTOR`, `RUT_PRODUCTOR`, `DV_PRODUCTOR`, `NOMBRE_PRODUCTOR`, `DIRECCION_PRODUCTOR`, `TELEFONO_PRODUCTOR`, `EMAIL_PRODUCTOR`, `GIRO_PRODUCTOR`, `CSG_PRODUCTOR`, `SDP_PRODUCTOR`, `PRB_PRODUCTOR`, `CODIGO_ASOCIADO_PRODUCTOR`, `NOMBRE_ASOCIADO_PRODUCTOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_TPRODUCTOR`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '1', '1', 'producto prueba 1', '1', 0, '1@1.cl', '1', 1, 1, 1, 1, '1', 1, '2021-07-30', '2021-08-16', 1, 1, 1, 1, 1),
(2, 2, '111', '1', '2', 'pp', 0, '', 'pp', 1515, 0, 0, 0, '', 1, '2021-08-16', '2021-08-16', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_recepcionind`
--

CREATE TABLE `fruta_recepcionind` (
  `ID_RECEPCION` bigint(20) NOT NULL,
  `NUMERO_RECEPCION` int(11) DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `FECHA_GUIA_RECEPCION` date DEFAULT NULL,
  `HORA_RECEPCION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_GUIA_RECEPCION` int(11) DEFAULT NULL,
  `TOTAL_KILOS_GUIA_RECEPCION` int(11) DEFAULT NULL,
  `KILOS_NETO_RECEPCION` int(11) DEFAULT NULL,
  `PATENTE_CAMION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRECEPCION` bigint(20) DEFAULT NULL,
  `OBSERVACION_RECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_recepcionind`
--

INSERT INTO `fruta_recepcionind` (`ID_RECEPCION`, `NUMERO_RECEPCION`, `FECHA_RECEPCION`, `FECHA_GUIA_RECEPCION`, `HORA_RECEPCION`, `NUMERO_GUIA_RECEPCION`, `TOTAL_KILOS_GUIA_RECEPCION`, `KILOS_NETO_RECEPCION`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TRECEPCION`, `OBSERVACION_RECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_PLANTA2`, `ID_PRODUCTOR`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-28', '2021-09-28', '15:58', 15, 500, 2400, 'ss', '', 1, '', 0, 1, '2021-09-28 15:58:22', '2021-09-28 16:09:17', 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(2, 2, '2021-10-21', '2021-10-21', '16:15', 1355456, 600, 0, 'SSS', '', 1, '', 1, 1, '2021-10-21 16:16:15', '2021-10-21 16:16:15', 1, 1, 2, NULL, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_recepcionmp`
--

CREATE TABLE `fruta_recepcionmp` (
  `ID_RECEPCION` bigint(20) NOT NULL,
  `NUMERO_RECEPCION` int(11) DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `FECHA_GUIA_RECEPCION` date DEFAULT NULL,
  `HORA_RECEPCION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_GUIA_RECEPCION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TOTAL_KILOS_GUIA_RECEPCION` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_RECEPCION` int(11) DEFAULT NULL,
  `KILOS_NETO_RECEPCION` decimal(11,2) DEFAULT NULL,
  `KILOS_BRUTO_RECEPCION` decimal(11,2) DEFAULT NULL,
  `PATENTE_CAMION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRECEPCION` int(11) DEFAULT NULL,
  `OBSERVACION_RECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_recepcionmp`
--

INSERT INTO `fruta_recepcionmp` (`ID_RECEPCION`, `NUMERO_RECEPCION`, `FECHA_RECEPCION`, `FECHA_GUIA_RECEPCION`, `HORA_RECEPCION`, `NUMERO_GUIA_RECEPCION`, `TOTAL_KILOS_GUIA_RECEPCION`, `CANTIDAD_ENVASE_RECEPCION`, `KILOS_NETO_RECEPCION`, `KILOS_BRUTO_RECEPCION`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TRECEPCION`, `OBSERVACION_RECEPCION`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_PLANTA2`, `ID_PRODUCTOR`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-28', '2021-09-28', '15:38', '1515', 6600, 1300, '5580.00', '8580.00', '1515', '', 1, '', '2021-09-28 15:39:31', '2021-10-25 16:21:21', 0, 1, 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(2, 2, '2021-10-01', '2021-10-01', '09:56', '15', 900, 600, '1215.00', '2340.00', '15', '', 1, '', '2021-10-01 09:57:06', '2021-10-25 16:21:35', 0, 1, 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(3, 3, '2021-10-13', '2021-10-13', '12:42', '151515', 6600, 600, '895.00', '2160.00', 'hyhg', '', 1, '', '2021-10-13 12:43:21', '2021-10-25 16:21:51', 0, 1, 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(4, 4, '2021-10-19', '2021-10-19', '15:37', '15', 600, 240, '213.00', '660.00', '444', '', 2, '', '2021-10-19 15:37:50', '2021-10-25 16:22:01', 0, 1, 1, 1, 2, 3, NULL, 1, 1, 1, 1),
(5, 5, '2021-10-20', '2021-10-20', '13:29', '22233', 21155, 240, '213.00', '660.00', 'jjj', '', 1, '', '2021-10-20 13:29:18', '2021-10-25 16:22:10', 0, 1, 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(6, 6, '2021-10-21', '2021-10-21', '11:50', '334455', 600, 240, '209.00', '660.00', '15', '', 1, '', '2021-10-21 11:51:21', '2021-10-25 16:22:21', 0, 1, 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(7, 7, '2021-10-21', '2021-10-21', '11:53', '23566', 600, 240, '213.00', '660.00', 'KKK', '', 1, '', '2021-10-21 11:53:48', '2021-10-25 16:22:33', 0, 1, 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(8, 8, '2021-10-28', '2021-10-28', '00:31', '15253', 600, 720, '747.00', '1980.00', '', '', 2, '', '2021-10-28 00:31:29', '2021-10-28 00:59:32', 0, 1, 1, 1, 2, 3, NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_recepcionpt`
--

CREATE TABLE `fruta_recepcionpt` (
  `ID_RECEPCION` bigint(20) NOT NULL,
  `NUMERO_RECEPCION` int(11) DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `FECHA_GUIA_RECEPCION` date DEFAULT NULL,
  `HORA_RECEPCION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_GUIA_RECEPCION` int(11) DEFAULT NULL,
  `TOTAL_KILOS_GUIA_RECEPCION` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_RECEPCION` int(11) DEFAULT NULL,
  `KILOS_NETO_RECEPCION` int(11) DEFAULT NULL,
  `KILOS_BRUTO_RECEPCION` int(11) DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRECEPCION` bigint(20) DEFAULT NULL,
  `OBSERVACION_RECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_recepcionpt`
--

INSERT INTO `fruta_recepcionpt` (`ID_RECEPCION`, `NUMERO_RECEPCION`, `FECHA_RECEPCION`, `FECHA_GUIA_RECEPCION`, `HORA_RECEPCION`, `NUMERO_GUIA_RECEPCION`, `TOTAL_KILOS_GUIA_RECEPCION`, `CANTIDAD_ENVASE_RECEPCION`, `KILOS_NETO_RECEPCION`, `KILOS_BRUTO_RECEPCION`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TRECEPCION`, `OBSERVACION_RECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_PLANTA2`, `ID_PRODUCTOR`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-10-02', '2021-10-02', '09:52', 11, 111, 920, 1380, 2445, '11', '', 1, '', 0, 1, '2021-10-02 09:52:29', '2021-10-02 10:00:54', 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(2, 2, '2021-10-06', '2021-10-06', '22:57', 111, 6000, 2340, 3510, 6140, '1111', '', 1, '', 0, 1, '2021-10-06 22:57:53', '2021-10-06 22:58:36', 1, 1, 2, NULL, 1, 1, 1, 1, 1),
(3, 3, '2021-10-21', '2021-10-21', '10:10', 111223, 6600, 960, 5520, 7072, '1xss1', '', 1, '', 0, 1, '2021-10-21 10:10:29', '2021-10-28 07:42:12', 1, 1, 2, NULL, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_reembalaje`
--

CREATE TABLE `fruta_reembalaje` (
  `ID_REEMBALAJE` bigint(20) NOT NULL,
  `NUMERO_REEMBALAJE` int(11) DEFAULT NULL,
  `FECHA_REEMBALAJE` date DEFAULT NULL,
  `TURNO` int(11) DEFAULT NULL,
  `KILOS_NETO_REEMBALAJE` decimal(11,2) DEFAULT NULL,
  `KILOS_EXPORTACION_REEMBALAJE` decimal(11,2) DEFAULT NULL,
  `KILOS_INDUSTRIAL_REEMBALAJE` decimal(11,2) DEFAULT NULL,
  `PDEXPORTACION_REEMBALAJE` decimal(11,2) DEFAULT NULL,
  `PDINDUSTRIAL_REEMBALAJE` decimal(11,2) DEFAULT NULL,
  `PORCENTAJE_REEMBALAJE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OBSERVACIONE_REEMBALAJE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_VESPECIES` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_TREEMBALAJE` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_reembalaje`
--

INSERT INTO `fruta_reembalaje` (`ID_REEMBALAJE`, `NUMERO_REEMBALAJE`, `FECHA_REEMBALAJE`, `TURNO`, `KILOS_NETO_REEMBALAJE`, `KILOS_EXPORTACION_REEMBALAJE`, `KILOS_INDUSTRIAL_REEMBALAJE`, `PDEXPORTACION_REEMBALAJE`, `PDINDUSTRIAL_REEMBALAJE`, `PORCENTAJE_REEMBALAJE`, `OBSERVACIONE_REEMBALAJE`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_VESPECIES`, `ID_PRODUCTOR`, `ID_TREEMBALAJE`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-29', 1, '1014.00', '984.00', '30.00', '97.04', '2.96', '100', '', 0, 1, '2021-09-29 22:48:00', '2021-10-04 18:33:57', 1, 1, 2, 1, 1, 1, 1, 1),
(2, 2, '2021-10-18', 1, '0.00', '0.00', '0.00', '0.00', '0.00', '0', '', 1, 1, '2021-10-18 09:14:38', '2021-10-18 09:14:38', 1, 1, 2, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_repaletizajeex`
--

CREATE TABLE `fruta_repaletizajeex` (
  `ID_REPALETIZAJE` bigint(20) NOT NULL,
  `NUMERO_REPALETIZAJE` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_REPALETIZAJE` int(11) DEFAULT NULL,
  `KILOS_NETO_REPALETIZAJE` decimal(11,2) DEFAULT NULL,
  `CANTIDAD_ENVASE_ORIGINAL` int(11) DEFAULT NULL,
  `KILOS_NETO_ORIGINAL` decimal(11,2) DEFAULT NULL,
  `MOTIVO_REPALETIZAJE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_repaletizajeex`
--

INSERT INTO `fruta_repaletizajeex` (`ID_REPALETIZAJE`, `NUMERO_REPALETIZAJE`, `CANTIDAD_ENVASE_REPALETIZAJE`, `KILOS_NETO_REPALETIZAJE`, `CANTIDAD_ENVASE_ORIGINAL`, `KILOS_NETO_ORIGINAL`, `MOTIVO_REPALETIZAJE`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 240, '360.00', 240, '360.00', 'ss', 0, 1, '2021-10-18 11:20:13', '2021-10-27 16:54:04', 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_repaletizajemp`
--

CREATE TABLE `fruta_repaletizajemp` (
  `ID_REPALETIZAJE` bigint(20) NOT NULL,
  `NUMERO_REPALETIZAJE` int(11) DEFAULT NULL,
  `CANTIDAD_ENVASE_REPALETIZAJE` int(11) DEFAULT NULL,
  `KILOS_NETO_REPALETIZAJE` decimal(11,2) DEFAULT NULL,
  `CANTIDAD_ENVASE_ORIGINAL` int(11) DEFAULT NULL,
  `KILOS_NETO_ORIGINAL` decimal(11,2) DEFAULT NULL,
  `MOTIVO_REPALETIZAJE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_INGRESO` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_rfinal`
--

CREATE TABLE `fruta_rfinal` (
  `ID_RFINAL` bigint(20) NOT NULL,
  `NUMERO_RFINAL` int(11) DEFAULT NULL,
  `NOMBRE_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO1_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO1_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL1_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO2_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO2_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL2_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO3_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CARGO3_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL3_RFINAL` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_rfinal`
--

INSERT INTO `fruta_rfinal` (`ID_RFINAL`, `NUMERO_RFINAL`, `NOMBRE_RFINAL`, `DIRECCION_RFINAL`, `CONTACTO1_RFINAL`, `CARGO1_RFINAL`, `EMAIL1_RFINAL`, `CONTACTO2_RFINAL`, `CARGO2_RFINAL`, `EMAIL2_RFINAL`, `CONTACTO3_RFINAL`, `CARGO3_RFINAL`, `EMAIL3_RFINAL`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(2, 1, 'recibirdor final 1', '1', '', '', '', '', '', '', '', '', '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_rmercado`
--

CREATE TABLE `fruta_rmercado` (
  `ID_RMERCADO` bigint(20) NOT NULL,
  `NUMERO_RMERCADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_MERCADO` bigint(20) NOT NULL,
  `ID_PRODUCTOR` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_rmercado`
--

INSERT INTO `fruta_rmercado` (`ID_RMERCADO`, `NUMERO_RMERCADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_MERCADO`, `ID_PRODUCTOR`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 1, NULL, NULL, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_seguro`
--

CREATE TABLE `fruta_seguro` (
  `ID_SEGURO` bigint(20) NOT NULL,
  `NUMERO_SEGURO` int(11) DEFAULT NULL,
  `NOMBRE_SEGURO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTIMADO_SEGURO` decimal(11,2) DEFAULT NULL,
  `REAL_SEGURO` decimal(11,2) DEFAULT NULL,
  `SUMA_SEGURO` decimal(11,2) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_seguro`
--

INSERT INTO `fruta_seguro` (`ID_SEGURO`, `NUMERO_SEGURO`, `NOMBRE_SEGURO`, `ESTIMADO_SEGURO`, `REAL_SEGURO`, `SUMA_SEGURO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'Prueba seguro 1', '1.00', '0.00', '1.00', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tcalibre`
--

CREATE TABLE `fruta_tcalibre` (
  `ID_TCALIBRE` bigint(20) NOT NULL,
  `NUMERO_TCALIBRE` int(11) DEFAULT NULL,
  `NOMBRE_TCALIBRE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tcalibre`
--

INSERT INTO `fruta_tcalibre` (`ID_TCALIBRE`, `NUMERO_TCALIBRE`, `NOMBRE_TCALIBRE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'calibre 1', 1, NULL, NULL, 1, 1, 1),
(2, 2, 'calibre 2', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tcategoria`
--

CREATE TABLE `fruta_tcategoria` (
  `ID_TCATEGORIA` bigint(20) NOT NULL,
  `NOMBRE_TCATEGORIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tcategoria`
--

INSERT INTO `fruta_tcategoria` (`ID_TCATEGORIA`, `NOMBRE_TCATEGORIA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'tipo categoria prueba 1', '1', '2021-10-27', '2021-10-27', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tcolor`
--

CREATE TABLE `fruta_tcolor` (
  `ID_TCOLOR` bigint(20) NOT NULL,
  `NOMBRE_TCOLOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tcolor`
--

INSERT INTO `fruta_tcolor` (`ID_TCOLOR`, `NOMBRE_TCOLOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'tipo color prueba', '1', '2021-10-27', '2021-10-27', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tcontenedor`
--

CREATE TABLE `fruta_tcontenedor` (
  `ID_TCONTENEDOR` bigint(20) NOT NULL,
  `NUMERO_TCONTENEDOR` int(11) DEFAULT NULL,
  `NOMBRE_TCONTENEDOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tcontenedor`
--

INSERT INTO `fruta_tcontenedor` (`ID_TCONTENEDOR`, `NUMERO_TCONTENEDOR`, `NOMBRE_TCONTENEDOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'prueba tipo contenedor 1', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tembalaje`
--

CREATE TABLE `fruta_tembalaje` (
  `ID_TEMBALAJE` bigint(20) NOT NULL,
  `NUMERO_TEMBALAJE` int(11) DEFAULT NULL,
  `NOMBRE_TEMBALAJE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PESO_TEMBALAJE` decimal(11,2) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tembalaje`
--

INSERT INTO `fruta_tembalaje` (`ID_TEMBALAJE`, `NUMERO_TEMBALAJE`, `NOMBRE_TEMBALAJE`, `PESO_TEMBALAJE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '4,4 oz', '15.10', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tetiqueta`
--

CREATE TABLE `fruta_tetiqueta` (
  `ID_TETIQUETA` bigint(20) NOT NULL,
  `NUMERO_TETIQUETA` int(11) DEFAULT NULL,
  `NOMBRE_TETIQUETA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tetiqueta`
--

INSERT INTO `fruta_tetiqueta` (`ID_TETIQUETA`, `NUMERO_TETIQUETA`, `NOMBRE_TETIQUETA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'Naturipe Farms', 1, NULL, NULL, 1, 1, 1),
(2, 2, 'Ocean Spray', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tflete`
--

CREATE TABLE `fruta_tflete` (
  `ID_TFLETE` bigint(20) NOT NULL,
  `NUMERO_TFLETE` int(11) DEFAULT NULL,
  `NOMBRE_TFLETE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tflete`
--

INSERT INTO `fruta_tflete` (`ID_TFLETE`, `NUMERO_TFLETE`, `NOMBRE_TFLETE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'tipo flete 1', 1, NULL, NULL, 1, 1, 1),
(2, 2, 'Pruieba tipo flete 2', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tinpsag`
--

CREATE TABLE `fruta_tinpsag` (
  `ID_TINPSAG` bigint(20) NOT NULL,
  `NOMBRE_TINPSAG` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tinpsag`
--

INSERT INTO `fruta_tinpsag` (`ID_TINPSAG`, `NOMBRE_TINPSAG`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'inspecion 1', 1, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tmanejo`
--

CREATE TABLE `fruta_tmanejo` (
  `ID_TMANEJO` bigint(20) NOT NULL,
  `NOMBRE_TMANEJO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tmanejo`
--

INSERT INTO `fruta_tmanejo` (`ID_TMANEJO`, `NOMBRE_TMANEJO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'Convencional', 1, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tmoneda`
--

CREATE TABLE `fruta_tmoneda` (
  `ID_TMONEDA` bigint(20) NOT NULL,
  `NUMERO_TMONEDA` int(11) DEFAULT NULL,
  `NOMBRE_TMONEDA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tmoneda`
--

INSERT INTO `fruta_tmoneda` (`ID_TMONEDA`, `NUMERO_TMONEDA`, `NOMBRE_TMONEDA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'moneda 1', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tproceso`
--

CREATE TABLE `fruta_tproceso` (
  `ID_TPROCESO` bigint(20) NOT NULL,
  `NOMBRE_TPROCESO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tproceso`
--

INSERT INTO `fruta_tproceso` (`ID_TPROCESO`, `NOMBRE_TPROCESO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'tipo proceso 1', '1', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tproductor`
--

CREATE TABLE `fruta_tproductor` (
  `ID_TPRODUCTOR` bigint(20) NOT NULL,
  `NUMERO_TPRODUCTOR` int(11) DEFAULT NULL,
  `NOMBRE_TPRODUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tproductor`
--

INSERT INTO `fruta_tproductor` (`ID_TPRODUCTOR`, `NUMERO_TPRODUCTOR`, `NOMBRE_TPRODUCTOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'tipo productor 1', 1, '2021-07-30', '2021-10-19', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tratamineto1`
--

CREATE TABLE `fruta_tratamineto1` (
  `ID_TTRATAMIENTO` bigint(20) NOT NULL,
  `NOMBRE_TTRATAMIENTO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tratamineto1`
--

INSERT INTO `fruta_tratamineto1` (`ID_TTRATAMIENTO`, `NOMBRE_TTRATAMIENTO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'tratamiento 1 pruebass', '1', '2021-10-27', '2021-10-27', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tratamineto2`
--

CREATE TABLE `fruta_tratamineto2` (
  `ID_TTRATAMIENTO` bigint(20) NOT NULL,
  `NOMBRE_TTRATAMIENTO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tratamineto2`
--

INSERT INTO `fruta_tratamineto2` (`ID_TTRATAMIENTO`, `NOMBRE_TTRATAMIENTO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'tipo tratamiento 2 prueba', '1', '2021-10-27', '2021-10-27', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_treembalaje`
--

CREATE TABLE `fruta_treembalaje` (
  `ID_TREEMBALAJE` bigint(20) NOT NULL,
  `NOMBRE_TREEMBALAJE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_treembalaje`
--

INSERT INTO `fruta_treembalaje` (`ID_TREEMBALAJE`, `NOMBRE_TREEMBALAJE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'tipo reembalaje 1', '1', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_tservicio`
--

CREATE TABLE `fruta_tservicio` (
  `ID_TSERVICIO` bigint(20) NOT NULL,
  `NUMERO_TSERVICIO` int(11) DEFAULT NULL,
  `NOMBRE_TSERVICIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_tservicio`
--

INSERT INTO `fruta_tservicio` (`ID_TSERVICIO`, `NUMERO_TSERVICIO`, `NOMBRE_TSERVICIO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'tipo servicio 1', 1, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fruta_vespecies`
--

CREATE TABLE `fruta_vespecies` (
  `ID_VESPECIES` bigint(20) NOT NULL,
  `NUMERO_VESPECIES` int(11) DEFAULT NULL,
  `NOMBRE_VESPECIES` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CODIGO_SAG_VESPECIES` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_ESPECIES` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fruta_vespecies`
--

INSERT INTO `fruta_vespecies` (`ID_VESPECIES`, `NUMERO_VESPECIES`, `NOMBRE_VESPECIES`, `CODIGO_SAG_VESPECIES`, `ESTADO_REGISTRO`, `ID_ESPECIES`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'Prueba', '0', 1, 25, 1, 1, 1),
(2, 2, 'Prueba 2', '2', 1, 25, 1, 1, 1),
(3, 3, 'cereza prueba', '12', 1, 73, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_cardexe`
--

CREATE TABLE `material_cardexe` (
  `ID_CARDEX` bigint(20) NOT NULL,
  `DESCRIPCION_CARDEX` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_cardexm`
--

CREATE TABLE `material_cardexm` (
  `ID_CARDEX` bigint(20) NOT NULL,
  `DESCRIPCION_CARDEX` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_cliente`
--

CREATE TABLE `material_cliente` (
  `ID_CLIENTE` bigint(20) NOT NULL,
  `RUT_CLIENTE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_CLIENTE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_CLIENTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_CLIENTE` int(11) DEFAULT NULL,
  `NOMBRE_CLIENTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_CLIENTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_CLIENTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_CLIENTE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_CLIENTE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_cliente`
--

INSERT INTO `material_cliente` (`ID_CLIENTE`, `RUT_CLIENTE`, `DV_CLIENTE`, `RAZON_CLIENTE`, `NUMERO_CLIENTE`, `NOMBRE_CLIENTE`, `GIRO_CLIENTE`, `DIRECCION_CLIENTE`, `TELEFONO_CLIENTE`, `EMAIL_CLIENTE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '1', '1', '1', 1, 'cliente 1', '1', '1', '1', '1@1.cl', 1, '2021-07-30', '2021-07-30', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_despachoe`
--

CREATE TABLE `material_despachoe` (
  `ID_DESPACHO` bigint(20) NOT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `NUMERO_DOCUMENTO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CANTIDAD_DESPACHO` int(11) DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TDESPACHO` int(11) DEFAULT NULL,
  `OBSERVACIONES` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REGALO_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_DESPACHO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_TDOCUMENTO` bigint(20) NOT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_BODEGA` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_BODEGA2` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_PROVEEDOR` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_COMPRADOR` bigint(20) DEFAULT NULL,
  `ID_DESPACHOMP` bigint(20) DEFAULT NULL,
  `ID_BODEGAO` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_despachoe`
--

INSERT INTO `material_despachoe` (`ID_DESPACHO`, `NUMERO_DESPACHO`, `FECHA_DESPACHO`, `NUMERO_DOCUMENTO`, `CANTIDAD_DESPACHO`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TDESPACHO`, `OBSERVACIONES`, `REGALO_DESPACHO`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_DESPACHO`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_TDOCUMENTO`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_BODEGA`, `ID_PLANTA2`, `ID_BODEGA2`, `ID_PRODUCTOR`, `ID_PROVEEDOR`, `ID_PLANTA3`, `ID_COMPRADOR`, `ID_DESPACHOMP`, `ID_BODEGAO`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(23, 1, '2021-09-29', '11', 200, '11', '', 3, '', NULL, '2021-10-25 16:11:30', '2021-10-25 16:41:09', 0, 1, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, 1, 1),
(24, 2, '2021-10-13', '111', 15, '111', '', 7, '', NULL, '2021-10-25 16:15:04', '2021-10-25 16:41:28', 0, 1, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, 1, 1, 1),
(25, 3, '2021-10-23', '1515', 200, '1515', '', 2, '', NULL, '2021-10-25 16:15:20', '2021-10-25 16:42:11', 0, 4, 1, 1, 1, 2, 1, 1, 1, NULL, 2, 2, NULL, NULL, NULL, NULL, 4, 1, 1, 1),
(26, 4, '2021-10-25', '1515', 240, '1515', '', 5, '', NULL, '2021-10-25 16:15:47', '2021-10-25 16:42:29', 0, 1, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 7, 1, 1, 1),
(27, 5, '2021-10-23', '1515', 240, '1515', '', 7, '', NULL, '2021-10-25 16:16:23', '2021-10-25 16:42:05', 0, 1, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, 3, 1, 1, 1),
(29, 6, '2021-10-23', '1515', 240, '1515', '', 2, '', NULL, '2021-10-25 16:42:48', '2021-10-25 16:42:48', 0, 4, 1, 1, 1, 2, 1, 1, 1, NULL, 2, 2, NULL, NULL, NULL, NULL, 5, 1, 1, 1),
(30, 7, '2021-10-25', '1515', 500, 'dss', '', 8, '', NULL, '2021-10-25 16:55:49', '2021-10-25 16:56:17', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 1),
(31, 8, '2021-10-25', '1515', 200, '1515', '', 3, 'pruebas', NULL, '2021-10-25 17:16:15', '2021-10-25 17:16:31', 0, 1, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 8, 1, 1, 1),
(32, 9, '2021-10-25', '1515', 240, '255', '', 8, '', NULL, '2021-10-25 17:22:35', '2021-10-25 17:23:36', 0, 1, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 9, 1, 1, 1),
(33, 10, '2021-10-25', '123', 400, '11', '', 2, '', NULL, '2021-10-25 19:56:34', '2021-10-25 19:56:49', 0, 4, 1, 1, 1, 2, 1, 1, 1, NULL, 2, 2, NULL, NULL, NULL, NULL, 10, 1, 1, 1),
(34, 11, '2021-10-25', '111', 200, '111', '', 2, '', NULL, '2021-10-25 20:08:11', '2021-10-25 20:18:09', 0, 4, 1, 1, 1, 2, 1, 2, 2, NULL, 2, 2, NULL, NULL, NULL, NULL, 11, 1, 1, 1),
(35, 12, '2021-10-25', '1111', 200, '111', '', 5, '', NULL, '2021-10-25 22:12:23', '2021-10-25 22:22:15', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 12, 1, 1, 1),
(36, 13, '2021-10-27', '151', 95, 'xxx', '', 6, '', '---', '2021-10-27 08:55:58', '2021-10-27 08:56:11', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 1, 1, 1),
(37, 14, '2021-10-27', NULL, 90, '111', '', 6, '', '11', '2021-10-27 10:01:54', '2021-10-27 10:02:16', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, 1, 1, 1),
(38, 15, '2021-10-27', '122', 100, '111', '', 2, '', NULL, '2021-10-27 10:02:32', '2021-10-27 10:02:41', 0, 4, 1, 1, 1, 2, 1, 1, 1, NULL, 2, 2, NULL, NULL, NULL, NULL, 15, 1, 1, 1),
(39, 16, '2021-10-27', '111', 5, '11', '', 5, '', NULL, '2021-10-27 10:02:59', '2021-10-27 10:03:08', 0, 2, 1, 1, 1, 2, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 16, 1, 1, 1),
(40, 17, '2021-10-27', '111', 20, '11', '', 3, '', NULL, '2021-10-27 10:03:33', '2021-10-27 10:03:44', 0, 2, 1, 1, 1, 2, 1, 2, 1, NULL, NULL, NULL, 2, NULL, NULL, NULL, 17, 1, 1, 1),
(41, 18, '2021-10-27', '111', 5, 'xxx', '', 7, '', NULL, '2021-10-27 10:03:59', '2021-10-27 10:04:10', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, 18, 1, 1, 1),
(42, 19, '2021-10-27', '111', 5, '11', '', 8, '', NULL, '2021-10-27 10:04:26', '2021-10-27 10:04:36', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 19, 1, 1, 1),
(43, 1, '2021-10-27', '1515', 111, '111', '', 2, '', NULL, '2021-10-27 11:24:54', '2021-10-27 11:25:04', 0, 4, 1, 1, 2, 2, 1, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_despachom`
--

CREATE TABLE `material_despachom` (
  `ID_DESPACHO` bigint(20) NOT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `NUMERO_DOCUMENTO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CANTIDAD_DESPACHO` int(11) DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TDESPACHO` int(11) DEFAULT NULL,
  `OBSERVACIONES` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REGALO_DESPACHO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_DESPACHO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_TDOCUMENTO` bigint(20) NOT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_BODEGA` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_BODEGA2` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_PROVEEDOR` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_CLIENTE` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_despachom`
--

INSERT INTO `material_despachom` (`ID_DESPACHO`, `NUMERO_DESPACHO`, `FECHA_DESPACHO`, `NUMERO_DOCUMENTO`, `CANTIDAD_DESPACHO`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TDESPACHO`, `OBSERVACIONES`, `REGALO_DESPACHO`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_DESPACHO`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_TDOCUMENTO`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_BODEGA`, `ID_PLANTA2`, `ID_BODEGA2`, `ID_PRODUCTOR`, `ID_PROVEEDOR`, `ID_PLANTA3`, `ID_CLIENTE`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-21', '11', 1000, '11', '', 1, '', NULL, '2021-09-21 09:58:38', '2021-09-21 17:42:31', 0, 2, 1, 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(2, 2, '2021-09-21', '11', 1000, '11', '', 2, '', NULL, '2021-09-21 10:00:04', '2021-09-22 09:46:51', 0, 4, 1, 1, 1, 2, 1, 1, 1, NULL, 2, 2, NULL, NULL, NULL, NULL, 1, 1),
(3, 3, '2021-09-21', '11', 1000, '11', '', 3, '', NULL, '2021-09-21 10:00:38', '2021-09-21 12:38:30', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1),
(4, 4, '2021-09-21', '11', 500, '11', '', 4, '', NULL, '2021-09-21 10:00:47', '2021-09-21 12:39:10', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1),
(5, 5, '2021-09-21', '11', 500, '11', '', 6, '', NULL, '2021-09-21 10:02:27', '2021-09-21 12:39:22', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(6, 6, '2021-09-21', '11', 500, '11', '', 5, '', NULL, '2021-09-21 10:02:32', '2021-09-21 12:56:20', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1),
(11, 7, '2021-09-21', '15', 500, 'ppp', '', 4, '', NULL, '2021-09-21 12:39:46', '2021-09-21 12:50:25', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1),
(12, 8, '2021-09-21', '111', 500, '111', '', 4, '', NULL, '2021-09-21 12:41:42', '2021-09-21 12:50:37', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1),
(13, 9, '2021-09-21', '111', 500, 'sss', '', 5, '', NULL, '2021-09-21 12:56:41', '2021-09-21 12:57:19', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1),
(14, 10, '2021-09-22', '151', 12, 'jjj', '', 2, '', NULL, '2021-09-22 23:21:55', '2021-10-27 11:25:43', 0, 4, 1, 1, 1, 2, 1, 1, 1, NULL, 2, 2, NULL, NULL, NULL, NULL, 1, 1),
(15, 11, '2021-10-22', '1123', 5000, 'aa', '', 3, '', NULL, '2021-10-22 11:44:10', '2021-10-22 11:44:17', 0, 2, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 1),
(16, 12, '2021-10-22', 'sss', 0, '11', '', 5, '', NULL, '2021-10-22 12:28:23', '2021-10-22 12:28:23', 1, 1, 1, 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1),
(17, 1, '2021-10-27', '11', 500, '111', '', 2, '', NULL, '2021-10-27 11:25:22', '2021-10-27 11:25:28', 0, 2, 1, 1, 2, 2, 1, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_dficha`
--

CREATE TABLE `material_dficha` (
  `ID_DFICHA` bigint(20) NOT NULL,
  `FACTOR_CONSUMO_DFICHA` decimal(11,5) DEFAULT NULL,
  `CONSUMO_PALLET_DFICHA` decimal(11,2) DEFAULT NULL,
  `PALLET_CARGA_DFICHA` int(11) DEFAULT NULL,
  `CONSUMO_CONTENEDOR_DFICHA` decimal(11,2) DEFAULT NULL,
  `OBSERVACIONES_DFICHA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_FICHA` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_dficha`
--

INSERT INTO `material_dficha` (`ID_DFICHA`, `FACTOR_CONSUMO_DFICHA`, `CONSUMO_PALLET_DFICHA`, `PALLET_CARGA_DFICHA`, `CONSUMO_CONTENEDOR_DFICHA`, `OBSERVACIONES_DFICHA`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_FICHA`, `ID_PRODUCTO`) VALUES
(1, '0.00450', '1.08', 10, '10.80', '2', NULL, NULL, 0, 1, 1, 2),
(2, '5.00000', '1560.00', 10, '15600.00', '2', NULL, NULL, 0, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_docompra`
--

CREATE TABLE `material_docompra` (
  `ID_DOCOMPRA` bigint(20) NOT NULL,
  `CANTIDAD_DOCOMPRA` int(11) DEFAULT NULL,
  `CANTIDAD_INGRESADA_DOCOMPRA` int(11) DEFAULT NULL,
  `VALOR_UNITARIO_DOCOMPRA` decimal(11,5) DEFAULT NULL,
  `DESCRIPCION_DOCOMPRA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `ID_TUMEDIDA` bigint(20) NOT NULL,
  `ID_OCOMPRA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_docompra`
--

INSERT INTO `material_docompra` (`ID_DOCOMPRA`, `CANTIDAD_DOCOMPRA`, `CANTIDAD_INGRESADA_DOCOMPRA`, `VALOR_UNITARIO_DOCOMPRA`, `DESCRIPCION_DOCOMPRA`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PRODUCTO`, `ID_TUMEDIDA`, `ID_OCOMPRA`) VALUES
(1, 500, 0, '15.00000', NULL, 1, 0, '2021-08-18 12:00:45', '2021-08-18 12:01:02', 1, 1, 1),
(2, 2000, 0, '15.00000', NULL, 1, 1, '2021-08-18 12:01:13', '2021-08-18 12:01:13', 1, 1, 1),
(3, 100, 0, '10.00000', NULL, 1, 0, '2021-08-18 21:05:11', '2021-08-18 21:11:30', 1, 1, 2),
(4, 100, 0, '15.00000', NULL, 1, 0, '2021-08-18 21:12:53', '2021-08-18 21:15:17', 1, 1, 2),
(5, 100, 0, '15.03000', NULL, 1, 1, '2021-08-18 21:15:32', '2021-08-18 21:15:32', 2, 1, 2),
(6, 10000, 0, '15.00000', NULL, 1, 1, '2021-08-18 21:32:22', '2021-09-20 22:19:42', 1, 1, 3),
(7, 200, 0, '15.00000', NULL, 1, 0, '2021-10-13 11:39:36', '2021-10-13 11:39:58', 1, 1, 4),
(8, 200, 0, '15.00000', NULL, 1, 0, '2021-10-13 11:39:51', '2021-10-13 11:39:56', 1, 1, 4),
(9, 500, 0, '15.00000', NULL, 1, 1, '2021-10-13 13:55:16', '2021-10-13 13:55:24', 1, 1, 4),
(10, 500, 0, '15.00000', NULL, 1, 1, '2021-10-13 13:55:30', '2021-10-13 13:55:30', 2, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_drecepcionm`
--

CREATE TABLE `material_drecepcionm` (
  `ID_DRECEPCION` bigint(20) NOT NULL,
  `NUMERO_DRECEPCION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESCRIPCION_DRECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CANTIDAD_DOCOMPRA` int(11) DEFAULT NULL,
  `CANTIDAD_DRECEPCION` int(11) DEFAULT NULL,
  `VALOR_UNITARIO_DRECEPCION` decimal(11,5) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_RECEPCION` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `ID_TUMEDIDA` bigint(20) NOT NULL,
  `ID_DOCOMPRA` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_drecepcionm`
--

INSERT INTO `material_drecepcionm` (`ID_DRECEPCION`, `NUMERO_DRECEPCION`, `DESCRIPCION_DRECEPCION`, `CANTIDAD_DOCOMPRA`, `CANTIDAD_DRECEPCION`, `VALOR_UNITARIO_DRECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_RECEPCION`, `ID_PRODUCTO`, `ID_TUMEDIDA`, `ID_DOCOMPRA`) VALUES
(1, NULL, '', NULL, 5000, '15.00000', 0, 1, '2021-08-20 10:21:25', '2021-10-18 16:13:25', 1, 1, 1, 2),
(2, NULL, '', NULL, 5000, '0.00000', 0, 1, '2021-09-20 16:45:10', '2021-10-18 16:09:00', 2, 1, 1, NULL),
(3, NULL, '', NULL, NULL, '0.00000', 1, 0, '2021-09-20 16:57:13', '2021-09-20 17:00:20', 2, 1, 1, NULL),
(4, NULL, '', NULL, NULL, '0.00000', 1, 0, '2021-09-20 17:00:31', '2021-09-20 17:00:45', 2, 1, 1, NULL),
(5, NULL, '', NULL, 5000, '0.00000', 1, 0, '2021-09-20 17:13:52', '2021-09-20 17:24:51', 2, 1, 1, NULL),
(6, NULL, '', NULL, 500, '0.00000', 0, 1, '2021-09-22 23:09:55', '2021-09-22 23:11:21', 3, 2, 1, NULL),
(7, NULL, '', NULL, 500, '0.00000', 0, 1, '2021-09-22 23:11:01', '2021-09-22 23:11:21', 3, 2, 1, NULL),
(8, NULL, '', NULL, 500, '0.00000', 0, 1, '2021-10-05 15:13:11', '2021-10-18 16:13:56', 4, 2, 1, NULL),
(9, NULL, '', NULL, 500, '0.00000', 0, 1, '2021-10-05 15:13:20', '2021-10-18 16:13:56', 4, 2, 1, NULL),
(10, NULL, '', NULL, 100, '15.03000', 1, 0, '2021-10-05 15:14:32', '2021-10-18 13:43:11', 5, 2, 1, 5),
(11, NULL, '', NULL, 500, '0.00000', 0, 1, '2021-10-05 15:16:42', '2021-10-18 16:14:19', 5, 2, 1, NULL),
(12, NULL, '', NULL, 500, '0.00000', 0, 1, '2021-10-18 15:51:43', '2021-10-22 09:47:39', 7, 2, 1, NULL),
(13, NULL, 'ssss', NULL, 500, '0.00000', 0, 1, '2021-10-18 20:34:23', '2021-10-18 20:34:54', 6, 2, 1, NULL),
(14, NULL, '', NULL, 500, '0.00000', 0, 1, '2021-10-18 22:00:40', '2021-10-22 09:47:39', 7, 1, 1, NULL),
(15, NULL, '', NULL, 5000, '0.00000', 0, 1, '2021-10-22 09:12:48', '2021-10-22 09:44:14', 10, 1, 1, NULL),
(16, NULL, NULL, NULL, 0, '15.03000', 1, 0, '2021-10-22 09:13:12', '2021-10-22 09:14:05', 10, 2, 1, 5),
(17, NULL, '', NULL, 10000, '15.00000', 0, 1, '2021-10-22 09:20:05', '2021-10-22 09:44:14', 10, 1, 1, 6),
(18, NULL, NULL, NULL, 0, '15.03000', 1, 1, '2021-10-22 11:13:16', '2021-10-22 11:13:16', 8, 2, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_familia`
--

CREATE TABLE `material_familia` (
  `ID_FAMILIA` bigint(20) NOT NULL,
  `NUMERO_FAMILIA` int(11) DEFAULT NULL,
  `NOMBRE_FAMILIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_familia`
--

INSERT INTO `material_familia` (`ID_FAMILIA`, `NUMERO_FAMILIA`, `NOMBRE_FAMILIA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'familia 1', 1, '2021-07-30', '2021-07-30', 1, 1, 1),
(2, 2, 'familia 2', 1, '2021-07-30', '2021-07-30', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_ficha`
--

CREATE TABLE `material_ficha` (
  `ID_FICHA` bigint(20) NOT NULL,
  `NUMERO_FICHA` int(11) DEFAULT NULL,
  `OBSERVACIONES_FICHA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_ESTANDAR` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_ficha`
--

INSERT INTO `material_ficha` (`ID_FICHA`, `NUMERO_FICHA`, `OBSERVACIONES_FICHA`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_TEMPORADA`, `ID_ESTANDAR`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '', 1, 1, '2021-10-07 11:58:01', '2021-10-07 11:58:39', 1, 2, 1, 1, 1),
(2, 2, '', 0, 1, '2021-10-07 12:43:09', '2021-10-07 12:43:25', 1, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_folio`
--

CREATE TABLE `material_folio` (
  `ID_FOLIO` bigint(20) NOT NULL,
  `NUMERO_FOLIO` int(10) DEFAULT NULL,
  `ALIAS_DINAMICO_FOLIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_ESTATICO_FOLIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TFOLIO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_folio`
--

INSERT INTO `material_folio` (`ID_FOLIO`, `NUMERO_FOLIO`, `ALIAS_DINAMICO_FOLIO`, `ALIAS_ESTATICO_FOLIO`, `TFOLIO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 11120000, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:', '11120000', 1, 1, NULL, NULL, 1, 1, 2, 1, 1),
(2, 21120000, '11220000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:ENVASES_TEMPORADA:2020-2021_NUMEROFOLIO:', '21120000', 2, 1, NULL, NULL, 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_fpago`
--

CREATE TABLE `material_fpago` (
  `ID_FPAGO` bigint(20) NOT NULL,
  `NUMERO_FPAGO` int(11) DEFAULT NULL,
  `NOMBRE_FPAGO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_FPAGO` date DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_fpago`
--

INSERT INTO `material_fpago` (`ID_FPAGO`, `NUMERO_FPAGO`, `NOMBRE_FPAGO`, `FECHA_FPAGO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'formato pago 1', NULL, 1, '2021-07-31', '2021-08-18', 1, 1, 1),
(2, 2, 'formato pago 2', NULL, 1, '2021-08-18', '2021-08-18', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_inventarioe`
--

CREATE TABLE `material_inventarioe` (
  `ID_INVENTARIO` bigint(20) NOT NULL,
  `TRECEPCION` int(11) DEFAULT NULL,
  `VALOR_UNITARIO` decimal(11,5) DEFAULT NULL,
  `CANTIDAD_ENTRADA` int(11) DEFAULT NULL,
  `CANTIDAD_SALIDA` int(11) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_BODEGA` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `ID_TUMEDIDA` bigint(20) NOT NULL,
  `ID_RECEPCION` bigint(20) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) DEFAULT NULL,
  `ID_BODEGA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_DOCOMPRA` bigint(20) DEFAULT NULL,
  `ID_DESPACHO2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_inventarioe`
--

INSERT INTO `material_inventarioe` (`ID_INVENTARIO`, `TRECEPCION`, `VALOR_UNITARIO`, `CANTIDAD_ENTRADA`, `CANTIDAD_SALIDA`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_BODEGA`, `ID_PRODUCTO`, `ID_TUMEDIDA`, `ID_RECEPCION`, `ID_DESPACHO`, `ID_BODEGA2`, `ID_PLANTA2`, `ID_DOCOMPRA`, `ID_DESPACHO2`) VALUES
(66, 1, '0.00000', 1300, 0, 1, 1, '2021-10-25 16:21:21', '2021-10-25 16:21:21', 1, 1, 2, 1, 1, 1, 18, NULL, NULL, NULL, NULL, NULL),
(67, 1, '0.00000', 200, 0, 1, 1, '2021-10-25 16:21:35', '2021-10-25 16:21:35', 1, 1, 2, 1, 1, 1, 19, NULL, NULL, NULL, NULL, NULL),
(68, 1, '0.00000', 400, 0, 1, 1, '2021-10-25 16:21:35', '2021-10-25 16:21:35', 1, 1, 2, 1, 2, 1, 19, NULL, NULL, NULL, NULL, NULL),
(69, 1, '0.00000', 200, 0, 1, 1, '2021-10-25 16:21:51', '2021-10-25 16:21:51', 1, 1, 2, 1, 1, 1, 20, NULL, NULL, NULL, NULL, NULL),
(70, 1, '0.00000', 400, 0, 1, 1, '2021-10-25 16:21:51', '2021-10-25 16:21:51', 1, 1, 2, 1, 2, 1, 20, NULL, NULL, NULL, NULL, NULL),
(71, 2, '0.00000', 240, 0, 1, 1, '2021-10-25 16:22:01', '2021-10-25 16:22:01', 1, 1, 2, 1, 1, 1, 21, NULL, NULL, NULL, NULL, NULL),
(72, 1, '0.00000', 240, 0, 1, 1, '2021-10-25 16:22:10', '2021-10-25 16:22:10', 1, 1, 2, 1, 1, 1, 22, NULL, NULL, NULL, NULL, NULL),
(73, 1, '0.00000', 240, 0, 1, 1, '2021-10-25 16:22:21', '2021-10-25 16:22:21', 1, 1, 2, 1, 2, 1, 23, NULL, NULL, NULL, NULL, NULL),
(74, 1, '0.00000', 240, 0, 1, 1, '2021-10-25 16:22:33', '2021-10-25 16:22:33', 1, 1, 2, 1, 1, 1, 24, NULL, NULL, NULL, NULL, NULL),
(75, NULL, NULL, 0, 200, 1, 1, '2021-10-25 16:41:06', '2021-10-25 16:41:06', 1, 1, 2, 1, 1, 1, NULL, 23, NULL, NULL, NULL, NULL),
(76, NULL, NULL, 0, 15, 1, 1, '2021-10-25 16:41:28', '2021-10-25 16:41:28', 1, 1, 2, 1, 1, 1, NULL, 24, NULL, NULL, NULL, NULL),
(77, NULL, NULL, 0, 240, 1, 1, '2021-10-25 16:42:05', '2021-10-25 16:42:05', 1, 1, 2, 1, 1, 1, NULL, 27, NULL, NULL, NULL, NULL),
(78, NULL, NULL, 0, 200, 1, 1, '2021-10-25 16:42:11', '2021-10-25 16:42:11', 1, 1, 2, 1, 1, 1, NULL, 25, NULL, NULL, NULL, NULL),
(79, NULL, NULL, 0, 240, 1, 1, '2021-10-25 16:42:29', '2021-10-25 16:42:29', 1, 1, 2, 1, 1, 1, NULL, 26, NULL, NULL, NULL, NULL),
(80, NULL, NULL, 0, 240, 1, 1, '2021-10-25 16:42:48', '2021-10-25 16:42:48', 1, 1, 2, 1, 2, 1, NULL, 29, NULL, NULL, NULL, NULL),
(81, NULL, NULL, 0, 500, 1, 1, '2021-10-25 16:56:14', '2021-10-25 16:56:14', 1, 1, 2, 1, 1, 1, NULL, 30, NULL, NULL, NULL, NULL),
(82, NULL, NULL, 0, 200, 1, 1, '2021-10-25 17:16:31', '2021-10-25 17:16:31', 1, 1, 2, 1, 2, 1, NULL, 31, NULL, NULL, NULL, NULL),
(83, NULL, NULL, 0, 240, 1, 1, '2021-10-25 17:23:36', '2021-10-25 17:23:36', 1, 1, 2, 1, 1, 1, NULL, 32, NULL, NULL, NULL, NULL),
(84, NULL, NULL, 240, 0, 1, 1, '2021-10-25 19:44:32', '2021-10-25 19:44:32', 1, 2, 2, 2, 2, 1, NULL, NULL, NULL, 1, NULL, 32),
(85, NULL, NULL, 200, 0, 1, 1, '2021-10-25 19:44:55', '2021-10-25 19:44:55', 1, 2, 2, 2, 1, 1, NULL, NULL, NULL, 1, NULL, 35),
(86, NULL, NULL, 0, 400, 1, 1, '2021-10-25 19:56:49', '2021-10-25 19:56:49', 1, 1, 2, 1, 2, 1, NULL, 33, NULL, NULL, NULL, NULL),
(87, NULL, NULL, 400, 0, 1, 1, '2021-10-25 20:06:35', '2021-10-25 20:06:35', 1, 2, 2, 2, 2, 1, NULL, NULL, NULL, 1, NULL, 33),
(88, NULL, NULL, 0, 200, 1, 1, '2021-10-25 20:08:22', '2021-10-25 20:08:22', 1, 1, 2, 1, 2, 1, NULL, 34, NULL, NULL, NULL, NULL),
(89, NULL, NULL, 200, 0, 1, 1, '2021-10-25 20:18:25', '2021-10-25 20:18:25', 1, 2, 2, 2, 2, 1, NULL, NULL, NULL, 1, NULL, 34),
(90, NULL, NULL, 0, 200, 1, 1, '2021-10-25 22:22:15', '2021-10-25 22:22:15', 1, 1, 2, 1, 1, 1, NULL, 35, NULL, NULL, NULL, NULL),
(91, NULL, NULL, 0, 95, 1, 1, '2021-10-27 08:56:11', '2021-10-27 08:56:11', 1, 1, 2, 1, 1, 1, NULL, 36, NULL, NULL, NULL, NULL),
(92, NULL, NULL, 0, 90, 1, 1, '2021-10-27 10:02:16', '2021-10-27 10:02:16', 1, 1, 2, 1, 1, 1, NULL, 37, NULL, NULL, NULL, NULL),
(93, NULL, NULL, 0, 100, 1, 1, '2021-10-27 10:02:42', '2021-10-27 10:02:42', 1, 1, 2, 1, 1, 1, NULL, 38, NULL, NULL, NULL, NULL),
(94, NULL, NULL, 0, 5, 1, 1, '2021-10-27 10:03:09', '2021-10-27 10:03:09', 1, 1, 2, 1, 1, 1, NULL, 39, NULL, NULL, NULL, NULL),
(95, NULL, NULL, 0, 20, 1, 1, '2021-10-27 10:03:44', '2021-10-27 10:03:44', 1, 1, 2, 1, 1, 1, NULL, 40, NULL, NULL, NULL, NULL),
(96, NULL, NULL, 0, 5, 1, 1, '2021-10-27 10:04:10', '2021-10-27 10:04:10', 1, 1, 2, 1, 1, 1, NULL, 41, NULL, NULL, NULL, NULL),
(97, NULL, NULL, 0, 5, 1, 1, '2021-10-27 10:04:36', '2021-10-27 10:04:36', 1, 1, 2, 1, 1, 1, NULL, 42, NULL, NULL, NULL, NULL),
(98, NULL, NULL, 100, 0, 1, 1, '2021-10-27 11:14:23', '2021-10-27 11:14:23', 1, 2, 2, 2, 1, 1, NULL, NULL, NULL, 1, NULL, 38),
(99, NULL, NULL, 0, 111, 1, 1, '2021-10-27 11:25:02', '2021-10-27 11:25:02', 1, 2, 2, 2, 1, 1, NULL, 43, NULL, NULL, NULL, NULL),
(100, NULL, NULL, 0, 111, 1, 1, '2021-10-27 11:26:02', '2021-10-27 11:26:02', 1, 1, 2, 1, 1, 1, NULL, NULL, NULL, 2, NULL, 43),
(101, 2, '0.00000', 240, 0, 1, 1, '2021-10-28 00:59:32', '2021-10-28 00:59:32', 1, 1, 2, 1, 1, 1, 25, NULL, NULL, NULL, NULL, NULL),
(102, 2, '0.00000', 480, 0, 1, 1, '2021-10-28 00:59:32', '2021-10-28 00:59:32', 1, 1, 2, 1, 2, 1, 25, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_inventariom`
--

CREATE TABLE `material_inventariom` (
  `ID_INVENTARIO` bigint(20) NOT NULL,
  `FOLIO_INVENTARIO` int(11) DEFAULT NULL,
  `FOLIO_AUXILIAR_INVENTARIO` int(11) DEFAULT NULL,
  `ALIAS_DINAMICO_FOLIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_ESTATICO_FOLIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TRECEPCION` int(11) DEFAULT NULL,
  `VALOR_UNITARIO` decimal(11,5) DEFAULT NULL,
  `CANTIDAD_INVENTARIO` int(11) DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `FECHA_DESPACHO` date DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_BODEGA` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `ID_TCONTENEDOR` bigint(20) NOT NULL,
  `ID_TUMEDIDA` bigint(20) NOT NULL,
  `ID_RECEPCION` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PLANTA3` bigint(20) DEFAULT NULL,
  `ID_PROVEEDOR` bigint(20) DEFAULT NULL,
  `ID_OCOMPRA` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) DEFAULT NULL,
  `ID_DESPACHO2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_inventariom`
--

INSERT INTO `material_inventariom` (`ID_INVENTARIO`, `FOLIO_INVENTARIO`, `FOLIO_AUXILIAR_INVENTARIO`, `ALIAS_DINAMICO_FOLIO`, `ALIAS_ESTATICO_FOLIO`, `TRECEPCION`, `VALOR_UNITARIO`, `CANTIDAD_INVENTARIO`, `FECHA_RECEPCION`, `FECHA_DESPACHO`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_BODEGA`, `ID_FOLIO`, `ID_PRODUCTO`, `ID_TCONTENEDOR`, `ID_TUMEDIDA`, `ID_RECEPCION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PROVEEDOR`, `ID_OCOMPRA`, `ID_PRODUCTOR`, `ID_DESPACHO`, `ID_DESPACHO2`) VALUES
(1, 11120001, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120001', '11120001', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 14, NULL),
(2, 11120002, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120002', '11120002', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 14, NULL),
(3, 11120003, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120003', '11120003', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 14, NULL),
(4, 11120004, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120004', '11120004', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 14, NULL),
(5, 11120005, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120005', '11120005', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 11120006, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120006', '11120006', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 11120007, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120007', '11120007', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 11120008, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120008', '11120008', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 11120009, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120009', '11120009', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 11120010, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120010', '11120010', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11120011, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120011', '11120011', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 11120012, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120012', '11120012', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 11120013, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120013', '11120013', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 11120014, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120014', '11120014', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 11120015, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120015', '11120015', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 11120016, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120016', '11120016', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 11120017, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120017', '11120017', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 11120018, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120018', '11120018', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 11120019, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120019', '11120019', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 11120020, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120020', '11120020', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 11120021, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120021', '11120021', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 11120022, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120022', '11120022', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 11120023, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120023', '11120023', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 11120024, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120024', '11120024', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 11120025, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120025', '11120025', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 11120026, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120026', '11120026', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 11120027, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120027', '11120027', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 11120028, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120028', '11120028', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 11120029, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120029', '11120029', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 11120030, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120030', '11120030', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 11120031, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120031', '11120031', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 11120032, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120032', '11120032', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 11120033, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120033', '11120033', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 11120034, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120034', '11120034', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 11120035, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120035', '11120035', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 11120036, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120036', '11120036', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 11120037, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120037', '11120037', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 11120038, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120038', '11120038', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 11120039, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120039', '11120039', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 11120040, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120040', '11120040', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 11120041, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120041', '11120041', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 11120042, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120042', '11120042', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 11120043, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120043', '11120043', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 11120044, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120044', '11120044', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 11120045, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120045', '11120045', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 11120046, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120046', '11120046', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 11120047, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120047', '11120047', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 11120048, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120048', '11120048', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 11120049, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120049', '11120049', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 11120050, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120050', '11120050', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 11120051, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120051', '11120051', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 11120052, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120052', '11120052', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 11120053, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120053', '11120053', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 11120054, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120054', '11120054', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 11120055, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120055', '11120055', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 11120056, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120056', '11120056', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 11120057, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120057', '11120057', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 11120058, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120058', '11120058', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 11120059, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120059', '11120059', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 11120060, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120060', '11120060', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 11120061, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120061', '11120061', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 11120062, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120062', '11120062', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 11120063, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120063', '11120063', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 11120064, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120064', '11120064', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 11120065, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120065', '11120065', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 11120066, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120066', '11120066', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 11120067, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120067', '11120067', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 11120068, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120068', '11120068', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 11120069, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120069', '11120069', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 11120070, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120070', '11120070', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 11120071, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120071', '11120071', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 11120072, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120072', '11120072', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 11120073, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120073', '11120073', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 11120074, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120074', '11120074', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 11120075, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120075', '11120075', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 11120076, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120076', '11120076', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 11120077, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120077', '11120077', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 11120078, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120078', '11120078', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 11120079, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120079', '11120079', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 11120080, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120080', '11120080', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 11120081, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120081', '11120081', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 11120082, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120082', '11120082', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 11120083, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120083', '11120083', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 11120084, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120084', '11120084', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 11120085, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120085', '11120085', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 11120086, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120086', '11120086', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 11120087, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120087', '11120087', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 11120088, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120088', '11120088', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 11120089, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120089', '11120089', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 11120090, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120090', '11120090', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 11120091, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120091', '11120091', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 11120092, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120092', '11120092', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 11120093, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120093', '11120093', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 11120094, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120094', '11120094', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 11120095, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120095', '11120095', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 11120096, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120096', '11120096', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 11120097, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120097', '11120097', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 11120098, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120098', '11120098', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 11120099, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120099', '11120099', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 11120100, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120100', '11120100', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 11120101, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120101', '11120101', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 11120102, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120102', '11120102', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 11120103, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120103', '11120103', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 11120104, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120104', '11120104', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 11120105, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120105', '11120105', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 11120106, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120106', '11120106', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 11120107, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120107', '11120107', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 11120108, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120108', '11120108', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 11120109, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120109', '11120109', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 11120110, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120110', '11120110', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 11120111, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120111', '11120111', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 11120112, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120112', '11120112', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 11120113, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120113', '11120113', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 11120114, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120114', '11120114', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 11120115, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120115', '11120115', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 11120116, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120116', '11120116', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 11120117, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120117', '11120117', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 11120118, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120118', '11120118', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 11120119, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120119', '11120119', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 11120120, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120120', '11120120', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 11120121, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120121', '11120121', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 11120122, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120122', '11120122', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 11120123, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120123', '11120123', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 11120124, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120124', '11120124', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 11120125, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120125', '11120125', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 11120126, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120126', '11120126', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 11120127, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120127', '11120127', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 11120128, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120128', '11120128', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 11120129, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120129', '11120129', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 11120130, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120130', '11120130', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 11120131, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120131', '11120131', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 11120132, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120132', '11120132', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 11120133, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120133', '11120133', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 11120134, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120134', '11120134', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 11120135, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120135', '11120135', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 11120136, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120136', '11120136', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 11120137, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120137', '11120137', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 11120138, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120138', '11120138', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 11120139, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120139', '11120139', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 11120140, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120140', '11120140', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 11120141, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120141', '11120141', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 11120142, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120142', '11120142', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 11120143, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120143', '11120143', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 11120144, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120144', '11120144', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 11120145, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120145', '11120145', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 11120146, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120146', '11120146', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 11120147, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120147', '11120147', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 11120148, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120148', '11120148', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 11120149, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120149', '11120149', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 11120150, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120150', '11120150', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 11120151, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120151', '11120151', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 11120152, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120152', '11120152', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 11120153, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120153', '11120153', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 11120154, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120154', '11120154', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 11120155, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120155', '11120155', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 11120156, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120156', '11120156', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 11120157, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120157', '11120157', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 11120158, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120158', '11120158', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 11120159, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120159', '11120159', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 11120160, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120160', '11120160', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 11120161, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120161', '11120161', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 11120162, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120162', '11120162', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 11120163, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120163', '11120163', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 11120164, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120164', '11120164', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 11120165, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120165', '11120165', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 11120166, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120166', '11120166', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 11120167, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120167', '11120167', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `material_inventariom` (`ID_INVENTARIO`, `FOLIO_INVENTARIO`, `FOLIO_AUXILIAR_INVENTARIO`, `ALIAS_DINAMICO_FOLIO`, `ALIAS_ESTATICO_FOLIO`, `TRECEPCION`, `VALOR_UNITARIO`, `CANTIDAD_INVENTARIO`, `FECHA_RECEPCION`, `FECHA_DESPACHO`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_BODEGA`, `ID_FOLIO`, `ID_PRODUCTO`, `ID_TCONTENEDOR`, `ID_TUMEDIDA`, `ID_RECEPCION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PROVEEDOR`, `ID_OCOMPRA`, `ID_PRODUCTOR`, `ID_DESPACHO`, `ID_DESPACHO2`) VALUES
(168, 11120168, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120168', '11120168', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 11120169, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120169', '11120169', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 11120170, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120170', '11120170', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 11120171, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120171', '11120171', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 11120172, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120172', '11120172', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 11120173, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120173', '11120173', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 11120174, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120174', '11120174', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 11120175, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120175', '11120175', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 11120176, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120176', '11120176', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 11120177, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120177', '11120177', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 11120178, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120178', '11120178', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 11120179, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120179', '11120179', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 11120180, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120180', '11120180', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 11120181, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120181', '11120181', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 11120182, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120182', '11120182', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 11120183, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120183', '11120183', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 11120184, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120184', '11120184', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 11120185, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120185', '11120185', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 11120186, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120186', '11120186', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 11120187, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120187', '11120187', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 11120188, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120188', '11120188', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 11120189, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120189', '11120189', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 11120190, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120190', '11120190', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 11120191, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120191', '11120191', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 11120192, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120192', '11120192', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 11120193, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120193', '11120193', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 11120194, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120194', '11120194', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 11120195, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120195', '11120195', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 11120196, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120196', '11120196', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 11120197, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120197', '11120197', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 11120198, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120198', '11120198', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 11120199, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120199', '11120199', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 11120200, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120200', '11120200', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 11120201, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120201', '11120201', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 11120202, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120202', '11120202', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 11120203, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120203', '11120203', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 11120204, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120204', '11120204', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 11120205, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120205', '11120205', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 11120206, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120206', '11120206', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 11120207, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120207', '11120207', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 11120208, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120208', '11120208', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 11120209, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120209', '11120209', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 11120210, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120210', '11120210', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 11120211, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120211', '11120211', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 11120212, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120212', '11120212', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 11120213, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120213', '11120213', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 11120214, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120214', '11120214', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 11120215, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120215', '11120215', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 11120216, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120216', '11120216', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 11120217, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120217', '11120217', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 11120218, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120218', '11120218', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 11120219, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120219', '11120219', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 11120220, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120220', '11120220', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 11120221, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120221', '11120221', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 11120222, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120222', '11120222', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 11120223, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120223', '11120223', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 11120224, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120224', '11120224', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 11120225, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120225', '11120225', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 11120226, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120226', '11120226', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 11120227, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120227', '11120227', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 11120228, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120228', '11120228', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 11120229, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120229', '11120229', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 11120230, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120230', '11120230', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 11120231, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120231', '11120231', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 11120232, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120232', '11120232', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 11120233, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120233', '11120233', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 11120234, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120234', '11120234', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 11120235, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120235', '11120235', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 11120236, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120236', '11120236', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, 11120237, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120237', '11120237', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, 11120238, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120238', '11120238', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, 11120239, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120239', '11120239', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, 11120240, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120240', '11120240', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, 11120241, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120241', '11120241', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, 11120242, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120242', '11120242', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, 11120243, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120243', '11120243', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, 11120244, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120244', '11120244', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, 11120245, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120245', '11120245', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, 11120246, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120246', '11120246', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, 11120247, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120247', '11120247', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, 11120248, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120248', '11120248', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(249, 11120249, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120249', '11120249', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, 11120250, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120250', '11120250', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, 11120251, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120251', '11120251', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, 11120252, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120252', '11120252', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, 11120253, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120253', '11120253', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, 11120254, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120254', '11120254', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, 11120255, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120255', '11120255', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, 11120256, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120256', '11120256', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, 11120257, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120257', '11120257', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, 11120258, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120258', '11120258', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, 11120259, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120259', '11120259', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, 11120260, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120260', '11120260', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, 11120261, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120261', '11120261', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, 11120262, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120262', '11120262', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(263, 11120263, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120263', '11120263', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, 11120264, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120264', '11120264', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, 11120265, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120265', '11120265', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, 11120266, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120266', '11120266', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, 11120267, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120267', '11120267', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(268, 11120268, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120268', '11120268', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, 11120269, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120269', '11120269', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, 11120270, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120270', '11120270', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, 11120271, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120271', '11120271', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, 11120272, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120272', '11120272', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, 11120273, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120273', '11120273', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, 11120274, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120274', '11120274', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, 11120275, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120275', '11120275', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, 11120276, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120276', '11120276', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, 11120277, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120277', '11120277', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, 11120278, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120278', '11120278', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, 11120279, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120279', '11120279', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, 11120280, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120280', '11120280', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, 11120281, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120281', '11120281', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(282, 11120282, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120282', '11120282', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, 11120283, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120283', '11120283', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(284, 11120284, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120284', '11120284', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, 11120285, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120285', '11120285', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(286, 11120286, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120286', '11120286', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(287, 11120287, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120287', '11120287', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, 11120288, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120288', '11120288', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, 11120289, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120289', '11120289', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, 11120290, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120290', '11120290', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, 11120291, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120291', '11120291', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, 11120292, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120292', '11120292', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, 11120293, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120293', '11120293', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, 11120294, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120294', '11120294', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, 11120295, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120295', '11120295', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, 11120296, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120296', '11120296', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, 11120297, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120297', '11120297', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, 11120298, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120298', '11120298', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, 11120299, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120299', '11120299', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, 11120300, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120300', '11120300', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, 11120301, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120301', '11120301', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, 11120302, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120302', '11120302', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, 11120303, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120303', '11120303', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, 11120304, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120304', '11120304', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, 11120305, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120305', '11120305', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, 11120306, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120306', '11120306', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, 11120307, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120307', '11120307', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 11120308, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120308', '11120308', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 11120309, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120309', '11120309', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, 11120310, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120310', '11120310', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, 11120311, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120311', '11120311', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, 11120312, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120312', '11120312', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, 11120313, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120313', '11120313', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 11120314, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120314', '11120314', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 11120315, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120315', '11120315', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, 11120316, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120316', '11120316', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, 11120317, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120317', '11120317', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 11120318, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120318', '11120318', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, 11120319, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120319', '11120319', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, 11120320, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120320', '11120320', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 11120321, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120321', '11120321', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, 11120322, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120322', '11120322', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 11120323, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120323', '11120323', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, 11120324, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120324', '11120324', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 11120325, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120325', '11120325', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, 11120326, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120326', '11120326', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 11120327, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120327', '11120327', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 11120328, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120328', '11120328', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, 11120329, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120329', '11120329', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, 11120330, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120330', '11120330', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 11120331, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120331', '11120331', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 11120332, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120332', '11120332', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 11120333, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120333', '11120333', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 11120334, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120334', '11120334', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `material_inventariom` (`ID_INVENTARIO`, `FOLIO_INVENTARIO`, `FOLIO_AUXILIAR_INVENTARIO`, `ALIAS_DINAMICO_FOLIO`, `ALIAS_ESTATICO_FOLIO`, `TRECEPCION`, `VALOR_UNITARIO`, `CANTIDAD_INVENTARIO`, `FECHA_RECEPCION`, `FECHA_DESPACHO`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_BODEGA`, `ID_FOLIO`, `ID_PRODUCTO`, `ID_TCONTENEDOR`, `ID_TUMEDIDA`, `ID_RECEPCION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PROVEEDOR`, `ID_OCOMPRA`, `ID_PRODUCTOR`, `ID_DESPACHO`, `ID_DESPACHO2`) VALUES
(335, 11120335, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120335', '11120335', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 11120336, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120336', '11120336', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 11120337, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120337', '11120337', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 11120338, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120338', '11120338', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 11120339, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120339', '11120339', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 11120340, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120340', '11120340', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, 11120341, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120341', '11120341', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(342, 11120342, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120342', '11120342', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, 11120343, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120343', '11120343', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, 11120344, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120344', '11120344', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, 11120345, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120345', '11120345', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(346, 11120346, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120346', '11120346', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, 11120347, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120347', '11120347', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, 11120348, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120348', '11120348', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(349, 11120349, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120349', '11120349', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(350, 11120350, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120350', '11120350', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(351, 11120351, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120351', '11120351', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(352, 11120352, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120352', '11120352', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(353, 11120353, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120353', '11120353', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(354, 11120354, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120354', '11120354', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(355, 11120355, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120355', '11120355', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, 11120356, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120356', '11120356', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(357, 11120357, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120357', '11120357', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(358, 11120358, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120358', '11120358', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(359, 11120359, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120359', '11120359', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(360, 11120360, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120360', '11120360', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(361, 11120361, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120361', '11120361', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(362, 11120362, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120362', '11120362', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(363, 11120363, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120363', '11120363', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(364, 11120364, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120364', '11120364', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(365, 11120365, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120365', '11120365', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(366, 11120366, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120366', '11120366', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(367, 11120367, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120367', '11120367', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(368, 11120368, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120368', '11120368', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(369, 11120369, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120369', '11120369', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(370, 11120370, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120370', '11120370', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(371, 11120371, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120371', '11120371', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(372, 11120372, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120372', '11120372', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(373, 11120373, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120373', '11120373', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(374, 11120374, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120374', '11120374', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(375, 11120375, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120375', '11120375', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(376, 11120376, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120376', '11120376', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(377, 11120377, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120377', '11120377', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(378, 11120378, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120378', '11120378', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(379, 11120379, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120379', '11120379', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(380, 11120380, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120380', '11120380', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(381, 11120381, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120381', '11120381', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(382, 11120382, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120382', '11120382', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(383, 11120383, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120383', '11120383', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(384, 11120384, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120384', '11120384', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(385, 11120385, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120385', '11120385', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(386, 11120386, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120386', '11120386', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(387, 11120387, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120387', '11120387', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(388, 11120388, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120388', '11120388', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(389, 11120389, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120389', '11120389', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(390, 11120390, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120390', '11120390', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(391, 11120391, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120391', '11120391', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(392, 11120392, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120392', '11120392', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(393, 11120393, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120393', '11120393', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(394, 11120394, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120394', '11120394', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, 11120395, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120395', '11120395', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(396, 11120396, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120396', '11120396', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, 11120397, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120397', '11120397', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(398, 11120398, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120398', '11120398', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(399, 11120399, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120399', '11120399', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(400, 11120400, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120400', '11120400', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(401, 11120401, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120401', '11120401', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(402, 11120402, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120402', '11120402', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(403, 11120403, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120403', '11120403', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(404, 11120404, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120404', '11120404', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(405, 11120405, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120405', '11120405', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(406, 11120406, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120406', '11120406', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(407, 11120407, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120407', '11120407', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(408, 11120408, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120408', '11120408', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(409, 11120409, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120409', '11120409', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(410, 11120410, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120410', '11120410', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(411, 11120411, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120411', '11120411', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(412, 11120412, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120412', '11120412', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, 11120413, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120413', '11120413', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(414, 11120414, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120414', '11120414', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(415, 11120415, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120415', '11120415', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(416, 11120416, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120416', '11120416', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(417, 11120417, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120417', '11120417', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(418, 11120418, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120418', '11120418', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(419, 11120419, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120419', '11120419', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(420, 11120420, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120420', '11120420', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(421, 11120421, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120421', '11120421', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(422, 11120422, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120422', '11120422', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(423, 11120423, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120423', '11120423', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(424, 11120424, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120424', '11120424', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(425, 11120425, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120425', '11120425', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(426, 11120426, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120426', '11120426', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(427, 11120427, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120427', '11120427', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(428, 11120428, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120428', '11120428', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(429, 11120429, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120429', '11120429', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(430, 11120430, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120430', '11120430', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(431, 11120431, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120431', '11120431', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(432, 11120432, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120432', '11120432', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(433, 11120433, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120433', '11120433', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(434, 11120434, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120434', '11120434', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(435, 11120435, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120435', '11120435', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(436, 11120436, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120436', '11120436', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(437, 11120437, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120437', '11120437', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(438, 11120438, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120438', '11120438', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(439, 11120439, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120439', '11120439', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(440, 11120440, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120440', '11120440', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(441, 11120441, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120441', '11120441', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(442, 11120442, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120442', '11120442', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(443, 11120443, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120443', '11120443', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(444, 11120444, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120444', '11120444', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(445, 11120445, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120445', '11120445', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(446, 11120446, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120446', '11120446', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(447, 11120447, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120447', '11120447', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(448, 11120448, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120448', '11120448', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(449, 11120449, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120449', '11120449', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(450, 11120450, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120450', '11120450', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(451, 11120451, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120451', '11120451', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(452, 11120452, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120452', '11120452', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(453, 11120453, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120453', '11120453', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(454, 11120454, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120454', '11120454', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(455, 11120455, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120455', '11120455', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(456, 11120456, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120456', '11120456', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(457, 11120457, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120457', '11120457', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(458, 11120458, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120458', '11120458', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(459, 11120459, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120459', '11120459', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(460, 11120460, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120460', '11120460', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(461, 11120461, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120461', '11120461', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(462, 11120462, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120462', '11120462', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(463, 11120463, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120463', '11120463', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(464, 11120464, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120464', '11120464', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(465, 11120465, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120465', '11120465', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(466, 11120466, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120466', '11120466', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(467, 11120467, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120467', '11120467', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(468, 11120468, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120468', '11120468', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(469, 11120469, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120469', '11120469', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(470, 11120470, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120470', '11120470', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(471, 11120471, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120471', '11120471', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(472, 11120472, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120472', '11120472', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(473, 11120473, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120473', '11120473', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(474, 11120474, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120474', '11120474', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(475, 11120475, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120475', '11120475', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(476, 11120476, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120476', '11120476', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(477, 11120477, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120477', '11120477', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(478, 11120478, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120478', '11120478', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(479, 11120479, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120479', '11120479', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(480, 11120480, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120480', '11120480', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(481, 11120481, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120481', '11120481', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(482, 11120482, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120482', '11120482', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(483, 11120483, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120483', '11120483', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(484, 11120484, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120484', '11120484', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(485, 11120485, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120485', '11120485', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(486, 11120486, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120486', '11120486', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(487, 11120487, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120487', '11120487', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(488, 11120488, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120488', '11120488', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(489, 11120489, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120489', '11120489', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(490, 11120490, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120490', '11120490', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(491, 11120491, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120491', '11120491', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(492, 11120492, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120492', '11120492', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(493, 11120493, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120493', '11120493', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(494, 11120494, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120494', '11120494', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(495, 11120495, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120495', '11120495', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(496, 11120496, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120496', '11120496', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(497, 11120497, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120497', '11120497', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(498, 11120498, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120498', '11120498', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(499, 11120499, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120499', '11120499', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(500, 11120500, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120500', '11120500', 1, '15.00000', 3, NULL, NULL, '2021-08-20 10:21:59', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(501, 11120501, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120501', '11120501', 1, '15.00000', 500, NULL, NULL, '2021-08-23 15:32:11', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `material_inventariom` (`ID_INVENTARIO`, `FOLIO_INVENTARIO`, `FOLIO_AUXILIAR_INVENTARIO`, `ALIAS_DINAMICO_FOLIO`, `ALIAS_ESTATICO_FOLIO`, `TRECEPCION`, `VALOR_UNITARIO`, `CANTIDAD_INVENTARIO`, `FECHA_RECEPCION`, `FECHA_DESPACHO`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_BODEGA`, `ID_FOLIO`, `ID_PRODUCTO`, `ID_TCONTENEDOR`, `ID_TUMEDIDA`, `ID_RECEPCION`, `ID_PLANTA2`, `ID_PLANTA3`, `ID_PROVEEDOR`, `ID_OCOMPRA`, `ID_PRODUCTOR`, `ID_DESPACHO`, `ID_DESPACHO2`) VALUES
(502, 11120502, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120502', '11120502', 1, '15.00000', 500, NULL, NULL, '2021-08-23 15:32:11', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(503, 11120503, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120503', '11120503', 1, '15.00000', 500, NULL, NULL, '2021-08-23 15:32:11', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(504, 11120504, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120504', '11120504', 1, '15.00000', 500, NULL, NULL, '2021-08-23 15:32:11', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(505, 11120505, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120505', '11120505', 1, '15.00000', 500, NULL, NULL, '2021-08-23 15:32:11', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(506, 11120506, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120506', '11120506', 1, '15.00000', 500, NULL, NULL, '2021-08-23 15:32:11', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 13, NULL),
(507, 11120507, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120507', '11120507', 1, '15.00000', 500, NULL, NULL, '2021-08-23 15:32:11', '2021-10-18 16:13:27', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, 6, NULL),
(508, 11120508, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120508', '11120508', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 12, NULL),
(509, 11120509, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120509', '11120509', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 11, NULL),
(510, 11120510, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120510', '11120510', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 5, NULL),
(511, 11120511, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120511', '11120511', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 4, NULL),
(512, 11120512, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120512', '11120512', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 3, NULL),
(513, 11120513, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120513', '11120513', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 3, NULL),
(514, 11120514, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120514', '11120514', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 2, NULL),
(515, 11120515, 11120515, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120515', '11120515', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 2, NULL),
(516, 11120516, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120516', '11120516', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 1, NULL),
(517, 11120517, NULL, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120517', '11120517', 1, '0.00000', 500, NULL, NULL, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 1, NULL),
(518, 11120516, 11120516, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120516', '11120516', 1, '0.00000', 500, NULL, NULL, '2021-09-21 15:26:19', '2021-09-21 15:46:23', 0, 0, 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, NULL, NULL, 1, NULL),
(519, 11120514, 11120514, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120514', '11120514', 1, '0.00000', 500, NULL, NULL, '2021-09-22 09:46:07', '2021-09-22 09:46:07', 2, 1, 1, 2, 2, 1, 1, 1, 1, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, 2),
(520, 11120515, 11120515, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120515', '11120515', 1, '0.00000', 500, NULL, NULL, '2021-09-22 09:46:07', '2021-10-27 11:25:28', 5, 1, 1, 2, 2, 1, 1, 1, 1, 1, NULL, 1, NULL, 1, NULL, NULL, 17, 2),
(521, 11120518, 11120518, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120518', '11120518', 2, '0.00000', 250, NULL, NULL, '2021-09-22 23:10:29', '2021-09-22 23:11:21', 2, 1, 1, 1, 2, 2, 1, 2, 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(522, 11120519, 11120519, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120519', '11120519', 2, '0.00000', 250, NULL, NULL, '2021-09-22 23:10:29', '2021-09-22 23:11:21', 2, 1, 1, 1, 2, 2, 1, 2, 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(523, 11120520, 11120520, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120520', '11120520', 2, '0.00000', 500, NULL, NULL, '2021-09-22 23:11:14', '2021-09-22 23:11:21', 2, 1, 1, 1, 2, 2, 1, 2, 1, 1, 3, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(524, 11120521, 11120521, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120521', '11120521', 4, '0.00000', 500, NULL, NULL, '2021-10-05 15:21:37', '2021-10-18 16:13:56', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(525, 11120522, 11120522, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120522', '11120522', 1, '15.03000', 100, NULL, NULL, '2021-10-05 15:22:50', '2021-10-18 16:06:30', 0, 0, 1, 1, 2, 1, 1, 2, 1, 1, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(526, 11120522, 11120522, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120522', '11120522', 1, '0.00000', 500, NULL, NULL, '2021-10-05 15:23:32', '2021-10-18 16:06:30', 0, 0, 1, 1, 2, 1, 1, 2, 1, 1, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(527, 11120523, 11120523, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120523', '11120523', 1, '15.03000', 100, NULL, NULL, '2021-10-05 15:25:49', '2021-10-18 13:43:11', 0, 0, 1, 1, 2, 1, 1, 2, 1, 1, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(528, 11120524, 11120524, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120524', '11120524', 1, '15.03000', 100, NULL, NULL, '2021-10-05 15:26:57', '2021-10-18 13:43:11', 0, 0, 1, 1, 2, 1, 1, 2, 1, 1, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(529, 11120522, 11120522, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120522', '11120522', 4, '0.00000', 500, NULL, NULL, '2021-10-18 16:13:51', '2021-10-18 16:13:56', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(530, 11120523, 11120523, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120523', '11120523', 1, '0.00000', 500, NULL, NULL, '2021-10-18 16:14:14', '2021-10-18 16:14:19', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 5, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(531, 11120524, 11120524, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120524', '11120524', 2, '0.00000', 250, NULL, NULL, '2021-10-18 20:34:38', '2021-10-18 20:34:54', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 6, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(532, 11120525, 11120525, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120525', '11120525', 2, '0.00000', 250, NULL, NULL, '2021-10-18 20:34:38', '2021-10-18 20:34:54', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 6, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(533, 11120526, 11120526, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120526', '11120526', 1, '0.00000', 100, NULL, NULL, '2021-10-18 22:00:13', '2021-10-22 09:47:39', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 7, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(534, 11120527, 11120527, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120527', '11120527', 1, '0.00000', 100, NULL, NULL, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 7, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(535, 11120528, 11120528, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120528', '11120528', 1, '0.00000', 100, NULL, NULL, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 7, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(536, 11120529, 11120529, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120529', '11120529', 1, '0.00000', 100, NULL, NULL, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 7, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(537, 11120530, 11120530, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120530', '11120530', 1, '0.00000', 100, NULL, NULL, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 2, 1, 1, 1, 2, 1, 1, 2, 1, 1, 7, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(538, 11120531, 11120531, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120531', '11120531', 1, '0.00000', 250, NULL, NULL, '2021-10-18 22:00:54', '2021-10-22 09:47:39', 2, 1, 1, 1, 2, 1, 1, 1, 2, 1, 7, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(539, 11120532, 11120532, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120532', '11120532', 1, '0.00000', 250, NULL, NULL, '2021-10-18 22:00:54', '2021-10-22 09:47:39', 2, 1, 1, 1, 2, 1, 1, 1, 2, 1, 7, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(540, 11120533, 11120533, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120533', '11120533', 1, '15.00000', 5000, NULL, NULL, '2021-10-22 09:43:43', '2021-10-22 09:44:14', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 10, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(541, 11120534, 11120534, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120534', '11120534', 1, '15.00000', 5000, NULL, NULL, '2021-10-22 09:43:43', '2021-10-22 09:44:14', 2, 1, 1, 1, 2, 1, 1, 1, 1, 1, 10, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(542, 11120535, 11120535, '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120535', '11120535', 1, '0.00000', 5000, NULL, NULL, '2021-10-22 09:44:05', '2021-10-22 11:44:17', 4, 1, 1, 1, 2, 1, 1, 1, 1, 1, 10, NULL, NULL, 1, NULL, NULL, 15, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_mguiae`
--

CREATE TABLE `material_mguiae` (
  `ID_MGUIA` bigint(20) NOT NULL,
  `NUMERO_MGUIA` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `NUMERO_DOCUMENTO` int(11) DEFAULT NULL,
  `MOTIVO_MGUIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_mguiae`
--

INSERT INTO `material_mguiae` (`ID_MGUIA`, `NUMERO_MGUIA`, `INGRESO`, `NUMERO_DESPACHO`, `NUMERO_DOCUMENTO`, `MOTIVO_MGUIA`, `ESTADO_REGISTRO`, `ID_DESPACHO`, `ID_PLANTA2`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-22 17:32:55', 2, 11, 'Prueba', 1, 2, 1, 1, 2, 2, 1, 1),
(2, 2, '2021-09-22 17:33:02', 2, 11, 's', 1, 2, 1, 1, 2, 2, 1, 1),
(3, 3, '2021-09-22 17:33:17', 2, 11, 'Prueba', 1, 2, 1, 1, 2, 2, 1, 1),
(5, 1, '2021-10-25 20:16:54', 10, 111, 'SS', 1, 34, 1, 1, 2, 2, 1, 1),
(6, 2, '2021-10-25 20:17:06', 10, 111, 'PRUEBAS', 1, 34, 1, 1, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_mguiam`
--

CREATE TABLE `material_mguiam` (
  `ID_MGUIA` bigint(20) NOT NULL,
  `NUMERO_MGUIA` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `NUMERO_DESPACHO` int(11) DEFAULT NULL,
  `NUMERO_DOCUMENTO` int(11) DEFAULT NULL,
  `MOTIVO_MGUIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_DESPACHO` bigint(20) NOT NULL,
  `ID_PLANTA2` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_mguiam`
--

INSERT INTO `material_mguiam` (`ID_MGUIA`, `NUMERO_MGUIA`, `INGRESO`, `NUMERO_DESPACHO`, `NUMERO_DOCUMENTO`, `MOTIVO_MGUIA`, `ESTADO_REGISTRO`, `ID_DESPACHO`, `ID_PLANTA2`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-09-22 09:24:34', 2, 11, 'ss', 1, 2, 1, 1, 2, 2, 1, 1),
(2, 2, '2021-09-22 09:24:43', 2, 11, 's', 1, 2, 1, 1, 2, 2, 1, 1),
(3, 3, '2021-09-22 09:24:53', 2, 11, 's', 1, 2, 1, 1, 2, 2, 1, 1),
(4, 4, '2021-09-22 09:25:01', 2, 11, 's', 1, 2, 1, 1, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_mocompra`
--

CREATE TABLE `material_mocompra` (
  `ID_MOCOMPRA` bigint(20) NOT NULL,
  `NUMERO_MOCOMPRA` int(11) DEFAULT NULL,
  `FECHA_INGRESO_MOCOMPRA` datetime DEFAULT NULL,
  `NUMERO_OCOMPRA` int(11) DEFAULT NULL,
  `NUMEROI_OCOMPRA` int(11) DEFAULT NULL,
  `MOTIVO_MOCOMPRA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_OCOMPRA` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_ocompra`
--

CREATE TABLE `material_ocompra` (
  `ID_OCOMPRA` bigint(20) NOT NULL,
  `NUMERO_OCOMPRA` int(11) DEFAULT NULL,
  `NUMEROI_OCOMPRA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FECHA_OCOMPRA` date DEFAULT NULL,
  `TCAMBIO_OCOMPRA` decimal(11,2) DEFAULT NULL,
  `TOTAL_CANTIDAD_OCOMPRA` int(11) DEFAULT NULL,
  `TOTAL_VALOR_OCOMPRA` decimal(11,2) DEFAULT NULL,
  `OBSERVACIONES_OCOMPRA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_OCOMPRA` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_RESPONSABLE` bigint(20) NOT NULL,
  `ID_PROVEEDOR` bigint(20) NOT NULL,
  `ID_FPAGO` bigint(20) NOT NULL,
  `ID_TMONEDA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_ocompra`
--

INSERT INTO `material_ocompra` (`ID_OCOMPRA`, `NUMERO_OCOMPRA`, `NUMEROI_OCOMPRA`, `FECHA_OCOMPRA`, `TCAMBIO_OCOMPRA`, `TOTAL_CANTIDAD_OCOMPRA`, `TOTAL_VALOR_OCOMPRA`, `OBSERVACIONES_OCOMPRA`, `ESTADO`, `ESTADO_OCOMPRA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_RESPONSABLE`, `ID_PROVEEDOR`, `ID_FPAGO`, `ID_TMONEDA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '111', '2021-08-18', '111.00', 2000, '30000.00', 'ssdd', 0, 5, 1, '2021-08-18 11:59:08', '2021-10-21 08:44:10', 1, 1, 2, 1, 1, 1, 1, 1, 1),
(2, 2, '1212521', '2021-08-18', '750.00', 100, '1503.00', 'saadffsfsfssrddghgkhkh', 0, 4, 1, '2021-08-18 21:04:50', '2021-08-20 10:16:50', 1, 1, 2, 1, 1, 1, 1, 1, 1),
(3, 3, '1515', '2021-08-18', '111.00', 10000, '150000.00', '', 0, 4, 1, '2021-08-18 21:32:00', '2021-09-22 08:33:17', 1, 1, 2, 1, 1, 1, 1, 1, 1),
(4, 4, '1520', '2021-10-13', '15.00', 1000, '15000.00', '', 0, 2, 1, '2021-10-13 11:35:50', '2021-10-13 13:55:31', 1, 1, 2, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_producto`
--

CREATE TABLE `material_producto` (
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `CODIGO_PRODUCTO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_PRODUCTO` int(11) DEFAULT NULL,
  `NOMBRE_PRODUCTO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OPTIMO` int(11) DEFAULT NULL,
  `CRITICO` int(11) DEFAULT NULL,
  `BAJO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_TUMEDIDA` bigint(20) NOT NULL,
  `ID_FAMILIA` bigint(20) NOT NULL,
  `ID_SUBFAMILIA` bigint(20) NOT NULL,
  `ID_ESPECIES` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_producto`
--

INSERT INTO `material_producto` (`ID_PRODUCTO`, `CODIGO_PRODUCTO`, `NUMERO_PRODUCTO`, `NOMBRE_PRODUCTO`, `OPTIMO`, `CRITICO`, `BAJO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_TEMPORADA`, `ID_TUMEDIDA`, `ID_FAMILIA`, `ID_SUBFAMILIA`, `ID_ESPECIES`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'F1S1C1001', 1, 'producto 1', 1000, 0, 500, 1, '2021-07-30', '2021-08-01', 1, 1, 1, 1, 1, 25, 1, 1),
(2, 'F1S1C1002', 2, 'Prueba producto 2', 1, 3, 2, 1, '2021-08-18', '2021-10-07', 1, 2, 1, 1, 1, 25, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_proveedor`
--

CREATE TABLE `material_proveedor` (
  `ID_PROVEEDOR` bigint(20) NOT NULL,
  `RUT_PROVEEDOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_PROVEEDOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_PROVEEDOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_PROVEEDOR` int(11) DEFAULT NULL,
  `NOMBRE_PROVEEDOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_PROVEEDOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_PROVEEDOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_PROVEEDOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_PROVEEDOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_proveedor`
--

INSERT INTO `material_proveedor` (`ID_PROVEEDOR`, `RUT_PROVEEDOR`, `DV_PROVEEDOR`, `RAZON_PROVEEDOR`, `NUMERO_PROVEEDOR`, `NOMBRE_PROVEEDOR`, `GIRO_PROVEEDOR`, `DIRECCION_PROVEEDOR`, `TELEFONO_PROVEEDOR`, `EMAIL_PROVEEDOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '1', '1', '1', 1, 'proveedor 1', '1', '1', '1', '1@1.cl', 1, '2021-07-30', '2021-08-20', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_recepcione`
--

CREATE TABLE `material_recepcione` (
  `ID_RECEPCION` bigint(20) NOT NULL,
  `NUMERO_RECEPCION` int(11) DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `TRECEPCION` int(11) DEFAULT NULL,
  `SNOCOMPRA` int(11) DEFAULT NULL,
  `NUMERO_DOCUMENTO_RECEPCION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TOTAL_CANTIDAD_RECEPCION` int(11) DEFAULT NULL,
  `OBSERVACIONES_RECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_BODEGA` bigint(20) NOT NULL,
  `ID_TDOCUMENTO` bigint(20) NOT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_PROVEEDOR` bigint(20) DEFAULT NULL,
  `ID_OCOMPRA` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_RECEPCIONMP` bigint(20) DEFAULT NULL,
  `ID_RECEPCIONIND` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_recepcione`
--

INSERT INTO `material_recepcione` (`ID_RECEPCION`, `NUMERO_RECEPCION`, `FECHA_RECEPCION`, `TRECEPCION`, `SNOCOMPRA`, `NUMERO_DOCUMENTO_RECEPCION`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TOTAL_CANTIDAD_RECEPCION`, `OBSERVACIONES_RECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_BODEGA`, `ID_TDOCUMENTO`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_PROVEEDOR`, `ID_OCOMPRA`, `ID_PLANTA2`, `ID_PRODUCTOR`, `ID_RECEPCIONMP`, `ID_RECEPCIONIND`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(18, 1, '2021-09-28', 2, NULL, '1515', '1515', '', 1300, '', 0, 1, '2021-10-25 16:21:21', '2021-10-25 16:21:21', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 1, NULL, 1, 1),
(19, 2, '2021-10-01', 2, NULL, '15', '15', '', 600, '', 0, 1, '2021-10-25 16:21:35', '2021-10-25 16:21:35', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 2, NULL, 1, 1),
(20, 3, '2021-10-13', 2, NULL, '151515', 'hyhg', '', 600, '', 0, 1, '2021-10-25 16:21:51', '2021-10-25 16:21:51', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 3, NULL, 1, 1),
(21, 4, '2021-10-19', 3, NULL, '15', '444', '', 240, '', 0, 1, '2021-10-25 16:22:01', '2021-10-25 16:22:01', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, 3, NULL, 4, NULL, 1, 1),
(22, 5, '2021-10-20', 2, NULL, '22233', 'jjj', '', 240, '', 0, 1, '2021-10-25 16:22:10', '2021-10-25 16:22:10', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 5, NULL, 1, 1),
(23, 6, '2021-10-21', 2, NULL, '334455', '15', '', 240, '', 0, 1, '2021-10-25 16:22:21', '2021-10-25 16:22:21', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 6, NULL, 1, 1),
(24, 7, '2021-10-21', 2, NULL, '23566', 'KKK', '', 240, '', 0, 1, '2021-10-25 16:22:33', '2021-10-25 16:22:33', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 7, NULL, 1, 1),
(25, 8, '2021-10-28', 3, NULL, '15253', '', '', 720, '', 0, 1, '2021-10-28 00:31:29', '2021-10-28 00:59:32', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, 3, NULL, 8, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_recepcionm`
--

CREATE TABLE `material_recepcionm` (
  `ID_RECEPCION` bigint(20) NOT NULL,
  `NUMERO_RECEPCION` int(11) DEFAULT NULL,
  `FECHA_RECEPCION` date DEFAULT NULL,
  `TRECEPCION` int(11) DEFAULT NULL,
  `SNOCOMPRA` int(11) DEFAULT NULL,
  `NUMERO_DOCUMENTO_RECEPCION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CAMION` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PATENTE_CARRO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TOTAL_CANTIDAD_RECEPCION` int(11) DEFAULT NULL,
  `OBSERVACIONES_RECEPCION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `ID_BODEGA` bigint(20) NOT NULL,
  `ID_TDOCUMENTO` bigint(20) NOT NULL,
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `ID_PROVEEDOR` bigint(20) DEFAULT NULL,
  `ID_OCOMPRA` bigint(20) DEFAULT NULL,
  `ID_PLANTA2` bigint(20) DEFAULT NULL,
  `ID_PRODUCTOR` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_recepcionm`
--

INSERT INTO `material_recepcionm` (`ID_RECEPCION`, `NUMERO_RECEPCION`, `FECHA_RECEPCION`, `TRECEPCION`, `SNOCOMPRA`, `NUMERO_DOCUMENTO_RECEPCION`, `PATENTE_CAMION`, `PATENTE_CARRO`, `TOTAL_CANTIDAD_RECEPCION`, `OBSERVACIONES_RECEPCION`, `ESTADO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_PLANTA`, `ID_TEMPORADA`, `ID_BODEGA`, `ID_TDOCUMENTO`, `ID_TRANSPORTE`, `ID_CONDUCTOR`, `ID_PROVEEDOR`, `ID_OCOMPRA`, `ID_PLANTA2`, `ID_PRODUCTOR`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '2021-08-20', 1, 0, '1111', '111', '', 5000, '', 0, 1, '2021-08-20 10:17:11', '2021-10-18 16:13:25', 1, 1, 2, 1, 1, 1, 1, 1, NULL, NULL, NULL, 1, 1),
(2, 2, '2021-09-20', 1, 0, '5151', 'pp', '', 5000, '', 0, 1, '2021-09-20 16:20:09', '2021-10-18 16:09:00', 1, 1, 2, 1, 1, 1, 1, 1, NULL, NULL, NULL, 1, 1),
(3, 3, '2021-09-22', 2, NULL, '515', 'ss', '', 1000, '', 0, 1, '2021-09-22 23:09:37', '2021-09-22 23:11:21', 1, 1, 2, 2, 1, 1, 1, NULL, NULL, NULL, 1, 1, 1),
(4, 4, '2021-09-23', 4, NULL, '1515', '15', '', 1000, '', 0, 1, '2021-09-23 09:39:50', '2021-10-18 16:13:56', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1),
(5, 5, '2021-10-05', 1, 1, '155', 'ppp', '', 500, '', 0, 1, '2021-10-05 15:14:22', '2021-10-18 16:14:19', 1, 1, 2, 1, 1, 1, 1, 1, 2, NULL, NULL, 1, 1),
(6, 6, '2021-10-13', 2, NULL, '15115', 'sss', '', 500, 'sss', 0, 1, '2021-10-13 17:06:34', '2021-10-18 20:34:54', 1, 1, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 1, 1),
(7, 7, '2021-10-18', 1, 0, '1515', '15', '', 1000, 'aasss', 0, 1, '2021-10-18 13:52:06', '2021-10-22 09:47:39', 1, 1, 2, 1, 1, 1, 1, 1, NULL, NULL, NULL, 1, 1),
(8, 8, '2021-10-18', 1, 1, '111', '11', '', 0, '', 1, 1, '2021-10-18 20:50:08', '2021-10-22 11:13:24', 1, 1, 2, 1, 1, 2, 1, 1, 2, NULL, NULL, 1, 1),
(9, 9, '2021-10-22', 1, 0, '15', 'xxx', '', 0, '', 1, 1, '2021-10-22 09:11:06', '2021-10-22 09:11:06', 1, 1, 2, 2, 1, 1, 1, 1, NULL, NULL, NULL, 1, 1),
(10, 10, '2021-10-22', 1, 1, '1515', '1515', '', 15000, '', 0, 1, '2021-10-22 09:12:03', '2021-10-22 09:44:14', 1, 1, 2, 1, 1, 1, 1, 1, 3, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_responsable`
--

CREATE TABLE `material_responsable` (
  `ID_RESPONSABLE` bigint(20) NOT NULL,
  `RUT_RESPONSABLE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_RESPONSABLE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMERO_RESPONSABLE` int(11) DEFAULT NULL,
  `NOMBRE_RESPONSABLE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_RESPONSABLE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_RESPONSABLE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_RESPONSABLE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_responsable`
--

INSERT INTO `material_responsable` (`ID_RESPONSABLE`, `RUT_RESPONSABLE`, `DV_RESPONSABLE`, `NUMERO_RESPONSABLE`, `NOMBRE_RESPONSABLE`, `DIRECCION_RESPONSABLE`, `TELEFONO_RESPONSABLE`, `EMAIL_RESPONSABLE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIO`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '1', '1', 1, 'Prueba', '1', '1', '1@1.cl', 1, '2021-07-31', '2021-08-01', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_subfamilia`
--

CREATE TABLE `material_subfamilia` (
  `ID_SUBFAMILIA` bigint(20) NOT NULL,
  `NUMERO_SUBFAMILIA` int(11) DEFAULT NULL,
  `NOMBRE_SUBFAMILIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_FAMILIA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_subfamilia`
--

INSERT INTO `material_subfamilia` (`ID_SUBFAMILIA`, `NUMERO_SUBFAMILIA`, `NOMBRE_SUBFAMILIA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_FAMILIA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'sub familia 1', 1, '2021-07-30', '2021-07-30', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_tarjam`
--

CREATE TABLE `material_tarjam` (
  `ID_TARJA` bigint(20) NOT NULL,
  `FOLIO_TARJA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_DINAMICO_TARJA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ALIAS_ESTATICO_TARJA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CANITDAD_CONTENEDOR` int(11) DEFAULT NULL,
  `VALOR_UNITARIO` int(11) DEFAULT NULL,
  `CANTIDAD_TARJA` int(11) DEFAULT NULL,
  `INGRESO` datetime DEFAULT NULL,
  `MODIFICACION` datetime DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `ID_RECEPCION` bigint(20) NOT NULL,
  `ID_PRODUCTO` bigint(20) NOT NULL,
  `ID_TCONTENEDOR` bigint(20) NOT NULL,
  `ID_TUMEDIDA` bigint(20) NOT NULL,
  `ID_FOLIO` bigint(20) NOT NULL,
  `ID_DRECEPCION` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_tarjam`
--

INSERT INTO `material_tarjam` (`ID_TARJA`, `FOLIO_TARJA`, `ALIAS_DINAMICO_TARJA`, `ALIAS_ESTATICO_TARJA`, `CANITDAD_CONTENEDOR`, `VALOR_UNITARIO`, `CANTIDAD_TARJA`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_RECEPCION`, `ID_PRODUCTO`, `ID_TCONTENEDOR`, `ID_TUMEDIDA`, `ID_FOLIO`, `ID_DRECEPCION`) VALUES
(1, '11120001', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120001', '11120001', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(2, '11120002', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120002', '11120002', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(3, '11120003', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120003', '11120003', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(4, '11120004', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120004', '11120004', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(5, '11120005', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120005', '11120005', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(6, '11120006', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120006', '11120006', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(7, '11120007', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120007', '11120007', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(8, '11120008', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120008', '11120008', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(9, '11120009', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120009', '11120009', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(10, '11120010', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120010', '11120010', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(11, '11120011', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120011', '11120011', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(12, '11120012', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120012', '11120012', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(13, '11120013', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120013', '11120013', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(14, '11120014', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120014', '11120014', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(15, '11120015', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120015', '11120015', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(16, '11120016', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120016', '11120016', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(17, '11120017', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120017', '11120017', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(18, '11120018', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120018', '11120018', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(19, '11120019', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120019', '11120019', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(20, '11120020', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120020', '11120020', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(21, '11120021', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120021', '11120021', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(22, '11120022', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120022', '11120022', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(23, '11120023', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120023', '11120023', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(24, '11120024', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120024', '11120024', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(25, '11120025', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120025', '11120025', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(26, '11120026', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120026', '11120026', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(27, '11120027', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120027', '11120027', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(28, '11120028', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120028', '11120028', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(29, '11120029', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120029', '11120029', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(30, '11120030', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120030', '11120030', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(31, '11120031', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120031', '11120031', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(32, '11120032', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120032', '11120032', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(33, '11120033', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120033', '11120033', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(34, '11120034', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120034', '11120034', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(35, '11120035', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120035', '11120035', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(36, '11120036', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120036', '11120036', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(37, '11120037', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120037', '11120037', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(38, '11120038', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120038', '11120038', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(39, '11120039', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120039', '11120039', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(40, '11120040', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120040', '11120040', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(41, '11120041', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120041', '11120041', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(42, '11120042', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120042', '11120042', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(43, '11120043', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120043', '11120043', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(44, '11120044', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120044', '11120044', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(45, '11120045', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120045', '11120045', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(46, '11120046', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120046', '11120046', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(47, '11120047', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120047', '11120047', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(48, '11120048', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120048', '11120048', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(49, '11120049', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120049', '11120049', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(50, '11120050', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120050', '11120050', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(51, '11120051', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120051', '11120051', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(52, '11120052', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120052', '11120052', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(53, '11120053', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120053', '11120053', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(54, '11120054', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120054', '11120054', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(55, '11120055', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120055', '11120055', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(56, '11120056', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120056', '11120056', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(57, '11120057', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120057', '11120057', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(58, '11120058', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120058', '11120058', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(59, '11120059', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120059', '11120059', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:25', 0, 1, 1, 1, 1, 1, 1, 1),
(60, '11120060', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120060', '11120060', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(61, '11120061', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120061', '11120061', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(62, '11120062', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120062', '11120062', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(63, '11120063', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120063', '11120063', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(64, '11120064', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120064', '11120064', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(65, '11120065', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120065', '11120065', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(66, '11120066', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120066', '11120066', 5000, 15, 3, '2021-08-20 10:21:57', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(67, '11120067', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120067', '11120067', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(68, '11120068', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120068', '11120068', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(69, '11120069', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120069', '11120069', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(70, '11120070', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120070', '11120070', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(71, '11120071', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120071', '11120071', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(72, '11120072', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120072', '11120072', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(73, '11120073', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120073', '11120073', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(74, '11120074', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120074', '11120074', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(75, '11120075', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120075', '11120075', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(76, '11120076', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120076', '11120076', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(77, '11120077', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120077', '11120077', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(78, '11120078', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120078', '11120078', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(79, '11120079', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120079', '11120079', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(80, '11120080', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120080', '11120080', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(81, '11120081', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120081', '11120081', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(82, '11120082', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120082', '11120082', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(83, '11120083', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120083', '11120083', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(84, '11120084', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120084', '11120084', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(85, '11120085', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120085', '11120085', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(86, '11120086', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120086', '11120086', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(87, '11120087', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120087', '11120087', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(88, '11120088', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120088', '11120088', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(89, '11120089', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120089', '11120089', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(90, '11120090', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120090', '11120090', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(91, '11120091', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120091', '11120091', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(92, '11120092', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120092', '11120092', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(93, '11120093', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120093', '11120093', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(94, '11120094', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120094', '11120094', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(95, '11120095', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120095', '11120095', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(96, '11120096', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120096', '11120096', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(97, '11120097', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120097', '11120097', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(98, '11120098', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120098', '11120098', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(99, '11120099', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120099', '11120099', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(100, '11120100', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120100', '11120100', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(101, '11120101', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120101', '11120101', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(102, '11120102', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120102', '11120102', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(103, '11120103', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120103', '11120103', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(104, '11120104', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120104', '11120104', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(105, '11120105', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120105', '11120105', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(106, '11120106', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120106', '11120106', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(107, '11120107', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120107', '11120107', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(108, '11120108', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120108', '11120108', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(109, '11120109', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120109', '11120109', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(110, '11120110', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120110', '11120110', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(111, '11120111', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120111', '11120111', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(112, '11120112', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120112', '11120112', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(113, '11120113', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120113', '11120113', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(114, '11120114', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120114', '11120114', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(115, '11120115', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120115', '11120115', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(116, '11120116', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120116', '11120116', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(117, '11120117', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120117', '11120117', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(118, '11120118', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120118', '11120118', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(119, '11120119', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120119', '11120119', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(120, '11120120', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120120', '11120120', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(121, '11120121', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120121', '11120121', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(122, '11120122', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120122', '11120122', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(123, '11120123', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120123', '11120123', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(124, '11120124', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120124', '11120124', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(125, '11120125', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120125', '11120125', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(126, '11120126', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120126', '11120126', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(127, '11120127', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120127', '11120127', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(128, '11120128', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120128', '11120128', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(129, '11120129', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120129', '11120129', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(130, '11120130', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120130', '11120130', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(131, '11120131', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120131', '11120131', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(132, '11120132', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120132', '11120132', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(133, '11120133', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120133', '11120133', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(134, '11120134', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120134', '11120134', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(135, '11120135', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120135', '11120135', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(136, '11120136', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120136', '11120136', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(137, '11120137', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120137', '11120137', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(138, '11120138', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120138', '11120138', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(139, '11120139', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120139', '11120139', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(140, '11120140', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120140', '11120140', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(141, '11120141', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120141', '11120141', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(142, '11120142', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120142', '11120142', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(143, '11120143', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120143', '11120143', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(144, '11120144', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120144', '11120144', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(145, '11120145', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120145', '11120145', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(146, '11120146', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120146', '11120146', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(147, '11120147', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120147', '11120147', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(148, '11120148', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120148', '11120148', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(149, '11120149', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120149', '11120149', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(150, '11120150', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120150', '11120150', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(151, '11120151', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120151', '11120151', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(152, '11120152', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120152', '11120152', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(153, '11120153', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120153', '11120153', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(154, '11120154', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120154', '11120154', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(155, '11120155', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120155', '11120155', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(156, '11120156', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120156', '11120156', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(157, '11120157', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120157', '11120157', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(158, '11120158', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120158', '11120158', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(159, '11120159', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120159', '11120159', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(160, '11120160', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120160', '11120160', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(161, '11120161', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120161', '11120161', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(162, '11120162', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120162', '11120162', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(163, '11120163', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120163', '11120163', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(164, '11120164', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120164', '11120164', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(165, '11120165', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120165', '11120165', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(166, '11120166', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120166', '11120166', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(167, '11120167', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120167', '11120167', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(168, '11120168', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120168', '11120168', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(169, '11120169', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120169', '11120169', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(170, '11120170', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120170', '11120170', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(171, '11120171', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120171', '11120171', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(172, '11120172', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120172', '11120172', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(173, '11120173', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120173', '11120173', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(174, '11120174', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120174', '11120174', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(175, '11120175', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120175', '11120175', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(176, '11120176', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120176', '11120176', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(177, '11120177', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120177', '11120177', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(178, '11120178', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120178', '11120178', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(179, '11120179', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120179', '11120179', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(180, '11120180', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120180', '11120180', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(181, '11120181', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120181', '11120181', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(182, '11120182', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120182', '11120182', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(183, '11120183', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120183', '11120183', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(184, '11120184', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120184', '11120184', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(185, '11120185', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120185', '11120185', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(186, '11120186', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120186', '11120186', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(187, '11120187', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120187', '11120187', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(188, '11120188', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120188', '11120188', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(189, '11120189', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120189', '11120189', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(190, '11120190', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120190', '11120190', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(191, '11120191', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120191', '11120191', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(192, '11120192', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120192', '11120192', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(193, '11120193', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120193', '11120193', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(194, '11120194', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120194', '11120194', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(195, '11120195', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120195', '11120195', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(196, '11120196', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120196', '11120196', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(197, '11120197', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120197', '11120197', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(198, '11120198', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120198', '11120198', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(199, '11120199', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120199', '11120199', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(200, '11120200', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120200', '11120200', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(201, '11120201', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120201', '11120201', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(202, '11120202', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120202', '11120202', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(203, '11120203', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120203', '11120203', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(204, '11120204', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120204', '11120204', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(205, '11120205', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120205', '11120205', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(206, '11120206', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120206', '11120206', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(207, '11120207', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120207', '11120207', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(208, '11120208', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120208', '11120208', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(209, '11120209', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120209', '11120209', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(210, '11120210', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120210', '11120210', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(211, '11120211', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120211', '11120211', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(212, '11120212', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120212', '11120212', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(213, '11120213', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120213', '11120213', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(214, '11120214', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120214', '11120214', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(215, '11120215', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120215', '11120215', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(216, '11120216', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120216', '11120216', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(217, '11120217', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120217', '11120217', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(218, '11120218', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120218', '11120218', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(219, '11120219', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120219', '11120219', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(220, '11120220', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120220', '11120220', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(221, '11120221', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120221', '11120221', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(222, '11120222', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120222', '11120222', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1);
INSERT INTO `material_tarjam` (`ID_TARJA`, `FOLIO_TARJA`, `ALIAS_DINAMICO_TARJA`, `ALIAS_ESTATICO_TARJA`, `CANITDAD_CONTENEDOR`, `VALOR_UNITARIO`, `CANTIDAD_TARJA`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_RECEPCION`, `ID_PRODUCTO`, `ID_TCONTENEDOR`, `ID_TUMEDIDA`, `ID_FOLIO`, `ID_DRECEPCION`) VALUES
(223, '11120223', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120223', '11120223', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(224, '11120224', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120224', '11120224', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(225, '11120225', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120225', '11120225', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(226, '11120226', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120226', '11120226', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(227, '11120227', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120227', '11120227', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(228, '11120228', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120228', '11120228', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(229, '11120229', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120229', '11120229', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(230, '11120230', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120230', '11120230', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(231, '11120231', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120231', '11120231', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(232, '11120232', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120232', '11120232', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(233, '11120233', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120233', '11120233', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(234, '11120234', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120234', '11120234', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(235, '11120235', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120235', '11120235', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(236, '11120236', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120236', '11120236', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(237, '11120237', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120237', '11120237', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(238, '11120238', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120238', '11120238', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(239, '11120239', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120239', '11120239', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(240, '11120240', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120240', '11120240', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(241, '11120241', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120241', '11120241', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(242, '11120242', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120242', '11120242', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(243, '11120243', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120243', '11120243', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(244, '11120244', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120244', '11120244', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(245, '11120245', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120245', '11120245', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(246, '11120246', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120246', '11120246', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(247, '11120247', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120247', '11120247', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(248, '11120248', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120248', '11120248', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(249, '11120249', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120249', '11120249', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(250, '11120250', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120250', '11120250', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(251, '11120251', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120251', '11120251', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(252, '11120252', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120252', '11120252', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(253, '11120253', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120253', '11120253', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(254, '11120254', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120254', '11120254', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(255, '11120255', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120255', '11120255', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(256, '11120256', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120256', '11120256', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(257, '11120257', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120257', '11120257', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(258, '11120258', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120258', '11120258', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(259, '11120259', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120259', '11120259', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(260, '11120260', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120260', '11120260', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(261, '11120261', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120261', '11120261', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(262, '11120262', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120262', '11120262', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(263, '11120263', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120263', '11120263', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(264, '11120264', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120264', '11120264', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(265, '11120265', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120265', '11120265', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(266, '11120266', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120266', '11120266', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(267, '11120267', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120267', '11120267', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(268, '11120268', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120268', '11120268', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(269, '11120269', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120269', '11120269', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(270, '11120270', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120270', '11120270', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(271, '11120271', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120271', '11120271', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(272, '11120272', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120272', '11120272', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(273, '11120273', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120273', '11120273', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(274, '11120274', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120274', '11120274', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(275, '11120275', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120275', '11120275', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(276, '11120276', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120276', '11120276', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(277, '11120277', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120277', '11120277', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(278, '11120278', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120278', '11120278', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(279, '11120279', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120279', '11120279', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(280, '11120280', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120280', '11120280', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(281, '11120281', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120281', '11120281', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(282, '11120282', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120282', '11120282', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(283, '11120283', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120283', '11120283', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(284, '11120284', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120284', '11120284', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(285, '11120285', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120285', '11120285', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(286, '11120286', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120286', '11120286', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(287, '11120287', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120287', '11120287', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(288, '11120288', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120288', '11120288', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(289, '11120289', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120289', '11120289', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(290, '11120290', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120290', '11120290', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(291, '11120291', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120291', '11120291', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(292, '11120292', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120292', '11120292', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(293, '11120293', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120293', '11120293', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(294, '11120294', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120294', '11120294', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(295, '11120295', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120295', '11120295', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(296, '11120296', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120296', '11120296', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(297, '11120297', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120297', '11120297', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(298, '11120298', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120298', '11120298', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(299, '11120299', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120299', '11120299', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(300, '11120300', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120300', '11120300', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(301, '11120301', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120301', '11120301', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(302, '11120302', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120302', '11120302', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(303, '11120303', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120303', '11120303', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(304, '11120304', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120304', '11120304', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(305, '11120305', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120305', '11120305', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(306, '11120306', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120306', '11120306', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(307, '11120307', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120307', '11120307', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(308, '11120308', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120308', '11120308', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(309, '11120309', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120309', '11120309', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(310, '11120310', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120310', '11120310', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(311, '11120311', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120311', '11120311', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(312, '11120312', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120312', '11120312', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(313, '11120313', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120313', '11120313', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(314, '11120314', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120314', '11120314', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(315, '11120315', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120315', '11120315', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(316, '11120316', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120316', '11120316', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(317, '11120317', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120317', '11120317', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(318, '11120318', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120318', '11120318', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(319, '11120319', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120319', '11120319', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(320, '11120320', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120320', '11120320', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(321, '11120321', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120321', '11120321', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(322, '11120322', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120322', '11120322', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(323, '11120323', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120323', '11120323', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(324, '11120324', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120324', '11120324', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(325, '11120325', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120325', '11120325', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(326, '11120326', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120326', '11120326', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(327, '11120327', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120327', '11120327', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(328, '11120328', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120328', '11120328', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(329, '11120329', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120329', '11120329', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(330, '11120330', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120330', '11120330', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(331, '11120331', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120331', '11120331', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(332, '11120332', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120332', '11120332', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(333, '11120333', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120333', '11120333', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(334, '11120334', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120334', '11120334', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(335, '11120335', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120335', '11120335', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(336, '11120336', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120336', '11120336', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(337, '11120337', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120337', '11120337', 5000, 15, 3, '2021-08-20 10:21:58', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(338, '11120338', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120338', '11120338', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(339, '11120339', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120339', '11120339', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(340, '11120340', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120340', '11120340', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(341, '11120341', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120341', '11120341', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(342, '11120342', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120342', '11120342', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(343, '11120343', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120343', '11120343', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(344, '11120344', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120344', '11120344', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(345, '11120345', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120345', '11120345', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(346, '11120346', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120346', '11120346', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(347, '11120347', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120347', '11120347', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(348, '11120348', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120348', '11120348', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(349, '11120349', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120349', '11120349', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(350, '11120350', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120350', '11120350', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(351, '11120351', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120351', '11120351', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(352, '11120352', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120352', '11120352', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(353, '11120353', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120353', '11120353', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(354, '11120354', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120354', '11120354', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(355, '11120355', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120355', '11120355', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(356, '11120356', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120356', '11120356', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(357, '11120357', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120357', '11120357', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(358, '11120358', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120358', '11120358', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(359, '11120359', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120359', '11120359', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(360, '11120360', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120360', '11120360', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(361, '11120361', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120361', '11120361', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(362, '11120362', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120362', '11120362', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(363, '11120363', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120363', '11120363', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(364, '11120364', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120364', '11120364', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(365, '11120365', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120365', '11120365', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(366, '11120366', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120366', '11120366', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(367, '11120367', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120367', '11120367', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(368, '11120368', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120368', '11120368', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(369, '11120369', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120369', '11120369', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(370, '11120370', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120370', '11120370', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(371, '11120371', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120371', '11120371', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(372, '11120372', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120372', '11120372', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(373, '11120373', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120373', '11120373', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(374, '11120374', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120374', '11120374', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(375, '11120375', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120375', '11120375', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(376, '11120376', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120376', '11120376', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(377, '11120377', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120377', '11120377', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(378, '11120378', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120378', '11120378', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(379, '11120379', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120379', '11120379', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(380, '11120380', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120380', '11120380', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(381, '11120381', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120381', '11120381', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(382, '11120382', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120382', '11120382', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(383, '11120383', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120383', '11120383', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(384, '11120384', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120384', '11120384', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(385, '11120385', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120385', '11120385', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(386, '11120386', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120386', '11120386', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(387, '11120387', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120387', '11120387', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(388, '11120388', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120388', '11120388', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(389, '11120389', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120389', '11120389', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(390, '11120390', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120390', '11120390', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(391, '11120391', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120391', '11120391', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(392, '11120392', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120392', '11120392', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(393, '11120393', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120393', '11120393', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(394, '11120394', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120394', '11120394', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(395, '11120395', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120395', '11120395', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(396, '11120396', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120396', '11120396', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(397, '11120397', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120397', '11120397', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(398, '11120398', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120398', '11120398', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(399, '11120399', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120399', '11120399', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(400, '11120400', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120400', '11120400', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(401, '11120401', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120401', '11120401', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(402, '11120402', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120402', '11120402', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(403, '11120403', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120403', '11120403', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(404, '11120404', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120404', '11120404', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(405, '11120405', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120405', '11120405', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(406, '11120406', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120406', '11120406', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(407, '11120407', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120407', '11120407', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(408, '11120408', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120408', '11120408', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(409, '11120409', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120409', '11120409', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(410, '11120410', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120410', '11120410', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(411, '11120411', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120411', '11120411', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(412, '11120412', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120412', '11120412', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(413, '11120413', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120413', '11120413', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(414, '11120414', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120414', '11120414', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(415, '11120415', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120415', '11120415', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(416, '11120416', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120416', '11120416', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(417, '11120417', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120417', '11120417', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(418, '11120418', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120418', '11120418', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(419, '11120419', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120419', '11120419', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(420, '11120420', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120420', '11120420', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(421, '11120421', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120421', '11120421', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(422, '11120422', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120422', '11120422', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(423, '11120423', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120423', '11120423', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(424, '11120424', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120424', '11120424', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(425, '11120425', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120425', '11120425', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(426, '11120426', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120426', '11120426', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(427, '11120427', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120427', '11120427', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(428, '11120428', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120428', '11120428', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(429, '11120429', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120429', '11120429', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(430, '11120430', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120430', '11120430', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(431, '11120431', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120431', '11120431', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(432, '11120432', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120432', '11120432', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(433, '11120433', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120433', '11120433', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(434, '11120434', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120434', '11120434', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(435, '11120435', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120435', '11120435', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(436, '11120436', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120436', '11120436', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(437, '11120437', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120437', '11120437', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(438, '11120438', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120438', '11120438', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(439, '11120439', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120439', '11120439', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(440, '11120440', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120440', '11120440', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(441, '11120441', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120441', '11120441', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(442, '11120442', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120442', '11120442', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(443, '11120443', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120443', '11120443', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1);
INSERT INTO `material_tarjam` (`ID_TARJA`, `FOLIO_TARJA`, `ALIAS_DINAMICO_TARJA`, `ALIAS_ESTATICO_TARJA`, `CANITDAD_CONTENEDOR`, `VALOR_UNITARIO`, `CANTIDAD_TARJA`, `INGRESO`, `MODIFICACION`, `ESTADO`, `ESTADO_REGISTRO`, `ID_RECEPCION`, `ID_PRODUCTO`, `ID_TCONTENEDOR`, `ID_TUMEDIDA`, `ID_FOLIO`, `ID_DRECEPCION`) VALUES
(444, '11120444', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120444', '11120444', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(445, '11120445', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120445', '11120445', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(446, '11120446', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120446', '11120446', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(447, '11120447', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120447', '11120447', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(448, '11120448', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120448', '11120448', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(449, '11120449', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120449', '11120449', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(450, '11120450', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120450', '11120450', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(451, '11120451', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120451', '11120451', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(452, '11120452', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120452', '11120452', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(453, '11120453', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120453', '11120453', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(454, '11120454', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120454', '11120454', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(455, '11120455', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120455', '11120455', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(456, '11120456', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120456', '11120456', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(457, '11120457', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120457', '11120457', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(458, '11120458', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120458', '11120458', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(459, '11120459', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120459', '11120459', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(460, '11120460', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120460', '11120460', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(461, '11120461', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120461', '11120461', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(462, '11120462', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120462', '11120462', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(463, '11120463', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120463', '11120463', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(464, '11120464', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120464', '11120464', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(465, '11120465', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120465', '11120465', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(466, '11120466', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120466', '11120466', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(467, '11120467', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120467', '11120467', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(468, '11120468', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120468', '11120468', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(469, '11120469', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120469', '11120469', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(470, '11120470', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120470', '11120470', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(471, '11120471', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120471', '11120471', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(472, '11120472', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120472', '11120472', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(473, '11120473', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120473', '11120473', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(474, '11120474', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120474', '11120474', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(475, '11120475', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120475', '11120475', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(476, '11120476', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120476', '11120476', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(477, '11120477', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120477', '11120477', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(478, '11120478', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120478', '11120478', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(479, '11120479', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120479', '11120479', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(480, '11120480', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120480', '11120480', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(481, '11120481', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120481', '11120481', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(482, '11120482', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120482', '11120482', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(483, '11120483', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120483', '11120483', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(484, '11120484', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120484', '11120484', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(485, '11120485', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120485', '11120485', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(486, '11120486', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120486', '11120486', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(487, '11120487', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120487', '11120487', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(488, '11120488', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120488', '11120488', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(489, '11120489', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120489', '11120489', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(490, '11120490', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120490', '11120490', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(491, '11120491', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120491', '11120491', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(492, '11120492', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120492', '11120492', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(493, '11120493', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120493', '11120493', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(494, '11120494', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120494', '11120494', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(495, '11120495', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120495', '11120495', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(496, '11120496', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120496', '11120496', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(497, '11120497', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120497', '11120497', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(498, '11120498', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120498', '11120498', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(499, '11120499', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120499', '11120499', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(500, '11120500', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120500', '11120500', 5000, 15, 3, '2021-08-20 10:21:59', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(501, '11120501', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120501', '11120501', 5000, 15, 500, '2021-08-23 15:32:11', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(502, '11120502', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120502', '11120502', 5000, 15, 500, '2021-08-23 15:32:11', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(503, '11120503', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120503', '11120503', 5000, 15, 500, '2021-08-23 15:32:11', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(504, '11120504', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120504', '11120504', 5000, 15, 500, '2021-08-23 15:32:11', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(505, '11120505', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120505', '11120505', 5000, 15, 500, '2021-08-23 15:32:11', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(506, '11120506', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120506', '11120506', 5000, 15, 500, '2021-08-23 15:32:11', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(507, '11120507', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120507', '11120507', 5000, 15, 500, '2021-08-23 15:32:11', '2021-10-18 16:13:26', 0, 1, 1, 1, 1, 1, 1, 1),
(508, '11120508', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120508', '11120508', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(509, '11120509', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120509', '11120509', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(510, '11120510', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120510', '11120510', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(511, '11120511', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120511', '11120511', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(512, '11120512', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120512', '11120512', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(513, '11120513', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120513', '11120513', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(514, '11120514', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120514', '11120514', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(515, '11120515', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120515', '11120515', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(516, '11120516', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120516', '11120516', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(517, '11120517', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120517', '11120517', 5000, 0, 500, '2021-09-20 16:56:32', '2021-10-18 16:09:00', 0, 1, 2, 1, 1, 1, 1, 2),
(518, '11120518', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120518', '11120518', 500, 0, 250, '2021-09-22 23:10:29', '2021-09-22 23:11:21', 0, 1, 3, 2, 1, 1, 1, 6),
(519, '11120519', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120519', '11120519', 500, 0, 250, '2021-09-22 23:10:29', '2021-09-22 23:11:21', 0, 1, 3, 2, 1, 1, 1, 6),
(520, '11120520', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120520', '11120520', 500, 0, 500, '2021-09-22 23:11:14', '2021-09-22 23:11:21', 0, 1, 3, 2, 1, 1, 1, 7),
(521, '11120521', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120521', '11120521', 500, 0, 500, '2021-10-05 15:21:37', '2021-10-18 16:13:56', 0, 1, 4, 2, 1, 1, 1, 8),
(522, '11120522', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120522', '11120522', 100, 15, 100, '2021-10-05 15:22:50', '2021-10-05 15:23:05', 1, 0, 5, 2, 1, 1, 1, 10),
(523, '11120522', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120522', '11120522', 500, 0, 500, '2021-10-05 15:23:32', '2021-10-18 16:06:30', 1, 0, 5, 2, 1, 1, 1, 11),
(524, '11120523', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120523', '11120523', 100, 15, 100, '2021-10-05 15:25:49', '2021-10-18 13:43:11', 1, 0, 5, 2, 1, 1, 1, 10),
(525, '11120524', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120524', '11120524', 100, 15, 100, '2021-10-05 15:26:57', '2021-10-18 13:43:11', 1, 0, 5, 2, 1, 1, 1, 10),
(526, '11120522', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120522', '11120522', 500, 0, 500, '2021-10-18 16:13:51', '2021-10-18 16:13:56', 0, 1, 4, 2, 1, 1, 1, 9),
(527, '11120523', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120523', '11120523', 500, 0, 500, '2021-10-18 16:14:14', '2021-10-18 16:14:19', 0, 1, 5, 2, 1, 1, 1, 11),
(528, '11120524', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120524', '11120524', 500, 0, 250, '2021-10-18 20:34:38', '2021-10-18 20:34:54', 0, 1, 6, 2, 1, 1, 1, 13),
(529, '11120525', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120525', '11120525', 500, 0, 250, '2021-10-18 20:34:38', '2021-10-18 20:34:54', 0, 1, 6, 2, 1, 1, 1, 13),
(530, '11120526', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120526', '11120526', 500, 0, 100, '2021-10-18 22:00:13', '2021-10-22 09:47:39', 0, 1, 7, 2, 1, 1, 1, 12),
(531, '11120527', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120527', '11120527', 500, 0, 100, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 0, 1, 7, 2, 1, 1, 1, 12),
(532, '11120528', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120528', '11120528', 500, 0, 100, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 0, 1, 7, 2, 1, 1, 1, 12),
(533, '11120529', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120529', '11120529', 500, 0, 100, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 0, 1, 7, 2, 1, 1, 1, 12),
(534, '11120530', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120530', '11120530', 500, 0, 100, '2021-10-18 22:00:25', '2021-10-22 09:47:39', 0, 1, 7, 2, 1, 1, 1, 12),
(535, '11120531', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120531', '11120531', 500, 0, 250, '2021-10-18 22:00:54', '2021-10-22 09:47:39', 0, 1, 7, 1, 2, 1, 1, 14),
(536, '11120532', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120532', '11120532', 500, 0, 250, '2021-10-18 22:00:54', '2021-10-22 09:47:39', 0, 1, 7, 1, 2, 1, 1, 14),
(537, '11120533', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120533', '11120533', 10000, 15, 5000, '2021-10-22 09:43:43', '2021-10-22 09:44:14', 0, 1, 10, 1, 1, 1, 1, 17),
(538, '11120534', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120534', '11120534', 10000, 15, 5000, '2021-10-22 09:43:43', '2021-10-22 09:44:14', 0, 1, 10, 1, 1, 1, 1, 17),
(539, '11120535', '11120000_EMPRESA:Pruebas_PLANTA:Prueba Planta_TIPO_FOLIO:MATERIALES_TEMPORADA:2020-2021_NUMEROFOLIO:11120535', '11120535', 5000, 0, 5000, '2021-10-22 09:44:05', '2021-10-22 09:44:14', 0, 1, 10, 1, 1, 1, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_tcontenedor`
--

CREATE TABLE `material_tcontenedor` (
  `ID_TCONTENEDOR` bigint(20) NOT NULL,
  `NUMERO_TCONTENEDOR` bigint(20) DEFAULT NULL,
  `NOMBRE_TCONTENEDOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_tcontenedor`
--

INSERT INTO `material_tcontenedor` (`ID_TCONTENEDOR`, `NUMERO_TCONTENEDOR`, `NOMBRE_TCONTENEDOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'contenedor 1', 1, '2021-07-30', '2021-10-18', 1, 1, 1),
(2, 2, 'contenedor 2', 1, '2021-10-18', '2021-10-18', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_tdocumento`
--

CREATE TABLE `material_tdocumento` (
  `ID_TDOCUMENTO` bigint(20) NOT NULL,
  `NUMERO_TDOCUMENTO` int(11) DEFAULT NULL,
  `NOMBRE_TDOCUMENTO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_tdocumento`
--

INSERT INTO `material_tdocumento` (`ID_TDOCUMENTO`, `NUMERO_TDOCUMENTO`, `NOMBRE_TDOCUMENTO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'tipo documento 1', 1, '2021-07-30', '2021-07-30', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_tmoneda`
--

CREATE TABLE `material_tmoneda` (
  `ID_TMONEDA` bigint(20) NOT NULL,
  `NUMERO_TMONEDA` int(11) DEFAULT NULL,
  `NOMBRE_TMONEDA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_tmoneda`
--

INSERT INTO `material_tmoneda` (`ID_TMONEDA`, `NUMERO_TMONEDA`, `NOMBRE_TMONEDA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'tipo moneda 1', 1, '2021-07-30', '2021-07-30', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_tumedida`
--

CREATE TABLE `material_tumedida` (
  `ID_TUMEDIDA` bigint(20) NOT NULL,
  `NUMERO_TUMEDIDA` bigint(20) DEFAULT NULL,
  `NOMBRE_TUMEDIDA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `material_tumedida`
--

INSERT INTO `material_tumedida` (`ID_TUMEDIDA`, `NUMERO_TUMEDIDA`, `NOMBRE_TUMEDIDA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'tipo unidad medida', 1, '2021-07-30', '2021-07-30', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_bodega`
--

CREATE TABLE `principal_bodega` (
  `ID_BODEGA` bigint(20) NOT NULL,
  `NOMBRE_BODEGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_CONTACTO_BODEGA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRINCIPAL` int(11) DEFAULT 0,
  `ENVASES` int(11) DEFAULT 0,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_PLANTA` bigint(20) NOT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `principal_bodega`
--

INSERT INTO `principal_bodega` (`ID_BODEGA`, `NOMBRE_BODEGA`, `NOMBRE_CONTACTO_BODEGA`, `PRINCIPAL`, `ENVASES`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PLANTA`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'bodega 1', '-', 1, 1, 1, '2021-07-30', '2021-10-25', 1, 1, 1, 1),
(2, 'bodega 2', 'Prueba', 0, 1, 1, '2021-09-21', '2021-10-25', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_empresa`
--

CREATE TABLE `principal_empresa` (
  `ID_EMPRESA` bigint(20) NOT NULL,
  `RUT_EMPRESA` int(11) DEFAULT NULL,
  `DV_EMPRESA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_EMPRESA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_EMPRESA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_EMPRESA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_EMPRESA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_EMPRESA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENCARGADO_COMPRA_EMPRESA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOGO_EMPRESA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_CIUDAD` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `principal_empresa`
--

INSERT INTO `principal_empresa` (`ID_EMPRESA`, `RUT_EMPRESA`, `DV_EMPRESA`, `NOMBRE_EMPRESA`, `RAZON_SOCIAL_EMPRESA`, `DIRECCION_EMPRESA`, `GIRO_EMPRESA`, `TELEFONO_EMPRESA`, `ENCARGADO_COMPRA_EMPRESA`, `LOGO_EMPRESA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '1', 'prueba 1', 'Prueba Sistema', '-', '-', '1', '-', '', 1, '2021-07-20', '2021-08-17', 1, 1, 1),
(2, 111, '1', 'prueba 2', '1', '1', '1', '1', '1', '', 1, '2021-07-30', '2021-08-18', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_planta`
--

CREATE TABLE `principal_planta` (
  `ID_PLANTA` bigint(20) NOT NULL,
  `NOMBRE_PLANTA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_PLANTA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_PLANTA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CODIGO_SAG_PLANTA` int(11) DEFAULT NULL,
  `FDA_PLANTA` bigint(20) DEFAULT NULL,
  `TPLANTA` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_CIUDAD` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `principal_planta`
--

INSERT INTO `principal_planta` (`ID_PLANTA`, `NOMBRE_PLANTA`, `RAZON_SOCIAL_PLANTA`, `DIRECCION_PLANTA`, `CODIGO_SAG_PLANTA`, `FDA_PLANTA`, `TPLANTA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 'Prueba Planta', 'Prueba', '-', 1, 1, 1, 1, '2021-07-20', '2021-07-30', 1, 1, 1),
(2, 'Planta El Alamo', '-', '-', 1, 1, 1, 1, '2021-07-30', '2021-07-30', 1, 1, 1),
(3, 'Prueba Externa', '11', '1', 1, 1, 2, 1, '2021-09-12', '2021-09-12', 1, 1, 1),
(5, 'prueba planta 2', '1', '1', 1, 1, 2, 1, '2021-09-18', '2021-09-18', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principal_temporada`
--

CREATE TABLE `principal_temporada` (
  `ID_TEMPORADA` bigint(20) NOT NULL,
  `FECHA_INICIO_TEMPORADA` date DEFAULT NULL,
  `FECHA_TERMINO_TEMPORADA` date DEFAULT NULL,
  `NOMBRE_TEMPORADA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `principal_temporada`
--

INSERT INTO `principal_temporada` (`ID_TEMPORADA`, `FECHA_INICIO_TEMPORADA`, `FECHA_TERMINO_TEMPORADA`, `NOMBRE_TEMPORADA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, '2020-11-23', NULL, 'Pruebas', 0, '2021-07-20', '2021-08-17', 1, 1),
(2, '2020-11-23', NULL, '2020-2021', 1, '2021-07-30', '2021-08-23', 1, 1),
(3, '2021-08-16', NULL, '2021-2022', 1, '2021-08-17', '2021-08-17', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_aeronave`
--

CREATE TABLE `transporte_aeronave` (
  `ID_AERONAVE` bigint(20) NOT NULL,
  `NUMERO_AERONAVE` int(11) DEFAULT NULL,
  `NOMBRE_AERONAVE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_LAEREA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transporte_aeronave`
--

INSERT INTO `transporte_aeronave` (`ID_AERONAVE`, `NUMERO_AERONAVE`, `NOMBRE_AERONAVE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_LAEREA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'prueba nave', 1, NULL, NULL, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_conductor`
--

CREATE TABLE `transporte_conductor` (
  `ID_CONDUCTOR` bigint(20) NOT NULL,
  `NUMERO_CONDUCTOR` int(11) DEFAULT NULL,
  `RUT_CONDUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_CONDUCTOR` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_CONDUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_CONDUCTOR` bigint(20) DEFAULT NULL,
  `EMAIL_CONDUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTA_CONDUCTOR` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transporte_conductor`
--

INSERT INTO `transporte_conductor` (`ID_CONDUCTOR`, `NUMERO_CONDUCTOR`, `RUT_CONDUCTOR`, `DV_CONDUCTOR`, `NOMBRE_CONDUCTOR`, `TELEFONO_CONDUCTOR`, `EMAIL_CONDUCTOR`, `NOTA_CONDUCTOR`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '1', '1', 'conductor 1', 1, '1@1.cl', '', 1, '2021-07-30', '2021-08-16', 1, 1, 1),
(2, 2, '1', '1', 'conductor 2', 0, '', '', 1, '2021-09-18', '2021-09-20', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_laerea`
--

CREATE TABLE `transporte_laerea` (
  `ID_LAEREA` bigint(20) NOT NULL,
  `NUMERO_LAEREA` int(11) DEFAULT NULL,
  `RUT_LAEREA` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_LAEREA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_LAEREA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_LAEREA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_LAEREA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_LAEREA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO_LAEREA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_LAEREA` int(11) DEFAULT NULL,
  `EMAIL_LAEREA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTA_LAEREA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transporte_laerea`
--

INSERT INTO `transporte_laerea` (`ID_LAEREA`, `NUMERO_LAEREA`, `RUT_LAEREA`, `DV_LAEREA`, `NOMBRE_LAEREA`, `GIRO_LAEREA`, `RAZON_SOCIAL_LAEREA`, `DIRECCION_LAEREA`, `CONTACTO_LAEREA`, `TELEFONO_LAEREA`, `EMAIL_LAEREA`, `NOTA_LAEREA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '1', '1', 'linea aerea 1', '1', '1', '1', '', 0, '', '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_naviera`
--

CREATE TABLE `transporte_naviera` (
  `ID_NAVIERA` bigint(20) NOT NULL,
  `NUMERO_NAVIERA` int(11) DEFAULT NULL,
  `NOMBRE_NAVIERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_NAVIERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_NAVIERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_NAVIERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO_NAVIERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_NAVIERA` int(11) DEFAULT NULL,
  `EMAIL_NAVIERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTA_NAVIERA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transporte_naviera`
--

INSERT INTO `transporte_naviera` (`ID_NAVIERA`, `NUMERO_NAVIERA`, `NOMBRE_NAVIERA`, `GIRO_NAVIERA`, `RAZON_SOCIAL_NAVIERA`, `DIRECCION_NAVIERA`, `CONTACTO_NAVIERA`, `TELEFONO_NAVIERA`, `EMAIL_NAVIERA`, `NOTA_NAVIERA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, 'naviera 1', '1', '1', '1', '', 0, '', '', 0, NULL, NULL, 1, NULL, 1, 1),
(2, 2, 'naviera 2', '1', '1', '1', '', 0, '', '', 1, NULL, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte_transporte`
--

CREATE TABLE `transporte_transporte` (
  `ID_TRANSPORTE` bigint(20) NOT NULL,
  `NUMERO_TRANSPORTE` int(11) DEFAULT NULL,
  `RUT_TRANSPORTE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_TRANSPORTE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOMBRE_TRANSPORTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIRO_TRANSPORTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAZON_SOCIAL_TRANSPORTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIRECCION_TRANSPORTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACTO_TRANSPORTE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_TRANSPORTE` int(11) DEFAULT NULL,
  `EMAIL_TRANSPORTE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTA_TRANSPORTE` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_EMPRESA` bigint(20) NOT NULL,
  `ID_CIUDAD` bigint(20) DEFAULT NULL,
  `ID_USUARIOI` bigint(20) NOT NULL,
  `ID_USUARIOM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transporte_transporte`
--

INSERT INTO `transporte_transporte` (`ID_TRANSPORTE`, `NUMERO_TRANSPORTE`, `RUT_TRANSPORTE`, `DV_TRANSPORTE`, `NOMBRE_TRANSPORTE`, `GIRO_TRANSPORTE`, `RAZON_SOCIAL_TRANSPORTE`, `DIRECCION_TRANSPORTE`, `CONTACTO_TRANSPORTE`, `TELEFONO_TRANSPORTE`, `EMAIL_TRANSPORTE`, `NOTA_TRANSPORTE`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_EMPRESA`, `ID_CIUDAD`, `ID_USUARIOI`, `ID_USUARIOM`) VALUES
(1, 1, '1', '1', 'trasnporte 1', '1', '1', '1', '1', 1, '1@1.cl', '', 1, '2021-07-30', '2021-08-16', 1, 1, 1, 1),
(2, 2, '1', '1', 'trasnporte 2', '1', '1', '1', '', 0, '', '', 1, '2021-09-18', '2021-09-18', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_ciudad`
--

CREATE TABLE `ubicacion_ciudad` (
  `ID_CIUDAD` bigint(20) NOT NULL,
  `NOMBRE_CIUDAD` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_COMUNA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion_ciudad`
--

INSERT INTO `ubicacion_ciudad` (`ID_CIUDAD`, `NOMBRE_CIUDAD`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_COMUNA`) VALUES
(1, 'Los Angeles', 1, '2021-07-20', '2021-08-16', 153);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_comuna`
--

CREATE TABLE `ubicacion_comuna` (
  `ID_COMUNA` bigint(20) NOT NULL,
  `NOMBRE_COMUNA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_PROVINCIA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion_comuna`
--

INSERT INTO `ubicacion_comuna` (`ID_COMUNA`, `NOMBRE_COMUNA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PROVINCIA`) VALUES
(1, 'Algarrobo', 1, NULL, '2021-08-16', 16),
(2, 'Alhue', 1, NULL, NULL, 52),
(3, 'Alto Biobio', 1, NULL, NULL, 28),
(4, 'Alto Del Carmen', 1, NULL, NULL, 8),
(5, 'Alto Hospicio', 1, NULL, NULL, 1),
(6, 'Ancud', 1, NULL, NULL, 35),
(7, 'Andacollo', 1, NULL, NULL, 9),
(8, 'Angol', 1, NULL, NULL, 32),
(9, 'Antofagasta', 1, NULL, NULL, 3),
(10, 'Antuco', 1, NULL, NULL, 28),
(11, 'Arauco', 1, NULL, NULL, 27),
(12, 'Arica', 1, NULL, NULL, 47),
(13, 'Aysen', 1, NULL, NULL, 37),
(14, 'Buin', 1, NULL, NULL, 51),
(15, 'Bulnes', 1, NULL, NULL, 56),
(16, 'Cabildo', 1, NULL, NULL, 14),
(17, 'Cabo De Hornos', 1, NULL, NULL, 41),
(18, 'Cabrero', 1, NULL, NULL, 28),
(19, 'Calama', 1, NULL, NULL, 4),
(20, 'Calbuco', 1, NULL, NULL, 34),
(21, 'Caldera', 1, NULL, NULL, 7),
(22, 'Calera De Tango', 1, NULL, NULL, 51),
(23, 'Calle Larga', 1, NULL, NULL, 13),
(24, 'Camarones', 1, NULL, NULL, 47),
(25, 'Camina', 1, NULL, NULL, 2),
(26, 'Canela', 1, NULL, NULL, 11),
(27, 'Canete', 1, NULL, NULL, 27),
(28, 'Carahue', 1, NULL, NULL, 31),
(29, 'Cartagena', 1, NULL, NULL, 16),
(30, 'Casablanca', 1, NULL, NULL, 18),
(31, 'Castro', 1, NULL, NULL, 35),
(32, 'Catemu', 1, NULL, NULL, 17),
(33, 'Cauquenes', 1, NULL, NULL, 23),
(34, 'Cerrillos', 1, NULL, NULL, 53),
(35, 'Cerro Navia', 1, NULL, NULL, 53),
(36, 'Chaiten', 1, NULL, NULL, 36),
(37, 'Chanaral', 1, NULL, NULL, 6),
(38, 'Chanco', 1, NULL, NULL, 23),
(39, 'Chepica', 1, NULL, NULL, 21),
(40, 'Chiguayante', 1, NULL, NULL, 29),
(41, 'Chile Chico', 1, NULL, NULL, 40),
(42, 'Chillan', 1, NULL, NULL, 56),
(43, 'Chillan Viejo', 1, NULL, NULL, 56),
(44, 'Chimbarongo', 1, NULL, NULL, 21),
(45, 'Cholchol', 1, NULL, NULL, 31),
(46, 'Chonchi', 1, NULL, NULL, 35),
(47, 'Pueto Cisnes', 1, NULL, NULL, 37),
(48, 'Cobquecura', 1, NULL, NULL, 55),
(49, 'Cochamo', 1, NULL, NULL, 34),
(50, 'Cochrane', 1, NULL, NULL, 38),
(51, 'Codegua', 1, NULL, NULL, 20),
(52, 'Coelemu', 1, NULL, NULL, 55),
(53, 'Coihueco', 1, NULL, NULL, 57),
(54, 'Coinco', 1, NULL, NULL, 20),
(55, 'Colbun', 1, NULL, NULL, 25),
(56, 'Colchane', 1, NULL, NULL, 2),
(57, 'Colina', 1, NULL, NULL, 49),
(58, 'Collipulli', 1, NULL, NULL, 32),
(59, 'Coltauco', 1, NULL, NULL, 20),
(60, 'Combarbala', 1, NULL, NULL, 10),
(61, 'Concepcion', 1, NULL, NULL, 29),
(62, 'Conchali', 1, NULL, NULL, 53),
(63, 'Concon', 1, NULL, NULL, 18),
(64, 'Constitucion', 1, NULL, NULL, 26),
(65, 'Contulmo', 1, NULL, NULL, 27),
(66, 'Copiapo', 1, NULL, NULL, 7),
(67, 'Coquimbo', 1, NULL, NULL, 9),
(68, 'Coronel', 1, NULL, NULL, 29),
(69, 'Corral', 1, NULL, NULL, 46),
(70, 'Coyhaique', 1, NULL, NULL, 39),
(71, 'Cunco', 1, NULL, NULL, 31),
(72, 'Curacautin', 1, NULL, NULL, 32),
(73, 'Curacavi', 1, NULL, NULL, 52),
(74, 'Curaco De Velez', 1, NULL, NULL, 35),
(75, 'Curanilahue', 1, NULL, NULL, 27),
(76, 'Curarrehue', 1, NULL, NULL, 31),
(77, 'Curepto', 1, NULL, NULL, 26),
(78, 'Curico', 1, NULL, NULL, 24),
(79, 'Dalcahue', 1, NULL, NULL, 35),
(80, 'Diego De Almagro', 1, NULL, NULL, 6),
(81, 'Donihue', 1, NULL, NULL, 20),
(82, 'El Bosque', 1, NULL, NULL, 53),
(83, 'El Carmen', 1, NULL, NULL, 56),
(84, 'El Monte', 1, NULL, NULL, 54),
(85, 'El Quisco', 1, NULL, NULL, 16),
(86, 'El Tabo', 1, NULL, NULL, 16),
(87, 'Empedrado', 1, NULL, NULL, 26),
(88, 'Ercilla', 1, NULL, NULL, 32),
(89, 'Estacion Central', 1, NULL, NULL, 53),
(90, 'Florida', 1, NULL, NULL, 29),
(91, 'Freire', 1, NULL, NULL, 31),
(92, 'Freirina', 1, NULL, NULL, 8),
(93, 'Fresia', 1, NULL, NULL, 34),
(94, 'Frutillar', 1, NULL, NULL, 34),
(95, 'Futaleufu', 1, NULL, NULL, 36),
(96, 'Futrono', 1, NULL, NULL, 45),
(97, 'Galvarino', 1, NULL, NULL, 31),
(98, 'General Lagos', 1, NULL, NULL, 48),
(99, 'Gorbea', 1, NULL, NULL, 31),
(100, 'Graneros', 1, NULL, NULL, 20),
(101, 'Guaitecas', 1, NULL, NULL, 37),
(102, 'Hijuelas', 1, NULL, NULL, 15),
(103, 'Hualaihue', 1, NULL, NULL, 36),
(104, 'Hualane', 1, NULL, NULL, 24),
(105, 'Hualpen', 1, NULL, NULL, 29),
(106, 'Hualqui', 1, NULL, NULL, 29),
(107, 'Huara', 1, NULL, NULL, 2),
(108, 'Huasco', 1, NULL, NULL, 8),
(109, 'Huechuraba', 1, NULL, NULL, 53),
(110, 'Illapel', 1, NULL, NULL, 11),
(111, 'Independencia', 1, NULL, NULL, 53),
(112, 'Iquique', 1, NULL, NULL, 1),
(113, 'Isla De Maipo', 1, NULL, NULL, 54),
(114, 'Isla De Pascua', 1, NULL, NULL, 12),
(115, 'Juan Fernandez', 1, NULL, NULL, 18),
(116, 'La Calera', 1, NULL, NULL, 15),
(117, 'La Cisterna', 1, NULL, NULL, 53),
(118, 'La Cruz', 1, NULL, NULL, 15),
(119, 'La Estrella', 1, NULL, NULL, 22),
(120, 'La Florida', 1, NULL, NULL, 53),
(121, 'La Granja', 1, NULL, NULL, 53),
(122, 'La Higuera', 1, NULL, NULL, 9),
(123, 'La Ligua', 1, NULL, NULL, 14),
(124, 'La Pintana', 1, NULL, NULL, 53),
(125, 'La Reina', 1, NULL, NULL, 53),
(126, 'La Serena', 1, NULL, NULL, 9),
(127, 'La Union', 1, NULL, NULL, 45),
(128, 'Lago Ranco', 1, NULL, NULL, 45),
(129, 'Lago Verde', 1, NULL, NULL, 39),
(130, 'Laguna Blanca', 1, NULL, NULL, 42),
(131, 'Laja', 1, NULL, NULL, 28),
(132, 'Lampa', 1, NULL, NULL, 49),
(133, 'Lanco', 1, NULL, NULL, 46),
(134, 'Las Cabras', 1, NULL, NULL, 20),
(135, 'Las Condes', 1, NULL, NULL, 53),
(136, 'Lautaro', 1, NULL, NULL, 31),
(137, 'Lebu', 1, NULL, NULL, 27),
(138, 'Licanten', 1, NULL, NULL, 24),
(139, 'Limache', 1, NULL, NULL, 19),
(140, 'Linares', 1, NULL, NULL, 25),
(141, 'Litueche', 1, NULL, NULL, 22),
(142, 'Llanquihue', 1, NULL, NULL, 34),
(143, 'Llay-Llay', 1, NULL, NULL, 17),
(144, 'Lo Barnechea', 1, NULL, NULL, 53),
(145, 'Lo Espejo', 1, NULL, NULL, 53),
(146, 'Lo Prado', 1, NULL, NULL, 53),
(147, 'Lolol', 1, NULL, NULL, 21),
(148, 'Loncoche', 1, NULL, NULL, 31),
(149, 'Longavi', 1, NULL, NULL, 25),
(150, 'Lonquimay', 1, NULL, NULL, 32),
(151, 'Los Alamos', 1, NULL, NULL, 27),
(152, 'Los Andes', 1, NULL, NULL, 13),
(153, 'Los Angeles', 1, NULL, NULL, 28),
(154, 'Los Lagos', 1, NULL, NULL, 46),
(155, 'Los Muermos', 1, NULL, NULL, 34),
(156, 'Los Sauces', 1, NULL, NULL, 32),
(157, 'Los Vilos', 1, NULL, NULL, 11),
(158, 'Lota', 1, NULL, NULL, 29),
(159, 'Lumaco', 1, NULL, NULL, 32),
(160, 'Machali', 1, NULL, NULL, 20),
(161, 'Macul', 1, NULL, NULL, 53),
(162, 'Mafil', 1, NULL, NULL, 46),
(163, 'Maipu', 1, NULL, NULL, 53),
(164, 'Malloa', 1, NULL, NULL, 20),
(165, 'Marchigue', 1, NULL, NULL, 22),
(166, 'Maria Elena', 1, NULL, NULL, 5),
(167, 'Maria Pinto', 1, NULL, NULL, 52),
(168, 'Mariquina', 1, NULL, NULL, 46),
(169, 'Maule', 1, NULL, NULL, 26),
(170, 'Maullin', 1, NULL, NULL, 34),
(171, 'Mejillones', 1, NULL, NULL, 3),
(172, 'Melipeuco', 1, NULL, NULL, 31),
(173, 'Melipilla', 1, NULL, NULL, 52),
(174, 'Molina', 1, NULL, NULL, 24),
(175, 'Monte Patria', 1, NULL, NULL, 10),
(176, 'Mulchen', 1, NULL, NULL, 28),
(177, 'Nacimiento', 1, NULL, NULL, 28),
(178, 'Nancagua', 1, NULL, NULL, 21),
(179, 'Puerto Natales', 1, NULL, NULL, 44),
(180, 'Navidad', 1, NULL, NULL, 22),
(181, 'Negrete', 1, NULL, NULL, 28),
(182, 'Ninhue', 1, NULL, NULL, 55),
(183, 'Niquen', 1, NULL, NULL, 57),
(184, 'Nogales', 1, NULL, NULL, 15),
(185, 'Nueva Imperial', 1, NULL, NULL, 31),
(186, 'Nunoa', 1, NULL, NULL, 53),
(187, 'Ohiggins', 1, NULL, NULL, 38),
(188, 'Olivar', 1, NULL, NULL, 20),
(189, 'Ollague', 1, NULL, NULL, 4),
(190, 'Olmue', 1, NULL, NULL, 19),
(191, 'Osorno', 1, NULL, NULL, 33),
(192, 'Ovalle', 1, NULL, NULL, 10),
(193, 'Padre Hurtado', 1, NULL, NULL, 54),
(194, 'Padre Las Casas', 1, NULL, NULL, 31),
(195, 'Paihuano', 1, NULL, NULL, 9),
(196, 'Paillaco', 1, NULL, NULL, 46),
(197, 'Paine', 1, NULL, NULL, 51),
(198, 'Palena', 1, NULL, NULL, 36),
(199, 'Palmilla', 1, NULL, NULL, 21),
(200, 'Panguipulli', 1, NULL, NULL, 46),
(201, 'Panquehue', 1, NULL, NULL, 17),
(202, 'Papudo', 1, NULL, NULL, 14),
(203, 'Paredones', 1, NULL, NULL, 22),
(204, 'Parral', 1, NULL, NULL, 25),
(205, 'Pedro Aguirre Cerda', 1, NULL, NULL, 53),
(206, 'Pelarco', 1, NULL, NULL, 26),
(207, 'Pelluhue', 1, NULL, NULL, 23),
(208, 'Pemuco', 1, NULL, NULL, 56),
(209, 'Penaflor', 1, NULL, NULL, 54),
(210, 'Penalolen', 1, NULL, NULL, 53),
(211, 'Pencahue', 1, NULL, NULL, 26),
(212, 'Penco', 1, NULL, NULL, 29),
(213, 'Peralillo', 1, NULL, NULL, 21),
(214, 'Perquenco', 1, NULL, NULL, 31),
(215, 'Petorca', 1, NULL, NULL, 14),
(216, 'Peumo', 1, NULL, NULL, 20),
(217, 'Pica', 1, NULL, NULL, 2),
(218, 'Pichidegua', 1, NULL, NULL, 20),
(219, 'Pichilemu', 1, NULL, NULL, 22),
(220, 'Pinto', 1, NULL, NULL, 56),
(221, 'Pirque', 1, NULL, NULL, 50),
(222, 'Pitrufquen', 1, NULL, NULL, 31),
(223, 'Placilla', 1, NULL, NULL, 21),
(224, 'Portezuelo', 1, NULL, NULL, 55),
(225, 'Porvenir', 1, NULL, NULL, 43),
(226, 'Pozo Almonte', 1, NULL, NULL, 2),
(227, 'Primavera', 1, NULL, NULL, 43),
(228, 'Providencia', 1, NULL, NULL, 53),
(229, 'Puchuncavi', 1, NULL, NULL, 18),
(230, 'Pucon', 1, NULL, NULL, 31),
(231, 'Pudahuel', 1, NULL, NULL, 53),
(232, 'Puente Alto', 1, NULL, NULL, 50),
(233, 'Puerto Montt', 1, NULL, NULL, 34),
(234, 'Puerto Octay', 1, NULL, NULL, 33),
(235, 'Puerto Varas', 1, NULL, NULL, 34),
(236, 'Pumanque', 1, NULL, NULL, 21),
(237, 'Punitaqui', 1, NULL, NULL, 10),
(238, 'Punta Arenas', 1, NULL, NULL, 42),
(239, 'Puqueldon', 1, NULL, NULL, 35),
(240, 'Puren', 1, NULL, NULL, 32),
(241, 'Purranque', 1, NULL, NULL, 33),
(242, 'Putaendo', 1, NULL, NULL, 17),
(243, 'Putre', 1, NULL, NULL, 48),
(244, 'Puyehue', 1, NULL, NULL, 33),
(245, 'Queilen', 1, NULL, NULL, 35),
(246, 'Quellon', 1, NULL, NULL, 35),
(247, 'Quemchi', 1, NULL, NULL, 35),
(248, 'Quilaco', 1, NULL, NULL, 28),
(249, 'Quilicura', 1, NULL, NULL, 53),
(250, 'Quilleco', 1, NULL, NULL, 28),
(251, 'Quillon', 1, NULL, NULL, 56),
(252, 'Quillota', 1, NULL, NULL, 15),
(253, 'Quilpue', 1, NULL, NULL, 19),
(254, 'Quinchao', 1, NULL, NULL, 35),
(255, 'Quinta De Tilcoco', 1, NULL, NULL, 20),
(256, 'Quinta Normal', 1, NULL, NULL, 53),
(257, 'Quintero', 1, NULL, NULL, 18),
(258, 'Quirihue', 1, NULL, NULL, 55),
(259, 'Rancagua', 1, NULL, NULL, 20),
(260, 'Ranquil', 1, NULL, NULL, 55),
(261, 'Rauco', 1, NULL, NULL, 24),
(262, 'Recoleta', 1, NULL, NULL, 53),
(263, 'Renaico', 1, NULL, NULL, 32),
(264, 'Renca', 1, NULL, NULL, 53),
(265, 'Rengo', 1, NULL, NULL, 20),
(266, 'Requinoa', 1, NULL, NULL, 20),
(267, 'Retiro', 1, NULL, NULL, 25),
(268, 'Rinconada', 1, NULL, NULL, 13),
(269, 'Rio Bueno', 1, NULL, NULL, 45),
(270, 'Rio Claro', 1, NULL, NULL, 26),
(271, 'Rio Hurtado', 1, NULL, NULL, 10),
(272, 'Rio Ibanez', 1, NULL, NULL, 40),
(273, 'Rio Negro', 1, NULL, NULL, 33),
(274, 'Rio Verde', 1, NULL, NULL, 42),
(275, 'Romeral', 1, NULL, NULL, 24),
(276, 'Puerto Saavedra', 1, NULL, NULL, 31),
(277, 'Sagrada Familia', 1, NULL, NULL, 24),
(278, 'Salamanca', 1, NULL, NULL, 11),
(279, 'San Antonio', 1, NULL, NULL, 16),
(280, 'San Bernardo', 1, NULL, NULL, 51),
(281, 'San Carlos', 1, NULL, NULL, 57),
(282, 'San Clemente', 1, NULL, NULL, 26),
(283, 'San Esteban', 1, NULL, NULL, 13),
(284, 'San Fabian', 1, NULL, NULL, 57),
(285, 'San Felipe', 1, NULL, NULL, 17),
(286, 'San Fernando', 1, NULL, NULL, 21),
(287, 'San Francisco De Mostazal', 1, NULL, NULL, 20),
(288, 'San Gregorio', 1, NULL, NULL, 42),
(289, 'San Ignacio', 1, NULL, NULL, 56),
(290, 'San Javier', 1, NULL, NULL, 25),
(291, 'San Joaquin', 1, NULL, NULL, 53),
(292, 'San Jose De Maipo', 1, NULL, NULL, 50),
(293, 'San Juan De La Costa', 1, NULL, NULL, 33),
(294, 'San Miguel', 1, NULL, NULL, 53),
(295, 'San Nicolas', 1, NULL, NULL, 57),
(296, 'San Pablo', 1, NULL, NULL, 33),
(297, 'San Pedro', 1, NULL, NULL, 52),
(298, 'San Pedro De Atacama', 1, NULL, NULL, 4),
(299, 'San Pedro De La Paz', 1, NULL, NULL, 29),
(300, 'San Rafael', 1, NULL, NULL, 26),
(301, 'San Ramon', 1, NULL, NULL, 53),
(302, 'San Rosendo', 1, NULL, NULL, 28),
(303, 'San Vicente', 1, NULL, NULL, 20),
(304, 'Santa Barbara', 1, NULL, NULL, 28),
(305, 'Santa Cruz', 1, NULL, NULL, 21),
(306, 'Santa Juana', 1, NULL, NULL, 29),
(307, 'Santa Maria', 1, NULL, NULL, 17),
(308, 'Santiago', 1, NULL, NULL, 53),
(311, 'Santo Domingo', 1, NULL, NULL, 16),
(312, 'Sierra Gorda', 1, NULL, NULL, 3),
(313, 'Talagante', 1, NULL, NULL, 54),
(314, 'Talca', 1, NULL, NULL, 26),
(315, 'Talcahuano', 1, NULL, NULL, 29),
(316, 'Taltal', 1, NULL, NULL, 3),
(317, 'Temuco', 1, NULL, NULL, 31),
(318, 'Teno', 1, NULL, NULL, 24),
(319, 'Teodoro Schmidt', 1, NULL, NULL, 31),
(320, 'Tierra Amarilla', 1, NULL, NULL, 7),
(321, 'Til-Til', 1, NULL, NULL, 49),
(322, 'Timaukel', 1, NULL, NULL, 43),
(323, 'Tirua', 1, NULL, NULL, 27),
(324, 'Tocopilla', 1, NULL, NULL, 5),
(325, 'Tolten', 1, NULL, NULL, 31),
(326, 'Tome', 1, NULL, NULL, 29),
(327, 'Torres Del Paine', 1, NULL, NULL, 44),
(328, 'Tortel', 1, NULL, NULL, 38),
(329, 'Traiguen', 1, NULL, NULL, 32),
(330, 'Trehuaco', 1, NULL, NULL, 55),
(331, 'Tucapel', 1, NULL, NULL, 28),
(332, 'Valdivia', 1, NULL, NULL, 46),
(333, 'Vallenar', 1, NULL, NULL, 8),
(334, 'Valparaiso', 1, NULL, NULL, 18),
(335, 'Vichuquen', 1, NULL, NULL, 24),
(336, 'Victoria', 1, NULL, NULL, 32),
(337, 'Vicuna', 1, NULL, NULL, 9),
(338, 'Vilcun', 1, NULL, NULL, 31),
(339, 'Villa Alegre', 1, NULL, NULL, 25),
(340, 'Villa Alemana', 1, NULL, NULL, 19),
(341, 'Villarrica', 1, NULL, NULL, 31),
(342, 'Vina Del Mar', 1, NULL, NULL, 18),
(343, 'Vitacura', 1, NULL, NULL, 53),
(344, 'Yerbas Buenas', 1, NULL, NULL, 25),
(345, 'Yumbel', 1, NULL, NULL, 28),
(346, 'Yungay', 1, NULL, NULL, 56),
(347, 'Zapallar', 1, NULL, NULL, 14),
(348, 'Antartica', 1, NULL, NULL, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_pais`
--

CREATE TABLE `ubicacion_pais` (
  `ID_PAIS` bigint(20) NOT NULL,
  `CODIGO_SAG_PAIS` int(11) DEFAULT NULL,
  `NOMBRE_PAIS` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion_pais`
--

INSERT INTO `ubicacion_pais` (`ID_PAIS`, `CODIGO_SAG_PAIS`, `NOMBRE_PAIS`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`) VALUES
(1, 339, 'Abu Dhabi', 1, NULL, '2021-08-16'),
(2, 308, 'Afganistan', 1, NULL, NULL),
(3, 517, 'Albania', 1, NULL, NULL),
(4, 700, 'Alemania', 1, NULL, NULL),
(5, 132, 'Alto Volta', 1, NULL, NULL),
(6, 524, 'Andorra', 1, NULL, NULL),
(7, 140, 'Angola', 1, NULL, NULL),
(8, 244, 'Antillas Francesas', 1, NULL, NULL),
(9, 241, 'Antillas Holandesas', 1, NULL, NULL),
(10, 302, 'Arabia Saudita', 1, NULL, NULL),
(11, 127, 'Argelia', 1, NULL, NULL),
(12, 224, 'Argentina', 1, NULL, NULL),
(13, 353, 'Armenia', 1, NULL, NULL),
(14, 242, 'Aruba', 1, NULL, NULL),
(15, 406, 'Australia', 1, NULL, NULL),
(16, 700, 'Austria', 1, NULL, NULL),
(17, 349, 'Azerbaijan', 1, NULL, NULL),
(18, 207, 'Bahamas', 1, NULL, NULL),
(19, 313, 'Bahrein', 1, NULL, NULL),
(20, 321, 'Bangladesh', 1, NULL, NULL),
(21, 204, 'Barbados', 1, NULL, NULL),
(22, 700, 'Belgica', 1, NULL, NULL),
(23, 232, 'Belice', 1, NULL, NULL),
(24, 150, 'Benin', 1, NULL, NULL),
(25, 234, 'Bermudas', 1, NULL, NULL),
(26, 534, 'Bielorrusia', 1, NULL, NULL),
(27, 326, 'Birmania', 1, NULL, NULL),
(28, 221, 'Bolivia', 1, NULL, NULL),
(29, 535, 'Bosnia Herzegovina', 1, NULL, NULL),
(30, 113, 'Botswana', 1, NULL, NULL),
(31, 220, 'Brasil', 1, NULL, NULL),
(32, 344, 'Brunei', 1, NULL, NULL),
(33, 700, 'Bulgaria', 1, NULL, NULL),
(34, 152, 'Burkina Faso', 1, NULL, NULL),
(35, 141, 'Burundi', 1, NULL, NULL),
(36, 318, 'Butan', 1, NULL, NULL),
(37, 129, 'Cabo Verde', 1, NULL, NULL),
(38, 315, 'Camboya', 1, NULL, NULL),
(39, 149, 'Camerun', 1, NULL, NULL),
(40, 226, 'Canada', 1, NULL, NULL),
(41, 314, 'Ceylanisrilanka', 1, NULL, NULL),
(42, 130, 'Chad', 1, NULL, NULL),
(43, 235, 'Chile', 1, NULL, NULL),
(44, 336, 'China', 1, NULL, NULL),
(45, 700, 'Chipre', 1, NULL, NULL),
(46, 202, 'Colombia', 1, NULL, NULL),
(47, 144, 'Congo', 1, NULL, NULL),
(48, 334, 'Corea Del Norte', 1, NULL, NULL),
(49, 333, 'Corea Del Sur', 1, NULL, NULL),
(50, 107, 'Costa Marfil', 1, NULL, NULL),
(51, 211, 'Costa Rica', 1, NULL, NULL),
(52, 533, 'Croacia', 1, NULL, NULL),
(53, 209, 'Cuba', 1, NULL, NULL),
(54, 233, 'Curazao', 1, NULL, NULL),
(55, 700, 'Dinamarca', 1, NULL, NULL),
(56, 218, 'Ecuador', 1, NULL, NULL),
(57, 124, 'Egipto', 1, NULL, NULL),
(58, 347, 'Emiratos Arabes', 1, NULL, NULL),
(59, 700, 'Escocia', 1, NULL, NULL),
(60, 700, 'Eslovaquia', 1, NULL, NULL),
(61, 700, 'Eslovenia', 1, NULL, NULL),
(62, 700, 'Espaã‘A', 1, NULL, NULL),
(63, 700, 'Estonia', 1, NULL, NULL),
(64, 139, 'Etiopia', 1, NULL, NULL),
(65, 401, 'Fiji', 1, NULL, NULL),
(66, 335, 'Filipinas', 1, NULL, NULL),
(67, 700, 'Finlandia', 1, NULL, NULL),
(68, 700, 'Francia', 1, NULL, NULL),
(69, 145, 'Gabon', 1, NULL, NULL),
(70, 700, 'Gales', 1, NULL, NULL),
(71, 102, 'Gambia', 1, NULL, NULL),
(72, 350, 'Georgia', 1, NULL, NULL),
(73, 108, 'Ghana', 1, NULL, NULL),
(74, 700, 'Grecia', 1, NULL, NULL),
(75, 243, 'Guadalupe', 1, NULL, NULL),
(76, 215, 'Guatemala', 1, NULL, NULL),
(77, 549, 'Guayana Francesa', 1, NULL, NULL),
(78, 104, 'Guinea', 1, NULL, NULL),
(79, 147, 'Guinea Ecuatorial', 1, NULL, NULL),
(80, 103, 'Guinea-Bissau', 1, NULL, NULL),
(81, 217, 'Guyana', 1, NULL, NULL),
(82, 208, 'Haiti', 1, NULL, NULL),
(83, 700, 'Holanda', 1, NULL, NULL),
(84, 214, 'Honduras', 1, NULL, NULL),
(85, 345, 'Hong Kong', 1, NULL, NULL),
(86, 700, 'Hungria', 1, NULL, NULL),
(87, 317, 'India', 1, NULL, NULL),
(88, 328, 'Indonesia', 1, NULL, NULL),
(89, 700, 'Inglaterra', 1, NULL, NULL),
(90, 307, 'Irak', 1, NULL, NULL),
(91, 309, 'Iran', 1, NULL, NULL),
(92, 700, 'Irlanda', 1, NULL, NULL),
(93, 515, 'Islandia', 1, NULL, NULL),
(94, 548, 'Islas Baleares', 1, NULL, NULL),
(95, 227, 'Islas Caiman', 1, NULL, NULL),
(96, 118, 'Islas Comoras', 1, NULL, NULL),
(97, 411, 'Islas Cook', 1, NULL, NULL),
(98, 240, 'Islas Falkland', 1, NULL, NULL),
(99, 530, 'Islas Faroe', 1, NULL, NULL),
(100, 407, 'Islas Marshall', 1, NULL, NULL),
(101, 408, 'Islas Salomon', 1, NULL, NULL),
(102, 228, 'Islas Virgenes Americanas', 1, NULL, NULL),
(103, 229, 'Islas Virgenes Britanicas', 1, NULL, NULL),
(104, 306, 'Israel', 1, NULL, NULL),
(105, 700, 'Italia', 1, NULL, NULL),
(106, 205, 'Jamaica', 1, NULL, NULL),
(107, 331, 'Japon', 1, NULL, NULL),
(108, 301, 'Jordania', 1, NULL, NULL),
(109, 354, 'Kazajstan', 1, NULL, NULL),
(110, 137, 'Kenya', 1, NULL, NULL),
(111, 342, 'Kirguizistan', 1, NULL, NULL),
(112, 409, 'Kiribati', 1, NULL, NULL),
(113, 303, 'Kuwait', 1, NULL, NULL),
(114, 316, 'Laos', 1, NULL, NULL),
(115, 348, 'Lejano Oriente', 1, NULL, NULL),
(116, 114, 'Lesotho', 1, NULL, NULL),
(117, 700, 'Letonia', 1, NULL, NULL),
(118, 311, 'Libano', 1, NULL, NULL),
(119, 106, 'Liberia', 1, NULL, NULL),
(120, 125, 'Libia', 1, NULL, NULL),
(121, 531, 'Liechtenstein', 1, NULL, NULL),
(122, 700, 'Lituania', 1, NULL, NULL),
(123, 700, 'Luxemburgo', 1, NULL, NULL),
(124, 346, 'Macao', 1, NULL, NULL),
(125, 543, 'Macedonia', 1, NULL, NULL),
(126, 120, 'Madagascar', 1, NULL, NULL),
(127, 329, 'Malasia', 1, NULL, NULL),
(128, 115, 'Malawi', 1, NULL, NULL),
(129, 323, 'Maldivas', 1, NULL, NULL),
(130, 133, 'Mali', 1, NULL, NULL),
(131, 700, 'Malta', 1, NULL, NULL),
(132, 128, 'Marruecos', 1, NULL, NULL),
(133, 230, 'Martinica', 1, NULL, NULL),
(134, 119, 'Mauricio', 1, NULL, NULL),
(135, 134, 'Mauritania', 1, NULL, NULL),
(136, 110, 'Mayotte', 1, NULL, NULL),
(137, 300, 'Medio Oriente', 1, NULL, NULL),
(138, 216, 'Mexico', 1, NULL, NULL),
(139, 541, 'Moldova', 1, NULL, NULL),
(140, 546, 'Monaco', 1, NULL, NULL),
(141, 337, 'Mongolia', 1, NULL, NULL),
(142, 121, 'Mozambique', 1, NULL, NULL),
(143, 701, 'Myanmar', 1, NULL, NULL),
(144, 153, 'Namibia', 1, NULL, NULL),
(145, 402, 'Nauru', 1, NULL, NULL),
(146, 320, 'Nepal', 1, NULL, NULL),
(147, 212, 'Nicaragua', 1, NULL, NULL),
(148, 131, 'Niger', 1, NULL, NULL),
(149, 111, 'Nigeria', 1, NULL, NULL),
(150, 414, 'Nique Y Tokelau', 1, NULL, NULL),
(151, 512, 'Noruega', 1, NULL, NULL),
(152, 413, 'Nueva Caledonia', 1, NULL, NULL),
(153, 405, 'Nueva Zelandia', 1, NULL, NULL),
(154, 304, 'Oman', 1, NULL, NULL),
(155, 700, 'Paises Bajos', 1, NULL, NULL),
(156, 324, 'Pakistan', 1, NULL, NULL),
(157, 410, 'Palau', 1, NULL, NULL),
(158, 210, 'Panama', 1, NULL, NULL),
(159, 412, 'Papua/Nueva Guinea', 1, NULL, NULL),
(160, 222, 'Paraguay', 1, NULL, NULL),
(161, 219, 'Peru', 1, NULL, NULL),
(162, 700, 'Polonia', 1, NULL, NULL),
(163, 700, 'Portugal', 1, NULL, NULL),
(164, 231, 'Puerto Rico', 1, NULL, NULL),
(165, 312, 'Qatar', 1, NULL, NULL),
(166, 700, 'Reino Unido', 1, NULL, NULL),
(167, 148, 'Rep. Centroafricana', 1, NULL, NULL),
(168, 151, 'Rep. De Djibouti', 1, NULL, NULL),
(169, 206, 'Rep. Dominicana', 1, NULL, NULL),
(170, 700, 'Republica Checa', 1, NULL, NULL),
(171, 154, 'Reunion', 1, NULL, NULL),
(172, 142, 'Ruanda', 1, NULL, NULL),
(173, 700, 'Rumania', 1, NULL, NULL),
(174, 520, 'Rusia', 1, NULL, NULL),
(175, 213, 'Salvador', 1, NULL, NULL),
(176, 404, 'Samoa', 1, NULL, NULL),
(177, 238, 'San Cristobal Y Nieves', 1, NULL, NULL),
(178, 236, 'San Vicente Y Granadinas', 1, NULL, NULL),
(179, 237, 'Santa Lucia', 1, NULL, NULL),
(180, 547, 'Santa Sede', 1, NULL, NULL),
(181, 146, 'Sao Tome Y Principe', 1, NULL, NULL),
(182, 101, 'Senegal', 1, NULL, NULL),
(183, 525, 'Serbia', 1, NULL, NULL),
(184, 143, 'Seychelles', 1, NULL, NULL),
(185, 341, 'Sharjah', 1, NULL, NULL),
(186, 105, 'Sierra Leona', 1, NULL, NULL),
(187, 338, 'Sikkim', 1, NULL, NULL),
(188, 332, 'Singapur', 1, NULL, NULL),
(189, 310, 'Siria', 1, NULL, NULL),
(190, 138, 'Somalia', 1, NULL, NULL),
(191, 550, 'Sri Lanka', 1, NULL, NULL),
(192, 112, 'Sudafrica', 1, NULL, NULL),
(193, 123, 'Sudan', 1, NULL, NULL),
(194, 700, 'Suecia', 1, NULL, NULL),
(195, 507, 'Suiza', 1, NULL, NULL),
(196, 239, 'Surinam', 1, NULL, NULL),
(197, 122, 'Swazilandia', 1, NULL, NULL),
(198, 416, 'Tahiti', 1, NULL, NULL),
(199, 351, 'Tailandia', 1, NULL, NULL),
(200, 330, 'Taiwan/Formosa', 1, NULL, NULL),
(201, 135, 'Tanzania', 1, NULL, NULL),
(202, 343, 'Tayikistan', 1, NULL, NULL),
(203, 319, 'Thailandia', 1, NULL, NULL),
(204, 109, 'Togo', 1, NULL, NULL),
(205, 403, 'Tonga', 1, NULL, NULL),
(206, 203, 'Trinidad Y Tobago', 1, NULL, NULL),
(207, 126, 'Tunez', 1, NULL, NULL),
(208, 352, 'Turkmenistan', 1, NULL, NULL),
(209, 521, 'Turquia', 1, NULL, NULL),
(210, 415, 'Tuvalu', 1, NULL, NULL),
(211, 542, 'Ucrania', 1, NULL, NULL),
(212, 136, 'Uganda', 1, NULL, NULL),
(213, 700, 'Union Europea', 1, NULL, NULL),
(214, 223, 'Uruguay', 1, NULL, NULL),
(215, 225, 'Usa', 1, NULL, NULL),
(216, 327, 'Uzbekistan', 1, NULL, NULL),
(217, 417, 'Vanuatu', 1, NULL, NULL),
(218, 523, 'Vaticano', 1, NULL, NULL),
(219, 201, 'Venezuela', 1, NULL, NULL),
(220, 325, 'Vietnam', 1, NULL, NULL),
(221, 322, 'Yemen', 1, NULL, NULL),
(222, 117, 'Zambia', 1, NULL, NULL),
(223, 116, 'Zimbabwe', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_provincia`
--

CREATE TABLE `ubicacion_provincia` (
  `ID_PROVINCIA` bigint(20) NOT NULL,
  `NOMBRE_PROVINCIA` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_REGION` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion_provincia`
--

INSERT INTO `ubicacion_provincia` (`ID_PROVINCIA`, `NOMBRE_PROVINCIA`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_REGION`) VALUES
(1, 'Iquique', 1, NULL, '2021-08-16', 1),
(2, 'Tamarugal', 1, NULL, NULL, 1),
(3, 'Antofagasta', 1, NULL, NULL, 2),
(4, 'El Loa', 1, NULL, NULL, 2),
(5, 'Tocopilla', 1, NULL, NULL, 2),
(6, 'Chanaral', 1, NULL, NULL, 3),
(7, 'Copiapo', 1, NULL, NULL, 3),
(8, 'Huasco', 1, NULL, NULL, 3),
(9, 'Elqui', 1, NULL, NULL, 5),
(10, 'Limari', 1, NULL, NULL, 5),
(11, 'Choapa', 1, NULL, NULL, 5),
(12, 'Isla De Pascua', 1, NULL, NULL, 4),
(13, 'Los Andes', 1, NULL, NULL, 4),
(14, 'Petorca', 1, NULL, NULL, 4),
(15, 'Quillota', 1, NULL, NULL, 4),
(16, 'San Antonio', 1, NULL, NULL, 4),
(17, 'San Felipe De Aconcagua', 1, NULL, NULL, 4),
(18, 'Valparaiso', 1, NULL, NULL, 4),
(19, 'Marga Marga', 1, NULL, NULL, 4),
(20, 'Cachapoal', 1, NULL, NULL, 6),
(21, 'Colchagua', 1, NULL, NULL, 6),
(22, 'Cardenal Caro', 1, NULL, NULL, 6),
(23, 'Cauquenes', 1, NULL, NULL, 7),
(24, 'Curicï¿½', 1, NULL, NULL, 7),
(25, 'Linares', 1, NULL, NULL, 7),
(26, 'Talca', 1, NULL, NULL, 7),
(27, 'Arauco', 1, NULL, NULL, 8),
(28, 'Biobio', 1, NULL, NULL, 8),
(29, 'Concepcion', 1, NULL, NULL, 8),
(30, 'Nuble', 1, NULL, NULL, 13),
(31, 'Cautin', 1, NULL, NULL, 9),
(32, 'Malleco', 1, NULL, NULL, 9),
(33, 'Osorno', 1, NULL, NULL, 10),
(34, 'Llanquihue', 1, NULL, NULL, 10),
(35, 'Chiloe', 1, NULL, NULL, 10),
(36, 'Palena', 1, NULL, NULL, 10),
(37, 'Aysen', 1, NULL, NULL, 11),
(38, 'Capitin Prat', 1, NULL, NULL, 11),
(39, 'Coyhaique', 1, NULL, NULL, 11),
(40, 'General Carrera', 1, NULL, NULL, 11),
(41, 'Antartica Chilena', 1, NULL, NULL, 12),
(42, 'Magallanes', 1, NULL, NULL, 12),
(43, 'Tierra Del Fuego', 1, NULL, NULL, 12),
(44, 'Ultima Esperanza', 1, NULL, NULL, 12),
(45, 'Ranco', 1, NULL, NULL, 14),
(46, 'Valdivia', 1, NULL, NULL, 14),
(47, 'Arica', 1, NULL, NULL, 15),
(48, 'Parinacota', 1, NULL, NULL, 15),
(49, 'Chacabuco', 1, NULL, NULL, 16),
(50, 'Cordillera', 1, NULL, NULL, 16),
(51, 'Maipo', 1, NULL, NULL, 16),
(52, 'Melipilla', 1, NULL, NULL, 16),
(53, 'Santiago', 1, NULL, NULL, 16),
(54, 'Talagante', 1, NULL, NULL, 16),
(55, 'Itata', 1, NULL, NULL, 13),
(56, 'Diguillin', 1, NULL, NULL, 13),
(57, 'Punilla', 1, NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_region`
--

CREATE TABLE `ubicacion_region` (
  `ID_REGION` bigint(20) NOT NULL,
  `NOMBRE_REGION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_PAIS` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion_region`
--

INSERT INTO `ubicacion_region` (`ID_REGION`, `NOMBRE_REGION`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_PAIS`) VALUES
(1, 'TARAPACA I', 1, NULL, '2021-08-16', 43),
(2, 'ANTOFAGASTA II', 1, NULL, NULL, 43),
(3, 'ATACAMA III', 1, NULL, NULL, 43),
(4, 'VALPARAISO IV', 1, NULL, NULL, 43),
(5, 'COQUIMBO V', 1, NULL, NULL, 43),
(6, 'O\'HIGGINS VI', 1, NULL, NULL, 43),
(7, 'MAULE VII', 1, NULL, NULL, 43),
(8, 'BIO BIO VIII', 1, NULL, NULL, 43),
(9, 'ARAUCANIA IX', 1, NULL, NULL, 43),
(10, 'LOS LAGOS X', 1, NULL, NULL, 43),
(11, 'AYSEN XI', 1, NULL, NULL, 43),
(12, 'MAGALLANES XII', 1, NULL, NULL, 43),
(13, 'NUBLE XVI', 1, NULL, NULL, 43),
(14, 'LOS RIOS XIV', 1, NULL, NULL, 43),
(15, 'ARICA Y PARINACOTA XV', 1, NULL, NULL, 43),
(16, 'METROPOLITANA SANTIAGO RM', 1, NULL, NULL, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ausuario`
--

CREATE TABLE `usuario_ausuario` (
  `ID_AUSUARIO` bigint(20) NOT NULL,
  `FECHA_AUSUARIO` datetime DEFAULT NULL,
  `TIPO_OPERACION_AUSUARIO` int(11) DEFAULT NULL,
  `TABLA_OBJETIVO_AUSUARIO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DETALLE_OPERACION_AUSUARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TSISTEMA` int(11) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_chat`
--

CREATE TABLE `usuario_chat` (
  `ID_CHAT` bigint(20) NOT NULL,
  `MENSAJE_CHAT` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTADOR_CHAT` int(11) DEFAULT NULL,
  `FECHA_CHAT` date DEFAULT NULL,
  `HORA_CHAT` time DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_USUARIO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ptusuario`
--

CREATE TABLE `usuario_ptusuario` (
  `ID_PTUSUARIO` bigint(20) NOT NULL,
  `DETALLE_PTUSUARIO` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_TUSUARIO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tusuario`
--

CREATE TABLE `usuario_tusuario` (
  `ID_TUSUARIO` bigint(20) NOT NULL,
  `NOMBRE_TUSUARIO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_tusuario`
--

INSERT INTO `usuario_tusuario` (`ID_TUSUARIO`, `NOMBRE_TUSUARIO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`) VALUES
(1, 'Administrador', 1, '2021-07-20', '2021-07-20'),
(2, 'Recepcion', 1, '2021-07-20', '2021-07-20'),
(3, 'Proceso', 1, '2021-07-20', '2021-07-20'),
(4, 'Despacho', 1, '2021-07-20', '2021-07-20'),
(5, 'Bodega', 1, '2021-07-20', '2021-10-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_usuario`
--

CREATE TABLE `usuario_usuario` (
  `ID_USUARIO` bigint(20) NOT NULL,
  `NOMBRE_USUARIO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RUT_USUARIO` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DV_USUARIO` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PNOMBRE_USUARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SNOMBRE_USUARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAPELLIDO_USUARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SAPELLIDO_USUARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTRASENA_USUARIO` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_USUARIO` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TELEFONO_USUARIO` bigint(30) DEFAULT NULL,
  `ESTADO_REGISTRO` int(11) DEFAULT NULL,
  `INGRESO` date DEFAULT NULL,
  `MODIFICACION` date DEFAULT NULL,
  `ID_TUSUARIO` bigint(20) NOT NULL,
  `NIVEL_USUARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_usuario`
--

INSERT INTO `usuario_usuario` (`ID_USUARIO`, `NOMBRE_USUARIO`, `RUT_USUARIO`, `DV_USUARIO`, `PNOMBRE_USUARIO`, `SNOMBRE_USUARIO`, `PAPELLIDO_USUARIO`, `SAPELLIDO_USUARIO`, `CONTRASENA_USUARIO`, `EMAIL_USUARIO`, `TELEFONO_USUARIO`, `ESTADO_REGISTRO`, `INGRESO`, `MODIFICACION`, `ID_TUSUARIO`, `NIVEL_USUARIO`) VALUES
(1, 'prueba', '1', '1', 'Prueba', '-', 'Sistema', '-', '1234', 'prueba@prueba.cl', 1, 1, '2021-07-20', '2021-07-20', 1, NULL),
(2, 'gtoledo', '186172231', 'k', 'Gabriel', 'Eduardo', 'Toledo', 'Muñoz', '1234', '1@1.cl', 1, 1, '2021-09-23', '2021-09-23', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control_eap`
--
ALTER TABLE `control_eap`
  ADD PRIMARY KEY (`ID_EAP`),
  ADD KEY `fk_control_eap_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_control_eap_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_control_eap_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_control_eap_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `control_eau`
--
ALTER TABLE `control_eau`
  ADD PRIMARY KEY (`ID_EAU`),
  ADD KEY `fk_control_eau_princiapl_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_control_eau_usuario_usuario_idx` (`ID_USUARIO`),
  ADD KEY `fk_control_eau_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_control_eau_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `estandar_ecomercial`
--
ALTER TABLE `estandar_ecomercial`
  ADD PRIMARY KEY (`ID_ECOMERCIAL`),
  ADD KEY `fk_estandar_ecomercial_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_estandar_ecomercial_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_estandar_ecomercial_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `estandar_eexportacion`
--
ALTER TABLE `estandar_eexportacion`
  ADD PRIMARY KEY (`ID_ESTANDAR`),
  ADD KEY `fk_estandar_eexportacion_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_estandar_eexportacion_fruta_especies_idx` (`ID_ESPECIES`),
  ADD KEY `fk_estandar_eexportacion_fruta_tetiqueta_idx` (`ID_TETIQUETA`),
  ADD KEY `fk_estandar_eexportacion_fruta_tembalaje_idx` (`ID_TEMBALAJE`),
  ADD KEY `fk_estandar_eexportacion_estandar_ecomercial_idx` (`ID_ECOMERCIAL`),
  ADD KEY `fk_estandar_eexportacion_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_estandar_eexportacion_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `estandar_eindustrial`
--
ALTER TABLE `estandar_eindustrial`
  ADD PRIMARY KEY (`ID_ESTANDAR`),
  ADD KEY `fk_estandar_eindustrial_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_estandar_eindustrial_fruta_especies_idx` (`ID_ESPECIES`),
  ADD KEY `fk_estandar_eindustrial_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_estandar_eindustrial_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_estandar_eindustrial_material_producto_idx` (`ID_PRODUCTO`);

--
-- Indices de la tabla `estandar_erecepcion`
--
ALTER TABLE `estandar_erecepcion`
  ADD PRIMARY KEY (`ID_ESTANDAR`),
  ADD KEY `fk_estandar_erecepcion_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_estandar_erecepcion_fruta_especies_idx` (`ID_ESPECIES`),
  ADD KEY `fk_estandar_erecepcion_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_estandar_erecepcion_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_estandar_erecepcion_material_producto_idx` (`ID_PRODUCTO`);

--
-- Indices de la tabla `fruta_aaduana`
--
ALTER TABLE `fruta_aaduana`
  ADD PRIMARY KEY (`ID_AADUANA`),
  ADD KEY `fk_fruta_aaduana_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_aaduana_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_aaduana_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_aaduana_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_acarga`
--
ALTER TABLE `fruta_acarga`
  ADD PRIMARY KEY (`ID_ACARGA`),
  ADD KEY `fk_fruta_acarga_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_acarga_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_acarga_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_adestino`
--
ALTER TABLE `fruta_adestino`
  ADD PRIMARY KEY (`ID_ADESTINO`),
  ADD KEY `fk_fruta_adestino_principal_empres_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_adestino_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_adestino_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_agcarga`
--
ALTER TABLE `fruta_agcarga`
  ADD PRIMARY KEY (`ID_AGCARGA`),
  ADD KEY `fk_fruta_agcarga_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_agcarga_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_agcarga_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_agcarga_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_atmosfera`
--
ALTER TABLE `fruta_atmosfera`
  ADD PRIMARY KEY (`ID_ATMOSFERA`),
  ADD KEY `fk_fruta_atmosfera_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_atmosfera_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_atmosfera_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_broker`
--
ALTER TABLE `fruta_broker`
  ADD PRIMARY KEY (`ID_BROKER`),
  ADD KEY `fk_fruta_broker_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_broker_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_broker_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_broker_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_ccalidad`
--
ALTER TABLE `fruta_ccalidad`
  ADD PRIMARY KEY (`ID_CCALIDAD`),
  ADD KEY `fk_fruta_ccalidad_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_ccalidad_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_ccalidad_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_comprador`
--
ALTER TABLE `fruta_comprador`
  ADD PRIMARY KEY (`ID_COMPRADOR`),
  ADD KEY `fk_fruta_comprador_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_comprador_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_comprador_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_fruta_comprador_usuario_usuarioi_idx` (`ID_USUARIOI`);

--
-- Indices de la tabla `fruta_consignatario`
--
ALTER TABLE `fruta_consignatario`
  ADD PRIMARY KEY (`ID_CONSIGNATARIO`),
  ADD KEY `fk_fruta_consignatario_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_consignatario_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_consignatario_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_consignatario_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_contraparte`
--
ALTER TABLE `fruta_contraparte`
  ADD PRIMARY KEY (`ID_CONTRAPARTE`),
  ADD KEY `fk_fruta_contraparte_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_contraparte_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_contraparte_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_contraparte_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_cuartel`
--
ALTER TABLE `fruta_cuartel`
  ADD PRIMARY KEY (`ID_CUARTEL`),
  ADD KEY `fk_fruta_cuartel_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_cuartel_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_cuartel_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_cuartel_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_cventa`
--
ALTER TABLE `fruta_cventa`
  ADD PRIMARY KEY (`ID_CVENTA`),
  ADD KEY `fk_fruta_cventa_principal_emrpresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_cventa_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_cventa_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_despachoex`
--
ALTER TABLE `fruta_despachoex`
  ADD PRIMARY KEY (`ID_DESPACHOEX`),
  ADD KEY `fk_fruta_despachoex_fruta_inpector_idx` (`ID_INPECTOR`),
  ADD KEY `fk_fruta_despachoex_fruta_icarga_idx` (`ID_ICARGA`),
  ADD KEY `fk_fruta_despachoex_fruta_dfinal_idx` (`ID_DFINAL`),
  ADD KEY `fk_fruta_despachoex_fruta_exportadora_idx` (`ID_EXPPORTADORA`),
  ADD KEY `fk_fruta_despachoex_fruta_rfinal_idx` (`ID_RFINAL`),
  ADD KEY `fk_fruta_despachoex_fruta_agcarga_idx` (`ID_AGCARGA`),
  ADD KEY `fk_fruta_despachoex_fruta_mercado_idx` (`ID_MERCADO`),
  ADD KEY `fk_fruta_despachoex_ubicacion_pais_idx` (`ID_PAIS`),
  ADD KEY `fk_fruta_despachoex_transporte_transporte2_idx` (`ID_TRANSPORTE2`),
  ADD KEY `fk_fruta_despachoex_fruta_lcarga_idx` (`ID_LCARGA`),
  ADD KEY `fk_fruta_despachoex_fruta_ldestino_idx` (`ID_LDESTINO`),
  ADD KEY `fk_fruta_despachoex_transporte_larea_idx` (`ID_LAREA`),
  ADD KEY `fk_fruta_despachoex_transporte_aeronave_idx` (`ID_AERONAVE`),
  ADD KEY `fk_fruta_despachoex_fruta_acarga_idx` (`ID_ACARGA`),
  ADD KEY `fk_fruta_despachoex_fruta_adestino_idx` (`ID_ADESTINO`),
  ADD KEY `fk_fruta_despachoex_transporte_naviera_idx` (`ID_NAVIERA`),
  ADD KEY `fk_fruta_despachoex_fruta_pcarga_idx` (`ID_PCARGA`),
  ADD KEY `fk_fruta_despachoex_fruta_pdestino_idx` (`ID_PDESTINO`),
  ADD KEY `fk_fruta_despachoex_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_despachoex_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_fruta_despachoex_fruta_contraparte_idx` (`ID_CONTRAPARTE`),
  ADD KEY `fk_fruta_despachoex_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_despachoex_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_despachoex_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_despachoex_usuario_usuaioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_despachoex_usuario_usuaiom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_despachoind`
--
ALTER TABLE `fruta_despachoind`
  ADD PRIMARY KEY (`ID_DESPACHO`),
  ADD KEY `fk_fruta_despachoind_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_despachoind_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_despachoind_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_despachoind_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_fruta_despachoind_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_despachoind_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_despachoind_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_despachoind_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_despachoind_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_fruta_despachoind_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_fruta_despachoind_fruta_comprador_idx` (`ID_COMPRADOR`);

--
-- Indices de la tabla `fruta_despachomp`
--
ALTER TABLE `fruta_despachomp`
  ADD PRIMARY KEY (`ID_DESPACHO`),
  ADD KEY `fk_fruta_despachomp_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_despachomp_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_despachomp_fruta_comprador_idx` (`ID_COMPRADOR`),
  ADD KEY `fk_fruta_despachomp_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_despachomp_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_despachomp_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_despachomp_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_despachomp_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_fruta_despachomp_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_despachomp_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_fruta_despachomp_fruta_planta3_idx` (`ID_PLANTA3`);

--
-- Indices de la tabla `fruta_despachopt`
--
ALTER TABLE `fruta_despachopt`
  ADD PRIMARY KEY (`ID_DESPACHO`),
  ADD KEY `fk_fruta_despachopt_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_despachopt_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_despachopt_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_despachopt_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_fruta_despachopt_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_despachopt_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_despachopt_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_despachopt_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_despachopt_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_fruta_despachopt_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_fruta_despachopt_fruta_comprador_idx` (`ID_COMPRADOR`);

--
-- Indices de la tabla `fruta_dfinal`
--
ALTER TABLE `fruta_dfinal`
  ADD PRIMARY KEY (`ID_DFINAL`),
  ADD KEY `fk_fruta_dfinal_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_dfinal_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_dfinal_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_dicarga`
--
ALTER TABLE `fruta_dicarga`
  ADD PRIMARY KEY (`ID_DICARGA`),
  ADD KEY `fk_fruta_dicarga_estandar_eexportacion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_dicarga_fruta_icarga_idx` (`ID_ICARGA`),
  ADD KEY `fk_fruta_dicarga_fruta_tcalibre_idx` (`ID_TCALIBRE`);

--
-- Indices de la tabla `fruta_dpexportacion`
--
ALTER TABLE `fruta_dpexportacion`
  ADD PRIMARY KEY (`ID_DPEXPORTACION`),
  ADD KEY `fk_fruta_dpexportacion_estandar_eexportacion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_dpexportacion_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_dpexportacion_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_dpexportacion_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_dpexportacion_fruta_proceso_idx` (`ID_PROCESO`),
  ADD KEY `fk_fruta_dpexportacion_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_dpexportacion_fruta_tcalibre_idx` (`ID_TCALIBRE`),
  ADD KEY `fk_fruta_dpexportacion_fruta_tembalaje_idx` (`ID_TEMBALAJE`);

--
-- Indices de la tabla `fruta_dpindustrial`
--
ALTER TABLE `fruta_dpindustrial`
  ADD PRIMARY KEY (`ID_DPINDUSTRIAL`),
  ADD KEY `fk_fruta_dpindustrial_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_dpindustrial_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_dpindustrial_estandar_eindustrial_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_dpindustrial_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_dpindustrial_frtua_proceso_idx` (`ID_PROCESO`),
  ADD KEY `fk_fruta_dpindustrial_fruta_tmanejo_idx` (`ID_TMANEJO`);

--
-- Indices de la tabla `fruta_drecepcionind`
--
ALTER TABLE `fruta_drecepcionind`
  ADD PRIMARY KEY (`ID_DRECEPCION`),
  ADD KEY `fk_fruta_drecepcionind_frtua_recepcionind_idx` (`ID_RECEPCION`),
  ADD KEY `fk_fruta_drecepcionind_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_drecepcionind_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_drecepcionind_estandar_eindustrial_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_drecepcionind_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_drecepcionind_fruta_tmanejo_idx` (`ID_TMANEJO`);

--
-- Indices de la tabla `fruta_drecepcionmp`
--
ALTER TABLE `fruta_drecepcionmp`
  ADD PRIMARY KEY (`ID_DRECEPCION`),
  ADD KEY `fk_fruta_drecepcionmp_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_drecepcionmp_estandar_erecepcion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_drecepcionmp_fruta_recepcionmp_idx` (`ID_RECEPCION`),
  ADD KEY `fk_fruta_drecepcionmp_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_drecepcionmp_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_drecepcionmp_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_drecepcionmp_fruta_ttratamiento1_idx` (`ID_TTRATAMIENTO1`),
  ADD KEY `fk_fruta_drecepcionmp_fruta_ttratamiento2_idx` (`ID_TTRATAMIENTO2`);

--
-- Indices de la tabla `fruta_drecepcionpt`
--
ALTER TABLE `fruta_drecepcionpt`
  ADD PRIMARY KEY (`ID_DRECEPCION`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_recepcionpt_idx` (`ID_RECEPCION`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_tcalibre_idx` (`ID_TCALIBRE`),
  ADD KEY `fk_fruta_drecepcionpt_estandar_eexportacion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_tembalaje_idx` (`ID_TEMBALAJE`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_tcategoria_idx` (`ID_TCATEGORIA`),
  ADD KEY `fk_fruta_drecepcionpt_fruta_tcolor_idx` (`ID_TCOLOR`);

--
-- Indices de la tabla `fruta_drepaletizajeex`
--
ALTER TABLE `fruta_drepaletizajeex`
  ADD PRIMARY KEY (`ID_DREPALETIZAJE`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_tcalibre_idx` (`ID_TCALIBRE`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_tembalaje_idx` (`ID_TEMBALAJE`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_estandar_eexportacion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_repaletizaje_idx` (`ID_REPALETIZAJE`),
  ADD KEY `fk_fruta_drepaletizajeex_fruta_exiexportacion_idx` (`ID_EXIEXPORTACION`);

--
-- Indices de la tabla `fruta_drepaletizajemp`
--
ALTER TABLE `fruta_drepaletizajemp`
  ADD PRIMARY KEY (`ID_DREPALETIZAJE`),
  ADD KEY `fk_fruta_drepaletizajemp_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_drepaletizajemp_fruta_estandar_erecepcion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_drepaletizajemp_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_drepaletizajemp_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_drepaletizajemp_fruta_repaletizaje_idx` (`ID_REPALETIZAJE`),
  ADD KEY `fk_fruta_drepaletizajemp_fruta_eximateriaprima_idx` (`ID_EXIMATERIAPRIMA`),
  ADD KEY `fk_fruta_drepaletizajemp_fruta_tmanejo_idx` (`ID_TMANEJO`);

--
-- Indices de la tabla `fruta_drexportacion`
--
ALTER TABLE `fruta_drexportacion`
  ADD PRIMARY KEY (`ID_DREXPORTACION`),
  ADD KEY `fk_fruta_drexportacion_estandar_eexportacion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_drexportacion_fruta_tcalibre_idx` (`ID_TCALIBRE`),
  ADD KEY `fk_fruta_drexportacion_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_drexportacion_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_drexportacion_fruta_treembalaje_idx` (`ID_REEMBALAJE`),
  ADD KEY `fk_fruta_drexportacion_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_drexportacion_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_drexportacion_fruta_tembalaje_idx` (`ID_TEMBALAJE`);

--
-- Indices de la tabla `fruta_drindustrial`
--
ALTER TABLE `fruta_drindustrial`
  ADD PRIMARY KEY (`ID_DRINDUSTRIAL`),
  ADD KEY `fk_fruta_drindustrial_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_drindustrial_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_drindustrial_estandar_eindustrial_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_drindustrial_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_drindustrial_fruta_reembalaje_idx` (`ID_REEMBALAJE`),
  ADD KEY `fk_fruta_drindustrial_fruta_tmanejo_idx` (`ID_TMANEJO`);

--
-- Indices de la tabla `fruta_especies`
--
ALTER TABLE `fruta_especies`
  ADD PRIMARY KEY (`ID_ESPECIES`);

--
-- Indices de la tabla `fruta_exiexportacion`
--
ALTER TABLE `fruta_exiexportacion`
  ADD PRIMARY KEY (`ID_EXIEXPORTACION`),
  ADD KEY `fk_fruta_exiexportacion_fruta_tcalibre_idx` (`ID_TCALIBRE`),
  ADD KEY `fk_fruta_exiexportacion_fruta_tembalaje_idx` (`ID_TEMBALAJE`),
  ADD KEY `fk_fruta_exiexportacion_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_exiexportacion_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_exiexportacion_fruta_estandar_eexportacion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_exiexportacion_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_exiexportacion_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_exiexportacion_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_exiexportacion_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_exiexportacion_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_exiexportacion_fruta_proceso_idx` (`ID_PROCESO`),
  ADD KEY `fk_fruta_exiexportacion_fruta_recepcion_idx` (`ID_RECEPCION`),
  ADD KEY `fk_fruta_exiexportacion_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_exiexportacion_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_fruta_exiexportacion_fruta_repaletizaje_idx` (`ID_REPALETIZAJE`),
  ADD KEY `fk_fruta_exiexportacion_fruta_reembalaje_idx` (`ID_REEMBALAJE`),
  ADD KEY `fk_fruta_exiexportacion_fruta_despacho_idx` (`ID_DESPACHO`),
  ADD KEY `fk_fruta_exiexportacion_fruta_despachoex_idx` (`ID_DESPACHOEX`),
  ADD KEY `fk_fruta_exiexportacion_fruta_inpsag_idx` (`ID_INPSAG`),
  ADD KEY `fk_fruta_exiexportacion_fruta_pcdespacho_idx` (`ID_PCDESPACHO`),
  ADD KEY `fk_fruta_exiexportacion_fruta_icarga_idx` (`ID_ICARGA`),
  ADD KEY `fk_fruta_exiexportacion_fruta_despacho2_idx` (`ID_DESPACHO2`);

--
-- Indices de la tabla `fruta_exiindustrial`
--
ALTER TABLE `fruta_exiindustrial`
  ADD PRIMARY KEY (`ID_EXIINDUSTRIAL`),
  ADD KEY `fk_fruta_exiindustrial_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_exiindustrial_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_exiindustrial_fruta_estandar_eindustrial_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_exiindustrial_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_exiindustrial_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_exiindustrial_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_exiindustrial_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_exiindustrial_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_exiindustrial_fruta_recepcion_idx` (`ID_RECEPCION`),
  ADD KEY `fk_fruta_exiindustrial_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_exiindustrial_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_fruta_exiindustrial_fruta_proceso_idx` (`ID_PROCESO`),
  ADD KEY `fk_fruta_exiindustrial_principal_reembalaje_idx` (`ID_REEMBALAJE`),
  ADD KEY `fk_fruta_exiindustrial_principal_despacho_idx` (`ID_DESPACHO`),
  ADD KEY `fk_fruta_exiindustrial_fruta_despacho2_idx` (`ID_DESPACHO2`);

--
-- Indices de la tabla `fruta_eximateriaprima`
--
ALTER TABLE `fruta_eximateriaprima`
  ADD PRIMARY KEY (`ID_EXIMATERIAPRIMA`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_tmanejo_idx` (`ID_TMANEJO`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_fruta_eximateriaprima_estandar_erecepcion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_eximateriaprima_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_eximateriaprima_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_eximateriaprima_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_recepcion_idx` (`ID_RECEPCION`),
  ADD KEY `fk_fruta_eximateriaprima_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_eximateriaprima_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_proceso_idx` (`ID_PROCESO`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_repaletizaje_idx` (`ID_REPALETIZAJE`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_despacho_idx` (`ID_DESPACHO`),
  ADD KEY `fk_fruta_eximateriaprima_fruta_despacho2_idx` (`ID_DESPACHO2`);

--
-- Indices de la tabla `fruta_exportadora`
--
ALTER TABLE `fruta_exportadora`
  ADD PRIMARY KEY (`ID_EXPORTADORA`),
  ADD KEY `fk_fruta_exportadora_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_exportadora_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_exportadora_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_folio`
--
ALTER TABLE `fruta_folio`
  ADD PRIMARY KEY (`ID_FOLIO`),
  ADD KEY `fk_fruta_folio_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_folio_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_folio_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_folio_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_folio_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_fpago`
--
ALTER TABLE `fruta_fpago`
  ADD PRIMARY KEY (`ID_FPAGO`),
  ADD KEY `fk_fruta_fpago_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_fpago_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_fpago_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_icarga`
--
ALTER TABLE `fruta_icarga`
  ADD PRIMARY KEY (`ID_ICARGA`),
  ADD KEY `fk_fruta_icarga_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_icarga_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_icarga_fruta_tservicio_idx` (`ID_TSERVICIO`),
  ADD KEY `fk_fruta_icarga_fruta_exportadora_idx` (`ID_EXPPORTADORA`),
  ADD KEY `fk_fruta_icarga_fruta_consignatario_idx` (`ID_CONSIGNATARIO`),
  ADD KEY `fk_fruta_icarga_fruta_notificador_idx` (`ID_NOTIFICADOR`),
  ADD KEY `fk_fruta_icarga_fruta_broker_idx` (`ID_BROKER`),
  ADD KEY `fk_fruta_icarga_fruta_rfinal_idx` (`ID_RFINAL`),
  ADD KEY `fk_fruta_icarga_fruta_mercado_idx` (`ID_MERCADO`),
  ADD KEY `fk_fruta_icarga_fruta_aduana_idx` (`ID_AADUANA`),
  ADD KEY `fk_fruta_icarga_fruta_agcarga_idx` (`ID_AGCARGA`),
  ADD KEY `fk_fruta_icarga_fruta_dfinal_idx` (`ID_DFINAL`),
  ADD KEY `fk_fruta_icarga_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_icarga_fruta_lcarga_idx` (`ID_LCARGA`),
  ADD KEY `fk_fruta_icarga_fruta_ldestino_idx` (`ID_LDESTINO`),
  ADD KEY `fk_fruta_icarga_transporte_larea_idx` (`ID_LAREA`),
  ADD KEY `fk_fruta_icarga_transporte_aeronave_idx` (`ID_AERONAVE`),
  ADD KEY `fk_fruta_icarga_fruta_acarga_idx` (`ID_ACARGA`),
  ADD KEY `fk_fruta_icarga_fruta_adestino_idx` (`ID_ADESTINO`),
  ADD KEY `fk_fruta_icarga_transporte_naviera_idx` (`ID_NAVIERA`),
  ADD KEY `fk_fruta_icarga_fruta_pcarga_idx` (`ID_PCARGA`),
  ADD KEY `fk_fruta_icarga_fruta_pdestino_idx` (`ID_PDESTINO`),
  ADD KEY `fk_fruta_icarga_fruta_fpago_idx` (`ID_FPAGO`),
  ADD KEY `fk_fruta_icarga_fruta_cventa_idx` (`ID_CVENTA`),
  ADD KEY `fk_fruta_icarga_fruta_mventa_idx` (`ID_MVENTA`),
  ADD KEY `fk_fruta_icarga_fruta_tflete_idx` (`ID_TFLETE`),
  ADD KEY `fk_fruta_icarga_fruta_tcontenedor_idx` (`ID_TCONTENEDOR`),
  ADD KEY `fk_fruta_icarga_fruta_atmosfera_idx` (`ID_ATMOSFERA`),
  ADD KEY `fk_fruta_icarga_ubicacion_pais_idx` (`ID_PAIS`),
  ADD KEY `fk_fruta_icarga_fruta_seguro_idx` (`ID_SEGURO`),
  ADD KEY `fk_fruta_icarga_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_icarga_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_inpector`
--
ALTER TABLE `fruta_inpector`
  ADD PRIMARY KEY (`ID_INPECTOR`),
  ADD KEY `fk_fruta_inpector_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_inpector_ubicacion_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_inpector_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_inpector_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_inpsag`
--
ALTER TABLE `fruta_inpsag`
  ADD PRIMARY KEY (`ID_INPSAG`),
  ADD KEY `fk_fruta_inpsag_fruta_inspector_idx` (`ID_INPECTOR`),
  ADD KEY `fk_fruta_inpsag_contraparte_idx` (`ID_CONTRAPARTE`),
  ADD KEY `fk_fruta_inpsag_fruta_tinpsag_idx` (`ID_TINPSAG`),
  ADD KEY `fk_fruta_inpsag_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_inpsag_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_inpsag_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_inpsag_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_lcarga`
--
ALTER TABLE `fruta_lcarga`
  ADD PRIMARY KEY (`ID_LCARGA`),
  ADD KEY `fk_fruta_lcarga_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_lcarga_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_lcarga_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_ldestino`
--
ALTER TABLE `fruta_ldestino`
  ADD PRIMARY KEY (`ID_LDESTINO`),
  ADD KEY `fk_fruta_ldestino_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_ldestino_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_ldestino_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_mercado`
--
ALTER TABLE `fruta_mercado`
  ADD PRIMARY KEY (`ID_MERCADO`),
  ADD KEY `fk_fruta_mercado_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_mercado_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_mercado_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_mguiaind`
--
ALTER TABLE `fruta_mguiaind`
  ADD PRIMARY KEY (`ID_MGUIA`),
  ADD KEY `fk_fruta_mguiaind_fruta_despacho_idx` (`ID_DESPACHO`),
  ADD KEY `fk_fruta_mguiaind_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_mguiaind_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_mguiaind_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_mguiaind_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_mguiaind_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_mguiaind_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_mguiamp`
--
ALTER TABLE `fruta_mguiamp`
  ADD PRIMARY KEY (`ID_MGUIA`),
  ADD KEY `fk_fruta_mguiamp_fruta_despachomp_idx` (`ID_DESPACHO`),
  ADD KEY `fk_fruta_mguiamp_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_mguiamp_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_mguiamp_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_mguiamp_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_mguiamp_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_mguiamp_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_mguiapt`
--
ALTER TABLE `fruta_mguiapt`
  ADD PRIMARY KEY (`ID_MGUIA`),
  ADD KEY `fk_fruta_mguiapt_fruta_despacho_idx` (`ID_DESPACHO`),
  ADD KEY `fk_fruta_mguiapt_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_mguiapt_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_mguiapt_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_mguiapt_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_mguiapt_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_mguiapt_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_mventa`
--
ALTER TABLE `fruta_mventa`
  ADD PRIMARY KEY (`ID_MVENTA`),
  ADD KEY `fk_fruta_mventa_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_mventa_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_mventa_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_notificador`
--
ALTER TABLE `fruta_notificador`
  ADD PRIMARY KEY (`ID_NOTIFICADOR`),
  ADD KEY `fk_fruta_notificador_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_notificador_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_notificador_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_notificador_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_pcarga`
--
ALTER TABLE `fruta_pcarga`
  ADD PRIMARY KEY (`ID_PCARGA`),
  ADD KEY `fk_fruta_pcarga_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_pcarga_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_pcarga_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_pcdespacho`
--
ALTER TABLE `fruta_pcdespacho`
  ADD PRIMARY KEY (`ID_PCDESPACHO`),
  ADD KEY `fk_fruta_pcdespacho_fruta_despachoex_idx` (`ID_DESPACHOEX`),
  ADD KEY `fk_fruta_pcdespacho_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_pcdespacho_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_pcdespacho_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_pcdespacho_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_pcdespacho_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_pdestino`
--
ALTER TABLE `fruta_pdestino`
  ADD PRIMARY KEY (`ID_PDESTINO`),
  ADD KEY `fk_fruta_pdestino_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_pdestino_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_pdestino_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_proceso`
--
ALTER TABLE `fruta_proceso`
  ADD PRIMARY KEY (`ID_PROCESO`),
  ADD KEY `fk_fruta_proceso_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_proceso_fruta_tproceso_idx` (`ID_TPROCESO`),
  ADD KEY `fk_fruta_proceso_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_proceso_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_proceso_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_proceso_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_proceso_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_proceso_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_productor`
--
ALTER TABLE `fruta_productor`
  ADD PRIMARY KEY (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_productor_ubicacion_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_productor_princiapal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_productor_fruta_tproductor_idx` (`ID_TPRODUCTOR`),
  ADD KEY `fk_fruta_productor_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_productor_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_recepcionind`
--
ALTER TABLE `fruta_recepcionind`
  ADD PRIMARY KEY (`ID_RECEPCION`),
  ADD KEY `fk_fruta_recepcionind_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_recepcionind_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_recepcionind_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_recepcionind_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_recepcionind_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_recepcionind_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_recepcionind_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_fruta_recepcionind_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_recepcionind_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_recepcionmp`
--
ALTER TABLE `fruta_recepcionmp`
  ADD PRIMARY KEY (`ID_RECEPCION`),
  ADD KEY `fk_fruta_recepcionmp_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_recepcionmp_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_recepcionmp_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_recepcionmp_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_recepcionmp_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_recepcionmp_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_recepcionmp_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_fruta_recepcionmp_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_recepcionmp_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_recepcionpt`
--
ALTER TABLE `fruta_recepcionpt`
  ADD PRIMARY KEY (`ID_RECEPCION`),
  ADD KEY `fk_fruta_recepcionpt_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_recepcionpt_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_recepcionpt_principal_empresa_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_recepcionpt_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_fruta_recepcionpt_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_recepcionpt_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_fruta_recepcionpt_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_fruta_recepcionpt_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_recepcionpt_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_reembalaje`
--
ALTER TABLE `fruta_reembalaje`
  ADD PRIMARY KEY (`ID_REEMBALAJE`),
  ADD KEY `fk_fruta_reembalaje_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_reembalaje_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_reembalaje_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_reembalaje_fruta_vespecies_idx` (`ID_VESPECIES`),
  ADD KEY `fk_fruta_reembalaje_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_reembalaje_fruta_treembalaje_idx` (`ID_TREEMBALAJE`),
  ADD KEY `fk_fruta_reembalaje_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_reembalaje_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_repaletizajeex`
--
ALTER TABLE `fruta_repaletizajeex`
  ADD PRIMARY KEY (`ID_REPALETIZAJE`),
  ADD KEY `fk_fruta_repaletizajeex_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_repaletizajeex_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_repaletizajeex_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_repaletizajeex_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_repaletizajeex_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_repaletizajemp`
--
ALTER TABLE `fruta_repaletizajemp`
  ADD PRIMARY KEY (`ID_REPALETIZAJE`),
  ADD KEY `fk_fruta_repaletizajem_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_repaletizajem_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_fruta_repaletizajem_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_fruta_repaletizajem_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_repaletizajem_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_rfinal`
--
ALTER TABLE `fruta_rfinal`
  ADD PRIMARY KEY (`ID_RFINAL`),
  ADD KEY `fk_fruta_rfinal_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_rfinal_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_fruta_rfinal_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_rfinal_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_rmercado`
--
ALTER TABLE `fruta_rmercado`
  ADD PRIMARY KEY (`ID_RMERCADO`),
  ADD KEY `fk_fruta_rmercado_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_rmercado_fruta_mercado_idx` (`ID_MERCADO`),
  ADD KEY `fk_fruta_rmercado_fruta_productorr_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_fruta_rmercado_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_rmercado_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_seguro`
--
ALTER TABLE `fruta_seguro`
  ADD PRIMARY KEY (`ID_SEGURO`),
  ADD KEY `fk_fruta_seguro_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_seguro_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_seguro_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tcalibre`
--
ALTER TABLE `fruta_tcalibre`
  ADD PRIMARY KEY (`ID_TCALIBRE`),
  ADD KEY `fk_fruta_tcalibre_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tcalibre_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fk_fruta_tcalibre_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tcategoria`
--
ALTER TABLE `fruta_tcategoria`
  ADD PRIMARY KEY (`ID_TCATEGORIA`),
  ADD KEY `fk_fruta_tcategoria_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tcategoria_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tcolor`
--
ALTER TABLE `fruta_tcolor`
  ADD PRIMARY KEY (`ID_TCOLOR`),
  ADD KEY `fk_fruta_tcolor_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tcolor_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tcontenedor`
--
ALTER TABLE `fruta_tcontenedor`
  ADD PRIMARY KEY (`ID_TCONTENEDOR`),
  ADD KEY `fk_fruta_tcontenedor_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tcontenedor_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_fruta_tcontenedor_usuario_usuarioi_idx` (`ID_USUARIOI`);

--
-- Indices de la tabla `fruta_tembalaje`
--
ALTER TABLE `fruta_tembalaje`
  ADD PRIMARY KEY (`ID_TEMBALAJE`),
  ADD KEY `fk_fruta_tembalaje_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tembalaje_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tembalaje_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tetiqueta`
--
ALTER TABLE `fruta_tetiqueta`
  ADD PRIMARY KEY (`ID_TETIQUETA`),
  ADD KEY `fk_fruta_tetiqueta_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tetiqueta_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tetiqueta_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tflete`
--
ALTER TABLE `fruta_tflete`
  ADD PRIMARY KEY (`ID_TFLETE`),
  ADD KEY `fk_fruta_tflete_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tflete_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tflete_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tinpsag`
--
ALTER TABLE `fruta_tinpsag`
  ADD PRIMARY KEY (`ID_TINPSAG`),
  ADD KEY `fk_fruta_tinpsag_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tinpsag_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tmanejo`
--
ALTER TABLE `fruta_tmanejo`
  ADD PRIMARY KEY (`ID_TMANEJO`),
  ADD KEY `fk_fruta_tmanejo_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tmanejo_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tmoneda`
--
ALTER TABLE `fruta_tmoneda`
  ADD PRIMARY KEY (`ID_TMONEDA`),
  ADD KEY `fk_fruta_tmoneda_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tmoneda_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fk_fruta_tmoneda_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tproceso`
--
ALTER TABLE `fruta_tproceso`
  ADD PRIMARY KEY (`ID_TPROCESO`),
  ADD KEY `fruta_tproceso_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fruta_tproceso_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tproductor`
--
ALTER TABLE `fruta_tproductor`
  ADD PRIMARY KEY (`ID_TPRODUCTOR`),
  ADD KEY `fk_fruta_tproductor_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tproductor_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tproductor_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tratamineto1`
--
ALTER TABLE `fruta_tratamineto1`
  ADD PRIMARY KEY (`ID_TTRATAMIENTO`),
  ADD KEY `fk_fruta_tratamineto1_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tratamineto1_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tratamineto2`
--
ALTER TABLE `fruta_tratamineto2`
  ADD PRIMARY KEY (`ID_TTRATAMIENTO`),
  ADD KEY `fk_fruta_tratamineto2_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tratamineto2_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_treembalaje`
--
ALTER TABLE `fruta_treembalaje`
  ADD PRIMARY KEY (`ID_TREEMBALAJE`),
  ADD KEY `fk_fruta_treembalaje_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_treembalaje_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_tservicio`
--
ALTER TABLE `fruta_tservicio`
  ADD PRIMARY KEY (`ID_TSERVICIO`),
  ADD KEY `fk_fruta_tservicio_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_tservicio_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fruta_tservicio_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `fruta_vespecies`
--
ALTER TABLE `fruta_vespecies`
  ADD PRIMARY KEY (`ID_VESPECIES`),
  ADD KEY `fk_fruta_vespecies_fruta_especies_idx` (`ID_ESPECIES`),
  ADD KEY `fk_fruta_vespecies_principal_idx` (`ID_EMPRESA`),
  ADD KEY `fk_fruta_vespecies_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fk_fruta_vespecies_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_cardexe`
--
ALTER TABLE `material_cardexe`
  ADD PRIMARY KEY (`ID_CARDEX`),
  ADD KEY `fk_material_cardexe_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_cardexe_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_cardexe_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_cardexe_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_cardexe_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_cardexm`
--
ALTER TABLE `material_cardexm`
  ADD PRIMARY KEY (`ID_CARDEX`),
  ADD KEY `fk_material_cardexm_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_cardexm_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_cardexm_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_cardexm_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_cardexm_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_cliente`
--
ALTER TABLE `material_cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`),
  ADD KEY `fk_material_cliente_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_cliente_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_material_cliente_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_cliente_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_despachoe`
--
ALTER TABLE `material_despachoe`
  ADD PRIMARY KEY (`ID_DESPACHO`),
  ADD KEY `fk_material_despachoe_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_despachoe_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_despachoe_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_despachoe_principal_bodega_idx` (`ID_BODEGA`),
  ADD KEY `fk_material_despachoe_materiales_tdocumento_idx` (`ID_TDOCUMENTO`),
  ADD KEY `fk_material_despachoe_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_material_despachoe_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_material_despachoe_materiales_proveedor_idx` (`ID_PROVEEDOR`),
  ADD KEY `fk_material_despachoe_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_despachoe_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_material_despachoe_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_despachoe_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_material_despachoe_principal_bodega2_idx` (`ID_BODEGA2`),
  ADD KEY `fk_material_despachoe_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_material_despachoe_fruta_despachomp_idx` (`ID_DESPACHOMP`),
  ADD KEY `fk_material_despachoe_principal_bodegao_idx` (`ID_BODEGAO`),
  ADD KEY `fk_material_despachoe_fruta_comrpador_idx` (`ID_COMPRADOR`);

--
-- Indices de la tabla `material_despachom`
--
ALTER TABLE `material_despachom`
  ADD PRIMARY KEY (`ID_DESPACHO`),
  ADD KEY `fk_material_despachom_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_despachom_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_despachom_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_despachom_principal_bodega_idx` (`ID_BODEGA`),
  ADD KEY `fk_material_despachom_materiales_tdocumento_idx` (`ID_TDOCUMENTO`),
  ADD KEY `fk_material_despachom_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_material_despachom_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_material_despachom_materiales_proveedor_idx` (`ID_PROVEEDOR`),
  ADD KEY `fk_material_despachom_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_despachom_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_material_despachom_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_despachom_principal_bodega2_idx` (`ID_BODEGA2`),
  ADD KEY `fk_material_despachom_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_material_despachom_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_material_despachom_material_cliente_idx` (`ID_CLIENTE`);

--
-- Indices de la tabla `material_dficha`
--
ALTER TABLE `material_dficha`
  ADD PRIMARY KEY (`ID_DFICHA`),
  ADD KEY `fk_material_dficha_material_ficha_idx` (`ID_FICHA`),
  ADD KEY `fk_material_dficha_material_producto_idx` (`ID_PRODUCTO`);

--
-- Indices de la tabla `material_docompra`
--
ALTER TABLE `material_docompra`
  ADD PRIMARY KEY (`ID_DOCOMPRA`),
  ADD KEY `fk_material_docomprae_materiales_producto_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_material_docomprae_materiales_tumedida_idx` (`ID_TUMEDIDA`),
  ADD KEY `fk_material_docomprae_materiales_ocomprae_idx` (`ID_OCOMPRA`);

--
-- Indices de la tabla `material_drecepcionm`
--
ALTER TABLE `material_drecepcionm`
  ADD PRIMARY KEY (`ID_DRECEPCION`),
  ADD KEY `fk_material_drecepcionm_material_producto_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_material_drecepcionm_material_tumedida_idx` (`ID_TUMEDIDA`),
  ADD KEY `fk_material_drecepcionm_material_recepcionm_idx` (`ID_RECEPCION`),
  ADD KEY `fk_material_drecepcionm_material_docompra_idx` (`ID_DOCOMPRA`);

--
-- Indices de la tabla `material_familia`
--
ALTER TABLE `material_familia`
  ADD PRIMARY KEY (`ID_FAMILIA`),
  ADD KEY `fk_material_familia_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_familia_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_familia_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_ficha`
--
ALTER TABLE `material_ficha`
  ADD PRIMARY KEY (`ID_FICHA`),
  ADD KEY `fk_material_ficha_estandar_eexportacion_idx` (`ID_ESTANDAR`),
  ADD KEY `fk_material_ficha_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_ficha_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_ficha_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_ficha_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_folio`
--
ALTER TABLE `material_folio`
  ADD PRIMARY KEY (`ID_FOLIO`),
  ADD KEY `fk_material_folio_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_folio_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_folio_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_folio_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_folio_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_fpago`
--
ALTER TABLE `material_fpago`
  ADD PRIMARY KEY (`ID_FPAGO`),
  ADD KEY `fk_material_fpago_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_fpago_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_fpago_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_inventarioe`
--
ALTER TABLE `material_inventarioe`
  ADD PRIMARY KEY (`ID_INVENTARIO`),
  ADD KEY `fk_material_inventarioe_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_inventarioe_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_inventarioe_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_inventarioe_principal_bodega_idx` (`ID_BODEGA`),
  ADD KEY `fk_material_inventarioe_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_inventarioe_materiales_producto_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_material_inventarioe_materiales_tumedida_idx` (`ID_TUMEDIDA`),
  ADD KEY `fk_material_inventarioe_materiales_despachoe_idx` (`ID_DESPACHO`),
  ADD KEY `fk_material_inventarioe_materiales_recepcione_idx` (`ID_RECEPCION`),
  ADD KEY `fk_material_inventarioe_material_docompra_idx` (`ID_DOCOMPRA`),
  ADD KEY `fk_material_inventarioe_principal_bodega2_idx` (`ID_BODEGA2`),
  ADD KEY `fk_material_inventarioe_materiales_despachoe2_idx` (`ID_DESPACHO2`);

--
-- Indices de la tabla `material_inventariom`
--
ALTER TABLE `material_inventariom`
  ADD PRIMARY KEY (`ID_INVENTARIO`),
  ADD KEY `fk_material_inventariom_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_inventariom_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_inventariom_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_inventariom_principal_bodega_idx` (`ID_BODEGA`),
  ADD KEY `fk_material_inventariom_materiales_folio_idx` (`ID_FOLIO`),
  ADD KEY `fk_material_inventariom_materiales_producto_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_material_inventariom_materiales_tcontenedor_idx` (`ID_TCONTENEDOR`),
  ADD KEY `fk_material_inventariom_materiales_tumedida_idx` (`ID_TUMEDIDA`),
  ADD KEY `fk_material_inventariom_materiales_recepcionm_idx` (`ID_RECEPCION`),
  ADD KEY `fk_material_inventariom_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_inventariom_principal_planta3_idx` (`ID_PLANTA3`),
  ADD KEY `fk_material_inventariom_materiales_proveedor_idx` (`ID_PROVEEDOR`),
  ADD KEY `fk_material_inventariom_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_material_inventariom_materiales_despachom_idx` (`ID_DESPACHO`),
  ADD KEY `fk_material_inventariom_material_ocompra_idx` (`ID_OCOMPRA`),
  ADD KEY `fk_material_inventariom_materiales_despachom2_idx` (`ID_DESPACHO2`);

--
-- Indices de la tabla `material_mguiae`
--
ALTER TABLE `material_mguiae`
  ADD PRIMARY KEY (`ID_MGUIA`),
  ADD KEY `fk_material_mguiae_material_despachoe_idx` (`ID_DESPACHO`),
  ADD KEY `fk_material_mguiae_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_mguiae_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_mguiae_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_mguiae_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_mguiae_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_mguiae_usuario_usuarioim_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_mguiam`
--
ALTER TABLE `material_mguiam`
  ADD PRIMARY KEY (`ID_MGUIA`),
  ADD KEY `fk_material_mguiam_material_despahom_idx` (`ID_DESPACHO`),
  ADD KEY `fk_material_mguiam_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_mguiam_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_mguiam_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_mguiam_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_mguiam_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_mguiam_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_mocompra`
--
ALTER TABLE `material_mocompra`
  ADD PRIMARY KEY (`ID_MOCOMPRA`),
  ADD KEY `fk_material_mocompra_material_ocompra_idx` (`ID_OCOMPRA`),
  ADD KEY `fk_material_mocompra_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_mocompra_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_mocompra_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_mocompra_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_mocompra_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_ocompra`
--
ALTER TABLE `material_ocompra`
  ADD PRIMARY KEY (`ID_OCOMPRA`),
  ADD KEY `fk_material_ocomprae_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_ocomprae_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_ocomprae_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_ocomprae_materiales_proveedor_idx` (`ID_PROVEEDOR`),
  ADD KEY `fk_material_ocomprae_materiales_responsable_idx` (`ID_RESPONSABLE`),
  ADD KEY `fk_material_ocomprae_materiales_fpago_idx` (`ID_FPAGO`),
  ADD KEY `fk_material_ocomprae_materiales_tmoneda_idx` (`ID_TMONEDA`),
  ADD KEY `fk_material_ocomprae_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_ocomprae_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_producto`
--
ALTER TABLE `material_producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `fk_material_producto_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_producto_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_producto_material_tumedida_idx` (`ID_TUMEDIDA`),
  ADD KEY `fk_material_producto_material_familia_idx` (`ID_FAMILIA`),
  ADD KEY `fk_material_producto_material_subfamilia_idx` (`ID_SUBFAMILIA`),
  ADD KEY `fk_material_producto_fruta_especies_idx` (`ID_ESPECIES`),
  ADD KEY `fk_material_producto_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_producto_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_proveedor`
--
ALTER TABLE `material_proveedor`
  ADD PRIMARY KEY (`ID_PROVEEDOR`),
  ADD KEY `fk_material_proveedor_princiapl_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_proveedor_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_material_proveedor_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_proveedor_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_recepcione`
--
ALTER TABLE `material_recepcione`
  ADD PRIMARY KEY (`ID_RECEPCION`),
  ADD KEY `fk_material_recepcione_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_recepcione_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_recepcione_principal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_recepcione_principal_bodega_idx` (`ID_BODEGA`),
  ADD KEY `fk_material_recepcione_material_tdocumento_idx` (`ID_TDOCUMENTO`),
  ADD KEY `fk_material_recepcione_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_material_recepcione_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_material_recepcione_material_proveedor_idx` (`ID_PROVEEDOR`),
  ADD KEY `fk_material_recepcione_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_recepcione_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_material_recepcione_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_recepcione_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_material_recepcione_material_ocomprae_idx` (`ID_OCOMPRA`),
  ADD KEY `fk_material_recepcione_fruta_recepcionmp_idx` (`ID_RECEPCIONMP`),
  ADD KEY `fk_material_recepcione_fruta_recepcionind_idx` (`ID_RECEPCIONIND`);

--
-- Indices de la tabla `material_recepcionm`
--
ALTER TABLE `material_recepcionm`
  ADD PRIMARY KEY (`ID_RECEPCION`),
  ADD KEY `fk_material_recepcionm_princiapal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_recepcionm_princiapal_temporada_idx` (`ID_TEMPORADA`),
  ADD KEY `fk_material_recepcionm_princiapal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_material_recepcionm_princiapal_bodega_idx` (`ID_BODEGA`),
  ADD KEY `fk_material_recepcionm_material_tdocumento_idx` (`ID_TDOCUMENTO`),
  ADD KEY `fk_material_recepcionm_transporte_transporte_idx` (`ID_TRANSPORTE`),
  ADD KEY `fk_material_recepcionm_transporte_conductor_idx` (`ID_CONDUCTOR`),
  ADD KEY `fk_material_recepcionm_material_proveedor_idx` (`ID_PROVEEDOR`),
  ADD KEY `fk_material_recepcionm_principal_planta2_idx` (`ID_PLANTA2`),
  ADD KEY `fk_material_recepcionm_fruta_productor_idx` (`ID_PRODUCTOR`),
  ADD KEY `fk_material_recepcionm_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_recepcionm_usuario_usuariom_idx` (`ID_USUARIOM`),
  ADD KEY `fk_material_recepcionm_material_ocompra_idx` (`ID_OCOMPRA`);

--
-- Indices de la tabla `material_responsable`
--
ALTER TABLE `material_responsable`
  ADD PRIMARY KEY (`ID_RESPONSABLE`),
  ADD KEY `fk_material_responsable_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_responsable_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_material_responsable_usuario_usuario_idx` (`ID_USUARIO`),
  ADD KEY `fk_material_responsable_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_responsable_usuario_usuariom_idx1` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_subfamilia`
--
ALTER TABLE `material_subfamilia`
  ADD PRIMARY KEY (`ID_SUBFAMILIA`),
  ADD KEY `fk_material_subfamilia_princiapl_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_subfamilia_material_familia_idx` (`ID_FAMILIA`),
  ADD KEY `fk_material_subfamilia_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_subfamilia_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_tarjam`
--
ALTER TABLE `material_tarjam`
  ADD PRIMARY KEY (`ID_TARJA`),
  ADD KEY `fk_material_tarjam_material_recepcion_idx` (`ID_RECEPCION`),
  ADD KEY `fk_material_tarjam_material_drecepcion_idx` (`ID_DRECEPCION`),
  ADD KEY `fk_material_tarjam_material_producto_idx` (`ID_PRODUCTO`),
  ADD KEY `fk_material_tarjam_material_tcontenedr_idx` (`ID_TCONTENEDOR`),
  ADD KEY `fk_material_tarjam_material_tumedida_idx` (`ID_TUMEDIDA`),
  ADD KEY `fk_material_tarjam_material_folio_idx` (`ID_FOLIO`);

--
-- Indices de la tabla `material_tcontenedor`
--
ALTER TABLE `material_tcontenedor`
  ADD PRIMARY KEY (`ID_TCONTENEDOR`),
  ADD KEY `fk_material_tcontenedor_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_tcontenedor_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_tcontenedor_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_tdocumento`
--
ALTER TABLE `material_tdocumento`
  ADD PRIMARY KEY (`ID_TDOCUMENTO`),
  ADD KEY `fk_material_tdocumento_prinicipal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_tdocumento_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_tdocumento_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_tmoneda`
--
ALTER TABLE `material_tmoneda`
  ADD PRIMARY KEY (`ID_TMONEDA`),
  ADD KEY `fk_material_tmoneda_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_tmoneda_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_tmoneda_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `material_tumedida`
--
ALTER TABLE `material_tumedida`
  ADD PRIMARY KEY (`ID_TUMEDIDA`),
  ADD KEY `fk_material_tumedida_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_material_tumedida_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_material_tumedida_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `principal_bodega`
--
ALTER TABLE `principal_bodega`
  ADD PRIMARY KEY (`ID_BODEGA`),
  ADD KEY `fk_principal_bodega_principal_planta_idx` (`ID_PLANTA`),
  ADD KEY `fk_principal_bodega_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_principal_bodega_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_principal_bodega_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `principal_empresa`
--
ALTER TABLE `principal_empresa`
  ADD PRIMARY KEY (`ID_EMPRESA`),
  ADD KEY `fk_principal_empresa_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_principal_empresa_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_principal_empresa_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `principal_planta`
--
ALTER TABLE `principal_planta`
  ADD PRIMARY KEY (`ID_PLANTA`),
  ADD KEY `fk_principal_planta_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_principal_planta_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_principal_planta_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `principal_temporada`
--
ALTER TABLE `principal_temporada`
  ADD PRIMARY KEY (`ID_TEMPORADA`),
  ADD KEY `fk_principal_temporada_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_principal_temporada_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `transporte_aeronave`
--
ALTER TABLE `transporte_aeronave`
  ADD PRIMARY KEY (`ID_AERONAVE`),
  ADD KEY `fk_transporte_aeronave_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_transporte_aeronave_transporte_laerea_idx` (`ID_LAEREA`),
  ADD KEY `fk_transporte_aeronave_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fk_transporte_aeronave_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `transporte_conductor`
--
ALTER TABLE `transporte_conductor`
  ADD PRIMARY KEY (`ID_CONDUCTOR`),
  ADD KEY `fk_transporte_conductor_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_transporte_conductor_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_transporte_conductor_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `transporte_laerea`
--
ALTER TABLE `transporte_laerea`
  ADD PRIMARY KEY (`ID_LAEREA`),
  ADD KEY `fk_transporte_laerea_principal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_transporte_laerea_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_transporte_laerea_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_transporte_laerea_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `transporte_naviera`
--
ALTER TABLE `transporte_naviera`
  ADD PRIMARY KEY (`ID_NAVIERA`),
  ADD KEY `fk_transporte_naviera_prinicpal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_transporte_naviera_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_transporte_naviera_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fk_transporte_naviera_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `transporte_transporte`
--
ALTER TABLE `transporte_transporte`
  ADD PRIMARY KEY (`ID_TRANSPORTE`),
  ADD KEY `fk_transporte_transporte_princiapal_empresa_idx` (`ID_EMPRESA`),
  ADD KEY `fk_transporte_transporte_ubicacion_ciudad_idx` (`ID_CIUDAD`),
  ADD KEY `fk_transporte_transporte_usuario_usuarioi_idx` (`ID_USUARIOI`),
  ADD KEY `fk_fk_transporte_transporte_usuario_usuariom_idx` (`ID_USUARIOM`);

--
-- Indices de la tabla `ubicacion_ciudad`
--
ALTER TABLE `ubicacion_ciudad`
  ADD PRIMARY KEY (`ID_CIUDAD`),
  ADD KEY `fk_ubicacion_ciudad_ubicacion_comuna_idx` (`ID_COMUNA`);

--
-- Indices de la tabla `ubicacion_comuna`
--
ALTER TABLE `ubicacion_comuna`
  ADD PRIMARY KEY (`ID_COMUNA`),
  ADD KEY `fk_ubicacion_comuna_ubicacion_provincia_idx` (`ID_PROVINCIA`);

--
-- Indices de la tabla `ubicacion_pais`
--
ALTER TABLE `ubicacion_pais`
  ADD PRIMARY KEY (`ID_PAIS`);

--
-- Indices de la tabla `ubicacion_provincia`
--
ALTER TABLE `ubicacion_provincia`
  ADD PRIMARY KEY (`ID_PROVINCIA`),
  ADD KEY `fk_ubicacion_provincia_ubicacion_region_idx` (`ID_REGION`);

--
-- Indices de la tabla `ubicacion_region`
--
ALTER TABLE `ubicacion_region`
  ADD PRIMARY KEY (`ID_REGION`),
  ADD KEY `fk_ubicacion_region_ubicacion_pais_idx` (`ID_PAIS`);

--
-- Indices de la tabla `usuario_ausuario`
--
ALTER TABLE `usuario_ausuario`
  ADD PRIMARY KEY (`ID_AUSUARIO`),
  ADD KEY `fk_usuario_ausuario_usuario_usuario_idx` (`ID_USUARIO`);

--
-- Indices de la tabla `usuario_chat`
--
ALTER TABLE `usuario_chat`
  ADD PRIMARY KEY (`ID_CHAT`),
  ADD KEY `fk_usuario_chat_usuario_usuario_idx` (`ID_USUARIO`);

--
-- Indices de la tabla `usuario_ptusuario`
--
ALTER TABLE `usuario_ptusuario`
  ADD PRIMARY KEY (`ID_PTUSUARIO`),
  ADD KEY `usuario_ptusuario_usuario_tusuario_idx` (`ID_TUSUARIO`);

--
-- Indices de la tabla `usuario_tusuario`
--
ALTER TABLE `usuario_tusuario`
  ADD PRIMARY KEY (`ID_TUSUARIO`);

--
-- Indices de la tabla `usuario_usuario`
--
ALTER TABLE `usuario_usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `fk_usuario_usuario_usuario_tusuario_idx` (`ID_TUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control_eau`
--
ALTER TABLE `control_eau`
  MODIFY `ID_EAU` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estandar_ecomercial`
--
ALTER TABLE `estandar_ecomercial`
  MODIFY `ID_ECOMERCIAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estandar_eexportacion`
--
ALTER TABLE `estandar_eexportacion`
  MODIFY `ID_ESTANDAR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estandar_eindustrial`
--
ALTER TABLE `estandar_eindustrial`
  MODIFY `ID_ESTANDAR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estandar_erecepcion`
--
ALTER TABLE `estandar_erecepcion`
  MODIFY `ID_ESTANDAR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fruta_aaduana`
--
ALTER TABLE `fruta_aaduana`
  MODIFY `ID_AADUANA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_acarga`
--
ALTER TABLE `fruta_acarga`
  MODIFY `ID_ACARGA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_adestino`
--
ALTER TABLE `fruta_adestino`
  MODIFY `ID_ADESTINO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_agcarga`
--
ALTER TABLE `fruta_agcarga`
  MODIFY `ID_AGCARGA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_atmosfera`
--
ALTER TABLE `fruta_atmosfera`
  MODIFY `ID_ATMOSFERA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_broker`
--
ALTER TABLE `fruta_broker`
  MODIFY `ID_BROKER` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_ccalidad`
--
ALTER TABLE `fruta_ccalidad`
  MODIFY `ID_CCALIDAD` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_comprador`
--
ALTER TABLE `fruta_comprador`
  MODIFY `ID_COMPRADOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fruta_consignatario`
--
ALTER TABLE `fruta_consignatario`
  MODIFY `ID_CONSIGNATARIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fruta_contraparte`
--
ALTER TABLE `fruta_contraparte`
  MODIFY `ID_CONTRAPARTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fruta_cuartel`
--
ALTER TABLE `fruta_cuartel`
  MODIFY `ID_CUARTEL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_cventa`
--
ALTER TABLE `fruta_cventa`
  MODIFY `ID_CVENTA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_despachoex`
--
ALTER TABLE `fruta_despachoex`
  MODIFY `ID_DESPACHOEX` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_despachoind`
--
ALTER TABLE `fruta_despachoind`
  MODIFY `ID_DESPACHO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fruta_despachomp`
--
ALTER TABLE `fruta_despachomp`
  MODIFY `ID_DESPACHO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `fruta_despachopt`
--
ALTER TABLE `fruta_despachopt`
  MODIFY `ID_DESPACHO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `fruta_dfinal`
--
ALTER TABLE `fruta_dfinal`
  MODIFY `ID_DFINAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_dicarga`
--
ALTER TABLE `fruta_dicarga`
  MODIFY `ID_DICARGA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fruta_dpexportacion`
--
ALTER TABLE `fruta_dpexportacion`
  MODIFY `ID_DPEXPORTACION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `fruta_dpindustrial`
--
ALTER TABLE `fruta_dpindustrial`
  MODIFY `ID_DPINDUSTRIAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fruta_drecepcionind`
--
ALTER TABLE `fruta_drecepcionind`
  MODIFY `ID_DRECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fruta_drecepcionmp`
--
ALTER TABLE `fruta_drecepcionmp`
  MODIFY `ID_DRECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `fruta_drecepcionpt`
--
ALTER TABLE `fruta_drecepcionpt`
  MODIFY `ID_DRECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `fruta_drepaletizajeex`
--
ALTER TABLE `fruta_drepaletizajeex`
  MODIFY `ID_DREPALETIZAJE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `fruta_drepaletizajemp`
--
ALTER TABLE `fruta_drepaletizajemp`
  MODIFY `ID_DREPALETIZAJE` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fruta_drexportacion`
--
ALTER TABLE `fruta_drexportacion`
  MODIFY `ID_DREXPORTACION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fruta_drindustrial`
--
ALTER TABLE `fruta_drindustrial`
  MODIFY `ID_DRINDUSTRIAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_especies`
--
ALTER TABLE `fruta_especies`
  MODIFY `ID_ESPECIES` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT de la tabla `fruta_exiexportacion`
--
ALTER TABLE `fruta_exiexportacion`
  MODIFY `ID_EXIEXPORTACION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `fruta_exiindustrial`
--
ALTER TABLE `fruta_exiindustrial`
  MODIFY `ID_EXIINDUSTRIAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `fruta_eximateriaprima`
--
ALTER TABLE `fruta_eximateriaprima`
  MODIFY `ID_EXIMATERIAPRIMA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `fruta_exportadora`
--
ALTER TABLE `fruta_exportadora`
  MODIFY `ID_EXPORTADORA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_folio`
--
ALTER TABLE `fruta_folio`
  MODIFY `ID_FOLIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `fruta_fpago`
--
ALTER TABLE `fruta_fpago`
  MODIFY `ID_FPAGO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_icarga`
--
ALTER TABLE `fruta_icarga`
  MODIFY `ID_ICARGA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fruta_inpector`
--
ALTER TABLE `fruta_inpector`
  MODIFY `ID_INPECTOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fruta_inpsag`
--
ALTER TABLE `fruta_inpsag`
  MODIFY `ID_INPSAG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fruta_lcarga`
--
ALTER TABLE `fruta_lcarga`
  MODIFY `ID_LCARGA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_ldestino`
--
ALTER TABLE `fruta_ldestino`
  MODIFY `ID_LDESTINO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_mercado`
--
ALTER TABLE `fruta_mercado`
  MODIFY `ID_MERCADO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_mguiaind`
--
ALTER TABLE `fruta_mguiaind`
  MODIFY `ID_MGUIA` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fruta_mguiamp`
--
ALTER TABLE `fruta_mguiamp`
  MODIFY `ID_MGUIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fruta_mguiapt`
--
ALTER TABLE `fruta_mguiapt`
  MODIFY `ID_MGUIA` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fruta_mventa`
--
ALTER TABLE `fruta_mventa`
  MODIFY `ID_MVENTA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_notificador`
--
ALTER TABLE `fruta_notificador`
  MODIFY `ID_NOTIFICADOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_pcarga`
--
ALTER TABLE `fruta_pcarga`
  MODIFY `ID_PCARGA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fruta_pcdespacho`
--
ALTER TABLE `fruta_pcdespacho`
  MODIFY `ID_PCDESPACHO` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fruta_pdestino`
--
ALTER TABLE `fruta_pdestino`
  MODIFY `ID_PDESTINO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_proceso`
--
ALTER TABLE `fruta_proceso`
  MODIFY `ID_PROCESO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fruta_productor`
--
ALTER TABLE `fruta_productor`
  MODIFY `ID_PRODUCTOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_recepcionind`
--
ALTER TABLE `fruta_recepcionind`
  MODIFY `ID_RECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_recepcionmp`
--
ALTER TABLE `fruta_recepcionmp`
  MODIFY `ID_RECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fruta_recepcionpt`
--
ALTER TABLE `fruta_recepcionpt`
  MODIFY `ID_RECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fruta_reembalaje`
--
ALTER TABLE `fruta_reembalaje`
  MODIFY `ID_REEMBALAJE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_repaletizajeex`
--
ALTER TABLE `fruta_repaletizajeex`
  MODIFY `ID_REPALETIZAJE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_repaletizajemp`
--
ALTER TABLE `fruta_repaletizajemp`
  MODIFY `ID_REPALETIZAJE` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fruta_rfinal`
--
ALTER TABLE `fruta_rfinal`
  MODIFY `ID_RFINAL` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_rmercado`
--
ALTER TABLE `fruta_rmercado`
  MODIFY `ID_RMERCADO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_seguro`
--
ALTER TABLE `fruta_seguro`
  MODIFY `ID_SEGURO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tcalibre`
--
ALTER TABLE `fruta_tcalibre`
  MODIFY `ID_TCALIBRE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_tcategoria`
--
ALTER TABLE `fruta_tcategoria`
  MODIFY `ID_TCATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tcolor`
--
ALTER TABLE `fruta_tcolor`
  MODIFY `ID_TCOLOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tcontenedor`
--
ALTER TABLE `fruta_tcontenedor`
  MODIFY `ID_TCONTENEDOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tembalaje`
--
ALTER TABLE `fruta_tembalaje`
  MODIFY `ID_TEMBALAJE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tetiqueta`
--
ALTER TABLE `fruta_tetiqueta`
  MODIFY `ID_TETIQUETA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_tflete`
--
ALTER TABLE `fruta_tflete`
  MODIFY `ID_TFLETE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fruta_tinpsag`
--
ALTER TABLE `fruta_tinpsag`
  MODIFY `ID_TINPSAG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tmanejo`
--
ALTER TABLE `fruta_tmanejo`
  MODIFY `ID_TMANEJO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tmoneda`
--
ALTER TABLE `fruta_tmoneda`
  MODIFY `ID_TMONEDA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tproceso`
--
ALTER TABLE `fruta_tproceso`
  MODIFY `ID_TPROCESO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tproductor`
--
ALTER TABLE `fruta_tproductor`
  MODIFY `ID_TPRODUCTOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tratamineto1`
--
ALTER TABLE `fruta_tratamineto1`
  MODIFY `ID_TTRATAMIENTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tratamineto2`
--
ALTER TABLE `fruta_tratamineto2`
  MODIFY `ID_TTRATAMIENTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_treembalaje`
--
ALTER TABLE `fruta_treembalaje`
  MODIFY `ID_TREEMBALAJE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_tservicio`
--
ALTER TABLE `fruta_tservicio`
  MODIFY `ID_TSERVICIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fruta_vespecies`
--
ALTER TABLE `fruta_vespecies`
  MODIFY `ID_VESPECIES` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `material_cardexe`
--
ALTER TABLE `material_cardexe`
  MODIFY `ID_CARDEX` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material_cardexm`
--
ALTER TABLE `material_cardexm`
  MODIFY `ID_CARDEX` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material_cliente`
--
ALTER TABLE `material_cliente`
  MODIFY `ID_CLIENTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material_despachoe`
--
ALTER TABLE `material_despachoe`
  MODIFY `ID_DESPACHO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `material_despachom`
--
ALTER TABLE `material_despachom`
  MODIFY `ID_DESPACHO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `material_dficha`
--
ALTER TABLE `material_dficha`
  MODIFY `ID_DFICHA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_docompra`
--
ALTER TABLE `material_docompra`
  MODIFY `ID_DOCOMPRA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `material_drecepcionm`
--
ALTER TABLE `material_drecepcionm`
  MODIFY `ID_DRECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `material_familia`
--
ALTER TABLE `material_familia`
  MODIFY `ID_FAMILIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_ficha`
--
ALTER TABLE `material_ficha`
  MODIFY `ID_FICHA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_folio`
--
ALTER TABLE `material_folio`
  MODIFY `ID_FOLIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_fpago`
--
ALTER TABLE `material_fpago`
  MODIFY `ID_FPAGO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_inventarioe`
--
ALTER TABLE `material_inventarioe`
  MODIFY `ID_INVENTARIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `material_inventariom`
--
ALTER TABLE `material_inventariom`
  MODIFY `ID_INVENTARIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT de la tabla `material_mguiae`
--
ALTER TABLE `material_mguiae`
  MODIFY `ID_MGUIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `material_mguiam`
--
ALTER TABLE `material_mguiam`
  MODIFY `ID_MGUIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `material_mocompra`
--
ALTER TABLE `material_mocompra`
  MODIFY `ID_MOCOMPRA` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material_ocompra`
--
ALTER TABLE `material_ocompra`
  MODIFY `ID_OCOMPRA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `material_producto`
--
ALTER TABLE `material_producto`
  MODIFY `ID_PRODUCTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_proveedor`
--
ALTER TABLE `material_proveedor`
  MODIFY `ID_PROVEEDOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material_recepcione`
--
ALTER TABLE `material_recepcione`
  MODIFY `ID_RECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `material_recepcionm`
--
ALTER TABLE `material_recepcionm`
  MODIFY `ID_RECEPCION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `material_responsable`
--
ALTER TABLE `material_responsable`
  MODIFY `ID_RESPONSABLE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material_subfamilia`
--
ALTER TABLE `material_subfamilia`
  MODIFY `ID_SUBFAMILIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material_tarjam`
--
ALTER TABLE `material_tarjam`
  MODIFY `ID_TARJA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;

--
-- AUTO_INCREMENT de la tabla `material_tcontenedor`
--
ALTER TABLE `material_tcontenedor`
  MODIFY `ID_TCONTENEDOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material_tdocumento`
--
ALTER TABLE `material_tdocumento`
  MODIFY `ID_TDOCUMENTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material_tmoneda`
--
ALTER TABLE `material_tmoneda`
  MODIFY `ID_TMONEDA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material_tumedida`
--
ALTER TABLE `material_tumedida`
  MODIFY `ID_TUMEDIDA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `principal_bodega`
--
ALTER TABLE `principal_bodega`
  MODIFY `ID_BODEGA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `principal_empresa`
--
ALTER TABLE `principal_empresa`
  MODIFY `ID_EMPRESA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `principal_planta`
--
ALTER TABLE `principal_planta`
  MODIFY `ID_PLANTA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `principal_temporada`
--
ALTER TABLE `principal_temporada`
  MODIFY `ID_TEMPORADA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transporte_aeronave`
--
ALTER TABLE `transporte_aeronave`
  MODIFY `ID_AERONAVE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transporte_conductor`
--
ALTER TABLE `transporte_conductor`
  MODIFY `ID_CONDUCTOR` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transporte_laerea`
--
ALTER TABLE `transporte_laerea`
  MODIFY `ID_LAEREA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transporte_naviera`
--
ALTER TABLE `transporte_naviera`
  MODIFY `ID_NAVIERA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transporte_transporte`
--
ALTER TABLE `transporte_transporte`
  MODIFY `ID_TRANSPORTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicacion_ciudad`
--
ALTER TABLE `ubicacion_ciudad`
  MODIFY `ID_CIUDAD` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ubicacion_comuna`
--
ALTER TABLE `ubicacion_comuna`
  MODIFY `ID_COMUNA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT de la tabla `ubicacion_pais`
--
ALTER TABLE `ubicacion_pais`
  MODIFY `ID_PAIS` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `ubicacion_provincia`
--
ALTER TABLE `ubicacion_provincia`
  MODIFY `ID_PROVINCIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `ubicacion_region`
--
ALTER TABLE `ubicacion_region`
  MODIFY `ID_REGION` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario_chat`
--
ALTER TABLE `usuario_chat`
  MODIFY `ID_CHAT` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_ptusuario`
--
ALTER TABLE `usuario_ptusuario`
  MODIFY `ID_PTUSUARIO` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_tusuario`
--
ALTER TABLE `usuario_tusuario`
  MODIFY `ID_TUSUARIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario_usuario`
--
ALTER TABLE `usuario_usuario`
  MODIFY `ID_USUARIO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control_eap`
--
ALTER TABLE `control_eap`
  ADD CONSTRAINT `fk_control_eap_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_control_eap_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_control_eap_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_control_eap_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `control_eau`
--
ALTER TABLE `control_eau`
  ADD CONSTRAINT `fk_control_eau_princiapl_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_control_eau_usuario_usuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_control_eau_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_control_eau_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estandar_ecomercial`
--
ALTER TABLE `estandar_ecomercial`
  ADD CONSTRAINT `fk_estandar_ecomercial_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_ecomercial_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_ecomercial_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estandar_eexportacion`
--
ALTER TABLE `estandar_eexportacion`
  ADD CONSTRAINT `fk_estandar_eexportacion_estandar_ecomercial` FOREIGN KEY (`ID_ECOMERCIAL`) REFERENCES `estandar_ecomercial` (`ID_ECOMERCIAL`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eexportacion_fruta_especies` FOREIGN KEY (`ID_ESPECIES`) REFERENCES `fruta_especies` (`ID_ESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eexportacion_fruta_tembalaje` FOREIGN KEY (`ID_TEMBALAJE`) REFERENCES `fruta_tembalaje` (`ID_TEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eexportacion_fruta_tetiqueta` FOREIGN KEY (`ID_TETIQUETA`) REFERENCES `fruta_tetiqueta` (`ID_TETIQUETA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eexportacion_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eexportacion_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eexportacion_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estandar_eindustrial`
--
ALTER TABLE `estandar_eindustrial`
  ADD CONSTRAINT `fk_estandar_eindustrial_fruta_especies` FOREIGN KEY (`ID_ESPECIES`) REFERENCES `fruta_especies` (`ID_ESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eindustrial_material_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eindustrial_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eindustrial_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_eindustrial_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `estandar_erecepcion`
--
ALTER TABLE `estandar_erecepcion`
  ADD CONSTRAINT `fk_estandar_erecepcion_fruta_especies` FOREIGN KEY (`ID_ESPECIES`) REFERENCES `fruta_especies` (`ID_ESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_erecepcion_material_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_erecepcion_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_erecepcion_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estandar_erecepcion_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_aaduana`
--
ALTER TABLE `fruta_aaduana`
  ADD CONSTRAINT `fk_fruta_aaduana_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_aaduana_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_aaduana_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_aaduana_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_acarga`
--
ALTER TABLE `fruta_acarga`
  ADD CONSTRAINT `fk_fruta_acarga_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_acarga_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_acarga_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_adestino`
--
ALTER TABLE `fruta_adestino`
  ADD CONSTRAINT `fk_fruta_adestino_principal_empres` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_adestino_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_adestino_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_agcarga`
--
ALTER TABLE `fruta_agcarga`
  ADD CONSTRAINT `fk_fruta_agcarga_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_agcarga_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_agcarga_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_agcarga_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_atmosfera`
--
ALTER TABLE `fruta_atmosfera`
  ADD CONSTRAINT `fk_fruta_atmosfera_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_atmosfera_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_atmosfera_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_broker`
--
ALTER TABLE `fruta_broker`
  ADD CONSTRAINT `fk_fruta_broker_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_broker_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_broker_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_broker_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_ccalidad`
--
ALTER TABLE `fruta_ccalidad`
  ADD CONSTRAINT `fk_fruta_ccalidad_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_ccalidad_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_ccalidad_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_comprador`
--
ALTER TABLE `fruta_comprador`
  ADD CONSTRAINT `fk_fruta_comprador_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_comprador_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_comprador_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_comprador_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_consignatario`
--
ALTER TABLE `fruta_consignatario`
  ADD CONSTRAINT `fk_fruta_consignatario_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_consignatario_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_consignatario_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_consignatario_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_contraparte`
--
ALTER TABLE `fruta_contraparte`
  ADD CONSTRAINT `fk_fruta_contraparte_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_contraparte_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_contraparte_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_contraparte_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_cuartel`
--
ALTER TABLE `fruta_cuartel`
  ADD CONSTRAINT `fk_fruta_cuartel_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_cuartel_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_cuartel_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_cuartel_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_cventa`
--
ALTER TABLE `fruta_cventa`
  ADD CONSTRAINT `fk_fruta_cventa_principal_emrpresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_cventa_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_cventa_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_despachoex`
--
ALTER TABLE `fruta_despachoex`
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_acarga` FOREIGN KEY (`ID_ACARGA`) REFERENCES `fruta_acarga` (`ID_ACARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_adestino` FOREIGN KEY (`ID_ADESTINO`) REFERENCES `fruta_adestino` (`ID_ADESTINO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_agcarga` FOREIGN KEY (`ID_AGCARGA`) REFERENCES `fruta_agcarga` (`ID_AGCARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_contraparte` FOREIGN KEY (`ID_CONTRAPARTE`) REFERENCES `fruta_contraparte` (`ID_CONTRAPARTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_dfinal` FOREIGN KEY (`ID_DFINAL`) REFERENCES `fruta_dfinal` (`ID_DFINAL`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_exportadora` FOREIGN KEY (`ID_EXPPORTADORA`) REFERENCES `fruta_exportadora` (`ID_EXPORTADORA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_icarga` FOREIGN KEY (`ID_ICARGA`) REFERENCES `fruta_icarga` (`ID_ICARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_inpector` FOREIGN KEY (`ID_INPECTOR`) REFERENCES `fruta_inpector` (`ID_INPECTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_lcarga` FOREIGN KEY (`ID_LCARGA`) REFERENCES `fruta_lcarga` (`ID_LCARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_ldestino` FOREIGN KEY (`ID_LDESTINO`) REFERENCES `fruta_ldestino` (`ID_LDESTINO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_mercado` FOREIGN KEY (`ID_MERCADO`) REFERENCES `fruta_mercado` (`ID_MERCADO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_pcarga` FOREIGN KEY (`ID_PCARGA`) REFERENCES `fruta_pcarga` (`ID_PCARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_pdestino` FOREIGN KEY (`ID_PDESTINO`) REFERENCES `fruta_pdestino` (`ID_PDESTINO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_fruta_rfinal` FOREIGN KEY (`ID_RFINAL`) REFERENCES `fruta_rfinal` (`ID_RFINAL`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_transporte_aeronave` FOREIGN KEY (`ID_AERONAVE`) REFERENCES `transporte_aeronave` (`ID_AERONAVE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_transporte_larea` FOREIGN KEY (`ID_LAREA`) REFERENCES `transporte_laerea` (`ID_LAEREA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_transporte_naviera` FOREIGN KEY (`ID_NAVIERA`) REFERENCES `transporte_naviera` (`ID_NAVIERA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_transporte_transporte2` FOREIGN KEY (`ID_TRANSPORTE2`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_ubicacion_pais` FOREIGN KEY (`ID_PAIS`) REFERENCES `ubicacion_pais` (`ID_PAIS`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_usuario_usuaioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoex_usuario_usuaiom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_despachoind`
--
ALTER TABLE `fruta_despachoind`
  ADD CONSTRAINT `fk_fruta_despachoind_fruta_comprador` FOREIGN KEY (`ID_COMPRADOR`) REFERENCES `fruta_comprador` (`ID_COMPRADOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachoind_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_despachomp`
--
ALTER TABLE `fruta_despachomp`
  ADD CONSTRAINT `fk_fruta_despachomp_fruta_comprador` FOREIGN KEY (`ID_COMPRADOR`) REFERENCES `fruta_comprador` (`ID_COMPRADOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_fruta_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachomp_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_despachopt`
--
ALTER TABLE `fruta_despachopt`
  ADD CONSTRAINT `fk_fruta_despachopt_fruta_comprador` FOREIGN KEY (`ID_COMPRADOR`) REFERENCES `fruta_comprador` (`ID_COMPRADOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_despachopt_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_dfinal`
--
ALTER TABLE `fruta_dfinal`
  ADD CONSTRAINT `fk_fruta_dfinal_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dfinal_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dfinal_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_dicarga`
--
ALTER TABLE `fruta_dicarga`
  ADD CONSTRAINT `fk_fruta_dicarga_estandar_eexportacion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eexportacion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dicarga_fruta_icarga` FOREIGN KEY (`ID_ICARGA`) REFERENCES `fruta_icarga` (`ID_ICARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dicarga_fruta_tcalibre` FOREIGN KEY (`ID_TCALIBRE`) REFERENCES `fruta_tcalibre` (`ID_TCALIBRE`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_dpexportacion`
--
ALTER TABLE `fruta_dpexportacion`
  ADD CONSTRAINT `fk_fruta_dpexportacion_estandar_eexportacion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eexportacion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpexportacion_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpexportacion_fruta_proceso` FOREIGN KEY (`ID_PROCESO`) REFERENCES `fruta_proceso` (`ID_PROCESO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpexportacion_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpexportacion_fruta_tcalibre` FOREIGN KEY (`ID_TCALIBRE`) REFERENCES `fruta_tcalibre` (`ID_TCALIBRE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpexportacion_fruta_tembalaje` FOREIGN KEY (`ID_TEMBALAJE`) REFERENCES `fruta_tembalaje` (`ID_TEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpexportacion_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpexportacion_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_dpindustrial`
--
ALTER TABLE `fruta_dpindustrial`
  ADD CONSTRAINT `fk_fruta_dpindustrial_estandar_eindustrial` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eindustrial` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpindustrial_frtua_proceso` FOREIGN KEY (`ID_PROCESO`) REFERENCES `fruta_proceso` (`ID_PROCESO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpindustrial_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpindustrial_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpindustrial_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_dpindustrial_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_drecepcionind`
--
ALTER TABLE `fruta_drecepcionind`
  ADD CONSTRAINT `fk_fruta_drecepcionind_estandar_eindustrial` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eindustrial` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionind_frtua_recepcionind` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `fruta_recepcionind` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionind_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionind_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionind_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionind_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_drecepcionmp`
--
ALTER TABLE `fruta_drecepcionmp`
  ADD CONSTRAINT `fk_fruta_drecepcionmp_estandar_erecepcion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_erecepcion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionmp_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionmp_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionmp_fruta_recepcionmp` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `fruta_recepcionmp` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionmp_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionmp_fruta_ttratamiento1` FOREIGN KEY (`ID_TTRATAMIENTO1`) REFERENCES `fruta_tratamineto1` (`ID_TTRATAMIENTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionmp_fruta_ttratamiento2` FOREIGN KEY (`ID_TTRATAMIENTO2`) REFERENCES `fruta_tratamineto2` (`ID_TTRATAMIENTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionmp_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_drecepcionpt`
--
ALTER TABLE `fruta_drecepcionpt`
  ADD CONSTRAINT `fk_fruta_drecepcionpt_estandar_eexportacion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eexportacion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_recepcionpt` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `fruta_recepcionpt` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_tcalibre` FOREIGN KEY (`ID_TCALIBRE`) REFERENCES `fruta_tcalibre` (`ID_TCALIBRE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_tcategoria` FOREIGN KEY (`ID_TCATEGORIA`) REFERENCES `fruta_tcategoria` (`ID_TCATEGORIA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_tcolor` FOREIGN KEY (`ID_TCOLOR`) REFERENCES `fruta_tcolor` (`ID_TCOLOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_tembalaje` FOREIGN KEY (`ID_TEMBALAJE`) REFERENCES `fruta_tembalaje` (`ID_TEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drecepcionpt_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_drepaletizajeex`
--
ALTER TABLE `fruta_drepaletizajeex`
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_estandar_eexportacion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eexportacion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_exiexportacion` FOREIGN KEY (`ID_EXIEXPORTACION`) REFERENCES `fruta_exiexportacion` (`ID_EXIEXPORTACION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_repaletizaje` FOREIGN KEY (`ID_REPALETIZAJE`) REFERENCES `fruta_repaletizajeex` (`ID_REPALETIZAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_tcalibre` FOREIGN KEY (`ID_TCALIBRE`) REFERENCES `fruta_tcalibre` (`ID_TCALIBRE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_tembalaje` FOREIGN KEY (`ID_TEMBALAJE`) REFERENCES `fruta_tembalaje` (`ID_TEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajeex_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_drepaletizajemp`
--
ALTER TABLE `fruta_drepaletizajemp`
  ADD CONSTRAINT `fk_fruta_drepaletizajemp_fruta_estandar_erecepcion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_erecepcion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajemp_fruta_eximateriaprima` FOREIGN KEY (`ID_EXIMATERIAPRIMA`) REFERENCES `fruta_eximateriaprima` (`ID_EXIMATERIAPRIMA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajemp_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajemp_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajemp_fruta_repaletizaje` FOREIGN KEY (`ID_REPALETIZAJE`) REFERENCES `fruta_repaletizajemp` (`ID_REPALETIZAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajemp_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drepaletizajemp_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_drexportacion`
--
ALTER TABLE `fruta_drexportacion`
  ADD CONSTRAINT `fk_fruta_drexportacion_estandar_eexportacion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eexportacion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drexportacion_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drexportacion_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drexportacion_fruta_tcalibre` FOREIGN KEY (`ID_TCALIBRE`) REFERENCES `fruta_tcalibre` (`ID_TCALIBRE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drexportacion_fruta_tembalaje` FOREIGN KEY (`ID_TEMBALAJE`) REFERENCES `fruta_tembalaje` (`ID_TEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drexportacion_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drexportacion_fruta_treembalaje` FOREIGN KEY (`ID_REEMBALAJE`) REFERENCES `fruta_reembalaje` (`ID_REEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drexportacion_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_drindustrial`
--
ALTER TABLE `fruta_drindustrial`
  ADD CONSTRAINT `fk_fruta_drindustrial_estandar_eindustrial` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eindustrial` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drindustrial_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drindustrial_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drindustrial_fruta_reembalaje` FOREIGN KEY (`ID_REEMBALAJE`) REFERENCES `fruta_reembalaje` (`ID_REEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drindustrial_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_drindustrial_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_exiexportacion`
--
ALTER TABLE `fruta_exiexportacion`
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_despacho` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `fruta_despachopt` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_despacho2` FOREIGN KEY (`ID_DESPACHO2`) REFERENCES `fruta_despachopt` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_despachoex` FOREIGN KEY (`ID_DESPACHOEX`) REFERENCES `fruta_despachoex` (`ID_DESPACHOEX`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_estandar_eexportacion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eexportacion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_icarga` FOREIGN KEY (`ID_ICARGA`) REFERENCES `fruta_icarga` (`ID_ICARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_inpsag` FOREIGN KEY (`ID_INPSAG`) REFERENCES `fruta_inpsag` (`ID_INPSAG`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_pcdespacho` FOREIGN KEY (`ID_PCDESPACHO`) REFERENCES `fruta_pcdespacho` (`ID_PCDESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_proceso` FOREIGN KEY (`ID_PROCESO`) REFERENCES `fruta_proceso` (`ID_PROCESO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_recepcion` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `fruta_recepcionpt` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_reembalaje` FOREIGN KEY (`ID_REEMBALAJE`) REFERENCES `fruta_reembalaje` (`ID_REEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_repaletizaje` FOREIGN KEY (`ID_REPALETIZAJE`) REFERENCES `fruta_repaletizajeex` (`ID_REPALETIZAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_tcalibre` FOREIGN KEY (`ID_TCALIBRE`) REFERENCES `fruta_tcalibre` (`ID_TCALIBRE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_tembalaje` FOREIGN KEY (`ID_TEMBALAJE`) REFERENCES `fruta_tembalaje` (`ID_TEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiexportacion_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_exiindustrial`
--
ALTER TABLE `fruta_exiindustrial`
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_despacho2` FOREIGN KEY (`ID_DESPACHO2`) REFERENCES `fruta_despachoind` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_estandar_eindustrial` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eindustrial` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_proceso` FOREIGN KEY (`ID_PROCESO`) REFERENCES `fruta_proceso` (`ID_PROCESO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_recepcion` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `fruta_recepcionind` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_principal_despacho` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `fruta_despachoind` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_principal_reembalaje` FOREIGN KEY (`ID_REEMBALAJE`) REFERENCES `fruta_reembalaje` (`ID_REEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exiindustrial_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_eximateriaprima`
--
ALTER TABLE `fruta_eximateriaprima`
  ADD CONSTRAINT `fk_fruta_eximateriaprima_estandar_erecepcion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_erecepcion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_despacho` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `fruta_despachomp` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_despacho2` FOREIGN KEY (`ID_DESPACHO2`) REFERENCES `fruta_despachomp` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `fruta_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_proceso` FOREIGN KEY (`ID_PROCESO`) REFERENCES `fruta_proceso` (`ID_PROCESO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_recepcion` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `fruta_recepcionmp` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_repaletizaje` FOREIGN KEY (`ID_REPALETIZAJE`) REFERENCES `fruta_repaletizajemp` (`ID_REPALETIZAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_tmanejo` FOREIGN KEY (`ID_TMANEJO`) REFERENCES `fruta_tmanejo` (`ID_TMANEJO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_eximateriaprima_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_exportadora`
--
ALTER TABLE `fruta_exportadora`
  ADD CONSTRAINT `fk_fruta_exportadora_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exportadora_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_exportadora_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_folio`
--
ALTER TABLE `fruta_folio`
  ADD CONSTRAINT `fk_fruta_folio_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_folio_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_folio_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_folio_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_folio_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_fpago`
--
ALTER TABLE `fruta_fpago`
  ADD CONSTRAINT `fk_fruta_fpago_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_fpago_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_fpago_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_icarga`
--
ALTER TABLE `fruta_icarga`
  ADD CONSTRAINT `fk_fruta_icarga_fruta_acarga` FOREIGN KEY (`ID_ACARGA`) REFERENCES `fruta_acarga` (`ID_ACARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_adestino` FOREIGN KEY (`ID_ADESTINO`) REFERENCES `fruta_adestino` (`ID_ADESTINO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_aduana` FOREIGN KEY (`ID_AADUANA`) REFERENCES `fruta_aaduana` (`ID_AADUANA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_agcarga` FOREIGN KEY (`ID_AGCARGA`) REFERENCES `fruta_agcarga` (`ID_AGCARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_atmosfera` FOREIGN KEY (`ID_ATMOSFERA`) REFERENCES `fruta_atmosfera` (`ID_ATMOSFERA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_broker` FOREIGN KEY (`ID_BROKER`) REFERENCES `fruta_broker` (`ID_BROKER`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_consignatario` FOREIGN KEY (`ID_CONSIGNATARIO`) REFERENCES `fruta_consignatario` (`ID_CONSIGNATARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_cventa` FOREIGN KEY (`ID_CVENTA`) REFERENCES `fruta_cventa` (`ID_CVENTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_dfinal` FOREIGN KEY (`ID_DFINAL`) REFERENCES `fruta_dfinal` (`ID_DFINAL`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_exportadora` FOREIGN KEY (`ID_EXPPORTADORA`) REFERENCES `fruta_exportadora` (`ID_EXPORTADORA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_fpago` FOREIGN KEY (`ID_FPAGO`) REFERENCES `fruta_fpago` (`ID_FPAGO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_lcarga` FOREIGN KEY (`ID_LCARGA`) REFERENCES `fruta_lcarga` (`ID_LCARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_ldestino` FOREIGN KEY (`ID_LDESTINO`) REFERENCES `fruta_ldestino` (`ID_LDESTINO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_mercado` FOREIGN KEY (`ID_MERCADO`) REFERENCES `fruta_mercado` (`ID_MERCADO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_mventa` FOREIGN KEY (`ID_MVENTA`) REFERENCES `fruta_mventa` (`ID_MVENTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_notificador` FOREIGN KEY (`ID_NOTIFICADOR`) REFERENCES `fruta_notificador` (`ID_NOTIFICADOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_pcarga` FOREIGN KEY (`ID_PCARGA`) REFERENCES `fruta_pcarga` (`ID_PCARGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_pdestino` FOREIGN KEY (`ID_PDESTINO`) REFERENCES `fruta_pdestino` (`ID_PDESTINO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_rfinal` FOREIGN KEY (`ID_RFINAL`) REFERENCES `fruta_rfinal` (`ID_RFINAL`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_seguro` FOREIGN KEY (`ID_SEGURO`) REFERENCES `fruta_seguro` (`ID_SEGURO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_tcontenedor` FOREIGN KEY (`ID_TCONTENEDOR`) REFERENCES `fruta_tcontenedor` (`ID_TCONTENEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_tflete` FOREIGN KEY (`ID_TFLETE`) REFERENCES `fruta_tflete` (`ID_TFLETE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_fruta_tservicio` FOREIGN KEY (`ID_TSERVICIO`) REFERENCES `fruta_tservicio` (`ID_TSERVICIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_transporte_aeronave` FOREIGN KEY (`ID_AERONAVE`) REFERENCES `transporte_aeronave` (`ID_AERONAVE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_transporte_larea` FOREIGN KEY (`ID_LAREA`) REFERENCES `transporte_laerea` (`ID_LAEREA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_transporte_naviera` FOREIGN KEY (`ID_NAVIERA`) REFERENCES `transporte_naviera` (`ID_NAVIERA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_ubicacion_pais` FOREIGN KEY (`ID_PAIS`) REFERENCES `ubicacion_pais` (`ID_PAIS`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_icarga_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_inpector`
--
ALTER TABLE `fruta_inpector`
  ADD CONSTRAINT `fk_fruta_inpector_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpector_ubicacion` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpector_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpector_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_inpsag`
--
ALTER TABLE `fruta_inpsag`
  ADD CONSTRAINT `fk_fruta_inpsag_contraparte` FOREIGN KEY (`ID_CONTRAPARTE`) REFERENCES `fruta_contraparte` (`ID_CONTRAPARTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpsag_fruta_inspector` FOREIGN KEY (`ID_INPECTOR`) REFERENCES `fruta_inpector` (`ID_INPECTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpsag_fruta_tinpsag` FOREIGN KEY (`ID_TINPSAG`) REFERENCES `fruta_tinpsag` (`ID_TINPSAG`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpsag_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpsag_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpsag_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_inpsag_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_lcarga`
--
ALTER TABLE `fruta_lcarga`
  ADD CONSTRAINT `fk_fruta_lcarga_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_lcarga_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_lcarga_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_ldestino`
--
ALTER TABLE `fruta_ldestino`
  ADD CONSTRAINT `fk_fruta_ldestino_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_ldestino_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_ldestino_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_mercado`
--
ALTER TABLE `fruta_mercado`
  ADD CONSTRAINT `fk_fruta_mercado_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mercado_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mercado_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_mguiaind`
--
ALTER TABLE `fruta_mguiaind`
  ADD CONSTRAINT `fk_fruta_mguiaind_fruta_despacho` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `fruta_despachoind` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiaind_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiaind_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiaind_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiaind_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiaind_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiaind_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_mguiamp`
--
ALTER TABLE `fruta_mguiamp`
  ADD CONSTRAINT `fk_fruta_mguiamp_fruta_despachomp` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `fruta_despachomp` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiamp_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiamp_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiamp_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiamp_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiamp_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiamp_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_mguiapt`
--
ALTER TABLE `fruta_mguiapt`
  ADD CONSTRAINT `fk_fruta_mguiapt_fruta_despacho` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `fruta_despachopt` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiapt_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiapt_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiapt_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiapt_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiapt_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mguiapt_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_mventa`
--
ALTER TABLE `fruta_mventa`
  ADD CONSTRAINT `fk_fruta_mventa_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mventa_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_mventa_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_notificador`
--
ALTER TABLE `fruta_notificador`
  ADD CONSTRAINT `fk_fruta_notificador_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_notificador_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_notificador_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_notificador_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_pcarga`
--
ALTER TABLE `fruta_pcarga`
  ADD CONSTRAINT `fk_fruta_pcarga_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pcarga_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pcarga_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_pcdespacho`
--
ALTER TABLE `fruta_pcdespacho`
  ADD CONSTRAINT `fk_fruta_pcdespacho_fruta_despachoex` FOREIGN KEY (`ID_DESPACHOEX`) REFERENCES `fruta_despachoex` (`ID_DESPACHOEX`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pcdespacho_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pcdespacho_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pcdespacho_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pcdespacho_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pcdespacho_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_pdestino`
--
ALTER TABLE `fruta_pdestino`
  ADD CONSTRAINT `fk_fruta_pdestino_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pdestino_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_pdestino_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_proceso`
--
ALTER TABLE `fruta_proceso`
  ADD CONSTRAINT `fk_fruta_proceso_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_proceso_fruta_tproceso` FOREIGN KEY (`ID_TPROCESO`) REFERENCES `fruta_tproceso` (`ID_TPROCESO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_proceso_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_proceso_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_proceso_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_proceso_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_proceso_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_proceso_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_productor`
--
ALTER TABLE `fruta_productor`
  ADD CONSTRAINT `fk_fruta_productor_fruta_tproductor` FOREIGN KEY (`ID_TPRODUCTOR`) REFERENCES `fruta_tproductor` (`ID_TPRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_productor_princiapal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_productor_ubicacion` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_productor_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_productor_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_recepcionind`
--
ALTER TABLE `fruta_recepcionind`
  ADD CONSTRAINT `fk_fruta_recepcionind_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionind_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_recepcionmp`
--
ALTER TABLE `fruta_recepcionmp`
  ADD CONSTRAINT `fk_fruta_recepcionmp_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionmp_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_recepcionpt`
--
ALTER TABLE `fruta_recepcionpt`
  ADD CONSTRAINT `fk_fruta_recepcionpt_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_principal_empresa_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_recepcionpt_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_reembalaje`
--
ALTER TABLE `fruta_reembalaje`
  ADD CONSTRAINT `fk_fruta_reembalaje_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_reembalaje_fruta_treembalaje` FOREIGN KEY (`ID_TREEMBALAJE`) REFERENCES `fruta_treembalaje` (`ID_TREEMBALAJE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_reembalaje_fruta_vespecies` FOREIGN KEY (`ID_VESPECIES`) REFERENCES `fruta_vespecies` (`ID_VESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_reembalaje_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_reembalaje_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_reembalaje_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_reembalaje_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_reembalaje_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_repaletizajeex`
--
ALTER TABLE `fruta_repaletizajeex`
  ADD CONSTRAINT `fk_fruta_repaletizajeex_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajeex_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajeex_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajeex_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajeex_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_repaletizajemp`
--
ALTER TABLE `fruta_repaletizajemp`
  ADD CONSTRAINT `fk_fruta_repaletizajem_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajem_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajem_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajem_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_repaletizajem_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_rfinal`
--
ALTER TABLE `fruta_rfinal`
  ADD CONSTRAINT `fk_fruta_rfinal_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_rfinal_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_rfinal_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_rfinal_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_rmercado`
--
ALTER TABLE `fruta_rmercado`
  ADD CONSTRAINT `fk_fruta_rmercado_fruta_mercado` FOREIGN KEY (`ID_MERCADO`) REFERENCES `fruta_mercado` (`ID_MERCADO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_rmercado_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_rmercado_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_rmercado_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_rmercado_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_seguro`
--
ALTER TABLE `fruta_seguro`
  ADD CONSTRAINT `fk_fruta_seguro_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_seguro_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_seguro_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tcalibre`
--
ALTER TABLE `fruta_tcalibre`
  ADD CONSTRAINT `fk_fk_fruta_tcalibre_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tcalibre_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tcalibre_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tcategoria`
--
ALTER TABLE `fruta_tcategoria`
  ADD CONSTRAINT `fk_fruta_tcategoria_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tcategoria_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tcolor`
--
ALTER TABLE `fruta_tcolor`
  ADD CONSTRAINT `fk_fruta_tcolor_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tcolor_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tcontenedor`
--
ALTER TABLE `fruta_tcontenedor`
  ADD CONSTRAINT `fk_fruta_tcontenedor_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tcontenedor_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tcontenedor_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tembalaje`
--
ALTER TABLE `fruta_tembalaje`
  ADD CONSTRAINT `fk_fruta_tembalaje_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tembalaje_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tembalaje_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tetiqueta`
--
ALTER TABLE `fruta_tetiqueta`
  ADD CONSTRAINT `fk_fruta_tetiqueta_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tetiqueta_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tetiqueta_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tflete`
--
ALTER TABLE `fruta_tflete`
  ADD CONSTRAINT `fk_fruta_tflete_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tflete_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tflete_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tinpsag`
--
ALTER TABLE `fruta_tinpsag`
  ADD CONSTRAINT `fk_fruta_tinpsag_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tinpsag_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tmanejo`
--
ALTER TABLE `fruta_tmanejo`
  ADD CONSTRAINT `fk_fruta_tmanejo_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tmanejo_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tmoneda`
--
ALTER TABLE `fruta_tmoneda`
  ADD CONSTRAINT `fk_fk_fruta_tmoneda_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tmoneda_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tmoneda_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tproceso`
--
ALTER TABLE `fruta_tproceso`
  ADD CONSTRAINT `fruta_tproceso_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fruta_tproceso_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tproductor`
--
ALTER TABLE `fruta_tproductor`
  ADD CONSTRAINT `fk_fruta_tproductor_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tproductor_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tproductor_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tratamineto1`
--
ALTER TABLE `fruta_tratamineto1`
  ADD CONSTRAINT `fk_fruta_tratamineto1_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tratamineto1_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tratamineto2`
--
ALTER TABLE `fruta_tratamineto2`
  ADD CONSTRAINT `fk_fruta_tratamineto2_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tratamineto2_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_treembalaje`
--
ALTER TABLE `fruta_treembalaje`
  ADD CONSTRAINT `fk_fruta_treembalaje_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_treembalaje_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_tservicio`
--
ALTER TABLE `fruta_tservicio`
  ADD CONSTRAINT `fk_fruta_tservicio_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tservicio_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_tservicio_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fruta_vespecies`
--
ALTER TABLE `fruta_vespecies`
  ADD CONSTRAINT `fk_fk_fruta_vespecies_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_vespecies_fruta_especies` FOREIGN KEY (`ID_ESPECIES`) REFERENCES `fruta_especies` (`ID_ESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_vespecies_principal` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fruta_vespecies_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_cardexe`
--
ALTER TABLE `material_cardexe`
  ADD CONSTRAINT `fk_material_cardexe_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexe_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexe_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexe_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexe_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_cardexm`
--
ALTER TABLE `material_cardexm`
  ADD CONSTRAINT `fk_material_cardexm_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexm_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexm_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexm_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cardexm_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_cliente`
--
ALTER TABLE `material_cliente`
  ADD CONSTRAINT `fk_material_cliente_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cliente_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cliente_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_cliente_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_despachoe`
--
ALTER TABLE `material_despachoe`
  ADD CONSTRAINT `fk_material_despachoe_fruta_comrpador` FOREIGN KEY (`ID_COMPRADOR`) REFERENCES `fruta_comprador` (`ID_COMPRADOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_fruta_despachomp` FOREIGN KEY (`ID_DESPACHOMP`) REFERENCES `fruta_despachomp` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_materiales_proveedor` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `material_proveedor` (`ID_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_materiales_tdocumento` FOREIGN KEY (`ID_TDOCUMENTO`) REFERENCES `material_tdocumento` (`ID_TDOCUMENTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_bodega` FOREIGN KEY (`ID_BODEGA`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_bodega2` FOREIGN KEY (`ID_BODEGA2`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_bodegao` FOREIGN KEY (`ID_BODEGAO`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachoe_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_despachom`
--
ALTER TABLE `material_despachom`
  ADD CONSTRAINT `fk_material_despachom_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_material_cliente` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `material_cliente` (`ID_CLIENTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_material_proveedor` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `material_proveedor` (`ID_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_materiales_proveedor` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `material_proveedor` (`ID_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_materiales_tdocumento` FOREIGN KEY (`ID_TDOCUMENTO`) REFERENCES `material_tdocumento` (`ID_TDOCUMENTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_principal_bodega` FOREIGN KEY (`ID_BODEGA`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_principal_bodega2` FOREIGN KEY (`ID_BODEGA2`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_despachom_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_dficha`
--
ALTER TABLE `material_dficha`
  ADD CONSTRAINT `fk_material_dficha_material_ficha` FOREIGN KEY (`ID_FICHA`) REFERENCES `material_ficha` (`ID_FICHA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_dficha_material_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_docompra`
--
ALTER TABLE `material_docompra`
  ADD CONSTRAINT `fk_material_docomprae_materiales_ocomprae` FOREIGN KEY (`ID_OCOMPRA`) REFERENCES `material_ocompra` (`ID_OCOMPRA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_docomprae_materiales_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_docomprae_materiales_tumedida` FOREIGN KEY (`ID_TUMEDIDA`) REFERENCES `material_tumedida` (`ID_TUMEDIDA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_drecepcionm`
--
ALTER TABLE `material_drecepcionm`
  ADD CONSTRAINT `fk_material_drecepcionm_material_docompra` FOREIGN KEY (`ID_DOCOMPRA`) REFERENCES `material_docompra` (`ID_DOCOMPRA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_drecepcionm_material_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_drecepcionm_material_recepcionm` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `material_recepcionm` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_drecepcionm_material_tumedida` FOREIGN KEY (`ID_TUMEDIDA`) REFERENCES `material_tumedida` (`ID_TUMEDIDA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_familia`
--
ALTER TABLE `material_familia`
  ADD CONSTRAINT `fk_material_familia_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_familia_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_familia_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_ficha`
--
ALTER TABLE `material_ficha`
  ADD CONSTRAINT `fk_material_ficha_estandar_eexportacion` FOREIGN KEY (`ID_ESTANDAR`) REFERENCES `estandar_eexportacion` (`ID_ESTANDAR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ficha_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ficha_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ficha_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ficha_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_folio`
--
ALTER TABLE `material_folio`
  ADD CONSTRAINT `fk_material_folio_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_folio_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_folio_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_folio_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_folio_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_fpago`
--
ALTER TABLE `material_fpago`
  ADD CONSTRAINT `fk_material_fpago_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_fpago_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_fpago_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_inventarioe`
--
ALTER TABLE `material_inventarioe`
  ADD CONSTRAINT `fk_material_inventarioe_material_docompra` FOREIGN KEY (`ID_DOCOMPRA`) REFERENCES `material_docompra` (`ID_DOCOMPRA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_materiales_despachoe` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `material_despachoe` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_materiales_despachoe2` FOREIGN KEY (`ID_DESPACHO2`) REFERENCES `material_despachoe` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_materiales_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_materiales_recepcione` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `material_recepcione` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_materiales_tumedida` FOREIGN KEY (`ID_TUMEDIDA`) REFERENCES `material_tumedida` (`ID_TUMEDIDA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_principal_bodega` FOREIGN KEY (`ID_BODEGA`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_principal_bodega2` FOREIGN KEY (`ID_BODEGA2`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventarioe_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_inventariom`
--
ALTER TABLE `material_inventariom`
  ADD CONSTRAINT `fk_material_inventariom_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_material_ocompra` FOREIGN KEY (`ID_OCOMPRA`) REFERENCES `material_ocompra` (`ID_OCOMPRA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_despachom` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `material_despachom` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_despachom2` FOREIGN KEY (`ID_DESPACHO2`) REFERENCES `material_despachom` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `material_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_proveedor` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `material_proveedor` (`ID_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_recepcionm` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `material_recepcionm` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_tcontenedor` FOREIGN KEY (`ID_TCONTENEDOR`) REFERENCES `material_tcontenedor` (`ID_TCONTENEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_materiales_tumedida` FOREIGN KEY (`ID_TUMEDIDA`) REFERENCES `material_tumedida` (`ID_TUMEDIDA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_principal_bodega` FOREIGN KEY (`ID_BODEGA`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_principal_planta3` FOREIGN KEY (`ID_PLANTA3`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_inventariom_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_mguiae`
--
ALTER TABLE `material_mguiae`
  ADD CONSTRAINT `fk_material_mguiae_material_despachoe` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `material_despachoe` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiae_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiae_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiae_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiae_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiae_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiae_usuario_usuarioim` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_mguiam`
--
ALTER TABLE `material_mguiam`
  ADD CONSTRAINT `fk_material_mguiam_material_despahom` FOREIGN KEY (`ID_DESPACHO`) REFERENCES `material_despachom` (`ID_DESPACHO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiam_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiam_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiam_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiam_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiam_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mguiam_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_mocompra`
--
ALTER TABLE `material_mocompra`
  ADD CONSTRAINT `fk_material_mocompra_material_ocompra` FOREIGN KEY (`ID_OCOMPRA`) REFERENCES `material_ocompra` (`ID_OCOMPRA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mocompra_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mocompra_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mocompra_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mocompra_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_mocompra_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_ocompra`
--
ALTER TABLE `material_ocompra`
  ADD CONSTRAINT `fk_material_ocomprae_materiales_fpago` FOREIGN KEY (`ID_FPAGO`) REFERENCES `material_fpago` (`ID_FPAGO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_materiales_proveedor` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `material_proveedor` (`ID_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_materiales_responsable` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `material_responsable` (`ID_RESPONSABLE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_materiales_tmoneda` FOREIGN KEY (`ID_TMONEDA`) REFERENCES `material_tmoneda` (`ID_TMONEDA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_ocomprae_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_producto`
--
ALTER TABLE `material_producto`
  ADD CONSTRAINT `fk_material_producto_fruta_especies` FOREIGN KEY (`ID_ESPECIES`) REFERENCES `fruta_especies` (`ID_ESPECIES`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_producto_material_familia` FOREIGN KEY (`ID_FAMILIA`) REFERENCES `material_familia` (`ID_FAMILIA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_producto_material_subfamilia` FOREIGN KEY (`ID_SUBFAMILIA`) REFERENCES `material_subfamilia` (`ID_SUBFAMILIA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_producto_material_tumedida` FOREIGN KEY (`ID_TUMEDIDA`) REFERENCES `material_tumedida` (`ID_TUMEDIDA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_producto_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_producto_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_producto_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_producto_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_proveedor`
--
ALTER TABLE `material_proveedor`
  ADD CONSTRAINT `fk_material_proveedor_princiapl_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_proveedor_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_proveedor_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_proveedor_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_recepcione`
--
ALTER TABLE `material_recepcione`
  ADD CONSTRAINT `fk_material_recepcione_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_fruta_recepcionind` FOREIGN KEY (`ID_RECEPCIONIND`) REFERENCES `fruta_recepcionind` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_fruta_recepcionmp` FOREIGN KEY (`ID_RECEPCIONMP`) REFERENCES `fruta_recepcionmp` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_material_ocomprae` FOREIGN KEY (`ID_OCOMPRA`) REFERENCES `material_ocompra` (`ID_OCOMPRA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_material_proveedor` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `material_proveedor` (`ID_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_material_tdocumento` FOREIGN KEY (`ID_TDOCUMENTO`) REFERENCES `material_tdocumento` (`ID_TDOCUMENTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_principal_bodega` FOREIGN KEY (`ID_BODEGA`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_principal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcione_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_recepcionm`
--
ALTER TABLE `material_recepcionm`
  ADD CONSTRAINT `fk_material_recepcionm_fruta_productor` FOREIGN KEY (`ID_PRODUCTOR`) REFERENCES `fruta_productor` (`ID_PRODUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_material_ocompra` FOREIGN KEY (`ID_OCOMPRA`) REFERENCES `material_ocompra` (`ID_OCOMPRA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_material_proveedor` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `material_proveedor` (`ID_PROVEEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_material_tdocumento` FOREIGN KEY (`ID_TDOCUMENTO`) REFERENCES `material_tdocumento` (`ID_TDOCUMENTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_princiapal_bodega` FOREIGN KEY (`ID_BODEGA`) REFERENCES `principal_bodega` (`ID_BODEGA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_princiapal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_princiapal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_princiapal_temporada` FOREIGN KEY (`ID_TEMPORADA`) REFERENCES `principal_temporada` (`ID_TEMPORADA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_principal_planta2` FOREIGN KEY (`ID_PLANTA2`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_transporte_conductor` FOREIGN KEY (`ID_CONDUCTOR`) REFERENCES `transporte_conductor` (`ID_CONDUCTOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_transporte_transporte` FOREIGN KEY (`ID_TRANSPORTE`) REFERENCES `transporte_transporte` (`ID_TRANSPORTE`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_recepcionm_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_responsable`
--
ALTER TABLE `material_responsable`
  ADD CONSTRAINT `fk_material_responsable_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_responsable_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_responsable_usuario_usuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_responsable_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_responsable_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_subfamilia`
--
ALTER TABLE `material_subfamilia`
  ADD CONSTRAINT `fk_material_subfamilia_material_familia` FOREIGN KEY (`ID_FAMILIA`) REFERENCES `material_familia` (`ID_FAMILIA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_subfamilia_princiapl_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_subfamilia_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_subfamilia_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_tarjam`
--
ALTER TABLE `material_tarjam`
  ADD CONSTRAINT `fk_material_tarjam_material_drecepcion` FOREIGN KEY (`ID_DRECEPCION`) REFERENCES `material_drecepcionm` (`ID_DRECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tarjam_material_folio` FOREIGN KEY (`ID_FOLIO`) REFERENCES `material_folio` (`ID_FOLIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tarjam_material_producto` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `material_producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tarjam_material_recepcion` FOREIGN KEY (`ID_RECEPCION`) REFERENCES `material_recepcionm` (`ID_RECEPCION`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tarjam_material_tcontenedr` FOREIGN KEY (`ID_TCONTENEDOR`) REFERENCES `material_tcontenedor` (`ID_TCONTENEDOR`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tarjam_material_tumedida` FOREIGN KEY (`ID_TUMEDIDA`) REFERENCES `material_tumedida` (`ID_TUMEDIDA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_tcontenedor`
--
ALTER TABLE `material_tcontenedor`
  ADD CONSTRAINT `fk_material_tcontenedor_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tcontenedor_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tcontenedor_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_tdocumento`
--
ALTER TABLE `material_tdocumento`
  ADD CONSTRAINT `fk_material_tdocumento_prinicipal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tdocumento_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tdocumento_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_tmoneda`
--
ALTER TABLE `material_tmoneda`
  ADD CONSTRAINT `fk_material_tmoneda_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tmoneda_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tmoneda_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `material_tumedida`
--
ALTER TABLE `material_tumedida`
  ADD CONSTRAINT `fk_material_tumedida_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tumedida_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_material_tumedida_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `principal_bodega`
--
ALTER TABLE `principal_bodega`
  ADD CONSTRAINT `fk_principal_bodega_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_bodega_principal_planta` FOREIGN KEY (`ID_PLANTA`) REFERENCES `principal_planta` (`ID_PLANTA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_bodega_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_bodega_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `principal_empresa`
--
ALTER TABLE `principal_empresa`
  ADD CONSTRAINT `fk_principal_empresa_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_empresa_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_empresa_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `principal_planta`
--
ALTER TABLE `principal_planta`
  ADD CONSTRAINT `fk_principal_planta_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_planta_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_planta_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `principal_temporada`
--
ALTER TABLE `principal_temporada`
  ADD CONSTRAINT `fk_principal_temporada_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_principal_temporada_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `transporte_aeronave`
--
ALTER TABLE `transporte_aeronave`
  ADD CONSTRAINT `fk_fk_transporte_aeronave_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_aeronave_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_aeronave_transporte_laerea` FOREIGN KEY (`ID_LAEREA`) REFERENCES `transporte_laerea` (`ID_LAEREA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_aeronave_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `transporte_conductor`
--
ALTER TABLE `transporte_conductor`
  ADD CONSTRAINT `fk_transporte_conductor_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_conductor_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_conductor_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `transporte_laerea`
--
ALTER TABLE `transporte_laerea`
  ADD CONSTRAINT `fk_transporte_laerea_principal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_laerea_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_laerea_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_laerea_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `transporte_naviera`
--
ALTER TABLE `transporte_naviera`
  ADD CONSTRAINT `fk_fk_transporte_naviera_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_naviera_prinicpal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_naviera_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_naviera_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `transporte_transporte`
--
ALTER TABLE `transporte_transporte`
  ADD CONSTRAINT `fk_fk_transporte_transporte_usuario_usuariom` FOREIGN KEY (`ID_USUARIOM`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_transporte_princiapal_empresa` FOREIGN KEY (`ID_EMPRESA`) REFERENCES `principal_empresa` (`ID_EMPRESA`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_transporte_ubicacion_ciudad` FOREIGN KEY (`ID_CIUDAD`) REFERENCES `ubicacion_ciudad` (`ID_CIUDAD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transporte_transporte_usuario_usuarioi` FOREIGN KEY (`ID_USUARIOI`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicacion_ciudad`
--
ALTER TABLE `ubicacion_ciudad`
  ADD CONSTRAINT `fk_ubicacion_ciudad_ubicacion_comuna` FOREIGN KEY (`ID_COMUNA`) REFERENCES `ubicacion_comuna` (`ID_COMUNA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicacion_comuna`
--
ALTER TABLE `ubicacion_comuna`
  ADD CONSTRAINT `fk_ubicacion_comuna_ubicacion_provincia` FOREIGN KEY (`ID_PROVINCIA`) REFERENCES `ubicacion_provincia` (`ID_PROVINCIA`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicacion_provincia`
--
ALTER TABLE `ubicacion_provincia`
  ADD CONSTRAINT `fk_ubicacion_provincia_ubicacion_region` FOREIGN KEY (`ID_REGION`) REFERENCES `ubicacion_region` (`ID_REGION`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicacion_region`
--
ALTER TABLE `ubicacion_region`
  ADD CONSTRAINT `fk_ubicacion_region_ubicacion_pais` FOREIGN KEY (`ID_PAIS`) REFERENCES `ubicacion_pais` (`ID_PAIS`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_ausuario`
--
ALTER TABLE `usuario_ausuario`
  ADD CONSTRAINT `fk_usuario_ausuario_usuario_usuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_chat`
--
ALTER TABLE `usuario_chat`
  ADD CONSTRAINT `fk_usuario_chat_usuario_usuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_ptusuario`
--
ALTER TABLE `usuario_ptusuario`
  ADD CONSTRAINT `usuario_ptusuario_usuario_tusuario` FOREIGN KEY (`ID_TUSUARIO`) REFERENCES `usuario_tusuario` (`ID_TUSUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_usuario`
--
ALTER TABLE `usuario_usuario`
  ADD CONSTRAINT `fk_usuario_usuario_usuario_tusuario` FOREIGN KEY (`ID_TUSUARIO`) REFERENCES `usuario_tusuario` (`ID_TUSUARIO`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
