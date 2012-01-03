<?php
$this->breadcrumbs=array(
	'Tpls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tpl', 'url'=>array('index')),
	array('label'=>'Manage Tpl', 'url'=>array('admin')),
);
?>

<h1>Create Tpl</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>