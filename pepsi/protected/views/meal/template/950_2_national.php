<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;
$price = $mealList->origi_price - $mealList->meal_price;
?>

<table width="950" border="0" cellspacing="0" cellpadding="0" style="border:#bc3335 1px solid; font-family:Trebuchet MS; font-size:12px; margin-bottom:5px;">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl;?>da/images/national/bg_top_950.gif"></td>
  </tr>
  <tr>
    <td>
    <table width="940" align="center" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="18">&nbsp;</td>
            <td width="222">&nbsp;</td>
            <td width="75">&nbsp;</td>
            <td width="222">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td width="222">
            	<table width="100%" height="290" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td height="220" colspan="2" align="center" valign="center" style="border:#CCC 1px solid;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_b.jpg';?>" border="0"></a></td>
                  </tr>
                  <tr>
                    <td height="50" colspan="2" style="padding:0 8px;"><a href="<?php echo $items[0]->detail_url;?>" style=" text-decoration:none; color:#333;" target="_blank"><?php echo $items[0]->title;?></a></td>
                  </tr>
                  <tr>
                    <td height="20" width="50%" valign="middle" style="padding:0 8px;"><strong style="color:#999">￥<?php echo $items[0]->price;?></strong></td>
                    <td valign="middle" width="50%" align="right" style="padding:0 8px;">
<!--                    已经成交<strong style="color:#bd3235; padding:0 5px;">100</strong>件-->
                    </td>
                  </tr>
                </tbody></table>
            </td>
            <td align="center" valign="top" style="padding-top:95px;"><img src="<?php echo $siteUrl;?>da/images/national/plus_950.gif"></td>
            <td width="222">
            	<table width="100%" height="290" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td height="220" colspan="2" align="center" valign="center" style="border:#CCC 1px solid;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_b.jpg';?>" border="0"></a></td>
                  </tr>
                  <tr>
                    <td height="50" colspan="2" style="padding:0 8px;"><a href="<?php echo $items[1]->detail_url;?>" style=" text-decoration:none; color:#333;" target="_blank"><?php echo $items[1]->title;?></a></td>
                  </tr>
                  <tr>
                    <td height="20" width="50%" valign="middle" style="padding:0 8px;"><strong style="color:#999">￥<?php echo $items[0]->price;?></strong></td>
                    <td valign="middle" width="50%" align="right" style="padding:0 8px;">
<!--                    已经成交<strong style="color:#bd3235; padding:0 5px;">100</strong>件-->
                    </td>
                  </tr>
                </tbody></table>
            </td>
            <td valign="top">
<table width="94%" align="center" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td width="85" height="56" valign="top"><img src="<?php echo $siteUrl;?>da/images/national/dapei_950.gif" style="padding-top:5px;"></td>
                    <td valign="top" style="font-size:19px; "><a href="<?php echo $mealList->detail_url;?>" style="color:#000; text-decoration:none" target="_blank"><?php echo $mealList->meal_name;?></a></td>
                  </tr>
                </tbody></table>
                <table width="94%" align="center" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td width="55"><img src="<?php echo $siteUrl;?>da/images/national/equal_950.gif"></td>
                    <td width="102" height="100" align="center" background="<?php echo $siteUrl;?>da/images/national/percent_950.gif" style="background-repeat:no-repeat; font-size:28px; font-weight:bold; color:#FFF;"><?php echo floor(($mealList->meal_price / $mealList->origi_price)*100);?>%</td>
                    <td colspan="2"><strong style="font-size:24px; padding-left:10px">￥<?php echo $mealList->meal_price;?></strong><strong style="font-size:18px; color:#999; padding-left:10px;">￥<?php echo $mealList->origi_price;?></strong><br>
                    <strong style="font-size:16px; color:#bd3235; padding-left:10px;">节省<font style="font-size:24px; padding:0 3px;"><?php echo $price > 0 ? $price : 0;?></font>元</strong></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" align="center" height="80"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/national/buy01_950.gif" border="0"></a></td>
                  </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody></table>
    </td>
  </tr>
</tbody></table>