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

 Date: 11/22/2016 17:44:03 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `insurance_insure_request_detail`
-- ----------------------------
DROP TABLE IF EXISTS `insurance_insure_request_detail`;
CREATE TABLE `insurance_insure_request_detail` (
  `insure_req_d_id` int(8) NOT NULL AUTO_INCREMENT,
  `insure_req_id` int(8) NOT NULL,
  `insure_req_type_id` int(5) NOT NULL,
  `insure_req_start` date NOT NULL,
  `insure_req_end` date NOT NULL,
  `insure_req_remark` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`insure_req_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

SET FOREIGN_KEY_CHECKS = 1;
