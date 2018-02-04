/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : cursophp

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-01-26 21:44:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(32) DEFAULT NULL,
  `Password` varchar(128) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`UsuarioID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Martinn', '123', 'martinfierro97@hotmail.com');
