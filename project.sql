-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 01:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `cnum` varchar(20) NOT NULL,
  `bday` date NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'superadmin=0 admin=1 company=2 client=3',
  `verification_state` int(11) NOT NULL DEFAULT 0 COMMENT '0 = not verified\r\n1 = semi verified\r\n2 = verified',
  `avatar` varchar(50) NOT NULL DEFAULT 'avatar_default.png',
  `department` varchar(50) NOT NULL DEFAULT 'none',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `degree_title` varchar(255) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `school_year_attended` varchar(255) DEFAULT NULL,
  `achievement` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(11) NOT NULL DEFAULT 0 COMMENT '0 = not verified , 1 = verifed by admin',
  `prof_id_image` varchar(255) DEFAULT NULL,
  `last_updated` varchar(255) DEFAULT NULL,
  `job_area_id` varchar(50) DEFAULT NULL COMMENT 'For company/job seeker only in their registration. the job area that has been selected will be stored here its id',
  `middle_name` varchar(255) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `civil_status` varchar(100) DEFAULT NULL,
  `tin_number` varchar(255) DEFAULT NULL,
  `disability` varchar(255) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `firstname`, `lastname`, `cnum`, `bday`, `age`, `address`, `email`, `password`, `type`, `verification_state`, `avatar`, `department`, `created_at`, `facebook`, `linkedin`, `instagram`, `degree_title`, `school_name`, `school_address`, `school_year_attended`, `achievement`, `updated_at`, `status_id`, `prof_id_image`, `last_updated`, `job_area_id`, `middle_name`, `suffix`, `gender`, `religion`, `civil_status`, `tin_number`, `disability`, `height`) VALUES
(83, 'Administrator', 'Administrator', '09178680239', '1992-03-03', 32, 'Makati', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2, 'avatar_fe9fc289c3ff0af142b6d3bead98a923.png', 'none', '2024-03-07 08:49:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 15:52:34', 1, NULL, '2024-03-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'Company', 'Company', '09178680238', '1991-03-03', 17, 'Makati', 'company@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 2, 'avatar_68d30a9594728bc39aa24be94b319d21.jpg', 'none', '2024-03-07 08:53:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 03:11:15', 1, '../../assets/images/f4fff3b18323d772115a4b764543e2e9.jpg', NULL, '17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Jobseeker', 'Jobseeker', '09178680239', '1991-03-03', 17, 'Makati', 'jobseeker@gmail.com', '36c03ad6b09045831b7a4ecddeca3131', 3, 2, 'avatar_3ef815416f775098fe977004015c6193.jpg', 'none', '2024-03-07 08:56:35', 'test', 'test', 'test', 'BS IT', 'School Name', 'Makati', '5', 'Bachelors degree', '2024-03-23 15:55:37', 1, '../../assets/images/fd296e505aff16128681ba643f5214f1.jpg', NULL, '17', 'B.', 'Sr', 'Male', 'Sr', 'Single', '00999-11234-552321', 'Visual', '130cm'),
(89, 'Superadmin', 'Superadmin', '09178680239', '1992-03-03', 32, 'Makati', 'superadmin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 2, 'avatar_7647966b7343c29048673252e490f736.jpg', 'none', '2024-03-07 08:49:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 15:40:03', 1, NULL, '2024-03-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'angelo', 'redruco', '09276384236', '2001-10-26', 22, '#05 macopa panam village post proper southside makati city NCR', 'angelo@gmail.com', 'c189a14290793bdc43b77ffcf357694a', 3, 2, 'avatar_f0935e4cd5920aa6c7c996a5ee53a70f.jpg', 'none', '2024-03-23 08:45:58', 'TESTING', 'TESTING', 'TESTING', 'TESTING', 'TESTING', 'TETSTING', '5', 'TESTING', '2024-03-24 15:32:03', 1, '../../assets/images/ecca8b0e15187ecb9553d915b11973bc.png', NULL, '17', 'n', 'n/a', 'Male', 'roman catholic', 'Single', 'N/A', 'Hearing', '172'),
(107, 'femela', 'Manay', '09518871899', '2001-10-27', 22, '987 santol street rizal makati city Metro Manila', 'femela@gmail.com', 'c189a14290793bdc43b77ffcf357694a', 3, 0, 'avatar_default.png', 'none', '2024-03-24 03:39:40', NULL, NULL, NULL, 'TESTING', 'TESTING', 'TESTING', '2', 'TESTING', '2024-03-24 03:41:37', 1, '../../assets/images/5a3a6151f60f04b331748fb1d5ccb75a.png', NULL, '16', 'M', 'n/a', 'Female', 'rIglesia ni Cristo', 'Single', 'n/a', 'Mental', '156');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicants`
--

CREATE TABLE `tbl_applicants` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `applicantsid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=pending\r\n2=hired\r\n3=decline',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archieve` int(11) DEFAULT 0,
  `set_time_schedule` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status_schedule` varchar(45) DEFAULT NULL,
  `isdisplayed` varchar(10) DEFAULT '1' COMMENT '1 = displayed, 0 = hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_applicants`
--

INSERT INTO `tbl_applicants` (`id`, `companyid`, `applicantsid`, `jobid`, `status`, `created_at`, `is_archieve`, `set_time_schedule`, `remarks`, `status_schedule`, `isdisplayed`) VALUES
(43, 32, 85, 39, 2, '2024-03-20 12:34:09', 0, '2024-03-21 12:39:00', 'checksssssssssssss', 'on goingsssssssssssss', '1'),
(44, 46, 106, 44, 2, '2024-03-23 16:06:14', 0, '2024-03-26 04:12:00', 'checking', 'contact us on blablabla', '1'),
(45, 32, 106, 41, 1, '2024-03-23 16:42:29', 0, NULL, NULL, NULL, '1'),
(46, 32, 106, 34, 1, '2024-03-23 16:51:28', 0, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `c_logo` varchar(70) NOT NULL DEFAULT 'company_logo_default.png',
  `c_banner` varchar(70) NOT NULL DEFAULT 'company_banner_default.png',
  `c_name` varchar(50) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_cnum` varchar(20) NOT NULL,
  `c_position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `c_doc1` text DEFAULT NULL,
  `c_doc2` text DEFAULT NULL,
  `c_doc3` text DEFAULT NULL,
  `c_doc4` text DEFAULT NULL,
  `c_doc5` text DEFAULT NULL,
  `c_doc6` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `userid`, `c_logo`, `c_banner`, `c_name`, `c_address`, `c_cnum`, `c_position`, `department`, `created_at`, `c_doc1`, `c_doc2`, `c_doc3`, `c_doc4`, `c_doc5`, `c_doc6`) VALUES
