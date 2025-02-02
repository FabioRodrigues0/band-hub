-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 23-Nov-2024 às 21:22
-- Versão do servidor: 5.7.44
-- versão do PHP: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projectband`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_release` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `band_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `albums`
--

INSERT INTO `albums` (`id`, `name`, `slug`, `description`, `image`, `year_release`, `band_id`, `created_at`, `updated_at`) VALUES
(1, 'Future Nostalgia', 'future-nostalgia-0XttnZ', 'Debitis officia aut aliquid minus autem aut deleniti. A ducimus laudantium velit quaerat quam accusamus. Veritatis quas pariatur facilis in et quis officiis.', 'https://i.scdn.co/image/ab67616d0000b273bd26ede1ae69327010d49946', '2020', 1, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(2, 'Certified Lover Boy', 'certified-lover-boy-PxQNOU', 'Corporis itaque dolor iste delectus placeat ut aperiam. Quam earum et exercitationem ut illum delectus harum. Totam voluptatem eos deserunt distinctio. Et porro ut aliquam aut sed.', 'https://i.scdn.co/image/ab67616d0000b2739416ed64daf84936d89e671c', '2021', 1, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(3, 'Planet Her', 'planet-her-dKXaYt', 'Illum voluptates et maxime voluptas tenetur. Eum modi ratione occaecati. Qui iste in ut at voluptatem ut qui. Ipsam id perspiciatis quisquam officiis ad eos modi quibusdam.', 'https://i.scdn.co/image/ab67616d0000b273a186530333c2f3c159f3d9a0', '2021', 2, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(4, 'After Hours', 'after-hours-zP2JcQ', 'Incidunt laborum tempora non consectetur non sit quia. Dolor qui eligendi consequuntur molestiae aspernatur porro minus et. Quia consectetur libero ex sit impedit. Occaecati molestias quia sunt velit sint nobis et.', 'https://i.scdn.co/image/ab67616d0000b2738863bc11d2aa12b54f5aeb36', '2020', 3, '2024-11-23 20:34:46', '2024-11-23 20:34:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `album_artist`
--

CREATE TABLE `album_artist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `artists`
--

