<?php
$cs=Yii::app()->clientScript;
$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/style_v2.css');
$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/dynatree/skin-vista/ui.dynatree.css');
?>
<script type="text/javascript" src="/da/js/json2.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/da/js/jquery.tools.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/da/js/dynatree/jquery-ui.custom.min.js" charset="utf-8"> </script>
<script type="text/javascript" src="/da/js/dynatree/jquery.cookie.js" charset="utf-8"> </script>
<script type="text/javascript" src="/da/js/dynatree/jquery.dynatree.min.js" charset="utf-8"> </script>
<script type="text/javascript" src="/da/js/underscore.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/da/js/publish.js" charset="utf-8"></script>
<script type="text/javascript" src="/da/js/autoCombobox.js" charset="utf-8"></script>
<?php if (isset($dapei_id) && $dapei_id > 0 ): ?>
<input type="hidden" name="dapeiId" class="J_dapei_id" value="<?php echo $dapei_id;?>" />
<?php else: ?>
<input type="hidden" name="mealId" class="J_meal_id" value="<?php echo $mealId;?>" />
<input type="hidden" name="templateId" class="J_template_id" value="<?php echo $templateId;?>" />
<?php endif; ?>
<div class="mb10"><img src="/da/v2/images/btn_publish.gif"></div>
<div class="publish_tit ks-clear"> 
  <ul class="tabs">
    <li class="shangpin"><a href="#">&nbsp;</a></li>
    <li class="leimu"><a href="#">&nbsp;</a></li>
  </ul>
</div>
<div class="panes">
  <div class="publish_main">
    <div class="choose">
      <input name="q" type="text" class="choose_search J_q"> 
      <font>类目</font>
        <?php 
            echo CHtml::dropDownList('cid', '', $list, array('encode' => false, 'prompt' => '全部分类','class'=>'w105h20 J_seller_cids'));
        ?>
      <font>排序</font>
      <select name="order_by" class="w105h20 J_order_by">
        <option value="list_time:asc">上架时间升序</option>
        <option value="list_time:desc">上架时间降序</option>
      </select>
      <a class="J_item_search" href="#"><img src="/da/v2/images/btn_search.gif"></a> 
      <!-- <input name="allItems" type="checkbox" value=""><font class="pl5pr10">全部商品</font> -->

    </div>
    <div class="del_baobei ks-clear">
      <div class="del_baobei_left">已添加了<strong class="itemSelectedCount">0</strong>件宝贝</div>
      <div class="del_baobei_right itemCart">
        <ul>
        </ul>
      </div>
    </div>

    <table class="itemList" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr><td colspan="6" align="center"><img src="/da/v2/images/loading.gif"></td></tr>
      </tbody>
    </table>
    <div class="go_pubish"><a href="#none" class="J_submit_item"><img src="/da/v2/images/go_publish.gif"></a></div>
  </div>

<div class="publish_main" >
  <div class="choose_leimu ks-clear">
    <div class="choose_leimu_tit">选择类目</div>
    <div class="choose_leimu_left tree">
    </div>
    <div class="choose_leimu_right">
      <ul>
      		<li>放置于宝贝描述的：
              <input class="J_category_position" name="categoryPosition" type="radio" checked="checked" value="0"><font class="pl5pr10">前置</font>
              <input class="J_category_position" name="categoryPosition" type="radio" value="1"><font class="pl5pr10">后置</font></li>
            <li><span>已经选择了<strong id="J_category_count">0</strong>个类目,<strong id="J_item_count">0</strong>件宝贝</span></li>
            <li class="last"><a href="#none" class="J_submit_category"><img src="/da/v2/images/go_publish.gif"></a></li>
       </ul>
    </div>
  </div>
</div>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
    $("ul.tabs").tabs("div.panes > div");
    $('.tree').dynatree({
      checkbox:true,
      selectMode:3,
      onSelect:function(flag,node){
        Publish.updateCategory.call(Publish,flag,node);
      },
      children:<?php echo CJSON::encode($categoryTree);?>
    });
    });
</script>


