<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];

$itemCount = $mealList->itemCount;

?>


<table width="950" align="center" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl?>da/images/tpls/bigsale/bg.jpg" style=" background-repeat:no-repeat; font-size:12px; font-family:Trebuchet MS;">
  <tbody><tr height="40">
    <td height="40" colspan="10"><font style="padding-left:10px; font-size:14px;"><?php echo $mealList->meal_name;?></font></td>
  </tr>
  <tr>
    <td height="55">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><span style="padding-top:18px; padding-left:5px; display:block">
  		<?php if (!isset($mealList->postage_id) || ($mealList->postage_id == 0)): ?>
			特价包邮中
		<?php else: ?>    	
		   火热进行中
		<?php endif; ?>  	
    </span></td>
  </tr>
  <tr>
    <td width="25">&nbsp;</td>
    <td width="120" height="120" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_120x120.jpg';?>" border="0"></a></td>

	<?php for($index = 1; $index < 4; $index++){?>
            <?php if( isset($items[$index]) ){?>

    <td width="65" align="center"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/plus.jpg"></td>
    <td width="120" height="120" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[$index]->detail_url;?>" target="_blank"><img src="<?php echo $items[$index]->orig_img.'_120x120.jpg';?>" border="0"></a></td>

			  <?php }else{ ?>
				<td width="65" align="center"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/plus.jpg"></td>
			    <td width="120" height="120" align="center" style="border:#CCC 1px solid"><a href="#none" ><img src="<?php echo $siteUrl?>da/images/empty_120.jpg" border="0"></a></td>
				
			<?php	}?>
            <?php }?>


    <td>&nbsp;</td>
    <td rowspan="3" width="215" valign="top">
    	<table width="95%" align="center" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td height="80" colspan="2" style="font-size:25px;">数量有限，赶紧下单吧!</td>
          </tr>
          <tr>
            <td height="45" colspan="2"><span style="text-decoration:line-through; padding-right:5px;">原价￥<?php echo $mealList->origi_price;?></span> <font style="color:#e93a00">节省￥<?php $price = $mealList->origi_price - $mealList->meal_price;  
              $price = $price < 0 ? 0 : $price; 
              echo XHtml::formatPrice($price,true);?></font></td>
          </tr>
          <tr>
            <td height="45" style="color:#FFF;"><strong>￥</strong><strong style="font-size:26px;"><?php echo $mealList->meal_price;?></strong></td>
            <td width="90"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/dapei_ico.jpg" border="0"></a></td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="center">&nbsp;</td>
          </tr>
        </tbody></table>
    </td>
  </tr>
  <tr>
    <td height="54">&nbsp;</td>
    <td width="120"><a href="<?php echo $items[0]->detail_url;?>" style="color:#666; text-decoration:none" target="_blank"><?php echo $items[0]->title;?></a></td>
    <td>&nbsp;</td>

	<?php for($index = 1; $index < 4; $index++){?>
            <?php if( isset($items[$index]) ){?>
	
    <td width="120"><a href="<?php echo $items[0]->detail_url;?>" style="color:#666; text-decoration:none" target="_blank"><?php echo $items[$index]->title;?></a></td>
    <td>&nbsp;</td>
  <?php }else{ ?>

    <td width="120"><a href="#none" style="color:#666; text-decoration:none" ></a></td>
    <td>&nbsp;</td>
	<?php	}?>
    <?php }?>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="color:#e93a00">￥<?php echo $items[0]->price; ?></td>
    <td>&nbsp;</td>

	<?php for($index = 1; $index < 4; $index++){?>
            <?php if( isset($items[$index]) ){?>

    <td style="color:#e93a00">￥<?php echo $items[$index]->price; ?></td>
    <td>&nbsp;</td>
	<?php }else{ ?>
    <td style="color:#e93a00">&nbsp;</td>
    <td>&nbsp;</td>
	<?php	}?>
    <?php }?>

  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody></table>