<div class="videoLogs form">
<?php echo $this->Form->create('VideoLog');?>
	<fieldset>
		<legend><?php echo __('Admin Add Video Log'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('video_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Video Logs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
