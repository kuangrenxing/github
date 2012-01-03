<?php
$this->breadcrumbs=array(
	'Tpls'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tpl', 'url'=>array('index')),
	array('label'=>'Create Tpl', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tpl-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tpls</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tpl-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'group_name',
		'group_slug',
		'item_count',
		'width',
		/*
		'height',
		'grade',
		'type',
		'user_count',
		'like_count',
		'created',
		'updated',
		'order',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
));

?>
<a href="<?php echo Yii::app()->createUrl('admin/tplGroup/admin');?>">返回</a>