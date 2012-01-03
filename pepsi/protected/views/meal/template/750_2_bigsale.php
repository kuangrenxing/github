<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>



<table width="750" border="0" cellspacing="0" cellpadding="0" align="center" background="<?php echo $siteUrl?>da/images/tpls/bigsale/bg750.jpg" style=" background-repeat:no-repeat; font-size:12px; font-family:Trebuchet MS; margin-bottom:10px;">
  <tbody><tr>
    <td height="40">&nbsp;</td>
    <td colspan="4"><?php echo $mealList->meal_name;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>


    <td width="50">&nbsp;</td>
    <td>
<?php if (!isset($mealList->postage_id) || ($mealList->postage_id == 0)): ?>
	特价包邮中
<?php else: ?>    	
   火热进行中
<?php endif; ?>
    </td>
  </tr>
  <tr>
    <td width="15">&nbsp;</td>
    <td width="220" height="220" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_b.jpg';?>" border="0"></a></td>
    <td width="35" align="center"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/plus.jpg"></td>
    <td width="220" height="220" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_b.jpg';?>" border="0"></a></td>
    <td>&nbsp;</td>
    <td>
    	<table width="95%" align="center" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td height="85" colspan="2" style="font-size:25px;">数量有限，赶紧下单吧!</td>
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
            <td height="35" colspan="2" align="right"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/xiangqing.gif" border="0" style="padding-right:5px;"></a></td>
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
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody></table>