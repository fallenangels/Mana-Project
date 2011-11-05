/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50509
Source Host           : localhost:3306
Source Database       : bonfire_dev

Target Server Type    : MYSQL
Target Server Version : 50509
File Encoding         : 65001

Date: 2011-11-05 05:01:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bf_activities`
-- ----------------------------
DROP TABLE IF EXISTS `bf_activities`;
CREATE TABLE `bf_activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_activities
-- ----------------------------
INSERT INTO `bf_activities` VALUES ('1', '1', 'logged in from: 127.0.0.1', 'users', '2011-10-24 06:22:15', '0');
INSERT INTO `bf_activities` VALUES ('2', '1', 'App settings saved from: 127.0.0.1', 'core', '2011-10-24 06:40:28', '0');
INSERT INTO `bf_activities` VALUES ('3', '1', 'testing : Database settings were successfully saved', 'database', '2011-10-24 06:41:08', '0');
INSERT INTO `bf_activities` VALUES ('4', '1', 'created a new User: joeplumber', 'users', '2011-10-24 06:44:24', '0');
INSERT INTO `bf_activities` VALUES ('5', '1', 'Created Module: test : 127.0.0.1', 'modulebuilder', '2011-10-24 06:56:30', '0');
INSERT INTO `bf_activities` VALUES ('6', '1', 'logged in from: 127.0.0.1', 'users', '2011-11-04 16:24:24', '0');
INSERT INTO `bf_activities` VALUES ('7', '1', 'Created Module: test_types : 127.0.0.1', 'modulebuilder', '2011-11-04 16:29:01', '0');
INSERT INTO `bf_activities` VALUES ('8', '1', 'Created record with ID: 1 : 127.0.0.1', 'test_types', '2011-11-04 16:29:44', '0');
INSERT INTO `bf_activities` VALUES ('9', '1', 'Created record with ID: 2 : 127.0.0.1', 'test_types', '2011-11-04 16:29:55', '0');
INSERT INTO `bf_activities` VALUES ('10', '1', 'Created record with ID: 3 : 127.0.0.1', 'test_types', '2011-11-04 16:30:03', '0');
INSERT INTO `bf_activities` VALUES ('11', '1', 'Created record with ID: 4 : 127.0.0.1', 'test_types', '2011-11-04 17:13:06', '0');
INSERT INTO `bf_activities` VALUES ('12', '1', 'Created record with ID: 4 : 127.0.0.1', 'test', '2011-11-04 17:14:45', '0');
INSERT INTO `bf_activities` VALUES ('13', '1', 'Updated record with ID: 1 : 127.0.0.1', 'test', '2011-11-04 17:16:28', '0');
INSERT INTO `bf_activities` VALUES ('14', '1', 'Updated record with ID: 2 : 127.0.0.1', 'test', '2011-11-04 17:16:32', '0');
INSERT INTO `bf_activities` VALUES ('15', '1', 'Updated record with ID: 3 : 127.0.0.1', 'test', '2011-11-04 17:16:36', '0');
INSERT INTO `bf_activities` VALUES ('16', '1', 'Migrate Type: test_types_ Uninstalled Version: 0 from: 127.0.0.1', 'migrations', '2011-11-05 04:46:06', '0');
INSERT INTO `bf_activities` VALUES ('17', '1', 'Migrate Type: test_types_ to Version: 1 from: 127.0.0.1', 'migrations', '2011-11-05 04:50:19', '0');
INSERT INTO `bf_activities` VALUES ('18', '1', 'Migrate Type: test_types_ to Version: 2 from: 127.0.0.1', 'migrations', '2011-11-05 04:50:25', '0');
INSERT INTO `bf_activities` VALUES ('19', '1', 'Created record with ID: 1 : 127.0.0.1', 'test_types', '2011-11-05 04:50:48', '0');
INSERT INTO `bf_activities` VALUES ('20', '1', 'Created record with ID: 2 : 127.0.0.1', 'test_types', '2011-11-05 04:50:59', '0');
INSERT INTO `bf_activities` VALUES ('21', '1', 'Created record with ID: 3 : 127.0.0.1', 'test_types', '2011-11-05 04:51:10', '0');
INSERT INTO `bf_activities` VALUES ('22', '1', 'Created record with ID: 4 : 127.0.0.1', 'test_types', '2011-11-05 04:51:16', '0');

