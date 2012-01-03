<?php

//Take care of this. You should know the risk of of changing this.
class XLogger extends CLogger 
{
   // An helper make log more convenient. 
    public static function xlog($message,$level='info',$category='application')
    {
        if(is_array($message))
        {
         $message = serialize($message);
        }
        Yii::log($message,$level,$category);
    }
}

?>
