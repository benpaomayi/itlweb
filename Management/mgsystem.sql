/*
Navicat MySQL Data Transfer

Source Server         : localhost_mysql
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : mgsystem

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-07-24 09:48:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admininfo`
-- ----------------------------
DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE `admininfo` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '管理员ID号',
  `username` varchar(50) NOT NULL COMMENT '管理员名称',
  `password` varchar(50) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312 COMMENT='管理员信息表';

-- ----------------------------
-- Records of admininfo
-- ----------------------------
INSERT INTO `admininfo` VALUES ('1', 'zouxi', '202cb962ac59075b964b07152d234b70');
INSERT INTO `admininfo` VALUES ('3', '123', '202cb962ac59075b964b07152d234b70');

-- ----------------------------
-- Table structure for `conference`
-- ----------------------------
DROP TABLE IF EXISTS `conference`;
CREATE TABLE `conference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `attendee` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of conference
-- ----------------------------
INSERT INTO `conference` VALUES ('14', 'kljkjklj', 'kjlkjklj', 'kjkjkj', 'kjkljklj', 'kjkl');
INSERT INTO `conference` VALUES ('15', 'jkljklj', 'kljkklj', 'kjkklj', 'kljkkj', 'kjk');
INSERT INTO `conference` VALUES ('16', '$name', '$attendee', '$position', '$time', '$unit');
INSERT INTO `conference` VALUES ('20', '学号', '学号', '学号', '学号', '学号');
INSERT INTO `conference` VALUES ('21', '学号', '学号', '学号', '学号', '学号');
INSERT INTO `conference` VALUES ('22', '学号', '学号', '学号', '学号', '学号');
INSERT INTO `conference` VALUES ('23', '$name', '$attendee', '$position', '$time', '$unit');
INSERT INTO `conference` VALUES ('24', '$name', '$attendee', '$position', '$time', '$unit');
INSERT INTO `conference` VALUES ('25', '$name', '$attendee', '$position', '$time', '$unit');
INSERT INTO `conference` VALUES ('26', '$name', '$attendee', '$position', '$time', '$unit');
INSERT INTO `conference` VALUES ('27', '$name', 'sdf,lkjklj', '$position', '$time', '$unit');

-- ----------------------------
-- Table structure for `conference_path`
-- ----------------------------
DROP TABLE IF EXISTS `conference_path`;
CREATE TABLE `conference_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conference_id` int(11) DEFAULT NULL,
  `invitation_name` varchar(255) DEFAULT NULL,
  `invitation_path` varchar(255) DEFAULT NULL,
  `receipt_name` varchar(255) DEFAULT NULL,
  `receipt_path` varchar(255) DEFAULT NULL,
  `speech_name` varchar(255) DEFAULT NULL,
  `speech_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of conference_path
-- ----------------------------
INSERT INTO `conference_path` VALUES ('13', '14', '', '', '', '', '', '');
INSERT INTO `conference_path` VALUES ('14', '15', '', '', '', '', '', '');
INSERT INTO `conference_path` VALUES ('18', '16', 'splnproc1110.dotm', '../documents/conference/20150112073826--405.dotm', '', '', '', '');
INSERT INTO `conference_path` VALUES ('19', '23', '', '', '', '', '', '');
INSERT INTO `conference_path` VALUES ('20', '24', '', '', '', '', '', '');
INSERT INTO `conference_path` VALUES ('21', '25', '', '', '', '', '', '');
INSERT INTO `conference_path` VALUES ('22', '26', 'A Feedback Mechanism Based on Randomly Suppressed Timer for ForCES Protocol.docx', '../documents/conference/20150113081849--762.docx', '', '', '', '');
INSERT INTO `conference_path` VALUES ('23', '27', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `paper`
-- ----------------------------
DROP TABLE IF EXISTS `paper`;
CREATE TABLE `paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstauth` varchar(255) DEFAULT NULL,
  `othauth` varchar(255) DEFAULT NULL,
  `comauth` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `journame` varchar(255) DEFAULT NULL,
  `journum` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `adoptime` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `projectnum` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of paper
-- ----------------------------

-- ----------------------------
-- Table structure for `paper_path`
-- ----------------------------
DROP TABLE IF EXISTS `paper_path`;
CREATE TABLE `paper_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_id` int(11) DEFAULT NULL,
  `paperscan_name` varchar(255) DEFAULT NULL,
  `paperscan_path` varchar(255) DEFAULT NULL,
  `digitalorg_name` varchar(255) DEFAULT NULL,
  `digitalorg_path` varchar(255) DEFAULT NULL,
  `retrivalcert_name` varchar(255) DEFAULT NULL,
  `retrivalcert_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of paper_path
-- ----------------------------

-- ----------------------------
-- Table structure for `patent`
-- ----------------------------
DROP TABLE IF EXISTS `patent`;
CREATE TABLE `patent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventor` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of patent
-- ----------------------------

-- ----------------------------
-- Table structure for `patent_path`
-- ----------------------------
DROP TABLE IF EXISTS `patent_path`;
CREATE TABLE `patent_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patent_id` int(11) DEFAULT NULL,
  `appmanual_name` varchar(255) DEFAULT NULL,
  `appmanual_path` varchar(255) DEFAULT NULL,
  `authmanual_name` varchar(255) DEFAULT NULL,
  `authmanual_path` varchar(255) DEFAULT NULL,
  `authcert_name` varchar(255) DEFAULT NULL,
  `authcert_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of patent_path
-- ----------------------------

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `cooper` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `sum` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `estabtime` varchar(255) DEFAULT NULL,
  `quota` varchar(255) DEFAULT NULL,
  `papersum` int(11) DEFAULT NULL,
  `patentsum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of project
-- ----------------------------

-- ----------------------------
-- Table structure for `project_path`
-- ----------------------------
DROP TABLE IF EXISTS `project_path`;
CREATE TABLE `project_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `application_path` varchar(255) DEFAULT NULL,
  `endreport_name` varchar(255) DEFAULT NULL,
  `endreport_path` varchar(255) DEFAULT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `plan_path` varchar(255) DEFAULT NULL,
  `contract_name` varchar(255) DEFAULT NULL,
  `contract_path` varchar(255) DEFAULT NULL,
  `acceptcert_name` varchar(255) DEFAULT NULL,
  `acceptcert_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of project_path
-- ----------------------------

-- ----------------------------
-- Table structure for `reward`
-- ----------------------------
DROP TABLE IF EXISTS `reward`;
CREATE TABLE `reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `honoree` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of reward
-- ----------------------------

-- ----------------------------
-- Table structure for `reward_path`
-- ----------------------------
DROP TABLE IF EXISTS `reward_path`;
CREATE TABLE `reward_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reward_id` int(11) DEFAULT NULL,
  `rewardcert_name` varchar(255) DEFAULT NULL,
  `rewardcert_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of reward_path
-- ----------------------------

-- ----------------------------
-- Table structure for `softcpr`
-- ----------------------------
DROP TABLE IF EXISTS `softcpr`;
CREATE TABLE `softcpr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `num` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of softcpr
-- ----------------------------

-- ----------------------------
-- Table structure for `softcpr_path`
-- ----------------------------
DROP TABLE IF EXISTS `softcpr_path`;
CREATE TABLE `softcpr_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `softcpr_id` int(11) DEFAULT NULL,
  `registercert_name` varchar(255) DEFAULT NULL,
  `registercert_path` varchar(255) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `application_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of softcpr_path
-- ----------------------------

-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '用户ID号码',
  `username` varchar(50) NOT NULL COMMENT '用户姓名',
  `password` varchar(50) NOT NULL COMMENT '用户密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gb2312 COMMENT='用户信息表';

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', '111', '698d51a19d8a121ce581499d7b701668');
