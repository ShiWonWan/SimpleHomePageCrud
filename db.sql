CREATE DATABASE IF NOT EXISTS `home`;
USE `home`;

CREATE TABLE IF NOT EXISTS`marcadores` (
  `id_marcadores` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion_url` text NOT NULL,
  PRIMARY KEY (`id_marcadores`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

