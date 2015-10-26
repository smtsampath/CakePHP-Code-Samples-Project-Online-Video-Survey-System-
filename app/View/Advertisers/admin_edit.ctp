<div class="advertisers form">
<?php echo $this->Form->create('Advertiser');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Advertiser'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id', array('type' => 'hidden'));
		echo $this->Form->input('company_name');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('country');
		echo $this->Form->input('contact1');
		echo $this->Form->input('contact2');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Advertiser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Advertiser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Advertisers'), array('action' => 'index'));?></li>
		
	</ul>
</div>
