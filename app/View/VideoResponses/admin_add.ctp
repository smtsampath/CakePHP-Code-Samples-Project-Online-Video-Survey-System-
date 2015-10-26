<div class="videoResponses form">
<?php echo $this->Form->create('VideoResponse');?>
	<fieldset>
		<legend><?php echo __('Admin Add Video Response'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('Video Responses'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Feedback Options'), array('controller' => 'video_feedback_options', 'action' => 'index')); ?> </li>
	</ul>
</div>
