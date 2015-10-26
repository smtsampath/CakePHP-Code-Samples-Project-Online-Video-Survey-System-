<div class="videoFilters form">

<?php echo $this->Form->create('VideoFilter');?>
	<fieldset>
		<legend><?php echo __('Admin Add Video Filter'); ?></legend>
	<?php
	 echo $this->Form->input('Filter.region');
	 echo $this->Form->input('Filter.city');

	$opts = array('male' => 'Male', 'female' => 'Female');
	array_unshift($opts, array('' => 'SELECT') ) ;
	echo $this->Form->input('Filter.gender', array('options'=> $opts));

	$opts = array(1 => '10,000 - 20,000', 2 => '20,001 - 30,000');
	array_unshift($opts, array('' => 'SELECT') ) ;
	echo $this->Form->input('Filter.income', array('options'=> $opts));
	
	$opts2 = array(1 => 'below 18', 2 => '18 to 25',3 => '26 to 35', 4=>'36 to 45', 5 => '46 and Above');
    array_unshift($opts2, array('' => 'SELECT') ) ;
    echo $this->Form->input('Filter.age', array('options'=> $opts2));
	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Video Filters'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
