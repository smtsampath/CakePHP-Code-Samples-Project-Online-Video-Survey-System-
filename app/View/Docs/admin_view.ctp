<div class="docs view">
<h2><?php  echo __('Doc');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doc['Doc']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($doc['Doc']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo $doc['Doc']['body']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($doc['Doc']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enabled'); ?></dt>
		<dd>
			<?php echo h($doc['Doc']['enabled'])? 'Yes':'No'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($doc['Doc']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($doc['Doc']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doc'), array('action' => 'edit', $doc['Doc']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doc'), array('action' => 'delete', $doc['Doc']['id']), null, __('Are you sure you want to delete # %s?', $doc['Doc']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Docs'), array('action' => 'index')); ?> </li>
	</ul>
</div>
