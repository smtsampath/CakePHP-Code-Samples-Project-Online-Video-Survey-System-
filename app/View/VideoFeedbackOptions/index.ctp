<div class="videoFeedbackOptions index">
	<h2><?php echo __('Video Feedback Options');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('video_feedback_id');?></th>
			<th><?php echo $this->Paginator->sort('option');?></th>
			<th><?php echo $this->Paginator->sort('valid');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($videoFeedbackOptions as $videoFeedbackOption): ?>
	<tr>
		<td><?php echo h($videoFeedbackOption['VideoFeedbackOption']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($videoFeedbackOption['VideoFeedback']['id'], array('controller' => 'video_feedbacks', 'action' => 'view', $videoFeedbackOption['VideoFeedback']['id'])); ?>
		</td>
		<td><?php echo h($videoFeedbackOption['VideoFeedbackOption']['option']); ?>&nbsp;</td>
		<td><?php echo h($videoFeedbackOption['VideoFeedbackOption']['valid']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $videoFeedbackOption['VideoFeedbackOption']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $videoFeedbackOption['VideoFeedbackOption']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $videoFeedbackOption['VideoFeedbackOption']['id']), null, __('Are you sure you want to delete # %s?', $videoFeedbackOption['VideoFeedbackOption']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Video Feedback Option'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add')); ?> </li>
	</ul>
</div>
