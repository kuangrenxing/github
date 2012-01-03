<?php 
$cs=Yii::app()->clientScript;
$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/style_v2.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.tipsy.js');
?>
<script type="text/javascript" charset="utf-8">
$(function(){
  $('.J_task_log').tipsy({title:'data-log',html:true,gravity:'s',fade: true,opacity:1,offset:8}); 
  })
</script>
<div class="daily">
  <div class="daily_title daily_bot8">
		<img src="/da/v2/images/see_detail.gif"><a href="/da/task/index" class="ml"><img src="/da/v2/images/back_daily.gif"></a>
  </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tac">
    <tbody><tr class="height34">
        <td class="pl10tl">宝贝名称</td>
        <td width="120">时间</td>
        <td colspan="2" align="center">状态</td>
      </tr>
    <?php foreach($itemList as $item){?>
      <tr class="height38">
        <td><font class="tit"><a href="http://item.taobao.com/item.htm?id=<?php echo $item->item_id;?>" target="_blank"><?php echo $item->item_name;?></a></font></td>
        <td><font class="time"><?php echo date('Y-m-d H:m:s',$task->updated);?></font></td>
        <td width="60" align="right"><font <?php echo ($item->status===Task::STATUS_FINISHED)?'class="success">[成功]':'class="failed">[失败]';?></font></td>
        <td width="30" align="center"><a href="#none" class="J_task_log" data-log="
        <?php
            foreach($item->logList as $log)
            {
              echo date('Y-m-d h:m:s',$log->logtime).'--'.$log->message.'<br />';
            }
        ?>
        "><?php if($item->status===Task::STATUS_FAILED){?><img src="/da/v2/images/defult.gif" width="14" height="15"><?php }?></a></td>
      </tr>
    <?php }?>
      <tr>
        <td colspan="4">
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
          </div>
        </td>
      </tr>
  </tbody></table>
</div>
