<div class="competitions index">
	<h2><?php echo __('Competitions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($competitions as $competition): ?>
	<tr>
		<td><?php echo h($competition['Competition']['id']); ?>&nbsp;</td>
		<td><?php echo h($competition['Competition']['title']); ?>&nbsp;</td>
		<td><?php echo h($competition['Competition']['description']); ?>&nbsp;</td>
		<td><?php echo h($competition['Competition']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $competition['Competition']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $competition['Competition']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $competition['Competition']['id']), null, __('Are you sure you want to delete # %s?', $competition['Competition']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Competition'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Competition Externals'), array('controller' => 'competition_externals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition External'), array('controller' => 'competition_externals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions Votes'), array('controller' => 'competitions_votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competitions Vote'), array('controller' => 'competitions_votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
