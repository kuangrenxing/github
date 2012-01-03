<?php

class m110705_074521_init extends CDbMigration
{
    public function safeUp()
    {
        $sql = '
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pepsi`
--



--
-- Table structure for table `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `user_id` varchar(128) NOT NULL,
  `template_id` int(10) unsigned NOT NULL,
  `html` text,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--
-- Table structure for table `template`


CREATE TABLE IF NOT EXISTS `template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `view_name` varchar(45) NOT NULL,
  `layout` int(3) NOT NULL,
  `preview_image` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
';
Yii::app()->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        Yii::app()->db->createCommand('DROP TABLE `code`, `tbl_migration`, `template`;')->execute();
    }

}
