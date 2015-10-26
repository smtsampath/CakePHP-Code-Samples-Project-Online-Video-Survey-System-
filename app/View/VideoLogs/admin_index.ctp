<div class="videoLogs index">
	<h2><?php echo __('Video Logs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<th>Video</th>
	<th>Unique Views</th>
	<th>Total Views</th>
	</tr>
	<?php
	$i=0;
	foreach ($videos as $video): ?>
	<tr>
	
		<td>
			<?php echo $this->Html->link($video['Video']['title'], array('controller' => 'Video', 'action' => 'view', $video['Video']['id'])); ?>
		</td>
		<td><?php echo h($uniqueCounts[$i]); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['video_views']); ?>&nbsp;</td>
		
	</tr>
<?php $i++;
endforeach; ?>
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
		<li><?php //echo $this->Html->link(__('New Video Log'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Responses'), array('controller' => 'video_responses', 'action' => 'index')); ?> </li>
	</ul>
</div>
