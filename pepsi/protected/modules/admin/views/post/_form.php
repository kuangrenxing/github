<div class="form">

<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); */ ?>

<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm', array(
    'id'=>'example-form',
    'stacked'=>false, // should this be a stacked form?
    'errorMessageType'=>'inline', // how to display errors, inline or block?
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">星号 <span class="required">*</span>为必填字段.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',$model->getTypeOptions()); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',$model->getStatusOptions()); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php 
		$this->widget('ext.timepicker.timepicker', array(
		    'model'=>$model,
		    'name'=>'published',
			'options'=>array(
				'dateFormat'=>'yy/mm/dd',
				'timeFormat'=>'hh:mm:ss',
				'showOn'=>'focus',
				//'value'=>isset($model->published)?date('Y-m-d H:i:s',$model->published):date('Y-m-d H:i:s',time()),
				'value'=>date('Y-m-d H:i:s',time()),
			),
		));?>
		
		<?php echo $form->error($model,'published'); ?>
	</div>

	

	<div class="row buttons" style="padding-left: 130px;">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>'btn primary')); ?>
		&nbsp;
		<?php echo CHtml::resetButton('重置',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->