<?php
$cs=Yii::app()->clientScript;
$cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/style_v2.css');
?>
<script type="text/javascript" src="/da/js/publish.js" charset="utf-8"></script>
<div class="daily">
  <div class="daily_title mb10">
    <img src="/da/v2/images/see_daily.gif" />
	<a href="#" class="ml"><!--<img src="/da/v2/images/reset_all.gif" />--></a>
  </div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tac">
    <tr class="height34">
      <td width="130" class="pl10tl">创建时间</td>
      <td align="left">搭配名称</td>
      <td width="70">发布宝贝数</td>
      
      <td width="60">状态</td>
      <td width="40">成功</td>
      <td width="40">失败</td>  
      <td width="130">更新时间</td>    
      <td width="50">操作</td>
    </tr>
    <?php foreach($taskList as $task){?>
    <?php $taskFinishedCount = $task->getItemCount(TASK::STATUS_FINISHED); ?>
    <?php $taskFailedCount = $task->getItemCount(TASK::STATUS_FAILED); ?>
    <tr class="height38">
      <td><font class="time"><?php echo date('Y-m-d H:m:s',$task->created);?></font></td>
      <td align="left" valign="middle"><span class="ovh34"><?php echo $task->name;?></span></td>
      <td><?php echo $task->itemCount;?></td>
      <td><a href="#"><img src="/da/v2/images/status_<?php echo $task->status.'_'.$task->type?>.gif" width="50" height="19" /></a></td>
      <td><font class="success"><a href="/da/task/view/<?php echo $task->id.'?status='.Task::STATUS_FINISHED;?>"><?php echo $taskFinishedCount;?></a></font>个</td>
      <td><font class="default"><a href="/da/task/view/<?php echo $task->id.'?status='.Task::STATUS_FAILED;?>"><?php echo $taskFailedCount;?></a></font>个</td>
      <td><font class="time"><?php echo date('Y-m-d H:m:s',$task->updated);?></font></td>
      <td><?php if($task->status == Task::STATUS_FINISHED && ($task->type == Task::TYPE_UPDATE|($task->type == Task::TYPE_ROLLBACK&&$taskFailedCount>0))){ echo '<font class="revoked"><a href="#none" class="J_rollback" data-id="'.$task->id.'">撤销</a></font>'; }?></td>
    </tr>
    <?php }?>
    <tr>
      <td colspan="8">
        <div class="conts">
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
          </div>
        </td>
      </tr>
    </table>
</div>

<script type="text/javascript" charset="utf-8">
setTimeout(function(){
    $.get(window.location.href,{'ajax':true},function(data){
        $('.main-wrap').html(data);
    });
},5000); 
</script>
