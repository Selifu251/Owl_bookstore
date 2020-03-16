-- phpMyAdmin SQL Dump
-- version 2.9.0-rc1
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Oct 05, 2006, 10:13 AM
-- 伺服器版本: 4.1.21
-- PHP 版本: 4.4.4
-- 
-- 資料庫: `mystore`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `orderdetail`
-- 

CREATE TABLE `orderdetail` (
  `OrderDetailID` int(11) unsigned NOT NULL auto_increment,
  `OrderID` int(11) unsigned default NULL,
  `ProductID` int(11) unsigned default NULL,
  `ProductName` varchar(254) default NULL,
  `UnitPrice` int(11) unsigned default NULL,
  `Quantity` int(11) unsigned default NULL,
  PRIMARY KEY  (`OrderDetailID`)
) ENGINE=MyISAM  DEFAULT CHARSET=big5 AUTO_INCREMENT=4 ;

-- 
-- 列出以下資料庫的數據： `orderdetail`
-- 

INSERT INTO `orderdetail` (`OrderDetailID`, `OrderID`, `ProductID`, `ProductName`, `UnitPrice`, `Quantity`) VALUES 
(1, 1, 18, 'SONY VGN-FE25TP', 49800, 1),
(2, 2, 18, 'SONY VGN-FE25TP', 49800, 1),
(3, 2, 17, 'SONY VAIO VGN-FJ79TP', 39800, 1);

-- --------------------------------------------------------

-- 
-- 資料表格式： `orders`
-- 

