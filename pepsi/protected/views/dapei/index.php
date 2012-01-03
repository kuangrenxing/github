



<div class="daily">
   	<div class="daily_title daily_bot8"><img src="/da/v2/images/see_daily.gif"><a href="#" class="J_rollback_all" >撤销全部</a><a href="#" class="ml"><img src="/da/v2/images/Synchronous_data01.gif"></a></div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="daily-table">
              <tbody><tr class="height34">
                <td width="80">搭配名称</td>
                <td>&nbsp;</td>
                <td width="79">状态</td>
                <td width="80">模板</td>
                <td width="79">操作</td>
                <td width="79">成功</td>
                <td width="79">失败</td>
                <td width="79">删除</td>
              </tr>
			
			  <?php
			      if (count($dapei_model)) 
			      {
					   $idx = 0;
				       foreach($dapei_model as $dapei)
				       {										
							$height_tag = $idx++ % 2 != 0 ? 'height9001' : 'height90';	
						  ?>
						
							<tr class="J_row <?php echo $height_tag; ?>">
							<?php foreach ($dapei->meals as $meal): ?>
						    <td class="tc_pic"><a href="http://item.taobao.com/mealDetail.htm?meal_id=<?php echo $meal->meal_id; ?>"><img src="<?php echo $meal->getMealPic();?>"></a>
						    <?php if ($meal->isFreeShip()): ?>
								<div class="postagefee"><img src="/da/v2/images/potage.gif"></div>
							<?php endif; ?>
						    </td>
						    <td class="tc-name">
						        <a href="http://item.taobao.com/mealDetail.htm?meal_id=<?php echo $meal->meal_id; ?>"><?php echo $meal->meal_name; ?></a>
						        <span class="price"><?php echo $meal->meal_price; ?> | 节省<strong><?php echo ($meal->getOrigiPrice() >= $meal->meal_price ? $meal->getOrigiPrice() - $meal->meal_price : 0); ?></strong></span>
						        <span>搭配件数<?php $meal_info = CJSON::decode($meal->raw_data); echo count($meal_info['itemCart']); ?>件</span>
						    </td>
						
							<?php endforeach; ?>

						    <td>
							<?php if ($dapei->status == 1):?>
							<span class="effective">有效</span>
							<?php else:?>
							<span class="effective">无效</span>	
							<?php endif; ?>
							</td>
						    <td class="mode_pic"><a href="/da/dapei/<?php echo $dapei->id; ?>" title="点击查看"><img src="/da/v2/images/pic80.gif" class="bor"></a>
						    <div class="position"><img src="/da/v2/images/750.gif"></div></td>
						   
							<?php if ($dapei->job===null):?>
							 <td>
							<a href="/da/publish/create/<?php echo $dapei->id; ?>"><img src="/da/v2/images/release.gif"></a>
							<?php else: ?>
								<?php if ($dapei->job->status == Job::STATUS_FINISHED): ?>
									
							
							<td class="cz">
							<a href="#none" class="J_update_html" data-id="<?php echo $dapei->job->id; ?>"><img src="/da/v2/images/update.gif"></a>
							<a href="#none" class="J_delete_html" data-id="<?php echo $dapei->job->id; ?>">撤销</a>
				
									<?php else: ?>
										<td>
										<a href="#none" class="J_delete_html" data-id="<?php echo $dapei->job->id; ?>">重试</a>
				
							<?php endif; ?>
							
							
							
							<?php endif; ?>
							</td>
						    <td>
							<?php if (isset($dapei->job)): ?>
							<font class="success">
							<a href="/da/job/view/id/<?php echo $dapei->job->id; ?>/status/<?php echo $dapei->job->status; ?>/type/<?php echo $dapei->job->type;?>">
							<?php echo  $dapei->job->successer; ?></a></font>个
							<?php else: ?>
								N/A
							<?php endif; ?>
							</td>
						    <td><font class="default"><a href="#"><?php echo isset($dapei->job) ? $dapei->job->failer : 'n/a'; ?></a></font>个</td>
						    <td>
								<?php if ( !isset($dapei->job)) :?>
							<a href="#" class="J_delete" data-delete-url="/da/dapei/remove/<?php echo $dapei->id; ?>"><img src="/da/v2/images/publish_x.png"></a>
							<?php endif; ?>
							</td>
						  </tr>
						 
						 
					
				 <?php
					   }
			      }
			      else
			      {
			      ?>
			
					
					          <tr class="height90">
					          <td colspan="15">还没任何搭配套餐, 马上去<em><a href="/da/tpl/index">新建套餐</a><em></td>
					     </tr>


					<?php } ?>


            </tbody></table>
 <?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
  </div>

<script type="text/javascript" src="/da/js/jquery.zclip.js"></script>
<script type="text/javascript" src="/da/js/autoCombobox.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
  $.each($('.J_copy_html'),function(k,v){
    $(this).zclip({
      path:'/da/js/ZeroClipboard.swf',
      copy: $("<div/>").html($(this).attr('data-html')).text(),
      afterCopy:function(){
        alert('亲,模版代码已经复制到剪切板了:)');
      }
    });
  })

  $('body').delegate('a.J_delete ','click',function(){
    var self = this;
    if(confirm('亲,真的要删除这个搭配么?')){
      $.get($(this).attr('data-delete-url'),function(data){
        if(data.success){
          window.location.reload();
			//$(self).parents('.J_row').remove();
        }
      },'JSON');
    }
  })
  .delegate('.J_rollback_all', 'click', function(){
		var self = this;
		if(confirm("亲，你确定撤销全部发布吗？")) {
			fetch('/da/item/getallitems', {}, function(data){
				trace(data);
				if (data.success == true)
				{  
					$.post('/da/job/dropall',{data:data,old_type:0},function(data) {
						//self.processJob(data); 
						trace(data);
						//window.location.href = "/da/job/processing/id/" + data.job_id;
				    },'json');
					
				}
				else
				{
					alert("出错了， 请重试！");
				}
			})
		}
   })
  .delegate('.J_update_html','click', function(){
	var self = this,
	  id = $(this).attr('data-id');
	  trace(id);
	  $.get('/da/job/update/'+id,function(data){
		fetch('/da/job/process',{},function(data){
				trace(data);
				// window.location.href="/da/dapei/index";
				window.location.reload();
		    });
	   
	  },'json');
  })
  .delegate('.J_delete_html','click', function(){
	var self = this,
	  id = $(this).attr('data-id');
	  trace(id);
	  $.get('/da/job/rollback/'+id,function(data){
		fetch('/da/job/process',{},function(data){
				trace(data);
				// window.location.href="/da/dapei/index";
				window.location.reload();
		    });
	   
	  },'json');
  })
  .delegate('.J_row','mouseover',function(){
      $(this).removeClass('hgroup-w').addClass('hgroup-g');
  })
  .delegate('.J_row','mouseout',function(){
      $(this).addClass('hgroup-w').removeClass('hgroup-g');
  });
<?php if (!YII_DEBUG): ?>
  $(document).bind('contextmenu',function(){return false;});
<?php endif; ?>
});
</script>
