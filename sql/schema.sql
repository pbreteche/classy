CREATE TABLE `Annonce` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `Annonce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);


ALTER TABLE `Annonce`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
