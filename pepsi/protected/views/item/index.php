
<tr class="height34">
  <td class="ico_choose"><input name="checkAll" class="J_checkbox_all" type="checkbox" value=""></td>
  <td>全选</td>
  <td class="width546">&nbsp;</td>
  <td class="count">库存</td>
  <td class="weizhi">放置</td>
</tr>

<?php foreach($itemList->items->item as $item):?>
<tr class="height60">
  <td class="ico_choose">
    <input id="checkbox_item_<?php echo $item->num_iid;?>" name="selected_num_iid" data-title= "<?php echo $item->title;?>" data-pic="<?php echo (isset($item->pic_url)?(preg_replace("/\\\/",'',$item->pic_url)):('/da/images/empty')).'_40x40.jpg';?>" type="checkbox" value="<?php echo $item->num_iid;?>">
  </td>
  <td align="center"><a href="http://item.taobao.com/auction/item_detail.htm?item_num_id=<?php echo $item->num_iid;?>" target="_blank"><img src="<?php echo (isset($item->pic_url)?(preg_replace("/\\\/",'',$item->pic_url)):('/da/images/empty')).'_40x40.jpg';?>"></a></td>
  <td class="width546"><a href="http://item.taobao.com/auction/item_detail.htm?item_num_id=<?php echo $item->num_iid;?>" target="_blank"><?php echo $item->title;?></a></td>
  <td class="count">还剩<?php echo $item->num; ?>件</td>
  <td class="weizhi">
    <input type="radio"  class="J_select_position" data-id="<?php echo $item->num_iid;?>" name="position<?php echo $item->num_iid;?>"  value="0" checked="checked">前置<br>
    <input type="radio"  class="J_select_position" data-id="<?php echo $item->num_iid;?>" name="position<?php echo $item->num_iid;?>"  value="1">后置
  </td>
</tr>
<?php endforeach;?>

<tr class="height60e7">
  <td class="ico_choose"><input name="checkAll" class="J_checkbox_all" type="checkbox" value=""></td>
  <td>全选</td>
  <td colspan="2" align="right"></td>
  <td class="weizhi">
    <input type="radio" class="J_select_all_position" name="position_all"  checked value="0">全部前置<br>
    <input type="radio" class="J_select_all_position" name="position_all"  value="1">全部后置
  </td>
</tr>


<tr>
  <td colspan="5">
    <div class="conts">
    <?php $this->widget('CLinkPager', array( 
        'header' => '',
        'firstPageLabel' => '',
        'lastPageLabel' => '',
        'nextPageLabel' => '<img src="/da/v2/images/pageturn_right.gif"  >',
        'prevPageLabel' => '<img src="/da/v2/images/pageturn_left.gif"  >',
        'pages' => $pages,
        'currentPage' => $pageIndex,
        'htmlOptions' => array(
            'class'=>'pageUl clearfix pagerList J_goto_page',
            'id'=>'pagerList'
        )
    )) ?> 
    </div>
  </td>
</tr>

<script type="text/javascript" charset="utf-8">
  var itemList=<?php echo CJSON::encode($itemList);?>;   
</script>
