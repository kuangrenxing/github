<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color:#FFF;font-size:12px; font-family:Trebuchet MS; border:#CCC 1px solid; margin-bottom:10px;">
  <tbody><tr>
    <td height="48" colspan="6" align="center"><img src="<?php echo $siteUrl?>da/images/tpls/collect/dapei.jpg"></td>
    <td>&nbsp;</td>
    <td rowspan="3">
    	<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="text-align:center;background-repeat:no-repeat; background-position:center center" background="<?php echo $siteUrl?>da/images/tpls/collect/bg.jpg">
          <tbody><tr>
            <td height="40" style="text-decoration:line-through; color:#999;">原价<?php echo $mealList->origi_price;?></td>
          </tr>
          <tr>
            <td height="60" style="color:#FFF;">套餐价：￥<strong style="font-size:25px;"><?php echo $mealList->meal_price;?></strong></td>
          </tr>
          <tr>
            <td height="30" style="text-decoration:line-through; font-size:14px; color:#ff7f00">为您节省<strong>￥<?php $price = $mealList->origi_price - $mealList->meal_price;  
              $price = $price < 0 ? 0 : $price; 
              echo XHtml::formatPrice($price,true);?></strong></td>
          </tr>
          <tr>
            <td height="30">数量有限，赶紧下单吧</td>
          </tr>
          <tr>
            <td height="60" align="center"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/collect/buy.jpg" border="0"></a></td>
          </tr>
      </tbody></table>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="35">&nbsp;</td>
    <td width="160">
    	<table width="160" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
          <tbody><tr>
            <td width="160" height="160" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_160x160.jpg';?>" ></a></td>
          </tr>
          <tr>
            <td height="30" style="border-right:#CCC 1px solid;border-left:#CCC 1px solid;border-bottom:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/collect/buy_one.jpg" border="0"></a><strong style="color:#ff007f">￥<?php echo $items[0]->price;?></strong></td>
          </tr>
      </tbody></table>
    </td>
    <td align="center"><img src="<?php echo $siteUrl?>da/images/tpls/collect/plus.jpg"></td>
    <td width="160">
    	<table width="160" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
          <tbody><tr>
            <td width="160" height="160" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_160x160.jpg';?>" ></a></td>
          </tr>
          <tr>
            <td height="30" style="border-right:#CCC 1px solid;border-left:#CCC 1px solid;border-bottom:#CCC 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/collect/buy_one.jpg" border="0"></a><strong style="color:#ff007f">￥<?php echo $items[1]->price;?></strong></td>
          </tr>
      </tbody></table>
    </td>
    <td align="center"><img src="<?php echo $siteUrl?>da/images/tpls/collect/plus.jpg"></td>
    <td width="160">
	   	<table width="160" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
	          <tbody>
	<?php if(isset($items[2])): ?>
 			<tr>
            <td width="160" height="160" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[2]->detail_url;?>" target="_blank"><img src="<?php echo $items[2]->orig_img.'_160x160.jpg';?>" width="160"></a></td>
          </tr>
          <tr>
            <td height="30" style="border-right:#CCC 1px solid;border-left:#CCC 1px solid;border-bottom:#CCC 1px solid"><a href="<?php echo $items[2]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/collect/buy_one.jpg" border="0"></a><strong style="color:#ff007f">￥<?php echo $items[2]->price;?></strong></td>
          </tr>
   <?php else: ?>
			<tr>
          <td width="160" height="160" align="center" style="border:#CCC 1px solid"><a href="" target="_blank"><img src="<?php echo $siteUrl?>da/images/empty_160.jpg" ></a></td>
        </tr>
        <tr>
          <td height="30" style="border-right:#CCC 1px solid;border-left:#CCC 1px solid;border-bottom:#CCC 1px solid"></td>
        </tr>
   <?php endif; ?>
		</tbody></table>
    </td>
    <td align="center"><img src="<?php echo $siteUrl?>da/images/tpls/collect/equl.jpg"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
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