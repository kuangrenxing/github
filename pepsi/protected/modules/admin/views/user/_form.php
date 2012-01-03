<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->textField($model,'uid',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nick'); ?>
		<?php echo $form->textField($model,'nick',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nick'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buyer_credit_level'); ?>
		<?php echo $form->textField($model,'buyer_credit_level',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'buyer_credit_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seller_credit_level'); ?>
		<?php echo $form->textField($model,'seller_credit_level',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'seller_credit_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_visit'); ?>
		<?php echo $form->textField($model,'last_visit',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'last_visit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthday'); ?>
		<?php echo $form->textField($model,'birthday',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'birthday'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'consumer_protection'); ?>
		<?php echo $form->textField($model,'consumer_protection'); ?>
		<?php echo $form->error($model,'consumer_protection'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alipay_account'); ?>
		<?php echo $form->textField($model,'alipay_account',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'alipay_account'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alipay_no'); ?>
		<?php echo $form->textField($model,'alipay_no',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'alipay_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'liangpin'); ?>
		<?php echo $form->textField($model,'liangpin'); ?>
		<?php echo $form->error($model,'liangpin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sign_food_seller_promise'); ?>
		<?php echo $form->textField($model,'sign_food_seller_promise'); ?>
		<?php echo $form->error($model,'sign_food_seller_promise'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_shop'); ?>
		<?php echo $form->textField($model,'has_shop'); ?>
		<?php echo $form->error($model,'has_shop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_lightning_consignment'); ?>
		<?php echo $form->textField($model,'is_lightning_consignment'); ?>
		<?php echo $form->error($model,'is_lightning_consignment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vip_info'); ?>
		<?php echo $form->textField($model,'vip_info',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vip_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vertical_market'); ?>
		<?php echo $form->textField($model,'vertical_market',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'vertical_market'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sid'); ?>
		<?php echo $form->textField($model,'sid',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'sid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cid'); ?>
		<?php echo $form->textField($model,'cid',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'cid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic_path'); ?>
		<?php echo $form->textField($model,'pic_path',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'pic_path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shop_created'); ?>
		<?php echo $form->textField($model,'shop_created',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'shop_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shop_modified'); ?>
		<?php echo $form->textField($model,'shop_modified',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'shop_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_score'); ?>
		<?php echo $form->textField($model,'item_score',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'item_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_score'); ?>
		<?php echo $form->textField($model,'service_score',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'service_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_score'); ?>
		<?php echo $form->textField($model,'delivery_score',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'delivery_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remain_count'); ?>
		<?php echo $form->textField($model,'remain_count'); ?>
		<?php echo $form->error($model,'remain_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'all_count'); ?>
		<?php echo $form->textField($model,'all_count'); ?>
		<?php echo $form->error($model,'all_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'used_count'); ?>
		<?php echo $form->textField($model,'used_count'); ?>
		<?php echo $form->error($model,'used_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login_count'); ?>
		<?php echo $form->textField($model,'login_count',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'login_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_started'); ?>
		<?php echo $form->textField($model,'service_started',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'service_started'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_ended'); ?>
		<?php echo $form->textField($model,'service_ended',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'service_ended'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
