CREATE TABLE `{propaganda}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `time_create` int(10) unsigned NOT NULL,
  `time_publish` int(10) unsigned NOT NULL,
  `time_expire` int(10) unsigned NOT NULL,
  `view` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `device` enum('web','mobile') NOT NULL,
  `image_web` varchar(255) NOT NULL,
  `image_mobile_1` varchar(255) NOT NULL,
  `image_mobile_2` varchar(255) NOT NULL,
  `image_mobile_3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `device` (`device`),
  KEY `status` (`status`),
  KEY `click` (`click`),
  KEY `view` (`view`),
  KEY `select` (`status`, `device`, `time_publish`, `time_expire`)
);

CREATE TABLE `{view_log}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `propaganda` int(10) unsigned NOT NULL,
  `device` enum('web','mobile') NOT NULL,
  `time_create` int(10) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `hostname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `{click_log}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `propaganda` int(10) unsigned NOT NULL,
  `device` enum('web','mobile') NOT NULL,
  `time_create` int(10) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `hostname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
);