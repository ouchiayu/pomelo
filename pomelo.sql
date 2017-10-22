-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost:3306
-- 產生時間： 2017 年 10 月 22 日 22:32
-- 伺服器版本: 5.5.42
-- PHP 版本： 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `pomelo`
--

-- --------------------------------------------------------

--
-- 資料表結構 `pomelo_order`
--

CREATE TABLE `pomelo_order` (
  `order_id` int(5) NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `a_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `a_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `p_num` int(5) NOT NULL,
  `p_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p_msg` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pack_time` datetime DEFAULT NULL,
  `ship_time` datetime DEFAULT NULL,
  `ship_num` text COLLATE utf8_unicode_ci,
  `arrive_time` datetime DEFAULT NULL,
  `atm_bank` text COLLATE utf8_unicode_ci,
  `atm_num` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `atm_time` date DEFAULT NULL,
  `cash_who` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `pomelo_order`
--

INSERT INTO `pomelo_order` (`order_id`, `order_time`, `order_status`, `a_name`, `a_phone`, `p_name`, `p_phone`, `p_num`, `p_address`, `p_msg`, `payment_type`, `payment_status`, `pack_time`, `ship_time`, `ship_num`, `arrive_time`, `atm_bank`, `atm_num`, `atm_time`, `cash_who`) VALUES
(1, '2016-09-11 20:04:15', 'arrive', 'ddd', '345678', 'fghj', '34567', 2, '260宜蘭縣宜蘭市fghjk', 'ghjk', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2016-09-11 20:04:15', 'ship', 'ddd', '345678', 'ertyu', '345678', 3, '260宜蘭縣宜蘭市ghjk', 'rtyui', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '0000-00-00 00:00:00', 'pack', 'rty', '234567', 'fgh', '2345678', 2, '207新北市萬里區ghjkl', 'ertyui', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2016-09-12 07:44:24', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2016-09-12 07:44:55', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2016-09-12 07:47:43', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2016-09-12 07:48:51', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2016-09-12 07:48:53', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2016-09-12 14:06:13', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2016-09-12 14:06:25', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2016-09-12 14:06:43', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2016-09-12 14:06:53', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2016-09-12 14:18:10', 'order', 'fgh', '345678', 'ghj', '345678', 2, '300新竹市東區dfgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2016-09-12 14:19:33', 'pack', 'vbnm', '345678', 'rty', '34567', 2, '114台北市內湖區fghj', 'ertyu', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2016-09-12 14:19:33', 'order', 'vbnm', '345678', 'dfgh', '45678', 3, '300新竹市東區fghjiu', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2016-09-12 14:23:48', 'order', 'vbnm', '345678', 'rty', '34567', 2, '114台北市內湖區fghj', 'ertyu', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2016-09-12 14:23:48', 'order', 'vbnm', '345678', 'dfgh', '45678', 3, '300新竹市東區fghjiu', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2016-09-12 14:23:59', 'order', 'vbnm', '345678', 'rty', '34567', 2, '114台北市內湖區fghj', 'ertyu', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2016-09-12 14:23:59', 'order', 'vbnm', '345678', 'dfgh', '45678', 3, '300新竹市東區fghjiu', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2016-09-12 14:24:13', 'order', 'vbnm', '345678', 'rty', '34567', 2, '114台北市內湖區fghj', 'ertyu', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2016-09-12 14:24:13', 'arrive', 'vbnm', '345678', 'dfgh', '45678', 3, '300新竹市東區fghjiu', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2016-09-12 14:24:36', 'order', 'vbnm', '345678', 'rty', '34567', 2, '114台北市內湖區fghj', 'ertyu', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2016-09-12 14:24:36', 'order', 'vbnm', '345678', 'dfgh', '45678', 3, '300新竹市東區fghjiu', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2016-09-12 14:24:41', 'order', 'vbnm', '345678', 'rty', '34567', 2, '114台北市內湖區fghj', 'ertyu', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2016-09-12 14:24:41', 'pack', 'vbnm', '345678', 'dfgh', '45678', 3, '300新竹市東區fghjiu', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2016-09-12 14:40:03', 'pack', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2016-09-12 14:40:03', 'ship', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2016-09-12 14:40:56', 'pack', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2016-09-12 14:40:56', 'pack', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2016-09-12 14:41:23', 'arrive', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2016-09-12 14:41:23', 'pack', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2016-09-12 14:41:52', 'ship', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2016-09-12 14:41:52', 'ship', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2016-09-12 14:42:23', 'ship', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2016-09-12 14:42:23', 'ship', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2016-09-12 14:43:16', 'ship', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2016-09-12 14:43:16', 'ship', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2016-09-12 14:43:51', 'arrive', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2016-09-12 14:43:51', 'pack', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2016-09-12 14:44:10', 'order', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2016-09-12 14:44:10', 'order', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2016-09-12 14:46:04', 'order', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2016-09-12 14:46:04', 'order', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2016-09-12 15:59:59', 'order', 'ghj', '45678', 'tgyui', '4567', 2, '114台北市內湖區jkgl', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2016-09-12 15:59:59', 'order', 'ghj', '45678', 'erty', '34567', 3, '114台北市內湖區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2016-09-13 16:05:31', 'order', '歐佳玗', '0928806748', '張晏銘', '0988108844', 2, '333 桃園市龜山區介壽路二段364巷61弄25號', '', 'atm', '2', NULL, NULL, NULL, NULL, NULL, '45678', '2016-09-13', NULL),
(47, '2016-09-13 16:05:31', 'order', '歐佳玗', '0928806748', '陳映辰', '0988371381', 1, '334 桃園市八德區國光北路78號', '測試，不要晚上送', 'atm', '2', NULL, NULL, NULL, NULL, NULL, '45678', '2016-09-13', NULL),
(48, '2016-09-13 17:12:47', 'order', 'etyu', '3456789', 'ghj', '34567', 1, '207 新北市萬里區fghj', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '2016-09-13 17:12:47', 'order', 'etyu', '3456789', 'rtyu', '345678', 3, '260 宜蘭縣宜蘭市fghj', 'yuio', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '2016-09-14 02:11:27', 'order', '歐佳雯', '0988121558', '歐佳雯', '0988121558', 3, '334 桃園市八德區介壽路二段364巷61弄25號', '不要小得', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '2016-09-14 02:14:34', 'order', 'gyhjk', '345678', 'cfghj', '2345678', 7, '334 桃園市八德區dfghj', '', 'atm', '2', NULL, NULL, NULL, NULL, NULL, '23456', '2016-09-14', NULL),
(52, '2016-09-14 02:14:34', 'pack', 'gyhjk', '345678', 'erty', '2345678', 1, '334 桃園市八德區fghj', 'ertyuikhjklfghjk', 'atm', '2', NULL, NULL, NULL, NULL, NULL, '23456', '2016-09-14', NULL),
(53, '2016-09-19 01:26:33', 'order', '歐佳雯', '0988121558', '歐佳雯', '0988121558', 1, '334 桃園市八德區介壽路二段364巷61弄25號', '', 'atm', '2', NULL, NULL, NULL, NULL, NULL, '23456', '2016-09-20', NULL),
(54, '2016-09-20 00:01:33', 'order', '歐佳雯', '0988121558', '歐佳雯', '0988121558', 1, '334 桃園市八德區介壽路二段364巷61弄25號', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '2016-09-20 00:02:21', 'pack', 'fgh', '34567', 'rfghj', '345678', 1, '334 桃園市八德區fgh', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '2016-09-20 00:03:07', 'order', 'erty', '3456u', 'wer', '2345678', 1, '302 新竹縣竹北市fghj', '', 'atm', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '2016-09-20 10:25:17', 'order', '', '', '', '', 1, ' ', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '2016-09-20 10:48:44', 'order', '', '', '', '', 1, '114 台北市內湖區', '', 'pay', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '2016-09-23 17:53:59', 'order', 'test', '45678', 'rtyu', '34567', 2, '260 宜蘭縣宜蘭市fghjkl', '', 'cash', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-23', '簡麗華'),
(60, '2017-10-22 17:00:52', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '2017-10-22 17:00:52', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '2017-10-22 17:03:29', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '2017-10-22 17:03:29', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '2017-10-22 17:03:55', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '2017-10-22 17:03:55', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '2017-10-22 17:05:35', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, '2017-10-22 17:05:35', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, '2017-10-22 17:06:26', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '2017-10-22 17:06:26', 'order', 'ohmo', '345678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '2017-10-22 17:08:28', 'order', 'ghj', '45678', '1', '1', 1, '', '1', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, '2017-10-22 17:08:28', 'order', 'ghj', '45678', '3', '3', 3, '', '3', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, '2017-10-22 17:10:49', 'order', 'ohmo', '345678', '', '', 0, '', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, '2017-10-22 17:10:49', 'order', 'ohmo', '345678', '', '', 0, '', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, '2017-10-22 17:13:11', 'order', 'ohmo', '345678', '', '', 0, '', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '2017-10-22 17:13:11', 'order', 'ohmo', '345678', '', '', 0, '', '', '', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, '2017-10-22 17:16:07', 'order', 'ohmo', '345678', 'ohmo1', '345678', 2, '', 'fgh', 'atm', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '2017-10-22 17:16:07', 'order', 'ohmo', '345678', 'ohmo2', '4567', 1, '', '', 'cod', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '2017-10-22 17:20:19', 'order', 'ohmod', '3456783', 'ohmo1', '345678', 2, '新竹市|東區|dd|dd|uyiu|56|56|56|67|8', 'fgh', 'atm', '1', NULL, NULL, NULL, NULL, '12345', '822', NULL, NULL),
(79, '2017-10-22 17:20:19', 'arrive', 'ohmod', '3456783', 'skaldh', '456', 1, '嘉義市|東區||ddd||||33||', '', 'cash', '1', NULL, NULL, NULL, '2017-10-22 14:23:54', NULL, NULL, NULL, '簡麗華'),
(80, '2017-10-22 20:28:06', 'order', '歐佳玗', '0928806748', '張晏銘', '0988108844', 5, '桃園市|龜山區||明興||||179|2|197', '我送你的自己付錢', 'cod', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, '2017-10-22 20:28:06', 'order', '歐佳玗', '0928806748', '陳映辰', '09999999999', 1, '桃園市|大溪區||介壽路||||3||', '', 'atm', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '2017-10-22 20:28:06', 'order', '歐佳玗', '0928806748', '歐佳玗', '0928806748', 1, '桃園市|八德區|大昌里|介壽|二|364|61|25||', '', 'cash', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '2017-10-22 20:29:01', 'order', '歐佳玗', '0928806748', '張晏銘', '0988108844', 5, '桃園市|龜山區||明興||||179|2|197', '我送你的自己付錢', 'cod', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '2017-10-22 20:29:01', 'order', '歐佳玗', '0928806748', '陳映辰', '09999999999', 1, '桃園市|大溪區||介壽路||||3||', '', 'atm', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '2017-10-22 20:29:01', 'order', '歐佳玗', '0928806748', '歐佳玗', '0928806748', 1, '桃園市|八德區|大昌里|介壽|二|364|61|25||', '', 'cash', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '2017-10-22 20:31:44', 'order', '張晏銘', '0988108844', '歐佳玗', '0928806748', 5, '桃園市|八德區||介壽|二|364||25||', '', 'cod', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '2017-10-22 22:02:17', 'order', 'ohmo', '0988108844', 'ohmoooo', '3456789', 1, '嘉義縣|番路鄉||介壽||||33||', '', 'atm', '1', NULL, NULL, NULL, NULL, '12345', '822', NULL, NULL),
(88, '2017-10-22 22:02:17', 'order', 'ohmo', '0988108844', 'rrrrrr', '1234456', 1, '高雄市|新興區||fgh|r|||45||', 'tyuioo', 'cod', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, '2017-10-22 22:19:56', 'order', '朴寶劍', '0988520520', '朴寶劍', '0988520520', 3, '桃園市|八德區|大昌里|介壽|1|344|2|2|2|', '中午後收穫', 'cod', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '2017-10-22 22:24:01', 'order', '洪宗玄', '00', '洪宗玄', '00', 1, '屏東縣|南州鄉||錦州||||20||', '', 'atm', '1', NULL, NULL, NULL, NULL, '54632', '000', NULL, NULL),
(91, '2017-10-22 22:24:01', 'order', '洪宗玄', '00', '金宇彬', '99', 1, '新北市|萬里區||王王|2|||5||', '', 'atm', '1', NULL, NULL, NULL, NULL, '09876', '111', NULL, NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `pomelo_order`
--
ALTER TABLE `pomelo_order`
  ADD PRIMARY KEY (`order_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `pomelo_order`
--
ALTER TABLE `pomelo_order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;