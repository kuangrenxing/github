<?php
$this->breadcrumbs=array(
	'Dapeis'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dapei', 'url'=>array('index')),
	array('label'=>'Create Dapei', 'url'=>array('create')),
	array('label'=>'View Dapei', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dapei', 'url'=>array('admin')),
);
?>

<h1>Update Dapei <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>