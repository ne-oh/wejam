-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2018 at 03:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annieoh_playlists`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_view`
-- (See below for the actual view)
--
CREATE TABLE `all_view` (
`playlist_id` int(11)
,`song_id` int(11)
,`url` varchar(300)
,`description` varchar(500)
,`playlist_title` varchar(150)
,`title` varchar(300)
,`duration` varchar(45)
,`user_id` varchar(45)
,`user` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_view2`
-- (See below for the actual view)
--
CREATE TABLE `all_view2` (
`connection_id` int(11)
,`playlist_id` int(11)
,`creator_id` int(11)
,`visits` int(11)
,`song_id` int(11)
,`url` varchar(300)
,`youtube_id` varchar(45)
,`description` varchar(500)
,`playlist_title` varchar(150)
,`theme` varchar(45)
,`title` varchar(300)
,`user_id` varchar(45)
,`username` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `playlist_id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `theme` varchar(45) DEFAULT NULL,
  `preset` tinyint(4) DEFAULT NULL,
  `visits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`playlist_id`, `title`, `creator_id`, `theme`, `preset`, `visits`) VALUES
(83, 'Finals study Playlist', 9, 'Study', NULL, 128),
(113, 'Disney Songs', 9, 'Happy', NULL, 20),
(114, 'Ariana Grande', 9, '', NULL, 11),
(115, 'White Noise', 9, 'Study', NULL, 15),
(116, 'J. Cole Bops', 9, 'Rap', NULL, 12),
(117, 'Kendrick Lamar', 9, 'Rap', NULL, 56),
(118, 'Classical', 9, 'Study', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `connection_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist_songs`
--

INSERT INTO `playlist_songs` (`connection_id`, `playlist_id`, `song_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(6, 2, 1),
(7, 2, 3),
(8, 3, 2),
(9, 3, 2),
(10, 3, 1),
(12, 4, 2),
(13, 4, 3),
(14, 5, 3),
(15, 5, 2),
(16, 5, 1),
(17, 2, 2),
(18, 2, 1),
(19, 2, 3),
(20, 3, 2),
(21, 3, 2),
(22, 3, 1),
(23, 4, 1),
(24, 4, 2),
(25, 4, 3),
(26, 5, 3),
(27, 5, 2),
(28, 5, 1),
(29, 4, 1),
(30, 4, 2),
(31, 4, 3),
(32, 5, 3),
(33, 5, 2),
(34, 5, 1),
(35, 4, 1),
(36, 4, 2),
(37, 4, 3),
(38, 5, 3),
(39, 5, 2),
(40, 5, 1),
(42, 45, 18),
(43, 45, 18),
(44, 45, 18),
(45, 45, 18),
(46, 45, 18),
(47, 31, 18),
(48, 31, 18),
(49, 31, 18),
(50, 31, 18),
(51, 31, 18),
(52, 31, 18),
(53, 31, 18),
(54, 31, 18),
(55, 31, 18),
(56, 31, 18),
(57, 31, 18),
(58, 31, 18),
(59, 31, 18),
(60, 31, 18),
(61, 31, 18),
(62, 31, 18),
(63, 31, 18),
(64, 31, 18),
(65, 31, 18),
(66, 31, 18),
(67, 31, 18),
(68, 31, 18),
(69, 31, 18),
(70, 31, 18),
(71, 31, 18),
(72, 31, 18),
(73, 31, 18),
(74, 31, 18),
(75, 31, 18),
(76, 31, 18),
(77, 31, 18),
(78, 31, 18),
(79, 31, 18),
(80, 31, 18),
(81, 31, 18),
(82, 31, 18),
(83, 31, 18),
(84, 31, 18),
(85, 31, 18),
(86, 31, 18),
(87, 31, 18),
(88, 31, 18),
(89, 31, 18),
(90, 31, 18),
(91, 31, 18),
(92, 31, 18),
(93, 31, 18),
(94, 31, 18),
(95, 31, 18),
(96, 31, 18),
(97, 31, 18),
(98, 31, 18),
(99, 31, 18),
(100, 31, 18),
(101, 31, 18),
(102, 31, 18),
(103, 31, 18),
(104, 31, 18),
(105, 31, 18),
(106, 31, 18),
(107, 78, 1801),
(108, 78, 1802),
(109, 78, 18),
(110, 78, 1801),
(111, 78, 1802),
(112, 78, 1801),
(113, 78, 1802),
(114, 78, 18),
(115, 78, 1801),
(116, 78, 1802),
(117, 78, 1801),
(118, 78, 1802),
(119, 78, 18),
(120, 78, 1801),
(121, 78, 1802),
(122, 78, 1801),
(123, 78, 1802),
(124, 78, 18),
(125, 78, 1801),
(126, 78, 1802),
(127, 78, 1801),
(128, 78, 1802),
(129, 78, 18),
(130, 78, 1801),
(131, 78, 1802),
(132, 83, 1826),
(133, 83, 1827),
(134, 83, 1828),
(135, 83, 1829),
(136, 83, 1830),
(137, 84, 1831),
(138, 84, 1832),
(139, 84, 1833),
(140, 84, 1834),
(141, 84, 1835),
(142, 85, 1836),
(143, 85, 1837),
(144, 85, 1838),
(145, 85, 1839),
(146, 85, 1840),
(147, 86, 1841),
(148, 86, 1842),
(149, 86, 1842),
(150, 86, 1844),
(151, 86, 1845),
(152, 87, 1846),
(153, 87, 1847),
(154, 87, 1848),
(155, 87, 1849),
(156, 87, 1850),
(157, 87, 1846),
(158, 87, 1847),
(159, 87, 1848),
(160, 87, 1849),
(161, 87, 1850),
(162, 89, 1856),
(163, 89, 1857),
(164, 89, 1858),
(165, 89, 1859),
(166, 89, 1860),
(167, 89, 1856),
(168, 89, 1857),
(169, 89, 1858),
(170, 89, 1859),
(171, 89, 1860),
(172, 91, 1866),
(173, 91, 1867),
(174, 91, 1868),
(175, 91, 1869),
(176, 91, 1870),
(177, 92, 1871),
(178, 92, 1872),
(179, 92, 1873),
(180, 92, 1874),
(181, 92, 1875),
(182, 93, 1875),
(183, 93, 1877),
(184, 93, 1878),
(185, 93, 1879),
(186, 93, 1880),
(187, 93, 1875),
(188, 93, 1877),
(189, 93, 1878),
(190, 93, 1879),
(191, 93, 1880),
(192, 95, 1886),
(193, 95, 1887),
(194, 95, 1888),
(195, 95, 1889),
(196, 95, 1890),
(197, 96, 1891),
(198, 96, 1892),
(199, 96, 1893),
(200, 96, 1894),
(201, 96, 1895),
(202, 96, 1891),
(203, 96, 1892),
(204, 96, 1893),
(205, 96, 1894),
(206, 96, 1895),
(207, 98, 1895),
(208, 98, 1902),
(209, 98, 1903),
(210, 98, 1904),
(211, 98, 1905),
(212, 99, 1906),
(213, 99, 1907),
(214, 99, 1908),
(215, 99, 1909),
(216, 99, 1910),
(217, 100, 1911),
(218, 100, 1912),
(219, 100, 1913),
(220, 100, 1914),
(221, 100, 1915),
(222, 100, 1911),
(223, 100, 1912),
(224, 100, 1913),
(225, 100, 1914),
(226, 100, 1915),
(227, 102, 1921),
(228, 102, 1922),
(229, 102, 1923),
(230, 102, 1924),
(231, 102, 1925),
(232, 102, 1921),
(233, 102, 1922),
(234, 102, 1923),
(235, 102, 1924),
(236, 102, 1925),
(237, 104, 1931),
(238, 104, 1932),
(239, 104, 1933),
(240, 104, 1934),
(241, 104, 1935),
(242, 105, 1936),
(243, 105, 1937),
(244, 105, 1938),
(245, 105, 1939),
(246, 105, 1940),
(247, 106, 1941),
(248, 106, 1942),
(249, 106, 1943),
(250, 106, 1943),
(251, 106, 1945),
(252, 107, 1945),
(253, 107, 1947),
(254, 107, 1948),
(255, 107, 1949),
(256, 107, 1950),
(257, 107, 1945),
(258, 107, 1947),
(259, 107, 1948),
(260, 107, 1949),
(261, 107, 1950),
(262, 109, 1956),
(263, 109, 1957),
(264, 109, 1958),
(265, 109, 1959),
(266, 109, 1960),
(267, 110, 1961),
(268, 110, 1962),
(269, 110, 1963),
(270, 110, 1964),
(271, 110, 1965),
(272, 111, 1966),
(273, 111, 1966),
(274, 111, 1968),
(275, 111, 1969),
(276, 111, 1970),
(277, 111, 1966),
(278, 111, 1966),
(279, 111, 1968),
(280, 111, 1969),
(281, 111, 1970),
(282, 113, 1976),
(283, 113, 1977),
(284, 113, 1978),
(285, 113, 1979),
(286, 113, 1980),
(287, 113, 1981),
(288, 113, 1982),
(289, 114, 1983),
(290, 114, 1984),
(291, 114, 1985),
(292, 114, 1986),
(293, 114, 1987),
(294, 114, 1988),
(295, 114, 1989),
(296, 115, 1990),
(297, 115, 1991),
(298, 115, 1992),
(299, 115, 1993),
(300, 115, 1994),
(301, 116, 1995),
(302, 116, 1996),
(303, 116, 1997),
(304, 116, 1998),
(305, 116, 1999),
(306, 117, 2000),
(307, 117, 2001),
(308, 117, 2002),
(309, 117, 2003),
(310, 117, 2004),
(311, 118, 2005),
(312, 118, 2006),
(313, 118, 2007),
(314, 118, 2008),
(315, 118, 2009),
(316, 119, 2010),
(317, 119, 2011),
(318, 119, 2012),
(319, 119, 2013),
(320, 119, 2014);

-- --------------------------------------------------------

--
-- Stand-in structure for view `playlist_view`
-- (See below for the actual view)
--
CREATE TABLE `playlist_view` (
`playlist_id` int(11)
,`title` varchar(150)
,`creator_id` int(11)
,`theme` varchar(45)
,`preset` tinyint(4)
,`username` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `youtube_id` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `title`, `url`, `user_id`, `duration`, `youtube_id`, `description`) VALUES
(1, 'Josman - V&V | A COLORS SHOW', 'https://www.youtube.com/watch?v=AjcHVCcRq_o', '1', '2;58', 'wZZ7oFKsKzY', NULL),
(2, 'Lava La Rue - Widdit | A COLORS SHOW\n', 'https://www.youtube.com/watch?v=r-x6sBYbmbM', '1', NULL, 'wZZ7oFKsKzY', NULL),
(3, 'S. Pri Noir - Chico | A COLORS SHOW\n', 'https://www.youtube.com/watch?v=tc43B0rl-Qo', '1', '2:16', 'wZZ7oFKsKzY', NULL),
(1826, 'ðŸŽ… a lofi christmas mix ðŸŽ…', 'https://www.youtube.com/watch?v=tzicgKcYQAA', '9', 'PT44M1S', 'tzicgKcYQAA', 'from the folks who brought you a hip hop christmas mix\nwe present to you the 2nd edition, this time, lo-fi based!\n\n01 00:00 merry christmas, you filthy animal.\n02 00:06 mittens - winter is here\n03 02:14 jk-47 - christmas time iz here\n04 05:06 soft eyez - winter wonderland\n05 06:56 pneumoniker - snowfall\n06 08:16 cruel buddhist - chesnuts\n07 10:30 limes - wonderland\n08 12:36 harren - christmas is all about...\n09 14:14 idealism - snowfall\n10 17:06 conative clay - on a winter night\n11 19:24 monty d'),
(1827, 'Chill Study Beats 4 â€¢ jazz & lofi hiphop Mix [2017]', 'https://www.youtube.com/watch?v=8iU8LPEa4o0', '9', 'PT2H2M52S', '8iU8LPEa4o0', 'Thanks to all 1 million of you who share the love for this music. â™¥\nðŸŽ§ Similar Music on Spotify Â» http://bit.ly/CMsingles\nðŸŽ§ Tracklist: (* = Unreleased)\n0:00 idealism - Both of Us\n2:10 Keem the Cipher - [BLOSSOM.] (w sugi.wa)\n3:58 Jhfly - Crossings\n* 6:42 invention_ - skyrateÂºÂº\n8:32 leavv - Home\n10:28 Allem Iversom - Without You\n* 11:23 sugi.wa - pianos\n* 12:58 Kendall Miles - isla bella\n14:47 The Deli - Moonlight\n17:10 jsan - this feelings too good\n* 19:01 baaskaT - Guttered\n* 21:30 in'),
(1828, 'Lofi hip hop mix - Beats to Relax/Study to [2018]', 'https://www.youtube.com/watch?v=-FlxM_0S2lA', '9', 'PT2H1S', '-FlxM_0S2lA', 'ðŸŽ¼ChilledCows Spotify playlist  â†’ http://bit.ly/spotifychilledcow\nðŸ‘• ChilledCow shop â†’ https://chilledcow-merch.com\n\nFull tracklist\n\n[00:00:00] idealism - last time\n[00:02:50] Philanthrope X Kupla - Cycles\n[00:05:25] bloopr - mondayloop [no friends, no worries]\n[00:06:50] leavv - within \n[00:09:30] leavv & misc.inc - Pictures (unreleased)\n[00:11:35] fortnight - 2000\n[00:13:03] Soho - At Peace\n[00:14:58] blnkspc_  - Sticky\n[00:18:30] jsan - in time (unreleased)\n[00:20:43] Dweeb -72 Audi C'),
(1829, 'ï½ï½” ï½ƒï½ï½† Ã© Â­ [lofi / jazz hip hop mix]', 'https://www.youtube.com/watch?v=K9u8zFVjX1g', '9', 'PT52M52S', 'K9u8zFVjX1g', 'the 2nd lofi mix set. \ngood music to listen to while studying at a cafe. \n\nâ— Tracklist\n00:00 burbank - seeing your name makes me happy\n01:49 Mittensã•ã‚“ - Too Easily\n04:38 Joey Pecoraro - Finding Parking\n07:32 wofy - . (wï¼The Plan8)\n10:10 BATBXY - all i have.\n12:12 Cabu - Good Evening\n15:00 Iwamizu - ä¿—ä¸–ï¼Zokuse\n17:32 Domo. - Cafe\n19:50 too ugly - cafe nervosa\n22:26 Future James - Pure Imagination\n26:54 chuckee. - goin far (version 2)\n30:18 The Deli - 5ï¼š32 PM\n32:29 ï½‡ï½ï½’ï½‚ï½ï¼™'),
(1830, '3:30 a.m. ~ lofi hip hop / jazzhop / chillhop mix [study/sleep/homework music]', 'https://www.youtube.com/watch?v=dR17U5-VKtw', '9', 'PT48M26S', 'dR17U5-VKtw', 'Thank you so much for 100k â™¥â™¥\n\nâ–¬â˜…Subscribe and click the bell icon for more chill hip hop beats â™«â™ªâ˜…â–¬\n\nâ˜…I just rebranded my Patreon, I hope all of you can check it out, if you may or may not know, my channel was demonetized recently, so any kind of support is appreciated :) https://www.patreon.com/Feardog â˜…\n\nâ–ºI want to thank each and every one of you for 100 THOUSAND subscribers! It has been one of my biggest goals and we did it in just a little over a year which is absolute'),
(1976, 'Aulii Cravalho - How Far Ill Go', 'https://www.youtube.com/watch?v=cPAbx5kgCJo', '9', 'PT2M36S', 'cPAbx5kgCJo', 'See the film, starring Dwayne The Rock Johnson & AuliÊ»i Cravalho, available digitally now!\n\nThe Moana soundtrack is available now:\nDownload: http://disneymusic.co/MVOSndtrk \nStreaming: http://disneymusic.co/MVOSndtrkWS \nSheet Music: http://bit.ly/HowFarIllGo_MovieVersion_SheetMusic\n\nFollow Disney Music:\nhttp://facebook.com/disneymusic\nhttp://twitter.com/disneymusic\nhttp://instagram.com/disneymusic \nhttp://snapchat.com/add/disneymusic \n\nFollow Moana:\nhttp://disney.com/moana \nhttp://facebook.com/'),
(1977, 'top 30 Disney songs', 'https://www.youtube.com/watch?v=KkBZRnBaBV0', '9', 'PT32M6S', 'KkBZRnBaBV0', 'Timecode links for the tracks BELOW !!!\n\nI hope you enjoyed the video. Dont forget to leave your comment, subscribe and click Like.\n\nThe video presents the compilation of the most beautiful songs of Disney animated movies.\n\n!!! Remember that this is my own subjective view !!!\n\nPlease note that I do not own the footage and the audio track presented in this video. \nIt all belongs to Disney.\n\n\nTop 30 of Disney songs:\n\n30. 00:11 Under the Sea from The Little Mermaid (1989)\n29. 00:58 The Bare Necessi'),
(1978, 'The Lion King - I Just Cant Wait To Be King (1080p)', 'https://www.youtube.com/watch?v=0bGjlvukgHU', '9', 'PT3M42S', '0bGjlvukgHU', 'Enjoy!'),
(1979, 'Tangled - I See The Light  - Mandy Moore', 'https://www.youtube.com/watch?v=RyrYgCvxBUg', '9', 'PT3M31S', 'RyrYgCvxBUg', 'Tangled - I See The Light - Mandy Moore-'),
(1980, 'Beauty and the Beast - Tale As Old As Time [HD]', 'https://www.youtube.com/watch?v=uQ0ODCMC6xs', '9', 'PT4M7S', 'uQ0ODCMC6xs', 'Hi fellow youtube users! As promised I will be uploading 4 different songs from Beauty and the Beast in high definition, so you are basically watching the Blu-Ray Diamond Edition version of the songs on your computer! This song is Tale as old as time. Make sure to watch in 720p to get the best picture, thanks! Please remember to like, comment and subscribe. Enjoy!'),
(1981, 'Mulan | Ill Make A Man Out Of You | Disney Sing-Along', 'https://www.youtube.com/watch?v=TVcLIfSC4OE', '9', 'PT3M23S', 'TVcLIfSC4OE', 'Be swift as a coursing river as you sing along to Ill Make a Man Out of You from Mulan with this lyric video.\n\nSUBSCRIBE to get notified when new Disney videos are posted: http://di.sn/Subscribe\n\nGet even more Disney YouTube\nOh My Disney: https://www.youtube.com/user/OhMyDisney\nDisney Style: https://www.youtube.com/user/disneysstyle\nDisney Family: https://www.youtube.com/user/Disney\nMickey Mouse: https://www.youtube.com/user/DisneyShorts\n\nYou Might Also Like: \nAs Told By Emoji: https://www.youtu'),
(1982, 'FROZEN | Let It Go Sing-along | Official Disney UK', 'https://www.youtube.com/watch?v=L0MK7qz13bU', '9', 'PT4M3S', 'L0MK7qz13bU', 'Sing-along with Idina Menzel in this full sequence from Disneys Frozen.\n\nSubscribe to Disney UK: http://bit.ly/subscribe-to-disney  \nFollow us on Twitter: https://twitter.com/Disney_UK \nLike our official Facebook page: https://www.facebook.com/DisneyUK\n\nWalt Disney Animation Studios, the studio behind Tangled and Wreck-It Ralph, presents Frozen, a stunning big-screen comedy adventure. Fearless optimist Anna (voice of Kristen Bell) sets off on an epic journeyâ€”teaming up with rugged mountain man'),
(1983, 'Ariana Grande - thank u, next', 'https://www.youtube.com/watch?v=gl1aHhXnN1k', '9', 'PT5M31S', 'gl1aHhXnN1k', 'thank u, next (Official Video)\n\nSong available here: https://arianagrande.lnk.to/thankunextYD\n\nDirected by Hannah Lux Davis\nProduced by Brandon Bonfiglio \nEdited by Hannah Lux Davis & Taylor Tracy Walsh\nProduction Company: London Alley\nExecutive Producers: Brandon Bonfiglio, Luga Podesta, Andrew Lerios\nColorist: Bryan Smaller\n\nFeaturing (in alphabetical order)\n\nColleen Ballinger\nJonathan Bennett\nMatt Bennett\nCourtney Chipolone\nJennifer Coolidge\nGabi DeMartino\nStefanie Drummond\nElizabeth Gillies\n'),
(1984, 'Ariana Grande - Almost is Never Enough (Audio Only)', 'https://www.youtube.com/watch?v=taPlLuvY0Hw', '9', 'PT5M28S', 'taPlLuvY0Hw', 'If you liked this video go to: http://goo.gl/VyQEWv\n\nMusic video by Ariana Grande performing Almost is Never Enough. Â©: Republic Records, a division of UMG Recordings, Inc.\n\nAriana Grande - Almost is Never Enough\nAriana Grande - Almost is Never Enough\nAriana Grande - Almost is Never Enough'),
(1985, 'Ariana Grande - goodnight n go (Audio)', 'https://www.youtube.com/watch?v=sXJ2hajo6rw', '9', 'PT3M11S', 'sXJ2hajo6rw', 'Music video by Ariana Grande performing goodnight n go (Audio). Â© 2018 Republic Records, a Division of UMG Recordings, Inc.\n\nhttp://vevo.ly/P1aoyE'),
(1986, 'Mac Miller - My Favorite Part (feat. Ariana Grande)', 'https://www.youtube.com/watch?v=J_8xCOSekog', '9', 'PT4M35S', 'J_8xCOSekog', 'From The Divine Feminine, available on iTunes & Spotify now: https://smarturl.it/MM.TDF\n\nDirected by _p\n\nCONNECT WITH MAC MILLER \nTwitter: https://twitter.com/macmiller \nFacebook: https://facebook.com/macmiller \nInstagram: https://instagram.com/macmiller\nSoundcloud: https://soundcloud.com/larryfisherman'),
(1987, 'Ariana Grande - sweetener (Audio)', 'https://www.youtube.com/watch?v=6vay5SgNPpk', '9', 'PT3M30S', '6vay5SgNPpk', 'Music video by Ariana Grande performing sweetener (Audio). Â© 2018 Republic Records, a Division of UMG Recordings, Inc.\n\nhttp://vevo.ly/zdb1nX'),
(1988, 'Ariana Grande - December (Audio)', 'https://www.youtube.com/watch?v=WBXncmnxmAg', '9', 'PT1M57S', 'WBXncmnxmAg', 'Ariana Grande - December (Audio)\n\nhttp://vevo.ly/Ky9LUG\nBest of Ariana Grande: https://goo.gl/XmsuFK\nSubscribe here: https://goo.gl/Fubqyy'),
(1989, 'Ariana Grande - The Way ft. Mac Miller', 'https://www.youtube.com/watch?v=_sV0S8qWSy0', '9', 'PT3M52S', '_sV0S8qWSy0', 'New single Problem available now on iTunes: http://smarturl.it/ArianaMyEvrythnDlxiT?IQid=vevo.cta.the.way\n\nAriana Grande â€œThe Wayâ€ Ft. Mac Miller:\niTunes: http://smarturl.it/ArianaGrandeTheWayiT\nAmazon: http://smarturl.it/ArianaGrandeTheWayAZ\n\nMusic video by Ariana Grande performing The Way. Â©:  Republic Records, a division of UMG Recordings, Inc.\nBest of Ariana Grande: https://goo.gl/XmsuFK\nSubscribe here: https://goo.gl/Fubqyy'),
(1990, 'Box Fan Sleep Sounds White Noise | Fall Asleep & Stay Sleeping All Night | 10 Hours', 'https://www.youtube.com/watch?v=QWZ2hCj8Btw', '9', 'PT10H', 'QWZ2hCj8Btw', 'Sleep better with this box fan white noise. The soothing sleep sound blocks out distracting sounds so that you can fall asleep more easily and not be awoken during the night. Sleeping is easier with fan sounds!\n\nThe fan noise is also a useful tool to help you with studying or any task that requires focus. Because the fan acts like a sound masking machine, your peace is not disturbed as you concentrate on tasks such as homework, office work, writing, reading or prepping for exams.\n\nFor parents - '),
(1991, 'Rain Sounds on Tin Roof | Sleep, Study, Focus with Rainstorm White Noise | 10 Hours', 'https://www.youtube.com/watch?v=T38aSWQkiWM', '9', 'PT10H1S', 'T38aSWQkiWM', 'Rain falls upon a tin roof, creating a soothing rainstorm white noise that is perfect for helping you sleep, study, focus or relax. Block out distractions to help you fall asleep and stay sleeping all night long. Or try using the rainstorm sound masking to help you focus while doing tasks such as studying, reading, homework, writing essays, office work and other activities that require a high level of concentration.\n\nIf you enjoyed this nature rain sounds video, please check out our other storm '),
(1992, 'Library Sounds | Study Ambience | 2 Hours', 'https://www.youtube.com/watch?v=4vIQON2fDWM', '9', 'PT2H', '4vIQON2fDWM', 'One of the largest private collections in Greycott, this library houses ancient tomes as well as newly published books by local authors. Topics range from the arcane to the history of the city and its surrounds. There is also an extensive catalogue of private letters and family records that go back many generations. This library is a place for quiet research and reflection.\n-------\nThanks for visiting the guild! Please leave a Like and subscribe for future uploads.\n-------\nJoin my patreon today '),
(1993, 'Thunder & Rain with Ocean Sounds | White Noise for Sleeping or Studying | 10 Hours', 'https://www.youtube.com/watch?v=xkcaq1Uitd8', '9', 'PT10H', 'xkcaq1Uitd8', 'Thunder and rain are two of my favorite sounds for sleeping or studying. When combined with ocean waves, the sounds create a super soothing ambience. This nature white noise is great for helping you fall asleep and remain sleeping all night long. By blocking out distracting noise it helps prevent you being awoken during the night. For that same reason, this rain and thunder sound is perfect for helping you maintain focus while studying, doing homework, writing essays, reading, working at the off'),
(1994, 'Water Sounds for Sleep or Focus | White Noise Stream 10 Hours', 'https://www.youtube.com/watch?v=jkLRith2wcc', '9', 'PT10H1S', 'jkLRith2wcc', 'Peace. Tranquility. Relaxation. These are words that come to mind when in the midst of nature. In the go-go-go culture we live in, those sensations can be hard to come by. Listening to nature sounds, such as this recording of a stream, can bring back that feeling of calm.\n\nThis water sound has many different elements. Closest to the viewer/listener, you can hear the gentle sounds of water lapping. A little further back, you can hear the ambient noise of a stream. In the distance, you can hear th'),
(1995, '6LACK - Pretty Little Fears ft. J. Cole (Official Music Video)', 'https://www.youtube.com/watch?v=iSgUMPHQEWw', '9', 'PT4M6S', 'iSgUMPHQEWw', '6lacks new album East Atlanta Love Letter out now: http://smarturl.it/EALL \nSee 6lack on his upcoming from east atlanta with love world tour on sale now!\ndates and tickets at http://6lack.com/tour\n\nDo better, who better, you better\nBeen around, like hella propellers\nWanna know, who you with, donâ€™t tell em\nCome on fellas, that aint none of your biz\nGot on your body suit you know Iâ€™m on your ass today\nWould you let me hit it thrice if I asked today\nShe know my stick nothing but magic babe\nI be'),
(1996, 'Kendrick Lamar & J Cole - Black Friday', 'https://www.youtube.com/watch?v=okF5gOTX9uM', '9', 'PT7M9S', 'okF5gOTX9uM', 'SUBSCRIBE to the official I Am Hip-Hop channel for more music premieres and more: https://goo.gl/rruwH0\n\nI Am Hip-Hop Spotify Playlist: https://goo.gl/3w5JEb\n\nConnect with I Am Hip Hop:\nInstagram: https://goo.gl/dLeUM5\nTwitter: https://goo.gl/QnQtln\nFacebook: https://goo.gl/TfzDR9\nSoundcloud: https://goo.gl/5PzzRH\n\nPromotion/Business Inquiry/Copyrights:\ninfo@i-am-hiphop.com'),
(1997, 'J. Cole - ATM', 'https://www.youtube.com/watch?v=vUTI4bPdlgE', '9', 'PT4M42S', 'vUTI4bPdlgE', 'J. Cole â€“ ATM (Official Music Video)\nListen to KOD now: http://smarturl.it/KODJCole \n \nDirected by Scott Lazer, J. Cole\n \nConnect with J. Cole:\nInstagram: https://www.instagram.com/realcoleworld/\nTwitter: https://twitter.com/jcolenc\nFacebook: https://www.facebook.com/JColeMusic/\n \nConnect with Dreamvile:\nhttp://dreamville.com/\nInstagram: https://www.instagram.com/dreamville\nTwitter: https://twitter.com/Dreamville\nFacebook: https://www.facebook.com/dreamville\n\nMusic video by J. Cole performing '),
(1998, 'J. Cole - Apparently', 'https://www.youtube.com/watch?v=eRaFMlZ1YHA', '9', 'PT5M', 'eRaFMlZ1YHA', 'Download J. Coles new album 2014 Forest Hills Drive on iTunes: \nhttp://smarturl.it/ForestHillsDrive\n\nGoogle Play: http://smarturl.it/ForestHillsDriveGP\nAmazon: http://geni.us/ForestHillsDrive \nListen on Spotify: http://smarturl.it/2014FHDSpotify\n \nhttp://www.dreamville.com/\nhttp://www.jcolemusic.com/\nBest of J. Cole: https://goo.gl/bAsRm2\nSubscribe here: https://goo.gl/6k7yg8'),
(1999, 'Bas - Tribe with J.Cole', 'https://www.youtube.com/watch?v=OA8aw07dpg0', '9', 'PT3M59S', 'OA8aw07dpg0', 'Basâ€™s â€œMilky Wayâ€ is available now! \nhttp://smarturl.it/BasMilkyWay\n\nDirector: Andrew Nisinson for The Fiends\nProducer: Gerrardo Lopez for Baby Panther and The Fiends\nProduction Company: Baby Panther and The Fiends\n\nFollow Bas:\nhttps://www.instagram.com/bas/\nhttps://twitter.com/Bas\nhttps://www.facebook.com/FiendBassy/\n\n#Bas #JCole #Tribe\n\n\nMusic video by Bas performing Tribe. Â© 2018 Dreamville/Interscope\n\nhttp://vevo.ly/0WM9Cd'),
(2000, 'Kendrick Lamar - HUMBLE.', 'https://www.youtube.com/watch?v=tvTRZJ-4EyI', '9', 'PT3M4S', 'tvTRZJ-4EyI', 'Kendrick Lamar DAMN. Available now http://smarturl.it/DAMN\nProd: Anthony Top Dawg Tiffith, Dave Free Nathan K. Scherrer, Jason Baum, Jamie Rabineau\nProd Co: TDE Films / FREENJOY INC\nDir: Dave Meyers & the little homies \n\nMusic video by Kendrick Lamar performing HUMBLE.. (C) 2017 Aftermath/Interscope (Top Dawg Entertainment)\n\nhttp://vevo.ly/H8UJcZ'),
(2001, 'Kendrick Lamar - i (Lyric Video)', 'https://www.youtube.com/watch?v=donS3zZZTu8', '9', 'PT3M38S', 'donS3zZZTu8', 'single available now: http://smarturl.it/iKL \nDirector: Christian San Jose\nProducer: Top Dawg Entertainment\nPro Co: TDE\nBest of Kendrick Lamar: https://goo.gl/PTr3FF\nSubscribe here: https://goo.gl/XGVyCd'),
(2002, 'Kendrick Lamar - Black Friday - Lyrics', 'https://www.youtube.com/watch?v=7N7xHgqJLxU', '9', 'PT4M', '7N7xHgqJLxU', 'Jimi Kendrix proving why he deserves Number 9 on Billborad by carrying Pacs legacy. \nÂ» Facebook: https://www.facebook.com/ForeverGambinoo\nÂ» Music Merch: http://www.redbubble.com/people/based-figaro\nÂ» Twitter: https://twitter.com/ForeverGambinoo'),
(2003, 'Kendrick Lamar - LOVE. ft. Zacari', 'https://www.youtube.com/watch?v=ox7RsX1Ee34', '9', 'PT3M43S', 'ox7RsX1Ee34', 'DAMN. available now http://smarturl.it/DAMN \n \nVideo Director: Dave Meyers and the little homies\nVideo Producer: Anthony Top Dawg Tiffith\nVideo Producer: Dave Free\nVideo Producer: Nathan K. Scherrer\nVideo Producer: Jason Baum\nVideo Producer: Jamie Rabineau\nfor TDE Films / FREENJOY INC\n\nMusic video by Kendrick Lamar performing LOVE.. (C) 2017 Aftermath/Interscope (Top Dawg Entertainment)\n\nhttp://vevo.ly/iCp26r'),
(2004, 'Kendrick Lamar - DNA.', 'https://www.youtube.com/watch?v=NLZRYQMLDW4', '9', 'PT4M46S', 'NLZRYQMLDW4', 'DAMN. available now http://smarturl.it/DAMN\n\nDir: Nabil & the little homies\nProducer: Anthony â€œTop Dawgâ€ Tiffith, Dave Free, Angel J Rosa\nProduction co: TDE Films, AJR Films\n\n(C) 2017 Aftermath/Interscope (Top Dawg Entertainment)\n\nhttp://vevo.ly/l2Qp5O\nBest of Kendrick Lamar: https://goo.gl/PTr3FF\nSubscribe here: https://goo.gl/XGVyCd'),
(2005, 'Claire De Lune Ethereal Remix', 'https://www.youtube.com/watch?v=NTfeMhyyy5o', '9', 'PT4M34S', 'NTfeMhyyy5o', 'ARE YOU A PIANIST AND COMPOSER? Do you think your compositions would sound good remixed this way? Id like to collaborate. \n\nIf I hit 1000 subscribers, Ill start making one hour long ethereal mixes :D :D ;D\n\nMy art IG: @akrishnaart\n\nGYMNOPEDIE NO.1 ETHEREAL REMIX (headphones recommended): https://www.youtube.com/watch?v=w_kK26Csrt4 \n\nEDIT: After reading the comments, its so interesting how this calming music sparked polarizing reactions, some of them incited violent thoughts like dying and doomsd'),
(2006, 'Ethereal Dreams - Chill Mix', 'https://www.youtube.com/watch?v=TvyWRevLG5I', '9', 'PT1H', 'TvyWRevLG5I', 'So heres the mix I promised to upload to celebrate reaching 1000+ subscribers, thank you all! This time it concentrates on chilled music from many different genres, theres liquid dnb, chillstep, chillout, ambient, future garage, house, chillwave, hip hop, etc so the variety is pretty huge. The length is also twice longer than the usual 30 minutes.\n\nAs usual, picking the tracks and mixing them is all made by me. Almost every track is free to download so feel free to grab them if you want. Also re'),
(2007, 'Once Upon A Dream - ETHEREAL REMIX (USE HEADPHONES)', 'https://www.youtube.com/watch?v=oj6PpKd7nVI', '9', 'PT4M34S', 'oj6PpKd7nVI', 'Untethered I float through the cosmos.\nThe line between my skin and the stars is blurred.\nI see it now, the cosmic pearl many travellers before me have sought\nWaterfalls of honey coloured stardust\nGlistening and cascading before my eyes. \nI am waned and weaned along the gentle rivers of light\nas Earth shrinks to a dot and vanishes out of sight.\n\n\n(Lol the only remix I felt compelled to write something about myself)\n\nHeres the link to the entire playlist of the Ethereal Remixes Ive done so far:\nh'),
(2008, 'The Nutcracker - Dance of The Sugar Plum Fairy ETHEREAL (HARP)', 'https://www.youtube.com/watch?v=d-kI753ECwQ', '9', 'PT2M18S', 'd-kI753ECwQ', 'Thank you for whoever suggested this!\n\nPerformance by: Amy Turk (check out her youtube!)\n\nArt by me: art IG: @akrishnaart'),
(2009, 'Bach ETHEREAL REMIX - Loure from Partita No. 3 (USE HEADPHONES)', 'https://www.youtube.com/watch?v=RVIAuKnVBGw', '9', 'PT4M6S', 'RVIAuKnVBGw', 'Doing a Bach series for a while, maybe one more after this\nTheres so much to unpack in Bachs music, no matter how many times you listen to it, theres always new colors popping up. \n\nVideography by me\nMy art IG: @akrishnaart\n\nViolin performance by: Rachel Podger');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `power` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `power`) VALUES
(1, 'ne', 'oh', 'annieoh@usc.edu', 1),
(2, 'annie', 'oh', 'annieoh@usc.edu', 1),
(8, 'whitney', 'highschool', 'annieoh@usc.edu', 0),
(9, 'uscownit', 'ownit', 'annieoh@usc.edu', 1),
(15, 'opal', 'oh', 'annieoh@usc.', 0),
(16, 'mochii', 'oh', 'annieoh@usc.edu', 0),
(17, 'mochii', 'oh', 'annieoh@usc.edu', 0),
(18, 'sharon', 'oh', 'sho014@ucsd.edu', 0),
(19, 'handy', 'culver', 'shculver@usc.edu', 1),
(20, 'handy', 'culver', 'shculver@usc.edu', 1),
(21, 'handy', 'culver', 'shculver@usc.edu', 1),
(22, 'handy', 'culver', 'shculver@usc.edu', 1),
(23, 'handy', 'culver', 'shculver@usc.edu', 1),
(24, 'testaccount', 'testing', 'noemail@usc.edu', 0),
(25, 'acad276', 'acad276', 'annie@usc.edu', 0),
(26, 'stephy', 'steph', 'muiyamsn@usc.edu', 1);

