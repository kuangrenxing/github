<?php
$this->breadcrumbs=array(
	'Tpl Groups'=>array('index'),
	$model->group_id,
);

$this->menu=array(
	array('label'=>'List TplGroup', 'url'=>array('index')),
	array('label'=>'Create TplGroup', 'url'=>array('create')),
	array('label'=>'Update TplGroup', 'url'=>array('update', 'id'=>$model->group_id)),
	array('label'=>'Delete TplGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->group_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TplGroup', 'url'=>array('admin')),
);
?>

<h1>View TplGroup #<?php echo $model->group_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'group_id',
		'group_name',
		'group_slug',
	),
)); ?>
