
<div class="videoFilters index">
	<h2><?php echo __('Video Filters');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('video_id');?></th>
			<th><?php echo $this->Paginator->sort('filter_id');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($videoFilters as $videoFilter): ?>
	<tr>
		<td><?php echo h($videoFilter['VideoFilter']['id']); ?>&nbsp;</td>
		<td><img src="..<?php echo $videoFilter['Video']['thumbnail_name'];?>" width="92" height="64" /></td>
		<td>
			<?php echo $this->Html->link($videoFilter['Filter']['label'], array('controller' => 'filters', 'action' => 'view', $videoFilter['Filter']['id'])); ?>
		</td>
		<td><?php echo h($videoFilter['VideoFilter']['value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $videoFilter['VideoFilter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $videoFilter['VideoFilter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $videoFilter['VideoFilter']['id']), null, __('Are you sure you want to delete # %s?', $videoFilter['VideoFilter']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Video Filter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
