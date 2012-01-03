<?php
$this->breadcrumbs=array(
	'Admin Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdminUser', 'url'=>array('index')),
	array('label'=>'Manage AdminUser', 'url'=>array('admin')),
);
?>

<h1>创建管理员</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>