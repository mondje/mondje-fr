-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2021 at 05:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liberty_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `lw_administrators`
--

CREATE TABLE `lw_administrators` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lw_administrators`
--

INSERT INTO `lw_administrators` (`id`, `firstname`, `lastname`, `post_name`, `username`, `email`, `admin_pwd`, `date_registered`) VALUES
(1, 'Marion', 'Noguier', 'Comptable', '9838883838B', 'lazapap2018@gmail.com', 'B764nzuomYMGdrCzz5BgdJF6bHHt5j', '2022-01-14 16:47:01'),
(2, 'Marion', 'Noguier', 'Comptable', '9838883838B', 'lazapap2018@gmail.com', 'Rc2OPvwBOzgrZQed0xb2p18PLe809V', '2022-01-14 16:47:41'),
(3, '', '', '', '', '', 'ausLjUkoEDSb3eje1ArIVvWpirdHpZ', '2022-01-16 06:58:50'),
(4, '', '', '', '', '', 'zq5q7v2Mkrp8DZGEWHDu2zInbu9xqy', '2022-01-16 07:00:08'),
(5, '', '', '', '', '', 'Iwu3EwypiW56SyczHg44lzAiw5bYFm', '2022-01-16 07:03:07'),
(6, 'Marion', 'Noguier', 'Comptable', '@px_koffi', 'micro1', '8sXwWcARTsn2SAC6xIgLxgREC1Wvtn', '2022-01-16 07:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `lw_admin_privileges`
--

CREATE TABLE `lw_admin_privileges` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `list_of_privileges` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lw_admin_privileges`
--

