DROP TABLE IF EXISTS `ps_product_video`;
CREATE TABLE `ps_product_video` (
  `id_video` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_shop` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_video`,`id_shop`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/* Scheme for table ps_product_video */
INSERT INTO `ps_product_video` VALUES
('1','1','1'),
('2','1','1'),
('3','1','1'),
('4','1','1'),
('5','1','1');
