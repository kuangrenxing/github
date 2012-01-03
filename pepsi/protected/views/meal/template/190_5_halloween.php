<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];
$itemCount = $mealList->itemCount;

?>

<table width="186" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family:Trebuchet MS; margin-bottom:10px;border:#efb273 2px solid;">
  <tbody><tr>
    <td><img src="<?php echo $siteUrl?>da/images/tpls/halloween/190_top.jpg"></td>
  </tr>
  <tr>
    <td style="background-color:#FFF">
    	<table width="167" align="center" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
                  <tbody><tr>
                    <td width="93" height="37"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/87_tuijian.gif"></td>
                    <td width="75">
	<?php if (!isset($mealList->postage_id) || ($mealList->postage_id == 0)): ?>
	<img src="<?php echo $siteUrl?>da/images/tpls/halloween/postage_sm.gif">
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
                    <td colspan="2" height="45" valign="bottom" background="<?php echo $siteUrl?>da/images/tpls/halloween/190_price.gif" style="background-repeat:no-repeat;">
                    	<table width="167" height="35" border="0" cellspacing="0" cellpadding="0">
                          <tbody><tr>
                            <td width="69" align="center" style="color:#999"><?php echo $mealList->origi_price;?></td>
                            <td width="69" align="center"><strong style="color:#f48e2a; padding-right:2px;"><?php echo number_format(floor(($mealList->meal_price / $mealList->origi_price)*100)/10, 1,".","");?></strong>折</td>
                            <td width="29">&nbsp;</td>
                          </tr>
                        </tbody></table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" height="60"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/170_buy.gif" border="0"></a></td>
                  </tr>
                </tbody></table>
                <table border="0" cellspacing="0" cellpadding="0" align="center">
                	<tbody>
						
					<tr>
                    	<td width="166" height="166" background="<?php echo $items[0]->orig_img.'_160x160.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/190_border.gif" border="0"></a></td>
                    </tr>

					 <?php for($index = 1; $index < $itemCount; $index++){?>
		                    <?php if( isset($items[$index]) ){?>
                    <tr>
                    	<td align="center" height="25"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/plus_big.gif"></td>
                    </tr>

                    <tr>
                    	<td width="166" height="166" background="<?php echo $items[$index]->orig_img.'_160x160.jpg';?>" style="background-repeat:no-repeat; background-position:center center;"><a href="<?php echo $items[$index]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/halloween/190_border.gif" border="0"></a></td>
                    </tr>
					  <?php }else{break;}?>
	                <?php }?>

                    <tr height="12"></tr>
                </tbody></table>
    </td>
   </tr>
</tbody></table>
