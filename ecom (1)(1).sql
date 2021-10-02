-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 05:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'Makeup', 1),
(4, 'Hair Care', 1),
(6, 'Eyes', 1),
(7, 'Perfumes', 1),
(8, 'Nails', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(8, 'fgsfg', 'g@gmail.com', '01313', 'dkjalkjdkljakj', '2021-07-20 08:55:26'),
(21, 'dad', 'fmariya245@gmail.com', '01313', 'vzv', '2021-07-20 09:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

DROP TABLE IF EXISTS `ordertb`;
CREATE TABLE `ordertb` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(20) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(14, 12, 'st15', 'karachi', 7895, 'cod', 545, 'success', 1, '2021-07-28 09:54:37'),
(15, 12, 'st454', 'Lahore', 4545, 'cod', 45, 'success', 2, '2021-07-28 09:58:47'),
(16, 14, 'kjk', 'lklkl', 56565, 'cod', 12390, 'success', 1, '2021-08-01 09:29:31'),
(17, 14, 'now', 'now 1', 456, 'cod', 14245, 'success', 1, '2021-08-01 10:00:19'),
(18, 14, 'St12', 'Karachi123', 789, 'cod', 550, 'success', 1, '2021-08-01 10:25:53'),
(19, 14, 'lklk', 'lklk', 789, 'cod', 550, 'success', 1, '2021-08-01 10:39:51'),
(20, 14, 'klklk', 'iiii', 78963, 'cod', 45, 'success', 1, '2021-08-01 11:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(4, 14, 19, 1, 545),
(5, 15, 20, 1, 45),
(6, 16, 23, 1, 12345),
(7, 16, 20, 1, 45),
(8, 17, 23, 1, 12345),
(9, 17, 21, 1, 1900),
(10, 18, 24, 1, 550),
(11, 19, 24, 1, 550),
(12, 20, 20, 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(10, 0, 0, 'test 2', 65656, 6565, 2120, '332790298_p1.jpg', 'jdkajkl', 'ajdkjak', 0, 'dakjkjl', 'kalklk', 'kalkl', 1),
(15, 0, 0, 'lklkl', 5454, 5656, 2323, '745768279_Colorist Nail Paint.jpg', ';f,;s,;', 'dfdgfd', 0, 'fgsfgfd', 'fgsgsdf', 'fsgf', 1),
(24, 9, 22, 'Matte Moist Lipstick -127 - Tea Rose', 600, 550, 10, '158618686_829469453_MatteMoistLipstickTeaRose127_360x.jpg', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 1, 'Matte Moist Lipstick -127 - Tea Rose', 'Matte Moist Lipstick -127 - Tea Rose', 'Matte Moist Lipstick', 1),
(25, 9, 22, 'Matte Moist Lipstick -116 - Nude Lips', 600, 550, 10, '232618849_MatteMoistLipstickNudeLips116_360x.jpg', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...\r\nQuantity:', 0, 'Matte Moist Lipstick -116 - Nude Lips', 'Matte Moist Lipstick -116 - Nude Lips', 'Nude Lips', 1),
(26, 9, 22, 'Velvet Lipstick 55 - Magenta', 600, 550, 10, '967536514_VelvetLipstickMagenta_360x.jpg', 'Velvet Lipstick 55 - Magenta is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.', 'Velvet Lipstick 55 - Magenta is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.\r\nVelvet Lipstick 55 - Magenta has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye shadows you can imagine! ST London makeup products are available online.\r\nYou can purchase ST London cosmetics online only on MakeupCityShop.com.', 0, 'Velvet Lipstick 55 - Magenta', 'Velvet Lipstick 55 - Magenta', 'Velvet Lipstick 55', 1),
(28, 6, 2, 'Intense Eyeliner Pen', 300, 280, 20, '669549477_Intense Eyeliner Pen.jpg', 'Intense Eyeliner is a smooth water proof formula that can be used as a pen/marker.', 'Intense Eyeliner is a smooth water proof formula that can be used as a pen/marker, applies smoothly to eyes, stays smudge free and doesn’t cause any irritation.', 1, 'Intense Eyeliner Pen', 'Intense Eyeliner is a smooth water proof formula that can be used as a pen/marker.', 'Eyeliner', 1),
(29, 6, 2, 'Aquacolor Cake Liner - 071 - Black', 1500, 1450, 10, '775978947_Interferenz-071_360x (1).jpg', 'Aquacolor Cake Liner - 071 - Black', 'Aquacolor Interferenz is an iridescent glycerin-based compact make-up, containing no metallic pigments, with pearlescent effects for creation of captivating make-up impressions on face and bodyAquacolor Interferenz is extensively smudge-proof and can be easily removed with soap and waterECARF certified.', 0, 'Aquacolor Cake Liner - 071 - Black', 'Aquacolor Cake Liner - 071 - Black', 'Eyeliner', 1),
(30, 6, 2, 'Sparkling Eye Liner - Turquoise', 900, 860, 10, '185844076_SparklingEyeLinerTurquoise_360x.jpg', 'Sparkling Eye Liner - Turquoise', 'Sparkling Eye Liner is a super-soft easy to glide liquid liner with a shimmery effect and a stay that lasts all day.', 0, 'Sparkling Eye Liner - Turquoise', 'Sparkling Eye Liner - Turquoise', 'Sparkling Eye Liner - Turquoise', 1),
(31, 6, 4, 'Master Smokey Ultra White', 650, 600, 10, '492627948_MasterSmokeyUltraWhite_360x.jpg', 'Master Smokey Ultra White', 'Master Smokey Ultra White is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.', 0, 'Master Smokey Ultra White', 'Master Smokey Ultra White', 'kajal', 1),
(32, 6, 4, 'Oriental Kajal Pencil', 700, 680, 10, '831273110_OrientalKajalPencil_360x.jpg', 'Oriental Kajal Pencil', 'Oriental Kajal Pencil', 1, 'Oriental Kajal Pencil', 'Oriental Kajal Pencil', 'kajal', 1),
(33, 6, 4, 'Master Smokey Deep Black', 800, 780, 20, '172239952_MasterSmokeyDeepBlack_360x.jpg', 'Master Smokey Deep Black', 'Master Smokey Deep Black is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.', 0, 'Master Smokey Deep Black', 'Master Smokey Deep Black', 'kajal', 1),
(34, 6, 4, 'Kajal Pencil', 680, 650, 20, '614506765_KajalPencil_360x.jpg', 'Kajal Pencil', 'Kajal Pencil is a soft waterproof pencil with vitamins and essential oils and a smudge free finish for up to 10', 0, 'Kajal Pencil', 'Kajal Pencil', 'Kajal', 1),
(35, 6, 6, '3D Lights Eye Shadow - Moon Flicks', 650, 600, 20, '761130551_3DLightsEyeShadowMoonFlicks_360x.jpg', '3D Lights Eye Shadow - Moon Flicks', 'This ‘long lasting’ (upto 12 hours) cream-to-powder eyeshadow is easy to apply with an immediate release of color for a full ‘foil finish’ effect.', 1, '3D Lights Eye Shadow - Moon Flicks', '3D Lights Eye Shadow - Moon Flicks', 'Eye Shadow', 1),
(36, 6, 6, '3D Lights Eye Shadow - Opal Dust', 650, 600, 20, '971300087_3DLightsEyeShadowOpalDust_360x.jpg', '3D Lights Eye Shadow - Opal Dust', 'This ‘long lasting’ (upto 12 hours) cream-to-powder eyeshadow is easy to apply with an immediate release of color for a full ‘foil finish’ effect.', 0, '3D Lights Eye Shadow - Opal Dust', '3D Lights Eye Shadow - Opal Dust', 'Eye Shadow', 1),
(37, 6, 6, '3D Lights Eye Shadow - Salmon', 300, 280, 20, '341100781_3DLightsEyeShadowSalmon_360x.jpg', '3D Lights Eye Shadow - Salmon', 'This ‘long lasting’ (upto 12 hours) cream-to-powder eyeshadow is easy to apply with an immediate release of color for a full ‘foil finish’ effect.', 0, '3D Lights Eye Shadow - Salmon', '3D Lights Eye Shadow - Salmon', 'Eye Shadow', 1),
(38, 6, 6, '3D Lights Eye Shadow - Pigeon', 400, 380, 10, '405519593_3DLightsEyeShadowPigeon_360x.jpg', '3D Lights Eye Shadow - Pigeon', 'This ‘long lasting’ (upto 12 hours) cream-to-powder eyeshadow is easy to apply with an immediate release of color for a full ‘foil finish’ effect.', 0, '3D Lights Eye Shadow - Pigeon', '3D Lights Eye Shadow - Pigeon', 'Eye Shadow', 1),
(39, 6, 5, 'Catchy Eyes Mascara (waterproof)', 1500, 1450, 20, '798845575_CatchyEyesMascara_360x.jpg', 'Catchy Eyes Mascara (waterproof)', 'CATCHY EYES WATERPROOF MASCARA provides curved and “cat eye” effect to the lashesThe waterproof formula ensures a totally smudge-free look whatever the weatherThat’s why this mascara is perfect for sports or a dip in the pool.', 1, 'Catchy Eyes Mascara (waterproof)', 'Catchy Eyes Mascara (waterproof)', 'Mascara', 1),
(40, 6, 5, 'Boom Boombastic Crazy Mascara 001', 500, 490, 20, '625918464_GOSBoomBoombasticCrazyMascara001_360x.jpg', 'Boom Boombastic Crazy Mascara 001', 'BOOMBASTIC CRAZY VOLUME MASCARA does it all: adds length and volume to lashes, while keeping them separate with no clumpsBOOMBASTIC CRAZY VOLUME MASCARA creates eye lashes that a makeup artist would be proud ofSuitable for all lashes.', 0, 'Boom Boombastic Crazy Mascara 001', 'Boom Boombastic Crazy Mascara 001', 'Mascara', 1),
(41, 6, 7, 'Eye Lashes - 03 - Scarlet', 1000, 990, 20, '684344900_EyeLashesScarlet3_360x.jpg', 'Eye Lashes - 03 - Scarlet', 'Eye Lashes - 03 - Scarlet is a  most popular false eyelashes. These are a set of double layer lashes that give a dramatic effectMade with soft flexible material, the lashes bend easily with every eye shape.', 0, 'Eye Lashes - 03 - Scarlet', 'Eye Lashes - 03 - Scarlet', 'Eye Lashes', 1),
(42, 6, 7, 'Eye Lashes - 05 - Giselle', 900, 860, 20, '570193244_EyeLashesGiselle5_360x.jpg', 'Eye Lashes - 05 - Giselle', 'Eye Lashes - 05 - Giselle is a most popular false eyelashes. These are a set of double layer lashes that give a dramatic effectMade with soft flexible material, the lashes bend easily with every eye shape.', 1, 'Eye Lashes - 05 - Giselle', 'Eye Lashes - 05 - Giselle', 'Eye Lashes', 1),
(43, 6, 8, 'Sparkling Eye Pencil - Brown', 950, 900, 20, '876997471_SparklingEyePencilBrown_360x.jpg', 'Sparkling Eye Pencil - Brown', 'Sparkling Eye Pencil is a soft blend-able eye pencil that glides on easilyIt gives a sparkling look and is best for sensitive eyes.', 1, 'Sparkling Eye Pencil - Brown', 'Sparkling Eye Pencil - Brown', 'Eye Pencil', 1),
(44, 4, 10, 'Morphosis Color Protect Shampoo 250 ml', 1500, 1450, 20, '272640598_MORPHOSIS_DENSIFYING_SHAMPOO_250-ML_360x.jpg', 'Morphosis Color Protect Shampoo 250 ml', 'Morphosis Color Protect Shampoo is made with coralline anti-fadingIt helps to prevent color discharge from sun aggression, heat, and smog, along with hydrating and protecting the hairIt helps prevent the discharge of the cosmetic color, giving the hair a brighter appearance.', 0, 'Morphosis Color Protect Shampoo 250 ml', 'Morphosis Color Protect Shampoo 250 ml', 'Shampoo', 1),
(45, 4, 10, 'Morphosis Green Daily Shampoo 250 ml', 1600, 1590, 20, '674539038_MORPHOSIS_GREEN_CONDITIONER_250_360x.jpg', 'Morphosis Green Daily Shampoo 250 ml', 'Morphosis Green Daily Shampoo is suitable for all types of hairIt is also ideal for daily cleansing With over 98% of ingredients of natural origin, it is the perfect choice for those looking for a professional moisturizing and gentle shampoo on the skinDoes not contain: gluten, SLES, PEG, PPG, silicones, petrolates,...', 1, 'Morphosis Green Daily Shampoo 250 ml', 'Morphosis Green Daily Shampoo 250 ml', 'Shampoo', 1),
(46, 4, 10, 'Morphosis Repair Shampoo 250 ml', 1400, 1340, 20, '810049749_MORPHOSIS_REPAIR_SHAMPOO_250-ML_360x.jpg', 'Morphosis Repair Shampoo 250 ml', 'Morphosis Repair Shampoo is made with sunflower oilIt restructures damaged hair thanks to super-moisturizing formulas, composed with the best ingredients available from modern cosmetic scienceIt detangles and softens the hair, leaving it shinier and fuller and preparing it for nourishing and repairing treatments.', 0, 'Morphosis Repair Shampoo 250 ml', 'Morphosis Repair Shampoo 250 ml', 'Shampoo', 1),
(47, 4, 1, 'Morphosis Repair Conditioner 250 ml', 900, 860, 20, '826308400_MORPHOSIS_REPAIR_CONDITIONER_250-ML_360x.jpg', 'Morphosis Repair Conditioner 250 ml', 'Morphosis Repair Conditioner is made with sunflower oilIt restructures damaged hair thanks to super-moisturizing formulas, composed with the best ingredients available from modern cosmetic scienceIt does not weigh down and restores combing to damaged stemPerfect for reconditioning and protecting after discoloration, ironing and permanent waves.', 0, 'Morphosis Repair Conditioner 250 ml', 'Morphosis Repair Conditioner 250 ml', 'conditioner', 1),
(48, 4, 1, 'Rigenol Conditioner Jar 100 ml', 700, 680, 20, '906678703_Rigenol_conditioner_500ml_360x.jpg', 'Rigenol Conditioner Jar 100 ml', 'Rigenol is a moisturizing and nourishing hair conditionerIt is a cream that restructures and smoothens the hair fiber, guaranteeing unparalleled softness and shineWash hair with a Framesi shampoo, rinse and towel dryApply RigenolLeave on for 3-5 minutesRinse thoroughly.', 0, 'Rigenol Conditioner Jar 100 ml', 'Rigenol Conditioner Jar 100 ml', 'conditioner', 1),
(49, 4, 0, 'Rigenol Conditioner Jar 50 ml', 400, 380, 20, '297558768_Cream-Jar-100-ML_360x.jpg', 'Rigenol Conditioner Jar 100 ml', 'Rigenol is a moisturizing and nourishing hair conditionerIt is a cream that restructures and smoothens the hair fiber, guaranteeing unparalleled softness and shineWash hair with a Framesi shampoo, rinse and towel dryApply RigenolLeave on for 3-5 minutesRinse thoroughly.', 0, 'Rigenol Conditioner Jar 50 ml', 'Rigenol Conditioner Jar 50 ml', 'conditioner', 1),
(50, 4, 12, 'Sublimis Oil', 1500, 1450, 10, '757032714_MORPHOSIS_SUBLIMIS-OIL_ALL-DAY-MOISTURE-EMULSION_150-ML_360x.jpg', 'Morphosis Sublimis Oil All Day Moisture Emulsion 150 ml', 'Morphosis Sublimis Oil All Day Moisture Emulsion is made with Argan oil and vitaminsIt prevents hair dehydration, preserving its softness and shineMoisturizing spray emulsion for hair for daily useIt regenerates the hair fiber making the hair softer, silky and incredibly manageable, without weighing it downFrom immediate effectiveness, eliminates frizz.', 0, 'Sublimis Oil', 'Morphosis Sublimis Oil All Day Moisture Emulsion 150 ml', 'oil', 1),
(51, 7, 25, 'FA\'RA - Women - Affection', 1500, 1450, 20, '215260187_Affection_360x.jpg', 'FA\'RA - Women - Affection', 'Affection is a sweet, flirty and fun fragrance with notes of lime, pineapple and violet. This scent brings a touch of jasmine, peach and sandalwood. It is for women with a beautiful heart and caring nature.', 0, 'FA\'RA - Women - Affection', 'FA\'RA - Women - Affection', 'perfumes', 1),
(52, 7, 25, 'FA\'RA - Women - Scandal', 6500, 6470, 20, '750939969_Scandal._360x.jpg', 'FA\'RA - Women - Scandal', 'Scandal is a bold fragrance that encaptures your senses, with a rich combination of honey, milk, orange and patchouli. It is the perfect companion to a woman who is glamorous, bossy and beautiful.', 1, 'FA\'RA - Women - Scandal', 'FA\'RA - Women - Scandal', 'perfume', 1),
(53, 7, 25, 'FA\'RA - Women - Black', 5000, 4990, 20, '620461501_Black_360x.jpg', 'FA\'RA - Women - Black', 'With hints of green at the top, Black has a heart of lily and jasmine and is supported by sandalwood and musk. This fragrance is for the women who ooze success and power.', 0, 'FA\'RA - Women - Black', 'FA\'RA - Women - Black', 'perfumes', 1),
(54, 7, 26, 'FA\'RA - Men - Legend Night', 7000, 6700, 25, '397925975_Legend-night_360x.jpg', 'FA\'RA - Men - Legend Night', 'An olfactory creation inspired by a landscape & beautiful island of Maldives, which combines the freshness of multiple Citrus Fruits from Italy, with enveloping notes of Cardamom sublimated by precious duo Vetiver & Amber notes. Legend Night has irresistible sillage, elegant and beastly obsessive. It is designed for the person...', 0, 'FA\'RA - Men - Legend Night', 'FA\'RA - Men - Legend Night', 'perfumes', 1),
(55, 7, 26, 'FA\'RA - Men - Seven', 5000, 4700, 25, '566801439_Seven-1_360x.jpg', 'FA\'RA - Men - Seven', 'Seven artfully combines the fruity notes of peach with citrusy hints of lime and orange along with woody touches of cedar and oak moss. Seven is the scent of a modern man who knows how to strike a balance.', 0, 'FA\'RA - Men - Seven', 'FA\'RA - Men - Seven', 'perfumes', 1),
(56, 8, 18, 'Colorist Nail Paint', 1500, 1450, 25, '452703672_Colorist Nail Paint.jpg', 'Colorist Nail Paint', 'Colorist Nail Paint has a massive range of exciting nail colors that are durable, easy to apply and give the best color with a single application.', 1, 'Colorist Nail Paint', 'Colorist Nail Paint', 'nails', 1),
(57, 8, 18, 'ST London - Colorist Nail Paint - ST064', 400, 380, 25, '134848533_ColoristNailPaintMidnightSkyST064_360x.jpg', 'ST London - Colorist Nail Paint - ST064', 'Colorist Nail Paint has a massive range of exciting nail colors that are durable, easy to apply and give the best color with a single application.', 0, 'ST London - Colorist Nail Paint - ST064', 'ST London - Colorist Nail Paint - ST064', 'nail', 1),
(58, 8, 18, 'ST London - Colorist Nail Paint - ST0645', 300, 280, 10, '672091232_ColoristNailPaintToffeeST026_360x.jpg', 'ST London - Colorist Nail Paint - ST0645', 'Colorist Nail Paint has a massive range of exciting nail colors that are durable, easy to apply and give the best color with a single application.', 0, 'ST London - Colorist Nail Paint - ST0645', 'ST London - Colorist Nail Paint - ST0645', 'nail', 1),
(59, 8, 18, 'Colorist Nail Paint - ST026', 400, 380, 20, '500972730_ColoristNailPaintMinkST059_360x.jpg', 'Colorist Nail Paint - ST026', 'Colorist Nail Paint has a massive range of exciting nail colors that are durable, easy to apply and give the best color with a single application.', 0, 'Colorist Nail Paint - ST026', 'Colorist Nail Paint - ST026', 'nails', 1),
(60, 8, 18, 'Colorist Nail Paint - ST027', 450, 430, 20, '892131711_ColoristNailPaintPowderBlueST068_360x.jpg', 'Colorist Nail Paint - ST026', 'Colorist Nail Paint has a massive range of exciting nail colors that are durable, easy to apply and give the best color with a single application.', 0, 'Colorist Nail Paint - ST026', 'Colorist Nail Paint - ST026', 'nail', 1),
(61, 1, 17, 'Matte Moist Lipstick -127', 1500, 1450, 25, '260983466_829469453_MatteMoistLipstickTeaRose127_360x.jpg', 'Matte Moist Lipstick -127', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 0, 'Matte Moist Lipstick -127', 'Matte Moist Lipstick -127', 'lipstick', 1),
(62, 0, 0, 'Matte Moist Lipstick -nude', 900, 860, 25, '313275206_MatteMoistLipstickNudeLips116_360x.jpg', 'Matte Moist Lipstick -nude', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 1, 'Matte Moist Lipstick -nude', 'Matte Moist Lipstick -nude', 'Lipstick', 1),
(63, 1, 17, 'Matte Moist Lipstick -128', 900, 860, 25, '628283517_MatteMoistLipstickPeachy119_360x.jpg', 'Matte Moist Lipstick -128', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 1, 'Matte Moist Lipstick -128', 'Matte Moist Lipstick -128', 'Lipstick', 1),
(64, 1, 17, 'Matte Moist Lipstick -129', 650, 630, 20, '727915409_MatteMoistLipstickPeachy119_360x (1).jpg', 'Matte Moist Lipstick -129', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 0, 'Matte Moist Lipstick -129', 'Matte Moist Lipstick -129', 'Lipstick', 1),
(65, 1, 13, 'Silk Effect Foundation', 1500, 1450, 25, '520841384_filler foundation.jpg', 'Silk Effect Foundation', 'Silk Effect Foundation is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 0, 'Silk Effect Foundation', 'Silk Effect Foundation', 'foundation', 1),
(66, 1, 13, 'TV Paint Stick - FS 45', 1550, 1525, 30, '313195564_fs45_360x.jpg', 'TV Paint Stick - FS 45', 'TV Paint Stick is a successfully proven cream make-up in stick formThe special base of TV Paint Stick allows gentle make-up application that provides effective covering at the same timeThe Kryolan assortment of more than 25 color nuances for selection is truly extraordinary - which makes this preparation indispensable...', 0, 'TV Paint Stick - FS 45', 'TV Paint Stick - FS 45', 'foundation', 1),
(67, 1, 15, 'Dual Wet & Dry Compact Powder', 1500, 1480, 30, '962056934_DualWetDryCompactPowderIvory_360x.jpg', 'Dual Wet & Dry Compact Powder', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 0, 'Dual Wet & Dry Compact Powder', 'Dual Wet & Dry Compact Powder', 'Powder', 1),
(68, 1, 3, 'Glow - Halo', 900, 860, 20, '418209953_Halo_360x.jpg', 'Glow - Halo', 'ST London is a color cosmetic brand that captures the glamorous side of a woman and gives a complete beauty makeover with its wide range.ST London has it all for you! From the best foundations, the pinkest blush-ons, the perfect sculpt bronzers, the blackest eye liners and all the eye...', 0, 'Glow - Halo', 'Glow - Halo', 'concealer', 1),
(69, 1, 14, 'Blush-On - Dusty Pink', 900, 860, 25, '675340368_Blush-OnDustyPink_360x.jpg', 'Blush-On - Dusty Pink', 'ST London’s Blush On is a creamy and silky powder based blushIt is long lasting and highlight pigmentedA little goes a long wayIt is enriched with avocado oil and vitamin E.', 0, 'Blush-On - Dusty Pink', 'Blush-On - Dusty Pink', 'Blush on', 1),
(70, 1, 14, 'Blush-On - Dark Peach', 700, 680, 25, '738928742_Blush-OnDarkPeach_360x.jpg', 'Blush-On - Dark Peach', 'ST London’s Blush On is a creamy and silky powder based blushIt is long lasting and highlight pigmentedA little goes a long wayIt is enriched with avocado oil and vitamin E.', 0, 'Blush-On - Dark Peach', 'Blush-On - Dark Peach', 'Blush on', 1),
(71, 1, 14, 'Blush-On - Charcoal Brown', 800, 790, 25, '742051828_Blush-OnCharcoalBrown_360x.jpg', 'Blush-On - Charcoal Brown', 'ST London’s Blush On is a creamy and silky powder based blushIt is long lasting and highlight pigmentedA little goes a long wayIt is enriched with avocado oil and vitamin E.', 0, 'Blush-On - Charcoal Brown', 'Blush-On - Charcoal Brown', 'Blush on', 1),
(72, 1, 14, 'Blush-On - Amour', 900, 860, 25, '303629811_I_MBlushing002Amour_360x.jpg', 'Blush-On - Amour', 'ST London’s Blush On is a creamy and silky powder based blushIt is long lasting and highlight pigmentedA little goes a long wayIt is enriched with avocado oil and vitamin E.', 0, 'Blush-On - Amour', 'Blush-On - Amour', 'Blush on', 1),
(73, 1, 16, 'Velvet Touch Foundation Primer Classic', 1500, 1450, 30, '685834465_Velvet-Touch-Foundation-Primer-Classic_360x.jpg', 'Velvet Touch Foundation Primer Classic', 'GOSH COPENHAGEN offers a wide selection of products in different categories: Cosmetics, Fragrances, Hair Care, Face Care, Body CareGOSH Cosmetics are available onlineBuy GOSH makeup products online only at MakeupCityShop.com.', 0, 'Velvet Touch Foundation Primer Classic', 'Velvet Touch Foundation Primer Classic', 'Primer', 1),
(74, 4, 11, 'Decolor B Diamond - 500 g', 2000, 1990, 20, '209043610_decolor_b_diamond_360x.jpg', 'Decolor B Diamond - 500 g', 'Decolor B Diamond is perfect for intense discoloringIt is dust-free and is extremely fastIt makes hair smoother, shiny and more compactIt can decolor up to 7-8 levelsIt works in 20-60 minutesParabens and gluten free.', 0, 'Decolor B Diamond - 500 g', 'Decolor B Diamond - 500 g', 'Hair Color', 1),
(75, 8, 18, 'Colorist Nail Paint - ST020 - Scarlet', 1500, 1450, 20, '318895994_ColoristNailPaintScarletST020_360x.jpg', 'Colorist Nail Paint - ST020 - Scarlet', 'Colorist Nail Paint has a massive range of exciting nail colors that are durable, easy to apply and give the best color with a single application.', 0, 'Colorist Nail Paint - ST020 - Scarlet', 'Colorist Nail Paint - ST020 - Scarlet', 'Nail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 4, 'Conditioner', 1),
(2, 6, 'Eyeliner', 1),
(3, 1, 'Concealers', 1),
(4, 6, 'Kajal', 1),
(5, 6, 'Mascara', 1),
(6, 6, 'Eye Shadows', 1),
(7, 6, 'False Lashes', 1),
(8, 6, 'Eye pencil', 1),
(9, 6, 'Eye Accessories', 1),
(10, 4, 'Shampoo', 1),
(11, 4, 'Hair Dye', 1),
(12, 4, 'Hair Oil & Serum', 1),
(13, 1, 'Foundation', 1),
(14, 1, 'Blush', 1),
(15, 1, 'Powder', 1),
(16, 1, 'Face Primer', 1),
(17, 1, 'Lips', 1),
(18, 8, 'Nail Polish', 1),
(19, 8, 'Nail Treatment', 1),
(20, 9, 'Lip Gloss', 1),
(21, 9, 'Liquid Lipsticks', 1),
(22, 9, 'Lipstick', 1),
(23, 9, 'Lip Crayons', 1),
(24, 9, 'Lip Balm', 1),
(25, 7, 'Women', 1),
(26, 7, 'Men', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(1, 'Sameera', '', 'sammera@gmail.com', '1234545660', '2021-07-04 12:46:40'),
(2, 'MEhnoor', 'hjkhkj', 'ayyan@gmail.com', '032245656565', '2021-07-21 03:11:00'),
(8, 'MEhnoor', '123', 'ayyjkjkjj@gmail.com', '01545', '2021-07-21 04:06:30'),
(9, 'Basit', '123', 'basit@gmail.com', '032245656565', '2021-07-27 05:54:51'),
(10, 'samad', '123', 'samad@gmail.com', '012121131323', '2021-07-27 06:16:42'),
(11, 'dkalkl', '123', 'basit5454@gmail.com', '211212', '2021-07-27 06:17:58'),
(12, 'Maria nasir', '12345', 'ay@gmail.com', '454545', '2021-07-27 06:50:47'),
(13, 'mehn', '123', 'a444y@gmail.com', '1212121', '2021-07-28 11:27:32'),
(14, 'samad', '123', 'mehnoorsiddiqui9@gmail.com', '03227856565', '2021-07-29 04:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(6, 12, 9, '2021-07-28 07:40:58'),
(7, 12, 19, '2021-07-28 07:45:18'),
(8, 9, 20, '2021-07-29 07:00:42'),
(9, 9, 19, '2021-07-29 07:00:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
