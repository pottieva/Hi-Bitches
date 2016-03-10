SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Ö÷¼üid',
  `username` varchar(30) NOT NULL DEFAULT '' COMMENT 'ÓÃ»§Ãû',
  `password` varchar(256) NOT NULL DEFAULT '' COMMENT 'ÃÜÂë',
  `permission` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'È¨ÏÞ 1:ÆÕÍ¨ÓÃ»§ 2:¹ÜÀíÔ±',
  `realname` varchar(50) NOT NULL DEFAULT '' COMMENT 'ÕæÊµÐÕÃû',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT 'ÓÊÏä',
  `mobile` varchar(50) NOT NULL DEFAULT '' COMMENT 'ÊÖ»ú',
  `login_count` int(11) NOT NULL DEFAULT '0' COMMENT 'µÇÂ¼´ÎÊý',
  `last_login_ip` varchar(100) NOT NULL DEFAULT '' COMMENT '×îºóµÇÂ¼µÄip',
  `last_login_time` datetime NOT NULL DEFAULT '2000-12-12 00:00:00' COMMENT '×îºóµÇÂ¼Ê±¼ä',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '×´Ì¬£º1£ºÕý³£ 0:·ÇÕý³£',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '×¢²áÊ±¼ä',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='ÓÃ»§ÐÅÏ¢±í';

DROP TABLE IF EXISTS `normative_info` ;
CREATE TABLE `normative_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Ö÷¼ü',
  `author` varchar(30) NOT NULL DEFAULT '' COMMENT '×÷Õß',
  `theme` varchar(200) NOT NULL DEFAULT '' COMMENT '±êÌâ',
  `importance` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'ÖØÒªµÈ¼¶£¬1£ºÆÕÍ¨ 2£ºÖØÒª',
  `article_url` varchar(200) NOT NULL DEFAULT '' COMMENT 'ÎÄÕÂÁ´½Ó',
  `content` text  COMMENT 'ÎÄÕÂ¸ÅÒª',
  `update_time` timestamp NULL DEFAULT '2000-12-12 00:00:00' COMMENT '×î½ü¸üÐÂÊ±¼ä',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ÉÏ´«Ê±¼ä',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'É¾³ý±êÊ¶£¬0:²Ý¸å 1£ºÕý³£  2£ºÒÑÉ¾³ýÎ´ÇåÀí  3£ºÒÑÇåÀí',
  `read_flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'ÔÄ¶Á±êÊ¶£¬0£ºÎ´ÔÄ¶Á  1£ºÒÑÔÄ¶Á',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='¹æ·¶ÐÅÏ¢±í';
