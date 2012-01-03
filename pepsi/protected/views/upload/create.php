<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
		<?php echo CHtml::errorSummary($model); ?>
		<div class="row">
			<?php echo CHtml::activeLabel($model,'image'); ?>
			<?php echo CHtml::activeFileField($model, 'image'); ?>
		</div>
	    <div class="row submit">
	        <?php echo CHtml::submitButton('Upload'); ?>
	    </div>
<?php echo CHtml::endForm(); ?>


