<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table border="1" width="948" bordercolor="#cdcdcd" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table id="__01" width="946" height="146" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
        <tr>
          <td>
              <img src="<?php echo $siteUrl;?>da/images/950_narrow/hot-ing.gif" width="191"  alt=""></td>
          <?php for($i=0;$i<5;$i++){ ?>
           <td width="122" rowspan="5">

             <?php if(isset($items[$i])){?>
             <table width="122" align="center" height="122" border="0" cellspacing="0" cellpadding="0" background="<?php echo $items[$i]->middle_url;?>" style="background-position:center center; background-repeat:no-repeat" >

              <tr>
                  <td align="right" valign="top" width="120" height="120"   background="<?php echo $siteUrl.'da/images/950_narrow/bg_border120.gif';?>" style="background-position:center center; background-repeat:no-repeat;">
                    <a href="<?php echo $items[$i]->detail_url;?>" target="_blank" style="text-decoration:none; color:#000; display:block; width:122px; height:1px; padding-top:80px; " title="<?php echo $items[$i]->title;?>">
                        <span style="background-color:#f41127; display:block ; width:55px; padding:2px 0 2px 0; text-align:center;  margin-right:1px;">￥<?php echo XHtml::formatPrice($items[$i]->price);?></span></a>

                </td>
              </tr>

            </table>
            <?php }else{?>
            <img src="<?php echo $siteUrl;?>da/images/950_narrow/bg_none.gif" width="122" alt=""></td>
            <?php }?>

          </td>
          <?php if($i!==4){?>
          <td rowspan="5" align="center" >
            <img src="<?php echo $siteUrl;?>da/images/950_narrow/ico_plus.gif"  />	
          </td> 
          <?php }?>
          <?php }?> 
          <td width="44" rowspan="5">
              <a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230" target="_blank" ><img src="<?php echo $siteUrl;?>da/images/950_narrow/here.gif" width="44" height="146" alt=""></a></td>
        </tr>
        <tr>
            <td background="<?php echo $siteUrl;?>da/images/950_narrow/bg_taocan.gif" style="background-repeat:no-repeat" width="191" height="21"><span style="margin-left:100px;color:#f70b21; font-size:14px;">￥<?php echo XHtml::formatPrice($mealList->meal_price);?></span></td>
        </tr>
        <tr>
            <td background="<?php echo $siteUrl;?>da/images/950_narrow/bg_lisheng.gif" style="background-repeat:no-repeat" width="191" height="21"><span style="margin-left:100px;color:#f70b21; font-size:14px;">￥<?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price);?></span></td>
        </tr>
        <tr>
          <td width="191" height="18" ><span style=" margin-left:53px;color:#b4b4b4; font-size:12px; text-decoration:line-through">原价：￥<?php echo XHtml::formatPrice($mealList->origi_price);?></span></span></td>
        </tr>
        <tr>
          <td align="center" valign="bottom">
              <a href="<?php echo $mealList->detail_url;?>" target="_blank" ><img src="<?php echo $siteUrl;?>da/images/950_narrow/btn_buy950.gif"  alt="" border="0"></a>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>                 
<br />
