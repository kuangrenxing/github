<?php
$this->breadcrumbs=array(
	'Tpls'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tpl', 'url'=>array('index')),
	array('label'=>'Create Tpl', 'url'=>array('create')),
	array('label'=>'Update Tpl', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tpl', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tpl', 'url'=>array('admin')),
);
?>

<h1>View Tpl #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'group_name',
		'group_slug',
		'item_count',
		'width',
		'height',
		'grade',
		'type',
		'user_count',
		'like_count',
		'created',
		'updated',
		'order',
		'status',
	),
)); ?>
