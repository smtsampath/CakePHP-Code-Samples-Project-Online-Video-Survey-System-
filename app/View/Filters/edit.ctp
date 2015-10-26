<div class="filters form">
<?php echo $this->Form->create('Filter');?>
	<fieldset>
		<legend><?php echo __('Edit Filter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('filter_groups_id');
		echo $this->Form->input('key_name');
		echo $this->Form->input('label');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Filter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Filter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Filters'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Filter Groups'), array('controller' => 'filter_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter Group'), array('controller' => 'filter_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Filters'), array('controller' => 'video_filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Filter'), array('controller' => 'video_filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
