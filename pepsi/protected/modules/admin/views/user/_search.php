<div class="wide form">

<?php /* $form=$this->beginWidget('CActiveForm', array( */
	//'action'=>Yii::app()->createUrl($this->route),
	/* 'action'=>Yii::app()->createUrl('/admin/user/search'),
	'method'=>'get',
)); */ ?>

<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm', array(
    'id'=>'example-form',
    'stacked'=>false, // should this be a stacked form?
    'errorMessageType'=>'inline', // how to display errors, inline or block?
    'enableAjaxValidation'=>false,
	'action'=>Yii::app()->createUrl('/admin/user/search'),
	'method'=>'get',
)); ?>



	

	<div class="row">
		<?php echo $form->label($model,'nick'); ?>
		<?php echo $form->textField($model,'nick',array('size'=>60,'maxlength'=>128)); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'seller_credit_level'); ?>
		<?php echo $form->textField($model,'seller_credit_level',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',$model->getShopTypeOptions()); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'liangpin'); ?>
		<?php echo $form->textField($model,'liangpin'); ?>
	</div>




	<div class="row buttons" style="padding-left:170px;">
		<?php echo CHtml::submitButton('查询',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->