<?php

class m110725_020850_update_template extends CDbMigration
{
	public function safeUp()
    {
        $sql=" 
            TRUNCATE TABLE template;	
            TRUNCATE TABLE meal;	
            INSERT INTO `template` (`id`, `name`, `view_name`, `tag_image`, `preview_image`) VALUES
            (10, '750模板', '750', '750.gif', '750.gif'),
            (20, '950模板', '950', '950.gif', '950.gif'),
            (30, '190模板', '190', '190.gif', '190.gif');

            ";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        $sql="TRUNCATE TABLE template;" ;
        Yii::app()->db->createCommand($sql)->execute();
    }    
}
