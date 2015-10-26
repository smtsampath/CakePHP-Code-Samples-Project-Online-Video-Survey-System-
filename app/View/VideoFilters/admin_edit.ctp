<div class="videoFilters form">
<?php echo $this->Form->create('VideoFilter');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Video Filter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('video_id');
		//echo $this->Form->input('filter_id');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('VideoFilter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('VideoFilter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Video Filters'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
