CREATE TABLE `bugs` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `title` varchar(255) NOT NULL,  
  `description` text NOT NULL,  
  `reporter` varchar(255) NOT NULL,  
  `status` varchar(50) NOT NULL DEFAULT 'pending',  
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,  
  PRIMARY KEY (`id`)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
