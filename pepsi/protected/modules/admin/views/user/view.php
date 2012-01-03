<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>查看用户详情 #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'uid',
		'nick',
		array(
			'name'=>'nick',
			'type'=>'raw',
			'value'=>'<h1><a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&uid='.$model->nick.'&s=1" ><img border="0" src="http://amos1.taobao.com/online.ww?v=2&uid='.$model->nick.'&s=1" alt="点击这里给我发消息\" /></a> 
</h1>',
		),
		'email',
		'sex',
		'buyer_credit_level',
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
		//'sid',
		array(
			'name'=>'sid',
			'value'=>$model->sid,
		),
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
	),
)); ?>
