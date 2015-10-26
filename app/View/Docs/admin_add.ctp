<?php $this->Html->script(array('/js/ckeditor/ckeditor.js'), array('inline' => false)); ?>
<div class="docs form">
<?php echo $this->Form->create('Doc');?>
	<fieldset>
		<legend><?php echo __('Admin Add Doc'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Docs'), array('action' => 'index'));?></li>
	</ul>
</div>
