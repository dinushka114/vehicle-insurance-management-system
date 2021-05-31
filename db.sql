-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2021 at 02:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminId` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminId`, `password`) VALUES
(1, 'admin1', 'mynameisadmin');

-- --------------------------------------------------------

--
-- Table structure for table `Claim`
--

CREATE TABLE `Claim` (
  `claim_id` int(11) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `accident_location` text DEFAULT NULL,
  `gurage_location` text DEFAULT NULL,
  `contact` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `bank_acc` varchar(50) DEFAULT NULL,
  `accident_date` date NOT NULL,
  `claim_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(2) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `province_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `province_id`) VALUES
(1, 'Ampara', 2),
(2, 'Anuradhapura', 3),
(3, 'Badulla', 8),
(4, 'Batticaloa', 2),
(5, 'Colombo', 9),
(6, 'Galle', 7),
(7, 'Gampaha', 9),
(8, 'Hambantota', 7),
(9, 'Jaffna', 5),
(10, 'Kalutara', 9),
(11, 'Kandy', 1),
(12, 'Kegalle', 6),
(13, 'Kilinochchi', 5),
(14, 'Kurunegala', 4),
(15, 'Mannar', 5),
(16, 'Matale', 1),
(17, 'Matara', 7),
(18, 'Moneragala', 8),
(19, 'Mullaitivu', 5),
(20, 'Nuwara Eliya', 1),
(21, 'Polonnaruwa', 3),
(22, 'Puttalam', 4),
(23, 'Ratnapura', 6),
(24, 'Trincomalee', 2),
(25, 'Vavuniya', 5);

-- --------------------------------------------------------

--
-- Table structure for table `div_sec`
--

