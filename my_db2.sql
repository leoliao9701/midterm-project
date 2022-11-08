-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-11-08 11:35:50
-- 伺服器版本： 10.4.25-MariaDB
-- PHP 版本： 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `my_db2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'ink'),
(2, 'collage'),
(3, 'canvas'),
(4, 'watercolor'),
(5, 'Sculpture'),
(6, 'digit');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(5) NOT NULL,
  `price` int(7) NOT NULL,
  `amount` int(5) NOT NULL,
  `create_time` datetime NOT NULL,
  `author` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price`, `amount`, `create_time`, `author`, `images`, `detailed`, `sell_id`) VALUES
(1, 'enjoy', 1, 20000, 1, '2022-11-04 03:27:16', 'Hua Yuxiu', '001.jpg', '以工筆毛筆描繪出去玩耍超級開心的狗所呈現去的表情。', 0),
(2, 'My favorite little dried fish', 1, 1000, 1, '2022-11-04 03:27:16', 'Hua Yuxiu', '002.jpg', '此幅為描繪自家的寵物，他就像是我的 家人一樣，對他有著家人般的感情，他雖然有時後講不出話，但都會用舉手的方式回答，是一隻很有個性的柴犬，有著可愛的表情，但其實超有個性的，以墨鏡裡加入小魚 乾，來表達他喜愛的小魚乾，小魚乾用金色來描周圍的線，來呈現喜歡小魚乾到發亮的呈度，訪彿像看到小魚乾眼睛就會發亮一樣。', 0),
(3, 'cool', 1, 2000, 1, '2022-11-04 03:27:16', 'Hua Yuxiu', '003.jpg', '以細膩的工筆技法，描繪柴犬泰迪很酷的表情。', 0),
(4, 'Tour with alpacas\r\n', 1, 3000, 1, '2022-11-04 03:27:16', 'Hua Yuxiu', '004.jpg', '靈感來自於，暑假與朋友到彰化的今夜星辰休閒農場旅遊時，跟羊駝的合照，本身喜愛羊駝，高中畢旅時都只能看著羊駝睡覺或餵他們吃東西，但彰化的這個地方不一樣，不但可以餵牠們吃東西，也可以近距離與羊駝互動，摸摸牠和跟牠拍照，真的太開心了。從當時拍的照片去作修改，人的角度改成站直的，世是出去日本旅遊時所拍的照片，以與羊駝合照做為出發點，背景是描繪去日本北海道支笏湖時，自己很喜歡的白雲風景照，中間背景加上遠山，前景加上草叢，彷彿我帶著羊駝去旅行，感覺就像是我的', 0),
(5, 'Aloneness', 1, 45000, 1, '2022-11-04 03:27:16', 'Hua Yuxiu', '005.jpg', '創作者常常在夜晚讀自創作就像作品中的斑鳩ㄧ樣，獨自創作雖孤寂但其實身邊有很多人幫助我們照耀我們，就像天空的金箔、月亮、茫草裡的螢火蟲，照亮我們，帶給我們希望。', 0),
(6, 'Strange Stone Travels', 1, 50000, 1, '2022-11-04 03:27:16', 'Hua Yuxiu', '006.jpg', '此幅為描繪新北市瑞芳區的景點，此地名稱為南雅奇石，是被海浪沖刷侵触所成的，世是大自然鬼斧神工的力量，假日與親戚到此地遊玩，當時被眼前這極為壯碩的奇石所吸引，此奇石很特别很獨特，有著獨特的肌理是一層層的形成，很像是一位少女穿著優雅的裙子，每層的皺褶都不同，不同面有著不同的風貌，此件作品為奇石的背面，雖是背面，但卻是最自然也最美妙，甚是喜愛所做此作品出來。', 0),
(7, 'babble', 1, 25000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '007.jpg', '40*60(cm)', 0),
(8, 'Pentium', 1, 35000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '008.jpg', '60*80(cm)', 0),
(9, 'Thousands of piles of snow are rolled up when the waves crashing on the shore', 1, 45000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '009.jpg', '180*270(cm)', 0),
(10, 'Trickling', 1, 1000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '010.jpg', '22*27(cm)', 0),
(11, 'Flowing water\r\n', 1, 2500, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '011.jpg', '19*27(cm)', 0),
(12, '綠意滿益', 1, 35000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '012.jpg', '22*27(cm)', 0),
(13, 'Listen to the sound of the spring', 1, 560000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '013.jpg', '35*75(cm)', 0),
(14, 'Flying springs like jade', 1, 69000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '014.jpg', '30*30(cm)', 0),
(15, 'Misty', 1, 56000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '015.jpg', '30*30(cm)', 0),
(16, 'Spring water dyes green clothes', 1, 36000, 1, '2022-11-04 03:27:16', 'Zhang Jinyan', '016.jpg', '石槽原為火山爆發在海岸邊形成的火山礁岩，經過長時間的侵蝕，將質地鬆軟的部份掏除，留下較堅硬的部份，當因陽光曝曬後，海藻也逐漸死去，殘骸硬化成一層薄薄的石灰質，新的藻類就在這層石灰質上，繼續附著生長，如此一生一死不停地循環，最後才形成如此有生命力的景象。海浪穿梭在這石槽之間，當石槽變綠時，身為侵蝕者的海浪也開始變的柔美。', 0),
(17, 'Whale Mountain - Magic Earth Star', 2, 2000, 1, '2022-11-04 03:52:46', 'Liu Yi', '017.jpg', '30*30(cm)', 0),
(18, 'Whale Mountain - Golden Years', 2, 10000, 1, '2022-11-04 03:52:46', 'Liu Yi', '018.jpg', '30*30(cm)', 0),
(19, 'Foxes and elephants', 2, 2500, 1, '2022-11-04 03:52:46', 'Liu Yi', '019.jpg', '30*30(cm)', 0),
(20, 'Whale Mountain - Deep Diving Time', 2, 15000, 1, '2022-11-04 03:52:46', 'Liu Yi', '020.jpg', '58*40(cm)', 0),
(21, 'Cloud cat and turtle', 2, 56000, 1, '2022-11-04 03:52:46', 'Liu Yi', '021.jpg', '30*30(cm)', 0),
(22, 'Whale Mountain - Ark Land', 2, 150000, 1, '2022-11-04 03:52:46', 'Liu Yi', '022.jpg', '90*120(cm)', 0),
(23, 'boundless', 2, 3500, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '023.jpg', '200*100(cm)', 0),
(24, 'whisper', 2, 36000, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '024.jpg', '18*14(cm)', 0),
(25, 'Time gap', 2, 56000, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '025.jpg', '30*30(cm)', 0),
(26, 'Wish', 2, 1900, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '026.jpg', '50*120(cm)', 0),
(27, 'Comfort zone', 2, 15000, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '027.jpg', '26*18(cm)', 0),
(28, 'Seeking light', 2, 3000, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '028.jpg', '每個生物都在用生命體悟著所有的給予與獲得，關於尋找的答案大概會化為潺潺漣漪、積成綿綿山峰，從一道光中，鋪陳蔓延。 『過了很久很久，尋光的人才發現，原來自己閃閃發光。』', 0),
(29, 'No man\'s land', 2, 1900, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '029.jpg', '細碎的筆觸像是各種矛盾情節裡的糾結，明明不擅長，卻又想嘗試， 像喃喃自語又像悄悄傾訴。', 0),
(30, 'Seeking light', 2, 26000, 1, '2022-11-04 03:52:46', 'Xu Ruojun', '030.jpg', '『尋光的人帶著光走入樹洞，期待能在迷途中找到出口。』 每棵樹上都住著一個精靈，祂們有情感，有我們聽不懂的語言和情緒表現，在神秘魔幻的空間裡 綿延巨大的生命網絡。', 0),
(31, 'A corner', 2, 265000, 1, '2022-11-04 03:52:46', 'Lin Jun', '031.jpg', '你生命中的黑暗角落由那盞燈火照亮，不也挺幸福的?', 0),
(32, 'Magic Conch', 2, 45000, 1, '2022-11-04 03:52:46', 'Lin Jun', '032.jpg', '不是哀傷悲痛，而是一種領悟後的感嘆。 海螺排成列，以循環的狀態表現時序的流轉變化，相知 、相惜、 相愛，象徵心中愛意的海螺、雛菊，也表達即使面對逝去我們依然對生活抱有愛與熱情。', 0),
(33, 'Nothing outside is large (inside and outside are one) A', 3, 58000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '033.jpg', '130*162(cm)', 0),
(34, 'Stroll or dance', 3, 46000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '034.jpg', '38*48(cm)', 0),
(35, 'transmigration', 3, 25500, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '035.jpg', '91*73(cm)', 0),
(36, 'ancient times', 3, 5600, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '036.jpg', '時間就像個長軸卷，中國宋代人描繪的山水與現代人的美學觀點，隨著時間的演化而有不同的詮釋與看法', 0),
(37, 'Spatiotemporal transformation A', 3, 98000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '037.jpg', '試著把室內當作一個空間，室內與戶外成了一個循環，畫框轉換為吊燈，窗戶又轉換為天空，天空再轉換成地板，地板轉換為沙灘…我們賴以維生的空間就是不斷的循環與轉換，如同「能」與「量」不停的轉換', 0),
(38, 'Black  white', 3, 59000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '038.jpg', '究竟是先有黑還是先有白，這是一體的兩面，性質一樣，只是在不同時間產生不同的變化，白中會誕生黑，黑中會產生白，如同老子對空間的描述(實狀無狀)', 0),
(39, 'Morning light outside the window', 3, 59999, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '039.jpg', '91*116(cm)', 0),
(40, 'Particle context\r\n', 3, 258000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '040.jpg', '少女忘我彈琴，漸漸地空間隨著音樂慢慢地分解成基本粒子。我們所見的景物包括自己皆由基本粒子構成，如同我們自生與所見所聞都為短暫現象，當生命的樂章結束時，都將化為虛無', 0),
(41, 'Pieces of paper | mines\r\n', 3, 69000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '041.jpg', '我們所見的礦山景色都是暫時性的存在，如同記錄著礦山景色的紙張，隨著時間的流逝，會被丟棄或消失，終將化為烏有', 0),
(42, 'Nothing outside is large (inside and outside are one) C', 3, 15000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '042.jpg', '89*145(cm)', 0),
(43, 'Black  white', 3, 258000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '043.jpg', '我們對空間的概念，有長短，有高低密度，會膨脹會壓縮，黑白如同能量不停轉換與變化', 0),
(44, 'Red-green interaction', 3, 5300, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '044.jpg', '91*116(cm)', 0),
(45, 'Black and white cycle', 3, 6900, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '045.jpg', '91*116(cm)', 0),
(46, 'Celestial motion (inner and outer circulation space)', 3, 5000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '046.jpg', '112*194(cm)', 0),
(47, 'Black and white interaction', 3, 2500, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '047.jpg', '116*91(cm)', 0),
(48, 'Teapot Mountain at dusk', 3, 5000, 1, '2022-11-04 04:19:39', 'Wu Jinhuang', '048.jpg', '38*48(cm)', 0),
(49, 'Abbot of Fo Guang Shan, monk', 4, 6500, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '049.jpg', '17*13(cm)', 0),
(50, 'husband and wife', 4, 12000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '050.jpg', '13*18(cm)', 0),
(51, 'Girl 2', 4, 5000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '051.jpg', '18*13(cm)\r\n\r\n', 0),
(52, 'Girl 1', 4, 3200, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '052.jpg', '18*13(cm)', 0),
(53, 'swim', 4, 69000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '053.jpg', '13*18(cm)', 0),
(54, 'recall', 4, 36000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '054.jpg', '13*18(cm)', 0),
(55, 'Children under the tree', 4, 5600, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '055.jpg', '13*18(cm)', 0),
(56, 'commemorate', 4, 98000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '056.jpg', '13*18(cm)\r\n\r\n', 0),
(57, 'Dream makeup lights', 4, 5000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '057.jpg', '21*21(cm)\r\n\r\n', 0),
(58, 'Interior view', 4, 4000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '058.jpg', '65*65(cm)', 0),
(59, 'Elf Star\r\n', 4, 5000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '059.jpg', '18*13(cm)\r\n\r\n', 0),
(60, 'Elf grass\r\n', 4, 4500, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '060.jpg', '18*13(cm)\r\n\r\n', 0),
(61, 'Adults and children\r\n', 4, 5200, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '061.jpg', '14*14(cm)\r\n\r\n', 0),
(62, 'Angel feathers\r\n', 4, 59000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '062.jpg', '18*13(cm)\r\n\r\n', 0),
(63, 'Sister 2\r\n', 4, 980000, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '063.jpg', '10*26(cm)\r\n\r\n', 0),
(64, 'Sister 1', 4, 899999, 1, '2022-11-04 09:12:47', 'Yang Chenhua', '064.jpg', '14*19(cm)\r\n\r\n', 0),
(65, 'Peace and Freedom - III', 5, 5000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '065.jpg', '前者以人民為主，和平·自由-二 , 三 是由戰爭與領土問題創作，戰爭血腥的氣息與領土之爭，是人們長期在世界上的課題，台灣也不例外，在這末法時代中，人民的那種無力感，什麼時候才能解脫？ 人民所付出的血與淚，必定迎接和平的曙光。', 0),
(66, 'Peace and Freedom - II\r\n', 5, 20000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '066.jpg', '延續上一張 和平·自由的創作 前者以人民為主，和平·自由-二 是由戰爭與領土問題創作，戰爭血腥的氣息與領土之爭，是人們長期在世界上的課題，台灣也不例外，在這末法時代中，人民的那種無力感，什麼時候才能解脫？ 人民所付出的血與淚，必定迎接和平的曙光。', 0),
(67, 'Obsession', 5, 69000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '067.jpg', '80*21(cm)\r\n\r\n', 0),
(68, 'First thought\r\n', 5, 49000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '068.jpg', '80*21(cm)\r\n\r\n', 0),
(69, 'Peace and freedom\r\n', 5, 96000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '069.jpg', '人民所付出的血與淚，必定迎接和平的曙光。', 0),
(70, 'Wash quietly\r\n', 5, 55000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '070.jpg', '在這疫情戰爭並行的亂世，人們是否停下腳步自省沈澱，洗滌心靈。', 0),
(71, 'collide', 5, 3200, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '071.jpg', '70*100(cm)\r\n\r\n', 0),
(72, 'memory\r\n', 5, 600, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '072.jpg', '18*76(cm)\r\n\r\n', 0),
(73, 'Memory - two\r\n', 5, 1000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '073.jpg', '50*41(cm)\r\n\r\n', 0),
(74, 'relationship', 5, 65400, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '074.jpg', '70*100(cm)\r\n\r\n', 0),
(75, 'dialogue\r\n', 5, 56000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '075.jpg', '100*70(cm)\r\n\r\n', 0),
(76, 'Balance - two\r\n', 5, 980000, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '076.jpg', '70*100(cm)\r\n\r\n', 0),
(77, 'Drips', 5, 999999, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '077.jpg', '69*52(cm)\r\n\r\n', 0),
(78, 'Ups\r\n', 5, 78900, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '078.jpg', '67*155(cm)\r\n\r\n', 0),
(79, 'lonely\r\n', 5, 19650, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '079.jpg', '100*35(cm)\r\n\r\n', 0),
(80, 'Drops - three\r\n', 5, 1500, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '080.jpg', '點點滴滴的記憶，一絲一縷的惆悵。', 0),
(81, 'Untitled\r\n', 5, 4500, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '081.jpg', '35*100(cm)\r\n\r\n', 0),
(82, 'open\r\n', 5, 2999, 1, '2022-11-04 09:36:38', 'Xu Chenzheng', '082.jpg', '29*21(cm)\r\n\r\n', 0),
(83, 'City life', 6, 1000, 1, '2022-11-04 09:55:30', 'ariel huang', '083.jpg', '29*21(cm)\r\n\r\n', 0),
(84, 'Untitled', 6, 1500, 1, '2022-11-04 09:55:30', 'ariel huang', '084.jpg', '42*29(cm)\r\n\r\n', 0),
(85, 'Untitled \r\n', 6, 2000, 1, '2022-11-04 09:55:30', 'ariel huang', '085.jpg', '42*29(cm)\r\n\r\n', 0),
(86, 'dog with pearl necklace', 6, 2500, 1, '2022-11-04 09:55:30', 'ariel huang', '086.jpg', '27*21(cm)\r\n\r\n', 0),
(87, 'golden girl\r\n', 6, 3000, 1, '2022-11-04 09:55:30', 'ariel huang', '087.jpg', '27*21(cm)\r\n\r\n', 0),
(88, 'Momo Steppe', 6, 3500, 1, '2022-11-04 09:55:30', 'KIU\r\n', '088.jpg', '51*36(cm)\r\n\r\n', 0),
(89, 'Horoscope Sun and Moon\r\n', 6, 4000, 1, '2022-11-04 09:55:30', 'KIU\r\n', '089.jpg', '41*59(cm)\r\n\r\n', 0),
(90, 'Off the original Moriyama', 6, 45000, 1, '2022-11-04 09:55:30', 'KIU\r\n', '090.jpg', '51*36(cm)\r\n\r\n', 0),
(91, 'Black Magic\r\n', 6, 5890, 1, '2022-11-04 09:55:30', 'KIU\r\n', '091.jpg', '41*59(cm)\r\n\r\n', 0),
(92, 'Sweet elixir\r\n', 6, 45000, 1, '2022-11-04 09:55:30', 'KIU\r\n', '092.jpg', '41*59(cm)\r\n\r\n', 0),
(93, 'December Night\r\n', 6, 58000, 1, '2022-11-04 09:55:30', 'KIU\r\n', '093.jpg', '41*59(cm)\r\n\r\n', 0),
(94, 'Flower prayers', 6, 54000, 1, '2022-11-04 09:55:30', 'Zhuzu\r\n', '094.jpg', '35*30(cm)\r\n\r\n', 0),
(95, 'Tsunami\r\n', 6, 98000, 1, '2022-11-04 09:55:30', 'Zhuzu\r\n', '095.jpg', '50*40(cm)\r\n\r\n', 0),
(96, 'Reflection\r\n', 6, 98700, 1, '2022-11-04 09:55:30', 'Zhuzu\r\n', '096.jpg', '30*30(cm)\r\n\r\n', 0),
(97, 'Cold plus\r\n', 6, 58000, 1, '2022-11-04 09:55:30', 'Zhuzu\r\n', '097.jpg', '40*30(cm)\r\n\r\n', 0),
(98, 'Balcony', 6, 15000, 1, '2022-11-04 09:55:30', 'Zhuzu\r\n', '098.jpg', '30*30(cm)\r\n\r\n', 0),
(99, 'Good night\r\n', 6, 5300, 1, '2022-11-04 09:55:30', 'Zhuzu\r\n', '099.jpg', '50*40(cm)\r\n\r\n', 0),
(100, 'Wild sweetie\r\n', 6, 4500, 1, '2022-11-04 09:55:30', 'Zhuzu', '100.jpg', '30*30(cm)\r\n\r\n', 0),
(101, 'Tiger Mountain', 1, 10000, 1, '2022-11-03 14:27:36', 'Chen Yunyi', '101.jpg', '水墨、膠彩、水彩、壓克力、複合媒材、色鉛筆', 0),
(102, 'be with you', 1, 8800, 1, '2022-11-03 14:41:08', 'Huang Yunru', '102.jpg', '信任自己，是不是也就能信任別人？', 0),
(103, 'Spring water dyed green clothes', 1, 23000, 1, '2022-11-03 14:41:08', 'Zhang Zhenyan', '103.jpg', '海浪穿梭在這石槽之間，當石槽變綠時，身為侵蝕者的海浪也開始變的柔美', 0),
(104, 'Shocking waves hit the shore and roll up a thousand piles of snow', 1, 150000, 1, '2022-11-03 14:45:34', 'Zhang Zhenyan', '104.jpg', '180*270(cm)', 0),
(105, 'gurgling', 1, 21000, 1, '2022-11-03 14:45:34', 'Zhang Zhenyan', '105.jpg', '40*60(cm)', 0),
(106, 'wandering', 1, 12000, 1, '2022-11-03 14:45:34', 'Zac Xiao', '106.jpg', '18*18(cm)', 0),
(107, 'In the same frame', 1, 12000, 1, '2022-11-03 14:45:34', 'Zac Xiao', '107.jpg', '18*18(cm)', 0),
(108, 'Gravel beach', 1, 12000, 1, '2022-11-03 14:45:34', 'Zac Xiao', '108.jpg', '18*18(cm)', 0),
(109, 'broad', 1, 36000, 1, '2022-11-03 14:45:34', 'Zac Xiao', '109.jpg', '70*70(cm)', 0),
(110, 'Cage', 1, 4200, 1, '2022-11-03 14:45:34', 'Dana Yuan', '110.jpg', '39*27(cm)', 0),
(111, 'Ordinary mountain forest', 1, 53000, 1, '2022-11-03 15:01:04', 'Chen Jing -Hsuan', '111.jpg', '138*69(cm)\nA state of mind, that\'s what you never know', 0),
(112, 'lonely', 1, 30000, 1, '2022-11-03 15:01:04', 'Hua Yuxiu', '112.jpg', '68*138(cm)\r\n創作者常常在夜晚讀自創作就像作品中的斑鳩ㄧ樣，獨自創作雖孤寂但其實身邊有很多人幫助我們照耀我們，就像天空的金箔、月亮、茫草裡的螢火蟲，照亮我們，帶給我們希望。', 0),
(113, 'travel', 1, 12000, 1, '2022-11-03 15:01:04', 'Cheng Yici', '113.jpg', '13*68(cm)', 0),
(114, 'Strange Stone Travels', 1, 30000, 1, '2022-11-03 15:12:28', 'Hua Yuxiu', '114.jpg', '138*69(cm)\r\n此幅為描繪新北市瑞芳區的景點，此地名稱為南雅奇石，是被海浪沖刷侵触所成的，世是大自然鬼斧神工的力量，假日與親戚到此地遊玩，當時被眼前這極為壯碩的奇石所吸引，此奇石很特别很獨特，有著獨特的肌理是一層層的形成，很像是一位少女穿著優雅的裙子，每層的皺褶都不同，不同面有著不同的風貌，此件作品為奇石的背面，雖是背面，但卻是最', 0),
(115, 'dead sea', 1, 40000, 1, '2022-11-03 15:22:41', 'Chen Yunyi', '115.jpg', '70*68(cm)', 0),
(116, 'Abstract art', 2, 20000, 1, '2022-11-03 15:24:39', 'Donnya Freestone', '116.jpg', 'Abstract art made with acrylic paint and hot glue', 0),
(117, 'Acrylic pour Jellyfish', 2, 15000, 1, '2022-11-03 15:24:39', 'Donnya Freestone', '117.jpg', 'Acrylic pour Jellyfish', 0),
(118, 'two', 2, 20000, 1, '2022-11-03 15:24:39', 'Xia Luling', '118.jpg', '24*33(cm)\r\n擁擠的無花果因盒子壓縮，緊密靠在一起，像是兩對姻親，兩個家族，兩套綁在一起的DNA傳承，卻沒有真正的交集', 0),
(119, 'Magic Conch', 2, 5000, 1, '2022-11-03 15:24:39', 'Lin Yun', '119.jpg', '27*22(cm)\r\n不是哀傷悲痛，而是一種領悟後的感嘆。 海螺排成列，以循環的狀態表現時序的流轉變化，相知 、相惜、 相愛，象徵心中愛意的海螺、雛菊，也表達即使面對逝去我們依然對生活抱有愛與熱情。', 0),
(120, 'blue interwoven city', 2, 25000, 1, '2022-11-03 15:24:39', 'Zhang Dengke', '120.jpg', '24*17(cm)', 0),
(121, 'night pine', 2, 12800, 1, '2022-11-03 15:56:20', 'Chen Yunyi', '121.jpg', '49*32(cm)\r\n水墨、膠彩、書法、水彩、壓克力', 0),
(122, 'Seeking Light II', 2, 25000, 1, '2022-11-03 15:57:44', 'Xu Ruojun', '122.jpg', '29*42(cm)水墨、膠彩\r\n尋光的人帶著光走入樹洞，期待能在迷途中找到出口。』 每棵樹上都住著一個精靈，祂們有情感，有我們聽不懂的語言和情緒表現，在神秘魔幻的空間裡 綿延巨大的生命網絡。', 0),
(123, 'traveler on foot', 2, 50000, 1, '2022-11-03 15:57:44', 'YEN', '123.jpg', '53*45(cm)', 0),
(124, 'untitled', 2, 13000, 1, '2022-11-03 15:57:44', 'Yan Yiting', '124.jpg', '41*41(cm)', 0),
(125, 'everyday scenery', 2, 2000, 1, '2022-11-03 15:57:44', 'Qiu Bokai', '125.jpg', '18*14(cm)水墨、膠彩\r\n古人透過遊歷山水，獲得身體、心靈上的滿足，並作為喜愛的創作主題，相較於現代社會，自然景物對於古人來說應該是相對親近的一部分，而筆者每天生活所見的卻是鋼筋水泥，密不通風的都市叢林，而都市叢林或許能帶出那份貼切的「日常感」，因此建築物也就成了筆者重要的元素，試圖建立「日常感」的表現', 0),
(126, 'Qingdao', 2, 3000, 1, '2022-11-03 15:57:44', 'Chen Yunyi', '126.jpg', '38*45(cm)水墨、膠彩、水彩', 0),
(127, 'Whisper - bird afraid of heights', 2, 36000, 1, '2022-11-03 15:57:44', 'Xu Ruojun', '127.jpg', '40*60(cm)水墨、膠彩', 0),
(128, 'Indoor Taoyuan', 2, 6500, 1, '2022-11-03 15:57:44', 'Qiu Bokai', '128.jpg', '40*30(cm)水墨、膠彩\r\n創作想法來自來「排列」的感受，而生活中牆面的磚塊或花磚也常有工整式的堆砌，我就想利用這樣得方式來取代傳統皴法的構成，以點描平穩的橫線，作為主要筆觸，帶出工整、規律的特性，另外也想呼應如人造物、人造島，或綠化都市所建的公園，這樣一個美化的概念，在當今生活也可算是非長常見，因此作品名稱就以室內桃園一詞，來說明都市的一絲生意。', 0),
(129, 'wait', 2, 12000, 1, '2022-11-03 15:57:44', 'SiuRoad', '129.jpg', '42*29(cm)膠彩、電繪', 0),
(130, 'Lightseeking III', 2, 25000, 1, '2022-11-03 15:57:44', 'Xu Ruojun', '130.jpg', '29*42(cm)水墨、膠彩\r\n每個生物都在用生命體悟著所有的給予與獲得，關於尋找的答案大概會化為潺潺漣漪、積成綿綿山峰，從一道光中，鋪陳蔓延。 『過了很久很久，尋光的人才發現，原來自己閃閃發光。』', 0),
(131, 'ridiculed pineapple', 3, 40000, 1, '2022-11-03 16:11:23', 'Tan Youjia', '131.jpg', '40*40(cm)油畫', 0),
(132, 'twilight', 3, 25000, 1, '2022-11-03 16:11:23', 'Lo Chan Peng', '132.jpg', '145*145(cm)油畫', 0),
(133, 'untitled2', 3, 1500, 1, '2022-11-03 16:11:23', 'Kuo Nien-Hsin', '133.jpg', '18*12(cm)油畫', 0),
(134, '2022.03', 3, 70000, 1, '2022-11-03 16:11:23', 'Lu Xueyao', '134.jpg', '50*50(cm)油畫', 0),
(135, 'swivel forest', 3, 10000, 1, '2022-11-03 16:11:23', 'Wei Guohao', '135.jpg', '72*60(cm)2022.06 y No.5', 0),
(136, 'rest', 3, 30000, 1, '2022-11-03 16:11:23', 'Huang Xunhui', '136.jpg', '38*45(cm)油畫\r\n安靜的休息 也許乘著夢境飛翔 也許只是一塊石頭', 0),
(137, 'The wind blowing from the other side', 3, 23500, 1, '2022-11-03 16:11:23', 'Lo Chan Peng', '137.png', '116*91(cm)油畫', 0),
(138, 'Transcendent Series Octopus Girl', 3, 2500, 1, '2022-11-03 16:11:23', 'Gong Shangwei', '138.jpg', '60*100(cm)油畫、水彩', 0),
(139, 'white horse', 3, 12000, 1, '2022-11-03 16:11:23', 'Zheng Zhongxuan', '139.jpg', '72*91(cm)油畫', 0),
(140, 'November', 3, 5000, 1, '2022-11-03 16:11:23', 'Tan Youjia', '140.jpg', '60*80(cm)油畫', 0),
(141, 'When the rose is faded', 3, 90000, 1, '2022-11-03 16:25:03', 'Irene W', '141.jpg', '150*150(cm)油畫', 0),
(142, 'Tribute to piano', 3, 20000, 1, '2022-11-03 16:25:03', 'Irene W', '142.jpg', '91*60(cm)油畫', 0),
(143, 'Vase', 3, 60000, 1, '2022-11-03 16:25:03', 'Irene W', '143.jpg', '91*72(cm)油畫', 0),
(144, 'Dolomites', 3, 60000, 1, '2022-11-03 16:25:03', 'Irene W', '144.jpg', '80*60(cm)油畫', 0),
(145, 'Little beauty in surrounding, Tillandsia', 3, 20000, 1, '2022-11-03 16:25:03', 'Irene W', '145.jpg', '40*40(cm)油畫', 0),
(146, 'The Forgotten', 4, 10000, 1, '2022-11-04 09:01:14', 'Noa Xu Yuxuan', '146.jpg', '38*26(cm)水彩', 0),
(147, 'happy flowers', 4, 20000, 1, '2022-11-04 09:01:14', 'Fangfang Liu', '147.jpg', '19*26(cm)水彩\r\n用想象中豐富的顏色去創作一張美麗花兒的景象', 0),
(148, 'Ganjiabao in the rain', 4, 20000, 1, '2022-11-04 09:01:14', 'Fangfang Liu', '148.jpg', '26*19(cm)水彩\r\n在桃園龍潭甘家堡寫生，忽然下起雨來，雨點打落在畫面形成自然的肌理，感謝老天爺與我一起完成創作，天人合一之作', 0),
(149, 'Hug Series - Mirror Tea Party', 4, 2000, 1, '2022-11-04 09:01:14', 'MilkHoneyPlanet', '149.jpg', '38*26(cm)水彩\r\n想了很久，終於踏出第一步。 再勇敢踏出一步，一起來享受美好的茶會吧~', 0),
(150, 'bouquet of flowers', 4, 28000, 1, '2022-11-04 09:01:14', 'Zhang Qiyun', '150.jpg', '55*39(cm)水彩', 0),
(151, 'A-CO laying on the rug', 4, 22000, 1, '2022-11-04 09:01:14', 'Zhang Qiyun', '151.jpg', '55*39(cm)水彩', 0),
(152, 'white tiger', 4, 22000, 1, '2022-11-04 09:01:14', 'Zhang Qiyun', '152.jpg', '55*30(cm)水彩', 0),
(153, 'light in the woods', 4, 40000, 1, '2022-11-04 09:01:14', 'Zhang Qiyun', '153.jpg', '79*55(cm)水彩', 0),
(154, 'Between Flower Fields * Stillness', 4, 10000, 1, '2022-11-04 09:01:14', 'Su Yuhan', '154.jpg', '38*26(cm)水彩', 0),
(155, 'Sit and watch the clouds rise', 4, 8000, 1, '2022-11-04 09:01:14', 'Su Yuhan', '155.jpg', '38*26(cm)水彩', 0),
(156, 'fly a kite together', 4, 8000, 1, '2022-11-04 09:01:14', 'Su Yuhan', '156.jpg', '38*26(cm)水彩', 0),
(157, 'rose fearless', 4, 22800, 1, '2022-11-04 09:01:14', 'Emily', '157.jpg', '40*30(cm)水彩\r\n玫瑰無畏 漫流自畫框外的美麗 心底安住花雨繽紛', 0),
(158, 'Everlasting blue rose', 4, 19800, 1, '2022-11-04 09:01:14', 'Emily', '158.jpg', '40*30(cm)水彩\r\n無年無限 生生不息 花開時 完美 凋謝時也完美 清純不染', 0),
(159, 'Shining Rose Goddess', 4, 16800, 1, '2022-11-04 09:01:14', 'Emily', '159.jpg', '40*30(cm)水彩\r\n閃耀 如夢 初覺 心傳潺潺細語', 0),
(160, 'mountain range', 4, 8000, 1, '2022-11-04 09:01:14', 'Yu Jiehan', '160.jpg', '56*39(cm)水彩', 0),
(161, 'peace and freedom', 5, 5200, 1, '2022-11-04 09:39:20', 'Xu Chenzheng', '161.jpg', '20*28(cm)版畫\r\n人民所付出的血與淚，必定迎接和平的曙光。', 0),
(162, 'dialogue', 5, 18000, 1, '2022-11-04 09:39:20', 'Xu Chenzheng', '162.jpg', '100*70(cm)版畫', 0),
(163, 'Exquisite clone: 03', 5, 8000, 1, '2022-11-04 09:39:20', 'Fatima Fletcher', '163.jpg', '30*30(cm)版畫\r\nOriginal work acrylic on Fabriano paper - price 22000 TWD including DHL shipping. Editions for exhibition are printed on canvas. 80% of all orchids are cloned, this fact is the origin of the title \'Exquisite Clone\'.', 0),
(164, 'Exquisite clone: 10', 5, 8000, 1, '2022-11-04 09:39:20', 'Fatima Fletcher', '164.jpg', '30*30(cm)版畫\r\nOriginal work acrylic on Fabriano paper - price 22000 TWD including DHL shipping. Editions for exhibition are printed on canvas. 80% of all orchids are cloned, this fact is the origin of the title \'Exquisite Clone\'.', 0),
(165, 'Painted perfume: Bottled moon', 5, 5000, 1, '2022-11-04 09:39:20', 'Fatima Fletcher', '165.jpg', '20*20(cm)版畫\r\nOriginal work acrylic on Fabriano paper - price 22000 TWD including DHL shipping. Editions for exhibition are printed on canvas. Perfumes and smells evoke memories, places, people. The night sky is trapped forever in Bottled moon.', 0),
(166, 'untitled', 5, 12000, 1, '2022-11-04 09:39:20', 'Kuo Nien-Hsin', '166.jpg', '40*27(cm)版畫', 0),
(167, 'Nature And Artificial', 5, 10000, 1, '2022-11-04 09:39:20', 'Noa Xu Yuxuan', '167.jpg', '52*38(cm)版畫', 0),
(168, 'untitled', 5, 5000, 1, '2022-11-04 09:39:20', 'Kuo Nien-Hsin', '168.jpg', '27*20(cm)版畫', 0),
(169, 'Klimt fashion cat lady', 5, 15000, 1, '2022-11-04 09:39:20', 'Hong Yin', '169.jpg', '30*40(cm)版畫\r\n4/50 available', 0),
(170, 'cat\'s whimsical world', 5, 3500, 1, '2022-11-04 09:39:20', 'Angel Chen', '170.jpg', '45*33(cm)版畫\r\n貓咪的幻想曲 貓咪似乎在等待什麼經過，眼睛睜得大大的。你猜猜祂腦袋瓜在想什麼呢？ 背景使用的是模仿梵谷星空的畫法。 是幅讓人莞爾一笑卻又會駐足的作品。', 0),
(171, 'fall', 5, 3000, 1, '2022-11-04 09:39:20', 'Wu Peixin', '171.jpg', '13*19(cm)版畫\r\n落，我以花與果實做出飄落的動做，低落的情緒投射在植物飄落的形態，呈現出感是到凋零、枯萎、失落的低緩情緒。', 0),
(172, 'Painted perfume: Constable clouds', 5, 5000, 1, '2022-11-04 09:39:20', 'Fatima Fletcher', '172.jpg', '20*20(cm)版畫\r\nOriginal work acrylic on Fabriano paper - price 22000 TWD including DHL shipping. Editions for exhibition are printed on canvas. Perfumes and smells evoke memories, places, people. This painted perfume bottles a cloudy sky in the style of Joh', 0),
(173, 'Shadow', 5, 15000, 1, '2022-11-04 09:39:20', 'Kuo Nien-Hsin', '173.jpg', '58*44(cm)版畫', 0),
(174, 'untitled', 5, 3000, 1, '2022-11-04 09:39:20', 'Kuo Nien-Hsin', '174.jpg', '44*30(cm)版畫', 0),
(175, 'ups and downs', 5, 52000, 1, '2022-11-04 09:39:20', 'Xu Chenzheng', '175.jpg', '67*155(cm)版畫', 0),
(176, 'O', 6, 12000, 1, '2022-11-04 10:02:30', 'aliette', '176.jpg', '160*120(cm)電繪', 0),
(177, 'MBTI ESTP', 6, 5000, 1, '2022-11-04 10:02:30', 'Zhuzu', '177.jpg', '40*30(cm)電繪', 0),
(178, 'summer', 6, 5000, 6, '2022-11-04 10:07:37', 'grey cat', '178.jpg', 'sun high in hot sky', 0),
(179, 'Crow Chasing the Moon', 6, 5000, 1, '2022-11-04 10:07:37', 'Chen Yuluo', '179.jpg', '21*43(cm)電繪、插畫', 0),
(180, 'Water Wheel Samadhi', 6, 35000, 1, '2022-11-04 10:07:37', 'Xu Tinghao', '180.jpg', '45*45(cm)電繪\r\n禪海滂礡，靜慮生蓮，守之不動，憶百千劫。 於地輪中發起許多禪定功德， 定水滋潤，自覺心中善根增長， 身心濡軟，折服高慢， 如水滋潤生長、體性柔軟二義， 故稱水輪三昧。', 0),
(181, 'blue killer whale', 6, 5000, 1, '2022-11-04 10:07:37', 'grey cat', '181.jpg', '100*100(cm)電繪', 0),
(182, 'hidden blade', 6, 5000, 1, '2022-11-04 10:07:37', 'grey cat', '182.jpg', '100*100(cm)電繪\r\n無處可去的情緒最後會到哪裡呢 像雪白的利刃般刺傷自己', 0),
(183, 'multiverse', 6, 7000, 1, '2022-11-04 10:07:37', 'MirandaMercy', '183.jpg', '30*40(cm)電繪\r\n每一次選擇都是一次的變因\r\n平行時空中演化出不同的我\r\n過著不一樣的人生\r\n決定參加馬拉松的我\r\n決定念哲學的我\r\n決定生可愛寶寶的我\r\n各種決定下的我\r\n交織成我的人生軌跡\r\n那份專屬於自己的多重宇宙', 0),
(184, '#1 Jan. Upper central incisor', 6, 3500, 1, '2022-11-04 10:07:37', 'William Chang', '184.jpg', 'illustration showing how I feel about different teeth. Different teeth correspond to twelve months, each representing different solar terms, animals, plants and colors. Give life to every tooth, so that teeth are no longer just teeth, but have a deep conn', 0),
(185, '#12 Dec. Lower first molar', 6, 3500, 1, '2022-11-04 10:07:37', 'William Chang', '185.jpg', '59*45(cm)電繪、插畫\r\nAn illustration showing how I feel about different teeth. Different teeth correspond to twelve months, each representing different solar terms, animals, plants and colors. Give life to every tooth, so that teeth are no longer just teeth, b', 0),
(186, 'Butterfly Contemplation', 6, 3900, 1, '2022-11-04 10:07:37', 'Aaron Blaise', '186.jpg', '30*15(cm)', 0),
(187, 'Nubian Warriors', 6, 15000, 1, '2022-11-04 10:07:37', 'Aaron Blaise', '187.jpg', '20*16(cm)', 0),
(188, 'Nature Salvation', 6, 65000, 1, '2022-11-04 10:07:37', 'Artem Chebokha', '188.jpg', '100*100(cm)', 0),
(189, 'Homo Violentus', 6, 34000, 1, '2022-11-04 10:07:37', 'Artem Chebokha', '189.jpg', '100*100(cm)\nThe monster can\'t create anything. It only can rape, kill and destroy.', 0),
(190, 'Hive', 6, 12000, 1, '2022-11-04 10:07:37', 'Vladimir Motsar', '190.jpg', '100*100(cm)', 0),
(191, 'Bogatyr', 6, 32400, 1, '2022-11-04 10:44:13', 'Vladimir Motsar', '191.jpg', '100*50(cm)', 0),
(192, 'The Monk', 6, 32000, 1, '2022-11-04 10:44:13', 'Lorenzo Lanfranconi', '192.jpg', '100*50(cm)\r\nDecided to paint on this old sketch during the holidays.\r\nThe bridge is inspired to an ancient one near my city and it leads to a monastery (today splitted in apartments), in the wood on a hill, where I used to play Magic the Gathering in my c', 0),
(193, 'Island town', 6, 2100, 1, '2022-11-04 10:44:13', 'Jonathan Bertaud', '193.jpg', '100*50(cm)\r\nPersonal project that I did following Jad Saber\'s amazing tutorial.', 0),
(194, 'Zero_Gravity', 6, 21000, 1, '2022-11-04 10:44:13', 'Wadim Kashin', '194.jpg', '100*50(cm)\r\nsome sci-fi stuff that I did during the free time.\r\npersonal.', 0),
(195, 'Chaos Invoked', 6, 11000, 1, '2022-11-04 10:44:13', 'Ismail Inceoglu', '195.jpg', '100*50(cm)', 0),
(196, 'Mother Nature', 6, 1100, 1, '2022-11-04 10:52:04', 'Sin jong hun', '196.jpg', '100*100(cm)\r\nPlaces I want to go.\r\nA combination of refreshing green, blue and white.\r\nNature is always beautiful.', 0),
(197, 'beach village', 6, 12000, 1, '2022-11-04 10:52:04', 'Sin jong hun', '197.jpg', '100*100(cm)', 0),
(198, 'Iron hilltop', 6, 18000, 1, '2022-11-04 10:52:04', 'Vladimir Motsar', '198.jpg', '100*100(cm)', 0),
(199, 'MENYR', 6, 12000, 1, '2022-11-04 10:52:04', 'Jonathan Bertaud', '199.jpg', '100*100(cm)', 0),
(200, 'Avalon - house of botanists', 6, 21000, 1, '2022-11-04 10:52:04', 'Valentin Perouelle', '200.jpg', '100*100(cm)\r\nExploration art for my personnal project, strongly inspired by Ghibli movies especially \" when Marnie was there \".', 0),
(201, 'sad kitty', 6, 99999, 1, '2022-11-08 10:20:24', 'Life Quotes', '201.jpg', 'sad kitty', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `sellers`
--

CREATE TABLE `sellers` (
  `id` int(6) UNSIGNED NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `valid` tinyint(1) NOT NULL,
  `introduce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sellers`
--

INSERT INTO `sellers` (`id`, `account`, `password`, `name`, `phone`, `email`, `created_at`, `valid`, `introduce`) VALUES
(1, 'Ace', '827ccb0eea8a706c4c34a16891f84e7b', 'Ace', '0928299163', 'Ace1234@example.com', '2022-10-21 15:00:00', 1, '這個丹麥藝 從 1993 年起就開始進行一系列有關經濟力、民主生產條件和自我組織的計畫。這些藝 術家的計畫檢察查了替代能源生產方法，以及巴西、泰國和歐洲的商品生產，兩者均揭 發了現有經濟結構的不足，並對其加以質疑。'),
(2, 'Beck', '827ccb0eea8a706c4c34a16891f84e7b', 'Beck', '0912985206', 'Beck1234@example.com', '2022-10-21 15:09:00', 1, '生於韓國釜山，政大哲學系畢業。曾任《天下雜誌》、《時報周刊》、《民生報》、《自立早晚報》、《時報新聞刊》、《工商時報》 等攝影記者，《Playboy 中文版》攝影指導、《Smart 智富月刊》攝影主編、《非凡新聞 e 周刊》攝影主任、《明報周刊》副總編輯， 現任何創影像工作室負責人。'),
(3, 'Allen', '827ccb0eea8a706c4c34a16891f84e7b', 'Allen', '0934651524\n', 'Allen1234@example.com', '2022-10-21 15:52:45', 1, 'Allen 1972 年出生於西班牙，目前在鹿特丹生活與工作。這位西班牙藝術家的作'),
(4, 'Ari', '827ccb0eea8a706c4c34a16891f84e7b', 'Ari', '0937113468', 'Ari1234@example.com', '2022-10-21 15:59:56', 1, '1970 年出生於以色列的阿富拉（Afula）。目前在以色列居住與工作。'),
(5, 'Arvin', '827ccb0eea8a706c4c34a16891f84e7b', 'Arvin', '0963662973', 'Arvin1234@example.com', '2022-10-21 16:03:28', 1, '1963 年出生於羅馬尼亞，也是羅馬尼亞伊希（Iasi）Periferic 雙年展創始人。'),
(6, 'Baldwin', '827ccb0eea8a706c4c34a16891f84e7b', 'Baldwin', '0931046439', 'Baldwin1234@example.com', '2022-10-21 16:05:35', 1, '出生於羅馬尼亞，她曾在斯洛伐克的布拉索夫藝術學院研習雕塑和概念藝術'),
(7, 'Bard', '827ccb0eea8a706c4c34a16891f84e7b', 'Bard', '09131111111', 'Bard1234@example.com', '2022-10-24 09:45:02', 1, '1968 年出生於法國，目前工作於里斯本與巴黎。1995 年，畢業於 巴黎維爾曼（Villemin）建築學院，佛斯提諾目前在里斯本和巴黎兩地都從事多方面的 活動。'),
(8, 'Lance', '827ccb0eea8a706c4c34a16891f84e7b', 'Lance', '0929445746', 'Lance123@gmail.com', '2022-10-24 14:17:10', 1, '她幫所有媒體設計，並與許多不同的設計家、作家和藝術家合作。 同時她也出版過一些書，相當成功：《策略彙編》（Catalogue of Strategy）、《人人都是 設計師》（Everyone is a Designer）、《一心求變與下一個大自然》（Mobile Minded and Next Nature）。'),
(9, 'Baron', '827ccb0eea8a706c4c34a16891f84e7b', 'Baron', '0918117898', 'Baron1234@example.com', '2022-10-24 14:17:52', 1, '他是雪黎大學雪黎學院的藝術系學士，以及新南威爾斯 大學藝術學院碩士。格萊維爾是數位藝術家，以類似街頭的方式將過去與現在巧妙地結 合在一起。'),
(10, 'Barry', '827ccb0eea8a706c4c34a16891f84e7b', 'Barry', '0986012913', 'Barry1234@example.com', '2022-10-24 14:26:36', 1, '1997 年在卻爾西學院完成雕塑碩士學位，從那時起在英 國內外都進行過許多藝術計畫。'),
(11, 'Bart', '827ccb0eea8a706c4c34a16891f84e7b', 'Bart', '0916148362', 'Bart1234@example.com', '2022-10-24 14:28:22', 1, '1997 年在卻爾西學院完成雕塑碩士學位，從那時起在英 國內外都進行過許多藝術計畫。'),
(12, 'Bernd', '827ccb0eea8a706c4c34a16891f84e7b', 'Bernd', '0982356642', 'Bernd1234@example.com', '2022-10-24 16:06:19', 1, '1974 年出生於德國，奧 然後就搬到法蘭克福，並就讀於當地的 Städelschule 藝術學院，接受 Ayse Erkmen 教授 的指導。特爾目前住在倫敦和法蘭克福，也在這兩地工作。圖爾曾多次參加各大展覽： 克羅埃西亞札格拉布新藝廊（Galerija Nova）展出「失去的土地」（Ground Lost）、塞 浦路斯尼柯西亞市立藝術中心（NiMAC）展出「橫越」（Crossings）'),
(13, 'Bill	', '827ccb0eea8a706c4c34a16891f84e7b', 'Bill	', '0972819942', 'Bill123@gmail.com', '2022-10-25 09:18:19', 1, '1960 年出生於檳榔市的黃海昌是 求學，1987 年才從美國返回馬來西亞，他擁有麻州布蘭迪斯（Brandeis）大學文學學士 及哈佛大學教育碩士、安默斯特麻州大學藝術碩士學位。'),
(14, 'Bob', '827ccb0eea8a706c4c34a16891f84e7b', 'Bob', '0933555444', 'Bob123@gmail.com', '2022-10-25 09:20:56', 1, '出生於板橋，1965 年畢業於臺灣大學土木工程系。「隨時走路，即時在場」，張照堂自高中時期拿起相機開始拍照，至今未曾 停歇。他的影像平凡中有超脫、親切又疏離、荒謬中具詼諧的特質，體現出攝影家敏銳的觀察、誠摯的理解，以及濃厚的關懷與 同理心。他曾說：「攝影家尋找的不是風景，而是一種氛圍，一種狀態，它或許是浩巨的安靜與空無，或許是微妙的想像與期待， 也可能是另一種呼之欲出的能量與騷動。」'),
(15, 'Byron', '827ccb0eea8a706c4c34a16891f84e7b', 'Byron', '0934546154', 'Byron123@gmail.com', '2022-10-25 09:26:56', 1, '1961 年生於臺灣臺中縣，1984 年畢業於東吳大學英文系，1990 年於美國印第安那大學取得教育碩士學位。張乾琦首次接觸攝影 是在東吳大學社團，當時真正的拍攝有限，倒是圖書館裡大量翻譯的國外攝影書籍，給他打開一扇窗。攝影，成了他認識自己和 世界，一種沈默的交流方式。印第安那大學自由開放的校風，給了張乾琦機會去沈迷於自己的「愛好」。'),
(16, 'Calvin', '827ccb0eea8a706c4c34a16891f84e7b', 'Calvin', '0952870299', 'Calvin123@gmail.com', '2022-10-31 11:59:35', 1, '澎湖山水人，藝評家郭力昕曾讚譽張詠捷為臺灣中青代最傑出的女性攝影家，熱情直觀。1985 年以黑白影像記錄家鄉澎湖，展 開攝影之路。1990 年專職雜誌攝影編輯，以誠摯的影像尋找內心與外在世界對話，並投入原住族群關懷與山林智慧學習。'),
(17, 'Carl', '827ccb0eea8a706c4c34a16891f84e7b', 'Carl', '0952792683', 'Carl123@gmail.com', '2022-10-31 12:06:45', 1, '1996 年就讀於紐約視覺藝術學院攝影系，三年後以傑出成就獎獲得美術學士學位。2013 年畢業於國立臺北藝術大學美術學系碩 士班，目前就學於國立臺北藝術大學美術學系博士班。他在攝影生涯的初始階段，就著眼於攝影藝術不同的面向。陳敬寶以《片 刻濃妝：檳榔西施》系列紀實肖像的作品受到注目。'),
(18, 'Cash', '827ccb0eea8a706c4c34a16891f84e7b', 'Cash', '0955750533', 'Cash123@gmail.com', '2022-10-31 12:09:37', 1, '1963 年出生於臺灣澎湖，1986 年中國文化大學美術系西畫組畢業。90 年代初以來，陳順築源於自傳性的觀點，衍生出「攝影」 為主體語言的影像思考，作品常以複合媒材及裝置介入空間和地景。'),
(19, 'Christ', '827ccb0eea8a706c4c34a16891f84e7b', 'Christ', '0989337496', 'Christ123@gmail.com', '2022-10-31 12:13:02', 1, '1980 年出生於臺灣臺南，就讀國立臺南藝術大學藝術與創作理論研究所博士班。曾獲選臺北國際藝術村 BankART1929 日本橫濱 駐村交流、文化部巴黎西帖國際藝術村出訪計畫。2'),
(20, 'Dennis', '827ccb0eea8a706c4c34a16891f84e7b', 'Dennis', '0922514740', 'Dennis123@gmail.com', '2022-11-01 16:36:23', 1, '齊柏林於 1988 年起擔任專業攝影師致力於空中攝影領域，1990 年服務公職並肩負紀錄臺灣各項重大工程的興建過程任務。從事 空中攝影紀錄近 25 年，直升機飛行攝影飛行時數逾 2500 小時，累積超過 30 萬張空拍照片，出版空中攝影專輯約 30 餘冊，為 臺灣地形地貌及生態環境留下珍貴的空中影像。'),
(21, 'Eli', '827ccb0eea8a706c4c34a16891f84e7b', 'Eli', '0934216476', 'Eli123@gmail.com', '2022-11-01 16:36:40', 1, '1958 年生於基隆，淡江大學東方語文學系畢業，日本大學藝術學部藝術研究所專題研究兩年。曾任新聞局光華雜誌專任攝影、 大地地理雜誌社攝影主編。1992 年正式告別攝影界自行創業，成立「夏綠原國際有限公司」。 1998 年恢復「夏門攝影企劃研究 室」營運，陸續彙整、研究台灣攝影發展脈絡中，代表性攝影家的作品數位化掃描，並建立 Metadata 資料庫，專致於臺灣攝影 文化搜研、保存、展覽與出版。'),
(22, 'Fion', '827ccb0eea8a706c4c34a16891f84e7b', 'Fion', '0933039361', 'Fion123@gmail.com', '2022-11-01 16:36:48', 1, '紐約州立大學純藝術攝影碩士畢。長期關注於影像發展與文化間的互動關係，其研究及創作始終傾向於跨領域媒材或媒介的運用 與整合，並藉此探討臺灣社會與文化之議題。例如嘗試將攝影結合臺灣廟會文化中常出現的傳統刺繡美學，並不斷轉化其形式與 敘事，持續展演於各地：不僅在臺灣臺北、大陸平遙、大理等攝影節，或是倫敦、義大利的博覽會，甚至在日本、韓國的個展中 都深受關注。'),
(23, 'Irene', '827ccb0eea8a706c4c34a16891f84e7b', 'Irene', '0971654010', 'Glenn123@gmail.com', '2022-11-01 16:37:03', 1, '生於1965 年，畢業於世界新聞專科學校，退伍後進入媒體工作，之後並開啟了專題攝影計畫，包括：「行過幽谷」、「消失的群像— 勞動者紀事」、「野想—黃羊川計劃」、「人的莊園」等。早期攝影作品以「報導攝影」風格為主，以紀實且帶有詩意的影像傳 達個人對於主題人物的觀點與想法。「人的莊園」以「編導式攝影」方式進行創作，透過細膩且色彩飽滿的影像，並結合超現實 的景境氛圍，開創個人獨特的攝影語境。周慶輝曾先後榮獲了「台北攝影節報導類特別獎」、「金鼎獎」、SOPA 亞洲「卓越特 寫攝影獎」等榮譽獎項。'),
(24, 'Jenny', '827ccb0eea8a706c4c34a16891f84e7b', 'Jenny', '0911938064', 'Hobart123@gmail.com', '2022-11-01 16:37:15', 1, '臺灣臺南人。畢業於臺灣藝術大學美術學系、臺南藝術大學造形藝術研究所。莊榮哲歷年作品展於臺灣與北京，並多次獲得國家 文藝基金會展覽及創作補助。代表作〈紋人畫〉系列係使用現代的紋身機具，在皮膚上創造傷口、紋出中國水墨花卉。'),
(25, 'Josephine', '827ccb0eea8a706c4c34a16891f84e7b', 'Josephine', '0915688827', 'Ken123@gmail.com', '2022-11-01 16:37:23', 1, '文學出身的影像創作者，同時以經營者、教育者、英文攝影書籍譯者身份生活於台北。韓筠青的攝影作品從情感出發，以故事敘 事法以及自拍的方式表述，並使用十九世紀古典化學方法印製與展出。她相信，以自己為本質的創作就像一段未知的旅程，我們 可從中感受到生命的各種啟發與意義。');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `phone`, `email`, `created_at`, `valid`) VALUES
(1, 'john', '827ccb0eea8a706c4c34a16891f84e7b', 'John', '091234567', 'john@example.com', '2022-10-21 15:00:00', 1),
(2, 'may', '827ccb0eea8a706c4c34a16891f84e7b', 'May', '0912345678', 'may@gmail.com', '2022-10-21 15:09:00', 1),
(3, 'joe', '827ccb0eea8a706c4c34a16891f84e7b', 'Joe', '0934651524\n', 'joe@test.com', '2022-10-21 15:52:45', 1),
(4, 'sarch', '827ccb0eea8a706c4c34a16891f84e7b', 'Sarch', '0937113468', 'sarch@gamil.com', '2022-10-21 15:59:56', 1),
(5, 'sue', '827ccb0eea8a706c4c34a16891f84e7b', 'Sue', '0963662973', 'sue@test.com', '2022-10-21 16:03:28', 1),
(6, 'Tony', '827ccb0eea8a706c4c34a16891f84e7b', 'Tony', '0931046439', 'tony@test.com', '2022-10-21 16:05:35', 1),
(7, 'james', '827ccb0eea8a706c4c34a16891f84e7b', 'James', '09131111111', 'james@test.com', '2022-10-24 09:45:02', 1),
(8, 'tom', '827ccb0eea8a706c4c34a16891f84e7b', 'Tom', '0929445746', 'tom@test.com', '2022-10-24 14:17:10', 1),
(9, 'jessie', '827ccb0eea8a706c4c34a16891f84e7b', 'Jessie', '0918117898', 'jessie@test.com', '2022-10-24 14:17:52', 1),
(10, 'Julia', '827ccb0eea8a706c4c34a16891f84e7b', 'Julia', '0986012913', 'Julia@test.com', '2022-10-24 14:26:36', 1),
(11, 'curry', '827ccb0eea8a706c4c34a16891f84e7b', 'Curry', '0916148362', 'curry@test.com', '2022-10-24 14:28:22', 1),
(12, 'jason', '827ccb0eea8a706c4c34a16891f84e7b', 'Jason', '0982356642', 'jason@test.com', '2022-10-24 16:06:19', 1),
(13, 'rock', '827ccb0eea8a706c4c34a16891f84e7b', 'Rock', '0917427898\n', 'rock@test.com', '2022-10-25 09:18:19', 1),
(14, 'peter', '827ccb0eea8a706c4c34a16891f84e7b', 'Peter', '0933555444', 'prter@test.com', '2022-10-25 09:20:56', 1),
(15, 'bruce', '827ccb0eea8a706c4c34a16891f84e7b', 'Bruce', '0934546154', 'bruce@test.com', '2022-10-25 09:26:56', 1),
(16, 'Ada', '827ccb0eea8a706c4c34a16891f84e7b', 'Ada', '0952870299', 'Ada@test.com', '2022-10-31 11:59:35', 1),
(17, 'Aaliyah', '827ccb0eea8a706c4c34a16891f84e7b', 'Aaliyah', '0982922850', 'Aaliyah@test.com', '2022-10-31 12:06:45', 1),
(18, 'Cara', '827ccb0eea8a706c4c34a16891f84e7b', 'Cara', '0938911584', 'Cara@test.com', '2022-10-31 12:09:37', 1),
(19, 'Chloe', '827ccb0eea8a706c4c34a16891f84e7b', 'Chloe', '0989337496', 'Chloe@test.com', '2022-10-31 12:13:02', 1),
(20, 'Debby', '827ccb0eea8a706c4c34a16891f84e7b', 'Debby', '0920311845', 'Debby@test.com', '2022-11-01 16:36:23', 1),
(21, 'Gail', '827ccb0eea8a706c4c34a16891f84e7b', 'Gail', '0934216476', 'Gail@test.com', '2022-11-01 16:36:40', 1),
(22, 'Grace	', '827ccb0eea8a706c4c34a16891f84e7b', 'Grace', '0913939424', 'Grace@test.com', '2022-11-01 16:36:48', 1),
(23, 'Irene', '827ccb0eea8a706c4c34a16891f84e7b', 'Irene', '0958944892', 'Irene@test.com', '2022-11-01 16:37:03', 1),
(24, 'Jenny', '827ccb0eea8a706c4c34a16891f84e7b', 'Jenny', '0932273961', 'Jenny@test.com', '2022-11-01 16:37:15', 1),
(25, 'Josephine', '827ccb0eea8a706c4c34a16891f84e7b', 'Josephine', '0931057539', 'Josephine@test.com', '2022-11-01 16:37:23', 1),
(26, 'leoleo', '827ccb0eea8a706c4c34a16891f84e7b', 'leo', '0900000000', 'leo@test.com', '2022-11-07 10:35:55', 1),
(27, 'maya123', '827ccb0eea8a706c4c34a16891f84e7b', 'maya', '0900000000', 'maya@test.com', '2022-11-07 10:37:36', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_order`
--

CREATE TABLE `user_order` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_id` int(4) NOT NULL,
  `user_id` int(6) NOT NULL,
  `amount` int(4) NOT NULL,
  `order_date` date NOT NULL,
  `payment` varchar(50) NOT NULL,
  `send_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_order`
--

INSERT INTO `user_order` (`id`, `product_id`, `user_id`, `amount`, `order_date`, `payment`, `send_address`) VALUES
(1, 5, 3, 1, '2022-11-03', 'LinePay', '248 新北市五股區新城五路22號'),
(2, 2, 4, 3, '2022-11-04', 'LinePay', '508 彰化縣和美鎮忠孝路8號'),
(3, 7, 6, 2, '2022-11-01', 'LinePay', '320 桃園市中壢區長春三路3號'),
(4, 8, 9, 1, '2022-11-02', 'LinePay', '880 澎湖縣馬公市吉海路6號'),
(5, 6, 1, 4, '2022-10-27', 'LinePay', '100 臺北市中正區惠安街8號'),
(6, 10, 12, 1, '2022-10-28', 'LinePay', '421 臺中市后里區南村路33號'),
(7, 1, 8, 1, '2022-11-03', 'LinePay', '973 花蓮縣吉安鄉仁里四街26號'),
(8, 9, 7, 1, '2022-11-02', 'LinePay', '302 新竹縣竹北市復興五街3號'),
(9, 3, 2, 3, '2022-11-04', 'LinePay', '557 南投縣竹山鎮溪山路9號'),
(10, 4, 5, 2, '2022-11-02', 'LinePay', '955 臺東縣鹿野鄉水源路22號');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- 資料表索引 `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
