-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Ian 2018 la 21:51
-- Versiune server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsly`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `News_Title` varchar(200) NOT NULL,
  `News_Body` text NOT NULL,
  `id_Category` int(11) NOT NULL,
  `id_Tag` int(11) NOT NULL,
  `Picture` varchar(200) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Add_Date` datetime NOT NULL,
  `Modify_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `news`
--

INSERT INTO `news` (`id`, `News_Title`, `News_Body`, `id_Category`, `id_Tag`, `Picture`, `Status`, `Add_Date`, `Modify_Date`) VALUES
(42, '', '', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(43, '?', '?', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(44, '?', '?', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(58, '', '<p>Add News Bodyasdasdas</p>\n', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(59, '', '<p>Add News Bodyasdasdas</p>\n', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(60, 'adsadas', '<p>asdasdas</p>\n', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(61, '', '<p>Add News Body</p>\n', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(62, '', '<p>Add News Body</p>\n', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(63, '', '<p>Add News Body</p>\n', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00'),
(64, '', '&lt;p&gt;&amp;lt;script&amp;gt;&lt;/p&gt;\n\n&lt;p&gt;alert(1);&lt;/p&gt;\n\n&lt;p&gt;&amp;lt;/script&amp;gt;&lt;/p&gt;\n', 1, 1, '', 0, '2018-01-24 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `news_category`
--

INSERT INTO `news_category` (`id`, `Name`) VALUES
(1, 'New');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `news_tags`
--

CREATE TABLE `news_tags` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `news_tags`
--

INSERT INTO `news_tags` (`id`, `Name`) VALUES
(1, 'New');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `news_votes`
--

CREATE TABLE `news_votes` (
  `id` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `IP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Category` (`id_Category`),
  ADD KEY `id_Tag` (`id_Tag`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_tags`
--
ALTER TABLE `news_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `news_votes`
--
ALTER TABLE `news_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_news` (`id_news`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_tags`
--
ALTER TABLE `news_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_votes`
--
ALTER TABLE `news_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_Tag`) REFERENCES `news_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`id_Category`) REFERENCES `news_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `news_votes`
--
ALTER TABLE `news_votes`
  ADD CONSTRAINT `news_votes_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
