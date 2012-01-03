 
function getLoad(time){
  $.get('/da/meal/load',function(data){

  });
  setTimeout("getLoad("+time*1.5+")",time*1.5);
}



function syncData () {
  $('.update').removeClass('update').addClass('updating');
  $.get('/da/meal/load',function(data){
    if(data){
      $('.updating').removeClass('updating').addClass('update');
      alert('亲,套餐同步成功了!');
    }
  }).error(function(){
    $('.updating').removeClass('updating').addClass('update');
     alert('亲,同步失败了,请再试一次吧!'); 
  });
}  

function addToFav(){
  var url = "http://app.xindianbao.com/da/";
  var title = "大搭出手";
  if (window.sidebar) { // Firefox 
    window.sidebar.addPanel(title, url,"");
  } else if( window.external &&(!window.chrome)) { // IE 
    window.external.AddFavorite( url, title);
  } else if(window.opera) { // Opera 7+
    return false; // 
  } else { 
    alert('您的浏览器不支持点击收藏，请按快捷键Ctrl+D收藏大搭出手.');
  }
}

(function() {
  var backToTopTxt = "返回顶部"
    , backToTopEle = $('<div class="backToTop"></div>').appendTo($("body")).text(backToTopTxt).attr("title", backToTopTxt).click(function() {
      $("html, body").animate({
        scrollTop: 0
      }, "slow"); })
    , backToTopFun = function() {
       var st = $(document).scrollTop()
        , winh = $(window).height()
        ;
        (st > 0)? backToTopEle.show(): backToTopEle.hide();    
    //IE6下的定位
    if (!window.XMLHttpRequest) {
      backToTopEle.css("top", st + winh - 166);    
    }
  };
  $(window).bind("scroll", backToTopFun);
  $(function() {
    backToTopFun(); 
  });
})($);



