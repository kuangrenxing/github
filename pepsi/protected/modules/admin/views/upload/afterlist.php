<?php if (count($result)): ?>
<?php foreach ($result as $re): ?>
<?php echo $re; ?><br>
<?php endforeach; ?>
<?php else:?>
当前目录没有文件！
<?php endif; ?>
