-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project71
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `core_categories`
--

DROP TABLE IF EXISTS `core_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_categories`
--

LOCK TABLES `core_categories` WRITE;
/*!40000 ALTER TABLE `core_categories` DISABLE KEYS */;
INSERT INTO `core_categories` VALUES (1,'Food','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Grosary','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `core_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_customers`
--

DROP TABLE IF EXISTS `core_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `address` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_customers`
--

LOCK TABLES `core_customers` WRITE;
/*!40000 ALTER TABLE `core_customers` DISABLE KEYS */;
INSERT INTO `core_customers` VALUES (2,'Rejaul Karim','4353445546','Reza@yahoo.com','2023-12-05 04:27:02','2023-12-05 04:27:02','Rajshahi','2.jpg'),(4,'Kamrul','23432432423','kamrul@gmail.com','2023-12-05 04:43:37','2023-12-05 04:43:37','fsdfsdfsd','4.png'),(6,'CCSL',' 0175555555 ','ccsl61588@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','Shankar',''),(7,'Rakib Shaheb',' 0111113333333 ','masud@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','Shankar','');
/*!40000 ALTER TABLE `core_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_order_details`
--

DROP TABLE IF EXISTS `core_order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `vat` float DEFAULT 0,
  `discount` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_order_details`
--

LOCK TABLES `core_order_details` WRITE;
/*!40000 ALTER TABLE `core_order_details` DISABLE KEYS */;
INSERT INTO `core_order_details` VALUES (1,3,1,1,1,0,0,'2026-07-09 07:53:35','2026-07-09 07:53:35'),(2,3,9,1,650,0,0,'2026-07-09 07:53:35','2026-07-09 07:53:35'),(3,4,1,1,1,0,0,'2026-07-09 07:56:14','2026-07-09 07:56:14'),(4,4,9,1,650,0,0,'2026-07-09 07:56:14','2026-07-09 07:56:14'),(5,5,1,2,1,0,0,'2026-07-09 08:00:16','2026-07-09 08:00:16'),(6,5,2,2,3500,0,0,'2026-07-09 08:00:16','2026-07-09 08:00:16'),(7,6,1,2,1,0,0,'2026-07-09 08:06:01','2026-07-09 08:06:01'),(8,6,2,2,3500,0,0,'2026-07-09 08:06:01','2026-07-09 08:06:01');
/*!40000 ALTER TABLE `core_order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_orders`
--

DROP TABLE IF EXISTS `core_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_total` double DEFAULT 0,
  `paid_amount` double DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_orders`
--

LOCK TABLES `core_orders` WRITE;
/*!40000 ALTER TABLE `core_orders` DISABLE KEYS */;
INSERT INTO `core_orders` VALUES (1,4,'1970-01-01 00:00:00','2026-07-16 00:00:00','',0,0,'23432432423','kamrul@gmail.com',1,0,0,'2026-07-09 07:44:58','2026-07-09 07:44:58'),(2,4,'2026-07-09 00:00:00','2026-07-16 00:00:00','',651,0,'23432432423','kamrul@gmail.com',1,0,0,'2026-07-09 07:50:02','2026-07-09 07:50:02'),(3,4,'2026-07-09 00:00:00','2026-07-16 00:00:00','',651,0,'23432432423','kamrul@gmail.com',1,0,0,'2026-07-09 07:53:35','2026-07-09 07:53:35'),(4,4,'2026-07-09 00:00:00','2026-07-16 00:00:00','',651,0,'23432432423','kamrul@gmail.com',1,0,0,'2026-07-09 07:56:14','2026-07-09 07:56:14'),(5,2,'2026-07-09 00:00:00','2026-07-16 00:00:00','Rajshahi',7002,0,'4353445546','Reza@yahoo.com',1,0,0,'2026-07-09 08:00:16','2026-07-09 08:00:16'),(6,3,'2026-07-09 00:00:00','2026-07-16 00:00:00','Barishal',7002,0,'3434343','niyamot@yahoo.com',1,0,0,'2026-07-09 08:06:01','2026-07-09 08:06:01');
/*!40000 ALTER TABLE `core_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_products`
--

DROP TABLE IF EXISTS `core_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `purchase_price` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `star` int(10) unsigned DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `uom_id` int(10) unsigned DEFAULT NULL,
  `barcode` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_products`
--

LOCK TABLES `core_products` WRITE;
/*!40000 ALTER TABLE `core_products` DISABLE KEYS */;
INSERT INTO `core_products` VALUES (1,'Inspiron 56000',50000,45000,'Laptop','1.jpg',0,1,49000,1,'fdsfds','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(2,'Fan -6655',3500,3000,'Fan','istockphoto-1373281295-612x612-jpg.jpg',0,0,3200,1,'fdsfds','2026-07-05 00:00:00','2026-07-05 00:00:00',2),(3,'Laptop Dell Inspiron',65000,58000,'15.6 inch Intel Core i5 Laptop','product1.jpg',5,1,5,1,'PRD00001','2026-07-09 10:45:24','2026-07-09 10:45:24',1),(4,'HP Pavilion Laptop',72000,65000,'HP Pavilion 14 inch Laptop','product2.jpg',5,1,10,1,'PRD00002','2026-07-09 10:45:24','2026-07-09 10:45:24',1),(5,'Lenovo ThinkPad',85000,78000,'Business Laptop','product3.jpg',5,1,8,1,'PRD00003','2026-07-09 10:45:24','2026-07-09 10:45:24',1),(6,'Asus VivoBook',55000,49000,'Slim Laptop','product4.jpg',4,1,5,1,'PRD00004','2026-07-09 10:45:24','2026-07-09 10:45:24',1),(7,'Acer Aspire 5',60000,54000,'Core i5 Laptop','product5.jpg',4,1,7,1,'PRD00005','2026-07-09 10:45:24','2026-07-09 10:45:24',1),(8,'Logitech Mouse',850,600,'Wireless Mouse','product6.jpg',5,1,0,1,'PRD00006','2026-07-09 10:45:24','2026-07-09 10:45:24',2),(9,'HP USB Mouse',650,450,'Optical USB Mouse','product7.jpg',4,1,0,1,'PRD00007','2026-07-09 10:45:24','2026-07-09 10:45:24',2),(10,'A4Tech Mouse',550,380,'USB Mouse','product8.jpg',4,1,5,1,'PRD00008','2026-07-09 10:45:24','2026-07-09 10:45:24',2),(11,'Dell Keyboard',1200,900,'USB Keyboard','product9.jpg',4,1,0,1,'PRD00009','2026-07-09 10:45:24','2026-07-09 10:45:24',2),(12,'Logitech Keyboard',1800,1500,'Wireless Keyboard','product10.jpg',5,1,5,1,'PRD00010','2026-07-09 10:45:24','2026-07-09 10:45:24',2),(13,'Samsung Monitor 22\"',14500,13200,'Full HD LED Monitor','product11.jpg',5,1,5,1,'PRD00011','2026-07-09 10:45:24','2026-07-09 10:45:24',3),(14,'LG Monitor 24\"',16500,15000,'IPS Monitor','product12.jpg',5,1,7,1,'PRD00012','2026-07-09 10:45:24','2026-07-09 10:45:24',3),(15,'Dell Monitor 27\"',28500,26000,'27 Inch IPS','product13.jpg',5,1,8,1,'PRD00013','2026-07-09 10:45:24','2026-07-09 10:45:24',3),(16,'ViewSonic Monitor',15500,14000,'LED Display','product14.jpg',4,1,5,1,'PRD00014','2026-07-09 10:45:24','2026-07-09 10:45:24',3),(17,'AOC Monitor',13800,12500,'Gaming Monitor','product15.jpg',4,1,6,1,'PRD00015','2026-07-09 10:45:24','2026-07-09 10:45:24',3),(18,'Canon Printer',18500,17000,'Inkjet Printer','product16.jpg',5,1,5,1,'PRD00016','2026-07-09 10:45:24','2026-07-09 10:45:24',4),(19,'Epson Printer',22000,20000,'EcoTank Printer','product17.jpg',5,1,10,1,'PRD00017','2026-07-09 10:45:24','2026-07-09 10:45:24',4),(20,'HP LaserJet',25000,22500,'Laser Printer','product18.jpg',5,1,5,1,'PRD00018','2026-07-09 10:45:24','2026-07-09 10:45:24',4),(21,'Brother Printer',21000,19000,'Mono Laser Printer','product19.jpg',4,1,5,1,'PRD00019','2026-07-09 10:45:24','2026-07-09 10:45:24',4),(22,'Canon Scanner',9500,8500,'Flatbed Scanner','product20.jpg',4,1,3,1,'PRD00020','2026-07-09 10:45:24','2026-07-09 10:45:24',4),(23,'Samsung Galaxy A55',42000,39000,'Android Smartphone','product21.jpg',5,1,5,1,'PRD00021','2026-07-09 10:45:24','2026-07-09 10:45:24',5),(24,'iPhone 15',125000,118000,'Apple Smartphone','product22.jpg',5,1,3,1,'PRD00022','2026-07-09 10:45:24','2026-07-09 10:45:24',5),(25,'Xiaomi Redmi Note',28000,25500,'Android Phone','product23.jpg',4,1,6,1,'PRD00023','2026-07-09 10:45:24','2026-07-09 10:45:24',5),(26,'Realme 12 Pro',32000,29500,'5G Smartphone','product24.jpg',4,1,5,1,'PRD00024','2026-07-09 10:45:24','2026-07-09 10:45:24',5),(27,'Vivo V30',38000,35000,'Android Phone','product25.jpg',5,1,5,1,'PRD00025','2026-07-09 10:45:24','2026-07-09 10:45:24',5),(28,'Sony Headphone',4500,3900,'Bluetooth Headphone','product26.jpg',5,1,8,1,'PRD00026','2026-07-09 10:45:24','2026-07-09 10:45:24',6),(29,'JBL Speaker',6500,5800,'Portable Speaker','product27.jpg',5,1,5,1,'PRD00027','2026-07-09 10:45:24','2026-07-09 10:45:24',6),(30,'Anker Earbuds',3200,2700,'Wireless Earbuds','product28.jpg',4,1,10,1,'PRD00028','2026-07-09 10:45:24','2026-07-09 10:45:24',6),(31,'Mi Earphone',950,700,'Wired Earphone','product29.jpg',4,1,5,1,'PRD00029','2026-07-09 10:45:24','2026-07-09 10:45:24',6),(32,'Boat Headset',2200,1800,'Gaming Headset','product30.jpg',4,1,7,1,'PRD00030','2026-07-09 10:45:24','2026-07-09 10:45:24',6),(33,'SanDisk 32GB Pen Drive',650,450,'USB Flash Drive','product31.jpg',4,1,0,1,'PRD00031','2026-07-09 10:45:24','2026-07-09 10:45:24',7),(34,'SanDisk 64GB Pen Drive',950,700,'USB 3.0 Flash Drive','product32.jpg',5,1,5,1,'PRD00032','2026-07-09 10:45:24','2026-07-09 10:45:24',7),(35,'Kingston SSD 240GB',3200,2800,'Internal SSD','product33.jpg',5,1,5,1,'PRD00033','2026-07-09 10:45:24','2026-07-09 10:45:24',7),(36,'Samsung SSD 500GB',6200,5600,'SATA SSD','product34.jpg',5,1,6,1,'PRD00034','2026-07-09 10:45:24','2026-07-09 10:45:24',7),(37,'Seagate 1TB HDD',4500,3900,'Hard Disk Drive','product35.jpg',4,1,4,1,'PRD00035','2026-07-09 10:45:24','2026-07-09 10:45:24',7),(38,'TP-Link Router',2800,2400,'WiFi Router','product36.jpg',5,1,5,1,'PRD00036','2026-07-09 10:45:24','2026-07-09 10:45:24',8),(39,'D-Link Router',2600,2200,'Wireless Router','product37.jpg',4,1,5,1,'PRD00037','2026-07-09 10:45:24','2026-07-09 10:45:24',8),(40,'Mercusys Router',1800,1500,'Home Router','product38.jpg',4,1,3,1,'PRD00038','2026-07-09 10:45:24','2026-07-09 10:45:24',8),(41,'TP-Link Switch',3500,3000,'8 Port Network Switch','product39.jpg',5,1,5,1,'PRD00039','2026-07-09 10:45:24','2026-07-09 10:45:24',8),(42,'Cat6 LAN Cable',35,20,'Network Cable per Meter','product40.jpg',4,0,0,1,'PRD00040','2026-07-09 10:45:24','2026-07-09 10:45:24',8),(43,'Office Chair',8500,7600,'Ergonomic Chair','product41.jpg',5,0,10,1,'PRD00041','2026-07-09 10:45:24','2026-07-09 10:45:24',9),(44,'Office Table',12000,10800,'Wooden Office Table','product42.jpg',5,0,8,1,'PRD00042','2026-07-09 10:45:24','2026-07-09 10:45:24',9),(45,'Bookshelf',6500,5700,'Wooden Shelf','product43.jpg',4,0,5,1,'PRD00043','2026-07-09 10:45:24','2026-07-09 10:45:24',9),(46,'Filing Cabinet',9800,8900,'Steel Cabinet','product44.jpg',4,0,5,1,'PRD00044','2026-07-09 10:45:24','2026-07-09 10:45:24',9),(47,'Computer Desk',10500,9600,'Office Computer Desk','product45.jpg',5,0,6,1,'PRD00045','2026-07-09 10:45:24','2026-07-09 10:45:24',9),(48,'UPS 650VA',4200,3700,'Power Backup','product46.jpg',4,1,5,1,'PRD00046','2026-07-09 10:45:24','2026-07-09 10:45:24',10),(49,'UPS 1200VA',7800,7100,'High Capacity UPS','product47.jpg',5,1,5,1,'PRD00047','2026-07-09 10:45:24','2026-07-09 10:45:24',10),(50,'Power Strip',650,450,'6 Port Power Strip','product48.jpg',4,0,0,1,'PRD00048','2026-07-09 10:45:24','2026-07-09 10:45:24',10),(51,'HDMI Cable',450,250,'2 Meter HDMI Cable','product49.jpg',4,0,0,1,'PRD00049','2026-07-09 10:45:24','2026-07-09 10:45:24',10),(52,'Laptop Backpack',1800,1400,'Waterproof Laptop Bag','product50.jpg',5,0,5,1,'PRD00050','2026-07-09 10:45:24','2026-07-09 10:45:24',10);
/*!40000 ALTER TABLE `core_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_purchase_details`
--

DROP TABLE IF EXISTS `core_purchase_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_purchase_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `vat` float DEFAULT 0,
  `discount` float DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_purchase_details`
--

LOCK TABLES `core_purchase_details` WRITE;
/*!40000 ALTER TABLE `core_purchase_details` DISABLE KEYS */;
INSERT INTO `core_purchase_details` VALUES (1,2,2,6,3500,0,0),(2,2,1,1,50000,0,0),(3,3,2,6,3500,0,0),(4,3,1,1,50000,0,0),(5,4,2,6,3500,0,0),(6,4,1,1,50000,0,0),(7,5,2,10,3500,0,0),(8,6,1,5,50000,0,0);
/*!40000 ALTER TABLE `core_purchase_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_purchases`
--

DROP TABLE IF EXISTS `core_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `purchase_total` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_purchases`
--

LOCK TABLES `core_purchases` WRITE;
/*!40000 ALTER TABLE `core_purchases` DISABLE KEYS */;
INSERT INTO `core_purchases` VALUES (1,1,'2026-07-08 13:25:22','2026-07-15 00:00:00','',71000,0,'dsfsdf',1,0,0,'2026-07-08 07:25:22','2026-07-08 07:25:22'),(2,1,'2026-07-08 13:28:40','2026-07-15 00:00:00','',71000,0,'dsfsdf',1,0,0,'2026-07-08 07:28:40','2026-07-08 07:28:40'),(3,1,'2026-07-08 13:30:59','2026-07-15 00:00:00','',71000,0,'dsfsdf',1,0,0,'2026-07-08 07:30:59','2026-07-08 07:30:59'),(4,1,'2026-07-08 13:34:45','2026-07-15 00:00:00','',71000,0,'dsfsdf',1,0,0,'2026-07-08 07:34:45','2026-07-08 07:34:45'),(5,2,'2026-07-09 10:08:28','2026-07-16 00:00:00','',35000,0,'Dhaka',1,0,0,'2026-07-09 04:08:28','2026-07-09 04:08:28'),(6,4,'2026-07-09 10:11:34','2026-07-16 00:00:00','',250000,0,'',1,0,0,'2026-07-09 04:11:34','2026-07-09 04:11:34');
/*!40000 ALTER TABLE `core_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_roles`
--

DROP TABLE IF EXISTS `core_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_roles`
--

LOCK TABLES `core_roles` WRITE;
/*!40000 ALTER TABLE `core_roles` DISABLE KEYS */;
INSERT INTO `core_roles` VALUES (1,'Admin','2024-03-02 04:59:14','2024-03-01 22:59:14'),(2,'Manager','2024-02-28 12:10:59','2024-02-28 00:10:59'),(4,'Guest','2024-03-07 10:24:21','2024-03-06 22:24:21'),(5,'Manager','2024-03-07 12:25:34','2024-03-07 00:25:34'),(6,'Manager','2024-03-07 12:25:53','2024-03-07 00:25:53');
/*!40000 ALTER TABLE `core_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_statuss`
--

DROP TABLE IF EXISTS `core_statuss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_statuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_statuss`
--

LOCK TABLES `core_statuss` WRITE;
/*!40000 ALTER TABLE `core_statuss` DISABLE KEYS */;
INSERT INTO `core_statuss` VALUES (1,'Pending'),(2,'Completed');
/*!40000 ALTER TABLE `core_statuss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_stocks`
--

DROP TABLE IF EXISTS `core_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_stocks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `transaction_type_id` int(10) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) DEFAULT NULL,
  `lot_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_stocks`
--

LOCK TABLES `core_stocks` WRITE;
/*!40000 ALTER TABLE `core_stocks` DISABLE KEYS */;
INSERT INTO `core_stocks` VALUES (1,2,6,1,'','2026-07-08 07:34:45',1,'LOT2026-07-08 13:34:452'),(2,1,1,1,'','2026-07-08 07:34:45',1,'LOT2026-07-08 13:34:451'),(3,2,10,1,'','2026-07-09 04:08:28',1,'LOT2026-07-09 10:08:282'),(4,1,5,1,'','2026-07-09 04:11:34',1,'LOT2026-07-09 10:11:341'),(5,1,-1,2,'','2026-07-09 07:56:14',1,'LOT2026-07-09 13:56:141'),(6,9,-1,2,'','2026-07-09 07:56:15',1,'LOT2026-07-09 13:56:159'),(7,1,-2,2,'','2026-07-09 08:00:16',1,'LOT2026-07-09 14:00:161'),(8,2,-2,2,'','2026-07-09 08:00:16',1,'LOT2026-07-09 14:00:162'),(9,1,-2,2,'','2026-07-09 08:06:01',1,'LOT2026-07-09 14:06:011'),(10,2,-2,2,'','2026-07-09 08:06:01',1,'LOT2026-07-09 14:06:012');
/*!40000 ALTER TABLE `core_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_suppliers`
--

DROP TABLE IF EXISTS `core_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_suppliers`
--

LOCK TABLES `core_suppliers` WRITE;
/*!40000 ALTER TABLE `core_suppliers` DISABLE KEYS */;
INSERT INTO `core_suppliers` VALUES (1,'Md. Shahin','34223423455444','shahin@yahoo.com','Nepal'),(2,'Karim','343254354235433','karim@gmail.com','Dhaka'),(3,'masud',' 0175555555 ','ccsl61588@gmail.com','Noakhali'),(4,'Hasan',NULL,'hasan@gmail.com','1954 Bloor Street West');
/*!40000 ALTER TABLE `core_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_bookings`
--

DROP TABLE IF EXISTS `core_tms_bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `travel_date` date DEFAULT NULL,
  `travelers` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_bookings`
--

LOCK TABLES `core_tms_bookings` WRITE;
/*!40000 ALTER TABLE `core_tms_bookings` DISABLE KEYS */;
INSERT INTO `core_tms_bookings` VALUES (1,1,1,1,'2026-07-01','2026-07-20',2,'Confirmed'),(2,2,2,2,'2026-07-02','2026-08-10',4,'Pending'),(3,3,3,2,'2026-07-03','2026-07-15',3,'Confirmed');
/*!40000 ALTER TABLE `core_tms_bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_customers`
--

DROP TABLE IF EXISTS `core_tms_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `passport_no` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_customers`
--

LOCK TABLES `core_tms_customers` WRITE;
/*!40000 ALTER TABLE `core_tms_customers` DISABLE KEYS */;
INSERT INTO `core_tms_customers` VALUES (1,'John Smith','01711111111','john@gmail.com','P123456','Dhaka'),(2,'Alice Johnson','01822222222','alice@gmail.com','P654321','Chittagong'),(3,'Michael Brown','01933333333','michael@gmail.com','P987654','Khulna');
/*!40000 ALTER TABLE `core_tms_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_employees`
--

DROP TABLE IF EXISTS `core_tms_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_employees`
--

LOCK TABLES `core_tms_employees` WRITE;
/*!40000 ALTER TABLE `core_tms_employees` DISABLE KEYS */;
INSERT INTO `core_tms_employees` VALUES (1,'Rahim','01788888888','Manager'),(2,'Karim','01877777777','Sales Executive');
/*!40000 ALTER TABLE `core_tms_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_flights`
--

DROP TABLE IF EXISTS `core_tms_flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_flights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline` varchar(100) DEFAULT NULL,
  `flight_no` varchar(20) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `destination` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_flights`
--

LOCK TABLES `core_tms_flights` WRITE;
/*!40000 ALTER TABLE `core_tms_flights` DISABLE KEYS */;
INSERT INTO `core_tms_flights` VALUES (1,'Biman','BG101','Dhaka','Dubai',45000.00),(2,'US Bangla','BS201','Dhaka','Bangkok',28000.00),(3,'Air Asia','AK500','Dhaka','Kuala Lumpur',32000.00);
/*!40000 ALTER TABLE `core_tms_flights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_hotels`
--

DROP TABLE IF EXISTS `core_tms_hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `price_per_night` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_hotels`
--

LOCK TABLES `core_tms_hotels` WRITE;
/*!40000 ALTER TABLE `core_tms_hotels` DISABLE KEYS */;
INSERT INTO `core_tms_hotels` VALUES (1,'Sea Pearl','Coxs Bazar',5,8000.00),(2,'Grand Palace','Dubai',5,12000.00),(3,'Bangkok Inn','Bangkok',4,5000.00);
/*!40000 ALTER TABLE `core_tms_hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_invoices`
--

DROP TABLE IF EXISTS `core_tms_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `invoice_no` varchar(30) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_invoices`
--

LOCK TABLES `core_tms_invoices` WRITE;
/*!40000 ALTER TABLE `core_tms_invoices` DISABLE KEYS */;
INSERT INTO `core_tms_invoices` VALUES (1,1,'INV-1001',95000.00,5000.00,9000.00,99000.00),(2,2,'INV-1002',65000.00,0.00,6500.00,71500.00),(3,3,'INV-1003',15000.00,500.00,1450.00,15950.00);
/*!40000 ALTER TABLE `core_tms_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_payments`
--

DROP TABLE IF EXISTS `core_tms_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_payments`
--

LOCK TABLES `core_tms_payments` WRITE;
/*!40000 ALTER TABLE `core_tms_payments` DISABLE KEYS */;
INSERT INTO `core_tms_payments` VALUES (1,1,'2026-07-02',95000.00,'Cash','Paid'),(2,2,'2026-07-03',30000.00,'Card','Partial'),(3,3,'2026-07-04',15000.00,'Bkash','Paid');
/*!40000 ALTER TABLE `core_tms_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_suppliers`
--

DROP TABLE IF EXISTS `core_tms_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_suppliers`
--

LOCK TABLES `core_tms_suppliers` WRITE;
/*!40000 ALTER TABLE `core_tms_suppliers` DISABLE KEYS */;
INSERT INTO `core_tms_suppliers` VALUES (1,'ABC Travels','01755555555','abc@gmail.com'),(2,'Sky Tours','01866666666','sky@gmail.com');
/*!40000 ALTER TABLE `core_tms_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_tour_packages`
--

DROP TABLE IF EXISTS `core_tms_tour_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_tour_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_tour_packages`
--

LOCK TABLES `core_tms_tour_packages` WRITE;
/*!40000 ALTER TABLE `core_tms_tour_packages` DISABLE KEYS */;
INSERT INTO `core_tms_tour_packages` VALUES (1,'Dubai Luxury Tour','UAE',5,2,1,2,95000.00),(2,'Bangkok Holiday','Thailand',4,3,2,1,65000.00),(3,'Coxs Bazar Tour','Bangladesh',3,1,NULL,1,15000.00);
/*!40000 ALTER TABLE `core_tms_tour_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_tms_visa`
--

DROP TABLE IF EXISTS `core_tms_visa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_tms_visa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `visa_type` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_tms_visa`
--

LOCK TABLES `core_tms_visa` WRITE;
/*!40000 ALTER TABLE `core_tms_visa` DISABLE KEYS */;
INSERT INTO `core_tms_visa` VALUES (1,1,'UAE','Tourist','Approved'),(2,2,'Thailand','Tourist','Processing');
/*!40000 ALTER TABLE `core_tms_visa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_uoms`
--

DROP TABLE IF EXISTS `core_uoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_uoms`
--

LOCK TABLES `core_uoms` WRITE;
/*!40000 ALTER TABLE `core_uoms` DISABLE KEYS */;
INSERT INTO `core_uoms` VALUES (1,'Piece'),(2,'Kg'),(3,'Pack'),(4,'Litter'),(5,'Gram'),(6,'Ton');
/*!40000 ALTER TABLE `core_uoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_users`
--

DROP TABLE IF EXISTS `core_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `core_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) unsigned DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_users`
--

LOCK TABLES `core_users` WRITE;
/*!40000 ALTER TABLE `core_users` DISABLE KEYS */;
INSERT INTO `core_users` VALUES (127,'admin',1,'$2y$10$aRd4BZlYyX25wC3fqhsT8.8sTgIFEIbyjNSN1i1ELSIqWbN/1P5r.','towhid1@outlook.com','Mohammad Towhidul Islam','2026-07-05 03:35:46','127.jpg','45354353',0,'34324324','2022-02-15 21:00:46','192.168.150.29',NULL,NULL),(192,'naeem',2,'$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6','naymur@gmail.com','Naymur Rahman','2024-04-03 23:43:27',NULL,NULL,0,'01800000000',NULL,'192.168.150.25',NULL,NULL);
/*!40000 ALTER TABLE `core_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-22 12:48:53
