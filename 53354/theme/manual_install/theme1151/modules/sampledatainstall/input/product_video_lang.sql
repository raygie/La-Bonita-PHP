DROP TABLE IF EXISTS `ps_product_video_lang`;
CREATE TABLE `ps_product_video_lang` (
  `id_video` int(10) unsigned NOT NULL,
  `id_shop` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_lang` int(10) unsigned NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `sort_order` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_video`,`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Scheme for table ps_product_video_lang */
INSERT INTO `ps_product_video_lang` VALUES
('1','1','1','1','https://www.youtube.com/v/2F5Z50q4FNk','Beautilicious Delights - Natural Organic Cosmetics Teaser',NULL,'1','1'),
('2','1','1','2','https://www.youtube.com/v/2F5Z50q4FNk','Beautilicious Delights - Natural Organic Cosmetics Teaser',NULL,'1','1'),
('3','1','1','3','https://www.youtube.com/v/2F5Z50q4FNk','Beautilicious Delights - Natural Organic Cosmetics Teaser',NULL,'1','1'),
('4','1','1','4','https://www.youtube.com/v/2F5Z50q4FNk','Beautilicious Delights - Natural Organic Cosmetics Teaser',NULL,'1','1'),
('5','1','1','5','https://www.youtube.com/v/2F5Z50q4FNk','Beautilicious Delights - Natural Organic Cosmetics Teaser',NULL,'1','1');
