-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 12 月 06 日 18:43
-- 服务器版本: 5.1.58
-- PHP 版本: 5.3.6-13ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pepsi`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `email` varchar(32) NOT NULL,
  `create_time` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `salt`, `sex`, `email`, `create_time`) VALUES
(1, 'test1', 'test1', '0', '男', '21@fd.com', 0),
(2, 'admin', 'admin', '0', '男', 'amdin@f.com', 0),
(3, 'a', 'a', '0', '女', 'a@dd.com', 1322472288),
(4, 'admin', 'aa', '0', '女', 'aa@dd.com', 1322472785),
(5, 'aa', '', '4', '女', 'a@d.com', 1322473957),
(6, 'f', 'c7fce30886385518998d0ffb4ee38519', '4', '女', 'f@c.com', 1322474097),
(7, 'c', '96d2c24b30cc980331d0aa3f73f7f2c6', '4ed35aaec86c24.52822282', '女', 'c@s.com', 1322474158),
(8, 'cc', 'a967c105468649f8e6a0914f08a8deb1', '4ed35e6e2254e2.30644473', '女', 'c@fd.com', 1322475118),
(9, 'dd', '754747e27c4cbe6459e9073ef5b46386', '4ed43fe78a0e62.26053905', '女', 'dd@ff.com', 1322532839),
(10, 'ww', '0e817f9a22273af47dfe420b3b708499', '4ed45be4333fc1.60624145', '女', 'ww@qq.com', 1322540004),
(11, 'ccc', '2d72f2e9b2315fe51da421a14282c3c2', '4ed4ab856921d2.79375925', '女', 'cc@d.com', 1322560389),
(12, 'gg', 'fb668aa438b92da514d6074c616e5230', '4ed4ae4dbb5754.93399818', '女', 'gg@ff.com', 1322561101),
(13, 'ggg', '4b09693178981f53d8cc468d18841708', '4ed4ae78eaa2b4.89781259', '女', 'gg@fd.com', 1322561144),
(14, 'aaa', '784b9c61ba06db84d3711504eb900428', '4ed4b1529a1de2.24007148', '女', 'aa@ff.com', 1322561874);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(10) unsigned NOT NULL,
  `parent_cid` int(10) unsigned DEFAULT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `nick` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `type` varchar(64) DEFAULT NULL,
  `pic_url` varchar(128) DEFAULT NULL,
  `sort_order` int(10) unsigned DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `modified` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`cid`, `parent_cid`, `user_id`, `nick`, `name`, `type`, `pic_url`, `sort_order`, `created`, `modified`) VALUES
(366686258, 0, '709140474', '仕宇网络科技', '材料包', 'manual_type', '', 1, 1315362066, 1315362066),
(367922142, 0, '709140474', '仕宇网络科技', '男装', 'manual_type', '', 2, 1315362066, 1315362066),
(388789586, 367922142, '709140474', '仕宇网络科技', '裤子', 'manual_type', '', 1, 1315362066, 1315362066),
(388789587, 367922142, '709140474', '仕宇网络科技', '外套', 'manual_type', '', 2, 1315362066, 1315362066),
(367920329, 0, '709140474', '仕宇网络科技', '学院', 'manual_type', '', 3, 1315362066, 1315362066),
(385189487, 0, '709140474', '仕宇网络科技', '精准导购支持', 'manual_type', 'http://jz.autobloglink.com/t/j/d/y/s/67353851/', 4, 1315362066, 1315362066);

-- --------------------------------------------------------

--
-- 表的结构 `dapei`
--

CREATE TABLE IF NOT EXISTS `dapei` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(128) NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `publish_status` tinyint(3) unsigned NOT NULL,
  `publish_count` int(10) unsigned DEFAULT NULL,
  `html` text NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dapei_meal`
--

