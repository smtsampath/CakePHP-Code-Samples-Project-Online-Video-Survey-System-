<div class="videoFeedbackOptions form">
<?php echo $this->Form->create('VideoFeedbackOption');?>
	<fieldset>
		<legend><?php echo __('Add Video Feedback Option'); ?></legend>
	<?php
		echo $this->Form->input('video_feedback_id');
		echo $this->Form->input('option');
		echo $this->Form->input('valid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Video Feedback Options'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
