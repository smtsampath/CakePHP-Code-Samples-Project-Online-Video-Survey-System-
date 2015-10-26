<div class="filterGroups view">
<h2><?php  echo __('Filter Group');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($filterGroup['FilterGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($filterGroup['FilterGroup']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($filterGroup['FilterGroup']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Filter Group'), array('action' => 'edit', $filterGroup['FilterGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Filter Group'), array('action' => 'delete', $filterGroup['FilterGroup']['id']), null, __('Are you sure you want to delete # %s?', $filterGroup['FilterGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Filter Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Filters');?></h3>
	<?php if (!empty($filterGroup['Filter'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Key Name'); ?></th>
		<th><?php echo __('Label'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($filterGroup['Filter'] as $filter): ?>
		<tr>
			<td><?php echo $filter['id'];?></td>
			<td><?php echo $filter['key_name'];?></td>
			<td><?php echo $filter['label'];?></td>
			<td><?php echo $filter['description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'filters', 'action' => 'view', $filter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'filters', 'action' => 'edit', $filter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'filters', 'action' => 'delete', $filter['id']), null, __('Are you sure you want to delete # %s?', $filter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
