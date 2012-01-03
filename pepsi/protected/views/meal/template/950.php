<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="950" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tbody>
  <tr>
    <td height="" colspan="2"><img src="<?php echo $siteUrl; ?>da/images/v1/950_top_bg.gif"></td>
    <td width="101" rowspan="2"><img style="margin:0;" src="<?php echo $siteUrl; ?>da/images/v1/dptc.gif"></td>
  </tr>
  <tr>
    <td width="10" height="51" bgcolor="#F3F3F3" style="font-size:1px"></td>
    <td width="839" height="73" valign="top" style="font-size:0px">
      <table border="0" width="97%" align="center" cellspacing="0" cellpadding="0" style="font-size:12.0px;  margin-top:10px">
              <tbody><tr>
                <td width="18%" rowspan="2"><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/v1/buy.gif" border="0"></a></td>
                <td style="padding-left:10px"><strong>套餐价：<font color="#FF6600" style="padding-right:5px"><?php echo $mealList->meal_price;?></font>元</strong>（原价<font style="text-decoration:line-through; padding:0 2px 0 5px"><?php echo $mealList->origi_price;?></font>）</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td style="padding-left:10px">节省<strong style="text-decoration:underline; color:#F00; padding-left:8px"><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></strong> 元</td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table>
  </td>
  </tr>
  </tbody>
</table>

<table width="950" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tbody>
  <tr>
    <td rowspan="2" bgcolor="#F3F3F3" style="font-size:1px" width="10">
    </td>
    <td>
      <table width="96%" align="center" border="0" cellspacing="0" cellpadding="0" style=" margin-bottom:10px; ">
        <tbody>
          <tr><td><img src="<?php echo $siteUrl;?>da/images/v1/line_950.gif" height="1"></td></tr>
        </tbody>
      </table>
      <table width="97%" align="center" border="0" cellspacing="0" cellpadding="0" style="text-align:center; font-size:12.0px; line-height:18px">
        <tbody>
        <tr>
          <?php for($i=0;$i<5;$i++){ ?>
            <td width="160px" height="160px" style="border:1.0px solid #CCC"><a href="<?php echo isset($items[$i]) ? $items[$i]->detail_url:'';?>" target="_blank"><img src="<?php echo isset($items[$i]) ? $items[$i]->large_url:$siteUrl.'da/images/empty_160.jpg';?>" ></td>
             <?php echo ($i<4)?'<td width="35px"><img src="'.$siteUrl.'da/images/v1/plus.gif"></td>':'';?> 
             <?php }?>
         </tr>
         <tr>
           <?php for($i=0;$i<5;$i++){ ?>
           <td><font color="#FF6600" style="margin-bottom:5px; margin-top:10px; display:block"><strong><?php echo isset($items[$i]) ? '￥'.$items[$i]->price:'';?></strong></font></td>
           <?php echo ($i<4)?'<td>&nbsp;</td>':'';?>
           <?php }?>
         </tr>
         <tr>
           <?php for($i=0;$i<5;$i++){ ?>
           <td><span style="display:block;margin-bottom:15px; height:40px;overflow:hidden; width:160px"><a href="<?php echo isset($items[$i])?$items[$i]->detail_url:'';?>" target="_blank" style="text-decoration:none; color:#5c66cc; text-overflow: ellipsis; word-break: break-all;"><?php echo isset($items[$i]) ? $items[$i]->title:'';?></a></span></td> 
           <?php echo ($i<4)?'<td>&nbsp;</td>':'';?>
           <?php }?>
         </tr>
       </tbody></table>
       </td>
     <td rowspan="2" style="font-size:1px" width="10" bgcolor="#F3F3F3"></td>
     <td rowspan="2" width="4px"></td>
   </tr>
   <tr>
     <td valign="bottom" style="font-size:1px"><img src="<?php echo $siteUrl; ?>da/images/v1/950_bottom_bg.gif" width="100%" height="23px"></td>
   </tr>
 </tbody>
</table>
<br />
