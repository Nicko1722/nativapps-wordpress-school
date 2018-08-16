CREATE TABLE IF NOT EXISTS `wp_nativapps_estudiante` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  identificacion varchar(10) CHARACTER SET utf8 NOT NULL,
  nombres varchar(60) CHARACTER SET utf8 NOT NULL,
  apellidos varchar(60) CHARACTER SET utf8 NOT NULL,
  genero varchar(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `wp_nativapps_docente` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  identificacion varchar(10) CHARACTER SET utf8 NOT NULL,
  nombres varchar(60) CHARACTER SET utf8 NOT NULL,
  apellidos varchar(60) CHARACTER SET utf8 NOT NULL,
  genero varchar(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `wp_nativapps_curso` (
  id MEDIUMINT NOT NULL AUTO_INCREMENT,
  codigo varchar(60) CHARACTER SET utf8 NOT NULL,
  nombre varchar(60) CHARACTER SET utf8 NOT NULL,
  observaciones varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