CREATE TABLE IF NOT EXISTS `dapei_meal` (
  `taocan_id` int(10) unsigned NOT NULL,
  `meal_id` int(10) unsigned NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `meal_name` varchar(256) NOT NULL,
  `meal_price` varchar(45) NOT NULL,
  `postage_id` int(11) DEFAULT NULL,
  `meal_memo` text,
  `status` tinyint(3) unsigned NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  `raw_data` text,
  PRIMARY KEY (`taocan_id`,`meal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `feed_id` int(10) unsigned DEFAULT NULL,
  `feed_type` tinyint(3) unsigned DEFAULT '0',
  `created` int(10) unsigned DEFAULT NULL,
  `updated` int(10) unsigned DEFAULT NULL,
  `type` tinyint(3) unsigned DEFAULT NULL,
  `publish_count` int(10) unsigned DEFAULT NULL,
  `publish_index` int(10) unsigned DEFAULT '0',
  `status` tinyint(3) unsigned DEFAULT '0',
  `user_id` varchar(128) NOT NULL,
  `successer` int(10) unsigned DEFAULT '0',
  `failer` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `job_item`
--

CREATE TABLE IF NOT EXISTS `job_item` (
  `job_id` int(10) unsigned NOT NULL,
  `item_id` varchar(128) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `position` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`job_id`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `job_log`
--

CREATE TABLE IF NOT EXISTS `job_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(128) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  `logtime` int(11) unsigned DEFAULT NULL,
  `message` text,
  `item_id` varchar(128) NOT NULL,
  `job_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(128) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL,
  `logtime` int(11) unsigned DEFAULT NULL,
  `message` text,
  `item_id` int(10) unsigned DEFAULT NULL,
  `task_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- 转存表中的数据 `log`
--

INSERT INTO `log` (`id`, `level`, `category`, `logtime`, `message`, `item_id`, `task_id`) VALUES
(1, '1', '1', 1, 'html', 1, 4),
(2, '1', '2', 2, 'html', 2, 0),
(3, '1', '3', 3, 'html', 3, 1),
(4, '1', '4', 4, 'html', 4, 2),
(5, '1', '5', 5, 'html', 0, 3),
(6, '1', '6', 6, 'html', 1, 4),
(7, '1', '7', 7, 'html', 2, 0),
(8, '1', '8', 8, 'html', 3, 1),
(9, '1', '9', 9, 'html', 4, 2),
(10, '1', '10', 10, 'html', 0, 3),
(11, '1', '11', 11, 'html', 1, 4),
(12, '1', '12', 12, 'html', 2, 0),
(13, '1', '13', 13, 'html', 3, 1),
(14, '1', '14', 14, 'html', 4, 2),
(15, '1', '15', 15, 'html', 0, 3),
(16, '1', '16', 16, 'html', 1, 4),
(17, '1', '17', 17, 'html', 2, 0),
(18, '1', '18', 18, 'html', 3, 1),
(19, '1', '19', 19, 'html', 4, 2),
(20, '1', '20', 20, 'html', 0, 3),
(21, '1', '21', 21, 'html', 1, 4),
(22, '1', '22', 22, 'html', 2, 0),
(23, '1', '23', 23, 'html', 3, 1),
(24, '1', '24', 24, 'html', 4, 2),
(25, '1', '25', 25, 'html', 0, 3),
(26, '1', '26', 26, 'html', 1, 4),
(27, '1', '27', 27, 'html', 2, 0),
(28, '1', '28', 28, 'html', 3, 1),
(29, '1', '29', 29, 'html', 4, 2),
(30, '1', '30', 30, 'html', 0, 3),
(31, '1', '31', 31, 'html', 1, 4),
(32, '1', '32', 32, 'html', 2, 0),
(33, '1', '33', 33, 'html', 3, 1),
(34, '1', '34', 34, 'html', 4, 2),
(35, '1', '35', 35, 'html', 0, 3),
(36, '1', '36', 36, 'html', 1, 4),
(37, '1', '37', 37, 'html', 2, 0),
(38, '1', '38', 38, 'html', 3, 1),
(39, '1', '39', 39, 'html', 4, 2),
(40, '1', '40', 40, 'html', 0, 3),
(41, '1', '41', 41, 'html', 1, 4),
(42, '1', '42', 42, 'html', 2, 0),
(43, '1', '43', 43, 'html', 3, 1),
(44, '1', '44', 44, 'html', 4, 2),
(45, '1', '45', 45, 'html', 0, 3),
(46, '1', '46', 46, 'html', 1, 4),
(47, '1', '47', 47, 'html', 2, 0),
(48, '1', '48', 48, 'html', 3, 1),
(49, '1', '49', 49, 'html', 4, 2),
(50, '1', '50', 50, 'html', 0, 3),
(51, '1', '51', 51, 'html', 1, 4),
(52, '1', '52', 52, 'html', 2, 0),
(53, '1', '53', 53, 'html', 3, 1),
(54, '1', '54', 54, 'html', 4, 2),
(55, '1', '55', 55, 'html', 0, 3),
(56, '1', '56', 56, 'html', 1, 4),
(57, '1', '57', 57, 'html', 2, 0),
(58, '1', '58', 58, 'html', 3, 1),
(59, '1', '59', 59, 'html', 4, 2),
(60, '1', '60', 60, 'html', 0, 3),
(61, '1', '61', 61, 'html', 1, 4),
(62, '1', '62', 62, 'html', 2, 0),
(63, '1', '63', 63, 'html', 3, 1),
(64, '1', '64', 64, 'html', 4, 2),
(65, '1', '65', 65, 'html', 0, 3),
(66, '1', '66', 66, 'html', 1, 4),
(67, '1', '67', 67, 'html', 2, 0),
(68, '1', '68', 68, 'html', 3, 1),
(69, '1', '69', 69, 'html', 4, 2),
(70, '1', '70', 70, 'html', 0, 3),
(71, '1', '71', 71, 'html', 1, 4),
(72, '1', '72', 72, 'html', 2, 0),
(73, '1', '73', 73, 'html', 3, 1),
(74, '1', '74', 74, 'html', 4, 2),
(75, '1', '75', 75, 'html', 0, 3),
(76, '1', '76', 76, 'html', 1, 4),
(77, '1', '77', 77, 'html', 2, 0),
(78, '1', '78', 78, 'html', 3, 1),
(79, '1', '79', 79, 'html', 4, 2),
(80, '1', '80', 80, 'html', 0, 3),
(81, '1', '81', 81, 'html', 1, 4),
(82, '1', '82', 82, 'html', 2, 0),
(83, '1', '83', 83, 'html', 3, 1),
(84, '1', '84', 84, 'html', 4, 2),
(85, '1', '85', 85, 'html', 0, 3),
(86, '1', '86', 86, 'html', 1, 4),
(87, '1', '87', 87, 'html', 2, 0),
(88, '1', '88', 88, 'html', 3, 1),
(89, '1', '89', 89, 'html', 4, 2),
(90, '1', '90', 90, 'html', 0, 3),
(91, '1', '91', 91, 'html', 1, 4),
(92, '1', '92', 92, 'html', 2, 0),
(93, '1', '93', 93, 'html', 3, 1),
(94, '1', '94', 94, 'html', 4, 2),
(95, '1', '95', 95, 'html', 0, 3),
(96, '1', '96', 96, 'html', 1, 4),
(97, '1', '97', 97, 'html', 2, 0),
(98, '1', '98', 98, 'html', 3, 1),
(99, '1', '99', 99, 'html', 4, 2);

-- --------------------------------------------------------

--
-- 表的结构 `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `meal_id` int(10) unsigned NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `html` text,
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`meal_id`,`template_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `meal`
--

INSERT INTO `meal` (`meal_id`, `user_id`, `template_id`, `html`, `created`, `updated`) VALUES
(2951363, '709140474', 125, '\n\n&lt;table width=&quot;950&quot; height=&quot;510&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; align=&quot;center&quot; background=&quot;http://app.xindianbao.dev/da/images/school/950_bj_five.gif&quot; style=&quot;background-repeat:no-repeat;&quot;&gt;\n  &lt;tbody&gt;\n    &lt;tr&gt;\n      &lt;td width=&quot;67&quot; height=&quot;43&quot;&gt;&amp;nbsp;&lt;/td&gt;\n      &lt;td height=&quot;43&quot;&gt;&amp;nbsp;&lt;/td&gt;\n      &lt;td width=&quot;37&quot; height=&quot;43&quot;&gt;&amp;nbsp;&lt;/td&gt;\n      &lt;td height=&quot;43&quot;&gt;&amp;nbsp;&lt;/td&gt;\n      &lt;td height=&quot;43&quot;&gt;&amp;nbsp;&lt;/td&gt;\n    &lt;/tr&gt;\n    &lt;tr&gt;\n      &lt;td width=&quot;67&quot;&gt;&amp;nbsp;&lt;/td&gt;\n      &lt;td width=&quot;310&quot; height=&quot;330&quot; align=&quot;right&quot; valign=&quot;top&quot; background=&quot;http://img05.taobaocdn.com/bao/uploaded/i5/T1OGGkXf4EXXXkktra_120516.jpg_310x310.jpg&quot; style=&quot;background-repeat:no-repeat; background-position:center center;&quot;&gt;\n        &lt;a href=&quot;http://item.taobao.com/item.htm?id=10942251200&quot; target=&quot;_blank&quot; style=&quot;text-decoration:none;height:1px; padding:298px 0 0 0; display:block;&quot;&gt;\n          &lt;font style=&quot;background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px; margin-bottom:10px;&quot;&gt;￥108&lt;/font&gt;\n        &lt;/a&gt;\n      &lt;/td&gt; \n      &lt;td width=&quot;37&quot;&gt;&amp;nbsp;&lt;/td&gt;\n      &lt;td width=&quot;330&quot; height=&quot;330&quot;&gt;&lt;table width=&quot;326&quot; align=&quot;center&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\n          &lt;tbody&gt;\n            &lt;tr&gt;\n              &lt;td width=&quot;160&quot; height=&quot;160&quot; valign=&quot;top&quot; background=&quot;http://img02.taobaocdn.com/bao/uploaded/i2/T13b4rXfduXXcUnEQV_021927.jpg_160x160.jpg&quot; style=&quot;background-position:center center; background-repeat:no-repeat;background-color:#FFF&quot;&gt;\n                &lt;a href=&quot;http://item.taobao.com/item.htm?id=10941406660&quot; style=&quot;text-decoration:none; padding-top:138px; height:1px; display:block;&quot;&gt;\n                  &lt;font style=&quot;background-color:#ff0000; color:#fff; text-align:center;  height:22px; display:block; line-height:22px;&quot;&gt;￥100&lt;/font&gt;\n                &lt;/a&gt;\n              &lt;/td&gt;\n              &lt;td width=&quot;6&quot;&gt;&lt;/td&gt;\n              &lt;td width=&quot;160&quot; height=&quot;160&quot; valign=&quot;top&quot; background=&quot;http://img05.taobaocdn.com/bao/uploaded/i5/T1o5ilXeNBXXb.BO3U_014945.jpg_160x160.jpg&quot; style=&quot;background-repeat:no-repeat; background-position:center center;background-color:#FFF&quot;&gt;\n                \n               &lt;a href=&quot;http://item.taobao.com/item.htm?id=12201727515&quot; target=&quot;_blank&quot; style=&quot;text-decoration:none; padding-top:138px; height:1px; display:block;&quot;&gt;\n                  &lt;font style=&quot;background-color:#ff0000; color:#fff; text-align:center; height:22px; display:block; line-height:22px;&quot;&gt;￥99&lt;/font&gt;\n                               &lt;/a&gt;\n              &lt;/td&gt;\n            &lt;/tr&gt;\n            &lt;tr height=&quot;6&quot;&gt;\n\n            &lt;/tr&gt;\n            &lt;tr&gt;\n              &lt;td width=&quot;160&quot; height=&quot;160&quot; valign=&quot;top&quot; background=&quot;http://app.xindianbao.dev/da/images/school/950_nopic.gif&quot; style=&quot;background-repeat:no-repeat; background-position:center center;background-color:#FFF&quot;&gt;\n                               &lt;/a&gt;\n              &lt;/td&gt;   \n              &lt;td width=&quot;6&quot;&gt;&lt;/td&gt;\n              &lt;td width=&quot;160&quot; height=&quot;160&quot; valign=&quot;top&quot; background=&quot;http://app.xindianbao.dev/da/images/school/950_nopic.gif&quot; style=&quot;background-repeat:no-repeat; background-position:center center;background-color:#FFF&quot;&gt;\n                               &lt;/a&gt;\n              &lt;/td&gt;    \n            &lt;/tr&gt;\n      &lt;/tbody&gt;&lt;/table&gt;&lt;/td&gt;\n      &lt;td valign=&quot;top&quot;&gt;\n        &lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\n          &lt;tbody&gt;&lt;tr&gt;\n              &lt;td height=&quot;42&quot;&gt;&amp;nbsp;&lt;/td&gt;\n            &lt;/tr&gt;\n            &lt;tr&gt;\n              &lt;td&gt;&lt;font style=&quot;font-size:22px; color:#d3534c; padding-left:30px;&quot;&gt;&lt;strong&gt;￥200&lt;/strong&gt;&lt;/font&gt;&lt;/td&gt;\n            &lt;/tr&gt;\n            &lt;tr&gt;\n              &lt;td height=&quot;32&quot; background=&quot;http://app.xindianbao.dev/da/images/school/red_bg.gif&quot; style=&quot;background-repeat:no-repeat; background-position:30px center&quot;&gt;&lt;font style=&quot;color:#FFF; font-size:20px; text-align:center; display:block; width:128px; margin-left:30px;&quot;&gt;&lt;strong&gt;节省&lt;span style=&quot;padding:0 2px;&quot;&gt;\n 107&lt;/span&gt;元&lt;/strong&gt;&lt;/font&gt;&lt;/td&gt;\n            &lt;/tr&gt;\n            &lt;tr&gt;\n              &lt;td height=&quot;18&quot;&gt;&lt;font style=&quot;text-decoration:line-through; color:#fcc52a;padding-left:30px;&quot; &gt;(原价: ￥307)&lt;/font&gt;&lt;/td&gt;\n            &lt;/tr&gt;\n            &lt;tr&gt;\n              &lt;td height=&quot;60&quot; style=&quot;padding-left:30px;&quot;&gt;&lt;a href=&quot;http://item.taobao.com/mealDetail.htm?meal_id=2951363&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;http://app.xindianbao.dev/da/images/school/btn_buy.gif&quot; border=&quot;0&quot;&gt;&lt;/a&gt;&lt;/td&gt;\n            &lt;/tr&gt;  \n            &lt;tr&gt;\n              &lt;td height=&quot;120&quot;&gt;&amp;nbsp;&lt;/td&gt;\n            &lt;/tr&gt;\n        &lt;/tbody&gt;&lt;/table&gt;\n      &lt;/td&gt;\n    &lt;/tr&gt;\n    &lt;tr&gt;\n      &lt;td width=&quot;67&quot; height=&quot;137&quot;&gt;&amp;nbsp;&lt;/td&gt;\n    &lt;td height=&quot;137&quot;&gt;&amp;nbsp;&lt;/td&gt;\n    &lt;td width=&quot;37&quot; height=&quot;137&quot;&gt;&amp;nbsp;&lt;/td&gt;\n    &lt;td height=&quot;137&quot;&gt;&amp;nbsp;&lt;/td&gt;\n      &lt;td height=&quot;137&quot; align=&quot;right&quot; valign=&quot;bottom&quot;&gt;&lt;a href=&quot;http://fuwu.taobao.com/serv/detail.htm?service_id=12230&quot; target=&quot;_blank&quot; style=&quot;width:70px; height:50px; display:block;text-decoration:none&quot;&gt;&amp;nbsp;&lt;/a&gt;&lt;/td&gt;\n    &lt;/tr&gt;\n&lt;/tbody&gt;&lt;/table&gt;\n&lt;br /&gt;\n\n', 1314758775, 1314758775),
(2951363, '709140474', 135, '\n&lt;table width=&quot;750&quot; height=&quot;210&quot; align=&quot;center&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; style=&quot;font-size:12px&quot; bgcolor=&quot;#FFFFFF&quot;&gt;\n  &lt;tbody&gt;&lt;tr&gt;\n    &lt;td style=&quot;border:#ccc 1px solid&quot;&gt;\n        &lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\n      &lt;tbody&gt;&lt;tr&gt;\n        &lt;td width=&quot;5&quot;&gt;&amp;nbsp;&lt;/td&gt;\n        &lt;td width=&quot;160&quot; align=&quot;right&quot; valign=&quot;top&quot;&gt;\n            &lt;table width=&quot;150&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\n              &lt;tbody&gt;&lt;tr height=&quot;8&quot;&gt;&lt;/tr&gt;\n              &lt;tr align=&quot;left&quot;&gt;\n                &lt;td height=&quot;22&quot;&gt;&lt;strong&gt;套餐价：&lt;/strong&gt;&lt;strong style=&quot;font-size:16px; color:#fe6521&quot;&gt;￥200&lt;/strong&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr align=&quot;left&quot;&gt;\n                &lt;td height=&quot;22&quot;&gt;&lt;font color=&quot;#666666&quot;&gt;原价：&lt;font style=&quot;text-decoration:line-through; padding:0 3px;&quot;&gt;￥307&lt;/font&gt;&lt;/font&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr height=&quot;8&quot;&gt;&lt;/tr&gt;\n              &lt;tr&gt;\n                &lt;td&gt;&lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;http://app.xindianbao.dev/da/images/basic/icon750_ok.gif&quot; border=&quot;0&quot;&gt;&lt;/a&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr height=&quot;10&quot;&gt;&lt;/tr&gt;\n              &lt;tr&gt;\n                &lt;td&gt;&lt;img src=&quot;http://app.xindianbao.dev/da/images/basic/750.gif&quot;&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n            &lt;/tbody&gt;&lt;/table&gt;\n        &lt;/td&gt;\n        &lt;td&gt;&amp;nbsp;\n            \n        &lt;/td&gt;\n        &lt;td valign=&quot;top&quot; width=&quot;86&quot; background=&quot;http://app.xindianbao.dev/da/images/basic/tag.gif&quot; style=&quot;background-position:left 20px; background-repeat:no-repeat;&quot;&gt;\n        &lt;span style=&quot;text-align:center; color:#FFF; display:block; padding-top:38px; font-size:18px; font-weight:bold;&quot;&gt;节省&lt;br&gt;￥107&lt;/span&gt;\n        &lt;/td&gt;\n        &lt;td&gt;&amp;nbsp;\n            \n        &lt;/td&gt;\n        &lt;td valign=&quot;top&quot; width=&quot;124&quot;&gt;\n            &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\n              &lt;tbody&gt;&lt;tr&gt;\n              &lt;td width=&quot;124&quot; height=&quot;122&quot; align=&quot;center&quot; style=&quot;border:#ccc 1px solid&quot;&gt;&lt;img src=&quot;http://img02.taobaocdn.com/bao/uploaded/i2/T13b4rXfduXXcUnEQV_021927.jpg_120x120.jpg&quot;&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr&gt;\n              &lt;td height=&quot;28&quot; align=&quot;center&quot; style=&quot;color:#666&quot;&gt;原价：108元&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr&gt;\n              &lt;td align=&quot;center&quot;&gt;&lt;a href=&quot;http://item.taobao.com/item.htm?id=10942251200&quot; style=&quot;color:#5c66cc; text-decoration:none&quot; target=&quot;_blank&quot;&gt;纸玫瑰&lt;/a&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n            &lt;/tbody&gt;&lt;/table&gt;\n        &lt;/td&gt;\n        &lt;td align=&quot;center&quot; valign=&quot;top&quot; style=&quot;padding-top:55px;&quot;&gt;&lt;img src=&quot;http://app.xindianbao.dev/da/images/basic/ico_plus.gif&quot;&gt;&lt;/td&gt;\n        &lt;td valign=&quot;top&quot; width=&quot;124&quot;&gt;\n            &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\n              &lt;tbody&gt;&lt;tr&gt;\n              &lt;td width=&quot;124&quot; height=&quot;122&quot; align=&quot;center&quot; valign=&quot;center&quot; style=&quot;border:#ccc 1px solid&quot;&gt;&lt;img src=&quot;http://img02.taobaocdn.com/bao/uploaded/i2/T13b4rXfduXXcUnEQV_021927.jpg_120x120.jpg&quot;&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr&gt;\n              &lt;td height=&quot;28&quot; align=&quot;center&quot; style=&quot;color:#666&quot;&gt;原价：100元&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr&gt;\n              &lt;td align=&quot;center&quot;&gt;&lt;a href=&quot;http://item.taobao.com/item.htm?id=10942251200&quot; style=&quot;color:#5c66cc; text-decoration:none&quot; target=&quot;_blank&quot;&gt;let party 个人闲置&lt;/a&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n            &lt;/tbody&gt;&lt;/table&gt;\n        &lt;/td&gt;\n        &lt;td valign=&quot;top&quot; align=&quot;center&quot; style=&quot;padding-top:55px;&quot;&gt;&lt;img src=&quot;http://app.xindianbao.dev/da/images/basic/ico_plus.gif&quot;&gt;&lt;/td&gt;\n        &lt;td valign=&quot;top&quot; width=&quot;124&quot;&gt;\n            &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;\n              &lt;tbody&gt;&lt;tr&gt;\n              &lt;td width=&quot;124&quot; height=&quot;122&quot; align=&quot;center&quot; valign=&quot;center&quot; style=&quot;border:#ccc 1px solid&quot;&gt;&lt;img src=&quot;http://img05.taobaocdn.com/bao/uploaded/i5/T1o5ilXeNBXXb.BO3U_014945.jpg_120x120.jpg&quot;&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr&gt;\n              &lt;td height=&quot;28&quot; align=&quot;center&quot; style=&quot;color:#666&quot;&gt;原价：99元&lt;/td&gt;\n              &lt;/tr&gt;\n              &lt;tr&gt;\n              &lt;td align=&quot;center&quot;&gt;&lt;a href=&quot;http://item.taobao.com/item.htm?id=12201727515&quot; style=&quot;color:#5c66cc; text-decoration:none&quot; target=&quot;_blank&quot;&gt;VANCL凡客 休闲水洗色织印花短袖衬衫&lt;/a&gt;&lt;/td&gt;\n              &lt;/tr&gt;\n            &lt;/tbody&gt;&lt;/table&gt;\n        &lt;/td&gt;\n        &lt;td&gt;&amp;nbsp;&lt;/td&gt;\n        &lt;/tr&gt;     \n    &lt;/tbody&gt;&lt;/table&gt;\n    &lt;/td&gt;\n  &lt;/tr&gt;\n&lt;/tbody&gt;&lt;/table&gt;\n', 1314759043, 1314759043);

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `type` tinyint(4) unsigned NOT NULL,
  `status` tinyint(4) unsigned NOT NULL,
  `published` int(11) unsigned NOT NULL,
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `url`, `type`, `status`, `published`, `created`, `updated`) VALUES
(1, 'aaaaaaaa', 'http://gfdgd.com', 1, 1, 1322621385, 1322621405, 1322621405),
(2, 'qq', 'http://www.baiud.com', 2, 1, 1322633600, 1322633625, 1322633625);

-- --------------------------------------------------------

--
-- 表的结构 `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) unsigned DEFAULT NULL,
  `app_id` int(10) unsigned DEFAULT NULL,
  `created` int(10) unsigned DEFAULT NULL,
  `updated` int(10) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `session_key`
--

CREATE TABLE IF NOT EXISTS `session_key` (
  `id` varchar(128) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `nick` varchar(128) DEFAULT NULL,
  `app_key` int(10) NOT NULL,
  `top_session_key` varchar(128) DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `updated` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `session_key`
--

INSERT INTO `session_key` (`id`, `user_id`, `nick`, `app_key`, `top_session_key`, `created`, `updated`) VALUES
('3usieq8k55h7442q8phcipr760', '709140474', '仕宇网络科技', 12311481, '41202232990d170b18a9e9b9d2bbbcoWKSEghz883c61a747091404741', 1315361354, 1322799017),
('gulnaee14tjc0p61du5iek3ju4', '709140474', '仕宇网络科技', 12311481, '40907152990d170b18a9e9bdvtCYlSb9d2bbbc883c61a747091404741', 1315397048, 1315397048),
('90094lcl1nq676njh93ocel5d2', '709140474', '仕宇网络科技', 12311481, '40908332990d170b18a9e9b9d2bbbc883c61a747OJAoKSVF091404741', 1315446461, 1315446461),
('fmrs8urermdh7toml1vb04ls30', '709140474', '仕宇网络科技', 12311481, '40908262990d170b18a9e9b9d2bbbc883YFpq9qawc61a747091404741', 1315473040, 1315473040),
('fmerb6md26ums6m8108eb8adl5', '709140474', '仕宇网络科技', 12311481, '40909042990jK5FXArud170b18a9e9b9d2bbbc883c61a747091404741', 1315530552, 1315545703),
('g5k3uodf2ded869qnjtt0n6d60', '709140474', '仕宇网络科技', 12311481, '40914192990d170b18a9e9b9d2HwUPeycKbbbc883c61a747091404741', 1315971764, 1315971764);

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(128) DEFAULT NULL,
  `app_id` smallint(5) unsigned DEFAULT NULL,
  `html` text,
  `status` smallint(5) unsigned DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `updated` int(11) unsigned DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `task_item`
--

CREATE TABLE IF NOT EXISTS `task_item` (
  `task_id` int(10) unsigned NOT NULL,
  `item_id` varchar(128) NOT NULL,
  `item_name` varchar(128) NOT NULL,
  `position` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`task_id`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1314757680),
('m110705_074521_init', 1314757687),
('m110706_025809_modified_code_schema', 1314757687),
('m110714_100639_tag_image', 1314757687),
('m110715_055511_template_data', 1314757687),
('m110725_020850_update_template', 1314757687),
('m110726_080308_template_item_count', 1314757687),
('m110729_081431_750_2', 1314757687),
('m110802_034901_create_user_table', 1314757687),
('m110802_111009_qixi_tpl_insert', 1314757687),
('m110803_031151_modify_user_table', 1314757687),
('m110803_074839_tpl_item_count_change', 1314757687),
('m110803_093601_tpl_750_3_kacha', 1314757687),
('m110804_051850_modify_user_sex', 1314757687),
('m110804_120202_tpl_950_narrow', 1314757687),
('m110809_022026_new_tpl_systerm', 1314757688),
('m110819_020833_add_shop_info_to_user', 1314757688),
('m110819_065241_create_post_table', 1314757688),
('m110823_083916_tpl_750_school_narrow', 1314757688),
('m110824_030241_tpl_750_school', 1314757688),
('m110824_051308_tpl_190_school', 1314757688),
('m110824_085619_tpl_950_school', 1314757688),
('m110824_104238_tpl_750_2_simple', 1314757688),
('m110824_110924_tpl_750_color', 1314757688),
('m110825_023119_add_tpl_status', 1314757688),
('m110825_070016_change_tpl_order', 1314757688),
('m110830_084535_tpl_750_3_colorfull', 1314757688),
('m110830_094700_tpl_basic', 1314757688),
('m110901_060311_add_autumn_templates', 1314859368),
('m110902_054125_add_red_black_4', 1314943245),
('m110902_061550_add_apple_4', 1314944493),
('m110911_061817_create_category_model', 1315361289),
('m110912_023039_create_session_key_model', 1315361289),
('m110915_090944_create_task_model', 1315474532),
('m110908_075859_create_log_table', 1315468877),
('m110908_091654_generate_testData_task', 1315474450),
('m110909_062226_create_task_item_table', 1322732001),
('m110913_065440_create_queue_model', 1322732002),
('m110921_022916_tpl_750_2_jianyue', 1322732002),
('m110923_035105_190_5_national_template', 1322732002),
('m110923_053315_750_2_national_template', 1322732002),
('m110923_054002_950_2_national_template', 1322732002),
('m111019_025324_modify_user_table', 1322732002),
('m111024_030410_tpl_950_2_jianyue', 1322732553),
('m111025_030826_tpl_750_month_2', 1322732553),
('m111025_030834_tpl_950_month_2', 1322732553),
('m111025_114834_tpl_750_collect_2', 1322732553),
('m111025_114842_tpl_750_collect_3', 1322732553),
('m111025_114858_tpl_950_collect_3', 1322732553),
('m111025_125018_tpl_950_4_bigsale', 1322732553),
('m111025_125041_tpl_750_2_bigsale', 1322732553),
('m111025_125053_tpl_750_3_bigsale', 1322732553),
('m111025_125101_tpl_190_5_bigsale', 1322732553),
('m111026_052843_750_2_halloween', 1322732553),
('m111026_052851_950_2_halloween', 1322732553),
('m111026_052937_750_3_halloween', 1322732553),
('m111026_052944_950_3_halloween', 1322732553),
('m111026_053711_190_5_halloween', 1322732553),
('m111026_054552_hide_bigsale_templs', 1322732553),
('m111103_091910_1111_950_3', 1322732553),
('m111103_091932_1111_950_2', 1322732553),
('m111103_091939_1111_750_2', 1322732553),
('m111103_091947_1111_750_3', 1322732553),
('m111103_092007_1111_190_5', 1322732553),
('m111104_045623_singleday_wm_190', 1322732553),
('m111104_045631_singleday_wm_750_2', 1322732553),
('m111104_045640_singleday_wm_750_3', 1322732553),
('m111104_045652_singleday_wm_950_2', 1322732553),
('m111104_045656_singleday_wm_950_3', 1322732553),
('m111104_071552_hide_halloween_template', 1322732553),
('m111117_064935_thanks', 1322732553),
('m111118_091347_down_single_11', 1322732553),
('m111031_022824_create_tpl_and_dapei', 1322794494),
('m111107_025421_new_tpl_test_data', 1322794494),
('m111115_015807_create_table_depei_dapei_meal', 1322794494),
('m111122_022755_add_dapei_meal_field', 1322794494),
('m111125_031933_create_table_job', 1322794494),
('m111125_074247_add_status_user_id_2_job', 1322794495),
('m111125_083920_add_successer_failer_2_job', 1322794495),
('m111202_035129_tbl_admin_user', 1323144111),
('m111206_035647_tpl_group_model', 1323144139),
('m111206_042750_test_model', 1323149945),
('m111206_053032_tpl_alter_col', 1323150012),
('m111206_081411_upload', 1323159423);

-- --------------------------------------------------------

--
-- 表的结构 `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `view_name` varchar(45) NOT NULL,
  `tag_image` varchar(45) NOT NULL,
  `preview_image` varchar(45) NOT NULL,
  `item_count` tinyint(4) NOT NULL DEFAULT '0',
  `width` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `grade` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `user_count` int(10) unsigned DEFAULT NULL,
  `like_count` int(10) unsigned DEFAULT NULL,
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `template`
--

INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`, `width`, `height`, `grade`, `user_count`, `like_count`, `created`, `updated`, `order`, `status`) VALUES
(10, '750-通用', '750', '750.gif', '750.gif', 5, NULL, NULL, 0, NULL, NULL, 0, 0, 14, 1),
(20, '950-通用', '950', '950.gif', '950.gif', 5, NULL, NULL, 0, NULL, NULL, 0, 0, 15, 1),
(30, '190-通用', '190', '190.gif', '190.gif', 5, NULL, NULL, 0, NULL, NULL, 0, 0, 13, 1),
(101, '750-店铺-2个宝贝', '750_2_shop', '750_2_shop.gif', '750_2_shop.gif', 2, NULL, NULL, 0, NULL, NULL, 0, 0, 9, 1),
(102, '750-旺铺-2个宝贝', '750_2_wang', '750_2_wang.gif', '750_2_wang.gif', 2, NULL, NULL, 0, NULL, NULL, 0, 0, 10, 1),
(103, '750-良品-2个宝贝', '750_2_liang', '750_2_liang.gif', '750_2_liang.gif', 2, NULL, NULL, 0, NULL, NULL, 0, 0, 11, 1),
(104, '750-商城-2个宝贝', '750_2_tmall', '750_2_tmall.gif', '750_2_tmall.gif', 2, NULL, NULL, 0, NULL, NULL, 0, 0, 12, 1),
(110, '七夕-750-两个宝贝', '750_2_qixi', '750_2_qixi.gif', '750_2_qixi.gif', 2, NULL, NULL, 0, NULL, NULL, 0, 0, 99, 0),
(111, '七夕-375-两个宝贝', '375_2_qixi', '375_2_qixi.gif', '375_2_qixi.gif', 2, NULL, NULL, 0, NULL, NULL, 0, 0, 99, 0),
(120, '750-咔嚓版(右)-3个宝贝', '750_3_kacha_right', '750_3_kacha_right.gif', '750_3_kacha_right.gif', 3, NULL, NULL, 0, NULL, NULL, 0, 0, 18, 1),
(121, '750-咔嚓版(左)-3个宝贝', '750_3_kacha_left', '750_3_kacha_left.gif', '750_3_kacha_left.gif', 3, NULL, NULL, 0, NULL, NULL, 0, 0, 17, 1),
(21, '950-通用(窄版)', '950_narrow', '950_narrow.gif', '950_narrow.gif', 5, NULL, NULL, 0, NULL, NULL, 0, 0, 16, 1),
(122, '750-开学季(窄版)', '750_school_narrow', '750_school_narrow.gif', '750_school_narrow.gif', 5, '750', '240', 0, NULL, NULL, 0, 0, 2, 0),
(123, '750-开学季-高版', '750_school', '750_school.gif', '750_school.gif', 5, '750', '400', 0, NULL, NULL, 0, 0, 3, 0),
(124, '190-开学季', '190_school', '190_school.gif', '190_school.gif', 5, '190', '595', 0, NULL, NULL, 0, 0, 1, 0),
(125, '950-开学季', '950_school', '950_school.gif', '950_school.gif', 5, '950', '510', 0, NULL, NULL, 0, 0, 4, 0),
(126, '750-简约版-2个宝贝', '750_2_simple', '750_2_simple.gif', '750_2_simple.gif', 2, '750', '330', 0, NULL, NULL, 0, 0, 8, 1),
(127, '750-三色配-绿', '750_color_green', '750_color_green.gif', '750_color_green.gif', 5, '750', '175', 0, NULL, NULL, 0, 0, 5, 1),
(128, '750-三色配-橘', '750_color_orange', '750_color_orange.gif', '750_color_orange.gif', 5, '750', '175', 0, NULL, NULL, 0, 0, 6, 1),
(129, '750-三色配-蓝', '750_color_blue', '750_color_blue.gif', '750_color_blue.gif', 5, '750', '175', 0, NULL, NULL, 0, 0, 7, 1),
(130, '750-多底色-蓝', '750_3_colorfull_blue', '750_3_colorfull_blue.gif', '750_3_colorfull_blue.gif', 3, '750', '280', 0, NULL, NULL, 0, 0, 0, 1),
(131, '750-多底色-灰', '750_3_colorfull_gray', '750_3_colorfull_gray.gif', '750_3_colorfull_gray.gif', 3, '750', '280', 0, NULL, NULL, 0, 0, 0, 1),
(132, '750-多底色-格子', '750_3_colorfull_grid', '750_3_colorfull_grid.gif', '750_3_colorfull_grid.gif', 3, '750', '280', 0, NULL, NULL, 0, 0, 0, 1),
(133, '750-多底色-斜条', '750_3_colorfull_twill', '750_3_colorfull_twill.gif', '750_3_colorfull_twill.gif', 3, '750', '280', 0, NULL, NULL, 0, 0, 0, 1),
(134, '750-店铺-4件宝贝', '750_4_shop', '750_4_shop.gif', '750_4_shop.gif', 4, '750', '230', 0, NULL, NULL, 0, 0, 0, 1),
(135, '750-店铺-3件宝贝', '750_3_shop', '750_3_shop.gif', '750_3_shop.gif', 3, '750', '230', 0, NULL, NULL, 0, 0, 0, 1),
(136, '950-商城-2件宝贝', '950_2_tmall', '950_2_tmall.gif', '950_2_tmall.gif', 2, '950', '400', 0, NULL, NULL, 0, 0, 0, 1),
(139, '950中秋特别版', '950_5_autumn', '950_5_autumn.gif', '950_5_autumn.gif', 5, '950', '335', 0, NULL, NULL, 0, 0, 0, 0),
(137, '190中秋特别版', '190_5_autumn', '190_5_autumn.gif', '190_5_autumn.gif', 5, '190', '810', 0, NULL, NULL, 0, 0, 0, 0),
(138, '750中秋特别版', '750_5_autumn', '750_5_autumn.gif', '750_5_autumn.gif', 5, '750', '265', 0, NULL, NULL, 0, 0, 0, 0),
(140, '红与黑', '750_4_red_black', '750_4_red_black.gif', '750_4_red_black.gif', 4, '750', '180', 0, NULL, NULL, 0, 0, 0, 1),
(141, '苹果风', '750_4_apple', '750_4_apple.jpg', '750_4_apple.gif', 4, '750', '210', 0, NULL, NULL, 0, 0, 0, 1),
(142, '简约版2', '750_2_jianyue', '750_2_jianyue.gif', '750_2_jianyue.gif', 2, '750', '330', 0, NULL, NULL, 0, 0, 0, 1),
(143, '190国庆版', '190_5_national', '190_5_national.gif', '190_5_national.gif', 5, '190', '680', 0, NULL, NULL, 0, 0, 0, 0),
(144, '750国庆版', '750_2_national', '750_2_national.gif', '750_2_national.gif', 2, '750', '325', 0, NULL, NULL, 0, 0, 0, 0),
(145, '950国庆版', '950_2_national', '950_2_national.gif', '950_2_national.gif', 2, '950', '500', 0, NULL, NULL, 0, 0, 0, 0),
(146, '简约版2', '950_2_jianyue', '950_2_jianyue.gif', '950_2_jianyue.jpg', 2, '950', '420', 0, NULL, NULL, 0, 0, 0, 1),
(147, '750灰底纹当前月', '750_2_month', '750_2_month.jpg', '750_2_month_prew.jpg', 2, '750', '365', 0, NULL, NULL, 0, 0, 0, 1),
(148, '950灰底纹当前月', '950_2_month', '950_2_month.jpg', '950-Gray-pattern.jpg', 2, '950', '460', 0, NULL, NULL, 0, 0, 0, 1),
(149, '750搭配减价2个宝贝', '750_2_collect', '750_2_collet.jpg', '750_2_collect_prew.jpg', 2, '750', '290', 0, NULL, NULL, 0, 0, 0, 1),
(150, '750搭配减价3宝贝', '750_3_collect', '750_3_collet.jpg', '750_3_collect_prew.jpg', 3, '750', '260', 0, NULL, NULL, 0, 0, 0, 1),
(151, '950搭配减价3宝贝', '950_3_collect', '950_3_collet.jpg', '950_3_collect_prew.jpg', 3, '950', '260', 0, NULL, NULL, 0, 0, 0, 1),
(152, '950搭配减价3宝贝', '950_4_bigsale', '950_4_bigsale.jpg', '950_4_bigsale_prew.jpg', 4, '950', '300', 0, NULL, NULL, 0, 0, 0, 1),
(153, '950搭配减价3宝贝', '750_2_bigsale', '750_2_bigsale.jpg', '750_2_bigsale_prew.jpg', 2, '750', '340', 0, NULL, NULL, 0, 0, 0, 1),
(154, '950搭配减价3宝贝', '750_3_bigsale', '750_3_bigsale.jpg', '750_3_bigsale_prew.jpg', 3, '750', '295', 0, NULL, NULL, 0, 0, 0, 1),
(155, '950搭配减价3宝贝', '190_5_bigsale', '190_5_bigsale.jpg', '190_5_bigsale_prew.jpg', 5, '190', '620', 0, NULL, NULL, 0, 0, 0, 1),
(156, '750万圣节2个宝贝', '750_2_halloween', '750_2_halloween.jpg', '750_2_halloween_prew.jpg', 2, '750', '410', 0, NULL, NULL, 0, 0, 0, 0),
(157, '950万圣节2个宝贝', '950_2_halloween', '950_2_halloween.jpg', '950_2_halloween_prew.jpg', 2, '950', '530', 0, NULL, NULL, 0, 0, 0, 0),
(158, '750万圣节3个宝贝', '750_3_halloween', '750_3_halloween.jpg', '750_3_halloween_prew.jpg', 3, '750', '350', 0, NULL, NULL, 0, 0, 0, 0),
(159, '950万圣节3个宝贝', '950_3_halloween', '950_3_halloween.jpg', '950_3_halloween_prew.jpg', 3, '950', '445', 0, NULL, NULL, 0, 0, 0, 0),
(160, '190万圣节5个宝贝', '190_5_halloween', '190_5_halloween.jpg', '190_5_halloween_prew.jpg', 5, '190', '810', 0, NULL, NULL, 0, 0, 0, 0),
(161, '950单身节3个宝贝 black', '950_3_singleblack', '950_3_singleblack.jpg', '950_3_singleblack_prev.jpg', 3, '950', '390', 0, NULL, NULL, 0, 0, 0, 0),
(162, '950单身节3个宝贝 red', '950_3_singlered', '950_3_singlered.jpg', '950_3_singlered_prev.jpg', 3, '950', '390', 0, NULL, NULL, 0, 0, 0, 0),
(163, '950单身节3个宝贝 cyan', '950_3_singlecyan', '950_3_singlecyan.jpg', '950_3_singlecyan_prev.jpg', 3, '950', '390', 0, NULL, NULL, 0, 0, 0, 0),
(164, '950单身节3个宝贝 yellow', '950_3_singleyellow', '950_3_singleyellow.jpg', '950_3_singleyellow_prev.jpg', 3, '950', '390', 0, NULL, NULL, 0, 0, 0, 0),
(165, '950单身节2个宝贝 black', '950_2_singleblack', '950_2_singleblack.jpg', '950_2_singleblack_prev.jpg', 2, '950', '485', 0, NULL, NULL, 0, 0, 0, 0),
(166, '950单身节2个宝贝 red', '950_2_singlered', '950_2_singlered.jpg', '950_2_singlered_prev.jpg', 2, '950', '485', 0, NULL, NULL, 0, 0, 0, 0),
(167, '950单身节2个宝贝 cyan', '950_2_singlecyan', '950_2_singlecyan.jpg', '950_2_singlecyan_prev.jpg', 2, '950', '485', 0, NULL, NULL, 0, 0, 0, 0),
(168, '950单身节2个宝贝 yellow', '950_2_singleyellow', '950_2_singleyellow.jpg', '950_2_singleyellow_prev.jpg', 2, '950', '485', 0, NULL, NULL, 0, 0, 0, 0),
(169, '750单身节2个宝贝 black', '750_2_singleblack', '750_2_singleblack.jpg', '750_2_singleblack_prev.jpg', 2, '750', '375', 0, NULL, NULL, 0, 0, 0, 0),
(170, '750单身节2个宝贝 red', '750_2_singlered', '750_2_singlered.jpg', '750_2_singlered_prev.jpg', 2, '750', '375', 0, NULL, NULL, 0, 0, 0, 0),
(171, '750单身节2个宝贝 cyan', '750_2_singlecyan', '750_2_singlecyan.jpg', '750_2_singlecyan_prev.jpg', 2, '750', '375', 0, NULL, NULL, 0, 0, 0, 0),
(172, '750单身节2个宝贝 yellow', '750_2_singleyellow', '750_2_singleyellow.jpg', '750_2_singleyellow_prev.jpg', 2, '750', '375', 0, NULL, NULL, 0, 0, 0, 0),
(173, '750单身节3个宝贝 black', '750_3_singleblack', '750_3_singleblack.jpg', '750_3_singleblack_prev.jpg', 3, '750', '325', 0, NULL, NULL, 0, 0, 0, 0),
(174, '750单身节3个宝贝 red', '750_3_singlered', '750_3_singlered.jpg', '750_3_singlered_prev.jpg', 3, '750', '325', 0, NULL, NULL, 0, 0, 0, 0),
(175, '750单身节3个宝贝 cyan', '750_3_singlecyan', '750_3_singlecyan.jpg', '750_3_singlecyan_prev.jpg', 3, '750', '325', 0, NULL, NULL, 0, 0, 0, 0),
(176, '750单身节3个宝贝 yellow', '750_3_singleyellow', '750_3_singleyellow.jpg', '750_3_singleyellow_prev.jpg', 3, '750', '325', 0, NULL, NULL, 0, 0, 0, 0),
(177, '190单身节5个宝贝', '190_5_singleblack', '190_5_singleblack.jpg', '190_5_singleblack_prev.jpg', 5, '190', '710', 0, NULL, NULL, 0, 0, 0, 0),
(178, '190单身节5个宝贝 red', '190_5_singlered', '190_5_singlered.jpg', '190_5_singlered_prev.jpg', 5, '190', '710', 0, NULL, NULL, 0, 0, 0, 0),
(179, '190单身节5个宝贝 cyan', '190_5_singlecyan', '190_5_singlecyan.jpg', '190_5_singlecyan_prev.jpg', 5, '190', '710', 0, NULL, NULL, 0, 0, 0, 0),
(180, '190单身节5个宝贝 yellow', '190_5_singleyellow', '190_5_singleyellow.jpg', '190_5_singleyellow_prev.jpg', 5, '190', '710', 0, NULL, NULL, 0, 0, 0, 0),
(181, '190单身节5个宝贝M', 'single-190-m', 'single-190-m.jpg', 'single-190-m-b.jpg', 5, '190', '670', 0, NULL, NULL, 0, 0, 0, 0),
(182, '190单身节5个宝贝W ', 'single-190-w', 'single-190-w.jpg', 'single-190-w-b.jpg', 5, '190', '670', 0, NULL, NULL, 0, 0, 0, 0),
(183, '750单身节2个宝贝M', 'single-750-2-m', 'single-750-2-m.jpg', 'single-750-2-m-b.jpg', 2, '750', '330', 0, NULL, NULL, 0, 0, 0, 0),
(184, '750单身节2个宝贝W ', 'single-750-2-w', 'single-750-2-w.jpg', 'single-750-2-w-b.jpg', 2, '750', '330', 0, NULL, NULL, 0, 0, 0, 0),
(185, '750单身节3个宝贝M', 'single-750-3-m', 'single-750-3-m.jpg', 'single-750-3-m-b.jpg', 3, '750', '320', 0, NULL, NULL, 0, 0, 0, 0),
(186, '750单身节3个宝贝W ', 'single-750-3-w', 'single-750-3-w.jpg', 'single-750-3-w-b.jpg', 3, '750', '320', 0, NULL, NULL, 0, 0, 0, 0),
(187, '950单身节2个宝贝M', 'single-950-2-m', 'single-950-2-m.jpg', 'single-950-2-m-b.jpg', 2, '950', '445', 0, NULL, NULL, 0, 0, 0, 0),
(188, '950单身节2个宝贝W ', 'single-950-2-w', 'single-950-2-w.jpg', 'single-950-2-w-b.jpg', 2, '950', '445', 0, NULL, NULL, 0, 0, 0, 0),
(189, '950单身节3个宝贝M', 'single-950-3-m', 'single-950-3-m.jpg', 'single-950-3-m-b.jpg', 5, '950', '355', 0, NULL, NULL, 0, 0, 0, 0),
(190, '950单身节3个宝贝W ', 'single-950-3-w', 'single-950-3-w.jpg', 'single-950-3-w-b.jpg', 5, '950', '355', 0, NULL, NULL, 0, 0, 0, 0),
(191, '190感恩节5个宝贝 black', '190_5_thanks_black', '190_5_thanks_black.jpg', '190_5_thanks_black_prev.gif', 5, '191', '645', 0, NULL, NULL, 0, 0, 0, 1),
(192, '190感恩节5个宝贝 blue', '190_5_thanks_blue', '190_5_thanks_blue.jpg', '190_5_thanks_blue_prev.gif', 5, '191', '645', 0, NULL, NULL, 0, 0, 0, 1),
(193, '190感恩节5个宝贝 red', '190_5_thanks_red', '190_5_thanks_red.jpg', '190_5_thanks_red_prev.gif', 5, '191', '645', 0, NULL, NULL, 0, 0, 0, 1),
(194, '750感恩节2个宝贝 black', '750_2_thanks_black', '750_2_thanks_black.jpg', '750_2_thanks_black_prev.gif', 2, '749', '311', 0, NULL, NULL, 0, 0, 0, 1),
(195, '750感恩节3个宝贝 black', '750_3_thanks_black', '750_3_thanks_black.jpg', '750_3_thanks_black_prev.gif', 3, '749', '251', 0, NULL, NULL, 0, 0, 0, 1),
(196, '750感恩节2个宝贝 blue', '750_2_thanks_blue', '750_2_thanks_blue.jpg', '750_2_thanks_blue_prev.gif', 2, '749', '311', 0, NULL, NULL, 0, 0, 0, 1),
(197, '750感恩节3个宝贝 blue', '750_3_thanks_blue', '750_3_thanks_blue.jpg', '750_3_thanks_blue_prev.gif', 3, '749', '251', 0, NULL, NULL, 0, 0, 0, 1),
(198, '750感恩节2个宝贝 red', '750_2_thanks_red', '750_2_thanks_red.jpg', '750_2_thanks_red_prev.gif', 2, '749', '311', 0, NULL, NULL, 0, 0, 0, 1),
(199, '750感恩节3个宝贝 red', '750_3_thanks_red', '750_3_thanks_red.jpg', '750_3_thanks_red_prev.gif', 3, '749', '251', 0, NULL, NULL, 0, 0, 0, 1),
(200, '950感恩节2个宝贝 black', '950_2_thanks_black', '950_2_thanks_black.jpg', '950_2_thanks_black_prev.gif', 2, '950', '401', 0, NULL, NULL, 0, 0, 0, 1),
(201, '950感恩节3个宝贝 black', '950_3_thanks_black', '950_3_thanks_black.jpg', '950_3_thanks_black_prev.gif', 3, '950', '311', 0, NULL, NULL, 0, 0, 0, 1),
(202, '950感恩节2个宝贝 blue', '950_2_thanks_blue', '950_2_thanks_blue.jpg', '950_2_thanks_blue_prev.gif', 2, '950', '401', 0, NULL, NULL, 0, 0, 0, 1),
(203, '950感恩节3个宝贝 blue', '950_3_thanks_blue', '950_3_thanks_blue.jpg', '950_3_thanks_blue_prev.gif', 3, '950', '311', 0, NULL, NULL, 0, 0, 0, 1),
(204, '950感恩节2个宝贝 red', '950_2_thanks_red', '950_2_thanks_red.jpg', '950_2_thanks_red_prev.gif', 2, '950', '401', 0, NULL, NULL, 0, 0, 0, 1),
(205, '950感恩节3个宝贝 red', '950_3_thanks_red', '950_3_thanks_red.jpg', '950_3_thanks_red_prev.gif', 3, '950', '311', 0, NULL, NULL, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tpl`
--

CREATE TABLE IF NOT EXISTS `tpl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `group_name` varchar(45) NOT NULL,
  `group_slug` varchar(45) NOT NULL,
  `item_count` tinyint(4) NOT NULL DEFAULT '0',
  `width` varchar(45) NOT NULL,
  `height` varchar(45) NOT NULL,
  `grade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL,
  `multi` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_count` int(10) unsigned DEFAULT '0',
  `like_count` int(10) unsigned DEFAULT '0',
  `created` int(10) unsigned NOT NULL,
  `updated` int(10) unsigned NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tpl_group`
--

CREATE TABLE IF NOT EXISTS `tpl_group` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(32) NOT NULL,
  `group_slug` varchar(45) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `upload`
--

INSERT INTO `upload` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(128) NOT NULL,
  `uid` varchar(256) DEFAULT NULL,
  `nick` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `sex` char(2) DEFAULT NULL,
  `buyer_credit_level` int(10) unsigned DEFAULT NULL,
  `seller_credit_level` int(10) unsigned DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `last_visit` int(11) unsigned DEFAULT NULL,
  `birthday` int(11) unsigned DEFAULT NULL,
  `type` char(1) DEFAULT NULL COMMENT '用户类型。可选值:B(B商家),C(C商家)',
  `consumer_protection` tinyint(1) unsigned DEFAULT NULL COMMENT '是否参加消保',
  `alipay_account` varchar(128) DEFAULT NULL COMMENT '支付宝账户',
  `alipay_no` varchar(128) DEFAULT NULL COMMENT '支付宝ID',
  `avatar` varchar(256) DEFAULT NULL COMMENT '卖家头像地址',
  `liangpin` tinyint(1) unsigned DEFAULT NULL COMMENT '是否是无名良品用户，true or false',
  `sign_food_seller_promise` tinyint(1) unsigned DEFAULT NULL COMMENT '卖家是否签署食品卖家承诺协议',
  `has_shop` tinyint(1) unsigned DEFAULT NULL COMMENT '用户作为卖家是否开过店',
  `is_lightning_consignment` tinyint(1) unsigned DEFAULT NULL COMMENT 'true 是否24小时闪电发货(实物类)',
  `vip_info` varchar(256) DEFAULT NULL COMMENT 'v1\n用户的全站vip信息，可取值如下：c(普通会员),asso_vip(荣誉会员), exp_vip1,exp_vip2,exp_vip3,exp_vip4(四个等级的体验vip会员),     vip1,vip2,vip3,vip4(四个等级的正式vip会员)，共10种取值，其中asso_vip是由vip会员衰退而成，与主站上的准vip对应；体验vip会员首先是普通会员或准vip会员。',
  `vertical_market` varchar(256) DEFAULT NULL COMMENT '3C,shoes\n用户参与垂直市场类型。',
  `last_login` int(11) unsigned DEFAULT NULL,
  `sid` int(11) unsigned DEFAULT NULL,
  `cid` int(11) unsigned DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `pic_path` varchar(256) DEFAULT NULL,
  `shop_created` int(11) unsigned DEFAULT NULL,
  `shop_modified` int(11) unsigned DEFAULT NULL,
  `item_score` char(6) DEFAULT NULL,
  `service_score` char(6) DEFAULT NULL,
  `delivery_score` char(6) DEFAULT NULL,
  `remain_count` smallint(5) unsigned DEFAULT NULL,
  `all_count` smallint(5) unsigned DEFAULT NULL,
  `used_count` smallint(5) unsigned DEFAULT NULL,
  `login_count` int(11) unsigned DEFAULT NULL,
  `service_started` int(11) unsigned DEFAULT NULL,
  `service_ended` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='users table';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `uid`, `nick`, `email`, `sex`, `buyer_credit_level`, `seller_credit_level`, `location`, `created`, `last_visit`, `birthday`, `type`, `consumer_protection`, `alipay_account`, `alipay_no`, `avatar`, `liangpin`, `sign_food_seller_promise`, `has_shop`, `is_lightning_consignment`, `vip_info`, `vertical_market`, `last_login`, `sid`, `cid`, `title`, `pic_path`, `shop_created`, `shop_modified`, `item_score`, `service_score`, `delivery_score`, `remain_count`, `all_count`, `used_count`, `login_count`, `service_started`, `service_ended`) VALUES
('709140474', 'b36267b87b55a219a886bca38322ea4a', '仕宇网络科技', '', NULL, 0, 0, '', 1305781292, 1322799016, NULL, 'C', 0, 'contact@shiyu-tech.com', '20886010672669140156', 'http:\\/\\/img.taobaocdn.com\\/sns_logo\\/i1\\/T1HyJ9XfFpXXb1upjX.jpg', 0, 1, NULL, NULL, 'c', '', 1322799017, 67353851, 1042, '仕宇网络科技', '', 1308024955, 1322148654, '0.0', '0.0', NULL, NULL, NULL, NULL, 21, NULL, NULL),
('1', '1', 'qq', 'qq@fds.com', '女', NULL, NULL, NULL, NULL, NULL, 0, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_like`
--

CREATE TABLE IF NOT EXISTS `user_like` (
  `user_id` varchar(128) NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
