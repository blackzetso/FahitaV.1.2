-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04 فبراير 2021 الساعة 16:20
-- إصدار الخادم: 10.3.27-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semiggiy_Rahawan`
--

-- --------------------------------------------------------

--
-- بنية الجدول `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `key_name` varchar(255) DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `attributes`
--

INSERT INTO `attributes` (`id`, `key_name`) VALUES
(1, 'nave:home'),
(2, 'nave:account'),
(3, 'nave:orders'),
(4, 'nave:contact'),
(5, 'account:langaunge'),
(6, 'account:full_name'),
(7, 'account:user_informations'),
(8, 'account:change'),
(9, 'account:email'),
(10, 'account:phone_number'),
(11, 'order:status'),
(12, 'order:date'),
(13, 'order:view'),
(14, 'social:media:accounts'),
(15, 'details'),
(16, 'The:quantity:is:in'),
(17, 'price'),
(18, 'Availability'),
(19, 'add:to:cart'),
(20, 'tota:price'),
(21, 'cart'),
(22, 'total'),
(23, 'Total:order'),
(24, 'completing:order '),
(25, 'Delivery:cost'),
(26, 'finish:order'),
(27, 'from'),
(28, 'to'),
(29, 'receive:time '),
(30, 'product'),
(31, 'your request has peen sent successfully'),
(33, 'welcom:in:macdoos'),
(34, 'login:or:register'),
(35, 'all:categories'),
(36, 'Our:Products\r\n'),
(37, 'logout'),
(38, 'about'),
(39, 'Store policy'),
(40, 'password'),
(41, 'login:button'),
(42, 'signup:button '),
(43, 'Bestseller'),
(44, 'New Arrivals'),
(45, 'Featured'),
(46, 'Deal of the day\r\n'),
(47, 'search here');

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `unit` varchar(60) DEFAULT NULL,
  `price` varchar(60) DEFAULT NULL,
  `qty` varchar(60) DEFAULT NULL,
  `total` varchar(60) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`id`, `product`, `name`, `unit`, `price`, `qty`, `total`, `user`) VALUES
