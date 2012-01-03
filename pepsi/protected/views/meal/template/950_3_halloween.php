<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="950" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Trebuchet MS; margin-bottom:10px; border:#efb273 2px solid;">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl?>da/images/tpls/halloween/950_top.jpg"></td>
  </tr>
  <tr>
    <td height="280" style="background-color:#FFF">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="6">&nbsp;</td>
            <td width="240" height="260" valign="top" background="<?php echo $items[0]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/220_kuang.gif" border="0"></a></td>
            <td width="16"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/plus_big.gif"></td>
            <td width="240" height="260" valign="top" background="<?php echo $items[1]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/220_kuang.gif" border="0"></a></td>
            <td width="16"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/plus_big.gif"></td>
            <td width="240" height="260" valign="top" background="<?php echo isset($items[2])?$items[2]->orig_img.'_b.jpg':$siteUrl.'da/images/empty_220.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo isset($items[2])?$items[2]->detail_url:'#none';?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/220_kuang.gif" border="0"></a></td>
            <td>
            	<table width="160" align="center" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
                  <tbody><tr>
                    <td width="95" height="45"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/87_tuijian.gif"></td>
                    <td width="65" valign="top">
	<?php if (!isset($mealList->postage_id) || ($mealList->postage_id == 0)): ?>
	<img src="<?php echo $siteUrl?>da/images/tpls/halloween/postage_big.gif">
	<?php endif; ?>
	</td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo $mealList->meal_name;?></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="37"><strong style="color:#f48e2a; font-size:22px;">￥ <?php echo $mealList->meal_price;?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="55" valign="bottom" background="<?php echo $siteUrl?>da/images/tpls/halloween/158_price.gif" style="background-repeat:no-repeat;">
                    	<table width="160" height="40" border="0" cellspacing="0" cellpadding="0">
                          <tbody><tr>
                            <td width="74" align="center" style="color:#999"><?php echo $mealList->origi_price;?></td>
                            <td width="74" align="center"><strong style="color:#f48e2a; padding-right:2px;"><?php echo number_format(floor(($mealList->meal_price / $mealList->origi_price)*100)/10, 1,".","");?></strong>折</td>
                            <td width="12">&nbsp;</td>
                          </tr>
                        </tbody></table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" height="45" valign="bottom"><a href="<?php echo $mealList->detail_url;?>"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/150_buy.gif"></a></td>
                  </tr>
                </tbody></table>
            </td>
          </tr>
        </tbody></table>

    </td>
  </tr>
</tbody></table>