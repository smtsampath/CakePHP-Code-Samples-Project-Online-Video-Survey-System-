<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
		<legend><?php echo __('Admin Add Event'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('event_date');
		echo $this->Form->input('note');
		echo $this->Form->input('enabled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index'));?></li>
	</ul>
</div>
