<div class="filters index">
	<h2><?php echo __('Filters');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('filter_groups_id');?></th>
			<th><?php echo $this->Paginator->sort('key_name');?></th>
			<th><?php echo $this->Paginator->sort('label');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($filters as $filter): ?>
	<tr>
		<td><?php echo h($filter['Filter']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($filter['FilterGroup']['id'], array('controller' => 'filter_groups', 'action' => 'view', $filter['FilterGroup']['id'])); ?>
		</td>
		<td><?php echo h($filter['Filter']['key_name']); ?>&nbsp;</td>
		<td><?php echo h($filter['Filter']['label']); ?>&nbsp;</td>
		<td><?php echo h($filter['Filter']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $filter['Filter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $filter['Filter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $filter['Filter']['id']), null, __('Are you sure you want to delete # %s?', $filter['Filter']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Filter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Filter Groups'), array('controller' => 'filter_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter Group'), array('controller' => 'filter_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Filters'), array('controller' => 'video_filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Filter'), array('controller' => 'video_filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
