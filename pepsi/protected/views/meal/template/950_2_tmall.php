<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="950" height="230" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size:12px" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td style="border:#ccc 1px solid">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr height="15">    
            </tr>
            <tr>
              <td width="5">&nbsp;</td>
              <td width="200" align="right" valign="top">
                <table width="176" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr><td>&nbsp;</td></tr><tr>
                    </tr><tr height="8"></tr>
                    <tr align="left">
                      <td>
                        <strong style=" font-size:22px;">节省：<font style="color:#ff0000;">￥<?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></font></strong>
                      </td>
                      </tr><tr align="left">
                      <td height="22"><strong>套餐价：</strong><strong style="font-size:16px; color:#fe6521">￥<?php echo $mealList->meal_price;?></strong></td>
                    </tr>
                    <tr align="left">
                      <td height="22"><font color="#666666">原价：<font style="text-decoration:line-through; padding:0 3px;">￥<?php echo $mealList->origi_price;?></font></font></td>
                    </tr>
                    <tr height="8"></tr>
                    <tr>
                      <td><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/basic/icon950_ok.gif" border="0"></a></td>
                    </tr>
                    <tr>
                      <td height="30" background="<?php echo $siteUrl;?>da/images/basic/linebg03.gif" style="background-repeat:repeat-x; background-position:center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td><img src="<?php echo $siteUrl;?>da/images/basic/tmall.gif" width="174" height="104"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                </tbody></table>
              </td>
              <td>&nbsp;          
              </td>
              <td valign="top" width="314">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                  <td width="314" height="312" align="center" style="border:#ccc 1px solid"><img src="<?php echo $items[0]->orig_img.'_310x310.jpg';?>"></td>
                    </tr>
                    <tr>
                      <td height="28" align="center" style="color:#666">原价：<?php echo $items[0]->price;?>元</td>
                    </tr>
                    <tr>
                      <td align="center"><a href="<?php echo $items[0]->detail_url;?>" style="color:#5c66cc; text-decoration:none" target="_blank"><?php echo $items[0]->title;?></a></td>
                    </tr>
                </tbody></table>
              </td>
              <td width="45" align="center" valign="top" style="padding-top:145px;"><img src="<?php echo $siteUrl;?>da/images/basic/ico_plus_950.gif"></td>
              <td valign="top" width="314">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                      <td width="314" height="312" align="center" style="border:#ccc 1px solid"><img src="<?php echo $items[1]->orig_img.'_310x310.jpg';?>"></td>
                    </tr>
                    <tr>
                      <td height="28" align="center" style="color:#666">原价：<?php echo $items[1]->price;?>元</td>
                    </tr>
                    <tr>
                      <td align="center"><a href="<?php echo $items[1]->detail_url;?>" style="color:#5c66cc; text-decoration:none" target="_blank"><?php echo $items[1]->title;?></a></td>
                    </tr>
                </tbody></table>
              </td>
              <td width="30"></td>

            </tr>
            <tr height="15"></tr>
        </tbody></table>
      </td>
    </tr>
</tbody></table>
<br />
