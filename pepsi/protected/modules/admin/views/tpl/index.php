<?php
$this->breadcrumbs=array(
	'Tpls',
);

$this->menu=array(
	array('label'=>'Create Tpl', 'url'=>array('create')),
	array('label'=>'Manage Tpl', 'url'=>array('admin')),
);
?>

<h1>Tpls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
