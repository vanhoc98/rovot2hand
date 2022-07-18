-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 27, 2022 lúc 07:42 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `divano_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` bigint(20) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_content` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_cate` bigint(20) UNSIGNED NOT NULL,
  `blog_view` bigint(20) NOT NULL,
  `blog_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_desc`, `blog_content`, `blog_image`, `blog_cate`, `blog_view`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 'In Virtual Reality, How Much Body Do You Need?', '<h4>How connected are your body and your consciousness?</h4>\n\n<p>When Michiteru Kitazaki, a professor of engineering at Toyohashi University of Technology in Japan, recently posed this question in an email, he evoked an idea from Japanese culture known as tamashii, or the soul without a body.</p>\n\n<h4>What furniture styles are the easiest to add to your space?</h4>\n\n<p>When you bring new furniture into your home, you don&rsquo;t have to stay with the same style as your existing decor. That said, there are styles that are easier to incorporate. Look for furniture that has simple and clean lines, like contemporary and mid-century modern pieces. Adding these styles can also give your space a trendy update without a big price tag.</p>\n\n<p>Transitional is a comfortable style that draws from traditional and contemporary lines. This popular style works well for updating a traditional home without going in an entirely different decorating direction.</p>\n\n<p>If your room already has a strong style story, simple additions won&rsquo;t detract from what you already have in there. If your room is neutral or decorated in simple furnishings, then look for dynamic new pieces that give your space that pulled-together look.</p>\n\n<p><img alt=\"This is an alternative image description. It will generate auto caption.\" src=\"http://127.0.0.1:8000/uploads/ckeditor/6235481c944b6.jpg\" /></p>\n\n<h4>How to use color to style your new and old furniture together</h4>\n\n<p>Color is the element that can tie your existing furniture with your newly-purchased pieces. Using color as the unifying feature in your space is a simple way to make your new style look effortless. Here&rsquo;s how to make the most out of color in your room</p>\n\n<ul>\n	<li>Use Your Existing Color Palette: If you love your color palette now, then shop for new furniture and decor that works with everything you already have &mdash; simple!</li>\n	<li>Add One or Two New Accent Colors: Have fun with color by adding new decor to your color scheme.</li>\n	<li>Use Accessories: Colorful accessories can serve as a bridge between all of your furniture. Add throw pillows, artwork and decorative items with colors from your existing and new furniture.</li>\n</ul>\n\n<p>Will it soon be possible, he wondered, to simulate the feeling of a spirit not attached to any particular physical form using virtual or augmented reality?</p>\n\n<p>If so, a good place to start would be to figure out the minimal amount of body we need to feel a sense of self, especially in digital environments where more and more people may find themselves for work or play. It might be as little as a pair of hands and feet, report Dr. Kitazaki and a Ph.D. student, Ryota Kondo.</p>\n\n<p><img alt=\"This is an alternative image description. It will generate auto caption.\" src=\"http://127.0.0.1:8000/uploads/ckeditor/6235484065d89.jpg\" /></p>\n\n<p>In a paper published Tuesday in Scientific Reports, they showed that animating virtual hands and feet alone is enough to make people feel their sense of body drift toward an invisible avatar.</p>\n\n<h4>Virtual reality</h4>\n\n<p>The original body ownership trick was the rubber-hand illusion. In the 1990s, researchers found that if they hid a person&rsquo;s actual hand behind a partition, placed a rubber hand in view next to it and repeatedly tapped and stroked the real and fake hand in synchrony, the subject would soon eerily start to feel sensation in the rubber hand.</p>\n\n<p>Today, technologists working on virtual reality are using modern-day riffs on the rubber-hand illusion to understand how users will adjust when presented with digital bodies that do not match their own. Some researchers have suggested that having users digitally swap bodies with people of other races, genders, ages or abilities could reduce implicit bias, though this work has its limits.</p>\n\n<p>Using an Oculus Rift virtual reality headset and a motion sensor, Dr. Kitazaki&rsquo;s team performed a series of experiments in which volunteers watched disembodied hands and feet move two meters in front of them in a virtual room. In one experiment, when the hands and feet mirrored the participants&rsquo; own movements, people reported feeling as if the space between the appendages were their own bodies.</p>\n\n<p>This demonstrates the power of synchronized actions and our brain&rsquo;s ability to fill in missing information, said V.S. Ramachandran, a professor at the University of California, San Diego and rubber-hand illusion pioneer who did not participate in the new study. The &ldquo;improbability of synchrony occurring by chance&rdquo; overrides all other information, he said, even knowledge that an invisible body cannot be yours.</p>', 'It might be as little as a pair of hands and feet, researchers in Japan found after recording subjects who wore an Oculus Rift headset.', '6231a213583b5_1647419923.jpg', 1, 10, 1, '2022-03-16 08:38:43', '2022-03-27 05:32:41'),
