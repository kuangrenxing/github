<div style="padding-left:100px;">
<h1>请选择上传的zip文件</h1>
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
		<?php echo CHtml::errorSummary($model); ?>
		<div class="row">
			<?php echo CHtml::activeLabel($model,'input_name'); ?>
			<?php echo CHtml::activeTextField($model, 'input_name'); ?>
		</div>
		<br>
		<div class="row">
			<?php echo CHtml::activeLabel($model,'image'); ?>
			<?php echo CHtml::activeFileField($model, 'image'); ?>
		</div>

	    <div class="row submit" style="margin-top:15px;">
	    <?php echo CHtml::activeLabel($model,'grade'); ?>
	        <?php echo CHtml::activeDropDownList($model,'grade',array('1'=>'标准','2'=>'普通','3'=>'VIP')); ?>
	        
	    </div>
	   <div class="row submit" style="margin-top:15px;">
	   <?php echo CHtml::activeLabel($model,'status'); ?>
	        <?php //echo CHtml::activeDropDownList($model,'status',array('0'=>'关','1'=>'开'),array('empty'=>'请选择')); ?>
	        <?php echo CHtml::activeRadioButtonList($model,'status',array('0'=>'关','1'=>'开'));?>
	    </div>
	    
	    <div class="row submit" style="padding-left:100px;margin-top:15px;">
	        <?php echo CHtml::submitButton('Upload'); ?>
	        <a href="<?php echo Yii::app()->createUrl('admin/tplGroup/admin');?>">返回</a>
	    </div>
<?php echo CHtml::endForm(); ?>


<?php if(Yii::app()->user->hasFlash('succword')):?>
<div class="flash-success" style="padding-left:100px;margin-top:15px;">
<?php echo Yii::app()->user->getFlash('succword');?>
</div>
<?php endif;?>
</div>
