<?php $this->Html->script(array('/js/ckeditor/ckeditor.js'), array('inline' => false)); ?>
<div class="docs form">
<?php echo $this->Form->create('Doc');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Doc'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body', array('class'=>'ckeditor', array('escape' => false)));
		echo $this->Form->input('code');
		echo $this->Form->input('enabled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Doc.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Doc.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Docs'), array('action' => 'index'));?></li>
	</ul>
</div>
