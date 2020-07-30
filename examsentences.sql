-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 06:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codetyping`
--

-- --------------------------------------------------------

--
-- Table structure for table `examsentences`
--

CREATE TABLE `examsentences` (
  `id` int(11) NOT NULL,
  `language` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `sentence` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examsentences`
--

INSERT INTO `examsentences` (`id`, `language`, `title`, `sentence`) VALUES
(1, 'HTML・CSS', '画像を表示', '<img src=\"./img/sample.png\">'),
(2, 'HTML・CSS', 'リストを作成', '<ul><li>List1</li><li>List2</li><li>List3</li>'),
(3, 'HTML・CSS', 'バウンドアニメーション', '<img src=\"img/sample2.png\" class=\"move\"><style>.move{width:250px;animation:key1.4s ease infinite alternate;}@keyframes key1{0%{transform:translateY(0px);}100%{transform:translateY(-60px);}}</style>'),
(4, 'HTML・CSS', '文字に色を付ける', '<p class=\"color\">make it green</p><style>.color{color:green;}</style>'),
(5, 'HTML・CSS', '三角形をつくる', '<div class=\"sankaku\"></div><style>.sankaku{width:0px; border-top:50px solid red; border-right:50px solid transparent; border-bottom:50px solid transparent; border-left:50px solid transparent;}</style>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examsentences`
--
ALTER TABLE `examsentences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examsentences`
--
ALTER TABLE `examsentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
