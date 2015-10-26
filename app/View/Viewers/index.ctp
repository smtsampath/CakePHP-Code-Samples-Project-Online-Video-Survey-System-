<div class="viewers index">
	<h2><?php echo __('Viewers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('dob');?></th>
			<th><?php echo $this->Paginator->sort('gender');?></th>
			<th><?php echo $this->Paginator->sort('address1');?></th>
			<th><?php echo $this->Paginator->sort('address2');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('district');?></th>
			<th><?php echo $this->Paginator->sort('province');?></th>
			<th><?php echo $this->Paginator->sort('country');?></th>
			<th><?php echo $this->Paginator->sort('contact1');?></th>
			<th><?php echo $this->Paginator->sort('contact2');?></th>
			<th><?php echo $this->Paginator->sort('education');?></th>
			<th><?php echo $this->Paginator->sort('relationship_status');?></th>
			<th><?php echo $this->Paginator->sort('num_of_kids');?></th>
			<th><?php echo $this->Paginator->sort('employment');?></th>
			<th><?php echo $this->Paginator->sort('career');?></th>
			<th><?php echo $this->Paginator->sort('monthly_income');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($viewers as $viewer): ?>
	<tr>
		<td><?php echo h($viewer['Viewer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($viewer['User']['fullname'], array('controller' => 'users', 'action' => 'view', $viewer['User']['id'])); ?>
		</td>
		<td><?php echo h($viewer['Viewer']['dob']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['gender']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['address1']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['address2']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['city']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['district']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['province']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['country']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['contact1']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['contact2']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['education']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['relationship_status']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['num_of_kids']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['employment']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['career']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['monthly_income']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['created']); ?>&nbsp;</td>
		<td><?php echo h($viewer['Viewer']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $viewer['Viewer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $viewer['Viewer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $viewer['Viewer']['id']), null, __('Are you sure you want to delete # %s?', $viewer['Viewer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Viewer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
