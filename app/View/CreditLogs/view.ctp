<div class="creditLogs view">
<h2><?php  echo __('Credit Log');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($creditLog['CreditLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($creditLog['User']['id'], array('controller' => 'users', 'action' => 'view', $creditLog['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('External Id'); ?></dt>
		<dd>
			<?php echo h($creditLog['CreditLog']['external_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($creditLog['CreditLog']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($creditLog['CreditLog']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit Amount'); ?></dt>
		<dd>
			<?php echo h($creditLog['CreditLog']['credit_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($creditLog['CreditLog']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($creditLog['CreditLog']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Credit Log'), array('action' => 'edit', $creditLog['CreditLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Credit Log'), array('action' => 'delete', $creditLog['CreditLog']['id']), null, __('Are you sure you want to delete # %s?', $creditLog['CreditLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Credit Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
