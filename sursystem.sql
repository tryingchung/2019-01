/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : sursystem

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 28/07/2019 16:07:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options`  (
  `OptionID` int(11) NOT NULL AUTO_INCREMENT,
  `Options` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SubmitNum` int(11) NOT NULL DEFAULT 0,
  `creatTime` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `lastTime` datetime(0) NULL DEFAULT NULL,
  `QueID` int(11) NOT NULL,
  PRIMARY KEY (`OptionID`) USING BTREE,
  INDEX `QueID`(`QueID`) USING BTREE,
  CONSTRAINT `options_ibfk_1` FOREIGN KEY (`QueID`) REFERENCES `question` (`QueID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 60077 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES (60000, '25岁以下', 0, '2019-01-14 13:00:03', NULL, 50000);
INSERT INTO `options` VALUES (60004, '26-35岁', 0, '2019-01-14 12:59:41', NULL, 50000);
INSERT INTO `options` VALUES (60006, '36-45岁', 0, '2019-01-14 12:59:56', NULL, 50000);
INSERT INTO `options` VALUES (60007, '45岁以上', 0, '2019-01-14 13:00:16', NULL, 50000);
INSERT INTO `options` VALUES (60008, '高中/中专及以下', 0, '2019-01-14 13:01:17', NULL, 50001);
INSERT INTO `options` VALUES (60009, '大专', 0, '2019-01-14 13:01:25', NULL, 50001);
INSERT INTO `options` VALUES (60010, '本科', 0, '2019-01-14 13:01:33', NULL, 50001);
INSERT INTO `options` VALUES (60011, '硕士及以上', 0, '2019-01-14 13:01:50', NULL, 50001);
INSERT INTO `options` VALUES (60012, '0-3个月', 0, '2019-01-14 13:02:56', NULL, 50002);
INSERT INTO `options` VALUES (60013, '3-6个月', 0, '2019-01-14 13:03:06', NULL, 50002);
INSERT INTO `options` VALUES (60014, '6个月-1年', 0, '2019-01-14 13:03:18', NULL, 50002);
INSERT INTO `options` VALUES (60015, '1-2年', 0, '2019-01-14 13:04:04', NULL, 50002);
INSERT INTO `options` VALUES (60016, '2年以上', 0, '2019-01-14 13:04:20', NULL, 50002);
INSERT INTO `options` VALUES (60017, '销售类', 0, '2019-01-14 13:05:40', NULL, 50003);
INSERT INTO `options` VALUES (60018, '主持辅助类', 0, '2019-01-14 13:06:11', NULL, 50003);
INSERT INTO `options` VALUES (60019, '管理类', 0, '2019-01-14 13:06:24', NULL, 50003);
INSERT INTO `options` VALUES (60020, '合理', 0, '2019-01-15 19:29:19', NULL, 50004);
INSERT INTO `options` VALUES (60021, '基本合理', 0, '2019-01-15 19:29:31', NULL, 50004);
INSERT INTO `options` VALUES (60022, '非常合理', 0, '2019-01-15 19:29:46', NULL, 50004);
INSERT INTO `options` VALUES (60023, '不确定', 0, '2019-01-15 19:29:55', NULL, 50004);
INSERT INTO `options` VALUES (60024, '不合理', 0, '2019-01-15 19:30:03', NULL, 50004);
INSERT INTO `options` VALUES (60025, '非常满意', 0, '2019-01-15 19:30:28', NULL, 50005);
INSERT INTO `options` VALUES (60026, '基本满意', 0, '2019-01-15 19:30:38', NULL, 50005);
INSERT INTO `options` VALUES (60027, '不确定', 0, '2019-01-15 19:30:59', NULL, 50005);
INSERT INTO `options` VALUES (60028, '不满意', 0, '2019-01-15 19:31:12', NULL, 50005);
INSERT INTO `options` VALUES (60029, '极度不满意', 0, '2019-01-15 19:32:44', NULL, 50005);
INSERT INTO `options` VALUES (60030, '非常合理', 0, '2019-01-15 19:31:57', NULL, 50006);
INSERT INTO `options` VALUES (60031, '不合理', 0, '2019-01-15 19:32:05', NULL, 50006);
INSERT INTO `options` VALUES (60032, '不确定', 0, '2019-01-15 19:32:14', NULL, 50006);
INSERT INTO `options` VALUES (60033, '极度不合理', 0, '2019-01-15 19:32:31', NULL, 50006);
INSERT INTO `options` VALUES (60034, '肯定有', 0, '2019-01-15 19:33:10', NULL, 50007);
INSERT INTO `options` VALUES (60035, '有时有', 0, '2019-01-15 19:33:26', NULL, 50007);
INSERT INTO `options` VALUES (60036, '不确定', 0, '2019-01-15 19:33:41', NULL, 50007);
INSERT INTO `options` VALUES (60037, '没有', 0, '2019-01-15 19:33:50', NULL, 50007);
INSERT INTO `options` VALUES (60038, '肯定没有', 0, '2019-01-15 19:34:02', NULL, 50007);
INSERT INTO `options` VALUES (60039, '非常舒适', 0, '2019-01-15 19:35:24', NULL, 50008);
INSERT INTO `options` VALUES (60040, '基本舒适', 0, '2019-01-15 19:35:48', NULL, 50008);
INSERT INTO `options` VALUES (60041, '不确定', 0, '2019-01-15 19:35:57', NULL, 50008);
INSERT INTO `options` VALUES (60042, '不舒适', 0, '2019-01-15 19:36:05', NULL, 50008);
INSERT INTO `options` VALUES (60043, '极度不舒适', 0, '2019-01-15 19:36:23', NULL, 50008);
INSERT INTO `options` VALUES (60044, '非常强', 0, '2019-01-15 19:36:52', NULL, 50009);
INSERT INTO `options` VALUES (60045, '基本可以', 0, '2019-01-15 19:37:01', NULL, 50009);
INSERT INTO `options` VALUES (60046, '不确定', 0, '2019-01-15 19:37:19', NULL, 50009);
INSERT INTO `options` VALUES (60047, '不强', 0, '2019-01-15 19:37:29', NULL, 50009);
INSERT INTO `options` VALUES (60048, '非常差', 0, '2019-01-15 19:37:41', NULL, 50009);
INSERT INTO `options` VALUES (60049, '男', 0, '2019-01-15 19:57:20', NULL, 50011);
INSERT INTO `options` VALUES (60050, '女', 0, '2019-01-15 19:57:32', NULL, 50011);
INSERT INTO `options` VALUES (60052, '30岁以下', 0, '2019-01-15 19:58:09', NULL, 50014);
INSERT INTO `options` VALUES (60053, '31-40岁', 0, '2019-01-15 19:58:31', NULL, 50014);
INSERT INTO `options` VALUES (60054, '41-50岁', 0, '2019-01-15 19:58:39', NULL, 50014);
INSERT INTO `options` VALUES (60055, '50岁以上', 0, '2019-01-15 19:58:50', NULL, 50014);
INSERT INTO `options` VALUES (60056, '普通员工', 0, '2019-01-15 19:59:19', NULL, 50015);
INSERT INTO `options` VALUES (60057, '初级管理人员', 0, '2019-01-15 19:59:34', NULL, 50015);
INSERT INTO `options` VALUES (60058, '中级管理人员', 0, '2019-01-15 19:59:48', NULL, 50015);
INSERT INTO `options` VALUES (60059, '高级管理人员', 0, '2019-01-15 20:00:00', NULL, 50015);
INSERT INTO `options` VALUES (60060, '五险一金', 0, '2019-01-15 20:00:17', NULL, 50016);
INSERT INTO `options` VALUES (60061, '假期福利(法定假期、事假、病假等)', 0, '2019-01-15 20:00:59', NULL, 50016);
INSERT INTO `options` VALUES (60063, '皆无', 0, '2019-01-15 20:01:36', NULL, 50016);
INSERT INTO `options` VALUES (60064, '培训费用补贴', 0, '2019-01-15 20:02:44', NULL, 50017);
INSERT INTO `options` VALUES (60065, '住房津贴', 0, '2019-01-15 20:03:35', NULL, 50017);
INSERT INTO `options` VALUES (60066, '餐饮津贴', 0, '2019-01-15 20:03:49', NULL, 50017);
INSERT INTO `options` VALUES (60067, '交通津贴', 0, '2019-01-15 20:04:21', NULL, 50017);
INSERT INTO `options` VALUES (60068, '奖金奖励制度', 0, '2019-01-15 20:04:35', NULL, 50017);
INSERT INTO `options` VALUES (60069, '皆无', 0, '2019-01-15 20:04:43', NULL, 50017);
INSERT INTO `options` VALUES (60070, '满意', 0, '2019-01-15 20:05:04', NULL, 50018);
INSERT INTO `options` VALUES (60071, '一般', 0, '2019-01-15 20:05:17', NULL, 50018);
INSERT INTO `options` VALUES (60072, '不满意', 0, '2019-01-15 20:05:28', NULL, 50018);
INSERT INTO `options` VALUES (60073, '无所谓', 0, '2019-01-15 20:05:39', NULL, 50018);
INSERT INTO `options` VALUES (60074, '有必要', 0, '2019-01-15 20:06:10', NULL, 50019);
INSERT INTO `options` VALUES (60075, '不需要', 0, '2019-01-15 20:06:20', NULL, 50019);
INSERT INTO `options` VALUES (60076, '无所谓', 0, '2019-01-15 20:06:32', NULL, 50019);

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question`  (
  `QueID` int(11) NOT NULL AUTO_INCREMENT,
  `QueTitle` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `QueTye` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `OptionsNum` int(11) NULL DEFAULT NULL,
  `creatTime` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `lastTime` datetime(0) NULL DEFAULT NULL,
  `isDelet` tinyint(4) NOT NULL DEFAULT 0,
  `SurveyID` int(11) NOT NULL,
  PRIMARY KEY (`QueID`) USING BTREE,
  INDEX `SurveyID`(`SurveyID`) USING BTREE,
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`SurveyID`) REFERENCES `survey` (`SurveyID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 50021 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES (50000, '您的年龄：', 'Sin', 4, '2019-01-14 12:55:58', NULL, 0, 40000);
INSERT INTO `question` VALUES (50001, '您的最高学历：', 'Sin', 4, '2019-01-14 12:56:11', NULL, 0, 40000);
INSERT INTO `question` VALUES (50002, '您的工作年限：', 'Sin', 5, '2019-01-14 12:56:44', NULL, 0, 40000);
INSERT INTO `question` VALUES (50003, '您的工作类型：', 'Sin', 3, '2019-01-14 12:57:44', NULL, 0, 40000);
INSERT INTO `question` VALUES (50004, '您认为公司上下班时间的安排是否合理？', 'Sin', 5, '2019-01-15 19:26:57', NULL, 0, 40000);
INSERT INTO `question` VALUES (50005, '您对工资收入是否满意？', 'Sin', 5, '2019-01-15 19:22:45', NULL, 0, 40000);
INSERT INTO `question` VALUES (50006, '公司绩效计算与付给是否合理？', 'Sin', 4, '2019-01-15 19:28:33', NULL, 0, 40000);
INSERT INTO `question` VALUES (50007, '您是否感受被重视与关怀？', 'Sin', 5, '2019-01-15 19:23:42', NULL, 0, 40000);
INSERT INTO `question` VALUES (50008, '您对您的工作环境是否感到舒适？', 'Sin', 5, '2019-01-15 19:24:51', NULL, 0, 40000);
INSERT INTO `question` VALUES (50009, '您认为公司的团队精神如何？', 'Sin', 5, '2019-01-15 19:25:41', NULL, 0, 40000);
INSERT INTO `question` VALUES (50010, '您对公司目前还有哪些建议和意见？', 'Sub', 0, '2019-01-15 19:27:29', NULL, 0, 40000);
INSERT INTO `question` VALUES (50011, '您的性别：', 'Sin', NULL, '2019-01-15 19:51:01', NULL, 0, 40001);
INSERT INTO `question` VALUES (50014, '您的年龄：', 'Sin', NULL, '2019-01-15 19:51:49', NULL, 0, 40001);
INSERT INTO `question` VALUES (50015, '您的职位：', 'Sin', NULL, '2019-01-15 19:52:39', NULL, 0, 40001);
INSERT INTO `question` VALUES (50016, '您就职的企业有以下固定福利吗？【多选题】', 'Mul', NULL, '2019-01-15 20:01:50', NULL, 0, 40001);
INSERT INTO `question` VALUES (50017, '您就职的企业有一下弹性福利吗？【多选题】', 'Mul', NULL, '2019-01-15 20:02:06', NULL, 0, 40001);
INSERT INTO `question` VALUES (50018, '您对自己目前的福利水平是否满意？', 'Sin', NULL, '2019-01-15 19:54:51', NULL, 0, 40001);
INSERT INTO `question` VALUES (50019, '您认为企业的福利制度是否需要调整？', 'Sin', NULL, '2019-01-15 19:55:39', NULL, 0, 40001);
INSERT INTO `question` VALUES (50020, '如果条件允许，您希望企业增加或如何改进现行的福利制度？', 'Sub', NULL, '2019-01-15 19:56:30', NULL, 0, 40001);

-- ----------------------------
-- Table structure for respondence
-- ----------------------------
DROP TABLE IF EXISTS `respondence`;
CREATE TABLE `respondence`  (
  `ResponID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` char(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `creatTime` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `lastTime` datetime(0) NULL DEFAULT NULL,
  `QueID` int(11) NOT NULL,
  PRIMARY KEY (`ResponID`) USING BTREE,
  INDEX `QueID`(`QueID`) USING BTREE,
  CONSTRAINT `respondence_ibfk_1` FOREIGN KEY (`QueID`) REFERENCES `question` (`QueID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 70002 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of respondence
-- ----------------------------
INSERT INTO `respondence` VALUES (70000, 'A', '2019-01-08 16:12:53', NULL, 50000);
INSERT INTO `respondence` VALUES (70001, 'B', '2019-01-08 16:13:42', NULL, 50000);

-- ----------------------------
-- Table structure for survey
-- ----------------------------
DROP TABLE IF EXISTS `survey`;
CREATE TABLE `survey`  (
  `SurveyID` int(11) NOT NULL AUTO_INCREMENT,
  `SurveyTitle` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SubmissionNum` int(11) NULL DEFAULT 0,
  `creatTime` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `lastTime` datetime(0) NULL DEFAULT NULL,
  `Deadline` datetime(0) NULL DEFAULT NULL,
  `isDelet` tinyint(4) NOT NULL DEFAULT 0,
  `UserID` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`SurveyID`) USING BTREE,
  INDEX `UserID`(`UserID`) USING BTREE,
  CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 40006 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey
-- ----------------------------
INSERT INTO `survey` VALUES (40000, '员工满意度调查', 0, '2019-01-14 13:07:45', NULL, '2019-01-30 16:29:58', 0, 'test');
INSERT INTO `survey` VALUES (40001, '员工福利制度建设情况调查', 0, '2019-01-15 19:50:31', NULL, '2019-01-30 16:35:46', 0, 'test');
INSERT INTO `survey` VALUES (40002, '大学生恋爱观调查', 0, '2019-01-16 10:53:41', NULL, '2019-01-30 16:10:15', 0, 'test');
INSERT INTO `survey` VALUES (40003, '大学生网购情况调查', 0, '2019-01-16 10:55:04', NULL, '2019-02-02 16:10:49', 0, 'zhangsan');
INSERT INTO `survey` VALUES (40004, '安全教育问卷调查', 0, '2019-01-16 10:56:42', NULL, '2019-01-31 10:56:32', 0, 'zhangsan');
INSERT INTO `survey` VALUES (40005, '食堂满意度调查', 0, '2019-01-16 10:56:52', NULL, '2019-01-31 10:56:45', 0, 'zhangsan');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `UserID` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserName` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `creatTime` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `telphone` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `realname` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('6666', '6666666', '606060', '2019-07-28 16:01:46', '2333333', '女', '');
INSERT INTO `user` VALUES ('lisi', '李四', '20190101', '2019-01-08 16:05:32', '', '', '');
INSERT INTO `user` VALUES ('mary', '王小五', '123123', '2019-01-15 20:56:26', '', '女', '');
INSERT INTO `user` VALUES ('test', '小明', '20190101', '2019-07-28 16:04:43', '123456', '女', '明');
INSERT INTO `user` VALUES ('zhangsan', '张六', '20190101', '2019-01-18 01:06:59', '1523680000', '男', '张小六');

SET FOREIGN_KEY_CHECKS = 1;
