<?php

class m110915_090944_create_task_model extends CDbMigration
{
	public function up()
    {
        $sql='
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pepsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(128) DEFAULT NULL,
  `app_id` smallint(5) unsigned DEFAULT NULL,
  `html` text,
  `status` smallint(5) unsigned DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `updated` int(11) unsigned DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

';
		Yii::app()->db->createCommand($sql)->execute(); 

	}

	public function safeDown()
	{
        $this->dropTable('task');
	}
 
}
