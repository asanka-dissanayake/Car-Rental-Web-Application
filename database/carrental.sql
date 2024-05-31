-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 11:57 AM
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
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2023-12-31 10:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` text DEFAULT NULL,
  `payer_id` text DEFAULT NULL,
  `payer_name` text DEFAULT NULL,
  `payer_email` text DEFAULT NULL,
  `item_id` text DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_name`, `payer_email`, `item_id`, `item_name`, `currency`, `amount`, `status`, `created_at`) VALUES
(1, '1XT46792ML021360F', 'QRFLSDZKSPUKN', 'John Doe', 'sb-krsoa27319193@personal.example.com', '', '', 'USD', '1800.00', 'Completed', '2023-09-09 01:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PricePerDay` varchar(100) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PricePerDay`, `PostingDate`) VALUES
(1, 'test@gmail.com', 2, '22/06/2017', '25/06/2017', NULL, 1, NULL, '2017-06-19 20:15:43'),
(2, 'test@gmail.com', 3, '30/06/2017', '02/07/2017', NULL, 2, NULL, '2017-06-26 20:15:43'),
(3, 'test@gmail.com', 4, '02/07/2017', '07/07/2017', NULL, 0, NULL, '2017-06-26 21:10:06'),
(4, 'test@gmail.com', 6, '30/02/2023', '01/03/2023', 'I want to book', 1, NULL, '2023-11-29 20:42:02'),
(5, 'sam@gmail.com', 2, '30/02/2023', '01/03/2023', 'i want', 0, NULL, '2023-12-02 09:37:11'),
(6, 'sam@gmail.com', 2, '30/02/2023', '01/03/2023', 'wfwef', 0, NULL, '2023-12-15 12:19:23'),
(7, 'sam@gmail.com', 2, '30/02/2023', '01/03/2023', 'wfwef', 1, NULL, '2023-12-15 12:19:45'),
(8, 'sam@gmail.com', 3, '30/02/2023', '01/03/2023', 'sdf', 2, NULL, '2023-12-29 06:54:22'),
(9, 'sam@gmail.com', 2, '30/02/2023', '01/03/2023', 'jkjhkh', 0, NULL, '2024-01-11 11:17:00'),
(10, 'sam@gmail.com', 2, '30/02/2023', '01/03/2023', 'jkjhkh', 0, NULL, '2024-01-11 11:19:41'),
(11, 'sam@gmail.com', 3, '2024-01-26', '2024-02-03', 'asdasd', 0, NULL, '2024-01-11 19:17:29'),
(12, 'sam@gmail.com', 3, '2024-01-26', '2024-02-03', 'asdasd', 0, NULL, '2024-01-11 19:18:14'),
(13, 'sam@gmail.com', 4, '2024-01-19', '2024-01-25', NULL, 0, NULL, '2024-01-11 22:14:31'),
(14, 'sam@gmail.com', 4, '2024-01-19', '2024-01-25', NULL, 0, NULL, '2024-01-11 22:15:34'),
(15, 'gg@gmail.com', 2, '2024-01-19', '2024-01-26', NULL, 0, NULL, '2024-01-15 12:39:12'),
(16, 'gun@gmail.com', 2, '2024-01-24', '2024-01-27', NULL, 0, '0', '2024-01-15 13:33:09'),
(17, 'gun@gmail.com', 2, '2024-01-24', '2024-01-24', NULL, 0, '0', '2024-01-15 16:43:01'),
(18, 'gun@gmail.com', 2, '2024-01-25', '2024-01-26', NULL, 0, '0', '2024-01-15 17:41:49'),
(19, 'gun@gmail.com', 2, '2024-01-25', '2024-02-01', NULL, 0, '0', '2024-01-15 18:44:50'),
(20, 'gun@gmail.com', 2, '2024-01-25', '2024-01-25', NULL, 0, '0', '2024-01-15 18:49:04'),
(21, 'gun@gmail.com', 2, '2024-01-18', '2024-01-19', NULL, 0, '0', '2024-01-15 19:20:46'),
(22, 'gun@gmail.com', 2, '2024-01-26', '2024-01-27', NULL, 0, '0', '2024-01-15 19:21:55'),
(23, 'gun@gmail.com', 2, '2024-01-26', '2024-01-26', NULL, 0, '0', '2024-01-15 19:23:03'),
(24, 'gun@gmail.com', 2, '2024-01-18', '2024-01-26', NULL, 0, '0', '2024-01-15 19:32:25'),
(25, 'gun@gmail.com', 2, '2024-02-02', '2024-02-01', NULL, 0, '0', '2024-01-15 20:42:42'),
(26, 'gun@gmail.com', 2, '2024-02-02', '2024-02-01', NULL, 0, '0', '2024-01-15 20:42:52'),
(27, 'gun@gmail.com', 2, '2024-01-26', '2024-01-25', NULL, 0, '0', '2024-01-15 20:47:19'),
(28, 'gun@gmail.com', 2, '2024-02-01', '2024-02-01', NULL, 0, '0', '2024-01-15 20:48:58'),
(29, 'gun@gmail.com', 2, '2024-01-25', '2024-01-26', NULL, 0, '0', '2024-01-15 20:58:07'),
(30, 'gun@gmail.com', 2, '2024-01-25', '2024-01-26', NULL, 0, '0', '2024-01-15 20:58:07'),
(31, 'gun@gmail.com', 2, '2024-01-25', '2024-01-26', NULL, 0, '0', '2024-01-15 20:59:25'),
(32, 'gun@gmail.com', 2, '2024-01-25', '2024-01-26', NULL, 0, '0', '2024-01-15 20:59:25'),
(33, 'gun@gmail.com', 2, '2024-01-19', '2024-02-01', NULL, 0, '0', '2024-01-15 20:59:40'),
(34, 'gun@gmail.com', 2, '2024-01-19', '2024-02-01', NULL, 0, '0', '2024-01-15 20:59:40'),
(35, 'gun@gmail.com', 4, '2024-01-25', '2024-01-30', NULL, 0, '0', '2024-01-15 21:25:57'),
(36, 'gun@gmail.com', 4, '2024-01-25', '2024-01-30', NULL, 0, '0', '2024-01-15 21:25:57'),
(37, 'sam@gmail.com', 13, '2024-01-17', '2024-01-24', NULL, 0, '0', '2024-01-15 21:28:47'),
(38, 'sam@gmail.com', 23, '2024-01-10', '2024-01-11', NULL, 0, '0', '2024-01-16 09:17:59'),
(39, 'harry@gmail.com', 23, '2024-01-25', '2024-01-26', NULL, 1, '0', '2024-01-16 19:05:28'),
(40, 'harry@gmail.com', 27, '2024-02-06', '2024-02-23', NULL, 0, '0', '2024-01-16 19:06:20'),
(41, 'harry@gmail.com', 25, '2024-01-25', '2024-01-31', NULL, 0, '0', '2024-01-16 22:50:04'),
(42, 'harry@gmail.com', 25, '2024-01-25', '2024-01-31', NULL, 0, '0', '2024-01-16 23:02:45'),
(43, 'harry@gmail.com', 25, NULL, NULL, NULL, 0, '0', '2024-01-16 23:02:48'),
(44, 'harry@gmail.com', 25, '2024-01-25', '2024-01-26', NULL, 0, '0', '2024-01-16 23:03:43'),
(45, 'harry@gmail.com', 24, '2024-01-26', '2024-01-31', NULL, 0, '0', '2024-01-16 23:16:53'),
(46, 'harry@gmail.com', 23, '2024-01-26', '2024-01-25', NULL, 0, '0', '2024-01-16 23:39:20'),
(47, 'gun@gmail.com', 25, '2024-01-26', '2024-01-28', NULL, 0, '0', '2024-01-17 10:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', '2017-06-18 16:24:34', '2017-06-19 06:42:23'),
(2, 'BMW', '2017-06-18 16:24:50', '2024-01-16 09:48:47'),
(3, 'Audi', '2017-06-18 16:25:03', NULL),
(4, 'Nissan', '2017-06-18 16:25:13', NULL),
(5, 'Toyota', '2017-06-18 16:25:24', NULL),
(8, 'Ford', '2023-11-29 20:45:47', NULL),
(9, 'Nissan', '2023-12-29 08:06:30', NULL),
(10, 'Panda', '2023-12-29 08:07:00', NULL),
(12, 'Ford', '2023-12-29 20:31:46', NULL),
(17, 'Mercedes', '2024-01-16 08:24:52', NULL),
(18, 'Volvo', '2024-01-16 10:07:33', NULL),
(19, 'Honda', '2024-01-16 10:43:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Max', 'max@gmail.com', '2147483647', 'I want to know about booking process ', '2017-06-18 10:03:07', 1),
(2, 'Harry', 'harry@gmail.com', '0762837654', 'There is a Problem with booking. How can i solve', '2024-01-18 10:37:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '																				<p class=\"MsoNormal\"><b>1. Agreement Acceptance:</b> By using ShareCar, you agree to comply with and be bound by these\r\nterms and conditions. If you do not agree with any part of these terms, please\r\nrefrain from using our services.<o:p></o:p></p><p class=\"MsoNormal\"><b>2. Rental Eligibility:</b> Renters must be at least 18 years old, possess a valid driver\'s license, and provide a valid credit card\r\nfor payment. Vehicle owners must ensure their vehicles meet safety and\r\nmaintenance standards for eligibility on the platform.<o:p></o:p></p><p class=\"MsoNormal\"><b>3. Booking and Payments:</b> All bookings are subject to\r\navailability. Payment for rental services will be processed through our secure\r\npayment system. Vehicle owners will receive payment for successful rentals\r\nafter deducting applicable fees.<o:p></o:p></p><p class=\"MsoNormal\"><b>4. Cancellation and Refund:</b> Cancellation policies\r\nvary by rental. Renters and owners must adhere to the specified cancellation\r\nterms outlined in each booking. Refunds are subject to these policies.<o:p></o:p></p><p class=\"MsoNormal\"><b>5. Insurance:</b> We recommend all renters and owners to\r\nmaintain valid and comprehensive insurance coverage. Additional insurance\r\noptions may be available during the booking process. ShareCar&nbsp;is not\r\nresponsible for uninsured damages.<o:p></o:p></p><p class=\"MsoNormal\"><b>6. Vehicle Condition and Returns:</b> Renters are\r\nexpected to return the vehicle in the same condition as received. Owners must\r\nensure the vehicle is well-maintained and complies with safety standards. Any\r\ndamage or discrepancies should be reported promptly.<o:p></o:p></p><p class=\"MsoNormal\"><b>7. Prohibited Activities:</b> Renters must not use the\r\nvehicle for any prohibited activities, including but not limited to illegal\r\nactivities, racing, off-road driving, and exceeding passenger capacity.\r\nViolation may result in immediate termination of the rental agreement.<o:p></o:p></p><p class=\"MsoNormal\"><b>8. Responsibilities:</b> Both renters and owners are\r\nresponsible for communicating clearly and promptly, adhering to agreed-upon\r\nterms, and respecting each other\'s property and privacy.<o:p></o:p></p><p class=\"MsoNormal\"><b>9. Privacy Policy:</b> We respect your privacy. Please\r\nreview our Privacy Policy for details on how we collect, use, and safeguard\r\nyour personal information.<o:p></o:p></p><p class=\"MsoNormal\"><b>10. Changes to Terms:</b>&nbsp;ShareCar reserves\r\nthe right to modify these terms and conditions at any time. Users will be\r\nnotified of significant changes. Continued use of our services after\r\nmodifications constitutes acceptance of the updated terms.<o:p></o:p></p><p class=\"MsoNormal\"><b>11. Termination:</b>&nbsp;ShareCar&nbsp;reserves the\r\nright to terminate any user account or rental agreement for violations of these\r\nterms and conditions, illegal activities, or any behavior that may harm the\r\ncommunity or the platform.<o:p></o:p></p><p align=\"justify\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">These terms and conditions constitute the entire agreement\r\nbetween users and ShareCar. If you have any\r\nquestions or concerns, please contact our customer support team.<o:p></o:p></p>\r\n										\r\n										'),
(2, 'Privacy Policy', 'privacy', '<p class=\"MsoNormal\" style=\"text-align: justify;\">At ShareCar, we are committed to safeguarding\r\nyour privacy and ensuring the security of your personal information. This\r\nPrivacy Policy outlines how we collect, use, disclose, and protect your data\r\nwhen you use our car rental and rent-out services.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>1. Information Collection:</b> We collect personal\r\ninformation from users during the account registration process, booking\r\ntransactions, and communications. This may include names, contact details,\r\ndriver\'s license information, payment details, and vehicle details for owners.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>2. Use of Information:</b> We use the collected\r\ninformation to facilitate and improve our car rental and rent-out services,\r\nprocess transactions, provide customer support, and enhance user experience.\r\nYour data may also be used for communication purposes, such as updates, promotions,\r\nor important service information.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>3. Sharing of Information:</b> We may share your\r\ninformation with relevant parties to fulfill booking transactions, ensure\r\nvehicle eligibility, and facilitate communication between renters and owners.\r\nHowever, we do not sell or disclose personal information to third parties for\r\nmarketing purposes without your explicit consent.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>4. Security Measures:</b> We employ industry-standard\r\nsecurity measures to protect your personal information from unauthorized\r\naccess, disclosure, alteration, and destruction. Our secure servers and\r\nencrypted communication protocols ensure the confidentiality of your data.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>5. Cookies and Tracking:</b> We may use cookies and\r\nsimilar technologies to enhance user experience, personalize content, and\r\nanalyze usage patterns. You can modify your browser settings to control or\r\ndisable cookies, but it may impact certain functionalities.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>6. Third-Party Links:</b> Our platform may contain links\r\nto third-party websites. We are not responsible for the privacy practices or\r\ncontent of these external sites. Please review their privacy policies before\r\nproviding any personal information.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>7. Data Retention:</b> We retain your personal\r\ninformation for as long as necessary to fulfill the purposes outlined in this\r\nPrivacy Policy. You can request the deletion of your account and associated\r\ndata by contacting our customer support.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>8. Children\'s Privacy:</b> Our services are not directed\r\nat individuals under the age of 18. We do not knowingly collect personal\r\ninformation from children. If you are a parent or guardian and become aware\r\nthat your child has provided us with personal information, please contact us,\r\nand we will take steps to remove such data.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><b>9. Updates to Privacy Policy:</b> We reserve the right to\r\nupdate this Privacy Policy to reflect changes in our practices. Any significant\r\nchanges will be communicated to users. Your continued use of our services after\r\nmodifications constitutes acceptance of the updated policy.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\">For questions or concerns regarding our Privacy Policy,\r\nplease contact our customer support team at sharecarrental@online.co.uk. Thank\r\nyou for trusting ShareCar.<o:p></o:p></p>'),
(3, 'About Us ', 'aboutus', '																																								<p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family: verdana;\">Welcome to <span style=\"font-weight: bold;\">ShareCar</span>, where your journey is our priority. As\r\na versatile car rental and rent-out platform, we go beyond traditional\r\nservices, offering you a dynamic and flexible approach to mobility.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family: verdana;\">At <span style=\"font-weight: bold;\">ShareCar</span>, we understand that your transportation needs\r\ncan vary. Whether you\'re seeking a reliable rental vehicle for a short-term\r\ntrip or looking to earn extra income by renting out your own car, our platform\r\nis designed to cater to both sides of the equation.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family: verdana;\">For Renters: Discover the freedom of the road with our\r\ndiverse fleet of well-maintained vehicles. From compact cars for city\r\nexplorations to spacious SUVs for family adventures, we provide a range of\r\noptions to suit your travel requirements. Our user-friendly platform ensures a\r\nseamless booking process, transparent pricing, and access to a variety of\r\nrental durations, ensuring you have the flexibility to plan your journey on\r\nyour terms.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family: verdana;\">For Owners: Unlock the potential of your vehicle by joining\r\nour rent-out community. Whether you have an extra car sitting idle or want to\r\nmonetize your vehicle when you\'re not using it, our platform makes it simple\r\nand secure. List your car with confidence, knowing that our comprehensive\r\nscreening process and insurance coverage prioritize the safety and security of\r\nyour vehicle.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family: verdana;\">At <span style=\"font-weight: bold;\">ShareCar, </span>we take pride in fostering a community where\r\ntrust, convenience, and sustainability converge. Our commitment to responsible\r\ntravel extends beyond offering efficient and eco-friendly vehicles; it\r\nencompasses building connections between renters and owners, creating a\r\ncollaborative and supportive ecosystem.<o:p></o:p></span></p><p class=\"MsoNormal\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family: verdana;\">Thank you for choosing <span style=\"font-weight: bold;\">ShareCar.</span> Whether you\'re embarking on\r\na new adventure or unlocking the potential of your vehicle, we\'re here to\r\nredefine the way you think about mobility. Join us and let\'s make every journey\r\nmemorable.</span><o:p></o:p></p>\r\n										\r\n										\r\n										\r\n										'),
(11, 'FAQs', 'faqs', '																																								<p class=\"MsoNormal\"><b>1. How does the car rental and rent-out service work?</b><o:p></o:p></p><p class=\"MsoNormal\">Renters can browse available vehicles, select their\r\npreferred rental period, and make a reservation. Vehicle owners can list their\r\ncars, set rental terms, and earn income when their cars are rented.<o:p></o:p></p><p class=\"MsoNormal\"><b>2. What are the eligibility criteria for renters?</b><o:p></o:p></p><p class=\"MsoNormal\">Renters must be 18 years or older, possess a valid\r\ndriver\'s license, and provide a valid payment method. Specific requirements may\r\nvary, so check the terms for each rental.<o:p></o:p></p><p class=\"MsoNormal\"><b>3. How do I list my car for rent?</b><o:p></o:p></p><p class=\"MsoNormal\">Owners can create a listing by providing details about their\r\nvehicle, setting rental rates, and specifying availability. Ensure your vehicle\r\nmeets safety and maintenance standards.<o:p></o:p></p><p class=\"MsoNormal\"><b>4. How is the rental price determined?</b><o:p></o:p></p><p class=\"MsoNormal\">Rental prices are set by vehicle owners based on factors\r\nlike make, model, year, and additional features. Prices may vary for different\r\nrental durations and peak periods.<o:p></o:p></p><p class=\"MsoNormal\"><b>5. What insurance options are available?</b><o:p></o:p></p><p class=\"MsoNormal\">Renters and owners are encouraged to have their own\r\ninsurance. Additional insurance options may be available during the booking\r\nprocess. Check the terms and conditions for details.<o:p></o:p></p><p class=\"MsoNormal\"><b>06. How can I contact customer support?<o:p></o:p></b></p><p class=\"MsoNormal\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">For any assistance or inquiries, please contact our customer\r\nsupport team at sharecarrental@online.co.uk. We\'re here to help!<o:p></o:p></p><ul style=\"margin-top:0cm\" type=\"disc\"><li class=\"MsoNormal\"><o:p></o:p></li>\r\n</ul>\r\n										\r\n										\r\n										\r\n										');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'smith@gmail.com', 'Great value for money! \"ShareCar\" offered affordable rates without compromising on quality. The online reservation system was straightforward, I Will use again in the future.', '2023-11-29 23:18:51', 1),
(2, 'sam@gmail.com', 'good service', '2023-12-01 20:52:49', NULL),
(5, 'raj@gmail.com', 'Smooth and easy rental process. ShareCar had a wide range of vehicle options, and the rates were reasonable. The pick-up and return were quick, and the car performed well throughout our trip. A reliable and trustworthy service', '2024-01-16 14:09:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Role` varchar(50) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Propic` varchar(120) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Role`, `Password`, `Propic`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Harry Den', 'demo@gmail.com', '', 'f925916e2754e5e03f75dd58a5733251', NULL, '2147483647', NULL, NULL, NULL, NULL, '2017-06-17 19:59:27', '2017-06-26 21:02:58'),
(2, 'AK', 'anuj@gmail.com', '', 'f925916e2754e5e03f75dd58a5733251', NULL, '8285703354', NULL, NULL, NULL, NULL, '2017-06-17 20:00:49', '2017-06-26 21:03:09'),
(3, 'Mark K', 'webhostingamigo@gmail.com', '', 'f09df7868d52e12bba658982dbd79821', NULL, '09999857868', '03/02/1990', 'PKL', 'PKL', 'PKL', '2017-06-17 20:01:43', '2017-06-17 21:07:41'),
(4, 'Tom K', 'test@gmail.com', '', '5c428d8875d2948607f3e3fe134d71b4', NULL, '9999857868', '', 'PKL', 'XYZ', 'XYZ', '2017-06-17 20:03:36', '2017-06-26 19:18:14'),
(5, 'Smith', 'smith@gmail.com', '', '698d51a19d8a121ce581499d7b701668', NULL, '0987899737', NULL, NULL, NULL, NULL, '2023-11-29 23:16:38', NULL),
(6, 'Jhone', 'jhon@gmail.com', 'CarOwner', '698d51a19d8a121ce581499d7b701668', NULL, '678839939', NULL, NULL, NULL, NULL, '2023-11-30 00:31:08', NULL),
(7, 'sam', 'sam@gmail.com', 'Driver', '289dff07669d7a23de0ef88d2f7129e7', NULL, '56757', '2005-01-01', 'street \r\nlondon', 'Essex', 'UK', '2023-11-30 14:52:49', '2024-01-01 19:17:56'),
(8, 'don', 'don@gmail.com', 'CarOwner', '698d51a19d8a121ce581499d7b701668', NULL, '6757577', NULL, NULL, NULL, NULL, '2023-11-30 17:24:39', NULL),
(9, 'wood', 'wood@gmail.com', 'Driver', '698d51a19d8a121ce581499d7b701668', NULL, '89385938', NULL, NULL, NULL, NULL, '2023-11-30 17:25:53', NULL),
(10, 'wood', 'wood@gmail.com', 'Driver', '698d51a19d8a121ce581499d7b701668', NULL, '89385938', NULL, NULL, NULL, NULL, '2023-11-30 17:28:37', NULL),
(11, 'koon', 'koon@gmail.com', 'Driver', '698d51a19d8a121ce581499d7b701668', NULL, '5567677', NULL, NULL, NULL, NULL, '2023-11-30 17:30:06', NULL),
(12, 'gin', 'gin@gmail.com', 'CarOwner', '698d51a19d8a121ce581499d7b701668', NULL, '56234', NULL, NULL, NULL, NULL, '2023-12-08 11:49:34', NULL),
(13, 'gun', 'gun@gmail.com', 'CarOwner', '202cb962ac59075b964b07152d234b70', NULL, '7345834759', '2023-11-07', 'cm3, chelmsford', 'Essex', 'Essex', '2024-01-01 17:00:34', '2024-01-17 11:14:24'),
(14, 'you', 'you@gmail.com', 'Driver', '202cb962ac59075b964b07152d234b70', NULL, '8345845928', NULL, NULL, NULL, NULL, '2024-01-01 17:18:31', NULL),
(15, 'me', 'me@gmail.com', 'Driver', '202cb962ac59075b964b07152d234b70', NULL, '3456778', NULL, NULL, NULL, NULL, '2024-01-01 17:19:58', NULL),
(16, 'me', 'me@gmail.com', 'Driver', '202cb962ac59075b964b07152d234b70', NULL, '3456778', NULL, NULL, NULL, NULL, '2024-01-01 18:10:28', NULL),
(17, 'do', 'do@gmail.com', 'CarOwner', '202cb962ac59075b964b07152d234b70', NULL, '425255252', NULL, NULL, NULL, NULL, '2024-01-01 18:11:02', NULL),
(18, 'ko', 'ko@gmail.com', 'Driver', '202cb962ac59075b964b07152d234b70', NULL, '543535654', NULL, NULL, NULL, NULL, '2024-01-01 18:24:10', NULL),
(19, 'ko', 'ko@gmail.com', 'Driver', '202cb962ac59075b964b07152d234b70', NULL, '543535654', NULL, NULL, NULL, NULL, '2024-01-01 18:48:41', NULL),
(20, 'ron', 'ron@gmail.com', 'CarOwner', '202cb962ac59075b964b07152d234b70', NULL, '2358735893', NULL, NULL, NULL, NULL, '2024-01-01 19:11:48', NULL),
(21, 'hoo', 'hoo@gmail.com', 'Driver', '202cb962ac59075b964b07152d234b70', NULL, '7345745934', NULL, NULL, NULL, NULL, '2024-01-03 11:54:04', NULL),
(22, 'nova', 'nova@gmail.com', 'CarOwner', '202cb962ac59075b964b07152d234b70', NULL, '646464', NULL, NULL, NULL, NULL, '2024-01-15 03:11:39', NULL),
(24, 'raj', 'raj@gmail.com', 'Driver', '202cb962ac59075b964b07152d234b70', NULL, '34535345', '', '', '', '', '2024-01-15 03:29:16', '2024-01-16 14:30:26'),
(25, 'david1', 'david1@gmail.com', 'Driver', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '4565656', NULL, NULL, NULL, NULL, '2024-01-15 03:29:58', NULL),
(26, 'walk', 'walk@gmail.com', 'CarOwner', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '34646456', NULL, NULL, NULL, NULL, '2024-01-15 03:35:10', NULL),
(28, 'Smith', 'smith1@gmail.com', 'CarOwner', '202cb962ac59075b964b07152d234b70', NULL, '363646', NULL, NULL, NULL, NULL, '2024-01-15 04:16:15', NULL),
(44, 'gg', 'gg@gmail.com', 'CarOwner', '25d55ad283aa400af464c76d713c07ad', NULL, '0987899737', NULL, NULL, NULL, NULL, '2024-01-15 11:11:11', NULL),
(45, 'Harry', 'harry@gmail.com', 'Driver', '25d55ad283aa400af464c76d713c07ad', NULL, '0749982004', NULL, NULL, NULL, NULL, '2024-01-16 17:53:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Vimage6` varchar(120) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`, `Vimage6`, `FromDate`, `ToDate`) VALUES
(23, 'E-Class Hybrid', 17, 'The Mercedes-Benz E-Class hybrid is part of the E-Class lineup, which is known for its luxury, performance, and advanced technology features. The hybrid variant combines a traditional internal combustion engine with an electric motor, offering improved fuel efficiency and reduced emissions.', 120, 'Petrol', 2022, 5, '091-mercedes-2.jpg', '092-mercedes-3.jpg', '089-mercedes_5.jpg', '093-mercedes-5.jpg', '', 1, 1, 1, 1, NULL, 1, 1, 1, 1, NULL, 1, NULL, '2024-01-16 09:17:09', NULL, '', '2024-01-01', '2024-04-03'),
(24, 'A3 Sportback', 3, 'The 2020 Audi A3 Sportback exemplifies the brand\'s commitment to blending style, performance, and advanced technology in a compact luxury package.', 110, 'Petrol', 2020, 5, 'audi_a3-3.jpg', 'audi_a3-2.jpg', 'audi_a3_4.jpg', 'audi_a3-1.jpg', '', 1, 1, 1, 1, NULL, 1, 1, 1, NULL, NULL, NULL, 1, '2024-01-16 09:27:10', NULL, '', '2024-01-11', '2024-02-22'),
(25, 'i5', 2, 'BMW i5 is a concept vehicle that was expected to be part of BMW\'s i Series, which focuses on electric and plug-in hybrid models.', 115, 'CNG', 2021, 5, '69-bmw-i5-m60-front-cornering.jpg', '70-bmw-i5-m60-rear-driving.jpg', '81-bmw-i5-m60-wheel.jpg', '72-bmw-i5-m60-rear-driving.jpg', '', 1, NULL, 1, 1, NULL, 1, 1, 1, 1, 1, NULL, 1, '2024-01-16 09:54:15', NULL, '', '2024-01-04', '2024-03-29'),
(27, 'XC40 Recharge SUV', 18, 'Launched as part of Volvo\'s Recharge lineup, the XC40 Recharge combines the popular design and functionality of the XC40 with a fully electric powertrain.', 125, 'CNG', 2021, 5, '92-volvoxc40-frontcornering.jpg', '93-volvoxc40-rearcornering.jpg', '91-volvoxc40-rear34.jpg', '94-volvoxc40-fronttracking.jpg', '', 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, 1, 1, 1, '2024-01-16 10:14:42', NULL, '', '2024-01-25', '2024-03-06'),
(32, 'Nissan Z', 4, 'The Nissan Z series traditionally includes sports cars such as the Nissan 370Z. These models are known for their performance and sporty design. The term \"Recharge\" is commonly associated with plug-in hybrid or electric vehicles, indicating an emphasis on electrification.', 0, 'Petrol', 2020, 5, 'nissanz_51.jpg', 'nissanz.jpg', 'nissanz_52.jpg', 'nissanz_58.jpg', '', 1, NULL, 1, 1, NULL, 1, NULL, NULL, NULL, 1, NULL, 1, '2024-01-16 10:53:23', NULL, '', '2024-01-12', '2024-02-29'),
(33, 'Honda Civic', 19, 'Key features of the Honda Civic often include a fuel-efficient engine, user-friendly technology, and a well-designed interior. The car is known for its comfortable ride and nimble handling, making it suitable for both daily commuting and longer trips.', 90, 'Petrol', 2020, 5, 'typer_le_052.jpg', 'typer_le_050.jpg', 'typer_le_051.jpg', 'typer_le_054.jpg', '', 1, 1, 1, 1, NULL, 1, 1, 1, NULL, NULL, 1, 1, '2024-01-16 10:47:47', NULL, '', '2024-01-03', '2024-02-29'),
(34, 'Ka+ Active', 12, 'The Ka+ Active adds a touch of crossover styling to the Ka+ lineup, featuring rugged exterior elements like roof rails, cladding on the wheel arches, and increased ride height for a more adventurous look', 118, 'Petrol', 2019, 5, 'ford_kaplusactive_50.jpg', 'ford_kaplusactive_56.jpg', 'ford_kaplusactive_54.jpg', 'ford_kaplusactive_57.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, '2024-01-16 11:18:49', NULL, '', NULL, NULL),
(35, 'Nissan Z', 4, 'The Nissan Z series traditionally includes sports cars such as the Nissan 370Z. These models are known for their performance and sporty design. The term \"Recharge\" is commonly associated with plug-in hybrid or electric vehicles, indicating an emphasis on electrification.', 100, 'Petrol', 2020, 5, 'nissanz.jpg', 'nissanz_51.jpg', 'nissanz_52.jpg', 'nissanz_58.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, '2024-01-16 11:29:26', NULL, '', NULL, NULL),
(36, 'AMG GLS63 ', 17, 'The Mercedes-AMG GLS63 is a high-performance luxury SUV that combines the spaciousness of a full-size SUV with the exhilarating driving dynamics of an AMG-tuned vehicle', 114, 'Petrol', 2018, 6, 'amg_gls63_100.jpg', 'amg_gls63_101.jpg', 'amg_gls63_106.jpg', 'amg_gls63_110.jpg', '', NULL, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 1, NULL, '2024-01-16 11:49:19', NULL, '', NULL, NULL),
(37, 'E-Class Hybrid', 17, 'The Mercedes-Benz E-Class hybrid is part of the E-Class lineup, which is known for its luxury, performance, and advanced technology features. The hybrid variant combines a traditional internal combustion engine with an electric motor, offering improved fuel efficiency and reduced emissions.', 200, 'Petrol', 2021, 5, '089-mercedes_5.jpg', '091-mercedes-2.jpg', '092-mercedes-3.jpg', '81-bmw-i5-m60-wheel.jpg', '', 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, 1, '2024-01-17 01:12:56', NULL, '', '2024-01-25', '2024-01-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
