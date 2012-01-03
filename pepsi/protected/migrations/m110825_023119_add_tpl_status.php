<?php

class m110825_023119_add_tpl_status extends CDbMigration
{
    public function up()
	{
        $sql="
            ALTER TABLE  `template` ADD  `status` TINYINT UNSIGNED NOT NULL DEFAULT  '1'
            ;UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =110
            ;UPDATE  `pepsi`.`template` SET  `status` =  '0' WHERE  `template`.`id` =111
        ;";
        Yii::app()->db->createCommand($sql)->execute(); 
		return true;
	}

	public function down()
	{
        $sql=" ALTER TABLE  `template` DROP  `status` 
            ;UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =110
            ;UPDATE  `pepsi`.`template` SET  `status` =  '1' WHERE  `template`.`id` =111
            ;" ;
        Yii::app()->db->createCommand($sql)->execute();
		return true;
	} 
}
