/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100116
 Source Host           : localhost
 Source Database       : trackdb1

 Target Server Type    : MariaDB
 Target Server Version : 100116
 File Encoding         : utf-8

 Date: 11/22/2016 17:43:52 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `insurance_insure_reguest_type`
-- ----------------------------
DROP TABLE IF EXISTS `insurance_insure_reguest_type`;
CREATE TABLE `insurance_insure_reguest_type` (
  `insure_reguest_type` int(1) NOT NULL AUTO_INCREMENT,
  `insure_reguest_name` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`insure_reguest_type`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
--  Records of `insurance_insure_reguest_type`
-- ----------------------------
BEGIN;
INSERT INTO `insurance_insure_reguest_type` VALUES ('1', 'ชื่อ-นามสกุลผู้เอาประกันภัย'), ('2', 'ที่อยู่ผู้เอาประกันภัย'), ('3', 'รายการรถยนต์ที่เอาประกันภัย'), ('4', 'วันเริ่มคุ้มครอง'), ('5', 'วันสิ้นสุด'), ('6', 'จำนวนเงินคุ้มครอง'), ('7', 'เบี้ยประกันภัย'), ('8', 'ยกเลิกกรมธรรม์'), ('9', 'จ่ายเช็คในนาม'), ('10', 'รหัสรถ'), ('11', 'ประเภทการใช้รถ'), ('12', 'อื่นๆ (โปรดระบุ)');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
