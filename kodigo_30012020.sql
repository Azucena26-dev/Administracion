/*
SQLyog Ultimate v9.63 
MySQL - 5.5.5-10.4.8-MariaDB : Database - kodigo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kodigo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kodigo`;

/*Table structure for table `datospersonales_economicos` */

DROP TABLE IF EXISTS `datospersonales_economicos`;

CREATE TABLE `datospersonales_economicos` (
  `id_datospersonales_economicos` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel_academico` int(11) DEFAULT NULL,
  `ingresos_familiares` float DEFAULT NULL,
  `cantidad_personas` int(11) DEFAULT NULL,
  `carnet_alumno` int(11) DEFAULT NULL,
  `id_pre_formulario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_datospersonales_economicos`),
  KEY `id_nivel_academico` (`id_nivel_academico`),
  KEY `datos_personales_economicos_ibk_3` (`id_pre_formulario`),
  CONSTRAINT `datos_personales_economicos_ibk_3` FOREIGN KEY (`id_pre_formulario`) REFERENCES `pre_formulario` (`id_pre_formulario`),
  CONSTRAINT `datospersonales_economicos_ibfk_2` FOREIGN KEY (`id_nivel_academico`) REFERENCES `nivel_academico` (`id_nivel_academico`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `datospersonales_economicos` */

insert  into `datospersonales_economicos`(`id_datospersonales_economicos`,`id_nivel_academico`,`ingresos_familiares`,`cantidad_personas`,`carnet_alumno`,`id_pre_formulario`) values (10,3,400,3,19213,213),(11,3,450,5,19214,214),(12,3,450,5,19214,214),(24,5,1212,50,19226,226),(25,5,300,8,19228,228),(26,3,500,4,19231,231),(27,4,1000,2,20233,233),(28,5,200,1,19212,212);

/*Table structure for table `datospersonales_informativos` */

DROP TABLE IF EXISTS `datospersonales_informativos`;

CREATE TABLE `datospersonales_informativos` (
  `id_datospersonales_informativos` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `descripcion_personal` varchar(100) DEFAULT NULL,
  `razon_ingreso` varchar(200) DEFAULT NULL,
  `descripcion_kodigo` varchar(200) DEFAULT NULL,
  `asumir_costos` tinyint(4) DEFAULT NULL,
  `carnet_alumno` int(11) DEFAULT NULL,
  `posibilidad_etapa_examen` tinyint(1) DEFAULT NULL,
  `id_pre_formulario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_datospersonales_informativos`),
  KEY `id_pre_formulario` (`id_pre_formulario`),
  CONSTRAINT `datospersonales_informativos_fkb_1` FOREIGN KEY (`id_pre_formulario`) REFERENCES `pre_formulario` (`id_pre_formulario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `datospersonales_informativos` */

insert  into `datospersonales_informativos`(`id_datospersonales_informativos`,`id_usuario`,`descripcion_personal`,`razon_ingreso`,`descripcion_kodigo`,`asumir_costos`,`carnet_alumno`,`posibilidad_etapa_examen`,`id_pre_formulario`) values (10,NULL,'Creativo, líder,  amigable y ganas de superacion','Me gustaria retomar mis estudios en programacion','Una empresa dedicada a ayudar a que los jovenes sigan sus estudios',1,19213,NULL,213),(11,NULL,' Amigable, respetuoso y capaz de cumplir mis metas','Por que me gusta la programacion y quiero aprender mas ','Es una empresa que ayuda a los jovenes a saber mas de la programacion y a obtenerles un buen futuro',1,19214,NULL,214),(12,NULL,' Amigable, respetuoso y capaz de cumplir mis metas','Por que me gusta la programacion y quiero aprender mas ','Es una empresa que ayuda a los jovenes a saber mas de la programacion y a obtenerles un buen futuro',1,19214,NULL,214),(24,NULL,'                    as','asas','as',1,19226,NULL,226),(25,NULL,'     Soy una persona muy proactiva, responsable ','Por que me gusta mucho el área de la tecnología y quiero superarme','Es una academia de enseña de calidad enfocada a lo que hoy en día requiere la tecnología ',0,19228,NULL,228),(26,NULL,' Autodidacta, extrovertido y ambicioso. ','Quiero salir adelante aprendiendo de lo mejor con los mejores, dando lo mejor de mi. ','Una oportunidad para jóvenes que quieren ser diferentes y ayudar a la sociedad con sus habilidades ',1,19231,NULL,231),(27,NULL,' Soy una persona seria, educada, respetuoso','Porque me parece una gran oportunidad para la especialización en desarrollo ','Una academia especializada en el desarrollo de software ',1,20233,NULL,233);

/*Table structure for table `datospersonales_intereses` */

DROP TABLE IF EXISTS `datospersonales_intereses`;

CREATE TABLE `datospersonales_intereses` (
  `id_datospersonales_intereses` int(11) NOT NULL AUTO_INCREMENT,
  `puntaje_tecnologia` int(11) DEFAULT NULL,
  `nivel_programacion` varchar(50) DEFAULT NULL,
  `actividades` varchar(50) DEFAULT NULL,
  `computadora` tinyint(4) DEFAULT NULL,
  `internet` tinyint(4) DEFAULT NULL,
  `acceso_internet` varchar(50) DEFAULT NULL,
  `frecuencia_internet` varchar(50) DEFAULT NULL,
  `smartphone` tinyint(4) DEFAULT NULL,
  `frecuencia_computadora` varchar(50) DEFAULT NULL,
  `acceso_examen` tinyint(4) DEFAULT NULL,
  `carnet_alumno` int(8) DEFAULT NULL,
  `id_pre_formulario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_datospersonales_intereses`),
  KEY `id_pre_formulario` (`id_pre_formulario`),
  CONSTRAINT `datospersonales_intereses_ibfk_2` FOREIGN KEY (`id_pre_formulario`) REFERENCES `pre_formulario` (`id_pre_formulario`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `datospersonales_intereses` */

insert  into `datospersonales_intereses`(`id_datospersonales_intereses`,`puntaje_tecnologia`,`nivel_programacion`,`actividades`,`computadora`,`internet`,`acceso_internet`,`frecuencia_internet`,`smartphone`,`frecuencia_computadora`,`acceso_examen`,`carnet_alumno`,`id_pre_formulario`) values (10,2,'nuevoo','jugar',0,0,'no tengo','nunca',0,'nunca',1,19213,213),(11,5,'basico','Programación/Desarrollo web',1,0,'Con el wifi de un familiar/amigo','Todos los días',1,'Unas veces a la semana',1,19214,214),(12,5,'basico','Programación/Desarrollo web',1,0,'Con el wifi de un familiar/amigo','Todos los días',1,'Unas veces a la semana',1,19214,214),(24,3,'intermedio','animaciones',1,0,'Con el wifi de un familiar/amigo','Unas veces al mes',1,'Todos los días',1,19226,226),(25,5,'basico','Programación/Desarrollo web',0,0,'Uso de datos móviles','Todos los días',0,'Casi nunca',0,19228,228),(26,5,'basico','Programación/Desarrollo web',1,0,'Con el wifi de mi casa','Todos los días',1,'Todos los días',1,19231,231),(27,5,'Nunca he programado','videojuegos',1,0,'Con el wifi de mi casa','Todos los días',1,'Todos los días',1,20233,233);

/*Table structure for table `datospersonales_profesionales` */

DROP TABLE IF EXISTS `datospersonales_profesionales`;

CREATE TABLE `datospersonales_profesionales` (
  `id_datospersonales_profesionales` int(11) NOT NULL AUTO_INCREMENT,
  `trabajo_previo` varchar(100) DEFAULT NULL,
  `tipo_trabajo` varchar(50) DEFAULT NULL,
  `puesto_trabajo` varchar(100) DEFAULT NULL,
  `trabajo_formal` tinyint(4) DEFAULT NULL,
  `sueldo_mensual` float DEFAULT NULL,
  `horario` varchar(50) DEFAULT NULL,
  `recursos_pagar` varchar(100) DEFAULT NULL,
  `carnet_alumno` int(8) DEFAULT NULL,
  `id_pre_formulario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_datospersonales_profesionales`),
  KEY `id_pre_formulario` (`id_pre_formulario`),
  CONSTRAINT `datospersonales_profesionales_ibfk_2` FOREIGN KEY (`id_pre_formulario`) REFERENCES `pre_formulario` (`id_pre_formulario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `datospersonales_profesionales` */

insert  into `datospersonales_profesionales`(`id_datospersonales_profesionales`,`trabajo_previo`,`tipo_trabajo`,`puesto_trabajo`,`trabajo_formal`,`sueldo_mensual`,`horario`,`recursos_pagar`,`carnet_alumno`,`id_pre_formulario`) values (10,'no tuve','independiante','asesor',1,222,'tiempo completo','Mi familia me podría brindar apoyo económico',19213,213),(11,'No, nunca he trabajado',NULL,NULL,NULL,NULL,NULL,NULL,19214,214),(12,'No, nunca he trabajado',NULL,NULL,NULL,NULL,NULL,NULL,19214,214),(24,'Sí trabajé antes y no estoy trabajando actualmente','En una empresa','gvjnm',1,40000,'Por horas','nopodria',19226,226),(25,'Sí, estoy trabajando','En una empresa','aaddddd',0,444,'Tiempo Completo','Mi familia me podría brindar apoyo económico',19228,228),(26,NULL,NULL,NULL,1,NULL,NULL,'ahorrospersonales',19231,231),(27,'No, nunca he trabajado',NULL,NULL,NULL,NULL,NULL,NULL,20233,233);

/*Table structure for table `datospersonales_usuario` */

DROP TABLE IF EXISTS `datospersonales_usuario`;

CREATE TABLE `datospersonales_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamento` int(11) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT 1,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `id_pre_formulario` int(11) DEFAULT NULL,
  `id_nivel_academico` int(11) DEFAULT NULL,
  `Generaciones_idGeneraciones` int(11) DEFAULT NULL,
  `carnet_alumno` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_nacimiento` date DEFAULT NULL,
  `numero_documento` varchar(15) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `hijos` tinyint(4) DEFAULT NULL,
  `estudiante_activo` tinyint(4) DEFAULT NULL,
  `carrera_estudiada` varchar(100) DEFAULT NULL,
  `centro_estudio` varchar(100) DEFAULT NULL,
  `descripcion_rechazo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_estado` (`id_estado`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_nivel_academico` (`id_nivel_academico`),
  KEY `id_pre_formulario` (`id_pre_formulario`),
  KEY `fk_datospersonales_usuario_Generaciones1_idx` (`Generaciones_idGeneraciones`),
  CONSTRAINT `datospersonales_usuario_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estados_usuarios` (`id_estado`) ON DELETE NO ACTION,
  CONSTRAINT `datospersonales_usuario_ibfk_3` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `datospersonales_usuario_ibfk_4` FOREIGN KEY (`id_nivel_academico`) REFERENCES `nivel_academico` (`id_nivel_academico`),
  CONSTRAINT `datospersonales_usuario_ibfk_5` FOREIGN KEY (`id_pre_formulario`) REFERENCES `pre_formulario` (`id_pre_formulario`),
  CONSTRAINT `fk_datospersonales_usuario_Generaciones1` FOREIGN KEY (`Generaciones_idGeneraciones`) REFERENCES `generaciones` (`idGeneraciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `datospersonales_usuario` */

insert  into `datospersonales_usuario`(`id_usuario`,`id_departamento`,`id_municipio`,`id_estado`,`id_tipo_documento`,`id_pre_formulario`,`id_nivel_academico`,`Generaciones_idGeneraciones`,`carnet_alumno`,`fecha_registro`,`fecha_nacimiento`,`numero_documento`,`genero`,`direccion`,`facebook`,`hijos`,`estudiante_activo`,`carrera_estudiada`,`centro_estudio`,`descripcion_rechazo`) values (11,4,131,6,2,213,3,3,19213,'2020-01-30 09:29:25','2001-03-31','3333-33333','Masculino','Cantón santa lucia 3° zona','https://www.facebook.com/david.osorio.31105',0,1,'Desarrollo de software ','aaqaaqa',NULL),(13,4,131,1,1,214,3,1,19214,'2020-01-30 09:14:39','2001-01-29','06171471-9','Masculino','Lotif las Margaritas pol 3 casa #4 cton Santa Lucia','Jaime carcamo jr',0,1,'Desarrollo de software','',NULL),(22,2,14,1,1,226,5,1,19226,'2020-01-30 09:14:41','1995-11-26','12121212-1','Femenino','asas','josefy hola',0,1,'tecnooooooooooo','ajaaaaaaaa',NULL),(23,6,208,2,1,228,5,3,19228,'2020-01-30 09:28:47','1995-11-26','05624417-3','Masculino','asas','holaaa',0,0,'carrera','aaaquiii',NULL),(24,6,208,4,1,231,3,1,19231,'2020-01-30 09:26:44','1997-11-25','05624417-3','Masculino','Calle El progreso, frente avenida Montreal casa 2, mejicanos, San Salvador ','ffffffffffff',0,1,'Ingeniería en sistemas ',NULL,NULL),(25,4,138,2,1,233,4,3,20233,'2020-01-30 09:28:46','1999-05-23','05881622-7','Masculino','13 Calle Oriente polígono 33 casa 11 colonia Santa Mónica Santa tecla ','https://m.facebook.com/carlos.vegaon',0,1,'Ingenieria en ciencias de la computación ','aaaa',NULL);

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `departamento` */

insert  into `departamento`(`id_departamento`,`departamento`) values (1,'Ahuachapán'),(2,'Santa Ana'),(3,'Sonsonate'),(4,'La Libertad'),(5,'Chalatenango'),(6,'San Salvador'),(7,'Cuscatlán'),(8,'La Paz'),(9,'Cabañas'),(10,'San Vicente'),(11,'Usulután'),(12,'Morazán'),(13,'San Miguel'),(14,'La Unión');

/*Table structure for table `estados_usuarios` */

DROP TABLE IF EXISTS `estados_usuarios`;

CREATE TABLE `estados_usuarios` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `estados_usuarios` */

insert  into `estados_usuarios`(`id_estado`,`nombre_estado`) values (1,'Aspirante'),(2,'Examen'),(3,'Prebasico'),(4,'Alumno'),(5,'Rechazado'),(6,'Desertado'),(8,'Reprobado');

/*Table structure for table `estados_usuarios_parametros` */

DROP TABLE IF EXISTS `estados_usuarios_parametros`;

CREATE TABLE `estados_usuarios_parametros` (
  `id_estado_parametro` int(11) NOT NULL AUTO_INCREMENT,
  `carnet_alumno` varchar(11) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `idparametros` int(11) NOT NULL,
  `fecha_cambio_estado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_estado_parametro`),
  KEY `fk_estados_usuarios_has_parametros_estados_usuarios1_idx` (`fecha_cambio_estado`),
  KEY `fk_estados_usuarios_has_parametros_estados_usuarios1_idx1` (`id_estado`),
  KEY `fk_estados_usuarios_has_parametros_parametros1_idx` (`idparametros`),
  CONSTRAINT `fk_estados_usuarios_has_parametros_parametros1` FOREIGN KEY (`idparametros`) REFERENCES `parametros` (`idparametros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estados_usuarios_parametros` FOREIGN KEY (`id_estado`) REFERENCES `estados_usuarios` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `estados_usuarios_parametros` */

insert  into `estados_usuarios_parametros`(`id_estado_parametro`,`carnet_alumno`,`id_estado`,`idparametros`,`fecha_cambio_estado`,`descripcion`) values (6,'19213',2,3,'2020-01-30 09:29:26','guardando un nuevo');

/*Table structure for table `generaciones` */

DROP TABLE IF EXISTS `generaciones`;

CREATE TABLE `generaciones` (
  `idGeneraciones` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_inicio_generacion` date NOT NULL,
  `fecha_fin_generacion` date NOT NULL,
  PRIMARY KEY (`idGeneraciones`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `generaciones` */

insert  into `generaciones`(`idGeneraciones`,`nombre`,`descripcion`,`fecha_inicio_generacion`,`fecha_fin_generacion`) values (1,'BC01','Primera Generación Bootcamp','2020-01-16','2020-02-09'),(2,'nueva','aquiii','2020-01-22','2020-01-23'),(3,'BC02','Inicio enero 2020','2020-03-16','2020-03-17');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_padre` int(11) DEFAULT NULL,
  `menu` varchar(100) NOT NULL,
  `ruta` varchar(50) NOT NULL,
  `icono` varchar(25) NOT NULL,
  `especial` int(11) DEFAULT 0,
  `clase` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `FK_REFERENCE_7` (`id_menu_padre`),
  CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`id_menu_padre`) REFERENCES `menus` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

/*Data for the table `menus` */

insert  into `menus`(`id_menu`,`id_menu_padre`,`menu`,`ruta`,`icono`,`especial`,`clase`) values (17,NULL,'Gestionar Inscripcion de Aspirantes','index/dashboard','school',0,'nav-link nav-toggle'),(59,NULL,'Gestionar Usuarios','index/dashboard','portrait',0,'nav-link nav-toggle'),(60,59,'Crear Usuarios','usuarios/crear','',0,NULL),(61,59,'Actualizar Usuarios','usuarios/actualizar','',0,NULL),(62,59,'Consultar Usuarios','usuarios/consultar','',0,NULL),(82,17,'Aceptar o Rechazar candidatos','postulacion/consultacandidatos','',0,NULL),(92,17,'Aprobar o Reprobar candidatos','perfil/consultarEstados','',0,NULL),(93,17,'Actualizar información aspirantes','postulacion/actualizaraceptado','',0,NULL);

/*Table structure for table `municipios` */

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(70) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `FK_REFERENCE_36` (`id_departamento`),
  CONSTRAINT `FK_REFERENCE_36` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;

/*Data for the table `municipios` */

insert  into `municipios`(`id_municipio`,`municipio`,`id_departamento`) values (1,'Ahuachapán',1),(2,'Jujutla',1),(3,'Atiquizaya',1),(4,'Concepción de Ataco',1),(5,'El Refugio',1),(6,'Guaymango',1),(7,'Apaneca',1),(8,'San Francisco Menéndez',1),(9,'San Lorenzo',1),(10,'San Pedro Puxtla',1),(11,'Tacuba',1),(12,'Turín',1),(13,'Candelaria de la Frontera',2),(14,'Chalchuapa',2),(15,'Coatepeque',2),(16,'El Congo',2),(17,'El Porvenir',2),(18,'Masahuat',2),(19,'Metapán',2),(20,'San Antonio Pajonal',2),(21,'San Sebastián Salitrillo',2),(22,'Santa Ana',2),(23,'Santa Rosa Guachipilín',2),(24,'Santiago de la Frontera',2),(25,'Texistepeque',2),(26,'Acajutla',3),(27,'Armenia',3),(28,'Caluco',3),(29,'Cuisnahuat',3),(30,'Izalco',3),(31,'Juayúa',3),(32,'Nahuizalco',3),(33,'Nahulingo',3),(34,'Salcoatitán',3),(35,'San Antonio del Monte',3),(36,'San Julián',3),(37,'Santa Catarina Masahuat',3),(38,'Santa Isabel Ishuatán',3),(39,'Santo Domingo de Guzmán',3),(40,'Sonsonate',3),(41,'Sonzacate',3),(42,'Alegría',11),(43,'Berlín',11),(44,'California',11),(45,'Concepción Batres',11),(46,'El Triunfo',11),(47,'Ereguayquín',11),(48,'Estanzuelas',11),(49,'Jiquilisco',11),(50,'Jucuapa',11),(51,'Jucuarán',11),(52,'Mercedes Umaña',11),(53,'Nueva Granada',11),(54,'Ozatlán',11),(55,'Puerto El Triunfo',11),(56,'San Agustín',11),(57,'San Buenaventura',11),(58,'San Dionisio',11),(59,'San Francisco Javier',11),(60,'Santa Elena',11),(61,'Santa María',11),(62,'Santiago de María',11),(63,'Tecapán',11),(64,'Usulután',11),(65,'Carolina',13),(66,'Chapeltique',13),(67,'Chinameca',13),(68,'Chirilagua',13),(69,'Ciudad Barrios',13),(70,'Comacarán',13),(71,'El Tránsito',13),(72,'Lolotique',13),(73,'Moncagua',13),(74,'Nueva Guadalupe',13),(75,'Nuevo Edén de San Juan',13),(76,'Quelepa',13),(77,'San Antonio del Mosco',13),(78,'San Gerardo',13),(79,'San Jorge',13),(80,'San Luis de la Reina',13),(81,'San Miguel',13),(82,'San Rafael Oriente',13),(83,'Sesori',13),(84,'Uluazapa',13),(85,'Arambala',12),(86,'Cacaopera',12),(87,'Chilanga',12),(88,'Corinto',12),(89,'Delicias de Concepción',12),(90,'El Divisadero',12),(91,'El Rosario (Morazán)',12),(92,'Gualococti',12),(93,'Guatajiagua',12),(94,'Joateca',12),(95,'Jocoaitique',12),(96,'Jocoro',12),(97,'Lolotiquillo',12),(98,'Meanguera',12),(99,'Osicala',12),(100,'Perquín',12),(101,'San Carlos',12),(102,'San Fernando (Morazán)',12),(103,'San Francisco Gotera',12),(104,'San Isidro (Morazán)',12),(105,'San Simón',12),(106,'Sensembra',12),(107,'Sociedad',12),(108,'Torola',12),(109,'Yamabal',12),(110,'Yoloaiquín',12),(111,'La Unión',14),(112,'San Alejo',14),(113,'Yucuaiquín',14),(114,'Conchagua',14),(115,'Intipucá',14),(116,'San José',14),(117,'El Carmen (La Unión)',14),(118,'Yayantique',14),(119,'Bolívar',14),(120,'Meanguera del Golfo',14),(121,'Santa Rosa de Lima',14),(122,'Pasaquina',14),(123,'Anamoros',14),(124,'Nueva Esparta',14),(125,'El Sauce',14),(126,'Concepción de Oriente',14),(127,'Polorós',14),(128,'Lislique',14),(129,'Antiguo Cuscatlán',4),(130,'Chiltiupán',4),(131,'Ciudad Arce',4),(132,'Colón',4),(133,'Comasagua',4),(134,'Huizúcar',4),(135,'Jayaque',4),(136,'Jicalapa',4),(137,'La Libertad',4),(138,'Santa Tecla',4),(139,'Nuevo Cuscatlán',4),(140,'San Juan Opico',4),(141,'Quezaltepeque',4),(142,'Sacacoyo',4),(143,'San José Villanueva',4),(144,'San Matías',4),(145,'San Pablo Tacachico',4),(146,'Talnique',4),(147,'Tamanique',4),(148,'Teotepeque',4),(149,'Tepecoyo',4),(150,'Zaragoza',4),(151,'Agua Caliente',5),(152,'Arcatao',5),(153,'Azacualpa',5),(154,'Cancasque',5),(155,'Chalatenango',5),(156,'Citalá',5),(157,'Comapala',5),(158,'Concepción Quezaltepeque',5),(159,'Dulce Nombre de María',5),(160,'El Carrizal',5),(161,'El Paraíso',5),(162,'La Laguna',5),(163,'La Palma',5),(164,'La Reina',5),(165,'Las Vueltas',5),(166,'Nueva Concepción',5),(167,'Nueva Trinidad',5),(168,'Nombre de Jesús',5),(169,'Ojos de Agua',5),(170,'Potonico',5),(171,'San Antonio de la Cruz',5),(172,'San Antonio Los Ranchos',5),(173,'San Fernando (Chalatenango)',5),(174,'San Francisco Lempa',5),(175,'San Francisco Morazán',5),(176,'San Ignacio',5),(177,'San Isidro Labrador',5),(178,'Las Flores',5),(179,'San Luis del Carmen',5),(180,'San Miguel de Mercedes',5),(181,'San Rafael',5),(182,'Santa Rita',5),(183,'Tejutla',5),(184,'Cojutepeque',7),(185,'Candelaria',7),(186,'El Carmen (Cuscatlán)',7),(187,'El Rosario (Cuscatlán)',7),(188,'Monte San Juan',7),(189,'Oratorio de Concepción',7),(190,'San Bartolomé Perulapía',7),(191,'San Cristóbal',7),(192,'San José Guayabal',7),(193,'San Pedro Perulapán',7),(194,'San Rafael Cedros',7),(195,'San Ramón',7),(196,'Santa Cruz Analquito',7),(197,'Santa Cruz Michapa',7),(198,'Suchitoto',7),(199,'Tenancingo',7),(200,'Aguilares',6),(201,'Apopa',6),(202,'Ayutuxtepeque',6),(203,'Cuscatancingo',6),(204,'Ciudad Delgado',6),(205,'El Paisnal',6),(206,'Guazapa',6),(207,'Ilopango',6),(208,'Mejicanos',6),(209,'Nejapa',6),(210,'Panchimalco',6),(211,'Rosario de Mora',6),(212,'San Marcos',6),(213,'San Martín',6),(214,'San Salvador',6),(215,'Santiago Texacuangos',6),(216,'Santo Tomás',6),(217,'Soyapango',6),(218,'Tonacatepeque',6),(219,'Zacatecoluca',8),(220,'Cuyultitán',8),(221,'El Rosario (La Paz)',8),(222,'Jerusalén',8),(223,'Mercedes La Ceiba',8),(224,'Olocuilta',8),(225,'Paraíso de Osorio',8),(226,'San Antonio Masahuat',8),(227,'San Emigdio',8),(228,'San Francisco Chinameca',8),(229,'San Pedro Masahuat',8),(230,'San Juan Nonualco',8),(231,'San Juan Talpa',8),(232,'San Juan Tepezontes',8),(233,'San Luis La Herradura',8),(234,'San Luis Talpa',8),(235,'San Miguel Tepezontes',8),(236,'San Pedro Nonualco',8),(237,'San Rafael Obrajuelo',8),(238,'Santa María Ostuma',8),(239,'Santiago Nonualco',8),(240,'Tapalhuaca',8),(241,'Cinquera',9),(242,'Dolores',9),(243,'Guacotecti',9),(244,'Ilobasco',9),(245,'Jutiapa',9),(246,'San Isidro (Cabañas)',9),(247,'Sensuntepeque',9),(248,'Tejutepeque',9),(249,'Victoria',9),(250,'Apastepeque',10),(251,'Guadalupe',10),(252,'San Cayetano Istepeque',10),(253,'San Esteban Catarina',10),(254,'San Ildefonso',10),(255,'San Lorenzo',10),(256,'San Sebastián',10),(257,'San Vicente',10),(258,'Santa Clara',10),(259,'Santo Domingo',10),(260,'Tecoluca',10),(261,'Tepetitán',10),(262,'Verapaz',10);

/*Table structure for table `nivel_academico` */

DROP TABLE IF EXISTS `nivel_academico`;

CREATE TABLE `nivel_academico` (
  `id_nivel_academico` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_nivel_academico` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_nivel_academico`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `nivel_academico` */

insert  into `nivel_academico`(`id_nivel_academico`,`tipo_nivel_academico`) values (1,'Primaria'),(2,'Secundaria'),(3,'Bachillerato'),(4,'Superior universitario Incompleto'),(5,'Superior universitario Egresado'),(6,'Superior universitario Completo'),(7,'Maestria/Posgrado'),(8,'Ninguno');

/*Table structure for table `parametros` */

DROP TABLE IF EXISTS `parametros`;

CREATE TABLE `parametros` (
  `idparametros` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_parametro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idparametros`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `parametros` */

insert  into `parametros`(`idparametros`,`titulo_parametro`) values (1,'Aprobado'),(2,'Reprobado'),(3,'Desertado');

/*Table structure for table `pre_formulario` */

DROP TABLE IF EXISTS `pre_formulario`;

CREATE TABLE `pre_formulario` (
  `id_pre_formulario` int(11) NOT NULL AUTO_INCREMENT,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `primer_nombre` varchar(100) DEFAULT NULL,
  `segundo_nombre` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) DEFAULT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `otro_nombre` varchar(100) DEFAULT NULL,
  `carnet_alumno` varchar(8) DEFAULT NULL,
  `forma_conocer_kodigo` varchar(100) DEFAULT NULL,
  `dias_clase` varchar(100) DEFAULT NULL,
  `postulacion` tinyint(1) DEFAULT NULL,
  `etapas_kodigo` varchar(100) DEFAULT NULL,
  `modalidad_kodigo` varchar(100) DEFAULT NULL,
  `duracion_bootcamp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pre_formulario`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pre_formulario` */

insert  into `pre_formulario`(`id_pre_formulario`,`correo_electronico`,`celular`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`otro_nombre`,`carnet_alumno`,`forma_conocer_kodigo`,`dias_clase`,`postulacion`,`etapas_kodigo`,`modalidad_kodigo`,`duracion_bootcamp`) values (212,'da6162040@gmail.com','7691-6900','David','Orlando','Aguilar','Osorio','','19212','Referencia de otra persona','3 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(213,'da6162040@gmail.com','7691-6900','David','Orlando','Aguilar ','Osorio','','19213','Referencia de otra persona','3 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(214,'jaimecarcamo120@gmail.com','7968-1523','Jaime','Ernesto','Cárcamo','Polanco','','19214','Referencia de otra persona','3 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(226,'jgarcia@sss.com','1212-1212','Josefy','del Carmen','Garcia','Gonzalez','','19226','Periódico','4 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(227,'a@h.com','4444-4444','a','a','a','','','19227','Google','3 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(228,'aristydezz.97@gmail.com','7681-6774','Aristides ','Leonel','Muñoz ','Campos','','19228','Redes Sociales','Disponibilidad Completa',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(229,'mendoza2003_66@hotmail.com','7396-2080','Carlos','Manuel','Ruiz','Mendoza','','19229','Redes Sociales','4 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(230,'joshuaespinoza77@gmail.com','7493-1810','Joshua ','Dagoberto ','Espinoza ','Aviles ','','19230','Redes Sociales','Disponibilidad Completa',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(231,'sergio.mazariego@hotmail.com','7751-2021','Sergio ','Javier ','Mazariego ','Guevara ','','19231','Periódico','Disponibilidad Completa',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(232,'joshuaespinoza77@gmail.com','7493-1810','Joshua ','Dagoberto ','Espinoza ','Aviles ','','19232','Redes Sociales','3 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(233,'cevegag199@gmail.com','6198-1448','Carlos ','Enrique ','Vega','Gonzalez','','20233','Redes Sociales','Disponibilidad Completa',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses'),(234,'rr@gg.com','4444-4444','aa','a','r','','','20234','Periódico','3 dias',1,'Registro-Examen-Curso básico-Entrevista','Hybrida (Online y Presencial)','18 meses');

/*Table structure for table `privilegios` */

DROP TABLE IF EXISTS `privilegios`;

CREATE TABLE `privilegios` (
  `id_rol` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_menu`),
  KEY `FK_REFERENCE_6` (`id_menu`),
  CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `privilegios` */

insert  into `privilegios`(`id_rol`,`id_menu`,`activo`) values (3,17,1),(3,59,1),(3,60,1),(3,61,1),(3,62,1),(3,82,1),(3,92,1),(3,93,1);

/*Table structure for table `privilegios_especiales` */

DROP TABLE IF EXISTS `privilegios_especiales`;

CREATE TABLE `privilegios_especiales` (
  `id_privilegios_especiales` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `activo` int(11) NOT NULL,
  PRIMARY KEY (`id_privilegios_especiales`),
  KEY `fk_id_menu` (`id_menu`),
  KEY `fk_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `privilegios_especiales` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id_rol`,`rol`) values (3,'Analista Administrativo');

/*Table structure for table `tipo_documento` */

DROP TABLE IF EXISTS `tipo_documento`;

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_documento` */

insert  into `tipo_documento`(`id_tipo_documento`,`nombre`) values (1,'DUI'),(2,'NIT'),(3,'PASAPORTE');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasenia` varchar(70) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `correo` varchar(256) DEFAULT NULL,
  `intento_inicio` int(11) NOT NULL,
  `imagen_perfil` varchar(250) DEFAULT NULL,
  `codigo_recuperacion` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_REFERENCE_4` (`id_rol`),
  CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`id_rol`,`usuario`,`contrasenia`,`activo`,`correo`,`intento_inicio`,`imagen_perfil`,`codigo_recuperacion`,`nombre`,`apellido`) values (7,3,'azucena','$2y$10$ZhMU/xe8N6kLapWdy6rb8ubVrXt/nfk.vweAevHEzPJQSSJDshk8i',1,'azucena.fernandez@kodigo.org',0,'img/perfil_academico/docenteParv172019-01-20.JPG',88829,'Azucena','Fernandez'),(127,3,'joss','$2y$10$FuQ57XjdpJ5l1Z6GbbG09.Us88BGo5KHoBKf5ef2Bwpm3SJy8z672',1,'joss@kodigo.com',0,NULL,78728,'josselyn','no me lo puedo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
