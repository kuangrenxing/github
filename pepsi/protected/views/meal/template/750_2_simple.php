<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="750" height="330" align="center" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/simple/bg.gif" style="font-size:12px; background-repeat:no-repeat;">
  <tbody>
    <tr height="12"></tr>
    <tr>
      <td width="20">&nbsp;</td>
      <td width="220">
        <table width="100%" height="310" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
          <td height="220" align="center" valign="center"><a href="<?php echo $items[0]->detail_url;?>" target="_blank" ><img src="<?php echo $items[0]->orig_img.'_b.jpg';?>" border="0"></a></td>
            </tr>
            <tr>
            <td height="50" align="center" style="padding:0 8px;"><a href="<?php echo $items[0]->detail_url;?>"  style=" text-decoration:none; color:#864546" target="_blank" ><?php echo $items[0]->title;?></a></td>
            </tr>
            <tr>
              <td height="36" valign="middle" style="padding:0 8px;"><span style="float:left; color:#ff0000; font-size:14px; "><strong>￥<?php echo XHtml::formatPrice($items[0]->price);?></strong></span><span style="float:right; margin-bottom:4px; display:block;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/simple/btn_buyone.gif" border="0"></a></span></td>
            </tr>
        </tbody></table>
      </td>
      <td width="42">&nbsp;</td>
      <td width="220">
        <table width="100%" height="310" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
          <td height="220" align="center" valign="middle"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_b.jpg';?>" border="0"></a></td>
            </tr>
            <tr>
              <td height="50" align="center" style="padding:0 8px;"><a href="<?php echo $items[1]->detail_url;?>" style=" text-decoration:none; color:#864546" target="_blank"><?php echo $items[1]->title;?></a></td>
            </tr>
            <tr>
              <td height="36" valign="middle" style="padding:0 8px;"><span style="float:left; color:#ff0000; font-size:14px;"><strong>￥<?php echo XHtml::formatPrice($items[1]->price);?></strong></span><span style="float:right; margin-bottom:4px; display:block; "><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/simple/btn_buyone.gif" border="0"></a></span></td>
            </tr>
        </tbody></table>
      </td>
      <td width="43">&nbsp;</td>
      <td width="185" valign="bottom">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td height="27" valign="middle" style="padding-left:15px;">原价：￥<?php echo XHtml::formatPrice($mealList->origi_price)?>元</td>
            </tr>
            <tr>
              <td height="27" valign="middle" style="padding-left:15px;">搭配：￥<?php echo XHtml::formatPrice($mealList->meal_price);?>元</td>
            </tr>
            <tr>
              <td height="27" valign="middle" style="padding-left:15px; line-height:25px;">立省：￥<font style="color:#F00; font-size:16px; padding-right:2px;"><strong><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></strong></font>元</td>
            </tr>
            <tr>
              <td headers="60"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/simple/btn_buy.gif" border="0"></a></td>
            </tr>
            <tr>
              <td height="50" align="right" style="padding-right:5px;"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/simple/ico_xiangqing.gif" border="0"></a></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</tbody></table>
<br />
