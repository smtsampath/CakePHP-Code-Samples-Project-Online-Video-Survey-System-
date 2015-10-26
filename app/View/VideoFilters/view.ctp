<div class="videoFilters view">
<h2><?php  echo __('Video Filter');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($videoFilter['VideoFilter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoFilter['Video']['title'], array('controller' => 'videos', 'action' => 'view', $videoFilter['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoFilter['Filter']['id'], array('controller' => 'filters', 'action' => 'view', $videoFilter['Filter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($videoFilter['VideoFilter']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video Filter'), array('action' => 'edit', $videoFilter['VideoFilter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video Filter'), array('action' => 'delete', $videoFilter['VideoFilter']['id']), null, __('Are you sure you want to delete # %s?', $videoFilter['VideoFilter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Filter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
