<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color:#FFF;font-size:12px; font-family:Trebuchet MS; border:#CCC 1px solid; margin-bottom:10px;">
  <tbody><tr>
    <td colspan="6">&nbsp;</td>
  </tr>
  <tr>
    <td width="16">&nbsp;</td>
    <td width="220">
    <table width="220" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
          <tbody><tr>
            <td width="220" height="220" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_b.jpg';?>"></a></td>
          </tr>
          <tr>
            <td height="30" style="border-right:#CCC 1px solid;border-left:#CCC 1px solid;border-bottom:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/collect/buy_one.jpg" border="0"></a><strong style="color:#ff007f">￥<?php echo $items[0]->price;?></strong></td>
          </tr>
      </tbody></table>
    </td>
    <td align="center" width="42"><img src="<?php echo $siteUrl?>da/images/tpls/collect/plus.jpg"></td>
    <td width="220">
    	<table width="220" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
          <tbody><tr>
            <td width="220" height="220" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_b.jpg';?>"></a></td>
          </tr>
          <tr>
            <td height="30" style="border-right:#CCC 1px solid;border-left:#CCC 1px solid;border-bottom:#CCC 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/collect/buy_one.jpg" border="0"></a><strong style="color:#ff007f">￥<?php echo $items[1]->price;?></strong></td>
          </tr>
        </tbody></table>
    </td>
    <td align="center" width="42"><img src="<?php echo $siteUrl?>da/images/tpls/collect/equl.jpg"></td>
    <td width="210"><img src="<?php echo $siteUrl?>da/images/tpls/collect/dapei1.jpg" style="padding-bottom:12px;">
    <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="text-align:center;background-repeat:no-repeat; background-position:center center" background="<?php echo $siteUrl?>da/images/tpls/collect/bg.jpg">
          <tbody><tr>
            <td height="40" style="text-decoration:line-through;color:#999;">原价<?php echo $mealList->origi_price;?></td>
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
      </tbody></table>
        
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody></table>