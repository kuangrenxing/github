<?php

class m110802_111009_qixi_tpl_insert extends CDbMigration
{
    public function safeUp()
    {
        $sql=" 
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`) VALUES
             (110, '七夕-750-两个宝贝', '750_2_qixi', '750_2_qixi.gif', '750_2_qixi.gif', 2)
            ,(111, '七夕-375-两个宝贝', '375_2_qixi', '375_2_qixi.gif', '375_2_qixi.gif', 2)
        ;";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 110; DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 111;" ;
        Yii::app()->db->createCommand($sql)->execute();
    } 
	
}
