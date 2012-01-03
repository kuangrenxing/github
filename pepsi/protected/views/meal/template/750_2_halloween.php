<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table width="746" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Trebuchet MS; margin-bottom:10px;border:#efb273 2px solid; ">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl?>da/images/tpls/halloween/750_top.jpg"></td>
  </tr>
  <tr>
    <td height="280" style="background-color:#FFF;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="12">&nbsp;</td>
            <td width="240" height="260" valign="top" background="<?php echo $items[0]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/220_kuang.gif" border="0"></a></td>
            <td width="20"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/plus_big.gif"></td>
            <td width="240" height="260" valign="top" background="<?php echo $items[1]->orig_img.'_b.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/220_kuang.gif" border="0"></a></td>
            <td valign="top">
            	<table width="190" align="center" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
                  <tbody><tr>
                    <td width="102" height="40"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/95_tuijian.gif"></td>
                    <td width="88" valign="top">
	
		<?php if (!isset($mealList->postage_id) || ($mealList->postage_id == 0)): ?>
	<img src="<?php echo $siteUrl?>da/images/tpls/halloween/postage_big.gif">
	<?php endif; ?>
	</td>
                  </tr>
                  <tr>
                    <td colspan="2"><a href="<?php echo $mealList->detail_url;?>" target="_blank" style="color:#333; text-decoration:none;"><?php echo $mealList->meal_name;?></a></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="37"><strong style="color:#f48e2a; font-size:22px;">￥ <?php echo $mealList->meal_price;?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="55" valign="bottom" background="<?php echo $siteUrl?>da/images/tpls/halloween/185_price.gif" style="background-repeat:no-repeat;">
                    	<table width="190" height="45" border="0" cellspacing="0" cellpadding="0">
                          <tbody><tr>
                            <td width="85" align="center" style="color:#999"><?php echo $mealList->origi_price;?></td>
                            <td width="85" align="center"><strong style="color:#f48e2a; padding-right:2px;"><?php echo number_format(floor(($mealList->meal_price / $mealList->origi_price)*100)/10, 1,".","");?></strong>折</td>
                            <td width="20">&nbsp;</td>
                          </tr>
                        </tbody></table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" height="50" valign="bottom"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/180_buy.gif" border="0"></a></td>
                  </tr>
                </tbody></table>
            </td>
          </tr>
        </tbody></table>
  </td></tr>
</tbody></table>