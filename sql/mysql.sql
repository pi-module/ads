CREATE TABLE `{propaganda}` (
    `id` int(10) unsigned NOT NULL auto_increment,
    `title` varchar(255) NOT NULL default '',
    `category` int(10) unsigned NOT NULL default '0',
    `url` varchar(255) NOT NULL default '',
    `status` tinyint(1) unsigned NOT NULL default '0',
    `time_create` int(10) unsigned NOT NULL default '0',
    `time_publish` int(10) unsigned NOT NULL default '0',
    `time_expire` int(10) unsigned NOT NULL default '0',
    `view` int(10) unsigned NOT NULL default '0',
    `click` int(10) unsigned NOT NULL default '0',
    `device` enum('web','mobile') NOT NULL default 'web',
    `image_web` varchar(255) NOT NULL default '',
    `image_mobile_1` varchar(255) NOT NULL default '',
    `image_mobile_2` varchar(255) NOT NULL default '',
    `image_mobile_3` varchar(255) NOT NULL default '',
    PRIMARY KEY (`id`),
    KEY `device` (`device`),
    KEY `status` (`status`),
    KEY `click` (`click`),
    KEY `view` (`view`),
    KEY `category` (`category`),
    KEY `select_block` (`category`, `status`, `device`, `time_publish`, `time_expire`),
    KEY `select_block_option` (`status`, `device`, `time_publish`, `time_expire`)
);

CREATE TABLE `{category}` (
    `id` int(10) unsigned NOT NULL auto_increment,
    `title` varchar(255) NOT NULL default '',
    `height` int(4) unsigned NOT NULL default '0',
    `width` int(4) unsigned NOT NULL default '0',
    PRIMARY KEY (`id`),
    KEY `title` (`title`)
);

CREATE TABLE `{view_log}` (
    `id` int(10) unsigned NOT NULL auto_increment,
    `propaganda` int(10) unsigned NOT NULL default '0',
    `device` enum('web','mobile') NOT NULL default 'web',
    `time_create` int(10) unsigned NOT NULL default '0',
    `uid` int(10) unsigned NOT NULL default '0',
    `ip` char(15) NOT NULL default '',
    PRIMARY KEY (`id`),
    KEY `time_create` (`time_create`)
);

CREATE TABLE `{click_log}` (
    `id` int(10) unsigned NOT NULL auto_increment,
    `propaganda` int(10) unsigned NOT NULL default '0',
    `device` enum('web','mobile') NOT NULL default 'web',
    `time_create` int(10) unsigned NOT NULL default '0',
    `uid` int(10) unsigned NOT NULL default '0',
    `ip` char(15) NOT NULL default '',
    PRIMARY KEY (`id`),
    KEY `time_create` (`time_create`)
);