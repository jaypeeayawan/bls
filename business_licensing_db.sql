-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `business_licensing_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `business_licensing_db`;

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `application_type` varchar(15) NOT NULL COMMENT 'New or Renew',
  `payment_mode` varchar(15) NOT NULL COMMENT 'Annually,Semi-Annually,Quarterly',
  `date` date NOT NULL,
  `is_approved` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_applications_business1_idx` (`business_id`),
  CONSTRAINT `fk_applications_business1` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `applications_has_fees`;
CREATE TABLE `applications_has_fees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `applications_id` bigint(20) NOT NULL,
  `fees_id` bigint(20) NOT NULL,
  `penalty` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_applications_has_fees_fees1_idx` (`fees_id`),
  KEY `fk_applications_has_fees_applications1_idx` (`applications_id`),
  CONSTRAINT `fk_applications_has_fees_applications1` FOREIGN KEY (`applications_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_applications_has_fees_fees1` FOREIGN KEY (`fees_id`) REFERENCES `fees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `business`;
CREATE TABLE `business` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `person_id` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `franchise` varchar(35) NOT NULL COMMENT 'Trade Name / Franchise',
  `postal_code` varchar(25) NOT NULL,
  `st_no` varchar(10) NOT NULL,
  `barangay` varchar(35) NOT NULL,
  `municipality` varchar(35) NOT NULL,
  `province` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `DTI_SEC_CDA_registration_no` varchar(25) NOT NULL,
  `DTI_SEC_CDA_registration_date` date NOT NULL,
  `tax_incentive_entity` tinyint(4) NOT NULL,
  `government_entity` varchar(25) NOT NULL,
  `area` varchar(5) NOT NULL COMMENT 'Business Area (in sq. m.)',
  `no_employees` varchar(5) NOT NULL COMMENT 'Total No. of Employees in the Establishment',
  `no_emp_in_la_trinidad` varchar(5) NOT NULL COMMENT 'No. of Employees Residing within La Trinidad',
  `lessors_name` varchar(35) DEFAULT NULL COMMENT 'NOTE: FILL UP ONLY IF BUSINESS PLACE IS RENTED\n\nLessor''s Full Name:',
  `lessors_add` varchar(100) DEFAULT NULL COMMENT 'Lessor''s Full Address:',
  `lessors_tel` varchar(15) DEFAULT NULL COMMENT 'Lessor''s Full Telephone / Mobile No.:',
  `lessors_email_add` varchar(15) DEFAULT NULL COMMENT 'Lessor''s E-mail Address:',
  `monthly_rental` varchar(15) DEFAULT NULL COMMENT 'Monthly Rental:',
  `occupancy_permit` longblob NOT NULL COMMENT '(For New) - Office of the Building Official',
  `brgy_business_clearance` longblob NOT NULL COMMENT 'Barangay (Where business is located)',
  `sanitary_permit` longblob NOT NULL COMMENT 'Municipal Health Services Office',
  `municipal_environmental_clearance` longblob NOT NULL COMMENT 'Municipal Environment and Natural Resources Office',
  `market_clearance` longblob NOT NULL COMMENT '(For Stall Holders) - Office of the Municipal Market Administrator',
  `valid_fire_safety_certificate` longblob NOT NULL COMMENT 'Bureau of Fire Protection',
  `business_type_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `franchise_UNIQUE` (`franchise`),
  KEY `fk_business_person1_idx` (`person_id`),
  KEY `fk_business_business_type1_idx` (`business_type_id`),
  CONSTRAINT `fk_business_business_type1` FOREIGN KEY (`business_type_id`) REFERENCES `business_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_business_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `business_activity`;
CREATE TABLE `business_activity` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) NOT NULL,
  `lines_of_business` varchar(45) NOT NULL,
  `no_of_units` varchar(25) NOT NULL,
  `capitalization` varchar(25) NOT NULL COMMENT 'For new business',
  `sales_receipt` varchar(35) NOT NULL COMMENT 'For renewal (Essential or Non-Essential)',
  PRIMARY KEY (`id`),
  KEY `fk_business_activity_business1_idx` (`business_id`),
  CONSTRAINT `fk_business_activity_business1` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `business_type`;
CREATE TABLE `business_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  `description` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `business_type` (`id`, `type`, `description`) VALUES
(1,	'Single',	'Single'),
(2,	'Partnership',	'Partnership'),
(9,	'Corporation',	'Corporation description'),
(13,	'Cooperative',	'Cooperative');

DROP TABLE IF EXISTS `fees`;
CREATE TABLE `fees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `local_taxes` varchar(100) NOT NULL,
  `amount_due` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `fees` (`id`, `local_taxes`, `amount_due`) VALUES
(2,	'Tax on storage for combustibles/ flammable or explosive substance storage',	500),
(3,	'Mayor\'s permit fee',	550.5),
(4,	'Delivery trucks / vans permit fee',	0),
(7,	'Electrical inspection fee',	0);

DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `tin_no` varchar(25) NOT NULL,
  `postal_code` varchar(25) NOT NULL,
  `st_no` varchar(10) NOT NULL,
  `barangay` varchar(35) NOT NULL,
  `municipality` varchar(35) NOT NULL,
  `province` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `contact_person` varchar(35) NOT NULL COMMENT 'In case of emergency, provide name of contact person',
  `contact_person_no` varchar(15) NOT NULL COMMENT 'Telephone / Mobile No.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `person` (`id`, `lastname`, `firstname`, `middlename`, `tin_no`, `postal_code`, `st_no`, `barangay`, `municipality`, `province`, `email`, `telephone`, `mobile`, `contact_person`, `contact_person_no`) VALUES
(1,	'Ayawan',	'Jaypee',	'Es-esa',	'',	'2612',	'',	'',	'',	'',	'pasbol@yahoo.com',	'',	'09308229440',	'',	'');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `person_id` bigint(20) NOT NULL,
  `img` longblob,
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `usertype_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_users_person1_idx` (`person_id`),
  KEY `fk_users_usertype1_idx` (`usertype_id`),
  CONSTRAINT `fk_users_person1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_users_usertype1` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `person_id`, `img`, `username`, `password`, `is_active`, `usertype_id`) VALUES
(1,	1,	NULL,	'pasbol',	'd18a4fcb51aae828f40ec21b52c530c2a6dd0d2e',	1,	1);

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE `usertype` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usertype` (`id`, `usertype`) VALUES
(1,	'administrator');

-- 2018-11-16 22:42:16
