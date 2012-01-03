
 <div class="mb10 create-tc ks-clear"><img src="/da/v2/images/create_taocan.gif"><a href="/da"><span><img src="/da/v2/images/back.gif"></span></a></div>
  

  <div class="create_tc_border">


    	<div class="create_tc">
            <!--
        	<div class="create_tc_spc ks-clear">
       	    	<ul>
                  <li class="Month"><img src="/da/v2/images/month01.gif"></li>
                  
				    <?php $this->beginClip('PTemplate')?>
				    <li class="J_tpl_list list {curr}" data-gravity="{gravity}" data-preview-image='
				                  <div class="colorbox width{width} height{height}">
				                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				                      <tbody><tr>
				                        <td><img src="{preview_image}" width="{img_width}" height="{img_height}"></td>
				                        <td valign="top" width="120">
				                       </td>
				                      </tr>
				                    </tbody></table>
				                    <div class="triangle_bottom pngfix"></div>
				                  </div>
				' >
				      <a href="javascript:void(0);" class=" pngfix ">
				        <img src={tag_image} class="vam" data-id={id} data-permission="{permission}" data-item-count="{item_count}">{i}
				      </a>
                      <div class="ued-like">
				      <a href="#" class="use">{user_count}</a>
				      <a href="#" class="like">{like_count}</a>
				      </div>
				    </li>
				    <?php $this->endClip()?>
					<?php
				       $templateId=isset($meal)?$meal->template_id:0;
				       foreach($promtpls as $key=>$template)
				       {
				           $this->renderClip('PTemplate',array(
				               '{preview_image}' => '/da/tpls/'.$template->group_slug.'/preview.jpg'
				              ,'{tag_image}'     => '/da/tpls/'.$template->group_slug.'/tag.jpg'
				              ,'{id}'            => $template->id
				              ,'{curr}'          => ($template->id==$templateId)?'curr':''
				              ,'{item_test}'     => ($template->id==$templateId)?'<i></i>':''
				              ,'{item_count}'    => $template->item_count
				              ,'{width}'         => $template->width
							  ,'{height}'        => $template->height
							  ,'{img_width}'     => $template->width*0.62
							  ,'{img_height}'    => $template->height*0.62
				              ,'{gravity}'       => ($template->width>190)?((($key+1)%5==0)?'e':'s'):'e'
				              ,'{user_count}'    => $template->user_count
							  ,'{like_count}'    => $template->like_count
                              /*
				              ,'{permission}'    => ($template->permission)?'allow':'deny'
							  ,'{liked}'         => ($template->liked)?'liked':'like'
							  ,'{liked_text}'    => ($template->liked)?'我喜欢':'喜欢'
							  ,'{vip}'           => ($template->grade>0)?'<div class="vip"><a href="#"></a></div>':''
							  */
				           ));
				       }
				    ?>


                </ul>
            </div>
            <div class="create_tc_line"></div>
            -->
            <div class="create_tc_ord ks-clear mb10">
       	    	<ul>
                <?php $this->beginClip('Template')?>
				    <li  class="J_tpl_list list {curr}" data-gravity="{gravity}" data-preview-image='
				                  <div class="colorbox width{width} height{height}">
				                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
				                      <tbody><tr>
				                        <td><img src="{preview_image}" width="{img_width}" height="{img_height}"></td>
				                        <td valign="top" width="120">
				                         <div class="colorbox_right">
				                           <a href="javascript:void(0);" class="like J_like">{like_count}人喜欢</a>
				                           <a href="javascript:void(0);" class="used">{user_count}人使用</a>
				                         </div>
				                         {vip}
				                       </td>
				                      </tr>
				                    </tbody></table>
				                    <div class="triangle_bottom pngfix"></div>
				                  </div>
				' >
				      <a href="javascript:void(0);" class=" pngfix ">
				        <img src={tag_image} class="vam" data-id={id} data-permission="{permission}" data-item-count="{item_count}">{i}
				      </a>
                      <div class="ued-like">
				                        <a href="#" class="use">{user_count}</a>
				                        <a href="#" class="like J_like">{like_count}</a>
				                    </div>

				    </li>
				    <?php $this->endClip()?>
					<?php
				       $templateId=isset($meal)?$meal->template_id:0;
				       foreach($templates as $key=>$template)
				       {
				           $this->renderClip('Template',array(
				               '{preview_image}' => '/da/tpls/'.$template->group_slug.'/preview.jpg'
				              ,'{tag_image}'     => '/da/tpls/'.$template->group_slug.'/tag.jpg'
				              ,'{id}'            => $template->id
				              ,'{curr}'          => ($template->id==$templateId)?'curr':''
				              ,'{i}'             => ($template->id==$templateId)?'<i></i>':''
				              ,'{item_count}'    => $template->item_count
				              ,'{width}'         => $template->width
							  ,'{height}'        => $template->height
							  ,'{img_width}'     => $template->width*0.62
							  ,'{img_height}'    => $template->height*0.62
				              ,'{gravity}'       => ($template->width>190)?((($key+1)%5==0)?'e':'s'):'e'
				              ,'{user_count}'    => $template->user_count
							  ,'{like_count}'    => $template->like_count
                              /*
				              ,'{permission}'    => ($template->permission)?'allow':'deny'
							  ,'{liked}'         => ($template->liked)?'liked':'like'
							  ,'{liked_text}'    => ($template->liked)?'我喜欢':'喜欢'
							  ,'{vip}'           => ($template->grade>0)?'<div class="vip"><a href="#"></a></div>':''
							  */
				           ));
				       }
				    ?>
              </ul>
            </div>
		<!--
		<div class="add_taocan"><a href="#"><img src="/da/v2/images/add_taocan.gif"></a></div>
		-->
        <form id="xform" action="/da/dapei/create" method="POST" accept-charset="utf-8" name="kdkd">

