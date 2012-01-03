<?php

class m110912_023039_create_session_key_model extends CDbMigration
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
-- Table structure for table `session_key`
--

CREATE TABLE IF NOT EXISTS `session_key` (
  `id` varchar(128) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `nick` varchar(128) DEFAULT NULL,
  `app_key` int(10) NOT NULL,
  `top_session_key` varchar(128) DEFAULT NULL,
  `created` int(11) unsigned DEFAULT NULL,
  `updated` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
            ';
        Yii::app()->db->createCommand($sql)->execute();
	}

	public function safeDown()
	{
		$this->dropTable('session_key');
	}

	
}
