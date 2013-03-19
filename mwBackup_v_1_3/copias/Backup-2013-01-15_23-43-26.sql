# ===================================================================
#  mwBackup ver.1.3
#  Copias de seguridad
#  
#  Generado el 15-01-2013 a las 11:01:26 PM por el usuario `pastele1_trium1` 
#  Servidor: pasteleria.dyndns.biz 
#  MySQL Version: 5.1.63 
#  PHP Version: 5.3.17 
#  Base de datos: `pastele1_panaderia` 
#  
# -------------------------------------------------------------------
# TABLAS:
#  20
# - admin - 2
# - albaran - 0
# - cliente - 7
# - domicilio - 8
# - factura - 0
# - facturasimple - 0
# - gastos_varios - 0
# - impuesto - 2
# - listaprecio - 734
# - mes - 0
# - numfact - 0
# - producto - 103
# - proveedor - 1
# - renglon_albaran - 0
# - renglon_compras - 0
# - renglon_factura - 0
# - renglon_facturasimple - 0
# - telefono_cliente - 7
# - telefono_proveedor - 1
# - trimestre - 4
# -------------------------------------------------------------------
#
#
#
#
#  Vaciado de tabla `admin` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `admin`;
#
#
#  Estructura de la tabla `admin` 
# ------------------------------------- 
#
#
CREATE TABLE `admin` (
  `idadmin` bigint(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `admin` 
# ------------------------------------- 
#
#
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', 'administrador');
INSERT INTO `admin` VALUES ('2', 'empleado', 'empleado', 'usuario');
#
#
#
#
#  Vaciado de tabla `albaran` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `albaran`;
#
#
#  Estructura de la tabla `albaran` 
# ------------------------------------- 
#
#
CREATE TABLE `albaran` (
  `idalbaran` bigint(10) NOT NULL AUTO_INCREMENT,
  `idcliente` bigint(10) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `anulada` int(11) DEFAULT NULL,
  `numeroalb` bigint(20) NOT NULL,
  PRIMARY KEY (`idalbaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `albaran` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `cliente` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `cliente`;
#
#
#  Estructura de la tabla `cliente` 
# ------------------------------------- 
#
#
CREATE TABLE `cliente` (
  `idcliente` bigint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `cuit` varchar(50) NOT NULL DEFAULT '',
  `dni` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `iddomicilio` bigint(10) NOT NULL,
  `2apellido` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `cliente` 
# ------------------------------------- 
#
#
INSERT INTO `cliente` VALUES ('1', 'TORRE MARCELO. ', 'SANCHEZ', 'B-04136602', 'B-04136602', '', '1', 'GARCIA');
INSERT INTO `cliente` VALUES ('6', 'JUAN&nbsp;JOSE', 'MAZA', '27491620 L', '27491620 L', '', '6', 'ZAMBRANA');
INSERT INTO `cliente` VALUES ('2', 'MANUEL&nbsp;JESUS&nbsp;', 'SANCHEZ', '75242966F', '75242966F', '', '2', 'GARCIA');
INSERT INTO `cliente` VALUES ('3', 'SOLYMAR&nbsp;S.A', '', 'J-04454260', 'J-04454260', '', '3', '');
INSERT INTO `cliente` VALUES ('4', 'DOLORES&nbsp;', 'DE LA ROSA', '27513402-C', '27513402-C', '', '4', 'BELMONTE');
INSERT INTO `cliente` VALUES ('5', 'LIDIA', 'GARCIA', '75717395-S', '75717395-S', '', '5', 'CERDAN');
INSERT INTO `cliente` VALUES ('7', 'CAMPING', '', 'CAMPING', '', '', '7', '');
#
#
#
#
#  Vaciado de tabla `domicilio` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `domicilio`;
#
#
#  Estructura de la tabla `domicilio` 
# ------------------------------------- 
#
#
CREATE TABLE `domicilio` (
  `iddomicilio` bigint(10) NOT NULL AUTO_INCREMENT,
  `calle` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  PRIMARY KEY (`iddomicilio`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `domicilio` 
# ------------------------------------- 
#
#
INSERT INTO `domicilio` VALUES ('1', 'TORRE&nbsp;MARCELO', '4', 'CABO&nbsp;DE&nbsp;GATA');
INSERT INTO `domicilio` VALUES ('2', 'CAMINO&nbsp;DE&nbsp;LA&nbsp;BOTICA', '11', 'RETAMAR');
INSERT INTO `domicilio` VALUES ('3', 'CARRETERA&nbsp;SAN&nbsp;JOSE', 'S/N', 'RUESCA');
INSERT INTO `domicilio` VALUES ('4', 'CUARTEL', '23', 'CABO&nbsp;DE&nbsp;GATA');
INSERT INTO `domicilio` VALUES ('5', 'FLORIDA', '18', 'CABO&nbsp;DE&nbsp;GATA');
INSERT INTO `domicilio` VALUES ('6', 'CARRETERA&nbsp;CABO&nbsp;DE&nbsp;GATA', 'SIN NUMERO', 'CABO&nbsp;DE&nbsp;GATA');
INSERT INTO `domicilio` VALUES ('7', 'CABO&nbsp;DE&nbsp;GATA', 'SIN NUMERO', 'CABO&nbsp;DE&nbsp;GATA');
INSERT INTO `domicilio` VALUES ('8', 'POLIGONO&nbsp;INDUSTRIALSAPRELORCA', '16', 'LORCA');
#
#
#
#
#  Vaciado de tabla `factura` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `factura`;
#
#
#  Estructura de la tabla `factura` 
# ------------------------------------- 
#
#
CREATE TABLE `factura` (
  `idfactura` bigint(10) NOT NULL AUTO_INCREMENT,
  `idcliente` bigint(10) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `numerofactura` bigint(20) DEFAULT NULL,
  `anulada` bigint(2) NOT NULL,
  `totaliva` float DEFAULT NULL,
  `totalneto` float DEFAULT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `factura` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `facturasimple` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `facturasimple`;
#
#
#  Estructura de la tabla `facturasimple` 
# ------------------------------------- 
#
#
CREATE TABLE `facturasimple` (
  `idfacturasimple` bigint(20) NOT NULL AUTO_INCREMENT,
  `numerofacturasimple` bigint(20) NOT NULL,
  `idcliente` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `totalneto` float NOT NULL,
  `totaliva` float NOT NULL,
  `total` float NOT NULL,
  `anulada` int(11) NOT NULL,
  PRIMARY KEY (`idfacturasimple`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `facturasimple` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `gastos_varios` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `gastos_varios`;
#
#
#  Estructura de la tabla `gastos_varios` 
# ------------------------------------- 
#
#
CREATE TABLE `gastos_varios` (
  `idgastos` bigint(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL,
  `iva` float NOT NULL,
  PRIMARY KEY (`idgastos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `gastos_varios` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `impuesto` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `impuesto`;
#
#
#  Estructura de la tabla `impuesto` 
# ------------------------------------- 
#
#
CREATE TABLE `impuesto` (
  `idiva` int(11) NOT NULL AUTO_INCREMENT,
  `iva` float DEFAULT NULL,
  PRIMARY KEY (`idiva`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `impuesto` 
# ------------------------------------- 
#
#
INSERT INTO `impuesto` VALUES ('1', '10');
INSERT INTO `impuesto` VALUES ('2', '4');
#
#
#
#
#  Vaciado de tabla `listaprecio` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `listaprecio`;
#
#
#  Estructura de la tabla `listaprecio` 
# ------------------------------------- 
#
#
CREATE TABLE `listaprecio` (
  `idprecio` bigint(10) NOT NULL AUTO_INCREMENT,
  `idcliente` bigint(10) NOT NULL,
  `idproducto` bigint(10) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`idprecio`)
) ENGINE=MyISAM AUTO_INCREMENT=735 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `listaprecio` 
# ------------------------------------- 
#
#
INSERT INTO `listaprecio` VALUES ('1', '1', '1', '0.5');
INSERT INTO `listaprecio` VALUES ('2', '1', '2', '0.26');
INSERT INTO `listaprecio` VALUES ('3', '1', '3', '0.18');
INSERT INTO `listaprecio` VALUES ('4', '1', '4', '0.64');
INSERT INTO `listaprecio` VALUES ('5', '1', '5', '0.4');
INSERT INTO `listaprecio` VALUES ('6', '1', '6', '1.25');
INSERT INTO `listaprecio` VALUES ('7', '1', '7', '0.64');
INSERT INTO `listaprecio` VALUES ('8', '1', '8', '0.64');
INSERT INTO `listaprecio` VALUES ('9', '1', '9', '0.64');
INSERT INTO `listaprecio` VALUES ('10', '1', '10', '0');
INSERT INTO `listaprecio` VALUES ('11', '1', '11', '0.4');
INSERT INTO `listaprecio` VALUES ('12', '1', '12', '0.65');
INSERT INTO `listaprecio` VALUES ('13', '1', '13', '0.64');
INSERT INTO `listaprecio` VALUES ('14', '1', '14', '0.86');
INSERT INTO `listaprecio` VALUES ('15', '1', '15', '0.75');
INSERT INTO `listaprecio` VALUES ('16', '1', '16', '0.98');
INSERT INTO `listaprecio` VALUES ('17', '1', '17', '1.05');
INSERT INTO `listaprecio` VALUES ('18', '1', '18', '0.64');
INSERT INTO `listaprecio` VALUES ('19', '1', '19', '0.64');
INSERT INTO `listaprecio` VALUES ('20', '1', '20', '0.98');
INSERT INTO `listaprecio` VALUES ('21', '1', '21', '0.69');
INSERT INTO `listaprecio` VALUES ('22', '1', '22', '0.69');
INSERT INTO `listaprecio` VALUES ('23', '1', '23', '0.98');
INSERT INTO `listaprecio` VALUES ('24', '1', '24', '0.98');
INSERT INTO `listaprecio` VALUES ('25', '1', '25', '0.98');
INSERT INTO `listaprecio` VALUES ('26', '1', '26', '0.98');
INSERT INTO `listaprecio` VALUES ('27', '1', '27', '0.98');
INSERT INTO `listaprecio` VALUES ('28', '1', '28', '0.98');
INSERT INTO `listaprecio` VALUES ('29', '1', '29', '0.98');
INSERT INTO `listaprecio` VALUES ('30', '1', '30', '0.98');
INSERT INTO `listaprecio` VALUES ('31', '1', '31', '0.98');
INSERT INTO `listaprecio` VALUES ('32', '1', '32', '0.98');
INSERT INTO `listaprecio` VALUES ('33', '1', '33', '0.98');
INSERT INTO `listaprecio` VALUES ('34', '1', '34', '0.98');
INSERT INTO `listaprecio` VALUES ('35', '1', '35', '0.98');
INSERT INTO `listaprecio` VALUES ('36', '1', '36', '0.98');
INSERT INTO `listaprecio` VALUES ('37', '1', '37', '0.98');
INSERT INTO `listaprecio` VALUES ('38', '1', '38', '1.09');
INSERT INTO `listaprecio` VALUES ('39', '1', '39', '1.09');
INSERT INTO `listaprecio` VALUES ('40', '1', '40', '0.9');
INSERT INTO `listaprecio` VALUES ('41', '1', '41', '0.64');
INSERT INTO `listaprecio` VALUES ('42', '1', '42', '0.86');
INSERT INTO `listaprecio` VALUES ('43', '1', '43', '0.86');
INSERT INTO `listaprecio` VALUES ('44', '1', '44', '0.86');
INSERT INTO `listaprecio` VALUES ('45', '1', '45', '0.86');
INSERT INTO `listaprecio` VALUES ('46', '1', '46', '0.86');
INSERT INTO `listaprecio` VALUES ('47', '1', '47', '0.86');
INSERT INTO `listaprecio` VALUES ('48', '1', '48', '0.86');
INSERT INTO `listaprecio` VALUES ('49', '1', '49', '0.86');
INSERT INTO `listaprecio` VALUES ('50', '1', '50', '0.86');
INSERT INTO `listaprecio` VALUES ('51', '1', '51', '0.86');
INSERT INTO `listaprecio` VALUES ('52', '1', '52', '0.86');
INSERT INTO `listaprecio` VALUES ('53', '1', '53', '0.86');
INSERT INTO `listaprecio` VALUES ('54', '1', '54', '0.86');
INSERT INTO `listaprecio` VALUES ('55', '1', '55', '0.86');
INSERT INTO `listaprecio` VALUES ('56', '1', '56', '0.86');
INSERT INTO `listaprecio` VALUES ('57', '1', '57', '0.86');
INSERT INTO `listaprecio` VALUES ('58', '1', '58', '0.86');
INSERT INTO `listaprecio` VALUES ('59', '1', '59', '0.86');
INSERT INTO `listaprecio` VALUES ('60', '1', '60', '0.86');
INSERT INTO `listaprecio` VALUES ('61', '1', '61', '0.86');
INSERT INTO `listaprecio` VALUES ('62', '1', '62', '0.68');
INSERT INTO `listaprecio` VALUES ('63', '1', '63', '0.86');
INSERT INTO `listaprecio` VALUES ('64', '1', '64', '9.5');
INSERT INTO `listaprecio` VALUES ('65', '1', '65', '9.25');
INSERT INTO `listaprecio` VALUES ('66', '1', '66', '9.25');
INSERT INTO `listaprecio` VALUES ('67', '1', '67', '9.25');
INSERT INTO `listaprecio` VALUES ('68', '1', '68', '9');
INSERT INTO `listaprecio` VALUES ('69', '1', '69', '9.8');
INSERT INTO `listaprecio` VALUES ('70', '1', '70', '6.8');
INSERT INTO `listaprecio` VALUES ('71', '1', '71', '8');
INSERT INTO `listaprecio` VALUES ('72', '1', '72', '2.5');
INSERT INTO `listaprecio` VALUES ('73', '1', '73', '7.3');
INSERT INTO `listaprecio` VALUES ('74', '1', '74', '7.5');
INSERT INTO `listaprecio` VALUES ('75', '1', '75', '8.3');
INSERT INTO `listaprecio` VALUES ('76', '1', '76', '8.75');
INSERT INTO `listaprecio` VALUES ('77', '1', '77', '1.05');
INSERT INTO `listaprecio` VALUES ('78', '1', '78', '7');
INSERT INTO `listaprecio` VALUES ('79', '1', '79', '10.4');
INSERT INTO `listaprecio` VALUES ('80', '1', '80', '0.65');
INSERT INTO `listaprecio` VALUES ('81', '1', '81', '0.6');
INSERT INTO `listaprecio` VALUES ('82', '1', '82', '5.3');
INSERT INTO `listaprecio` VALUES ('83', '1', '83', '13');
INSERT INTO `listaprecio` VALUES ('84', '1', '84', '16.9');
INSERT INTO `listaprecio` VALUES ('85', '1', '85', '13.9');
INSERT INTO `listaprecio` VALUES ('86', '1', '86', '18.4');
INSERT INTO `listaprecio` VALUES ('87', '1', '87', '9.9');
INSERT INTO `listaprecio` VALUES ('88', '1', '88', '12.3');
INSERT INTO `listaprecio` VALUES ('89', '1', '89', '10.6');
INSERT INTO `listaprecio` VALUES ('90', '1', '90', '13.4');
INSERT INTO `listaprecio` VALUES ('91', '1', '91', '6.55');
INSERT INTO `listaprecio` VALUES ('92', '1', '92', '5.5');
INSERT INTO `listaprecio` VALUES ('93', '1', '93', '6.75');
INSERT INTO `listaprecio` VALUES ('94', '1', '94', '0.25');
INSERT INTO `listaprecio` VALUES ('95', '1', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('96', '2', '1', '0.5');
INSERT INTO `listaprecio` VALUES ('97', '2', '2', '0.26');
INSERT INTO `listaprecio` VALUES ('98', '2', '3', '0.18');
INSERT INTO `listaprecio` VALUES ('99', '2', '4', '0.64');
INSERT INTO `listaprecio` VALUES ('100', '2', '5', '0.4');
INSERT INTO `listaprecio` VALUES ('101', '2', '6', '1.25');
INSERT INTO `listaprecio` VALUES ('102', '2', '7', '0.64');
INSERT INTO `listaprecio` VALUES ('103', '2', '8', '0.64');
INSERT INTO `listaprecio` VALUES ('104', '2', '9', '0.64');
INSERT INTO `listaprecio` VALUES ('105', '2', '10', '0');
INSERT INTO `listaprecio` VALUES ('106', '2', '11', '0.4');
INSERT INTO `listaprecio` VALUES ('107', '2', '12', '0.65');
INSERT INTO `listaprecio` VALUES ('108', '2', '13', '0.64');
INSERT INTO `listaprecio` VALUES ('109', '2', '14', '0.86');
INSERT INTO `listaprecio` VALUES ('110', '2', '15', '0.75');
INSERT INTO `listaprecio` VALUES ('111', '2', '16', '0.98');
INSERT INTO `listaprecio` VALUES ('112', '2', '17', '1.05');
INSERT INTO `listaprecio` VALUES ('113', '2', '18', '0.64');
INSERT INTO `listaprecio` VALUES ('114', '2', '19', '0.64');
INSERT INTO `listaprecio` VALUES ('115', '2', '20', '0.98');
INSERT INTO `listaprecio` VALUES ('116', '2', '21', '0.69');
INSERT INTO `listaprecio` VALUES ('117', '2', '22', '0.69');
INSERT INTO `listaprecio` VALUES ('118', '2', '23', '0.98');
INSERT INTO `listaprecio` VALUES ('119', '2', '24', '0.98');
INSERT INTO `listaprecio` VALUES ('120', '2', '25', '0.98');
INSERT INTO `listaprecio` VALUES ('121', '2', '26', '0.98');
INSERT INTO `listaprecio` VALUES ('122', '2', '27', '0.98');
INSERT INTO `listaprecio` VALUES ('123', '2', '28', '0.98');
INSERT INTO `listaprecio` VALUES ('124', '2', '29', '0.98');
INSERT INTO `listaprecio` VALUES ('125', '2', '30', '0.98');
INSERT INTO `listaprecio` VALUES ('126', '2', '31', '0.98');
INSERT INTO `listaprecio` VALUES ('127', '2', '32', '0.98');
INSERT INTO `listaprecio` VALUES ('128', '2', '33', '0.98');
INSERT INTO `listaprecio` VALUES ('129', '2', '34', '0.98');
INSERT INTO `listaprecio` VALUES ('130', '2', '35', '0.98');
INSERT INTO `listaprecio` VALUES ('131', '2', '36', '0.98');
INSERT INTO `listaprecio` VALUES ('132', '2', '37', '0.98');
INSERT INTO `listaprecio` VALUES ('133', '2', '38', '1.09');
INSERT INTO `listaprecio` VALUES ('134', '2', '39', '1.09');
INSERT INTO `listaprecio` VALUES ('135', '2', '40', '0.88');
INSERT INTO `listaprecio` VALUES ('136', '2', '41', '0.64');
INSERT INTO `listaprecio` VALUES ('137', '2', '42', '0.86');
INSERT INTO `listaprecio` VALUES ('138', '2', '43', '0.86');
INSERT INTO `listaprecio` VALUES ('139', '2', '44', '0.86');
INSERT INTO `listaprecio` VALUES ('140', '2', '45', '0.86');
INSERT INTO `listaprecio` VALUES ('141', '2', '46', '0.86');
INSERT INTO `listaprecio` VALUES ('142', '2', '47', '0.86');
INSERT INTO `listaprecio` VALUES ('143', '2', '48', '0.86');
INSERT INTO `listaprecio` VALUES ('144', '2', '49', '0.86');
INSERT INTO `listaprecio` VALUES ('145', '2', '50', '0.86');
INSERT INTO `listaprecio` VALUES ('146', '2', '51', '0.86');
INSERT INTO `listaprecio` VALUES ('147', '2', '52', '0.86');
INSERT INTO `listaprecio` VALUES ('148', '2', '53', '0.86');
INSERT INTO `listaprecio` VALUES ('149', '2', '54', '0.86');
INSERT INTO `listaprecio` VALUES ('150', '2', '55', '0.86');
INSERT INTO `listaprecio` VALUES ('151', '2', '56', '0.86');
INSERT INTO `listaprecio` VALUES ('152', '2', '57', '0.86');
INSERT INTO `listaprecio` VALUES ('153', '2', '58', '0.86');
INSERT INTO `listaprecio` VALUES ('154', '2', '59', '0.86');
INSERT INTO `listaprecio` VALUES ('155', '2', '60', '0.86');
INSERT INTO `listaprecio` VALUES ('156', '2', '61', '0.86');
INSERT INTO `listaprecio` VALUES ('157', '2', '62', '0.6');
INSERT INTO `listaprecio` VALUES ('158', '2', '63', '0.86');
INSERT INTO `listaprecio` VALUES ('159', '2', '64', '9.5');
INSERT INTO `listaprecio` VALUES ('160', '2', '65', '9.25');
INSERT INTO `listaprecio` VALUES ('161', '2', '66', '9.25');
INSERT INTO `listaprecio` VALUES ('162', '2', '67', '9.25');
INSERT INTO `listaprecio` VALUES ('163', '2', '68', '9');
INSERT INTO `listaprecio` VALUES ('164', '2', '69', '9.8');
INSERT INTO `listaprecio` VALUES ('165', '2', '70', '6.8');
INSERT INTO `listaprecio` VALUES ('166', '2', '71', '8');
INSERT INTO `listaprecio` VALUES ('167', '2', '72', '2.5');
INSERT INTO `listaprecio` VALUES ('168', '2', '73', '7.3');
INSERT INTO `listaprecio` VALUES ('169', '2', '74', '7.5');
INSERT INTO `listaprecio` VALUES ('170', '2', '75', '8.3');
INSERT INTO `listaprecio` VALUES ('171', '2', '76', '8.5');
INSERT INTO `listaprecio` VALUES ('172', '2', '77', '1.05');
INSERT INTO `listaprecio` VALUES ('173', '2', '78', '7');
INSERT INTO `listaprecio` VALUES ('174', '2', '79', '10.4');
INSERT INTO `listaprecio` VALUES ('175', '2', '80', '0.65');
INSERT INTO `listaprecio` VALUES ('176', '2', '81', '0.6');
INSERT INTO `listaprecio` VALUES ('177', '2', '82', '5.3');
INSERT INTO `listaprecio` VALUES ('178', '2', '83', '13');
INSERT INTO `listaprecio` VALUES ('179', '2', '84', '16.9');
INSERT INTO `listaprecio` VALUES ('180', '2', '85', '13.9');
INSERT INTO `listaprecio` VALUES ('181', '2', '86', '18.4');
INSERT INTO `listaprecio` VALUES ('182', '2', '87', '9.9');
INSERT INTO `listaprecio` VALUES ('183', '2', '88', '12.3');
INSERT INTO `listaprecio` VALUES ('184', '2', '89', '10.6');
INSERT INTO `listaprecio` VALUES ('185', '2', '90', '13.4');
INSERT INTO `listaprecio` VALUES ('186', '2', '91', '6.6');
INSERT INTO `listaprecio` VALUES ('187', '2', '92', '5.5');
INSERT INTO `listaprecio` VALUES ('188', '2', '93', '6.5');
INSERT INTO `listaprecio` VALUES ('189', '2', '94', '0.25');
INSERT INTO `listaprecio` VALUES ('190', '2', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('191', '3', '1', '0.5');
INSERT INTO `listaprecio` VALUES ('192', '3', '2', '0.26');
INSERT INTO `listaprecio` VALUES ('193', '3', '3', '0.18');
INSERT INTO `listaprecio` VALUES ('194', '3', '4', '0.64');
INSERT INTO `listaprecio` VALUES ('195', '3', '5', '0.4');
INSERT INTO `listaprecio` VALUES ('196', '3', '6', '1.25');
INSERT INTO `listaprecio` VALUES ('197', '3', '7', '0.64');
INSERT INTO `listaprecio` VALUES ('198', '3', '8', '0.64');
INSERT INTO `listaprecio` VALUES ('199', '3', '9', '0.64');
INSERT INTO `listaprecio` VALUES ('200', '3', '10', '0');
INSERT INTO `listaprecio` VALUES ('201', '3', '11', '0.4');
INSERT INTO `listaprecio` VALUES ('202', '3', '12', '0.65');
INSERT INTO `listaprecio` VALUES ('203', '3', '13', '0.64');
INSERT INTO `listaprecio` VALUES ('204', '3', '14', '0.86');
INSERT INTO `listaprecio` VALUES ('205', '3', '15', '0.75');
INSERT INTO `listaprecio` VALUES ('206', '3', '16', '0.98');
INSERT INTO `listaprecio` VALUES ('207', '3', '17', '1.05');
INSERT INTO `listaprecio` VALUES ('208', '3', '18', '0.64');
INSERT INTO `listaprecio` VALUES ('209', '3', '19', '0.64');
INSERT INTO `listaprecio` VALUES ('210', '3', '20', '0.98');
INSERT INTO `listaprecio` VALUES ('211', '3', '21', '0.69');
INSERT INTO `listaprecio` VALUES ('212', '3', '22', '0.69');
INSERT INTO `listaprecio` VALUES ('213', '3', '23', '0.98');
INSERT INTO `listaprecio` VALUES ('214', '3', '24', '0.98');
INSERT INTO `listaprecio` VALUES ('215', '3', '25', '0.98');
INSERT INTO `listaprecio` VALUES ('216', '3', '26', '0.98');
INSERT INTO `listaprecio` VALUES ('217', '3', '27', '0.98');
INSERT INTO `listaprecio` VALUES ('218', '3', '28', '0.98');
INSERT INTO `listaprecio` VALUES ('219', '3', '29', '0.98');
INSERT INTO `listaprecio` VALUES ('220', '3', '30', '0.98');
INSERT INTO `listaprecio` VALUES ('221', '3', '31', '0.98');
INSERT INTO `listaprecio` VALUES ('222', '3', '32', '0.98');
INSERT INTO `listaprecio` VALUES ('223', '3', '33', '0.98');
INSERT INTO `listaprecio` VALUES ('224', '3', '34', '0.98');
INSERT INTO `listaprecio` VALUES ('225', '3', '35', '0.98');
INSERT INTO `listaprecio` VALUES ('226', '3', '36', '0.98');
INSERT INTO `listaprecio` VALUES ('227', '3', '37', '0.98');
INSERT INTO `listaprecio` VALUES ('228', '3', '38', '1.1');
INSERT INTO `listaprecio` VALUES ('229', '3', '39', '1.1');
INSERT INTO `listaprecio` VALUES ('230', '3', '40', '0.9');
INSERT INTO `listaprecio` VALUES ('231', '3', '41', '0.64');
INSERT INTO `listaprecio` VALUES ('232', '3', '42', '0.86');
INSERT INTO `listaprecio` VALUES ('233', '3', '43', '0.86');
INSERT INTO `listaprecio` VALUES ('234', '3', '44', '0.86');
INSERT INTO `listaprecio` VALUES ('235', '3', '45', '0.86');
INSERT INTO `listaprecio` VALUES ('236', '3', '46', '0.86');
INSERT INTO `listaprecio` VALUES ('237', '3', '47', '0.86');
INSERT INTO `listaprecio` VALUES ('238', '3', '48', '0.86');
INSERT INTO `listaprecio` VALUES ('239', '3', '49', '0.86');
INSERT INTO `listaprecio` VALUES ('240', '3', '50', '0.86');
INSERT INTO `listaprecio` VALUES ('241', '3', '51', '0.86');
INSERT INTO `listaprecio` VALUES ('242', '3', '52', '0.86');
INSERT INTO `listaprecio` VALUES ('243', '3', '53', '0.86');
INSERT INTO `listaprecio` VALUES ('244', '3', '54', '0.86');
INSERT INTO `listaprecio` VALUES ('245', '3', '55', '0.86');
INSERT INTO `listaprecio` VALUES ('246', '3', '56', '0.86');
INSERT INTO `listaprecio` VALUES ('247', '3', '57', '0.86');
INSERT INTO `listaprecio` VALUES ('248', '3', '58', '0.86');
INSERT INTO `listaprecio` VALUES ('249', '3', '59', '0.86');
INSERT INTO `listaprecio` VALUES ('250', '3', '60', '0.86');
INSERT INTO `listaprecio` VALUES ('251', '3', '61', '0.86');
INSERT INTO `listaprecio` VALUES ('252', '3', '62', '0.6');
INSERT INTO `listaprecio` VALUES ('253', '3', '63', '0.86');
INSERT INTO `listaprecio` VALUES ('254', '3', '64', '9.5');
INSERT INTO `listaprecio` VALUES ('255', '3', '65', '10.6');
INSERT INTO `listaprecio` VALUES ('256', '3', '66', '11.5');
INSERT INTO `listaprecio` VALUES ('257', '3', '67', '9');
INSERT INTO `listaprecio` VALUES ('258', '3', '68', '11');
INSERT INTO `listaprecio` VALUES ('259', '3', '69', '9.85');
INSERT INTO `listaprecio` VALUES ('260', '3', '70', '7');
INSERT INTO `listaprecio` VALUES ('261', '3', '71', '8');
INSERT INTO `listaprecio` VALUES ('262', '3', '72', '2.5');
INSERT INTO `listaprecio` VALUES ('263', '3', '73', '7.3');
INSERT INTO `listaprecio` VALUES ('264', '3', '74', '7.5');
INSERT INTO `listaprecio` VALUES ('265', '3', '75', '8.2');
INSERT INTO `listaprecio` VALUES ('266', '3', '76', '8.6');
INSERT INTO `listaprecio` VALUES ('267', '3', '77', '1.05');
INSERT INTO `listaprecio` VALUES ('268', '3', '78', '7');
INSERT INTO `listaprecio` VALUES ('269', '3', '79', '10.5');
INSERT INTO `listaprecio` VALUES ('270', '3', '80', '0.65');
INSERT INTO `listaprecio` VALUES ('271', '3', '81', '0.6');
INSERT INTO `listaprecio` VALUES ('272', '3', '82', '5.3');
INSERT INTO `listaprecio` VALUES ('273', '3', '83', '13');
INSERT INTO `listaprecio` VALUES ('274', '3', '84', '16.9');
INSERT INTO `listaprecio` VALUES ('275', '3', '85', '13.9');
INSERT INTO `listaprecio` VALUES ('276', '3', '86', '18.4');
INSERT INTO `listaprecio` VALUES ('277', '3', '87', '9.9');
INSERT INTO `listaprecio` VALUES ('278', '3', '88', '12.3');
INSERT INTO `listaprecio` VALUES ('279', '3', '89', '10.6');
INSERT INTO `listaprecio` VALUES ('280', '3', '90', '13.4');
INSERT INTO `listaprecio` VALUES ('281', '3', '91', '6.5');
INSERT INTO `listaprecio` VALUES ('282', '3', '92', '5.5');
INSERT INTO `listaprecio` VALUES ('283', '3', '93', '6.5');
INSERT INTO `listaprecio` VALUES ('284', '3', '94', '0.25');
INSERT INTO `listaprecio` VALUES ('285', '3', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('286', '4', '1', '0.5');
INSERT INTO `listaprecio` VALUES ('287', '4', '2', '0.26');
INSERT INTO `listaprecio` VALUES ('288', '4', '3', '0.18');
INSERT INTO `listaprecio` VALUES ('289', '4', '4', '0.64');
INSERT INTO `listaprecio` VALUES ('290', '4', '5', '0.4');
INSERT INTO `listaprecio` VALUES ('291', '4', '6', '1.25');
INSERT INTO `listaprecio` VALUES ('292', '4', '7', '0.64');
INSERT INTO `listaprecio` VALUES ('293', '4', '8', '0.64');
INSERT INTO `listaprecio` VALUES ('294', '4', '9', '0.64');
INSERT INTO `listaprecio` VALUES ('295', '4', '10', '0');
INSERT INTO `listaprecio` VALUES ('296', '4', '11', '0.4');
INSERT INTO `listaprecio` VALUES ('297', '4', '12', '0.65');
INSERT INTO `listaprecio` VALUES ('298', '4', '13', '0.64');
INSERT INTO `listaprecio` VALUES ('299', '4', '14', '0.85');
INSERT INTO `listaprecio` VALUES ('300', '4', '15', '0.75');
INSERT INTO `listaprecio` VALUES ('301', '4', '16', '0.98');
INSERT INTO `listaprecio` VALUES ('302', '4', '17', '1.05');
INSERT INTO `listaprecio` VALUES ('303', '4', '18', '0.64');
INSERT INTO `listaprecio` VALUES ('304', '4', '19', '0.64');
INSERT INTO `listaprecio` VALUES ('305', '4', '20', '0.98');
INSERT INTO `listaprecio` VALUES ('306', '4', '21', '0.69');
INSERT INTO `listaprecio` VALUES ('307', '4', '22', '0.69');
INSERT INTO `listaprecio` VALUES ('308', '4', '23', '0.98');
INSERT INTO `listaprecio` VALUES ('309', '4', '24', '0.98');
INSERT INTO `listaprecio` VALUES ('310', '4', '25', '0.98');
INSERT INTO `listaprecio` VALUES ('311', '4', '26', '0.98');
INSERT INTO `listaprecio` VALUES ('312', '4', '27', '0.98');
INSERT INTO `listaprecio` VALUES ('313', '4', '28', '0.98');
INSERT INTO `listaprecio` VALUES ('314', '4', '29', '0.98');
INSERT INTO `listaprecio` VALUES ('315', '4', '30', '0.98');
INSERT INTO `listaprecio` VALUES ('316', '4', '31', '0.98');
INSERT INTO `listaprecio` VALUES ('317', '4', '32', '0.98');
INSERT INTO `listaprecio` VALUES ('318', '4', '33', '0.98');
INSERT INTO `listaprecio` VALUES ('319', '4', '34', '0.98');
INSERT INTO `listaprecio` VALUES ('320', '4', '35', '0.98');
INSERT INTO `listaprecio` VALUES ('321', '4', '36', '0.98');
INSERT INTO `listaprecio` VALUES ('322', '4', '37', '0.98');
INSERT INTO `listaprecio` VALUES ('323', '4', '38', '1.1');
INSERT INTO `listaprecio` VALUES ('324', '4', '39', '1.1');
INSERT INTO `listaprecio` VALUES ('325', '4', '40', '0.9');
INSERT INTO `listaprecio` VALUES ('326', '4', '41', '0.64');
INSERT INTO `listaprecio` VALUES ('327', '4', '42', '0.86');
INSERT INTO `listaprecio` VALUES ('328', '4', '43', '0.86');
INSERT INTO `listaprecio` VALUES ('329', '4', '44', '0.86');
INSERT INTO `listaprecio` VALUES ('330', '4', '45', '0.86');
INSERT INTO `listaprecio` VALUES ('331', '4', '46', '0.86');
INSERT INTO `listaprecio` VALUES ('332', '4', '47', '0.86');
INSERT INTO `listaprecio` VALUES ('333', '4', '48', '0.86');
INSERT INTO `listaprecio` VALUES ('334', '4', '49', '0.86');
INSERT INTO `listaprecio` VALUES ('335', '4', '50', '0.86');
INSERT INTO `listaprecio` VALUES ('336', '4', '51', '0.86');
INSERT INTO `listaprecio` VALUES ('337', '4', '52', '0.86');
INSERT INTO `listaprecio` VALUES ('338', '4', '53', '0.86');
INSERT INTO `listaprecio` VALUES ('339', '4', '54', '0.86');
INSERT INTO `listaprecio` VALUES ('340', '4', '55', '0.86');
INSERT INTO `listaprecio` VALUES ('341', '4', '56', '0.86');
INSERT INTO `listaprecio` VALUES ('342', '4', '57', '0.86');
INSERT INTO `listaprecio` VALUES ('343', '4', '58', '0.86');
INSERT INTO `listaprecio` VALUES ('344', '4', '59', '0.86');
INSERT INTO `listaprecio` VALUES ('345', '4', '60', '0.86');
INSERT INTO `listaprecio` VALUES ('346', '4', '61', '0.86');
INSERT INTO `listaprecio` VALUES ('347', '4', '62', '0.6');
INSERT INTO `listaprecio` VALUES ('348', '4', '63', '0.86');
INSERT INTO `listaprecio` VALUES ('349', '4', '64', '9.5');
INSERT INTO `listaprecio` VALUES ('350', '4', '65', '9.25');
INSERT INTO `listaprecio` VALUES ('351', '4', '66', '9.25');
INSERT INTO `listaprecio` VALUES ('352', '4', '67', '9.25');
INSERT INTO `listaprecio` VALUES ('353', '4', '68', '9');
INSERT INTO `listaprecio` VALUES ('354', '4', '69', '9.9');
INSERT INTO `listaprecio` VALUES ('355', '4', '70', '7');
INSERT INTO `listaprecio` VALUES ('356', '4', '71', '8');
INSERT INTO `listaprecio` VALUES ('357', '4', '72', '2.5');
INSERT INTO `listaprecio` VALUES ('358', '4', '73', '7.3');
INSERT INTO `listaprecio` VALUES ('359', '4', '74', '7.5');
INSERT INTO `listaprecio` VALUES ('360', '4', '75', '8.3');
INSERT INTO `listaprecio` VALUES ('361', '4', '76', '8.75');
INSERT INTO `listaprecio` VALUES ('362', '4', '77', '1.05');
INSERT INTO `listaprecio` VALUES ('363', '4', '78', '7');
INSERT INTO `listaprecio` VALUES ('364', '4', '79', '10.4');
INSERT INTO `listaprecio` VALUES ('365', '4', '80', '0.65');
INSERT INTO `listaprecio` VALUES ('366', '4', '81', '0.6');
INSERT INTO `listaprecio` VALUES ('367', '4', '82', '5.3');
INSERT INTO `listaprecio` VALUES ('368', '4', '83', '13');
INSERT INTO `listaprecio` VALUES ('369', '4', '84', '16.9');
INSERT INTO `listaprecio` VALUES ('370', '4', '85', '13.9');
INSERT INTO `listaprecio` VALUES ('371', '4', '86', '18.4');
INSERT INTO `listaprecio` VALUES ('372', '4', '87', '9.9');
INSERT INTO `listaprecio` VALUES ('373', '4', '88', '12.3');
INSERT INTO `listaprecio` VALUES ('374', '4', '89', '10.6');
INSERT INTO `listaprecio` VALUES ('375', '4', '90', '13.4');
INSERT INTO `listaprecio` VALUES ('376', '4', '91', '6.55');
INSERT INTO `listaprecio` VALUES ('377', '4', '92', '5.5');
INSERT INTO `listaprecio` VALUES ('378', '4', '93', '6.5');
INSERT INTO `listaprecio` VALUES ('379', '4', '94', '0.25');
INSERT INTO `listaprecio` VALUES ('380', '4', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('381', '5', '1', '0.5');
INSERT INTO `listaprecio` VALUES ('382', '5', '2', '0.26');
INSERT INTO `listaprecio` VALUES ('383', '5', '3', '0.18');
INSERT INTO `listaprecio` VALUES ('384', '5', '4', '0.64');
INSERT INTO `listaprecio` VALUES ('385', '5', '5', '0.4');
INSERT INTO `listaprecio` VALUES ('386', '5', '6', '1.25');
INSERT INTO `listaprecio` VALUES ('387', '5', '7', '0.64');
INSERT INTO `listaprecio` VALUES ('388', '5', '8', '0.64');
INSERT INTO `listaprecio` VALUES ('389', '5', '9', '0.64');
INSERT INTO `listaprecio` VALUES ('390', '5', '10', '0');
INSERT INTO `listaprecio` VALUES ('391', '5', '11', '0.4');
INSERT INTO `listaprecio` VALUES ('392', '5', '12', '0.65');
INSERT INTO `listaprecio` VALUES ('393', '5', '13', '0.64');
INSERT INTO `listaprecio` VALUES ('394', '5', '14', '0.86');
INSERT INTO `listaprecio` VALUES ('395', '5', '15', '0.75');
INSERT INTO `listaprecio` VALUES ('396', '5', '16', '0.98');
INSERT INTO `listaprecio` VALUES ('397', '5', '17', '1.05');
INSERT INTO `listaprecio` VALUES ('398', '5', '18', '0.64');
INSERT INTO `listaprecio` VALUES ('399', '5', '19', '0.64');
INSERT INTO `listaprecio` VALUES ('400', '5', '20', '0.98');
INSERT INTO `listaprecio` VALUES ('401', '5', '21', '0.69');
INSERT INTO `listaprecio` VALUES ('402', '5', '22', '0.69');
INSERT INTO `listaprecio` VALUES ('403', '5', '23', '0.98');
INSERT INTO `listaprecio` VALUES ('404', '5', '24', '0.98');
INSERT INTO `listaprecio` VALUES ('405', '5', '25', '0.98');
INSERT INTO `listaprecio` VALUES ('406', '5', '26', '0.98');
INSERT INTO `listaprecio` VALUES ('407', '5', '27', '0.98');
INSERT INTO `listaprecio` VALUES ('408', '5', '28', '0.98');
INSERT INTO `listaprecio` VALUES ('409', '5', '29', '0.98');
INSERT INTO `listaprecio` VALUES ('410', '5', '30', '0.98');
INSERT INTO `listaprecio` VALUES ('411', '5', '31', '0.98');
INSERT INTO `listaprecio` VALUES ('412', '5', '32', '0.98');
INSERT INTO `listaprecio` VALUES ('413', '5', '33', '0.98');
INSERT INTO `listaprecio` VALUES ('414', '5', '34', '0.98');
INSERT INTO `listaprecio` VALUES ('415', '5', '35', '0.98');
INSERT INTO `listaprecio` VALUES ('416', '5', '36', '0.98');
INSERT INTO `listaprecio` VALUES ('417', '5', '37', '0.98');
INSERT INTO `listaprecio` VALUES ('418', '5', '38', '1.1');
INSERT INTO `listaprecio` VALUES ('419', '5', '39', '1.1');
INSERT INTO `listaprecio` VALUES ('420', '5', '40', '0.9');
INSERT INTO `listaprecio` VALUES ('421', '5', '41', '0.64');
INSERT INTO `listaprecio` VALUES ('422', '5', '42', '1.25');
INSERT INTO `listaprecio` VALUES ('423', '5', '43', '0.73');
INSERT INTO `listaprecio` VALUES ('424', '5', '44', '0.73');
INSERT INTO `listaprecio` VALUES ('425', '5', '45', '0.73');
INSERT INTO `listaprecio` VALUES ('426', '5', '46', '1');
INSERT INTO `listaprecio` VALUES ('427', '5', '47', '1.3');
INSERT INTO `listaprecio` VALUES ('428', '5', '48', '1.3');
INSERT INTO `listaprecio` VALUES ('429', '5', '49', '0.88');
INSERT INTO `listaprecio` VALUES ('430', '5', '50', '1.53');
INSERT INTO `listaprecio` VALUES ('431', '5', '51', '1.3');
INSERT INTO `listaprecio` VALUES ('432', '5', '52', '1.3');
INSERT INTO `listaprecio` VALUES ('433', '5', '53', '0.78');
INSERT INTO `listaprecio` VALUES ('434', '5', '54', '0.73');
INSERT INTO `listaprecio` VALUES ('435', '5', '55', '1');
INSERT INTO `listaprecio` VALUES ('436', '5', '56', '0.94');
INSERT INTO `listaprecio` VALUES ('437', '5', '57', '1');
INSERT INTO `listaprecio` VALUES ('438', '5', '58', '0.73');
INSERT INTO `listaprecio` VALUES ('439', '5', '59', '0.73');
INSERT INTO `listaprecio` VALUES ('440', '5', '60', '1.3');
INSERT INTO `listaprecio` VALUES ('441', '5', '61', '0.77');
INSERT INTO `listaprecio` VALUES ('442', '5', '62', '0.6');
INSERT INTO `listaprecio` VALUES ('443', '5', '63', '0.73');
INSERT INTO `listaprecio` VALUES ('444', '5', '64', '9.5');
INSERT INTO `listaprecio` VALUES ('445', '5', '65', '10.6');
INSERT INTO `listaprecio` VALUES ('446', '5', '66', '11.5');
INSERT INTO `listaprecio` VALUES ('447', '5', '67', '9');
INSERT INTO `listaprecio` VALUES ('448', '5', '68', '11');
INSERT INTO `listaprecio` VALUES ('449', '5', '69', '9.5');
INSERT INTO `listaprecio` VALUES ('450', '5', '70', '7');
INSERT INTO `listaprecio` VALUES ('451', '5', '71', '8');
INSERT INTO `listaprecio` VALUES ('452', '5', '72', '2.5');
INSERT INTO `listaprecio` VALUES ('453', '5', '73', '7.3');
INSERT INTO `listaprecio` VALUES ('454', '5', '74', '7.5');
INSERT INTO `listaprecio` VALUES ('455', '5', '75', '8.3');
INSERT INTO `listaprecio` VALUES ('456', '5', '76', '8.8');
INSERT INTO `listaprecio` VALUES ('457', '5', '77', '1.05');
INSERT INTO `listaprecio` VALUES ('458', '5', '78', '7');
INSERT INTO `listaprecio` VALUES ('459', '5', '79', '10.4');
INSERT INTO `listaprecio` VALUES ('460', '5', '80', '0.65');
INSERT INTO `listaprecio` VALUES ('461', '5', '81', '0.6');
INSERT INTO `listaprecio` VALUES ('462', '5', '82', '5.3');
INSERT INTO `listaprecio` VALUES ('463', '5', '83', '13');
INSERT INTO `listaprecio` VALUES ('464', '5', '84', '16.9');
INSERT INTO `listaprecio` VALUES ('465', '5', '85', '13.9');
INSERT INTO `listaprecio` VALUES ('466', '5', '86', '18.4');
INSERT INTO `listaprecio` VALUES ('467', '5', '87', '9.9');
INSERT INTO `listaprecio` VALUES ('468', '5', '88', '12.3');
INSERT INTO `listaprecio` VALUES ('469', '5', '89', '10.6');
INSERT INTO `listaprecio` VALUES ('470', '5', '90', '13.4');
INSERT INTO `listaprecio` VALUES ('471', '5', '91', '6.5');
INSERT INTO `listaprecio` VALUES ('472', '5', '92', '5.5');
INSERT INTO `listaprecio` VALUES ('473', '5', '93', '6.5');
INSERT INTO `listaprecio` VALUES ('474', '5', '94', '0.25');
INSERT INTO `listaprecio` VALUES ('475', '5', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('476', '6', '1', '0.5');
INSERT INTO `listaprecio` VALUES ('477', '6', '2', '0.26');
INSERT INTO `listaprecio` VALUES ('478', '6', '3', '0.18');
INSERT INTO `listaprecio` VALUES ('479', '6', '4', '0.64');
INSERT INTO `listaprecio` VALUES ('480', '6', '5', '0.4');
INSERT INTO `listaprecio` VALUES ('481', '6', '6', '1.25');
INSERT INTO `listaprecio` VALUES ('482', '6', '7', '0.64');
INSERT INTO `listaprecio` VALUES ('483', '6', '8', '0.64');
INSERT INTO `listaprecio` VALUES ('484', '6', '9', '0.64');
INSERT INTO `listaprecio` VALUES ('485', '6', '10', '0');
INSERT INTO `listaprecio` VALUES ('486', '6', '11', '0.4');
INSERT INTO `listaprecio` VALUES ('487', '6', '12', '0.63');
INSERT INTO `listaprecio` VALUES ('488', '6', '13', '0.64');
INSERT INTO `listaprecio` VALUES ('489', '6', '14', '0.86');
INSERT INTO `listaprecio` VALUES ('490', '6', '15', '0.75');
INSERT INTO `listaprecio` VALUES ('491', '6', '16', '0.98');
INSERT INTO `listaprecio` VALUES ('492', '6', '17', '1.05');
INSERT INTO `listaprecio` VALUES ('493', '6', '18', '0.64');
INSERT INTO `listaprecio` VALUES ('494', '6', '19', '0.64');
INSERT INTO `listaprecio` VALUES ('495', '6', '20', '0.98');
INSERT INTO `listaprecio` VALUES ('496', '6', '21', '0.69');
INSERT INTO `listaprecio` VALUES ('497', '6', '22', '0.69');
INSERT INTO `listaprecio` VALUES ('498', '6', '23', '0.98');
INSERT INTO `listaprecio` VALUES ('499', '6', '24', '0.98');
INSERT INTO `listaprecio` VALUES ('500', '6', '25', '0.98');
INSERT INTO `listaprecio` VALUES ('501', '6', '26', '0.98');
INSERT INTO `listaprecio` VALUES ('502', '6', '27', '0.98');
INSERT INTO `listaprecio` VALUES ('503', '6', '28', '0.98');
INSERT INTO `listaprecio` VALUES ('504', '6', '29', '0.98');
INSERT INTO `listaprecio` VALUES ('505', '6', '30', '0.98');
INSERT INTO `listaprecio` VALUES ('506', '6', '31', '0.98');
INSERT INTO `listaprecio` VALUES ('507', '6', '32', '0.98');
INSERT INTO `listaprecio` VALUES ('508', '6', '33', '0.98');
INSERT INTO `listaprecio` VALUES ('509', '6', '34', '0.98');
INSERT INTO `listaprecio` VALUES ('510', '6', '35', '0.98');
INSERT INTO `listaprecio` VALUES ('511', '6', '36', '0.98');
INSERT INTO `listaprecio` VALUES ('512', '6', '37', '0.98');
INSERT INTO `listaprecio` VALUES ('513', '6', '38', '1.1');
INSERT INTO `listaprecio` VALUES ('514', '6', '39', '1.1');
INSERT INTO `listaprecio` VALUES ('515', '6', '40', '0.9');
INSERT INTO `listaprecio` VALUES ('516', '6', '41', '0.64');
INSERT INTO `listaprecio` VALUES ('517', '6', '42', '0.86');
INSERT INTO `listaprecio` VALUES ('518', '6', '43', '0.86');
INSERT INTO `listaprecio` VALUES ('519', '6', '44', '0.86');
INSERT INTO `listaprecio` VALUES ('520', '6', '45', '0.86');
INSERT INTO `listaprecio` VALUES ('521', '6', '46', '0.86');
INSERT INTO `listaprecio` VALUES ('522', '6', '47', '0.86');
INSERT INTO `listaprecio` VALUES ('523', '6', '48', '0.86');
INSERT INTO `listaprecio` VALUES ('524', '6', '49', '0.86');
INSERT INTO `listaprecio` VALUES ('525', '6', '50', '0.86');
INSERT INTO `listaprecio` VALUES ('526', '6', '51', '0.86');
INSERT INTO `listaprecio` VALUES ('527', '6', '52', '0.86');
INSERT INTO `listaprecio` VALUES ('528', '6', '53', '0.86');
INSERT INTO `listaprecio` VALUES ('529', '6', '54', '0.86');
INSERT INTO `listaprecio` VALUES ('530', '6', '55', '0.86');
INSERT INTO `listaprecio` VALUES ('531', '6', '56', '0.86');
INSERT INTO `listaprecio` VALUES ('532', '6', '57', '0.86');
INSERT INTO `listaprecio` VALUES ('533', '6', '58', '0.86');
INSERT INTO `listaprecio` VALUES ('534', '6', '59', '0.86');
INSERT INTO `listaprecio` VALUES ('535', '6', '60', '0.86');
INSERT INTO `listaprecio` VALUES ('536', '6', '61', '0.86');
INSERT INTO `listaprecio` VALUES ('537', '6', '62', '0.6');
INSERT INTO `listaprecio` VALUES ('538', '6', '63', '0.86');
INSERT INTO `listaprecio` VALUES ('539', '6', '64', '9.5');
INSERT INTO `listaprecio` VALUES ('540', '6', '65', '10.5');
INSERT INTO `listaprecio` VALUES ('541', '6', '66', '11.5');
INSERT INTO `listaprecio` VALUES ('542', '6', '67', '9.5');
INSERT INTO `listaprecio` VALUES ('543', '6', '68', '11');
INSERT INTO `listaprecio` VALUES ('544', '6', '69', '9.9');
INSERT INTO `listaprecio` VALUES ('545', '6', '70', '7');
INSERT INTO `listaprecio` VALUES ('546', '6', '71', '8');
INSERT INTO `listaprecio` VALUES ('547', '6', '72', '2.5');
INSERT INTO `listaprecio` VALUES ('548', '6', '73', '7.3');
INSERT INTO `listaprecio` VALUES ('549', '6', '74', '7.5');
INSERT INTO `listaprecio` VALUES ('550', '6', '75', '8.3');
INSERT INTO `listaprecio` VALUES ('551', '6', '76', '8.75');
INSERT INTO `listaprecio` VALUES ('552', '6', '77', '1.05');
INSERT INTO `listaprecio` VALUES ('553', '6', '78', '7');
INSERT INTO `listaprecio` VALUES ('554', '6', '79', '10.4');
INSERT INTO `listaprecio` VALUES ('555', '6', '80', '0.65');
INSERT INTO `listaprecio` VALUES ('556', '6', '81', '0.6');
INSERT INTO `listaprecio` VALUES ('557', '6', '82', '5.3');
INSERT INTO `listaprecio` VALUES ('558', '6', '83', '13');
INSERT INTO `listaprecio` VALUES ('559', '6', '84', '16.9');
INSERT INTO `listaprecio` VALUES ('560', '6', '85', '13.9');
INSERT INTO `listaprecio` VALUES ('561', '6', '86', '18.4');
INSERT INTO `listaprecio` VALUES ('562', '6', '87', '9.9');
INSERT INTO `listaprecio` VALUES ('563', '6', '88', '12.3');
INSERT INTO `listaprecio` VALUES ('564', '6', '89', '10.6');
INSERT INTO `listaprecio` VALUES ('565', '6', '90', '13.4');
INSERT INTO `listaprecio` VALUES ('566', '6', '91', '6.5');
INSERT INTO `listaprecio` VALUES ('567', '6', '92', '5.5');
INSERT INTO `listaprecio` VALUES ('568', '6', '93', '6.5');
INSERT INTO `listaprecio` VALUES ('569', '6', '94', '0.25');
INSERT INTO `listaprecio` VALUES ('570', '6', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('571', '1', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('572', '2', '95', '0.4');
INSERT INTO `listaprecio` VALUES ('573', '3', '95', '0.4');
INSERT INTO `listaprecio` VALUES ('574', '4', '95', '0.4');
INSERT INTO `listaprecio` VALUES ('575', '5', '95', '0.4');
INSERT INTO `listaprecio` VALUES ('576', '6', '95', '0.4');
INSERT INTO `listaprecio` VALUES ('577', '7', '1', '0.49');
INSERT INTO `listaprecio` VALUES ('578', '7', '2', '0.26');
INSERT INTO `listaprecio` VALUES ('579', '7', '3', '0.18');
INSERT INTO `listaprecio` VALUES ('580', '7', '4', '0.64');
INSERT INTO `listaprecio` VALUES ('581', '7', '5', '0.4');
INSERT INTO `listaprecio` VALUES ('582', '7', '6', '1.25');
INSERT INTO `listaprecio` VALUES ('583', '7', '7', '0.64');
INSERT INTO `listaprecio` VALUES ('584', '7', '8', '0.64');
INSERT INTO `listaprecio` VALUES ('585', '7', '9', '0.64');
INSERT INTO `listaprecio` VALUES ('586', '7', '10', '0');
INSERT INTO `listaprecio` VALUES ('587', '7', '11', '0.4');
INSERT INTO `listaprecio` VALUES ('588', '7', '12', '0.65');
INSERT INTO `listaprecio` VALUES ('589', '7', '13', '0.64');
INSERT INTO `listaprecio` VALUES ('590', '7', '14', '0.86');
INSERT INTO `listaprecio` VALUES ('591', '7', '15', '0.75');
INSERT INTO `listaprecio` VALUES ('592', '7', '16', '0.98');
INSERT INTO `listaprecio` VALUES ('593', '7', '17', '1.05');
INSERT INTO `listaprecio` VALUES ('594', '7', '18', '0.64');
INSERT INTO `listaprecio` VALUES ('595', '7', '19', '0.64');
INSERT INTO `listaprecio` VALUES ('596', '7', '20', '0.98');
INSERT INTO `listaprecio` VALUES ('597', '7', '21', '0.69');
INSERT INTO `listaprecio` VALUES ('598', '7', '22', '0.69');
INSERT INTO `listaprecio` VALUES ('599', '7', '23', '0.98');
INSERT INTO `listaprecio` VALUES ('600', '7', '24', '0.98');
INSERT INTO `listaprecio` VALUES ('601', '7', '25', '0.98');
INSERT INTO `listaprecio` VALUES ('602', '7', '26', '0.98');
INSERT INTO `listaprecio` VALUES ('603', '7', '27', '0.98');
INSERT INTO `listaprecio` VALUES ('604', '7', '28', '0.98');
INSERT INTO `listaprecio` VALUES ('605', '7', '29', '0.98');
INSERT INTO `listaprecio` VALUES ('606', '7', '30', '0.98');
INSERT INTO `listaprecio` VALUES ('607', '7', '31', '0.98');
INSERT INTO `listaprecio` VALUES ('608', '7', '32', '0.98');
INSERT INTO `listaprecio` VALUES ('609', '7', '33', '0.98');
INSERT INTO `listaprecio` VALUES ('610', '7', '34', '0.98');
INSERT INTO `listaprecio` VALUES ('611', '7', '35', '0.98');
INSERT INTO `listaprecio` VALUES ('612', '7', '36', '0.98');
INSERT INTO `listaprecio` VALUES ('613', '7', '37', '0.98');
INSERT INTO `listaprecio` VALUES ('614', '7', '38', '1.1');
INSERT INTO `listaprecio` VALUES ('615', '7', '39', '1.1');
INSERT INTO `listaprecio` VALUES ('616', '7', '40', '0.9');
INSERT INTO `listaprecio` VALUES ('617', '7', '41', '0.64');
INSERT INTO `listaprecio` VALUES ('618', '7', '42', '0.86');
INSERT INTO `listaprecio` VALUES ('619', '7', '43', '0.86');
INSERT INTO `listaprecio` VALUES ('620', '7', '44', '0.86');
INSERT INTO `listaprecio` VALUES ('621', '7', '45', '0.86');
INSERT INTO `listaprecio` VALUES ('622', '7', '46', '0.86');
INSERT INTO `listaprecio` VALUES ('623', '7', '47', '0.86');
INSERT INTO `listaprecio` VALUES ('624', '7', '48', '0.86');
INSERT INTO `listaprecio` VALUES ('625', '7', '49', '0.86');
INSERT INTO `listaprecio` VALUES ('626', '7', '50', '0.86');
INSERT INTO `listaprecio` VALUES ('627', '7', '51', '0.86');
INSERT INTO `listaprecio` VALUES ('628', '7', '52', '0.86');
INSERT INTO `listaprecio` VALUES ('629', '7', '53', '0.86');
INSERT INTO `listaprecio` VALUES ('630', '7', '54', '0.86');
INSERT INTO `listaprecio` VALUES ('631', '7', '55', '0.86');
INSERT INTO `listaprecio` VALUES ('632', '7', '56', '0.86');
INSERT INTO `listaprecio` VALUES ('633', '7', '57', '0.86');
INSERT INTO `listaprecio` VALUES ('634', '7', '58', '0.86');
INSERT INTO `listaprecio` VALUES ('635', '7', '59', '0.86');
INSERT INTO `listaprecio` VALUES ('636', '7', '60', '0.86');
INSERT INTO `listaprecio` VALUES ('637', '7', '61', '0.86');
INSERT INTO `listaprecio` VALUES ('638', '7', '62', '0.6');
INSERT INTO `listaprecio` VALUES ('639', '7', '63', '0.86');
INSERT INTO `listaprecio` VALUES ('640', '7', '64', '9.5');
INSERT INTO `listaprecio` VALUES ('641', '7', '65', '10.5');
INSERT INTO `listaprecio` VALUES ('642', '7', '66', '11.5');
INSERT INTO `listaprecio` VALUES ('643', '7', '67', '9');
INSERT INTO `listaprecio` VALUES ('644', '7', '68', '11');
INSERT INTO `listaprecio` VALUES ('645', '7', '69', '9.9');
INSERT INTO `listaprecio` VALUES ('646', '7', '70', '7');
INSERT INTO `listaprecio` VALUES ('647', '7', '71', '8');
INSERT INTO `listaprecio` VALUES ('648', '7', '72', '2.5');
INSERT INTO `listaprecio` VALUES ('649', '7', '73', '7.3');
INSERT INTO `listaprecio` VALUES ('650', '7', '74', '7.5');
INSERT INTO `listaprecio` VALUES ('651', '7', '75', '8.75');
INSERT INTO `listaprecio` VALUES ('652', '7', '76', '8.75');
INSERT INTO `listaprecio` VALUES ('653', '7', '77', '1.05');
INSERT INTO `listaprecio` VALUES ('654', '7', '78', '7');
INSERT INTO `listaprecio` VALUES ('655', '7', '79', '10.4');
INSERT INTO `listaprecio` VALUES ('656', '7', '80', '0.65');
INSERT INTO `listaprecio` VALUES ('657', '7', '81', '0.6');
INSERT INTO `listaprecio` VALUES ('658', '7', '82', '5.3');
INSERT INTO `listaprecio` VALUES ('659', '7', '83', '13');
INSERT INTO `listaprecio` VALUES ('660', '7', '84', '16.9');
INSERT INTO `listaprecio` VALUES ('661', '7', '85', '13.9');
INSERT INTO `listaprecio` VALUES ('662', '7', '86', '18.4');
INSERT INTO `listaprecio` VALUES ('663', '7', '87', '9.9');
INSERT INTO `listaprecio` VALUES ('664', '7', '88', '12.3');
INSERT INTO `listaprecio` VALUES ('665', '7', '89', '10.6');
INSERT INTO `listaprecio` VALUES ('666', '7', '90', '13.4');
INSERT INTO `listaprecio` VALUES ('667', '7', '91', '6.5');
INSERT INTO `listaprecio` VALUES ('668', '7', '92', '5.5');
INSERT INTO `listaprecio` VALUES ('669', '7', '93', '6.5');
INSERT INTO `listaprecio` VALUES ('670', '7', '94', '0.25');
INSERT INTO `listaprecio` VALUES ('671', '7', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('672', '1', '95', '1.3');
INSERT INTO `listaprecio` VALUES ('673', '2', '95', '0.45');
INSERT INTO `listaprecio` VALUES ('674', '3', '95', '0.45');
INSERT INTO `listaprecio` VALUES ('675', '4', '95', '0.45');
INSERT INTO `listaprecio` VALUES ('676', '5', '95', '0.45');
INSERT INTO `listaprecio` VALUES ('677', '6', '95', '0.45');
INSERT INTO `listaprecio` VALUES ('678', '7', '95', '0.45');
INSERT INTO `listaprecio` VALUES ('679', '1', '103', '9.9');
INSERT INTO `listaprecio` VALUES ('680', '2', '103', '9.9');
INSERT INTO `listaprecio` VALUES ('681', '3', '103', '9.9');
INSERT INTO `listaprecio` VALUES ('682', '4', '103', '9.9');
INSERT INTO `listaprecio` VALUES ('683', '5', '103', '9.9');
INSERT INTO `listaprecio` VALUES ('684', '6', '103', '9.9');
INSERT INTO `listaprecio` VALUES ('685', '7', '103', '9.9');
INSERT INTO `listaprecio` VALUES ('686', '1', '104', '9.8');
INSERT INTO `listaprecio` VALUES ('687', '2', '104', '9.8');
INSERT INTO `listaprecio` VALUES ('688', '3', '104', '9.8');
INSERT INTO `listaprecio` VALUES ('689', '4', '104', '9.8');
INSERT INTO `listaprecio` VALUES ('690', '5', '104', '9.8');
INSERT INTO `listaprecio` VALUES ('691', '6', '104', '9.8');
INSERT INTO `listaprecio` VALUES ('692', '7', '104', '9.8');
INSERT INTO `listaprecio` VALUES ('693', '1', '105', '9.25');
INSERT INTO `listaprecio` VALUES ('694', '2', '105', '9.25');
INSERT INTO `listaprecio` VALUES ('695', '3', '105', '9.25');
INSERT INTO `listaprecio` VALUES ('696', '4', '105', '9.25');
INSERT INTO `listaprecio` VALUES ('697', '5', '105', '9.25');
INSERT INTO `listaprecio` VALUES ('698', '6', '105', '9.25');
INSERT INTO `listaprecio` VALUES ('699', '7', '105', '9.25');
INSERT INTO `listaprecio` VALUES ('700', '1', '106', '9.25');
INSERT INTO `listaprecio` VALUES ('701', '2', '106', '9.25');
INSERT INTO `listaprecio` VALUES ('702', '3', '106', '9.25');
INSERT INTO `listaprecio` VALUES ('703', '4', '106', '9.25');
INSERT INTO `listaprecio` VALUES ('704', '5', '106', '9.25');
INSERT INTO `listaprecio` VALUES ('705', '6', '106', '9.25');
INSERT INTO `listaprecio` VALUES ('706', '7', '106', '9.25');
INSERT INTO `listaprecio` VALUES ('707', '1', '107', '9.25');
INSERT INTO `listaprecio` VALUES ('708', '2', '107', '9.25');
INSERT INTO `listaprecio` VALUES ('709', '3', '107', '9.25');
INSERT INTO `listaprecio` VALUES ('710', '4', '107', '9.25');
INSERT INTO `listaprecio` VALUES ('711', '5', '107', '9.25');
INSERT INTO `listaprecio` VALUES ('712', '6', '107', '9.25');
INSERT INTO `listaprecio` VALUES ('713', '7', '107', '9.25');
INSERT INTO `listaprecio` VALUES ('714', '1', '108', '9.25');
INSERT INTO `listaprecio` VALUES ('715', '2', '108', '9.25');
INSERT INTO `listaprecio` VALUES ('716', '3', '108', '9.25');
INSERT INTO `listaprecio` VALUES ('717', '4', '108', '9.25');
INSERT INTO `listaprecio` VALUES ('718', '5', '108', '9.25');
INSERT INTO `listaprecio` VALUES ('719', '6', '108', '9.25');
INSERT INTO `listaprecio` VALUES ('720', '7', '108', '9.25');
INSERT INTO `listaprecio` VALUES ('721', '1', '109', '9.25');
INSERT INTO `listaprecio` VALUES ('722', '2', '109', '9.25');
INSERT INTO `listaprecio` VALUES ('723', '3', '109', '9.25');
INSERT INTO `listaprecio` VALUES ('724', '4', '109', '9.25');
INSERT INTO `listaprecio` VALUES ('725', '5', '109', '9.25');
INSERT INTO `listaprecio` VALUES ('726', '6', '109', '9.25');
INSERT INTO `listaprecio` VALUES ('727', '7', '109', '9.25');
INSERT INTO `listaprecio` VALUES ('728', '1', '110', '9.25');
INSERT INTO `listaprecio` VALUES ('729', '2', '110', '9.25');
INSERT INTO `listaprecio` VALUES ('730', '3', '110', '9.25');
INSERT INTO `listaprecio` VALUES ('731', '4', '110', '9.25');
INSERT INTO `listaprecio` VALUES ('732', '5', '110', '9.25');
INSERT INTO `listaprecio` VALUES ('733', '6', '110', '9.25');
INSERT INTO `listaprecio` VALUES ('734', '7', '110', '9.25');
#
#
#
#
#  Vaciado de tabla `mes` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `mes`;
#
#
#  Estructura de la tabla `mes` 
# ------------------------------------- 
#
#
CREATE TABLE `mes` (
  `idmes` bigint(10) NOT NULL AUTO_INCREMENT,
  `nombremes` varchar(15) DEFAULT NULL,
  `idtrimestre` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idmes`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `mes` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `numfact` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `numfact`;
#
#
#  Estructura de la tabla `numfact` 
# ------------------------------------- 
#
#
CREATE TABLE `numfact` (
  `idnumfact` int(11) NOT NULL AUTO_INCREMENT,
  `num` bigint(20) NOT NULL,
  PRIMARY KEY (`idnumfact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `numfact` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `producto` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `producto`;
#
#
#  Estructura de la tabla `producto` 
# ------------------------------------- 
#
#
CREATE TABLE `producto` (
  `idproducto` bigint(10) NOT NULL AUTO_INCREMENT,
  `iva` float NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precioref` float NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `producto` 
# ------------------------------------- 
#
#
INSERT INTO `producto` VALUES ('1', '2', 'PAN-BARRA/UD', '0.5');
INSERT INTO `producto` VALUES ('2', '2', 'B.TOSTADA', '0.26');
INSERT INTO `producto` VALUES ('3', '2', 'B-TAPA', '0.18');
INSERT INTO `producto` VALUES ('4', '1', 'BOLLO MANZANA', '0.64');
INSERT INTO `producto` VALUES ('5', '1', 'ROSQUILLAS DULCE', '0.4');
INSERT INTO `producto` VALUES ('6', '1', 'BOLSA ROSQUILLA', '1.25');
INSERT INTO `producto` VALUES ('7', '1', 'CHINOS', '0.64');
INSERT INTO `producto` VALUES ('8', '1', 'CROASANT-CHOCO', '0.64');
INSERT INTO `producto` VALUES ('9', '1', 'CROASANT-SIN', '0.64');
INSERT INTO `producto` VALUES ('10', '1', 'BREZEL&nbsp;CHOCO&nbsp;-CREMA', '0.86');
INSERT INTO `producto` VALUES ('11', '1', 'CROASANT PEQUEÑO', '0.4');
INSERT INTO `producto` VALUES ('12', '1', 'BOLLO-MERENGUE', '0.65');
INSERT INTO `producto` VALUES ('13', '1', 'BOLLERIA', '0.64');
INSERT INTO `producto` VALUES ('14', '1', 'NAPOLITANA Y CARACOLAS', '0.86');
INSERT INTO `producto` VALUES ('15', '1', 'ENSAIMADA', '0.75');
INSERT INTO `producto` VALUES ('16', '1', 'HOJALDRES', '0.98');
INSERT INTO `producto` VALUES ('17', '1', 'SUSO CREMA', '1.05');
INSERT INTO `producto` VALUES ('18', '1', 'SUSO CHOCO', '0.64');
INSERT INTO `producto` VALUES ('19', '1', 'PALMERA CREMA', '0.64');
INSERT INTO `producto` VALUES ('20', '1', 'PALMERA CHOCO', '0.98');
INSERT INTO `producto` VALUES ('21', '1', 'DONUTS CHOCO', '0.69');
INSERT INTO `producto` VALUES ('22', '1', 'DONUTS AZÚCAR', '0.69');
INSERT INTO `producto` VALUES ('23', '1', 'BALLONESA', '0.98');
INSERT INTO `producto` VALUES ('24', '1', 'HOJALDRITAS&nbsp;DE CHOCO', '0.98');
INSERT INTO `producto` VALUES ('25', '1', 'CAÑAS CREMA', '0.98');
INSERT INTO `producto` VALUES ('26', '1', 'CAÑAS CABELLO', '0.98');
INSERT INTO `producto` VALUES ('27', '1', 'CAÑAS CHOCO', '0.98');
INSERT INTO `producto` VALUES ('28', '1', 'PANALES CREMA', '0.98');
INSERT INTO `producto` VALUES ('29', '1', 'PANAL BEICON', '0.98');
INSERT INTO `producto` VALUES ('30', '1', 'PASTELES MANZANA', '0.98');
INSERT INTO `producto` VALUES ('31', '1', 'TRENZAS DE NUECES', '0.98');
INSERT INTO `producto` VALUES ('32', '1', 'TRENZAS DE CHOCO', '0.98');
INSERT INTO `producto` VALUES ('33', '1', 'TORTAS HOJALDRE', '0.98');
INSERT INTO `producto` VALUES ('34', '1', 'PAÑUELO CABELLO', '0.98');
INSERT INTO `producto` VALUES ('35', '1', 'PAÑUELO CREMA', '0.98');
INSERT INTO `producto` VALUES ('36', '1', 'PAÑUELO ATÚN', '0.98');
INSERT INTO `producto` VALUES ('37', '1', 'PAÑUELO VERDURA', '0.98');
INSERT INTO `producto` VALUES ('38', '1', 'PIZZAS', '1.09');
INSERT INTO `producto` VALUES ('39', '1', 'PANINIS', '1.09');
INSERT INTO `producto` VALUES ('40', '1', 'ALFAJORES', '0.9');
INSERT INTO `producto` VALUES ('41', '1', 'PAN GRIEGO', '0.64');
INSERT INTO `producto` VALUES ('42', '1', 'PASTEL DE CHOCO Y NARANJA', '0.86');
INSERT INTO `producto` VALUES ('43', '1', 'MADRILEÑOS', '0.86');
INSERT INTO `producto` VALUES ('44', '1', 'PIONONOS', '0.86');
INSERT INTO `producto` VALUES ('45', '1', 'PASTEL CREMA', '0.86');
INSERT INTO `producto` VALUES ('46', '1', 'PASTEL NATA', '0.86');
INSERT INTO `producto` VALUES ('47', '1', 'PASTEL TRUFA', '0.86');
INSERT INTO `producto` VALUES ('48', '1', 'PASTEL SELVA NEGRA', '0.86');
INSERT INTO `producto` VALUES ('49', '1', 'PASTEL MOkA', '0.86');
INSERT INTO `producto` VALUES ('50', '1', 'PASTEL CATALANA', '0.86');
INSERT INTO `producto` VALUES ('51', '1', 'PASTEL DE MOUSE', '0.86');
INSERT INTO `producto` VALUES ('52', '1', 'PASTEL DE FRESA Y CHOCO', '0.86');
INSERT INTO `producto` VALUES ('53', '1', 'BOLAS DE TRUFA', '0.86');
INSERT INTO `producto` VALUES ('54', '1', 'PETISUT CREMA', '0.86');
INSERT INTO `producto` VALUES ('55', '1', 'PETISUT NATA', '0.86');
INSERT INTO `producto` VALUES ('56', '1', 'TOCINO', '0.86');
INSERT INTO `producto` VALUES ('57', '1', 'CALATRAVA', '0.86');
INSERT INTO `producto` VALUES ('58', '1', 'GLASEADO', '0.86');
INSERT INTO `producto` VALUES ('59', '1', 'MILHOJAS', '0.86');
INSERT INTO `producto` VALUES ('60', '1', 'MILHOJAS NATA', '0.86');
INSERT INTO `producto` VALUES ('61', '1', 'MEDIAS LUNAS', '0.86');
INSERT INTO `producto` VALUES ('62', '1', 'MEDIAS LUNAS PEQUEÑAS', '0.6');
INSERT INTO `producto` VALUES ('63', '1', 'ANA MARíA', '0.86');
INSERT INTO `producto` VALUES ('64', '1', 'KILO PASTLES PEQUEÑOS', '9.5');
INSERT INTO `producto` VALUES ('65', '1', 'KILO TARTA NATA CHOCO', '9.25');
INSERT INTO `producto` VALUES ('66', '1', 'KILO TARTA TRUFA', '9.25');
INSERT INTO `producto` VALUES ('67', '1', 'TARTA DE MERENGUE', '9.25');
INSERT INTO `producto` VALUES ('68', '1', 'JUEGOS', '9');
INSERT INTO `producto` VALUES ('69', '1', 'KILO TARTA MANZANA', '9.8');
INSERT INTO `producto` VALUES ('70', '1', 'KILO BIZCOCHO', '6.8');
INSERT INTO `producto` VALUES ('71', '1', 'KILO BIZOCHO MANZANA', '8');
INSERT INTO `producto` VALUES ('72', '1', 'PLANCHA BIZCOCHO', '2.5');
INSERT INTO `producto` VALUES ('73', '1', 'KILO LECHE FRITA', '7.3');
INSERT INTO `producto` VALUES ('74', '1', 'KILO ROSCOS FRITOS', '7.5');
INSERT INTO `producto` VALUES ('75', '1', 'KILO PESTIÑOS', '8.3');
INSERT INTO `producto` VALUES ('76', '1', 'KILO BUÑUELOS', '8.75');
INSERT INTO `producto` VALUES ('77', '1', 'TORRIJAS', '1.05');
INSERT INTO `producto` VALUES ('78', '1', 'KILO SECOS', '7');
INSERT INTO `producto` VALUES ('79', '1', 'KILO SALADITOS Y EMPANADILLA', '10.4');
INSERT INTO `producto` VALUES ('80', '1', 'EMPANADILLAS', '0.65');
INSERT INTO `producto` VALUES ('81', '1', 'COCADAS-SULATANAS', '0.6');
INSERT INTO `producto` VALUES ('82', '1', 'KILO MAGDALENAS', '5.3');
INSERT INTO `producto` VALUES ('83', '1', 'ROSCÓN GRANDE SIN', '13');
INSERT INTO `producto` VALUES ('84', '1', 'ROSCÓN GRANDE NATA', '16.9');
INSERT INTO `producto` VALUES ('85', '1', 'ROSCÓN GRANDE CREMA', '13.9');
INSERT INTO `producto` VALUES ('86', '1', 'ROSCÓN GRANDE DE TRUFA', '18.4');
INSERT INTO `producto` VALUES ('87', '1', 'ROSCÓN PEQUEÑO SIN', '9.9');
INSERT INTO `producto` VALUES ('88', '1', 'ROSCÓN PEQUEÑO NATA', '12.3');
INSERT INTO `producto` VALUES ('89', '1', 'ROSCÓN PEQUEÑO DE CREMA', '10.6');
INSERT INTO `producto` VALUES ('90', '1', 'ROSCÓN PEQUEÑO TRUFA', '13.4');
INSERT INTO `producto` VALUES ('91', '1', 'MANTECADOS C/ALMENDRAS', '6.55');
INSERT INTO `producto` VALUES ('92', '1', 'KG&nbsp;MANTECADOS&nbsp;SIN', '5');
INSERT INTO `producto` VALUES ('93', '1', 'KILO MORITOS', '6.75');
INSERT INTO `producto` VALUES ('94', '1', 'MEDIAS NOCHES', '0.25');
INSERT INTO `producto` VALUES ('95', '1', 'TORTA ACEITE&nbsp;O&nbsp;MANTECA', '1.3');
INSERT INTO `producto` VALUES ('103', '1', 'TARTA COMUNIÓN', '10.3');
INSERT INTO `producto` VALUES ('104', '1', 'TRONCO&nbsp;NAVIDAD', '9.8');
INSERT INTO `producto` VALUES ('105', '1', 'TARTA&nbsp;SACHER', '9.25');
INSERT INTO `producto` VALUES ('106', '1', 'TARTA&nbsp;CHOCO&nbsp;FRESA', '9.25');
INSERT INTO `producto` VALUES ('107', '1', 'TARTA&nbsp;SELVA&nbsp;NEGRA', '9.25');
INSERT INTO `producto` VALUES ('108', '1', 'TARTA&nbsp;DE&nbsp;MOUSSE', '9.25');
INSERT INTO `producto` VALUES ('109', '1', 'BRAZO&nbsp;CHOCO&nbsp;NATA', '9.25');
INSERT INTO `producto` VALUES ('110', '1', 'BRAZO&nbsp;TRUFA', '9.25');
#
#
#
#
#  Vaciado de tabla `proveedor` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `proveedor`;
#
#
#  Estructura de la tabla `proveedor` 
# ------------------------------------- 
#
#
CREATE TABLE `proveedor` (
  `idproveedor` bigint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `iddomicilio` bigint(10) NOT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `proveedor` 
# ------------------------------------- 
#
#
INSERT INTO `proveedor` VALUES ('1', 'ANGEL&nbsp;LINARES&nbsp;MONTALBÁN', '8', 'MURCIA');
#
#
#
#
#  Vaciado de tabla `renglon_albaran` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `renglon_albaran`;
#
#
#  Estructura de la tabla `renglon_albaran` 
# ------------------------------------- 
#
#
CREATE TABLE `renglon_albaran` (
  `idrenglon` bigint(10) NOT NULL AUTO_INCREMENT,
  `idproducto` bigint(10) NOT NULL,
  `punitario` float NOT NULL,
  `cantidad` int(10) NOT NULL,
  `total` float NOT NULL,
  `idalbaran` bigint(10) NOT NULL,
  PRIMARY KEY (`idrenglon`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `renglon_albaran` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `renglon_compras` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `renglon_compras`;
#
#
#  Estructura de la tabla `renglon_compras` 
# ------------------------------------- 
#
#
CREATE TABLE `renglon_compras` (
  `idrengloncompras` bigint(10) NOT NULL AUTO_INCREMENT,
  `idmes` bigint(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `idproveedor` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`idrengloncompras`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `renglon_compras` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `renglon_factura` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `renglon_factura`;
#
#
#  Estructura de la tabla `renglon_factura` 
# ------------------------------------- 
#
#
CREATE TABLE `renglon_factura` (
  `idrenglon` bigint(20) NOT NULL AUTO_INCREMENT,
  `idproducto` bigint(20) NOT NULL,
  `punitario` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `neto` float NOT NULL,
  `idfactura` bigint(20) NOT NULL,
  `valoriva` float NOT NULL,
  `iva` float NOT NULL,
  PRIMARY KEY (`idrenglon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `renglon_factura` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `renglon_facturasimple` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `renglon_facturasimple`;
#
#
#  Estructura de la tabla `renglon_facturasimple` 
# ------------------------------------- 
#
#
CREATE TABLE `renglon_facturasimple` (
  `idrenglon` bigint(20) NOT NULL AUTO_INCREMENT,
  `producto` varchar(200) NOT NULL DEFAULT '',
  `iva` float NOT NULL,
  `neto` float NOT NULL,
  `valoriva` float NOT NULL,
  `total` float NOT NULL,
  `idfacturasimple` bigint(20) NOT NULL,
  PRIMARY KEY (`idrenglon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `renglon_facturasimple` 
# ------------------------------------- 
#
#
#
#
#
#
#  Vaciado de tabla `telefono_cliente` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `telefono_cliente`;
#
#
#  Estructura de la tabla `telefono_cliente` 
# ------------------------------------- 
#
#
CREATE TABLE `telefono_cliente` (
  `idtelefono` bigint(10) NOT NULL AUTO_INCREMENT,
  `numerotelcliente` varchar(50) NOT NULL DEFAULT '',
  `idcliente` bigint(10) NOT NULL,
  `movil` varchar(50) DEFAULT '',
  PRIMARY KEY (`idtelefono`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `telefono_cliente` 
# ------------------------------------- 
#
#
INSERT INTO `telefono_cliente` VALUES ('1', '950371098', '1', '607789077');
INSERT INTO `telefono_cliente` VALUES ('2', '950207427', '2', '607789074');
INSERT INTO `telefono_cliente` VALUES ('3', '950337527', '3', '');
INSERT INTO `telefono_cliente` VALUES ('4', '', '4', '663482308');
INSERT INTO `telefono_cliente` VALUES ('5', '', '5', '');
INSERT INTO `telefono_cliente` VALUES ('6', '', '6', '685169806');
INSERT INTO `telefono_cliente` VALUES ('7', '', '7', '');
#
#
#
#
#  Vaciado de tabla `telefono_proveedor` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `telefono_proveedor`;
#
#
#  Estructura de la tabla `telefono_proveedor` 
# ------------------------------------- 
#
#
CREATE TABLE `telefono_proveedor` (
  `idtelefono` bigint(10) NOT NULL AUTO_INCREMENT,
  `numerotelprov` varchar(50) NOT NULL DEFAULT '',
  `idproveedor` bigint(10) NOT NULL,
  `movil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtelefono`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `telefono_proveedor` 
# ------------------------------------- 
#
#
INSERT INTO `telefono_proveedor` VALUES ('1', '968476302', '1', '');
#
#
#
#
#  Vaciado de tabla `trimestre` 
# ------------------------------------- 
#
#
DROP TABLE IF EXISTS `trimestre`;
#
#
#  Estructura de la tabla `trimestre` 
# ------------------------------------- 
#
#
CREATE TABLE `trimestre` (
  `idtrimestre` bigint(10) NOT NULL AUTO_INCREMENT,
  `nombretrimestre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idtrimestre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
#
#
#  Carga de datos de la tabla `trimestre` 
# ------------------------------------- 
#
#
INSERT INTO `trimestre` VALUES ('1', '1º Trimestre');
INSERT INTO `trimestre` VALUES ('2', '2º Trimestre');
INSERT INTO `trimestre` VALUES ('3', '3º Trimestre');
INSERT INTO `trimestre` VALUES ('4', '4º Trimestre');
