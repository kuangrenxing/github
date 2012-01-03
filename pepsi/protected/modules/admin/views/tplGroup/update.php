<?php
$this->breadcrumbs=array(
	'Tpl Groups'=>array('index'),
	$model->group_id=>array('view','id'=>$model->group_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TplGroup', 'url'=>array('index')),
	array('label'=>'Create TplGroup', 'url'=>array('create')),
	array('label'=>'View TplGroup', 'url'=>array('view', 'id'=>$model->group_id)),
	array('label'=>'Manage TplGroup', 'url'=>array('admin')),
);
?>

<h1>Update TplGroup <?php echo $model->group_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>