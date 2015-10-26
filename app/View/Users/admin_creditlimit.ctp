<div class="users index">
	<?php 
	    echo $this->Form->create('User', array('action' => 'admin_creditlimit'));
	    echo $this->Form->input("credit_limit", array('label' => 'Credit Limit:'));
	    echo $this->Form->end("Update");
	?> 
	<table cellpadding="0" cellspacing="0">	
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><h3><?php echo __('Current Daily Credit Limit : ');?></h3></td>		
		<td><h3><?php echo h($user['User']['credit_limit']); ?></h3></td>
		
	</tr>
<?php endforeach; ?>
	</table>	
</div>
<div class="actions">
	<h3><?php echo __('Navigation'); ?></h3>
	<ul>		
		<li><?php echo $this->Html->link(__('Users'), array('action' => 'index')); ?> </li>		
	</ul>
</div>
