-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2018 at 06:21 AM
-- Server version: 5.7.20
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) NOT NULL,
  `title` varchar(70) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `username`, `date_added`) VALUES
(1, 'Cascading Style Sheets', 'Cascading Style Sheets were introduced in HTML 4. Using Style Sheets enables web\r\nauthors to separate web page content and web page layout and therefore\r\n-> create more sophisticated page design (page style and layout)\r\n-> manage the complex web sites: develop, maintain and keep sites consistant\r\n-> make web pages accessible to as many readers as possible, regardless of the\r\ndevice they use to read a page.', 'Steve \"the web developer\"', '2018-06-15 13:12:02'),
(2, 'ቻይንዬ', 'ሴትዮዋ ልጃቸው ከቻይና ትወልዳለች አሉ፡፡ አንድ ወር እንደሞላት ልጂቱ ትሞትና ልቅሶ ይጠራሉ፡፡\r\nታድያ እያለቀሱ ወደ ድንኳኑ ሲገቡ ምን አሉ መሰላችሁ «እኔ ድሮም ጠርጥሬ ነበር፣ ጠርጥሬ ነበር፤\r\nየቻይና ነገር ይኼው ነው አይበረክትም» አሉ ይባላል፡፡\r\nበአሁኑ ጊዜ በኢትዮጵያ ሚዲያ ስማቸው ከሚነሣ ሀገሮች እና ሕዝቦች መካከል የቻይናን እና የቻይኖችን\r\nያህል ቦታ ያለው የለም፡፡\r\nበመንገድ ሥራ፣ በግድብ፣ በማዕድን ማውጣት፣ በቴሌ ኮሙኒኬሽን፣ በሸቀጣ ሸቀጥ፣ በፖለቲካ፣ ባህል\r\nሁለ ነገራችን ቻይና ቻይና ይላል፡፡ የኢትዮጰያ ቴሌቭዥን እንኳን በቀን ውስጥ ቢያንስ አንድ የቻይና ዜና\r\nሳያሳየን አይውልም፡፡ ጠላ ቤት፣ ጠጅ ቤት፣ ሥጋ ቤት፣ ጉልት ገበያ፣ መርካቶ፣ አትክልት ተራ፣ አጠና\r\nተራ፣ በግ ተራ፣ ካዛንቺስ፣ ቺቺንያ ዘወር ዘወር ብትሉ ከአሥሩ ሰው አንድ ሦስቱ ቻይና ሆኖ\r\nታገኙታላችሁ፡፡\r\nእንዲያውም ከመብዛታቸው የተነሣ እንደ አንድ ብሔረሰብ ተቆጥረን በፌዴሬሽን ምክር ቤት ወንበር\r\nይሰጠን ብለዋል እየተባለ ይቀለድም ነበር፡፡', 'Daniel Kebret', '2018-06-15 13:14:36'),
(3, 'A Christmas Carol', 'Marley was dead to begin with. There is no doubt whatever about that. The\r\nregister of his burial was signed by the clergyman the clerk the undertaker and\r\nthe chief mourner. Scrooge signed it. And Scrooges name was good upon Change\r\nfor anything he chose to put his hand to. Old Marley was as dead as a door-nail.\r\nMind! I dont mean to say that I know of my own knowledge what there is\r\nparticularly dead about a door-nail. I might have been inclined myself to regard\r\na coffin-nail as the deadest piece of ironmongery in the trade. But the wisdom of\r\nour ancestors is in the simile and my unhallowed hands shall not disturb it or\r\nthe Countrys done for. You will therefore permit me to repeat emphatically\r\nthat Marley was as dead as a door-nail.', 'Charles Dickens', '2018-06-15 13:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Steve \"the web developer\"', '1'),
(2, 'Daniel Kebret', '1'),
(3, 'Charles Dickens', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
