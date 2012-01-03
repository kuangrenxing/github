<?php

class m110830_094700_tpl_basic extends CDbMigration
{
    public function up()
    {
        $sql="
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`, `item_count`,`width`,`height`) VALUES
            (134,  '750-店铺-4件宝贝',   '750_4_shop', '750_4_shop.gif', '750_4_shop.gif', 4,750,230)
            ,(135,  '750-店铺-3件宝贝',   '750_3_shop', '750_3_shop.gif', '750_3_shop.gif', 3,750,230)
            ,(136,  '950-商城-2件宝贝',   '950_2_tmall', '950_2_tmall.gif','950_2_tmall.gif', 2,950,400)
            ;";
        Yii::app()->db->createCommand($sql)->execute(); 
        return true; 
    }

    public function down()
    {
        $sql=" DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 134;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 135;
        DELETE FROM `pepsi`.`template` WHERE `template`.`id` = 136;
        " ;
        Yii::app()->db->createCommand($sql)->execute();
        return true;    	
    }

}
