-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2020 at 04:59 AM
-- Server version: 10.4.11-MariaDB-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u12246fwn_cidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_intro`
--

CREATE TABLE `about_intro` (
  `about_intro_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `licenses` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_intro`
--

INSERT INTO `about_intro` (`about_intro_id`, `image`, `text`, `licenses`, `created_at`, `updated_at`) VALUES
(1, '1554715491_CP14.jpg', '<div>\r\n<ul>\r\n<li>Prioritizing client satisfaction</li>\r\n<li>Cultivating the importance of two-way communication with the clients</li>\r\n<li>Handling finished project on-time to the clients</li>\r\n<li>Delivering the highest quality of products and services</li>\r\n<li>Bringing a balance of luxury and affordability into interior design</li>\r\n</ul>\r\n</div>', '<ul style=\"list-style-type: disc;\">\r\n<li>Member of Construction Services Development Board or known as <strong>LPJK</strong> - Lembaga Pengembangan Jasa Konstruksi</li>\r\n<li>Certified of Badan Usaha Jasa Pelaksana Konstruksi</li>\r\n<li>Qualified for <strong>M2</strong></li>\r\n</ul>', '2019-01-17 17:51:31', '2019-04-08 09:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `about_people`
--

CREATE TABLE `about_people` (
  `about_people_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_people`
--

INSERT INTO `about_people` (`about_people_id`, `image`, `name`, `position`, `created_at`, `updated_at`) VALUES
(2, '1547784207_kontak.jpg', 'Tofan', 'Frontend Dev', '2019-01-18 04:03:36', '0000-00-00 00:00:00'),
(11, '1549962466_IMG-20170228-WA0011.jpg', 'Protindo Team', 'Marketing', '2019-02-12 09:08:03', '0000-00-00 00:00:00'),
(12, '1549962506_IMG-20170223-WA0018.jpg', 'Protindo Team', 'Designer', '2019-02-12 09:08:37', '0000-00-00 00:00:00'),
(14, '1550134442_IMG-20190116-WA0015_(1).jpg', 'Protindo Team', 'The People', '2019-02-14 08:54:13', '0000-00-00 00:00:00'),
(15, '1550134477_IMG-20181228-WA0012.jpg', 'Protindo Team', 'The People', '2019-02-14 08:54:46', '0000-00-00 00:00:00'),
(16, '1550134501_IMG-20180531-WA0012.jpg', 'Protindo Team', 'The People', '2019-02-14 08:55:09', '0000-00-00 00:00:00'),
(17, '1550134528_IMG-20190214-WA0029.jpg', 'Protindo Team', 'The People', '2019-02-14 08:55:36', '0000-00-00 00:00:00'),
(18, '1550134568_IMG-20180611-WA0019.jpg', 'Protindo Team', 'The People', '2019-02-14 08:56:16', '0000-00-00 00:00:00'),
(19, '1550134592_IMG-20180531-WA0014.jpg', 'Protindo Team', 'The People', '2019-02-14 08:56:41', '0000-00-00 00:00:00'),
(20, '1550203945_IMG-20180611-WA0016.jpg', 'Protindo Team', 'The People', '2019-02-15 04:12:37', '0000-00-00 00:00:00'),
(21, '1550217052_CYMERA_20190215_143527_(1).jpg', 'Protindo Team', 'The People', '2019-02-15 07:51:01', '0000-00-00 00:00:00'),
(22, '1550217073_CYMERA_20190215_143433.jpg', 'Protindo Team', 'The People', '2019-02-15 07:51:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Office', 'office', '2019-01-13 04:44:20', '0000-00-00 00:00:00'),
(2, 'Commercial', 'commercial', '2019-01-13 04:44:43', '0000-00-00 00:00:00'),
(3, 'Wine & Dine', 'wine-dine-1', '2019-01-13 04:45:21', '2019-02-12 09:10:01'),
(4, 'Retail', 'retail', '2019-01-13 04:45:40', '0000-00-00 00:00:00'),
(5, 'Hospital', 'hospital', '2019-01-13 04:45:55', '0000-00-00 00:00:00'),
(6, 'Residential', 'residential', '2019-01-13 04:46:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_icon`
--

