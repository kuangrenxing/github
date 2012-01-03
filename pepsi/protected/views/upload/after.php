<?php if(count($result)):?>
<?php foreach ($result as $re):?>
<a href="<?php echo Yii::app()->baseUrl."/upload/afterlist/filedir/".$group_id.'/filedir1/'.$re; //$filedir.'/'.$re;?>">
<?php echo $re;?>
</a><br>	
<?php endforeach;?>
<?php else:?>
没有文件
<?php endif;?>	

