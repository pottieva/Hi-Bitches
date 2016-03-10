/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : panban

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2015-12-08 15:25:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for duty_init
-- ----------------------------
DROP TABLE IF EXISTS `duty_init`;
CREATE TABLE `duty_init` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增长',
  `category` smallint(6) NOT NULL COMMENT '组别 1：oracle 2: mysql',
  `member` varchar(20) NOT NULL COMMENT '值班人员姓名',
  `date` varchar(20) NOT NULL COMMENT '值班日期',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_cate_date` (`category`,`date`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='值班初始化数据表';


-- ----------------------------
-- Table structure for duty_info
-- ----------------------------
DROP TABLE IF EXISTS `duty_info`;
CREATE TABLE `duty_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增长',
  `category` smallint(6) NOT NULL COMMENT '组别 1：oracle 2: mysql',
  `member` varchar(20) NOT NULL COMMENT '值班人员姓名',
  `date` varchar(20) NOT NULL COMMENT '值班日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2649 DEFAULT CHARSET=utf8 COMMENT='值班信息表';


-- ----------------------------
-- Table structure for duty_order
-- ----------------------------
DROP TABLE IF EXISTS `duty_order`;
CREATE TABLE `duty_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键自增长',
  `category` smallint(6) NOT NULL COMMENT '组别 1：oracle 2: mysql',
  `member` varchar(20) NOT NULL COMMENT '值班人员姓名',
  `duty_order` smallint(6) NOT NULL COMMENT '值班顺序',
  `start_date` varchar(20) DEFAULT '' COMMENT '休班的开始日期 默认 '': 表示正常值班',
  `end_date` varchar(20) DEFAULT '' COMMENT '休班的结束日期 默认 '': 表示正常值班',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='值班人员值班顺序表';

-- ----------------------------
-- Records of duty_order
-- ----------------------------
INSERT INTO `duty_order` VALUES ('1', '2', '刘宇', '1', '', '');
INSERT INTO `duty_order` VALUES ('2', '2', '胡智娟', '2', '', '');
INSERT INTO `duty_order` VALUES ('3', '2', '刘东发', '3', '', '');
INSERT INTO `duty_order` VALUES ('4', '2', '连石峰', '4', '', '');
INSERT INTO `duty_order` VALUES ('5', '2', '凡新雷', '5', '1900-01-02', '2015-11-30');
INSERT INTO `duty_order` VALUES ('6', '2', '张小虎', '6', '', '');
INSERT INTO `duty_order` VALUES ('7', '1', '林端迎', '1', '', '');
INSERT INTO `duty_order` VALUES ('8', '1', '冯栋华', '2', '', '');
INSERT INTO `duty_order` VALUES ('9', '1', '王祥', '3', '', '');
INSERT INTO `duty_order` VALUES ('10', '1', '徐力佳', '4', '2015-12-01', '2015-12-31');
INSERT INTO `duty_order` VALUES ('11', '1', '吉万利', '5', '', '');
INSERT INTO `duty_order` VALUES ('12', '1', '胡少瑞', '6', '2015-12-01', '2015-12-31');
INSERT INTO `duty_order` VALUES ('13', '1', '李首', '7', '', '');
INSERT INTO `duty_order` VALUES ('14', '1', '李冰', '8', '', '');
INSERT INTO `duty_order` VALUES ('15', '1', '舒增刚', '9', '', '');
INSERT INTO `duty_order` VALUES ('16', '1', '刘帅', '10', '', '');
INSERT INTO `duty_order` VALUES ('17', '1', '王川', '11', '', '');
INSERT INTO `duty_order` VALUES ('18', '1', '高湍', '12', '', '');
INSERT INTO `duty_order` VALUES ('19', '1', '周芸', '13', '', '');

-- ----------------------------
-- Table structure for number
-- ----------------------------
DROP TABLE IF EXISTS `number`;
CREATE TABLE `number` (
  `num` int(11) DEFAULT NULL COMMENT '数值'
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COMMENT='生成日期的数值表';

-- ----------------------------
-- Records of number
-- ----------------------------
INSERT INTO `number` VALUES ('0');
INSERT INTO `number` VALUES ('1');
INSERT INTO `number` VALUES ('2');
INSERT INTO `number` VALUES ('3');
INSERT INTO `number` VALUES ('4');
INSERT INTO `number` VALUES ('5');
INSERT INTO `number` VALUES ('6');
INSERT INTO `number` VALUES ('7');
INSERT INTO `number` VALUES ('8');
INSERT INTO `number` VALUES ('9');
INSERT INTO `number` VALUES ('10');
INSERT INTO `number` VALUES ('11');
INSERT INTO `number` VALUES ('12');
INSERT INTO `number` VALUES ('13');
INSERT INTO `number` VALUES ('14');
INSERT INTO `number` VALUES ('15');
INSERT INTO `number` VALUES ('16');
INSERT INTO `number` VALUES ('17');
INSERT INTO `number` VALUES ('18');
INSERT INTO `number` VALUES ('19');
INSERT INTO `number` VALUES ('20');
INSERT INTO `number` VALUES ('21');
INSERT INTO `number` VALUES ('22');
INSERT INTO `number` VALUES ('23');
INSERT INTO `number` VALUES ('24');
INSERT INTO `number` VALUES ('25');
INSERT INTO `number` VALUES ('26');
INSERT INTO `number` VALUES ('27');
INSERT INTO `number` VALUES ('28');
INSERT INTO `number` VALUES ('29');
INSERT INTO `number` VALUES ('30');


-- ----------------------------
-- Procedure structure for p_duty_generate
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_duty_generate`;
DELIMITER ;;
CREATE  PROCEDURE `p_duty_generate`(datetime varchar(20))
BEGIN
  -- 定义变量分别获取mysql 、oracle 组成员数量
  declare mysql_count int;
  declare oracle_count int;
	-- 清除当前月的排班数据,重新生成排班数据
	delete from duty_info
	where date>=datetime and date<date_add(datetime,INTERVAL 1 month) ;

  -- 删除临时表避免同一个sql线程创建同一个表不成功
  drop temporary table if exists tmp_duty_info;

  -- 创建临时表保存当前月数据，避免多次加工获取同一份数据。
  create temporary table tmp_duty_info like duty_info;

  -- 动态获取 oracle 和 mysql 组共有多少个成员
  select sum(if(category=1,1,0))    , sum(if(category=2,1,0)) into oracle_count,mysql_count from duty_order ;

  -- 保存oracle组当前月的值班数据
  insert into tmp_duty_info(category,date,member)
  select 1,c.date,group_concat(d.member order by c.date) member from 
		(
				select a.date , if(@duty_order=oracle_count,@duty_order:=f_get_duty_order(date,1,1,oracle_count),@duty_order:=f_get_duty_order(date,@duty_order+1,1,oracle_count)) duty_order
				from 
						( select DATE_ADD( datetime,INTERVAL num day) date from number
							where  num<datediff(DATE_ADD( datetime,INTERVAL 1 month),datetime) 
							union all 
							select date 
							from (select DATE_ADD( datetime,INTERVAL num day) date from number
										where  num<datediff(DATE_ADD( datetime,INTERVAL 1 month),datetime) )a
							where dayofweek(date)=3
							order by 	date 
						)a, 
						(  select @duty_order:=a.duty_order duty_order 
							from duty_order a ,
                             (
								select *  
								from (
									  select *,1 flag from duty_info a where  a.date=DATE_ADD(datetime,INTERVAL -1 day) and a.category=1 
									  union all 
									  select *,2 flag from duty_init a where  a.date=DATE_ADD(datetime,INTERVAL -1 day) and a.category=1
								    )a
							    order by flag desc ,id desc
							    limit 1
						     ) b 
							where a.member=b.member 
						) b
		)c join duty_order d on c.duty_order=d.duty_order and  d.category=1
			 group by date ;



  -- 保存mysql组当前月的值班数据
  insert into tmp_duty_info(category,date,member)
	select 2,c.date,d.member  from 
	(
			select a.date , if(@duty_order=mysql_count,@duty_order:=f_get_duty_order(date,1,2,mysql_count),@duty_order:=f_get_duty_order(date,@duty_order+1,2,mysql_count)) duty_order
			from 
				 ( select DATE_ADD( datetime,INTERVAL num day) date from number
					where  num<datediff(DATE_ADD( datetime,INTERVAL 1 month),datetime) 
					order by 	date 
				 )a, 
				 (  select @duty_order:=a.duty_order duty_order
					from duty_order a ,
                    (
					  select *  
						from (
							select *,1 flag from duty_info a where  a.date=DATE_ADD(datetime,INTERVAL -1 day) and a.category=2
							union all 
							select *,2 flag from duty_init a where  a.date=DATE_ADD(datetime,INTERVAL -1 day) and a.category=2
							)a
						order by flag desc 
						limit 1
                    ) b 
					where a.member=b.member 
				 ) b
	)c join duty_order d on c.duty_order=d.duty_order and  d.category=2;


  -- 保存数据，便于后续查询
     insert into duty_info(category,date,member)
     select category,date,member from tmp_duty_info;

     
  -- 根据2组的当前月排班数据，加工数据
		select
					 if(category=1,'oracle','mysql') cate ,
					 max(if(dayofweek(date)=2,concat(dayofmonth(date),member),'')) 星期一,
					 max(if(dayofweek(date)=3,concat(dayofmonth(date),member),'')) 星期二,
					 max(if(dayofweek(date)=4,concat(dayofmonth(date),member),'')) 星期三,
					 max(if(dayofweek(date)=5,concat(dayofmonth(date),member),'')) 星期四,
					 max(if(dayofweek(date)=6,concat(dayofmonth(date),member),'')) 星期五,
					 max(if(dayofweek(date)=7,concat(dayofmonth(date),member),'')) 星期六,
					 max(if(dayofweek(date)=1,concat(dayofmonth(date),member),'')) 星期天
		from   tmp_duty_info
    group by weekofyear(date),  category
    order by date,weekofyear(date),  category ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for p_duty_query
