-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 10:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ad_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `subcat_id` int(10) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0 - inactive and 1 - active and 2 - renew',
  `title` varchar(50) DEFAULT NULL,
  `slug` text NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `negotiate` tinyint(4) NOT NULL DEFAULT 0,
  `location` int(11) NOT NULL,
  `report_count` int(6) DEFAULT 0,
  `customer_id` int(10) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `user_id`, `cat_id`, `subcat_id`, `post_date`, `end_date`, `status`, `title`, `slug`, `description`, `price`, `negotiate`, `location`, `report_count`, `customer_id`, `approved_date`, `views`) VALUES
(13, 1, 5, 15, '2020-06-03', '2021-01-01', 1, 'Audi A1 Blue', 'audi-a1-blue-CZMAGHLOPB', 'Audi A1 for Sale in Brand New Condition. Was bought only a month back and imported from Germany. 300 KM on the meter', '5000000', 0, 49, 0, 1, '2020-06-03', 0),
(16, 1, 4, 2, '2020-06-08', '2020-08-15', 1, 'OnePlus 8 256GB', 'oneplus-8-256gb-8ISJ1E6YHZ', '<p><strong>OnePlus 8 256GB Emerald Green</strong></p>\r\n<p>Brand New Condition in Unopened Box.</p>\r\n<p>Bought from USA and not at all used. Factory Unlocked and therefore supports any carrier.</p>', '125999', 0, 189, 0, 1, '2020-06-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ad_edit`
--

CREATE TABLE `ad_edit` (
  `ad_edit_id` int(10) NOT NULL,
  `advertisement_id` int(10) DEFAULT NULL,
  `approved_status` int(2) DEFAULT NULL,
  `ad_poster_id` int(10) DEFAULT NULL,
  `ad_editer_id` int(10) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `subcat_id` int(10) DEFAULT NULL,
  `edit_date` date DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `positigve_rating` int(6) DEFAULT NULL,
  `negative_rating` int(6) DEFAULT NULL,
  `report_count` int(6) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `approved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_icon` text NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_slug`, `category_desc`, `category_icon`) VALUES
(4, 'Electronics', 'electronics', 'Find great deals for used electronics in Sri Lanka including mobile phones, computers, laptops, TVs, home theatres and much more.', 'eletronics.png'),
(5, 'Vehicles', 'vehicle', 'Buy and sell used cars, motorbikes and other vehicles in Sri Lanka. Choose from top brands including Toyota, Nissan, Honda and Suzuki.', 'vehicles.png'),
(6, 'Property', 'property', 'View listings for property in Sri Lanka. Find the cheapest rates for apartments, commercial and residential properties, as well as for land and plots.', 'Property.png'),
(7, 'Business & Industry', 'business-and-industry', 'Browse through a range of business services and industrial companies offering products and services to both other businesses and consumers alike.', 'business_and_industry.png'),
(8, 'Home & Garden', 'home-and-garden', 'Buy and sell new and used home appliances including furniture, kitchen items, garden products and other household items in Sri Lanka.', 'home_and_garden.png'),
(9, 'Essentials', 'essentials', 'Find daily essential products, including groceries, healthcare products, household items, fruits & vegetables, meat & seafood and baby products near you.', 'essentials.png'),
(10, 'Animals', 'animals', 'Search from the widest variety of pets in Sri Lanka. Select from dogs, puppies, cats, kittens, birds and other domesticated animals.', 'animals.png'),
(11, 'Hobby, Sport & Kids', 'hobby-sport-and-kids', 'Buy and sell used musical instruments, sports gear and accessories, art and collectibles, items for kids and more.', 'hobby_sport_and_kids.png'),
(12, 'Fashion, Health & Beauty', 'fashion-health-and-beauty', 'Everything you need to look and feel amazing! check out the latest fashion items and a range of health and beauty products being offered in Sri Lanka.', 'fashion_health_and_beauty.png'),
(13, 'Services', 'services', 'Browse through a range of service based companies offering services to both other businesses and consumers alike.', 'services.png'),
(14, 'Jobs', 'jobs', 'Post and apply for jobs and career opportunities in Sri Lanka. Search for job vacancies in your city.', 'jobs.png'),
(15, 'Education', 'education', 'Buy and sell books and magazines, find tuition, classes and other educational resources in Sri Lanka.', 'education.png'),
(16, 'Food & Agriculture', 'food-and-agriculture', 'Find food and edible products, including fresh fruits and vegetables, meats, fish, seafood, crop seeds, plants and other agricultural products in Sri Lanka.', 'food_and_agriculture.png'),
(18, 'Miscellaneous', 'miscellaneous', 'Classified ads for miscellaneous products and items all over Sri Lanka. Buy and sell almost anything.', 'other.png');

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0t86mr17435ehe62otttl8mo32sbil4r', '::1', 1591603220, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313630333232303b5f63695f70726576696f75735f75726c7c733a36373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f6164766572746973656d656e74223b69647c733a313a2231223b757365726e616d657c733a363a226d696e6f6a73223b66697273746e616d657c733a353a224d696e6f6a223b6c6173746e616d657c733a393a2253656c766172617361223b656d61696c7c733a32333a226d696e6f6a73656c766172616a40676d61696c2e636f6d223b69734c6f67676564496e7c623a313b70726976696c6567657c733a313a2231223b),
('il9avj5gdvpnpbut4io03vt6qlvgrqgg', '::1', 1591603801, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313630333830313b5f63695f70726576696f75735f75726c7c733a37333a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f6164766572746973656d656e742f7374657033223b69647c733a313a2231223b757365726e616d657c733a363a226d696e6f6a73223b66697273746e616d657c733a353a224d696e6f6a223b6c6173746e616d657c733a393a2253656c766172617361223b656d61696c7c733a32333a226d696e6f6a73656c766172616a40676d61696c2e636f6d223b69734c6f67676564496e7c623a313b70726976696c6567657c733a313a2231223b),
('75uoo5j5ht4jcnsapdt70tfiv327vmqc', '::1', 1591609760, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313630393736303b5f63695f70726576696f75735f75726c7c733a37343a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f6164766572746973656d656e742f637265617465223b69647c733a313a2231223b757365726e616d657c733a363a226d696e6f6a73223b66697273746e616d657c733a353a224d696e6f6a223b6c6173746e616d657c733a393a2253656c766172617361223b656d61696c7c733a32333a226d696e6f6a73656c766172616a40676d61696c2e636f6d223b69734c6f67676564496e7c623a313b70726976696c6567657c733a313a2231223b),
('20c9ioahv9066rsicq7tgdsr5hc53gdd', '::1', 1591610222, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313631303232323b5f63695f70726576696f75735f75726c7c733a37343a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f6164766572746973656d656e742f637265617465223b69647c733a313a2231223b757365726e616d657c733a363a226d696e6f6a73223b66697273746e616d657c733a353a224d696e6f6a223b6c6173746e616d657c733a393a2253656c766172617361223b656d61696c7c733a32333a226d696e6f6a73656c766172616a40676d61696c2e636f6d223b69734c6f67676564496e7c623a313b70726976696c6567657c733a313a2231223b6d73677c733a33323a225375636365737366756c6c79205361766564204164766572746973656d656e74223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226f6c64223b7d),
('3ceu6inn3l8mvr9946jt0e5fufflsuab', '::1', 1591610624, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313631303631303b5f63695f70726576696f75735f75726c7c733a3130373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f7372692d6c616e6b612f696d672f62616e6e65722f73796d626f6c2d66656174757265642e706e67223b69647c733a313a2231223b757365726e616d657c733a363a226d696e6f6a73223b66697273746e616d657c733a353a224d696e6f6a223b6c6173746e616d657c733a393a2253656c766172617361223b656d61696c7c733a32333a226d696e6f6a73656c766172616a40676d61696c2e636f6d223b69734c6f67676564496e7c623a313b70726976696c6567657c733a313a2231223b),
('uoka4rvhcnl4379v1h893kq7sb3o9f2g', '::1', 1591610610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313631303631303b5f63695f70726576696f75735f75726c7c733a3130333a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f7372692d6c616e6b612f456c656374726f6e6963732f4d6f62696c6525323050686f6e65223b69647c733a313a2231223b757365726e616d657c733a363a226d696e6f6a73223b66697273746e616d657c733a353a224d696e6f6a223b6c6173746e616d657c733a393a2253656c766172617361223b656d61696c7c733a32333a226d696e6f6a73656c766172616a40676d61696c2e636f6d223b69734c6f67676564496e7c623a313b70726976696c6567657c733a313a2231223b),
('vof11e9roddukhr6d8s6he816bqljnbi', '::1', 1591623174, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632333137343b5f63695f70726576696f75735f75726c7c733a38393a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f7372692d6c616e6b612f696d672f6c6f676f2e706e67223b),
('7ei8qlfi6u748rgbc4a84hl45nqs5l34', '::1', 1591623515, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632333531353b5f63695f70726576696f75735f75726c7c733a39373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f696d672f62616e6e65722f73796d626f6c2d66656174757265642e706e67223b),
('qumugi71ssseust9jo3an6r9u9n8enpu', '::1', 1591623840, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632333834303b5f63695f70726576696f75735f75726c7c733a38373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f636f6c6f6d626f2f696d672f6c6f676f2e706e67223b),
('sv4oj6rgor18nlu43al62pd865b7ugoe', '::1', 1591624217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632343231373b5f63695f70726576696f75735f75726c7c733a38373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f636f6c6f6d626f2f696d672f6c6f676f2e706e67223b),
('dio8gtddcu6qgl2pgc2msbg0h6t8lgr8', '::1', 1591624593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632343539333b5f63695f70726576696f75735f75726c7c733a38373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f67616d706168612f696d672f6c6f676f2e706e67223b),
('l623meplm02k3062l9j0ah0egnoedjq9', '::1', 1591625855, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632353835353b5f63695f70726576696f75735f75726c7c733a37393a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f696d672f6c6f676f2e706e67223b),
('t1tsc5hk6p52ea44ra24mivo2luhl17e', '::1', 1591626174, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632363137343b5f63695f70726576696f75735f75726c7c733a38373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f636f6c6f6d626f2f696d672f6c6f676f2e706e67223b),
('vjrt7p5416lmi8cmlhjp0iat7l14c4sb', '::1', 1591626563, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632363536333b5f63695f70726576696f75735f75726c7c733a3130383a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f636f6c6f6d626f2f68616e77656c6c612f656c656374726f6e6963732f696d672f6c6f676f2e706e67223b),
('3rggbd7squqjl8mjn4rt8427n2jtik4c', '::1', 1591626564, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313632363536333b5f63695f70726576696f75735f75726c7c733a3130383a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f636f6c6f6d626f2f68616e77656c6c612f656c656374726f6e6963732f696d672f6c6f676f2e706e67223b),
('fuvt2kjopgt95kg2vhhkidulentd1ir8', '::1', 1591638560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313633383536303b5f63695f70726576696f75735f75726c7c733a3131393a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f7372692d6c616e6b612f656c656374726f6e6963732f696d672f62616e6e65722f73796d626f6c2d66656174757265642e706e67223b),
('a5l9vc4kjdoj0hdbg040bt8d4fc2i6ov', '::1', 1591638882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313633383838323b5f63695f70726576696f75735f75726c7c733a3131393a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f7372692d6c616e6b612f656c656374726f6e6963732f696d672f62616e6e65722f73796d626f6c2d66656174757265642e706e67223b),
('1u6bk1repubholg4nisorhh4tqv7op9a', '::1', 1591639496, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313633393439363b5f63695f70726576696f75735f75726c7c733a3131393a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f7372692d6c616e6b612f656c656374726f6e6963732f696d672f62616e6e65722f73796d626f6c2d66656174757265642e706e67223b),
('ru0o2b86546bnhcu6pg1sbtc5ie8phvu', '::1', 1591641627, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634313632373b5f63695f70726576696f75735f75726c7c733a3130383a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f636f6c6f6d626f2f68616e77656c6c612f656c656374726f6e6963732f696d672f6c6f676f2e706e67223b),
('npbvta1mjphv0osdhn59s4g3lsgoa5aq', '::1', 1591641930, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634313933303b5f63695f70726576696f75735f75726c7c733a3130383a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f636f6c6f6d626f2f68616e77656c6c612f656c656374726f6e6963732f696d672f6c6f676f2e706e67223b),
('rm8029tn7fsk8ur4btdqsitguv67plkq', '::1', 1591642970, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634323937303b5f63695f70726576696f75735f75726c7c733a39303a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f426174746963616c6f612f696d672f6c6f676f2e706e67223b),
('25e1u6sbjf2qhi9m3q089b25vq7a1ggk', '::1', 1591643337, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634333333373b5f63695f70726576696f75735f75726c7c733a35343a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f223b),
('e49d4m7jasasvbbs8i6mjgqm8h3t0j00', '::1', 1591643686, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634333638363b5f63695f70726576696f75735f75726c7c733a38373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f436f6c6f6d626f2f696d672f6c6f676f2e706e67223b),
('9r96vq5tj70lhsgtd3o6jjlcnqoem2vk', '::1', 1591644082, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634343038323b5f63695f70726576696f75735f75726c7c733a38333a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f61642f6f6e65706c75732d382d32353667622d3849534a31453659485a223b),
('f6kegpq6hb57v8c4onr526d8ad6rqr6b', '::1', 1591644879, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634343837393b5f63695f70726576696f75735f75726c7c733a3131393a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f7372692d6c616e6b612f656c656374726f6e6963732f696d672f62616e6e65722f73796d626f6c2d66656174757265642e706e67223b),
('6drenabddai6oip9lr3ehua2n7hrr0q6', '::1', 1591645903, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634353930333b5f63695f70726576696f75735f75726c7c733a38373a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f47616d706168612f696d672f6c6f676f2e706e67223b),
('2fseujngivifpmkqkmnvdlc35pg1hr9j', '::1', 1591646681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634363638313b5f63695f70726576696f75735f75726c7c733a38303a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f61642f617564692d61312d626c75652d435a4d4147484c4f5042223b),
('mom38ut1up8rjqe8octicp0peedcpcq7', '::1', 1591647003, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634373030333b5f63695f70726576696f75735f75726c7c733a38303a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f61642f617564692d61312d626c75652d435a4d4147484c4f5042223b),
('4s2o15t9mvhel4ebvd891fdu54u1jjde', '::1', 1591647367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634373336373b5f63695f70726576696f75735f75726c7c733a35343a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f223b),
('2bmko44mc10q8u8p82h8alrvqa5he5q1', '::1', 1591648035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634383033353b5f63695f70726576696f75735f75726c7c733a38303a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f61642f617564692d61312d626c75652d435a4d4147484c4f5042223b),
('mtn2t46srcs74eldu1lj57rdpbb7ouuq', '::1', 1591648338, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634383333383b5f63695f70726576696f75735f75726c7c733a38303a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f61642f617564692d61312d626c75652d435a4d4147484c4f5042223b),
('uug499t6ljo6ba4tmmh07dst5jma2h5h', '::1', 1591648604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539313634383333383b5f63695f70726576696f75735f75726c7c733a38353a22687474703a2f2f6c6f63616c686f73742f6164706f7274616c2f6164706f7274616c2f4170706c69636174696f6e2f7075626c69632f7365617263682f696e6465782f47616c6c652f696d672f6c6f676f2e706e67223b);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(14) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `nic_no` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `passport_no` varchar(25) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `email`, `dob`, `contact_no`, `description`, `nic_no`, `address`, `city`, `passport_no`, `password`) VALUES
(1, 'Hansa', 'Perera', 'hansaperera@gmail.com', '1980-07-09', '0771234567', 'Software Engineer', NULL, '87/B/A, Main Street', 'Horana', '3895804048', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `country`, `district`, `city`) VALUES
(1, 'Sri Lanka', 'Colombo', 'Athurugiriya'),
(2, 'Sri Lanka', 'Colombo', 'Colombo 01'),
(3, 'Sri Lanka', 'Colombo', 'Colombo 02'),
(4, 'Sri Lanka', 'Colombo', 'Colombo 03'),
(5, 'Sri Lanka', 'Colombo', 'Colombo 04'),
(6, 'Sri Lanka', 'Colombo', 'Colombo 05'),
(7, 'Sri Lanka', 'Colombo', 'Colombo 06'),
(8, 'Sri Lanka', 'Colombo', 'Colombo 07'),
(9, 'Sri Lanka', 'Colombo', 'Colombo 08'),
(10, 'Sri Lanka', 'Colombo', 'Colombo 09'),
(11, 'Sri Lanka', 'Colombo', 'Colombo 10'),
(12, 'Sri Lanka', 'Colombo', 'Colombo 11'),
(13, 'Sri Lanka', 'Colombo', 'Colombo 12'),
(14, 'Sri Lanka', 'Colombo', 'Colombo 13'),
(15, 'Sri Lanka', 'Colombo', 'Colombo 14'),
(16, 'Sri Lanka', 'Colombo', 'Colombo 15'),
(17, 'Sri Lanka', 'Colombo', 'Nugegoda'),
(18, 'Sri Lanka', 'Colombo', 'Piliyandala'),
(19, 'Sri Lanka', 'Colombo', 'Maharagama'),
(20, 'Sri Lanka', 'Colombo', 'Moratuwa'),
(21, 'Sri Lanka', 'Colombo', 'Dehiwela'),
(22, 'Sri Lanka', 'Colombo', 'Kottawa'),
(23, 'Sri Lanka', 'Colombo', 'Malabe'),
(24, 'Sri Lanka', 'Colombo', 'Kaduwela'),
(25, 'Sri Lanka', 'Colombo', 'Battaramulla'),
(26, 'Sri Lanka', 'Colombo', 'Homagama'),
(27, 'Sri Lanka', 'Colombo', 'Rajagiriya'),
(28, 'Sri Lanka', 'Colombo', 'Boralesgamuwa'),
(29, 'Sri Lanka', 'Colombo', 'Talawatugoda'),
(30, 'Sri Lanka', 'Colombo', 'Kohuwela'),
(31, 'Sri Lanka', 'Colombo', 'Pannipitiya'),
(32, 'Sri Lanka', 'Colombo', 'Mount Lavinia'),
(33, 'Sri Lanka', 'Colombo', 'Kotte'),
(34, 'Sri Lanka', 'Colombo', 'Ratmalana'),
(35, 'Sri Lanka', 'Colombo', 'Wellampitiya'),
(36, 'Sri Lanka', 'Colombo', 'Nawala'),
(37, 'Sri Lanka', 'Colombo', 'Angoda'),
(38, 'Sri Lanka', 'Colombo', 'Padukka'),
(39, 'Sri Lanka', 'Colombo', 'Kesbewa'),
(40, 'Sri Lanka', 'Colombo', 'Avissawella'),
(41, 'Sri Lanka', 'Colombo', 'Kolonnawa'),
(42, 'Sri Lanka', 'Colombo', 'Hanwella'),
(43, 'Sri Lanka', 'Gampaha', 'Negombo'),
(44, 'Sri Lanka', 'Gampaha', 'Gampaha'),
(45, 'Sri Lanka', 'Gampaha', 'Kiribathgoda'),
(46, 'Sri Lanka', 'Gampaha', 'Kadawatha'),
(47, 'Sri Lanka', 'Gampaha', 'Kelaniya'),
(48, 'Sri Lanka', 'Gampaha', 'Ja-Ela'),
(49, 'Sri Lanka', 'Gampaha', 'Wattala'),
(50, 'Sri Lanka', 'Gampaha', 'Peliyagoda'),
(51, 'Sri Lanka', 'Gampaha', 'Ragama'),
(52, 'Sri Lanka', 'Gampaha', 'Minuwangoda'),
(53, 'Sri Lanka', 'Gampaha', 'Nittambuwa'),
(54, 'Sri Lanka', 'Gampaha', 'Kandana'),
(55, 'Sri Lanka', 'Gampaha', 'Katunayake'),
(56, 'Sri Lanka', 'Gampaha', 'Delgoda'),
(57, 'Sri Lanka', 'Gampaha', 'Divulapitiya'),
(58, 'Sri Lanka', 'Gampaha', 'Mirigama'),
(59, 'Sri Lanka', 'Gampaha', 'Ganemulla'),
(60, 'Sri Lanka', 'Gampaha', 'Veyangoda'),
(61, 'Sri Lanka', 'Galle', 'Galle'),
(62, 'Sri Lanka', 'Galle', 'Ambalangoda'),
(63, 'Sri Lanka', 'Galle', 'Elpitiya'),
(64, 'Sri Lanka', 'Galle', 'Hikkaduwa'),
(65, 'Sri Lanka', 'Galle', 'Baddegama'),
(66, 'Sri Lanka', 'Galle', 'Bentota'),
(67, 'Sri Lanka', 'Galle', 'Karapitiya'),
(68, 'Sri Lanka', 'Galle', 'Ahangama'),
(69, 'Sri Lanka', 'Galle', 'Batapola'),
(70, 'Sri Lanka', 'Batticaloa', 'Batticaloa'),
(71, 'Sri Lanka', 'Ampara', 'Akkarepattu'),
(72, 'Sri Lanka', 'Ampara', 'Ampara'),
(73, 'Sri Lanka', 'Ampara', 'Kalmunai'),
(74, 'Sri Lanka', 'Ampara', 'Sainthamaruthu'),
(75, 'Sri Lanka', 'Kandy', 'Gampola'),
(76, 'Sri Lanka', 'Kandy', 'Katugastota'),
(77, 'Sri Lanka', 'Kandy', 'Peradeniya'),
(78, 'Sri Lanka', 'Kandy', 'Kandy'),
(79, 'Sri Lanka', 'Kandy', 'Kundasale'),
(80, 'Sri Lanka', 'Kandy', 'Nawalapitiya'),
(81, 'Sri Lanka', 'Kandy', 'Digana'),
(82, 'Sri Lanka', 'Kandy', 'Gelioya'),
(83, 'Sri Lanka', 'Kandy', 'Pilimatalawa'),
(84, 'Sri Lanka', 'Kandy', 'Akurana'),
(85, 'Sri Lanka', 'Kandy', 'Galagedara'),
(86, 'Sri Lanka', 'Kandy', 'Wattegama'),
(87, 'Sri Lanka', 'Kandy', 'Kadugannawa'),
(88, 'Sri Lanka', 'Kandy', 'Madawala Bazaar'),
(89, 'Sri Lanka', 'Kandy', 'Ampitiya'),
(90, 'Sri Lanka', 'Jaffna', 'Jaffna'),
(91, 'Sri Lanka', 'Jaffna', 'Nallur'),
(92, 'Sri Lanka', 'Jaffna', 'Chavakachcheri'),
(93, 'Sri Lanka', 'Kilinochchi', 'Kilinochchi'),
(94, 'Sri Lanka', 'Vavuniya', 'Vavuniya'),
(95, 'Sri Lanka', 'Mannar', 'Mannar'),
(96, 'Sri Lanka', 'Trincomalee', 'Trincomalee'),
(97, 'Sri Lanka', 'Trincomalee', 'Kinniya'),
(98, 'Sri Lanka', 'Puttalam', 'Chilaw'),
(99, 'Sri Lanka', 'Puttalam', 'Wennappuwa'),
(100, 'Sri Lanka', 'Puttalam', 'Nattandiya'),
(101, 'Sri Lanka', 'Puttalam', 'Marawila'),
(102, 'Sri Lanka', 'Puttalam', 'Dankotuwa'),
(103, 'Sri Lanka', 'Kalutara', 'Panadura'),
(104, 'Sri Lanka', 'Kalutara', 'Horana'),
(105, 'Sri Lanka', 'Kalutara', 'Kalutara'),
(106, 'Sri Lanka', 'Kalutara', 'Bandaragama'),
(107, 'Sri Lanka', 'Kalutara', 'Matugama'),
(108, 'Sri Lanka', 'Kalutara', 'Wadduwa'),
(109, 'Sri Lanka', 'Kalutara', 'Aluthgama'),
(110, 'Sri Lanka', 'Kalutara', 'Beruwala'),
(111, 'Sri Lanka', 'Kalutara', 'Ingiriya'),
(112, 'Sri Lanka', 'Matara', 'Matara'),
(113, 'Sri Lanka', 'Matara', 'Akuressa'),
(114, 'Sri Lanka', 'Matara', 'Weligama'),
(115, 'Sri Lanka', 'Matara', 'Hakmana'),
(116, 'Sri Lanka', 'Matara', 'Dikwella'),
(117, 'Sri Lanka', 'Matara', 'Deniyaya'),
(118, 'Sri Lanka', 'Matara', 'Kamburupitiya'),
(119, 'Sri Lanka', 'Matara', 'Kekanadurra'),
(120, 'Sri Lanka', 'Matara', 'Kamburugamuwa'),
(121, 'Sri Lanka', 'Hambantota', 'Tissamaharama'),
(122, 'Sri Lanka', 'Hambantota', 'Ambalantota'),
(123, 'Sri Lanka', 'Hambantota', 'Tangalle'),
(124, 'Sri Lanka', 'Hambantota', 'Beliatta'),
(125, 'Sri Lanka', 'Hambantota', 'Hambantota'),
(126, 'Sri Lanka', 'Anuradhapura', 'Anuradhapura'),
(127, 'Sri Lanka', 'Anuradhapura', 'Kekirawa'),
(128, 'Sri Lanka', 'Anuradhapura', 'Eppawala'),
(129, 'Sri Lanka', 'Anuradhapura', 'Medawachchiya'),
(130, 'Sri Lanka', 'Anuradhapura', 'Talawa'),
(131, 'Sri Lanka', 'Anuradhapura', 'Tambuttegama'),
(132, 'Sri Lanka', 'Anuradhapura', 'Nochchiyagama'),
(133, 'Sri Lanka', 'Anuradhapura', 'Galenbindunuwewa'),
(134, 'Sri Lanka', 'Anuradhapura', 'Galnewa'),
(135, 'Sri Lanka', 'Anuradhapura', 'Mihintale'),
(136, 'Sri Lanka', 'Anuradhapura', 'Habarana'),
(137, 'Sri Lanka', 'Kurunegala', 'Kurunegala'),
(138, 'Sri Lanka', 'Kurunegala', 'Kuliyapitiya'),
(139, 'Sri Lanka', 'Kurunegala', 'Narammala'),
(140, 'Sri Lanka', 'Kurunegala', 'Mawathagama'),
(141, 'Sri Lanka', 'Kurunegala', 'Pannala'),
(142, 'Sri Lanka', 'Kurunegala', 'Wariyapola'),
(143, 'Sri Lanka', 'Kurunegala', 'Ibbagamuwa'),
(144, 'Sri Lanka', 'Kurunegala', 'Alawwa'),
(145, 'Sri Lanka', 'Kurunegala', 'Bingiriya'),
(146, 'Sri Lanka', 'Kurunegala', 'Polgahawela'),
(147, 'Sri Lanka', 'Kurunegala', 'Hettipola'),
(148, 'Sri Lanka', 'Kurunegala', 'Nikaweratiya'),
(149, 'Sri Lanka', 'Kurunegala', 'Giriulla'),
(150, 'Sri Lanka', 'Kurunegala', 'Galgamuwa'),
(151, 'Sri Lanka', 'Matale', 'Sigirya'),
(152, 'Sri Lanka', 'Matale', 'Dambulla'),
(153, 'Sri Lanka', 'Matale', 'Matale'),
(154, 'Sri Lanka', 'Matale', 'Galewela'),
(155, 'Sri Lanka', 'Matale', 'Ukuwela'),
(156, 'Sri Lanka', 'Matale', 'Palapathwela'),
(157, 'Sri Lanka', 'Matale', 'Rattota'),
(158, 'Sri Lanka', 'Matale', 'Yatawata'),
(159, 'Sri Lanka', 'Polonnaruwa', 'Polonnaruwa'),
(160, 'Sri Lanka', 'Polonnaruwa', 'Kaduruwela'),
(161, 'Sri Lanka', 'Polonnaruwa', 'Hingurakgoda'),
(162, 'Sri Lanka', 'Polonnaruwa', 'Medirigirya'),
(163, 'Sri Lanka', 'Kegalle', 'Kegalle'),
(164, 'Sri Lanka', 'Kegalle', 'Mawanella'),
(165, 'Sri Lanka', 'Kegalle', 'Warakapola'),
(166, 'Sri Lanka', 'Kegalle', 'Rambukkana'),
(167, 'Sri Lanka', 'Kegalle', 'Ruwanwella'),
(168, 'Sri Lanka', 'Kegalle', 'Galigamuwa'),
(169, 'Sri Lanka', 'Kegalle', 'Yatiyantota'),
(170, 'Sri Lanka', 'Kegalle', 'Deraniyagala'),
(171, 'Sri Lanka', 'Kegalle', 'Dehiowita'),
(172, 'Sri Lanka', 'Kegalle', 'Kitulgala'),
(173, 'Sri Lanka', 'Badulla', 'Badulla'),
(174, 'Sri Lanka', 'Badulla', 'Bandarawela'),
(175, 'Sri Lanka', 'Badulla', 'Welimada'),
(176, 'Sri Lanka', 'Badulla', 'Mahiyanganaya'),
(177, 'Sri Lanka', 'Badulla', 'Hali Ela'),
(178, 'Sri Lanka', 'Badulla', 'Ella'),
(179, 'Sri Lanka', 'Badulla', 'Passara'),
(180, 'Sri Lanka', 'Badulla', 'Diyatalawa'),
(181, 'Sri Lanka', 'Badulla', 'Haputale'),
(182, 'Sri Lanka', 'Monaragala', 'Moneragala'),
(183, 'Sri Lanka', 'Monaragala', 'Wellawaya'),
(184, 'Sri Lanka', 'Monaragala', 'Bibile'),
(185, 'Sri Lanka', 'Monaragala', 'Buttala'),
(186, 'Sri Lanka', 'Monaragala', 'Kataragama'),
(187, 'Sri Lanka', 'Ratnapura', 'Ratnapura'),
(188, 'Sri Lanka', 'Ratnapura', 'Embilipitiya'),
(189, 'Sri Lanka', 'Ratnapura', 'Pelmadulla'),
(190, 'Sri Lanka', 'Ratnapura', 'Balangoda'),
(191, 'Sri Lanka', 'Ratnapura', 'Kuruwita'),
(192, 'Sri Lanka', 'Ratnapura', 'Eheliyagoda');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `alt`, `path`, `featured`, `uploaded_on`, `user_id`, `ad_id`) VALUES
(2, 'Audi A1 Blue', 'Audi A1 Brand New Blue in the Best Condition.', '1591165675_a67e8e667b064d0f18cb.jpg', 1, '2020-06-03 11:57:55', 1, 13),
(5, 'Oneplus 8 256GB Emerald Green', 'Oneplus 8 256gb emerald green brand new in unopened box mint condition.', '1591610053_792cbd43c2d8574ce311.jpg', 1, '2020-06-08 15:24:13', 1, 16),
(6, 'Camera Sample from OnePlus 8', 'A picture taken using the Oneplus 8 256gb in New York shows the camera has great potential.', '1591610053_c396ad8463f39f76eb08.jpg', 0, '2020-06-08 15:24:13', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `featured_image` text NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `option_name`, `option_value`) VALUES
(1, 'site_title', 'AdPortal'),
(2, 'site_desc', 'Your Advertisement Portal'),
(3, 'seo_desc', 'Advertisement Portal to post all your advertisements on the products that you have for sale. All Services and Products can be posted here at a very low cost and get them advertised instantly. Sri Lankan Advertisement Portal Service.'),
(4, 'seo_keywords', 'Ad, Advert, Advertisement, Portal, Sri Lanka, English, Tamil, Sinhala, For Sale, Wanted, Buy and Sell, New, Used'),
(5, 'seo_authors', 'Minoj Selvarasa, AdPortal'),
(6, 'site_logo', '#'),
(7, 'admin_email', 'minojselvaraj@gmail.com'),
(8, 'site_favicon', '#');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(10) NOT NULL,
  `sub_category_name` varchar(50) DEFAULT NULL,
  `sub_category_slug` varchar(255) NOT NULL,
  `sub_category_desc` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `sub_category_name`, `sub_category_slug`, `sub_category_desc`, `category_id`) VALUES
(2, 'Mobile Phone', 'mobile-phone', 'Mobile Phones from all brands from around the world.', 4),
(3, 'Computer Accessories', 'computer-accessories', 'Computer Accessories', 4),
(4, 'Mobile Phone Accessories', 'mobile-phone-accessories', 'Mobile Phone Accessories', 4),
(5, 'Computers & Tablets', 'computers-and-tablets', 'Computers & Tablets', 4),
(6, 'Audio & MP3', 'audio-and-mp3', 'Audio & MP3', 4),
(7, 'Air Conditioning & Electrical Fittings', 'air-conditioning-and-electrical-fittings', 'Air Conditioning & Electrical Fittings', 4),
(8, 'Cameras & Camcorders', 'cameras-and-camcorders', 'Cameras & Camcorders', 4),
(9, 'Electronic Home Appliances', 'electronic-home-appliances', 'Electronic Home Appliances', 4),
(10, 'TVs', 'tvs', 'TV', 4),
(11, 'Video Games & Consoles', 'video-games-and-consoles', 'Video Games & Consoles', 4),
(12, 'TV & Video Accessories', 'tv-and-video-accessories', 'TV & Video Accessories', 4),
(13, 'Other Electronics', 'other-electronics', 'Other Electronics', 4),
(14, 'Auto Parts & Accessories', 'audio-parts-and-accessories', 'Auto Parts & Accessories', 5),
(15, 'Cars', 'cars', 'Cars', 5),
(16, 'Motorbikes & Scooters', 'motorbikes-and-scooters', 'Motorbikes & Scooters', 5),
(17, 'Vans, Buses, & Lorries', 'vans-buses-and-lorries', 'Vans, Buses, & Lorries', 5),
(18, 'Auto Services', 'auto-services', 'Auto Services', 5),
(19, 'Three Wheelers', 'three-wheelers', 'Three Wheelers', 5),
(20, 'Bicycles', 'bicycles', 'Bicycles', 5),
(21, 'Heavy Machinery & Tractors', 'heavy-machinery-and-tractors', 'Heavy Machinery & Tractors', 5),
(22, 'Boats & Water Transport', 'boats-and-water-transport', 'Boats & Water Transport', 5),
(23, 'Houses', 'houses', 'Houses', 6),
(24, 'Land', 'land', 'Land', 6),
(25, 'Apartments', 'apartments', 'Apartments', 6),
(26, 'Commercial Property', 'commercial-property', 'Commercial Property', 6),
(27, 'Rooms & Annexes', 'rooms-and-annexes', 'Rooms & Annexes', 6),
(28, 'Holiday & Short-Term Rental', 'holday-and-short-term-rental', 'Holiday & Short-Term Rental', 6),
(29, 'New Developments', 'new-developments', 'New Developments', 6),
(30, 'Industry Tools & Machinery', 'industry-tools-and-machinery', 'Industry Tools & Machinery', 7),
(31, 'Office Equipment, Supplies and Stationary', 'oficce-equipment-supplies-and-stationary', 'Office Equipment, Supplies and Stationary', 7),
(32, 'Solar & Generators', 'solar-and-generators', 'Solar & Generators', 7),
(33, 'Raw Materials & Wholesale Lots', 'raw-materials-and-wholesale-lots', 'Raw Materials & Wholesale Lots', 7),
(34, 'Other Business Services', 'other-business-services', 'Other Business Services', 7),
(35, 'Healthcare, Medical Equipment & Supplies', 'healthcare-medical-equipment-and-supplies', 'Healthcare, Medical Equipment & Supplies', 7),
(36, 'Licenses & Titles', 'licenses-and-tiles', 'Licenses & Titles', 7),
(37, 'Furniture', 'furniture', 'Furniture', 8),
(38, 'Garden', 'garden', 'Garden', 8),
(39, 'Kitchen Items', 'kitchen-items', 'Kitchen Items', 8),
(40, 'Other Home Items', 'other-home-items', 'Other Home Items', 8),
(41, 'Building Material & Tools', 'building-material-and-tools', 'Building Material & Tools', 8),
(42, 'Home Decor', 'home-decor', 'Home Decor', 8),
(43, 'Bathroom & Sanitaryware', 'bathroom-and-sanitaryware', 'Bathroom & Sanitaryware', 8),
(44, 'Healthcare', 'healthcare', 'Healthcare', 9),
(45, 'Grocery', 'grocery', 'Grocery', 9),
(46, 'Fruits & Vegetables', 'fruits-and-vegetables', 'Fruits & Vegetables', 9),
(47, 'Other Essentials', 'other-essentials', 'Other Essentials', 9),
(48, 'Meat & Seafood', 'meat-and-seafood', 'Meat & Seafood', 9),
(49, 'Gas', 'gas', 'Gas', 9),
(50, 'Baby Products', 'baby-products', 'Baby Products', 9),
(51, 'Household', 'household', 'Household', 9),
(52, 'Pets', 'pets', 'Pets', 10),
(53, 'Animal Accessories', 'animal-accessories', 'Animal Accessories', 10),
(54, 'Farm Animals', 'farm-animals', 'Farm Animals', 10),
(55, 'Pet Food', 'pat-food', 'Pet Food', 10),
(56, 'Veterinary Services', 'veterinary-services', 'Veterinary Services', 10),
(57, 'Other Animals', 'other-animals', 'Other Animals', 10),
(58, 'Musical Instruments', 'musical-instruments', 'Musical Instruments', 11),
(59, 'Sports Equipments', 'sports-equipments', 'Sports Equipment', 11),
(60, 'Art & Collectibles', 'art-and-collectibles', 'Art & Collectibles', 11),
(61, 'Other Hobby, Sport & Kids Items', 'other-hoppy-sport-and-kids-items', 'Other Hobby, Sport & Kids Items', 11),
(62, 'Children\'s Items', 'childrens-items', 'Children\'s Items', 11),
(63, 'Music, Books & Movies', 'music-books-and-movies', 'Music, Books & Movies', 11),
(64, 'Sports Supplements', 'sports-supplements', 'Sports Supplements', 11),
(65, 'Health & Beauty Products', 'health-and-beauty-products', 'Health & Beauty Products', 12),
(66, 'Clothing', 'clothing', 'Clothing', 12),
(67, 'Jewelry', 'jewelry', 'Jewelry', 12),
(68, 'Shoes & Footwear', 'shoes-and-footwear', 'Shoes & Footwear', 12),
(69, 'Watches', 'watches', 'Watches', 12),
(70, 'Bags & Luggage', 'bags-and-luggage', 'Bags & Luggage', 12),
(71, 'Other Personal Items', 'other-personal-items', 'Other Personal Items', 12),
(72, 'Other Fashion Accessories', 'other-fashion-accessories', 'Other Fashion Accessories', 12),
(73, 'Sunglasses & Opticians', 'sunglasses-and-opticians', 'Sunglasses & Opticians', 12),
(74, 'Trade Services', 'trade-services', '', 13),
(75, 'Domestic Services', 'domestic-services', 'Domestic Services', 13),
(76, 'Events & Entertainment', 'events-and-entertainment', 'Events & Entertainment', 13),
(77, 'Other Services', 'other-services', '', 13),
(78, 'Health & Wellbeing', 'health-and-wellbeing', '', 13),
(79, 'Travel & Tourism', 'travel-and-tourism', '', 13),
(80, 'Local', 'local', 'Local', 14),
(81, 'Overseas', 'overseas', 'Overseas', 14),
(82, 'Tuition', 'tuition', 'Tuition', 15),
(83, 'Vocational Institutes', 'vocational-institutes', 'Vocational Institutes', 15),
(84, 'Higher Education', 'higher-education', 'Higher Education', 15),
(85, 'Textbooks', 'textbooks', 'Textbooks', 15),
(86, 'Other Education', 'other-education', 'Other Education', 15),
(87, 'Crops, Seeds & Plants', 'crops-seeds-and-plants', 'Crops, Seeds & Plants', 16),
(88, 'Farming Tools & Machinery', 'farming-tools-and-machinery', 'Farming Tools & Machinery', 16),
(89, 'Other Food & Agriculture', 'other-food-and-agriculture', 'Other Food & Agriculture', 16),
(90, 'Food', 'food', 'Food', 16),
(91, 'Miscellaneous', 'miscellaneous', 'Miscellaneous', 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `privilege` int(2) DEFAULT 2 COMMENT '1 - admin and 2 - adpostert',
  `contact_no` varchar(14) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` int(2) DEFAULT 1 COMMENT '0 - inactive and 1 - active',
  `nic` varchar(25) DEFAULT NULL COMMENT 'either nic or passport number is recorded',
  `passport_no` varchar(25) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `fname`, `lname`, `dob`, `privilege`, `contact_no`, `description`, `status`, `nic`, `passport_no`, `address`, `country`, `district`, `city`, `created`) VALUES
(1, 'minojs', '$2y$10$45eIOO3AvXv..O/N9qpSz.SllFg70Qn.UHeMYDbokxt/1I8g7SOOa', 'minojselvaraj@gmail.com', 'Minoj', 'Selvarasa', '1999-12-27', 1, '0724999547', 'Person who wanted to post advertisements.', 1, '199912358585', '199984757585', '125/1, Hendala Road, Wattala', 'Sri Lanka', 'Gampaha', 'Wattala', '2020-05-27 12:30:11'),
(2, 'hariharan', '$2y$10$45eIOO3AvXv..O/N9qpSz.SllFg70Qn.UHeMYDbokxt/1I8g7SOOa', 'hariharankim@gmail.com', 'Hariharan', 'Vasudevan', '1999-04-24', 2, '0724999547', 'New Joinee', 1, '19485858399V', '558948775', '125/1, Hendala Road, Wattala', 'Sri Lanka', '', 'Dehiwela', '2020-06-01 00:51:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CK_1` (`cat_id`),
  ADD KEY `FK_CK_2` (`user_id`),
  ADD KEY `FK_CK_3` (`customer_id`),
  ADD KEY `FK_CK_4` (`subcat_id`),
  ADD KEY `FK_CK_5` (`location`);

--
-- Indexes for table `ad_edit`
--
ALTER TABLE `ad_edit`
  ADD PRIMARY KEY (`ad_edit_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_session`
--
ALTER TABLE `ci_session`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CK_9` (`ad_id`),
  ADD KEY `FK_CK_10` (`user_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CK_20` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ad_edit`
--
ALTER TABLE `ad_edit`
  MODIFY `ad_edit_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `FK_CK_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_CK_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CK_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_CK_4` FOREIGN KEY (`subcat_id`) REFERENCES `sub_category` (`id`),
  ADD CONSTRAINT `FK_CK_5` FOREIGN KEY (`location`) REFERENCES `location` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_CK_10` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CK_9` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `FK_CK_20` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
