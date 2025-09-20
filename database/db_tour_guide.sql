-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2025 at 11:42 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tour_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$12$OA15NC8WaHzIS5UItdGoduvuuBkl0zrhPlMbkzW7fZByh7jC10Yxu', '2025-08-09 05:51:23', '2025-08-09 05:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `paket_id` bigint NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_waktu` date NOT NULL,
  `jumlah_orang` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','confirmed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `paket_id`, `nama_lengkap`, `no_telepon`, `alamat`, `email`, `tanggal_waktu`, `jumlah_orang`, `message`, `status`, `created_at`, `updated_at`) VALUES
(68, 2, 13, 'valen', '089288887777', 'jln rambutan', 'valen@gmail.com', '2025-09-11', 1, NULL, 'confirmed', '2025-09-10 18:22:18', '2025-09-10 18:25:07'),
(69, 4, 10, 'febri', '089288887777', 'talang jaya', 'febri@gmail.com', '2025-09-19', 1, NULL, 'confirmed', '2025-09-16 18:50:55', '2025-09-16 18:52:14'),
(70, 4, 15, 'crizz', '089765435678', 'palembang', 'crizz@gmail.com', '2025-09-18', 1, 'jakak', 'confirmed', '2025-09-16 19:03:12', '2025-09-16 19:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Nabil', 'Maulana', 'nabil@gmail.com', 'saya mau pesen gigi hiu', '2025-08-06 19:00:04', '2025-08-06 19:00:04'),
(3, 'Nabil', 'Maulani', 'valen@gmail.com', 'iy', '2025-08-12 17:40:18', '2025-08-12 17:40:18'),
(4, 'Nabil', 'Maulana', 'nabil@gmail.com', 'vvv', '2025-08-19 18:45:07', '2025-08-19 18:45:07'),
(5, 'Nabil', 'Maulana', 'nabil@gmail.com', 'mantepp', '2025-09-16 18:53:26', '2025-09-16 18:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_status` enum('unpaid','paid','expired','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `admin_confirm` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Apakah admin sudah mengkonfirmasi pembayaran?',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `booking_id`, `total_amount`, `payment_status`, `admin_confirm`, `created_at`, `updated_at`) VALUES
(59, 'INV-20250911-0068', 68, 475000.00, 'paid', 1, '2025-09-10 18:22:18', '2025-09-10 18:25:07'),
(60, 'INV-20250917-0069', 69, 1000000.00, 'paid', 1, '2025-09-16 18:50:55', '2025-09-16 18:52:14'),
(61, 'INV-20250917-0070', 70, 12000000.00, 'paid', 1, '2025-09-16 19:03:12', '2025-09-16 19:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `id_itinerary` bigint UNSIGNED NOT NULL,
  `paket_id` bigint UNSIGNED NOT NULL,
  `day` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`id_itinerary`, `paket_id`, `day`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(7, 9, 1, 'Sambutan dan Santai di Ambon', 'Peserta dijemput pagi hari di bandara atau hotel di Kota Ambon. Perjalanan dimulai dengan kunjungan ke Pantai Liang, tempat peserta dapat bersantai, bermain di pasir putih, dan menikmati air laut yang jernih. Makan siang disajikan di restoran lokal dengan menu khas Maluku. Sore harinya, kunjungan ke Benteng Amsterdam, salah satu situs sejarah peninggalan Belanda, sambil menikmati panorama kota dan laut.', '2025-08-24 05:46:10', '2025-09-02 07:02:28'),
(8, 10, 1, 'Eksplorasi Alam, Sejarah, dan Budaya Maluku', 'Perjalanan dimulai pagi hari dengan penjemputan di hotel atau titik kumpul di Kota Ambon sekitar pukul 07.00 WIB. Dari sini, perjalanan menuju Pantai Liang, tempat Anda bisa menikmati pasir putih lembut dan air laut jernih, sekaligus berfoto dan bersantai menikmati suasana pantai yang tenang. Setelah itu, perjalanan dilanjutkan ke Benteng Amsterdam, salah satu peninggalan sejarah Belanda, di mana Anda dapat melihat arsitektur kuno sekaligus menikmati panorama kota dan laut dari ketinggian. Makan siang disajikan di restoran lokal dengan menu khas Maluku, memberikan pengalaman kuliner yang autentik dan lezat. Sore hari, Anda akan diajak ke Pantai Natsepa untuk menikmati keindahan sunset dan bermain air, sebelum menuju penginapan yang nyaman untuk check-in. Malam harinya, Anda dapat menikmati makan malam khas Maluku dan beristirahat, bersiap untuk kegiatan pagi berikutnya.\r\n\r\nKeesokan paginya, setelah sarapan di penginapan sekitar pukul 07.00–08.00 WIB, perjalanan dilanjutkan dengan kunjungan singkat ke Pasar Mardika untuk membeli oleh-oleh khas Maluku. Sekitar pukul 10.00 WIB, peserta tour akan diantar kembali ke hotel atau titik penjemputan di Kota Ambon, menandai akhir paket tour 1 hari 1 malam yang penuh pengalaman dan kenangan.', '2025-08-30 17:59:51', '2025-08-30 17:59:51'),
(9, 9, 2, 'Eksplorasi Pulau dan Budaya Lokal', 'Pagi hari setelah sarapan, peserta diajak ke Pulau Pombo untuk snorkeling, berenang, atau menikmati keindahan laut. Siang hari dilanjutkan ke Desa Nelayan Tulehu, untuk menyaksikan kehidupan dan budaya masyarakat lokal. Makan siang disajikan dengan menu khas Maluku. Sore hari, kunjungan ke Pantai Natsepa untuk menikmati sunset dan bersantai. Malam kedua, kembali ke penginapan, makan malam, dan beristirahat.', '2025-08-30 18:02:35', '2025-08-30 18:02:35'),
(10, 9, 3, 'Petualangan Alam dan Belanja Oleh-oleh', 'Pagi hari setelah sarapan, perjalanan dilanjutkan ke Pulau Seram atau destinasi alam lain untuk trekking ringan atau berfoto di pemandangan alam yang memukau. Makan siang disajikan di lokasi wisata atau restoran lokal. Sore hari, peserta diajak singgah di Pasar Mardika untuk membeli oleh-oleh khas Maluku. Malam ketiga, kembali ke penginapan untuk makan malam terakhir dan menikmati suasana malam di Ambon sebelum beristirahat.', '2025-08-30 18:03:03', '2025-08-30 18:03:03'),
(11, 9, 4, 'Penutupan dan Kembali ke Kota Asal', 'Pagi hari setelah sarapan, peserta check-out dari penginapan dan diantar kembali ke bandara atau hotel di Ambon, menutup pengalaman tour 3 hari 3 malam yang lengkap dan penuh kenangan.', '2025-08-30 18:03:27', '2025-08-30 18:04:46'),
(12, 10, 2, 'Sarapan dan Penutupan', 'Pagi hari, setelah sarapan di penginapan, peserta melakukan check-out. Sebelum kembali ke hotel atau bandara di Ambon, singgah sejenak di Pasar Mardika untuk membeli oleh-oleh khas Maluku. Perjalanan berakhir siang hari, menutup pengalaman tour 1 hari 1 malam yang singkat namun berkesan.', '2025-08-30 18:04:14', '2025-08-30 18:04:14'),
(13, 12, 1, 'Sambutan dan Santai di Bandar Lampung', 'Peserta dijemput pagi hari di bandara atau hotel Bandar Lampung. Perjalanan dimulai dengan kunjungan ke Pantai Mutun, menikmati pasir putih, air laut jernih, dan wahana permainan air. Makan siang disajikan di restoran lokal dengan menu khas Lampung. Sore hari, kunjungan ke Kebun Teh Rancabali atau Bukit Barisan untuk menikmati panorama alam pegunungan dan udara segar. Malam pertama diisi check-in di penginapan, makan malam khas Lampung, dan beristirahat.', '2025-08-30 18:16:46', '2025-08-30 18:16:46'),
(14, 12, 2, 'Eksplorasi Pulau dan Budaya Lokal', 'Pagi hari setelah sarapan, peserta menuju Pulau Pahawang untuk snorkeling, berenang, dan menikmati keindahan laut. Siang hari, kunjungan ke Desa Nelayan untuk belajar tentang kehidupan dan budaya masyarakat lokal. Makan siang disajikan dengan menu khas lokal. Sore hari, kembali ke penginapan dan singgah di Pantai Klara atau destinasi lain untuk sunset. Malam kedua, makan malam di penginapan dan waktu bebas untuk bersantai.', '2025-08-30 18:17:01', '2025-08-30 18:17:01'),
(15, 12, 3, 'Petualangan Alam dan Belanja Oleh-oleh', 'Pagi hari, setelah sarapan, peserta dapat melakukan trekking ringan di Gunung Betung atau destinasi alam lain untuk berfoto dan menikmati udara segar. Makan siang disajikan di restoran lokal. Sore hari, peserta singgah di Pasar Oleh-Oleh Lampung untuk membeli kerajinan dan makanan khas daerah. Malam ketiga, kembali ke penginapan untuk makan malam terakhir dan istirahat.', '2025-08-30 18:17:17', '2025-08-30 18:17:17'),
(16, 12, 4, 'Penutupan dan Kembali ke Kota Asal', 'Pagi hari, setelah sarapan, peserta check-out dari penginapan dan diantar ke bandara atau hotel di Bandar Lampung, menutup pengalaman tour 3 hari 3 malam yang lengkap dan berkesan.', '2025-08-30 18:17:36', '2025-08-30 18:17:36'),
(17, 13, 1, 'Eksplorasi Pantai dan Pulau', 'Pagi hari, peserta dijemput di bandara atau hotel Bandar Lampung. Perjalanan dimulai menuju Pantai Mutun, menikmati pasir putih dan wahana air. Makan siang disajikan di restoran lokal dengan menu khas Lampung. Sore hari, peserta menuju Pulau Pahawang untuk snorkeling dan menikmati keindahan laut. Malam pertama diisi dengan check-in di penginapan, makan malam, dan istirahat.', '2025-08-30 18:55:07', '2025-08-30 18:55:07'),
(18, 13, 2, 'Budaya, Belanja Oleh-oleh, dan Penutupan', 'Pagi hari, setelah sarapan, peserta mengunjungi Desa Nelayan untuk belajar budaya dan kehidupan masyarakat lokal. Perjalanan dilanjutkan ke Pasar Oleh-Oleh Lampung untuk membeli kerajinan dan kuliner khas daerah. Setelah itu, peserta diantar kembali ke hotel atau bandara, menutup perjalanan 2 hari 1 malam yang menyenangkan.', '2025-08-30 18:55:33', '2025-08-30 18:55:33'),
(19, 11, 1, 'Kedatangan & Eksplorasi Wisata Lampung', 'Tiba di Bandara/Stasiun/Meeting Point Lampung, peserta dijemput lalu menuju destinasi wisata pilihan (misalnya Pantai Mutun & Pahawang). Setelah itu check-in di penginapan, istirahat dan acara bebas.', '2025-09-02 06:29:02', '2025-09-02 06:29:17'),
(20, 11, 2, 'Sarapan & Penutupan', 'Pagi hari peserta sarapan di penginapan. Dilanjutkan acara singkat seperti belanja oleh-oleh khas Lampung. Setelah check-out, peserta diantar kembali ke bandara/stasiun/meeting point untuk kepulangan.', '2025-09-02 06:29:32', '2025-09-02 06:29:32'),
(21, 14, 1, 'Kedatangan dan Welcome:', 'Peserta akan dijemput di titik kedatangan, baik bandara atau stasiun. Pagi dan siang digunakan untuk registrasi di hotel dan istirahat sejenak. Sore hari diisi dengan sesi ice-breaking ringan dan orientasi kegiatan selama di Jakarta. Malam harinya, peserta menikmati welcome dinner bersama tim di hotel atau restoran setempat.', '2025-09-02 07:06:59', '2025-09-02 07:06:59'),
(22, 14, 2, 'Team Building dan City Experience', 'Pagi hari dimulai dengan sesi meeting atau workshop untuk perusahaan. Menjelang siang, peserta mengikuti kegiatan team building yang interaktif dan menyenangkan. Sore hari diisi dengan city tour Jakarta untuk menikmati landmark terkenal dan spot menarik. Malam hari kembali ke hotel untuk free time atau networking dinner.', '2025-09-02 07:07:16', '2025-09-02 07:07:16'),
(23, 14, 3, 'Santai dan Kepulangan', 'Pagi hari digunakan untuk santai di hotel, menikmati fasilitas atau coffee session antar tim. Menjelang siang, peserta dapat menikmati wisata ringan seperti Kota Tua atau museum di Jakarta. Siang hari dilanjutkan dengan persiapan kepulangan dan transportasi ke bandara atau stasiun.', '2025-09-02 07:07:33', '2025-09-02 07:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_30_004724_create_user_table', 2),
(7, '2025_08_03_090958_create_daerah_table', 3),
(8, '2025_08_03_091020_create_tour_table', 3),
(9, '2025_08_07_013711_create_contacts_table', 4),
(10, '2025_08_07_130312_create_price_table', 5),
(11, '2025_08_08_150749_create_tour_categories_table', 6),
(12, '2025_08_08_151206_create_bookings_table', 7),
(13, '2025_08_09_034531_create_invoice_table', 8),
(14, '2025_08_09_060412_create_admin_table', 9),
(15, '2025_08_10_031719_add_user_id_to_bookings_table', 10),
(16, '2025_08_21_015951_create_paket_tour_table', 11),
(17, '2025_08_21_020110_create_paket_tour_detail_table', 11),
(18, '2025_08_23_120028_create_itinerary_table', 12),
(19, '2025_08_23_124455_add_status_to_bookings_table', 13),
(20, '2025_08_24_103303_add_tipe_harga_to_paket_tour_table', 14),
(21, '2025_08_24_125919_add_admin_confirm_to_invoices_table', 15),
(22, '2025_08_24_132654_add_admin_confirm_to_invoices_table', 16),
(23, '2025_09_02_125601_add_no_telepon_to_bookings_table', 17),
(24, '2025_09_02_133640_add_alamat_to_bookings_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `paket_tour`
--

CREATE TABLE `paket_tour` (
  `id_paket` bigint UNSIGNED NOT NULL,
  `tour_id` int DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(12,2) NOT NULL,
  `tipe_harga` enum('per_orang','per_paket') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'per_orang',
  `jumlah_fix` int DEFAULT NULL,
  `durasi_hari` int NOT NULL,
  `durasi_malam` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket_tour`
--

INSERT INTO `paket_tour` (`id_paket`, `tour_id`, `kategori_id`, `nama_paket`, `deskripsi`, `harga`, `tipe_harga`, `jumlah_fix`, `durasi_hari`, `durasi_malam`, `gambar`, `created_at`, `updated_at`) VALUES
(9, 18, 2, 'Paket 3H 3M Maluku', 'Rasakan pesona Maluku selama 3 hari 3 malam dengan paket tour yang dirancang untuk memberikan pengalaman wisata lengkap. Paket ini menawarkan kombinasi eksplorasi alam, pantai eksotis, situs sejarah, budaya lokal, serta kuliner khas Maluku. Dengan transportasi nyaman, pemandu profesional, dan akomodasi strategis, perjalanan ini cocok untuk wisata keluarga, teman, maupun pasangan yang ingin liburan santai tapi berkesan.', 8000000.00, 'per_paket', 4, 3, 3, '1756816338_bandaneira.jpeg', '2025-08-24 03:47:52', '2025-09-02 05:32:18'),
(10, 18, 3, 'Paket 1H 1M Maluku', 'Nikmati keindahan Maluku dalam paket tour 1 hari 1 malam yang menyenangkan dan penuh pengalaman. Paket ini dirancang khusus untuk Anda yang ingin menjelajahi destinasi ikonik, menikmati panorama alam, budaya lokal, serta kuliner khas Maluku tanpa perlu repot merencanakan perjalanan. Dengan fasilitas transportasi nyaman, pemandu profesional, dan akomodasi yang strategis, perjalanan Anda akan lebih seru dan berkesan. Cocok untuk wisata keluarga, pasangan, atau teman-teman yang ingin liburan singkat tapi memuaskan.', 1000000.00, 'per_orang', NULL, 1, 1, '1756816347_1756816338_bandaneira.jpeg', '2025-08-24 03:49:31', '2025-09-02 06:27:12'),
(11, 19, 3, 'Paket 1H 1M Lampung', 'Nikmati keindahan Lampung dalam paket tour singkat 1 hari 1 malam yang menyenangkan. Paket ini menghadirkan kombinasi eksplorasi alam, pantai, wisata budaya, serta kuliner khas Lampung. Dengan transportasi nyaman, pemandu profesional, dan akomodasi strategis, perjalanan ini cocok untuk wisata singkat bersama keluarga, teman, maupun pasangan.', 125000.00, 'per_orang', NULL, 1, 1, '1756602491_1754529762_gigihiu.jpeg', '2025-08-30 18:08:11', '2025-08-30 18:08:11'),
(12, 19, 3, 'Paket 3H 3M Lampung', 'Rasakan pengalaman liburan lengkap di Lampung selama 3 hari 3 malam dengan paket tour yang dirancang untuk memberikan kenyamanan dan keseruan. Paket ini menawarkan eksplorasi pantai eksotis, destinasi alam pegunungan, situs budaya dan sejarah, serta kuliner khas Lampung. Dengan transportasi nyaman, pemandu profesional, dan akomodasi strategis, perjalanan ini cocok untuk wisata keluarga, teman, maupun pasangan yang ingin liburan santai tapi berkesan.', 1000000.00, 'per_orang', NULL, 3, 3, '1756602981_1754529762_gigihiu.jpeg', '2025-08-30 18:16:21', '2025-08-30 18:16:21'),
(13, 19, 3, 'Paket 2H 1M Lampung', 'Nikmati keindahan Lampung dalam paket tour 2 hari 1 malam yang dirancang untuk memberikan pengalaman santai tapi lengkap. Paket ini menghadirkan kombinasi pantai eksotis, pulau-pulau indah, kuliner khas, dan budaya lokal. Dengan transportasi nyaman, pemandu profesional, dan akomodasi strategis, perjalanan ini cocok untuk wisata keluarga, teman, maupun pasangan.', 475000.00, 'per_orang', NULL, 2, 1, '1756605281_1754529762_gigihiu.jpeg', '2025-08-30 18:54:41', '2025-08-30 18:54:41'),
(14, 20, 7, 'Paket 3H 2M Jakarta', 'Nikmati pengalaman corporate getaway di Jakarta yang memadukan meeting, team building, dan wisata kota. Paket ini dirancang untuk perusahaan yang ingin menggabungkan kerja, relaksasi, dan kegiatan bonding antar tim. Semua akomodasi, transportasi, dan kegiatan terjadwal termasuk dalam paket ini.', 5500000.00, 'per_orang', NULL, 3, 2, '1756821987_monas.jpeg', '2025-09-02 07:06:27', '2025-09-02 07:06:27'),
(15, 22, 3, 'paket 7H 5M', 'paket raja ampat papua', 12000000.00, 'per_orang', NULL, 7, 5, '1758074495_gambar1.jpg', '2025-09-16 19:01:35', '2025-09-16 19:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4QqhMSvr9TsoUNewxPxlRr1HJ8J0FEnBI7Yo8Mqh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUkFhY0tZMlBPOUtqMjVMZlkwZUI4cUtKS3czZVJGMlFPcEtoQ1dTTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQvbGFwb3Jhbl9ib29raW5nL2NldGFrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyOiJpZCI7aTo0O3M6NDoibmFtZSI7czo2OiJraGFuc2EiO3M6ODoiYWRtaW5faWQiO2k6MTtzOjEwOiJhZG1pbl9uYW1lIjtzOjU6IkFkbWluIjt9', 1758075435);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id_tour` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_daerah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id_tour`, `gambar`, `nama_daerah`, `deskripsi`, `created_at`, `updated_at`) VALUES
(18, '1756817199_1756816338_bandaneira.jpeg', 'Maluku', 'Nikmati pantai berpasir putih, laut biru jernih, dan terumbu karang yang memukau. Jelajahi desa tradisional, budaya lokal, dan kuliner khas Maluku. Rasakan pengalaman berlayar di antara pulau-pulau eksotis serta menyusuri jejak sejarah kolonial yang menarik.', '2025-08-23 07:18:00', '2025-09-02 05:46:39'),
(19, '1756602374_1755744807_1754529762_gigihiu.jpeg', 'Lampung', 'Nikmati keindahan Lampung dalam paket tour yang dirancang untuk memberikan pengalaman wisata lengkap dan menyenangkan. Dalam perjalanan ini, Anda akan menjelajahi pantai-pantai eksotis, menikmati panorama alam pegunungan hijau, serta merasakan kuliner khas Lampung yang lezat. Paket ini juga menghadirkan kesempatan untuk mengenal budaya lokal dan membeli oleh-oleh khas daerah. Dengan transportasi nyaman, pemandu profesional, dan akomodasi strategis, liburan Anda akan lebih mudah, santai, dan berkesan, cocok untuk wisata keluarga, pasangan, maupun teman-teman.', '2025-08-30 18:06:14', '2025-08-30 18:06:14'),
(20, '1756821931_monas.jpeg', 'Jakarta', 'Jakarta, ibu kota Indonesia, memadukan budaya dan modernitas. Peserta bisa mengunjungi Monas, Kota Tua, pusat perbelanjaan, dan menikmati kuliner khas Betawi. Kota ini cocok untuk wisata, bisnis, dan pengalaman budaya yang berkesan.', '2025-09-02 07:05:31', '2025-09-02 07:05:31'),
(21, '1756862947_candiprambanan.jpeg', 'Yogyakarta', 'tes', '2025-09-02 18:29:07', '2025-09-02 18:29:07'),
(22, '1758074387_gambar1.jpg', 'papua', 'raja ampat', '2025-09-16 18:59:47', '2025-09-16 18:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `tour_categories`
--

CREATE TABLE `tour_categories` (
  `id_categories` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kategori` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_categories`
--

INSERT INTO `tour_categories` (`id_categories`, `nama_kategori`, `deskripsi_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Honeymoon', 'Paket romantis untuk pasangan yang ingin berbulan madu.', NULL, NULL),
(2, 'Family', 'Paket liburan yang cocok untuk keluarga.', NULL, NULL),
(3, 'Private', 'Paket eksklusif untuk perjalanan pribadi.', NULL, NULL),
(7, 'Corporate', 'cocok untuk instansi seperti kantor,sekolah,dll', '2025-09-02 06:34:39', '2025-09-02 06:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'valen', 'valen@gmail.com', NULL, '$2y$12$38Dy5aRpGof28istM.VqqOL8xAX7zHOD7FxRBjBXONzvqMmBFX1ky', NULL, '2025-08-08 23:01:55', '2025-08-08 23:01:55'),
(3, 'Nabil', 'nabil@gmail.com', NULL, '$2y$12$yYBKHxJvVjStYUkxjAo60.LyGsGRs7ch6y/pYsVHsDijlU6C/OxIi', NULL, '2025-08-09 21:04:58', '2025-08-09 21:04:58'),
(4, 'khansa', 'khansa@gmail.com', NULL, '$2y$12$9V.XFniwjZUJgGyAQK.qL.o7q/cMyzj9qgXIcGr9kKSXxfMEWXBIq', NULL, '2025-09-02 18:22:07', '2025-09-02 18:22:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `invoices_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id_itinerary`),
  ADD KEY `itinerary_paket_id_foreign` (`paket_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_tour`
--
ALTER TABLE `paket_tour`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `id_categories` (`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id_tour`);

--
-- Indexes for table `tour_categories`
--
ALTER TABLE `tour_categories`
  ADD PRIMARY KEY (`id_categories`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id_itinerary` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `paket_tour`
--
ALTER TABLE `paket_tour`
  MODIFY `id_paket` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id_tour` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tour_categories`
--
ALTER TABLE `tour_categories`
  MODIFY `id_categories` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `itinerary_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `paket_tour` (`id_paket`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
