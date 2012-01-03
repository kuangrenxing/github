<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];

$itemCount = $mealList->itemCount;

?>




<table width="190" border="0" cellspacing="0" cellpadding="0" align="center" background="<?php echo $siteUrl?>da/images/tpls/bigsale/190_bg.gif" style="border:#CCC 1px solid;  font-family:Trebuchet MS; margin-bottom:10px; background-repeat:no-repeat;">
  <tbody>
  <tr>
    <td height="36" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="38" colspan="2" align="center"><span style="text-decoration:line-through; padding-right:5px;">原价￥<?php echo $mealList->origi_price;?></span> <font style="color:#e93a00">节省￥	<?php $price = $mealList->origi_price - $mealList->meal_price;  
        $price = $price < 0 ? 0 : $price; 
        echo XHtml::formatPrice($price,true);?></font></td>
  </tr>
  <tr>
    <td height="40" style="color:#FFF;" align="center"><strong>￥</strong><strong style="font-size:22px;"><?php echo $mealList->meal_price;?></strong></td>
    <td width="85"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/dapei_ico.jpg" border="0"></a></td>
  </tr>
  <tr>
    <td colspan="2" height="40" align="right"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/xiangqing.gif" border="0" style="padding-right:5px;"></a></td>
  </tr>
  <tr>
    <td colspan="2" height="180" align="center">
    	<table width="160" align="center" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="160" height="160" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_160x160.jpg';?>"></a></td>
          </tr>
       </tbody></table>
    </td>
  </tr>

			 <?php for($index = 1; $index < $itemCount; $index++){?>
                  <?php if( isset($items[$index]) ){?>
  <tr>
    <td colspan="2" align="center"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/plus.jpg"></td>
  </tr>
  <tr>
    <td colspan="2" height="180" align="center">
    	<table width="160" align="center" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="160" height="160" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[$index]->detail_url;?>" target="_blank"><img src="<?php echo $items[$index]->orig_img.'_160x160.jpg';?>"></a></td>
          </tr>
       </tbody></table>
    </td>
  </tr>
		  <?php }else{break;}?>
      <?php }?>

  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</tbody></table>