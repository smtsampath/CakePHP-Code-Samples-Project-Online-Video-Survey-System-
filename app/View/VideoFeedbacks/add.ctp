<div class="videoFeedbacks form">
<?php echo $this->Form->create('VideoFeedback');?>
	<fieldset>
		<legend><?php echo __('Add Video Feedback'); ?></legend>
	<?php
		echo $this->Form->input('video_id');
		echo $this->Form->input('question');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedback Options'), array('controller' => 'video_feedback_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback Option'), array('controller' => 'video_feedback_options', 'action' => 'add')); ?> </li>
	</ul>
</div>
