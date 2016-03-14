SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(256) NOT NULL DEFAULT '' COMMENT '密码',
  `permission` tinyint(4) NOT NULL DEFAULT '2' COMMENT '权限 1:普通用户 2:管理员',
  `realname` varchar(50) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` varchar(50) NOT NULL DEFAULT '' COMMENT '手机',
  `login_count` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_login_ip` varchar(100) NOT NULL DEFAULT '' COMMENT '最后登录的ip',
  `last_login_time` datetime NOT NULL DEFAULT '2000-12-12 00:00:00' COMMENT '最后登录时间',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态：1：正常 0:非正常',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表';

DROP TABLE IF EXISTS `normative_info` ;
CREATE TABLE `normative_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `author` varchar(30) NOT NULL DEFAULT '' COMMENT '作者',
  `theme` varchar(200) NOT NULL DEFAULT '' COMMENT '标题',
  `importance` tinyint(4) NOT NULL DEFAULT '1' COMMENT '重要等级，1：普通 2：重要',
  `article_url` varchar(200) NOT NULL DEFAULT '' COMMENT '文章链接',
  `content` text COMMENT '上传内容',
  `update_time` timestamp NULL DEFAULT '2000-12-12 00:00:00' COMMENT '最近更新时间',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '删除标识，0:草稿 1：正常  2：已删除未清理  3：已清理',
  `read_flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '阅读标识，0：未阅读  1：已阅读',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='规范信息表';

# 系统需要初始化数据，否则将报错。BUG暂时未解决。
INSERT INTO `admin_user` VALUES (1,'admin','22f35c4d9d54afe9e8bdf44e8459ede3fa4fefe5d70ff0bd184932cf4df717c9cc378346f0bdf9e89ecd027bcdea15cffa8c7f77a5c4d2250062b61973a11eacUWPQ1qPYnu1tyZlaerIg/i/uxdZ1prfUGR8QA/N0gSU=',2,'Perry.Zhang','evilpot_1@126.com','',1,'127.0.0.1','2016-03-14 08:59:33',1,'2016-03-14 07:59:06');
