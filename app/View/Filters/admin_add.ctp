<div class="filters form">
<?php echo $this->Form->create('Filter');?>
	<fieldset>
		<legend><?php echo __('Admin Add Filter'); ?></legend>
	<?php
	
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

		<li><?php echo $this->Html->link(__('Filters'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Video Filters'), array('controller' => 'video_filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Filter Groups'), array('controller' => 'filter_groups', 'action' => 'index')); ?> </li>
	</ul>
</div>
