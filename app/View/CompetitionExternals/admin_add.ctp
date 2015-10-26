<div class="competitionExternals form">
<?php echo $this->Form->create('CompetitionExternal');?>
	<fieldset>
		<legend><?php echo __('Admin Add Competition External'); ?></legend>
	<?php
		echo $this->Form->input('competition_id');
		//foreach ($videos as $video): 
			//echo $this->Form->input('external_id');

		$videolist	= array();
					
		foreach ( $videos as $key => $video) :			
		$videolist[$video['Video']['id']] = $video['Video']['title'];
								
		endforeach;
		echo $this->Form->input('external_id', 
											array('label'=>'', 'type' => 'select',
													'options'	=>	$videolist,														
											));		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Competition Externals'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Competitions'), array('controller' => 'competitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Competition'), array('controller' => 'competitions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('controller' => 'videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
