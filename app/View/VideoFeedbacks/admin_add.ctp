<div class="videoFeedbacks form">
<?php echo $this->Form->create('VideoFeedback');?>
	<fieldset>
		<legend><?php echo __('Admin Add Video Feedback'); ?></legend>
	<?php
		
		echo $this->Form->input('question');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Video Feedbacks'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Feedback Options'), array('controller' => 'video_feedback_options', 'action' => 'index')); ?> </li>
	</ul>
</div>
