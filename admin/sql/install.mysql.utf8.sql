CREATE TABLE IF NOT EXISTS `#__articlepush_sites` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `site_name` VARCHAR(255) NOT NULL,
  `api_url` VARCHAR(580) NOT NULL,
  `api_username` VARCHAR(255) NOT NULL,
  `api_password` VARCHAR(255) NOT NULL,
  `category_id` INT UNSIGNED DEFAULT NULL COMMENT 'Target category ID on remote Joomla site',
  `author_id` INT UNSIGNED DEFAULT NULL COMMENT 'Target author ID on remote Joomla site',
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
