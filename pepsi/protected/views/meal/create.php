<form id="xform" action="/da/meal/create" method="POST" accept-charset="utf-8" name="kdkd">
<div class="nav_choose"><img src="/da/images/nav_choose_taocan.gif" /><a href="http://bangpai.taobao.com/group/thread/14435987-261667406.htm" target="_blank"><span>点击查看帮助</span></a></div>
<div class="mbxz_mbox1">   
  <div class="mbxz_m1">
    <div class="xztc_cmm ks-clear" style="height:87px; ">
      <div class="mbxz_titbg">
        <div class="mbxz_tit">
          <a href="#" id="addMeal" class="cboxElement"><img src="/da/images/btn01.gif" width="95" height="29"></a>
          <em class="cr">*</em>请先在淘宝后台的搭配套餐中创建好套餐,之后大搭出手就能大展拳脚了
        </div>
      </div>
    </div>

    <div id='J_meal_list' class="xztc_cmm bbbj" style="display:none;margin:0 20px">
    <?php $this->beginClip('Meals')?>
      <div style='display:none' id='J_meal_{meal_id}' class='J_meal_section '>
      <dl><dd>套餐名称<em>{title}</em><dr>套餐价<em>￥{price} </em></dr></dd></dl>
      {items}
      <span class="list left_fix w166">&nbsp;</span>
      <span class="list left_fix w166">&nbsp;</span>
      <span class="list left_fix w166">&nbsp;</span>
      </div>
    <?php $this->endClip()?>

    <?php
         $mealList=$meals['mealList'];
         $items=$meals['items'];
        foreach($mealList as $k=>$row)
        {
            $itemsList='';
            if(isset($items[$k]))
            {
                foreach($items[$k] as $item)
                {
                    $itemsList.='<span class="list"><span class="bor3"><a href="#" class="wh160 dtcvm"><img src="'.$item->middle_url.'" class="vam"/></a></span></span> ';
                }
                $this->renderClip('Meals',array(
                    '{title}'=>$row->meal_name,
                    '{price}'=>$row->meal_price,
                    '{items}'=>$itemsList,
                    '{meal_id}'=>$row->meal_id,
                ));
            }
        }
?>
    </div>
  </div>
</div>
<div class="nav_choose"><img src="/da/images/nav_choose_mode.gif" /></div>

<div class="mbxz_mbox padding3">
  <div class="choose_mode xztc_cmm ks-clear ">
    <ul class="ks-clear">
    <?php $this->beginClip('Template')?>
    <li  class="J_template_list list {curr}" data-gravity="{gravity}" data-preview-image='
                  <div class="colorbox width{width} height{height}">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody><tr>
                        <td><img src="{preview_image}" width="{img_width}" height="{img_height}"></td>
                        <td valign="top" width="120">
                         <div class="colorbox_right">
                           <a href="#" class="like">{like_count}人喜欢</a>
                           <a href="#" class="used">{user_count}人使用</a>
                         </div>
                         {vip}
                       </td>
                      </tr>
                    </tbody></table>
                    <div class="triangle_bottom pngfix"></div>
                  </div>
' >
      <a href="#none" class=" wh160 dtcvm pngfix ">
        <img src={tag_image} class="vam" data-id={id} data-permission="{permission}" data-item-count="{item_count}">{i}
      </a>
      <div class="over"><a href="#none" class="J_like left {liked} pngfix" data-id={id} >{liked_text}</a></div>
    </li>
    <?php $this->endClip()?>

    <?php
       $templateId=isset($meal)?$meal->template_id:0;
       foreach($templates as $key=>$template)
       {
           $this->renderClip('Template',array(
               '{preview_image}' => '/da/images/preview/'.$template->preview_image
              ,'{tag_image}'     => '/da/images/preview/tag/'.$template->tag_image
              ,'{id}'            => $template->id
              ,'{curr}'          => ($template->id==$templateId)?'curr':''
              ,'{i}'             => ($template->id==$templateId)?'<i></i>':''
              ,'{item_count}'    => $template->item_count
              ,'{width}'         => $template->width
			  ,'{height}'        => $template->height
			  ,'{img_width}'     => $template->width*0.62
			  ,'{img_height}'    => $template->height*0.62
              ,'{gravity}'       => ($template->width>190)?((($key+1)%4==0)?'e':'s'):'e'
			  ,'{liked}'         => ($template->liked)?'liked':'like'
			  ,'{liked_text}'    => ($template->liked)?'我喜欢':'喜欢'
              ,'{user_count}'    => $template->user_count
			  ,'{like_count}'    => $template->like_count
              ,'{permission}'    => ($template->permission)?'allow':'deny'
			  ,'{vip}'           => ($template->grade>0)?'<div class="vip"><a href="#"></a></div>':''
           ));
       }
    ?>
    </ul>
  </div>
