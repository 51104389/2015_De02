-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2015 at 10:08 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tdhuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Tiếng anh', '2015-05-19 18:38:28', '2015-05-19 18:38:28'),
(2, 'Công nghệ thông tin', '2015-05-19 18:38:30', '2015-05-19 18:38:30'),
(3, 'Xây dựng', '2015-05-19 18:38:33', '2015-05-19 18:38:33'),
(4, 'Điện tử', '2015-05-20 12:32:22', '2015-05-20 12:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'hello\n                    ', 2, 1, '2015-05-20 06:55:19', '2015-05-20 06:55:19'),
(2, 'xin chào', 2, 1, '2015-05-20 06:55:26', '2015-05-20 06:55:26'),
(3, 'ho\n                    ', 2, 1, '2015-05-20 07:05:23', '2015-05-20 07:05:23'),
(4, 'asd\n                    ', 2, 1, '2015-05-20 07:05:27', '2015-05-20 07:05:27'),
(5, 'asdasd\n                    ', 2, 4, '2015-05-20 07:16:46', '2015-05-20 07:16:46'),
(6, 'hello world\n', 2, 5, '2015-05-20 12:37:38', '2015-05-20 12:37:38'),
(7, 'đang test', 2, 5, '2015-05-20 12:37:47', '2015-05-20 12:37:47'),
(8, 'chó thái', 1, 1, '2015-05-21 07:39:01', '2015-05-21 07:39:01'),
(9, 'Hello world\n\n                    ', 2, 3, '2015-05-21 07:40:29', '2015-05-21 07:40:29'),
(10, 'hello world\n                    ', 2, 6, '2015-05-21 07:54:00', '2015-05-21 07:54:00'),
(11, 'hi\n                    ', 2, 8, '2015-05-21 08:02:06', '2015-05-21 08:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_05_07_142204_initSchema', 1),
('2015_05_18_095853_createUser', 1),
('2015_05_18_095916_createPost', 1),
('2015_05_18_095922_createComment', 1),
('2015_05_18_095928_createLike', 1),
('2015_05_18_095934_createCategory', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `link_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cat_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `link_file`, `created_at`, `updated_at`, `cat_id`, `user_id`) VALUES
(1, 'Testing', 'qweqwexczxc asasd  123123123', '75cau_truc_va_cum_tu_thong_dung_trong_ta_6259_459.pdf', '2015-05-19 18:46:22', '2015-05-19 18:46:22', 1, 2),
(3, 'tseting 2', 'asdasdasdasd', 'Chap0_IntroductionToDatabaseSystems.pdf', '2015-05-19 20:59:57', '2015-05-19 20:59:57', 3, 2),
(4, 'C++', '\r\n                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'baigiang021.pdf', '2015-05-19 21:14:21', '2015-05-19 21:14:21', 2, 3),
(6, 'database system', 'Chúng ta vẫn biết rằng, làm việc với một đoạn văn bản dễ đọc và rõ nghĩa dễ gây rối trí và cản trở việc tập trung vào yếu tố trình bày văn bản. Lorem Ipsum có ưu điểm hơn so với đoạn văn bản chỉ gồm nội dung kiểu "Nội dung, nội dung, nội dung" là nó khiến văn bản giống thật hơn, bình thường hơn. Nhiều phần mềm thiết kế giao diện web và dàn trang ngày nay đã sử dụng Lorem Ipsum làm đoạn văn bản giả, và nếu bạn thử tìm các đoạn "Lorem ipsum" trên mạng thì sẽ khám phá ra nhiều trang web hiện vẫn đang trong quá trình xây dựng. Có nhiều phiên bản khác nhau đã xuất hiện, đôi khi do vô tình, nhiều khi do cố ý (xen thêm vào những câu hài hước hay thông tục).', 'LAB1.pdf', '2015-05-21 07:53:43', '2015-05-21 07:53:43', 2, 2),
(7, 'CG', 'Trái với quan điểm chung của số đông, Lorem Ipsum không phải chỉ là một đoạn văn bản ngẫu nhiên. Người ta tìm thấy nguồn gốc của nó từ những tác phẩm văn học la-tinh cổ điển xuất hiện từ năm 45 trước Công Nguyên, nghĩa là nó đã có khoảng hơn 2000 tuổi. Một giáo sư của trường Hampden-Sydney College (bang Virginia - Mỹ) quan tâm tới một trong những từ la-tinh khó hiểu nhất, "consectetur", trích từ một đoạn của Lorem Ipsum, và đã nghiên cứu tất cả các ứng dụng của từ này trong văn học cổ điển, để từ đó tìm ra nguồn gốc không thể chối cãi của Lorem Ipsum. Thật ra, nó được tìm thấy trong các đoạn 1.10.32 và 1.10.33 của "De Finibus Bonorum et Malorum" (Đỉnh tối thượng của Cái Tốt và Cái Xấu) viết bởi Cicero vào năm 45 trước Công Nguyên. Cuốn sách này là một luận thuyết đạo lí rất phổ biến trong thời kì Phục Hưng. Dòng đầu tiên của Lorem Ipsum, "Lorem ipsum dolor sit amet..." được trích từ một câu trong đoạn thứ 1.10.32.\r\n\r\nTrích đoạn chuẩn của Lorem Ipsum được sử dụng từ thế kỉ thứ 16 và được tái bản sau đó cho những người quan tâm đến nó. Đoạn 1.10.32 và 1.10.33 trong cuốn "De Finibus Bonorum et Malorum" của Cicero cũng được tái bản lại theo đúng cấu trúc gốc, kèm theo phiên bản tiếng Anh được dịch bởi H. Rackham vào năm 1914.', 'Luoidagiac.pdf', '2015-05-21 07:54:51', '2015-05-21 07:54:51', 2, 2),
(8, 'Thái cờ hó', '(TinTheThao.com.vn) - La Liga mùa bóng năm nay chỉ còn một vòng đấu nữa sẽ kết thúc. Barcelona đã chính thức đăng quang và biến Atletico Madrid thành cựu vô địch. Đây cũng là giải đấu tìm ra nhà vô địch muộn nhất trong năm giải đấu hàng đầu châu Âu. Sau đây chúng ta sẽ cùng điểm qua năm cầu thủ chuyền bóng chính xác nhất La Liga theo thống kê của Whoscored (chỉ tính những cầu thủ ra sân ở đội hình chính thức trên 25 trận/mùa).', 'glut-3.spec.pdf', '2015-05-21 07:57:36', '2015-05-21 07:57:36', 1, 2),
(9, 'Testing', 'asdasdasdsd\r\n                        ', 'OpenGL_tieng_viet.pdf', '2015-05-21 08:02:49', '2015-05-21 08:02:49', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `token_login` text COLLATE utf8_unicode_ci NOT NULL,
  `role` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `password`, `address`, `phone`, `token_login`, `role`, `created_at`, `updated_at`) VALUES
(1, '', '', 'tranduchuytt2_2008@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', 1, '2015-05-19 18:37:44', '2015-05-21 08:06:12'),
(2, '', 'kkkk', 'thewish.it@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '12 Nghĩa Hòa, phường 6, quận Tân Bình', '01694454793', '5ab120054eaa6aa30c427d0d195dfc', 1, '2015-05-19 18:38:52', '2015-05-21 08:06:37'),
(4, '', '', 'tdhuy@hotmail.com', '', '', '', '', 0, '2015-05-21 08:04:20', '2015-05-21 08:04:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
