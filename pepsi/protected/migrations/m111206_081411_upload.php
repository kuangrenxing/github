<?php

class m111206_081411_upload extends CDbMigration
{
	public function up()
	{
	$sql="CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		$this->dropTable("upload");
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
