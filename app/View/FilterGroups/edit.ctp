<div class="filterGroups form">
<?php echo $this->Form->create('FilterGroup');?>
	<fieldset>
		<legend><?php echo __('Edit Filter Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('label');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FilterGroup.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FilterGroup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Filter Groups'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
