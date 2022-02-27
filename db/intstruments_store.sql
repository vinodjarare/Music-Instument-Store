-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 07:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intstruments_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `addr1` varchar(200) NOT NULL,
  `addr2` varchar(200) NOT NULL,
  `pin` int(10) NOT NULL,
  `phone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `token`, `full_name`, `addr1`, `addr2`, `pin`, `phone_no`) VALUES
(6, 1, 'tok_1JChpISGWjnNyG5FdWAPZVol', 'Abhinit Ingole', 'Somewhere over the rainbow', 'Clouds', 756142, '8654231246'),
(8, 24, 'tok_1JCn4zQBSPKF2LbTid', 'John Ripper', 'Downtown, townhall', 'Big City', 432121, '9975434687'),
(11, 18, 'tok_1JCmrVSGWjnNyG5Fp4FaUy5Z', 'Vinod Jarare', 'At Post Hatti', 'Sillod, Auranagabad', 763468, '7752315354'),
(12, 18, 'tok_1JCBaPfsCgAqojJ7Sd', 'Vinod Jarare', 'Usmanpura', 'Aurangabad', 431001, '4536875614');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` int(50) NOT NULL,
  `password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(20) NOT NULL,
  `brand_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(9, 'Ibanez'),
(10, 'Gibson'),
(11, 'Ernie Ball'),
(12, 'Yamaha'),
(13, 'Stentor'),
(14, 'Cort'),
(15, 'Fender'),
(16, 'Taylor'),
(17, 'Evans'),
(18, 'Sonor'),
(19, 'Squier');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `pro_id`, `qty`) VALUES
(36, 0, 0, 0),
(37, 0, 0, 0),
(38, 0, 0, 0),
(41, 0, 0, 0),
(45, 0, 0, 0),
(46, 0, 0, 0),
(52, 0, 0, 0),
(55, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Guitars'),
(4, 'Piano'),
(11, 'Strings'),
(12, 'Percussions');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `type`, `password`, `first_name`, `last_name`, `email_id`, `mobile_no`, `image`, `activate_code`, `status`, `created_on`) VALUES
(1, '', 0, '$2y$10$S3RTTO7lSSicCGW.EBrgyeHfKiFMgKt2Z1KDFMEMimDHgCJ05ju7O', 'John', 'Ripper', 'john55@mail.com', '2147483647', '', 'YcyzuqfhaXAT', 0, '2021-05-26'),
(2, '', 0, '$2y$10$S2hhFr.jOkn85aWtUD3DzuD/4aWo9ZQkR99JlcPrAxRQTFpb88WHW', 'first', 'last', 'lastfirst@mail.com', '2147483647', '', 'vrB3LMyeKFQ5', 0, '2021-05-26'),
(15, '', 0, '$2y$10$v2skgESyQ099zqJYdOvLpulVfTcHo9X6IqBN74lERgGalMOxuHSTa', 'Lee', 'Wong', 'leewong@mail.com', '2147483647', '', '7gU1Wkj9C2Rm', 0, '2021-06-03'),
(16, '', 1, '$2y$10$YUVvQoiwbjTJpGlUWnywqu8Smpji8evNBDkAZ3ur97v1x3BIoRT62', 'Abhinit', 'Ingole', 'r00t666@protonmail.com', '2147483647', '', 'JRHMXjUlVW6N', 0, '2021-06-08'),
(17, '', 0, '$2y$10$l0OP3fA3ggZzlgtIK6KbHeilvHBqHqcpgQe45KCBB65JyRtu/Z5Te', 'Jerry', 'Catrall', 'test@example.com', '2147483647', '', 'iIMulkQ2pR6N', 0, '2021-06-18'),
(18, '', 0, '$2y$10$BoOWwUU.C2aR3x8B.L0Z4.AdZZiYC.g.Ux.lTjVI5COjq6Rops1uu', 'Vinod', 'Jarare', 'vsjarare@gmail.com', '8649458656', '', 'CMhGgUfwaR6D', 0, '2021-07-08'),
(21, '', 0, '$2y$10$ncp.KJf5A99AXC3gZfCRB.0tWG4fYMHDhDgTdtP3vX1cNrsTDn7tS', 'Leon', 'Kennedy', 'vkjarare@gmail.com', '2147483647', '', 'SDVzPdBxwv36', 0, '2021-07-08'),
(22, '', 0, '$2y$10$tjF3Er8h7CY764/YSDqnVOCaYysQrVqfy8NG1e4KuWq2KlaaV6Aj2', 'Leon', 'Kennedy', 'vnjarare@gmail.com', '2147483647', '', 'yV4f7BA81RJh', 0, '2021-07-08'),
(24, '', 0, '$2y$10$P1wuUdbEul/tSS6LvZ2Z3.N/GwD7/uA9UnLTHsEU0Ryq4F4bqOEAK', 'Test', 'Test', 'fileker370@jq600.com', '8649458656', '', 'LZEQ7gTGN8an', 0, '2021-07-08'),
(26, '', 0, '$2y$10$qth8seeSANPXyVLs9Y9GX.oYL/qXjPVTJORr7PdsLV/Hez4gjgz22', 'Toto', 'Toto', 'gejoxif729@beydent.com', '8649458656', '', 'NCD8mWVGlSBo', 0, '2021-07-08'),
(27, '', 0, '$2y$10$oFH.yQctbAupDblSVBQUfOdT3LQNoAyAVmHxRyj8Q45rWzr19z0j2', 'Name', 'Surname', 'name@info.com', '7854895452', '', 'xyaGWOUHr6Z4', 0, '2021-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `pro_id`, `qty`) VALUES
(3, 6, 5, 1),
(4, 7, 3, 1),
(5, 9, 7, 1),
(6, 9, 3, 1),
(7, 10, 5, 1),
(8, 11, 6, 1),
(9, 12, 6, 1),
(10, 12, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `first_name`, `last_name`, `subject`, `message`) VALUES
(7, 'ARSHIYA KHANUM', 'KHAN', 'Feedback', 'Test message for feedback.');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `img_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `pro_id`, `img_name`) VALUES
(10, 3, 'Stentor SR1884 Violin Arcadia Antik.jpg'),
(11, 3, 'Stentor Student 2 Violin Outfit, 3_4, main.png'),
(12, 3, 'Stentor Violin Reviews - Best Music Instruments & Tools(1).png'),
(13, 3, 'Stentor Violin Reviews - Best Music Instruments & Tools.jpg'),
(14, 3, 'stentor_1.jpg'),
(15, 1, 'musicman.png'),
(16, 2, 'Big Black Grand Piano Transparent Clipart.png'),
(17, 2, 'concert grand piano yamaha obj(3).jpg'),
(18, 2, 'concert grand piano yamaha obj(4).jpg'),
(19, 2, 'concert grand piano yamaha obj.jpg'),
(20, 4, 'Cort Aacoustic Guitar 1.jpg'),
(21, 4, 'Cort Aacoustic Guitar 2.png'),
(22, 4, 'Cort Aacoustic Guitar 3.jpg'),
(23, 4, 'Cort Aacoustic Guitar 4.png'),
(24, 4, 'Cort Aacoustic Guitar 5.jpg'),
(25, 5, 'Evans SoundOff Bass Drum Head 22 in_(1).jpg'),
(26, 5, 'Evans SoundOff Bass Drum Head 22 in_.jpg'),
(27, 5, 'Evans SoundOff Bass Drumhead, 20.jpg'),
(28, 6, 'guitar-tele-1.webp'),
(29, 6, 'guitar-tele-2.webp'),
(30, 6, 'guitar-tele-3.webp'),
(31, 6, 'guitar-tele-4.jpg'),
(32, 6, 'guitar-tele-5.webp'),
(33, 7, 'fender-acoustic.png'),
(34, 7, 'fender-acoustic-sm.png'),
(35, 7, 'fender-cd-60-1.webp'),
(36, 7, 'fender-cd-60-2.webp'),
(37, 7, 'fender-cd-60-3.jpg'),
(38, 8, 'Gibson Acoustic 1.jpg'),
(39, 8, 'Gibson Acoustic 2.jpg'),
(40, 8, 'Gibson Acoustic 3.png'),
(41, 8, 'Gibson Case 2.jpg'),
(42, 9, 'Taylor Acoustic Guitar 1.jpg'),
(43, 9, 'Taylor Acoustic Guitar 2.jpg'),
(44, 9, 'Taylor Acoustic Guitar 3.jpg'),
(45, 9, 'Taylor Acoustic Guitar 4.jpg'),
(46, 9, 'Taylor Acoustic Guitar 5.jpg'),
(47, 10, 'Sonor Bass Drum.jpg'),
(48, 10, 'Sonor Jojo Mayer Perfect Balance Single Bass Drum Pedal w_Bag.png'),
(49, 10, 'SONOR Jojo Mayer Perfect Balance Single Bass Drum Pedal with Gig Bag(1).jpg'),
(50, 10, 'SONOR Jojo Mayer Perfect Balance Single Bass Drum Pedal with Gig Bag.jpg'),
(51, 10, 'Sonor Vintage Series 22x14 Bass Drum w_ Mount In Vintage Pearl(1).png'),
(52, 10, 'Sonor Vintage Series 22x14 Bass Drum w_ Mount In Vintage Pearl.png'),
(53, 11, 'Yamaha 18 x 14 8300 Field-Corps Marching Bass Drum with MonoPosto Carrier and Stand (MB-8318ASH).jpg'),
(54, 11, 'Yamaha 26 x 14 8300 Series Field-Corps Marching Bass Drum Black Forest eBay.jpg'),
(55, 11, 'Yamaha DH-BR-1224 24 Marching Bass Drum Head White.jpg'),
(56, 11, 'Yamaha FPDS2A Hardware Package w_ DS550U Drum Throne & FP6110A Bass Drum Pedal - Walmart_com.jpg'),
(57, 11, 'Yamaha RS-1418 Rim Saver for Marching Bass 14-18\'\'.jpg'),
(58, 11, 'Yamaha TMP2F4 Tour Custom Shell Kit.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `sale_date` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `pay_id`, `amount`, `payment_method`, `sale_date`, `time`) VALUES
(6, 1, 'tok_1JChpISGWjnNyG5FdWAPZVol', 28998, 'Payment via Card', '2021-07-13', '2021-07-13 09:22:55'),
(9, 24, 'tok_1JCn4zQBSPKF2LbTid', 31989, 'Cash On Delivery', '2021-07-13', '2021-07-13 14:42:09'),
(10, 18, 'tok_1JCmrVSGWjnNyG5Fp4FaUy5Z', 2500, 'Payment via Card', '2021-07-13', '2021-07-13 14:45:32'),
(11, 18, 'tok_1JCBaPfsCgAqojJ7Sd', 11499, 'Cash On Delivery', '2021-07-13', '2021-07-13 16:26:01'),
(12, 1, 'tok_1JDDImSGWjnNyG5FrgjLVTS1', 28489, 'Payment via Card', '2021-07-14', '2021-07-14 18:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_overview` text NOT NULL,
  `product_history` text NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(100) DEFAULT NULL,
  `sale_price` int(100) NOT NULL,
  `stock` int(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `subcat_id`, `brand_id`, `product_name`, `product_overview`, `product_history`, `product_description`, `product_price`, `sale_price`, `stock`, `slug`) VALUES
(1, 1, 24, 11, 'Ernie Ball Music Man - Enchanted Forest', '', '', '<h2>Petrucci\'s Reign of Shred Lives on</h2><p>Ernie Ball and John Petrucci (Dream Theater) have once again pushed the envelope with the latest Ernie Ball Music Man John Petrucci Majesty 6. The sleek body style utilizes a neck-through design to give you huge sustain and killer tone. Couple that with premium tonewoods, DiMarzio pickups with onboard piezo option, a tremolo bridge, and custom switching, and you have a guitar that\'s ready to rock any stage. The Ernie Ball Music Man John Petrucci Majesty 6 represents an evolution in a long line of shred machines from the prolific artist and guitar company. Call your Sweetwater Sales Engineer to learn more about this amazing instrument.</p><h3>Comfortably contoured</h3><p>The Ernie Ball Music Man John Petrucci Majesty 6 makes you a master of your tonal universe. Its comfortable contours are built on a mahogany neck-through design with a maple-capped African mahogany body — a rich tonal cocktail that gives you warmth and resonance you might not expect from a solidbody. It also provides you with a massive amount of sustain.</p><h3>Equipped for any style</h3><p>Two hand-picked DiMarzio humbuckers — a Dreamcatcher bridge and a Rainmaker neck — take the Ernie Ball Music Man John Petrucci Majesty 6 from chimey cleans to fearsome, face-melting shred. But there\'s more: a custom piezo floating vibrato bridge lets you engage in vigorous whammy action with absolute tuning integrity while affording access to a range of gorgeous, nuanced acoustic sounds. Tonally speaking, there\'s very little this exquisite axe can\'t do for you. Guitar experts at Sweetwater agree: if you\'re after versatility, the Ernie Ball Music Man John Petrucci Majesty 6 is sure to please.</p><h3>Schaller locking tuners deliver perfect pitch</h3><p>The Majesty 6\'s headstock is adorned with Schaller M6-IND locking tuners to make string changes a cinch. Just insert the string, tighten the clamp screw, and tune it up to pitch. Strings won\'t be wound around the shaft, so your tuning will be reliable no matter how hard you play.</p>', 250000, 0, 2, 'edit-name'),
(2, 4, 25, 12, 'Yamaha Grand Piano CFX', '<p>Key Surfaces<br id=\"isPasted\">White: Acrylic resin, Black: Phenolic resin<br>Music Desk Positions &nbsp; &nbsp; 5<br>Lid Prop Positions &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2<br>Lid Edge &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Square<br>Center Pedal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Bass sustain<br>Cabinet Finishes &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Polished Ebony, Polished American Walnut, Polished Mahogany, French Provincial Cherry and Georgian Mahogany<br>Also available as: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Disklavier Mark III Series: DGB1CD, Disklavier E3 Series: DGB1KE3<br><br>Length &nbsp; &nbsp;5&#39; 0&quot; (151 cm)<br>Width &nbsp; &nbsp; &nbsp;57&quot; (146 cm)<br>Height &nbsp; &nbsp; 39&quot; (99 cm)<br>Weight &nbsp; &nbsp;574 lbs. (261 kg.)</p>', '', '<p>The nine-foot CFX is a full size concert grand piano characterized by a powerful bass, a wide palette of tonal colors, and the ability to create the subtlest musical expression. The sound is rich yet clear in all registers, and can be heard over the sound of a symphony orchestra, even in very large concert halls. The CFX is Yamaha&rsquo;s flagship model, and it marks a new milestone in the history of fine piano manufacturing.</p><p>The unique characteristics of natural materials such as wood and felt or changes in temperature and other weather conditions. The success of the developers is measured in terms of how well the grand piano becomes one with the pianist</p><p>Unparalleled in their beauty and musical range, grand pianos are the ultimate expression of the piano maker&#39;s art. Embodying over 100 years of accumulated expertise, these instruments epitomize the quality, performance and value for which Yamaha has long been renowned, as we enter the second century of Yamaha grand pianos.<br id=\"isPasted\"><br>&nbsp; &nbsp; Advanced scale design<br>&nbsp; &nbsp; Solid spruce soundboard and ribs<br>&nbsp; &nbsp; Solid maple bridge and caps<br>&nbsp; &nbsp; Solid copper wound bass strings<br>&nbsp; &nbsp; Soft-Close&trade; fallboard<br>&nbsp; &nbsp; Aluminum alloy action rails<br>&nbsp; &nbsp; Yamaha balanced action<br>&nbsp; &nbsp; Solid spruce keys with hardwood buttons<br>&nbsp; &nbsp; Premium Yamaha designed hammers with T-fasteners<br>&nbsp; &nbsp; Reinforced keyframe Pin with adjustable guide<br>&nbsp; &nbsp; Hardwood reinforced keyframe<br>&nbsp; &nbsp; Bass sustain<br>&nbsp; &nbsp; Cut thread tuning pins<br>&nbsp; &nbsp; Polyester finish<br>&nbsp; &nbsp; Resin sheet foundation<br>&nbsp; &nbsp; Lid prop stopper<br>&nbsp; &nbsp; Solid brass casters<br>&nbsp; &nbsp; Vacuum Shield Mold Process (V-Pro) plate<br>&nbsp; &nbsp; Seasoned for destination</p><p><br></p>', 200000, 0, 1, 'yamaha-grand-piano-cfx'),
(3, 11, 26, 13, 'Stentor Student 2 Violin', '<h4><strong>Key Features</strong></h4><p>&nbsp; &nbsp;Multi-award winning student instrument<br>&nbsp; &nbsp;Carved tonewoods offer beautiful tone<br>&nbsp; &nbsp;Includes lightweight case and quality wood bow<br>&nbsp; &nbsp;Discover Stentor\'s best selling violin</p><h4><strong>Stentor Student 2 Violin Outfit, Full Size Overview</strong></h4><p>The Student 2 violin full size has long been regarded as one of the best student instruments available. As with all Stentor products, the Student 2 full size is built to keep up with the busy lifestyle of a music student.<br>Warm and bright tones are clearly projected by the carved spruce body with maple back and sides. The traditional inlaid purfling and natural finish give the violin a classic look. The ebony fingerboard has a consistent feel for long-lasting, comfortable performances. The Stentor Student 2 Violin outfit also includes a quality bow and lightweight case, providing everything needed to continue your development.</p>', '<h4><strong>Specifications</strong></h4><p><strong>Body &amp; Bridge</strong></p><p>&nbsp; &nbsp;Top: Spruce<br>&nbsp; &nbsp;Back: Maple<br>&nbsp; &nbsp;Side and Ribs: Maple<br>&nbsp; &nbsp;Bridge: Stentor Bridge<br>&nbsp; &nbsp;Finish: Natural</p><p><strong>Neck &amp; Fingerboard</strong></p><p>&nbsp; &nbsp;Neck: Maple<br>&nbsp; &nbsp;Fingerboard: Ebony</p><p><strong>Hardware</strong></p><p>&nbsp; &nbsp;Tuning Pegs: Ebony<br>&nbsp; &nbsp;Top Nut: Ebony<br>&nbsp; &nbsp;Chin Rest: Included<br>&nbsp; &nbsp;Strings: Rope Core<br>&nbsp; &nbsp;Included Accessories: Bow and Lightweight Case</p>', '', 16990, 0, 4, 'stentor-student-2-violin'),
(4, 1, 19, 14, 'Cort AD810 Mahogany', '<h4>Key Features</h4><p><strong>Spruce Top</strong><br>The AD810 features a spruce top for a resonate tone that actually improves with age.</p><p><strong>Mahogany Back &amp; Sides</strong><br>The mahogany back and sides give great sound projection.</p><p><strong>Die Cast Tuners</strong><br>Die cast sealed tuners give excellent tuning stability.</p>', '', '<h4>SPECIFICATIONS</h4><p><br>Construction: Dovetail Neck Joint<br>Body: Dreadnought<br>Neck: Mahogany<br>Binding: Black<br>Fretboard: Rosewood<br>Scale: 25.6\" (650mm)<br>Inlay: White Dot<br>Rosette: Decal<br>Bridge: Rosewood<br>Strings: Jumbo 6ST(012,016,024,038,041,052)<br>Bracing: Advanced X Bracing<br>Gig Bag: Included<br>Colour Brown<br>Top Material Type Engineered Wood<br>Body Material Rosewood<br>Back Material Type Mahogany<br>About this item<br>The standard series is a collection of acoustics that deliver great value<br>They benefit from cort\'s 50 years of experience building fine instruments<br>The ad810 features a laminate spruce top, mahogany back and sides, rosewood fretboard, mahogany neck, die cast tuners and rosewood bridge<br>Mahogany neck and rosewood fretboard<br>Rosewood bridge</p>', 9999, 0, 5, 'edit-name'),
(5, 12, 30, 17, 'Evans SoundOff Bass Drum Head', '<h4><strong>Specifications</strong></h4><p><br>Dimensions (Overall): 23.13 inches (L), 1.1 inches (H) x 23.13 inches (W) x 23.13 inches (D)<br>Weight: 1.7 pounds<br>Package Quantity: 1<br>Warranty: No Applicable Warranty. To obtain a copy of the manufacturer\'s or supplier\'s warranty for this item prior to purchasing the item, please call Target Guest Services at 1-800-591-3869<br>TCIN: 78991441<br>UPC: 019954287467<br>Origin: made in the USA or imported</p>', '<p><strong>Highlights</strong></p><p>&nbsp; &nbsp;Perfect for electronic trigger setup<br>&nbsp; &nbsp;Single-ply of a unique mesh material<br>&nbsp; &nbsp;Greatly reduces volume of drum</p><p><strong>Description</strong><br>Whether \'re looking for a low volume practice setup for apartment, or an electronic trigger setup for a gig, Evans SoundOff drum heads have covered. These drum heads are made using a single-ply of a unique mesh material, dramatically reducing the amount of volume a drum produces when struck.For over 60 years, Evans has been an innovator in drum head manufacturing and design. As the creator of the first synthetic drum head and other revolutionary products such as EMAD, Hydraulics, and the UV1 series, Evans drum heads are designed with the intent of solving problems for drummers. Regarded for high quality and consistency all Evans drum heads are made in the USA and feature Level 360 Technology.</p>', '', 2500, 0, 10, 'evans-soundoff-bass-drum-head'),
(6, 1, 24, 19, 'Squier Bullet Telecaster LE', '<h3>A great introduction to the Fender family.</h3><p>The Bullet Tele is a simple, affordable and practical guitar designed for beginners and students. A perfect choice for a first guitar no matter who you are or what style of music you want to learn. Featuring the classic features that made the Tele one of the world’s favorite guitars, the Bullet Tele is a great introduction to the Fender family. Case sold separately.</p><p>Key Features<br>• Maple neck with “C”-shaped profile<br>• 21-fret Indian laurel fingerboard<br>• 2 single-coil Telecaster pickups with three-way switching<br>• Vintage-inspired 6-saddle Bridge</p>', '', '<h3>Features</h3><p><strong>Body</strong></p><ul><li>Body shape: Single cutaway</li><li>Body type: Solid body</li><li>Body material: Solid wood</li><li>Top wood: Not applicable</li><li>Body wood: Basswood</li><li>Body finish: Polyurethane</li><li>Orientation: Right handed</li></ul><p>&nbsp;</p><p><strong>Neck</strong></p><ul><li>Neck shape: C</li><li>Neck wood: Maple</li><li>Joint: Bolt-on</li><li>Scale length: 25.5 in.</li><li>Truss rod: Standard</li><li>Neck finish: Polyurethane</li></ul><p>&nbsp;</p><p><strong>Fretboard</strong></p><ul><li>Material: Indian Laurel</li><li>Radius: 9.5 in.</li><li>Fret size: Medium jumbo</li><li>Number of frets: 21</li><li>Inlays: Dot</li><li>Nut width: 1.65 in. (42 mm)</li></ul><p>&nbsp;</p><p><strong>Pickups</strong></p><ul><li>Configuration: SS</li><li>Neck: Standard Single-Coil Tele</li><li>Middle: Not applicable</li><li>Bridge: Standard Single-Coil Tele</li><li>Brand: Squier</li><li>Active or passive pickups: Passive</li><li>Series or parallel: Series</li><li>Piezo: No</li><li>Active EQ: No</li><li>Special electronics: None</li></ul><p>&nbsp;</p><p><strong>Controls</strong></p><ul><li>Control layout: Master volume, tone</li><li>Pickup switch: 3-way</li><li>Coil tap or split: No</li><li>Kill switch: No</li></ul><p>&nbsp;</p><p><strong>Hardware</strong></p><ul><li>Bridge type: Fixed</li><li>Bridge design: 6-saddle vintage-style</li><li>Tailpiece: Not applicable</li><li>Tuning machines: Die-cast</li><li>Color: Chrome</li></ul><p>&nbsp;</p><p><strong>Other</strong></p><ul><li>Number of strings: 6-string</li><li>Special features: Slim (42mm) Body Profile, Traditional Tele Headstock Shape, White Dot Position Inlays</li><li>Case: Sold separately</li><li>Accessories: None</li><li>Country of origin: Indonesia</li></ul>', 11499, 0, 4, 'edit-name'),
(7, 1, 19, 15, 'Fender CD-60 Dreadnought V3', '<h3>An excellent choice for aspiring guitarists looking for their first instrument.</h3><p>The CD-60 dreadnought V3 boasts features you’d expect on much more expensive instruments, with a spruce top and choice of natural, sunburst and black finishes. If you\'re a beginning guitar player, the best choice you can make is getting a guitar with a sound and feel that will inspire you to keep playing. The CD-60 dreadnought V3 is that guitar. This affordable genuine Fender provides nicely balanced tone and plenty of volume thanks to its dreadnought body style and spruce top with scalloped \"X\"-bracing. The CD-60 dreadnought V3 is also an excellent choice for veteran players who need an inexpensive second dreadnought model, and it includes a hardshell case for safe and convenient transport.<br><br><strong>Fender Coated Strings</strong><br>Simply put, coated strings sound better and last longer. Your strings are where the rubber meets the road, so to speak, and they’re continually exposed to dirt, grime, the vagaries of climate and oxidation, and more. Fender coated strings resist all of this tone-deadening unpleasantness with marvelously smooth feel, improved resistance to corrosion and longer life.<br><br><strong>Graph Tech Nut and Bridge Saddle</strong><br>Graph Tech string nuts and bridge saddles enhance the sustain, clarity and tonal consistency of an acoustic instrument. Neither too soft nor too brittle, they eliminate troublesome string binding, and they deliver performance, workability and appearance that easily outdo other plastics and come remarkably close to real bone.<br><br><strong>Scalloped Bracing</strong><br>Scalloped bracing is thinner than more conventional bracing. That means that the bracing pattern inside the guitar uses less wood, which means that soundboard mass is reduced. This lets the top resonate more freely, resulting in better tone with more nuance and greater projection.<br>&nbsp;</p><h3>Features</h3><ul><li>Dual-action truss rod</li><li>Pearloid dot inlays</li><li>White bridge pins with black dots</li><li>Chrome hardware finish</li><li>1-ply black pickguard</li><li>Fender Dura-Tone 880L (.012-.052 Gauge) strings</li><li>Crushed acrylic rosette</li></ul><p>Get started on a fun Fender. Order today.</p>', '', '<h3>CD-60 Dreadnought V3 Acoustic Guitar Specifications:</h3><p><strong>Body</strong></p><ul><li>Body type: Dreadnought</li><li>Top wood: Laminated spruce</li><li>Back and sides: Laminated mahogany</li><li>Bracing pattern: Scalloped X</li><li>Body finish: Gloss polyurethane</li></ul><p><strong>Neck</strong></p><ul><li>Neck shape: C</li><li>Nut width: 1.69\" (43 mm)</li><li>Fingerboard: Walnut</li><li>Neck wood: Mahogany</li><li>Scale length: 25.3\"</li><li>Neck finish: Gloss</li></ul><p><strong>Electronics</strong></p><ul><li>Pickup/preamp: No</li></ul><p><strong>Other</strong></p><ul><li>Tuning machines: Die-cast</li><li>Bridge: Walnut</li><li>Saddle and nut: GraphTech NuBone</li><li>Case: Hardshell case</li><li>Country of origin: Indonesia</li></ul>', 14999, 0, 0, 'edit-name'),
(8, 1, 19, 10, 'Gibson Eric Church Hummingbird', '<h4>Overview</h4><p>Hand-crafted in Gibson\'s acoustic facility in Bozeman, Montana, Eric Church\'s groundbreaking new acoustic, Hummingbird Dark, is a result of Church\'s personal artistic vision. With its translucent Ebony Burst lacquer finish, dark mother of pearl fingerboard inlay, black body binding, and a matching new Hummingbird Dark pickguard, this Limited Edition acoustic makes a powerful statement. Upgraded performance features include a more slender 4\'\' body depth for a superior tonal balance and an LR Baggs VTC pickup for completely natural acoustic sound reproduction when amplified.</p>', '<p>Since the early 1900s, Gibson has been inspiring people of all ages to pick up an acoustic guitar. Today, the Gibson name is legendary for impeccable sound quality, easy playability and solid construction of their 6-string acoustic guitars, and this section has many exceptional options to choose from.</p><p>Trends may come and go, but one thing is certain: The simple beauty of a Gibson 6-string acoustic guitar will forever be found in the hands of enthusiastic music fans. From the hand-buffed and high-gloss finishes to the exquisitely-crafted exotic woods, the 6-string acoustic guitars in this catalog aren\'t just musical instruments, they\'re works of art. In fact, it\'s also for this reason that Gibson acoustic guitars are constantly favored by famous musicians and recording artists, including Arlo Guthrie, Sheryl Crow, and Elvis Costello.</p><p>For a updated version of one of Gibson\'s most admired guitar models, the Gibson Hummingbird pro acoustic-electric is sure to please the ears, eyes and hands of any budding singer-songwriter. First introduced in 1960, it didn\'t take long for this acoustic-electric to become a legend thanks to its versatile nature, and ability to sound superb in a wide range of genres. Consisting of a thoroughly balanced mid-range tone with crystal-clear treble registers and rich lows, the Gibson Hummingbird pro acoustic-electric will most certainly take your guitar-playing skills to the next level. Another popular item is the Gibson J-45 True Vintage Red Spruce acoustic guitar. Upon this instrument\'s debut in 1942, the J-45 became an instant favorite due its warm sound and huge projection. Featuring highly prized tonewood, and made with hot hide glue just like it was in its early days, you\'ll never want to put down this classic American workhorse.</p><p>You don\'t have to have aspirations of stardom to justify the purchase a well-built acoustic guitar, but when you go with a 6-string acoustic guitar from Gibson, you\'ll notice quickly how easy it is to stand out from the pack. Whether you\'re looking for a vintage sunburst jumbo or a custom acoustic-electric, Gibson\'s extensive lineup of 6-string acoustic guitars has something to reflect every style and taste, which is why the Gibson name continues to be so renowned worldwide.</p>', '<h3>Eric Church Hummingbird Dark Specifications</h3><h4>Body</h4><p><strong>Body Shape &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Square Shoulder</p><p><strong>Top &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Sitka spruce</p><p><strong>Back &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Mahogany</p><p><strong>Bracing &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Traditional Hand Scalloped X-bracing</p><p><strong>Binding &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Black binding top and back</p><h4>Neck</h4><p><strong>Material &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Mahogany</p><p><strong>Profile &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Round Profile</p><p><strong>Fingerboard Material &nbsp;</strong>Rosewood</p><p><strong>Fingerboard Radius</strong></p><p><strong>Number Of Frets &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>20</p><p><strong>Nut Material &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Black</p><p><strong>Inlays &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Black Pearl Parallelograms</p><p><strong>Joint &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Compound Dovetail Neck-to-body</p><h4>Hardware</h4><p><strong>Tuner Plating &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Nickel</p><p><strong>Bridge &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Rosewood belly up, Tusq saddle</p><p><strong>Tuning Machines &nbsp; &nbsp; &nbsp; &nbsp;</strong>Grover Rotomatic</p><h4>Electronics</h4><p><strong>Under Saddle Pickup </strong>LR Baggs™ VTC</p><h4>Miscellaneous</h4><p><strong>Case &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Gibson Hardshell</p>', 250000, 0, 0, 'edit-name'),
(9, 1, 3, 16, 'Taylor 241CE Acoustic Grand Auditorium', '<h4>Overview</h4><p>Taylor 214ce BLK DLX Grand Auditorium Acoustic-Electric Guitar Black Crisp white binding on a full-gloss all-black body highlights the contours of this eye-catching all-black 200 Series Deluxe Grand Auditorium. A solid Sitka spruce top helps project clear balanced tone and a Venetian cutaway broadens your tonal range by offering easy access to the upper register. When you’re ready to plug in Taylor’s proprietary Expression System electronics will respond with articulate amplified tone.</p>', '<h4>214ce</h4><p>Grand Auditorium guitars from the 200 Series have always been a hit with players of all skill levels and styles, and the latest edition of the 214ce brings more of the crisp acoustic tone and smooth feel that musicians have come to expect from a Taylor. Layered Indian rosewood forms the back and sides here, with a solid Sitka spruce top that helps this guitar produce vibrant highs and a resonant, warm low end. That tonal balance makes this guitar an all purpose musical tool, versatile enough to pump out powerful cowboy chords and articulate enough to perform beautifully in more subtle styles such as flatpicking or fingerpicking. Appointments include crisp white binding, a three-ring rosette, and a Venetian cutaway for easy access to the higher notes on the fretboard. The guitar ships with ES2 electronics for organic, clean tone in amplified situations, and comes with a sturdy padded gig bag.</p>', '<h4>Highlights</h4><p><strong>Scale Length &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>25-1/2\"</p><p><strong>Nut &amp; Saddle &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Nubone Nut/Micarta Saddle</p><p><strong>Bracing &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>X Bracing</p><p><strong>Truss Rod Cover &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Black Plastic</p><p><strong>Pickguard &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Tortoise</p><p><strong>Number of Frets &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>20</p><p><strong>Tuners &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Die-Cast Chrome</p><p><strong>Case &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Gig Bag</p><p><strong>Brand of Strings &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Elixir Phosphor Bronze Light</p><p><strong>Body Length &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>20\"</p><p><strong>Body Width &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>16\"</p><p><strong>Body Depth &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>4 5/8\" Body</p><p><strong>Binding/Edge Treatment &nbsp; &nbsp;</strong>None</p><p><strong>Top Finish &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Satin</p><p><strong>Back Config &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Layered</p><p><strong>Backstrap Finish &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>None</p><p><strong>Rosette Size &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Three Ring</p><p><strong>Bridge Inlay &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>None</p><p><strong>Back/Side Finish &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Satin</p><p><strong>Armrest Binding &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>None</p><p><strong>Backstrap Wood &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>None</p><p><strong>Rosette Mat. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Plastic</p><p><strong>Stain/Sunburst &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>None</p><p><strong>Wedge &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>None</p><p><strong>Armrest &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>no Neck</p><p><strong>Neck Width &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>1-11/16\"</p><p><strong>Fretboard Inlay &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>4mm Dot Italian Acrylic</p><p><strong>Fretboard Binding/Edge Treatment &nbsp;</strong>None</p><p><strong>Heel Cap Binding &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>White</p><p><strong>Type of Neck Joint &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Taylor Neck</p><p><strong>Neck/Heel &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Tropical Mahogany</p><p><strong>Fretboard Wood &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><a href=\"https://www.taylorguitars.com/ebonyproject\">West African Crelicam Ebony</a></p><p><strong>Neck Finish &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Satin</p><p><strong>Heel Length &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>3-1/2\" Peghead</p><p><strong>Peghead Finish &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Satin</p><p><strong>Peghead Binding &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>None</p><p><strong>Peghead Type &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Standard</p><p><strong>Peghead Purfling &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>None</p><p><strong>Headstock Overlay &nbsp; &nbsp; &nbsp; &nbsp;</strong><a href=\"https://www.taylorguitars.com/ebonyproject\">West African Crelicam Ebony</a></p><p><strong>Peghead Inlay &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>None</p><p><strong>Peghead Logo &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Taylor Colorcore Other</p><p><strong>Bridge Pins &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Black</p><p><strong>Buttons &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Chrome</p><p><strong>Fingerboard Ext &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>None</p><p><strong>Edge Trim &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong>Black/White/Black</p>', 75199, 0, 0, 'edit-name'),
(10, 12, 30, 18, 'Sonor Vintage Series Bass Drum 22 \" 14 in.', '<h3>An add-on or auxiliary Vintage Series kick drum.</h3><p>Sonor Teardrop kits are some of the most sought after vintage drums. Utilizing rounded bearing edges, the recreated Vintage Series drums represent the return of the \'old Sonor sound\' into its product line. Like in the original Teardrop drums, the Vintage drum series feature hand‐selected premium German beech wood shells with rounded bearing edges.<br><br>Sonor has carefully recreated the look and feel of the 1950\'s teardrop lug and updated it with Sonor\'s exclusive Tunesafe system. Being sure not to overlook any details, Sonor has redesigned the Superprofil triple-flanged hoops and brought back the timeless Sonor badge and logo used in between 1952 and 1961.</p><h3>Features</h3><p>24x14\"</p><p>&nbsp; &nbsp;Includes a bass drum mount.<br>&nbsp; &nbsp;Chrome plated hardware.<br>&nbsp; &nbsp;TuneSafe lugs.<br>&nbsp; &nbsp;Bass drum claws (Classic Vintage).<br>&nbsp; &nbsp;9-ply (6mm) cross laminated tension free.<br>&nbsp; &nbsp;Rounded bearing edge.<br>&nbsp; &nbsp;Beech shell construction.<br>&nbsp; &nbsp;Vintage Pearl finish.&nbsp;</p>', '<p>Sonor was founded in 1875, which makes 2015 its 140th anniversary, older than Gretsch and Ludwig (both, by the way, started by German émigrés to the USA). In the UK of the 1960s, Trixon was more visible, but Sonor was already quietly making top quality \'teardrop\' lug kits.</p><p>So elongated were these lugs that they had to be offset on the shallower snares and toms, creating a chic image which Sonor has recreated in its new Vintage Series.</p>', '<figure class=\"table\"><table><tbody><tr><td>item no.</td><td>15922829 - Bass Drum 22\" x 14\" NM - vintage pearl</td></tr><tr><td>series</td><td>Vintage</td></tr><tr><td>finish</td><td><p>vintage pearl</p><figure class=\"image\"><img src=\"https://www.sonor.com/typo3conf/ext/sonor_productdatabase/Resources/Public/Images/vintage-vintage-pearl.jpg\" alt=\"vintage pearl\"></figure></td></tr><tr><td>material</td><td>beech</td></tr><tr><td>construction</td><td>9 plies, 6 mm</td></tr><tr><td>shell hardware finish</td><td>chrome plated</td></tr><tr><td>Set / features</td><td>no bass drum mount</td></tr><tr><td>item description</td><td>VT 1814 BD NO VPL</td></tr><tr><td>diameter</td><td>18\"</td></tr><tr><td>depth</td><td>14\"</td></tr><tr><td>features</td><td>no bass drum mount</td></tr></tbody></table></figure>', 124620, 0, 3, 'edit-name'),
(11, 12, 30, 12, 'Yamaha Stage Custom Birch Series Bass Drum', '<h3>Stage Custom Birch</h3><p>With the introduction of the Stage Custom in 1995, Yamaha, once again, set the standard for value and sound. The new Stage Custom inherits 100% birch wood with upgraded metal parts.</p><h3>Features</h3><h4>Shell</h4><p>The shell is a key factor in the drum\'s ability to \"rumble\" or resonate. Accordingly, the Stage Custom - a classic in the realm of high-class drum kits - employs 100% birch. Moreover, with its six-ply structure, the Stage Custom accurately conveys the vibrations produced at the impact surface, achieving performance that transcends anything in its class.</p><h4>Yamaha Enhanced Sustain System (Y.E.S.S.)</h4><p>The secret of our Y.E.S.S. system is twofold: first, it ensures minimum contact between the hardware and shell, and second, it connects that hardware to the nodal point* of the drum - the point at which it will not interfere with shell vibration. Nylon bushings on rod clamps afford maximum stability. Y.E.S.S. also allows toms to be placed close together without interfering with quick head changes, and on floor toms, Y.E.S.S. offers wide open sustain while keeping toms stable under the heaviest strokes. * Nodal point mounting is patented by the Noble &amp; Cooley Drum</p><h4>Ball Mount and Clamp</h4><p>A tribute to Yamaha design technology, our original ball mount and clamp have not changed much over the years. A large, ultra-hard resin ball sits in an attractive chromed housing, held in place with a titanium ergonomic wing bolt. It is the ultimate drummer-friendly mount offering non-slip positioning and tuning of the bottom head by simply rotating the drum.</p><h4>Die-Cast Claw Hook</h4><p>Die-cast claw hooks with rubber insertion plates help to reduce noise.</p><h4>BD Leg Stoppers</h4><p>Bass drum legs have stoppers to make setting easier.</p>', '', '<h3>Specifications</h3><p>Size: 18\" x 15\"<br>Stage Custom Birch Series<br>Drumshell: 6-Ply, 100% birch<br>SBB1815-RBL<br>Drumshell finish: High-gloss lacquer<br>Punchy, warm, dynamic and precise<br>Colour: Raven Black (RBL)</p><p><br>Further Information<br>Shell Colour &nbsp;Black<br>Sparkle &nbsp;No<br>Fade &nbsp;No<br>Surface Texture Of Shells &nbsp;Lacquer, High glossy<br>Shell Material &nbsp;Birch<br>Shell Hardware Colour &nbsp;Chrome<br>Bassdrum Rosette &nbsp;Yes</p>', 45000, 0, 0, 'edit-name');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pro_id`, `customer_id`, `name`, `email`, `review`, `rating`) VALUES
(1, 3, 0, 'Johnny', 'johnny@mail.com', 'wad', 4),
(2, 3, 0, 'Johnny', 'johnny@mail.com', 'Amazing violin for beginners!', 5),
(3, 6, 1, 'Vinod Jarare', 'vsjarare@gmail.com', 'Great for beginners. Sound quality is also very nice, very warm and mellow sound. Just like a telecaster.', 5),
(4, 6, 1, 'Bruce Wayne', 'batman@wayneindustri', 'OK guitar for practicing.', 4),
(5, 1, 1, 'Tony Stark', 'tony@starkindustries', 'Too expensive!', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `main_id`, `name`) VALUES
(3, 1, 'Semi-Acoustic Guitars'),
(4, 1, 'Double Neck Guitars'),
(5, 1, 'Semi-Hollow Guitars'),
(9, 4, 'Upright Piano'),
(18, 4, 'Keyboard'),
(19, 1, 'Acoustic Guitars'),
(24, 1, 'Electric Guitars'),
(25, 4, 'Grand Piano'),
(26, 11, 'Violin'),
(27, 11, 'Viola'),
(28, 11, 'Cello'),
(29, 11, 'Double Bass'),
(30, 12, 'Bass Drum'),
(31, 12, 'Guiro'),
(32, 12, 'Marimba'),
(33, 12, 'Shakers'),
(34, 12, 'Timpani'),
(35, 12, 'Xylophone'),
(36, 1, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `user_id`, `count`) VALUES
(1, 'TMP96056', 1),
(2, 'TMP43242', 0),
(3, 'TMP96495', 0),
(4, 'TMP52777', 0),
(5, 'TMP51041', 0),
(6, 'TMP38273', 0),
(7, 'TMP22196', 0),
(8, 'TMP36546', 0),
(9, 'TMP21866', 0),
(10, 'TMP45214', 0),
(11, 'TMP66208', 0),
(12, 'TMP71028', 0),
(13, 'TMP85518', 0),
(14, 'TMP40443', 0),
(15, 'TMP98721', 0),
(16, 'TMP98485', 0),
(17, 'TMP59888', 0),
(18, 'TMP60476', 0),
(19, 'TMP10239', 0),
(20, 'TMP98083', 0),
(21, 'TMP22463', 0),
(22, 'TMP36993', 0),
(23, 'TMP55894', 0),
(24, 'TMP90122', 0),
(25, 'TMP45223', 0),
(26, 'TMP24091', 0),
(27, 'TMP60652', 0),
(28, 'TMP26656', 0),
(29, 'TMP97896', 0),
(30, 'TMP17538', 0),
(31, 'TMP50649', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`,`username`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`,`username`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
