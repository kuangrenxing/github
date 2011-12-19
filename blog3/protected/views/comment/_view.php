<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
	
	<div class="author">
		<?php echo $data->authorLink; ?> says on
		<?php echo CHtml::link(CHtml::encode($data->post->title), $data->post->url); ?>
	</div>

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode(date('Y-m-d H:i:s',$data->create_time)); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<?php if($data->status==Comment::STATUS_PENDING): ?>
			<span class="pending">Pending approval</span> |
			<?php echo CHtml::linkButton('Approve', array(
				'submit'=>array('comment/approve','id'=>$data->id),
			)); ?> |
		<?php endif; ?>
		<?php echo CHtml::link('Update',array('comment/update','id'=>$data->id)); ?> |
		<?php echo CHtml::linkButton('Delete', array(
			'submit'=>array('comment/delete','id'=>$data->id),
			'confirm'=>"Are you sure to delete comment #{$data->id}?",
		)); ?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
	<?php echo CHtml::encode($data->post_id); ?>
	<br />

	*/ ?>

</div>


