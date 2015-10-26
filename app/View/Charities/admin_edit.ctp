<div class="charities form">
<?php echo $this->Form->create('Charity' , array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Admin Edit Charity'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('image', array('type'=>'file', 'name'=>'theImage', 'after' => 'only JPG files allowed' ,'div' => array('class' => 'required')));
        
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Charities'), array('action' => 'index'));?></li>
	</ul>
</div>
