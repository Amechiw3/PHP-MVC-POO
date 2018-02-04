/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : cursophp

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-01-27 15:09:34
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
  `intentos` int(11) DEFAULT '0',
  PRIMARY KEY (`UsuarioID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'lookupdearest', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'lookupdearest@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('4', 'jailtemperature', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'jailtemperature@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('5', 'rawbeefcatena', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'rawbeefcatena@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('6', 'leavesvengeful', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'leavesvengeful@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('7', 'castrationcrummy', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'castrationcrummy@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('8', 'pipelayerwomen', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'pipelayerwomen@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('9', 'chevroletquilt', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'chevroletquilt@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('10', 'juicerhistorical', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'juicerhistorical@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('11', 'violasbah', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'violasbah@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('12', 'peelbranch', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'peelbranch@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('13', 'crowswindows', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'crowswindows@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('14', 'solsticeveal', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'solsticeveal@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('15', 'nasalrose', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'nasalrose@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('16', 'rigcube', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'rigcube@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('17', 'escapedavid', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'escapedavid@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('18', 'highlyargument', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'highlyargument@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('19', 'expandingshy', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'expandingshy@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('20', 'broccoliallen', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'broccoliallen@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('21', 'penninepinkie', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'penninepinkie@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('22', 'flowingoink', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'flowingoink@gmail.com', '0');
INSERT INTO `usuarios` VALUES ('23', 'amechiw3', '$2a$07$asxx54ahjppf45sd87a5ausysWb0G2HL.7WohIaspXYNPwhbhStr2', 'amechiw3@gmail.com', '0');
