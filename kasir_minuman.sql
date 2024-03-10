-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2024 pada 14.46
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_minuman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_pembayarans`
--

CREATE TABLE `bukti_pembayarans` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `tipe_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `waktu_pembayaran` date NOT NULL,
  `transaction_type` varchar(500) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `status_message` varchar(500) NOT NULL,
  `signature_key` varchar(500) NOT NULL,
  `reference_id` varchar(500) NOT NULL,
  `merchant_id` varchar(500) NOT NULL,
  `expiry_time` varchar(500) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bukti_pembayarans`
--

INSERT INTO `bukti_pembayarans` (`id`, `order_id`, `tipe_pembayaran`, `status_pembayaran`, `total_bayar`, `waktu_pembayaran`, `transaction_type`, `transaction_id`, `status_message`, `signature_key`, `reference_id`, `merchant_id`, `expiry_time`, `created_at`, `updated_at`) VALUES
(1, 134, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(2, 134, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(3, 136, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(4, 137, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(5, 139, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(6, 140, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(7, 141, 'qris', 'settlement', 600000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(8, 142, 'qris', 'settlement', 180000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(9, 143, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(10, 144, 'qris', 'settlement', 15000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(11, 145, 'qris', 'settlement', 150000, '2024-03-08', '', '', '', '', '', '', '', '2024-03-08', '2024-03-08'),
(12, 146, 'qris', 'settlement', 15000, '2024-03-09', '', '', '', '', '', '', '', '2024-03-09', '2024-03-09'),
(13, 147, 'qris', 'settlement', 90000, '2024-03-09', '', '', '', '', '', '', '', '2024-03-09', '2024-03-09'),
(14, 148, 'qris', 'settlement', 15000, '2024-03-09', '', '', '', '', '', '', '', '2024-03-09', '2024-03-09'),
(15, 150, 'qris', 'settlement', 45000, '2024-03-09', '', '', '', '', '', '', '', '2024-03-09', '2024-03-09'),
(16, 151, 'qris', 'settlement', 45000, '2024-03-09', '', '', '', '', '', '', '', '2024-03-09', '2024-03-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `quantity` int(11) NOT NULL,
  `harga` int(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`quantity`, `harga`, `user_id`, `order_id`, `product_id`) VALUES
(5, 75000, 5, 80, 3),
(1, 15000, 5, 81, 2),
(2, 30000, 5, 81, 3),
(1, 15000, 5, 81, 4),
(2, 30000, 5, 81, 5),
(2, 30000, 5, 82, 3),
(1, 15000, 5, 82, 4),
(1, 15000, 1, 83, 2),
(1, 15000, 1, 83, 3),
(1, 15000, 5, 84, 4),
(2, 30000, 5, 84, 3),
(5, 75000, 5, 85, 3),
(1, 15000, 5, 85, 4),
(1, 15000, 5, 86, 3),
(1, 15000, 5, 86, 4),
(1, 15000, 5, 88, 3),
(1, 15000, 5, 88, 4),
(1, 15000, 5, 90, 3),
(1, 15000, 5, 90, 4),
(1, 15000, 5, 91, 3),
(1, 15000, 5, 92, 8),
(1, 15000, 5, 93, 3),
(1, 15000, 5, 95, 2),
(1, 15000, 5, 96, 2),
(1, 15000, 5, 97, 2),
(1, 15000, 5, 99, 3),
(1, 15000, 5, 101, 2),
(1, 15000, 5, 102, 2),
(1, 15000, 5, 105, 2),
(1, 15000, 5, 106, 3),
(1, 15000, 5, 107, 2),
(1, 15000, 5, 108, 3),
(1, 15000, 5, 109, 2),
(1, 15000, 5, 110, 2),
(1, 15000, 5, 111, 2),
(1, 15000, 5, 112, 2),
(2, 30000, 6, 113, 3),
(1, 15000, 6, 113, 4),
(1, 15000, 6, 113, 2),
(2, 30000, 6, 113, 6),
(1, 15000, 5, 114, 2),
(1, 15000, 5, 114, 3),
(1, 15000, 5, 114, 4),
(1, 15000, 5, 115, 3),
(1, 15000, 5, 116, 4),
(1, 15000, 5, 117, 2),
(1, 15000, 5, 118, 6),
(1, 15000, 5, 119, 2),
(1, 15000, 5, 120, 3),
(2, 30000, 5, 121, 3),
(1, 15000, 5, 122, 2),
(1, 15000, 5, 123, 3),
(1, 15000, 5, 124, 3),
(1, 15000, 5, 125, 3),
(1, 15000, 5, 126, 2),
(1, 15000, 5, 127, 3),
(1, 15000, 5, 128, 4),
(1, 15000, 11, 129, 2),
(1, 15000, 5, 130, 3),
(1, 15000, 5, 131, 6),
(1, 15000, 5, 132, 3),
(1, 15000, 5, 133, 3),
(1, 15000, 5, 134, 3),
(1, 15000, 5, 135, 3),
(1, 15000, 5, 136, 2),
(1, 15000, 5, 137, 6),
(1, 15000, 5, 138, 3),
(1, 15000, 5, 139, 3),
(1, 15000, 5, 140, 3),
(1, 15000, 5, 141, 2),
(5, 75000, 5, 141, 3),
(3, 45000, 5, 141, 4),
(2, 30000, 5, 141, 5),
(1, 15000, 5, 141, 7),
(3, 45000, 5, 142, 4),
(1, 15000, 5, 142, 2),
(1, 15000, 5, 142, 7),
(5, 75000, 5, 142, 6),
(2, 30000, 5, 142, 5),
(1, 15000, 5, 143, 3),
(1, 15000, 5, 144, 3),
(3, 45000, 5, 145, 3),
(2, 30000, 5, 145, 4),
(4, 60000, 5, 145, 2),
(1, 15000, 5, 145, 6),
(1, 15000, 5, 146, 6),
(2, 30000, 5, 147, 3),
(4, 60000, 5, 147, 4),
(1, 15000, 5, 148, 7),
(2, 30000, 5, 149, 8),
(1, 15000, 5, 150, 7),
(2, 30000, 5, 150, 8),
(1, 15000, 5, 151, 3),
(1, 15000, 5, 151, 4),
(1, 15000, 5, 151, 5),
(2, 30000, 5, 152, 3),
(3, 45000, 5, 152, 4),
(1, 15000, 5, 152, 7),
(1, 15000, 5, 153, 3),
(2, 30000, 5, 153, 4),
(1, 15000, 5, 153, 5),
(3, 45000, 5, 154, 2),
(1, 15000, 5, 155, 3),
(1, 15000, 5, 156, 4),
(2, 30000, 5, 156, 3),
(1, 15000, 5, 157, 2),
(1, 15000, 5, 158, 4),
(1, 15000, 5, 159, 3),
(1, 15000, 5, 160, 4),
(1, 15000, 5, 161, 2),
(1, 15000, 5, 161, 3),
(1, 15000, 5, 162, 2),
(1, 15000, 5, 163, 4),
(2, 30000, 5, 164, 3),
(1, 15000, 5, 164, 2),
(2, 30000, 5, 165, 2),
(1, 15000, 5, 165, 3),
(2, 30000, 5, 166, 2),
(1, 15000, 5, 166, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `midtrans`
--

CREATE TABLE `midtrans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `transaction_time` varchar(255) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `status_code` varchar(255) NOT NULL,
  `signature_key` varchar(255) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `merchant_id` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `fraud_status` varchar(255) NOT NULL,
  `expiry_time` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `acquirer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_03_105534_create_orders_table', 1),
(6, '2024_02_16_023504_minuman', 2),
(7, '2024_02_19_130941_create_carts_table', 3),
(8, '2024_02_19_132941_create_carts_table', 4),
(9, '2024_03_04_130730_add_snap_token_to_orders_table', 5),
(10, '2024_03_09_055825_create_midtrans_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id`, `nama`, `harga`, `foto`, `created_at`, `updated_at`, `keterangan`) VALUES
(2, 'Red Potion', 15000, 'foto/jD1hvG3hgMrGhVJVJUl81cgdAPgdTZmDdalLB1qr.jpg', NULL, NULL, 'Minuman rasa strawbery'),
(3, 'Green Potion', 15000, 'foto/4XqjCFX0roU3i7aT9gkSwB1G6qv7cRuwVtD4I9AL.jpg', NULL, NULL, 'minuman rasa daun teh hijau'),
(4, 'Orange Potion', 15000, 'foto/OyNnMgKD944rHRYYCXBjheAGpVQ5jozE1zPnKUSn.jpg', NULL, NULL, 'minuman rasa jeruk yang manis dan segar'),
(5, 'Yellow Position', 15000, 'foto/ObzfvC43EQJAnq65fuoiffTaHTs6UMqGFTTlKkf8.jpg', NULL, NULL, 'Minuman rasa lemon yang segar'),
(6, 'Brown Sugar Milk Tea', 15000, 'foto/wgnBVvz37H92fxP5HnIVJL3qSRXCPvHNOdA53O0v.jpg', NULL, NULL, 'Minuman rasa teh oolong dan susu'),
(7, 'Cheese Genmaicha', 15000, 'foto/GPOnEeqX3QvpxsEl7zSOyV5yEMYOOjFnbtt6RrzO.jpg', NULL, NULL, 'Genmaicha with Cream Cheese'),
(8, 'Apple Peach Tea', 15000, 'foto/nQvdUGhG0aYAXuJF88QkNkBAKK3qtwiAFbb3uRdb.jpg', NULL, NULL, 'Green Tea with Peach and Apple');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifs`
--

CREATE TABLE `notifs` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `transaction_status` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `status_code` varchar(255) DEFAULT NULL,
  `signature_key` varchar(255) DEFAULT NULL,
  `settlement_time` datetime DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `merchant_id` varchar(255) DEFAULT NULL,
  `issuer` varchar(255) DEFAULT NULL,
  `gross_amount` decimal(10,2) DEFAULT NULL,
  `fraud_status` varchar(255) DEFAULT NULL,
  `expiry_time` datetime DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `acquirer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifs`
--

INSERT INTO `notifs` (`id`, `transaction_type`, `transaction_time`, `transaction_status`, `transaction_id`, `status_message`, `status_code`, `signature_key`, `settlement_time`, `reference_id`, `payment_type`, `order_id`, `merchant_id`, `issuer`, `gross_amount`, `fraud_status`, `expiry_time`, `currency`, `acquirer`, `created_at`, `updated_at`) VALUES
(1, 'on-us', '2024-03-09 14:20:25', 'settlement', 'c3ace61c-073d-4595-a85a-9b71c7bc60ca', 'midtrans payment notification', '200', '7f08b65ccfde12c1286cac5a1890b3f404bcb5696bce2a41999def99c6a3fc6b0ff7e051daedf8374e28f1f158fa2c8a1451497af6da0784126f3a2fdb3b35fa', '2024-03-09 14:20:47', 'c391ca83-2294-4e12-b4f4-9c8490ddb60d', 'qris', '162', 'G264255528', 'gopay', '15000.00', 'accept', '2024-03-09 14:35:25', 'IDR', 'gopay', '2024-03-09 00:25:42', '2024-03-09 00:25:42'),
(2, 'on-us', '2024-03-09 14:26:33', 'settlement', '58f3c111-1b0d-4759-81de-105e5dbe663b', 'midtrans payment notification', '200', '47348e713899416ea28bc5270d17724375215aca697d3a460afe370b739d3298f15bc1d222199d790e33e065c1d3101e75478a4191b5a20ee5fbe1dd99119303', '2024-03-09 14:26:57', 'd5ceb747-00ce-4065-a622-cf834de61609', 'qris', '163', 'G264255528', 'gopay', '15000.00', 'accept', '2024-03-09 14:41:33', 'IDR', 'gopay', '2024-03-09 00:26:58', '2024-03-09 00:26:58'),
(3, 'on-us', '2024-03-09 14:46:09', 'settlement', '157831c0-65e0-4553-b1b6-6d3741bba1fa', 'midtrans payment notification', '200', '725947d78d8cd4b98cc43b3bdb2a35e0d4596f4edce09b92b58a024b7090e9f8143187fbc1612b2c6491727d7b73fc2f96126f8436e4fb69eeaa9f0c56fa72e1', '2024-03-09 14:46:23', 'ac444626-66e9-4b62-9f50-27a6849a4fbe', 'qris', '165', 'G264255528', 'gopay', '45000.00', 'accept', '2024-03-09 15:01:09', 'IDR', 'gopay', '2024-03-09 00:46:24', '2024-03-09 00:46:24'),
(4, 'on-us', '2024-03-09 14:53:42', 'settlement', '64012b0f-1a7a-4451-b6e2-4bf6e81644a7', 'midtrans payment notification', '200', '4ca929824c4cbe72afbd1e2a68b152f402a500cad36088cb1e4b3595f5a0f1b41c8c4beb827bc4af883042a574b5c7c68f25711313152f547a3aa28ecbb11cd9', '2024-03-09 14:53:55', 'd3d69e9b-229f-4ed2-8986-4c4366866e19', 'qris', '166', 'G264255528', 'gopay', '45000.00', 'accept', '2024-03-09 15:08:42', 'IDR', 'gopay', '2024-03-09 00:53:56', '2024-03-09 00:53:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT NULL,
  `metode_pembayaran` varchar(11) NOT NULL,
  `snap_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tanggal_transaksi`, `metode_pembayaran`, `snap_token`) VALUES
(80, 5, '2024-03-01 11:40:39', 'Tunai', NULL),
(81, 5, '2024-03-01 11:53:57', 'Tunai', NULL),
(82, 5, '2024-03-01 18:21:18', 'Tunai', NULL),
(83, 1, '2024-03-01 19:04:26', 'Tunai', NULL),
(84, 5, '2024-03-01 19:26:33', 'Tunai', NULL),
(85, 5, '2024-03-01 20:20:44', 'Tunai', NULL),
(86, 5, '2024-03-04 05:45:01', 'Tunai', NULL),
(87, 5, '2024-03-04 05:47:07', 'Tunai', NULL),
(88, 5, '2024-03-04 05:51:10', 'Tunai', NULL),
(89, 5, '2024-03-04 05:52:41', 'Tunai', NULL),
(90, 5, '2024-03-04 05:52:55', 'Tunai', NULL),
(91, 5, '2024-03-04 05:57:06', 'Tunai', NULL),
(92, 5, '2024-03-04 06:00:25', 'Tunai', NULL),
(93, 5, '2024-03-04 06:03:16', 'Tunai', NULL),
(94, 5, '2024-03-04 06:04:15', 'Tunai', NULL),
(95, 5, '2024-03-04 06:04:38', 'Tunai', NULL),
(96, 5, '2024-03-04 06:09:33', 'Tunai', '6ee4b53d-87cc-47e6-ac60-a12041b5d4a4'),
(97, 5, '2024-03-04 06:14:33', 'Tunai', 'ddad5350-c232-40c0-8bfa-1abefcd513bd'),
(98, 5, '2024-03-04 06:19:49', 'Tunai', NULL),
(99, 5, '2024-03-04 06:33:51', 'Tunai', '6ec11f70-4da5-4ce8-9250-7de4f33eecd2'),
(100, 5, '2024-03-04 06:36:19', 'Tunai', NULL),
(101, 5, '2024-03-04 06:39:33', 'Tunai', NULL),
(102, 5, '2024-03-04 06:47:33', 'Tunai', NULL),
(103, 5, '2024-03-04 06:47:59', 'Tunai', NULL),
(105, 5, '2024-03-04 06:49:13', 'Tunai', NULL),
(106, 5, '2024-03-04 06:51:52', 'Tunai', NULL),
(107, 5, '2024-03-04 06:54:07', 'Tunai', NULL),
(108, 5, '2024-03-04 06:54:58', 'Tunai', NULL),
(109, 5, '2024-03-04 06:55:19', 'Tunai', NULL),
(110, 5, '2024-03-04 06:56:06', 'Tunai', NULL),
(111, 5, '2024-03-04 06:57:12', 'Tunai', NULL),
(112, 5, '2024-03-04 06:58:23', 'Tunai', '6de8db87-36e0-4edf-a5a4-c191b7132064'),
(113, 6, '2024-03-04 07:01:37', 'Tunai', '558bf9d6-407a-4841-a160-d4b7bc0b4af6'),
(114, 5, '2024-03-06 01:19:30', 'Tunai', '2d610343-4d0f-40a9-8c4f-933be4ac441f'),
(115, 5, '2024-03-06 01:32:47', 'Tunai', '746350ad-2021-4a7a-acc0-214c816e322d'),
(116, 5, '2024-03-06 01:35:20', 'qris', 'a4c8d4a5-ad39-4315-98c9-b793d31023ba'),
(117, 5, '2024-03-06 01:48:48', 'qris', '1bb288de-d9d2-4d98-ad13-b04564bc1882'),
(118, 5, '2024-03-06 01:51:16', 'qris', '7242a016-121f-4db6-a423-9a8556c82882'),
(119, 5, '2024-03-06 01:53:53', 'qris', '994011c1-6689-4540-a5e9-c5e96dc7f9fa'),
(120, 5, '2024-03-06 05:53:39', 'Tunai', 'dc177c7b-9ad4-4631-a424-2e2d52c5afe9'),
(121, 5, '2024-03-06 07:26:01', 'Tunai', 'e3397370-b3ee-4075-902e-0ab4f60c6280'),
(122, 5, '2024-03-06 07:31:15', 'Tunai', 'e97da129-7a55-412f-9b00-59934481964a'),
(123, 5, '2024-03-06 07:37:19', 'Tunai', 'bbfa922d-5452-456e-9c7e-b0ff79db950c'),
(124, 5, '2024-03-06 07:40:24', 'qris', '3eec7190-9d95-43c1-84b4-e0de4a1dcefc'),
(125, 5, '2024-03-06 07:51:32', 'Tunai', '19b66fc4-8597-43bd-a622-ab759c8fd3df'),
(126, 5, '2024-03-06 08:10:36', 'Tunai', '475af190-5bf9-480a-b155-2b3ff208222e'),
(127, 5, '2024-03-07 06:32:03', 'Tunai', NULL),
(128, 5, '2024-03-07 08:55:01', 'Tunai', '4a39cd75-4d1c-47bd-8819-ff7f43a27e48'),
(129, 11, '2024-03-07 08:56:57', 'Tunai', '495623c8-f83c-4176-b996-70981d1ee224'),
(130, 5, '2024-03-07 09:00:54', 'Tunai', '58541ae0-7823-46eb-bd6f-0f6c7b4377f3'),
(131, 5, '2024-03-07 09:01:29', 'Tunai', 'd6580048-27b5-4616-8ba0-88d819510759'),
(132, 5, '2024-03-07 18:03:05', 'Tunai', '63cc344e-381c-4b79-9f7f-2601f8bf8be7'),
(133, 5, '2024-03-07 18:10:32', 'Tunai', '11dcfd36-4509-4d77-b25f-de75fb7d33ac'),
(134, 5, '2024-03-07 18:13:31', 'qris', '78ead310-a769-4ec5-a50a-fcfe057adf71'),
(135, 5, '2024-03-07 18:35:26', 'Tunai', '2ad7ad42-3448-49b6-89d5-a89265c67360'),
(136, 5, '2024-03-07 18:36:24', 'qris', '6f1df3ba-da5a-4ca5-9bd4-4c7d5c37fb2e'),
(137, 5, '2024-03-07 18:40:00', 'qris', '8d215426-5086-445b-824f-25491be3af93'),
(138, 5, '2024-03-08 03:19:49', 'Tunai', '35537a36-eb4a-4e65-8db1-1e4b2b5bddc9'),
(139, 5, '2024-03-08 03:21:12', 'qris', '7d687acc-1312-470a-b9c6-c3989e6a90e2'),
(140, 5, '2024-03-08 03:23:51', 'qris', '8ef920f1-692f-4a48-bba2-1df985cebd30'),
(141, 5, '2024-03-08 03:25:47', 'qris', '4f5eea98-39cb-464c-81cd-946716d4063a'),
(142, 5, '2024-03-08 04:16:17', 'qris', '145d716f-d83e-4dd6-bbb9-01bc15bba204'),
(143, 5, '2024-03-08 04:23:19', 'qris', '10c3960a-9b2e-4f38-9bd1-4e701429fda2'),
(144, 5, '2024-03-08 04:25:26', 'qris', '706a2f12-02e6-44d9-9e3e-beadc3f92eae'),
(145, 5, '2024-03-08 09:04:55', 'qris', 'b88dcba1-ea1c-4150-84da-ebfcf12c9860'),
(146, 5, '2024-03-08 20:38:32', 'qris', '71bdf780-bbd2-4131-8b8e-000dc43cda19'),
(147, 5, '2024-03-08 21:07:25', 'qris', '414ae25a-1e3b-460e-ba09-1139426d9e3b'),
(148, 5, '2024-03-08 22:32:54', 'qris', '583ff8cb-aac7-4dc7-9aa9-bc278fdbaa69'),
(149, 5, '2024-03-08 22:36:03', 'Tunai', '7baa0370-4fa7-4a57-9fd1-fa43a1406b88'),
(150, 5, '2024-03-08 22:37:05', 'qris', '4344b2d8-18bd-471f-93c6-5f0af39090cd'),
(151, 5, '2024-03-08 22:40:32', 'qris', '29e463c7-eb09-41e3-a025-9340305c3b5b'),
(152, 5, '2024-03-08 22:44:45', 'Tunai', '35f1a571-48d9-4afa-9ce4-5742dc2c9853'),
(153, 5, '2024-03-08 23:08:01', 'qris', 'f44bcd38-bfb8-4525-bf13-9d3e077868a0'),
(154, 5, '2024-03-08 23:32:26', 'qris', 'dd516358-9d57-40d1-bed3-72eaf087f739'),
(155, 5, '2024-03-08 23:38:41', 'Tunai', '59ae6bc1-2fc4-45f5-8a59-567bb1a7438e'),
(156, 5, '2024-03-08 23:41:07', 'qris', '8cdfbaac-53cd-4ef8-987f-9615e314b169'),
(157, 5, '2024-03-08 23:49:56', 'qris', 'd7673635-9947-46e1-b8f0-1aea7390fad6'),
(158, 5, '2024-03-08 23:54:10', 'Tunai', '6f4460b3-9255-42ee-adf7-2d6d0d350e81'),
(159, 5, '2024-03-08 23:54:40', 'qris', '978cbe01-627b-4e58-a690-bc342f9f20e8'),
(160, 5, '2024-03-09 00:05:59', 'qris', 'fc95a338-08c3-42b1-a332-49dabdb9595b'),
(161, 5, '2024-03-09 00:15:04', 'qris', '6e36cc21-aabe-4eee-950f-5a47985022a0'),
(162, 5, '2024-03-09 00:20:22', 'qris', '793fd950-23f7-4532-bcc6-26c314858f44'),
(163, 5, '2024-03-09 00:26:30', 'qris', 'a398ea62-29a8-4601-962a-bf2f386bc8b4'),
(164, 5, '2024-03-09 00:45:46', 'Tunai', '9cf8d014-1195-4bab-a97a-d7ea0d4c6e11'),
(165, 5, '2024-03-09 00:46:06', 'qris', 'e1f99012-11e5-460f-96d6-c9a6fce434bc'),
(166, 5, '2024-03-09 00:52:49', 'qris', '5521fc01-dbec-4e25-ad3e-6ad221380706');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `tunai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('pelanggan','admin','','') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adji', 'adji@gmail.com', NULL, '$2y$10$s3ySBOhSEOC4j5wV.Z8XmuBe.Pv.QaPx5dYN5aruf3rxaWyT6knnG', 'admin', NULL, '2024-02-17 00:41:04', '2024-02-26 19:07:15'),
(4, 'Lintang', 'lintang@gmail.com', NULL, '$2y$10$eI8D2LUM3./Ed428WXpCP.Y7zZ1AMBApOHwpDqexQO.nM8zYuk.pO', 'pelanggan', NULL, '2024-02-19 05:16:01', '2024-02-19 05:16:01'),
(5, 'cobot', 'cobot@gmail.com', NULL, '$2y$10$16KJLWhLOZ6hSsiBZf1hROWa.mY0RT/d2Anwk4Rkk5.Qv2oQ87Tx2', 'pelanggan', NULL, '2024-02-25 06:30:55', '2024-02-26 20:49:57'),
(6, 'rehan', 'rehan@gmail.com', NULL, '$2y$10$xOXRcPAg5tVdas5bNPrzsOZqs8sZRAWKwk2DBsiw9yl3oS63EYmVW', 'pelanggan', NULL, '2024-02-26 20:14:10', '2024-02-26 21:01:05'),
(10, 'miawaug', 'miawaug@gmail.com', NULL, '$2y$10$1MgseSQAtdQZN/oXXWyXmu9g/dV3cOq0hBlNmZfROM0KEeyVIFuvC', 'admin', NULL, '2024-02-26 21:00:46', '2024-02-26 21:00:46'),
(11, 'doni', 'doni@gmail.com', NULL, '$2y$10$rr53GAiGrijYWuZIVDYlP.6G2FBIG6MdbDA4IJgXMiXmcXePkmyTK', 'pelanggan', NULL, '2024-03-07 08:55:48', '2024-03-07 08:55:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukti_pembayarans`
--
ALTER TABLE `bukti_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_order` (`order_id`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifs`
--
ALTER TABLE `notifs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`user_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukti_pembayarans`
--
ALTER TABLE `bukti_pembayarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `midtrans`
--
ALTER TABLE `midtrans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `notifs`
--
ALTER TABLE `notifs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `minuman` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `minuman` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `test` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
