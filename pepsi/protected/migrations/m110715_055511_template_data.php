<?php

class m110715_055511_template_data extends CDbMigration
{

    public function safeUp()
    {
        $sql=" 
            TRUNCATE TABLE template;	
            INSERT INTO `template` ( `id`, `name`, `view_name`, `tag_image`, `preview_image`) VALUES
             ('1',  '750店铺', '750_shop'  , '750_shop.gif' ,  '750_shop.gif'  )
            ,('2',  '750旺铺', '750_wang'  , '750_wang.gif' ,  '750_wang.gif'  )
            ,('3',  '750良品', '750_liang' , '750_liang.gif',  '750_liang.gif' )
            ,('4',  '750商城', '750_tmall' , '750_tmall.gif',  '750_tmall.gif' )
            ,('5',  '950店铺', '950_shop'  , '950_shop.gif' ,  '950_shop.gif'  )
            ,('6',  '950旺铺', '950_wang'  , '950_wang.gif' ,  '950_wang.gif'  )
            ,('7',  '950良品', '950_liang' , '950_liang.gif',  '950_liang.gif' )
            ,('8',  '950商城', '950_tmall' , '950_tmall.gif',  '950_tmall.gif' )
            ,('9',  '190店铺', '190_shop'  , '190_shop.gif' ,  '190_shop.gif'  )
            ,('10', '190旺铺', '190_wang'  , '190_wang.gif' ,  '190_wang.gif'  )
            ,('11', '190良品', '190_liang' , '190_liang.gif',  '190_liang.gif' )
            ,('12', '190商城', '190_tmall' , '190_tmall.gif',  '190_tmall.gif' )
            ;";
        Yii::app()->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        $sql=" TRUNCATE TABLE template;" ;
        Yii::app()->db->createCommand($sql)->execute();
    }  

}

