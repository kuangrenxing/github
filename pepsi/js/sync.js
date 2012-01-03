if (!Sync) var Sync = {};

Sync.init = function(){
  var self = this;
  window.template = 1;
  window.meal = 2704653;
    //同步
    $('body').delegate('.J_sync','click',function(){
      self.start();
    })
    .delegate('.J_sync_clean','click',function(){
      self.start('clean');
    }); 
}

Sync.start = function(clean){
  var self = this;
  $.get('/da/sync/sync',function(data){
    window.itemList = data; 
    if(typeof clean !== 'undefined'){
      window.clean=true; 
    }
    self.syncThread();
  },'json');
}

Sync.syncThread = function(){
  var item = window.itemList.shift()
    , self = this
    , dataToSync = {item: item,template:window.template,meal:window.meal}
    ;
  if(typeof window.clean !== 'undefined'){
    dataToSync.clean = true;
  }
  if(typeof item!=="undefined"){
    $.ajax({
      type: "GET",
      url: "/da/sync/syncThread",
      data: dataToSync,
      async: true, 
      cache: false,
      dataType: 'json',
      timeout:20000, 
      success: function(data){ 
        self.showMsg('success',data); 
        if (!data.done) {
          setTimeout("Sync.syncThread()", 1000 );
        } else {
          alert('亲,全部同步成功!');
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        self.showMsg('error',item); 
        window.itemList.push(item);
         setTimeout( "Sync.syncThread()", 3000); 
      },
    });
  }
}

Sync.showMsg = function(type,item){
  console.log(item);
  $(".J_sync_msg").html(
    "<div class='msg "+ type +"'>正在导入" + ": " + item.title + " " + item.num_iid + "</div>"
  );

}