-- --------------------------------------------------------

--
-- Structure for view `all_view`
--
DROP TABLE IF EXISTS `all_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`annieoh`@`%` SQL SECURITY DEFINER VIEW `all_view`  AS  select `playlists`.`playlist_id` AS `playlist_id`,`songs`.`song_id` AS `song_id`,`songs`.`url` AS `url`,`songs`.`description` AS `description`,`playlists`.`title` AS `playlist_title`,`songs`.`title` AS `title`,`songs`.`duration` AS `duration`,`songs`.`user_id` AS `user_id`,`users`.`username` AS `user` from (((`playlists` join `playlist_songs`) join `songs`) join `users`) where ((`playlists`.`playlist_id` = `playlist_songs`.`playlist_id`) and (`playlist_songs`.`song_id` = `songs`.`song_id`) and (`users`.`user_id` = `songs`.`user_id`) and (`users`.`user_id` = `playlists`.`creator_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `all_view2`
--
DROP TABLE IF EXISTS `all_view2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`annieoh`@`%` SQL SECURITY DEFINER VIEW `all_view2`  AS  select `playlist_songs`.`connection_id` AS `connection_id`,`playlists`.`playlist_id` AS `playlist_id`,`playlists`.`creator_id` AS `creator_id`,`playlists`.`visits` AS `visits`,`songs`.`song_id` AS `song_id`,`songs`.`url` AS `url`,`songs`.`youtube_id` AS `youtube_id`,`songs`.`description` AS `description`,`playlists`.`title` AS `playlist_title`,`playlists`.`theme` AS `theme`,`songs`.`title` AS `title`,`songs`.`user_id` AS `user_id`,`users`.`username` AS `username` from (((`playlists` join `playlist_songs`) join `songs`) join `users`) where ((`playlists`.`playlist_id` = `playlist_songs`.`playlist_id`) and (`playlist_songs`.`song_id` = `songs`.`song_id`) and (`users`.`user_id` = `songs`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `playlist_view`
--
DROP TABLE IF EXISTS `playlist_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`annieoh`@`%` SQL SECURITY DEFINER VIEW `playlist_view`  AS  select `playlists`.`playlist_id` AS `playlist_id`,`playlists`.`title` AS `title`,`playlists`.`creator_id` AS `creator_id`,`playlists`.`theme` AS `theme`,`playlists`.`preset` AS `preset`,`users`.`username` AS `username` from (`playlists` join `users`) where (`playlists`.`creator_id` = `users`.`user_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`playlist_id`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`connection_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2015;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
