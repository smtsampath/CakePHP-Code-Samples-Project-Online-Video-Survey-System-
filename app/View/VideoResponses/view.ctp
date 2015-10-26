<div class="videoResponses view">
<h2><?php  echo __('Video Response');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($videoResponse['VideoResponse']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Log'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoResponse['VideoLog']['id'], array('controller' => 'video_logs', 'action' => 'view', $videoResponse['VideoLog']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Feedback'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoResponse['VideoFeedback']['id'], array('controller' => 'video_feedbacks', 'action' => 'view', $videoResponse['VideoFeedback']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Feedback Option'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoResponse['VideoFeedbackOption']['id'], array('controller' => 'video_feedback_options', 'action' => 'view', $videoResponse['VideoFeedbackOption']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video Response'), array('action' => 'edit', $videoResponse['VideoResponse']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video Response'), array('action' => 'delete', $videoResponse['VideoResponse']['id']), null, __('Are you sure you want to delete # %s?', $videoResponse['VideoResponse']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Response'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Log'), array('controller' => 'video_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedback Options'), array('controller' => 'video_feedback_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback Option'), array('controller' => 'video_feedback_options', 'action' => 'add')); ?> </li>
	</ul>
</div>
