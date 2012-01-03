<?php $this->beginContent('/layouts/main'); ?>

	
	<div class="container-fluid">
	<?php if (Yii::app()->admin->name!=='Guest'):?>
	<div class="sidebar">
        <div class="well">
          <h5>管理面板</h5>
          <?php $this->widget('UserMenu'); ?>
         
        </div>
      </div>
  
     <?php endif;?> 
     
      <div class="content" style="<?php if (Yii::app()->admin->name=='Guest') echo "margin-left:0px;"; ?>">
      	<div class="hero-unit">
      	<?php echo $content; ?>
      	</div>
      </div>
	
	</div>








<?php $this->endContent(); ?>
