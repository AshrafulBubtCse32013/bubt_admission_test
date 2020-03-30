-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2019 at 11:29 PM
-- Server version: 5.7.27
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
-- Database: `abusaim_bubt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(100) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_pass`, `admin_status`) VALUES
(1, 'BUBT', 'bubtadmin', '363464564', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_category`
--

CREATE TABLE `as_category` (
  `cat_id` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `categoryImage` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_category`
--

INSERT INTO `as_category` (`cat_id`, `categoryName`, `categoryImage`) VALUES
(23, 'TXT', NULL),
(22, 'EEE', NULL),
(21, 'CSE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `as_guest`
--

CREATE TABLE `as_guest` (
  `id` int(10) NOT NULL,
  `session_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_guest`
--

INSERT INTO `as_guest` (`id`, `session_id`) VALUES
(1, 'rirfr6lauqsf238rnhdnf92410');

-- --------------------------------------------------------

--
-- Table structure for table `as_option`
--

CREATE TABLE `as_option` (
  `op_id` int(11) NOT NULL,
  `qus_id` int(11) DEFAULT NULL,
  `option` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_option`
--

INSERT INTO `as_option` (`op_id`, `qus_id`, `option`) VALUES
(545, 121, 'N'),
(544, 121, 'C1'),
(543, 121, 'C'),
(542, 120, 'Eight'),
(541, 120, 'Four'),
(539, 120, 'Five'),
(540, 120, 'Seven'),
(538, 119, 'n=1, l=0,m=0,s= +0.5'),
(537, 119, 'n=1, l=0,m=1,s= -0.5'),
(536, 119, 'n=1, l=1,m=0,s= -0.5'),
(535, 119, 'n=1, l=0,m=0,s=  0.5'),
(534, 118, '5,5'),
(533, 118, '3,4'),
(532, 118, '5,6'),
(531, 118, '4,5'),
(530, 117, '6,7'),
(529, 117, '6,6'),
(524, 116, '32'),
(525, 116, '18'),
(526, 116, '8'),
(527, 117, '6,8'),
(528, 117, '6,10'),
(523, 116, '50'),
(522, 115, 'There is no answer'),
(521, 115, '+2, +1, 0, -1, 2'),
(520, 115, '2, 1, 0, -1, -2'),
(519, 115, '+2, +1, 0, 1, 2'),
(518, 114, '3d'),
(517, 114, '2s'),
(516, 114, '2p'),
(515, 114, '3f'),
(514, 113, 'there is no answer'),
(513, 113, 'they have same energy'),
(512, 113, '3d has no  lower energy  than 4s'),
(511, 113, '4s has lower energy  than 3d'),
(510, 112, 'There is no answer'),
(509, 112, '2, 5'),
(508, 112, '2, 8'),
(320, 0, '2'),
(321, 0, '3'),
(322, 0, '4'),
(323, 0, '1'),
(324, 0, '2'),
(325, 0, '3'),
(326, 0, '4'),
(327, 0, '1'),
(328, 0, '2'),
(329, 0, '3'),
(330, 0, '4'),
(331, 0, '1'),
(332, 0, '2'),
(333, 0, '3'),
(334, 0, '4'),
(335, 0, '1'),
(336, 0, '2'),
(337, 0, '3'),
(338, 0, '4'),
(339, 0, '1'),
(340, 0, '2'),
(341, 0, '3'),
(342, 0, '4'),
(343, 0, '1'),
(344, 0, '2'),
(345, 0, '3'),
(346, 0, '4'),
(347, 0, '1'),
(348, 0, '2'),
(349, 0, '3'),
(350, 0, '4'),
(351, 0, '1'),
(352, 0, '2'),
(353, 0, '3'),
(354, 0, '4'),
(355, 0, '1'),
(356, 0, '2'),
(357, 0, '3'),
(358, 0, '4'),
(359, 0, '1'),
(360, 0, '2'),
(361, 0, '3'),
(362, 0, '4'),
(363, 0, '1'),
(364, 0, '2'),
(365, 0, '3'),
(366, 0, '4'),
(367, 0, '1'),
(368, 0, '2'),
(369, 0, '3'),
(370, 0, '4'),
(371, 0, '1'),
(372, 0, '2'),
(373, 0, '3'),
(374, 0, '4'),
(375, 0, '1'),
(376, 0, '2'),
(377, 0, '3'),
(378, 0, '4'),
(379, 0, '1'),
(380, 0, '2'),
(381, 0, '3'),
(382, 0, '4'),
(383, 0, '1'),
(384, 0, '2'),
(385, 0, '3'),
(386, 0, '4'),
(387, 0, '1'),
(388, 0, '2'),
(389, 0, '3'),
(390, 0, '4'),
(391, 0, '1'),
(392, 0, '2'),
(393, 0, '3'),
(394, 0, '4'),
(395, 0, 'tyrewqq'),
(396, 0, 'wetv353'),
(397, 0, 'er ter'),
(398, 83, 'adsfgrhg'),
(399, 84, '1'),
(400, 84, '2'),
(401, 84, '3'),
(402, 84, '4'),
(403, 85, '1'),
(404, 85, '2'),
(405, 85, '3'),
(406, 85, '4'),
(407, 86, '1'),
(408, 86, '2'),
(409, 86, '3'),
(410, 86, '4'),
(411, 87, '(n(n+1)(n+2))/6'),
(412, 87, '(n(n+1)(n+2))/6'),
(413, 88, 'option 1 correct'),
(414, 88, 'option 2'),
(415, 88, 'option 3'),
(416, 88, 'option 4'),
(420, 89, '400'),
(460, 99, 'null'),
(459, 99, '{0}'),
(507, 112, '2, 7'),
(506, 111, 'Na &amp; Si'),
(505, 111, 'H &amp; Sn'),
(504, 111, 'Cu &amp; Zn'),
(503, 111, 'H &amp; D'),
(502, 110, '1,3'),
(501, 110, '2,0'),
(500, 110, '1,2'),
(499, 110, '0,1'),
(498, 109, '3'),
(497, 109, '2'),
(496, 109, '1'),
(495, 109, '0'),
(494, 108, '1000 J'),
(493, 108, '100 J'),
(492, 108, '500 J'),
(491, 108, '400 J'),
(490, 107, '1.0m'),
(489, 107, '28m'),
(488, 107, '1.8m'),
(487, 107, '2.8 m'),
(546, 121, 'No Answer'),
(547, 122, 'Halogen'),
(548, 122, 'Transitional metal'),
(549, 122, 'Alkaline'),
(550, 122, 'No answer'),
(551, 123, 'C &amp; N'),
(552, 123, 'Na &amp; N'),
(553, 123, 'Ni &amp; Fe'),
(554, 123, 'Mg &amp; N'),
(555, 124, '5 m/s'),
(556, 124, '10 m/s'),
(557, 124, '5.5 m/s'),
(558, 124, '4 m/s'),
(559, 125, 'increasing'),
(560, 125, 'decreasing'),
(561, 125, 'always zero'),
(562, 125, 'constant'),
(563, 126, '1/2 of the original force'),
(564, 126, '1/3 of the original force'),
(565, 126, '1/9 of the original force'),
(566, 126, 'unchanged'),
(567, 127, '0 meters per second'),
(568, 127, '0.5 meters per second'),
(569, 127, '5 meters per second'),
(570, 127, '50 meters per second'),
(571, 128, '1.5 seconds'),
(572, 128, '6 seconds'),
(573, 128, '16.7 seconds'),
(574, 128, '150 seconds'),
(575, 129, 'quartered'),
(576, 129, 'halved'),
(577, 129, 'doubled'),
(578, 129, 'quadrupled'),
(579, 130, 'one fourth as great'),
(580, 130, 'one half as great'),
(581, 130, 'twice as great'),
(582, 130, 'four times as great'),
(583, 131, '14.7 meters'),
(584, 131, '29.4 meters'),
(585, 131, '44.1 meters'),
(586, 131, '88.2 meters'),
(587, 132, '1250 kilograms'),
(588, 132, '2500 kilograms'),
(589, 132, '5000 kilograms'),
(590, 132, '10,000 kilograms'),
(591, 133, 'kilogram-meters per second'),
(592, 133, '0.4 kilogram-meters per second'),
(593, 133, '0.5 kilogram-meters per second'),
(594, 133, '0.9 kilogram-meters per second'),
(595, 134, 'twice the velocity of the first satellite'),
(596, 134, 'four times the velocity of the first satellite'),
(597, 134, 'the same as the velocity of the first satellite'),
(598, 134, 'half the velocity of the first satellite'),
(599, 135, 'increases steadily'),
(600, 135, 'decreases steadily'),
(601, 135, 'first decreases, then increases'),
(602, 135, 'remains constant'),
(603, 136, '1600 N'),
(604, 136, '800 N'),
(605, 136, '400 N'),
(606, 136, '0 N'),
(607, 137, 'Poor'),
(608, 137, 'poverty'),
(609, 137, 'extremely rich'),
(610, 137, 'extremely poor'),
(611, 138, 'Who'),
(612, 138, 'whom'),
(613, 138, 'by whom'),
(614, 138, 'whoever'),
(615, 139, 'Has considered'),
(616, 139, 'have considered'),
(617, 139, 'consider'),
(618, 139, 'considered'),
(619, 140, 'Possesses'),
(620, 140, 'possessed'),
(621, 140, 'possess'),
(622, 140, 'is possessing'),
(623, 141, 'Made'),
(624, 141, 'have made'),
(625, 141, 'has made'),
(626, 141, 'is making'),
(627, 142, 'Between'),
(628, 142, 'around'),
(629, 142, 'among'),
(630, 142, 'none'),
(631, 143, 'Radical'),
(632, 143, 'poverty'),
(633, 143, 'deficiency'),
(634, 143, 'prosperous'),
(641, 145, 'him'),
(640, 145, 'themselves'),
(639, 145, 'Herself'),
(642, 145, 'himself'),
(643, 146, 'Soon'),
(644, 146, 'early'),
(645, 146, 'late'),
(646, 146, 'late night'),
(647, 147, 'In spite'),
(648, 147, 'despite of'),
(649, 147, 'due to'),
(650, 147, 'despite'),
(651, 148, 'backer'),
(652, 148, 'philanthropist'),
(653, 148, 'sponsor'),
(654, 148, 'Misogynist'),
(655, 149, 'To visit'),
(656, 149, 'visiting'),
(657, 149, 'to travel'),
(658, 149, 'for travel'),
(659, 150, 'Inquires'),
(660, 150, 'is inquired'),
(661, 150, 'asked'),
(662, 150, 'is asked'),
(663, 151, 'Complex sentence'),
(664, 151, 'Compound sentence'),
(665, 151, 'Imperative sentence'),
(666, 151, 'Optative sentence'),
(667, 152, 'Enthralled'),
(668, 152, 'shocked'),
(669, 152, 'frightened'),
(670, 152, 'astonished'),
(677, 154, 'sqrt[](-1)'),
(676, 154, '2'),
(675, 154, '1'),
(678, 154, '1/2'),
(679, 155, '1'),
(680, 155, '2'),
(681, 155, '3'),
(682, 155, 'None'),
(683, 156, '1'),
(684, 156, '2'),
(685, 156, '5'),
(686, 156, 'None'),
(687, 157, '3'),
(688, 157, '6'),
(689, 157, '9'),
(690, 157, '10'),
(698, 159, 'undefined'),
(697, 159, 'âˆž'),
(696, 159, '5'),
(695, 159, '0'),
(699, 160, '0.1'),
(700, 160, '1'),
(701, 160, '0.01'),
(702, 160, '0.001'),
(703, 161, '0.20'),
(704, 161, '4'),
(705, 161, '40'),
(706, 161, '400'),
(707, 162, '-1'),
(708, 162, 'i'),
(709, 162, '1'),
(710, 162, 'None'),
(711, 163, 'x&lt;z'),
(712, 163, 'z&lt;x'),
(713, 163, 'x=z'),
(714, 163, 'None'),
(715, 164, 'xy&gt;0'),
(716, 164, 'xy&lt;0'),
(717, 164, 'xy=0'),
(718, 164, 'None'),
(719, 165, '6'),
(720, 165, '8'),
(721, 165, '2'),
(722, 165, '1'),
(723, 166, '4'),
(724, 166, '12'),
(725, 166, '24'),
(726, 166, '48'),
(727, 167, '19'),
(728, 167, '12'),
(729, 167, '25'),
(730, 167, '36'),
(731, 168, '1'),
(732, 168, '2'),
(733, 168, '3'),
(734, 168, '4'),
(735, 169, '{0 ,1,2}'),
(736, 169, '{0 ,1}'),
(737, 169, '{0}'),
(738, 169, '{2 ,6}');

-- --------------------------------------------------------

--
-- Table structure for table `as_option_csv`
--

CREATE TABLE `as_option_csv` (
  `op_id` int(11) NOT NULL,
  `qus_id` int(11) NOT NULL,
  `option` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `as_quertion`
--

CREATE TABLE `as_quertion` (
  `qus_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `quertion` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `answer_id` varchar(255) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_quertion`
--

INSERT INTO `as_quertion` (`qus_id`, `cat_id`, `quertion`, `answer_id`, `sub_id`) VALUES
(119, NULL, 'Which one is correct for He?', '[538]', 27),
(117, NULL, 'Number of electrons in the 3p and 4p subshell s are', '[529]', 27),
(118, NULL, 'How orbitals are in 3d and 4d?', '[534]', 27),
(116, NULL, 'How many electrons contain in the 5th orbit?', '[524]', 27),
(115, NULL, 'What are the possible values of m for n &amp; l equal to 3 and 2 respectively?', '[522]', 27),
(114, NULL, 'If n equal to 3 and l equal to 2, what will be the subshell?', '[518]', 27),
(113, NULL, 'Why does 19th electron of K first enter 4s instead of 3d?', '[511]', 27),
(112, NULL, 'Which is he electronic configuration of floride ion?', '[508]', 27),
(109, NULL, 'What is the first value of principal quantum number?', '[496]', 27),
(110, NULL, 'If firs quantum number 2, what is he possible value of azimuthal quantum number?', '[499]', 27),
(111, NULL, 'Which one is isotope?', '[503]', 27),
(107, NULL, 'A ball leaves a girl\'s hand with an upward velocity of 6 m/s. What is the maximum height of the ball above the girl\'s hand?', '[490]', 26),
(108, NULL, 'A certain machine exerts a force of 200 N on a box whose mass is 30 Kg. The machine moves the box a distance of 20 m along a horizontal floor. What amount of work does the machine do on the box?', '[494]', 26),
(120, NULL, 'What is the group of Cl', '[540]', 27),
(121, NULL, 'Which atom acts as metal although this is non-metal?', '[543]', 27),
(122, NULL, 'In the periodic table, group Seven is called', '[547]', 27),
(123, NULL, 'Which pair acts as catalyst?', '[553]', 27),
(124, NULL, 'A 10-kilogram body initially moving with a velocity of 10 m/s makes a head-on collision\r\nwith a 15-kilogram body initially at rest. The two objects stick together. What is the\r\nvelocity of the combined system just after the collision?', '[558]', 26),
(125, NULL, 'If the resultant force acting on a body of constant mass is zero, the body\'s momentum is:', '[561]', 26),
(126, NULL, 'If the distance between two objects, each of mass \'M\', is tripled, the force of attraction between the two objects is:', '[563]', 26),
(127, NULL, 'A 10 Kg mass rests on a horizontal frictionless surface. A horizontal force of 5 N is applied to the mass. After the force has been applied for 1 second, the velocity of the mass is:', '[569]', 26),
(128, NULL, 'The time needed for a net force of 10 N to change the velocity of a 5 Kg mass by 3 meters/second is:', '[573]', 26),
(129, NULL, 'Two steel balls are at a distance S from one another. As the mass of one of the balls is doubled, the gravitational force of attraction between them is:', '[577]', 26),
(130, NULL, 'If the distance between the earth and moon were halved, the force of the attraction between them would be:', '[582]', 26),
(131, NULL, 'A ball falling vertically from rest for 3 seconds travels very nearly:', '[585]', 26),
(132, NULL, 'A car is moving along a straight horizontal road at a speed of 20 m/s. The brakes are applied and a constant force of 5000 N decelerates the car to a stop in 10 seconds. The mass of the car is:', '[590]', 26),
(133, NULL, 'A girl throws a 0.1 kilogram ball at a wall. The ball hits the wall perpendicularly with a velocity of 5 meters per second and then bounces straight back with a velocity of 4 m/s. The change in the momentum of the ball is:', '[593]', 26),
(134, NULL, 'A satellite of mass &quot;M&quot; is in orbit around the earth. If a second satellite of mass &quot;2M&quot; is to be placed in the same orbit, the second satellite must have a velocity which is:', '[596]', 26),
(135, NULL, 'After a projectile is fired horizontally near the earth\'s surface, the horizontal component of its velocity, neglecting any air resistance:', '[599]', 26),
(136, NULL, 'When a person stands on a scale in an elevator at rest, the scale reads 800 N. When the elevator is allowed to fall freely with acceleration of gravity, the scale reads:', '[603]', 26),
(137, NULL, 'We live in a world where some people are rich and some are ____.', '[610]', 28),
(138, NULL, 'There are people in the material world ____ are extremely rich.', '[612]', 28),
(139, NULL, 'It is often ____ that most of the rich people have inherited the wealth.', '[618]', 28),
(140, NULL, 'Out of 100 richest people on earth, only 23% of them ____ inherited wealth.', '[621]', 28),
(141, NULL, 'Only 23% of people possess inherited wealth, the rest of them ____ their fortune by themselves.', '[626]', 28),
(142, NULL, 'Warren Buffet is ____ these self-made Billionaires.', '[629]', 28),
(143, NULL, 'He was not born in a ____ house rather he belonged to a lower middle class family.', '[634]', 28),
(146, NULL, 'He bought his first stock of shares at the age of 11 and now he regrets that he started too ___.', '[645]', 28),
(145, NULL, 'He had the will power for making a fortune for ____.', '[639]', 28),
(147, NULL, '____ his wealth and success, he has a very simple life style.', '[647]', 28),
(148, NULL, 'He is among the top ____ as he has donated 85% of his wealth in charity.', '[]', 28),
(149, NULL, 'He never uses a private jet ____ although he is the owner of worldâ€™s largest private jet company.', '[658]', 28),
(150, NULL, 'When he ____ about his success, he said that he gives only two rules to his CEOâ€™s.', '[659]', 28),
(151, NULL, 'The sentence â€œnever lose the money of your clientâ€ is the example of _____', '[666]', 28),
(152, NULL, 'He arranged a meeting for half an hour but after meeting him, Bill Gates was so ____ that this meeting went on for 10 hours.', '[669]', 28),
(154, NULL, 'Which one is the irrational number?', '[675]', 29),
(155, NULL, 'How many prime numbers are there between 0 and 5?', '[681]', 29),
(156, NULL, 'How many even prime numbers are there in the number system?', '[686]', 29),
(157, NULL, 'Which one of the following is a square number?', '[689]', 29),
(159, NULL, 'What is the value of 5/0 ?', '[697]', 29),
(160, NULL, 'What is the value of 0.1 Ã—0.1 ?', '[701]', 29),
(161, NULL, 'What is 20% of 20?', '[704]', 29),
(162, NULL, 'What is the value of âˆš(-1)   ?', '[710]', 29),
(163, NULL, 'If x&lt;y and &lt;z , then what is the relation between x and z?', '[711]', 29),
(164, NULL, 'If x&lt;0 and &gt;0 , then which one is true?', '[718]', 29),
(165, NULL, 'What is the greatest common factor(GCF) of 6 and 8?', '[721]', 29),
(166, NULL, 'What is the least common multiple (LCM) of 8 and 12?', '[725]', 29),
(167, NULL, 'What is the next number of the series 1 , 4 , 9 , 16 , . . . . . . . .  ?', '[729]', 29),
(168, NULL, 'If ={x ,y} , then what is the number of subsets of A?', '[731]', 29),
(169, NULL, 'If A={0 ,1,2,3 } and ={2,3,6 } , then what is the value of A-B?', '[737]', 29);

-- --------------------------------------------------------

--
-- Table structure for table `as_quertion_csv`
--

CREATE TABLE `as_quertion_csv` (
  `qus_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `quertion` varchar(300) NOT NULL,
  `answer_id` varchar(255) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `as_result`
--

CREATE TABLE `as_result` (
  `re_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_qus` int(11) DEFAULT NULL,
  `c_ans` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `to_user_id` int(11) DEFAULT NULL,
  `to_c_ans` int(11) DEFAULT NULL,
  `is_comp` int(11) DEFAULT '0',
  `is_manual` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_result`
--

INSERT INTO `as_result` (`re_id`, `user_id`, `total_qus`, `c_ans`, `date`, `to_user_id`, `to_c_ans`, `is_comp`, `is_manual`) VALUES
(113, 55, 15, 7, '2019-09-10 06:06:06', 0, 0, 0, 0),
(115, 56, 15, 4, '2019-09-10 18:28:03', 0, 0, 0, 0),
(116, 58, 0, 0, '2019-09-10 18:30:20', 0, 0, 0, 0),
(118, 57, 0, 0, '2019-09-10 19:24:31', 0, 0, 0, 0),
(123, 59, 0, 0, '2019-09-11 03:27:05', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `as_subject`
--

CREATE TABLE `as_subject` (
  `sub_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_img` varchar(50) DEFAULT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `subject_limit` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_subject`
--

INSERT INTO `as_subject` (`sub_id`, `subject_name`, `subject_img`, `cat_id`, `subject_limit`) VALUES
(29, 'Mathematics', NULL, 0, 0),
(28, 'English', NULL, 0, 0),
(27, 'Chemistry', NULL, 0, 0),
(26, 'Physics', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `as_user`
--

CREATE TABLE `as_user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `input_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hsc_or_equ` varchar(31) DEFAULT NULL,
  `std_mail` varchar(255) DEFAULT NULL,
  `f_name` varchar(127) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `date_of_birth` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `point` int(11) DEFAULT '100',
  `subject_id` int(11) DEFAULT '0',
  `semester_id` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_user`
--

INSERT INTO `as_user` (`id`, `name`, `input_name`, `email`, `hsc_or_equ`, `std_mail`, `f_name`, `phone`, `date_of_birth`, `address`, `point`, `subject_id`, `semester_id`) VALUES
(52, 'James', 'test student', '1568095139', '123458', '', '', '1917222222222', NULL, '', 100, 21, 3),
(53, 'Logan', 'test student', '1568095254', '123459', '', '', '191555555555', NULL, '', 100, 21, 1),
(54, 'Benjamin', 'test student', '1568095283', '123465', '', '', '000000000000', NULL, '', 100, 21, 1),
(55, 'Lucas', 'test student', '1568095318', '123469', '', '', '111111111111', NULL, '', 107, 21, 2),
(56, 'Michael', 'test student', '1568095344', '123450', '', '', '2222222222222', NULL, '', 104, 22, 2),
(57, 'Alexander', 'test student', '1568095373', '123469', '', '', '1200000000000', NULL, '', 100, 23, 3),
(58, 'Ethan', 'test student', '1568095394', '123487', '', '', '230000000', NULL, '', 100, 23, 2),
(59, 'Test', 'test student', '1568172340', '123456', '', '', '456456', NULL, '', 100, 22, 1),
(51, 'William', 'test student', '1568095113', '123457', '', '', '1917111111', NULL, '', 100, 22, 1),
(49, 'Liam', 'test student', '1568095007', '123456', '', '', '0170000', NULL, '', 100, 22, 1),
(50, 'Noah', 'test student', '1568095076', '123455', '', '', '191700000000', NULL, '', 100, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `manual_result`
--

CREATE TABLE `manual_result` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `rerult_id` int(11) DEFAULT NULL,
  `c_ans` varchar(31) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qus_limit`
--

CREATE TABLE `qus_limit` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `limit_qus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qus_limit`
--

INSERT INTO `qus_limit` (`id`, `sub_id`, `program_id`, `limit_qus`) VALUES
(825, 29, 23, 5),
(826, 28, 23, 5),
(827, 27, 23, 5),
(828, 26, 23, 0),
(829, 29, 22, 5),
(830, 28, 22, 5),
(831, 27, 22, 0),
(832, 26, 22, 5),
(833, 29, 21, 5),
(834, 28, 21, 5),
(835, 27, 21, 0),
(836, 26, 21, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sa_result_de`
--

CREATE TABLE `sa_result_de` (
  `re_de_id` int(11) NOT NULL,
  `re_id` int(11) NOT NULL,
  `qus_id` int(11) NOT NULL,
  `correct_option` varchar(255) NOT NULL,
  `submit_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sa_result_de`
--

INSERT INTO `sa_result_de` (`re_de_id`, `re_id`, `qus_id`, `correct_option`, `submit_option`) VALUES
(109, 113, 164, '[718]', '[\"716\"]'),
(110, 113, 155, '[681]', '[\"681\"]'),
(111, 113, 160, '[701]', '[\"701\"]'),
(112, 113, 161, '[704]', '[\"704\"]'),
(113, 113, 157, '[689]', '[\"689\"]'),
(114, 113, 140, '[621]', '[\"620\"]'),
(115, 113, 147, '[647]', '[\"647\"]'),
(116, 113, 142, '[629]', '[\"630\"]'),
(117, 113, 150, '[659]', '[\"660\"]'),
(118, 113, 148, '[]', '[\"653\"]'),
(119, 113, 126, '[563]', '[\"563\"]'),
(120, 113, 131, '[585]', '[\"583\"]'),
(121, 113, 128, '[573]', '[\"572\"]'),
(122, 113, 127, '[569]', '[\"569\"]'),
(123, 113, 124, '[558]', '[\"556\"]'),
(124, 115, 169, '[737]', '[\"736\"]'),
(125, 115, 159, '[697]', '[\"697\"]'),
(126, 115, 167, '[729]', '[\"729\"]'),
(127, 115, 168, '[731]', '[\"733\"]'),
(128, 115, 161, '[704]', '[\"704\"]'),
(129, 115, 141, '[626]', '[\"623\"]'),
(130, 115, 149, '[658]', '[\"655\"]'),
(131, 115, 142, '[629]', '[\"627\"]'),
(132, 115, 137, '[610]', '[\"607\"]'),
(133, 115, 150, '[659]', '[\"659\"]'),
(134, 115, 134, '[596]', '[\"595\"]'),
(135, 115, 129, '[577]', '[\"576\"]'),
(136, 115, 124, '[558]', '[\"557\"]'),
(137, 115, 135, '[599]', '[\"602\"]'),
(138, 115, 127, '[569]', '[\"568\"]');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(255) DEFAULT NULL,
  `year` varchar(127) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`, `year`) VALUES
(1, 'Spring', '2019'),
(2, 'Fall', '2019'),
(3, 'Summer', '2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `as_category`
--
ALTER TABLE `as_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `as_guest`
--
ALTER TABLE `as_guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `as_option`
--
ALTER TABLE `as_option`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `as_option_csv`
--
ALTER TABLE `as_option_csv`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `as_quertion`
--
ALTER TABLE `as_quertion`
  ADD PRIMARY KEY (`qus_id`);

--
-- Indexes for table `as_quertion_csv`
--
ALTER TABLE `as_quertion_csv`
  ADD PRIMARY KEY (`qus_id`);

--
-- Indexes for table `as_result`
--
ALTER TABLE `as_result`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `as_subject`
--
ALTER TABLE `as_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `as_user`
--
ALTER TABLE `as_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_result`
--
ALTER TABLE `manual_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qus_limit`
--
ALTER TABLE `qus_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sa_result_de`
--
ALTER TABLE `sa_result_de`
  ADD PRIMARY KEY (`re_de_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `as_category`
--
ALTER TABLE `as_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `as_guest`
--
ALTER TABLE `as_guest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `as_option`
--
ALTER TABLE `as_option`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=739;

--
-- AUTO_INCREMENT for table `as_option_csv`
--
ALTER TABLE `as_option_csv`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `as_quertion`
--
ALTER TABLE `as_quertion`
  MODIFY `qus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `as_quertion_csv`
--
ALTER TABLE `as_quertion_csv`
  MODIFY `qus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `as_result`
--
ALTER TABLE `as_result`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `as_subject`
--
ALTER TABLE `as_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `as_user`
--
ALTER TABLE `as_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `manual_result`
--
ALTER TABLE `manual_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `qus_limit`
--
ALTER TABLE `qus_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=837;

--
-- AUTO_INCREMENT for table `sa_result_de`
--
ALTER TABLE `sa_result_de`
  MODIFY `re_de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
