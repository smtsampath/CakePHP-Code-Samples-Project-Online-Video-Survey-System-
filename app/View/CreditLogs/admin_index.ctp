<div class="creditLogs index">
	<h2><?php echo __('Credit Logs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('external_id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th><?php echo $this->Paginator->sort('credit_amount');?></th>
			<th><?php echo $this->Paginator->sort('credit_balance');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($creditLogs as $creditLog): ?>
	<tr>
		<td><?php echo h($creditLog['CreditLog']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($creditLog['User']['email'], array('controller' => 'users', 'action' => 'view', $creditLog['User']['id'])); ?>
		</td>
		<td><?php echo h($creditLog['CreditLog']['external_id']); ?>&nbsp;</td>
		<td><?php echo h($creditLog['CreditLog']['type']); ?>&nbsp;</td>
		<td><?php echo h($creditLog['CreditLog']['note']); ?>&nbsp;</td>
		<td><?php echo h($creditLog['CreditLog']['credit_amount']); ?>&nbsp;</td>
		<td><?php echo h($creditLog['CreditLog']['credit_balance']); ?>&nbsp;</td>
		<td><?php echo h($creditLog['CreditLog']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $creditLog['CreditLog']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $creditLog['CreditLog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $creditLog['CreditLog']['id']), null, __('Are you sure you want to delete # %s?', $creditLog['CreditLog']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Update Credit'), array('controller' => 'users', 'action' => 'credits')); ?> </li>
	</ul>
</div>