(32, 84, 'company_logo_68d30a9594728bc39aa24be94b319d21.png', 'company_banner_68d30a9594728bc39aa24be94b319d21.png', 'Company', 'Makati', '09178680239', 'CEO', '', '2024-03-07 08:53:34', '606699596aa87ed4c5d587595fdd2e2f.pdf', '5b475d8f43eef9cd79f1915500927eb1.png', '948ae0f2ecc81197852fca05f1c6056e.png', 'adb0513c4d8dd6ffba25587fd2f51bb5.png', 'fc512bd0c5859c954b1612dc09c98e1b.jpg', '3c39e5c6e06208719b418a2948f2903a.png'),
(46, 105, 'company_logo_65b9eea6e1cc6bb9f0cd2a47751a186f.png', 'company_banner_default.png', 'CGI PHILIPPINES', 'TAGUIG CITY', '09518887189', 'HR MANAGER', '', '2024-03-23 00:16:45', 'bd7365b8ea6bea3a0dfc914594bf50fc.pdf', 'bd7365b8ea6bea3a0dfc914594bf50fc.pdf', 'bd7365b8ea6bea3a0dfc914594bf50fc.pdf', 'bd7365b8ea6bea3a0dfc914594bf50fc.pdf', 'bd7365b8ea6bea3a0dfc914594bf50fc.pdf', 'bd7365b8ea6bea3a0dfc914594bf50fc.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_reports`
--

CREATE TABLE `tbl_company_reports` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `reported_by` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobareas`
--

CREATE TABLE `tbl_jobareas` (
  `id` int(11) NOT NULL,
  `Location` text DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp(),
  `admin_id` varchar(50) DEFAULT NULL,
  `title_area` text DEFAULT NULL,
  `logo_area` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobareas`
--

INSERT INTO `tbl_jobareas` (`id`, `Location`, `Description`, `Date`, `admin_id`, `title_area`, `logo_area`) VALUES
(16, 'Visayas', 'Descriptions', '2024-03-07 08:50:11', '', 'Job Around Visayas', 'login_bg.png'),
(17, 'Luzon', 'Descriptions', '2024-03-07 08:50:32', '83', 'Job Around Luzon', 'taguig.png'),
(18, 'Region 1', 'Description', '2024-03-07 12:52:03', '86', 'Mindanao Job Fair', '430965767_739690038273791_5255232733961386874_n.jpg'),
(19, 'Carmona', 'Description', '2024-03-17 05:50:06', '88', 'Carmona', '430965767_739690038273791_5255232733961386874_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `j_name` varchar(50) NOT NULL,
  `j_age` int(11) NOT NULL,
  `j_min` decimal(50,0) NOT NULL,
  `j_max` decimal(50,0) NOT NULL,
  `j_currency_symbol` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `j_description` text NOT NULL,
  `j_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `j_pwd_type` varchar(255) DEFAULT NULL,
  `j_job_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `userid`, `j_name`, `j_age`, `j_min`, `j_max`, `j_currency_symbol`, `j_description`, `j_created_at`, `j_pwd_type`, `j_job_category`) VALUES
(34, 84, 'Senior Software Developer In Luzon', 0, 25000, 35000, '₱', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2024-03-07 08:54:39', 'physical', 'Common'),
(35, 87, 'Senior Software Developer In Visayas', 0, 25, 25, '₱', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n', '2024-03-07 23:50:20', NULL, 'Common'),
(37, 84, 'Electrician', 0, 25000, 50000, '₱', '<p>House electrician54</p>\r\n', '2024-03-18 19:18:29', 'hearing', 'Electrical'),
(39, 84, 'Customer Service Associate I No Experience I Win 5', 0, 1200, 2000, '₱', '<h2>Full job description</h2>\r\n\r\n<p><strong>Get a Chance to win 50,000 Pesos when you get hired between February 5 and April 5!</strong></p>\r\n\r\n<p>Transcom is looking for talented individuals like you to join our awesome team! Be a&nbsp;<strong>Customer Service Representative (CSR)</strong>&nbsp;for our&nbsp;<strong>Transcom</strong>&nbsp;<strong>Iloilo&nbsp;</strong>site. This role will focus on driving customer satisfaction by fielding inquiries, addressing pain points and maintaining extensive product knowledge.</p>\r\n\r\n<p><strong>What&#39;s in it for YOU</strong></p>\r\n\r\n<p>Driven by our &quot;Malasakit&#39;&#39; culture, we make certain that our team members are well-cared for. Hence we are proving these employee benefits, which you&#39;ll be able to utilize once you join our team!</p>\r\n\r\n<ul>\r\n	<li>Day 1 HMO</li>\r\n	<li>Meal &amp; Transportation Allowance</li>\r\n	<li>Rice Subsidy</li>\r\n	<li>Clothing Allowance</li>\r\n	<li>24/7 Teleconsult</li>\r\n	<li>Free Psychologist Consultation</li>\r\n	<li>In-house &amp; Online Pharmacy</li>\r\n	<li>Scholarship Program</li>\r\n	<li>Retirement Fund</li>\r\n	<li>Free Meal &amp; Medicine (through Transcom&rsquo;s Tap Card Rewards)</li>\r\n	<li>Loyalty Incentives</li>\r\n	<li>Accidental &amp; Life Insurance</li>\r\n	<li>Free Shuttle Service</li>\r\n</ul>\r\n\r\n<p><strong>What we are looking for:</strong></p>\r\n\r\n<ul>\r\n	<li>Possess a positive attitude.</li>\r\n	<li>Have very good interpersonal skills (both written and oral)</li>\r\n	<li>Take ownership for quality, competence, and commitment.</li>\r\n	<li>Enjoy/thrive on autonomy within the franchise framework and be results focused.</li>\r\n	<li>Be highly motivated and prepared to work hard.</li>\r\n	<li>Have high personal energy and enjoy a lively environment.</li>\r\n	<li>Be highly flexible and welcome change/improvements.</li>\r\n</ul>\r\n\r\n<p><strong>What Life at Transcom is like</strong></p>\r\n\r\n<p>At Transcom, we&rsquo;re relentlessly committed- to our clients and each other. Every day, someone starts their journey with Transcom. Taking the potential they have today, and turning it into skills for the future. Getting recognized for working hard, being a team player, and supporting others. Championing positive, lasting change in their teams and communities. That&rsquo;s just how we are at Transcom. Here we care, and root for each other. You&rsquo;re included, just as you are, from day one. And with the right mindset, there&rsquo;s no end to how far we can go together.</p>\r\n\r\n<p>We are highly driven by our &quot;Malasakit&quot; culture. Transcom, in its very core, is all about an inclusive team that is focused on people. It all comes down to setting the bar for dignity, equality, and respect. It means that each one takes part in proactively shaping, cultivating, and building the company we want to work and live in. This is why genuine concern is so vital to us.</p>\r\n\r\n<p><em><strong>Visit us at 3A Ground Floor, One Global Center corner Megaworld Ave. &amp; Cyber Street, Iloilo Business Park, Iloilo City from 9:00 AM-5:00 PM every Monday- Friday</strong></em></p>\r\n\r\n<p>Job Types: Full-time, Permanent</p>\r\n\r\n<p>Salary: Php18,000.00 - Php25,000.00 per month</p>\r\n\r\n<p>Benefits:</p>\r\n\r\n<ul>\r\n	<li>Health insurance</li>\r\n	<li>Life insurance</li>\r\n	<li>Opportunities for promotion</li>\r\n	<li>Paid training</li>\r\n</ul>\r\n\r\n<p>Schedule:</p>\r\n\r\n<ul>\r\n	<li>Rotational shift</li>\r\n</ul>\r\n\r\n<p>Supplemental pay types:</p>\r\n\r\n<ul>\r\n	<li>13th month salary</li>\r\n	<li>Overtime pay</li>\r\n	<li>Performance bonus</li>\r\n</ul>\r\n', '2024-03-20 12:26:15', 'autoimmune', 'Programming'),
(40, 84, 'Customer Service Representative', 0, 2000, 21200, '₱', '<h2>Full job description</h2>\r\n\r\n<p>LOCATION: Pampanga, PH JOB TYPE: Full-Time PAY TYPES: Hourly POSITION OVERVIEW:</p>\r\n\r\n<p>...</p>\r\n\r\n<p><br />\r\n-:</p>\r\n\r\n<p>...</p>\r\n\r\n<p><br />\r\nPOSITION RESPONSIBILITIES:</p>\r\n\r\n<p><strong><em>WHAT DOES SOMEONE IN THIS ROLE ACTUALLY DO?</em></strong></p>\r\n\r\n<p>This position supports customer service, technical support, and customer sales interactions. It requires you to interact with hundreds of customers each week across the country to resolve support issues, sell new products and services, and ensure a best-in-class customer experience.</p>\r\n\r\n<p><br />\r\nIn addition to providing exceptional service, you will need to be a confident, fully engaged team player dedicated to bringing a positive and enthusiastic outlook to work each day.</p>\r\n\r\n<p><br />\r\n<strong>Essential Duties</strong></p>\r\n\r\n<ul>\r\n	<li>Handle inbound and outbound contacts in a courteous, timely, and professional manner</li>\r\n	<li>Ensure first call resolution through problems solving and effective call handling</li>\r\n	<li>Research systems to find missing information as applicable; coordinate with other departments to resolve issues when needed</li>\r\n	<li>Accurately document and process customer claims in appropriate systems</li>\r\n	<li>Utilize knowledge base and training to accurately answer customer questions while following all required scripts, policies, and procedures</li>\r\n	<li>Comply with requirements surrounding confidential information and personal information</li>\r\n	<li>Escalate customer issues to the appropriate staff and managerial for resolution as needed</li>\r\n	<li>Attend meetings and training and review all new training material to stay up-to-date on changes to program knowledge, systems, and processes</li>\r\n	<li>Adhere to all attendance and work schedule requirements</li>\r\n</ul>\r\n\r\n<p>CANDIDATE QUALIFICATIONS:</p>\r\n\r\n<p><strong><em>WONDER IF YOU ARE A GOOD FIT?</em></strong></p>\r\n\r\n<p>We provide all new employees with world-class training, so all positive, driven, and confident applicants are encouraged to apply. This position relies on building relationships and turning the knowledge you gain in training into customer wins. Ideal candidates for this position are highly motivated, energetic, and dedicated.</p>\r\n\r\n<p><br />\r\n<strong>Qualifications</strong></p>\r\n\r\n<ul>\r\n	<li>Must be 18 years of age or older</li>\r\n	<li>High school diploma or equivalent</li>\r\n	<li>Excellent organizational, written, and oral communication skills</li>\r\n	<li>The ability to type swiftly and accurately (20+ words a minute)</li>\r\n	<li>Basic knowledge of Microsoft Office Suite (Excel, PowerPoint, Word, Outlook)</li>\r\n	<li>Basic understanding of Windows operating system</li>\r\n	<li>Highly reliable with the ability to maintain regular attendance and punctuality</li>\r\n	<li>The ability to evaluate, troubleshoot, and follow-up on customer issues</li>\r\n	<li>An aptitude for conflict resolution, problem-solving, and negotiation</li>\r\n	<li>Must be customer service oriented (empathetic, responsive, patient, and conscientious)</li>\r\n	<li>Ability to multi-task, stay focused, and self-manage</li>\r\n	<li>Strong team orientation and customer focus</li>\r\n	<li>The ability to thrive in a fast-paced environment where change and ambiguity prevalent</li>\r\n	<li>Excellent interpersonal skills and the ability to build relationships with your team and customers</li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong>Preferred (Not Required)</strong></p>\r\n\r\n<ul>\r\n	<li>One (1) year of experience in customer service, technical support, inside sales, back-office, chat, or administrative support in a contact center environment</li>\r\n	<li>State or Federal work experience</li>\r\n</ul>\r\n\r\n<p>CONDITIONS OF EMPLOYMENT:</p>\r\n\r\n<ul>\r\n	<li>Must be authorized to work in their country of residence</li>\r\n	<li>Must be willing to submit up to a LEVEL II background and/or security investigation with a fingerprint. Job offers are contingent on background/security investigation results</li>\r\n	<li>Must be willing to submit to drug screening. Job offers are contingent on drug screening results.</li>\r\n</ul>\r\n\r\n<p>PHYSICAL REQUIREMENTS:</p>\r\n\r\n<p>This job operates in a professional office environment. While performing the duties of this job, the employee will be largely sedentary and will be required to sit/stand for long periods while using a computer and telephone headset. The employee will be regularly required to operate a computer and other office equipment, including a phone, copier, and printer. The employee may occasionally be required to move about the office to accomplish tasks; reach in any direction; raise or lower objects, move objects from place to place, hold onto objects, and move or exert force up to forty (40) pounds.</p>\r\n\r\n<p>REASONABLE ACCOMMODATION:</p>\r\n\r\n<p>It is the policy of MCI and affiliates to provide reasonable accommodation when requested by a qualified applicant or employee with a disability unless such accommodation would cause undue hardship. The policy regarding requests for reasonable accommodation applies to all aspects of employment. If reasonable accommodation is needed, please contact Human Resources.</p>\r\n\r\n<p>DIVERSITY AND EQUALITY:</p>\r\n\r\n<p>At MCI and its subsidiaries, we embrace differences and believe diversity is a benefit to our employees, our company, our customers, and our community. All aspects of employment at MCI are based solely on a person&#39;s merit and qualifications. MCI maintains a work environment free from discrimination, one where employees are treated with dignity and respect. All employees share in the responsibility for fulfilling MCI&#39;s commitment to a diverse and equal opportunity work environment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<em>MCI does not discriminate against any employee or applicant on the basis of age, ancestry, color, family or medical care leave, gender identity or expression, genetic information, marital status, medical condition, national origin, physical or mental disability, political affiliation, protected veteran status, race, religion, sex (including pregnancy), sexual orientation, or any other characteristic protected by applicable laws, regulations, and ordinances. MCI will consider for employment qualified applicants with criminal histories in a manner consistent with local and federal requirements.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<em>MCI will not tolerate discrimination or harassment based on any of these characteristics. We adhere to these principles in all aspects of employment, including recruitment, hiring, training, compensation, promotion,&nbsp;</em><em>benefits</em><em>, social and recreational programs, and&nbsp;</em><em>discipline</em><em>. In addition, it is the policy of MCI to provide reasonable accommodation to qualified employees who have protected disabilities to the extent required by applicable laws, regulations, and ordinances where an employee works.</em></p>\r\n\r\n<p>ABOUT MCI (PARENT COMPANY):</p>\r\n\r\n<p>MCI helps customers take on their CX and DX challenges differently, creating industry-leading solutions that deliver exceptional experiences and drive optimal performance. MCI assists companies with business process outsourcing, staff augmentation, contact center customer services, and IT Services needs by providing general and specialized hosting, software, staff, and services.</p>\r\n\r\n<p><br />\r\nIn 2019 Marlowe Companies Inc. (MCI) was named by Inc. Magazine as Iowa&rsquo;s Fastest Growing Company in the State of Iowa and was named the 452nd Fastest Growing Privately Company in the USA, making the coveted top 500 for the first time. MCI&rsquo;s subsidiaries had previously made Inc. Magazine&#39;s List of Fastest-Growing Companies 15 times respectively. MCI has fifteen business process outsourcing service delivery facilities in Iowa, Georgia, Florida, Texas, Massachusetts, New Hampshire, South Dakota, New Mexico, California, Kansas, and Nova Scotia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Driving modernization through digitalization, MCI ensures clients do more for less. MCI is the holding company for a diverse lineup of tech-enabled business services operating companies. MCI organically grows, acquires, and operates companies that have a synergistic products and services portfolios, including but not limited to Automated Contact Center Solutions (ACCS), customer contact management, IT Services (IT Schedule 70), and Temporary and Administrative Professional Staffing (TAPS Schedule 736), Business Process Management (BPM), Business Process Outsourcing (BPO), Claims Processing, Collections, Customer Experience Provider (CXP), Customer Service, Digital Experience Provider (DXP), Account Receivables Management (ARM), Application Software Development, Managed Services, and Technology Services, to mid-market, Federal &amp; enterprise partners. MCI now employs 10,000+ talented individuals with 150+ diverse North American client partners across the following MCI brands: GravisApps, Mass Markets, MCI Federal Services (MFS), The Sydney Call Center, OnBrand24, and Valor Intelligent Processing (VIP).</p>\r\n\r\n<p>DISCLAIMER:</p>\r\n\r\n<p>The purpose of the above job description is to provide potential candidates with a general overview of the role. It&#39;s not an all-inclusive list of the duties, responsibilities, skills, and qualifications required for the job. You may be asked by your supervisors or managers to perform other duties. You will be evaluated in part based upon your performance of the tasks listed in this job description.</p>\r\n\r\n<p><br />\r\nThe employer has the right to revise this job description at any time. This job description is not a contract for employment, and either you or the employer may terminate employment at any time, for any reason.</p>\r\n\r\n<p>REGARDING COVID-19:</p>\r\n\r\n<p>As an employer supporting critical Federal, State, Provincial, and Commercial clients, we have taken steps to ensure that we remain operational while taking every precaution possible to prevent the spread of COVID-19 and keep our employees safe.</p>\r\n\r\n<p><br />\r\nMeasures include social distancing for those working on-site, frequent deep cleaning and disinfecting of workstations and common areas, daily contactless temperature checks for those essential employees working on-site, travel policies limiting travel and mandatory quarantine, reporting and quarantine processes and policies for those exposed, and requesting masks to be worn when on-site employees are not at their workstation.</p>\r\n\r\n<p><br />\r\nFor more information on MCI&rsquo;s response to COVID-19 please visit www.mci.world/covid-19<em>.</em></p>\r\n', '2024-03-20 12:26:48', 'mobility', 'Programming'),
(41, 84, 'Vehicle Sales Consultant', 0, 20011, 2333, '₱', '<h2>Full job description</h2>\r\n\r\n<p>New vehicle brand with extremely competitive vehicle line up to be launched in Davao this April! The company is in need of goal-oriented, passionate and brilliant individuals who display a penchant for sales and is willing to learn all about automotive selling.</p>\r\n\r\n<p>QUALIFICATIONS</p>\r\n\r\n<ul>\r\n	<li>Bachelor&rsquo;s degree in Business Administration or Management or related course</li>\r\n	<li>Prior experience in automotive industry is an advantage</li>\r\n	<li>A valid Drivers License is an advantage</li>\r\n	<li>With at least 1 year related working experience</li>\r\n	<li>Strong interpersonal and communication skills</li>\r\n	<li>Goal-driven and dedicated in pursuing excellence in product knowledge, managing sales leads and developing sales strategies</li>\r\n	<li>A good team player who works well with associates within his/her department and the company in general</li>\r\n	<li>Develops and sustains relationships with customers and is always oriented towards providing total customer satisfaction in all areas of service</li>\r\n</ul>\r\n\r\n<p>JOB DESCRIPTION</p>\r\n\r\n<ul>\r\n	<li>Generate sales leads through marketing on social media, cold calls, referrals and dealer-led sales activities</li>\r\n	<li>Establish awareness of the vehicle brand in his/her area and serves as primary point of contact for all queries</li>\r\n	<li>Produce management-approved sales quotes for all potential customers</li>\r\n	<li>Must be updated and knowledgeable about all vehicle products, ancillary business products (financing, insurance, accessories) and dealership policies</li>\r\n	<li>Must study about pricing and features of units of other brands (competitors) in order to more effectively sell and handle customer queries</li>\r\n	<li>Handles sales releases including the preparation of all sales and financing documents (when applicable), ensures the readiness of the vehicle itself, all important documents and gate passes/approvals with relevant departments</li>\r\n</ul>\r\n\r\n<p>Job Type: Full-time</p>\r\n\r\n<p>Salary: From Php12,000.00 per month</p>\r\n\r\n<p>Schedule:</p>\r\n\r\n<ul>\r\n	<li>8 hour shift</li>\r\n</ul>\r\n\r\n<p>Supplemental pay types:</p>\r\n\r\n<ul>\r\n	<li>Commission pay</li>\r\n</ul>\r\n\r\n<p>Experience:</p>\r\n\r\n<ul>\r\n	<li>Sales Consultant: 1 year (Preferred)</li>\r\n</ul>\r\n\r\n<p>License/Certification:</p>\r\n\r\n<ul>\r\n	<li>Driver&#39;s License (Preferred)</li>\r\n</ul>\r\n\r\n<p>Ability to Commute:</p>\r\n\r\n<ul>\r\n	<li>Davao City (Required)</li>\r\n</ul>\r\n\r\n<p>Ability to Relocate:</p>\r\n\r\n<ul>\r\n	<li>Davao City: Relocate before starting work (Required)</li>\r\n</ul>\r\n\r\n<p>Expected Start Date: 03/18/2024</p>\r\n', '2024-03-20 12:27:18', 'physical', 'Electrical'),
(42, 84, 'Sales Representative', 0, 20000, 2000, '₱', '<h2>Full job description</h2>\r\n\r\n<p>LOCATION: Pampanga, PH JOB TYPE: Full-Time PAY TYPES: Hourly POSITION OVERVIEW:</p>\r\n\r\n<p><strong><em>SALES REPRESENTATIVE</em></strong></p>\r\n\r\n<p>We are looking for sales representatives to support various projects while representing some of the most recognizable brands in the world. In this role, you will make outbound calls to prospective customers and upsell existing ones while providing customers information on client products and services. If you believe you have a positive and persuasive personality and have the drive to succeed, this is the career for you! With our industry-leading training program, you are sure to thrive and grow.</p>\r\n\r\n<p><br />\r\n<em>To be considered for this position, you must complete a full application on our company careers page, including screening questions and a brief pre-employment test.</em></p>\r\n\r\n<p>-:</p>\r\n\r\n<p>...</p>\r\n\r\n<p><br />\r\nPOSITION RESPONSIBILITIES:</p>\r\n\r\n<p><strong><em>WHAT DOES SOMEONE IN THIS ROLE ACTUALLY DO?</em></strong></p>\r\n\r\n<p>This role requires you to interact with hundreds of customers each week across the country to resolve support issues, sell new products and services, and ensure a best-in-class customer experience. In addition to being the best in the business when it comes to customer satisfaction, you will need to be a confident, fully engaged team player who is dedicated to bringing a positive and enthusiastic outlook to work each day.</p>\r\n\r\n<p><br />\r\n<strong>Essential Duties</strong></p>\r\n\r\n<ul>\r\n	<li>Handle inbound and outbound contacts in a courteous, timely, and professional manner</li>\r\n	<li>Utilize knowledge base and training to accurately answer customer questions and sell appropriate products and services</li>\r\n	<li>Listen to customers, understand their needs, and resolve customer issues</li>\r\n	<li>Research systems to find missing information; coordinate with other departments to resolve issues as applicable</li>\r\n	<li>Utilize systems and technology to complete account management tasks</li>\r\n	<li>Accurately document and process customer orders in appropriate systems</li>\r\n	<li>Follow all required scripts, policies, and procedures</li>\r\n	<li>Comply with requirements surrounding confidential information and personal information</li>\r\n	<li>Escalate customer issues to the appropriate staff and managerial for resolution as needed</li>\r\n	<li>Attend meetings and training and review all new training material to stay up-to-date on changes to program knowledge, systems, and processes</li>\r\n	<li>Adhere to all attendance and work schedule requirements</li>\r\n</ul>\r\n\r\n<p>CANDIDATE QUALIFICATIONS:</p>\r\n\r\n<p><strong><em>WONDER IF YOU ARE A GOOD FIT?</em></strong></p>\r\n\r\n<p>We provide all new employees with world-class training, so all positive, driven, and confident applicants are encouraged to apply. This position relies on building relationships and turning the knowledge you gain in training into customer wins. Ideal candidates for this position are highly motivated, energetic, and dedicated.</p>\r\n\r\n<p><br />\r\n<strong>Qualifications</strong></p>\r\n\r\n<ul>\r\n	<li>Must be 18 years of age or older</li>\r\n	<li>High school diploma or equivalent</li>\r\n	<li>Excellent organizational, written, and oral communication skills</li>\r\n	<li>The ability to type swiftly and accurately (20+ words a minute)</li>\r\n	<li>Basic knowledge of Microsoft Office Suite (Excel, PowerPoint, Word, Outlook)</li>\r\n	<li>Basic understanding of Windows operating system</li>\r\n	<li>Highly reliable with the ability to maintain regular attendance and punctuality</li>\r\n	<li>The ability to evaluate, troubleshoot, and follow-up on customer issues</li>\r\n	<li>An aptitude for conflict resolution, problem-solving, and negotiation</li>\r\n	<li>Must be customer service oriented (empathetic, responsive, patient, and conscientious)</li>\r\n	<li>Ability to multi-task, stay focused, and self-manage</li>\r\n	<li>Strong team orientation and customer focus</li>\r\n	<li>The ability to thrive in a fast-paced environment where change and ambiguity prevalent</li>\r\n	<li>Excellent interpersonal skills and the ability to build relationships with your team and customers</li>\r\n</ul>\r\n\r\n<p><br />\r\n<strong>Preferred (Not Required)</strong></p>\r\n\r\n<ul>\r\n	<li>One (1) year of experience in customer service, technical support, inside sales, back-office, chat, or administrative support in a contact center environment</li>\r\n	<li>State or Federal work experience</li>\r\n</ul>\r\n\r\n<p>CONDITIONS OF EMPLOYMENT:</p>\r\n\r\n<ul>\r\n	<li>Must be authorized to work in their country of residence</li>\r\n	<li>Must be willing to submit up to a LEVEL II background and/or security investigation with a fingerprint. Job offers are contingent on background/security investigation results</li>\r\n	<li>Must be willing to submit to drug screening. Job offers are contingent on drug screening results.</li>\r\n</ul>\r\n\r\n<p>PHYSICAL REQUIREMENTS:</p>\r\n\r\n<p>This job operates in a professional office environment. While performing the duties of this job, the employee will be largely sedentary and will be required to sit/stand for long periods while using a computer and telephone headset. The employee will be regularly required to operate a computer and other office equipment, including a phone, copier, and printer. The employee may occasionally be required to move about the office to accomplish tasks; reach in any direction; raise or lower objects, move objects from place to place, hold onto objects, and move or exert force up to forty (40) pounds.</p>\r\n\r\n<p>REASONABLE ACCOMMODATION:</p>\r\n\r\n<p>It is the policy of MCI and affiliates to provide reasonable accommodation when requested by a qualified applicant or employee with a disability unless such accommodation would cause undue hardship. The policy regarding requests for reasonable accommodation applies to all aspects of employment. If reasonable accommodation is needed, please contact Human Resources.</p>\r\n\r\n<p>DIVERSITY AND EQUALITY:</p>\r\n\r\n<p>At MCI and its subsidiaries, we embrace differences and believe diversity is a benefit to our employees, our company, our customers, and our community. All aspects of employment at MCI are based solely on a person&#39;s merit and qualifications. MCI maintains a work environment free from discrimination, one where employees are treated with dignity and respect. All employees share in the responsibility for fulfilling MCI&#39;s commitment to a diverse and equal opportunity work environment.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<em>MCI does not discriminate against any employee or applicant on the basis of age, ancestry, color, family or medical care leave, gender identity or expression, genetic information, marital status, medical condition, national origin, physical or mental disability, political affiliation, protected veteran status, race, religion, sex (including pregnancy), sexual orientation, or any other characteristic protected by applicable laws, regulations, and ordinances. MCI will consider for employment qualified applicants with criminal histories in a manner consistent with local and federal requirements.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<em>MCI will not tolerate discrimination or harassment based on any of these characteristics. We adhere to these principles in all aspects of employment, including recruitment, hiring, training, compensation, promotion,&nbsp;</em><em>benefits</em><em>, social and recreational programs, and&nbsp;</em><em>discipline</em><em>. In addition, it is the policy of MCI to provide reasonable accommodation to qualified employees who have protected disabilities to the extent required by applicable laws, regulations, and ordinances where an employee works.</em></p>\r\n\r\n<p>ABOUT MCI (PARENT COMPANY):</p>\r\n\r\n<p>MCI helps customers take on their CX and DX challenges differently, creating industry-leading solutions that deliver exceptional experiences and drive optimal performance. MCI assists companies with business process outsourcing, staff augmentation, contact center customer services, and IT Services needs by providing general and specialized hosting, software, staff, and services.</p>\r\n\r\n<p><br />\r\nIn 2019 Marlowe Companies Inc. (MCI) was named by Inc. Magazine as Iowa&rsquo;s Fastest Growing Company in the State of Iowa and was named the 452nd Fastest Growing Privately Company in the USA, making the coveted top 500 for the first time. MCI&rsquo;s subsidiaries had previously made Inc. Magazine&#39;s List of Fastest-Growing Companies 15 times respectively. MCI has fifteen business process outsourcing service delivery facilities in Iowa, Georgia, Florida, Texas, Massachusetts, New Hampshire, South Dakota, New Mexico, California, Kansas, and Nova Scotia.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Driving modernization through digitalization, MCI ensures clients do more for less. MCI is the holding company for a diverse lineup of tech-enabled business services operating companies. MCI organically grows, acquires, and operates companies that have a synergistic products and services portfolios, including but not limited to Automated Contact Center Solutions (ACCS), customer contact management, IT Services (IT Schedule 70), and Temporary and Administrative Professional Staffing (TAPS Schedule 736), Business Process Management (BPM), Business Process Outsourcing (BPO), Claims Processing, Collections, Customer Experience Provider (CXP), Customer Service, Digital Experience Provider (DXP), Account Receivables Management (ARM), Application Software Development, Managed Services, and Technology Services, to mid-market, Federal &amp; enterprise partners. MCI now employs 10,000+ talented individuals with 150+ diverse North American client partners across the following MCI brands: GravisApps, Mass Markets, MCI Federal Services (MFS), The Sydney Call Center, OnBrand24, and Valor Intelligent Processing (VIP).</p>\r\n\r\n<p>DISCLAIMER:</p>\r\n\r\n<p>The purpose of the above job description is to provide potential candidates with a general overview of the role. It&#39;s not an all-inclusive list of the duties, responsibilities, skills, and qualifications required for the job. You may be asked by your supervisors or managers to perform other duties. You will be evaluated in part based upon your performance of the tasks listed in this job description.</p>\r\n\r\n<p><br />\r\nThe employer has the right to revise this job description at any time. This job description is not a contract for employment, and either you or the employer may terminate employment at any time, for any reason.</p>\r\n\r\n<p>REGARDING COVID-19:</p>\r\n\r\n<p>As an employer supporting critical Federal, State, Provincial, and Commercial clients, we have taken steps to ensure that we remain operational while taking every precaution possible to prevent the spread of COVID-19 and keep our employees safe.</p>\r\n\r\n<p><br />\r\nMeasures include social distancing for those working on-site, frequent deep cleaning and disinfecting of workstations and common areas, daily contactless temperature checks for those essential employees working on-site, travel policies limiting travel and mandatory quarantine, reporting and quarantine processes and policies for those exposed, and requesting masks to be worn when on-site employees are not at their workstation.</p>\r\n\r\n<p><br />\r\nFor more information on MCI&rsquo;s response to COVID-19 please visit www.mci.world/covid-19<em>.</em></p>\r\n', '2024-03-20 12:27:53', 'mental_health', 'Electrical'),
(43, 84, 'Customer Service Rep Cantonese', 0, 20800, 27000, '₱', '<h2>Full job description</h2>\r\n\r\n<h2><strong>About Conduent:</strong></h2>\r\n\r\n<p>Through our dedicated associates, Conduent delivers mission-critical services and solutions on behalf of Fortune 100 companies and over 500 governments &ndash; creating exceptional outcomes for our clients and the millions of people who count on them. You have an opportunity to personally thrive, make a difference and be part of a culture where individuality is noticed and valued every day.</p>\r\n\r\n<h2><br />\r\n<strong>Job Description:</strong></h2>\r\n\r\n<p><br />\r\n<strong>EARN PHP58,000 - PHP70,000/MONTHLY!</strong></p>\r\n\r\n<p><br />\r\n<strong>Job Track Description:</strong></p>\r\n\r\n<ul>\r\n	<li>Performs business support or technical work, using data organizing and coordination skills.</li>\r\n	<li>Performs tasks based on established procedures.</li>\r\n	<li>In some areas, requires vocational training, certifications, licensures, or equivalent experience.</li>\r\n</ul>\r\n\r\n<p><strong>General Profile</strong></p>\r\n\r\n<ul>\r\n	<li>Expands skills within an analytical or operational process.</li>\r\n	<li>Maintains appropriate licenses, training, and certifications.</li>\r\n	<li>Applies experience and skills to complete assigned work.</li>\r\n	<li>Works within established procedures and practices.</li>\r\n	<li>Establishes the appropriate approach for new assignments.</li>\r\n	<li>Works with a limited degree of supervision.</li>\r\n</ul>\r\n\r\n<p><strong>Functional Knowledge</strong></p>\r\n\r\n<ul>\r\n	<li>Has developed skillset in a range of processes, procedures, and systems.</li>\r\n</ul>\r\n\r\n<p><strong>Business Expertise</strong></p>\r\n\r\n<ul>\r\n	<li>Supports to achieve company goals by helping teams to integrate and work together.</li>\r\n</ul>\r\n\r\n<p><strong>Impact</strong></p>\r\n\r\n<ul>\r\n	<li>Impacts a team through quality of the services provided and information shared.</li>\r\n	<li>Uses discretion to modify work practices and processes to achieve results or improve efficiency.</li>\r\n</ul>\r\n\r\n<p><strong>Leadership</strong></p>\r\n\r\n<ul>\r\n	<li>May give informal guidance to junior team members.</li>\r\n</ul>\r\n\r\n<p><strong>Problem Solving</strong></p>\r\n\r\n<ul>\r\n	<li>Ability to problem solve, self-guided.</li>\r\n	<li>Evaluates issues and solutions to provide the best outcome for the client and end-users.</li>\r\n</ul>\r\n\r\n<p><strong>Interpersonal Skills</strong></p>\r\n\r\n<ul>\r\n	<li>Exchanges information and ideas effectively.</li>\r\n</ul>\r\n\r\n<p><strong>Responsibility Statements</strong></p>\r\n\r\n<ul>\r\n	<li>Assesses calls to provide service immediately, be transferred, or require follow-up for client resolution.</li>\r\n	<li>Identifies customer needs by referring to case notes and examining each as a specific case.</li>\r\n	<li>Performs routine call center activities concerning business products and services.</li>\r\n	<li>Uses standard scripts and established guidelines while under supervision, to meet SLAs.</li>\r\n	<li>Provides customers with information that is specialized.</li>\r\n	<li>Communicates in a warm and empathetic manner.</li>\r\n	<li>Gathers all necessary information to update the database.</li>\r\n	<li>Escalates issues to senior levels, based on complaints or concerns.</li>\r\n	<li>Explains company policies to customers.</li>\r\n	<li>Responsible for the end-to-end resolution of customer issues.</li>\r\n	<li>Performs other duties as assigned.</li>\r\n	<li>Complies with all policies and standards.</li>\r\n</ul>\r\n\r\n<h2><strong>Closing:</strong></h2>\r\n\r\n<p>Conduent is an Equal Opportunity Employer and considers applicants for all positions without regard to race, color, creed, religion, ancestry, national origin, age, gender identity, gender expression, sex/gender, marital status, sexual orientation, physical or mental disability, medical condition, use of a guide dog or service animal, military/veteran status, citizenship status, basis of genetic information, or any other group protected by law.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>People with disabilities who need a reasonable accommodation to apply for or compete for employment with Conduent may request such accommodation(s) by clicking on the following link, completing the accommodation request form, and submitting the request by using the &quot;Submit&quot; button at the bottom of the form. For those using Google Chrome or Mozilla Firefox please download the form first: click here to access or download the form. You may also click here to access Conduent&rsquo;s ADAAA Accommodation Policy.</p>\r\n\r\n<p><br />\r\n<em>At Conduent,&nbsp;</em><em>we value the health and safety of our associates, their families and our community. Under our current protocols, we do not require vaccination against COVID for most of our US jobs, but may require you to provide your COVID vaccination status, where legally permissible.</em></p>\r\n', '2024-03-20 12:28:21', 'cognitive', 'Programming'),
(44, 105, 'System Administrator Intern', 0, 20000, 50000, '₱', '<h2>Full job description</h2>\r\n\r\n<p><strong>System Administrator Intern</strong></p>\r\n\r\n<p><strong>Primary Responsibilities</strong></p>\r\n\r\n<ul>\r\n	<li>Assist System Admin manage and monitor the company&rsquo;s network infrastructure both on premise and on Amazon Cloud (LAN, WAN, AWS VPC, Firewalls (Software and hardware based))</li>\r\n	<li>Assist System Admin manage and monitor the company&rsquo;s server/services infrastructure both on premise and on Amazon Cloud</li>\r\n</ul>\r\n\r\n<p>Servers</p>\r\n\r\n<ul>\r\n	<li>Active Directory</li>\r\n	<li>Public and Private DNS</li>\r\n	<li>DHCP</li>\r\n	<li>Email server (Zimbra)</li>\r\n	<li>Storage Server (Owncloud)</li>\r\n	<li>Firewall/Internet Filters (Untangle, PfSense)</li>\r\n	<li>Asterisk servers</li>\r\n	<li>VM Ware EsXi server</li>\r\n	<li>Web/App servers (Apache, Nginx, PM2)</li>\r\n</ul>\r\n\r\n<p>Assist System Admin Setup and Deployment of IT equipment&rsquo;s (Laptop, PC, Server, Printers)</p>\r\n\r\n<p>&middot; Assist System Admin Manage, Maintain and Monitor on premise and Cloud network and system security (firewalls and backups)</p>\r\n\r\n<p>&middot; Assist System Admin provide support to to internal users ( employees )</p>\r\n\r\n<p>&middot; Assist System Admin provide support to company&rsquo;s clients ( stores )</p>\r\n\r\n<p>Job Types: Full-time, OJT (On the job training)</p>\r\n\r\n<p>Salary: Php100.00 per day</p>\r\n\r\n<p>Schedule:</p>\r\n\r\n<ul>\r\n	<li>8 hour shift</li>\r\n	<li>Monday to Friday</li>\r\n</ul>\r\n\r\n<p>Application Deadline: 04/01/2024</p>\r\n', '2024-03-23 00:23:49', 'developmental', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `description` varchar(255) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `user_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(103, 84, 'Company, Company, Applying for  Customer Service Associate I No Experience I Win 5', 1, '2024-03-20 12:34:09', '2024-03-20 12:34:50'),
(104, 85, 'You`re hired, Hello Jobseeker Jobseeker, We see your resume and you have good potential for this kind of job Customer Service Associate I No Experience I Win 5 , Please contact us on 09178680239. - Company. And congratulation!....... please be ready for y', 0, '2024-03-20 12:44:06', '2024-03-20 12:44:06'),
(105, 105, 'Bocal, Billy, Applying for  System Administrator Intern', 0, '2024-03-23 16:06:14', '2024-03-23 16:06:14'),
(106, 106, 'You`re hired, Hello angelo redruco, We see your resume and you have good potential for this kind of job System Administrator Intern , Please contact us on 09518887189. - CGI PHILIPPINES. And congratulation!....... please be ready for your interview', 0, '2024-03-23 16:07:29', '2024-03-23 16:07:29'),
(107, 85, 'Hello Jobseeker Jobseeker, Your application for this position Customer Service Associate I No Experience I Win 5 was declined - Company.', 0, '2024-03-23 16:38:49', '2024-03-23 16:38:49'),
(108, 85, 'You`re hired, Hello Jobseeker Jobseeker, We see your resume and you have good potential for this kind of job Customer Service Associate I No Experience I Win 5 , Please contact us on 09178680239. - Company. And congratulation!....... please be ready for y', 0, '2024-03-23 16:38:52', '2024-03-23 16:38:52'),
(109, 84, 'Company, Company, Applying for  Vehicle Sales Consultant', 1, '2024-03-23 16:42:29', '2024-03-24 02:32:46'),
(110, 84, 'Company, Company, Applying for  Senior Software Developer In Luzon', 1, '2024-03-23 16:51:28', '2024-03-24 02:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume`
--

CREATE TABLE `tbl_resume` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `path` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_resume`
--

INSERT INTO `tbl_resume` (`id`, `userid`, `path`, `created_at`) VALUES
(23, 85, '3ef815416f775098fe977004015c6193.pdf', '2024-03-07 23:59:23'),
(24, 84, '68d30a9594728bc39aa24be94b319d21.pdf', '2024-03-20 12:33:02'),
(25, 84, '68d30a9594728bc39aa24be94b319d21.pdf', '2024-03-20 12:33:04'),
(26, 84, '68d30a9594728bc39aa24be94b319d21.pdf', '2024-03-20 12:33:04'),
(27, 84, '68d30a9594728bc39aa24be94b319d21.pdf', '2024-03-20 12:33:04'),
(28, 84, '68d30a9594728bc39aa24be94b319d21.pdf', '2024-03-20 12:33:06'),
(29, 84, '68d30a9594728bc39aa24be94b319d21.pdf', '2024-03-20 12:33:06'),
(30, 106, 'f0935e4cd5920aa6c7c996a5ee53a70f.pdf', '2024-03-23 15:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_logs`
--

CREATE TABLE `tbl_sms_logs` (
  `id` bigint(20) NOT NULL,
  `receiverid` bigint(20) NOT NULL DEFAULT 0,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sms_logs`
--

INSERT INTO `tbl_sms_logs` (`id`, `receiverid`, `message`, `created_at`) VALUES
(327, 84, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hi Engr Rico James. Your Company account in AccessiblePath has been approved.\",\"to\":\"+6309178680239\"}', '2024-03-17 05:55:08'),
(328, 84, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-17 05:55:09'),
(329, 87, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hi Engr Rico James. Your Company account in AccessiblePath has been approved.\",\"to\":\"+6309178680239\"}', '2024-03-17 05:55:13'),
(330, 87, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-17 05:55:13'),
(331, 85, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hello Quirante, Sending this calendar invite as a placeholder for our interview at 2024-03-18 15:47:00. Please refer to link provided and check your email, please be there. Looking forward to discussing this opportunity with you. Thank you!\",\"to\":\"+6309178680239\"}', '2024-03-17 07:47:09'),
(332, 85, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-17 07:47:10'),
(333, 85, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"You`re hired, Hello Engr Rico James Quirante, We see your resume and you have good potential for this kind of job Senior Software Developer In Luzon , Please contact us on 09178680239. - Soft Dev Solutions. And congratulation!....... please be ready for your interview\",\"to\":\"+6309178680239\"}', '2024-03-19 01:21:08'),
(334, 85, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-19 01:21:09'),
(335, 103, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hi Engr. Your Company account in AccessiblePath has been approved.\",\"to\":\"+6309178680239\"}', '2024-03-19 18:59:06'),
(336, 103, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-19 18:59:06'),
(337, 85, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hello Jobseeker, Sending this calendar invite as a placeholder for our interview at 2024-03-20 20:35:00. Please refer to link provided and check your email, please be there. Looking forward to discussing this opportunity with you. Thank you!\",\"to\":\"+6309178680239\"}', '2024-03-20 12:35:10'),
(338, 85, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-20 12:35:11'),
(339, 85, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"You`re hired, Hello Jobseeker Jobseeker, We see your resume and you have good potential for this kind of job Customer Service Associate I No Experience I Win 5 , Please contact us on 09178680239. - Company. And congratulation!....... please be ready for your interview\",\"to\":\"+6309178680239\"}', '2024-03-20 12:44:06'),
(340, 85, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-20 12:44:06'),
(341, 85, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hello Jobseeker, Sending this calendar invite as a placeholder for our interview at 2024-03-21 12:39:00. Please refer to link provided and check your email, please be there. Looking forward to discussing this opportunity with you. Thank you!\",\"to\":\"+6309178680239\"}', '2024-03-20 12:44:25'),
(342, 85, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-20 12:44:25'),
(343, 105, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hi Billy. Your Company account in AccessiblePath has been approved.\",\"to\":\"+6309618915412\"}', '2024-03-23 00:21:07'),
(344, 105, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-23 00:21:07'),
(345, 106, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hi Angelo. Your Client account in AccessiblePath has been approved.\",\"to\":\"+6309276384236\"}', '2024-03-23 15:57:14'),
(346, 106, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-23 15:57:15'),
(347, 106, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"You`re hired, Hello angelo redruco, We see your resume and you have good potential for this kind of job System Administrator Intern , Please contact us on 09518887189. - CGI PHILIPPINES. And congratulation!....... please be ready for your interview\",\"to\":\"+6309276384236\"}', '2024-03-23 16:07:29'),
(348, 106, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-23 16:07:29'),
(349, 106, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hello Redruco, Sending this calendar invite as a placeholder for our interview at 2024-03-26 04:12:00. Please refer to link provided and check your email, please be there. Looking forward to discussing this opportunity with you. Thank you!\",\"to\":\"+6309276384236\"}', '2024-03-23 16:07:58'),
(350, 106, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-23 16:07:58'),
(351, 85, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hello Jobseeker Jobseeker, Your application for this position Customer Service Associate I No Experience I Win 5 was declined - Company.\",\"to\":\"+6309178680239\"}', '2024-03-23 16:38:49'),
(352, 85, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-23 16:38:50'),
(353, 85, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"You`re hired, Hello Jobseeker Jobseeker, We see your resume and you have good potential for this kind of job Customer Service Associate I No Experience I Win 5 , Please contact us on 09178680239. - Company. And congratulation!....... please be ready for your interview\",\"to\":\"+6309178680239\"}', '2024-03-23 16:38:52'),
(354, 85, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-23 16:38:53'),
(355, 107, '{\"api_key\":\"2H7GtWOeyWYMff0XzK7en5zEdy6\",\"api_secret\":\"l8KFeCstZZokPZFEW0n8ci8L21k9PQ\",\"from\":\"capstone\",\"text\":\"Hi Femela. Your Client account in AccessiblePath has been approved.\",\"to\":\"+6309518871899\"}', '2024-03-24 03:41:37'),
(356, 107, 'Client error: `POST https://api.movider.co/v1/sms` resulted in a `401 Unauthorized` response:\n{\"error\":{\"code\":403,\"name\":\"ERR_AUTHENTICATION_FAILED\",\"description\":\"Authentication field.\"}}\n', '2024-03-24 03:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verificationcode`
--

CREATE TABLE `tbl_verificationcode` (
  `id` int(11) NOT NULL,
  `session` varchar(65) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=not used\r\n1=used',
  `used_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_reports`
--
ALTER TABLE `tbl_company_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobareas`
--
ALTER TABLE `tbl_jobareas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_logs`
--
ALTER TABLE `tbl_sms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_verificationcode`
--
ALTER TABLE `tbl_verificationcode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_company_reports`
--
ALTER TABLE `tbl_company_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_jobareas`
--
ALTER TABLE `tbl_jobareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_sms_logs`
--
ALTER TABLE `tbl_sms_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `tbl_verificationcode`
--
ALTER TABLE `tbl_verificationcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