-- ----------------------------
-- Table structure for `bf_email_queue`
-- ----------------------------
DROP TABLE IF EXISTS `bf_email_queue`;
CREATE TABLE `bf_email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(128) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_email_queue
-- ----------------------------

-- ----------------------------
-- Table structure for `bf_login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `bf_login_attempts`;
CREATE TABLE `bf_login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for `bf_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `bf_permissions`;
CREATE TABLE `bf_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_permissions
-- ----------------------------
INSERT INTO `bf_permissions` VALUES ('1', 'Site.Signin.Allow', 'Allow users to login to the site', 'active');
INSERT INTO `bf_permissions` VALUES ('2', 'Site.Content.View', 'Allow users to view the Content Context', 'active');
INSERT INTO `bf_permissions` VALUES ('3', 'Site.Reports.View', 'Allow users to view the Reports Context', 'active');
INSERT INTO `bf_permissions` VALUES ('4', 'Site.Settings.View', 'Allow users to view the Settings Context', 'active');
INSERT INTO `bf_permissions` VALUES ('5', 'Site.Developer.View', 'Allow users to view the Developer Context', 'active');
INSERT INTO `bf_permissions` VALUES ('6', 'Bonfire.Roles.Manage', 'Allow users to manage the user Roles', 'active');
INSERT INTO `bf_permissions` VALUES ('7', 'Bonfire.Users.Manage', 'Allow users to manage the site Users', 'active');
INSERT INTO `bf_permissions` VALUES ('8', 'Bonfire.Users.View', 'Allow users access to the User Settings', 'active');
INSERT INTO `bf_permissions` VALUES ('9', 'Bonfire.Users.Add', 'Allow users to add new Users', 'active');
INSERT INTO `bf_permissions` VALUES ('10', 'Bonfire.Database.Manage', 'Allow users to manage the Database settings', 'active');
INSERT INTO `bf_permissions` VALUES ('11', 'Bonfire.Emailer.Manage', 'Allow users to manage the Emailer settings', 'active');
INSERT INTO `bf_permissions` VALUES ('12', 'Bonfire.Logs.View', 'Allow users access to the Log details', 'active');
INSERT INTO `bf_permissions` VALUES ('13', 'Bonfire.Logs.Manage', 'Allow users to manage the Log files', 'active');
INSERT INTO `bf_permissions` VALUES ('14', 'Bonfire.Emailer.View', 'Allow users access to the Emailer settings', 'active');
INSERT INTO `bf_permissions` VALUES ('15', 'Site.Signin.Offline', 'Allow users to login to the site when the site is offline', 'active');
INSERT INTO `bf_permissions` VALUES ('16', 'Permissions.Settings.View', 'Allow access to view the Permissions menu unders Settings Context', 'active');
INSERT INTO `bf_permissions` VALUES ('17', 'Permissions.Settings.Manage', 'Allow access to manage the Permissions in the system', 'active');
INSERT INTO `bf_permissions` VALUES ('18', 'Bonfire.Roles.Delete', 'Allow users to delete user Roles', 'active');
INSERT INTO `bf_permissions` VALUES ('19', 'Bonfire.Modules.Add', 'Allow creation of modules with the builder.', 'active');
INSERT INTO `bf_permissions` VALUES ('20', 'Bonfire.Modules.Delete', 'Allow deletion of modules.', 'active');
INSERT INTO `bf_permissions` VALUES ('21', 'Permissions.Administrator.Manage', 'To manage the access control permissions for the Administrator role.', 'active');
INSERT INTO `bf_permissions` VALUES ('22', 'Permissions.Editor.Manage', 'To manage the access control permissions for the Editor role.', 'active');
INSERT INTO `bf_permissions` VALUES ('23', 'Permissions.Banned.Manage', 'To manage the access control permissions for the Banned role.', 'active');
INSERT INTO `bf_permissions` VALUES ('24', 'Permissions.User.Manage', 'To manage the access control permissions for the User role.', 'active');
INSERT INTO `bf_permissions` VALUES ('25', 'Permissions.Developer.Manage', 'To manage the access control permissions for the Developer role.', 'active');
INSERT INTO `bf_permissions` VALUES ('26', 'Bonfire.Activities.Manage', 'Allow users to access the Activities Reports', 'active');
INSERT INTO `bf_permissions` VALUES ('27', 'Activities.Own.View', 'To view the users own activity logs', 'active');
INSERT INTO `bf_permissions` VALUES ('28', 'Activities.Own.Delete', 'To delete the users own activity logs', 'active');
INSERT INTO `bf_permissions` VALUES ('29', 'Activities.User.View', 'To view the user activity logs', 'active');
INSERT INTO `bf_permissions` VALUES ('30', 'Activities.User.Delete', 'To delete the user activity logs, except own', 'active');
INSERT INTO `bf_permissions` VALUES ('31', 'Activities.Module.View', 'To view the module activity logs', 'active');
INSERT INTO `bf_permissions` VALUES ('32', 'Activities.Module.Delete', 'To delete the module activity logs', 'active');
INSERT INTO `bf_permissions` VALUES ('33', 'Activities.Date.View', 'To view the users own activity logs', 'active');
INSERT INTO `bf_permissions` VALUES ('34', 'Activities.Date.Delete', 'To delete the dated activity logs', 'active');
INSERT INTO `bf_permissions` VALUES ('35', 'Test.Content.View', '', 'active');
INSERT INTO `bf_permissions` VALUES ('36', 'Test.Content.Create', '', 'active');
INSERT INTO `bf_permissions` VALUES ('37', 'Test.Content.Edit', '', 'active');
INSERT INTO `bf_permissions` VALUES ('38', 'Test.Content.Delete', '', 'active');
INSERT INTO `bf_permissions` VALUES ('39', 'Test.Reports.View', '', 'active');
INSERT INTO `bf_permissions` VALUES ('40', 'Test.Reports.Create', '', 'active');
INSERT INTO `bf_permissions` VALUES ('41', 'Test.Reports.Edit', '', 'active');
INSERT INTO `bf_permissions` VALUES ('42', 'Test.Reports.Delete', '', 'active');
INSERT INTO `bf_permissions` VALUES ('43', 'Test.Settings.View', '', 'active');
INSERT INTO `bf_permissions` VALUES ('44', 'Test.Settings.Create', '', 'active');
INSERT INTO `bf_permissions` VALUES ('45', 'Test.Settings.Edit', '', 'active');
INSERT INTO `bf_permissions` VALUES ('46', 'Test.Settings.Delete', '', 'active');
INSERT INTO `bf_permissions` VALUES ('47', 'Test.Developer.View', '', 'active');
INSERT INTO `bf_permissions` VALUES ('48', 'Test.Developer.Create', '', 'active');
INSERT INTO `bf_permissions` VALUES ('49', 'Test.Developer.Edit', '', 'active');
INSERT INTO `bf_permissions` VALUES ('50', 'Test.Developer.Delete', '', 'active');
INSERT INTO `bf_permissions` VALUES ('55', 'Test_types.Content.View', '', 'active');
INSERT INTO `bf_permissions` VALUES ('56', 'Test_types.Content.Create', '', 'active');
INSERT INTO `bf_permissions` VALUES ('57', 'Test_types.Content.Edit', '', 'active');
INSERT INTO `bf_permissions` VALUES ('58', 'Test_types.Content.Delete', '', 'active');

-- ----------------------------
-- Table structure for `bf_roles`
-- ----------------------------
DROP TABLE IF EXISTS `bf_roles`;
CREATE TABLE `bf_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_roles
-- ----------------------------
INSERT INTO `bf_roles` VALUES ('1', 'Administrator', 'Has full control over every aspect of the site.', '0', '0', '/', '0');
INSERT INTO `bf_roles` VALUES ('2', 'Editor', 'Can handle day-to-day management, but does not have full power.', '0', '1', '/', '0');
INSERT INTO `bf_roles` VALUES ('3', 'Banned', 'Banned users are not allowed to sign into your site.', '0', '0', '/', '0');
INSERT INTO `bf_roles` VALUES ('4', 'User', 'This is the default user with access to login.', '1', '0', '/', '0');
INSERT INTO `bf_roles` VALUES ('6', 'Developer', 'Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.', '0', '1', '/', '0');

