<div id="summery" style="width:212px; margin-left:-212px;float:left; margin-top:220px">
<table style="width:100%; border:solid 1px #5B9A2A; border-radius:5px;">
        <tr>
		<th colspan="2" style="text-align:left; text-align:center;  background-color:#000;  border-top-left-radius:5px; border-top-right-radius:5px; padding-left:5px; font-size:13px;">
					Campaign Summery</th>
		</tr>
		 <tr>
		<td style="text-align:left; padding-left:5px;  font-size:13px;">&nbsp;</td>
		<td style="text-align:left;; font-size:13px;">&nbsp;</td>
		</tr>
        <tr>
		<td style="text-align:left; padding-left:5px;  font-size:13px;">Number of Videos :</td>
		<td style="text-align:left;; font-size:13px;"><b style="color:#5B9A2A;"><?php echo $numOfVideos ;?></b></td>
		</tr>
		 <tr>
		<td style="text-align:left; padding-left:5px;  font-size:13px;">&nbsp;</td>
		<td style="text-align:left;; font-size:13px;">&nbsp;</td>
		</tr>		
		</table>
</div> 
<div id="content">
<div class="content_inner">
<h2><?php echo 'Your Videos';?></h2>
<table style="width:100%; margin-top:5px;  background-color:#151515; border:solid 0px #666; border-radius: 0px;">
	
	
	
	<tr>
	<?php
		$x=1;
		$i=0;
		foreach ($videos as $video): 
		if(($i%3)==0) :
	?>
	</tr><tr>
	<?php endif;?>	
		<td style="text-align:left;color:#328dc7; background-color:#151515; border:none;" valign="top" >
						<div style=" border:solid 1px #ccc; width:240px; height: 80px; " >							
							<div style="text-align:left; float:left;padding-left:5px; height: 80px; width:110px; background-color:#efefef; width:auto; ">
								<a href="/videos/archive_view/<?php echo $video['Video']['id'];?>" >
									<img src="../../<?php echo $video['Video']['thumbnail_name'];?>" width="110" height="80" /></a>
							</div>
							<span style="background-color:#333; float:left;color:#fff; width:auto;  padding:1px; margin-top:55px;margin-left:-55px;"><?php echo $vidsTime[$i];?>	</span>	
							<div style="text-align:left;  float:left; padding-left:10px; background-color:#efefef; height: 80px; width:115px; ">
							<a href="/videos/archive_view/<?php echo $video['Video']['id'];?>" ><b style="font-size:11px; color:#333;"><?php echo substr($video['Video']['title'], 0, 20) . '...' ;?></b></a>
							<br/>
							<b style="font-size:11px; color:#333;"><?php echo $video['Video']['video_views'] . ' / ' . $video['Video']['max_view'] . ' views' ;?></b>
							
							
							
							
							</div>
						</div>
					</td>	
					
		
		
	<?php  	$i++;
			$x++;  ?>
	<?php endforeach; ?>		
	</tr>
	
</table>
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
