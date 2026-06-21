-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 09:04 AM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `name`, `member_id`) VALUES
(10, 'Code Review', 1),
(20, 'Security', 2),
(30, 'UX Design', NULL),
(40, 'Coder', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country` varchar(60) DEFAULT 'Bangladesh',
  `road` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `country`, `road`, `phone`, `district`, `created_at`) VALUES
(1, 'ABC Technologies Ltd.', ' info@abctech.com', 'Bangladesh', 'House #112, Road #50', '+880 1711-123456', 'Dhaka', '2026-06-21 06:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country` varchar(60) DEFAULT 'Bangladesh',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `road` varchar(100) DEFAULT NULL,
  `districts` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL
) ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `country`, `created_at`, `road`, `districts`, `phone`) VALUES
(1, 'Elice Ahmed', 'alice@example.com', 'Bangladesh', '2026-06-14 04:13:40', NULL, NULL, NULL),
(2, 'Babul Basu', 'babul@example.com', 'India', '2026-06-14 04:13:40', NULL, NULL, NULL),
(3, 'Chhaya Chakma', 'chhaya@example.com', 'Bangladesh', '2026-06-14 04:13:40', NULL, NULL, NULL),
(4, 'Dina Das', 'dina@example.com', 'Nepal', '2026-06-14 04:13:40', NULL, NULL, NULL),
(5, 'Alice Ahmed Copy', 'copy_alice@example.com', 'Bangladesh', '2026-06-14 04:15:51', NULL, NULL, NULL),
(6, 'Mr. John Doe', 'Corporation@gmail.com', 'Bangladesh', '2026-06-14 04:15:51', '25 Motijheel Commercial Area', 'Dhaka', '+880 1811-987654');

-- --------------------------------------------------------

--
-- Table structure for table `customers1`
--

CREATE TABLE `customers1` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `job_title`, `manager_id`) VALUES
(1, 'Sarah Jenkins', 'Department Head', NULL),
(2, 'Michael Scott', 'Team Lead', 1),
(3, 'Jim Halpert', 'Developer', 2),
(4, 'Pam Beesly', 'Developer', 2),
(5, 'Dwight Schrute', 'Team Lead', 1),
(6, 'Ryan Howard', 'Intern', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_details`
-- (See below for the actual view)
--
CREATE TABLE `employee_details` (
`id` int(11)
,`name` varchar(50)
,`position` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`) VALUES
(0, 'Kashem'),
(1, 'Hasan'),
(2, 'Rashed'),
(3, 'Mahmud');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `grand_total` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `VAT` float DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `status`, `grand_total`, `discount`, `VAT`, `order_date`) VALUES
(1, 6, 'pending', 967, 20, 47, '2026-06-21 12:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL CHECK (`qty` > 0),
  `unit_price` decimal(10,2) NOT NULL CHECK (`unit_price` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `unit_price`) VALUES
(1, 1, 5, 1, 800.00),
(2, 1, 6, 1, 20.00),
(3, 1, 7, 1, 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL CHECK (`unit_price` >= 0),
  `in_stock` int(11) NOT NULL DEFAULT 0 CHECK (`in_stock` >= 0),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `unit_price`, `in_stock`, `created_at`) VALUES
(1, 'Tea (500g)', 350.00, 50, '2026-06-14 04:14:29'),
(2, 'Coffee (250g)', 480.00, 40, '2026-06-14 04:14:29'),
(3, 'Sugar (1kg)', 90.00, 200, '2026-06-14 04:14:29'),
(4, 'Biscuits (12pc)', 140.00, 120, '2026-06-14 04:14:29'),
(5, '	Website Development Service', 800.00, 0, '2026-06-21 06:17:54'),
(6, '	Domain Registration (1 Year)', 20.00, 0, '2026-06-21 06:17:54'),
(7, '	Web Hosting (1 Year)', 120.00, 0, '2026-06-21 06:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Manager'),
(3, 'Hr'),
(4, 'Accountant'),
(5, 'salesman'),
(6, 'Marketer');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `product_name`, `department`, `price`, `sale_date`) VALUES
(1, 'Laptop', 'Electronics', 1200.00, '2026-01-10'),
(2, 'Smartphone', 'Electronics', 800.00, '2026-01-11'),
(3, 'Headphones', 'Electronics', 150.00, '2026-01-12'),
(4, 'Charging Cable', 'Electronics', 15.00, '2026-01-12'),
(5, '4K Monitor', 'Electronics', 450.00, '2026-01-14'),
(6, 'Winter Jacket', 'Clothing', 180.00, '2026-01-10'),
(7, 'Designer Shoes', 'Clothing', 250.00, '2026-01-11'),
(8, 'T-Shirt', 'Clothing', 25.00, '2026-01-12'),
(9, 'Leather Bag', 'Clothing', 300.00, '2026-01-15'),
(10, 'Refrigerator', 'Home & Kitchen', 1500.00, '2026-01-02'),
(11, 'Blender', 'Home & Kitchen', 85.00, '2026-01-05'),
(12, 'Coffee Maker', 'Home & Kitchen', 120.00, '2026-01-08'),
(13, 'Microwave', 'Home & Kitchen', 200.00, '2026-01-09'),
(14, 'Textbook', 'Books', 110.00, '2026-01-03'),
(15, 'Novel', 'Books', 15.00, '2026-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `sales1`
--

CREATE TABLE `sales1` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `vat` varchar(45) DEFAULT NULL,
  `tax` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales1`
--

INSERT INTO `sales1` (`id`, `customer_id`, `address`, `phone`, `date`, `total`, `vat`, `tax`) VALUES
(1, '1', 'Dhaka', '017', '2026-06-06', '5000', '200', '100');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `gender`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'Hasan', 'hasan@yahoo.com', 'male', '0152148', '2026-06-10 05:42:14', '0000-00-00'),
(3, 'Manik', 'manik@gmail.com', 'male', '0111113333333', '0000-00-00 00:00:00', '0000-00-00'),
(4, 'CCSL', 'ccsl61588@gmail.com', 'female', '0111113333333', '0000-00-00 00:00:00', '0000-00-00'),
(5, 'Rahim', 'ccsl61588@gmail.com', 'male', '0111113333333', '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `password`, `created_at`, `updated_at`, `image`) VALUES
(1, 'rashed', 1, 'rashed@gmail.com', '12345', '2026-06-10 09:46:04', NULL, NULL),
(2, 'masuma', 3, 'masuma@gmail.com', '12345', '2026-06-10 09:46:35', NULL, NULL),
(3, 'Hamza Masud', 1, NULL, '12345', '2026-06-16 11:06:05', NULL, NULL),
(4, 'Hamza', 0, NULL, '12345', '2026-06-16 11:21:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `employee_details`
--
DROP TABLE IF EXISTS `employee_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_details`  AS SELECT `members`.`member_id` AS `id`, `members`.`name` AS `name`, `committees`.`name` AS `position` FROM (`members` join `committees` on(`members`.`member_id` = `committees`.`member_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers1`
--
ALTER TABLE `customers1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_customer` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sales1`
--
ALTER TABLE `sales1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers1`
--
ALTER TABLE `customers1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales1`
--
ALTER TABLE `sales1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
