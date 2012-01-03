<?php $this->beginContent('//layouts/main'); ?>
 <div id="content">
      <div class="grid-s5m0  layout s180">
        <div class="col-main">
          <div class="main-wrap">
            <?php echo $content; ?>
          </div>
        </div>
        <div class="col-sub">
          <div class="dapei ks-clear mr">
            <ul>
              <a href="/da"><img src="/da/images/photo08.gif"></a>
			  <li><a href="/da/tpl/index">创建我的搭配(新)</a></li>
			  <li><a href="/da/dapei/index">我的搭配(新)</a></li>
              <li><a href="/da/meal/create">创建我的搭配</a></li>
              <li><a href="/da/meal/index">已创建的搭配</a></li>
              <?php if(Yii::app()->user->getState('grade')>0) {?><li><a href="/da/task/index">查看发布日志</a></li> <?php } ?>
            </ul>
            <div class="di_line"></div>
          </div>
          <div class="qwdp ks-clear">
            <span><a target="_blank" href="<?php echo Yii::app()->user->getState('shop_url')?>"></a></span>
          </div>
          <div class="wangwang">
            <a href="#none" title="点击我复制群号!">
              <img src="/da/images/wangwangqun.gif" alt="点击我复制群号!" class="J_clip_wangwang" width="84" height="46"  />
            </a>
          </div>
<?php if (!YII_DEBUG): ?>
         <div class="lxwm mr">
           <a href="#"><img src="/da/images/photo06.gif" width="89" height="36" ></a>
		   <h1><a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&uid=大搭出手&s=1" ><img border="0" src="http://amos1.taobao.com/online.ww?v=2&uid=大搭出手&s=1" alt="点击这里给我发消息" /></a> 
           </h1>
           <h1><a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&uid=%E4%BB%95%E5%AE%87%E7%BD%91%E7%BB%9C%E7%A7%91%E6%8A%80&s=1" ><img border="0" src="http://amos1.taobao.com/online.ww?v=2&uid=%E4%BB%95%E5%AE%87%E7%BD%91%E7%BB%9C%E7%A7%91%E6%8A%80&s=1" alt="点击这里给我发消息" /></a> 
           </h1>
           <h1><a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&uid=%E5%A4%A7%E6%90%AD%E5%87%BA%E6%89%8B%E6%90%AD%E6%90%AD&s=1" ><img border="0" src="http://amos1.taobao.com/online.ww?v=2&uid=%E5%A4%A7%E6%90%AD%E5%87%BA%E6%89%8B%E6%90%AD%E6%90%AD&s=1" alt="点击这里给我发消息" /></a>
           </h1>
           <h1><a target="_blank" href="http://amos1.taobao.com/msg.ww?v=2&uid=%E5%A4%A7%E6%90%AD%E5%87%BA%E6%89%8B%E5%87%BA%E5%87%BA&s=1" ><img border="0" src="http://amos1.taobao.com/online.ww?v=2&uid=%E5%A4%A7%E6%90%AD%E5%87%BA%E6%89%8B%E5%87%BA%E5%87%BA&s=1" alt="点击这里给我发消息" /></a>
           </h1>
          </div>
<?php endif; ?>
        </div>
      </div>
    </div>
<script>!window.jQuery.fn.zclip && document.write('<script src="/da/js/jquery.zclip.js"><\/script>');</script>
<script type="text/javascript" charset="utf-8">
  $(window).load(function(){
    $('.J_clip_wangwang').zclip({
      path:'/da/js/ZeroClipboard.swf',
      copy: '321973023',
        afterCopy:function(){
          alert('亲,旺旺群号已经复制到您的剪切版了,快来加入我们吧:)');
        }
    });
  });
</script>
<?php $this->endContent(); ?>

