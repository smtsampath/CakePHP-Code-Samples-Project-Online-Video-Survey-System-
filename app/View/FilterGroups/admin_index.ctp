<div class="filterGroups index">
	<h2><?php echo __('Filter Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('label');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($filterGroups as $filterGroup): ?>
	<tr>
		<td><?php echo h($filterGroup['FilterGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($filterGroup['FilterGroup']['label']); ?>&nbsp;</td>
		<td><?php echo h($filterGroup['FilterGroup']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $filterGroup['FilterGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $filterGroup['FilterGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $filterGroup['FilterGroup']['id']), null, __('Are you sure you want to delete # %s?', $filterGroup['FilterGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Filter Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
