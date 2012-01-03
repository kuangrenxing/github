<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="746" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Trebuchet MS; margin-bottom:10px;border:#efb273 2px solid;">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl?>da/images/tpls/halloween/750_top.jpg"></td>
  </tr>
  <tr>
    <td height="220" style="background-color:#FFF">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td colspan="6">&nbsp;</td>
            <td rowspan="2">
            	<table width="145" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
                  <tbody><tr>
                    <td><img src="<?php echo $siteUrl?>da/images/tpls/halloween/70_tuijian.gif" >
					<?php if (!isset($mealList->postage_id) || ($mealList->postage_id == 0)): ?><img src="<?php echo $siteUrl?>da/images/tpls/halloween/postage_sm.gif"><?php endif; ?></td>
                    </tr>
                  <tr>
                    <td><a href="<?php echo $mealList->detail_url;?>" target="_blank" style="color:#333; text-decoration:none;"><?php echo $mealList->meal_name;?></a></td>
                  </tr>
                  <tr>
                    <td height="27"><strong style="color:#f48e2a; font-size:18px;">￥ <?php echo $mealList->meal_price;?></strong></td>
                  </tr>
                  <tr>
                    <td height="45" valign="bottom" background="<?php echo $siteUrl?>da/images/tpls/halloween/140_price.gif" style="background-repeat:no-repeat;">
                    	<table width="145" height="35" border="0" cellspacing="0" cellpadding="0">
                          <tbody><tr>
                            <td width="68" align="center" style="color:#999"><?php echo $mealList->origi_price;?></td>
                            <td width="68" align="center"><strong style="color:#f48e2a; padding-right:2px;"><?php echo number_format(floor(($mealList->meal_price / $mealList->origi_price)*100)/10, 1,".","");?></strong>折</td>
                            <td width="9">&nbsp;</td>
                          </tr>
                        </tbody></table>
                    </td>
                  </tr>
                  <tr>
                    <td height="36" valign="bottom"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/135_buy.gif" border="0"></a></td>
                  </tr>
                </tbody></table>            </td>
          </tr>
          <tr>
            <td width="6">&nbsp;</td>
            <td width="186" height="195" valign="top" background="<?php echo $items[0]->orig_img.'_160x160.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/160_kuang.gif" border="0"></a></td>
            <td width="12"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/plus_sm.gif"></td>
            <td width="186" height="195" valign="top" background="<?php echo $items[1]->orig_img.'_160x160.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/160_kuang.gif" border="0"></a></td>
            <td width="12"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/plus_sm.gif"></td>
            <td width="186" height="195" valign="top" background="<?php echo isset($items[2])?$items[2]->orig_img.'_160x160.jpg':$siteUrl.'da/images/empty_160.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo isset($items[2])?$items[2]->detail_url:'#none';?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/160_kuang.gif" border="0"></a></td>
          </tr>
        </tbody></table>
    </td>
  </tr>
</tbody></table>