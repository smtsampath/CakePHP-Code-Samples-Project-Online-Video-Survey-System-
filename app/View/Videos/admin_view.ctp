<?php $this->Html->script(array('/js/video.js'), array('inline' => false)); ?>

<script type="text/javascript">	
	_V_.options.flash.swf = "/files/video-js.swf";	
</script>
<div class="videos view">
<h2><?php  echo __('Video');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($video['Video']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($video['User']['email'], array('controller' => 'users', 'action' => 'view', $video['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video'); ?></dt>
		<dd>
		 	
			
			<video id="video_<?php echo $video['Video']['id']; ?>" class="video-js vjs-default-skin" 
			  		controls  preload="auto" width="650" height="330" data-setup="{}">			   
			    <source src="<?php echo $video['Video']['url']; ?>" type='video/webm' />
			    
			    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
			    <p>Your browser does not support the video tag.</p>
			  </video>		
		&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($video['Video']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			
			<?php echo substr(($video['Video']['description']), 0,150). '...'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Views'); ?></dt>
		<dd>	
			<?php echo h($video['Video']['video_views']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>	
			<?php echo h($video['Video']['target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit Value'); ?></dt>
		<dd>
			<?php echo h($video['Video']['credit_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($video['Video']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($video['Video']['end_date']); ?>
			&nbsp;
		</dd>				
		<dd>
			<?php echo h($video['Video']['length']) . 's'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('max Viewes'); ?></dt>
		<dd>
			<?php echo h($video['Video']['max_view']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $video['Video']['status']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response Time'); ?></dt>
		<dd>
			<?php echo h($video['Video']['response_time']). 's';; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon'); ?></dt>
		<dd>
			<?php echo h($video['Video']['coupon'] ? "Yes" : "No"); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($video['Video']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($video['Video']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($video['Video']['updated']); ?>
			&nbsp;
		</dd>
	</dl>

<div class="related">
	<h3><?php echo __('Related Video Feedbacks');?></h3>
	<?php if (!empty($video['VideoFeedback'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Question'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($video['VideoFeedback'] as $videoFeedback): ?>
		<tr>
			<td><?php echo $videoFeedback['id'];?></td>
			<td><?php echo $videoFeedback['question'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'video_feedbacks', 'action' => 'view', $videoFeedback['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'video_feedbacks', 'action' => 'edit', $videoFeedback['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'video_feedbacks', 'action' => 'delete', $videoFeedback['id']), null, __('Are you sure you want to delete # %s?', $videoFeedback['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Add New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add', $video['Video']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Video Filters');?></h3>
	<?php if (!empty($video['VideoFilter'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Filter Name'); ?></th>
		<th><?php echo __('Filter Value'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($video['VideoFilter'] as $videoFilter): ?>
		<tr>
			<td><?php echo $videoFilter['id'];?></td>
			<td>
			<?php echo $this->Html->link($videoFilter['Filter']['label'], array('controller' => 'filters', 'action' => 'view', $videoFilter['Filter']['id'])); ?>
			</td>
			<td><?php echo $videoFilter['value'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'video_filters', 'action' => 'view', $videoFilter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'video_filters', 'action' => 'edit', $videoFilter['id'], $video['Video']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'video_filters', 'action' => 'delete', $videoFilter['id'], $video['Video']['id']), null, __('Are you sure you want to delete # %s?', $videoFilter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Add New Video Filter'), array('controller' => 'videoFilters', 'action' => 'add', $video['Video']['id']));?> </li>
		</ul>
	</div>
</div>
	
</div>	
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video'), array('action' => 'edit', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video'), array('action' => 'delete', $video['Video']['id']), null, __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Video Filters'), array('controller' => 'video_filters', 'action' => 'index')); ?> </li>
	</ul>
</div>