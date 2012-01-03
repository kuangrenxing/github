<?php $this->beginClip('mealsTr')?>
<tr class="hgroup-w J_row">
  <td class="tl" style="padding-left:8px"><div class="ovh35">{title}</div></td>
  <td class="tl">{price} - <strong>{off}</strong></td>
  <td><div class="ovh35 tl">{template_name}</div></td>
  <td style="color:#616161">{updated}</td>
  <td>
    <em><a href='/da/meal/update/meal/{meal_id}/template/{template_id}'>编辑</a></em> | 
    <em><a href="/da/meal/view/meal/{meal_id}/template/{template_id}">查看</a></em>  | 
    <em><a class="J_copy_html" data-html="{html}" href="#">复制代码</a></em>  |  
    <em><a class="J_delete" href='#none' data-delete-url='/da/meal/delete/meal/{meal_id}/template/{template_id}'>删除</a></em>  
  </td>
<?php $this->endClip()?>

<div class="hgroup-t"><img src="/da/images/photo17.gif"></div>
<div class="hgroup">
  <table width="100%" border="0" style="font-size:12px;">
    <tr class="hgroup-tit">
      <td width="225" class="tl" style="padding-left:8px">套餐名称</td>
      <td width="90" class="tl">套餐价&nbsp;&nbsp;&nbsp;<strong>节省</strong></td>
      <td width="140">模板</td>
      <td width="110">时间</td>
      <td width="175">操作</td>
    </tr>
    <?php
      if (count($meals)) 
      {
      foreach($meals as $row)
      {
          $id=$row->meal_id;
          $shopMeal=$shopMeals[$id]['meal'];
          $this->renderClip('mealsTr',array(
              '{title}'=>$shopMeal->meal_name,
              '{price}'=>$shopMeal->meal_price,
              '{off}'=>$shopMeal->origi_price-$shopMeal->meal_price,
              '{meal_id}'=>$id,
              '{template_name}'=>$row->template->name,
              '{template_id}'=>$row->template_id,
              '{html}'=>CHtml::encode($row->html),
              '{updated}'=>date("Y-m-d H:m",($row->updated>0)?$row->updated:'1313479906')
          ));
      }
      }
      else
      {
      ?>
       
          <tr class="hgroup-w">
          <td colspan="5">还没任何搭配套餐, 马上去<em><a href="/da/meal/create">新建套餐</a><em></td>
     </tr>


<?php } ?>
</table>
</div>

<script type="text/javascript" src="/da/js/jquery.zclip.js"></script>
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
          $(self).parents('.J_row').remove();
        }
      },'JSON');
    }
  })
  .delegate('.J_row','mouseover',function(){
      $(this).removeClass('hgroup-w').addClass('hgroup-g');
  })
  .delegate('.J_row','mouseout',function(){
      $(this).addClass('hgroup-w').removeClass('hgroup-g');
  });
  $(document).bind('contextmenu',function(){return false;});
});
</script>