INSERT INTO `lw_admin_privileges` (`id`, `admin_id`, `list_of_privileges`, `date_added`) VALUES
(1, 2, '2,3,4', '2022-01-14 16:47:41'),
(2, 3, '', '2022-01-16 06:58:50'),
(3, 4, '', '2022-01-16 07:00:08'),
(4, 5, '', '2022-01-16 07:03:07'),
(5, 6, '', '2022-01-16 07:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `lw_employees`
--

CREATE TABLE `lw_employees` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `service_id` int(11) NOT NULL,
  `postname` varchar(255) NOT NULL,
  `workhour` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `data_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lw_employees_attendances`
--

CREATE TABLE `lw_employees_attendances` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `service` varchar(30) DEFAULT NULL,
  `workhour` float DEFAULT NULL,
  `actual` float DEFAULT NULL,
  `late_time` bigint(20) DEFAULT NULL,
  `leave_time` bigint(20) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lw_privileges_list`
--

CREATE TABLE `lw_privileges_list` (
  `id` int(11) NOT NULL,
  `plg_name` varchar(100) NOT NULL,
  `text_to_display` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `data_status` int(11) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lw_privileges_list`
--

INSERT INTO `lw_privileges_list` (`id`, `plg_name`, `text_to_display`, `comments`, `data_status`, `date_added`) VALUES
(1, 'view_administrators', 'Visibilité des administrateurs', 'Pourra voir la liste de tout les autres administrateurs', 0, '2022-01-14 02:44:26'),
(2, 'add_administrators', 'Ajout d\'administrateurs', 'Pourra enregistrer d\\\'autres administrateurs', 0, '2022-01-14 02:44:26'),
(3, 'add_sportroom_subscribers', 'Créer abonnement salle de sport', 'Pourra Enregistrer des abonnements pour la salle de sport', 0, '2022-01-14 11:46:58'),
(4, 'provide_sportroom_tickets', 'Générer tickets salle de sport', 'Pourra Générer des tickets pour les abbonnées en salle de sport', 0, '2022-01-14 11:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `lw_products`
--

CREATE TABLE `lw_products` (
  `id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_desc` text DEFAULT NULL,
  `qty_in_stock` bigint(20) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `unit_price` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lw_products`
--

INSERT INTO `lw_products` (`id`, `product_title`, `product_desc`, `qty_in_stock`, `category`, `unit_price`, `brand`, `sku`, `product_status`, `date_added`, `last_update`) VALUES
(1, 'Cocacola', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum consequatur temporibus molestiae dolorem alias optio eum', 8000, 'Sucrérie', '500', 'Cocacola', 'ol1sfqN1', 1, '2022-01-18 11:29:40', '2022-01-18 11:29:40'),
(2, 'Pain', 'Des details unitils que je met ici sont vraiment unitils', 9000, NULL, '600', 'Pain d\'ors', '90xH2F0f', 1, '2022-01-18 13:46:19', '2022-01-18 13:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `lw_services`
--

CREATE TABLE `lw_services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lw_services`
--

INSERT INTO `lw_services` (`id`, `service_name`) VALUES
(1, 'Restaurant'),
(2, 'Boutique'),
(3, 'Hôtelerie '),
(4, 'Manège'),
(5, 'Piscine'),
(6, 'La navette'),
(7, 'Salle de sport');

-- --------------------------------------------------------

--
-- Table structure for table `lw_stocks`
--

CREATE TABLE `lw_stocks` (
  `id` int(11) NOT NULL,
  `stock_name` varchar(100) NOT NULL,
  `stock_status` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lw_subcat`
--

CREATE TABLE `lw_subcat` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `subcat_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lw_sub_stucks`
--

CREATE TABLE `lw_sub_stucks` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `sub_stock_name` varchar(100) DEFAULT NULL,
  `received_prod_id` int(11) DEFAULT NULL,
  `received_prod_qty` bigint(20) DEFAULT NULL,
  `date_received` datetime NOT NULL DEFAULT current_timestamp(),
  `sub_stock_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lw_sub_stucks`
--

INSERT INTO `lw_sub_stucks` (`id`, `service_id`, `sub_stock_name`, `received_prod_id`, `received_prod_qty`, `date_received`, `sub_stock_status`) VALUES
(1, 2, 'otxKMtBYfQ', 2, 9000, '2022-01-18 18:57:28', 'En cours'),
(2, 3, 't6QMDRGgEG', 1, 8000, '2022-01-18 18:58:09', 'En cours'),
(3, 3, 'eBgIeoESWd', 2, 9000, '2022-01-18 18:58:10', 'En cours'),
(4, 3, 'GhpXx7eUkf', 2, 9000, '2022-01-18 18:58:58', 'En cours'),
(5, 3, 'u80maD1yT5', 2, 9000, '2022-01-18 19:02:32', 'En cours'),
(6, 4, 'xc5NB2RI0c', 1, 8000, '2022-01-18 19:02:48', 'En cours'),
(7, 2, 'ZpkU6BwhGi', 1, 8000, '2022-01-18 19:12:37', 'En cours'),
(8, 3, 'EnTtatdq1Q', 2, 9000, '2022-01-18 19:13:28', 'En cours');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lw_administrators`
--
ALTER TABLE `lw_administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_admin_privileges`
--
ALTER TABLE `lw_admin_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_employees`
--
ALTER TABLE `lw_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_employees_attendances`
--
ALTER TABLE `lw_employees_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_privileges_list`
--
ALTER TABLE `lw_privileges_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_products`
--
ALTER TABLE `lw_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_services`
--
ALTER TABLE `lw_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_stocks`
--
ALTER TABLE `lw_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_subcat`
--
ALTER TABLE `lw_subcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lw_sub_stucks`
--
ALTER TABLE `lw_sub_stucks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lw_administrators`
--
ALTER TABLE `lw_administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lw_admin_privileges`
--
ALTER TABLE `lw_admin_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lw_employees`
--
ALTER TABLE `lw_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lw_employees_attendances`
--
ALTER TABLE `lw_employees_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lw_privileges_list`
--
ALTER TABLE `lw_privileges_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lw_products`
--
ALTER TABLE `lw_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lw_services`
--
ALTER TABLE `lw_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lw_stocks`
--
ALTER TABLE `lw_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lw_subcat`
--
ALTER TABLE `lw_subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lw_sub_stucks`
--
ALTER TABLE `lw_sub_stucks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
