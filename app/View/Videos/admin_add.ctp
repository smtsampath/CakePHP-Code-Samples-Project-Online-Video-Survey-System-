<?php $this->Html->script(array('/js/ckeditor/ckeditor.js'), array('inline' => false)); ?>
<div class="videos form">
<?php echo $this->Form->create('Video', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Admin Add Video'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('url' , array( 'label' => 'Video URL (Ex: "http://video-js.zencoder.com/oceans-clip.webm")'));
		//echo $this->Form->input('thumbnail_name' , array( 'type'=>'file', 'name'=>'theImage', 'after' => 'only JPG files allowed'));
		echo $this->Form->input('thumbnail_name' , array( 'label' => 'Video Thumbnail URL (Default : "/video_thumbnail/video-thumb.png")'));
		echo $this->Form->input('title');
		echo $this->Form->input('description', array('class'=>'ckeditor', array('escape' => false)));
		echo $this->Form->input('summary');
		echo $this->Form->input('target' , array('type' => 'select',
													'options' => array(
														'' => 'Select',
											            'ALL' => 'ALL',
											            'CUSTOM' => 'CUSTOM',
											        ),		
											));
		echo $this->Form->input('credit_value');
		echo $this->Form->input('start_date');	
		echo $this->Form->input('end_date');	
		echo $this->Form->input('status' , array('type' => 'select',
													'options' => array(
														'' => 'Select',
											            'QUEUED' => 'QUEUED',
											            'PUBLISHED' => 'PUBLISHED',
														'DISABLED' => 'DISABLED',
														'ARCHIVE' => 'ARCHIVE',
											        ),		
											));
		echo $this->Form->input('product_url');
		echo $this->Form->input('length');
		echo $this->Form->input('max_view');
		echo $this->Form->input('response_time');
		echo $this->Form->input('tags');
		echo $this->Form->input('image', array('type'=>'file', 'name'=>'theImage', 'after' => 'only JPG files allowed' ,'div' => array('class' => 'required')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>	
	<ul>
		<li><?php echo $this->Html->link(__('Videos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Filters'), array('controller' => 'video_filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
