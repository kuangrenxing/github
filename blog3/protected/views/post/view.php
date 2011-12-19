<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'tags',
		'status',
		
		array('name'=>'create_time',
			
			'value'=>date('Y-m-d H:i:s',$model->create_time+3600*8)),
			
		array('name'=>'create_time',
			'value'=>date('Y-m-d H:i:s',$model->create_time+3600*8),),
		'author_id',
	),
)); ?>
<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount . 'comments(s)';?>
		</h3>
		<?php
		$this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		));
		
		?>
	
	<?php endif;?>
	<br />
<h3>Leave a Comment</h3>
<?php if(Yii::app()->user->hasFlash('commentSubmitted')):?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('commentSubmitted');?>
	</div>
	<?php else: ?>
	<?php $this->renderPartial('/comment/_form',array(
		'model'=>$comment,
	));?>
	<?php endif;?>
	
</div>