CREATE TABLE `client_icon` (
  `client_icon_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_icon`
--

INSERT INTO `client_icon` (`client_icon_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1547397954_1.jpg', 1, '2019-01-13 16:45:56', '0000-00-00 00:00:00'),
(2, '1547398042_2.jpg', 1, '2019-01-13 16:47:23', '0000-00-00 00:00:00'),
(3, '1547698617_3.jpg', 1, '2019-01-17 04:17:01', '0000-00-00 00:00:00'),
(4, '1548604550_4.jpg', 1, '2019-01-27 15:55:51', '0000-00-00 00:00:00'),
(5, '1548604558_5.jpg', 1, '2019-01-27 15:55:59', '0000-00-00 00:00:00'),
(6, '1548604573_6.jpg', 1, '2019-01-27 15:56:15', '0000-00-00 00:00:00'),
(7, '1548604589_7.jpg', 1, '2019-01-27 15:56:30', '0000-00-00 00:00:00'),
(8, '1548604597_8.jpg', 1, '2019-01-27 15:56:39', '0000-00-00 00:00:00'),
(9, '1548604605_9.jpg', 1, '2019-01-27 15:56:46', '0000-00-00 00:00:00'),
(10, '1548604612_10.jpg', 1, '2019-01-27 15:56:53', '0000-00-00 00:00:00'),
(11, '1548604620_11.jpg', 1, '2019-01-27 15:57:01', '0000-00-00 00:00:00'),
(12, '1548604640_12.jpg', 1, '2019-01-27 15:57:21', '0000-00-00 00:00:00'),
(13, '1548604650_13.jpg', 1, '2019-01-27 15:57:32', '0000-00-00 00:00:00'),
(14, '1548604661_14.jpg', 1, '2019-01-27 15:57:42', '0000-00-00 00:00:00'),
(15, '1548604668_15.jpg', 1, '2019-01-27 15:57:50', '0000-00-00 00:00:00'),
(16, '1548604679_16.jpg', 1, '2019-01-27 15:58:00', '0000-00-00 00:00:00'),
(17, '1548604689_17.jpg', 1, '2019-01-27 15:58:10', '0000-00-00 00:00:00'),
(18, '1548604700_18.jpg', 1, '2019-01-27 15:58:21', '0000-00-00 00:00:00'),
(19, '1548604707_19.jpg', 1, '2019-01-27 15:58:28', '0000-00-00 00:00:00'),
(20, '1548604714_20.jpg', 1, '2019-01-27 15:58:35', '0000-00-00 00:00:00'),
(21, '1548604721_21.jpg', 1, '2019-01-27 15:58:42', '0000-00-00 00:00:00'),
(22, '1548604727_22.jpg', 1, '2019-01-27 15:58:49', '0000-00-00 00:00:00'),
(23, '1548604736_23.jpg', 1, '2019-01-27 15:58:57', '0000-00-00 00:00:00'),
(24, '1548604742_24.jpg', 1, '2019-01-27 15:59:03', '0000-00-00 00:00:00'),
(25, '1548604751_25.jpg', 1, '2019-01-27 15:59:12', '0000-00-00 00:00:00'),
(26, '1548604763_26.jpg', 1, '2019-01-27 15:59:24', '0000-00-00 00:00:00'),
(27, '1548604769_27.jpg', 1, '2019-01-27 15:59:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `client_list_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`client_list_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BII', '2019-01-13 17:11:52', '0000-00-00 00:00:00'),
(2, 'BNI - Technology Division', '2019-01-14 16:46:32', '0000-00-00 00:00:00'),
(3, 'CIMB', '2019-01-14 16:46:48', '0000-00-00 00:00:00'),
(4, 'Panin Bank', '2019-01-14 16:46:58', '0000-00-00 00:00:00'),
(5, 'EFG Bank', '2019-01-14 16:47:08', '0000-00-00 00:00:00'),
(6, 'Equador Embassy', '2019-01-14 16:47:19', '0000-00-00 00:00:00'),
(7, 'Embassy of Ireland', '2019-01-14 16:47:29', '0000-00-00 00:00:00'),
(8, 'USA Embassy', '2019-01-14 16:47:39', '0000-00-00 00:00:00'),
(9, 'Indonesia Embassy, Tokyo', '2019-01-14 16:47:49', '0000-00-00 00:00:00'),
(10, 'UNICEF', '2019-01-14 16:47:58', '0000-00-00 00:00:00'),
(11, 'Agence Francaise de Development', '2019-01-14 16:48:08', '0000-00-00 00:00:00'),
(12, 'Cowater Ausaid – Australian Aid', '2019-01-14 16:48:17', '0000-00-00 00:00:00'),
(13, 'Nokia', '2019-01-14 16:48:37', '0000-00-00 00:00:00'),
(14, 'Sony Indonesia', '2019-01-14 16:48:49', '0000-00-00 00:00:00'),
(15, 'Schneider Electric', '2019-01-14 16:49:15', '0000-00-00 00:00:00'),
(16, 'Electronic City', '2019-01-14 16:49:25', '0000-00-00 00:00:00'),
(17, 'ZTE Corporation', '2019-01-14 16:49:34', '0000-00-00 00:00:00'),
(18, 'Mobile – 8', '2019-01-14 16:49:51', '0000-00-00 00:00:00'),
(19, 'Atotech pte ltd', '2019-01-14 16:50:00', '0000-00-00 00:00:00'),
(20, 'Asia Drill', '2019-01-14 18:11:36', '0000-00-00 00:00:00'),
(21, 'Binamitra Sumberarta', '2019-01-14 18:12:09', '0000-00-00 00:00:00'),
(22, 'Batari Maritim istima', '2019-01-14 18:12:35', '0000-00-00 00:00:00'),
(23, 'Castrol', '2019-01-14 18:12:57', '0000-00-00 00:00:00'),
(24, 'Lanco Energy', '2019-01-14 18:22:59', '0000-00-00 00:00:00'),
(25, 'Minvest International', '2019-01-14 18:26:49', '0000-00-00 00:00:00'),
(26, 'Noble Denton', '2019-01-14 18:39:35', '0000-00-00 00:00:00'),
(27, 'Orica Mining', '2019-01-14 18:41:20', '0000-00-00 00:00:00'),
(28, 'Salamander Oil', '2019-01-14 18:41:40', '0000-00-00 00:00:00'),
(29, 'Tambang Batu Bara Indonesia (TBI)', '2019-01-14 18:43:02', '0000-00-00 00:00:00'),
(30, 'Vale Indonesia', '2019-01-14 18:43:38', '0000-00-00 00:00:00'),
(31, 'Piaggio', '2019-01-14 18:44:09', '0000-00-00 00:00:00'),
(32, 'PT Mitsubishi Corporation', '2019-01-17 03:37:38', '2019-01-27 16:01:04'),
(33, 'Malaysia Airlines', '2019-01-27 16:01:15', '0000-00-00 00:00:00'),
(34, 'Etihad Airways', '2019-01-27 16:01:25', '0000-00-00 00:00:00'),
(35, 'HIS Travel', '2019-01-27 16:01:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_inbox`
--

CREATE TABLE `contact_inbox` (
  `contact_inbox_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `ip` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_inbox`
--

INSERT INTO `contact_inbox` (`contact_inbox_id`, `name`, `email`, `subject`, `phone`, `comment`, `ip`, `created_at`) VALUES
(1, 'Ayu', 'sitirahayuhadiwidjojo74@gmail.com', 'Inquiry', '08174851007', 'Test', '112.78.163.104', '2019-03-01 02:20:57'),
(2, 'LinwoodWam', 'linwooddrors@gmail.com', 'We offer you the opportunity to advertise your products and services.', '221246742', 'We offer you the opportunity to advertise your products and services. \r\nHi! Please note a good offers for you. I can help you with sending  your commercial offers or messages through feedback forms. The advantage of this method is that the messages sent through the feedback forms are included in the white list. This method increases the chance that your message will be read. The same way you received this message. \r\n \r\nSending via Feedback Forms to any domain zones of the world. (more than 1000 domain zones.). \r\n \r\nThe cost of sending 1 million messages is $ 49 instead of $ 99. \r\nAll us sites that have a feedback form. (10 million messages sent) - $349 instead of $649 \r\nDomain zone .com - (12 million messages sent) - $399 instead of $699 \r\nAll domain zones in Europe- (8 million messages sent) - $ 299 instead of $599 \r\nAll sites in the world (25 million messages sent) - $499 instead of $999 \r\n \r\nDiscounts are valid until April 10! \r\nFeedback and warranty! \r\nDelivery report! \r\n \r\nIn the process of sending messages, we do not violate the rules of GDRP. \r\nThis message is created automatically use our contacts for communication. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype – FeedbackForm2019 \r\nEmail - feedbackform@make-success.com \r\n \r\nHope to hear from you soon.', '178.162.208.239', '2019-04-07 11:41:15'),
(3, 'JamesGlype', 'pete-gvm-affiliate@gmail.com', 'Please don’t miss this', '264212876', 'My name is Pete and I want to share a proven system with you that makes me money while I sleep! This system allows you to TRY the whole thing for F R E E for a whole 30 days! That\'s right, you can finally change your future without giving up any sensitive information in advance! I signed up myself just a while ago and I\'m already making a nice profit. \r\n \r\nIn short, this is probably the BEST THING THAT EVER HAPPENED TO YOU IF YOU TAKE ACTION NOW!!! \r\n \r\nIf you\'re interested in knowing more about this system, go to http://globalviralmarketing.com/?ref=qkgWOPkN5RoC1NWh and try it out. Again, it’s FREE! \r\n \r\nYou can thank me later \r\n \r\n/Pete', '185.93.180.211', '2019-04-09 23:43:43'),
(4, 'Shay Vale', 'vale.shay84@gmail.com', 'Hello I would like to place an order.', '(02) 6659 3216', 'Hello\r\n\r\n\r\nI had visited your store last month, and I saw a very luxury product i wanne buy.\r\nBut I have a question, today I wanted to order it, but can not find the item anymore in your store.\r\nit looks like the first picture on this site http://bit.ly/LuxuryproductFoto7362\r\nMail me if you are going to sell it again.\r\nI hope soon so that I can place an order.\r\nI\'ll wait.\r\n\r\ngreetings', '103.251.16.26', '2019-04-27 03:47:10'),
(5, 'EduardoJag', 'svetlanacol0sova@yandex.ua', 'Useful pastime', '374275834', 'Hi protindo.co.id \r\nGrow your bitcoins by 10% per 2 days. \r\nProfit comes to your btc wallet automatically. \r\n \r\nTry  http://bm-syst.xyz \r\nit takes 2 minutes only and let your btc works for you! \r\n \r\nGuaranteed by the blockchain technology!', '217.64.113.217', '2019-04-27 13:38:23'),
(6, 'BryantcuH', 'cgorillamail@gmail.com', 'Feedback and a proposal', '236218844', 'Hi, protindo.co.id \r\n \r\nI\'ve been visiting your website a few times and decided to give you some positive feedback because I find it very useful. Well done. \r\n \r\nI was wondering if you as someone with experience of creating a useful website could help me out with my new site by giving some feedback about what I could improve? \r\n \r\nYou can find my site by searching for \"casino gorilla\" in Google (it\'s the gorilla themed online casino comparison). \r\n \r\nI would appreciate if you could check it out quickly and tell me what you think. \r\n \r\ncasinogorilla.com \r\n \r\nThank you for help and I wish you a great week!', '185.93.182.132', '2019-05-04 07:01:22'),
(7, 'CarmenWindy', 'gunrussia@scryptmail.com', 'Illegal weapons from Russia. Black Market - Simple and inexpensive!', '378376156', '25 charging traumatic pistols shooting automatic fire! Modified Makarov pistols with a silencer! Combat Glock 17 original or with a silencer! And many other types of firearms without a license, without documents, without problems! \r\nDetailed video reviews of our products you can see on our website. \r\nhttp://Gunrussia.pw \r\nIf the site is unavailable or blocked, email us at - Gunrussia@secmail.pro   or  Gunrussia@elude.in \r\nAnd we will send you the address of the backup site!', '77.243.183.21', '2019-05-06 12:14:33'),
(8, 'RichardSal', 'admission@aubss.university', 'Online Accredited American MBA', '248374673', 'Accredited and Affordable ONLINE MBA Programs with American University of Business and Social Sciences \r\n \r\n \r\nWe are now offering up to 30% scholarship and discount for our Professional MBA programs to this newsletter invitees OR 70% Scholarship for our Postgraduate Diploma (Original: US$1,850 - NOW - US$555 after Scholarship). If you are interested, please contact us for program leaflets. \r\n \r\nAccreditation and Recognition \r\nAmerican University of Business and Social Sciences has gained Candidacy Accreditation by Accreditation Service for International Schools, Colleges and Universities (ASIC).  ASIC is recognised by UKVI in UK, is a member of the CHEA International Quality Group (CIQG) in USA and is listed in their International Directory, is a member of the BQF (British Quality Foundation), are affiliates of ENQA (European Network for Quality Assurance) and are institutional members of EDEN (European Distance and E-Learning Network). \r\n \r\n \r\n \r\nMajors: Project Management, Management, Business Administration, Health, Safety and Environment, Logistics and Supply Chain Management, Human Resources Management, Sales and Marketing \r\n \r\n \r\n \r\nProfessional MBA Tuition fee: From USD 3,650 \r\n \r\n \r\nIf you are interested, please contact us at admission@aubss.university for program leaflets and Scholarship details or visit our website at https://www.aubss.university/', '31.13.190.42', '2019-05-08 17:43:54'),
(9, 'Robertanina', 'angelaSoxodort@gmail.com', 'Delivery of your email messages.', '18314496271', 'Hello!  protindo.co.id \r\n \r\nWe suggest \r\n \r\nSending your message through the Contact us form which can be found on the sites in the Communication partition. Contact form are filled in by our program and the captcha is solved. The superiority of this method is that messages sent through feedback forms are whitelisted. This method increases the chances that your message will be open. Mailing is done in the same way as you received this message. \r\nYour  commercial proposal will be read by millions of site administrators and those who have access to the sites! \r\n \r\nThe cost of sending 1 million messages is $ 49 instead of $ 99. (you can select any country or country domain) \r\nAll USA - (10 million messages sent) - $399 instead of $699 \r\nAll Europe (7 million messages sent)- $ 299 instead of $599 \r\nAll sites in the world (25 million messages sent) - $499 instead of $999 \r\nThere is a possibility of FREE TEST MAILING. \r\n \r\n \r\nDiscounts are valid until May 10. \r\nFeedback and warranty! \r\nDelivery report! \r\nIn the process of sending messages we don\'t break the rules GDRP. \r\n \r\nThis message is automatically generated to use our contacts for communication. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype – FeedbackForm2019 \r\nEmail - FeedbackForm@make-success.com \r\nWhatsApp - +44 7598 509161 \r\nhttp://bit.ly/2WcfS4y \r\n \r\nBest wishes', '31.13.190.254', '2019-05-09 13:36:35'),
(10, 'Clairtiz', 'feedbackformeu@gmail.com', 'Ever seen such proven results?', '222188718', 'While on your great website I felt that my outstanding offer could be a good fit for you. \r\n \r\nI’m happy to say that I’ve come up with a way for you to get your feet wet in \r\nforex without investing 10k or more right away. 3000€ will do it here. \r\n \r\nEver seen such proven profits on MyFxBook? You’ve got to see them with your own eyes. Just go through the links below – opt-in and download a detailed presentation-pdf. \r\n \r\nhttps://www.myfxbook.com/members/OutlierFX/outlierfx/3241807/bMTxDMF2g6KnEToQSQba \r\nhttps://www.outlierfx.com \r\nPlease opt-in to get all info.', '185.245.85.228', '2019-05-09 21:14:50'),
(11, 'Jamestak', 'chiptuffer@yahoo.com', 'Build A House In Paradise', '136175838', 'Dear Muslim, \r\nAmong your monthly business bills is the unexciting – paper, printer ink, phone lines. But what if there could be something among these payments could improve how well Islamic classes were taught, or how secure your local Mosques are? \r\n \r\nThe Messenger of Allah, peace and blessings be upon him… \r\n \r\n“Whoever builds a mosque for Allah, then Allah will build for him a house like it in Paradise” \r\n \r\nBut this isn’t about simple donations. This is about making a real, tangible difference. \r\n \r\nTangible differences like the secure door that was funded for Madina Masjid, in Rochdale - which is keeping the Mosque safe, following two break-ins over the two months previous. \r\n \r\nMaking charity donations benefits your business. It shines a light on the positive ways in which your company supports the local community. \r\n \r\nFunding our projects with a monthly donation provides you with a SHARE of the reward whenever someone prays Salah, recites Quran and does Tasbeeh in the mosque. \r\n \r\nWe share our thanks  and the gratitude of our Mosque worshippers – in advance. \r\n \r\nPlease feel free to contact us directly to talk about the ways in which your monthly support could change our local Mosques and communities for the better. \r\n? \r\nMessenger of Allah (peace and blessings of Allah be upon him) said… \r\n“Allah said: ‘Spend, O son of Adam, and I shall spend on you.’” \r\n \r\nhttps://www.houseinparadise.org/', '95.154.200.145', '2019-05-17 14:37:45'),
(12, 'JamesNow', 'michaelKal@gmail.com', 'Hi an awesomeoffers  Are you in?', '237517157', 'Look what we arrange for you! an enchantingoffers \r\n Are you in?  \r\n \r\nhttps://drive.google.com/file/d/1Ra4d9-ItJ_nci281FG0Y3xbl26NQcI4e/preview', '87.101.94.74', '2019-05-18 02:19:37'),
(13, 'GeorgeShumE', 'ddggabogados@mail.com', 'A Letter from Barrister David Gomez Gonzalez', '111618837', 'Dearest in mind, \r\nI would like to introduce myself for the first time. My name is Barrister David Gómez González, the personal lawyer to my late client. \r\nHe worked as a private businessman in the international field. In 2012, my client succumbed to an unfortunate car accident. My client was single and childless. \r\nHe left a fortune worth $24,500,000.00 Dollars in a bank in Spain. The bank sent me message that I have to introduce a beneficiary or the money in their bank will be confiscate. My purpose of contacting you is to make you the Next of Kin. \r\nMy late client left no will, I as his personal lawyer, was commissioned by the Spanish Bank to search for relatives to whom the money left behind could be paid by my deceased client. I have been looking for his relatives for the past 3 months continuously without success. Now I explain why I need your support, I have decided to make a citizen of the same country with my late client the Next of Kin. \r\nI hereby ask you if you give me your consent to present you as the next of kin to my deceased client to the Spanish Bank as the beneficiary.  I would like to point out that you will receive 45% of the share of this money, 45% then I would be entitled to, 10% percent will be donated to charitable organizations. \r\nIf you are interested, please contact me at my private contact details by Tel: 0034-604-284-281, Fax: 0034-911-881-353, Email: ddggabogados@mail.com \r\nI am waiting for your answer \r\nBest regards, \r\nLawyer: - David Gómez González', '185.230.127.103', '2019-05-21 18:04:48'),
(14, 'Robertnof', 'di289281@gmail.com', 'Business Partnership', '313277542', 'Dear Sir, \r\n \r\nI need your co-operation for a business Partnership. \r\nThis Partnership will give us Hundreds of Millions of Dollars as profit. \r\nKindly write to my personal email address below  so that we can agree on terms and conditions.. \r\nMy Email: h66701824@gmail.com \r\n \r\nSincerely yours, \r\nAndrei Ivanovich Lumpov, \r\nPresident of the expert consulting center ECC. \r\n\"Invest-Project\" Ltd. (Moscow). \r\nEmail: h66701824@gmail.com', '31.13.190.27', '2019-05-29 16:30:17'),
(15, 'Robertanina', 'angelaSoxodort@gmail.com', 'FREE TEST MAILING', '12085226709', 'Hi!  protindo.co.id \r\n \r\nWe suggest \r\n \r\nSending your commercial offer through the feedback form which can be found on the sites in the contact partition. Contact form are filled in by our program and the captcha is solved. The profit of this method is that messages sent through feedback forms are whitelisted. This technique increases the odds that your message will be read. Mailing is done in the same way as you received this message. \r\nYour  business proposition will be read by millions of site administrators and those who have access to the sites! \r\n \r\nThe cost of sending 1 million messages is $ 49 instead of $ 99. (you can select any country or country domain) \r\nAll USA - (10 million messages sent) - $399 instead of $699 \r\nAll Europe (7 million messages sent)- $ 299 instead of $599 \r\nAll sites in the world (25 million messages sent) - $499 instead of $999 \r\nThere is a possibility of FREE TEST MAILING. \r\n \r\n \r\nDiscounts are valid until June 10. \r\nFeedback and warranty! \r\nDelivery report! \r\nIn the process of sending messages we don\'t break the rules GDRP. \r\n \r\nThis message is automatically generated to use our contacts for communication. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype – FeedbackForm2019 \r\nEmail - FeedbackForm@make-success.com \r\nWhatsApp - +44 7598 509161 \r\n \r\n \r\nAll the best', '139.28.217.222', '2019-06-01 20:30:21'),
(16, 'ContactForm', 'raphaeSoxodort@gmail.com', 'Mailing via the feedback form.', '375627528', 'Good day!  protindo.co.id \r\n \r\nWe make offer for you \r\n \r\nSending your commercial offer through the feedback form which can be found on the sites in the Communication section. Contact form are filled in by our program and the captcha is solved. The superiority of this method is that messages sent through feedback forms are whitelisted. This technique improve the odds that your message will be open. \r\n \r\nOur database contains more than 25 million sites around the world to which we can send your message. \r\n \r\nThe cost of one million messages 49 USD \r\n \r\nFREE TEST mailing of 50,000 messages to any country of your choice. \r\n \r\n \r\nThis message is automatically generated to use our contacts for communication. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - FeedbackForm@make-success.com \r\nWhatsApp - +44 7598 509161', '31.13.190.254', '2019-06-14 05:45:13'),
(17, 'protindo.co.id', 'micgyhaelKal@gmail.com', 'Here is  an importantbonus for your team. protindo.co.id', '254611127', 'There is an important  gift for you. protindo.co.id \r\nhttp://bit.ly/2KxIZfv', '109.248.149.39', '2019-06-16 07:12:42'),
(18, 'AnthonyovAni', 'gulfsrv94@gmail.com', 'Action for profit', '267128458', 'Hi!, protindo.co.id \r\n \r\nOur client want to fund in your sector for good benefit. \r\n \r\nPlease contact us for more information on  +973 650 09688 or mh@indobsc.com \r\n \r\nBest regards \r\nMr. Mat Hernandez', '185.230.127.170', '2019-06-28 05:54:54'),
(19, 'protindo.co.id', 'micgyhaelKal@gmail.com', 'Here is  an engrossingput up for win. protindo.co.id', '217448616', 'Look at an important  profit in support of victory. protindo.co.id \r\nhttp://bit.ly/2KyuKHf', '185.128.27.171', '2019-06-28 15:19:05'),
(20, 'ContactForm', 'raphaeSoxodort@gmail.com', 'Delivery of your email messages.', '375627528', 'Good day!  protindo.co.id \r\n \r\nWe propose \r\n \r\nSending your commercial offer through the Contact us form which can be found on the sites in the Communication section. Feedback forms are filled in by our application and the captcha is solved. The advantage of this method is that messages sent through feedback forms are whitelisted. This method increases the probability that your message will be read. \r\n \r\nOur database contains more than 25 million sites around the world to which we can send your message. \r\n \r\nThe cost of one million messages 49 USD \r\n \r\nFREE TEST mailing of 50,000 messages to any country of your choice. \r\n \r\n \r\nThis message is automatically generated to use our contacts for communication. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nWhatsApp - +44 7598 509161 \r\nEmail - FeedbackForm@make-success.com', '185.93.3.114', '2019-06-29 15:05:19'),
(21, 'protindo.co.id', 'micgyhaelKal@gmail.com', 'Here is  a okgrant in remuneration in behalf of your team. protindo.co.id', '217448616', 'Here is  a bonzer  marvel because victory. protindo.co.id \r\nhttp://bit.ly/2KtM5kK', '83.97.23.234', '2019-07-10 02:42:59'),
(22, 'ContactForm', 'raphaeSoxodort@gmail.com', 'Mailing via the feedback form.', '375627528', 'Ciao!  protindo.co.id \r\n \r\nWe propose \r\n \r\nSending your commercial offer through the Contact us form which can be found on the sites in the Communication partition. Feedback forms are filled in by our application and the captcha is solved. The advantage of this method is that messages sent through feedback forms are whitelisted. This method increases the probability that your message will be read. \r\n \r\nOur database contains more than 25 million sites around the world to which we can send your message. \r\n \r\nThe cost of one million messages 49 USD \r\n \r\nFREE TEST mailing of 50,000 messages to any country of your choice. \r\n \r\n \r\nThis message is automatically generated to use our contacts for communication. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nWhatsApp - +44 7598 509161 \r\nEmail - FeedbackForm@make-success.com', '37.120.159.55', '2019-07-16 05:28:34'),
(23, 'Tracy Lo', 'analytics@ovolo.biz', 'See who has visited your website', '+45 33 11 11 13', 'Hello,\r\n\r\nYou can now get a complete list of all your website visitors within the last 12 months using the new Web Leads 2.0 Extension. The Web Leads report contains all company names, addresses, phone numbers, websites, contact person, email addresses, and important metrics that track your website’s most popular pages.\r\n\r\nFor more details and free access, visit the link below.\r\nhttp://bit.ly/analyticsleads\r\n\r\nSincerely,\r\nFastbase [Extension to Google Analytics]', '96.44.189.114', '2019-07-17 20:51:40'),
(24, 'protindo.co.id', 'micgyhaelKal@gmail.com', 'Look at a felicitousrare indemnify owing you. protindo.co.id', '217448616', 'Here is  an gripping  contribution because you. protindo.co.id \r\nhttp://bit.ly/2NGLdMD', '83.97.23.188', '2019-07-21 01:45:38'),
(25, 'JoshuaPaups', 'support@legalpl.net', 'Apply Now for Polish 1 Year Work Visa (Work Permit)', '145813282', 'This is Robert Kowalski from LegalPL Company from Poland-Warsaw (Europe). \r\nIn this mail sending you special our offer about immigration services to Europe: \r\n1. Work 1 Year Visa to Poland (Work Visa+Work Permit); \r\n2. Study in Poland (Study 1 Year Visa); \r\n3. Business Immigration to Poland (Business 1 Year Visa); \r\nMostly our clients from India, Pakistan, Nepal, Bangladesh, Vietnam, China, Iran, Ukraine, Russia, Belarus, Philippines, Indonesia, Vietnam, China. \r\nIf you are interesting in our services, please contact with us in WhatsUp/Viber/Telegram  +48 793 636 986 or write me: r.kowalski@legalpl.net \r\nThank you, \r\nBest Regards, \r\nRobert Kowalski, \r\nLegalPL Company', '89.238.167.56', '2019-07-22 08:10:16'),
(26, 'protindo.co.id', 'micgyhaelKal@gmail.com', 'That is a suitablerare refund since the treatment of your team. protindo.co.id', '217448616', 'Espy is  an exceptional  spoils fawn because of win. protindo.co.id \r\nhttp://bit.ly/2NMuebX', '45.81.0.99', '2019-07-25 08:47:39'),
(27, 'MiltonInice', 'contact@fullbax.info', 'Full service of import from China', '323175212', 'Our company https://www.fullbax.com deals with import from China at our clients\' request. \r\nWe deal with everything from A to Z: \r\n- we search for a supplier; \r\n- we check the merchandise in terms of customs and tax; \r\n- we visit factories; \r\n- we control the production; \r\n- we are present during the loading; \r\n- we send the merchandise from China; \r\n- we custom clear the merchandise in Poland; \r\n- we deliver the merchandise from the port to Your warehouse; \r\n \r\nhttps://www.fullbax.com does not only provide the above mentioned services, please visit our website. \r\n \r\nWe have competitive rates, we also work with smaller companies. \r\n \r\nIf you have ever thought about importing from China and you do not know how to go about it or if you import from China and need help at some stage, we are available with our services. \r\n \r\nWrite to us, and we will answer all your questions. It does not cost anything! \r\n \r\nFeel welcome \r\nhttps://www.fullbax.com', '185.93.180.213', '2019-08-01 17:10:51'),
(28, 'Kevintef', 'raphaeSoxodort@gmail.com', 'Do you want cheap and innovative advertising for little money?', '82438436455', 'Hi!  protindo.co.id \r\n \r\nWe make available \r\n \r\nSending your commercial proposal through the feedback form which can be found on the sites in the Communication partition. Contact form are filled in by our program and the captcha is solved. The advantage of this method is that messages sent through feedback forms are whitelisted. This technique increases the chances that your message will be read. \r\n \r\nOur database contains more than 25 million sites around the world to which we can send your message. \r\n \r\nThe cost of one million messages 49 USD \r\n \r\nFREE TEST mailing of 50,000 messages to any country of your choice. \r\n \r\n \r\nThis message is automatically generated to use our contacts for communication. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - FeedbackForm@make-success.com \r\nWhatsApp - +44 7598 509161', '185.93.3.114', '2019-08-04 21:51:35'),
(29, 'Harristudge', 'albertstevenconsult@gmail.com', 'business opportunity', '86951377635', 'My name is Mr. Steven Albert, I\'m a foreign investment management consultant , am representing the interest of Mr. A. S AlSayed and partners  www.alsayedgroup.com who is ready to invest in any profitable business with good ROI . \r\n \r\nI will be glad to hear from you on any potential opportunity for further discussion. \r\n \r\nCall me on +1 (701) 4842612 or  email me on : info@alliedinvestmentservices.org \r\n \r\nYours Sincerely, \r\n \r\nMr. Steven  Albert. \r\nInvestment Manager.', '87.101.94.75', '2019-08-07 12:29:52'),
(30, 'http://linkbackpartcut.cf/b2ei', 'divicovercing@bluewin.ch', 'Here is  niceoffer for you.  http://somicoder.tk/ocfg', '83429623398', 'Look at a intermittently  zealous ethereal in quittance in maliciousness of winning.  http://enexcorca.tk/qwuq', '185.253.97.237', '2019-08-10 22:27:41'),
(31, 'Anthony Russell', 'anthonyrussell428@gmail.com', 'investment opportunity', '88986721362', 'Good day, \r\n \r\nMy name is Anthony Russell, a UK registered private Investment Manager . \r\n \r\nWe seek individuals with Financial Management knowledge that are capable of handling investment portfolio and management from private investors. If you have fund management abilities, credible projects in need of loan, JV or existing businesses that requires expansion we will be delighted to work with you on a minimal ROI . \r\n \r\nDetails will be provided on hearing back from you with your business executive summary via my direct email : anthonyrusselll329@gmail.com \r\n \r\nKind Regards, \r\n \r\nAnthony Russell \r\nManaging Partner \r\nTel Line: +447440934350', '185.93.3.114', '2019-08-14 16:55:12'),
(32, 'KennethFex', 'naveen_139@yahoo.co.in', 'Hi What we have here is , an staggeringoffers  http://haehightreatnam.tk/efuf', '84184796989', 'Hey Upstanding hearsay ! a finecome forward  http://dysthetanglan.tk/kvutw', '89.249.64.186', '2019-08-18 15:24:36'),
(33, 'Williamron', 'bratas91@gmail.com', 'There is a correctvolunteer in return you. http://phasinsysplat.tk/76e2', '86739361563', 'That is an captivatingoffers recompense you. http://maifreecomstet.gq/mjb4r', '5.253.204.11', '2019-08-22 14:22:34'),
(34, 'FrankDok', 'lesli.adkins@yahoo.com', 'That is a correctput up for sale in return you. http://neusunscepe.cf/kra6', '84189882817', 'Here is  a eleganttender recompense you. http://houekebookmo.tk/3k6se', '84.17.47.136', '2019-08-24 18:35:06'),
(35, 'HarlandMub', 'noreplymonkeydigital@gmail.com', 'Local SEO to boost local visibility', '87445794665', 'Hi there \r\nThe Local SEO package is built to rank local keywords for your local business in the google search and in google maps. We have researched for years what local SEO activities truly work and have put all in one single local SEO plan to accomplish the expected results and more. You will start seeing big increases in ranks from the 1st month of work already. You get monthly SEO reports and benchmark reports. \r\n \r\nhttps://monkeydigital.co/product/local-seo-package/ \r\n \r\nThanks and regards \r\nMike \r\nMonkey Digital \r\nmonkeydigital.co@gmail.com', '37.120.133.150', '2019-08-31 20:41:23'),
(36, 'George Martin', 'george1@georgemartinjr.com', 'Guest Post on Website', '0564-6760437', 'Would you be interested in submitting a guest post on georgemartjr.com or possibly allowing us to submit a post to protindo.co.id ? Maybe you know by now that links are essential\r\nto building a brand online? If you are interested in submitting a post and obtaining a link to protindo.co.id , let me know and we will get it published in a speedy manner to our blog.\r\n\r\nHope to hear from you soon\r\nGeorge', '110.139.128.232', '2019-09-08 15:45:40'),
(37, 'Robertnus', 'quickchain50@gmail.com', 'free btc', '85769316773', 'Profit +10?ter 2 days \r\nThe minimum amount for donation is 0.0025 BTC. \r\nMaximum donation amount is 10 BTC. \r\n \r\nRef bonus 3 levels: 5%,3%,1% paying next day after donation \r\nhttps://quickchain.cc/', '185.93.3.114', '2019-09-10 07:34:28'),
(38, 'Averyitato', 'raphaeSoxodort@gmail.com', 'Want more customers for your business?', '84327716957', 'Hi!  protindo.co.id \r\n \r\nHave you ever heard of sending messages via feedback forms? \r\n \r\nThink of that your message will be readread by hundreds of thousands of your potential customerscustomers. \r\nYour message will not go to the spam folder because people will send the message to themselves. As an example, we have sent you our suggestion  in the same way. \r\n \r\nWe have a database of more than 30 million sites to which we can send your message. Sites are sorted by country. Unfortunately, you can only select a country when sending a offer. \r\n \r\nThe price of one million messages 49 USD. \r\nThere is a discount program when you purchase  more than two million message packages. \r\n \r\n \r\nFree trial mailing of 50,000 messages to any country of your choice. \r\n \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - Contact@feedbackmessages.com', '37.120.142.158', '2019-09-10 21:12:55'),
(39, 'Dorothykip', 'hallo@amdach.at', 'YOU ARE A WINNER!', '87216416759', 'We would like to inform that you liked a comment ID:35915743 in a social network , January 9, 2019 at 19:48 \r\nThis like has been randomly selected to win the seasonal «Like Of The Year» 2019 award! \r\nhttp://facebook.com+prize+@1310252231/Mw75C1', '84.17.47.135', '2019-09-13 21:09:15'),
(40, 'Mustafa akbar', 'mustafa.berkah96@yahoo.com', 'Perihal : Penawaran Bank garansi dan asuransi ( Non collateral )', '081274720264', 'Mohon maaf sebelumnya apabila email kami menggangu aktifitasnya.\r\nSalam Hormat Dari Kami,\r\n\r\nBersama ini Kami ingin memperkenalkan diri, bahwa PT.BERKAH RAFFLES CEMERLANG adalah Perusahaan  yang bergerak dibidang Jasa Solusi Penerbitan Jaminan Bank Garansi & Surety Bond Tanpa Agunan atau Non Collateral, Proses Cepat,Tanpa Agunan, Bisa dicek Keabsahanya dan Polis Siap kami antar.\r\n\r\n \r\n\r\nA. Adapun Jenis jaminan yang kami terbitkan Yaitu : \r\n\r\n- Jaminan penawaran ( Bid Bond ) \r\n\r\n- Jaminan Pelaksanaan ( Performance Bond )  \r\n- Jaminan Uang Muka ( Advancepaymend Bond ) \r\n- Jaminan Pemeliharaan ( Maintenance Bond ) \r\n- Serta Jaminan Pembayaran Akhir Tahun ( SP2D).  \r\n- Contractor\'s All Risk (CAR), Erection All Risk (EAR) Custom Bond & Konsorsium Jaminan Surety Bond (kjsb).\r\n\r\n\r\n\r\nB. Adapun Jenis Produk Yang Dapat Kami Tawarkan Yaitu :\r\n\r\n(Pipa Untuk Saluran Air Bersih (Air Minum) & Air Limbah) :\r\n\r\n1. Pipa SNI Merk Supralon & Fitting, (Distributor Pabrikan)\r\n\r\n- Spek Pipa PVC & Fitting : SNI (S-8,S-10,S-12,5.S-16.) \r\n\r\n- Spek Pipa HDPE : SNI PN6-PN25, ISO (PE80,PE100). \r\n\r\n- Telkom PE Pipe For Fibre Optic Cable. \r\n\r\n- Spek Pipa PVC non SNI Standar JIS : (AW,D,C).\r\n\r\n2. Surat Dukungan Pengadaan Barang (Pipa PVC,HDPE) Dari Pabrik Untuk Ikut Tender.\r\n\r\n\r\n\r\nDemikianlah penawaran ini kami sampaikan, semoga ini merupakan awal kerjasama yang baik dan berkesinambungan dimasa yang akan datang. Besar harapan kami kiranya perusahaan kami diberikan kesempatan dan kepercayaan untuk berpartisipasi dalam kegiatan perusahaan bapak/ibu kelola terutama dalam hal perlindungan terhadap resiko (Wan Prestasi). Serta Sewa Bendera.\r\n\r\nSambil menunggu konfirmasinya kami ucapkan terimakasih.\r\n\r\n\r\nInformasi lebih lanjut Hub, \r\nFrom ; Mustafa akbar\r\nHp/Wa : 0812 7472 0264\r\nTelp : 021 2187 4281\r\n\r\n\r\nBest Regard,\r\nPT. BERKAH RAFFLES CEMERLANG.', '125.160.113.26', '2019-09-18 06:36:52'),
(41, 'David Gomez', 'sergiodumass@gmail.com', 'A Letter from Barrister David Gomez Gonzalez', '85783743391', 'Dearest in mind, \r\n \r\nI would like to introduce myself for the first time. My name is Barrister David Gomez Gonzalez, the personal lawyer to my late client. \r\nWho worked as a private businessman in the international field. In 2012, my client succumbed to an unfortunate car accident. My client was single and childless. \r\nHe left a fortune worth $12,500,000.00 Dollars in a bank in Spain. The bank sent me message that I have to introduce a beneficiary or the money in their bank will be confiscate. My purpose of contacting you is to make you the Next of Kin. \r\nMy late client left no will, I as his personal lawyer, was commissioned by the Spanish Bank to search for relatives to whom the money left behind could be paid to. I have been looking for his relatives for the past 3 months continuously without success. Now I explain why I need your support, I have decided to make a citizen of the same country with my late client the Next of Kin. \r\n \r\nI hereby ask you if you will give me your consent to present you to the Spanish Bank as the next of kin to my deceased client. \r\nI would like to point out that you will receive 45% of the share of this money, 45% then I would be entitled to, 10% percent will be donated to charitable organizations. \r\n \r\nIf you are interested, please contact me at my private contact details by Tel: 0034-604-284-281, Fax: 0034-911-881-353, Email: amucioabogadosl019@gmail.com \r\nI am waiting for your answer \r\nBest regards, \r\n \r\nLawyer: - David Gomez Gonzalez', '37.120.151.62', '2019-09-26 14:54:03'),
(42, 'RafaelDus', 'dcbtcsystem@gmail.com', 'Short-term cryptocurrency investments!  + 10% in 2 days!', '89421321468', 'Short-term investments in a global international project based on the blockchain platform! \r\nThe project is fully automated and decentralized! \r\n \r\nAll bitcoins are stored on the accounts (bitcoin wallets) of the participants themselves and are transferred to each other using the Bitcoin cryptocurrency. \r\n \r\n+10% in 2 days! \r\n+1500% per month \r\n \r\n3 levels of referral bonuses. \r\n \r\n5% \r\n3% \r\n1% \r\n \r\nReferral bonuses are paid the next day! \r\nOfficial site:  https://www.crypto-mmm.site \r\n \r\n \r\nBlockchain project based on mathematical algorithms of the Mavrodi brothers.', '84.17.47.35', '2019-10-18 14:46:55'),
(43, 'DavidIllen', 'miointeriors@gmail.com', 'Our system has chosen Your protindo.co.id among millions of other members', '88874973264', 'Hello! \r\nWe hasten to congratulate You on your victory in the \"Bonus Email\" campaign. \r\nOur system has chosen Your protindo.co.id among millions of other members. \r\nThis means that you are already the owner of one of our main prizes - cash, in the amount of 200 to 40,000 dollars, equipment from Apple or Mercedes Car, worth more than 50,000 dollars. \r\nTo determine what prize You will get, go to the official page of the promotion \"Bonus Email\" link: \r\n \r\nPick up your prize >>>>>>   http://bit.ly/32Jquex \r\n \r\nGood luck and have a nice day! \r\nSincerely, Michael, bonus Email campaign Manager.', '84.17.58.82', '2019-10-21 22:40:43'),
(44, 'KevinUndum', 'rodgerror@outlook.com', 'cheap monthly SEO plans', '85151155351', 'hi there \r\nI have just checked protindo.co.id for the ranking keywords and to see your SEO metrics and found that you website could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart boosting your business sales and leads with us, today! \r\n \r\nregards \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '151.106.12.247', '2019-10-25 23:12:09'),
(45, 'RobertRuS', 'robertLof@gmail.com', 'The investment project has been working since 1989! Available in your country!', '86756654823', 'Do you know that the cryptocurrency market is the most profitable at the moment? \r\nYou\'ve probably heard that many people have become multimillionaires thanks to Bitcoin and other blockchain community projects. \r\n \r\nDid you know that interactions within the blockchain community provide each project participant with a profit + 10% of personal turnover and this happens every 2 days. \r\n \r\nDo you know that you have such an opportunity? \r\nBecome a part of the community and earn on the back of cryptocurrencies! \r\nRegistration: Website: \r\nhttps://www.crypto-mmm.com/?source=btce', '212.103.50.70', '2019-10-29 14:07:04'),
(46, 'Jessiehal', 'info2@revlight.com.sg', 'High quality CCTV cameras', '83769816135', 'Dear Sir/mdm, \r\n \r\nAre you satisfied with your current CCTV on quality and service? Tired \r\nof cameras that always broke down easily? \r\n \r\nDon\'t worry, we manufacture High-Definition Security Surveillance \r\nSystems for Residential & Commercial uses. All our cameras are metal \r\nweatherproof and comes with sony sensor for maximum quality. \r\nIPcam video quality: https://youtu.be/VPG82dnXfWY \r\n \r\n+65 6678-6557 \r\nEmail: sales@revlightsecurity.com \r\nW: http://www.revlightsecurity.com/ \r\n \r\nHave a nice day! :) \r\n \r\nregards, \r\nJessie Chang \r\n7 Temasek Boulevard, Level 32, Suntec Tower One, Singapore \r\n038987', '178.162.210.177', '2019-10-29 20:18:33'),
(47, 'Mariaweili', 'af.antocrespo@consultant.com', 'We need your response urgently', '81294764587', 'Attn: Beneficiary \r\nTHE WEB PROMOTION PROGRAM. We are pleased to inform you of the release of the results of our ES.INTERNATIONAL WEB PROMOTION PROGRAM. The result was released on the 28 OF OCTOBER 2019. Your e-Website was attached to ticket number 902089237-067 drew lucky numbers 9-24-06-18-05-26. Which consequently won our website lottery program in the 2nd category. Your website has therefore won the sum of €1, 710, 460.00. CONGRATULATION!!!!!!!!!!! \r\nAll participants were selected through a computer ballot system drawn from 25,000 website addresses All over the world as part of our international website promotion program. \r\nTo start your lottery claim and also for more enlightenment regarding to this, kindly contact your agent; Alan Nicolas Matias, FOREIGN OPERATION MANAGER OF Fenix Directo Seguros S.A. by telephone N?: +34 632 822 394, Email: alan@martinjoselaws.com \r\nPlease fills the payment processing form below and retunes it to your claims agent to this email: alan@martinjoselaws.com  Congratulations once again. \r\nBeneficiary Full name: -------------------- Website: -------------------- \r\nEmail Address: --------------------------     Tel: -------------------------- \r\nNationality: ------------------------             Mode of Payment: ---------- \r\nSincerely yours, \r\nMRS MARIA LOPEZ DANIEL. \r\n(ES.WEBSITE LOTTERY COORDINATOR)', '185.93.3.114', '2019-10-31 21:03:30'),
(48, 'Richardfub', 'robertLof@gmail.com', 'Short term investments with maximum profit in international funds!', '82244549315', 'How to avoid risks and get the maximum return on your investment? \r\nThere is a better solution! \r\nShort-term investments with maximum profit! \r\nInvestment period 2 days. \r\nProfit from investing + 10% \r\nRegistration for the international investment fund is available on the official website: \r\nhttps://www.crypto-mmm.com/?source=ebtc', '45.139.48.6', '2019-11-10 22:25:52'),
(49, 'DavidLor', 'rodgerror@outlook.com', 'improve ahrefs score with high UR DR score backlinks', '88281878355', 'Buy very rare high ahrefs SEO metrics score backlinks. Manual backlinks placed on quality websites which have high UR and DR ahrefs score. Order today while we can offer this service, Limited time offer. \r\n \r\nmore info: \r\nhttps://www.monkeydigital.co/product/high-ahrefs-backlinks/ \r\n \r\nthanks \r\nMonkey Digital Team \r\n \r\n200 high aHrefs UR DR backlinks – Monkey Digital \r\nhttps://www.monkeydigital.co', '5.253.205.20', '2019-11-13 13:58:40'),
(50, 'https://drive.google.com/file/d/1uGyAPo54drip9aOTF8_4VKr-Vinz7S28/preview', 'simpleaudience@mail.ru', 'https://drive.google.com/file/d/1XDpDcwMqNTRkCmJV2DfwNFQRMxXc836T/preview', '85324315678', 'https://drive.google.com/file/d/1EL9WhLhvYXEH-i-bEEBJO4MOT9ZKOwfu/preview', '151.106.8.104', '2019-11-17 16:36:18'),
(51, 'ThomasAnderson', 'anthonyBus@gmail.com', 'There is offers  http://bit.ly/2DkAtvt', '87514242678', 'Hello \r\nI invite you to my team, I work with the administrators of the company directly. \r\n- GUARANTEED high interest on Deposit rates \r\n- instant automatic payments \r\n- multi-level affiliate program \r\nIf you want to be a successful person write: \r\nTelegram: @Tom_proinvest \r\nSkype: live:.cid.18b402177db5105c             Thomas Anderson \r\n \r\nhttp://bit.ly/2ORHV6y', '84.17.60.15', '2019-12-03 06:10:44'),
(52, 'StephenTop', 'stephenFut@gmail.com', 'cheap monthly SEO plans', '83596915132', 'hi there \r\nI have just checked %domain% for the ranking keywords and to see your SEO metrics and found that you website could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart boosting your business sales and leads with us, today! \r\n \r\nregards \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de', '84.17.48.33', '2019-12-06 01:56:10'),
(53, 'ClaytonBooft', 'slimn0537@gmail.com', '“Project Funding”', '86558473975', 'Are you seeking financing for your project/business? We can help. \r\n \r\nCaban Investment UK Limited is a leading financial institution in the UK and our financing is global. \r\n \r\nWe are into: \r\n \r\nStartUp funding \r\nCommercial Real Estate Finance \r\nJoint Venture/Partnership with long term business relationship \r\nSeed Capital/Early stage funding \r\nBusiness Financing \r\nDebt Consolidation \r\nSecured/Unsecured Loans \r\n \r\nPlease contact us for further information \r\n \r\nEmail: info@cabaniukltd.com', '84.17.49.198', '2019-12-17 22:32:38'),
(54, 'DanielDef', 'mail.arciris@gmail.com', '??????????????', '89961683698', '??????????????????????? \r\n??????????? \r\n?????!! \r\n?????????????????????10000%? \r\nARC-IRIS???? \r\n??AC??????? \r\n?????????? http://www.arciris.org/', '45.132.192.19', '2019-12-18 19:27:04'),
(55, 'Johnnypeelm', 'jackob.james@yandex.ru', 'Need your support', '87491191126', 'Let your bitcoins brings you +1.1% per day. \r\n \r\nTry http://satoshigen.site \r\nFast registration and getting asset \r\n \r\nPowered by Blockchain. \r\nAproved by thousand of users.', '84.17.51.122', '2019-12-20 06:10:26'),
(56, 'Pharma Exhibition', 'abcex.com@rediffmail.com', 'PRE-REGISTRTION - Healthcare and Pharma Show, Malaysia', '87399141488', 'Hello, \r\n \r\n23rd South East Asian Healthcare Show. \r\n22 - 24 April 2020 - Kuala Lumpur Convention Centre \r\n \r\nKLCC in April will be where you\'ll have the opportunity to secure new business opportunities. \r\nSEACare for short covers the entire profile for the medical-healthcare industries. \r\n \r\nMeet exhibitors from the European Union, China, Taiwan, S Korea, Americas and of course Malaysia. \r\n \r\nMake use of the VISITOR PRE-REGISTRTION: \r\nhttps://abcex.com/visreg/ \r\n \r\nAnd make plans for securing new products for your own markets. \r\nYou can even meet Malaysian and Singaporean Manufacturers, who are not exhibitors - simply by preregistering and making known your interest. \r\n \r\nThere\'ll be a online facility / Meeting Areas. \r\n \r\nIt is free of charge. \r\n \r\nVisas? No Problem. \r\nJust pre-reg. to visit and then use the INVITION \r\nLETTER: https://abcex.com/visa/ \r\n \r\nWe look forward to making you welcome. \r\nThe Visitor Team \r\nVisitors@abcex.com', '45.132.192.8', '2019-12-23 23:48:01'),
(57, 'Harrypep', 'no-reply_Frard@gmail.com', 'keywords based Country targeted website traffic', '81565973752', 'hi there \r\nwould you want to receive more targeted traffic to protindo.co.id ? \r\nGet keywords based and Country targeted traffic with us today \r\n \r\nvisit our website for more details \r\nhttps://hyperlabs.co/ \r\n \r\nthanks and regards \r\nHyper Labs Team', '151.106.11.182', '2019-12-31 13:36:51'),
(58, 'KennethOpind', 'raphaeSoxodort@gmail.com', 'A new method of email distribution.', '83191441751', 'Hello!  protindo.co.id \r\n \r\nDid you know that it is possible to send message absolutely lawfully? \r\nWe propose a new unique way of sending proposal through feedback forms. Such forms are located on many sites. \r\nWhen such letters are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nAlso, messages sent through contact Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - feedbackform@make-success.com', '84.17.49.186', '2020-01-08 19:03:08'),
(59, 'Albertomup', 'monetizzareoggi2019@gmail.com', 'I introduce you Umo Finance', '87284286196', 'Hello, \r\ni\'m Alberto Simoni from Italy, a proud father of two kids and an happy husband. \r\nI work online full time from my home and i like earning also in a passive way thanks my investments. \r\nDo you know Umo Finance, the company and its online platform that offers us the best investment solutions ? \r\nI don\'t refer to scam offers, but to a real cool company with its main headquarters in Dubai, another office in United Kingdom \r\nWe can invest starting from only 50 dollars to big amount as well (  starting from only 16 days contracts time ) and invest also in \r\nbitcoin and ethereum. \r\nActually i have two different deposits opened with them and i receive profits each day and i can withdraw all the time i need. \r\nThere is also a nice affiliation plan and for this reason i want to give you the chance to earn big money as well with your personal investment. \r\nI created a simple but sharp online guide to let you understanding everything where you find also a video proof about the company and all the \r\ndocuments included ( insurance document as well ) I invite you to check for everything thanks my guide here https://umoworldwide.dazeroamarketer.com/ \r\nYou find also my phone number inside my guide and you can contact me as well directly to my main email address that is monetizzareoggi@gmail.com \r\n \r\nAlberto Simoni \r\nemail: monetizzareoggi@gmail.com \r\nwhatsapp : +39 3280111149', '84.17.61.228', '2020-01-20 16:41:57'),
(60, 'MELYAN SONATA', 'pt.mjs99@gmail.com', 'Penawaran Penerbitan Bank Garansi & Asuransi, Tanpa Agunan, (Non Collateral)', '0821-2446-6737', 'Kepada Yth,\r\nPT. PERUSAHAAN DI TEMPAT\r\nUp :Pimpinan/Bag, Keuangan\r\nHp : 0821-2446-6737\r\nPerihal : Penawaran Penerbitan Bank Garansi & Asuransi,\r\n(Tanpa Agunan,Non Collateral)\r\nBersama ini Kami ingin memperkenalkan diri, bahwa\r\nPT.MITRA KAUR PERMAI ,\r\nadalah Perusahaan yang bergerak dibidang Jasa-\r\nPenerbitan Jaminan Bank Garansi & Surety Bond Tanpa Agunan atau Non Collateral,\r\nProses Cepat,Bisa dicek Keabsahanya dan Polis Di Jamin kami antar.\r\n\r\n\r\nJenis jaminan yang kami terbitkan yaitu sbb:\r\n1.Jaminan Penawaran ( Bid Bond )\r\n2.Jaminan Pelaksanaan ( Peformance Bond )\r\n3.Jaminan Uang Muka ( Advance Payment Bond )\r\n4.Jaminan Pemeliharaan ( Maintenance Bond )\r\n5.Jaminan pembayaran\r\n6.Penerbitan Surat Perintah Pencairan Dana (SP2D)\r\n7.Jaminan Dll,\r\n\r\nJenis jaminan Asuransi kami terbitkan antaranya Sbb:\r\n• PT. Asuransi ASKRINDO\r\n• PT.Asuransi JASINDO\r\n• PT.Asuransi ASEI\r\n• PT.Asuransi SINARMAS\r\n• PT.Asuransi JAMKRINDO\r\n• PT.Asuransi ASKRIDA\r\n• PT.Asuransi BUMIDA\r\n• PT.Asuransi ACA\r\n• PT.Asuransi MEGA PRATAMA\r\n• PT.Asuransi BOSOWA ASURANSI\r\n• PT.Asuransi BERDIKARI\r\n• PT.Asuransi RAMAYANA\r\n* PT.Asuransi REKAPITAL\r\n* PT.Asuransi ASPAN\r\n* PT.Asuransi RAMA SATRIA WIBAWA\r\n* Asuransi DLL\r\n\r\nJenis Bank Garansi Kami terbitkan Diantaranya sbb:\r\n* Bank MANDIRI\r\n* Bank BRI\r\n* Bank BNI\r\n* Bank BTN\r\n* Bank BCA\r\n* Bank MAYBANK/ BII\r\n* Bank BUKOPIN\r\n* Bank EXIM\r\n* Bank BPD DKI\r\n* Bank BPD JATIM\r\n* Bank BPD SUMSEL\r\n* Bank BPD JABAR\r\n* Bank J-TRUST\r\n* Bank SEMINAR\r\n\r\nJasa Asuransi Yang Kami Tawarkan Diantaranya\r\n* Contracto\'s All Risk (CAR)\r\n* Conprenshive General Liability (CGL)\r\n* Workman Compesation Liability (WCL)\r\n* Property All Risk (PAR)\r\n* Automobile Liability (AL)\r\n* Marine Hull (MH)\r\n* Erection All Risk (EAR)\r\n\r\nDemikianlah penawaran ini kami sampaikan, semoga ini merupakan awal kerjasama yang baik dan-\r\nberkesinambungan dimasa yang akan saya ucapkan terimakasih...\r\n\r\n\r\n\r\nFrom :\r\nFrom : MELYAN.S\r\nContac : 0821-2446-6737\r\nE-Mail : pt.mjs99@gmail.com\r\n\r\nPT.MITRA KAUR PERMAI\r\n0ffice:Jl.Pulo Asem Timur IV No 31 Pulogadung - Jakarta timur\r\nTlp: 021-4754596,( Hunting ) Fax : 021-4754327', '110.138.93.0', '2020-01-23 06:14:03'),
(61, 'Lambertorasp', 'jlambert.1@yahoo.com', 'I wish to Partner with you', '88891494424', 'Good day \r\n \r\nI`m a private investors seeking for a reputable company/individuals to partner with in a manner it would benefit both parties. If interested, kindly contact us through this email lambertj283@gmail.com for clarification.', '185.245.85.236', '2020-01-30 03:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_intro`
--

CREATE TABLE `contact_intro` (
  `contact_intro_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `address` tinytext NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_intro`
--

INSERT INTO `contact_intro` (`contact_intro_id`, `image`, `map`, `address`, `pdf`, `created_at`, `updated_at`) VALUES
(1, '1551086610_IMG-20190213-WA0014_(1).jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1983.1515465774849!2d106.7982666!3d-6.2237078!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1495c10ebbf%3A0xa15b1ce06a0ed147!2sSentral+Senayan+II%2C+Gelora%2C+Tanahabang%2C+Central+Jakarta+City%2C+Jakarta!5e0!3m2!1sen!2sid!4v1550764340848\" width=\"100%\" height=\"561\" frameborder=\"0\" style=\"border:0\" allowfullscreen=\"\"></iframe>', '<p>SENTRAL SENAYAN 2, 16TH FLOOR<br />JL. ASIA AFRIKA NO.8, GBK<br />JAKARTA PUSAT&nbsp;<br />T +62 21 2965 5850 / +62 21 2965 5800</p>', '1552376254_PROTINDO_COMPANY_PROFILE.pdf', '2019-01-19 07:00:57', '2019-03-13 02:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `home_intro`
--

CREATE TABLE `home_intro` (
  `home_intro_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_intro`
--

INSERT INTO `home_intro` (`home_intro_id`, `text`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>Protindo</strong> is an organization that specialized in interior and contracting design for more than 14 years, <strong>Protindo</strong> has given expert services in wide range of design related activities from design consulting to design realization in which <strong>Protindo</strong> has established an excellent track record of performance with high reputation for customer satisfaction in its dedication to meet customers&rsquo; needs and wants.</p>\r\n<p>We understanding possibilities, discussing ideas and goals, functionality of area and offering general suggestions.</p>\r\n<p>Creation of Design Concept - This is when the fun begins! Our designer team and a behind-the-scenes team of magic-workers start putting together all of the pieces of our ideas to make your project design form seamlessly and fabulously.</p>\r\n<p>&nbsp;</p>', '2019-01-12 06:18:00', '2019-02-15 10:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `home_service`
--

CREATE TABLE `home_service` (
  `home_service_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_service`
--

INSERT INTO `home_service` (`home_service_id`, `image`, `title`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, '1547278968_home.jpg', 'Interior Design Consultant', '<p>The staff at Protindo will provide you with full guidance and consultancy in all phases of the design project.</p>', 1, '2019-01-12 07:43:24', '2019-02-20 08:36:40'),
(2, '1547279117_home2.jpg', 'Design & Build', '<p>We assure of clients on the fact that they will be getting all the support services necessary to achieve the desired project result.</p>', 1, '2019-01-12 07:45:38', '0000-00-00 00:00:00'),
(3, '1547279163_home3.jpg', 'Contractor', '<p>We especially place emphasis on the professional quality of the end result, and the punctuality will be delivered according to the agreed time schedule.</p>', 1, '2019-01-12 07:46:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_service_text`
--

CREATE TABLE `home_service_text` (
  `home_service_text_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_service_text`
--

INSERT INTO `home_service_text` (`home_service_text_id`, `text`, `created_at`, `updated_at`) VALUES
(1, '<p>As an interior design company, <strong>Protindo</strong> emphasis service and quality as the benchmarks or its performance combining highly skilled personnel with sophisticated design equipment, our company is able to provide you with artistic yet fully functional products.</p>', '2019-01-12 07:30:11', '2019-01-12 01:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `home_slideshow`
--

CREATE TABLE `home_slideshow` (
  `home_slideshow_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text_left` tinytext DEFAULT NULL,
  `text_right` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_slideshow`
--

INSERT INTO `home_slideshow` (`home_slideshow_id`, `image`, `text_left`, `text_right`, `created_at`, `updated_at`, `status`) VALUES
(1, '1547272080_banner.jpg', '<p>Welcome to</p>\r\n<h2>Protindo</h2>', '<p>&ldquo;protindo brings a perfect balance of luxury and affordability into interior design&rdquo;</p>', '2019-01-12 05:48:37', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `html` longtext NOT NULL,
  `sort_order` tinyint(2) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `slug`, `html`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', '', 0, 1, '2019-01-21 17:01:08', '0000-00-00 00:00:00'),
(2, 'Project', 'project', '', 1, 1, '2019-01-21 17:01:08', '0000-00-00 00:00:00'),
(3, 'Client', 'client', '', 2, 1, '2019-01-21 17:01:08', '0000-00-00 00:00:00'),
(4, 'About Us', 'about', '', 3, 1, '2019-01-21 17:04:52', '2019-02-15 04:05:32'),
(5, 'Contact', 'contact', '', 4, 1, '2019-01-21 17:04:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `image`, `title`, `text`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(6, '1550136400_4_(1).jpg', 'BNI Press Lounge, Jakarta', '<p>BNI Press Lounge, Jakarta</p>', 2, 1, '2019-01-25 16:00:13', '2019-02-19 04:53:47'),
(9, '1550136859_store_a_(1).jpg', 'Vodka & Latte, Kemang', '<p>Vodka &amp; Latte Salon is a Japanese style dog wellness and grooming center, located in the heart of South Jakarta in the posh Kemang area. The owner decided to name Vodka &amp; Latte in dedication of their love to their beloved dogs Vodka, a very gorgeous West Highland white terrier commonly known as the Westie or Westy and the other one is Latte, a cute and adorable Poodle.</p>\r\n<p>Sprawled over 2,000 m2 of land, the whole area is dedicated to provide the ultimate retreat and pampering services for your dogs. Vodka &amp; Latte services include Salon for Grooming and Styling with Japanese cutting edge technologies &amp; grooming technique, Daycare, Boarding Hotel, Retail Shop with selected Japanese imported products, Dog Park, Dog Swimming Pool for healthy fun exercise and rehabilitation and also Cafe both for dogs and owner.</p>', 2, 1, '2019-01-27 22:53:01', '2019-02-15 03:48:53'),
(11, '1550137331_IMG-20190207-WA0035.jpg', 'VIP Restaurant at All Seasons Hotel, Jakarta', '<p>Elegance Fine Dining at VIP Lounge</p>', 3, 1, '2019-01-27 22:53:03', '2019-02-19 04:52:58'),
(13, '1550136812_gatheringg_(2).jpg', 'Vodka & Latte, Kemang', '<p>Spacious gathering area at Vodka &amp; Latte, Kemang</p>', 2, 1, '2019-01-27 22:53:05', '2019-02-19 04:46:57'),
(15, '1550136781_store_2_(2).jpg', 'Vodka & Latte, Kemang', '<p>Store corner at Vodka &amp; Latte, Kemang</p>', 2, 1, '2019-01-27 22:53:07', '2019-02-19 04:46:01'),
(17, '1550136753_IMG_9426_(2).JPG', 'Vodka & Latte, Kemang', '<p>Store corner at Vodka &amp; Latte, Kemang</p>', 2, 1, '2019-01-27 22:54:01', '2019-02-19 04:44:49'),
(18, '1548601224_5.jpg', 'SOS Medica Clinic, Jakarta', '<p>Lobby area of SOS Medical Centre</p>', 5, 1, '2019-01-27 22:54:02', '2019-02-19 08:49:12'),
(19, '1550137302_IMG-20190207-WA0034.jpg', 'VIP Restaurant at All Seasons Hotel, Jakarta', '<p>Elegance Fine Dining at VIP Lounge</p>', 3, 1, '2019-01-27 22:54:03', '2019-02-19 04:42:51'),
(21, '1550136724_cafe_3_(2).jpg', 'Vodka & Latte, Kemang', '<p>Vodka &amp; Latte Salon is a Japanese style dog wellness and grooming center</p>', 2, 1, '2019-01-27 22:54:05', '2019-02-25 08:49:04'),
(23, '1550136652_day_caree_(4).jpg', 'Vodka & Latte, Kemang', '<p>Vodka &amp; Latte Salon is a Japanese style dog wellness and grooming center</p>', 2, 1, '2019-01-27 22:54:07', '2019-02-25 08:47:14'),
(26, '1550136555_BNI_Couch_(3).jpg', 'BNI Press Lounge, Jakarta', '<p>Playful work space at BNI Press Lounge, Jakarta</p>', 2, 1, '2019-01-27 22:55:02', '2019-02-19 04:42:05'),
(27, '1550137274_IMG-20190207-WA0032.jpg', 'VIP Restaurant at All Seasons Hotel, Jakarta', '<p>VIP Lounge at VIP Restaurant of All Seasons Hotel</p>', 3, 1, '2019-01-27 22:55:03', '2019-02-19 04:41:01'),
(28, '1548601129_2.jpg', 'Art Gallery, Jakarta', '<p>Simplicity of Artistic Art</p>', 3, 1, '2019-01-27 22:55:04', '2019-02-19 04:40:16'),
(29, '1548601090_3.jpg', 'Vodka & Latte, Kemang', '<p>Vodka &amp; Latte Salon is a Japanese style dog wellness and grooming center</p>', 2, 1, '2019-01-27 22:55:05', '2019-02-25 08:46:18'),
(30, '1548600953_4.jpg', 'BNI Press Lounge, Jakarta', '<p>BNI Press Lounge, Jakarta</p>', 2, 1, '2019-01-27 22:55:06', '2019-02-12 10:46:48'),
(34, '1550134675_IMG-20190212-WA0011.jpg', 'CoHive Artotel Sanur, Bali', '<p>Dynamic coworking space of CoHive Bali</p>', 1, 1, '2019-02-14 08:58:19', '2019-02-19 04:38:18'),
(35, '1550136427_3_(3).jpg', 'BNI Press Lounge, Jakarta', '<p>Meeting Room at BNI Press Lounge</p>', 2, 1, '2019-02-14 09:27:33', '2019-02-19 04:37:25'),
(36, '1550137354_IMG-20190207-WA0036.jpg', 'VIP Restaurant at All Seasons Hotel, Jakarta', '<p>The entrance of Fine Dining VIP Lounge</p>', 3, 1, '2019-02-14 09:42:52', '2019-02-19 04:36:14'),
(37, '1550137382_IMG-20190207-WA0040_(1).jpg', 'VIP Restaurant at All Seasons Hotel, Jakarta', '<p>VIP Restaurant at All Seasons Hotel, Jakarta</p>', 3, 1, '2019-02-14 09:43:24', '2019-02-19 04:35:33'),
(38, '1550137413_IMG-20190207-WA0041.jpg', 'VIP Restaurant at All Seasons Hotel, Jakarta', '<p>VIP Lounge All Seasons Hotel, Jakarta</p>', 3, 1, '2019-02-14 09:43:53', '2019-02-19 04:34:48'),
(39, '1550210296_1.jpg', 'Vodka & Latte, Kemang', '<p>Cozy and Homy Lounge at Vodka &amp; Latte, Kemang</p>', 2, 1, '2019-02-15 05:58:29', '2019-02-19 04:33:33'),
(40, '1550216693_CYMERA_20190215_143401_(1).jpg', 'Cafe Oh La La, Setiabudi Jakarta', '<p>Cafe Oh La La, Jakarta</p>', 4, 1, '2019-02-15 07:46:02', '2019-02-19 04:31:59'),
(41, '1550216779_CYMERA_20190215_143501_(1).jpg', 'Metaphor Store at Central Park, Jakarta', '<p>Metaphor Store</p>', 4, 1, '2019-02-15 07:47:46', '2019-02-19 04:08:28'),
(42, '1550216892_CYMERA_20190215_143629_(1).jpg', 'SC Johnson Office, Jakarta', '<p>Dynamic work area at SC Johnson Office</p>', 1, 1, '2019-02-15 07:49:06', '2019-02-19 03:52:29'),
(43, '1550216961_CYMERA_20190215_143557.jpg', 'Birah House, Jakarta', '<p>Home Sweet Home bringing a warm vibes</p>', 6, 1, '2019-02-15 07:50:16', '0000-00-00 00:00:00'),
(44, '1550486085_CP26.jpg', 'Vodka & Latte, Kemang', '<p>Japanese style dog wellness and grooming center</p>', 2, 1, '2019-02-18 10:35:11', '2019-02-25 08:47:51'),
(45, '1550486143_CP29.jpg', 'Vodka & Latte, Kemang', '<p>Salon at Vodka &amp; Latte, Kemang</p>', 2, 1, '2019-02-18 10:36:11', '2019-02-19 03:45:46'),
(46, '1550486300_CP27.jpg', 'Vodka & Latte, Kemang', '<p>Playful Pool at Vodka &amp; Latte, Kemang</p>', 2, 1, '2019-02-18 10:38:43', '2019-02-19 03:45:11'),
(47, '1550486495_CP28.jpg', 'Vodka & Latte, Kemang', '<p>Store Corner at Vodka &amp; Latte, Kemang</p>', 2, 1, '2019-02-18 10:42:02', '2019-02-19 03:44:50'),
(48, '1550547089_CP09.jpg', 'CIMB Niaga at Energy Tower, Jakarta', '<p>Reception Area of CIMB Niaga Office at Energy Tower</p>', 1, 1, '2019-02-19 03:32:12', '2019-02-19 03:37:03'),
(49, '1550547143_CP08.jpg', 'CIMB Niaga at Energy Tower, Jakarta', '<p>Lobby Lounge of CIMB Niaga Office at Energy Tower</p>', 1, 1, '2019-02-19 03:33:00', '2019-02-19 03:36:40'),
(50, '1550547189_CP07.jpg', 'CIMB Niaga at Energy Tower, Jakarta', '<p>Meeting Room of CIMB Niaga Office at Energy Tower</p>', 1, 1, '2019-02-19 03:33:41', '2019-02-19 03:36:15'),
(51, '1550563767_afsgrdtyjui.jpg', 'Allegra Apartment Kemang, Jakarta', '<p>Executive Suites at Allegra Apartment</p>', 6, 1, '2019-02-19 08:10:32', '2019-02-19 08:38:58'),
(52, '1550564460_Menteng_House.jpg', 'House at Jalan Suwiryo Menteng, Jakarta', '<p>Living, Dining and Bed Rooms at Menteng House</p>', 6, 1, '2019-02-19 08:22:09', '0000-00-00 00:00:00'),
(53, '1550565238_Ikuze_Japanese_2.jpg', 'Ikuze Japanese Food Bazzar, Jakarta', '<p>Ikuze\'s Gate</p>', 3, 1, '2019-02-19 08:35:30', '0000-00-00 00:00:00'),
(54, '1550565341_Ikuze_Japanese_3.jpg', 'Ikuze Japanese Food Bazzar, Jakarta', '<p>Wine and Dine Table at Ikuze</p>', 3, 1, '2019-02-19 08:36:48', '0000-00-00 00:00:00'),
(55, '1550565427_Ikuze_Japanese.jpg', 'Ikuze Japanese Food Bazzar, Jakarta', '<p>Wine and Dine Place at Ikuze</p>', 3, 1, '2019-02-19 08:37:47', '2019-02-19 08:38:20'),
(56, '1550565682_Amnesia_Club.jpg', 'Amnesia Club, Bandung', '<p>Wine and Dine at entertainment club of Amnesia</p>', 3, 1, '2019-02-19 08:42:27', '0000-00-00 00:00:00'),
(57, '1550565885_Harley_Davidson.jpg', 'Harley Davidson, Jakarta', '<p>Harley Davidson Retail, Jakarta</p>', 4, 1, '2019-02-19 08:45:37', '0000-00-00 00:00:00'),
(58, '1550566064_SOS_Medica_Clinic,_Jakarta.jpg', 'SOS Medica Clinic, Jakarta', '<p>SOS Medica Clinic</p>', 5, 1, '2019-02-19 08:48:35', '0000-00-00 00:00:00'),
(59, '1550566398_KBRI_Tokyo,_Japan.jpg', 'KBRI Tokyo, Japan', '<p>The Ambassador residence &amp; office of KBRI Tokyo&nbsp;</p>', 6, 1, '2019-02-19 08:54:59', '0000-00-00 00:00:00'),
(60, '1550566974_Private_residence_SG.jpg', 'Private Residence, Singapore', '<p>Close to Nature Bathtube</p>', 6, 1, '2019-02-19 09:04:20', '0000-00-00 00:00:00'),
(61, '1550567071_SG_Residential.jpg', 'Private Residence, Singapore', '<p>The Bedroom</p>', 6, 1, '2019-02-19 09:05:00', '0000-00-00 00:00:00'),
(62, '1550567111_SG_residential_2.jpg', 'Private Residence, Singapore', '<p>The Living Room</p>', 6, 1, '2019-02-19 09:05:34', '0000-00-00 00:00:00'),
(63, '1550567562_Picture2.jpg', 'Private Residence, Los Angeles', '<p>The Living, Dining and Bed Rooms of residential at LA</p>', 6, 1, '2019-02-19 09:13:46', '0000-00-00 00:00:00'),
(64, '1550568440_Allianz_Tower_2.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 09:28:02', '0000-00-00 00:00:00'),
(65, '1550568495_Allianz_Tower_3.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 09:28:44', '0000-00-00 00:00:00'),
(66, '1550568534_Allianz_Tower.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 09:29:21', '0000-00-00 00:00:00'),
(67, '1550568572_Sentral_Senayan_2.jpg', 'Fortice Serviced Office', '<p>Fortice at Sentral Senayan 2, Jakarta</p>', 1, 1, '2019-02-19 09:29:59', '0000-00-00 00:00:00'),
(68, '1550568608_Summitmas.jpg', 'Fortice Serviced Office', '<p>Fortice at Summitmas 2, Jakarta</p>', 1, 1, '2019-02-19 09:30:37', '0000-00-00 00:00:00'),
(69, '1550570403_Martha_Tilaar.png', 'Martha Tilaar Eastern Garden Spa, Jakarta', '<p>Martha Tilaar Hotel and Spa&nbsp;</p>', 2, 1, '2019-02-19 10:01:14', '0000-00-00 00:00:00'),
(70, '1550570590_CP25.jpg', 'PT Vale Indonesia Tbk', '<p>Vale Office, Jakarta</p>', 1, 1, '2019-02-19 10:03:43', '0000-00-00 00:00:00'),
(71, '1550570791_CP04.jpg', 'Nokia Office, Jakarta', '<p>Reception Area of Nokia Office</p>', 1, 1, '2019-02-19 10:07:18', '2019-02-19 10:08:25'),
(72, '1550570847_CP05.jpg', 'Nokia Office, Jakarta', '<p>Meeting Room of Nokia Office</p>', 1, 1, '2019-02-19 10:07:52', '0000-00-00 00:00:00'),
(73, '1550570938_CP06.jpg', 'Nokia Office, Jakarta', '<p>Break Out Counter of Nokia Office</p>', 1, 1, '2019-02-19 10:09:28', '0000-00-00 00:00:00'),
(74, '1550571091_CP03.jpg', 'Harley Davidson, Jakarta', '<p>Harley Davidson Store, Jakarta</p>', 4, 1, '2019-02-19 10:12:16', '0000-00-00 00:00:00'),
(76, '1550571680_Lanco_Indonesia_energy.jpg', 'Lanco Indonesia Energy, Jakarta', '<p>The Meeting Room</p>', 1, 1, '2019-02-19 10:21:50', '0000-00-00 00:00:00'),
(77, '1550571721_Piaggio_Indonesia.jpg', 'Piaggio, Jakarta', '<p>The Meeting Room</p>', 1, 1, '2019-02-19 10:22:46', '0000-00-00 00:00:00'),
(78, '1550571800_Sony_Indonesia.jpg', 'Sony Indonesia, Jakarta', '<p>The Meeting Room</p>', 1, 1, '2019-02-19 10:23:43', '0000-00-00 00:00:00'),
(79, '1550572123_CP11.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 10:29:11', '2019-02-19 10:30:00'),
(80, '1550572210_CP12.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 10:30:35', '0000-00-00 00:00:00'),
(81, '1550572244_CP13.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 10:31:10', '0000-00-00 00:00:00'),
(82, '1550572281_CP22.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 10:31:47', '0000-00-00 00:00:00'),
(83, '1550572320_CP23.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 10:32:26', '0000-00-00 00:00:00'),
(84, '1550572361_CP24.jpg', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 10:33:05', '0000-00-00 00:00:00'),
(85, '1550572398_CP25.png', 'Fortice Serviced Office', '<p>Fortice at Allianz Tower, Jakarta</p>', 1, 1, '2019-02-19 10:33:43', '0000-00-00 00:00:00'),
(86, '1550572453_CP14.jpg', 'Fortice Serviced Office', '<p>Fortice at BTPN, Jakarta</p>', 1, 1, '2019-02-19 10:34:39', '0000-00-00 00:00:00'),
(87, '1550572487_CP15.jpg', 'Fortice Serviced Office', '<p>Fortice at BTPN, Jakarta</p>', 1, 1, '2019-02-19 10:35:08', '0000-00-00 00:00:00'),
(88, '1550572519_CP16.jpg', 'Fortice Serviced Office', '<p>Fortice at BTPN, Jakarta</p>', 1, 1, '2019-02-19 10:35:43', '0000-00-00 00:00:00'),
(89, '1554706635_IMG-20190401-WA0015.jpg', 'CoHive Graha XL, Jakarta', '<p>Lobby Area</p>', 1, 1, '2019-04-08 06:57:56', '0000-00-00 00:00:00'),
(90, '1554706759_IMG-20190401-WA0016.jpg', 'CoHive Graha XL, Jakarta', '<p>Lobby Area</p>', 1, 1, '2019-04-08 06:59:45', '0000-00-00 00:00:00'),
(93, '1554706969_IMG-20190401-WA0014.jpg', 'CoHive Graha XL, Jakarta', '<p>Lobby Area</p>', 1, 1, '2019-04-08 07:03:10', '0000-00-00 00:00:00'),
(94, '1554707026_IMG-20190401-WA0020.jpg', 'CoHive Graha XL, Jakarta', '<p>Lobby Area</p>', 1, 1, '2019-04-08 07:04:06', '0000-00-00 00:00:00'),
(97, '1554707113_IMG-20190401-WA0021.jpg', 'CoHive Graha XL, Jakarta', '<p>Lobby Area</p>', 1, 1, '2019-04-08 07:05:34', '0000-00-00 00:00:00'),
(98, '1554707143_IMG-20190401-WA0022.jpg', 'CoHive Graha XL, Jakarta', '<p>Lobby Area</p>', 1, 1, '2019-04-08 07:06:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_slideshow`
--

CREATE TABLE `project_slideshow` (
  `project_slideshow_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_slideshow`
--

INSERT INTO `project_slideshow` (`project_slideshow_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, '1550196960_IMG-20190212-WA0011.jpg', 1, '2019-02-15 02:16:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `code`, `key`, `value`, `status`) VALUES
(1, 'config', 'config_name', 'Protindo', 1),
(2, 'config', 'config_logo', 'logo.jpg', 1),
(3, 'config', 'config_favicon', 'favicon.ico', 1),
(4, 'config', 'config_contact_email', 'siti.rahayu@protindo.co.id', 1),
(5, 'config', 'config_home_meta_title', '', 1),
(6, 'config', 'config_home_meta_description', '', 1),
(7, 'config', 'config_home_meta_keyword', '', 1),
(8, 'config', 'config_project_meta_title', '', 1),
(9, 'config', 'config_project_meta_description', '', 1),
(10, 'config', 'config_project_meta_keyword', '', 1),
(11, 'config', 'config_client_meta_title', '', 1),
(12, 'config', 'config_client_meta_description', '', 1),
(13, 'config', 'config_client_meta_keyword', '', 1),
(14, 'config', 'config_about_meta_title', '', 1),
(15, 'config', 'config_about_meta_description', '', 1),
(16, 'config', 'config_about_meta_keyword', '', 1),
(17, 'config', 'config_contact_meta_title', '', 1),
(18, 'config', 'config_contact_meta_description', '', 1),
(19, 'config', 'config_contact_meta_keyword', '', 1),
(20, 'config', 'config_footer', '<p style=\"text-align: left;\">Sentral Senayan 2, 16th Floor</p>\r\n<p style=\"text-align: left;\">Jl. Asia Afrika No.8, GBK</p>\r\n<p style=\"text-align: left;\">Jakarta Pusat</p>\r\n<p style=\"text-align: left;\">T +62 21 2965 5850 / +62 21 2965 5800</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `ip`, `status`, `created_at`, `updated_at`, `token`) VALUES
(1, 'admin', 'tofanaditya91@gmail.com', 'BKvH5X80FImm.', '::1', 0, '2019-01-07 17:25:10', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_intro`
--
ALTER TABLE `about_intro`
  ADD PRIMARY KEY (`about_intro_id`);

--
-- Indexes for table `about_people`
--
ALTER TABLE `about_people`
  ADD PRIMARY KEY (`about_people_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client_icon`
--
ALTER TABLE `client_icon`
  ADD PRIMARY KEY (`client_icon_id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`client_list_id`);

--
-- Indexes for table `contact_inbox`
--
ALTER TABLE `contact_inbox`
  ADD PRIMARY KEY (`contact_inbox_id`);

--
-- Indexes for table `contact_intro`
--
ALTER TABLE `contact_intro`
  ADD PRIMARY KEY (`contact_intro_id`);

--
-- Indexes for table `home_intro`
--
ALTER TABLE `home_intro`
  ADD PRIMARY KEY (`home_intro_id`);

--
-- Indexes for table `home_service`
--
ALTER TABLE `home_service`
  ADD PRIMARY KEY (`home_service_id`);

--
-- Indexes for table `home_service_text`
--
ALTER TABLE `home_service_text`
  ADD PRIMARY KEY (`home_service_text_id`);

--
-- Indexes for table `home_slideshow`
--
ALTER TABLE `home_slideshow`
  ADD PRIMARY KEY (`home_slideshow_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_slideshow`
--
ALTER TABLE `project_slideshow`
  ADD PRIMARY KEY (`project_slideshow_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_intro`
--
ALTER TABLE `about_intro`
  MODIFY `about_intro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_people`
--
ALTER TABLE `about_people`
  MODIFY `about_people_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client_icon`
--
ALTER TABLE `client_icon`
  MODIFY `client_icon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `client_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contact_inbox`
--
ALTER TABLE `contact_inbox`
  MODIFY `contact_inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `contact_intro`
--
ALTER TABLE `contact_intro`
  MODIFY `contact_intro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_intro`
--
ALTER TABLE `home_intro`
  MODIFY `home_intro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_service`
--
ALTER TABLE `home_service`
  MODIFY `home_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_service_text`
--
ALTER TABLE `home_service_text`
  MODIFY `home_service_text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slideshow`
--
ALTER TABLE `home_slideshow`
  MODIFY `home_slideshow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `project_slideshow`
--
ALTER TABLE `project_slideshow`
  MODIFY `project_slideshow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
