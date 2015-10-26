<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Admin Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('fullname');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Advertisers'), array('controller' => 'advertisers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advertiser'), array('controller' => 'advertisers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Credit Logs'), array('controller' => 'credit_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit Log'), array('controller' => 'credit_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Details'), array('controller' => 'payment_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Detail'), array('controller' => 'payment_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Viewers'), array('controller' => 'viewers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viewer'), array('controller' => 'viewers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Log'), array('controller' => 'video_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
