<div class="competitionExternals view">
<h2><?php  echo __('Competition External');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($competitionExternal['CompetitionExternal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Competition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($competitionExternal['Competition']['title'], array('controller' => 'competitions', 'action' => 'view', $competitionExternal['Competition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
			<?php echo $this->Html->link($competitionExternal['Video']['title'], array('controller' => 'videos', 'action' => 'view', $competitionExternal['Video']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($competitionExternal['CompetitionExternal']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Competition External'), array('action' => 'edit', $competitionExternal['CompetitionExternal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Competition External'), array('action' => 'delete', $competitionExternal['CompetitionExternal']['id']), null, __('Are you sure you want to delete # %s?', $competitionExternal['CompetitionExternal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Competition Externals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition External'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Competitions'), array('controller' => 'competitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition'), array('controller' => 'competitions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
