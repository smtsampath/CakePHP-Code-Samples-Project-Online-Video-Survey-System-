<div id="content">
<div class="content_inner">

<h2><?php echo 'Video Archive';?></h2>
<table style="width:100%; margin-top:5px;  background-color:#fff; border:solid 1px #666;border-radius: 5px;">
		
	<tr>
	<?php
		$x=1;
		$i=0;
		foreach ($videos as $video): 
		if(($i%3)==0) :
	?>
	</tr><tr>
	<?php endif;
	
		if($video['Video']['target'] == 'CUSTOM') :
	
	?>	
		
			<td style="text-align:left;color:#328dc7; background:url(/images/pan_bg.png) repeat-x; border-radius: 5px; border:none;" valign="top" >
						<div style="background:url(/img/box02_stripe.png) repeat-x;  border:solid 1px #888; border-radius:5px; height: 90px; " >							
							<div style="text-align:left; float:left; padding:5px; ">
								<a href="/videos/view/<?php echo $video['Video']['id'];?>" >
									<img src="../../<?php echo $video['Video']['thumbnail_name'];?>" width="110" height="80" style=" border-radius:5px;"/></a>
							</div>						
							<div style="text-align:right; padding:5px;">
							<?php echo $video['Video']['length'] . '.00 SEC';?>	
							<br/>
							<?php echo $video['Video']['video_views'] . ' views';?>
							</div>		
						</div>
						
					</td>	
		
		
	<?php endif; 
	
			$i++; 
			$x++; 
	?>
	<?php endforeach; ?>		
	</tr>
</table>
	<div class="paging" style="width:101%; ;border-radius: 5px;">
	<?php
			echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}')
			));
	?>	
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>