<input type="hidden" name="Dapei[template_id]" id="J_template_id" value="">
<input type="hidden" id="J_template_item_cnt" value="">
<input type="hidden" name="Dapei[html]"  class="J_tpl_html" value="">

          <div class="J_form_list">
          <div class="create_tc_m">
              <div class="create_tc_tit mb10 ks-clear">
                <div class="create_tc_tit_left"><label>套餐标题<strong>*</strong></label>
                <input type="text" value="" class="tc_tit" name="Dapei[title]"><span>限30个汉字以内</span>
                <a href="#" id="addMeal"><img src="/da/v2/images/choose-tc.gif"></a></div>
                <!-- <a href="#" title="删除此套餐，慎点" class="care"></a> -->
             </div>
               <!-- <i><img src="/da/v2/images/ico_first.gif"></i> -->
               <div class="mb10 J_preview">
       	       <img src="/da/v2/images/view-pic.gif"></div>
            
               <div class="miaoshu mb10 ks-clear"></div>
             <div class="miaoshu mb10 ks-clear"></div>
             <!--  <div class="shouqi"><a href="#">收起</a></div> -->
             <input type="hidden" name="Dapei[meals][][meal_info]" class="J_meal" value="">
          </div>
          </div>
  

           <div class="baocun"><a href="#" class="J_submit_button"><img src="/da/v2/images/baocun.gif"></a></div>

</form>

      </div>
    </div>
<?php
$option['width']='640';
$option['height']='100%';
$option['scrolling']=false;
$option['html']=$colorbox;
$option['onCleanup']="js:function(){
    trace($('.J_cbloading:visible'));    
    if($('.J_cbloading:visible'))    
    {
        trace('on closing.');
        return false;
    }
}";
$option['onComplete']="js:function(){
	var itemcnt=$('#J_template_item_cnt').val();
	if (itemcnt == 0) return;

    $('#search').click(function(){
        val=$('#term').val();
        trace(val);
        var tmp_list = getMeal(val, itemcnt);
        trace(tmp_list);
	    var jlist = $('#J_result');
		renderList(jlist,tmp_list);
});
$('#clear').click(function(){
    $('#term').val('')
    var tmp_list = getMeal('', itemcnt);
	var jlist = $('#J_result');
    renderList(jlist,tmp_list);
});

var tmp_list = getMeal('', itemcnt);
var jlist = $('#J_result');
if (tmp_list != undefined && tmp_list.length)
   renderList(jlist,tmp_list);
}";
$option=CJavaScript::encode($option);
?>


<script type="text/javascript" src="/da/js/template.js" charset="utf-8"> </script>
<script type="text/javascript" src="/da/js/jquery.zclip.js"></script>
<script type="text/javascript" src="/da/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="/da/js/jquery.preload.min.js"></script>
<script type="text/javascript" src="/da/js/json2.min.js"></script>
<script type="text/javascript" charset="utf-8">


$(document).ready(function(){
    /*
    */

    $("input[class='tc_tit']").keyup(function() {
            $("#title").html($(this).val());
			$(".J_tpl_html").val($(".J_preview").html());
			trace($(".J_tpl_html").val());
    });

    $('.J_tpl_list').tipsy({title:'data-preview-image',html:true,gravity:function(){
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

    fetch('/da/dapei/ajaxmeals',{},function(data){
        if(data.result){
			window.mealList=data.meallist;
			trace(window.mealList);
        }
    });

    
	mealId=$('#J_meal_id').val(); 
    
    if(mealId)
    {
      $('#J_meal_'+mealId).show();
      $('#J_meal_list').show();
    }
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

    // TODO: get 
    meal = getonemeal(id);
    if (meal != null)
    {
        $('.J_meal').val(JSON.stringify(meal));
        //trace($('.J_meal').val());
        $.post('/da/tpl/getmeal',{id:$('#J_template_id').val(), meal:JSON.stringify(meal)},function(data){
                    if(data != null && data.result){
                        $(".J_preview").html(data.html);
                        $(".J_tpl_html").val(data.html);
                        trace($(".J_tpl_html").val());
                    }
        }, 'json');
    }

});



 $("body").delegate("#addMeal", "click", function(z) {
		var itemcnt=$('#J_template_id').val();
		if (itemcnt>0) 
		    $('#addMeal').colorbox(<?php echo $option ?>);
	    else
			alert("请先选择模板");
});
</script>

