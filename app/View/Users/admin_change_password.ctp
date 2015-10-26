<div class="users view">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Change Passowrd'); ?></legend>
    <?php
    	
        //echo $this->Form->input('id');
    	echo $this->Form->input('old_password', array('label' => 'Current password', 'type' => 'password'));
        echo $this->Form->input('new_password', array('label' => 'New password', 'type' => 'password'));
		echo $this->Form->input('confirm_password', array('label' => 'Confirm password', 'type' => 'password'));   	       
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Change', true));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Admin Profile'), array('action' => 'profile', $this->Session->read('Auth.User.id'))); ?> </li>
		<li><?php echo $this->Html->link(__('Users'), array('action' => 'index')); ?></li>				
	</ul>
</div>
