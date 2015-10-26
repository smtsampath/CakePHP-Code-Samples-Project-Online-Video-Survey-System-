<div class="videos form">
<?php echo $this->Form->create('Video');?>
	<fieldset>
		<legend><?php echo __('Edit Video'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('target');
		echo $this->Form->input('credit_value');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('status');
		echo $this->Form->input('response_time_length');
		echo $this->Form->input('tags');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Video.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Video.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Log'), array('controller' => 'video_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Targets'), array('controller' => 'video_targets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Target'), array('controller' => 'video_targets', 'action' => 'add')); ?> </li>
	</ul>
</div>
