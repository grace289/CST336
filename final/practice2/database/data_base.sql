--
-- Table structure for table `fp_login`
--

CREATE TABLE IF NOT EXISTS `fp_login` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastLoginStatus` char(1) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fp_login`
--

INSERT INTO `fp_login` (`userId`, `username`, `password`, `lastLogin`, `lastLoginStatus`) VALUES
(1, 'bob', '48181acd22b3edaebc8a447868a7df7ce629920a', '2018-11-04 06:29:18', 'S'),
(2, 'joe', '16a9a54ddf4259952e3c118c763138e83693d7fd', '2018-11-04 06:29:30', 'U'),
(3, 'sue', '1eac7bdcbb6c569f15ecbf5cd873a2c477888e56', '2018-11-05 17:13:17', 'S');

