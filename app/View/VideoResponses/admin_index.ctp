<div class="videoResponses index">
	<h2><?php echo __('Video Responses');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('video_log_id');?></th>
			<th><?php echo $this->Paginator->sort('video_feedback_id');?></th>
			<th><?php echo $this->Paginator->sort('video_feedback_option_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($videoResponses as $videoResponse): ?>
	<tr>
		<td><?php echo h($videoResponse['VideoResponse']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($videoResponse['VideoLog']['id'], array('controller' => 'video_logs', 'action' => 'view', $videoResponse['VideoLog']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($videoResponse['VideoFeedback']['question'], array('controller' => 'video_feedbacks', 'action' => 'view', $videoResponse['VideoFeedback']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($videoResponse['VideoFeedbackOption']['option'], array('controller' => 'video_feedback_options', 'action' => 'view', $videoResponse['VideoFeedbackOption']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $videoResponse['VideoResponse']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $videoResponse['VideoResponse']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $videoResponse['VideoResponse']['id']), null, __('Are you sure you want to delete # %s?', $videoResponse['VideoResponse']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Video Response'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Feedback Options'), array('controller' => 'video_feedback_options', 'action' => 'index')); ?> </li>
	</ul>
</div>
