<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];

switch($mealList->itemCount)
{
case 2:
$height=595;
$backgroundImage='190_bj_two.gif';
break;
case 3:
$height=763;
$backgroundImage='190_bj_three.gif';
break;
case 4:
$height=931;
$backgroundImage='190_bj_four.gif';
break;
case 5:
$height=1099;
$backgroundImage='190_bj_five.gif';
break;
}

?>


<table width="190" align="center" height="<?php echo $height;?>" border="0" cellspacing="0" cellpadding="0" background="<?php echo $siteUrl.'da/images/school/'.$backgroundImage;?>" style="background-repeat:no-repeat;">
  <tbody>
    <tr height="17">
    </tr>
    <tr>
      <td height="33" style="color:#ED5850; padding-left:95px; font-size:16px;"><strong><?php echo XHtml::formatPrice($mealList->meal_price)?></strong></td>
    </tr>
    <tr>
      <td height="32" style="color:#fff; padding-left:95px; font-size:16px;"><strong><?php echo XHtml::formatPrice($mealList->origi_price)?></strong></td>
    </tr>
    <tr>
      <td height="32" style="color:#fff; padding-left:95px; font-size:16px;"><strong><?php echo XHtml::formatPrice($mealList->origi_price-$mealList->meal_price)?></strong></td>
    </tr>
    <tr>
      <td height="58" style="padding-left:35px;"><img src="<?php echo $siteUrl;?>da/images/school/btn_buy.gif" width="121" height="40"></td>
    </tr>
    <tr>
      <td height="78">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top">
        <table width="120" align="center" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <?php $this->beginClip('item');?>
            <tr>
              <td height="120" align="right" valign="top" background="{pic_url}" style="background-position:center center; background-repeat:no-repeat; background-color:#FFF;">
                <a href="{detail_url}" target="_blank" style="text-decoration:none; width:120px; height:1px; padding:98px 0 0 0; display:block;"><font style="background-color:#ff0000; color:#fff; text-align:center; width:80px; height:22px; display:block; line-height:22px;">￥{price}</font></a>
              </td>
            </tr>
            <?php $this->endClip();?>
            <?php
            foreach($items as $key=>$item)
            {
            $this->renderClip('item',array(
            '{pic_url}' => $item->large_url,
            '{title}'   => $item->title,
            '{price}'   => $item->price,
            '{detail_url}'   => $item->detail_url,
            ));
            if($key<(count($items)-1))
            {
            echo '<tr> <td height="48">&nbsp;</td> </tr>';
            }
            }
            ?> 
        </tbody>
      </table>
      </td>
    </tr>
    <tr>
      <td height="57" align="right" valign="bottom">
        <a href="http://fuwu.taobao.com/serv/detail.htm?service_id=12230" target="_blank" style="width:35px; display:block; height:10px; margin-right:30px; margin-bottom:15px;"></a>
      </td>
    </tr>
  </tbody>
</table>
<br />
