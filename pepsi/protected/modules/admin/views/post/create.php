<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>创建评论</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>