(185, 548, 'WINDA كاوتش 155/70 R13 - WP15 - | صيني', 'unite1', '442', '2', '884', 1),
(187, 545, 'Genuine Vacuum hose black بي ام دبليو 1 Series [ 2004-2013 ]', 'unite1', '23', '5', '115', 18);

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `img` varchar(100) NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `order_number`) VALUES
(20, 'فرامل', '6590613.png', 0),
(21, 'دبرياج فتيس', '1723555.png', 0),
(23, 'مكونات موتور', '4624137.png', 0),
(24, 'كاوتش', '2450684.png', 0),
(25, 'فوانيس و كشافات', '9220909.png', 0),
(26, 'زيوت', '2658472.jpg', 0),
(27, 'هيونداى', '1401976.png', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `language`
--

INSERT INTO `language` (`id`, `name`, `code`) VALUES
(1, 'arabic', 'ar'),
(2, 'english', 'en');

-- --------------------------------------------------------

--
-- بنية الجدول `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'العبور');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `build` varchar(255) NOT NULL,
  `storey` varchar(255) NOT NULL,
  `orders` varchar(255) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `time_from` varchar(255) NOT NULL,
  `time_to` varchar(255) NOT NULL,
  `order_status` varchar(60) NOT NULL DEFAULT 'طلب جديد',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `city`, `zone`, `street`, `build`, `storey`, `orders`, `user`, `time_from`, `time_to`, `order_status`, `date`) VALUES
(20, 'القاهره ', 'مدينه جسر السويس الجديده ', 'شارع العشريني ', '٥', '٥', NULL, 9, '00:53', '00:43', 'طلب جديد', '2020-12-28'),
(25, 'القاهره ', 'مدينه جسر السويس الجديده ', 'شارع العشريني ', '٥عماره ٥', '٥١٢٣٤٤', NULL, 9, '05:16', '03:16', 'طلب جديد', '2021-01-03'),
(26, 'القاهره ', 'مدينه جسر السويس الجديده ', 'شارع العشريني ', '٥عماره ٥', '٥١٢٣٤٤', NULL, 9, '05:19', '05:19', 'طلب جديد', '2021-01-03'),
(39, 'س', 'سش', 'سش', 'سش', 'سش', NULL, 1, '19:46', '13:41', 'طلب جديد', '2021-01-13'),
(41, 'س', 'سش', 'سش', 'سش', 'سش', NULL, 1, '02:33', '03:33', 'طلب جديد', '2021-01-23'),
(42, 'As', 'As', 'As', '2', '4', NULL, 18, '18:46', '18:46', 'طلب جديد', '2021-02-01');

-- --------------------------------------------------------

--
-- بنية الجدول `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` varchar(20) DEFAULT '0',
  `qty` varchar(20) DEFAULT '0',
  `total` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `order_items`
--

INSERT INTO `order_items` (`id`, `item_id`, `name`, `order_id`, `date`, `price`, `qty`, `total`) VALUES
(15, 299, 'سبانخ', 20, '2020-12-28', '5', '6', '30'),
(16, 283, 'خيار', 20, '2020-12-28', '5', '4', '20'),
(17, 279, 'جزر', 20, '2020-12-28', '5', '4.5', '22.5'),
(30, 134, 'طماطم ', 25, '2021-01-03', '5', '4', '20'),
(31, 283, 'خيار', 25, '2021-01-03', '5', '5', '25'),
(32, 280, 'كوسا', 25, '2021-01-03', '5', '3', '15'),
(33, 260, 'بذور الخردل (125)', 26, '2021-01-03', '31', '2', '62'),
(58, 528, 'بصل اخضر ', 39, '2021-01-13', '5', '3', '15'),
(60, 528, 'بصل اخضر ', 41, '2021-01-23', '5', '1', '5'),
(61, 545, 'Genuine Vacuum hose black بي ام دبليو 1 Series [ 2004-2013 ]', 42, '2021-02-01', '23', '28', '644');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `img` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `short_desc` varchar(255) CHARACTER SET ucs2 DEFAULT NULL,
  `price` varchar(60) NOT NULL,
  `price2` varchar(80) NOT NULL DEFAULT 'empty',
  `unite` varchar(60) NOT NULL,
  `unite2` varchar(80) DEFAULT 'empty',
  `Decimal_number` varchar(60) NOT NULL DEFAULT '1',
  `discount` varchar(60) NOT NULL,
  `order_product` int(11) DEFAULT NULL,
  `Additional_img` varchar(255) DEFAULT NULL,
  `Availability` varchar(60) NOT NULL DEFAULT 'متوفر فى المخزن',
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `best_seller` tinyint(4) NOT NULL DEFAULT 0,
  `new_arrivals` tinyint(4) NOT NULL DEFAULT 0,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `Deal_Of_Day` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `short_desc`, `price`, `price2`, `unite`, `unite2`, `Decimal_number`, `discount`, `order_product`, `Additional_img`, `Availability`, `category`, `subcategory`, `best_seller`, `new_arrivals`, `featured`, `Deal_Of_Day`) VALUES
(545, 'Genuine Vacuum hose black بي ام دبليو 1 Series [ 2004-2013 ]', '6193032.png', 'empty', 'empty', '23', 'empty', 'قطعة', 'empty', '1', '0', 0, NULL, 'متوفر فى المخزن', 20, 27, 1, 0, 0, 1),
(548, 'WINDA كاوتش 155/70 R13 - WP15 - | صيني', '4324322.png', 'empty', 'empty', '442', 'empty', 'فرده', 'empty', '1', '0', 0, NULL, 'متوفر فى المخزن', 24, 28, 1, 0, 0, 1),
(549, 'BRIDGESTONE 205/55 R17 91V - DHPS R كاوتش سيارة | أصلي', '2843366.png', 'empty', 'empty', '3681', 'empty', 'فرده', 'empty', '1', '0', 0, NULL, 'متوفر فى المخزن', 24, 28, 0, 0, 1, 0),
(550, 'BST وش فانوس شبورة شمال - مرسيدس C Class [ 2001 - 2007 ] | ص', '5566324.png', 'empty', 'empty', '60', 'empty', 'قطعه', 'empty', '1', '0', 0, NULL, 'متوفر فى المخزن', 25, 34, 0, 1, 0, 1),
(551, 'باغة خلفي - سوزوكي ماروتي [ 2000 - 2014 ] | هند', '9148864.jpg', 'empty', 'empty', '60', 'empty', 'قطعه', 'empty', '1', '0', 0, NULL, 'متوفر فى المخزن', 25, 35, 1, 1, 1, 1),
(552, 'TEPO فانوس خلفي داخلي - هيونداي النترا HD [ 2007 - 2011 ] | ', '9491039.jpg', 'empty', 'empty', '195', 'empty', 'قطعه', 'empty', '1', '0', 0, NULL, 'متوفر فى المخزن', 25, 35, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `shipping_cost` varchar(15) NOT NULL,
  `slide_speed` int(11) NOT NULL,
  `language` varchar(255) DEFAULT 'ar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`shipping_cost`, `slide_speed`, `language`) VALUES
('0', 2000, 'en');

-- --------------------------------------------------------

--
-- بنية الجدول `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `img` varchar(80) NOT NULL,
  `number` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `slides`
--

INSERT INTO `slides` (`id`, `img`, `number`, `url`) VALUES
(18, '6015713.jpg', 2, ''),
(19, '7437263.jpg', 1, '');

-- --------------------------------------------------------

--
-- بنية الجدول `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `category` int(60) NOT NULL,
  `img` varchar(60) NOT NULL,
  `category_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category`, `img`, `category_order`) VALUES
(27, 'كليبر فرامل', 20, '7605623.png', 0),
(28, 'ميشلان ', 24, '258615.png', 0),
(29, 'بريدجيستون Bridgestone', 24, '1839907.png', 0),
(30, 'بيرلي Pirelli', 24, '4673856.png', 0),
(31, 'كونتيننتال Continental', 24, '6432184.png', 0),
(32, 'هانكوك Hankook', 24, '1202189.png', 0),
(33, 'يوكوهاما Yokohama', 24, '8076404.png', 0),
(34, 'فوانيس شبورة', 25, '847383.jpg', 0),
(35, 'فانوس ستوب', 25, '8892052.png', 0),
(36, 'زيت فرامل', 26, '4026234.jpg', 0),
(37, 'زيت موتور', 26, '8202178.jpg', 0),
(38, 'زيت باور', 26, '9637395.jpg', 0),
(39, 'زيت فتيس', 26, '9390564.jpg', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `top_ads`
--

CREATE TABLE `top_ads` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `order_number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `top_ads`
--

INSERT INTO `top_ads` (`id`, `img`, `title`, `description`, `url`, `active`, `order_number`) VALUES
(1, 'banner-home-5.jpg', 'pick yout items', 'Adipiscing elit curabitur senectus sem\r\n', 'categories.php', 1, 0),
(2, 'banner-home-6.jpg', 'Best Of\r\nProducts', 'Cras pulvinar loresum dolor conse\r\n', 'categories.php', 1, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `translation`
--

CREATE TABLE `translation` (
  `id` int(11) NOT NULL,
  `key_id` int(11) NOT NULL,
  `word` varchar(255) DEFAULT NULL,
  `lang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `translation`
--

INSERT INTO `translation` (`id`, `key_id`, `word`, `lang`) VALUES
(3, 1, 'home', 2),
(4, 1, 'الرئيسية', 1),
(5, 2, 'account', 2),
(6, 2, 'حسابي', 1),
(7, 3, 'orders', 2),
(8, 3, 'طلباتى', 1),
(9, 4, 'contact us', 2),
(10, 4, 'اتصل بنا', 1),
(11, 5, 'language', 2),
(12, 5, 'اللغه', 1),
(13, 6, 'full name', 2),
(14, 6, 'الإسم كاملا', 1),
(15, 7, 'user information', 2),
(16, 7, 'بيانات المستخدم', 1),
(17, 8, 'change', 2),
(18, 8, 'تغيير', 1),
(19, 9, 'email', 2),
(20, 9, 'البريدالإلكترونى', 1),
(21, 10, 'phone number', 2),
(22, 10, 'رقم الهاتف', 1),
(23, 11, 'Status', 2),
(24, 11, 'الحالة', 1),
(25, 12, 'date', 2),
(26, 13, 'التاريخ', 1),
(27, 13, 'view', 2),
(28, 13, 'عرض', 1),
(29, 14, 'social media accounts', 2),
(30, 14, 'حسابات التواصل الإجتماعى', 1),
(31, 15, 'details', 2),
(32, 15, 'تفاصيل', 1),
(33, 16, ' quantity in', 2),
(34, 16, 'الكميه بـ', 1),
(35, 17, 'price', 2),
(36, 17, 'السعر', 1),
(37, 18, 'availability', 2),
(38, 18, 'الإتاحه', 1),
(39, 19, 'add to cart', 2),
(40, 19, 'اضف إلى السلة', 1),
(41, 20, 'total price', 2),
(42, 20, 'السعر الإجمالى', 1),
(43, 21, 'basket', 2),
(44, 21, 'سلة الشراء', 1),
(45, 22, 'total', 2),
(46, 22, 'الإجمالي', 1),
(47, 23, 'total order', 2),
(48, 23, 'اجمالي الطلبيه', 1),
(49, 24, 'completing order', 2),
(50, 24, 'استكمال الطلب', 1),
(51, 25, 'delivery cost', 2),
(52, 25, 'سعر التوصيل', 1),
(53, 26, 'finish order', 2),
(54, 26, 'اتمام الطلب', 1),
(55, 29, 'Time of receipt', 2),
(56, 29, 'وقت الإستلام', 2),
(57, 27, 'from', 2),
(58, 27, 'من', 1),
(59, 28, 'to', 2),
(60, 28, 'الى', 2),
(61, 30, 'Product', 2),
(62, 30, 'المنتج', 1),
(63, 31, 'your request has peen sent successfully', 2),
(64, 31, 'تم إرسال طلبك بنجاح', 1),
(65, 33, 'wlcome in Macdoos', 2),
(66, 33, 'مرحبا بك في macDoos', 1),
(67, 34, 'Login or Register', 2),
(68, 34, 'دخول أو تسجيل', 1),
(69, 35, 'All Categories', 2),
(70, 35, 'جميع الأقسام', 1),
(71, 37, 'logout', 2),
(72, 37, 'تسجيل الخروج', 1),
(73, 38, 'about', 2),
(74, 38, 'من نحن', 1),
(75, 39, 'Store policy', 2),
(76, 39, 'سياسة المتجر', 1),
(77, 40, NULL, 2),
(78, 40, 'كلمة المرور', 1),
(79, 41, 'login', 2),
(80, 41, 'دخول', 1),
(81, 42, 'signup', 2),
(82, 42, 'انشاء حساب', 1),
(83, 43, 'Best seller', 2),
(84, 43, 'الأكثر مبيعا', 1),
(85, 44, 'New Arrivals', 2),
(86, 44, 'وصل حديثا', 1),
(87, 45, 'Featured', 2),
(88, 45, 'متميز', 1),
(89, 36, ' Oure Products', 2),
(90, 36, 'منتجاتنا', 1),
(91, 46, 'deal of the day', 2),
(92, 46, 'صفقة اليوم', 1),
(93, 47, 'search here', 2),
(94, 47, 'ابحث هنا', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(39, 'قطعه'),
(40, 'فرده'),
(41, 'علبه'),
(42, 'واحده');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `permission` varchar(10) NOT NULL DEFAULT 'user',
  `phone_number` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `permission`, `phone_number`) VALUES
(1, 'محمد الشافعى', 'm@gmail.com', '4297f44b13955235245b2497399d7a93', 'admin', '01090250088'),
(17, 'محمد الشافعي سليمان', 'engelshafiy6@gmail.com', '9bca81711f05f209f9aa398777565444', 'user', '01090250088'),
(18, 'Ahmed', 'edsegypt@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', '01010475455');

-- --------------------------------------------------------

--
-- بنية الجدول `user_settings`
--

CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `language` varchar(30) NOT NULL DEFAULT 'ar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user_settings`
--

INSERT INTO `user_settings` (`id`, `user`, `language`) VALUES
(2, 1, 'en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart` (`product`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_subcategory` (`category`);

--
-- Indexes for table `top_ads`
--
ALTER TABLE `top_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translate_language` (`lang`),
  ADD KEY `trans_att` (`key_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_settings` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `top_ads`
--
ALTER TABLE `top_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `translation`
--
ALTER TABLE `translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_item` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategory` FOREIGN KEY (`subcategory`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `category_subcategory` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `translation`
--
ALTER TABLE `translation`
  ADD CONSTRAINT `trans_att` FOREIGN KEY (`key_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `translate_language` FOREIGN KEY (`lang`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `user_settings` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;