
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `ebay`
--

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `count` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `keyword`, `count`, `time_stamp`) VALUES
(15, 'mobiles', 4, '2018-08-09 06:42:17'),
(16, 'mobile', 2, '2018-08-09 06:42:17'),
(17, 'cars', 1, '2018-08-09 06:42:34'),
(18, 'mobiles qmobile', 1, '2018-08-09 06:59:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyword` (`keyword`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
