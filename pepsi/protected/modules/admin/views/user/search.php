<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>用户查询</h1>



<?php echo CHtml::link('用户精确查询','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.bootstrap.widgets.grid.BootGridView', array(
	'id'=>'user-grid',
	//数据提供修改为mysearch方法	
	'dataProvider'=>$model->mysearch(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'nick',
			//'value'=>'$data->nick',
			'header'=>'用户名称',
			'type'=>'raw',
			'value'=>'CHtml::link($data->nick,Yii::app()->createUrl("admin/user/view",array("id"=>$data->user_id)))',
		),
		//店铺地址
		/*
		array(
			'name'=>'sid',
			'type'=>'raw',
			'header'=>'店铺地址',
			'value'=>'CHtml::link("http://shop".$data->sid.".taobao.com","http://shop".$data->sid.".taobao.com",array("target"=>"_blank"))',
		),
		*/
		array(
			'name'=>'sid',
			'type'=>'raw',
			'header'=>'店铺名称',
			'value'=>'CHtml::link($data->title,"http://shop".$data->sid.".taobao.com",array("target"=>"_blank"))',
		),
		//旺旺号
		
		array(
			'name'=>'nick',
			'header'=>'旺旺号',
			'type'=>'raw',
			'value'=>'"<h1><a target=\"_blank\" href=\"http://amos1.taobao.com/msg.ww?v=2&uid=".$data->nick."&s=1\" ><img border=\"0\" src=\"http://amos1.taobao.com/online.ww?v=2&uid=".$data->nick."&s=1\" alt=\"点击这里给我发消息\" /></a> 
</h1>"',
		),
		array(
			'name'=>'seller_credit_level',
			'header'=>'卖家信用',
			'value'=>'User::getUserSellerLevelByNum($data->seller_credit_level)',
		),
		
		//'liangpin',
		array(
			'name'=>'type',
			'header'=>'店铺类型',
		),
		array(
			'name'=>'service_started',
			'header'=>'订购时间',
			'value'=>'date("Y-m-d",$data->service_started)',
		),
		array(
			'name'=>'service_ended',
			'header'=>'结束时间',
			'value'=>'date("Y-m-d",$data->service_ended)',
		),
		/*
		'seller_credit_level',
		'location',
		'created',
		'last_visit',
		'birthday',
		'type',
		'consumer_protection',
		'alipay_account',
		'alipay_no',
		'avatar',
		'liangpin',
		'sign_food_seller_promise',
		'has_shop',
		'is_lightning_consignment',
		'vip_info',
		'vertical_market',
		'last_login',
		'sid',
		'cid',
		'title',
		'pic_path',
		'shop_created',
		'shop_modified',
		'item_score',
		'service_score',
		'delivery_score',
		'remain_count',
		'all_count',
		'used_count',
		'login_count',
		'service_started',
		'service_ended',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
		),
	),
)); ?>
