<?php
$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理评论</h1>
<p>使用提示：在POST类型框中输入=1敲回车，返回类型为新手帮助信息列表，输入=2敲回车，返回类型为最新公告的信息列表</p>
<p>在状态框中输入=1敲回车，返回状态为显示的信息列表，输入=0敲回车，返回状态为隐藏的信息列表</p>
<?php $this->widget('ext.bootstrap.widgets.grid.BootGridView', array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name'=>'published',
			'value'=>'date("Y-m-d",$data->published)',
		),
		//'title',
		array(
			'name'=>'title',
			'type'=>'raw',
			'value'=>'CHtml::link($data->title,Yii::app()->createUrl("admin/post/update",array("id"=>$data->id)))',
		),
		//'url',
		array(
			'name'=>'url',
			'type'=>'raw',
			'value'=>'CHtml::link($data->url,$data->url,array("target"=>"_blank"))',
		),
		array(
			'name'=>'type',
			'value'=>'$data->type==1?"新手帮助":"最新公告"',
		),
		array(
			'name'=>'status',
			'value'=>'$data->status==1?"显示":"隐藏"',
		),
		//'type',
		//'status',
		
		//'published',
		/*
		'created',
		'updated',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
		),
	),
)); ?>
