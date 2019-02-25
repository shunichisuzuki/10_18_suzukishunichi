-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019 年 2 朁E25 日 16:23
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_f02_db18`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(92, '星と神話物語で親しむ星の世界', 'http://books.google.co.jp/books?id=6ZRmLwEACAAJ&dq=%E6%98%9F%E3%81%A8%E7%A5%9E%E8%A9%B1%E7%89%A9%E8%AA%9E%E3%81%A7%E8%A6%AA%E3%81%97%EF%BF%BD_%E6%98%9F%E3%81%AE%E4%B8%96%E7%95%8C&hl=&source=gbs_api', 'test1で登録。', '2019-02-26 00:14:39'),
(93, '星と神話物語で親しむ星の世界', 'http://books.google.co.jp/books?id=6ZRmLwEACAAJ&dq=%E6%98%9F%E3%81%A8%E7%A5%9E%E8%A9%B1%E7%89%A9%E8%AA%9E%E3%81%A7%E8%A6%AA%E3%81%97%EF%BF%BD_%E6%98%9F%E3%81%AE%E4%B8%96%E7%95%8C&hl=&source=gbs_api', 'aaa', '2019-02-24 00:59:15'),
(94, '星座の図鑑:星座の探し方と神話がわかる', 'http://books.google.co.jp/books?id=LSa0tAEACAAJ&dq=%E6%98%9F%E5%BA%A7%E3%81%AE%E5%9B%B3%E9%91%91:%E6%98%9F%E5%BA%A7%E3%81%AE%E6%8E%A2%E3%81%97%E6%96%B9%E3%81%A8%E7%A5%9E%E8%A9%B1%E3%81%8C%E3%82%8F%E3%81%8B%E3%82%8B&hl=&source=gbs_api', 'bbb', '2019-02-24 01:00:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table_test0`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table_test0` (
`id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table_test1`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table_test1` (
`id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table_test1`
--

INSERT INTO `gs_bm_table_test1` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(1, '星と神話物語で親しむ星の世界', 'http://books.google.co.jp/books?id=6ZRmLwEACAAJ&dq=%E6%98%9F%E3%81%A8%E7%A5%9E%E8%A9%B1%E7%89%A9%E8%AA%9E%E3%81%A7%E8%A6%AA%E3%81%97%EF%BF%BD_%E6%98%9F%E3%81%AE%E4%B8%96%E7%95%8C&hl=&source=gbs_api', 'test1で登録。', '2019-02-26 00:14:39');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table_test3`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table_test3` (
`id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table_test3`
--

INSERT INTO `gs_bm_table_test3` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(1, '星と神話物語で親しむ星の世界', 'http://books.google.co.jp/books?id=6ZRmLwEACAAJ&dq=%E6%98%9F%E3%81%A8%E7%A5%9E%E8%A9%B1%E7%89%A9%E8%AA%9E%E3%81%A7%E8%A6%AA%E3%81%97%EF%BF%BD_%E6%98%9F%E3%81%AE%E4%B8%96%E7%95%8C&hl=&source=gbs_api', 'aaa', '2019-02-24 00:59:15'),
(2, '星座の図鑑:星座の探し方と神話がわかる', 'http://books.google.co.jp/books?id=LSa0tAEACAAJ&dq=%E6%98%9F%E5%BA%A7%E3%81%AE%E5%9B%B3%E9%91%91:%E6%98%9F%E5%BA%A7%E3%81%AE%E6%8E%A2%E3%81%97%E6%96%B9%E3%81%A8%E7%A5%9E%E8%A9%B1%E3%81%8C%E3%82%8F%E3%81%8B%E3%82%8B&hl=&source=gbs_api', 'bbb', '2019-02-24 01:00:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `php02_table`
--

CREATE TABLE IF NOT EXISTS `php02_table` (
`id` int(12) NOT NULL,
  `task` varchar(128) NOT NULL,
  `deadline` date NOT NULL,
  `comment` text,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `indate`) VALUES
(2, 'Task名2', '2019-02-23', 'Task名2のコメント', '2019-02-09 14:51:38');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
`id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(6, 'test3', 'test3', 'test3', 1, 0),
(13, 'test0', 'test0', 'test0', 1, 0),
(14, 'test1', 'test1', 'test1', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_bm_table_test0`
--
ALTER TABLE `gs_bm_table_test0`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `gs_bm_table_test1`
--
ALTER TABLE `gs_bm_table_test1`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `gs_bm_table_test3`
--
ALTER TABLE `gs_bm_table_test3`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `gs_bm_table_test0`
--
ALTER TABLE `gs_bm_table_test0`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gs_bm_table_test1`
--
ALTER TABLE `gs_bm_table_test1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gs_bm_table_test3`
--
ALTER TABLE `gs_bm_table_test3`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
