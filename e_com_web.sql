-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2025 at 08:03 PM
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
-- Database: `e_com_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_image` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_image`, `admin_password`) VALUES
(1, 'nikit', 'nikitsapkota29@gmail.com', 'nikiy.JPG', '$2y$10$DD5k/yCxP.C.DVukvlycvOFRwiKJCPGvWjQTEq/ufjx3GXaeK8.9O');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Living Room'),
(2, 'Bedroom Furniture'),
(4, 'Chairs and tables');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_contact` varchar(20) DEFAULT NULL,
  `feedback_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_name`, `user_email`, `user_contact`, `feedback_text`, `created_at`) VALUES
(1, '', '', NULL, 'Hey baby', '2025-04-13 17:46:00'),
(2, '', '', NULL, 'hey i am nikit', '2025-04-13 17:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1030497655, 8, 2, 'pending'),
(2, 1, 1016244489, 11, 3, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Augusta Fabric', 'Augusta Fabric sofa amazing', 'augusta, fabric, sofa', 1, 'augustafabric.jpg', 'augustafabric1.jpg', 'augustafabric.jpg', '5000', '2025-04-13 17:09:07', 'true'),
(2, 'Base Lop', 'Base Lop amazing', 'base , lop, sofa', 1, 'basellop1.jpg', 'basellop.jpg', 'basellop2.jpg', '25000', '2025-04-13 17:10:50', 'true'),
(3, 'Flint Fabric', 'Flint fabric folding amazing ', 'sofa, flint, folding', 1, 'flintfabric1.jpg', 'flintfabric.jpg', 'flintfabric2.jpg', '12000', '2025-04-13 17:12:57', 'true'),
(4, 'Chisa', 'Chisa sofa amazing', 'chisa, sofa', 1, 'chisa.jpg', 'chisa1.jpg', 'chisa2.jpg', '6800', '2025-04-13 17:13:47', 'true'),
(5, 'Luxury Deban', 'Luxury and premium sofa', 'luxury, deban, sofa', 1, 'luxuryDeban.jpg', 'luxuryDeban2.jpg', 'luxuryDeban3.jpg', '55200', '2025-04-13 17:14:57', 'true'),
(6, 'Day Dream Fabric', 'Long seated sofa', 'long sofa, sofa', 1, 'dayDreamFabric.jpg', 'dayDreamFabric2.jpg', 'daydreamFabric3.jpg', '9500', '2025-04-13 17:16:01', 'true'),
(7, 'Lemma PVC', 'PVC comfortable sofa', 'Lemma , PVC , sofa', 1, 'lemmapvc.jpg', 'lemmapvc1.jpg', 'lemmapvc2.jpg', '11000', '2025-04-13 17:18:02', 'true'),
(8, 'Parasso ', 'Parasso 2 seater comfortable sofa', 'parasso, 2seater, sofa', 1, 'parasso2seater.jpg', 'parasso2seater1.jpg', 'parasso2seater.jpg', '16500', '2025-04-13 17:19:25', 'true'),
(9, 'Bentef', 'Comfortable premium bed', 'bed, bentef', 2, 'bentef.jpg', 'bentef2.jpg', 'bentef12.jpg', '23000', '2025-04-13 17:23:26', 'true'),
(10, 'Florence', 'Florence comfortable bed', 'florence, bed', 2, 'florencebed1.jpg', 'florencebed.jpg', 'florencebed2.jpg', '18500', '2025-04-13 17:24:53', 'true'),
(11, 'Nikko', 'Comfrotable nikko bed', 'bed, nikko', 2, 'nikkobed.jpg', 'nikkobed1.jpg', 'nikkobed3.jpg', '21000', '2025-04-13 17:26:06', 'true'),
(12, 'Play Fantasy', 'Amazing Play Fantasy Bed', 'bed, play, play fantasy', 2, 'playfantasy.jpg', 'playfantasy1.jpg', 'playfantasy2.jpg', '28000', '2025-04-13 17:27:00', 'true'),
(13, 'Sacha ', 'Sacha 6-feet comfortable bed', 'bed, sacha', 2, 'sacha6ft.jpg', 'sacha6ft1.jpg', 'sacha6ft2.jpg', '26500', '2025-04-13 17:27:47', 'true'),
(14, 'DC Pikki', 'Table with makeup mirror', 'table, dc, dc pikki', 4, 'dcpikki.jpg', 'dcpikki2.jpg', 'dcpikki.jpg', '8500', '2025-04-13 17:32:55', 'true'),
(15, 'Florence', 'Table with amazning', 'table, florence', 4, 'florence2.jpg', 'florence.jpg', 'florence2.jpg', '7500', '2025-04-13 17:34:05', 'true'),
(16, 'Moneta', 'Moneda warddrobe', 'wardrobe, moneta', 1, 'moneta.jpg', 'moneta2.jpg', 'moneta1.jpg', '95000', '2025-04-13 17:35:13', 'true'),
(17, 'Sunmoon', 'Sunmoon amazing chair', 'chair, sunmoon', 4, 'sunmoon.jpg', 'sunmoon1.jpg', 'sunmoon2.jpg', '2800', '2025-04-13 17:36:04', 'true'),
(18, 'Marmus', 'Marmus premium wardrobe', 'wardrobe, marmus', 1, 'marmus1.jpg', 'marmus2.jpg', 'marmus.jpg', '98000', '2025-04-13 17:37:09', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 33000, 1030497655, 1, '2025-04-13 17:49:46', 'Complete'),
(2, 1, 63000, 1016244489, 1, '2025-04-13 17:49:52', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 1030497655, 33000, 'Cash on delivery', '2025-04-13 17:49:46.000000'),
(2, 2, 1016244489, 63000, 'Connect IPS', '2025-04-13 17:49:52.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_contact`) VALUES
(1, 'Nikit', 'nikit@gmail.com', '$2y$10$/8Ix8sQEISe.RM9mnlrHcOvR3BduOUMg3MXBij2Z3PKNxRjMhZloS', 'IMG_2214.JPG', '::1', 'Charikot, Dolakha', '9861908271');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `idx_email` (`user_email`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