INSERT INTO `artists` (`id`, `name`, `slug`, `description`, `image`, `genres`, `created_at`, `updated_at`) VALUES
(1, 'The Weeknd', 'the-weeknd', 'Similique eum similique et possimus. Quia reiciendis adipisci necessitatibus facere maiores odit ut. Voluptas totam iure fuga laboriosam repellat non eveniet.', 'https://i.scdn.co/image/ab6761610000e5eb214f3cf1cbe7139c1e26ffbb', NULL, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(2, 'Drake', 'drake', 'Ut cum eaque veritatis quas ut quae ipsam qui. Est quam voluptate odit et odit quia non. Quasi consectetur molestiae aut autem.', 'https://i.scdn.co/image/ab6761610000e5eb4293385d324db8558179afd9', NULL, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(3, 'Post Malone', 'post-malone', 'Vel ducimus est eos rerum. Eos nemo nostrum asperiores nemo nesciunt. Voluptatem eos odio hic ea et commodi. Atque rem molestias voluptatum eaque.', 'https://i.scdn.co/image/ab6761610000e5eb6be070445b03e0b63147c2c1', NULL, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(4, 'Billie Eilish', 'billie-eilish', 'Qui amet voluptas reiciendis. Tempore vitae expedita ut provident beatae quasi facere.', 'https://i.scdn.co/image/ab67616d0000b273c8a11e48c91a982d086afc69', NULL, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(5, 'Ariana Grande', 'ariana-grande', 'Et exercitationem aut qui sed libero. Eveniet voluptatibus dignissimos harum dolor adipisci velit distinctio. Qui dolore molestiae libero a. Non ex nisi omnis quo.', 'https://i.scdn.co/image/ab6761610000e5eb7eb7f6371aad8e67e01f0a03', NULL, '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(6, 'Taylor Swift', 'taylor-swift', 'Sit quia nihil veritatis voluptatem aut et. Consectetur magni et est ut. Deserunt dolores minus est magni sequi sapiente ut. Quidem ea sit labore assumenda voluptas.', 'https://i.scdn.co/image/ab6761610000e5eb5a00969a4698c3132a15fbb0', NULL, '2024-11-23 20:34:46', '2024-11-23 20:34:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `artist_band`
--

CREATE TABLE `artist_band` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `band_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `artist_band`
--

INSERT INTO `artist_band` (`id`, `artist_id`, `band_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 5, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bands`
--

CREATE TABLE `bands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `genres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bands`
--

INSERT INTO `bands` (`id`, `name`, `slug`, `description`, `genres`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Twenty One Pilots', 'twenty-one-pilots', 'Id ut quidem possimus natus expedita qui. Quae adipisci consequatur sit qui et sit aspernatur. Architecto numquam voluptas molestiae. Sit est ut placeat saepe.', 'Pop,Alternative', 'https://i.scdn.co/image/ab6761610000e5eb9e3acf1eaf3b8846e836f441', '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(2, 'Maroon 5', 'maroon-5', 'Sunt enim vitae omnis consequatur fugit sunt ipsam. Consectetur voluptatem quo magnam et. Et quia nostrum eaque et. Ut quis cum aperiam eligendi exercitationem.', 'Indie,Rock', 'https://i.scdn.co/image/ab6761610000e5eb975249d4ef20aaec6c7c03f8', '2024-11-23 20:34:46', '2024-11-23 20:34:46'),
(3, 'Imagine Dragons', 'imagine-dragons', 'Odit aut delectus nostrum. Dolorem id et dolores expedita cupiditate ex. Dicta aliquam praesentium laborum.', 'Alternative,Rock', 'https://i.scdn.co/image/ab6761610000e5eb920dc1f617550de8388f368e', '2024-11-23 20:34:46', '2024-11-23 20:34:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@email.com|::1', 'i:1;', 1732394238),
('admin@email.com|::1:timer', 'i:1732394238;', 1732394238);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000000_create_band_hub_schema', 1),
(5, '2024_01_03_000000_add_is_admin_to_users_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bRPmy5YDg4cdjFB8f0sMvp6d4T1siF9ViHQVSzce', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYWxEeWtGeTBoMTJQdE5BQXVUMWRnUVRVSnpvcllZb3IzZVA3NHIyaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzMyMzk1OTg1O319', 1732396915);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tracks`
--

CREATE TABLE `tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Admin User', 'admin@bandhub.com', '2024-11-23 20:34:45', '$2y$12$33ForEqhpH.5OVH.eOn1TO7gzqbcBrmgmksLa6P0avwQLSBVpH2Cu', NULL, '2024-11-23 20:34:45', '2024-11-23 20:34:45', 'admin'),
(2, 'Regular User', 'user@bandhub.com', '2024-11-23 20:34:46', '$2y$12$jxm52ifnXfmmBARz4p8HnuIoObnOp/.vHhzXrqccU0GrXuU4IcJhy', NULL, '2024-11-23 20:34:46', '2024-11-23 20:34:46', 'user'),
(3, 'Dr. Mossie Moen III', 'ernestina23@example.com', '2024-11-23 20:34:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'R4C4eCAlhs', '2024-11-23 20:34:46', '2024-11-23 20:34:46', 'user'),
(4, 'Lacey Hane', 'yoberbrunner@example.org', '2024-11-23 20:34:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pw8NtNAjxa', '2024-11-23 20:34:46', '2024-11-23 20:34:46', 'user'),
(5, 'Melyna Auer', 'lilian.osinski@example.net', '2024-11-23 20:34:46', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WwfB77VFrh', '2024-11-23 20:34:46', '2024-11-23 20:34:46', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `albums_slug_unique` (`slug`),
  ADD KEY `albums_band_id_foreign` (`band_id`);

--
-- Índices para tabela `album_artist`
--
ALTER TABLE `album_artist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_artist_album_id_foreign` (`album_id`),
  ADD KEY `album_artist_artist_id_foreign` (`artist_id`);

--
-- Índices para tabela `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artists_slug_unique` (`slug`);

--
-- Índices para tabela `artist_band`
--
ALTER TABLE `artist_band`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_band_artist_id_foreign` (`artist_id`),
  ADD KEY `artist_band_band_id_foreign` (`band_id`);

--
-- Índices para tabela `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bands_slug_unique` (`slug`);

--
-- Índices para tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices para tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tracks_album_id_foreign` (`album_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `album_artist`
--
ALTER TABLE `album_artist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `artist_band`
--
ALTER TABLE `artist_band`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `bands`
--
ALTER TABLE `bands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_band_id_foreign` FOREIGN KEY (`band_id`) REFERENCES `bands` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `album_artist`
--
ALTER TABLE `album_artist`
  ADD CONSTRAINT `album_artist_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `album_artist_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `artist_band`
--
ALTER TABLE `artist_band`
  ADD CONSTRAINT `artist_band_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artist_band_band_id_foreign` FOREIGN KEY (`band_id`) REFERENCES `bands` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
