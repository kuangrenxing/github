<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>


<table width="750" border="0" cellspacing="0" cellpadding="0" align="center" background="<?php echo $siteUrl?>da/images/tpls/bigsale/bg7501.jpg" style=" background-repeat:no-repeat; font-size:12px; font-family:Trebuchet MS; margin-bottom:10px;">
  <tbody><tr>
    <td height="40" colspan="6"><font style="padding-left:10px; font-size:14px;"><?php echo $mealList->meal_name;?></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="50">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="4">
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
            <td height="35" colspan="2" align="right"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/xiangqing.gif" border="0" style="padding-right:5px;"></a></td>
          </tr>
        </tbody></table>    </td>
  </tr>
  <tr>
    <td width="35">&nbsp;</td>
    <td width="120" height="120" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[0]->detail_url;?>" target="_blank"><img src="<?php echo $items[0]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
    <td width="45" align="center"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/plus.jpg"></td>
    <td width="120" height="120" align="center" style="border:#CCC 1px solid"><a href="<?php echo $items[1]->detail_url;?>" target="_blank"><img src="<?php echo $items[1]->orig_img.'_120x120.jpg';?>" border="0"></a></td>
    <td width="45" align="center"><img src="<?php echo $siteUrl?>da/images/tpls/bigsale/plus.jpg"></td>
    <td width="120" height="120" align="center" style="border:#CCC 1px solid"><a href="<?php echo isset($items[2])?$items[2]->detail_url:'#none';?>" target="_blank"><img src="<?php echo isset($items[2])?$items[2]->orig_img.'_120x120.jpg':$siteUrl.'da/images/empty_120.jpg';?>" border="0"></a></td>
    <td width="55">&nbsp;</td>
  </tr>
  <tr>
    <td height="54">&nbsp;</td>
    <td width="120"><a href="<?php echo $items[0]->detail_url;?>" style="color:#666; text-decoration:none" target="_blank"><?php echo $items[0]->title;?></a></td>
    <td>&nbsp;</td>
    <td width="120"><a href="<?php echo $items[1]->detail_url;?>" style="color:#666; text-decoration:none" target="_blank"><?php echo $items[1]->title;?></a></td>
    <td>&nbsp;</td>
    <td width="120"><a href="<?php echo isset($items[2])?$items[2]->detail_url:'#none';?>" style="color:#666; text-decoration:none" target="_blank">
	<?php echo isset($items[2])?$items[2]->title:'';?>
	</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="color:#e93a00">￥<?php echo $items[0]->price;?></td>
    <td>&nbsp;</td>
    <td style="color:#e93a00">￥<?php echo $items[1]->price;?></td>
    <td>&nbsp;</td>
    <td style="color:#e93a00"><?php echo isset($items[2])?'￥'.$items[2]->price:'';?></td>
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
