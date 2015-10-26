<div class="users form">
	<?php 
	    echo $this->Form->create('User', array('action' => 'admin_credits'));
	    echo $this->Form->input("email", array('label' => 'Email:'));
	    echo $this->Form->end("Search");
	?> 
</div>
<?php if(!empty($this->data)) :  ?>
<div class="users index">
	<h2><?php echo __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'Id';?></th>
			<th><?php echo 'Group';?></th>
			<th><?php echo 'Name';?></th>
			<th><?php echo 'Email';?></th>
			<th><?php echo 'Credit';?></th>
			<th><?php echo 'Is Active?';?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($result as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['fullname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['credit']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['active']? "Yes" : "No" ); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Update Credits'), array('action' => 'update_credit', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>	
</div>
<?php endif; ?>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>		
		<li><?php echo $this->Html->link(__('Users'), array('action' => 'index')); ?> </li>		
		<li><?php echo $this->Html->link(__('Credit Logs'), array('controller' => 'credit_logs', 'action' => 'index')); ?> </li>
	</ul>
</div>
