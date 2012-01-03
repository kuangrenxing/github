<?php
$this->breadcrumbs=array(
	'Tpls'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tpl', 'url'=>array('index')),
	array('label'=>'Create Tpl', 'url'=>array('create')),
	array('label'=>'View Tpl', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tpl', 'url'=>array('admin')),
);
?>

<h1>Update Tpl <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>