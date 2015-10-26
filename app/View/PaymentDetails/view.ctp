<div class="paymentDetails view">
<h2><?php  echo __('Payment Detail');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($paymentDetail['PaymentDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($paymentDetail['User']['id'], array('controller' => 'users', 'action' => 'view', $paymentDetail['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Name'); ?></dt>
		<dd>
			<?php echo h($paymentDetail['PaymentDetail']['bank_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo h($paymentDetail['PaymentDetail']['branch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Number'); ?></dt>
		<dd>
			<?php echo h($paymentDetail['PaymentDetail']['account_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($paymentDetail['PaymentDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($paymentDetail['PaymentDetail']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payment Detail'), array('action' => 'edit', $paymentDetail['PaymentDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment Detail'), array('action' => 'delete', $paymentDetail['PaymentDetail']['id']), null, __('Are you sure you want to delete # %s?', $paymentDetail['PaymentDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
