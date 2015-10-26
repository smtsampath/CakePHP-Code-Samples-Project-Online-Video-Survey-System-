<div class="menus form">
<?php echo $this->Form->create('Menu');?>
	<fieldset>
		<legend><?php echo __('Add Menu'); ?></legend>
	<?php
		echo $this->Form->input('label');
		echo $this->Form->input('url');
		echo $this->Form->input('type');
		echo $this->Form->input('priority');
		echo $this->Form->input('new_window');
		echo $this->Form->input('enabled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index'));?></li>
	</ul>
</div>
