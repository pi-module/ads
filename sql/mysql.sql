CREATE TABLE `{propaganda}` (
  `id`             INT(10) UNSIGNED                 NOT NULL AUTO_INCREMENT,
  `title`          VARCHAR(255)                     NOT NULL DEFAULT '',
  `category`       INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `url`            VARCHAR(255)                     NOT NULL DEFAULT '',
  `status`         TINYINT(1) UNSIGNED              NOT NULL DEFAULT '0',
  `time_create`    INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `time_publish`   INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `time_expire`    INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `view`           INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `click`          INT(10) UNSIGNED                 NOT NULL DEFAULT '0',
  `device`         ENUM ('web', 'mobile')           NOT NULL DEFAULT 'web',
  `type`           ENUM ('image', 'html', 'script', 'link') NOT NULL DEFAULT 'image',
  `image_web`      VARCHAR(255)                     NOT NULL DEFAULT '',
  `image_mobile_1` VARCHAR(255)                     NOT NULL DEFAULT '',
  `image_mobile_2` VARCHAR(255)                     NOT NULL DEFAULT '',
  `image_mobile_3` VARCHAR(255)                     NOT NULL DEFAULT '',
  `html`           TEXT,
  `script`         TEXT,
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
  `id`     INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`  VARCHAR(255)     NOT NULL DEFAULT '',
  `height` INT(4) UNSIGNED  NOT NULL DEFAULT '0',
  `width`  INT(4) UNSIGNED  NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
);

CREATE TABLE `{view_log}` (
  `id`          INT(10) UNSIGNED       NOT NULL AUTO_INCREMENT,
  `propaganda`  INT(10) UNSIGNED       NOT NULL DEFAULT '0',
  `device`      ENUM ('web', 'mobile') NOT NULL DEFAULT 'web',
  `time_create` INT(10) UNSIGNED       NOT NULL DEFAULT '0',
  `uid`         INT(10) UNSIGNED       NOT NULL DEFAULT '0',
  `ip`          CHAR(15)               NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `time_create` (`time_create`)
);

CREATE TABLE `{click_log}` (
  `id`          INT(10) UNSIGNED       NOT NULL AUTO_INCREMENT,
  `propaganda`  INT(10) UNSIGNED       NOT NULL DEFAULT '0',
  `device`      ENUM ('web', 'mobile') NOT NULL DEFAULT 'web',
  `time_create` INT(10) UNSIGNED       NOT NULL DEFAULT '0',
  `uid`         INT(10) UNSIGNED       NOT NULL DEFAULT '0',
  `ip`          CHAR(15)               NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `time_create` (`time_create`)
);