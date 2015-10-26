<div class="paymentDetails form">
<?php echo $this->Form->create('PaymentDetail');?>
	<fieldset>
		<legend><?php echo __('Admin Add Payment Detail'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('bank_name');
		echo $this->Form->input('branch');
		echo $this->Form->input('account_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('List Payment Details'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Viewers'), array('controller' => 'viewers', 'action' => 'index')); ?> </li>
	</ul>
</div>
