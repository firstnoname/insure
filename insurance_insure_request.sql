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

   Date: 11/22/2016 17:43:58 PM
  */

  SET NAMES utf8;
  SET FOREIGN_KEY_CHECKS = 0;

  -- ----------------------------
  --  Table structure for `insurance_insure_request`
  -- ----------------------------
  DROP TABLE IF EXISTS `insurance_insure_request`;
  CREATE TABLE `insurance_insure_request` (
    `insure_req_id` int(8) NOT NULL AUTO_INCREMENT,
    `insure_req_date` date NOT NULL,
    `insure_req_deler` varchar(35) COLLATE utf8_croatian_ci NOT NULL,
    `insure_req_code` varchar(35) COLLATE utf8_croatian_ci NOT NULL,
    `insure_req_cus_id` int(8) NOT NULL,
    `insure_req_emp_id` varchar(13) COLLATE utf8_croatian_ci NOT NULL,
    `insure_req_detail_org` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
    `insure_req_detail_new` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
    `insure_req_exchange_rate_type` int(1) NOT NULL,
    `insure_req_exchange_rate` decimal(8,2) NOT NULL,
    `insure_req_doc_retrun` int(1) NOT NULL,
    `insure_req_doc_retrun_other` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
    `insure_req_remark` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
    `insure_req_status` int(1) NOT NULL,
    PRIMARY KEY (`insure_req_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

  SET FOREIGN_KEY_CHECKS = 1;
