<div class="advertisers index">
	<h2><?php echo __('Advertisers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user');?></th>
			<th><?php echo $this->Paginator->sort('company_name');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('country');?></th>
			<th><?php echo $this->Paginator->sort('contact');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($advertisers as $advertiser): ?>
	<tr>
		<td><?php echo h($advertiser['Advertiser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($advertiser['User']['fullname'], array('controller' => 'users', 'action' => 'view', $advertiser['User']['id'])); ?>
		</td>
		<td><?php echo h($advertiser['Advertiser']['company_name']); ?>&nbsp;</td>
		<td><?php echo h($advertiser['Advertiser']['city']); ?>&nbsp;</td>
		<td><?php echo h($advertiser['Advertiser']['country']); ?>&nbsp;</td>
		<td><?php echo h($advertiser['Advertiser']['contact1']); ?>&nbsp;</td>
		<td><?php echo h($advertiser['Advertiser']['created']); ?>&nbsp;</td>
		<td><?php echo h($advertiser['Advertiser']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $advertiser['Advertiser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $advertiser['Advertiser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $advertiser['Advertiser']['id']), null, __('Are you sure you want to delete # %s?', $advertiser['Advertiser']['id'])); ?>
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
		<li><?php //echo $this->Html->link(__('New Advertiser'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
