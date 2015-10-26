<div class="creditLogs form">
<?php echo $this->Form->create('CreditLog');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Credit Log'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('external_id');
		echo $this->Form->input('type');
		echo $this->Form->input('note');
		echo $this->Form->input('credit_amount');
		echo $this->Form->input('credit_balance');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CreditLog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CreditLog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Credit Logs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
