-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para roles
CREATE DATABASE IF NOT EXISTS `roles` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `roles`;

-- Volcando estructura para tabla roles.aportes
CREATE TABLE IF NOT EXISTS `aportes` (
  `IdAporte` int NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned DEFAULT NULL,
  `IdProyecto` int NOT NULL,
  `AporteUnitario` decimal(9,0) NOT NULL DEFAULT '0',
  `Fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAporte`),
  KEY `fkAporteProyecto` (`IdProyecto`),
  KEY `fkAporteusers` (`id`),
  CONSTRAINT `fkAporteProyecto` FOREIGN KEY (`IdProyecto`) REFERENCES `proyectos` (`IdProyecto`),
  CONSTRAINT `fkAporteusers` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.aportes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla roles.ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `IdCiudad` int NOT NULL AUTO_INCREMENT,
  `IdDepartamento` int NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCiudad`),
  KEY `fkCiudadDepartamento` (`IdDepartamento`),
  CONSTRAINT `fkCiudadDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamentos` (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.ciudades: ~65 rows (aproximadamente)
INSERT INTO `ciudades` (`IdCiudad`, `IdDepartamento`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Leticia', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(2, 1, 'Puerto Nariño', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(3, 2, 'Medellín', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(4, 2, 'Bello', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(5, 2, 'Envigado', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(6, 3, 'Arauca', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(7, 3, 'Saravena', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(8, 4, 'Barranquilla', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(9, 4, 'Soledad', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(10, 5, 'Cartagena', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(11, 5, 'Bolívar', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(12, 6, 'Tunja', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(13, 6, 'Duitama', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(14, 7, 'Manizales', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(15, 7, 'Pereira', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(16, 8, 'Florencia', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(17, 8, 'San Vicente del Caguán', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(18, 9, 'Yopal', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(19, 9, 'Aguazul', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(20, 10, 'Popayán', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(21, 10, 'Santander de Quilichao', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(22, 11, 'Valledupar', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(23, 11, 'Aguachica', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(24, 12, 'Quibdó', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(25, 12, 'Nuquí', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(26, 13, 'Montería', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(27, 13, 'Sahagún', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(28, 14, 'Bogotá', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(29, 14, 'Soacha', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(30, 15, 'Inírida', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(31, 15, 'Puerto Colombia', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(32, 16, 'San José del Guaviare', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(33, 16, 'El Retorno', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(34, 17, 'Neiva', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(35, 17, 'Pitalito', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(36, 18, 'Riohacha', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(37, 18, 'Maicao', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(38, 19, 'Santa Marta', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(39, 19, 'Ciénaga', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(40, 20, 'Villavicencio', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(41, 20, 'Acacías', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(42, 21, 'Pasto', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(43, 21, 'Tumaco', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(44, 22, 'Cúcuta', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(45, 22, 'Ocaña', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(46, 23, 'Mocoa', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(47, 23, 'Puerto Leguízamo', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(48, 24, 'Armenia', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(49, 24, 'Calarcá', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(50, 25, 'Pereira', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(51, 25, 'Dosquebradas', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(52, 26, 'San Andrés', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(53, 26, 'Providencia', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(54, 27, 'Bucaramanga', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(55, 27, 'Girón', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(56, 28, 'Sincelejo', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(57, 28, 'Corozal', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(58, 29, 'Ibagué', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(59, 29, 'Espinal', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(60, 30, 'Cali', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(61, 30, 'Buenaventura', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(62, 31, 'Mitú', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(63, 31, 'Carurú', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(64, 32, 'Puerto Carreño', '2023-08-11 08:50:16', '2023-08-11 08:50:16'),
	(65, 32, 'La Primavera', '2023-08-11 08:50:16', '2023-08-11 08:50:16');

-- Volcando estructura para tabla roles.conceptos
CREATE TABLE IF NOT EXISTS `conceptos` (
  `IdConcepto` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdConcepto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.conceptos: ~10 rows (aproximadamente)
INSERT INTO `conceptos` (`IdConcepto`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Servicios de seguridad', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(2, 'Suministro de materiales de construcción', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(3, 'Servicios de transporte', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(4, 'Honorarios profesionales', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(5, 'Pago de nómina', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(6, 'Alquiler de equipos', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(7, 'Impuestos y tasas', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(8, 'Publicidad y marketing', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(9, 'Investigación y desarrollo', '2023-08-31 08:02:10', '2023-08-31 08:02:10'),
	(10, 'Gastos generales', '2023-08-31 08:02:10', '2023-08-31 08:02:10');

-- Volcando estructura para tabla roles.contratos
CREATE TABLE IF NOT EXISTS `contratos` (
  `IdContrato` int NOT NULL AUTO_INCREMENT,
  `IdProyecto` int NOT NULL,
  `id` bigint unsigned DEFAULT NULL,
  `TipoContrato` varchar(50) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `Valor` decimal(11,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdContrato`),
  KEY `fkContratoProyecto` (`IdProyecto`),
  KEY `fkContratousers` (`id`),
  CONSTRAINT `fkContratoProyecto` FOREIGN KEY (`IdProyecto`) REFERENCES `proyectos` (`IdProyecto`),
  CONSTRAINT `fkContratousers` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.contratos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla roles.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `IdDepartamento` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.departamentos: ~32 rows (aproximadamente)
