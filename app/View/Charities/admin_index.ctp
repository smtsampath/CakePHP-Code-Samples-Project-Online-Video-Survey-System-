<div class="charities index">
	<h2><?php echo __('Charities');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('credits');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php $x =0;
	foreach ($charities as $charity): ?>
	<tr>
		<td><?php echo h($charity['Charity']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($charity['User']['fullname'], array('controller' => 'users', 'action' => 'view', $charity['User']['id'])); ?>
		</td>
		<td><?php echo h($charity['Charity']['title']); ?>&nbsp;</td>
		<td><?php echo h($charity['Charity']['description']); ?>&nbsp;</td>
		<td><?php echo $charity_credits[$x]; ?>&nbsp;</td>
		<td><?php echo h($charity['Charity']['updated']); ?>&nbsp;</td>
		<td><?php echo h($charity['Charity']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $charity['Charity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $charity['Charity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $charity['Charity']['id']), null, __('Are you sure you want to delete # %s?', $charity['Charity']['id'])); ?>
		</td>
	</tr>
<?php $x++;
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
		<li><?php echo $this->Html->link(__('New Charity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
