<div class="competitions form">
<?php echo $this->Form->create('Competition');?>
	<fieldset>
		<legend><?php echo __('Edit Competition'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Competition.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Competition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Competitions'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Competition Externals'), array('controller' => 'competition_externals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition External'), array('controller' => 'competition_externals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions Votes'), array('controller' => 'competitions_votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competitions Vote'), array('controller' => 'competitions_votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