INSERT INTO `departamentos` (`IdDepartamento`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Amazonas', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(2, 'Antioquia', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(3, 'Arauca', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(4, 'Atlántico', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(5, 'Bolívar', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(6, 'Boyacá', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(7, 'Caldas', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(8, 'Caquetá', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(9, 'Casanare', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(10, 'Cauca', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(11, 'Cesar', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(12, 'Chocó', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(13, 'Córdoba', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(14, 'Cundinamarca', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(15, 'Guainía', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(16, 'Guaviare', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(17, 'Huila', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(18, 'La Guajira', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(19, 'Magdalena', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(20, 'Meta', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(21, 'Nariño', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(22, 'Norte de Santander', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(23, 'Putumayo', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(24, 'Quindío', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(25, 'Risaralda', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(26, 'San Andrés y Providencia', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(27, 'Santander', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(28, 'Sucre', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(29, 'Tolima', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(30, 'Valle del Cauca', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(31, 'Vaupés', '2023-08-11 08:49:53', '2023-08-11 08:49:53'),
	(32, 'Vichada', '2023-08-11 08:49:53', '2023-08-11 08:49:53');

-- Volcando estructura para tabla roles.detallepedidos
CREATE TABLE IF NOT EXISTS `detallepedidos` (
  `IdDetallePedido` int NOT NULL AUTO_INCREMENT,
  `IdPedido` int NOT NULL,
  `IdMateriaPrima` int NOT NULL,
  `IdMedida` int NOT NULL,
  `ValorUnitario` decimal(8,2) NOT NULL DEFAULT '0.00',
  `Cantidad` int NOT NULL DEFAULT '0',
  `Total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdDetallePedido`),
  KEY `fkDetallePedidoPedido` (`IdPedido`),
  KEY `fkDetallePedidoMateriaPrima` (`IdMateriaPrima`),
  KEY `fkDetallePedidoMedida` (`IdMedida`),
  CONSTRAINT `fkDetallePedidoMateriaPrima` FOREIGN KEY (`IdMateriaPrima`) REFERENCES `materiaprimas` (`IdMateriaPrima`),
  CONSTRAINT `fkDetallePedidoMedida` FOREIGN KEY (`IdMedida`) REFERENCES `medidas` (`IdMedida`),
  CONSTRAINT `fkDetallePedidoPedido` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.detallepedidos: ~0 rows (aproximadamente)
INSERT INTO `detallepedidos` (`IdDetallePedido`, `IdPedido`, `IdMateriaPrima`, `IdMedida`, `ValorUnitario`, `Cantidad`, `Total`, `created_at`, `updated_at`) VALUES
	(26, 7, 7, 8, 600.00, 3, 1800.00, '2023-10-11 23:54:32', '2023-10-11 23:54:32');

-- Volcando estructura para tabla roles.materiaprimas
CREATE TABLE IF NOT EXISTS `materiaprimas` (
  `IdMateriaPrima` int NOT NULL AUTO_INCREMENT,
  `IdTipoMateriaPrima` int NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Cantidad` int NOT NULL DEFAULT '0',
  `Descripcion` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdMateriaPrima`),
  KEY `fkTipoMateria` (`IdTipoMateriaPrima`),
  CONSTRAINT `fkTipoMateria` FOREIGN KEY (`IdTipoMateriaPrima`) REFERENCES `tipomateriaprimas` (`IdTipoMateriaPrima`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.materiaprimas: ~12 rows (aproximadamente)
INSERT INTO `materiaprimas` (`IdMateriaPrima`, `IdTipoMateriaPrima`, `Nombre`, `Cantidad`, `Descripcion`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Arena', 60, 'Se compraron 60 mts de Arena', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(2, 1, 'Gravilla', 40, 'Se compraron 40 mts de Gravilla', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(3, 1, 'Bloques', 3000, 'Se compraron 3000 bloques', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(4, 4, 'Tuberias', 50, 'Se compraron 50 tuberias', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(5, 5, 'Tejas', 100, 'Se compraron 100 tejas', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(6, 6, 'Vidrios Aislantes', 150, 'Se compraron 150 vidrios aislantes', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(7, 7, 'Madera', 30, 'Se compraron 30 palos de maderas', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(8, 6, 'Poliestireno Expandido', 50, 'Se compraron 50 cuadros de Poliestireno Expandido', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(9, 2, 'Perfiles de acero', 35, 'Se compraron 35 perfiles de acero', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(10, 2, 'Láminas de acero', 20, 'Se compraron 20 láminas de acero', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(11, 8, 'Poliuretano', 20, 'Se compraron 20 mts de poliuretano', '2023-09-03 15:15:50', '2023-09-03 15:15:50'),
	(12, 8, 'Travertino', 1000, 'Se compraron 1000 travertinos', '2023-09-03 15:15:50', '2023-09-03 15:15:50');

-- Volcando estructura para tabla roles.medidas
CREATE TABLE IF NOT EXISTS `medidas` (
  `IdMedida` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Simbolo` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdMedida`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.medidas: ~11 rows (aproximadamente)
INSERT INTO `medidas` (`IdMedida`, `Nombre`, `Simbolo`, `created_at`, `updated_at`) VALUES
	(1, 'Metros', 'mts', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(2, 'Centimetro cubico', 'cm3', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(3, 'Pie', 'ft', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(4, 'Pulgada', 'In', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(5, 'Metro cuadrado', 'm2', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(6, 'Metro cubico', 'm3', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(7, 'Kilogramo', 'kg', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(8, 'Libra', 'lb', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(9, 'Segundos', 'Seg', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(10, 'Minutos', 'Min', '2023-09-03 15:12:12', '2023-09-03 15:12:12'),
	(11, 'Unidad', 'Unidad', '2023-09-03 15:12:12', '2023-09-03 15:12:12');

-- Volcando estructura para tabla roles.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `IdPedido` int NOT NULL AUTO_INCREMENT,
  `id` bigint unsigned NOT NULL,
  `IdProveedor` int NOT NULL,
  `IdProyecto` int NOT NULL,
  `IdConcepto` int NOT NULL,
  `FechaHora` date NOT NULL,
  `Evidencia` varchar(500) DEFAULT NULL,
  `ValorTotal` decimal(11,0) NOT NULL DEFAULT '0',
  `Descripcion` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPedido`),
  KEY `fkPedidoProveedor` (`IdProveedor`),
  KEY `fkPedidoProyecto` (`IdProyecto`),
  KEY `fkPedidoConcepto` (`IdConcepto`),
  KEY `fkPedidousers` (`id`),
  CONSTRAINT `fkPedidoConcepto` FOREIGN KEY (`IdConcepto`) REFERENCES `conceptos` (`IdConcepto`),
  CONSTRAINT `fkPedidoProveedor` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedores` (`IdProveedor`),
  CONSTRAINT `fkPedidoProyecto` FOREIGN KEY (`IdProyecto`) REFERENCES `proyectos` (`IdProyecto`),
  CONSTRAINT `fkPedidousers` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.pedidos: ~5 rows (aproximadamente)
INSERT INTO `pedidos` (`IdPedido`, `id`, `IdProveedor`, `IdProyecto`, `IdConcepto`, `FechaHora`, `Evidencia`, `ValorTotal`, `Descripcion`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 10, 8, '2023-08-30', 'Certificado.pdf', 7200000, 'Compra de materiales\r\n', '2023-08-31 08:09:24', '2023-08-31 08:09:25'),
	(2, 6, 1, 1, 1, '2023-05-02', 'Certificado de Medidas Correctivas.pdf', 12500000, 'Compra de materiales para la construcción de complejo turístico en Leticia', '2023-08-31 08:16:17', '2023-08-31 08:16:17'),
	(3, 7, 5, 3, 2, '2023-06-15', 'ruta/evidencia3.pdf', 3800000, 'Compra de materiales para construcción de viviendas sociales en Medellín', '2023-08-31 08:17:25', '2023-08-31 08:17:25'),
	(4, 8, 2, 5, 5, '2023-04-08', 'ruta/evidencia4.pdf', 9800000, 'Compra de materiales para ampliación de carretera en Tunja', '2023-08-31 08:17:25', '2023-08-31 08:17:25'),
	(5, 1, 4, 4, 4, '2023-05-21', 'ruta/evidencia5.pdf', 5600000, 'Compra de materiales para proyecto Plaza Bolívar en Barranquilla', '2023-08-31 08:17:25', '2023-08-31 08:17:25'),
	(6, 1, 2, 5, 2, '2023-10-11', NULL, 6000000, 'Compra de materiales para terminacion de carretera', '2023-10-11 06:30:29', '2023-10-11 06:30:30'),
	(7, 1, 5, 5, 4, '2023-10-26', '1697050472MUNDO-DEL-TRABAJO.pdf', 30000, 'gfgffhfhfhf', '2023-10-11 23:54:32', '2023-10-11 23:54:32');

-- Volcando estructura para tabla roles.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `IdProveedor` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.proveedores: ~10 rows (aproximadamente)
INSERT INTO `proveedores` (`IdProveedor`, `Nombre`, `Direccion`, `Telefono`, `CorreoElectronico`, `created_at`, `updated_at`) VALUES
	(1, 'Proveedor A', 'Calle 1, Ciudad A', '555-1234', 'proveedora@proveedora.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(2, 'Proveedor B', 'Calle 2, Ciudad B', '555-5678', 'proveedorb@proveedorb.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(3, 'Proveedor C', 'Calle 3, Ciudad C', '555-2468', 'proveedorc@proveedorc.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(4, 'Proveedor D', 'Calle 4, Ciudad D', '555-3698', 'proveedord@proveedord.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(5, 'Proveedor E', 'Calle 5, Ciudad E', '555-6789', 'proveedore@proveedore.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(6, 'Proveedor F', 'Calle 6, Ciudad F', '555-1248', 'proveedorf@proveedorf.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(7, 'Proveedor G', 'Calle 7, Ciudad G', '555-3652', 'proveedorg@proveedorg.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(8, 'Proveedor H', 'Calle 8, Ciudad H', '555-4679', 'proveedorh@proveedorh.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(9, 'Proveedor I', 'Calle 9, Ciudad I', '555-8890', 'proveedori@proveedori.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20'),
	(10, 'Proveedor J', 'Calle 10, Ciudad J', '555-2234', 'proveedorj@proveedorj.com', '2023-08-31 08:01:20', '2023-08-31 08:01:20');

-- Volcando estructura para tabla roles.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `IdProyecto` int NOT NULL AUTO_INCREMENT,
  `IdCiudad` int NOT NULL,
  `IdDepartamento` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Imagen` varchar(500) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `AporteTotal` int NOT NULL,
  PRIMARY KEY (`IdProyecto`),
  KEY `fkProyectoCiudad` (`IdCiudad`),
  KEY `fkProyectoDepartamento` (`IdDepartamento`),
  CONSTRAINT `fkProyectoCiudad` FOREIGN KEY (`IdCiudad`) REFERENCES `ciudades` (`IdCiudad`),
  CONSTRAINT `fkProyectoDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamentos` (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.proyectos: ~26 rows (aproximadamente)
INSERT INTO `proyectos` (`IdProyecto`, `IdCiudad`, `IdDepartamento`, `Nombre`, `Direccion`, `Imagen`, `Estado`, `created_at`, `updated_at`, `AporteTotal`) VALUES
	(1, 10, 5, 'Construcción de complejo turístico en Leticia', 'Kilómetro 11 vía Tarapacá', '1692726607edificio1.png', 'En planeación', '2023-08-11 08:54:51', '2023-09-02 16:14:47', 850000000),
	(2, 5, 2, 'Proyecto Parque de las Artes', 'Carrera 26 # 15-25', 'proyectosejecutados2.png', 'En planeación', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 500000000),
	(3, 10, 5, 'Construcción de viviendas sociales en Yopal', 'Calle 23 # 19-12', 'proyectosejecutados3.png', 'En planeación', '2023-08-11 08:54:51', '2023-09-01 18:22:37', 400000000),
	(4, 2, 1, 'Construcción de edificio empresarial en Medellín', 'Carrera 43A # 16 Sur - 38', '1693858023Apto.png', 'Finalizado', '2023-08-11 08:54:51', '2023-09-05 11:07:03', 950000000),
	(5, 10, 5, 'Proyecto Ciudadela Universitaria', 'Calle 18 # 11-05', 'proyectosejecutados2.png', 'En ejecución', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 780000000),
	(6, 5, 2, 'Construcción de centro comercial en Arauca', 'Carrera 19 # 12-35', 'proyectosejecutados3.png', 'Finalizado', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 650000000),
	(7, 6, 3, 'Proyecto Altos de la Quinta', 'Calle 23 # 45-60', 'proyectosejecutados1.png', 'En ejecución', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 450000000),
	(8, 1, 1, 'Construcción de parque temático en Leticia', 'Kilómetro 12 vía Tarapacá', 'proyectosejecutados2.png', 'En planeación', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 850000000),
	(9, 4, 2, 'Construcción de un hospital', 'Carrera 23 # 56-78', 'proyectosejecutados3.png', 'En planeación', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 600000000),
	(10, 3, 2, 'Construcción de un centro deportivo', 'Carrera 12 #34-56', 'proyectosejecutados1.png', 'En ejecución', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 700000000),
	(11, 3, 2, 'Construcción de viviendas campestres en Duitama', 'Kilómetro 2 vía Paipa', 'proyectosejecutados2.png', 'Finalizado', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 800000000),
	(12, 1, 1, 'Proyciudadesecto Renacer Popayan', 'Calle 16 # 23-15', 'proyectosejecutados3.png', 'En ejecución', '2023-08-11 08:54:51', '2023-08-11 08:54:51', 955000000),
	(13, 6, 3, 'Construccion en cali', 'Kilometro 4 #25', '1692300878proyectosejecutados1.png', 'En planeación', '2023-08-18 10:34:38', '2023-08-18 10:34:38', 760000000),
	(14, 6, 3, 'Proyecto Sena', 'Kilometro 4 #25', '1692301024proyectosejecutados3.png', 'En planeacion', '2023-08-18 10:37:04', '2023-08-18 10:37:04', 720000000),
	(15, 2, 1, 'Construccion Medellin', 'Kilometro 4 #33-44', '1692812250proyectosejecutados3.png', 'finalizado', '2023-08-24 08:37:30', '2023-08-24 08:37:30', 600000000),
	(16, 10, 5, 'Proyecto casa sebastian', 'Kilometro 4 #33-44', '1693709930proyectosejecutados1.png', 'En planeación', '2023-09-03 17:53:51', '2023-09-03 18:00:17', 950000000),
	(17, 6, 3, 'Proyecto Sena Universidad', 'Kilometro 4 #33-44', '1693858093bormunth.png', 'En planeación', '2023-09-05 11:08:13', '2023-09-05 11:08:13', 1800000000),
	(18, 7, 3, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874197WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:09:57', '2023-09-28 14:09:57', 1000000000),
	(19, 7, 3, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874222WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:10:22', '2023-09-28 14:10:22', 1000000000),
	(20, 7, 3, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874258WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:10:58', '2023-09-28 14:10:58', 1000000000),
	(21, 12, 6, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874264WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:11:04', '2023-09-28 14:11:04', 1000000000),
	(22, 6, 3, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874329WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:12:09', '2023-09-28 14:12:09', 100000000),
	(23, 6, 3, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874353WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:12:33', '2023-09-28 14:12:33', 100000000),
	(24, 6, 3, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874397WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:13:17', '2023-09-28 14:13:17', 100000000),
	(25, 6, 3, 'Hacienda San Sebastian', 'Kilometro 3 #33-33', '1695874526WhatsApp Image 2023-09-27 at 12.02.02.jpeg', 'En planeación', '2023-09-28 14:15:26', '2023-09-28 14:15:26', 100000000),
	(26, 12, 6, 'Construcción en Tunja', 'Kilometro 3 #33-33', '1695874619biblioteca.png', 'En ejecución', '2023-09-28 14:16:59', '2023-09-29 03:09:14', 100000000);

-- Volcando estructura para tabla roles.tipomateriaprimas
CREATE TABLE IF NOT EXISTS `tipomateriaprimas` (
  `IdTipoMateriaPrima` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdTipoMateriaPrima`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla roles.tipomateriaprimas: ~8 rows (aproximadamente)
INSERT INTO `tipomateriaprimas` (`IdTipoMateriaPrima`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Petreo', '2023-09-03 15:15:13', '2023-09-03 15:15:13'),
	(2, 'Acabado', '2023-09-03 15:15:13', '2023-09-03 15:15:13'),
	(3, 'Estructural', '2023-09-03 15:15:13', '2023-09-03 15:15:13'),
	(4, 'Metalico', '2023-09-03 15:15:13', '2023-09-03 15:15:13'),
	(5, 'Ceramico', '2023-09-03 15:15:13', '2023-09-03 15:15:13'),
	(6, 'Aislante', '2023-09-03 15:15:13', '2023-09-03 15:15:13'),
	(7, 'Ecológico', '2023-09-03 15:15:13', '2023-09-03 15:15:13'),
	(8, 'Protección', '2023-09-03 15:15:13', '2023-09-03 15:15:13');
