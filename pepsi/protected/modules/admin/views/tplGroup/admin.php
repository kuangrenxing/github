<?php
$this->breadcrumbs=array(
	'Tpl Groups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TplGroup', 'url'=>array('index')),
	array('label'=>'Create TplGroup', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tpl-group-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tpl Groups</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tpl-group-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'group_id',
		'group_name',
		'group_slug',
		'grade',
		'status',
		array(
					'name'=>'group_id',
					'header'=>'tpl',
					'type'=>'raw',
					//'value'=>'CHtml::link("meal",Yii::app()->createUrl("meal/index",array("user_id"=>$data->user_id)))',
					'value'=>'CHtml::link("tpl"  ,"/da/admin/tpl/admin?group_id=$data->group_id")',
			),
		array(
				'name'=>'complot',
				'type'=>'html',
				//'value'=>'CHtml::link($data->title,Yii::app()->createUrl("admin/post/update",array("id"=>$data->id)))',
				//'value'=>'CHtml::link(修改,a).CHtml::link(删除,a)',
				//'value'=>'TplGroup::check_link()',
				'value'=>'CHtml::link("修改&nbsp"  ,Yii::app()->createUrl("admin/Upload/update/input_name/$data->group_name/group_id/$data->group_id/grade/$data->grade/status/$data->status")).CHtml::link("&nbsp删除"  ,"/da/admin/tplGroup/delete/id/$data->group_id/input_name/$data->group_name")',
		),
			
	
		
	),
)); 

?>
<a href="<?php echo Yii::app()->createUrl('admin/upload/create');?>">创建新模板</a>







