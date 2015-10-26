<div class="paymentDetails form">
<?php echo $this->Form->create('PaymentDetail');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Payment Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id', array('type' => 'hidden'));
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PaymentDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PaymentDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Payment Details'), array('action' => 'index'));?></li>
		
	</ul>
</div>
