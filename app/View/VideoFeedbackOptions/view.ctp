<div class="videoFeedbackOptions view">
<h2><?php  echo __('Video Feedback Option');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($videoFeedbackOption['VideoFeedbackOption']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Feedback'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoFeedbackOption['VideoFeedback']['id'], array('controller' => 'video_feedbacks', 'action' => 'view', $videoFeedbackOption['VideoFeedback']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Option'); ?></dt>
		<dd>
			<?php echo h($videoFeedbackOption['VideoFeedbackOption']['option']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valid'); ?></dt>
		<dd>
			<?php echo h($videoFeedbackOption['VideoFeedbackOption']['valid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video Feedback Option'), array('action' => 'edit', $videoFeedbackOption['VideoFeedbackOption']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video Feedback Option'), array('action' => 'delete', $videoFeedbackOption['VideoFeedbackOption']['id']), null, __('Are you sure you want to delete # %s?', $videoFeedbackOption['VideoFeedbackOption']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedback Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback Option'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Video Responses');?></h3>
	<?php if (!empty($videoFeedbackOption['VideoResponse'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Video Log Id'); ?></th>
		<th><?php echo __('Video Feedback Id'); ?></th>
		<th><?php echo __('Video Feedback Option Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($videoFeedbackOption['VideoResponse'] as $videoResponse): ?>
		<tr>
			<td><?php echo $videoResponse['id'];?></td>
			<td><?php echo $videoResponse['video_log_id'];?></td>
			<td><?php echo $videoResponse['video_feedback_id'];?></td>
			<td><?php echo $videoResponse['video_feedback_option_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'video_responses', 'action' => 'view', $videoResponse['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'video_responses', 'action' => 'edit', $videoResponse['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'video_responses', 'action' => 'delete', $videoResponse['id']), null, __('Are you sure you want to delete # %s?', $videoResponse['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
