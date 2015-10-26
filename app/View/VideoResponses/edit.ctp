<div class="videoResponses form">
<?php echo $this->Form->create('VideoResponse');?>
	<fieldset>
		<legend><?php echo __('Edit Video Response'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('video_log_id');
		echo $this->Form->input('video_feedback_id');
		echo $this->Form->input('video_feedback_option_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('VideoResponse.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('VideoResponse.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Log'), array('controller' => 'video_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedback Options'), array('controller' => 'video_feedback_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback Option'), array('controller' => 'video_feedback_options', 'action' => 'add')); ?> </li>
	</ul>
</div>
