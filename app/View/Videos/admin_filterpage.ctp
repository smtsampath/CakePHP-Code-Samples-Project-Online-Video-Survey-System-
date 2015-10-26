<div class="videos view">
<h2><?php echo h($video['Video']['title']); ?></h2>	
<table cellpadding="0" cellspacing="0">
	<?php
	$i=0; $k=0; $j=0;
	foreach ($filters as $filter): 
	
	 echo $this->Form->create('VideoFilter');
	
	$filter_id = $filter['Filter']['id'] ;?>
	<?php if($filter['Filter']['filter_groups_id']== 1  && $i==0 ) { $i=1;?>
	<tr><th colspan="3"><?php echo 'Geographic';?></th>	</tr>	

	<?php } elseif($filter['Filter']['filter_groups_id']== 2  && $k==0  ) { $k=1; ?>
	<tr><th colspan="3"><?php echo 'Demographic';?></th>	</tr>
	
	<?php } elseif($filter['Filter']['filter_groups_id']== 3 && $j==0   ) {  $j=1; ?>
	<tr><th colspan="3"><?php echo 'Hobbies';?></th>	</tr>
	
	<?php } ?>
	
	<tr>
		<td><?php echo h($filter['Filter']['label']); ?>
		<?php echo $this->Form->input('filter_id',array('type'=>'hidden', 'value' => $filter_id)); ?>
		</td>
		<td><?php echo $this->Form->input('value', array('label'=>'Value : ')); ?></td>
		<td><?php echo $this->Form->end(__('Add Filters'));?></td>
	</tr>
	
	<?php endforeach; ?>

	<tr><th colspan="2"></th></tr>
</table>
<h2>Assigned Filters</h2>
<table cellpadding="0" cellspacing="0">
<tr>
<th><?php echo 'Label';?></th>
<th><?php echo 'Description';?></th>
</tr>
	<?php
	foreach ($videofilters as $videofilter): ?>
	<tr>
		<td><?php echo h($videofilter['Filter']['label']); ?>&nbsp;</td>
		<td><?php echo h($videofilter['VideoFilter']['value']); ?>&nbsp;	</td>	
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Video'), array('action' => 'edit', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Video'), array('action' => 'delete', $video['Video']['id']), null, __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Feedbacks'), array('controller' => 'video_feedbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Feedback'), array('controller' => 'video_feedbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Log'), array('controller' => 'video_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Video Targets'), array('controller' => 'video_targets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Video Target'), array('controller' => 'video_targets', 'action' => 'add')); ?> </li>
	</ul>
</div>	
