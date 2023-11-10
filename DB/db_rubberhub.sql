-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 08:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rubberhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(20) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(3, 'meenakshy', 'meenu5@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(30) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL DEFAULT 'Not Yet Replyed',
  `complaint_status` varchar(50) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_date`, `complaint_reply`, `complaint_status`, `user_id`) VALUES
(2, 'Too Slow', 'Site Is Too Slow', '2023-11-04', 'jgfvgjvhk', '1', 3),
(3, 'New', 'uytctyubin', '2023-11-04', 'fcxyubijknm', '1', 3),
(4, 'kjhgv', 'gfnbm,', '2023-11-10', 'kljhgfdczx', '1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(10) NOT NULL,
  `district_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Ernakulam'),
(2, 'Idukki'),
(3, 'Thrissur'),
(4, 'Kozhikode'),
(5, 'Kollam'),
(6, 'Alappuzha'),
(8, 'Kasaragod'),
(9, 'Kannur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_image` varchar(300) NOT NULL,
  `worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_image`, `worker_id`) VALUES
(4, '60270.jpg', 4),
(5, '60270.jpg', 4),
(6, '60270.jpg', 4),
(7, '60270.jpg', 4),
(8, 'download.jpg', 20),
(10, 'download.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_market`
--

CREATE TABLE `tbl_market` (
  `market_id` int(11) NOT NULL,
  `market_name` varchar(20) NOT NULL,
  `market_contact` varchar(20) NOT NULL,
  `market_image` varchar(100) NOT NULL,
  `market_proof` varchar(100) NOT NULL,
  `market_address` varchar(40) NOT NULL,
  `market_password` varchar(20) NOT NULL,
  `place_id` int(11) NOT NULL,
  `market_status` int(11) NOT NULL,
  `market_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_market`
--

INSERT INTO `tbl_market` (`market_id`, `market_name`, `market_contact`, `market_image`, `market_proof`, `market_address`, `market_password`, `place_id`, `market_status`, `market_email`) VALUES
(5, 'Qwerett', '8987654321', 'Screenshot (1).png', 'Screenshot (1).png', 'rgrgr', '', 7, 2, '3dsdd@dfdf'),
(6, 'Raju vr', '8523694127', 'worker im 2.jpg', 'worker im.jpeg', 'wtyiidghvbkj', '', 21, 2, 'haripm09@gmail.com'),
(7, 'Rubber Dealer', '9562314856', 'Screenshot (2).png', 'Screenshot (2).png', 'cjgilj;', '', 31, 1, 'rubberdealer@gmail.com'),
(8, 'Rubber Market', '8564123598', 'market img 1.webp', 'proof1.jpg', 'Rubber Market, Munnar\r\n town', '123456987', 14, 1, 'rubbermarket@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(10) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(7, 'Kothamangalam', 1),
(8, 'Aluva', 1),
(9, 'Perumbavoor', 1),
(10, 'Kochi', 1),
(11, 'Kalady', 1),
(12, 'Kalamassery', 1),
(14, 'Munnar', 2),
(15, 'Eravikulam', 2),
(16, 'Adimali', 2),
(17, 'Rajakkad', 2),
(18, 'Thodupuzha', 2),
(19, 'Chalakudy', 3),
(20, 'Chavakkad', 3),
(21, 'Irinjalakuda', 3),
(22, 'Cheruthuruthi', 3),
(23, 'Kappad', 4),
(24, 'Vatakara', 4),
(25, 'Kuttiady', 4),
(26, 'Mukkam', 4),
(27, 'Koduvally', 4),
(28, 'Paravoor', 5),
(29, 'Ochira', 5),
(30, 'Chathannoor', 5),
(31, 'Kottarakkara', 5),
(32, 'Thenmala', 0),
(33, 'Ambalappuzha', 6),
(34, 'Haripad', 6),
(35, 'Kuttanad', 6),
(36, 'Kayamkulam', 6),
(37, 'Bayaru', 8),
(38, 'Kollyuru', 0),
(39, 'padre', 0),
(40, 'Nileswaram', 0),
(41, '', 0),
(42, 'Nileswaram', 0),
(43, 'Kallar', 0),
(44, 'Karindolam', 0),
(45, 'Payyanur', 9),
(46, 'Iritty', 9),
(47, 'Thalassery', 0),
(48, 'Taliparamba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productsale`
--

CREATE TABLE `tbl_productsale` (
  `sale_id` int(11) NOT NULL,
  `sale_date` int(20) NOT NULL,
  `sale_details` varchar(50) NOT NULL,
  `sale_qty` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `sale_status` int(11) NOT NULL,
  `sale_replay` varchar(50) NOT NULL DEFAULT 'Not Replied',
  `sale_amount` varchar(60) NOT NULL DEFAULT 'Not Fixed',
  `sale_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_productsale`
--

INSERT INTO `tbl_productsale` (`sale_id`, `sale_date`, `sale_details`, `sale_qty`, `user_id`, `market_id`, `sale_status`, `sale_replay`, `sale_amount`, `sale_type`) VALUES
(1, 2023, 'asjfbhjkasbf', 'requst_qty', 4, 1, 3, 'BHKBKHBJKJB', '576567', ''),
(2, 2023, 'aBDHKJSAB', '576467', 4, 1, 2, '', '', ''),
(3, 2023, 'dfeigfovhejthyt', '23', 4, 1, 1, 'Not Replied', 'Not Fixed', ''),
(4, 2023, 'lkmklkm', '120', 4, 1, 3, 'mkm', '11111', ''),
(5, 2023, 'lklmklm', '120', 4, 1, 3, 'kfjdkl\r\n', '120', ''),
(6, 2023, 'wethml.m.nk.b', '3', 3, 1, 0, 'Not Replied', 'Not Fixed', ''),
(7, 2023, 'rubber sheet', '4', 4, 5, 0, 'Not Replied', 'Not Fixed', ''),
(9, 20231110, 'gh hbbh', '10', 8, 8, 3, 'hfcxfhg', '500', 'Waste Material');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate`
--

CREATE TABLE `tbl_rate` (
  `rate_id` int(11) NOT NULL,
  `rate_date` varchar(20) NOT NULL,
  `rate_amount` varchar(20) NOT NULL,
  `rate_low` varchar(100) NOT NULL,
  `rate_high` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rate`
--

INSERT INTO `tbl_rate` (`rate_id`, `rate_date`, `rate_amount`, `rate_low`, `rate_high`) VALUES
(1, '2023-11-04', '77', '55', '66'),
(2, '2023-11-07', '2500', '20', '80'),
(3, '2023-11-10', '1500', '1000', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requst`
--

CREATE TABLE `tbl_requst` (
  `requst_id` int(11) NOT NULL,
  `requst_date` varchar(20) NOT NULL,
  `requst_details` varchar(40) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requst_status` int(11) NOT NULL,
  `requst_amount` varchar(30) NOT NULL DEFAULT 'Not Fixed',
  `requst_replay` varchar(100) NOT NULL DEFAULT 'Not Replied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_requst`
--

INSERT INTO `tbl_requst` (`requst_id`, `requst_date`, `requst_details`, `worker_id`, `user_id`, `requst_status`, `requst_amount`, `requst_replay`) VALUES
(1, '2023-11-25', 'slkzfhado', 4, 4, 3, '42364', 'jhgfsd'),
(2, '2023-11-21', 'jytryguhjfk', 11, 3, 6, 'Not Fixed', 'Not Replied'),
(3, '2023-11-07', 'rubbersmokehouse', 12, 4, 0, 'Not Fixed', 'Not Replied');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `worker_id`, `user_review`, `user_rating`, `user_name`) VALUES
(0, '2023-11-04 16:01:41', 11, 'jhbhbjnk', '4', 'Suraj'),
(0, '2023-11-04 16:14:02', 11, 'KUHN ', '4', 'Suraj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_address` varchar(40) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `user_photo`, `user_proof`, `user_password`, `place_id`, `user_status`) VALUES
(3, 'Meenakshy sajan', '9947513682', 'meenakshy02@gmail.com', 'kollikattil(H) puthupady p.o  chirappady', 'user 1.jpg', 'user 1.jpg', 'meenu02', 7, 1),
(4, 'Lakshmi vinod', '8921783681', 'lakshmivinodpv@gmail.com', 'puthanpura(H) pindimana p.o allinchuvadu', 'user 2.jpg', 'user 2.jpg', '123', 18, 1),
(5, 'Sahala v.s', '8562331456', 'sahala@gmail.com', 'valiyaparabil (H) puthupady p.o mulavoor', 'user 1.jpg', 'user 1.jpg', 'sahalaaaaa', 31, 0),
(6, 'sachin sajan', '95326114685585', 'sachin@gmail.com', 'kollikattil(H) puthupady p.o chirapady\r\n', 'user 1.jpg', 'user 1.jpg', 'sachin', 21, 0),
(7, 'Manu krishna', '9651482164', 'manu02@gmail.com', 'fdfjhiohgv', 'Screenshot (1).png', 'Screenshot (1).png', '', 26, 2),
(8, 'Meenakshy Sajan', '9956412357', 'meenu05@gmail.com', 'Kollikattil (H) puthupady p.o chirapady', 'user 1.jpg', 'user proof.jpeg', '123456789', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_worker`
--

CREATE TABLE `tbl_worker` (
  `worker_id` int(10) NOT NULL,
  `worker_name` varchar(10) NOT NULL,
  `worker_contact` varchar(10) NOT NULL,
  `worker_email` varchar(20) NOT NULL,
  `worker_address` varchar(40) NOT NULL,
  `place_id` int(10) NOT NULL,
  `worker_password` varchar(10) NOT NULL,
  `worker_photo` varchar(100) NOT NULL,
  `worker_proof` varchar(50) NOT NULL,
  `worker_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_worker`
--

INSERT INTO `tbl_worker` (`worker_id`, `worker_name`, `worker_contact`, `worker_email`, `worker_address`, `place_id`, `worker_password`, `worker_photo`, `worker_proof`, `worker_status`) VALUES
(11, 'Rubber sto', '8541236956', 'rubberstores@gmail.c', 'Alappuzha, Haripad', 34, '123', 'market 3.webp', 'market 3.webp', 1),
(12, 'Raju vr', '9562321565', 'raju34@gmail.com', 'pullikunnil(H) kothamangalam', 7, 'Raju123456', 'worker im.jpeg', 'worker im.jpeg', 1),
(13, 'Hari pm', '8256123416', 'haripm09@gmail.com', 'mealeadathu(H)\r\nrajakkad\r\n', 17, 'Haripm8529', 'worker im 2.jpg', 'worker im 2.jpg', 0),
(14, 'Kummar', '6996461649', 'kummar12@gmail.com', 'valiyaparabil(H),rajakkad,idukki', 17, 'Kummar7894', 'worker im.jpeg', 'worker im.jpeg', 1),
(15, 'JEnin JOy', '8921277965', 'jeninjoy@gmail.com', 'Jenin Sweet Home', 11, 'Jeninthegr', 'Screenshot (1).png', 'Screenshot (2).png', 2),
(16, 'Joel Rubbe', '9564412368', 'joelrubbers090@gmail', 'Joel Rubbers, kalady,kerala', 11, 'Joelrubber', 'market img 2.jpg', 'proof.jpg', 2),
(17, 'Arjun sure', '8606687521', 'arjunsuresh410@gmail', 'Marambilikudy(H) munnipara,aruvapara p.o', 20, 'Arunsura12', 'worker img.jpeg', 'worker img.jpeg', 0),
(18, 'Athul cv', '9745735020', 'athulcv460@gmail.com', 'meleadathuveed(H) paravoor, p.o', 28, 'Athul&^%&9', 'worker2.jpg', 'worker img.jpeg', 0),
(20, 'Suraj', '9876543210', 'suraj@gmail.com', 'fdfb', 14, 'Qwerty@123', 'download.jpg', 'download.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_market`
--
ALTER TABLE `tbl_market`
  ADD PRIMARY KEY (`market_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_productsale`
--
ALTER TABLE `tbl_productsale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `tbl_requst`
--
ALTER TABLE `tbl_requst`
  ADD PRIMARY KEY (`requst_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_worker`
--
ALTER TABLE `tbl_worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_market`
--
ALTER TABLE `tbl_market`
  MODIFY `market_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_productsale`
--
ALTER TABLE `tbl_productsale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_requst`
--
ALTER TABLE `tbl_requst`
  MODIFY `requst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_worker`
--
ALTER TABLE `tbl_worker`
  MODIFY `worker_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
