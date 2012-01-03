<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;
$price = $mealList->origi_price - $mealList->meal_price;
?>

<table width="748" border="0" align="center" cellspacing="0" cellpadding="0" style="border:#bc3335 1px solid; font-family:Trebuchet MS; font-size:12px; margin-bottom:5px;">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl;?>da/images/national/bg_top_750.gif"></td>
  </tr>
  <tr>
    <td>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tbody>
          <tr>
            <td colspan="5">&nbsp;</td>
          </tr>
          <tr>
            <td width="28" height="160">&nbsp;</td>
            <td width="162" align="center" style="border:#CCC 1px solid;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_160x160.jpg';?>"></a></td>
            <td width="50" align="center"><img src="<?php echo $siteUrl;?>da/images/national/plus_750.gif"></td>
            <td width="162" align="center" style="border:#CCC 1px solid;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_160x160.jpg';?>"></a></td>
            <td valign="top">
           	  <table width="94%" align="center" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td width="75" height="48" valign="top"><img src="<?php echo $siteUrl;?>da/images/national/dapei_750.gif" style="padding-top:3px;"></td>
                    <td style="font-size:16px;" valign="top"><a href="<?php echo $mealList->detail_url;?>" style="color:#000;text-decoration:none;" target="_blank"><?php echo $mealList->meal_name;?></a></td>
                  </tr>
                </tbody></table>
                <table width="94%" align="center" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                    <td width="40"><img src="<?php echo $siteUrl;?>da/images/national/equal_750.gif"></td>
                    <td width="64" height="64" align="center" background="<?php echo $siteUrl;?>da/images/national/percent_750.gif" style="background-repeat:no-repeat; font-size:18px; font-weight:bold; color:#FFF;"><?php echo floor(($mealList->meal_price / $mealList->origi_price)*100);?>%</td>
                    <td colspan="2"><strong style="font-size:20px; padding-left:10px">￥<?php echo $mealList->meal_price;?></strong><strong style="font-size:16px; color:#999; padding-left:10px;">￥<?php echo $mealList->origi_price;?></strong><br>
                      <strong style="font-size:14px; color:#bd3235; padding-left:10px;">节省<font style="font-size:20px; padding:0 3px;"><?php echo $price > 0 ? $price : 0;?></font>元</strong></td>
                  </tr>
                  <tr>
                    <td height="40" colspan="4" align="center"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/national/buy01_750.gif" border="0"></a></td>
                  </tr>
            </tbody></table>
            </td>
          </tr>
          <tr>
            <td colspan="5">&nbsp;</td>
          </tr>
        </tbody></table>
        </td>
  </tr>
</tbody></table>
