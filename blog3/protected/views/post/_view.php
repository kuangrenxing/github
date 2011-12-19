<div class="view">
	
	<h2><?php echo CHtml::link(CHtml::encode($data->title),$data->url);?></h2>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode(date('Y-m-d H:i:s',$data->create_time)); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />


<!--	<b><?php // echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php //echo CHtml::encode($data->status); ?>
	<br />-->
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo implode(',',$data->TagLinks); ?>
	<br />
	<?php echo CHtml::link('Permalink', $data->url); ?> |
	<b><?php echo CHtml::link('Comments('.$data->commentCount.')',$data->url.'#comments');?></b>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode(date('Y-m-d H:i:s',$data->update_time)); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<?php echo CHtml::encode($data->author_id); ?>
	<br />

	*/ ?>

</div>