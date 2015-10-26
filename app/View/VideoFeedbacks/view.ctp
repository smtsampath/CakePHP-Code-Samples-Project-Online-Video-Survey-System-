<div class="videoFeedbacks view">
<h2><?php  echo __('Video Feedback');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($videoFeedback['VideoFeedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoFeedback['Video']['title'], array('controller' => 'videos', 'action' => 'view', $videoFeedback['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo h($videoFeedback['VideoFeedback']['question']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video Feedback'), array('action' => 'edit', $videoFeedback['VideoFeedback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video Feedback'), array('action' => 'delete', $videoFeedback['VideoFeedback']['id']), null, __('Are you sure you want to delete # %s?', $videoFeedback['VideoFeedback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedback Options'), array('controller' => 'video_feedback_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback Option'), array('controller' => 'video_feedback_options', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Video Responses');?></h3>
	<?php if (!empty($videoFeedback['VideoResponse'])):?>
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
		foreach ($videoFeedback['VideoResponse'] as $videoResponse): ?>
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
<div class="related">
	<h3><?php echo __('Related Video Feedback Options');?></h3>
	<?php if (!empty($videoFeedback['VideoFeedbackOption'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Video Feedback Id'); ?></th>
		<th><?php echo __('Option'); ?></th>
		<th><?php echo __('Valid'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($videoFeedback['VideoFeedbackOption'] as $videoFeedbackOption): ?>
		<tr>
			<td><?php echo $videoFeedbackOption['id'];?></td>
			<td><?php echo $videoFeedbackOption['video_feedback_id'];?></td>
			<td><?php echo $videoFeedbackOption['option'];?></td>
			<td><?php echo $videoFeedbackOption['valid'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'video_feedback_options', 'action' => 'view', $videoFeedbackOption['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'video_feedback_options', 'action' => 'edit', $videoFeedbackOption['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'video_feedback_options', 'action' => 'delete', $videoFeedbackOption['id']), null, __('Are you sure you want to delete # %s?', $videoFeedbackOption['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Video Feedback Option'), array('controller' => 'video_feedback_options', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
