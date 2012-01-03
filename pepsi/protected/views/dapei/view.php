<div class="xztc mb10">
  <div class="grid-zxtc layout">
    <div class="col-main">
      <div class="main-wrap tj_c w928  h70">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" height="70px">
          <tbody><tr>
              <td width="29%"><a href="/da/dapei/index"><img src="/da/images/btn_back.gif" class="vam"></a></td>
              <td width="30%"><a href="#none"><img class="J_copy_html vam" src="/da/images/btn_copy.gif"></a></td>
              <td width="30%"><a href="http://design.taobao.com" target="_blank"><img src="/da/images/btn_zhuangshi.gif" class="vam"></a></td>
              <td width="11%"> <a href="">
                  <img src="/da/images/btn_bianji.gif" class="vam">
              </a></td>
            </tr>
        </tbody></table>
      </div>      
    </div>
    <div class="col-sub tj_l w21 h70"></div>
    <div class="col-extra tj_r w21 h70"></div>
  </div>
</div>

<div class="notice ks-clear">
<div class="notice_border ks-clear">
  <div class="notice_left"><a href="#none" class="J_toggle_html"><img src="/da/images/html.gif"  /></a></div>
  <div class="notice_right J_IE6_notice">
    <img src="/da/images/icon16.gif"  />如果拷贝不成功，请切换至源代码手工拷贝。<a href="http://bangpai.taobao.com/group/thread/14435987-263413104.htm" target="_blank">点击此处</a>查看帮助！
    </div>
 </div>
</div>

<div class="view950">
  <div class="view_mbox">
    <div class="view_mboxm J_html ks-clear">
   <?php echo $model->html; ?> 
        
      </div>
<div class="fabu"><a href="/da/publish/create/<?php echo $model->id; ?>"><img src="/da/v2/images/fabu.png"></a></div>
    </div>
  </div>

<script type="text/javascript" src="/da/js/jquery.zclip.js"></script>
<script type="text/javascript" src="/da/js/template.js"></script>

<script type="text/javascript" charset="utf-8">
  document.write("<!--[if lte IE 6]><script>isIE6=true;</scr"+"ipt><![endif]-->");  
  if(typeof isIE6 !=='undefined' && isIE6){
    $('.J_IE6_notice').show();
  } 
$(window).load(function(){
  Template.clip();
});
$(document).delegate('.J_toggle_html','click',function(){
  window.J_html=window.J_html?window.J_html:$('.J_html').html();  
  if($('textarea').length===0){
    $('.J_html').html('<textarea cols="185" rows="50" onClick="this.focus();this.select();" >'+window.J_html+'</textarea>');
    $('.J_toggle_html').html('<img src="/da/images/yulan.gif"  />');
  }else{
    $('.J_html').html(window.J_html);
    $('.J_toggle_html').html('<img src="/da/images/html.gif"  />');
  }
});
</script>
