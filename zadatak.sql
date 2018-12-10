-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 12:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zadatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_12_10_152943_photos', 1),
(3, '2018_12_10_162057_products', 2);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `barcode` varchar(40) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `barcode`, `added_at`) VALUES
(1, 'Flormar Enamel lak za nokte 321', '8690604013210', '2018-12-10 20:21:27'),
(2, 'Couleur Caramel Volumising Brown mascara N73', '3700306922736', '2018-12-10 20:21:27'),
(3, 'Ariel Touch Of Lenor 2kg', '5413149644021', '2018-12-10 20:21:27'),
(4, 'James Bond 007 Quantum EDT muški parfem 30ml', '737052739120', '2018-12-10 20:21:27'),
(5, 'Pompea Twin 20 Claro 4 L čarape', '8300694640462', '2018-12-10 20:21:27'),
(6, 'NIVEA MEN Protect & Care krema za brijanje 100gr', '4005808817726', '2018-12-10 20:21:27'),
(7, 'NYX Professional Makeup Olovka za usne Slide On 09-Summer Tease', '800897839482', '2018-12-10 20:21:27'),
(8, 'Filter čaj Žalfija', '8606003061417', '2018-12-10 20:21:27'),
(9, 'Abcderm Hydratant 200ml', '3401345569585', '2018-12-10 20:21:27'),
(10, 'The Balm Mad Lash maskara 1kom', '681619806735', '2018-12-10 20:21:27'),
(11, 'Colgate cetkica 360° Max White One', '5900273125941', '2018-12-10 20:21:27'),
(12, 'Kurkuma plus zglob fit', '8607000034800', '2018-12-10 20:21:27'),
(13, 'Issey Miyake Pleats Please Woman ženski parfem EDT 30ml', '3423475947059', '2018-12-10 20:21:27'),
(14, 'Pharmasept umirujuća krema za osetljivu kožu 150ml', '5205122000746', '2018-12-10 20:21:27'),
(15, 'Tref Line šnala 228020', '8034023228020', '2018-12-10 20:21:27'),
(16, 'Varalica Mix dečak/devojčica', '8710103694069', '2018-12-10 20:21:27'),
(17, 'Natural Wealth Selen', '074312821202', '2018-12-10 20:21:27'),
(18, 'Aura Explicit farba za kosu 6.77', '8606106129885', '2018-12-10 20:21:27'),
(19, 'Zewa Deluxe papirne maramice 10 komada', '7322540061468', '2018-12-10 20:21:27'),
(20, 'Libresse Classic dnevni ulošci', '7310794282005', '2018-12-10 20:21:27'),
(21, 'Humana mlečna kašica za laku noć 250 gr', '4031244753618', '2018-12-10 20:21:27'),
(22, 'Johnsons dečiji gel za tuširanje', '3574660030334', '2018-12-10 20:21:27'),
(23, 'NYX Professional Makeup Metalik gliter 05-Lumi-Lite', '800897140861', '2018-12-10 20:21:27'),
(24, 'Scholl Light Legs Black 60Den XL', '5011417566602', '2018-12-10 20:21:27'),
(25, 'Garnier Color Naturals 8.1 farba za kosu', '3600540337450', '2018-12-10 20:21:27'),
(26, 'Neutrogena 2 in 1 maska i gel za lice', '3574660156409', '2018-12-10 20:21:27'),
(27, 'Vanish Gold Oxy odstranjivač fleka', '5949031303511', '2018-12-10 20:21:27'),
(28, 'Aussie Color Mate 3minute pakovanje za farbanu kosu 250ml', '5410076390656', '2018-12-10 20:21:27'),
(29, 'Payot my payot serum za blistav ten sa ekstraktom gođi i akai bobicama i vitaminom C 30ml', '3390150568107', '2018-12-10 20:21:27'),
(30, 'Biofar 27 Vitamini i Minerali', '3760049893106', '2018-12-10 20:21:27'),
(31, 'Natural Wealth ABC Junior Plus Vitamini za decu 100 komada', '074312832703', '2018-12-10 20:21:27'),
(32, 'Weleda neven pasta za zube 75ml', '4001638098014', '2018-12-10 20:21:27'),
(33, 'Bref Duo Aktive Lemon WC osveživač', '9000100968331', '2018-12-10 20:21:27'),
(34, 'Revlon Super Lustrous ruž za usne 730', '80100004641', '2018-12-10 20:21:27'),
(35, 'Yesss! Еlastična gumica za kosu spirala 4kom', '8606017875772', '2018-12-10 20:21:27'),
(36, 'Tesori Di Oriente Ayurveda parfem 100ml', '8008970043654', '2018-12-10 20:21:27'),
(37, 'Bebivita sok banana,  breskva i jabuka 200ml', '9007253100670', '2018-12-10 20:21:27'),
(38, 'Atopik milky bath 200ml', '8600102944350', '2018-12-10 20:21:27'),
(39, 'Old Spice Wolfthorn stik ', '4084500488465', '2018-12-10 20:21:27'),
(40, 'Glade mirisna sveca - Warm Spice', '5000204771039', '2018-12-10 20:21:27'),
(41, 'Beautin Collagen mango-dinja 500ml', '5200398511019', '2018-12-10 20:21:27'),
(42, 'Still Argan maska', '8606002721695', '2018-12-10 20:21:27'),
(43, 'Aura All Year bronzer 911', '8606107367606', '2018-12-10 20:21:27'),
(44, 'L\'Oreal Casting Creme Gloss boja za kosu 1021', '3600521831465', '2018-12-10 20:21:27'),
(45, 'Chicco Giotto Physio Air laža od silikona,  plava 6-12 meseci', '8058664058860', '2018-12-10 20:21:27'),
(46, 'Benetton Colors Purple Women Edt 50ml', '8433982007415', '2018-12-10 20:21:27'),
(47, 'Fruttini losion za telo Experimental Mango', '4003583184231', '2018-12-10 20:21:27'),
(48, 'GR Velvet Matte Lipstick NO: 17', '8691190466176', '2018-12-10 20:21:27'),
(49, 'Juvitana kašica od baštenskog povrća sa junetinom 190g', '8601900406231', '2018-12-10 20:21:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
