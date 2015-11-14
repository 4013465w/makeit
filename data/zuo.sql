-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 11 月 14 日 08:37
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zuo`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(20) NOT NULL AUTO_INCREMENT,
  `notepad_id` int(30) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` text,
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `comment_id` (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `notepad_id` (`notepad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`comment_id`, `notepad_id`, `user_id`, `comment_time`, `comment`) VALUES
(11, 12, 41, '2015-10-11 12:32:23', 'ssss'),
(12, 12, 41, '2015-10-11 12:33:21', 'ssss'),
(13, 12, 41, '2015-10-11 12:33:23', 'ssss'),
(14, 12, 41, '2015-10-11 12:36:44', 'ssssss');

-- --------------------------------------------------------

--
-- 表的结构 `lable`
--

CREATE TABLE IF NOT EXISTS `lable` (
  `lable_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `lable_name` varchar(30) NOT NULL,
  `lable_pwd` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`lable_id`,`lable_name`),
  UNIQUE KEY `lable_id` (`lable_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `lable`
--

INSERT INTO `lable` (`lable_id`, `user_id`, `lable_name`, `lable_pwd`) VALUES
(1, 41, 's', 's'),
(2, 41, 's', 's'),
(3, 41, 's', 's'),
(4, 41, 's', 's'),
(5, 41, 's', '03c7c0ace395d80182db07ae2c30f0'),
(6, 42, 'ss', 'sssssssssssssssssss'),
(7, 41, 'sss', '3691308f2a4c2f6983f2880d32e29c');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `notepad_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `lable_id` int(20) DEFAULT NULL,
  `notepad_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notepad_endtime` char(11) DEFAULT NULL,
  `notepad` text,
  PRIMARY KEY (`notepad_id`),
  UNIQUE KEY `notepad_id` (`notepad_id`),
  KEY `user_id` (`user_id`),
  KEY `lable_id` (`lable_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`notepad_id`, `user_id`, `lable_id`, `notepad_time`, `notepad_endtime`, `notepad`) VALUES
(1, 41, NULL, '0000-00-00 00:00:00', '0000-00-00', 'ssssssssss'),
(2, 41, NULL, '2015-10-11 09:07:47', '0000-00-00', 'ssssssssss'),
(3, 41, NULL, '2015-10-11 09:08:34', '0000-00-00', 'ssssssssss'),
(4, 41, NULL, '2015-10-11 09:14:51', '0000-00-00', 'ssssssssss'),
(5, 41, NULL, '2015-10-11 09:15:08', '0000-00-00', 'ssssssssss'),
(6, 41, NULL, '2015-10-11 09:15:36', '55', 'ssssssssss'),
(7, 41, NULL, '2015-10-11 09:15:46', '55', 'ssssssssss'),
(8, 41, NULL, '2015-10-11 09:17:26', '55', 'ssssssssss'),
(9, 41, NULL, '2015-10-11 09:17:48', '55', 'ssssssssss'),
(10, 41, NULL, '2015-10-11 09:18:12', '55', 'ssssssssss'),
(12, 41, 1, '2015-10-11 09:52:01', '55', 'ssssssssss'),
(13, 41, NULL, '2015-10-11 09:52:52', '55', 'ssssssssss'),
(14, 41, NULL, '2015-10-11 09:55:43', '55', 'ssssssssss'),
(15, 41, NULL, '2015-10-11 09:56:34', '55', 'ssssssssss'),
(16, 41, NULL, '2015-10-11 09:56:46', '55', 'ssssssssss'),
(17, 41, NULL, '2015-10-11 09:57:28', '55', 'ssssssssss'),
(18, 41, NULL, '2015-10-11 09:57:38', '55', 'ssssssssss'),
(19, 41, NULL, '2015-10-11 09:58:59', '55', 'ssssssssss'),
(20, 41, NULL, '2015-10-11 09:59:52', '55', 'ssssssssss'),
(21, 41, 2, '2015-10-11 11:16:28', '55', 'ssssssssss'),
(22, 41, 2, '2015-10-11 11:24:32', '56', 'ssssssssss');

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `user_id` int(10) NOT NULL,
  `lable_id` int(20) NOT NULL,
  PRIMARY KEY (`user_id`,`lable_id`),
  KEY `lable_id` (`lable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`user_id`, `lable_id`) VALUES
(41, 2),
(41, 6);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_nickname` varchar(50) NOT NULL COMMENT '昵称',
  `user_mail` varchar(30) NOT NULL COMMENT '邮箱',
  `user_pwd` varchar(32) NOT NULL COMMENT '密码',
  `login` char(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_nickname`, `user_mail`, `user_pwd`, `login`) VALUES
(1, 'ThinkPHP', '', 'ddd', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(2, 'ThinkPHP', 'ThinkPHP@gmail.com', 'ddd', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(26, '11', '401@qq.com', '22', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(27, '12', '40qq1@qq.com', '220000', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(28, '122', '40qq1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(29, '122', '400qq1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(30, '122', '400cqq1@qq.com', '3333331', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(31, '122', '400cq5q1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(32, '122', '4005cqq1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(33, '122', '5cqq1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(34, '122', '5cdqq1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(35, '122', '5cdq5q1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(36, '122', '5cd5q5q1@qq.com', '83d634317da9e6facbb206b52937abc3', '16edec8bc7fc1a466d3a5a8cf50f9712'),
(37, '122', 'dfsdfs@qq.com', '83d634317da9e6facbb206b52937abc3', NULL),
(38, '122', 'dfs555dfs@qq.com', '83d634317da9e6facbb206b52937abc3', 'a21c9137909c761cef4c27de94b8f35f'),
(39, 'd', 'dfs555fkghdfs@qq.com', '83d634317da9e6facbb206b52937abc3', 'a0726c3b149f9714ada6afbf301706b0'),
(40, '122', 'dfs555f555kghdfs@qq.com', '83d634317da9e6facbb206b52937abc3', 'ee68ea394d8d480677cb44df5315952f'),
(41, '122', '503241187@qq.com', '03c7c0ace395d80182db07ae2c30f034', 'd589172d26441de02adc5f53c081de50'),
(42, '122', 'x@qq.com', '83d634317da9e6facbb206b52937abc3', '3da23e834bbe983177da429e1b2a5f2f'),
(45, 'sddffffgty', '1@sina.com', '401fd36c579ae4b051806a703debfe7b', '16e3acb5ba3c6ee7cf78b31d20c5a069'),
(47, '4013465', '4013465w@sina.com', '401fd36c579ae4b051806a703debfe7b', 'f7f12b28ae33d7b7b37465d5b3638082');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `user_lable`
--
CREATE TABLE IF NOT EXISTS `user_lable` (
`user_id` int(11)
,`lable_id` int(20)
);
-- --------------------------------------------------------

--
-- 视图结构 `user_lable`
--
DROP TABLE IF EXISTS `user_lable`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_lable` AS select `lable`.`user_id` AS `user_id`,`lable`.`lable_id` AS `lable_id` from `lable` union select `order`.`user_id` AS `user_id`,`order`.`lable_id` AS `lable_id` from `order`;

--
-- 限制导出的表
--

--
-- 限制表 `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`notepad_id`) REFERENCES `message` (`notepad_id`) ON DELETE CASCADE;

--
-- 限制表 `lable`
--
ALTER TABLE `lable`
  ADD CONSTRAINT `lable_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- 限制表 `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`lable_id`) REFERENCES `lable` (`lable_id`) ON DELETE CASCADE;

--
-- 限制表 `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`lable_id`) REFERENCES `lable` (`lable_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
