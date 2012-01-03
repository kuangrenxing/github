<?php

class m110913_065440_create_queue_model extends CDbMigration
{
	public function up()
    {

        $sql='
            SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
        SET time_zone = "+00:00";
        CREATE TABLE IF NOT EXISTS `queue` (
            `id` int unsigned NOT NULL AUTO_INCREMENT,
            `task_id` int unsigned DEFAULT NULL,
            `app_id` int unsigned DEFAULT NULL,
            `created` int unsigned DEFAULT NULL,
            `updated` int unsigned DEFAULT NULL,
            `status` tinyint unsigned DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
        ';
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function down()
    {
        $this->dropTable('queue');
        return true;
    }


}
