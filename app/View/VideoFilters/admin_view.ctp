<?php $this->Html->script(array('/js/video.js'), array('inline' => false)); ?>

<script type="text/javascript">	
	_V_.options.flash.swf = "/files/video-js.swf";	
</script>
<div class="videoFilters view">
<h2><?php  echo __('Video Filter');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($videoFilter['VideoFilter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
		 	<video id="video_<?php echo $videoFilter['Video']['id']; ?>" class="video-js vjs-default-skin" 
			  		controls  preload="auto" width="645" height="270">			   
			    <source src="<?php echo $videoFilter['Video']['url']; ?>" type='video/webm' />
			    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
			    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
			    <p>Your browser does not support the video tag.</p>
			</video>		
		&nbsp;
		</dd>
		<dt><?php echo __('Filter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($videoFilter['Filter']['label'], array('controller' => 'filters', 'action' => 'view', $videoFilter['Filter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($videoFilter['VideoFilter']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video Filter'), array('action' => 'edit', $videoFilter['VideoFilter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video Filter'), array('action' => 'delete', $videoFilter['VideoFilter']['id']), null, __('Are you sure you want to delete # %s?', $videoFilter['VideoFilter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Video Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
	</ul>
</div>
