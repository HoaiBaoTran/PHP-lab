SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `lab09` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `lab09`; 

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `category` (`id`, `name`) VALUES 
(1, N'Điện thoại'),
(2, N'Giày dép'),
(3, N'Động vật');

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'iPhone XS MAX 64GB', 24490000, N'Hàng xách tay chính hãng', 'iphone-6s-128gb-hong-1-400x450.png'),
(2, 'Samsung Galaxy J7 Plus', 12990000, N'Bao test bào xài 6 tháng', 'samsung-galaxy-j7-plus-1-400x460.png'),
(3, 'iPhone 7 Plus 128GB Black', 14490000, N'Hàng cũ mới 99%', 'iphone-7-plus-128gb-de-400x460.png'),
(4, 'Oppo F3 Plus', 7990000, N'Hàng chợ Bà Chiểu', 'oppo-f3-plus-1-1-400x460.png');


ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;