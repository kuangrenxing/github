<?php 

foreach($re as $result):?>
<a title="单击进行解压"
<?php if($filename==$result) echo "style='color:#ff0000'"; ?> href=<?php echo Yii::app()->baseUrl; ?>/index.php?r=upload/test&filename=<?php echo $result;?>>
<?php echo $result;	?>
</a><br>
<?php endforeach;


?>
