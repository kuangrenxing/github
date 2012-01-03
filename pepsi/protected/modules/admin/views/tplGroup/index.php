<?php
$this->breadcrumbs=array(
	'Tpl Groups',
);

$this->menu=array(
	array('label'=>'Create TplGroup', 'url'=>array('create')),
	array('label'=>'Manage TplGroup', 'url'=>array('admin')),
);
?>

<h1>Tpl Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
