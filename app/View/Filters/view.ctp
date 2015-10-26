<div class="filters view">
<h2><?php  echo __('Filter');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filter Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($filter['FilterGroup']['id'], array('controller' => 'filter_groups', 'action' => 'view', $filter['FilterGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key Name'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['key_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Filter'), array('action' => 'edit', $filter['Filter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Filter'), array('action' => 'delete', $filter['Filter']['id']), null, __('Are you sure you want to delete # %s?', $filter['Filter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filter Groups'), array('controller' => 'filter_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter Group'), array('controller' => 'filter_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Filters'), array('controller' => 'video_filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Filter'), array('controller' => 'video_filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Video Filters');?></h3>
	<?php if (!empty($filter['VideoFilter'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Video Id'); ?></th>
		<th><?php echo __('Filter Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($filter['VideoFilter'] as $videoFilter): ?>
		<tr>
			<td><?php echo $videoFilter['id'];?></td>
			<td><?php echo $videoFilter['video_id'];?></td>
			<td><?php echo $videoFilter['filter_id'];?></td>
			<td><?php echo $videoFilter['value'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'video_filters', 'action' => 'view', $videoFilter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'video_filters', 'action' => 'edit', $videoFilter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'video_filters', 'action' => 'delete', $videoFilter['id']), null, __('Are you sure you want to delete # %s?', $videoFilter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Video Filter'), array('controller' => 'video_filters', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
