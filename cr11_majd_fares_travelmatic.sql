-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 05:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_majd_fares_travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `eventname` varchar(30) NOT NULL,
  `EventDate` date NOT NULL,
  `EventTime` time NOT NULL,
  `price` varchar(30) NOT NULL,
  `loction` varchar(200) NOT NULL,
  `eventweb` mediumtext NOT NULL,
  `eventimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventname`, `EventDate`, `EventTime`, `price`, `loction`, `eventweb`, `eventimg`) VALUES
(1, ' Sinnesrauschen Festival 2019', '2019-03-23', '19:00:00', '15euro', 'vienna', 'https://www.hausdermusik.com/event/hdm-sinnesrauschen-2019', 'https://www.hausdermusik.com/wp-content/uploads/2018/12/Sinnesrauschen-Banner.png'),
(2, 'SIMON BOCCANEGRA', '2019-03-22', '19:00:00', '75euro', 'opera', 'https://www.viennaconcerts.com/eventinfo/Vienna-State-Opera-SIMON-BOCCANEGRA', 'https://www.viennaconcerts.com/e/5be81f29c392f359c2a0bc91dc9e4b3a8936ebe2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `famousplace`
--

CREATE TABLE `famousplace` (
  `fplaceID` int(11) NOT NULL,
  `fpname` varchar(30) NOT NULL,
  `fpaddress` varchar(200) NOT NULL,
  `fptype` enum('museum','historical_site','must_see') NOT NULL,
  `fpdescription` mediumtext NOT NULL,
  `fpweb` mediumtext NOT NULL,
  `fpimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `famousplace`
--

INSERT INTO `famousplace` (`fplaceID`, `fpname`, `fpaddress`, `fptype`, `fpdescription`, `fpweb`, `fpimg`) VALUES
(1, 'St. Charles Church', 'Karlsplatz 1', 'historical_site', 'The Rektoratskirche St. Karl Borrom us, commonly called the Karlskirche, is a baroque church located on the south side of Karlsplatz in Vienna, Austria', 'http://www.karlskirche.at/', 'https://c1.staticflickr.com/4/3131/5852161082_21f254dfbe_b.jpg'),
(2, 'Zoo Vienna', 'MaxingstraÃŸe 13b', 'must_see', 'Tiergarten SchÃ¶nbrunn, or \"Vienna Zoo\", is a zoo located on the grounds of the famous SchÃ¶nbrunn Palace in Vienna, Austria. Founded as an imperial menagerie in 1752, it is the oldest continuously operating zoo in the world', 'https://www.zoovienna.at/en/', 'https://www.zoovienna.at/media/_versions_/heroteaser/pandabuch_tgs_zupanc_15_hero_wide_1374.jpg'),
(3, 'Rathaus', 'Friedrich-Schmidt-Platz 1', 'museum', 'Vienna City Hall is the seat of local government of Vienna, located on Rathausplatz in the Innere Stadt district', 'https://www.wien.gv.at/english/cityhall/', 'https://www.wien.info/media/images/40625-rathaus-rathausplatz-sommer-sonnenuntergang-1to1.jpeg/image_start-2x'),
(4, 'Spanisch riding school', 'Michaelerplatz 1', 'must_see', 'The Spanish Riding School in Vienna is the only institution in the world which has practiced for more than 450 years and continues to cultivate classical equitation in the Renaissance tradition of the Haute Ecole – which can also be found on UNESCO’s list of intangible cultural heritage of humanity.', 'https://www.srs.at', 'https://www.srs.at/fileadmin/_processed_/9/3/csm_School_Quadrille_c_Spanish_Riding_School_Rene_van_Bakel_-_Kopie__2__1b59c9e388.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locID` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `ZIP_code` int(11) NOT NULL,
  `fk_restaurant` int(11) DEFAULT NULL,
  `fk_events` int(11) DEFAULT NULL,
  `fk_fplace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `resID` int(11) NOT NULL,
  `resname` varchar(50) NOT NULL,
  `restelephone` varchar(30) NOT NULL,
  `restype` enum('syrien','chinese','indian','viennese') NOT NULL,
  `resdescription` mediumtext NOT NULL,
  `resaddress` varchar(200) NOT NULL,
  `resweb` mediumtext NOT NULL,
  `resimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`resID`, `resname`, `restelephone`, `restype`, `resdescription`, `resaddress`, `resweb`, `resimg`) VALUES
(1, 'Lemon Leaf Thai Restaurant', '+43(1)5812308', 'viennese', 'The Restaurant Lemonleaf Thai Restaurant is a small Restaurant located in fourth district in the city Vienna, very close to the place interest ', 'Kettenbruckengasse 19', 'http://www.lemonleaf.at/', 'http://www.lemonleafthai.com/wp-content/uploads/2017/09/2971291_orig-1-777x482.jpg'),
(2, 'SIXTA', '+43 1 58 528 56 l', 'viennese', ' Das FeingefÃ¼hl zwischen kreativer KÃ¼che und einem traditionellen ', 'SchÃ¶nbrunner Str. 21', 'http://www.sixta-restaurant.at/', 'https://media-cdn.tripadvisor.com/media/photo-s/0c/6d/66/3d/20160807-202452-largejpg.jpg'),
(3, 'YASSMIN ALSHAM', '+43(1) 8902170', 'syrien', 'orginal orientalische küche', 'Heiligenstädter Str. 9', 'https://www.jasminalsham.wien', 'https://www.jasminalsham.wien/wp-content/uploads/2017/01/DSC_0235_00008.jpg'),
(55, 'Village', '4315337516', 'indian', '', '', 'https://indien-village.at', 'https://indien-village.at/wp-content/uploads/2018/07/i8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(43) NOT NULL,
  `email` varchar(43) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rules` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `rules`) VALUES
(3, 'majd', 'majd@admin.code', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'admin'),
(4, 'saam', 'saam@factory.at', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'user'),
(5, 'marlene', 'test@test.com', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'user'),
(6, 'testuser', 'user@domin.org', '3ea87a56da3844b420ec2925ae922bc731ec16a4fc44dcbeafdad49b0e61d39c', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `famousplace`
--
ALTER TABLE `famousplace`
  ADD PRIMARY KEY (`fplaceID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locID`),
  ADD KEY `fk_events` (`fk_events`),
  ADD KEY `fk_fplace` (`fk_fplace`),
  ADD KEY `fk_restaurant` (`fk_restaurant`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`resID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `famousplace`
--
ALTER TABLE `famousplace`
  MODIFY `fplaceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`fk_events`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`fk_fplace`) REFERENCES `famousplace` (`fplaceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_ibfk_3` FOREIGN KEY (`fk_restaurant`) REFERENCES `restaurant` (`resID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
