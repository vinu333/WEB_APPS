CREATE TABLE `t` (

  `uid` int(11) NOT NULL,
  `message` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `t` ( `uid`, `message`, `date`) VALUES

( 2, 'message1', '2020-01-25 17:36:38'),
( 1, 'message2', '2020-01-25 17:36:40'),
( 2, 'message3', '2020-01-25 17:36:43'),
( 1, 'message4', '2020-01-25 17:36:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
--

--

--

--
-- AUTO_INCREMENT for table `user`
SELECT * FROM t WHERE date IN ( SELECT MAX(date) FROM t GROUP BY `uid` )
