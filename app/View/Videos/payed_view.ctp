
<?php 
echo $this->Html->css('inner');
?>
<div class="content">
<div class="main">

<center><h2><?php echo h($video['Video']['title']); ?></h2></center>
<table style="width:700px; float: right;">
<tr>
<th>ID</th>
<th>Title</th>
</tr>
<tr>
<td><?php echo h($video['Video']['id']); ?></td>
<td><?php echo h($video['Video']['title']); ?></td>
</tr>

</table>

<table style="width:700px; float: right;">
<?php echo $this->Form->create('VideoFilter');?>
<tr>
<th colspan="2"><?php echo h($videofeedback['VideoFeedback']['question']); ?></th>

</tr>
<?php
	foreach ($videofeedbackoptions as $videofeedbackoption): ?>
<tr>
<td><?php echo h($videofeedbackoption['VideoFeedbackOption']['option']); ?></td>
<td><?php echo $this->Form->input('valid');?></td>
</tr>
<?php endforeach; ?>
<tr>
<td colspan="2"><?php echo $this->Form->end(__('Add'));?></td>
</tr>
</table>
	

	
<div class="clear"></div>
</div>
</div>
	