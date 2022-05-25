-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 08:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la_bonita_cosmetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `name`, `password`) VALUES
(1, 'La Bonita Cosmetics', '$2y$10$Zvi2Z3MzUgsmpLdNV793x.Q32rzFjYcH17uD/7Lvo9zE7u1HYiGCS'),
(2, 'Programmers', '$2y$10$/Q0qZv2I2oX8UuseP5Kfwuf8zYaSs45URbHgzi.OgdOwVwKZq8IBi');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` varchar(255) NOT NULL,
  `prod_desc` varchar(5000) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_name`, `prod_price`, `prod_desc`, `prod_category`, `prod_image`, `link`, `date_created`) VALUES
(40, 'RETAIL Powdery Matte enriched with Vitamin E | Tinta Beauty PH by Anafara', '₱150', 'Benefits\r\nUltra powdery matte technology.\r\nWith 2x saturated powder pigments + honey nectar,\r\nintense color payoff, and ultra powdery smooth matte finish.', 'Retail/Samples', 'Powdery Matte.jpg', 'https://shopee.ph/RETAIL-Powdery-Matte-enriched-with-Vitamin-E-Tinta-Beauty-PH-by-Anafara-i.333555989.6181100471?sp_atk=8ba04262-87ba-4abf-a8fe-b683742c3df6', '2022-04-23 01:34:05'),
(41, '150pcs 10ml Thick Glass Roller Bottle White and Black Cap La Bonita Cosmetics by Anafara', '₱1,050 - ₱2,000', '150pcs\r\n10ml\r\nThick Glass Roller Bottles\r\n\r\nAvailable Cap:\r\nWhite \r\nBlack\r\n\r\nNo leak\r\nTight Roller \r\nThick Glass\r\n\r\nperfect for Lip tint, Lip Gloss, Essential Oils etc.', 'Others', 'Thick Glass Roller.jpg', 'https://shopee.ph/150pcs-10ml-Thick-Glass-Roller-Bottle-White-and-Black-Cap-La-Bonita-Cosmetics-by-Anafara-i.333555989.4862145604?sp_atk=e94e8fa0-59fc-42c1-9bc0-4b97d85bd4d1', '2022-04-25 01:20:43'),
(42, 'RETAIL Peppermint Lip Balm (Tinted and Classic) Tinta Beauty PH by Anafara', '₱100 - ₱180', 'Classic Balm (No Color) - An All around Balm can use for Lip, Face Moisturizer or for Skin.\r\n\r\nmoisturizing balm and salves for dry skin.\r\n\r\nTinted Lip Balm - Can use for Lip and Cheek\r\n\r\nLip Balm Bottle - 5g\r\nRectangular Sliding Tin Can / Round Black Matte / Round Silver - 20g\r\nRound Pink - 10g\r\n\r\nIngredients:\r\nBeeswax\r\nShea Butter\r\nCoconut Oil\r\nJojoba Oil\r\nVitamin E\r\n\r\nNo preservatives\r\nParaben Free\r\nCruelty Free\r\nMade in the Philippines', 'Retail/Samples', 'Peppermint Lip.jpg', 'https://shopee.ph/RETAIL-Peppermint-Lip-Balm-(Tinted-and-Classic)-Tinta-Beauty-PH-by-Anafara-i.333555989.6068017625?sp_atk=b058e561-9f74-475d-897c-d69d689599e2', '2022-04-25 01:22:47'),
(43, '20pcs Organic Brow Soap Rebranding WITH STICKER LABEL | La Bonita Cosmetics', '₱960 - ₱2,400', 'REBRANDING Organic Brow Soap infused with Castor Oil and Rosemary Oil\r\n\r\n\r\nPlease give us 2-3 working days to process as we ensure freshness of product and quality of printing.\r\n\r\n\r\nINCLUSIONS:\r\n\r\nBrow Soap in Tin Can of your choice\r\nSticker Label of your preferred lay out\r\nSpoolie (All Black or Pink Brush)\r\nStandard Design Instruction Manual \r\n\r\n**No Ziplock or Pouch each brow soap provided \r\n\r\nCustomer should order here if asking for Sticker Label\r\n\r\nSticker Label Paper Type:\r\nVynil Waterproof Phototop with option of:\r\n-Glossy\r\n-Matte\r\n-Glitter ', 'Rebranding/Wholesale', 'Organic Brow Soap.jpg', 'https://shopee.ph/20pcs-Organic-Brow-Soap-Rebranding-WITH-STICKER-LABEL-La-Bonita-Cosmetics-by-Anafara-i.333555989.7961520543?sp_atk=95bb7188-dd73-4ef8-a9ae-e7d64cb5adf2', '2022-05-12 23:51:06'),
(51, 'REBRANDING Lip Scrub 5g, 10g, 20g with different color and flavor La Bonita Cosmetics', '₱30', 'REBRANDING Lip Scrub 5g, 10g, 20g with different color and flavor La Bonita Cosmetics\r\n\r\nColor Available:\r\nPink\r\nRed \r\nPurple\r\n\r\nMINIMUM OF 30PCS FOR FREE STICKER LABEL AND SHRINK WRAP\r\nWith your own label. Waterproof Vynil Matte or Glossy.\r\nWith Shrink Wrap.\r\n\r\nORDER OF 1PC-29PCS (NO LABEL NO SHRINK WRAP)\r\n\r\nOn Promotion wherein customers were able to get a deal with NO PAYMENT at all please do understand that we send out random base on the availability.\r\nREBRANDING Lip Scrub 5g, 10g, 20g with different color and flavor La Bonita Cosmetics\r\n\r\nColor Available:\r\nPink\r\nRed \r\nPurple\r\n\r\nMINIMUM OF 30PCS FOR FREE STICKER LABEL AND SHRINK WRAP\r\nWith your own label. Waterproof Vynil Matte or Glossy.\r\nWith Shrink Wrap.\r\n\r\nORDER OF 1PC-29PCS (NO LABEL NO SHRINK WRAP)\r\n\r\nOn Promotion wherein customers were able to get a deal with NO PAYMENT at all please do understand that we send out random base on the availability.\r\n', 'Rebranding/Wholesale', 'Lip Scrub.jpg', 'https://shopee.ph/REBRANDING-Lip-Scrub-5g-10g-20g-with-different-color-and-flavor-La-Bonita-Cosmetics-i.333555989.12976214720?sp_atk=8479f646-2c41-47be-ac91-3342bf54f123&xptdk=8479f646-2c41-47be-ac91-3342bf54f123', '2022-05-16 01:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `products_archive`
--

CREATE TABLE `products_archive` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` varchar(255) NOT NULL,
  `prod_desc` varchar(5000) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `facebook` varchar(2000) NOT NULL,
  `twitter` varchar(2000) NOT NULL,
  `linkedin` varchar(2000) NOT NULL,
  `instagram` varchar(2000) NOT NULL,
  `youtube` varchar(2000) NOT NULL,
  `tiktok` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `phone`, `email`, `address`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `tiktok`) VALUES
(1, '+63984205940', 'labonitacosmeticsofficial@gmail.com', '123 Address St. La Bonita Cosmetics', 'https://www.facebook.com/LaBonitaCosmeticsByAnafara/', 'https://twitter.com/LaAnafara', 'https://www.linkedin.com/in/la-bonita-cosmetics-incorporated-ltd-073360232/', 'https://www.instagram.com/la_bonita_cosmetics/', '', 'https://www.tiktok.com/@labonitacosmetics.ph');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `input_name` varchar(100) NOT NULL,
  `input_position` varchar(3000) NOT NULL,
  `input_testi` varchar(5000) NOT NULL,
  `testi_image` varchar(3000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `input_name`, `input_position`, `input_testi`, `testi_image`, `date_created`) VALUES
(3, 'Mattie Smiths', 'Customer', 'Aenean pulvinar dui ornare, feugiat lorem non, ultrices justo. Mauris efficitur, mauris in auctor euismod, quam elit ultrices urna, eget eleifend arcu risus id metus. Maecenas ex enim, mattis eu velit vitae, blandit mattis sapien. Sed aliquam leo et semper vestibulum.', '3.png', '2022-05-24 02:57:51'),
(5, 'Mattie Smiths', 'Customer', 'The only way to learn a new programming language is by writing programs in it. Programmers are mostly \"learn by doing\" types. No amount of academic study or watching other people code can compare to breaking open an editor and start making mistakes.', '3.png', '2022-05-24 02:57:54'),
(7, 'Mattie Smiths', 'Customer', 'Aenean pulvinar dui ornare, feugiat lorem non, ultrices justo. Mauris efficitur, mauris in auctor euismod, quam elit ultrices urna, eget eleifend arcu risus id metus. Maecenas ex enim, mattis eu velit vitae, blandit mattis sapien. Sed aliquam leo et semper vestibulum.', '3.png', '2022-05-25 00:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_archive`
--
ALTER TABLE `products_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products_archive`
--
ALTER TABLE `products_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
