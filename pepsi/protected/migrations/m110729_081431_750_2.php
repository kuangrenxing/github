<?php

class m110729_081431_750_2 extends CDbMigration
{
	public function safeUp()
    {
        $sql=" 
            TRUNCATE TABLE template;	
        INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`) VALUES
            (10, '750-通用', '750', '750.gif', '750.gif', 0),
            (20, '950-通用', '950', '950.gif', '950.gif', 0),
            (30, '190-通用', '190', '190.gif', '190.gif', 0),
            (101, '750-店铺-2个宝贝', '750_2_shop',  '750_2_shop.gif',  '750_2_shop.gif',  2),
            (102, '750-旺铺-2个宝贝', '750_2_wang',  '750_2_wang.gif',  '750_2_wang.gif',  2),
            (103, '750-良品-2个宝贝', '750_2_liang', '750_2_liang.gif', '750_2_liang.gif', 2),
            (104, '750-商城-2个宝贝', '750_2_tmall', '750_2_tmall.gif', '750_2_tmall.gif', 2)
        ;";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        $sql=" TRUNCATE TABLE template;" ;
        Yii::app()->db->createCommand($sql)->execute();
    }
}
