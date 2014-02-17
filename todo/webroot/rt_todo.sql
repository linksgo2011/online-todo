/*
Navicat MySQL Data Transfer

Source Server         : todo
Source Server Version : 50520
Source Host           : yinuoinfo.f3322.org:3306
Source Database       : rt_todo

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2014-02-14 14:56:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  ` title` varchar(32) NOT NULL DEFAULT '默认回复',
  `detail` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='任务评论表';

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '0', '194', '默认回复', '', '2013-07-01 19:39:57');
INSERT INTO `comments` VALUES ('2', '4', '194', '默认回复', '测试评论', '2013-07-01 19:41:12');
INSERT INTO `comments` VALUES ('3', '4', '194', '默认回复', '再来测试一下呢', '2013-07-01 19:47:00');
INSERT INTO `comments` VALUES ('4', '4', '194', '默认回复', '测试一下是否有问题', '2013-07-01 21:40:24');
INSERT INTO `comments` VALUES ('5', '5', '194', '默认回复', '看看好不好用呢？', '2013-07-02 10:17:37');
INSERT INTO `comments` VALUES ('6', '5', '194', '默认回复', '测试评论、', '2013-07-08 21:30:19');

-- ----------------------------
-- Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '编辑任务',
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COMMENT='任务日志表';

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES ('1', '分配任务', '194', '3', '2013-07-01 17:49:03');
INSERT INTO `logs` VALUES ('2', '修改任务', '194', '3', '2013-07-01 17:49:55');
INSERT INTO `logs` VALUES ('3', '修改任务', '194', '3', '2013-07-01 17:50:06');
INSERT INTO `logs` VALUES ('4', '修改任务', '194', '3', '2013-07-01 17:52:38');
INSERT INTO `logs` VALUES ('5', '修改任务', '194', '3', '2013-07-01 17:53:42');
INSERT INTO `logs` VALUES ('6', '修改任务', '194', '3', '2013-07-01 17:53:46');
INSERT INTO `logs` VALUES ('7', '修改任务', '194', '3', '2013-07-01 17:53:50');
INSERT INTO `logs` VALUES ('8', '修改任务', '194', '3', '2013-07-01 17:53:59');
INSERT INTO `logs` VALUES ('9', '修改任务', '194', '3', '2013-07-01 17:54:27');
INSERT INTO `logs` VALUES ('10', '分配任务', '194', '3', '2013-07-01 17:54:33');
INSERT INTO `logs` VALUES ('11', '取消分配任务', '194', '3', '2013-07-01 18:22:49');
INSERT INTO `logs` VALUES ('12', '分配任务', '194', '4', '2013-07-01 18:38:26');
INSERT INTO `logs` VALUES ('13', '分配任务', '194', '4', '2013-07-01 18:45:06');
INSERT INTO `logs` VALUES ('14', '修改任务', '194', '4', '2013-07-01 19:15:11');
INSERT INTO `logs` VALUES ('15', '修改任务', '194', '4', '2013-07-01 19:15:28');
INSERT INTO `logs` VALUES ('16', '修改任务', '194', '4', '2013-07-01 19:16:54');
INSERT INTO `logs` VALUES ('17', '修改任务', '194', '4', '2013-07-01 19:17:06');
INSERT INTO `logs` VALUES ('18', '修改任务', '194', '4', '2013-07-01 19:17:23');
INSERT INTO `logs` VALUES ('19', '修改任务', '194', '4', '2013-07-01 19:24:10');
INSERT INTO `logs` VALUES ('20', '分配任务', '194', '4', '2013-07-01 19:45:52');
INSERT INTO `logs` VALUES ('21', '取消分配任务', '194', '4', '2013-07-01 19:45:58');
INSERT INTO `logs` VALUES ('22', '修改任务', '194', '4', '2013-07-01 19:50:20');
INSERT INTO `logs` VALUES ('23', '更新任务', '194', '4', '2013-07-01 19:59:12');
INSERT INTO `logs` VALUES ('24', '更新任务', '194', '4', '2013-07-01 20:04:40');
INSERT INTO `logs` VALUES ('25', '分配任务', '194', '4', '2013-07-01 20:49:58');
INSERT INTO `logs` VALUES ('26', '更新任务', '194', '4', '2013-07-01 20:53:00');
INSERT INTO `logs` VALUES ('27', '更新任务', '194', '4', '2013-07-01 20:53:29');
INSERT INTO `logs` VALUES ('28', '更新任务', '194', '4', '2013-07-01 20:58:56');
INSERT INTO `logs` VALUES ('29', '更新任务', '194', '4', '2013-07-01 21:11:58');
INSERT INTO `logs` VALUES ('30', '更新任务', '194', '4', '2013-07-01 21:40:01');
INSERT INTO `logs` VALUES ('31', '取消分配任务', '194', '4', '2013-07-01 21:59:44');
INSERT INTO `logs` VALUES ('32', '分配任务', '194', '5', '2013-07-01 22:00:31');
INSERT INTO `logs` VALUES ('33', '分配任务', '194', '5', '2013-07-01 22:04:39');
INSERT INTO `logs` VALUES ('34', '更新任务', '194', '4', '2013-07-01 22:08:23');
INSERT INTO `logs` VALUES ('35', '分配任务', '194', '4', '2013-07-01 22:17:18');
INSERT INTO `logs` VALUES ('36', '更新任务', '194', '4', '2013-07-01 22:17:51');
INSERT INTO `logs` VALUES ('37', '创建任务', '194', '14', '2013-07-01 22:26:50');
INSERT INTO `logs` VALUES ('38', '分配任务', '194', '14', '2013-07-01 22:27:13');
INSERT INTO `logs` VALUES ('39', '创建任务', '167', '15', '2013-07-02 09:43:50');
INSERT INTO `logs` VALUES ('40', '分配任务', '167', '15', '2013-07-02 09:43:58');
INSERT INTO `logs` VALUES ('41', '取消分配任务', '167', '15', '2013-07-02 09:44:05');
INSERT INTO `logs` VALUES ('42', '分配任务', '167', '15', '2013-07-02 09:44:07');
INSERT INTO `logs` VALUES ('43', '取消分配任务', '167', '15', '2013-07-02 09:44:12');
INSERT INTO `logs` VALUES ('44', '分配任务', '167', '15', '2013-07-02 09:44:14');
INSERT INTO `logs` VALUES ('45', '取消分配任务', '167', '15', '2013-07-02 09:44:24');
INSERT INTO `logs` VALUES ('46', '分配任务', '167', '15', '2013-07-02 09:44:34');
INSERT INTO `logs` VALUES ('47', '分配任务', '167', '15', '2013-07-02 09:44:38');
INSERT INTO `logs` VALUES ('48', '分配任务', '167', '15', '2013-07-02 09:44:43');
INSERT INTO `logs` VALUES ('49', '取消分配任务', '167', '15', '2013-07-02 09:45:39');
INSERT INTO `logs` VALUES ('50', '取消分配任务', '167', '15', '2013-07-02 09:45:41');
INSERT INTO `logs` VALUES ('51', '取消分配任务', '167', '15', '2013-07-02 09:45:43');
INSERT INTO `logs` VALUES ('52', '分配任务', '167', '15', '2013-07-02 09:45:45');
INSERT INTO `logs` VALUES ('53', '取消分配任务', '167', '15', '2013-07-02 09:45:47');
INSERT INTO `logs` VALUES ('54', '分配任务', '167', '15', '2013-07-02 09:45:52');
INSERT INTO `logs` VALUES ('55', '分配任务', '194', '15', '2013-07-02 09:53:15');
INSERT INTO `logs` VALUES ('56', '分配任务', '194', '15', '2013-07-02 09:53:28');
INSERT INTO `logs` VALUES ('57', '拒绝任务', '194', '4', '2013-07-02 09:57:50');
INSERT INTO `logs` VALUES ('58', '分配任务', '194', '4', '2013-07-02 09:58:05');
INSERT INTO `logs` VALUES ('59', '取消分配任务', '194', '4', '2013-07-02 09:58:07');
INSERT INTO `logs` VALUES ('60', '分配任务', '167', '5', '2013-07-02 10:08:54');
INSERT INTO `logs` VALUES ('61', '分配任务', '194', '5', '2013-07-02 10:17:09');
INSERT INTO `logs` VALUES ('62', '取消分配任务', '194', '5', '2013-07-02 10:25:32');
INSERT INTO `logs` VALUES ('63', '更新任务', '194', '5', '2013-07-02 11:25:17');
INSERT INTO `logs` VALUES ('64', '创建任务', '189', '16', '2013-07-02 14:12:12');
INSERT INTO `logs` VALUES ('65', '更新任务', '189', '16', '2013-07-02 14:12:33');
INSERT INTO `logs` VALUES ('66', '分配任务', '189', '16', '2013-07-02 14:12:38');
INSERT INTO `logs` VALUES ('67', '分配任务', '189', '16', '2013-07-02 14:12:43');
INSERT INTO `logs` VALUES ('68', '分配任务', '189', '16', '2013-07-02 14:12:49');
INSERT INTO `logs` VALUES ('69', '分配任务', '189', '16', '2013-07-02 14:12:59');
INSERT INTO `logs` VALUES ('70', '分配任务', '189', '16', '2013-07-02 14:24:45');
INSERT INTO `logs` VALUES ('71', '取消分配任务', '189', '16', '2013-07-02 14:24:53');
INSERT INTO `logs` VALUES ('72', '分配任务', '194', '5', '2013-07-08 21:49:26');
INSERT INTO `logs` VALUES ('73', '0', '194', '14', '2013-07-08 23:26:18');
INSERT INTO `logs` VALUES ('74', '测试完成，结束了任务', '194', '14', '2013-07-08 23:26:35');
INSERT INTO `logs` VALUES ('75', '申请任务测试,耗时', '194', '15', '2013-07-08 23:50:59');
INSERT INTO `logs` VALUES ('76', '测试没有通过这个任务', '194', '15', '2013-07-08 23:51:24');
INSERT INTO `logs` VALUES ('77', '申请任务测试,耗时', '194', '15', '2013-07-08 23:51:43');
INSERT INTO `logs` VALUES ('78', '更新任务', '194', '14', '2013-07-08 23:53:37');
INSERT INTO `logs` VALUES ('79', '测试完成，结束了任务', '194', '14', '2013-07-08 23:53:52');
INSERT INTO `logs` VALUES ('80', '更新任务', '194', '14', '2013-07-08 23:54:50');
INSERT INTO `logs` VALUES ('81', '测试完成，结束了任务', '194', '14', '2013-07-08 23:55:07');
INSERT INTO `logs` VALUES ('82', '申请任务测试,耗时', '194', '16', '2013-07-09 00:10:57');
INSERT INTO `logs` VALUES ('83', '更新任务', '194', '16', '2013-07-09 00:11:25');
INSERT INTO `logs` VALUES ('84', '更新任务', '194', '16', '2013-07-09 00:12:57');
INSERT INTO `logs` VALUES ('85', '申请任务测试,耗时', '194', '16', '2013-07-09 00:13:17');
INSERT INTO `logs` VALUES ('86', '测试没有通过这个任务', '194', '15', '2013-07-09 00:13:31');
INSERT INTO `logs` VALUES ('87', '申请任务测试,耗时', '194', '15', '2013-07-09 00:15:27');
INSERT INTO `logs` VALUES ('88', '测试没有通过这个任务', '194', '15', '2013-07-09 00:15:34');
INSERT INTO `logs` VALUES ('89', '申请任务测试,耗时', '194', '15', '2013-07-09 00:15:42');
INSERT INTO `logs` VALUES ('90', '测试没有通过这个任务', '194', '15', '2013-07-09 00:15:55');
INSERT INTO `logs` VALUES ('91', '申请任务测试,耗时', '194', '15', '2013-07-09 00:16:00');
INSERT INTO `logs` VALUES ('92', '测试没有通过这个任务', '194', '15', '2013-07-09 00:16:29');
INSERT INTO `logs` VALUES ('93', '申请任务测试,耗时', '194', '15', '2013-07-09 00:16:38');
INSERT INTO `logs` VALUES ('94', '测试没有通过这个任务', '194', '15', '2013-07-09 00:17:30');
INSERT INTO `logs` VALUES ('95', '申请任务测试,耗时', '194', '15', '2013-07-09 00:17:36');
INSERT INTO `logs` VALUES ('96', '测试没有通过这个任务', '194', '15', '2013-07-09 00:18:17');
INSERT INTO `logs` VALUES ('97', '申请任务测试,耗时1', '194', '15', '2013-07-09 00:18:41');
INSERT INTO `logs` VALUES ('98', '测试没有通过这个任务', '194', '15', '2013-07-09 00:19:25');
INSERT INTO `logs` VALUES ('99', '更新任务', '194', '16', '2013-07-09 00:20:07');
INSERT INTO `logs` VALUES ('100', '0', '194', '16', '2013-07-09 00:24:30');
INSERT INTO `logs` VALUES ('101', '更新任务', '194', '16', '2013-07-09 00:25:23');
INSERT INTO `logs` VALUES ('102', '拒绝任务,理由为:测试一下，拒绝的任务、', '194', '16', '2013-07-09 00:25:55');

-- ----------------------------
-- Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) NOT NULL,
  `task_type` tinyint(2) NOT NULL,
  `platform` varchar(10) NOT NULL DEFAULT 'media',
  `important_level` tinyint(2) NOT NULL COMMENT '重要性',
  `priority` tinyint(2) NOT NULL COMMENT '优先级',
  `title` varchar(32) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '完成时间',
  `with_time` int(11) NOT NULL DEFAULT '0' COMMENT '用时，单位小时',
  `active` tinyint(2) NOT NULL DEFAULT '1',
  `detail` text NOT NULL,
  `reject` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='任务表';

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('3', '194', '2', 'media', '3', '4', '测试编辑任务', '2013-07-01 18:25:46', '2013-07-01 18:31:01', '2013-07-24 00:00:00', '0000-00-00 00:00:00', '0', '-1', '测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务', '');
INSERT INTO `tasks` VALUES ('4', '194', '1', 'media', '4', '5', '测试任务1', '2013-07-02 10:03:11', '2013-07-02 10:08:26', '2013-07-01 16:00:29', '0000-00-00 00:00:00', '12', '-1', '<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试<span>测试</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>', '');
INSERT INTO `tasks` VALUES ('5', '194', '1', 'media', '1', '1', '测试任务3', '2013-07-08 22:39:54', '2013-07-08 22:45:32', '2013-07-01 16:07:59', '0000-00-00 00:00:00', '0', '-1', '测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3测试任务3', '');
INSERT INTO `tasks` VALUES ('11', '0', '2', 'media', '3', '4', '测试任务', '2013-07-01 17:53:42', '2013-07-01 17:53:42', '2013-07-24 00:00:00', '0000-00-00 00:00:00', '0', '5', '测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务测试任务', '');
INSERT INTO `tasks` VALUES ('14', '194', '4', 'media', '4', '5', '测试任务营销工作', '2013-07-08 23:49:12', '2013-07-08 23:54:50', '2013-07-26 08:00:00', '2013-07-08 23:07:07', '0', '4', '<img src=\"http://oss.63810.com/mogilefs/todo/res/20130701222644_29656.jpg\" alt=\"\" />', '');
INSERT INTO `tasks` VALUES ('15', '167', '3', 'media', '4', '1', '测试', '2013-07-02 09:48:14', '2013-07-02 09:53:28', '2013-07-27 00:00:00', '0000-00-00 00:00:00', '1', '6', '测试系统', '');
INSERT INTO `tasks` VALUES ('16', '189', '1', 'media', '1', '1', 'BUG 1111', '2013-07-09 00:19:45', '2013-07-09 00:25:23', '2013-07-31 14:06:58', '0000-00-00 00:00:00', '0', '5', 'ADASD', '测试一下，拒绝的任务、、');

-- ----------------------------
-- Table structure for `task_assigns`
-- ----------------------------
DROP TABLE IF EXISTS `task_assigns`;
CREATE TABLE `task_assigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='任务分配表';

-- ----------------------------
-- Records of task_assigns
-- ----------------------------
INSERT INTO `task_assigns` VALUES ('1', '3', '184', '2013-07-01 17:37:23');
INSERT INTO `task_assigns` VALUES ('2', '3', '182', '2013-07-01 17:49:03');
INSERT INTO `task_assigns` VALUES ('5', '4', '182', '2013-07-01 21:17:17');
INSERT INTO `task_assigns` VALUES ('6', '4', '149', '2013-07-01 19:45:52');
INSERT INTO `task_assigns` VALUES ('8', '5', '10', '2013-07-01 22:00:31');
INSERT INTO `task_assigns` VALUES ('9', '5', '194', '2013-07-01 22:04:39');
INSERT INTO `task_assigns` VALUES ('10', '4', '194', '2013-07-01 22:17:18');
INSERT INTO `task_assigns` VALUES ('11', '14', '194', '2013-07-01 22:27:13');
INSERT INTO `task_assigns` VALUES ('19', '15', '167', '2013-07-02 09:45:52');
INSERT INTO `task_assigns` VALUES ('20', '15', '149', '2013-07-02 09:53:15');
INSERT INTO `task_assigns` VALUES ('21', '15', '162', '2013-07-02 09:53:28');
INSERT INTO `task_assigns` VALUES ('23', '5', '167', '2013-07-02 10:08:54');
INSERT INTO `task_assigns` VALUES ('26', '16', '166', '2013-07-02 14:12:43');
INSERT INTO `task_assigns` VALUES ('27', '16', '194', '2013-07-02 14:12:48');
INSERT INTO `task_assigns` VALUES ('28', '16', '181', '2013-07-02 14:12:58');
INSERT INTO `task_assigns` VALUES ('29', '16', '182', '2013-07-02 14:24:44');
INSERT INTO `task_assigns` VALUES ('30', '5', '1', '2013-07-08 21:49:26');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `usr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `email` varchar(200) NOT NULL COMMENT '电子邮件',
  `usrname` varchar(100) NOT NULL COMMENT '用户名',
  `password` varchar(200) NOT NULL COMMENT '密码',
  `bank_usrname` char(100) NOT NULL COMMENT '银行账户名',
  `bank_num` varchar(50) NOT NULL DEFAULT '0' COMMENT '卡号',
  `type` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '用户身份',
  `project` int(11) NOT NULL DEFAULT '2' COMMENT '1：短信，2二维码，3语音，4流量',
  `cid_number` char(20) NOT NULL,
  `mobile_number` char(20) NOT NULL,
  `addtime` bigint(12) unsigned NOT NULL DEFAULT '0' COMMENT '加入时间',
  `active` smallint(1) NOT NULL DEFAULT '1' COMMENT '是否被删除的',
  `insurance_type` int(1) unsigned NOT NULL DEFAULT '1',
  `is_buy_insurance` smallint(6) NOT NULL DEFAULT '2' COMMENT '是否购买社保',
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `email` (`email`),
  KEY `type` (`type`,`project`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'james@yinuoinfo.com', '郑金君', '123456', '郑金君', '51029028', '5', '2', '123456', '15608182888', '0', '1', '1', '1');
INSERT INTO `user` VALUES ('4', 'zhuyalong@yinuoinfo.com', '朱亚龙', '123456', '朱亚龙', '6225880286513248', '1', '1', '123456', '15928125481', '0', '1', '1', '1');
INSERT INTO `user` VALUES ('10', 'liny@yinuoinfo.com', '林洋', '123456', '林洋', '6225880285461993', '2', '2', '123456', '18602825808', '0', '1', '1', '1');
INSERT INTO `user` VALUES ('11', 'wsy@yinuoinfo.com', '伍仕勇', '123456', '伍仕勇', '6225880286101218 ', '4', '2', '123456', '13551007911', '0', '0', '1', '1');
INSERT INTO `user` VALUES ('13', 'csj@yinuoinfo.com', '陈苏景', '123456', '陈苏景', '6225880284360485', '2', '2', '123456', '15982281382', '0', '0', '1', '1');
INSERT INTO `user` VALUES ('139', 'zhuronggui@yinuoinfo.com', '朱荣贵', '123456', '朱荣贵', '6225881285756473', '1', '2', '123456', '', '1346644372', '0', '1', '2');
INSERT INTO `user` VALUES ('73', 'zhangqiwen@yinuoinfo.com', '张启文', '123456', '张启文', '6225881280893149', '2', '1', '123456', '13980013280', '1272970469', '1', '2', '2');
INSERT INTO `user` VALUES ('129', 'wenxue@yinuoinfo.com', '温雪', '123456', '', '0', '1', '2', '123456', '', '1337226128', '0', '1', '2');
INSERT INTO `user` VALUES ('130', 'chenrubin@yinuoinfo.com', '陈如宾', '123456', '', '0', '1', '2', '123456', '', '1337226268', '0', '1', '2');
INSERT INTO `user` VALUES ('131', 'zhoushimei@yinuoinfo.com', '周诗梅', '123456', '周诗梅', '6225881285171483', '1', '2', '123456', '13666110421', '1337226394', '0', '1', '2');
INSERT INTO `user` VALUES ('132', 'wangchuan@yinuoinfo.com', '王川', '123456', '', '0', '1', '2', '123456', '', '1339036573', '0', '1', '2');
INSERT INTO `user` VALUES ('133', 'wanghongqi@yinuoinfo.com', '王洪其', '123456', '黄龙', '6225881284840831', '1', '2', '123456', '18628082318', '1339404128', '0', '1', '2');
INSERT INTO `user` VALUES ('134', 'shangguirong@yinuoinfo.com', '尚桂荣', '123456', '', '0', '1', '2', '123456', '15882064572', '1339404258', '0', '1', '2');
INSERT INTO `user` VALUES ('135', 'tangqiaofeng@yinuoinfo.com', '唐巧凤', '123456', '唐巧凤', '6225880289583172', '1', '1', '123456', '13558770851', '1342494126', '1', '1', '1');
INSERT INTO `user` VALUES ('136', 'haowenbo@yinuoinfo.com', '郝文博', '123456', '郝文博', '6225880288694772', '1', '2', '123456', '13990026971', '1342496969', '0', '1', '2');
INSERT INTO `user` VALUES ('137', 'liusuxiao@yinuoinfo.com', '刘稣啸', '123456', '', '0', '1', '2', '123456', '18080055040', '1343099703', '0', '1', '2');
INSERT INTO `user` VALUES ('138', 'xielanlan@yinuoinfo.com', '谢兰兰', '123456', '', '0', '1', '2', '123456', '', '1343974354', '0', '1', '2');
INSERT INTO `user` VALUES ('140', 'wangsong@yinuoinfo.com', '王松', '123456', '王松', '6225881285870936', '1', '2', '123456', '', '1346644976', '0', '1', '2');
INSERT INTO `user` VALUES ('141', 'zhenghaozhong@yinuoinfo.com', '郑皓中', '123456', '郑皓中', '6225881285893458', '1', '2', '123456', '', '1346645013', '0', '1', '2');
INSERT INTO `user` VALUES ('142', 'zhangxiangwei@yinuoinfo.com', '张祥围', '123456', '', '0', '2', '2', '123456', '15928442421', '1351665163', '0', '1', '2');
INSERT INTO `user` VALUES ('143', 'heguangyuan@yinuoinfo.com', '何光远', '123456', '何光远', '6225881284146775 ', '2', '2', '123456', '13618015663', '1351742693', '0', '1', '1');
INSERT INTO `user` VALUES ('144', 'huangjuming@yinuoinfo.com', '黄举明', '123456', '', '0', '2', '2', '123456', '18228019636', '1352172405', '0', '1', '2');
INSERT INTO `user` VALUES ('145', 'wangyong@yinuoinfo.com', '王勇', '123456', '', '0', '1', '2', '123456', '13551213224', '1352346321', '0', '1', '2');
INSERT INTO `user` VALUES ('146', 'luoxiangkai@yinuoinfo.com', '罗香锴', '123456', '罗香锴', '6214830280161836 ', '2', '2', '123456', '15528087335', '1352346640', '0', '1', '2');
INSERT INTO `user` VALUES ('147', 'duyulei@yinuoinfo.com', '杜玉磊', '123456', '', '0', '2', '2', '123456', '18200495958', '1352347040', '0', '1', '2');
INSERT INTO `user` VALUES ('148', 'luoxuelian@yinuoinfo.com', '罗雪莲', '123456', '罗雪莲', ' 6225881286348809 ', '1', '1', '123456', '15108476327', '1352985533', '1', '1', '1');
INSERT INTO `user` VALUES ('149', 'lianghuan@yinuoinfo.com', '梁欢', '123456', '梁欢', '6214830280030585 ', '6', '2', '123456', '18228028545', '1353042766', '1', '1', '2');
INSERT INTO `user` VALUES ('150', 'yangjing@yinuoinfo.com', '杨静', '123456', '', '0', '1', '2', '123456', '15828153494', '1353316995', '0', '1', '2');
INSERT INTO `user` VALUES ('151', 'guixun@yinuoinfo.com', '桂勋', '123456', '', '0', '2', '2', '123456', '', '1353332630', '0', '1', '2');
INSERT INTO `user` VALUES ('152', 'liujianlin@yinuoinfo.com', '刘建林', '123456', '刘建林', ' 6225881286349179', '2', '2', '123456', '18780054717', '1353639833', '1', '1', '1');
INSERT INTO `user` VALUES ('153', 'zhangjian@yinuoinfo.com', '张建', '123456', '', '0', '1', '2', '123456', '15828384080', '1353909287', '0', '1', '2');
INSERT INTO `user` VALUES ('154', 'zhangyilin@yinuoinfo.com', '张艺琳 ', '123456', '张艺琳', '6225881284496063 ', '1', '1', '123456', '15882071403', '1354512564', '1', '1', '2');
INSERT INTO `user` VALUES ('161', 'huangwarong@yinuoinfo.com', '黄万荣', '123456', '', '0', '1', '2', '123456', '18628196182', '1361496528', '0', '1', '2');
INSERT INTO `user` VALUES ('155', 'chengang@yinuoinfo.com', '陈刚', '123456', '', '0', '1', '2', '123456', '15882497304', '1354595265', '0', '1', '2');
INSERT INTO `user` VALUES ('156', 'lianganbo@yinuoinfo.com', '梁安波', '123456', '', '0', '1', '2', '123456', '13983423095', '1355124888', '0', '1', '2');
INSERT INTO `user` VALUES ('157', 'lixia@yinuoinfo.com', '黎霞', '123456', '', '0', '1', '2', '123456', '15202889238', '1355124984', '0', '1', '2');
INSERT INTO `user` VALUES ('158', 'wenhuanyong@yinuoinfo.com', '文焕勇 ', '123456', '文焕勇', '6225881286409031', '1', '2', '123456', '18208171125', '1355125079', '0', '1', '2');
INSERT INTO `user` VALUES ('159', 'tangdong@yinuoinfo.com', '唐东', '123456', '唐东', '6225881286166318', '2', '2', '123456', '15881024126', '1355985912', '0', '1', '2');
INSERT INTO `user` VALUES ('160', 'liwenjian@yinuoinfo.com', '李文剑', '123456', '李文剑', '6225881282619617', '1', '2', '123456', '13550159693', '1357282626', '1', '1', '1');
INSERT INTO `user` VALUES ('162', 'linning@yinuoinfo.com', '林宁', '123456', '林宁', '6225881286717755 ', '2', '2', '123456', '13668193903', '1361844509', '1', '1', '1');
INSERT INTO `user` VALUES ('163', 'jiashunran@yinuoinfo.com', '贾顺然', '123456', '贾顺然', '6225881286789606 ', '2', '2', '123456', '13667303036', '1362104964', '0', '1', '2');
INSERT INTO `user` VALUES ('164', 'zhanghaibing@yinuoinfo.com', '张海兵', '123456', '张海兵', '6214830280163659 ', '1', '2', '123456', '15208463514', '1362105012', '0', '1', '2');
INSERT INTO `user` VALUES ('165', 'yucheng@yinuoinfo.com', '余成', '123456', '余成', '6214830280314575', '2', '2', '123456', '13088025265', '1362105048', '1', '1', '1');
INSERT INTO `user` VALUES ('166', 'xiongyaqin@yinuoinfo.com', '熊雅琴', '123456', '熊雅琴', '6225881282527786', '1', '2', '123456', '13699017019', '1362363366', '1', '1', '2');
INSERT INTO `user` VALUES ('167', 'luoyicheng@yinuoinfo.com', '罗易成', '123456', '罗易成', '6225881286841969', '6', '2', '123456', '13056466492', '1362363527', '1', '1', '1');
INSERT INTO `user` VALUES ('168', 'wulei@yinuoinfo.com', '吴雷     ', '123456', '吴雷', '6225881286841365', '1', '2', '123456', '18681208212', '1362706537', '1', '1', '2');
INSERT INTO `user` VALUES ('169', 'jiangzhuxuan@yinuoinfo.com', '姜铸轩', '123456', '姜铸轩', '6225888570010755', '1', '2', '123456', '13688355220', '1362983600', '1', '1', '2');
INSERT INTO `user` VALUES ('170', 'liujiao@yinuoinfo.com', '刘娇', '123456', '刘娇', '6214830280315929 ', '1', '2', '123456', '15928153933', '1362983654', '0', '1', '2');
INSERT INTO `user` VALUES ('171', 'liai@yinuoinfo.com', '李艾', '123456', '', '0', '1', '2', '123456', '18328386241', '1363142460', '0', '1', '2');
INSERT INTO `user` VALUES ('172', 'chengxin@yinuoinfo.com', '陈欣', '123456', '', '0', '1', '2', '123456', '18683698972', '1363142558', '0', '1', '2');
INSERT INTO `user` VALUES ('173', 'zhengyuyang@yinuoinfo.com', '郑宇洋', '123456', '', '0', '2', '2', '123456', '15390415679', '1364885198', '0', '1', '2');
INSERT INTO `user` VALUES ('174', 'chencong@yinuoinfo.com', '陈聪', '123456', '', '0', '2', '2', '123456', '13688164282', '1365750552', '0', '1', '2');
INSERT INTO `user` VALUES ('175', 'chenqiguo@yinuoinfo.com', '陈淇国', '123456', '', '0', '2', '2', '123456', '18280153972', '1366341008', '0', '1', '2');
INSERT INTO `user` VALUES ('176', 'yangyan@yinuoinfo.com', '杨燕', '123456', '杨燕', '6225881287006752', '1', '2', '123456', '15002812847', '1366342947', '0', '1', '2');
INSERT INTO `user` VALUES ('177', 'liuhong@yinuoinfo.com', '刘洪', '123456', '', '0', '2', '2', '123456', '13198556376', '1367057808', '0', '1', '2');
INSERT INTO `user` VALUES ('178', 'jiangdejiao@yinuoinfo.com', '蒋德佼', '123456', '蒋德佼', '6225881287039365', '2', '2', '123456', '13438804405', '1367473418', '0', '1', '2');
INSERT INTO `user` VALUES ('179', 'yanzhiwei@yinuoinfo.com', '闫志威', '123456', '', '0', '2', '2', '123456', '18612178247', '1367473595', '0', '1', '2');
INSERT INTO `user` VALUES ('180', 'zengdebo@yinuoinfo.com', '曾德波', '123456', '曾德波', '6214830280365544', '2', '2', '123456', '18702851769', '1367473734', '0', '1', '2');
INSERT INTO `user` VALUES ('181', 'liuchunli@yinuoinfo.com', '刘春利', '123456', '刘春利', '6225881287044811', '6', '2', '123456', '15198298939', '1367844083', '1', '1', '2');
INSERT INTO `user` VALUES ('182', 'yangpeng@yinuoinfo.com', '杨鹏', '123456', '杨鹏', '6225881285659651', '6', '2', '123456', '13699440944', '1367890110', '1', '1', '2');
INSERT INTO `user` VALUES ('183', 'tangjiajun@yinuoinfo.com', '唐家均', '123456', '唐家均', '6225881286614747', '1', '3', '123456', '18018731421', '1368450884', '1', '1', '2');
INSERT INTO `user` VALUES ('184', 'yandonghua@yinuoinfo.com', '严冬华', '123456', '严冬华', '6225881287175912', '2', '2', '123456', '13540220246', '1368451432', '1', '1', '2');
INSERT INTO `user` VALUES ('185', 'dengqiurong@yinuoinfo.com', '邓秋荣', '123456', '邓秋荣', '6225881287135999', '6', '2', '123456', '18692966696', '1368502160', '0', '1', '2');
INSERT INTO `user` VALUES ('186', 'wugang@yinuoinfo.com', '吴刚', '123456', '', '0', '2', '2', '123456', '15680797986', '1368502290', '0', '1', '2');
INSERT INTO `user` VALUES ('187', 'fangbo@yinuoinfo.com', '方波', '123456', '方波', '6225881286954788', '2', '2', '123456', '15102880504', '1369276903', '1', '1', '2');
INSERT INTO `user` VALUES ('188', 'yangpan@yinuoinfo.com', '杨攀', '123456', '杨攀', '6226090280095379', '1', '2', '123456', '18615776522', '1369720556', '1', '1', '2');
INSERT INTO `user` VALUES ('127', 'zhangdan@yinuoinfo.com', '张丹', '123456', '', '0', '1', '4', '123456', '15882259750', '1330689334', '1', '1', '1');
INSERT INTO `user` VALUES ('189', 'wuwei@yinuoinfo.com', '忤伟', '123456', '', '0', '6', '2', '123456', '18600016954', '1371362313', '1', '1', '2');
INSERT INTO `user` VALUES ('190', 'guxiaolan@yinuoinfo.com', '辜小兰', '123456', '', '0', '6', '2', '123456', '13699427860', '1371362401', '1', '1', '2');
INSERT INTO `user` VALUES ('191', 'zhanglaiwu@yinuoinfo.com', '张来武', '123456', '', '0', '1', '2', '123456', '18782434419', '1371362476', '1', '1', '2');
INSERT INTO `user` VALUES ('192', 'zengjuncai@yinuoinfo.com', '曾俊材', '123456', '', '0', '2', '2', '123456', '15108382744', '1372039873', '1', '1', '2');
INSERT INTO `user` VALUES ('193', 'yuanhuilin@yinuoinfo.com', '袁慧林', '123456', '', '0', '6', '2', '123456', ' 15208106662', '1372040288', '1', '1', '2');
INSERT INTO `user` VALUES ('194', 'ln@yinuoinfo.com', '林宁', '123456', '', '0', '0', '2', '', '', '0', '1', '1', '2');
