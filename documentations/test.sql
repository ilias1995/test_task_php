--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `secondName` varchar(50) NOT NULL,
  `sex` int(11) NOT NULL,
  `privilege` int(11),
  `birthDate` DATE, 
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `users` (`userId`, `userName`, `userPass`, `name`, `secondName`, `sex`, `privilege`, `birthDate`) VALUES (1, 'user', 'qwerty', 'admin', 'admin', 2, 1, '1995.04.25')
INSERT INTO `users` (`userId`, `userName`, `userPass`, `name`, `secondName`, `sex`, `privilege`, `birthDate`) VALUES (1, 'iliyaz', 'qwerty', 'iliyaz', 'kazikhodzhaev', 1, 2, '1994.04.25')

--
-- Table structure for table `usernotes`
--

CREATE TABLE IF NOT EXISTS `usernotes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` TEXT NOT NULL, 
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- Table structure for table `sex`
--
DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Sex` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Table structure for table `privilege`
--

DROP TABLE IF EXISTS `privilege`;
CREATE TABLE IF NOT EXISTS `privilege` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `privilege` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`Sex`) VALUES
('male'),
('female');

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilege`) VALUES
('admin'),
('user');
