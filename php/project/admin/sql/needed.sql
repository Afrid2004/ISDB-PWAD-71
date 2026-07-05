CREATE TABLE `core_suppliers` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `name` varchar(45) ,
  `mobile` varchar(45) ,
  `email` varchar(45) 
) ;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `mobile`, `email`) VALUES
(1, 'Md. Shahin', '34223423455444', 'shahin@yahoo.com'),
(2, 'Tauhid Imdad', '343254354235433', 'tauhid@gmail.com');


CREATE TABLE `core_uoms` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `name` varchar(45) 
) ;

--
-- Dumping data for table `core_uoms`
--

INSERT INTO `core_uoms` (`id`, `name`) VALUES
(1, 'Piece'),
(2, 'Kg'),
(3, 'Pack'),
(4, 'Litter'),
(5, 'Gram'),
(6, 'Ton');

CREATE TABLE `core_products` (
  `id` int(10)  primary key AUTO_INCREMENT,
  `name` varchar(50) ,
  `price` double DEFAULT NULL,
  `purchase_price` double ,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `star` int(10) UNSIGNED DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `uom_id` int(10) UNSIGNED ,
  `barcode` varchar(45) ,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `category_id` int(10) UNSIGNED 
);

--
-- Dumping data for table `core_products`
--

CREATE TABLE `core_purchases` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `supplier_id` int(10) UNSIGNED ,
  `purchase_date` datetime ,
  `delivery_date` datetime ,
  `shipping_address` text ,
  `purchase_total` double ,
  `paid_amount` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status_id` int(10) UNSIGNED ,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp  DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp  DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ;

--
-- Dumping data for table `core_purchases`
--


CREATE TABLE `core_purchase_details` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `purchase_id` int(10) UNSIGNED ,
  `product_id` int(10) UNSIGNED ,
  `qty` float ,
  `price` float ,
  `vat` float  DEFAULT 0,
  `discount` float  DEFAULT 0
) ;



CREATE TABLE `core_stocks` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED ,
  `qty` float ,
  `transaction_type_id` int(10) UNSIGNED ,
  `remark` text DEFAULT NULL,
  `created_at` timestamp  DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) UNSIGNED 
  `lot_id` varchar(100) UNSIGNED 
);

CREATE TABLE `core_users` (
  `id` int(10)  primary key AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp  DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `name`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`, `ip`, `email_verified_at`, `remember_token`) VALUES
(127, 'admin', 1, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2024-04-29 05:28:06', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46', '192.168.150.29', NULL, NULL),
(192, 'naeem', 2, '$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6', 'naymur@gmail.com', 'Naymur Rahman', '2024-04-04 05:43:27', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),


CREATE TABLE `core_roles` (
  `id` int(10)  primary key AUTO_INCREMENT,
  `name` varchar(20) ,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp  DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-02 04:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 06:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-07 04:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 06:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 06:25:53');

CREATE TABLE `core_customers` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `name` varchar(45) ,
  `mobile` varchar(45) ,
  `email` varchar(45) ,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `address` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL
) ;

--
-- Dumping data for table `core_customers`
--

INSERT INTO `core_customers` (`id`, `name`, `mobile`, `email`, `created_at`, `updated_at`, `address`, `photo`) VALUES
(1, 'Md. Jahidul Islam', '999999999', 'jahid1@yahoo.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Rejaul Karim', '4353445546', 'Reza@yahoo.com', '2023-12-05 10:27:02', '2023-12-05 10:27:02', '', '2.jpg'),
(3, 'Niyamot', '3434343', 'niyamot@yahoo.com', '2023-12-05 10:27:19', '2023-12-05 10:27:19', '', '3.png'),
(4, 'Kamrul', '23432432423', 'kamrul@gmail.com', '2023-12-05 10:43:37', '2023-12-05 10:43:37', '', '4.png'),
(5, 'Silvia', '34324232', 'silvia@gmail.com', '2023-12-05 10:43:49', '2023-12-05 10:43:49', '', '5.jpg');


CREATE TABLE `core_orders` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `customer_id` int(10) UNSIGNED ,
  `order_date` datetime ,
  `delivery_date` datetime ,
  `shipping_address` text DEFAULT NULL,
  `order_total` double  DEFAULT 0,
  `paid_amount` double  DEFAULT 0,
  `remark` text DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp  DEFAULT current_timestamp(),
  `updated_at` timestamp  DEFAULT current_timestamp()
) ;

CREATE TABLE `core_order_details` (
  `id` int(10) UNSIGNED  primary key AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED ,
  `product_id` int(10) UNSIGNED ,
  `qty` float ,
  `price` float ,
  `vat` float  DEFAULT 0,
  `discount` float  DEFAULT 0,
  `created_at` timestamp  DEFAULT current_timestamp(),
  `updated_at` timestamp  DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;