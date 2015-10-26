<div class="filters view">
<h2><?php  echo __('Filter');?></h2>
	<dl>
		<dt><?php echo __('Filter  Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($filter['FilterGroup']['label'], array('controller' => 'filter_groups', 'action' => 'view', $filter['FilterGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Filter Groups'), array('controller' => 'filter_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Filters'), array('controller' => 'video_filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
