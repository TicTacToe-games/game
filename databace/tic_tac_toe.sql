-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 юни 2020 в 18:39
-- Версия на сървъра: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tic_tac_toe`
--

-- --------------------------------------------------------

--
-- Структура на таблица `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `url` text NOT NULL,
  `password` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `account`
--

INSERT INTO `account` (`id`, `username`, `url`, `password`) VALUES
(1, 'pepi', 'https://cdn5.f-cdn.com/contestentries/896707/18139203/583aafb802a35_thumb900.jpg', '2e9ec317e197819358fbc43afca7d837'),
(2, 'reni', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', 'fcea920f7412b5da7be0cf42b8c93759'),
(3, 'tixa', 'https://cdn.shopify.com/s/files/1/0407/6641/files/DRB_Like_ICON_300x300_189d70f4-c493-4588-a8bf-43806f8ae988.png?17741282672985979773', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'rosko', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'gogi', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', '1180e4fcdc4755aa9bc4e2604127a952'),
(6, 'penka', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', '202cb962ac59075b964b07152d234b70'),
(7, 'chervenkov', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', '202cb962ac59075b964b07152d234b70'),
(8, 'koki41', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', 'eb5a790b34e06e2ce3346fa2ca5d6abb'),
(9, 'kozi', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', 'e2adfa74629ed57b2fef5aa8aa102613'),
(10, 'vancho55', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', 'e2adfa74629ed57b2fef5aa8aa102613'),
(11, 'zyri50', 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png', '55587a910882016321201e6ebbc9f595');

-- --------------------------------------------------------

--
-- Структура на таблица `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `user_information_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `user_information_id`) VALUES
(1, 856616712, 'pepito@abv.bg', 1),
(2, 888616813, 'naslada02@abv.bg', 2),
(3, 889612516, 'tixa03@abv.bg', 3),
(4, 888462891, 'roskoto41@abv.bg', 4),
(5, 888616813, 'georgidim30@gmail.com', 5),
(6, 888458542, 'pena@abv.bg', 6),
(7, 888412584, 'chervenkov@abv.bg', 7),
(8, 884652515, 'koklcho41@abv.bg', 8),
(9, 856522221, 'kozito@gmail.com', 9),
(10, 856514212, 'vancho@gmail.com', 10),
(11, 855452532, 'gyshev45@abv.bg', 11);

-- --------------------------------------------------------

--
-- Структура на таблица `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `win` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `result`
--

INSERT INTO `result` (`id`, `win`) VALUES
(1, 70),
(2, 24),
(3, 20),
(4, 6),
(5, 60),
(6, 11),
(7, 8),
(8, 2),
(9, 0),
(10, 11),
(11, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `users_game`
--

CREATE TABLE `users_game` (
  `id` int(11) NOT NULL,
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `wins_user1` int(11) NOT NULL,
  `wins_user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users_game`
--

INSERT INTO `users_game` (`id`, `user1`, `user2`, `date`, `wins_user1`, `wins_user2`) VALUES
(1, 3, 2, '2020-06-15 14:01:22', 0, 0),
(2, 3, 5, '2020-06-15 14:46:26', 0, 0);

-- --------------------------------------------------------

--
-- Структура на таблица `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `date_birth` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `user_information`
--

INSERT INTO `user_information` (`id`, `first_name`, `last_name`, `gender`, `date_birth`) VALUES
(1, 'Петър', 'Петрович', 'Мъж', 1942),
(2, 'Ирена', 'Димитрова', 'Жена', 2003),
(3, 'Тиха', 'Тошкова', 'Жена', 2003),
(4, 'Роско', 'Босков', 'Жена', 1923),
(5, 'Георги ', 'Димитров', 'Мъж', 2003),
(6, 'Пенка', 'Пенкова', 'Жена', 1915),
(7, 'Вълко', 'Червенков', 'Мъж', 1918),
(8, 'Коци', 'Кокълков', 'Мъж', 2000),
(9, 'Коци', 'Коцев', 'Мъж', 1950),
(10, 'Ванчо', 'Котев', 'Мъж', 1952),
(11, 'Цури', 'Гушев', 'Мъж', 1950);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_inf` (`user_information_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_game`
--
ALTER TABLE `users_game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user1` (`user1`),
  ADD KEY `fk_user2` (`user2`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_game`
--
ALTER TABLE `users_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `fk_user_inf` FOREIGN KEY (`user_information_id`) REFERENCES `user_information` (`id`);

--
-- Ограничения за таблица `users_game`
--
ALTER TABLE `users_game`
  ADD CONSTRAINT `fk_user1` FOREIGN KEY (`user1`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `fk_user2` FOREIGN KEY (`user2`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
