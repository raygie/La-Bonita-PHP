DROP TABLE IF EXISTS `ps_tmsocialfeed`;
CREATE TABLE `ps_tmsocialfeed` (
  `id_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_shop` int(10) unsigned NOT NULL,
  `item_order` int(10) unsigned NOT NULL,
  `item_type` varchar(100) DEFAULT NULL,
  `hook` varchar(100) DEFAULT NULL,
  `item_theme` varchar(100) DEFAULT NULL,
  `item_width` int(10) unsigned NOT NULL,
  `item_height` int(10) unsigned NOT NULL,
  `item_limit` int(10) unsigned NOT NULL,
  `item_header` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `item_footer` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `item_border` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `item_replies` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `item_scroll` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `item_background` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `item_col_width` int(10) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/* Scheme for table ps_tmsocialfeed */
INSERT INTO `ps_tmsocialfeed` VALUES
('1','1','0','facebook','footer','light','270','0','0','0','0','0','1','0','0','0','1');
