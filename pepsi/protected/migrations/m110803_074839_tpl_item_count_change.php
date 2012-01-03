<?php

class m110803_074839_tpl_item_count_change extends CDbMigration
{
	public function safeUp()
    {
        $sql=" 
            UPDATE  `pepsi`.`template` SET  `item_count` =  '5' WHERE  `template`.`id` =10;
            UPDATE  `pepsi`.`template` SET  `item_count` =  '5' WHERE  `template`.`id` =20;
            UPDATE  `pepsi`.`template` SET  `item_count` =  '5' WHERE  `template`.`id` =30;
        ";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {    
        $sql=" 
            UPDATE  `pepsi`.`template` SET  `item_count` =  '0' WHERE  `template`.`id` =10;
            UPDATE  `pepsi`.`template` SET  `item_count` =  '0' WHERE  `template`.`id` =20;
            UPDATE  `pepsi`.`template` SET  `item_count` =  '0' WHERE  `template`.`id` =30;
        "; 
        Yii::app()->db->createCommand($sql)->execute();
    }

}
