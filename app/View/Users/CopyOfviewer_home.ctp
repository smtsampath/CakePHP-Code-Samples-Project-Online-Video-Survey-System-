<div id="content">
<div class="content_inner">


<table style="width:101.5%; background-color:#333; border:solid 1px #666;border-radius: 5px;">
<tr >
<td style="text-align:left; padding-left:10px; font-size:13px;">Number of Videos watched today :</td>
<td style="text-align:left;; font-size:13px;"><b style="color:#5B9A2A;"><?php echo $vidsWatchedToday ;?></b></td>
</tr>
<tr>
<td  style="text-align:left; padding-left:10px; font-size:13px;">Total videos watched this month :</td>
<td style="text-align:left;; font-size:13px;"><b style="color:#5B9A2A;"><?php echo $vidsWatchedThisMonth ;?></b></td>
</tr>
<tr>
<td style="text-align:left; padding-left:10px; font-size:13px;">Total credits :</td>
<td style="text-align:left;; font-size:13px;"><b style="color:#328dc7;"><?php echo $totalCredits ;?></b></td>
</tr>
<?php if ($creditlimitreached): ?>
<tr>
<td colspan="2" style="text-align:left; padding-left:10px; font-size:13px;"><b style="color:#F61908;">You Have reached your credit limit</b></td>
</tr>
<?php endif; ?>
</table>




<h2><?php echo 'Available Videos';?></h2>
<table style="width:101.5%;  margin-top:5px; background-color:#fff; border:solid 1px #666; border-radius: 5px; padding-top:0px;">

	
	<tr>
	<?php
	$x=1;
	$i=0;
	foreach ($videos as $video): ?>
	<?php if($video['Video']['target'] == 'ALL') : ?>
		<?php if(($i-2)==1) : ?>
		</tr>
		<tr>
		<td colspan="3" style="text-align:right;">
			<?php echo $this->Html->link(__('More Videos...'), array('controller' => 'users', 'action' => 'all_videos')); ?> 
		</td>	
		<?php break 1; ?> 
	
		<?php endif; ?>
		
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
		<?php
	$i++;
	$x++;
		endif;?>
	<?php 
		
	?>
<?php endforeach; ?>
	</tr>
</table>


<h2><?php echo 'Videos, specially for you';?></h2>
<table style="width:101.5%;  margin-top:5px; background-color:#fff; border:solid 1px #666;border-radius: 5px;">
	
	<tr>
	<?php
	$x=1;
	$i=0;
	foreach ($custVideos as $custVideo): ?>
	<?php  if($custVideo['Video']['target'] == 'CUSTOM') : ?>
		<?php if(($i-2)==1) : ?>
		</tr>
		<tr>
		<td colspan="3" style="text-align:right;">
		<?php echo $this->Html->link(__('More Videos...'), array('controller' => 'users', 'action' => 'custom_videos')); ?> 
		
		</td>	
		<?php break 1; ?> 
	
		<?php endif; ?>
		
			<td style="text-align:left;color:#328dc7; background:url(/images/pan_bg.png) repeat-x; border-radius: 5px; border:none;" valign="top" >
						<div style="background:url(/img/box02_stripe.png) repeat-x;  border:solid 1px #888; border-radius:5px; height: 90px; " >							
							<div style="text-align:left; float:left; padding:5px; ">
								<a href="/videos/view/<?php echo $custVideo['Video']['id'];?>" >
									<img src="../../<?php echo $custVideo['Video']['thumbnail_name'];?>" width="110" height="80" style=" border-radius:5px;"/></a>
							</div>						
							<div style="text-align:right; padding:5px;">
							<?php echo $custVideo['Video']['length'] . '.00 SEC';?>	
							<br/>
							<?php echo $custVideo['Video']['video_views'] . ' views';?>
							</div>		
						</div>
						
					</td>	
		<?php
	$i++;
	$x++;
		endif;?>
	<?php 
		
	?>
<?php endforeach; ?>
	</tr>
</table>
</div>
    	</div>
