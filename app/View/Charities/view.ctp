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
	</dl>
</div>
<img src = "../../charity/<?php echo $charity['Charity']['id'];?>.jpg">
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Charities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Charity'), array('action' => 'add')); ?> </li>
	</ul>
</div>
