<div class="userFilters view">
<h2><?php  echo __('User Filter');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userFilter['UserFilter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userFilter['User']['fullname'], array('controller' => 'users', 'action' => 'view', $userFilter['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userFilter['Filter']['label'], array('controller' => 'filters', 'action' => 'view', $userFilter['Filter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($userFilter['UserFilter']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Filter'), array('action' => 'edit', $userFilter['UserFilter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Filter'), array('action' => 'delete', $userFilter['UserFilter']['id']), null, __('Are you sure you want to delete # %s?', $userFilter['UserFilter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Filter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
