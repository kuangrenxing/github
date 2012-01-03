<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;
?>
<table width="186" border="0" cellspacing="0" cellpadding="0" style="border:#bc3335 2px solid; font-family:Trebuchet MS; font-size:12px; margin-bottom:5px;">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl;?>da/images/national/bg_top_190.gif"></td>
  </tr>
  <tr>
    <td>
    	<table align="center" width="162" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
                <tbody><tr>
                  <td height="20"><img src="<?php echo $siteUrl;?>da/images/national/dapei_750.gif"></td>
                </tr>
                <tr>
                  <td height="54"><a href="<?php echo $mealList->detail_url;?>" target="_blank" style="color:#000;text-decoration:none;"><?php echo $mealList->meal_name;?></a></td>
                </tr>
                
                <tr>
                  <td height="160" align="center" valign="center" style="border:#CCC 1px solid;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_160x160.jpg';?>" border="0"></a></td>
                </tr>
                
                <?php for($index = 1; $index < $itemCount; $index++){?>
                    <?php if( isset($items[$index]) ){?>
                	<tr>
                  		<td height="22" align="center"><img src="<?php echo $siteUrl;?>da/images/national/plus_sm.gif"></td>
                	</tr>
                	<tr>
                  		<td width="162" height="160" align="center" valign="center" style="border:#CCC 1px solid;"><a href="<?php echo $items[$index]->detail_url;?>" target="_blank"><img src="<?php echo $items[$index]->orig_img.'_160x160.jpg';?>" border="0"></a></td>
                	</tr>
                    <?php }else{break;}?>
                <?php }?>
                
                <tr>
                  <td height="22" align="center"><img src="<?php echo $siteUrl;?>da/images/national/equal_sm.gif"></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                      <td rowspan="3" width="72" height="52" align="center" background="<?php echo $siteUrl;?>da/images/national/percent_sm.gif" style="background-repeat:no-repeat; background-position:center; color:#FFF; font-size:16px; font-weight:bold"><?php echo floor(($mealList->meal_price / $mealList->origi_price)*100);?>%</td>
                      <td><strong style="font-size:16px;">￥<?php echo $mealList->meal_price;?></strong><br></td>
                    </tr>
                    <tr>
                      <td><strong style="text-decoration:line-through;color:#999">￥<?php echo $mealList->origi_price;?></strong></td>
                    </tr>
                    <tr>
                      <td><strong style="color:#bd3235;">节省<font style="font-size:16x; padding:0 3px;"><?php $price = $mealList->origi_price - $mealList->meal_price;
                      echo $price > 0 ? $price : 0;
                      ?></font>元</strong></td>
                    </tr>
                    <tr>
                    	<td colspan="2" height="40" align="center"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/national/buy02_750.gif"></a></td>
                    </tr>
                  </tbody></table></td>
                </tr>
             </tbody></table>
    </td>
  </tr>
</tbody></table>
