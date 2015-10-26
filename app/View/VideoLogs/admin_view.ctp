<div class="videoLogs view">
<h2><?php  echo __('Video Log');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($videoLog['VideoLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoLog['User']['fullname'], array('controller' => 'users', 'action' => 'view', $videoLog['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoLog['Video']['title'], array('controller' => 'videos', 'action' => 'view', $videoLog['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($videoLog['VideoLog']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Form->postLink(__('Delete Video Log'), array('action' => 'delete', $videoLog['VideoLog']['id']), null, __('Are you sure you want to delete # %s?', $videoLog['VideoLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Logs'), array('action' => 'index')); ?> </li>		
		<li><?php echo $this->Html->link(__('Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Video Responses');?></h3>
	<?php if (!empty($videoLog['VideoResponse'])):?>
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
		foreach ($videoLog['VideoResponse'] as $videoResponse): ?>
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
			<li><?php //echo $this->Html->link(__('New Video Response'), array('controller' => 'video_responses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
