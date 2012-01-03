<?php



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('Meal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>查看Meal</h1>





<?php $this->widget('ext.bootstrap.widgets.grid.BootGridView', array(
	'id'=>'Meal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'hideHeader'=>0,
	
	
	'columns'=>array(
		'meal_id',
		'user_id',
		'template_id',
		//'html',
		array(
		'name'=>'created',
		 'value'=>'date("Y-m-d H:i:s", $data->created)',
		
		),
		array(
		'name'=>'updated',
		 'value'=>'date("Y-m-d H:i:s", $data->updated)',
		
		),

		array(
				'name'=>'updated',
				'header'=>'task',
				'type'=>'raw',
				'value'=>'CHtml::link("task","/da/admin/task/admin?meal_name=$data->meal_id")',
		),
),
)); ?>
