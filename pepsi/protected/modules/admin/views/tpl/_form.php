<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tpl-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span> 必填.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_name'); ?>
		<?php echo $form->textField($model,'group_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'group_name'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'group_slug'); ?>
        <?php echo $form->textField($model,'group_slug',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'group_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_count'); ?>
		<?php echo $form->textField($model,'item_count'); ?>
		<?php echo $form->error($model,'item_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'width'); ?>
		<?php echo $form->textField($model,'width',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grade'); ?>
		<?php echo $form->textField($model,'grade'); ?>
		<?php echo $form->error($model,'grade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_count'); ?>
		<?php echo $form->textField($model,'user_count',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'like_count'); ?>
		<?php echo $form->textField($model,'like_count',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'like_count'); ?>
	</div>
     
    <div class="row">
        <?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->dropDownList($model,'type',array($model::TYPE_NORMAL=>'普通模板',$model::TYPE_SPECIAL=>'当前季模板')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
     
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array($model::STATUS_ONLINE=>'上线',$model::STATUS_OFFLINE=>'下线')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
