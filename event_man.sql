-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015-06-17: 11:22:41
-- 伺服器版本: 5.6.21
-- PHP 版本： 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `event_man`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`username`, `password`, `nickname`, `email`) VALUES
('2', '2', '2', 'email');

-- --------------------------------------------------------

--
-- 資料表結構 `account_man`
--

CREATE TABLE IF NOT EXISTS `account_man` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `account_man`
--

INSERT INTO `account_man` (`username`, `password`, `nickname`, `email`) VALUES
('1', '1', '1', 'email'),
('3', '3', '3', 'email');

-- --------------------------------------------------------

--
-- 資料表結構 `參加`
--

CREATE TABLE IF NOT EXISTS `參加` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `活動ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `活動`
--

CREATE TABLE IF NOT EXISTS `活動` (
  `活動ID` int(11) NOT NULL,
  `使用者名稱` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `活動名稱` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `活動日期` date NOT NULL,
  `活動資訊` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `圖片名稱` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `瀏覽數` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `活動`
--

INSERT INTO `活動` (`活動ID`, `使用者名稱`, `活動名稱`, `活動日期`, `活動資訊`, `圖片名稱`, `瀏覽數`) VALUES
(1, '天天後援會', '天天握手會 – 2015台北首站開跑', '2015-06-22', '資管新寵兒，席捲臺大！', '', 26),
(2, 'Stanley老師', 'Stanley老師心靈成長課程', '2015-06-25', 'Stanley老師讓你心靈成長!\r\n', '', 6),
(3, 'QQ', 'AA', '2015-06-05', 'AAA', '', 1),
(4, '3', '3', '2015-12-31', '333', 'cola.jpg', 2),
(5, '3', '3', '2015-12-31', '333', 'cola.jpg', 3),
(6, '3', 'YEAH~', '2015-06-26', '~~~~', '1.jpg', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`username`);

--
-- 資料表索引 `account_man`
--
ALTER TABLE `account_man`
 ADD PRIMARY KEY (`username`);

--
-- 資料表索引 `參加`
--
ALTER TABLE `參加`
 ADD PRIMARY KEY (`username`,`活動ID`), ADD KEY `活動ID` (`活動ID`);

--
-- 資料表索引 `活動`
--
ALTER TABLE `活動`
 ADD PRIMARY KEY (`活動ID`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `參加`
--
ALTER TABLE `參加`
ADD CONSTRAINT `此使用者有參加活動` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `此活動有被參加` FOREIGN KEY (`活動ID`) REFERENCES `活動` (`活動ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
