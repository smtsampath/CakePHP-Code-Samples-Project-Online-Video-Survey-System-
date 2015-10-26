<div class="charities form">
<?php echo $this->Form->create('Charity' , array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Admin Add Charity'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('image', array('type'=>'file', 'name'=>'theImage', 'after' => 'only JPG files allowed' ,'div' => array('class' => 'required')));
        echo $this->Form->input('description');
		
		//echo $this->Form->input('credit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Charities'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
