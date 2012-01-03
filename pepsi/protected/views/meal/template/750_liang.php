<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>
<div style="border:#ccc 1px solid; width:748px; margin-bottom:10px; font-size:12px">
  <table width="100%" border="0" style="line-height:20px; text-align:center; font-size:12px">
    <tbody>
    <tr>
      <td width="170px">
        <ul style=" padding:0;  margin:10px 0 10px 10px; list-style:none;  text-align:left;">
          <li style="padding-bottom:10px;">
          <img src="<?php echo $siteUrl;?>da/images/liang/photo750_01.gif" width="56" height="21" style="vertical-align:top;">
          <strong style="font-size:18px;color:#FF7A00;">立减<?php echo $mealList->origi_price-$mealList->meal_price;?>元</strong>
          </li> 
          <li style="padding-bottom:10px;">
          <strong>套餐价：</strong>
          <span style="color:#FE6521;font-size:14px;font-weight:bold;"><?php echo $mealList->meal_price;?> </span>元
          </li>
          <li style="color:#999;padding-bottom:10px;">原价：
          <strong style="font-weight:normal;color:#999;text-decoration:line-through;padding:0 5px;"><?php echo $mealList->origi_price;?> </strong>元
          </li> 
          <li style="padding-bottom:8px;">
          <a href="<?php echo $mealList->detail_url;?>"><img src="<?php echo $siteUrl;?>da/images/liang/photo750_02.gif" width="150" height="38" border="0"></a>
          </li> 
          <li>
          <img src="<?php echo $siteUrl;?>da/images/liang/photo750_03.gif" style="padding-right:2px">
          <img src="<?php echo $siteUrl;?>da/images/liang/photo750_04.gif" style="padding-right:2px">
          <img src="<?php echo $siteUrl;?>da/images/liang/photo750_05.gif">
          </li> 
        </ul> 
      </td>
      <td>

        <?php $this->beginClip('item');?>
        <span style="display:inline-block; vertical-align:top; text-align:center; width:84px;">
          <span style="display: table-cell;vertical-align:middle;*display:block;*font:70.175438596491px/1 Arial;overflow:hidden; border:#CCC 1px solid; width:82px; height:82px;">
            <img src="{pic_url}" style="vertical-align:middle"></span>
          <span style="display:block;padding-top:8px; max-height:38px;overflow:hidden;"><a href="{detail_url}" style="text-decoration:none; color:#5c66cc; text-overflow: ellipsis; word-break: break-all;">{title}</a></span>
          <span style="color:#999">{price}</span></span>
        <?php $this->endClip();?>
        <?php
        for($i=0;$i<5;$i++)
        {
        $this->renderClip('item',array(
        '{pic_url}'     =>isset($items[$i]) ? $items[$i]->pic_url:$siteUrl.'da/images/empty_80.jpg',
        '{title}'       =>isset($items[$i]) ? "原价：".$items[$i]->title."元":'',
        '{price}'       =>isset($items[$i]) ? $items[$i]->price  :'',
        '{detail_url}'  =>isset($items[$i]) ? $items[$i]->detail_url:'',
        ));
        if($i < 4)
        {
        echo '<span style="display:inline-block; vertical-align:top; text-align:center; *display:inline;*zoom:1; padding-top:40px"><img src="'.$siteUrl.'da/images/icon_plus_s.gif"></span>';    
        }
        }?>

        <span style="height: 0;padding: 0;overflow: hidden;display:inline-block;width:84px">&nbsp;</span><span style="height: 0;padding: 0;overflow: hidden;display:inline-block;width:84px">&nbsp;</span><span style="height: 0;padding: 0;overflow: hidden;display:inline-block;width:84px">&nbsp;</span><span style="height: 0;padding: 0;overflow: hidden;display:inline-block;width:84px">&nbsp;</span><span style="height: 0;padding: 0;overflow: hidden;display:inline-block;width:84px">&nbsp;</span>

      </td>
    </tr>
    </tbody>
  </table>
</div>
<br />
