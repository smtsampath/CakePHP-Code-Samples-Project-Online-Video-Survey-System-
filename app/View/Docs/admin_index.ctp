<div class="docs index">
	<h2><?php echo __('Docs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('code');?></th>
			<th><?php echo $this->Paginator->sort('enabled');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($docs as $doc): ?>
	<tr>
		<td><?php echo h($doc['Doc']['id']); ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['title']); ?>&nbsp;</td>
		<td><?php echo substr(($doc['Doc']['body']), 0,150). '...';  ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['code']); ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['enabled'])? 'Yes' : 'No'; ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['created']); ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $doc['Doc']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doc['Doc']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doc['Doc']['id']), null, __('Are you sure you want to delete # %s?', $doc['Doc']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Doc'), array('action' => 'add')); ?></li>
	</ul>
</div>
