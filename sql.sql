-- phpMyAdmin SQL Dump
-- version 3.4.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 16 日 16:27
-- 服务器版本: 5.0.91
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `filmhr`
--

-- --------------------------------------------------------

--
-- 表的结构 `act_actexprience`
--

CREATE TABLE IF NOT EXISTS `act_actexprience` (
  `ex_id` int(10) unsigned NOT NULL auto_increment COMMENT '演艺经历表id',
  `ex_type` varchar(30) NOT NULL COMMENT '节目类型',
  `ex_time` int(14) NOT NULL COMMENT '演艺时间',
  `ex_name` varchar(30) NOT NULL COMMENT '剧名称',
  `ex_role` varchar(30) NOT NULL COMMENT '角色名称',
  `ex_direct` varchar(30) NOT NULL COMMENT '导演',
  `re_mainact` varchar(50) NOT NULL COMMENT '主要演员',
  `a_id` int(11) NOT NULL COMMENT '演员表id',
  PRIMARY KEY  (`ex_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `act_activities`
--

CREATE TABLE IF NOT EXISTS `act_activities` (
  `ac_id` int(11) NOT NULL auto_increment COMMENT '活动演出表id',
  `ac_show_zm_type` varchar(30) NOT NULL COMMENT '演出招募类型',
  `ac_tel` int(18) NOT NULL COMMENT '联系电话',
  `ac_need` varchar(300) NOT NULL COMMENT '活动要求',
  `ac_host` varchar(100) NOT NULL COMMENT '主办方',
  `ac_undertake` varchar(100) NOT NULL COMMENT '承办方',
  `ac_spendtime` int(10) NOT NULL COMMENT '预计演出时间',
  `ac_showplace` varchar(80) NOT NULL COMMENT '演出地点',
  `ac_thum` varchar(100) NOT NULL COMMENT '活动主题',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`ac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='活动演出表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `act_actor`
--

CREATE TABLE IF NOT EXISTS `act_actor` (
  `a_id` int(11) unsigned NOT NULL auto_increment COMMENT '角色主键id',
  `p_id` int(11) NOT NULL COMMENT '成员表id',
  `truename` varchar(30) character set ucs2 NOT NULL COMMENT '真实姓名',
  `stagename` varchar(30) default NULL COMMENT '艺名',
  `id_card` int(18) NOT NULL COMMENT '身份证号',
  `star` varchar(10) NOT NULL COMMENT '演员星级',
  `t_id` int(3) unsigned NOT NULL COMMENT '演员类型id',
  `age_id` int(10) unsigned NOT NULL COMMENT '年龄段类型id',
  `sex` enum('1','2') NOT NULL COMMENT '性别',
  `birth` int(10) unsigned NOT NULL COMMENT '出生日期',
  `self_photo` varchar(30) character set ucs2 NOT NULL COMMENT '个人头像',
  `live_place` varchar(30) NOT NULL COMMENT '目前居住地',
  `work_place` varchar(30) NOT NULL COMMENT '工作地点',
  `native` varchar(100) NOT NULL COMMENT '籍贯',
  `a_tag` varchar(30) NOT NULL COMMENT '演员标签',
  `high` varchar(10) NOT NULL COMMENT '身高',
  `weight` varchar(10) NOT NULL COMMENT '体重',
  `special` text NOT NULL COMMENT '特长',
  `hobby` text NOT NULL COMMENT '爱好',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `tel` varchar(18) NOT NULL COMMENT '前端显示电话',
  `truetel` varchar(30) character set ucs2 NOT NULL COMMENT '演员联系电话',
  `g_school` varchar(100) NOT NULL COMMENT '毕业院校',
  `q_company` varchar(50) default NULL COMMENT '签约公司',
  `a_agent` varchar(30) NOT NULL COMMENT '明星经纪人',
  `job` varchar(30) NOT NULL COMMENT '职业',
  `image_self` text COMMENT '个人照片储存地址',
  `video` tinytext COMMENT '视频储存地址',
  `description` text COMMENT '个人说明',
  `count` int(11) unsigned NOT NULL default '20' COMMENT '剩余次数',
  `pass` enum('0','1') NOT NULL COMMENT '审核列',
  `reword` varchar(100) NOT NULL COMMENT '曾经获得奖项描述',
  `saywords` varchar(100) NOT NULL COMMENT '受捧宣言',
  PRIMARY KEY  (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='演员表信息' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `act_actor`
--

INSERT INTO `act_actor` (`a_id`, `p_id`, `truename`, `stagename`, `id_card`, `star`, `t_id`, `age_id`, `sex`, `birth`, `self_photo`, `live_place`, `work_place`, `native`, `a_tag`, `high`, `weight`, `special`, `hobby`, `email`, `tel`, `truetel`, `g_school`, `q_company`, `a_agent`, `job`, `image_self`, `video`, `description`, `count`, `pass`, `reword`, `saywords`) VALUES
(1, 0, '李四', 'sige', 0, '', 1, 11, '1', 662659200, '1386816281453.jpg', '北京', '', '山东', '', '165', '65', '演戏唱歌', '吃喝嫖赌抽', '123@qq.com', '13212312315', '', '河北工院,', '个人', '', '', 's:89:"Tulips.jpg|1386816281453.jpg,Hydrangeas.jpg|1386816281268.jpg,Koala.jpg|1386816281107.jpg";', 'http://www.baidu.com,', NULL, 20, '0', '哈uihfdiuohauiofhado空间符合,', '例如：人生如戏，戏如人生，戏演给别人看，人生活给自己看。'),
(2, 4, '高奕', '高奕', 0, '', 2, 11, '2', 474307200, '1386818815965.JPG', '北京', '', '湖北', '', '164', '50', '演戏，骑马', '爬山', '123@qq.com', '13212312315', '', '河北大学,', '经纪公司', '', '', 's:98:"班嘉佳4.JPG|1386818815965.JPG,班嘉佳2.JPG|1386818815806.JPG,班嘉佳3.JPG|1386818815217.JPG";', 'http://www.baidu.com,', NULL, 20, '0', '青少年微电影大赛最佳主角,', '例如：人生如戏，戏如人生，戏演给别人看，人生活给自己看。'),
(3, 2, 'aaa', 'aaa', 0, '', 1, 11, '1', 662659200, '1387091668572.png', '', '', '', '', '', '', '', '', '', '', '', ',', '经纪公司', '', '', 's:64:"52a82cf949c9d.png|1387091668572.png,psu (1).jpg|138709166886.jpg";', ',', NULL, 20, '0', ',', '例如：人生如戏，戏如人生，戏演给别人看，人生活给自己看。');

-- --------------------------------------------------------

--
-- 表的结构 `act_advert`
--

CREATE TABLE IF NOT EXISTS `act_advert` (
  `ad_id` int(11) NOT NULL auto_increment COMMENT '广告id',
  `ad_name` varchar(50) NOT NULL COMMENT '广告名',
  `ad_advert_product` varchar(300) NOT NULL COMMENT '广告产品',
  `ad_tel` int(11) NOT NULL COMMENT '联系电话',
  `ad_type` varchar(30) NOT NULL COMMENT '广告类别',
  `ad_zm_number` int(11) NOT NULL COMMENT '招募人数',
  `ad_sex` enum('1','2') NOT NULL COMMENT '模特性别',
  `ad_age` int(10) NOT NULL COMMENT '模特年龄',
  `ad_high` varchar(30) NOT NULL COMMENT '模特身高',
  `ad_weight` varchar(30) NOT NULL COMMENT '模特体重',
  `ad_sanwei` varchar(30) NOT NULL COMMENT '模特三维',
  `ad-zm_need` text NOT NULL COMMENT '招募人员要求',
  `ad_ps_address` varchar(50) NOT NULL COMMENT '拍摄地点',
  `ad_endtime` int(11) NOT NULL COMMENT '结束时间',
  `ad_zm_address` varchar(50) NOT NULL COMMENT '招募地点',
  `ad_time_long` varchar(40) NOT NULL COMMENT '时长',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告注册信息表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `act_advert`
--

INSERT INTO `act_advert` (`ad_id`, `ad_name`, `ad_advert_product`, `ad_tel`, `ad_type`, `ad_zm_number`, `ad_sex`, `ad_age`, `ad_high`, `ad_weight`, `ad_sanwei`, `ad-zm_need`, `ad_ps_address`, `ad_endtime`, `ad_zm_address`, `ad_time_long`, `p_id`) VALUES
(1, '0', '突袭到', 2147483647, 'T台', 1, '1', 35, '175', '65', '32,31,33', '高端大气上档次', '北京', 2014, '0', '一个星期', 11),
(2, '0', '阿斯顿', 2147483647, '平面', 0, '2', 25, '156', '48', '132，141,121', '飞哥飞哥发的', '发啊', 2012, '0', '一个星期', 11),
(3, '飞利浦', '突袭到', 2147483647, 'T台', 1, '1', 35, '175', '65', '32,31,33', '高端大气上档次', '北京', 2014, '北京', '一个星期', 11),
(4, '阿斯顿', '阿斯顿', 2147483647, '平面', 0, '2', 25, '156', '48', '132，141,121', '飞哥飞哥发的', '发啊', 2012, '发的按时的', '一个星期', 11);

-- --------------------------------------------------------

--
-- 表的结构 `act_advertiser`
--

CREATE TABLE IF NOT EXISTS `act_advertiser` (
  `as_id` int(11) NOT NULL auto_increment COMMENT '广告商id',
  `as_name` varchar(30) NOT NULL COMMENT '姓名',
  `as_tel` int(18) NOT NULL COMMENT '联系电话',
  `as_position` varchar(30) NOT NULL COMMENT '职位',
  `as_brand` varchar(50) NOT NULL COMMENT '品牌',
  `p_id` int(11) NOT NULL COMMENT '用户表id',
  PRIMARY KEY  (`as_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告商信息表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `act_advertiser`
--

INSERT INTO `act_advertiser` (`as_id`, `as_name`, `as_tel`, `as_position`, `as_brand`, `p_id`) VALUES
(1, '广告商', 2147483647, '学生', '阿道夫 阿斯蒂芬', 30),
(2, '阿斯顿', 2147483647, '打', ' 大方', 30);

-- --------------------------------------------------------

--
-- 表的结构 `act_age_group`
--

CREATE TABLE IF NOT EXISTS `act_age_group` (
  `age_id` int(11) NOT NULL auto_increment COMMENT '年龄段id',
  `age_name` varchar(30) NOT NULL COMMENT '年龄段名称',
  PRIMARY KEY  (`age_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `act_age_group`
--

INSERT INTO `act_age_group` (`age_id`, `age_name`) VALUES
(1, '儿童'),
(2, '老年'),
(3, '青年'),
(4, '青少年'),
(5, '中老年'),
(6, '中年'),
(7, '中青年');

-- --------------------------------------------------------

--
-- 表的结构 `act_announ`
--

CREATE TABLE IF NOT EXISTS `act_announ` (
  `a_id` int(11) NOT NULL auto_increment COMMENT '公告表主键',
  `title` varchar(500) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '公告内容',
  `time` int(11) NOT NULL COMMENT '发布时间',
  `pub_ip` int(30) NOT NULL COMMENT '发布人ip',
  `author` varchar(30) NOT NULL COMMENT '发布人',
  PRIMARY KEY  (`a_id`),
  UNIQUE KEY `time` (`time`,`pub_ip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='公告表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `act_announ`
--

INSERT INTO `act_announ` (`a_id`, `title`, `content`, `time`, `pub_ip`, `author`) VALUES
(1, '孙博上戏了', '十一月十号上午八点，孙博和大德文化传媒有限公司签订了合同，将于今年夏天开始拍摄一部30集电视剧，所演角色为主角', 2147483647, 192111, '龚超'),
(2, '汪峰向章子怡求婚了', '汪峰向章子怡求婚了汪峰向章子怡求婚了汪峰向章子怡求婚了汪峰向章子怡求婚了汪峰向章子怡求婚了', 1384920355, 127, '龚超超'),
(3, '汪峰向章子怡求', 'ASDASDASD', 0, 127, '龚超超'),
(4, '文章接下了我一定要追到你', '文章接下了我一定要追到asdasdasdasd', 1385433120, 127, '胥通达'),
(11, '孙悟空候选人六小龄童', '孙悟空候选人六小龄童孙悟空候选人六小龄童孙悟空候选人六小龄童成功接受邀请出演孙悟空一角色', 1386038710, 127, '龚超');

-- --------------------------------------------------------

--
-- 表的结构 `act_biggame`
--

CREATE TABLE IF NOT EXISTS `act_biggame` (
  `g_id` int(11) NOT NULL auto_increment COMMENT '大赛id',
  `g_name` varchar(30) NOT NULL COMMENT '大赛名',
  `g_type` varchar(30) NOT NULL COMMENT '大赛类型',
  `g_need` text NOT NULL COMMENT '大赛要求',
  `g_host` varchar(50) NOT NULL COMMENT '主办方',
  `g_organizer` varchar(50) NOT NULL COMMENT '承办方',
  `g_entertime` int(11) NOT NULL COMMENT '开始报名时间',
  `g_endtime` int(11) NOT NULL COMMENT '结束报名时间',
  `g_bmplace` varchar(50) NOT NULL COMMENT '报名地点',
  `g_place` varchar(100) NOT NULL COMMENT '比赛地点',
  `g_reward_introduce` text NOT NULL COMMENT '奖项介绍',
  `g_reward_money` varchar(30) NOT NULL COMMENT '奖金',
  `g_ggtype` varchar(30) NOT NULL COMMENT '广告类型',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='大赛表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `act_biggame`
--

INSERT INTO `act_biggame` (`g_id`, `g_name`, `g_type`, `g_need`, `g_host`, `g_organizer`, `g_entertime`, `g_endtime`, `g_bmplace`, `g_place`, `g_reward_introduce`, `g_reward_money`, `g_ggtype`, `p_id`) VALUES
(1, '', '唱歌比赛', '歌手', '湖北', '北京', 2013, 2014, '湖北孝感或网上报名', '北京', '一等奖10W，二等奖5W，三等奖3W', '一等奖10W，二等奖5W，三等奖3W', '0', 27),
(2, '', '唱歌比赛', '歌手', '湖北', '北京', 2013, 2014, '湖北孝感或网上报名', '北京', '一等奖10W，二等奖5W，三等奖3W', '一等奖10W，二等奖5W，三等奖3W', '大方啊', 27);

-- --------------------------------------------------------

--
-- 表的结构 `act_boss`
--

CREATE TABLE IF NOT EXISTS `act_boss` (
  `b_id` int(11) NOT NULL auto_increment COMMENT 'boss表id',
  `b_name` varchar(30) NOT NULL COMMENT 'boss名',
  `b_type` varchar(50) NOT NULL COMMENT 'boss捧项目类型',
  `b_tel` int(18) NOT NULL COMMENT '联系电话',
  `b_rz_introduction` text NOT NULL COMMENT '融资项目简述',
  `b_tz_introduction` text NOT NULL COMMENT '投资项目简述',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='boss信息表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `act_boss`
--

INSERT INTO `act_boss` (`b_id`, `b_name`, `b_type`, `b_tel`, `b_rz_introduction`, `b_tz_introduction`, `p_id`) VALUES
(1, '', '穿越火线', 2147483647, '地方地方个人', '地方v型成功的', 19),
(2, '', '穿越火线', 2147483647, '地方地方个人', '地方v型成功的', 19),
(3, '', '英雄联盟', 2147483647, '多大啊啊的期望', '罪刑法定', 19),
(4, '', '穿越火线', 2147483647, '地方地方个人', '地方v型成功的', 19);

-- --------------------------------------------------------

--
-- 表的结构 `act_column`
--

CREATE TABLE IF NOT EXISTS `act_column` (
  `c_id` int(11) NOT NULL auto_increment COMMENT '电视栏目id',
  `c_name` varchar(30) NOT NULL COMMENT '姓名',
  `c_job` varchar(30) NOT NULL COMMENT '现任职务',
  `c_calumnname` varchar(30) NOT NULL COMMENT '栏目名称',
  `c_lzplace` varchar(30) NOT NULL COMMENT '录制地点',
  `c_introduction` text NOT NULL COMMENT '栏目简介',
  `c_showtime` varchar(30) NOT NULL COMMENT '播出时间',
  `c_pingtai` varchar(30) NOT NULL COMMENT '播出平台',
  `c_zmtype` varchar(30) NOT NULL COMMENT '招募类型',
  `c_msplace` varchar(50) NOT NULL COMMENT '面试地点',
  `c_mstime` int(11) NOT NULL COMMENT '面试时间',
  `c_jb_need` varchar(300) NOT NULL COMMENT '嘉宾要求',
  `c_sex` enum('1','2') NOT NULL COMMENT '性别',
  `c_gg_type` varchar(30) NOT NULL COMMENT '广告植入类型',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='电视栏目信息表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `act_column`
--

INSERT INTO `act_column` (`c_id`, `c_name`, `c_job`, `c_calumnname`, `c_lzplace`, `c_introduction`, `c_showtime`, `c_pingtai`, `c_zmtype`, `c_msplace`, `c_mstime`, `c_jb_need`, `c_sex`, `c_gg_type`, `p_id`) VALUES
(1, '0', '电视台副台长', '天天向上', '湖南长沙', '阿道夫大赛飞', '每周日晚七点', '湖南卫视', '演员', '湖南长沙', 1384099200, '高端大气上档次', '1', '0', 24),
(2, '龚潮', '电视台副台长', '天天向上', '湖南长沙', '阿道夫大赛飞', '每周日晚七点', '湖南卫视', '演员', '湖南长沙', 1384099200, '高端大气上档次', '1', '0', 24),
(3, '龚潮', '电视台副台长', '天天向上', '湖南长沙', '阿道夫大赛飞', '每周日晚七点', '湖南卫视', '演员', '湖南长沙', 1384099200, '高端大气上档次', '1', '', 24);

-- --------------------------------------------------------

--
-- 表的结构 `act_director`
--

CREATE TABLE IF NOT EXISTS `act_director` (
  `d_id` int(11) NOT NULL auto_increment COMMENT '导演表id',
  `d_name` varchar(30) NOT NULL COMMENT '导演名',
  `d_work_config` varchar(300) NOT NULL COMMENT '工作室配置',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='导演表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `act_director`
--

INSERT INTO `act_director` (`d_id`, `d_name`, `d_work_config`, `p_id`) VALUES
(1, '爱的啊', '大罚单上飞', 29);

-- --------------------------------------------------------

--
-- 表的结构 `act_directormess`
--

CREATE TABLE IF NOT EXISTS `act_directormess` (
  `dm_id` int(11) NOT NULL auto_increment COMMENT 'id',
  `dm_works` varchar(50) NOT NULL COMMENT '作品',
  `dm_time` int(11) NOT NULL COMMENT '时间',
  `dm_jname` varchar(50) NOT NULL COMMENT '剧名',
  `dm_mainrole` varchar(30) NOT NULL COMMENT '主演',
  `dm_clother` varchar(50) NOT NULL COMMENT '服装师',
  `dm_dresser` varchar(50) NOT NULL COMMENT '化妆师',
  `dm_items` varchar(50) NOT NULL COMMENT '道具师',
  `dm_cameraman` varchar(50) NOT NULL COMMENT '摄影师',
  `dm_sound_engineer` varchar(50) NOT NULL COMMENT '录音师',
  `dm_arts` varchar(50) NOT NULL COMMENT '美术师',
  `dm_lighting_engineer` varchar(50) NOT NULL COMMENT '灯光师',
  `d_id` int(11) NOT NULL COMMENT '导演表id',
  PRIMARY KEY  (`dm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='导演具体的信息团队表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `act_directormess`
--

INSERT INTO `act_directormess` (`dm_id`, `dm_works`, `dm_time`, `dm_jname`, `dm_mainrole`, `dm_clother`, `dm_dresser`, `dm_items`, `dm_cameraman`, `dm_sound_engineer`, `dm_arts`, `dm_lighting_engineer`, `d_id`) VALUES
(1, ' 打飞 ', 1376496000, '0', '父母快乐', '防空洞里干活 ', '话费丢哦', '防护堤', '地方hi ', '大方', '代付款', ' 地方能麻烦', 1),
(2, '打飞', 1376496000, '0', '京客隆', '破', ' 看见咯', ' 哦i急哦', '急哦', '急哦', '爱人', '大方', 1);

-- --------------------------------------------------------

--
-- 表的结构 `act_examine`
--

CREATE TABLE IF NOT EXISTS `act_examine` (
  `ex_id` int(11) unsigned NOT NULL auto_increment COMMENT '主键',
  `ro_id` int(10) unsigned NOT NULL COMMENT '角色表角色id',
  `t_id` int(11) unsigned NOT NULL COMMENT '剧组id',
  `ex_time` int(11) unsigned NOT NULL COMMENT '最后投递时间',
  `p_id` int(11) unsigned NOT NULL,
  `isthrouth` int(3) NOT NULL default '1' COMMENT '是否通过，1为未通过，2为通过',
  PRIMARY KEY  (`ex_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `act_ex_type`
--

CREATE TABLE IF NOT EXISTS `act_ex_type` (
  `extid` int(11) NOT NULL auto_increment COMMENT '演艺节目类型表i',
  `extname` varchar(10) NOT NULL COMMENT '演艺节目类型名称',
  PRIMARY KEY  (`extid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='演艺节目类型表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `act_ex_type`
--

INSERT INTO `act_ex_type` (`extid`, `extname`) VALUES
(1, '电视剧'),
(2, '广告'),
(3, '电影'),
(4, '综艺节目'),
(5, '话剧'),
(6, '戏曲'),
(7, '主持人'),
(8, '舞蹈'),
(9, '相声小品'),
(10, '模特'),
(11, '魔术杂技');

-- --------------------------------------------------------

--
-- 表的结构 `act_login_log`
--

CREATE TABLE IF NOT EXISTS `act_login_log` (
  `lnlg_id` int(10) unsigned NOT NULL auto_increment COMMENT '管理员登陆日志id',
  `lnlg_username` varchar(30) NOT NULL COMMENT '登录名（用户名）',
  `lnlg_time` int(11) NOT NULL COMMENT '登录时间',
  `lnlg_ip` varchar(15) NOT NULL COMMENT '登陆ip',
  `usgp_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`lnlg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员登陆日志' AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `act_login_log`
--

INSERT INTO `act_login_log` (`lnlg_id`, `lnlg_username`, `lnlg_time`, `lnlg_ip`, `usgp_id`) VALUES
(1, 'gbcadmin', 1384059080, '127.0.0.1', 1),
(2, 'gbcadmin', 1384060090, '127.0.0.1', 1),
(3, 'gbcadmin', 1384060108, '127.0.0.1', 1),
(4, 'gbcadmin', 1384060198, '127.0.0.1', 1),
(5, 'gbcadmin', 1384265357, '127.0.0.1', 1),
(6, 'gbcadmin', 1384330637, '127.0.0.1', 1),
(7, 'gbcadmin', 1384346769, '127.0.0.1', 1),
(8, 'gbcadmin', 1384430399, '127.0.0.1', 1),
(9, 'gbcadmin', 1384483892, '127.0.0.1', 1),
(10, 'gbcadmin', 1384497987, '127.0.0.1', 1),
(11, 'gbcadmin', 1384688347, '127.0.0.1', 1),
(12, 'phpcms', 1384688691, '127.0.0.1', 2),
(13, 'gbcadmin', 1384688704, '127.0.0.1', 1),
(14, 'phpcms', 1384688742, '127.0.0.1', 2),
(15, 'gbcadmin', 1384738819, '127.0.0.1', 1),
(16, 'gbcadmin', 1384757734, '127.0.0.1', 1),
(17, 'gbcadmin', 1384776158, '127.0.0.1', 1),
(18, 'gbcadmin', 1384828332, '127.0.0.1', 1),
(19, 'gbcadmin', 1384867785, '127.0.0.1', 1),
(20, 'gbcadmin', 1384869516, '127.0.0.1', 1),
(21, 'gbcadmin', 1384912059, '127.0.0.1', 1),
(22, 'gbcadmin', 1384951893, '127.0.0.1', 1),
(23, 'gbcadmin', 1385001567, '127.0.0.1', 1),
(24, 'gbcadmin', 1385039318, '127.0.0.1', 1),
(25, 'gbcadmin', 1385042154, '127.0.0.1', 1),
(26, 'gbcadmin', 1385042824, '127.0.0.1', 1),
(27, 'gbcadmin', 1385043086, '127.0.0.1', 1),
(28, 'gbcadmin', 1385087869, '127.0.0.1', 1),
(29, 'gbcadmin', 1385100186, '127.0.0.1', 1),
(30, 'gbcadmin', 1385115579, '127.0.0.1', 1),
(31, 'gbcadmin', 1385366473, '127.0.0.1', 1),
(32, 'gbcadmin', 1385378405, '127.0.0.1', 1),
(33, 'gbcadmin', 1385432280, '127.0.0.1', 1),
(34, 'gbcadmin', 1385521627, '127.0.0.1', 1),
(35, 'gbcadmin', 1385557971, '127.0.0.1', 1),
(36, 'gbcadmin', 1385618068, '127.0.0.1', 1),
(37, 'gbcadmin', 1385899181, '127.0.0.1', 1),
(38, 'gbcadmin', 1385906816, '127.0.0.1', 1),
(39, 'gbcadmin', 1385950905, '127.0.0.1', 1),
(40, 'gbcadmin', 1385952268, '127.0.0.1', 1),
(41, 'gbcadmin', 1386038166, '127.0.0.1', 1),
(42, 'gbcadmin', 1386074453, '127.0.0.1', 1),
(43, 'gbcadmin', 1386121856, '127.0.0.1', 1),
(44, 'gbcadmin', 1386225415, '127.0.0.1', 1),
(45, 'gbcadmin', 1386228177, '127.0.0.1', 1),
(46, 'gbcadmin', 1386233333, '127.0.0.1', 1),
(47, 'gbcadmin', 1386294508, '127.0.0.1', 1),
(48, 'gbcadmin', 1386477826, '127.0.0.1', 1),
(49, 'gbcadmin', 1386492159, '127.0.0.1', 1),
(50, 'gbcadmin', 1386492227, '127.0.0.1', 1),
(51, 'gbcadmin', 1386509029, '127.0.0.1', 1),
(52, 'gbcadmin', 1386554195, '127.0.0.1', 1),
(53, 'gbcadmin', 1386643176, '127.0.0.1', 1),
(54, 'gbcadmin', 1386681736, '127.0.0.1', 1),
(55, 'gbcadmin', 1386685261, '127.0.0.1', 1),
(56, 'gbcadmin', 1386746880, '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `act_menus`
--

CREATE TABLE IF NOT EXISTS `act_menus` (
  `menu_id` int(10) unsigned NOT NULL auto_increment COMMENT '菜单id',
  `menu_name` varchar(50) NOT NULL COMMENT '菜单名称',
  `menu_m` varchar(30) NOT NULL COMMENT '对应的模块',
  `menu_a` varchar(30) NOT NULL COMMENT '对应的方法',
  `menu_rank` tinyint(1) NOT NULL COMMENT '菜单级数（1一级2二级）',
  `menu_pid` int(11) NOT NULL COMMENT '父级菜单id',
  `menu_state` tinyint(1) NOT NULL COMMENT '状态（1启用，0不启用）',
  `menu_sort` int(11) NOT NULL COMMENT '菜单排序',
  PRIMARY KEY  (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单表' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `act_menus`
--

INSERT INTO `act_menus` (`menu_id`, `menu_name`, `menu_m`, `menu_a`, `menu_rank`, `menu_pid`, `menu_state`, `menu_sort`) VALUES
(1, '全局设置', 'admin', 'index', 1, 0, 1, 0),
(2, '菜单管理', 'Menu', 'index', 2, 1, 1, 0),
(3, '内容管理', 'Content', 'index', 1, 0, 1, 0),
(4, '演员信息', 'Actormess', 'actormess', 2, 3, 1, 0),
(5, '剧组信息管理', 'Team', 'index', 2, 3, 1, 0),
(6, '节点权限', 'Power', 'index', 2, 1, 1, 0),
(7, '用户组管理', 'User', 'grouplist', 2, 1, 1, 0),
(8, '用户管理', 'User', 'index', 2, 1, 1, 0),
(9, '信息发布管理', 'Newsmanager', 'index', 1, 0, 1, 0),
(10, '信息发布', 'Newsmanager', 'index', 2, 9, 1, 0),
(11, '信息管理', 'Newsmanager', 'newsmanager', 2, 9, 1, 0),
(12, '星级评定', 'Level', 'level', 2, 3, 1, 0),
(15, '用户成员管理', 'Party', 'party', 1, 0, 1, 0),
(16, '添加成员', 'Party', 'party', 2, 15, 1, 0),
(17, '添加用户详细信息', 'Party', 'addactmess', 2, 15, 1, 0),
(18, '添加剧组详细信息', 'Party', 'addteammess', 2, 15, 1, 0),
(19, '用户信息审核', 'Examine', 'index', 1, 0, 1, 0),
(20, '图像审核', 'Examine', 'imgexam', 2, 19, 1, 0),
(21, '视频连接地址审核', 'Examine', 'vedioexam', 2, 19, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `act_menus_power`
--

CREATE TABLE IF NOT EXISTS `act_menus_power` (
  `mp_id` int(10) unsigned NOT NULL auto_increment COMMENT '菜单权限id',
  `usgp_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL COMMENT '菜单id',
  PRIMARY KEY  (`mp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='菜单权限表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `act_menus_power`
--

INSERT INTO `act_menus_power` (`mp_id`, `usgp_id`, `menu_id`) VALUES
(1, 2, 4),
(2, 2, 5),
(3, 2, 3);

-- --------------------------------------------------------

--
-- 表的结构 `act_message`
--

CREATE TABLE IF NOT EXISTS `act_message` (
  `me_id` int(10) unsigned NOT NULL auto_increment COMMENT '消息表id',
  `me_post_id` int(10) unsigned NOT NULL COMMENT '发消息人的id',
  `me_get_id` int(10) unsigned NOT NULL COMMENT '接收人的id',
  `me_title` varchar(300) NOT NULL COMMENT '消息标题',
  `me_time` int(10) unsigned NOT NULL COMMENT '时间',
  `me_content` text NOT NULL COMMENT '消息内容',
  `me_state` enum('1','2') NOT NULL default '1' COMMENT '状态，是否看过',
  PRIMARY KEY  (`me_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `act_modern`
--

CREATE TABLE IF NOT EXISTS `act_modern` (
  `mo_id` int(11) NOT NULL auto_increment COMMENT '话剧表id',
  `mo_name` varchar(30) default NULL COMMENT '姓名',
  `mo_job` varchar(30) default NULL COMMENT '现任职务',
  `mo_jz_place` varchar(80) default NULL COMMENT '建组地点',
  `mo_company` varchar(50) default NULL COMMENT '出品公司',
  `mo_tel` int(18) NOT NULL COMMENT '联系电话',
  `mo_j_name` varchar(50) default NULL COMMENT '剧名',
  `mo_pl_place` varchar(80) NOT NULL COMMENT '预计排练地点',
  `mo_show_place` varchar(80) NOT NULL COMMENT '预计演出地点',
  `mo_show_count` int(5) NOT NULL COMMENT '预计演出场次',
  `mo_jb_introduct` text NOT NULL COMMENT '剧本简介',
  `mo_spend_time` varchar(30) NOT NULL COMMENT '预定排练时间',
  `mo_gg_type` varchar(30) NOT NULL COMMENT '广告植入类型',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  PRIMARY KEY  (`mo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='话剧信息表' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `act_modern`
--

INSERT INTO `act_modern` (`mo_id`, `mo_name`, `mo_job`, `mo_jz_place`, `mo_company`, `mo_tel`, `mo_j_name`, `mo_pl_place`, `mo_show_place`, `mo_show_count`, `mo_jb_introduct`, `mo_spend_time`, `mo_gg_type`, `p_id`) VALUES
(1, NULL, '副导演', '北京', '北京嘉禾影视传媒公司', 2147483647, '很卡很紧张', '加考虑的', 'i哦啊是否', 30, '会很大分开了京东方开出fiume那次欧式风hiuznidfiou下次多发货快减肥我', '0', '0', 33),
(2, NULL, '副导演', '北京', '北京嘉禾影视传媒公司', 2147483647, '很卡很紧张', '加考虑的', 'i哦啊是否', 30, '会很大分开了京东方开出fiume那次欧式风hiuznidfiou下次多发货快减肥我', '0', '0', 33),
(3, '话剧', '副导演', '北京', '北京嘉禾影视传媒公司', 2147483647, '打', '暗的地方爱迪生', '阿斯蒂芬', 30, '地方的爱国电饭锅爱的噶', '0', '0', 33),
(4, '话剧', '副导演', '北京', '北京嘉禾影视传媒公司', 2147483647, '打', '暗的地方爱迪生', '阿斯蒂芬', 30, '地方的爱国电饭锅爱的噶', '0', '0', 33),
(5, '话剧', '副导演', '北京', '北京嘉禾影视传媒公司', 2147483647, '打', '暗的地方爱迪生', '阿斯蒂芬', 30, '地方的爱国电饭锅爱的噶', '0', '0', 33),
(6, '话剧啊', '发', '打飞机好', '地方 ', 2147483647, '打算放', '打算放', '爱的发的', 30, '阿打发打发进口货', '一个月', '经典款了的撒飞', 33),
(7, '话剧啊', '发', '打飞机好', '地方 ', 2147483647, '打算放', '打算放', '爱的发的', 30, '阿打发打发进口货', '一个月', '经典款了的撒飞', 33),
(8, '话剧啊', '发', '打飞机好', '地方 ', 2147483647, '打算放', '打算放', '爱的发的', 30, '阿打发打发进口货', '一个月', '经典款了的撒飞', 33),
(9, '话剧啊', '发', '打飞机好', '地方 ', 2147483647, '打算放', '打算放', '爱的发的', 30, '阿打发打发进口货', '一个月', '经典款了的撒飞', 33),
(10, '话剧啊', '发', '打飞机好', '地方 ', 2147483647, '打算放', '打算放', '爱的发的', 30, '阿打发打发进口货', '一个月', '经典款了的撒飞', 33);

-- --------------------------------------------------------

--
-- 表的结构 `act_modern_role`
--

CREATE TABLE IF NOT EXISTS `act_modern_role` (
  `mo_ro_id` int(10) unsigned NOT NULL auto_increment COMMENT '话剧角色id',
  `mo_ro_sex` enum('1','2') NOT NULL COMMENT '角色性别',
  `mo_ro_name` varchar(30) NOT NULL COMMENT '角色名',
  `mo_ro_age` int(11) NOT NULL COMMENT '角色年龄',
  `mo_ro_high` varchar(10) NOT NULL COMMENT '角色身高',
  `mo_ro_tezheng` varchar(300) NOT NULL COMMENT '角色特征',
  `mo_ro_xiaozhuan` text NOT NULL COMMENT '人物小传',
  `mo_ro_need` text NOT NULL COMMENT '角色要求',
  `mo_id` int(11) NOT NULL COMMENT '话剧信息表id',
  PRIMARY KEY  (`mo_ro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='话剧角色表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `act_modern_role`
--

INSERT INTO `act_modern_role` (`mo_ro_id`, `mo_ro_sex`, `mo_ro_name`, `mo_ro_age`, `mo_ro_high`, `mo_ro_tezheng`, `mo_ro_xiaozhuan`, `mo_ro_need`, `mo_id`) VALUES
(1, '1', '比超', 22, '175', '帅', '话剧哦i打覅哦好', '爱的发的地方', 6),
(2, '2', '阿达的', 22, '162', '阿双方搭建哦i', '搭建哦i啊批发破i富婆', '的换哦i发', 6);

-- --------------------------------------------------------

--
-- 表的结构 `act_party`
--

CREATE TABLE IF NOT EXISTS `act_party` (
  `p_id` int(11) NOT NULL auto_increment COMMENT '用户主键',
  `p_name` varchar(30) NOT NULL COMMENT '用户名',
  `p_password` char(40) NOT NULL COMMENT '用户密码',
  `type` int(2) NOT NULL COMMENT '用户类型',
  PRIMARY KEY  (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='所有注册用户表' AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `act_party`
--

INSERT INTO `act_party` (`p_id`, `p_name`, `p_password`, `type`) VALUES
(1, 'want', '918729401042784170181129ee01802429711e40', 1),
(2, 'aaa', '1e7518e15892e812801282214284040825470221', 1),
(3, 'qqq', '0114428110e804440221948829829188e21142e1', 1),
(4, 'gaoyi', '421794458105112e12e701225e284242022021e0', 2),
(5, '', '802802ee1e495918271198e88141228108821118', 2),
(6, '', '802802ee1e495918271198e88141228108821118', 2),
(7, '', '802802ee1e495918271198e88141228108821118', 2),
(8, 'ggg', '1184821214194524528140781112804441528188', 2),
(9, 'aaa', '1e7518e15892e812801282214284040825470221', 2),
(10, 'ggg', '1184821214194524528140781112804441528188', 2),
(11, 'admin', '8122e770e2520e914418472510e4212114580881', 5),
(12, 'admin', '8122e770e2520e914418472510e4212114580881', 5),
(13, 'admin', '8122e770e2520e914418472510e4212114580881', 5),
(14, 'admin', '8122e770e2520e914418472510e4212114580881', 5),
(15, 'admin', '8122e770e2520e914418472510e4212114580881', 5),
(16, 'admin', '8122e770e2520e914418472510e4212114580881', 5),
(17, 'admin', '8122e770e2520e914418472510e4212114580881', 5),
(18, 'wang', '4248888472822281e8ee79811982441142917158', 5),
(19, 'gbca', '818818281921441e2111e19514045222222e2992', 5),
(20, 'gbca', '818818281921441e2111e19514045222222e2992', 5),
(21, 'gbcg', '8974421227e0e81871e12880e8141122772872e5', 7),
(22, 'gbcb', '219020001410228888181e844787487981889110', 7),
(23, 'gbcg', '219020001410228888181e844787487981889110', 7),
(24, 'gbcg', '802802ee1e495918271198e88141228108821118', 7),
(25, 'gbcg', '802802ee1e495918271198e88141228108821118', 7),
(26, 'gbcg', '802802ee1e495918271198e88141228108821118', 7),
(27, 'dasai', 'e08585848441911e9947e210e8221421741e4427', 8),
(28, 'dasai', 'e08585848441911e9947e210e8221421741e4427', 8),
(29, 'daoyan', '7145482208287180885e0281881e18118e782922', 9),
(30, 'ggshang', '155748258181012102e1271182171885889e0492', 11),
(31, 'admin', '8122e770e2520e914418472510e4212114580881', 10),
(32, 'admin', '8122e770e2520e914418472510e4212114580881', 10),
(33, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(34, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(35, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(36, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(37, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(38, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(39, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(40, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(41, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(42, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(43, 'huaju', '744578909120804e8528412e8418852101278071', 12),
(44, 'huaju', '744578909120804e8528412e8418852101278071', 12);

-- --------------------------------------------------------

--
-- 表的结构 `act_party_type`
--

CREATE TABLE IF NOT EXISTS `act_party_type` (
  `pt_id` int(11) NOT NULL auto_increment COMMENT '用户类型表id',
  `pt_name` varchar(30) NOT NULL COMMENT '类型名称',
  PRIMARY KEY  (`pt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户类型表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `act_party_type`
--

INSERT INTO `act_party_type` (`pt_id`, `pt_name`) VALUES
(1, '电视剧电影'),
(2, '演员'),
(3, '电视栏目'),
(4, '活动演出'),
(5, '大赛'),
(6, '广告代言'),
(7, '话剧'),
(8, 'BOSS'),
(9, '导演'),
(10, '编剧'),
(11, '广告植入');

-- --------------------------------------------------------

--
-- 表的结构 `act_play_intro`
--

CREATE TABLE IF NOT EXISTS `act_play_intro` (
  `pl_id` int(11) NOT NULL auto_increment COMMENT '剧本id',
  `t_id` int(11) NOT NULL COMMENT '剧组id',
  `p_introduction` text NOT NULL COMMENT '剧本简介',
  `p_address` varchar(300) NOT NULL COMMENT '剧本拍摄地点',
  `p_name` varchar(30) NOT NULL COMMENT '剧组的名称',
  `p_starttime` int(10) unsigned NOT NULL COMMENT '开始时间',
  `p_endtime` int(10) NOT NULL COMMENT '结束时间',
  `p_state` varchar(30) NOT NULL COMMENT '剧组状态',
  `p_actor_need` text NOT NULL COMMENT '所需角色介绍',
  PRIMARY KEY  (`pl_id`),
  UNIQUE KEY `t_id` (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `act_session`
--

CREATE TABLE IF NOT EXISTS `act_session` (
  `session_id` varchar(100) NOT NULL COMMENT 'sessionid',
  `session_data` text NOT NULL COMMENT 'session数据',
  `session_time` int(11) NOT NULL COMMENT 'session时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `act_team`
--

CREATE TABLE IF NOT EXISTS `act_team` (
  `t_id` int(11) unsigned NOT NULL auto_increment COMMENT '主键',
  `p_id` int(10) unsigned NOT NULL COMMENT '成员表中id',
  `ty_id` int(11) unsigned NOT NULL COMMENT '剧组类型表id',
  `truename` varchar(30) NOT NULL COMMENT '真实姓名',
  `j_job` varchar(30) NOT NULL COMMENT '现任职务',
  `j_name` varchar(100) NOT NULL COMMENT '剧组名称',
  `j_tel` int(18) unsigned NOT NULL COMMENT '剧组联系电话',
  `j_time` int(10) NOT NULL COMMENT '建组时间',
  `j_checkname` varchar(50) character set ucs2 default NULL COMMENT '京审电视剧号',
  `j_play_name` varchar(30) NOT NULL COMMENT '剧名',
  `j_background` varchar(30) NOT NULL COMMENT '时代背景',
  `j_count` int(10) unsigned NOT NULL COMMENT '剧本总集数',
  `j_jzaddress` varchar(100) NOT NULL COMMENT '建组地点',
  `j_address` varchar(300) NOT NULL COMMENT '拍摄地点',
  `j_introduction` text NOT NULL COMMENT '剧组简介',
  `j_message` varchar(50) NOT NULL COMMENT '剧本简单介绍',
  `j_starttime` int(11) NOT NULL COMMENT '开拍时间',
  `j_spendtime` int(11) NOT NULL COMMENT '预计所花时间',
  `j_endtime` varchar(40) NOT NULL COMMENT '结束时间',
  `j_state` varchar(30) NOT NULL COMMENT '状态',
  `company` varchar(100) NOT NULL COMMENT '公司名称',
  `direct` text NOT NULL COMMENT '导演（导演信息）',
  `writer` varchar(30) NOT NULL COMMENT '编剧',
  PRIMARY KEY  (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='剧组信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `act_team_role`
--

CREATE TABLE IF NOT EXISTS `act_team_role` (
  `ro_id` int(11) NOT NULL auto_increment COMMENT '角色表id',
  `ro_name` varchar(30) NOT NULL COMMENT '角色名',
  `ro_sex` enum('1','2') NOT NULL COMMENT '角色性别',
  `ro_discription` varchar(100) NOT NULL COMMENT '角色描述（主演，配角，客串，特约，群众）',
  `ro_neednumber` varchar(30) NOT NULL COMMENT '参与拍摄集数',
  `ro_needcount` int(10) NOT NULL COMMENT '需要场次数',
  `ro_age` int(10) NOT NULL COMMENT '角色需要年龄',
  `ro_high` int(10) NOT NULL COMMENT '角色身高',
  `ro_special` varchar(300) NOT NULL COMMENT '任务特征',
  `ro_need` varchar(300) NOT NULL COMMENT '角色要求',
  `age_id` int(10) NOT NULL COMMENT '年龄段id',
  `ro_introduce` text NOT NULL COMMENT '角色介绍',
  `t_id` int(11) NOT NULL COMMENT '剧组id',
  PRIMARY KEY  (`ro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='剧组角色表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `act_team_type`
--

CREATE TABLE IF NOT EXISTS `act_team_type` (
  `ty_id` int(11) NOT NULL auto_increment COMMENT '剧组类型表主键',
  `t_name` varchar(30) NOT NULL COMMENT '剧组类型名称',
  PRIMARY KEY  (`ty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='剧组类型表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `act_team_type`
--

INSERT INTO `act_team_type` (`ty_id`, `t_name`) VALUES
(1, '电影'),
(2, '电视剧'),
(3, '综艺节目'),
(4, '活动演出'),
(5, '编剧'),
(6, 'BOSS'),
(7, '电视栏目'),
(8, '大赛'),
(9, '导演'),
(10, '广告'),
(11, '广告商'),
(12, '话剧');

-- --------------------------------------------------------

--
-- 表的结构 `act_type`
--

CREATE TABLE IF NOT EXISTS `act_type` (
  `t_id` int(11) NOT NULL auto_increment COMMENT '演员类型id',
  `t_name` varchar(30) NOT NULL COMMENT '类型名称',
  PRIMARY KEY  (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='演员类型表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `act_type`
--

INSERT INTO `act_type` (`t_id`, `t_name`) VALUES
(1, '影视演员'),
(2, '话剧演员'),
(3, '戏曲演员'),
(4, '主持人'),
(5, '舞蹈演员'),
(6, '相声小品'),
(7, '平面模特'),
(8, 'T台模特'),
(9, '魔术杂技'),
(10, '歌手'),
(11, '配音演员');

-- --------------------------------------------------------

--
-- 表的结构 `act_users`
--

CREATE TABLE IF NOT EXISTS `act_users` (
  `user_id` int(10) unsigned NOT NULL auto_increment COMMENT '用户id',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `user_password` varchar(40) NOT NULL COMMENT '用户密码',
  `usgp_id` int(11) NOT NULL COMMENT '用户组id',
  `user_tel` char(18) NOT NULL COMMENT '联系方式',
  `user_email` varchar(30) NOT NULL COMMENT '邮箱',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户（系统维护，校长，教务处，教秘）' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `act_users`
--

INSERT INTO `act_users` (`user_id`, `user_name`, `user_password`, `usgp_id`, `user_tel`, `user_email`) VALUES
(1, 'gbcadmin', '85101222181144812521881824225e121e810487', 1, '13571211234', '1246810861@qq.com'),
(2, 'phpcms', '07488224982859287880118951e2811889511181', 2, '13114123214', '123212@qq.com'),
(4, 'passorno', '224159e259917499152548982158014e92851747', 3, '13521971315', '1246810861@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `act_users_group`
--

CREATE TABLE IF NOT EXISTS `act_users_group` (
  `usgp_id` int(10) unsigned NOT NULL auto_increment COMMENT '用户组编号',
  `usgp_name` varchar(30) NOT NULL COMMENT '用户类型名称',
  `usgp_describe` varchar(1000) NOT NULL COMMENT '描述',
  `usgp_state` tinyint(1) NOT NULL COMMENT '状态（1启用，0不启用）',
  PRIMARY KEY  (`usgp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户组表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `act_users_group`
--

INSERT INTO `act_users_group` (`usgp_id`, `usgp_name`, `usgp_describe`, `usgp_state`) VALUES
(1, '系统维护', '维护系统', 1),
(2, '网站编辑', '编辑网站应该显示的信息', 1),
(3, '演员审核编辑', '编辑审核投递简历的演员是否通过', 1);

-- --------------------------------------------------------

--
-- 表的结构 `act_writer`
--

CREATE TABLE IF NOT EXISTS `act_writer` (
  `w_id` int(11) NOT NULL auto_increment COMMENT '编剧id',
  `p_id` int(11) NOT NULL COMMENT '用户组id',
  `w_name` varchar(30) NOT NULL COMMENT '姓名',
  `w_sex` enum('1','2') NOT NULL COMMENT '性别',
  `w_tel` int(18) NOT NULL COMMENT '联系电话',
  `w_j_type` varchar(30) NOT NULL COMMENT '剧本类型',
  `w_j_introduction` text NOT NULL COMMENT '剧本简介',
  `w_gg_type` varchar(30) NOT NULL COMMENT '植入广告类型',
  PRIMARY KEY  (`w_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='编剧表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `act_writer`
--

INSERT INTO `act_writer` (`w_id`, `p_id`, `w_name`, `w_sex`, `w_tel`, `w_j_type`, `w_j_introduction`, `w_gg_type`) VALUES
(1, 11, '章子怡', '2', 2147483647, '古代悬疑', '进口量活动柜阿黑哥很快对方', '的哈佛空中小姐发擦掉刷卡机飞'),
(2, 18, '往', '1', 2147483647, '古代悬疑', '阿非官方vgdfwe', '的徐人都的');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
