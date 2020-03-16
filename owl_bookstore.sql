-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Nov 27, 2019, 04:36 PM
-- 伺服器版本: 5.5.8
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `owl_bookstore`
--

-- --------------------------------------------------------

--
-- 資料表格式： `owl_book`
--

CREATE TABLE IF NOT EXISTS `owl_book` (
  `ob_id` varchar(10) NOT NULL,
  `ob_name` varchar(20) NOT NULL,
  `ob_author` varchar(20) NOT NULL,
  `ob_publishing` varchar(10) NOT NULL,
  `ob_price` int(7) NOT NULL,
  `ob_content` varchar(500) NOT NULL,
  `ob_img` varchar(30) NOT NULL,
  PRIMARY KEY (`ob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 列出以下資料庫的數據： `owl_book`
--


-- --------------------------------------------------------

--
-- 資料表格式： `owl_message`
--

CREATE TABLE IF NOT EXISTS `owl_message` (
  `om_id` int(10) NOT NULL AUTO_INCREMENT,
  `om_name` varchar(20) NOT NULL,
  `om_content` varchar(300) NOT NULL,
  `om_time` datetime NOT NULL,
  PRIMARY KEY (`om_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 列出以下資料庫的數據： `owl_message`
--

INSERT INTO `owl_message` (`om_id`, `om_name`, `om_content`, `om_time`) VALUES
(1, '阿呆', '最近有啥好書推薦?', '2019-10-30 22:12:47'),
(2, '眼鏡仔', '你可以考慮看看火盃的考驗', '2019-10-30 14:17:26'),
(3, '村長', '旅遊書你有興趣嗎?', '2019-10-30 14:46:12'),
(4, '懶蟲', '-當祈禱落幕時-超好看 強推', '2019-10-30 15:05:36'),
(5, '百羅', '最近有本新出的美食書', '2019-10-31 08:27:04'),
(6, 'Red', 'Hello~~~', '2019-10-31 09:34:14'),
(7, '正男', '今天晚餐吃啥麼好?', '2019-10-31 14:39:46'),
(8, '小當家', '今天我主廚~~開放點單', '2019-10-31 15:50:42'),
(9, 'lion', '各位早', '2019-11-04 10:00:43'),
(10, 'qq', 'qq', '2019-11-07 16:10:04');

-- --------------------------------------------------------

--
-- 資料表格式： `owl_news_top`
--

CREATE TABLE IF NOT EXISTS `owl_news_top` (
  `ont_id` int(2) NOT NULL AUTO_INCREMENT,
  `ont_order` varchar(10) NOT NULL,
  `ont_title` varchar(20) NOT NULL,
  `ont_content` varchar(300) NOT NULL,
  `ont_img` varchar(100) NOT NULL,
  `ont_date` date NOT NULL,
  PRIMARY KEY (`ont_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 列出以下資料庫的數據： `owl_news_top`
--

INSERT INTO `owl_news_top` (`ont_id`, `ont_order`, `ont_title`, `ont_content`, `ont_img`, `ont_date`) VALUES
(1, 'active', '解不開的神秘血案', '來自羅伯茲女士的委託，我與偵探老友來到了白銀莊園<br />以女僕上吊開始發生的一連串詭異血案……<br />吾友，這次奇怪的地方太多了，總覺得有人在窺看我們', 'images/banner2.jpg', '2019-11-04'),
(2, 'item2', '奧黛莉安娜Audrina', '自從艾薇·羅伯茲的女兒在父親那得到了一個玩偶後，感覺就全變個樣了<br />因此特地請來了名人來解決此事，怎料這事情才正要開始……', 'images/banner1.jpg', '2019-11-04'),
(3, 'item3', '360小時指考衝', '內附─學長的躲過監考老師72招祕笈<br />重考10年生親身經驗', 'images/banner3.jpg', '2019-11-04'),
(4, 'item4', '中國古文108精選（一）', '集結假古文108篇，每篇30小節，每小節都有專人附註詳解<br />共三千頁的豪華大集合', 'images/banner4.jpg', '2019-11-04');

-- --------------------------------------------------------

--
-- 資料表格式： `owl_user`
--

CREATE TABLE IF NOT EXISTS `owl_user` (
  `ou_id` int(100) NOT NULL AUTO_INCREMENT,
  `ou_username` varchar(20) NOT NULL,
  `ou_password` varchar(35) NOT NULL,
  `ou_name` varchar(30) NOT NULL,
  `ou_nickname` varchar(30) NOT NULL,
  `ou_email` varchar(50) NOT NULL,
  `ou_cellphone` varchar(20) NOT NULL,
  `ou_address` varchar(50) NOT NULL,
  `ou_level` varchar(10) NOT NULL DEFAULT 'member',
  PRIMARY KEY (`ou_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 列出以下資料庫的數據： `owl_user`
--

INSERT INTO `owl_user` (`ou_id`, `ou_username`, `ou_password`, `ou_name`, `ou_nickname`, `ou_email`, `ou_cellphone`, `ou_address`, `ou_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin@mmail.com', '', '', 'admin'),
(2, 'user01', '202cb962ac59075b964b07152d234b70', '阿呆', '呆呆', 'user01123@umail.com', '0914256325', '台北市2號', 'member'),
(3, 'user02', '202cb962ac59075b964b07152d234b70', '正男', '飯糰', 'user02123@umail.com', '0977777777', '台南5號', 'member'),
(4, 'user03', '202cb962ac59075b964b07152d234b70', '小新', '番薯', 'user03123@umail.com', '0988888888', '高雄2號', 'member'),
(5, 'user04', '202cb962ac59075b964b07152d234b70', '風間', '富二代', 'user04123@umail.com', '09999999999', '新北7號', 'member'),
(6, 'user05', '202cb962ac59075b964b07152d234b70', '妮妮', '兔子', 'user05123@pmail.com', '09555555555', '台中3號', 'member'),
(7, 'user06', '202cb962ac59075b964b07152d234b70', '廣志', '臭腳', 'user06123@umail.com', '0945612374', '南投5號', 'member'),
(10, 'user09', '202cb962ac59075b964b07152d234b70', '小白', '棉花糖', 'user09123@umail.com', '0974122121', '台東9號', 'member'),
(11, 'user10', '202cb962ac59075b964b07152d234b70', '', '', 'user10123@umail.com', '', '', 'member');