-- ----------------------------
-- Table structure for `bf_role_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `bf_role_permissions`;
CREATE TABLE `bf_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_role_permissions
-- ----------------------------
INSERT INTO `bf_role_permissions` VALUES ('1', '1');
INSERT INTO `bf_role_permissions` VALUES ('1', '2');
INSERT INTO `bf_role_permissions` VALUES ('1', '3');
INSERT INTO `bf_role_permissions` VALUES ('1', '4');
INSERT INTO `bf_role_permissions` VALUES ('1', '5');
INSERT INTO `bf_role_permissions` VALUES ('1', '6');
INSERT INTO `bf_role_permissions` VALUES ('1', '7');
INSERT INTO `bf_role_permissions` VALUES ('1', '8');
INSERT INTO `bf_role_permissions` VALUES ('1', '9');
INSERT INTO `bf_role_permissions` VALUES ('1', '10');
INSERT INTO `bf_role_permissions` VALUES ('1', '11');
INSERT INTO `bf_role_permissions` VALUES ('1', '12');
INSERT INTO `bf_role_permissions` VALUES ('1', '13');
INSERT INTO `bf_role_permissions` VALUES ('1', '14');
INSERT INTO `bf_role_permissions` VALUES ('1', '15');
INSERT INTO `bf_role_permissions` VALUES ('1', '16');
INSERT INTO `bf_role_permissions` VALUES ('1', '17');
INSERT INTO `bf_role_permissions` VALUES ('1', '18');
INSERT INTO `bf_role_permissions` VALUES ('1', '19');
INSERT INTO `bf_role_permissions` VALUES ('1', '20');
INSERT INTO `bf_role_permissions` VALUES ('1', '21');
INSERT INTO `bf_role_permissions` VALUES ('1', '22');
INSERT INTO `bf_role_permissions` VALUES ('1', '23');
INSERT INTO `bf_role_permissions` VALUES ('1', '24');
INSERT INTO `bf_role_permissions` VALUES ('1', '25');
INSERT INTO `bf_role_permissions` VALUES ('1', '26');
INSERT INTO `bf_role_permissions` VALUES ('1', '27');
INSERT INTO `bf_role_permissions` VALUES ('1', '28');
INSERT INTO `bf_role_permissions` VALUES ('1', '29');
INSERT INTO `bf_role_permissions` VALUES ('1', '30');
INSERT INTO `bf_role_permissions` VALUES ('1', '31');
INSERT INTO `bf_role_permissions` VALUES ('1', '32');
INSERT INTO `bf_role_permissions` VALUES ('1', '33');
INSERT INTO `bf_role_permissions` VALUES ('1', '34');
INSERT INTO `bf_role_permissions` VALUES ('1', '35');
INSERT INTO `bf_role_permissions` VALUES ('1', '36');
INSERT INTO `bf_role_permissions` VALUES ('1', '37');
INSERT INTO `bf_role_permissions` VALUES ('1', '38');
INSERT INTO `bf_role_permissions` VALUES ('1', '39');
INSERT INTO `bf_role_permissions` VALUES ('1', '40');
INSERT INTO `bf_role_permissions` VALUES ('1', '41');
INSERT INTO `bf_role_permissions` VALUES ('1', '42');
INSERT INTO `bf_role_permissions` VALUES ('1', '43');
INSERT INTO `bf_role_permissions` VALUES ('1', '44');
INSERT INTO `bf_role_permissions` VALUES ('1', '45');
INSERT INTO `bf_role_permissions` VALUES ('1', '46');
INSERT INTO `bf_role_permissions` VALUES ('1', '47');
INSERT INTO `bf_role_permissions` VALUES ('1', '48');
INSERT INTO `bf_role_permissions` VALUES ('1', '49');
INSERT INTO `bf_role_permissions` VALUES ('1', '50');
INSERT INTO `bf_role_permissions` VALUES ('1', '55');
INSERT INTO `bf_role_permissions` VALUES ('1', '56');
INSERT INTO `bf_role_permissions` VALUES ('1', '57');
INSERT INTO `bf_role_permissions` VALUES ('1', '58');
INSERT INTO `bf_role_permissions` VALUES ('2', '1');
INSERT INTO `bf_role_permissions` VALUES ('2', '2');
INSERT INTO `bf_role_permissions` VALUES ('2', '3');
INSERT INTO `bf_role_permissions` VALUES ('4', '1');
INSERT INTO `bf_role_permissions` VALUES ('6', '1');
INSERT INTO `bf_role_permissions` VALUES ('6', '2');
INSERT INTO `bf_role_permissions` VALUES ('6', '3');
INSERT INTO `bf_role_permissions` VALUES ('6', '4');
INSERT INTO `bf_role_permissions` VALUES ('6', '5');
INSERT INTO `bf_role_permissions` VALUES ('6', '6');
INSERT INTO `bf_role_permissions` VALUES ('6', '7');
INSERT INTO `bf_role_permissions` VALUES ('6', '8');
INSERT INTO `bf_role_permissions` VALUES ('6', '9');
INSERT INTO `bf_role_permissions` VALUES ('6', '10');
INSERT INTO `bf_role_permissions` VALUES ('6', '11');
INSERT INTO `bf_role_permissions` VALUES ('6', '12');
INSERT INTO `bf_role_permissions` VALUES ('6', '13');