-- ----------------------------
DROP PROCEDURE IF EXISTS `p_duty_query`;
DELIMITER ;;
CREATE    PROCEDURE `p_duty_query`(datetime varchar(20),user_name varchar(20))
BEGIN
	if user_name='' then 
			select
						 if(category=1,'oracle','mysql') cate ,
						 max(if(dayofweek(date)=2,concat(dayofmonth(date),member),'')) 星期一,
						 max(if(dayofweek(date)=3,concat(dayofmonth(date),member),'')) 星期二,
						 max(if(dayofweek(date)=4,concat(dayofmonth(date),member),'')) 星期三,
						 max(if(dayofweek(date)=5,concat(dayofmonth(date),member),'')) 星期四,
						 max(if(dayofweek(date)=6,concat(dayofmonth(date),member),'')) 星期五,
						 max(if(dayofweek(date)=7,concat(dayofmonth(date),member),'')) 星期六,
						 max(if(dayofweek(date)=1,concat(dayofmonth(date),member),'')) 星期天
			from (
						select member,date,category from duty_info
						where date>=datetime  and date<date_add(datetime ,INTERVAL 1 month)
									-- and member=''
					 )a
			group by weekofyear(date),  category
			order by date,weekofyear(date),  category ;
  else 
			select
						 if(category=1,'oracle','mysql') cate ,
						 max(if(dayofweek(date)=2,concat(dayofmonth(date),member),'')) 星期一,
						 max(if(dayofweek(date)=3,concat(dayofmonth(date),member),'')) 星期二,
						 max(if(dayofweek(date)=4,concat(dayofmonth(date),member),'')) 星期三,
						 max(if(dayofweek(date)=5,concat(dayofmonth(date),member),'')) 星期四,
						 max(if(dayofweek(date)=6,concat(dayofmonth(date),member),'')) 星期五,
						 max(if(dayofweek(date)=7,concat(dayofmonth(date),member),'')) 星期六,
						 max(if(dayofweek(date)=1,concat(dayofmonth(date),member),'')) 星期天
			from (
						select member,date,category from duty_info
						where date>=datetime  and date<date_add(datetime ,INTERVAL 1 month)
									and (member = user_name or user_name=substring_index(member,',',-1) 
                       or  user_name=substring_index(member,',',1))
					 )a
			group by weekofyear(date),  category
			order by date,weekofyear(date), category ;

  end if;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for f_get_duty_order
-- ----------------------------
DROP FUNCTION IF EXISTS `f_get_duty_order`;
DELIMITER ;;
CREATE    FUNCTION `f_get_duty_order`(`date` varchar(20),`duty` int,cate int,cate_count int) RETURNS int(11)
BEGIN
  declare duty_num int ;
  
  if cate=1 then 
			select  duty_order into  duty_num
			from (
						 select a.*, if(duty_order>=duty,duty_order,duty_order+cate_count) dx  from duty_order  a  where category=1 order by  duty_order
				 )b  
			where  (if(start_date!=''and end_date='','',start_date) = '' and if(end_date!=''and start_date='','',end_date) = '' )
			or    date>end_date or date<start_date order by dx limit 1    ; 
  else 
			select  duty_order into  duty_num
			from (
						 select a.*, if(duty_order>=duty,duty_order,duty_order+cate_count) dx  from duty_order a  where category=2  order by  duty_order
				 )b  
			where  (if(start_date!=''and end_date='','',start_date) = '' and if(end_date!=''and start_date='','',end_date) = '' )
			or    date>end_date or date<start_date order by dx limit 1    ;   
 end if;

  RETURN duty_num;  
END
;;
DELIMITER ;
