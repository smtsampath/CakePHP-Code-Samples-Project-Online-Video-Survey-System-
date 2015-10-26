<?php 
echo $this->Html->css('inner');
?>
<div class="content">
<div class="main">

<center><h2><?php echo h($video['Video']['title']); ?></h2></center>


<table style="width:700px; float: right;">



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


	<tr>
<th colspan="2"></th>
</tr>
</table>








<?php if (!empty($filtergroup['Filter'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('label'); ?></th>
		
	</tr>
	<?php
		$i = 0;
		foreach ($filtergroup['Filter'] as $filter): ?>
		<tr>
			<td><?php echo $filter['id'];?></td>
			<td><?php echo $filter['label'];?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<br />
<center><h2>Assigned Filters</h2></center>

	<table style="width:700px; float: right;">
	
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
	
	<div class="clear"></div>
	</div>
	</div>
	