</div>

<div class="xztc">
  <div class="w750">
    <div class="grid-zxtc layout">
      <div class="col-main">
        <div class="main-wrap tj_c w708 h70">
          <div class="tjm">
            <span class="J_submit_button"><a class="list1" href="#none" ></a></span>
            <span class="pl500 J_preview_link"><a class='J_preview_link list1' target="_blank" href="<?php echo isset($meal)?("/da/meal/preview/template/".$meal->template_id."/meal/".$meal->meal_id):"#none";?>"></a></span>
          </div>
        </div>
      </div>
      <div class="col-sub tj_l w21 h70"></div>
      <div class="col-extra tj_r w21 h70"></div>
    </div>
  </div>
</div>

<?php
$option['width']='640';
$option['html']=$colorbox;
$option['onComplete']="js:function(){
    $('#search').click(function(){
        val=$('#term').val();
        getMeal(val);
});
$('#clear').click(function(){
    $('#term').val('')
        getMeal();
});
$('body').delegate('.J_select_meal','click',function(){
    var id=$(this).parents('tr').attr('id')
        , itemCount=$(this).parents('tr').attr('data-item-count') ;
    
    $('#J_meal_id').val(id);
    $('#J_meal_item_count').val(itemCount);
    $('.J_meal_section').hide();
    $('#J_meal_'+id).show();
    $('#J_meal_list').show();
    $.colorbox.close();
    $('.J_template_list').each(function(index,e){
      Template.frozen(e);
    });
    Template.preview();
});
getMeal();
}";
$option=CJavaScript::encode($option);
?>
<input type="hidden" name="meal[template_id]" id="J_template_id" value="<?php if(isset($meal)){echo $meal->template_id ;} ?>">
<input type="hidden" name="meal[meal_id]"     id="J_meal_id"     value="<?php if(isset($meal)){echo $meal->meal_id ;} ?>">
<input type="hidden" name="meal[html]"        id="J_meal_html"   value="<?php if(isset($meal)){echo $meal->html ;} ?>">
<input type="hidden" name="meal[item_count]"  id="J_meal_item_count" value="<?php if(isset($meal_item_count)){echo $meal_item_count;} ?>">
</form>

<script type="text/javascript" src="/da/js/template.js" charset="utf-8"> </script>
<script type="text/javascript" src="/da/js/jquery.zclip.js"></script>
<script type="text/javascript" src="/da/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="/da/js/jquery.preload.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
    $.preload(<?php foreach($templates as $k=>$t ){echo '"'.'/da/images/preview/'.$t->preview_image.'"'.(($k+1)<count($templates)?',':'');};?>);
    $('.J_template_list').tipsy({title:'data-preview-image',html:true,gravity:function(){
      var gravity = $(this).attr('data-gravity');
      switch (gravity) {
        case 'autoWE':
        return $.fn.tipsy.autoWE.call(this);
        break;
        case 'autoS':
            return $.fn.tipsy.autoS.call(this);
        break;
        default:
        return gravity;
      }
    },opacity:1,fade: true});
    Template.init();
    
    $('#addMeal').colorbox(<?php echo $option ?>);
    mealId=$('#J_meal_id').val();
    if(mealId)
    {
      $('#J_meal_'+mealId).show();
      $('#J_meal_list').show();
    }
});
</script>
<style type="text/css" media="screen">

</style>
