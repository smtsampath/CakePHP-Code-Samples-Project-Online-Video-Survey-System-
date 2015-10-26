<div id="content">
<div class="content_inner">
<h2><?php echo 'Video Activity Report';?></h2>
<div style="width:100%;padding:5px;  background-color:#fff;" >
<table style="width:100%;  background-color:#fff; border:none;border-radius: 0px;">


	<tr valign="top" >
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">#</b></td>
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">Video title</b></td>
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">Target</b></td>
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">Credit Per View</b></td>
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">Time Period</b></td>		
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">Views</b></td>
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">Status</b></td>
	</tr>
	
	
<?php 
$x=1;
foreach ($videos as $video): 
?>
	<tr valign="top" >
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo $x .'.'; ?>&nbsp;</td>
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo $video['Video']['title']; ?>&nbsp;</td>
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo h($video['Video']['target']);  ?></td>
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo h($video['Video']['credit_value']);  ?></td>
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo '('.h($video['Video']['start_date']).')'. ' to ' . '('.h($video['Video']['end_date']).')'; ?>&nbsp;</td>
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo h($video['Video']['video_views']). ' / ' . h($video['Video']['max_view']); ?>&nbsp;</td>
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo h($video['Video']['status']);  ?></td>
		
	</tr>	
<?php $x++;
endforeach; 
?>
</table>
</div>
	<p align="right">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}')
	));
	?>	</p>

	<div align="right" class="paging" style="width:100%; border-radius: 5px;">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>	
</div>
</div>
