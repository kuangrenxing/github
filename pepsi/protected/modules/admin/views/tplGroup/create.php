<?php
$this->breadcrumbs=array(
	'Tpl Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TplGroup', 'url'=>array('index')),
	array('label'=>'Manage TplGroup', 'url'=>array('admin')),
);
?>

<h1>Create TplGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>