(2, 'Turn off the lights before bed with one word', '<h4>How connected are your body and your consciousness?</h4>\r\n\r\n<p>When Michiteru Kitazaki, a professor of engineering at Toyohashi University of Technology in Japan, recently posed this question in an email, he evoked an idea from Japanese culture known as tamashii, or the soul without a body.</p>\r\n\r\n<h4>What furniture styles are the easiest to add to your space?</h4>\r\n\r\n<p>When you bring new furniture into your home, you don&rsquo;t have to stay with the same style as your existing decor. That said, there are styles that are easier to incorporate. Look for furniture that has simple and clean lines, like contemporary and mid-century modern pieces. Adding these styles can also give your space a trendy update without a big price tag.</p>\r\n\r\n<p>Transitional is a comfortable style that draws from traditional and contemporary lines. This popular style works well for updating a traditional home without going in an entirely different decorating direction.</p>\r\n\r\n<p>If your room already has a strong style story, simple additions won&rsquo;t detract from what you already have in there. If your room is neutral or decorated in simple furnishings, then look for dynamic new pieces that give your space that pulled-together look.</p>\r\n\r\n<p><img alt=\"This is an alternative image description. It will generate auto caption.\" src=\"http://127.0.0.1:8000/uploads/ckeditor/62354d6467d8e.jpg\" style=\"height:600px; width:768px\" /></p>\r\n\r\n<h4>How to use color to style your new and old furniture together</h4>\r\n\r\n<p>Color is the element that can tie your existing furniture with your newly-purchased pieces. Using color as the unifying feature in your space is a simple way to make your new style look effortless. Here&rsquo;s how to make the most out of color in your room</p>\r\n\r\n<ul>\r\n	<li>Use Your Existing Color Palette: If you love your color palette now, then shop for new furniture and decor that works with everything you already have &mdash; simple!</li>\r\n	<li>Add One or Two New Accent Colors: Have fun with color by adding new decor to your color scheme.</li>\r\n	<li>Use Accessories: Colorful accessories can serve as a bridge between all of your furniture. Add throw pillows, artwork and decorative items with colors from your existing and new furniture.</li>\r\n</ul>\r\n\r\n<p>Will it soon be possible, he wondered, to simulate the feeling of a spirit not attached to any particular physical form using virtual or augmented reality?</p>\r\n\r\n<p>If so, a good place to start would be to figure out the minimal amount of body we need to feel a sense of self, especially in digital environments where more and more people may find themselves for work or play. It might be as little as a pair of hands and feet, report Dr. Kitazaki and a Ph.D. student, Ryota Kondo.</p>\r\n\r\n<p><img alt=\"This is an alternative image description. It will generate auto caption.\" src=\"http://127.0.0.1:8000/uploads/ckeditor/62354d7ba2dee.jpg\" style=\"height:396px; width:768px\" /></p>\r\n\r\n<p>In a paper published Tuesday in Scientific Reports, they showed that animating virtual hands and feet alone is enough to make people feel their sense of body drift toward an invisible avatar.</p>\r\n\r\n<h4>Virtual reality</h4>\r\n\r\n<p>The original body ownership trick was the rubber-hand illusion. In the 1990s, researchers found that if they hid a person&rsquo;s actual hand behind a partition, placed a rubber hand in view next to it and repeatedly tapped and stroked the real and fake hand in synchrony, the subject would soon eerily start to feel sensation in the rubber hand.</p>\r\n\r\n<p>Today, technologists working on virtual reality are using modern-day riffs on the rubber-hand illusion to understand how users will adjust when presented with digital bodies that do not match their own. Some researchers have suggested that having users digitally swap bodies with people of other races, genders, ages or abilities could reduce implicit bias, though this work has its limits.</p>\r\n\r\n<p>Using an Oculus Rift virtual reality headset and a motion sensor, Dr. Kitazaki&rsquo;s team performed a series of experiments in which volunteers watched disembodied hands and feet move two meters in front of them in a virtual room. In one experiment, when the hands and feet mirrored the participants&rsquo; own movements, people reported feeling as if the space between the appendages were their own bodies.</p>\r\n\r\n<p>This demonstrates the power of synchronized actions and our brain&rsquo;s ability to fill in missing information, said V.S. Ramachandran, a professor at the University of California, San Diego and rubber-hand illusion pioneer who did not participate in the new study. The &ldquo;improbability of synchrony occurring by chance&rdquo; overrides all other information, he said, even knowledge that an invisible body cannot be yours.</p>', 'It might be as little as a pair of hands and feet, researchers in Japan found after recording subjects who wore an Oculus Rift headset.', '62353c7f8ad1f_1647656063.jpg', 1, 16, 1, '2022-03-19 02:14:24', '2022-03-27 05:32:48'),
(3, 'test', '<h4>How connected are your body and your consciousness?</h4>\r\n\r\n<p>When Michiteru Kitazaki, a professor of engineering at Toyohashi University of Technology in Japan, recently posed this question in an email, he evoked an idea from Japanese culture known as tamashii, or the soul without a body.</p>\r\n\r\n<h4>What furniture styles are the easiest to add to your space?</h4>\r\n\r\n<p>When you bring new furniture into your home, you don&rsquo;t have to stay with the same style as your existing decor. That said, there are styles that are easier to incorporate. Look for furniture that has simple and clean lines, like contemporary and mid-century modern pieces. Adding these styles can also give your space a trendy update without a big price tag.</p>\r\n\r\n<p>Transitional is a comfortable style that draws from traditional and contemporary lines. This popular style works well for updating a traditional home without going in an entirely different decorating direction.</p>\r\n\r\n<p>If your room already has a strong style story, simple additions won&rsquo;t detract from what you already have in there. If your room is neutral or decorated in simple furnishings, then look for dynamic new pieces that give your space that pulled-together look.</p>\r\n\r\n<p><img alt=\"This is an alternative image description. It will generate auto caption.\" src=\"http://127.0.0.1:8000/uploads/ckeditor/623ff7f6ac1e0.png\" style=\"height:360px; width:640px\" /></p>\r\n\r\n<h4>How to use color to style your new and old furniture together</h4>\r\n\r\n<p>Color is the element that can tie your existing furniture with your newly-purchased pieces. Using color as the unifying feature in your space is a simple way to make your new style look effortless. Here&rsquo;s how to make the most out of color in your room</p>\r\n\r\n<ul>\r\n	<li>Use Your Existing Color Palette: If you love your color palette now, then shop for new furniture and decor that works with everything you already have &mdash; simple!</li>\r\n	<li>Add One or Two New Accent Colors: Have fun with color by adding new decor to your color scheme.</li>\r\n	<li>Use Accessories: Colorful accessories can serve as a bridge between all of your furniture. Add throw pillows, artwork and decorative items with colors from your existing and new furniture.</li>\r\n</ul>\r\n\r\n<p>Will it soon be possible, he wondered, to simulate the feeling of a spirit not attached to any particular physical form using virtual or augmented reality?</p>\r\n\r\n<p>If so, a good place to start would be to figure out the minimal amount of body we need to feel a sense of self, especially in digital environments where more and more people may find themselves for work or play. It might be as little as a pair of hands and feet, report Dr. Kitazaki and a Ph.D. student, Ryota Kondo.</p>\r\n\r\n<p><img alt=\"This is an alternative image description. It will generate auto caption.\" src=\"http://127.0.0.1:8000/uploads/ckeditor/62354d7ba2dee.jpg\" style=\"height:396px; width:768px\" /></p>\r\n\r\n<p>In a paper published Tuesday in Scientific Reports, they showed that animating virtual hands and feet alone is enough to make people feel their sense of body drift toward an invisible avatar.</p>\r\n\r\n<h4>Virtual reality</h4>\r\n\r\n<p>The original body ownership trick was the rubber-hand illusion. In the 1990s, researchers found that if they hid a person&rsquo;s actual hand behind a partition, placed a rubber hand in view next to it and repeatedly tapped and stroked the real and fake hand in synchrony, the subject would soon eerily start to feel sensation in the rubber hand.</p>\r\n\r\n<p>Today, technologists working on virtual reality are using modern-day riffs on the rubber-hand illusion to understand how users will adjust when presented with digital bodies that do not match their own. Some researchers have suggested that having users digitally swap bodies with people of other races, genders, ages or abilities could reduce implicit bias, though this work has its limits.</p>\r\n\r\n<p>Using an Oculus Rift virtual reality headset and a motion sensor, Dr. Kitazaki&rsquo;s team performed a series of experiments in which volunteers watched disembodied hands and feet move two meters in front of them in a virtual room. In one experiment, when the hands and feet mirrored the participants&rsquo; own movements, people reported feeling as if the space between the appendages were their own bodies.</p>\r\n\r\n<p>This demonstrates the power of synchronized actions and our brain&rsquo;s ability to fill in missing information, said V.S. Ramachandran, a professor at the University of California, San Diego and rubber-hand illusion pioneer who did not participate in the new study. The &ldquo;improbability of synchrony occurring by chance&rdquo; overrides all other information, he said, even knowledge that an invisible body cannot be yours.</p>', 'test content', '623ff1db69465_1648357851.jpg', 1, 0, 1, '2022-03-27 05:10:51', '2022-03-27 05:37:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `cart_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_qty`, `user_id`, `pro_id`, `cart_status`, `created_at`, `updated_at`) VALUES
(6, 2, 2, 1, 3, '2022-03-16 05:49:55', '2022-03-27 05:37:23'),
(7, 1, 2, 8, 3, '2022-03-19 09:33:14', '2022-03-27 05:37:23'),
(8, 1, 2, 2, 3, '2022-03-26 07:27:39', '2022-03-27 05:37:23'),
(10, 1, 2, 1, 3, '2022-03-27 05:22:44', '2022-03-27 05:37:23'),
(11, 1, 2, 6, 3, '2022-03-27 05:33:49', '2022-03-27 05:37:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_sorting` int(11) NOT NULL,
  `category_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_image`, `category_slug`, `category_sorting`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Nhà bếp', '622c2e7a873ac_1647062650.jpg', 'Nhà bếp', 1, 1, '2022-03-11 09:54:59', '2022-03-27 05:35:56'),
(2, 'Phòng tắm', '622c344ee627e_1647064142.jpg', 'Phòng tắm', 2, 1, '2022-03-12 05:48:36', '2022-03-12 05:49:03'),
(3, 'Kitchens', '622c34632b53f_1647064163.jpg', 'kitchens', 3, 1, '2022-03-12 05:49:23', '2022-03-12 05:49:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_qty` int(11) NOT NULL,
  `coupon_date_start` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_date_end` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_used` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_sale_number` int(11) NOT NULL,
  `coupon_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_qty`, `coupon_date_start`, `coupon_date_end`, `coupon_used`, `coupon_condition`, `coupon_sale_number`, `coupon_status`, `created_at`, `updated_at`) VALUES
(1, 'sale32', 123, '2022/03/12', '2022/03/17', NULL, 1, 5000, 2, '2022-01-15 20:26:32', '2022-03-11 09:59:56'),
(2, 'sale', 8, '2022/03/09', '2022/03/31', ',2', 2, 3, 1, '2022-01-15 20:45:40', '2022-03-27 05:26:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_address`, `customer_phone`, `customer_pay`, `customer_note`, `created_at`, `updated_at`) VALUES
(1, 'fdf', 'dfdfd@gmail.com', 'fefe', 'fefe', 'COD', NULL, '2022-03-12 02:22:23', '2022-03-12 02:22:23'),
(2, 'user', 'user@gmail.com', 'bgbg', '0773654033', 'COD', NULL, NULL, NULL),
(3, 'user', 'user@gmail.com', 'bgbg', '0773654033', 'COD', NULL, NULL, NULL),
(4, 'user', 'user@gmail.com', 'cdcdc', '0773654025', 'ATM', NULL, NULL, NULL),
(5, 'user', 'user@gmail.com', 'ffefef', '0773654058', 'ATM', NULL, NULL, NULL),
(6, 'user', 'user@gmail.com', 'dwdw', '0773654089', 'ATM', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `gallery_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_sorting` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `pro_id`, `gallery_image`, `gallery_sorting`, `created_at`, `updated_at`) VALUES
(1, 1, '623173ba12ec7_1647408058.jpg', 1, '2022-03-11 09:57:21', '2022-03-16 05:20:58'),
(2, 1, '622b1d012f8ca_1646992641.jpg', 2, '2022-03-11 09:57:21', '2022-03-11 09:57:21'),
(3, 1, '622b1d014574c_1646992641.jpg', 3, '2022-03-11 09:57:21', '2022-03-11 09:57:21'),
(4, 2, '623fd4f52bf34_1648350453.jpg', 4, '2022-03-27 03:07:33', '2022-03-27 03:07:33'),
(5, 2, '623fd51111489_1648350481.jpg', 5, '2022-03-27 03:08:01', '2022-03-27 03:08:01'),
(6, 2, '623fd74fcb316_1648351055.jpg', 6, '2022-03-27 03:17:36', '2022-03-27 03:17:36'),
(8, 3, '623ff7da80d62_1648359386.jpg', 7, '2022-03-27 05:36:20', '2022-03-27 05:36:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `cus_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_code` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `cus_id`, `user_id`, `order_code`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 234895, 3, '2022-03-11 02:22:58', '2022-03-11 02:26:04'),
(2, 1, 2, 2348953333, 1, '2022-03-12 02:22:58', '2022-03-12 02:26:04'),
(3, 2, 2, 804534589, 1, '2022-03-26 06:04:34', '2022-03-26 06:04:34'),
(4, 3, 2, 1177420364, 1, '2022-03-26 06:22:09', '2022-03-26 06:22:09'),
(5, 4, 2, 35910984, 1, '2022-03-27 05:17:29', '2022-03-27 05:17:29'),
(6, 5, 2, 1320207264, 1, '2022-03-27 05:26:38', '2022-03-27 05:26:38'),
(7, 6, 2, 1922999750, 3, '2022-03-27 05:34:56', '2022-03-27 05:37:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderdetail_id` bigint(20) UNSIGNED NOT NULL,
  `order_code` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `order_de_price` int(11) NOT NULL,
  `order_de_qty` int(11) NOT NULL,
  `order_de_coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderdetail_id`, `order_code`, `pro_id`, `order_de_price`, `order_de_qty`, `order_de_coupon`, `created_at`, `updated_at`) VALUES
(1, 234895, 1, 20000, 2, 'no', '2022-03-11 02:23:20', '2022-03-11 02:23:20'),
(2, 2348953333, 2, 20000, 12, 'no', '2022-03-12 02:23:20', '2022-03-12 02:23:20'),
(3, 804534589, 1, 10000, 2, 'sale', '2022-03-26 06:04:34', '2022-03-26 06:04:34'),
(4, 804534589, 8, 60000, 1, 'sale', '2022-03-26 06:04:34', '2022-03-26 06:04:34'),
(5, 35910984, 2, 20000, 1, 'sale', '2022-03-27 05:17:29', '2022-03-27 05:17:29'),
(6, 1320207264, 1, 10000, 1, 'sale', '2022-03-27 05:26:38', '2022-03-27 05:26:38'),
(7, 1922999750, 6, 39000, 2, 'no', '2022-03-27 05:34:56', '2022-03-27 05:37:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_old_price` bigint(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_view` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sold` int(11) NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_slug`, `category_id`, `product_desc`, `product_price`, `product_old_price`, `product_quantity`, `product_view`, `product_image`, `product_sold`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'product 1', 'product-1', 1, 'product 1', 10000, 0, 8, 0, '622b1cd962a05_1646992601.jpg', 12, 1, '2022-03-11 09:56:03', '2022-03-12 02:24:51'),
(2, 'product 2', 'product-2', 1, 'product 2', 20000, 30000, 20, 0, '622c064681310_1647052358.jpg', 0, 1, '2022-03-12 02:32:38', '2022-03-12 02:32:38'),
(3, 'product 3', 'product-3', 1, 'product 3', 20000, 0, 20, 0, '622c424369f4c_1647067715.jpg', 0, 1, '2022-03-12 06:48:36', '2022-03-12 06:48:36'),
(4, 'product 4', 'product-4', 1, 'product 4', 50000, 0, 20, 0, '622c42693be1b_1647067753.jpg', 0, 1, '2022-03-12 06:49:13', '2022-03-12 06:49:13'),
(5, 'product 5', 'product-5', 1, 'product 5', 30000, 0, 20, 0, '622c4285d9145_1647067781.jpg', 0, 1, '2022-03-12 06:49:42', '2022-03-12 06:49:42'),
(6, 'product 6', 'product-6', 1, 'product 6', 39000, 0, 19, 0, '622c42a595169_1647067813.jpg', 1, 1, '2022-03-12 06:50:13', '2022-03-27 05:37:23'),
(7, 'product 7', 'product-7', 1, 'product 7', 12000, 0, 20, 0, '622c42cab5caa_1647067850.jpg', 0, 1, '2022-03-12 06:50:50', '2022-03-12 06:50:50'),
(8, 'product 8', 'product-8', 2, 'product 8', 60000, 0, 202, 0, '622c632f51b4d_1647076143.jpg', 0, 1, '2022-03-12 09:09:03', '2022-03-12 09:09:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` bigint(20) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-01-01 06:15:44', '2022-01-01 06:15:44'),
(2, 'User', '2022-01-01 06:15:44', '2022-01-01 06:15:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_bodytext` int(11) NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` tinyint(4) NOT NULL,
  `slider_sorting` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_content`, `slider_url`, `slider_bodytext`, `slider_image`, `slider_status`, `slider_sorting`, `created_at`, `updated_at`) VALUES
(1, 'Sofa Grace', 'Score new arrivals from latest items <br /> Multipurpose eCommerce template read', NULL, 1, '622b1d555aed6_1646992725.jpg', 1, 1, '2022-03-11 09:58:45', '2022-03-12 05:21:13'),
(2, 'Bathroom Furniture', 'Score new arrivals from latest items<br /> Multipurpose eCommerce template ready', NULL, 2, '622c2cb59e7dc_1647062197.jpg', 1, 2, '2022-03-12 05:16:38', '2022-03-12 05:17:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statistical`
--

CREATE TABLE `statistical` (
  `id_statistic` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `sales` float NOT NULL,
  `profit` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `statistical`
--

INSERT INTO `statistical` (`id_statistic`, `order_date`, `sales`, `profit`, `quantity`, `total_order`, `created_at`, `updated_at`) VALUES
(1, '2021-10-05', 22000000, 21998000, 22, 2, '2021-12-05 01:19:08', '2021-12-05 01:22:19'),
(2, '2021-11-06', 41000000, 80999000, 11, 1, '2021-12-05 20:59:45', '2021-12-05 20:59:45'),
(3, '2021-12-19', 220000, 500000, 22, 2, '2021-12-07 01:19:08', '2021-12-07 01:22:19'),
(4, '2021-12-20', 535000, 300000, 3, 1, '2021-12-19 23:31:37', '2021-12-19 23:31:37'),
(5, '2022-01-16', 260000, 200000, 13, 1, '2022-01-15 19:53:54', '2022-01-15 19:53:54'),
(6, '2022-02-14', 840000, 838000, 4, 2, '2022-02-13 20:46:25', '2022-02-13 20:47:28'),
(7, '2022-03-02', 520000, 519000, 3, 2, '2022-03-01 21:52:02', '2022-03-01 21:52:02'),
(8, '2022-03-12', 240000, 239000, 12, 1, '2022-03-12 02:26:04', '2022-03-12 02:26:04'),
(9, '2022-03-27', 78000, 77000, 2, 1, '2022-03-27 05:37:29', '2022-03-27 05:37:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` bigint(20) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$i8h5jrlX44uO9lQf59E.j./sZOHem5uA3E1KGzU8sq1wXC.oqGdsS', 1, 'qhA5DEzvoBWbMmY6qA9dVByUEJBwFMCKv1eKstidqFeNBCaCmsyz0LwczZsS', '2022-03-26 07:18:44', '2022-03-26 07:18:44'),
(2, 'user', 'user@gmail.com', '$2y$10$ShvewSEfwTrS5xUQalKOD.GN5FLJJVu3MprJ/H7UgNBQOTEAcBz4.', 2, 'sIHEPiHnNagsyovKEYMPwK7O1A6ANG9jkC3sSvPA1ezEqHQXof2cEMOOM98I', '2022-03-26 07:19:12', '2022-03-26 07:19:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `pro_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '2022-03-26 08:19:12', '2022-03-26 08:19:12'),
(7, 5, 2, '2022-03-27 05:15:25', '2022-03-27 05:15:25'),
(8, 4, 2, '2022-03-27 05:33:42', '2022-03-27 05:33:42');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_cate` (`blog_cate`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`,`pro_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_category_slug_unique` (`category_slug`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `gallery_pro_id_foreign` (`pro_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_code` (`order_code`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `orderdetail_pro_id_foreign` (`pro_id`),
  ADD KEY `order_code` (`order_code`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_product_slug_unique` (`product_slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id_statistic`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `level` (`level`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `wishlist_pro_id_foreign` (`pro_id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderdetail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id_statistic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`blog_cate`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_code`) REFERENCES `order` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
