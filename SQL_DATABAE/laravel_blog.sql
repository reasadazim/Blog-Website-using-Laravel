-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 02:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(17, 'United States', '2019-07-01 14:07:22', '2019-07-01 14:07:22'),
(18, 'Australia', '2019-07-01 14:07:30', '2019-07-01 14:07:30'),
(19, 'Bangladesh', '2019-07-01 14:07:34', '2019-07-01 14:07:34'),
(20, 'India', '2019-07-01 14:07:37', '2019-07-01 14:07:37'),
(21, 'Egypt', '2019-07-01 14:07:43', '2019-07-01 14:07:43'),
(22, 'Switzerland', '2019-07-01 14:08:02', '2019-07-01 14:08:02'),
(23, 'Thailand', '2019-07-01 14:08:12', '2019-07-01 14:08:12'),
(24, 'Indonesia', '2019-07-01 14:08:24', '2019-07-01 14:08:24'),
(25, 'Malaysia', '2019-07-01 14:08:34', '2019-07-01 14:08:34'),
(26, 'United Kingdom', '2019-07-01 14:08:46', '2019-07-01 14:08:46'),
(27, 'Germany', '2019-07-01 14:08:50', '2019-07-01 14:08:50'),
(28, 'Netherlands', '2019-07-01 14:09:02', '2019-07-01 14:09:02'),
(29, 'Russia', '2019-07-01 14:09:24', '2019-07-01 14:09:24'),
(30, 'South Africa', '2019-07-01 14:09:32', '2019-07-01 14:09:32'),
(31, 'Austria', '2019-07-01 14:09:48', '2019-07-01 14:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(20) NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `parent_id`, `body`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'A', 35, 'App\\Posts', '2019-05-30 14:48:28', '2019-05-30 14:48:28'),
(2, 2, NULL, 'B', 35, 'App\\Posts', '2019-05-30 14:48:41', '2019-05-30 14:48:41'),
(7, 2, NULL, 's', 35, 'App\\Posts', '2019-05-30 14:53:34', '2019-05-30 14:53:34'),
(8, 2, 7, 'k', 35, 'App\\Posts', '2019-05-30 14:53:53', '2019-05-30 14:53:53'),
(13, 2, 8, 'df', 35, 'App\\Posts', '2019-05-30 14:55:40', '2019-05-30 14:55:40'),
(14, 2, 8, 'd', 35, 'App\\Posts', '2019-05-30 14:55:46', '2019-05-30 14:55:46'),
(15, 2, NULL, 'dd', 35, 'App\\Posts', '2019-05-30 14:56:04', '2019-05-30 14:56:04'),
(17, 2, NULL, 'df', 35, 'App\\Posts', '2019-05-30 14:56:12', '2019-05-30 14:56:12'),
(18, 2, NULL, 'sdf', 35, 'App\\Posts', '2019-05-30 14:56:15', '2019-05-30 14:56:15'),
(20, 1, NULL, 'A', 35, 'App\\Posts', '2019-05-30 15:41:43', '2019-05-30 15:41:43'),
(21, 1, 14, 'ASDasd', 35, 'App\\Posts', '2019-05-30 15:41:55', '2019-05-30 15:41:55'),
(22, 1, NULL, 'dfsdf', 35, 'App\\Posts', '2019-06-23 16:01:50', '2019-06-23 16:01:50'),
(25, 1, NULL, '1', 46, 'App\\Posts', '2019-07-01 15:57:01', '2019-07-01 15:57:01'),
(26, 1, NULL, '2', 46, 'App\\Posts', '2019-07-01 15:57:04', '2019-07-01 15:57:04'),
(27, 1, 25, '3', 46, 'App\\Posts', '2019-07-01 15:57:12', '2019-07-01 15:57:12'),
(28, 1, NULL, 'It is an awesome place!', 49, 'App\\Posts', '2019-07-02 04:47:32', '2019-07-02 04:47:32'),
(29, 2, 28, 'Totally agreed bro. I can still remember about our risk taker.', 49, 'App\\Posts', '2019-07-02 04:48:45', '2019-07-02 04:48:45'),
(30, 3, NULL, 'Ha ha ha', 49, 'App\\Posts', '2019-07-02 04:49:49', '2019-07-02 04:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `post_id`, `created_at`, `updated_at`) VALUES
(20, 'public/images/D6GTTYEmSCF4dHqjmhRjFMTT5UZMc1CAhxp8jnZv.jpeg', '39', '2019-07-01 14:12:53', '2019-07-01 14:12:53'),
(23, 'public/images/jc18VB5Llej5itdPlmdUFFTlG0KpBYfxqwoyJb6r.jpeg', '42', '2019-07-01 14:58:03', '2019-07-01 14:58:03'),
(24, 'public/images/zOBRwTGc6A9MqEQ0vYlq0pc37sLDOvHqB2HCcyjk.jpeg', '43', '2019-07-01 15:02:52', '2019-07-01 15:02:52'),
(26, 'public/images/ac63wuNjEVYZ1jVqvnHR4Xwx7eWgOPAByOZs5h2U.jpeg', '45', '2019-07-01 15:33:15', '2019-07-01 15:33:15'),
(27, 'public/images/8js0TZwQttOlgw4rg8UcD0yryBl8CILN91sLeoY4.jpeg', '46', '2019-07-01 15:36:11', '2019-07-01 15:36:11'),
(28, 'public/images/ijWxDejoc4q6hQ2l6B5OJ8wuwLe3WXDbUatqDkxQ.jpeg', '47', '2019-07-01 15:37:49', '2019-07-01 15:37:49'),
(29, 'public/images/Y8WI0Tn6I45dkpp454s2sGk2ZuCgziBEFunELVkO.jpeg', '48', '2019-07-01 15:42:38', '2019-07-01 15:42:38'),
(30, 'public/images/jRQxSIiOFNJM76EYtJ43hSgppCBXeaiw41E9rnjo.jpeg', '49', '2019-07-01 15:44:44', '2019-07-01 15:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_24_204040_create_posts_table', 1),
(6, '2019_05_24_204136_create_images_table', 1),
(14, '2019_05_29_094423_create_comments_table', 2),
(15, '2019_05_24_204118_create_categories_table', 3),
(16, '2019_05_24_204100_create_tags_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_description`, `user_id`, `category_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(39, 'Bryce Canyon National Park', 'Bryce Canyon is not a single canyon, but a series of natural amphitheaters or bowls, carved into the edge of a high plateau. The most famous of these is the Bryce Amphitheater (pictured below), which is filled with irregularly eroded spires of rocks called hoodoos. Perhaps every visitor to the park will spend at least some time marvelling at its four main viewpoints, all found within the first few miles of the park: Bryce Point, Inspiration Point, Sunset Point, and Sunrise Point. Between April and October a shuttle service is operated in this area of the park to reduce congestion.<br /><br />Other viewpoints are found all along the park\'s 18-mile main road which travels from park\'s only entrance in the north along the plateau rim to its highest elevations in the south (over 9,000 ft / 2,743 m). Hiking trails explore the forests of the plateau, connect between viewpoints along the rim of the Bryce Amphitheater, and wander through the hoodoos below.<br /><br />Deepen your understanding of the park by attending a ranger program, whether it be a daily geology talk, rim walk, evening program, astronomy program, or full moon hike. Be sure to ask about our Jr. Ranger Program at the visitor information desk. Concessionaire-provided horseback rides are another way to experience Bryce Canyon during the summer season. There are activities for everyone!<br /><br />Bryce Canyon offers two campground sites (one in winter) and lodging is available at the Bryce Canyon Lodge during the summer season. During winter, hotel rooms are available in the park at the Sunset Hotel.<br /><br />Explore the park map to begin familiarizing yourself with the layout of this special place.', 1, 'United States', 'a:2:{i:0;s:4:\"Utah\";i:1;s:13:\"National park\";}', '2019-07-01 14:12:53', '2019-07-01 14:45:13'),
(42, 'Everything You Need to Know About Pattaya', 'Pattaya is always switched on and fun. This vibrant coastal city shot to fame in early 1980s, and stayed there. From sunrise to sunset, Pattaya&amp;rsquo;s beaches are constantly brimming with life, as water sports lovers and sun worshippers take to the waters. After dark, the action shifts to the streets, as revellers explore its electrified nightlife scene, where drinking and partying continue until dawn.&lt;br /&gt;&lt;br /&gt;Apart from water sports and nightlife, Pattaya offers endless possibilities when it comes to accommodation and entertainment. It has outgrown its image as a seedy beach town to a destination for a wider audience; whether couples, families or business travellers, Pattaya has something for everyone. Only 147km from Bangkok, Pattaya is the closest of Thailand\'s major beach resorts to the capital city.', 1, 'Thailand', 'a:1:{i:0;s:7:\"Pattaya\";}', '2019-07-01 14:58:02', '2019-07-01 15:00:21'),
(43, 'Palm Cove', 'Palm Cove is located in Far North Queensland on the Australian coast. It has a long sandy beach along most of its seafront except for the rocky headland around Buchan Point in the north of the suburb.&lt;br /&gt;&lt;br /&gt;Arlington Reef is the closest section of The Great Barrier Reef to Palm Cove being around 30 kilometres (19 mi) offshore. The reef shelters the inshore waters from the Coral Sea swells creating relatively calm waters between the reef and the beach. To the west of Palm Cove is the Macalister Range National Park which is part of the Wet Tropics World Heritage Area.&lt;br /&gt;&lt;br /&gt;Since Palm Cove is located in a tropical climate, the average summer temperature is between 24 and 33 degrees Celsius; average winter temperature is between 14 and 26 degrees Celsius.&lt;br /&gt;&lt;br /&gt;The town of Buchan is within the Palm Cove locality,but the use of the name Buchan has fallen into disuse over the years.', 1, 'Australia', 'a:2:{i:0;s:6:\"Cairns\";i:1;s:9:\"Palm Cove\";}', '2019-07-01 15:02:52', '2019-07-01 15:02:52'),
(45, 'Pyramids of Giza', 'The last surviving of the Seven Wonders of the Ancient World, the Pyramids of Giza are one of the world\'s most recognizable landmarks. Built as tombs for the mighty Pharaohs and guarded by the enigmatic Sphinx, Giza\'s pyramid complex has awed travelers down through the ages and had archaeologists (and a fair few conspiracy theorists) scratching their heads over how they were built for centuries.&lt;br /&gt;&lt;br /&gt;Today, these megalithic memorials to dead kings are still as wondrous a sight as they ever were. An undeniable highlight of any Egypt trip, Giza\'s pyramids should not be missed.', 1, 'Egypt', 'a:2:{i:0;s:4:\"Giza\";i:1;s:7:\"Pyramid\";}', '2019-07-01 15:33:14', '2019-07-01 15:33:14'),
(46, 'Karnak Temple', 'Famed for the Valley of the Kings, Karnak Temple, and the Memorial Temple of Hatshepsut, the Nile-side town of Luxor in Upper Egypt has a glut of tourist attractions. This is ancient Thebes, power base of the New Kingdom pharaohs, and home to more sights than most can see on one visit.&lt;br /&gt;&lt;br /&gt;While the East Bank brims with vibrant souk action, the quieter West Bank is home to a bundle of tombs and temples that has been called the biggest open-air museum in the world. Spend a few days here exploring the colorful wall art of the tombs and gazing in awe at the colossal columns in the temples, and you\'ll see why Luxor continues to fascinate historians and archaeologists.', 1, 'Egypt', 'a:2:{i:0;s:6:\"Temple\";i:1;s:6:\"Karnak\";}', '2019-07-01 15:36:11', '2019-07-01 15:36:11'),
(47, 'The Matterhorn', 'The Matterhorn, Switzerland\'s iconic pointed peak is one of the highest mountains in the Alps. On the border with Italy, this legendary peak rises to 4,478 meters, and its four steep faces lie in the direction of the compass points. The first summiting in 1865 ended tragically when four climbers fell to their death during the descent. Today, thousands of experienced climbers come here each summer.&lt;br /&gt;&lt;br /&gt;At the foot of this mighty peak, lies the charming village of Zermatt, a top international resort with horse-drawn carriage rides, quaint chalets, and world-class restaurants and hotels. To preserve the air quality and peaceful ambiance, motorized vehicles are banned in the village. In the winter, skiers can schuss down more than 300 kilometers of slopes. In the summer, swimming and tennis are popular pursuits as well as hiking, biking, and climbing in the surrounding mountains. Summer glacier skiing is also available.', 1, 'Switzerland', 'a:1:{i:0;s:10:\"Matterhorn\";}', '2019-07-01 15:37:48', '2019-07-01 15:37:48'),
(48, 'Longest sea beach in the world', 'Cox\'s Bazar sea beach is the longest sea beach in the world, 120 km long, having no 2nd instance. The wavy water of Bay of Bengal touches the beach throughout this 120 km.&lt;br /&gt;&lt;br /&gt;For Bangladeshi\'s it doesn\'t get much better than Cox\'s Bazar, the country\'s most popular beach town than the other one \'Kuakata beach town. It\'s sort of a Cancun of the east. It\'s choc-a-bloc with massive well-architectured concrete structures, affluent 5 &amp;amp; 3 star hotels, catering largely to the country\'s elite and overseas tourists. The beach is only a bit crowded in tourist season, October to March, especially near the hotel-motel zone, but remains virgin during the rest of the year, April to September, when it\'s better to take a trip there.&lt;br /&gt;&lt;br /&gt;The part of the 120 km beach is named differently having diversified flora &amp;amp; fauna. It starts with \'Laboni Beach,\' Sughandha Beach\' within the Cox\'s Bazar region and 10 km south is known as \'Himchari Beach\',30 km fur known as \'Inani Beach\' and more 70 km off is the \'Teknaf Beach\'. Things should be quieter here, but still expect to draw great attention. The entire 120 km beach can be traveled in one go by motorbike. The more one gets into the south, the more the ocean water becomes blue.', 1, 'Bangladesh', 'a:2:{i:0;s:11:\"Cox\'s Bazar\";i:1;s:9:\"Sea Beach\";}', '2019-07-01 15:42:38', '2019-07-01 15:42:38'),
(49, 'Only coral island in Bangladesh', 'St Martin\'s is a tropical clich&amp;eacute; and the only coral island in Bangladesh, with beaches fringed with coconut palms and laid-back locals. It\'s a clean and peaceful place with nothing more strenuous to do than soak up the rays &amp;mdash; even mosquitoes are a rarity. There\'s a naval base near the centre of the island, and the USA looked into setting up one of their own a few years back. The island was devastated by a cyclone in 1991 but has fully recovered, and was untouched by the 2004 tsunami.&lt;br /&gt;&lt;br /&gt;It is possible to walk around St Martin\'s in a day since it measures only 8 km&amp;sup2;, shrinking to about 5 km&amp;sup2; during high tide. Most of the island\'s 7000 inhabitants live primarily from fishing, and between October and April, fishermen from neighbouring areas bring their catch to the island\'s temporary wholesale market also most of the tourists visit this place mostly in winter. Rice and coconuts are the other staple crops, and algae are collected and dried from the sea rocks and sold for consumption to Myanmar.&lt;br /&gt;&lt;br /&gt;Most things are concentrated around the far north of the island, with the centre and south being mostly farmland and makeshift huts. There is no electricity on the island, though the larger hotels run generators in the evenings for a few hours.&lt;br /&gt;&lt;br /&gt;November to February is the main tourist season with the best weather, though keep an eye on the forecast, as the occasional cyclone can strike during this time.', 1, 'Bangladesh', 'a:2:{i:0;s:9:\"Sea Beach\";i:1;s:6:\"Island\";}', '2019-07-01 15:44:44', '2019-07-01 15:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `created_at`, `updated_at`) VALUES
(14, 'Utah', '2019-07-01 14:10:32', '2019-07-01 14:10:32'),
(15, 'National park', '2019-07-01 14:10:35', '2019-07-01 14:10:35'),
(16, 'Pattaya', '2019-07-01 14:57:31', '2019-07-01 14:57:31'),
(17, 'Cairns', '2019-07-01 15:01:31', '2019-07-01 15:01:31'),
(18, 'Palm Cove', '2019-07-01 15:02:03', '2019-07-01 15:02:03'),
(19, 'Lucerne', '2019-07-01 15:04:39', '2019-07-01 15:04:39'),
(20, 'Giza', '2019-07-01 15:31:39', '2019-07-01 15:31:39'),
(21, 'Pyramid', '2019-07-01 15:31:45', '2019-07-01 15:31:45'),
(22, 'Temple', '2019-07-01 15:34:01', '2019-07-01 15:34:01'),
(23, 'Karnak', '2019-07-01 15:34:25', '2019-07-01 15:34:25'),
(24, 'Matterhorn', '2019-07-01 15:36:59', '2019-07-01 15:36:59'),
(25, 'Cox\'s Bazar', '2019-07-01 15:40:15', '2019-07-01 15:40:15'),
(26, 'Sea Beach', '2019-07-01 15:40:23', '2019-07-01 15:40:23'),
(27, 'Island', '2019-07-01 15:44:04', '2019-07-01 15:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'A M Reasad', 'Azim Bappy', 'A M Reasad Azim Bappy', 'riasadazim@gmail.com', 'administrator', NULL, '$2y$10$Z54NFPk7Oi6VNIMqaGhkZOwhPgJKd1YBh7u3tzDt4rvAuQtt0Tafy', NULL, '2019-05-25 06:20:25', '2019-05-25 06:20:25'),
(2, 'Bishal', 'Peter', 'Bishal Peter', 'bpd@gmail.com', 'administrator', NULL, '$2y$10$bmWhr0k2Idvsfv4z2E71H.FGpmtY7Ld1VMraejOBrBIdRJ6LIaKqG', 's3tOSpnHvqy1wqyzekjop5W8a6yyslzVlJQY6CjngS7LAYyMl8mpYIU5CQ7c', '2019-05-28 11:40:28', '2019-05-28 11:40:28'),
(3, 'Mahbubul', 'Alam', 'Mahbubul Alam', 'mahboob@gmail.com', 'administrator', NULL, '$2y$10$nNQ/RW0vE8NJIfRyyt4xcubHlLkAyx7VJWpOPm80zTVt/qR3MMsJG', NULL, '2019-07-01 16:13:04', '2019-07-01 16:13:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_name_unique` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
