<div class="videoFeedbackOptions form">
<?php echo $this->Form->create('VideoFeedbackOption');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Video Feedback Option'); ?></legend>
	<?php
		echo $this->Form->input('id');
		if ($videofeedback == null) {
        echo $this->Form->input('video_feedback_id');
         }
		//echo $this->Form->input('video_feedback_id');
		echo $this->Form->input('option');
		echo $this->Form->input('valid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('VideoFeedbackOption.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('VideoFeedbackOption.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Video Feedback Options'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
	</ul>
</div>
