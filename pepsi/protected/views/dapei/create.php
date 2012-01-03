<?php
$this->breadcrumbs=array(
	'Dapeis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dapei', 'url'=>array('index')),
	array('label'=>'Manage Dapei', 'url'=>array('admin')),
);
?>

<h1>Create Dapei</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>