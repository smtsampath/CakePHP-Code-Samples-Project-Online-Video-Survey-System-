<div class="competitionsVotes index">
	<h2><?php echo __('Competitions Votes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('competition_id');?></th>
			<th><?php echo $this->Paginator->sort('external_id');?></th>
			<th><?php echo $this->Paginator->sort('vote_value');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($competitionsVotes as $competitionsVote): ?>
	<tr>
		<td><?php echo h($competitionsVote['CompetitionsVote']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($competitionsVote['User']['fullname'], array('controller' => 'users', 'action' => 'view', $competitionsVote['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($competitionsVote['Competition']['title'], array('controller' => 'competitions', 'action' => 'view', $competitionsVote['Competition']['id'])); ?>
		</td>
		<td><?php echo h($competitionsVote['CompetitionsVote']['external_id']); ?>&nbsp;</td>
		<td><?php echo h($competitionsVote['CompetitionsVote']['vote_value']); ?>&nbsp;</td>
		<td><?php echo h($competitionsVote['CompetitionsVote']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $competitionsVote['CompetitionsVote']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $competitionsVote['CompetitionsVote']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $competitionsVote['CompetitionsVote']['id']), null, __('Are you sure you want to delete # %s?', $competitionsVote['CompetitionsVote']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Competitions Vote'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions'), array('controller' => 'competitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition'), array('controller' => 'competitions', 'action' => 'add')); ?> </li>
	</ul>
</div>
