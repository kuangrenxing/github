<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>大搭出手应用后台管理登录</h1>

<div class="form">
<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm', array(
	'id'=>'example-form',
		
		'stacked'=>false, // should this be a stacked form?
		'errorMessageType'=>'inline', // how to display errors, inline or block?
		'enableAjaxValidation'=>false,
		
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>



	<p class="note">星号<span class="required">*</span>为必填字段.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'用户名'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'密码'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<!-- <div class="row rememberMe"> -->
		<?php //echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	<!-- </div> -->
	

 <div class="clearfix">
            <label for="prependedInput2">记住密码</label>
            <div class="input">
              <div class="input-prepend">
                <label class="add-on"><input type="checkbox" value="" id="" name=""></label>
                <input type="text" size="16" name="prependedInput2" value="记住密码" id="prependedInput2" class="mini">
              </div>
            </div>
          </div>

	<div class="row buttons" style="padding-left:130px;">
	
		<?php echo CHtml::submitButton('登录',array('class'=>'btn primary')); ?>
		&nbsp;
		<?php echo CHtml::resetButton('重置',array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

