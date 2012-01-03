<?php
$params=Yii::app()->getParams();
$siteUrl=$params['siteUrl'];?>

<table width="750" height="208" align="center" border="0" cellspacing="0" cellpadding="0" style="font-size:12px" bgcolor="#FFFFFF">
  <tbody><tr>
      <td style="border:#ccc 1px solid">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr height="15"></tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td>
                <table width="150" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr align="left">
                      <td><strong style="font-size:20px;">节省：<font style="color:#ff0000">￥<?php echo $mealList->origi_price-$mealList->meal_price;?></font></strong></td>
                    </tr>
                    <tr align="left">
                      <td height="22"><strong>套餐价：</strong><strong style="font-size:16px; color:#fe6521">￥<?php echo $mealList->meal_price;?></strong></td>
                    </tr>
                    <tr align="left">
                      <td height="22"><font color="#666666">原价：<font style="text-decoration:line-through; padding:0 3px;">￥<?php echo $mealList->origi_price;?></font></font></td>
                    </tr>
                    <tr height="8"></tr>
                    <tr>
                      <td><a href="<?php echo $mealList->detail_url;?>" target="_blank"><img src="<?php echo $siteUrl;?>da/images/basic/icon750_ok.gif" border="0"></a></td>
                    </tr>
                    <tr height="10"></tr>
                    <tr>
                      <td><img src="<?php echo $siteUrl;?>da/images/basic/750.gif"></td>
                    </tr>
                    <tr height="8">
                    </tr>
                </tbody></table>
              </td>

        <?php $this->beginClip('item');?>
              <td width="124" valign="top">
                <table border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                      <td width="124" height="122" align="center" style="border:#ccc 1px solid"><img src="{pic_url}"></td>
                    </tr>
                    <tr>
                      <td height="28" align="center" style="color:#666">{price}</td>
                    </tr>
                    <tr>
                      <td align="center"><span style="width:122px;  display:block; overflow:hidden; white-space:nowrap; text-overflow: ellipsis; "><a href="{detail_url}" style="color:#5c66cc; text-decoration:none" target="_blank">{title}</a></span></td>
                    </tr>
                </tbody></table>
              </td>
        <?php $this->endClip();?>
<?php
        for($i=0;$i<4;$i++)
        {
        $this->renderClip('item',array(
        '{pic_url}'     =>isset($items[$i]) ? $items[$i]->orig_img.'_120x120.jpg':$siteUrl.'da/images/empty_120.jpg',
        '{price}'       =>isset($items[$i]) ? "原价：".$items[$i]->price."元":'&nbsp;',
        '{title}'       =>isset($items[$i]) ? $items[$i]->title  :'&nbsp;',
        '{detail_url}'  =>isset($items[$i]) ? $items[$i]->detail_url:'',
        ));
        if($i < 3)
        {
        echo '<td width="22" valign="top" align="center" style="padding-top:55px;"><img src="'.$siteUrl.'da/images/basic/ico_plus.gif"></td>' ;    
        }
        }?>  
              
              
              <td width="10">&nbsp;</td>
            </tr>
        </tbody></table>
      </td>
    </tr>
</tbody></table>
<br />