CREATE TABLE `orders` (
  `OrderID` int(11) unsigned NOT NULL auto_increment,
  `SubTotal` int(11) unsigned default NULL,
  `Shipping` int(11) unsigned default NULL,
  `GrandTotal` int(11) unsigned default NULL,
  `CustomerName` varchar(100) default NULL,
  `CustomerEmail` varchar(100) default NULL,
  `CustomerAddress` varchar(100) default NULL,
  `CustomerPhone` varchar(100) default NULL,
  `paytype` varchar(50) default NULL,
  PRIMARY KEY  (`OrderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=big5 AUTO_INCREMENT=3 ;

-- 
-- 列出以下資料庫的數據： `orders`
-- 

INSERT INTO `orders` (`OrderID`, `SubTotal`, `Shipping`, `GrandTotal`, `CustomerName`, `CustomerEmail`, `CustomerAddress`, `CustomerPhone`, `paytype`) VALUES 
(1, 49800, 100, 49900, '黃茶米', 'david@e-happy.com.tw', '南投縣投里鎮明德路20號', '0999999999', 'ATM 轉帳'),
(2, 89600, 100, 89700, '黃茶米', 'david@e-happy.com.tw', '南投縣投里鎮明德路20號`', '0999999999', 'ATM 轉帳');

-- --------------------------------------------------------

-- 
-- 資料表格式： `product`
-- 

CREATE TABLE `product` (
  `productid` int(11) unsigned NOT NULL auto_increment,
  `productname` varchar(100) default NULL,
  `productprice` int(11) unsigned default NULL,
  `productimages` varchar(100) default NULL,
  `description` text,
  PRIMARY KEY  (`productid`)
) ENGINE=MyISAM  DEFAULT CHARSET=big5 AUTO_INCREMENT=19 ;

-- 
-- 列出以下資料庫的數據： `product`
-- 

INSERT INTO `product` (`productid`, `productname`, `productprice`, `productimages`, `description`) VALUES 
(1, 'ASUS W5GT24DD', 54800, 'W5GT24DD.jpg', '◆ 1024MBDDRII雙通道記憶體\r\n◆ 100GB超大硬碟容量\r\n◆ 內建130萬畫素網路攝影機\r\n◆ 12吋鏡面寬螢幕'),
(2, 'ASUS F3APT24DD', 51800, 'F3APT24DD.jpg', '◆ Intel雙核T2400\r\n◆ ATi獨立顯示TC256\r\n◆ 15.4吋鏡面寬螢幕\r\n◆ 100G-SATA\r\n◆ DVDSuperMulti(DL)'),
(3, 'ASUS W7J', 58800, 'W7J.jpg', '◆ 雙核IntelDualCoreT2400處理器1.83G\r\n◆ Intel945PM高效晶片\r\n◆ nV獨立顯示256MB\r\n◆ 13吋鏡面寬螢'),
(4, 'ASUS S6F', 68800, 'S6F.jpg', '◆ 11.1吋鏡面寬螢幕\r\n◆ 內建1GBDDRII記憶體\r\n◆ 雙核心低電壓超省電CPU\r\n◆ 大容量120GB\r\n◆ 附贈真皮保證書與真皮光學滑鼠'),
(5, 'ASUS VX1', 108800, 'VX1.jpg', '◆ 師法藍寶堅尼跑車俐落線條美學\r\n◆ 15吋高解析鏡面螢幕1400x1050\r\n◆ 頂級獨立顯示NV7400VX-512MB\r\n◆ Intel雙核心T2500'),
(6, 'Acer 3628A', 26900, '3628A.jpg', '◆ 14.1吋鏡面寬螢幕\r\n◆ 內建DVD燒錄機SuperMuti\r\n◆ 超輕巧2.35KG\r\n◆ IntelPentium1.7G'),
(7, 'ACER TM2403', 22900, 'TM2403.jpg', '◆ 14.1吋寬螢幕\r\n◆ Intel新一代910GML晶片,DDR2記憶體\r\n◆ CeleronM最新超值奈米機\r\n◆ 創新FOLIO造型'),
(8, 'ACER 5562', 48900, '5562.jpg', '◆ IntelCoreDuo雙核心\r\n◆ ATIX1400512MB3D顯示\r\n◆ 旋轉式130萬視訊\r\n◆ 抽取式藍芽網路話機'),
(9, 'ACER Ferrari 4002WLMi', 48800, '4002WLMi.jpg', '◆ 採用AMDTurion64全新64位元處理器\r\n◆ 上蓋碳纖維材質\r\n◆ ATIX700獨立顯示\r\n◆ 內建藍芽'),
(10, 'ACER 3022WTMi', 52900, '3022WTMi.jpg', '◆ 1.5kg輕巧靈動A4大小\r\n◆ 超效IntelCoreDuo雙核心\r\n◆ 130萬畫素225度網路視訊\r\n◆ 藍芽無線傳輸'),
(11, 'HP TC4200', 57900, 'TC4200.jpg', '◆ 可拆式旋轉鍵盤設計\r\n◆ 採用強化玻璃\r\n◆ 效能卓越、攜帶方便\r\n◆ 三年保固'),
(12, 'HP NC2400', 55900, 'NC2400.jpg', '◆ 超輕12吋WXGA\r\n◆ 鎂合金機身\r\n◆ 內建指紋辨識器\r\n◆ 內建光碟1.5KG'),
(13, 'HP V2632', 39900, 'V2632.jpg', '◆ 14吋鏡面寬螢幕\r\n◆ Intel雙核心T2400\r\n◆ 80GB-SATA超大硬碟\r\n◆ 藍芽技術'),
(14, 'HP Presario B2821', 36900, 'B2821.jpg', '◆ ATIX600獨立128MB顯示晶片\r\n◆ 白色鋼琴烤漆外觀\r\n◆ BrightView超亮顯示屏\r\n◆ 輕薄便攜僅重2.0kg'),
(15, 'HP Pavilion dv4213AP', 39900, 'dv4213AP.jpg', '◆ 15.4吋鏡面高亮度寬螢幕\r\n◆ ATIMobilityX700獨立128MB\r\n◆ 內建6合1數位讀卡機\r\n◆ 三年保固'),
(16, 'SONY VGN-AR18TP', 149800, 'VGN-AR18TP.jpg', '◆ Intel雙核心T2600\r\n◆ NVIGF7600GT256MB\r\n◆ 160超大SATA硬碟\r\n◆ 17吋1920X1200高畫質\r\n◆ 藍光燒錄'),
(17, 'SONY VAIO VGN-FJ79TP', 39800, 'VGN-FJ79TP.jpg', '◆ IntelPM2G處理器\r\n◆ 14吋寬螢\r\n◆ 80GBSATA大硬碟\r\n◆ DVD雙層燒錄\r\n◆ 專業版XPP'),
(18, 'SONY VGN-FE25TP', 49800, 'VGN-FE25TP.jpg', '◆ Intel雙核心T2400\r\n◆ 80GBSATA大硬碟\r\n◆ NVIGF7400獨立顯示256MB\r\n◆ 15.4吋2.85KG');
