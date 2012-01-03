<?php
$cs=Yii::app()->clientScript;
$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/style_v2.css');
?>

<div class="daily">
  <div class="daily_title daily_bot5 ks-clear">
    <ul>
      <li class="w430"><img src="/da/v2/images/create_col.gif"></li>
      <li><a href="javascript:syncMeal();" class="J_sync_meal"><img src="/da/v2/images/update.gif" width="76" height="22"></a></li>
      <li>最后更新时间：<font class="time"><?php echo date('Y-m-d H:m:s',Yii::app()->user->getState('cacheLastUpdated'));?></font></li>
      
    </ul>
  </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tac">
    <tbody>
      <tr class="height34">
        <td class="pl10tl">搭配名称</td>
        <td width="42">搭配价</td>
        <td width="8">&nbsp;</td>
        <td width="40"><strong>节省</strong></td>
        <td width="125">模板</td>
        <td width="110">时间</td>
        <td colspan="2">操作</td>
      </tr>
      
      <?php $this->beginClip('mealsTr')?>
      <tr class="height38 J_row">
        <td align="left" valign="middle">
          <font class="baobei_tit">
          <a href="http://item.taobao.com/mealDetail.htm?meal_id={meal_id}" target="_blank">{title}</a>
          </font>
        </td>
        <td>{price}</td>
        <td align="center">-</td>
        <td><font class="jiesheng">{off}</font></td>
        <td class="mode_tit">{template_name}</td>
        <td><font class="time">{updated}</font></td>
        <td align="left">
          <font class="cha_del">
            {view_link}
            <a class="J_delete" href='#none' data-delete-url='/da/meal/delete/meal/{meal_id}/template/{template_id}'>删除</a>
          </font>
        </td>
        <td align="left" width="48"><?php if(Yii::app()->user->getState('grade')>0){ ?> {publish_link}<?php }else{ echo '<a href="/da/price"><img src="/da/v2/images/release.gif" width="39 height="19"></a>';}?> </td>
      </tr>
      <?php $this->endClip()?> 
      <?php if (count($meals)) 
      {
          foreach($meals as $row)
          {
              $id=$row->meal_id;
              $shopMeal=$shopMeals[$id]['meal'];
              $this->renderClip('mealsTr',array(
                  '{title}'=>$shopMeal->meal_name,
                  '{price}'=>$shopMeal->meal_price,
                  '{off}'=>$shopMeal->origi_price-$shopMeal->meal_price,
                  '{view_link}'=>isset($shopMeal->invalid)?'<a href="#none"></a>':'<a href="/da/meal/view/meal/'.$id.'/template/'.$row->template_id.'">查看</a>',
                  '{publish_link}'=>isset($shopMeal->invalid)?'<a href="#none"></a>':'<a href="/da/publish/index/meal/'.$id.'/template/'.$row->template_id.'"><img src="/da/v2/images/release.gif" width="39" height="19"></a>',
                  '{template_name}'=>$row->template->name,
                  '{template_id}'=>$row->template_id,
                  '{meal_id}'=>$id,
                  '{html}'=>CHtml::encode($row->html),
                  '{updated}'=>date("Y-m-d H:m",($row->updated>0)?$row->updated:'1313479906')
              ));
          }
      }
      else
      {?>
          <tr class="hgroup-w"> <td colspan="8">还没任何搭配套餐, 马上去<em><a href="/da/meal/create">新建套餐</a><em></td></tr>
<?php } ?>

      <tr>
        <td colspan="8">
          <div class="conts">
            <ul class="pageUl clearfix">
            <?php 
            $this->widget('CLinkPager', array(
                'pages' => $pages,
                'header' => '',
                'firstPageLabel' => '',
                'lastPageLabel' => '',
                'nextPageLabel' => '<img src="/da/v2/images/pageturn_right.gif"  >',
                'prevPageLabel' => '<img src="/da/v2/images/pageturn_left.gif"  >', 
                'htmlOptions' => array(
                    'class'=>'pageUl clearfix pagerList',
                    'id'=>'pagerList'
                )  
            ));
            ?>
          </ul>
        </div></td>
      </tr>
  </tbody>
</table>
</div>  
 <script type="text/javascript" charset="utf-8">
$(document).ready(function(){
  $('body').delegate('a.J_delete ','click',function(){
    var self = this;
    if(confirm('亲,真的要删除这个搭配么?')){
      $.get($(this).attr('data-delete-url'),function(data){
        if(data.success){
          $(self).parents('.J_row').remove();
        }
      },'JSON');
    }
  })
  .delegate('.J_row','mouseover',function(){
      $(this).removeClass('height38').addClass('height38_hover');
  })
  .delegate('.J_row','mouseout',function(){
      $(this).addClass('height38').removeClass('height38_hover');
  });
  
  $(document).bind('contextmenu',function(){return false;});
  
});

function syncMeal(){
  $('.J_sync_meal img').attr('src','/da/v2/images/updating.gif');
  $.get('/da/meal/load',function(data){
      if(data){
      $('.J_sync_meal img').attr('src','/da/v2/images/update.gif');
      alert('亲,套餐同步成功了!');
      }
      }).error(function(){
        $('.J_sync_meal img').attr('src','/da/v2/images/update.gif');
        alert('亲,同步失败了,请再试一次吧!'); 
        }); 
}
</script> 