CREATE TABLE `div_sec` (
  `div_sec_id` int(3) NOT NULL,
  `div_sec_name` varchar(50) NOT NULL,
  `district_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `div_sec`
--

INSERT INTO `div_sec` (`div_sec_id`, `div_sec_name`, `district_id`) VALUES
(1, 'Addalachchenai', 1),
(2, 'Akkaraipattu', 1),
(3, 'Alayadiwembu', 1),
(4, 'Ampara', 1),
(5, 'Damana', 1),
(6, 'Dehiattakandiya', 1),
(7, 'Eragama', 1),
(8, 'Kalmunai Muslim', 1),
(9, 'Kalmunai Tamil', 1),
(10, 'Karaitivu', 1),
(11, 'Lahugala', 1),
(12, 'Mahaoya', 1),
(13, 'Navithanveli', 1),
(14, 'Ninthavur', 1),
(15, 'Padiyathalawa', 1),
(16, 'Pothuvil', 1),
(17, 'Sainthamarathu', 1),
(18, 'Samanthurai', 1),
(19, 'Thirukkovil', 1),
(20, 'Uhana', 1),
(21, 'Galnewa', 2),
(22, 'Galenbindunuwewa?', 2),
(23, 'Horowpothana', 2),
(24, 'Ipalogama', 2),
(25, 'Kahatagasdigiliya', 2),
(26, 'Kebithigollewa', 2),
(27, 'Kekirawa', 2),
(28, 'Mahavilachchiya', 2),
(29, 'Medawachchiya', 2),
(30, 'Mihinthale', 2),
(31, 'Nachchadoowa', 2),
(32, 'Nochchiyagama', 2),
(33, 'Nuwaragam Palatha Central', 2),
(34, 'Nuwaragam Palatha East', 2),
(35, 'Padaviya', 2),
(36, 'Palagala', 2),
(37, 'Palugaswewa', 2),
(38, 'Rajanganaya', 2),
(39, 'Rambewa', 2),
(40, 'Thalawa', 2),
(41, 'Thambuttegama', 2),
(42, 'Thirappane', 2),
(43, 'Badulla', 3),
(44, 'Bandarawela', 3),
(45, 'Ella', 3),
(46, 'Haldummulla', 3),
(47, 'Hali-Ela', 3),
(48, 'Haputale', 3),
(49, 'Kandaketiya', 3),
(50, 'Lunugala', 3),
(51, 'Mahiyanganaya', 3),
(52, 'Meegahakivula', 3),
(53, 'Passara', 3),
(54, 'Rideemaliyadda', 3),
(55, 'Soranathota', 3),
(56, 'Uva-Paranagama', 3),
(57, 'Welimada', 3),
(58, 'Eravur Pattu', 4),
(59, 'Eravur Town', 4),
(60, 'Kattankudy', 4),
(61, 'Koralai Pattu', 4),
(62, 'Koralai Pattu Central', 4),
(63, 'Koralai Pattu North', 4),
(64, 'Koralai Pattu South', 4),
(65, 'Koralai Pattu West', 4),
(66, 'Manmunai North', 4),
(67, 'Manmunai Pattu', 4),
(68, 'Manmunai S. and Eruvil Pattu', 4),
(69, 'Manmunai South West', 4),
(70, 'Manmunai West', 4),
(71, 'Porativu Pattu', 4),
(72, 'Colombo', 5),
(73, 'Dehiwala', 5),
(74, 'Homagama', 5),
(75, 'Kaduwela', 5),
(76, 'Kesbewa', 5),
(77, 'Kolonnawa', 5),
(78, 'Kotte', 5),
(79, 'Maharagama', 5),
(80, 'Moratuwa', 5),
(81, 'Padukka', 5),
(82, 'Ratmalana', 5),
(83, 'Seethawaka', 5),
(84, 'Thimbirigasyaya', 5),
(85, 'Akmeemana', 6),
(86, 'Ambalangoda', 6),
(87, 'Baddegama', 6),
(88, 'Balapitiya', 6),
(89, 'Benthota', 6),
(90, 'Bope-Poddala', 6),
(91, 'Elpitiya', 6),
(92, 'Galle', 6),
(93, 'Gonapinuwala', 6),
(94, 'Habaraduwa', 6),
(95, 'Hikkaduwa', 6),
(96, 'Imaduwa', 6),
(97, 'Karandeniya', 6),
(98, 'Nagoda', 6),
(99, 'Neluwa', 6),
(100, 'Niyagama', 6),
(101, 'Thawalama', 6),
(102, 'Welivitiya-Divithura', 6),
(103, 'Yakkalamulla', 6),
(104, 'Attanagalla', 7),
(105, 'Biyagama', 7),
(106, 'Divulapitiya', 7),
(107, 'Dompe', 7),
(108, 'Gampaha', 7),
(109, 'Ja-Ela', 7),
(110, 'Katana', 7),
(111, 'Kelaniya', 7),
(112, 'Mahara', 7),
(113, 'Minuwangoda', 7),
(114, 'Mirigama', 7),
(115, 'Negombo', 7),
(116, 'Wattala', 7),
(117, 'Ambalantota', 8),
(118, 'Angunakolapelessa', 8),
(119, 'Beliatta', 8),
(120, 'Hambantota', 8),
(121, 'Katuwana', 8),
(122, 'Lunugamvehera', 8),
(123, 'Okewela', 8),
(124, 'Sooriyawewa', 8),
(125, 'Tangalle', 8),
(126, 'Thissamaharama', 8),
(127, 'Walasmulla', 8),
(128, 'Weeraketiya', 8),
(129, 'Delft', 9),
(130, 'Island North', 9),
(131, 'Island South', 9),
(132, 'Jaffna', 9),
(133, 'Karainagar', 9),
(134, 'Nallur', 9),
(135, 'Thenmaradchi', 9),
(136, 'Vadamaradchi East', 9),
(137, 'Vadamaradchi North', 9),
(138, 'Vadamaradchi South-West', 9),
(139, 'Valikamam East', 9),
(140, 'Valikamam North', 9),
(141, 'Valikamam South', 9),
(142, 'Valikamam South-West', 9),
(143, 'Valikamam West', 9),
(144, 'Agalawatta', 10),
(145, 'Bandaragama', 10),
(146, 'Beruwala', 10),
(147, 'Bulathsinhala', 10),
(148, 'Dodangoda', 10),
(149, 'Horana', 10),
(150, 'Ingiriya', 10),
(151, 'Kalutara', 10),
(152, 'Madurawela', 10),
(153, 'Mathugama', 10),
(154, 'Millaniya', 10),
(155, 'Palindanuwara', 10),
(156, 'Panadura', 10),
(157, 'Walallavita', 10),
(158, 'Akurana', 11),
(159, 'Delthota', 11),
(160, 'Doluwa', 11),
(161, 'Ganga Ihala Korale', 11),
(162, 'Harispattuwa', 11),
(163, 'Hatharaliyadda', 11),
(164, 'Kandy', 11),
(165, 'Kundasale', 11),
(166, 'Medadumbara', 11),
(167, 'Minipe', 11),
(168, 'Panvila', 11),
(169, 'Pasbage Korale', 11),
(170, 'Pathadumbara', 11),
(171, 'Pathahewaheta', 11),
(172, 'Poojapitiya', 11),
(173, 'Thumpane', 11),
(174, 'Udadumbara', 11),
(175, 'Udapalatha', 11),
(176, 'Udunuwara', 11),
(177, 'Yatinuwara', 11),
(178, 'Aranayaka', 12),
(179, 'Bulathkohupitiya', 12),
(180, 'Dehiovita', 12),
(181, 'Deraniyagala', 12),
(182, 'Galigamuwa', 12),
(183, 'Kegalle', 12),
(184, 'Mawanella', 12),
(185, 'Rambukkana', 12),
(186, 'Ruwanwella', 12),
(187, 'Warakapola', 12),
(188, 'Yatiyanthota', 12),
(189, 'Kandavalai', 13),
(190, 'Karachchi', 13),
(191, 'Pachchilaipalli', 13),
(192, 'Poonakary', 13),
(193, 'Alawwa', 14),
(194, 'Ambanpola', 14),
(195, 'Bamunakotuwa', 14),
(196, 'Bingiriya', 14),
(197, 'Ehetuwewa', 14),
(198, 'Galgamuwa', 14),
(199, 'Ganewatta', 14),
(200, 'Giribawa', 14),
(201, 'Ibbagamuwa', 14),
(202, 'Katupotha', 14),
(203, 'Kobeigane', 14),
(204, 'Kotavehera', 14),
(205, 'Kuliyapitiya East', 14),
(206, 'Kuliyapitiya West', 14),
(207, 'Kurunegala', 14),
(208, 'Mahawa', 14),
(209, 'Mallawapitiya', 14),
(210, 'Maspotha', 14),
(211, 'Mawathagama', 14),
(212, 'Narammala', 14),
(213, 'Nikaweratiya', 14),
(214, 'Panduwasnuwara', 14),
(215, 'Pannala', 14),
(216, 'Polgahawela', 14),
(217, 'Polpithigama', 14),
(218, 'Rasnayakapura', 14),
(219, 'Rideegama', 14),
(220, 'Udubaddawa', 14),
(221, 'Wariyapola', 14),
(222, 'Weerambugedara', 14),
(223, 'Madhu', 15),
(224, 'Mannar', 15),
(225, 'Manthai West', 15),
(226, 'Musalai', 15),
(227, 'Nanaddan', 15),
(228, 'Ambanganga Korale', 16),
(229, 'Dambulla', 16),
(230, 'Galewela', 16),
(231, 'Laggala-Pallegama', 16),
(232, 'Matale', 16),
(233, 'Naula', 16),
(234, 'Pallepola', 16),
(235, 'Rattota', 16),
(236, 'Ukuwela', 16),
(237, 'Wilgamuwa', 16),
(238, 'Yatawatta', 16),
(239, 'Akuressa', 17),
(240, 'Athuraliya', 17),
(241, 'Devinuwara', 17),
(242, 'Dickwella', 17),
(243, 'Hakmana', 17),
(244, 'Kamburupitiya', 17),
(245, 'Kirinda Puhulwella', 17),
(246, 'Kotapola', 17),
(247, 'Malimbada', 17),
(248, 'Matara', 17),
(249, 'Mulatiyana', 17),
(250, 'Pasgoda', 17),
(251, 'Pitabeddara', 17),
(252, 'Thihagoda', 17),
(253, 'Weligama', 17),
(254, 'Welipitiya', 17),
(255, 'Badalkumbura', 18),
(256, 'Bibile', 18),
(257, 'Buttala', 18),
(258, 'Katharagama', 18),
(259, 'Madulla', 18),
(260, 'Medagama', 18),
(261, 'Moneragala', 18),
(262, 'Sevanagala', 18),
(263, 'Siyambalanduwa', 18),
(264, 'Thanamalvila', 18),
(265, 'Wellawaya', 18),
(266, 'Manthai East', 19),
(267, 'Maritimepattu', 19),
(268, 'Oddusuddan', 19),
(269, 'Puthukudiyiruppu', 19),
(270, 'Thunukkai', 19),
(271, 'Welioya', 19),
(272, 'Ambagamuwa', 20),
(273, 'Hanguranketha', 20),
(274, 'Kothmale', 20),
(275, 'Nuwara Eliya', 20),
(276, 'Walapane', 20),
(277, 'Dimbulagala', 21),
(278, 'Elahera', 21),
(279, 'Hingurakgoda', 21),
(280, 'Lankapura', 21),
(281, 'Medirigiriya', 21),
(282, 'Thamankaduwa', 21),
(283, 'Welikanda', 21),
(284, 'Anamaduwa', 22),
(285, 'Arachchikattuwa', 22),
(286, 'Chilaw', 22),
(287, 'Dankotuwa', 22),
(288, 'Kalpitiya', 22),
(289, 'Karuwalagaswewa', 22),
(290, 'Madampe', 22),
(291, 'Mahakumbukkadawala', 22),
(292, 'Mahawewa', 22),
(293, 'Mundalama', 22),
(294, 'Nattandiya', 22),
(295, 'Nawagattegama', 22),
(296, 'Pallama', 22),
(297, 'Puttalam', 22),
(298, 'Vanathavilluwa', 22),
(299, 'Wennappuwa', 22),
(300, 'Ayagama', 23),
(301, 'Balangoda', 23),
(302, 'Eheliyagoda', 23),
(303, 'Elapattha', 23),
(304, 'Embilipitiya', 23),
(305, 'Godakawela', 23),
(306, 'Imbulpe', 23),
(307, 'Kahawatta', 23),
(308, 'Kalawana', 23),
(309, 'Kiriella', 23),
(310, 'Kolonna', 23),
(311, 'Kuruvita', 23),
(312, 'Nivithigala', 23),
(313, 'Opanayaka', 23),
(314, 'Pelmadulla', 23),
(315, 'Ratnapura', 23),
(316, 'Weligepola', 23),
(317, 'Gomarankadawala', 24),
(318, 'Kantalai', 24),
(319, 'Kinniya', 24),
(320, 'Kuchchaveli', 24),
(321, 'Morawewa', 24),
(322, 'Muttur', 24),
(323, 'Padavi Sri Pura', 24),
(324, 'Seruvila', 24),
(325, 'Thambalagamuwa', 24),
(326, 'Trincomalee', 24),
(327, 'Verugal', 24),
(328, 'Vavuniya', 25),
(329, 'Vavuniya North', 25),
(330, 'Vavuniya South', 25),
(331, 'Vengalacheddikulam', 25);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `payment_id` int(11) NOT NULL,
  `payment` float NOT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_id` int(11) NOT NULL,
  `policy_type` varchar(20) NOT NULL,
  `validity` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policy_id`, `policy_type`, `validity`, `price`) VALUES
(1, 'BASIC', 1, 1200),
(2, 'PREMIUM', 1, 9500);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Central'),
(2, 'Eastern'),
(3, 'North Central'),
(4, 'North Western'),
(5, 'Northern'),
(6, 'Sabaragamuwa'),
(7, 'Southern'),
(8, 'Uva'),
(9, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `title` varchar(6) NOT NULL,
  `nameWithInitials` varchar(100) NOT NULL,
  `fullName` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `img` varchar(255) DEFAULT 'path',
  `address` text NOT NULL,
  `province` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `insurance_type` varchar(20) NOT NULL,
  `market_value` float NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `fuel_type` varchar(15) NOT NULL,
  `year` varchar(4) NOT NULL,
  `register_number` varchar(50) NOT NULL,
  `chassis_number` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `customer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Claim`
--
ALTER TABLE `Claim`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `policy_id` (`policy_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `div_sec`
--
ALTER TABLE `div_sec`
  ADD PRIMARY KEY (`div_sec_id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Claim`
--
ALTER TABLE `Claim`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `div_sec`
--
ALTER TABLE `div_sec`
  MODIFY `div_sec_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Claim`
--
ALTER TABLE `Claim`
  ADD CONSTRAINT `Claim_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `Claim_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`),
  ADD CONSTRAINT `Claim_ibfk_3` FOREIGN KEY (`policy_id`) REFERENCES `policy` (`policy_id`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
