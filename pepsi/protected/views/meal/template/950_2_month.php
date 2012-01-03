<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table width="950" border="0" align="center" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl?>da/images/tpls/month/950_bg.jpg" style="font-size:12px; font-family:Trebuchet MS; margin-bottom:10px; background-repeat:no-repeat">
  <tr height="18">
  </tr>
  <tr>
    <td width="8" height="354">&nbsp;</td>
    <td colspan="2" width="348" valign="top" background="<?php echo $items[0]->orig_img.'_310x310.jpg';?>" style="background-repeat:no-repeat; background-position:center center"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/month/950_bor2.gif" border="0" /></a></td>
    <td colspan="2" width="348" valign="top" background="<?php echo $items[1]->orig_img.'_310x310.jpg';?>" style="background-repeat:no-repeat; background-position:center center"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/month/950_bor2.gif" border="0"/></a></td>
    <td width="246" rowspan="3" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center">
          <tr>
            <td height="205"><strong style="font-weight:bold; color:#FFF; font-size:22px;"><?php $price = $mealList->origi_price - $mealList->meal_price;  
              $price = $price < 0 ? 0 : $price; 
              echo XHtml::formatPrice($price,true);?></strong></td>
          </tr>
          <tr>
            <td height="45"><strong style="color:#c23c26; font-size:35px;">￥<?php echo $mealList->meal_price;?></strong></td>
          </tr>
          <tr>
            <td height="27"><strong style="color:#999; font-size:22px;"> （原价￥<?php echo $mealList->origi_price;?>）</strong></td>
          </tr>
          <tr>
            <td height="70"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/month/950-btn_buy.gif" border="0"/></a></td>
          </tr>
          <tr>
            <td height="60"><img src="<?php echo $siteUrl?>da/images/tpls/month/950cuxiao.gif"/></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><img src="<?php echo $siteUrl?>da/images/tpls/month/950rmb.jpg" style="padding-left:25px;"/></td>
    <td align="right"><strong style="padding-right:35px; color:#c23c26; font-size:18px;"><?php echo $items[0]->price;?></strong></td>
    <td><img src="<?php echo $siteUrl?>da/images/tpls/month/950rmb.jpg" style="padding-left:25px;"/></td>
    <td align="right"><strong style="padding-right:35px; color:#c23c26; font-size:18px;"><?php echo $items[1]->price;?></strong></td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td colspan="2" valign="top"><span style="width:310px; margin:0 auto; display:block;margin-top:3px;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank" style=" color:#333; text-decoration:none"><?php echo $items[0]->title;?></a></span></td>
    <td colspan="2" valign="top"><span style="width:310px; margin:0 auto; display:block;margin-top:3px;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank" style="color:#333; text-decoration:none"><?php echo $items[1]->title;?></a></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
