<div class="competitionsVotes view">
<h2><?php  echo __('Competitions Vote');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($competitionsVote['CompetitionsVote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($competitionsVote['User']['fullname'], array('controller' => 'users', 'action' => 'view', $competitionsVote['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Competition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($competitionsVote['Competition']['title'], array('controller' => 'competitions', 'action' => 'view', $competitionsVote['Competition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('External Id'); ?></dt>
		<dd>
			<?php echo h($competitionsVote['CompetitionsVote']['external_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vote Value'); ?></dt>
		<dd>
			<?php echo h($competitionsVote['CompetitionsVote']['vote_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($competitionsVote['CompetitionsVote']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Competitions Vote'), array('action' => 'edit', $competitionsVote['CompetitionsVote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Competitions Vote'), array('action' => 'delete', $competitionsVote['CompetitionsVote']['id']), null, __('Are you sure you want to delete # %s?', $competitionsVote['CompetitionsVote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions Votes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competitions Vote'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions'), array('controller' => 'competitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition'), array('controller' => 'competitions', 'action' => 'add')); ?> </li>
	</ul>
</div>