-- ----------------------------
-- Table structure for `bf_schema_version`
-- ----------------------------
DROP TABLE IF EXISTS `bf_schema_version`;
CREATE TABLE `bf_schema_version` (
  `version` int(4) DEFAULT '0',
  `app_version` int(4) DEFAULT '0',
  `test_version` int(4) DEFAULT '0',
  `test_types_version` int(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_schema_version
-- ----------------------------
INSERT INTO `bf_schema_version` VALUES ('11', '0', '2', '2');

-- ----------------------------
-- Table structure for `bf_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `bf_sessions`;
CREATE TABLE `bf_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `bf_test`
-- ----------------------------
DROP TABLE IF EXISTS `bf_test`;
CREATE TABLE `bf_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) NOT NULL,
  `test_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_test
-- ----------------------------
INSERT INTO `bf_test` VALUES ('1', 'Something', '1');
INSERT INTO `bf_test` VALUES ('2', 'Else', '2');
INSERT INTO `bf_test` VALUES ('3', 'Or is It?', '3');
INSERT INTO `bf_test` VALUES ('4', 'Yo yo', '4');

-- ----------------------------
-- Table structure for `bf_test_types`
-- ----------------------------
DROP TABLE IF EXISTS `bf_test_types`;
CREATE TABLE `bf_test_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_types_name` varchar(255) NOT NULL,
  `test_types_description` varchar(800) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_test_types
-- ----------------------------
INSERT INTO `bf_test_types` VALUES ('1', 'Oops', 'Probably shouldn\'t accidentally uninstall modules ;D');
INSERT INTO `bf_test_types` VALUES ('2', 'Jk', 'It lets me add them back EZ PZ');
INSERT INTO `bf_test_types` VALUES ('3', 'Except', 'it deletes the table from the DB :\'(');
INSERT INTO `bf_test_types` VALUES ('4', 'Which', 'is no fun at all!');

-- ----------------------------
-- Table structure for `bf_users`
-- ----------------------------
DROP TABLE IF EXISTS `bf_users`;
CREATE TABLE `bf_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` varchar(40) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `salt` varchar(7) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(40) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `street_1` varchar(255) DEFAULT NULL,
  `street_2` varchar(255) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `reset_by` int(10) DEFAULT NULL,
  `country_iso` char(2) DEFAULT 'US',
  `state_code` char(4) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_users
-- ----------------------------
INSERT INTO `bf_users` VALUES ('1', '1', null, null, 'aikepah@gmail.com', 'aikepah', '5e1a9bbf879e1c4d6de3a640c7f73d9c397623c9', null, 'px1AWW0', '2011-11-04 16:24:24', '127.0.0.1', '2011-10-24 06:22:05', null, null, null, null, '0', null, 'US', '');
INSERT INTO `bf_users` VALUES ('2', '4', 'Joe', 'Plumber', 'plumbing@joe.com', 'joeplumber', 'c5ae5a05efdf3a1d00bcff68d58fb8717ea8de01', null, 'FA1Iyw0', '0000-00-00 00:00:00', '', '2011-10-24 06:44:24', '', '', '', null, '0', null, 'US', 'MO');

-- ----------------------------
-- Table structure for `bf_user_cookies`
-- ----------------------------
DROP TABLE IF EXISTS `bf_user_cookies`;
CREATE TABLE `bf_user_cookies` (
  `user_id` bigint(20) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bf_user_cookies
-- ----------------------------
INSERT INTO `bf_user_cookies` VALUES ('1', 'EBnWhW2qL21CXUfEMHOeytMqicdv6p7lYk4C9rBS3emhG1xuPGymENHdKGRZarMcO6ndeOxrZLo1ahSOv1DOcigsSrW4iFaVX8ICbYfx499UjC8Sd2xbHnEDNmmQ91OX', '2011-11-05 04:40:54');
