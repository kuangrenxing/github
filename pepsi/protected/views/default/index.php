<div class="cjdp">
  <div class="w750">
    <div class="grid-zxtc layout">
      <div class="col-main">
        <div class="main-wrap cjdp_c w708 h70">
          <a href="/da/meal/create"><img src="/da/images/btn10.gif" /></a>
        </div>
      </div>
      <div class="col-sub cjdp_l w21 h70">
      </div>
      <div class="col-extra cjdp_r w21 h70">
      </div>
    </div>
  </div>
</div>
<div class="db_m taj ks-clear">
  <div class="db_ml">
    <div class="db_mt ">
      <img src="/da/images/photo24.gif"/>
    </div>
    <div class="db_mm mb15">
      <ul>
    <?php
    foreach($postItems['news'] as $post)
    {
        echo '<li><font>'.date('Y/m/d',$post->published).'</font><a target="_blank" href="'.$post->url.'" target="_blank">'.$post->title.'</a> </li>';
    }
    ?>
      </ul>
    </div> 
    <div class="db_mt">
      <img src="/da/images/photo22.gif" width="114" height="19" />
    </div>
    <div class="db_mm mb15">
      <ul>
    <?php
    foreach($postItems['help'] as $post)
    {
        echo '<li><a target="_blank" href="'.$post->url.'" target="_blank">'.$post->title.'</a> </li>';
    }
    ?>
      </ul>
    </div>
    
    
    <div class="db_mt ">
      <img src="/da/images/photo27.gif"/>
    </div>
    <div class="db_users">
        <ul class="spy">
          <?php
          foreach ($topActiveUsers as $user) {
		  if($user['nick']){
              echo '<li><a target="_blank" href="http://shop'.$user['sid'].'.taobao.com">'.$user['nick'].'</a><img src="/da/images/credit/'.(($user['type']=='B')?'tmall':$user['seller_credit_level']).'.gif" alt="" />创建了搭配"'.$user['name'].'"</li>';  
		  }
          }
          ?>                    
          
       </ul>
    </div>

  </div>
  <div class="db_mr">
    <span class="rdcorner5px mb10"><img src="images/photo23.gif" width="189" height="19"  class="pt20"/>
    <h3><p><?php echo $deadline?></p></h3>
      <p><img src="images/photo25.gif" width="58" height="57" class="pt10"/></p>
      <a href="http://pay.taobao.com/mysub/subarticle/re_order_app_store.htm?articleCode=ts-12230&marketType=6" target="_blank"><img src="/da/images/btn09.gif" /></a>
    </span>
    <a href="/da/price"><img src="/da/v2/images/level_up.png"/></a>
  </div>
</div>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.spy.js',CClientScript::POS_END); ?>
<script type="text/javascript" charset="utf-8">
$(function () {
  $('ul.spy').simpleSpy(5);
});
</script>

