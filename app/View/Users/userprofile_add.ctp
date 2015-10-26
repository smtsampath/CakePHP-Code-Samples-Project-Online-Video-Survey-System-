<div class="viewers form">
<?php echo $this->Form->create('Viewer');?>
	<fieldset>
		<legend><?php echo __('Add Viewer'); ?></legend>
	<?php
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('nic');
		echo $this->Form->input('dob');
		echo $this->Form->input('gender');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('province');
		echo $this->Form->input('city');
		
		echo $this->Form->input('contact1');
		echo $this->Form->input('contact2');
		echo $this->Form->input('User.enabled', array( 'value' => '1'  , 'type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
