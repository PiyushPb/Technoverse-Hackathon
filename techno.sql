-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 06:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techno`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `provider_name` varchar(50) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `details` text DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `provider_name`, `service_type`, `details`, `location`, `contact_number`, `email`, `website`, `rating`, `price`, `start_date`, `end_date`) VALUES
(1, 'ABC Plumbing', 'Plumbing Services', 'Specializing in residential plumbing repairs and installations.', 'New York', '555-1234', 'info@abcplumbing.com', 'www.abcplumbing.com', 4.70, 85.00, '2023-06-01', '2023-06-30'),
(2, 'XYZ Landscaping', 'Landscaping Services', 'Offering professional landscaping design and maintenance services.', 'Los Angeles', '555-5678', 'contact@xyzlandscaping.com', 'www.xyzlandscaping.com', 4.20, 120.00, '2023-07-01', '2023-07-31'),
(3, 'Smith Electric', 'Electrical Services', 'Licensed electricians providing electrical installations and repairs.', 'Chicago', '555-9012', 'info@smithelectric.com', 'www.smithelectric.com', 4.90, 95.00, '2023-08-01', '2023-08-31'),
(4, 'Fresh Cleaning', 'Cleaning Services', 'Professional cleaning services for homes and offices.', 'San Francisco', '555-3456', 'info@freshcleaning.com', 'www.freshcleaning.com', 4.50, 60.00, '2023-07-15', '2023-08-15'),
(5, 'Healthy Catering', 'Catering Services', 'Specializing in healthy and organic catering for events and parties.', 'Miami', '555-7890', 'events@healthycatering.com', 'www.healthycatering.com', 4.60, 150.00, '2023-06-20', '2023-07-20'),
(6, 'Green Thumb Gardening', 'Gardening Services', 'Professional gardening services for residential and commercial properties.', 'Seattle', '555-2345', 'info@greenthumbgardening.com', 'www.greenthumbgardening.com', 4.40, 80.00, '2023-07-10', '2023-08-10'),
(7, 'Ace Auto Repair', 'Auto Repair Services', 'Full-service auto repair shop for all makes and models.', 'Houston', '555-6789', 'info@aceautorepair.com', 'www.aceautorepair.com', 4.30, 100.00, '2023-06-15', '2023-07-15'),
(8, 'Home Solutions', 'Handyman Services', 'Reliable and skilled handyman services for various home repairs and improvements.', 'Dallas', '555-0123', 'info@homesolutions.com', 'www.homesolutions.com', 4.10, 70.00, '2023-07-05', '2023-08-05'),
(9, 'Pet Paradise', 'Pet Sitting Services', 'Trustworthy pet sitting and dog walking services for busy pet owners.', 'Denver', '555-4567', 'info@petparadise.com', 'www.petparadise.com', 4.80, 50.00, '2023-06-25', '2023-07-25'),
(10, 'Express Movers', 'Moving Services', 'Efficient and reliable moving services for residential and commercial moves.', 'Atlanta', '555-8901', 'info@expressmovers.com', 'www.expressmovers.com', 4.60, 200.00, '2023-07-30', '2023-08-30'),
(11, 'Pampered Paws', 'Pet Grooming Services', 'Professional pet grooming services for dogs and cats.', 'Orlando', '555-2345', 'info@pamperedpaws.com', 'www.pamperedpaws.com', 4.50, 75.00, '2023-06-10', '2023-07-10'),
(12, 'Taste of Italy', 'Catering Services', 'Authentic Italian catering services for weddings and special events.', 'Boston', '555-6789', 'events@tasteofitaly.com', 'www.tasteofitaly.com', 4.70, 180.00, '2023-06-05', '2023-07-05'),
(13, 'Fresh Air HVAC', 'HVAC Services', 'Heating, ventilation, and air conditioning services for residential and commercial properties.', 'Phoenix', '555-0123', 'info@freshairhvac.com', 'www.freshairhvac.com', 4.40, 120.00, '2023-07-20', '2023-08-20'),
(14, 'Sparkle Cleaners', 'Dry Cleaning Services', 'Professional dry cleaning and laundry services with pick-up and delivery options.', 'Washington, D.C.', '555-4567', 'info@sparklecleaners.com', 'www.sparklecleaners.com', 4.30, 30.00, '2023-07-12', '2023-08-12'),
(15, 'Healthy Habits', 'Fitness Training Services', 'Personalized fitness training services to help you achieve your health goals.', 'San Diego', '555-8901', 'info@healthyhabits.com', 'www.healthyhabits.com', 4.90, 90.00, '2023-06-15', '2023-07-15'),
(16, 'A+ Tutoring', 'Tutoring Services', 'Expert tutoring services for various subjects and grade levels.', 'Philadelphia', '555-2345', 'info@aplustutoring.com', 'www.aplustutoring.com', 4.20, 50.00, '2023-06-30', '2023-07-30'),
(17, 'Golden Spa', 'Spa and Wellness Services', 'Pampering spa services for relaxation and rejuvenation.', 'Las Vegas', '555-6789', 'info@goldenspa.com', 'www.goldenspa.com', 4.70, 150.00, '2023-06-20', '2023-07-20'),
(18, 'Tech Solutions', 'IT Services', 'Comprehensive IT services for businesses, including network setup, maintenance, and support.', 'Austin', '555-0123', 'info@techsolutions.com', 'www.techsolutions.com', 4.50, 120.00, '2023-07-15', '2023-08-15'),
(19, 'Sweat and Burn', 'Fitness Classes', 'Dynamic fitness classes for all fitness levels, including cardio, strength, and yoga.', 'Chicago', '555-4567', 'info@sweatandburn.com', 'www.sweatandburn.com', 4.60, 20.00, '2023-06-25', '2023-07-25'),
(20, 'Little Explorers', 'Childcare Services', 'Safe and nurturing childcare services for infants and toddlers.', 'Seattle', '555-8901', 'info@littleexplorers.com', 'www.littleexplorers.com', 4.40, 180.00, '2023-06-10', '2023-07-10'),
(21, 'Creative Cakes', 'Bakery Services', 'Custom-designed cakes for birthdays, weddings, and special occasions.', 'New York', '555-2345', 'info@creativecakes.com', 'www.creativecakes.com', 4.30, 100.00, '2023-07-05', '2023-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `email`, `phone`, `gender`, `service`) VALUES
(1, 'p', 'p', '7', 'Male', 'Service 3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `referral` varchar(10) DEFAULT NULL,
  `friends_referral` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `referral`, `friends_referral`, `password`) VALUES
(1, 'PIYUSH PARDESHI', 'piyushp0512@gmail.com', '9326582108', 'RH9PElf8In', '8Vff8y0ihF', '$2y$10$Ik8owIt5QQoLbTB3WeNgyO/nJbTpKKaLGXbVweaIaHropLFXZvZ7G'),
(2, 'Namrata Gaikwad', 'namratag0512@gmail.com', '9326491129', '8Vff8y0ihF', 'RH9PElf8In', '$2y$10$6gMW.v.ns/nB8f.7jCdRgebqkVy1L/sSmVD9eVZQ3bzypcYRFO2Eq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
