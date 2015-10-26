<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Update User Credit Value'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('credit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Update'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
			
		<li><?php echo $this->Html->link(__('Users'), array('action' => 'index'));?></li>		
	</ul>
</div>
