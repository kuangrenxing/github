<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

?>

<h1>用户列表</h1>


<?php $this->widget('ext.bootstrap.widgets.grid.BootGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'nick',
			'type'=>'raw',
			'value'=>'CHtml::link($data->nick,Yii::app()->createUrl("admin/user/view",array("id"=>$data->user_id)))',
			'header'=>'用户名称',
		),
		//店铺名称
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
			'type'=>'raw',
            'value'=>'"<img src=/da/images/credit/".$data->seller_credit_level.".gif />"'
		),
		
		//'liangpin',
		array(
			'name'=>'type',
			'header'=>'店铺类型',
		),
		array(
				'name'=>'user_id',
				'header'=>'meal',
				'type'=>'raw',
				//'value'=>'CHtml::link("meal",Yii::app()->createUrl("meal/index",array("user_id"=>$data->user_id)))',
				'value'=>'CHtml::link("meal(" . $data->mealCount . ")"  ,"/da/admin/meal/admin?user_id=$data->user_id")',
		),
		array(
				'name'=>'user_id',
				'header'=>'task',
				'type'=>'raw',
				'value'=>'CHtml::link("task(".$data->taskCount.")","/da/admin/task/admin?user_id=$data->user_id")',
				//'value'=>$data->taskCount==0 ? 'task' : 'CHtml::link("task(".$data->taskCount.")","/da/admin/task/admin?user_id=$data->user_id")',
		),	
/*  		array(
				'name'=>'taskCount',
				'header'=>'task数量',					
				'value'=>$data->taskCount,
		),	
		array(
				'name'=>'mealCount',
				'header'=>'Meal数量',					
				'value'=>$data->mealCount,
		),  */		

/* 		),		
 * array(
			'name'=>'service_started',
			'header'=>'订购时间',
			'value'=>'date("Y-m-d",$data->service_started)',
		),
		array(
			'name'=>'service_ended',
			'header'=>'结束时间',
			'value'=>'date("Y-m-d",$data->service_ended)',
		), */
		//'user_id',
		//'uid',
		//'nick',
		//'email',
		//'sex',
		//'buyer_credit_level',
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
			//'deleteButtonLabel'=>'删除',
			
		),
	),
)); ?>

