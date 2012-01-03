<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="946" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Trebuchet MS; margin-bottom:10px;border:#efb273 2px solid;">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl?>da/images/tpls/halloween/950_top.jpg"></td>
  </tr>
  <tr>
        <td height="370" style=" background-color:#FFF;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="12">&nbsp;</td>
            <td width="344" height="350" valign="top" background="<?php echo $items[0]->orig_img.'_310x310.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/310_kuang.gif" border="0"></a></td>
            <td align="center"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/plus_big.gif"></td>
            <td width="344" height="350" valign="top" background="<?php echo $items[1]->orig_img.'_310x310.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/310_kuang.gif" border="0"></a></td>
            <td>
   	    <table width="205" align="center" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
                  <tbody><tr>
                    <td width="125" height="40"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/120_tuijian.gif"></td>
                    <td width="80" valign="top">
	<?php if (!isset($mealList->postage_id) || ($mealList->postage_id == 0)): ?>
	<img src="<?php echo $siteUrl?>da/images/tpls/halloween/postage_big.gif">
	<?php endif; ?>
	</td>
                  </tr>
                  <tr>
                    <td colspan="2"><a href="<?php echo $mealList->detail_url;?>" target="_blank" style="color:#333; text-decoration:none;"><?php echo $mealList->meal_name;?></a></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="40"><strong style="color:#f48e2a; font-size:24px;">￥ <?php echo $mealList->meal_price;?></strong></td>
                  </tr>
                  <tr>
                    <td colspan="2" height="71" valign="bottom" background="<?php echo $siteUrl?>da/images/tpls/halloween/205_price.gif" style="background-repeat:no-repeat;">
                    	<table width="205" height="50" border="0" cellspacing="0" cellpadding="0">
                          <tbody><tr>
                            <td width="96" align="center" style="color:#999"><?php echo $mealList->origi_price;?></td>
                            <td width="96" align="center"><strong style="color:#f48e2a; padding-right:2px;"><?php echo number_format(floor(($mealList->meal_price / $mealList->origi_price)*100)/10, 1,".","");?></strong>折</td>
                            <td width="13">&nbsp;</td>
                          </tr>
                        </tbody></table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" height="65" valign="bottom"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/200_buy.gif" border="0"></a></td>
                  </tr>
                </tbody></table>
            </td>
          </tr>
        </tbody></table>    
    </td></tr>
</tbody></table>