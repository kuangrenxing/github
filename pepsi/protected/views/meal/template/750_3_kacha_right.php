<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="750" height="200" border="0" cellspacing="0" cellpadding="0" bgcolor="#e9e9e9" style="font-size:12px; text-align:center" align="center">
 <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td width="220" height="200" rowspan="3" background="<?php echo $siteUrl;?>da/images/750_3_kacha/bj_01.gif">
      <table width="90%" height="200" align="center" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td height="30">&nbsp;</td>
        </tr>
        <tr>
            <td align="center"><span style="font-size:18px; color:#0ea8e8"><strong><span style="color:#000; padding:0 3px">套餐价</span><?php echo XHtml::formatPrice($mealList->meal_price)?>元</strong></span></td>
        </tr>
        <tr>
            <td align="center"><span style="font-size:18px; color:#0ea8e8"><strong><span style="color:#000; padding:0 3px">立省</span><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?>元</strong></span></td>
        </tr>
        <tr>
            <td align="center"><span style="color:#bcbcbc; font-size:14px">（原价￥<?php echo XHtml::formatPrice($mealList->origi_price);?>）</span></td>
        </tr>
        <tr>
            <td align="center"><a href="<?php echo $mealList->detail_url;?>" target="_blank" style="text-decoration:none"><img src="<?php echo $siteUrl;?>da/images/750_3_kacha/btn_buy.gif" width="155" height="47" border="0"/></a></td>
        </tr>
        <tr>
          <td height="40" align="right"  >&nbsp;</td>
        </tr>
      </table>
    </td> 
  </tr>
  <tr>
    <td width="18">&nbsp;</td>
    <td width="150" height="164" valign="bottom" bgcolor="#FFFFFF">
        <table width="122" align="center" height="122" border="0" cellspacing="0" cellpadding="0" background="<?php echo $items[0]->middle_url;?>" style="background-position:center center; background-repeat:no-repeat"  >
        <tr>
          <td align="right" valign="top" width="120" height="120" style="background-position:center center; background-repeat:no-repeat;" background="<?php echo $siteUrl;?>da/images/750_3_kacha/bg_border120.gif">
            <a href="<?php echo $items[0]->detail_url; ?>" target="_blank" style="text-decoration:none; color:#000; display:block; width:122px; height:1px; padding-top:80px; ">
              <span style="background-color:#F3F3F3; display:block ; width:55px; padding:2px 0 2px 0; text-align:center;  margin-right:1px;">￥<?php echo XHtml::formatPrice($items[0]->price);?></span>
              </a>
          </td>
        </tr>
      </table>
      <span style="width:130px; height:20px; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; margin:0 auto; padding-top:6px "><a href="<?php echo $items[0]->detail_url;?>" target="_blank" style="text-decoration:none;color:#999999;" ><?php echo $items[0]->title;?></a></span>
    </td>
    <td align="center">
      <img src="<?php echo $siteUrl;?>da/images/750_3_kacha/ico_plus.gif" width="14" height="13" />
    </td>
    <td width="150" height="164" valign="bottom" bgcolor="#FFFFFF">
      <table width="122" align="center" height="122" border="0" cellspacing="0" cellpadding="0" background="<?php echo $items[1]->middle_url;?>" style="background-position:center center; background-repeat:no-repeat" >
        <tr>
          <td align="right" valign="top" width="120" height="120" style="background-position:center center; background-repeat:no-repeat;" background="<?php echo $siteUrl;?>da/images/750_3_kacha/bg_border120.gif">
            <a href="<?php echo  $items[1]->detail_url;?>" target="_blank" style="text-decoration:none; color:#000; display:block; width:122px; height:1px; padding-top:80px; ">
                	<span style="background-color:#F3F3F3; display:block ; width:55px; padding:2px 0 2px 0; text-align:center;  margin-right:1px;">￥<?php echo XHtml::formatPrice($items[1]->price);?></span>
                    </a>
          </td>
        </tr>
      </table>
      <span style="width:130px; height:20px; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; margin:0 auto; padding-top:6px "><a href="<?php echo $items[1]->detail_url;?>" style="text-decoration:none;color:#999999;" target="_blank" ><?php echo $items[1]->title;?></a></span>
    </td>
    <td align="center">
      <img src="<?php echo $siteUrl;?>da/images/750_3_kacha/ico_plus.gif" width="14" height="13" />
    </td>
    <td width="150" height="164" valign="bottom" bgcolor="#FFFFFF">
   	    	<table width="122" align="center" height="122" border="0" cellspacing="0" cellpadding="0" background="<?php echo isset($items[2])?$items[2]->middle_url:$siteUrl.'da/images/750_3_kacha/photo_none.gif';?>" style="background-position:center center; background-repeat:no-repeat" >
        <tr>
            <td align="right" valign="top" width="120" height="120" style="background-position:center center; background-repeat:no-repeat;" background="<?php echo $siteUrl;?>da/images/750_3_kacha/bg_border120.gif">
            <?php if(isset($items[2])){?>
            <a href="<?php echo $items[2]->detail_url;?>" target="_blank" style="text-decoration:none; color:#000; display:block; width:122px; height:1px; padding-top:80px; ">
                	<span style="background-color:#F3F3F3; display:block ; width:55px; padding:2px 0 2px 0; text-align:center;  margin-right:1px;">￥<?php echo XHtml::formatPrice($items[2]->price);?></span></a>
            <?php }?>
          </td>
        </tr>
      </table>
      <span style="width:130px; height:20px; display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; margin:0 auto; padding-top:6px "><a href="<?php echo isset($items[2])?$items[2]->detail_url:'';?>" style="text-decoration:none;color:#999999;" target="_blank"><?php echo isset($items[2])?$items[2]->title:'&nbsp;';?></a></span>
    </td>
    <td width="18" align="center">&nbsp;</td>
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
</table>

<br />
