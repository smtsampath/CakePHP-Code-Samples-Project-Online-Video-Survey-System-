<div class="charities view">
<h2><?php  echo __('Charity');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($charity['Charity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($charity['User']['fullname'], array('controller' => 'users', 'action' => 'view', $charity['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($charity['Charity']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($charity['Charity']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($charity['Charity']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($charity['Charity']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
		<img src = "../../../charity/<?php echo $charity['Charity']['id'];?>.jpg" height="100px" width="100px">
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Charity'), array('action' => 'edit', $charity['Charity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Charity'), array('action' => 'delete', $charity['Charity']['id']), null, __('Are you sure you want to delete # %s?', $charity['Charity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Charities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Charity'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
