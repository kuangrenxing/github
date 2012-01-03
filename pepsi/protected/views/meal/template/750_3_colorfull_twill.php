<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="750" align="center" height="280" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl;?>da/images/colorfull/bj_04.gif" style="background-repeat:no-repeat; font-size:12px">
  <tbody>
    <tr height="10">
    </tr>
    <tr>
      <td width="13">&nbsp;</td>
      <td colspan="2" height="208" valign="top">
        <table width="189" border="0" cellspacing="0" cellpadding="0" background="<?php echo $items[0]->orig_img.'_160x160.jpg';?>" style="background-position:center center; background-repeat:no-repeat;">
          <tbody><tr>
              <td width="189" height="208" background="<?php echo $siteUrl;?>da/images/colorfull/photo_step_one.gif" style="background-repeat:no-repeat; background-position:left top">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
      <td colspan="2" valign="top" width="189" height="208">
        <table width="189" border="0" cellspacing="0" cellpadding="0" background="<?php echo $items[1]->orig_img.'_160x160.jpg';?>" style="background-position:center center; background-repeat:no-repeat;">
          <tbody><tr>
              <td width="187" height="208" background="<?php echo $siteUrl;?>da/images/colorfull/photo_step_two.gif" style="background-repeat:no-repeat; background-position:left top">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
      <td colspan="2" valign="top" width="189" height="208">
        <table width="189" border="0" cellspacing="0" cellpadding="0" background="<?php echo isset($items[2])?$items[2]->orig_img.'_160x160.jpg':$siteUrl.'da/images/empty_160.jpg';?>" style="background-position:center center; background-repeat:no-repeat;">
          <tbody><tr>
              <td width="187" height="208" background="<?php echo $siteUrl;?>da/images/colorfull/photo_step_three.gif" style="background-repeat:no-repeat; background-position:left top">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
      <td>&nbsp;</td>
      <td width="170" valign="top" rowspan="3">
        <table width="100%" height="242" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr><td height="45">&nbsp;</td></tr>
            <tr>
              <td height="28" align="center"><strong style="color:#fff; font-size:16px;">￥<?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></strong></td>
            </tr>
            <tr>
              <td height="51">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" height="20"><strong style="color:#c33c26; font-size:20px;padding:0;">￥<?php echo XHtml::formatPrice($mealList->meal_price);?></strong></td>
            </tr>
            <tr>
              <td align="center" height="22"><strong style="color:#9b9b9b; font-size:14px; ">(原价:￥<?php echo XHtml::formatPrice($mealList->origi_price);?>)</strong></td>
            </tr>
            <tr>
              <td align="center" valign="top"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/colorfull/buy.gif" border="0"></a></td>
            </tr>
            <tr>
              <td align="center"><img src="<?php echo $siteUrl;?>da/images/colorfull/9_cuxiao.gif"></td>
            </tr>
        </tbody></table>    
      </td>
    </tr>
    <tr>
      <td width="13" height="18">&nbsp;</td>
      <td width="94" height="18" align="center" valign="top"><img src="<?php echo $siteUrl;?>da/images/colorfull/ico_rmb.gif"></td>
      <td width="95" height="18" align="center" valign="top"><strong style="color:#c33c26">￥<?php echo XHtml::formatPrice($items[0]->price);?></strong></td>
      <td width="94" height="18" align="center" valign="top"><img src="<?php echo $siteUrl;?>da/images/colorfull/ico_rmb.gif"></td>
      <td width="95" height="18" align="center" valign="top"><strong style="color:#c33c26">￥<?php echo XHtml::formatPrice($items[1]->price);?></strong></td>
      <td width="94" height="18" align="center" valign="top"><?php if(isset($items[2])){?><img src="<?php echo $siteUrl;?>da/images/colorfull/ico_rmb.gif"><?php } ?></td>
      <td width="95" height="18" align="center" valign="top"><strong style="color:#c33c26"><?php echo isset($items[2])?'￥'.XHtml::formatPrice($items[2]->price):'';?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="13">&nbsp;</td>
      <td colspan="2" align="center" height="18">
        <span style="width:170px; height:18px; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; margin:0 auto;  "><a href="<?php echo $items[0]->detail_url;?>" style="color:#000; text-decoration:none; overflow:hidden;" target="_blank"><?php echo $items[0]->title;?></a></span>
      </td>
      <td colspan="2" align="center" height="18">
        <span style="width:170px; height:18px; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; margin:0 auto;  "><a href="<?php echo $items[1]->detail_url;?>" style="color:#000; text-decoration:none; overflow:hidden;" target="_blank"><?php echo $items[1]->title;?></a></span>
      </td>
      <td colspan="2" align="center" height="18">
        <span style="width:170px; height:18px; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; margin:0 auto;  "><a href="<?php echo isset($items[2])?$items[2]->detail_url:'#none';?>" style="color:#000; text-decoration:none; overflow:hidden;" target="_blank"><?php echo isset($items[2])?$items[2]->title:'';?></a></span>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr height="23">
    </tr>
</tbody></table>
