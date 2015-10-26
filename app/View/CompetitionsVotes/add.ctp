<div class="competitionsVotes form">
<?php echo $this->Form->create('CompetitionsVote');?>
	<fieldset>
		<legend><?php echo __('Add Competitions Vote'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('competition_id');
		echo $this->Form->input('external_id');
		echo $this->Form->input('vote_value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Competitions Votes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions'), array('controller' => 'competitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition'), array('controller' => 'competitions', 'action' => 'add')); ?> </li>
	</ul>
</div>
