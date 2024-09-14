-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 10:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workshop_myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `image`, `price`) VALUES
(3, 'CRYBABY × Powerpuff Girls Series Figures', 'Set 3 girls classic\r\nBlossom Bubbles Buttercup', 'uploads/1720422167_78fbada781a1b6b9399f.jpg', 755),
(4, 'CRYBABY × Powerpuff Girls Series Figures', 'Set 3 girls pajamas\r\nBlossom Bubbles Buttercup', 'uploads/1720423105_97eaddb906321207d446.jpg', 1150),
(5, 'CRYBABY × Powerpuff Girls Series Figures', 'Set 3 girls bunny\r\nBlossom Bubbles Buttercup', 'uploads/1720423206_08b70ef2415b2fc1d645.jpg', 1350),
(6, 'CRYBABY × Powerpuff Girls Series Figures', 'Set 3 men troublemakers\r\nTheProfessor TheMayor MoJoJoJo', 'uploads/1720423403_552dd98f42bb00cb8834.jpg', 600),
(7, 'CRYBABY × Powerpuff Girls Series Figures', 'random box', 'uploads/1720423467_677c1359cccecbe6829a.jpg', 380),
(8, 'CRYBABY × Powerpuff Girls Series Figures', 'Secret Princess character', 'uploads/1720423648_1bb09b702adc65347ab5.jpg', 1200),
(10, 'CRYBABY × Powerpuff Girls Series-Vinyl Face Plush Blind Box', 'Set 3 girls bunny\r\nBlossom Bubbles Buttercup', 'uploads/1720617923_ed291d4f43fd2938dd01.jpg', 1750),
(11, 'CRYBABY × Powerpuff Girls Series-Vinyl Face Plush Blind Box', 'Secret Princess character', 'uploads/1720617980_a09656458bd1a29afbef.jpg', 1900),
(12, 'CRYBABY × Powerpuff Girls Series-Vinyl Face Plush Blind Box 11111', 'random box', 'uploads/1720618125_5a0386266ca44cbcd5d3.jpg', 550),
(13, 'MOLLY × The Powerpuff Girls Series Action Figure', 'Blossom', 'uploads/1720629307_c76c08d5992621cfbbf3.jpg', 1200),
(14, 'MOLLY × The Powerpuff Girls Series Action Figure', 'Bubbles', 'uploads/1720629331_dcc7ee0d6a5714d3da81.jpg', 1200),
(15, 'MOLLY × The Powerpuff Girls Series Action Figure', 'Buttercup', 'uploads/1720629384_74b1866a74fdeff81ffe.jpg', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`, `name`, `email`, `phone_number`) VALUES
(1, 'admin', 'admin', 'admin', 'ผู้ดูแลระบบ', 'example@email.com', ''),
(2, 'user', 'user', '', 'ผู้ใช้งาน', 'user@1234', '0826869713'),
(3, 'MMMMM', 'mmmmm', '', 'MMMMM', 'mmm@gmail.com', '2566456'),
(4, 'kenny', 'kenny', 'user', 'kenny', 'kenny@gmail.com', '082965455'),
(6, 'pompom', 'pompom', '', 'pompom', 'pompom@gmailcom', '5692555482'),
(7, 'teacher', 'teacher', '', 'teacher', 'teacher@gmail.com', '05895685'),
(8, 'NNN', 'NNN', '', 'NNN', 'NNN@gamil.com', '097565255'),
(9, 'yuki', 'yuki', '', 'yuki rio', 'yuki123@gmail.com', '079258569'),
(10, 'mana888', 'mana888', '', 'mana888', 'mana888@gmail.com', '078262555'),
(11, 'KNZP', 'KNZP', '', 'KNZPSHOP', 'KNZPSHOP@gmail.com', '0985555687');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
