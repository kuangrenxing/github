<script type="text/javascript" src="/da/js/json2.min.js" charset="utf-8"></script>
<?php
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerScriptFile(
    Yii::app()->getAssetManager()->publish(
        Yii::getPathOfAlias('application.modules.admin.assets.js').'/jquery.tablednd.js'
    )
);
?> 
<script type="text/javascript">
$(document).ready(function() {
    // Initialise the table
    window.list=[];
    $("#J_group_list").tableDnD({
       onDragClass: "onDrag",
            onDrop: function(table, row) {
                var rows = table.tBodies[0].rows;
                list = [];
                $('#J_submit_order').attr('disabled',true);
                for (var i=0; i<rows.length; i++) {
                var slug = rows[i].id;
                list.push({slug:slug,order:i});   
                }
                $('#J_submit_order').attr('disabled',false);
            }
    });


    $('#J_submit_order').click(function(){
      $.post('/da/admin/tpl/sort',{list:JSON.stringify(window.list)},function(data){
        alert(data);
        window.location.reload();
        });
      })
});
</script>

<table id="J_group_list" cellspacing="0" cellpadding="2">
<?php
foreach ($groupList as $group) 
{
    echo '<tr id="'.$group['group_slug'].'"><td>'.$group['order'].'</td><td>'.$group['group_name'].'</td><td>'.$group['group_slug'].'</td></tr>'; 
}
?>
</table>

<input type="button" name="submit_order" id="J_submit_order" value="保存排序" disabled />
