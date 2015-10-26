<div class="competitions view">
<h2><?php  echo __('Competition');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($competition['Competition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($competition['Competition']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($competition['Competition']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($competition['Competition']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Competition'), array('action' => 'edit', $competition['Competition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Competition'), array('action' => 'delete', $competition['Competition']['id']), null, __('Are you sure you want to delete # %s?', $competition['Competition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competition Externals'), array('controller' => 'competition_externals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition External'), array('controller' => 'competition_externals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions Votes'), array('controller' => 'competitions_votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competitions Vote'), array('controller' => 'competitions_votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Competition Externals');?></h3>
	<?php if (!empty($competition['CompetitionExternal'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Competition Id'); ?></th>
		<th><?php echo __('External Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($competition['CompetitionExternal'] as $competitionExternal): ?>
		<tr>
			<td><?php echo $competitionExternal['id'];?></td>
			<td><?php echo $competitionExternal['competition_id'];?></td>
			<td><?php echo $competitionExternal['external_id'];?></td>
			<td><?php echo $competitionExternal['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'competition_externals', 'action' => 'view', $competitionExternal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'competition_externals', 'action' => 'edit', $competitionExternal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'competition_externals', 'action' => 'delete', $competitionExternal['id']), null, __('Are you sure you want to delete # %s?', $competitionExternal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Competition External'), array('controller' => 'competition_externals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Competitions Votes');?></h3>
	<?php if (!empty($competition['CompetitionsVote'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Competition Id'); ?></th>
		<th><?php echo __('External Id'); ?></th>
		<th><?php echo __('Vote Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($competition['CompetitionsVote'] as $competitionsVote): ?>
		<tr>
			<td><?php echo $competitionsVote['id'];?></td>
			<td><?php echo $competitionsVote['user_id'];?></td>
			<td><?php echo $competitionsVote['competition_id'];?></td>
			<td><?php echo $competitionsVote['external_id'];?></td>
			<td><?php echo $competitionsVote['vote_value'];?></td>
			<td><?php echo $competitionsVote['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'competitions_votes', 'action' => 'view', $competitionsVote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'competitions_votes', 'action' => 'edit', $competitionsVote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'competitions_votes', 'action' => 'delete', $competitionsVote['id']), null, __('Are you sure you want to delete # %s?', $competitionsVote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Competitions Vote'), array('controller' => 'competitions_votes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
