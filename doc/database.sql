-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2017 at 08:52 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aastategija`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(10) UNSIGNED NOT NULL COMMENT 'Autocreated',
  `answer_text` varchar(191) NOT NULL COMMENT 'Autocreated',
  `answer_correct` tinyint(4) NOT NULL DEFAULT '0',
  `question_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer_text`, `answer_correct`, `question_id`) VALUES
(1, 'HyperText Markup Language', 1, 6),
(2, 'Hyperlinks and Text Markup Language', 0, 6),
(3, 'Home Tool Markup Language', 0, 6),
(4, '<h1>', 1, 7),
(5, '<h6>', 0, 7),
(6, '<head>', 0, 7),
(7, '<br>', 1, 8),
(8, '<lb>', 0, 8),
(9, '<break>', 0, 8),
(10, '<li>', 1, 9),
(11, '<le>', 0, 9),
(12, '<element>', 0, 9),
(13, 'Cascading Style Sheets', 1, 10),
(14, 'Computer Style Sheets', 0, 10),
(15, 'Creative Style Sheets', 0, 10),
(16, '<em>', 1, 11),
(17, '<it>', 0, 11),
(18, '<italic>', 0, 11),
(19, '<strong>', 1, 12),
(20, '<thick>', 0, 12),
(21, '<fat>', 0, 12),
(22, '<!--', 1, 13),
(23, '/*', 0, 13),
(24, '//', 0, 13),
(25, '<title>', 1, 14),
(26, '<heading>', 0, 14),
(27, '<headline>', 0, 14),
(28, '<a href="google.com">', 1, 15),
(29, '<link="google.com">', 0, 15),
(30, '<url="google.com">', 0, 15),
(31, '<!DOCTYPE html>', 1, 16),
(32, '<html document>', 0, 16),
(33, '<DOCTYPE html>', 0, 16),
(34, '<img src="">', 1, 17),
(35, '<picture href="">', 0, 17),
(36, '<image url="">', 0, 17),
(37, '<video src="">', 1, 18),
(38, '<movie url="">', 0, 18),
(39, '<film href="">', 0, 18),
(40, '<audio src="">', 1, 19),
(41, '<media href="">', 0, 19),
(42, '<sound url="">', 0, 19),
(43, '<html lang="et">', 1, 20),
(44, '<doc lang="et">', 0, 20),
(45, '<language="et">', 0, 20),
(46, '<p style="font-size:10px">', 1, 21),
(47, '<p type="font-size:10px">', 0, 21),
(48, '<p style=font-size:10px>', 0, 21),
(49, 'font-family: Verdana', 1, 22),
(50, 'font-size: Verdana', 0, 22),
(51, 'font: Verdana', 0, 22),
(52, 'background-color: red', 1, 23),
(53, 'background color: red', 0, 23),
(54, 'background: red', 0, 23),
(55, '<p align="right">', 1, 24),
(56, '<p margin="right">', 0, 24),
(57, '<p move="right">', 0, 24),
(58, 'Et dokumenti loogiliselt jaotada', 1, 25),
(59, 'Et tabelite vahele vahesid jätta', 0, 25),
(60, 'Paragrahvide asendamiseks', 0, 25),
(61, 'textarea tag', 1, 26),
(62, 'text tag', 0, 26),
(63, 'textml tag', 0, 26),
(64, 'rowspan', 1, 27),
(65, 'rn', 0, 27),
(66, 'rownumb', 0, 27),
(67, '<ol>', 1, 28),
(68, '<ul>', 0, 28),
(69, '<ordlist>', 0, 28),
(70, '<ul>', 1, 29),
(71, '<ol>', 0, 29),
(72, '<unlist>', 0, 29),
(73, 'src', 1, 30),
(74, 'url', 0, 30),
(75, 'href', 0, 30),
(76, 'face', 1, 31),
(77, 'font', 0, 31),
(78, 'fontname', 0, 31),
(79, 'head tag-is', 1, 32),
(80, 'body tag-is', 0, 32),
(81, 'ükskõik kummas', 0, 32),
(82, '2', 1, 33),
(83, '3', 0, 33),
(84, '1', 0, 33),
(85, '_blank', 1, 34),
(86, '_newtab', 0, 34),
(87, 'blank', 0, 34),
(88, '<h7>', 1, 35),
(89, '<h4>', 0, 35),
(90, '<h2>', 0, 35);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `question` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`) VALUES
(6, 'Mida tähendab HTML?'),
(7, 'Milline on suurima pealkirja HTML element?'),
(8, 'Millise HTML elemendiga saab sooritada reavahet?'),
(9, 'Kuidas tähistatakse listi elementi?'),
(10, 'Mida tähendab CSS?'),
(11, 'Kuidas rõhutada teksti(itaaliapärane)?'),
(12, 'Kuidas muuta tekst paksuks?'),
(13, 'Milliste märkidega alustatakse HTMLis kommentaari?'),
(14, 'Millise HTMLi märgendiga määratakse lehekülje pealkiri?'),
(15, 'Millist HTMLi märgendit kasutatakse klõpsatava veebilingi jaoks?'),
(16, 'Kuidas alustatakse HTMLi dokumenti?'),
(17, 'Kuidas sisestatakse pilti?'),
(18, 'Kuidas sisestatakse videot?'),
(19, 'Kuidas sisestatakse heliklippi?'),
(20, 'Kuidas määrata HTML dokumendi keel?'),
(21, 'Kuidas muuta HTML dokumendis paragrahvi stiili?'),
(22, 'Kuidas määrata font-iks Verdana?'),
(23, 'Kuidas määrata taustavärvi?'),
(24, 'Kuidas joondada paragrahvi paremale?'),
(25, 'Mille jaoks kasutatakse <div> märgendeid?'),
(26, 'Millist järgmistest märgenditest kasutatakse mitmerealise tekstisisestuse haldamiseks?'),
(27, 'Millist atribuuti kasutatakse ridade arvu tähistamiseks?'),
(28, 'Kuidas teha järjestatud listi?'),
(29, 'Kuidas teha järjestamata listi?'),
(30, 'Milline on <img> märgendi atribuut?'),
(31, 'Millist järgnevatest atribuutidest kasutatakse fonti nime täpsustamiseks?'),
(32, 'Kus määratakse HTMLi koodis lehekülje pealkiri?'),
(33, 'Mitu märgendit on tavalises elemendis?'),
(34, 'Millist atribuuti kasutatakse, et klikitav link avaneks uues aknas?'),
(35, 'Milline järgmistest HTMLi märgenditest pole kehtiv?');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(10) UNSIGNED NOT NULL COMMENT 'Autocreated',
  `result_name` varchar(50) NOT NULL COMMENT 'Autocreated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `result_name`) VALUES
