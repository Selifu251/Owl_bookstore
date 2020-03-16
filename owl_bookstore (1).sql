-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Dec 16, 2019, 04:24 PM
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
  `ob_id` int(10) NOT NULL AUTO_INCREMENT,
  `ob_name` varchar(100) NOT NULL,
  `ob_author` varchar(50) NOT NULL,
  `ob_publishing` varchar(50) NOT NULL,
  `ob_publication_day` date NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `ob_price` int(7) NOT NULL,
  `ob_content` text NOT NULL,
  `ob_img` varchar(30) NOT NULL,
  `obt_id` int(2) NOT NULL,
  PRIMARY KEY (`ob_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 列出以下資料庫的數據： `owl_book`
--

INSERT INTO `owl_book` (`ob_id`, `ob_name`, `ob_author`, `ob_publishing`, `ob_publication_day`, `ISBN`, `ob_price`, `ob_content`, `ob_img`, `obt_id`) VALUES
(1, '沉默的遊行', '東野圭吾', '皇冠文化', '2019-05-06', '9789573334545', 420, '愛得有多深，恨得就有多重。失去的有多珍貴，殺意就有多強烈。我們總認為「犯罪」離自己很遙遠，但平凡善良的你與「犯罪」之間的距離，可能只有你對另一個人的想念與不捨。<br /><br />《沉默的遊行》是東野圭吾口中「滿意的一作」，更被譽為「伽利略」系列前所未見的最高傑作。從「伽利略」20年前初登場以來，我們一路看到湯川學的成長，也見證了東野圭吾的不斷進化。<br /><br />當越來越人性化的湯川遇到的不是殘暴的兇手，而是失去摯愛的凡人；要破解的不是複雜的詭計，而是悲傷的決意，他眼中所映照的，將是理性<br />的正義，還是善意的憐憫？', 'bookimg/001.jpg', 1),
(2, '天藍色的謀殺案', '莎拉．J．哈里斯', '臉譜文化', '2019-06-17', '9789862357941', 420, '幾個月後，碧雅失蹤了。當警察開始在社區裡盤問，賈斯柏竟然對他們描述起爸爸在碧雅家裡拿著沾血的衣服和刀子準備丟棄的畫面。<br /><br />爸爸百口莫辯地反駁、警方質疑他的證詞、社工擔心他在家裡的安危，卻沒有人真正理解他形容的那些聲音、那些顏色──甚至連他自己也愈來愈不確定，認不出任何人臉孔的自己，當時到底看見了什麼。是誰利用他的弱點逃過指認，將碧雅從他身邊奪走？他要如何將他記憶中混亂複雜的色彩，轉譯成別人聽得懂的語言，還原碧雅消失的那一夜所發生的一切？', 'bookimg/002.jpg', 1),
(3, '孤宿之人（上下冊．經典回歸版）', '宮部美幸', '獨步', '2019-07-07', '9789579447348', 599, '十歲女孩阿呆年幼喪母，又被養父母拋棄，三餐不繼地流浪到丸海藩時，已是瘦得剩皮包骨、話都不大會說的笨女孩。<br /><br />旁人說她像無知野獸，唯有醫家千金琴江小姐，待她像年久失散的妹妹──然而，幸福稍縱即逝，琴江竟被毒殺。琴江父親、兄長和家族成員，明知凶手身分，卻無人說出真相，唯一大喊出凶手名諱的阿呆，被指責「受惡靈所惑」，再次被掙來的歸宿捨<br />棄……', 'bookimg/003.jpg', 1),
(4, '看不見的圖書館1 消失的珍本書', '珍娜薇．考格曼', '蓋亞文化', '2019-08-03', '9789863193524', 320, '艾琳是在大圖書館工作的年輕探員，從大圖書館的穿越口前往指定平行世界，調查、推理、臥底或使用各種手段，取得指定書目的特殊版本。<br /><br />這次她的任務是帶領初出外勤的菜鳥前往充滿魔法與科技的混沌倫敦，取得某部特殊的《格林童話故事集》原稿。她一抵達目的地，卻發現目標藏書遭竊，持有者慘遭謀殺，飛賊、妖精、吸血鬼都牽涉其中。<br /><br />而她負責帶領的菜鳥實習生凱，似乎隱藏著什麼祕密，為任務埋下更多變數。他們的調查還吸引了當地名偵探的注意，也引來了不知名敵人的襲擊，更糟的是，她接到來自大圖書館的警告——傳說叛徒即將現身！<br /><br />現在，在這個陌生世界裡，她只能靠著自己、凱，還有名偵探韋爾的幫助，抽絲剝繭找出目標書目，並努力在任務中存活下去。', 'bookimg/004.jpg', 1),
(5, '看不見的圖書館2 蒙面的城市', '珍娜薇．考格曼', '蓋亞文化', '2019-09-20', '9789863193739', 340, '成為大圖書館的駐地館員，慢慢融入所在世界、收集珍貴的珍本書，享受平靜的美好時光⋯⋯<br /><br />生活本該如此，但一起綁架事件改變這美好生活，尤其當被綁架者是自己的助手凱——龍族王家的年輕成員，而綁架方又牽涉到神祕的妖精。<br /><br />為了避免種族戰爭爆發，危及其他世界以及她的館員生涯，艾琳接受了妖精的危險邀約，前往某個充滿魔法的平行世界威尼斯。<br /><br />在這個充滿故事的混沌水都，一不留神就將被捲入他人的冒險故事、成為被擺布的配角。藉著大圖書館探員的豐富經驗，加上對各類故事的熱愛及了解，艾琳竭盡全力避免步入悲慘結局、努力<br />將故事導向她所期望的走向⋯⋯', 'bookimg/005.jpg', 1),
(6, '大人絕景旅 京都：世界遺產×京料理×京雜貨，探尋  古都歲時風物詩', '朝日新聞出版', '山岳', '0000-00-00', '9789862488515', 360, '在日本大受好評的「大人絕景旅」系列，是以暢銷書《日本絕景祕境100》為藍圖策劃的區域版「絕景指南」。針對日本個別地區，以照片選出絕景，蒐集最詳實區域資訊，製作一系列包括沖繩、京都、伊勢志摩……等旅遊套書，嚴選一生必遊的日本絕美之景。旅行時帶上一本，就能依自己喜好，量身打造一趟成熟大人才能享受的旅行。<br /><br />「大人絕景旅」第2彈：京都爛漫春櫻、錦繡紅葉、深厚歷史，一窺平安京的繽紛色彩與多樣文化！<br /><br />世界遺產、極品京料理、老舖町家、觀光電車、巷弄風情……京都的多樣性，遠超出你我想像！本書將京都劃分為五大區域，一網打盡各區域熱門景點，並另外介紹「必遊絕景」，帶你慢遊千年古都風光！', 'bookimg/no_book_img.jpg', 2),
(7, '歐洲從東邊玩：波羅的海三小國、德東、波蘭、捷奧匈金三角，安全×超值×好吃×好玩，小資族也可以輕鬆上路', '背包Ken（吳宜謙）', '平裝本', '0000-00-00', '9789869835022', 380, '歐洲向來是觀光客的最愛，相較於北歐的高物價、西歐和南歐的治安不佳，東歐無論是物價還是安全性，都顯得親民，即使是小資族也負擔得起，讓35歲前就玩過33國的背包Ken忍不住驚歎：世上竟然有這種好地方！<br /><br />想品嘗美食，可以到農牧之國波蘭大快朵頤；想體驗多元文化，德東上百座博物館能讓你一飽眼福；想徜徉中世紀風情，波羅的海三小國正是「古蹟漫遊」的好所在；想感受音樂饗宴、舒暢溫泉、迷人風光，全都可以在「捷奧匈金三角」一網打盡！<br /><br />除了特色景點、超值美食，背包Ken也分享了沙發衝浪、共乘拼車的經驗談，並特別提供小資旅行規畫技巧、高效率觀光路線建議，以及防偷防搶秘技！只要跟著背包Ken的腳步，你也能擺脫走馬看花的觀光客模式，深入陌生卻無比精采的夢幻國度，來一趟永生難忘的東歐之旅！', 'bookimg/no_book_img.jpg', 2),
(8, '有錢人想的和你不一樣', 'T．哈福．艾克', '大塊', '0000-00-00', '9789867291813', 250, '他白手起家，做過打雜小弟，揹過債，但他一直想賺錢。後來他成為了大富翁，回顧自己的成長和歷練，把他所體悟到的賺錢智慧整理成為訓練課程，已有二十五萬人上過他的課，受到鼓舞。他改變了非常多人的人生，創造了非常多的平民富翁。他把課程的精華濃縮成書，這是他的第一本書。', 'bookimg/no_book_img.jpg', 3),
(9, '辣椒的世界史：橫跨歐亞非的尋味旅程，一場熱辣過癮的餐桌革命', '山本紀夫', '馬可孛羅', '0000-00-00', '9789578759053', 340, '作者山本紀夫潛心研究辣椒長達40年，探索辣椒的腳步遍及世界各地，從原產地中南美洲，往東繞行到歐洲、非洲、印度、中國、韓國，在日本結束。本書按地域來編排，並詳細介紹辣椒的傳播軌跡、馴化過程、栽培、用途、歷史文化、故事趣聞，看它如何豐富、改變人類的飲食文化與生活習慣，在世界各地掀起一場又一場的「餐桌革命」。', 'bookimg/no_book_img.jpg', 4),
(10, '韓國人氣獸醫師教你如何幫毛小孩正確飲食', '王恬中', '大塊', '2019-10-12', '9789865406073', 380, '全亞洲唯一同時擁有人類營養學碩士的韓國人氣獸醫師兼暢銷作家，科學脈診發明者、《氣的樂章》作者王唯工教授之女——王恬中，第一本華文寵物養育及營養書，結合了其成長的科學中醫背景，用國際性的思考破解寵物飲食的沉痾觀念。<br /><br />十萬字詳述，從乾飼料、零食、鮮食、生食、寵物營養品，多方面著手分析，破解毛小孩過敏、慢性病、挑食等困擾，寫出讓所有深愛毛小孩的飼主，日常最實用的萬用食療健康寶典。', 'bookimg/006.jpg', 5),
(11, '【法令更新】財產保險業務員 速成（增修訂四版）', '林忠義', '宏典文化', '2019-11-06', '9789862750520', 480000, '本書之編寫宗旨乃專注「目標導向」，以協助考生在有限時間內可以「一次就及格過關」，早日脫離考照苦海為最主要目的！故本書內容並非如產險教科書「包山包海」般的完整，否則全書厚度至少翻一倍以上。而是以產險公會的題庫為基礎，據此匯整出本科考試的命題重點。以下為本書三大特色：<br /><br />(1). 重點整理精要且切中考點：會考的重點均予收錄，並將不會考的內容全數排除→因此絕對不多浪費考生一分鐘的時間。<br /><br />(2). 各單元測驗題目多：足夠考生於考前充分練習測試實力。<br /><br />(3). 題題均附詳盡解析：題目做錯直接從解析中學習，大幅省去回頭再翻書找答案的時間。', 'bookimg/007.jpg', 6),
(15, '火盃的考驗', 'J‧K‧羅琳', '皇冠', '2019-12-14', '9789573318316', 497, '才一開學，霍格華茲魔法學校的師生們就為了即將舉行的『三巫鬥法大賽』而興奮不已，但是當『火盃』選出哈利波特成為第四位鬥士時，卻引起全校的不諒解。憑什麼才14歲的哈利波特能夠跨越『17歲』的年齡限制，而將名字投入『火盃』中呢？<br /><br />百口莫辯的哈利波特，只好承受所有人的猜疑，努力去挑戰鬥法大賽的三項艱鉅任務。但是，『佛地魔的僕人』卻早已盯上了哈利波特，暗中虎視眈眈的準備獵取『仇人之血』……這場『三巫鬥法大賽』背後究竟隱藏了什麼駭人聽聞的詭計？哈利波特又是否能順利通過『火盃』的考驗呢？……', 'bookimg/bok001.jpg', 0);

-- --------------------------------------------------------

--
-- 資料表格式： `owl_book_class`
--

CREATE TABLE IF NOT EXISTS `owl_book_class` (
  `obc_id` int(2) NOT NULL AUTO_INCREMENT,
  `obc_name` varchar(10) NOT NULL,
  PRIMARY KEY (`obc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 列出以下資料庫的數據： `owl_book_class`
--

INSERT INTO `owl_book_class` (`obc_id`, `obc_name`) VALUES
(1, '中文書'),
(2, '英文書');

-- --------------------------------------------------------

--
-- 資料表格式： `owl_book_type`
--

CREATE TABLE IF NOT EXISTS `owl_book_type` (
  `obt_id` int(2) NOT NULL AUTO_INCREMENT,
  `obt_name` varchar(10) NOT NULL,
  `obc_id` int(2) NOT NULL,
  PRIMARY KEY (`obt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 列出以下資料庫的數據： `owl_book_type`
--

INSERT INTO `owl_book_type` (`obt_id`, `obt_name`, `obc_id`) VALUES
(1, '文學', 1),
(2, '旅遊', 1),
(3, '財經', 1),
(4, '人文', 1),
(5, '自然', 1),
(6, '教育', 1),
(7, '文學', 2),
(8, '財經', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
(10, 'qq', 'qq', '2019-11-07 16:10:04'),
(11, 'Java', '...............', '2019-12-04 15:00:56');

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
-- 資料表格式： `owl_order`
--

CREATE TABLE IF NOT EXISTS `owl_order` (
  `oo_id` int(10) NOT NULL AUTO_INCREMENT,
  `oo_pro_price` int(10) NOT NULL,
  `oo_freight` int(10) NOT NULL,
  `oo_tal_price` int(10) NOT NULL,
  `ou_username` varchar(50) NOT NULL,
  `ou_email` varchar(50) NOT NULL,
  `ou_address` varchar(50) NOT NULL,
  `ou_phone` varchar(15) NOT NULL,
  `oo_paytype` varchar(10) NOT NULL,
  PRIMARY KEY (`oo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `owl_order`
--


-- --------------------------------------------------------

--
-- 資料表格式： `owl_order_detail`
--

CREATE TABLE IF NOT EXISTS `owl_order_detail` (
  `ood_id` int(10) NOT NULL AUTO_INCREMENT,
  `oo_id` int(10) NOT NULL,
  `ob_id` varchar(50) NOT NULL,
  `ob_price` varchar(10) NOT NULL,
  `ood_quantity` int(10) NOT NULL,
  PRIMARY KEY (`ood_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `owl_order_detail`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 列出以下資料庫的數據： `owl_user`
--

INSERT INTO `owl_user` (`ou_id`, `ou_username`, `ou_password`, `ou_name`, `ou_nickname`, `ou_email`, `ou_cellphone`, `ou_address`, `ou_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@mmail.com', '', '', 'admin'),
(2, 'user01', '202cb962ac59075b964b07152d234b70', '阿呆', '呆呆獸', 'user01123@umail.com', '0914256325', '台北市2號', 'member'),
(3, 'user02', '202cb962ac59075b964b07152d234b70', '正男', '飯糰', 'user02123@umail.com', '0977777777', '台南5號', 'member'),
(4, 'user03', '202cb962ac59075b964b07152d234b70', '小新', '番薯', 'user03123@umail.com', '0988888888', '高雄2號', 'member'),
(5, 'user04', '202cb962ac59075b964b07152d234b70', '風間', '富二代', 'user04123@umail.com', '09999999999', '新北7號', 'member'),
(6, 'user05', '202cb962ac59075b964b07152d234b70', '妮妮', '兔子', 'user05123@pmail.com', '09555555555', '台中3號', 'member'),
(7, 'user06', '202cb962ac59075b964b07152d234b70', '廣志', '臭腳', 'user06123@umail.com', '0945612374', '南投5號', 'member'),
(10, 'user09', '202cb962ac59075b964b07152d234b70', '小白', '棉花糖', 'user09123@umail.com', '0974122121', '台東9號', 'member'),
(11, 'user10', '202cb962ac59075b964b07152d234b70', '', '', 'user10123@umail.com', '', '', 'member'),
(12, 'user11', '202cb962ac59075b964b07152d234b70', '', '', 'user11123@umail.com', '', '', 'member');
