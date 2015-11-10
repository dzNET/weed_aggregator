
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2015 at 10:20 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u133123227_weed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`login`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `breeders`
--

CREATE TABLE IF NOT EXISTS `breeders` (
  `name` text NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `ln` text NOT NULL,
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `breeders`
--

INSERT INTO `breeders` (`name`, `link`, `description`, `ln`, `img`) VALUES
('lol', 'http://newseed.com', 'ар еон оет неьно5ноо', '/breeder/lol', 'http://abreathofsimplicity.com/wp-content/uploads/2014/04/blue-cow-120x120.jpg'),
('420 Seeds', 'http://420seeds.com/', '420 сидс', '/breeder/420seeds', 'http://420seeds.com/wp-content/uploads/2013/09/cropped-HDR_420seeds_com.jpg'),
('DNA Genetics Seeds', 'http://dnagenetics.com/', 'ДНА Генетикс', '/breeder/dnageneticsseeds', 'http://dnagenetics.com/skin/frontend/default/dna/images/logo.gif');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `shop` text NOT NULL,
  `good` text NOT NULL,
  `pres` text NOT NULL,
  `price1` text NOT NULL,
  `price2` text NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`shop`, `good`, `pres`, `price1`, `price2`, `description`) VALUES
('Semyanich', 'Blueberry', 'yes', '3 RUB', '10 RUB', '{"1":{"name":"Blueberry","seedbank":"420 Seeds","type":"strong","genetic":"Blueberry DJShort","harvest":"1st october","flowering":"50 days","thc":"THC: 19.5%","sain":"mostly indica","description":"bluberry блюбери блю блюха\r\nсмелз \r\n","ln":"/breeder/420seeds/blueberry","img":"http://en.seedfinder.eu/pics/galerie/Dinafem/Dinachem/24111467093952016_big.jpg"}}'),
('Rastishki Seeds Shop', 'Blueberry', 'yes', '3 RUB', '10 RUB', '{"1":{"name":"Blueberry","seedbank":"420 Seeds","type":"strong","genetic":"Blueberry DJShort","harvest":"1st october","flowering":"50 days","thc":"THC: 19.5%","sain":"mostly indica","description":"bluberry блюбери блю блюха\r\nсмелз \r\n","ln":"/breeder/420seeds/blueberry","img":"http://en.seedfinder.eu/pics/galerie/Dinafem/Dinachem/24111467093952016_big.jpg"}}'),
('Rastishki Seeds Shop', 'Critical Kush', 'yes', '5 RUB', '12 RUB', '{"1":{"name":"Critical Kush","seedbank":"DNA Genetics Seeds","type":"strong","genetic":"Critical+ x OG Kush Emerald OG","harvest":"2nd - 3rd week of Oct.","flowering":"67 - 75 days","thc":"THC: 18%","sain":"Indica","description":"critical kush куш критикал\r\nтут все","ln":"/breeder/dnageneticsseeds/criticalkush","img":"http://en.seedfinder.eu/pics/galerie/Dinafem/Critical_Kush/15011557117865545_big.jpg"}}'),
('Semyanich', 'Critical Kush', 'yes', '4 RUB', '11.5 RUB', '{"1":{"name":"Critical Kush","seedbank":"DNA Genetics Seeds","type":"strong","genetic":"Critical+ x OG Kush Emerald OG","harvest":"2nd - 3rd week of Oct.","flowering":"67 - 75 days","thc":"THC: 18%","sain":"Indica","description":"critical kush куш критикал\r\nтут все","ln":"/breeder/dnageneticsseeds/criticalkush","img":"http://en.seedfinder.eu/pics/galerie/Dinafem/Critical_Kush/15011557117865545_big.jpg"}}');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `name` text NOT NULL,
  `link` text NOT NULL,
  `contact` text NOT NULL,
  `description` text NOT NULL,
  `ln` text NOT NULL,
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`name`, `link`, `contact`, `description`, `ln`, `img`) VALUES
('Rastishki Seeds Shop', 'http://rastishki.nl/?from=olk', 'shop@rastishki.org', 'Растишки', '/shops/rastishkiseedsshop', 'http://rastishki.nl/wa-data/public/site/themes/dsv2/img/mylogo.png'),
('Semyanich', 'http://semyanich.in/?from=olkbutton', 'shop@semyanich.ws', 'Семяныч', '/shops/semyanich', 'http://semyanich.in/design/template3/images/logo_color.png');

-- --------------------------------------------------------

--
-- Table structure for table `strains`
--

CREATE TABLE IF NOT EXISTS `strains` (
  `name` text NOT NULL,
  `seedbank` text NOT NULL,
  `type` text NOT NULL,
  `genetic` text NOT NULL,
  `harvest` text NOT NULL,
  `flowering` text NOT NULL,
  `thc` text NOT NULL,
  `sain` text NOT NULL,
  `description` text NOT NULL,
  `ln` text NOT NULL,
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strains`
--

INSERT INTO `strains` (`name`, `seedbank`, `type`, `genetic`, `harvest`, `flowering`, `thc`, `sain`, `description`, `ln`, `img`) VALUES
('Blueberry', '420 Seeds', 'strong', 'Blueberry DJShort', '1st october', '50 days', 'THC: 19.5%', 'mostly indica', 'bluberry блюбери блю блюха\r\nсмелз \r\n', '/breeder/420seeds/blueberry', 'http://en.seedfinder.eu/pics/galerie/Dinafem/Dinachem/24111467093952016_big.jpg'),
('Critical Kush', 'DNA Genetics Seeds', 'strong', 'Critical+ x OG Kush Emerald OG', '2nd - 3rd week of Oct.', '67 - 75 days', 'THC: 18%', 'Indica', 'critical kush куш критикал\r\nтут все', '/breeder/dnageneticsseeds/criticalkush', 'http://en.seedfinder.eu/pics/galerie/Dinafem/Critical_Kush/15011557117865545_big.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