(1, 'result #1'),
(2, 'result #2');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` char(1) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `nr_of_questions` tinyint(4) NOT NULL,
  `development_mode` tinyint(4) NOT NULL,
  `imagecomparison` tinyint(4) NOT NULL,
  `htmlvalidator` tinyint(4) NOT NULL,
  `livehtml` tinyint(4) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `pwd`, `nr_of_questions`, `development_mode`, `imagecomparison`, `htmlvalidator`, `livehtml`, `start`, `end`) VALUES
('1', '$2y$10$jFC8Sx4pEHQbBglfwAihAuhDtfIyQEnzol0beSg75ca//xSV.WzTC', 10, 1, 1, 1, 0, '2017-02-28 15:32:48', '2017-03-28 15:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(10) UNSIGNED NOT NULL COMMENT 'Autocreated',
  `test_name` varchar(50) NOT NULL COMMENT 'Autocreated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_name`) VALUES
(1, 'test #1'),
(2, 'test #2');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `translation_id` int(10) UNSIGNED NOT NULL,
  `phrase` varchar(191) NOT NULL,
  `language` char(3) NOT NULL,
  `translation` varchar(191) DEFAULT NULL,
  `controller` varchar(15) NOT NULL,
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`translation_id`, `phrase`, `language`, `translation`, `controller`, `action`) VALUES
(1, 'Action', 'ee', '{untranslated}', 'global', 'global');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `password` varchar(191) NOT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `social_id` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `is_admin`, `password`, `deleted`, `firstname`, `lastname`, `social_id`) VALUES
(1, NULL, 0, '', 0, 'fasdf', 'asdfasdf', '234234234234'),
(2, NULL, 0, '', 0, 'test', 'test', '324234234234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`translation_id`),
  ADD UNIQUE KEY `language_phrase_controller_action_index` (`language`,`phrase`,`controller`,`action`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_social_id_uindex` (`social_id`),
  ADD UNIQUE KEY `UNIQUE` (`user_name`),
  ADD UNIQUE KEY `users_user_name_social_id_uindex` (`user_name`,`social_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Autocreated', AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Autocreated', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Autocreated', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `translation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;