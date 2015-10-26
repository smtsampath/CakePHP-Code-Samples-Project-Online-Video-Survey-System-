<?php 
$this->Html->script(array('/js/video.js'), array('inline' => false)); 
$this->Html->script(array('/js/theme/jquery-1.5.1.min.js'), array('inline' => false));
$this->Html->script(array('/js/theme/lectric.js'), array('inline' => false));
$this->Html->script(array('/js/theme/jquery.cycle.all.min.js'), array('inline' => false));
$this->Html->script(array('/js/theme/slider.js'), array('inline' => false));
?>
<?php echo $this->Html->css('lectric');?>
<?php  echo $this->element('slider'); ?>	
<?php $img=1;	

?>	

<script type="text/javascript">	
	_V_.options.flash.swf = "/files/video-js.swf";	


</script>
<div id="content">
<div class="content_inner" >
			<?php echo $this->Session->flash(); ?>	
			<div style="width:950px; background-color: #333; "  >
					
				<table style="width:200px; margin-top:95px; border:solid 0px #444; border-radius:5px;float:left;  background-color: #333;  ">
				<tr>
					
					<th style="font:AvantGarde Md BT; font-size:16px ; text-align:center;   border-top-left-radius:5px; border-top-right-radius:5px;">
					<?php echo 'Latest Videos';?></th>
				</tr>			
				<tr>
				<?php
				$x=1;
				$i=0;
				foreach ($latestVids as  $latestVid) : ?>				
				<?php if(($i-3)==1) : ?>
				</tr>
				<tr>
				<td style="text-align:right; padding-top:10px; background:url(../images/pan_bg.png) repeat-x; height:13px;">
					<a href="/videos/list_video/" >
						<img src="../images/morevideos.png" />
					</a>					
				</td>	
				</tr>
				<tr>
				<td style="background:url(../images/eloeel_pan_bot_02.png) repeat-x; border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
										
				</td>	
				</tr>
				<?php break 1; ?> 
				
				<?php endif; ?>
				<tr>
					<td style="text-align:left;color:#328dc7; background:url(../images/pan_bg.png) repeat-x; border:none;" valign="top" >
						<div style="background:url(../images/box02.png);  border:solid 1px #888; border-radius:5px; height: 90px; " >							
							<div style="text-align:left; float:left; padding:5px; ">
								<a href="/videos/archive_view/<?php echo $latestVid['Video']['id'];?>" >
									<img src="..<?php echo $latestVid['Video']['thumbnail_name'];?>" width="110" height="80" style=" border-radius:5px;"/></a>
							</div>						
							<div style="text-align:right; padding:5px;">
							<?php echo $latestVid['Video']['length'] . '.00 SEC';?>	
							</div>		
						</div>
						
						
						
						
					</td>	
					</tr>	
				<?php
				$i++;
				$x++;?>
			
				<?php endforeach; ?>
				
				</table>
				
				<div align="center" style="float:left; margin-left:25px; height:auto; border-radius:5px; width:500px; border:solid 0px #444; "  >
				<div><img src="/images/eloeel_home.png" /></div>	
				<div style="float:left; height:auto;  padding-top: 20px;border-radius:5px; width:500px; border:solid 1px #7ea910; ">
						<div>		
						  <video id="video_1" class="video-js vjs-default-skin" 
						  		width="480" height="250"
						  		
						  		data-setup='{ "controls": true, "autoplay": false, "preload": "auto"}'>				   
						    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
						    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
						    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
						    <p>Your browser does not support the video tag.</p>
						  </video>
						 </div><br />
						 <div>
				
				</div>
				</div>
						
				
				</div>
								
		<table style="width:200px; margin-top:95px; border:solid 0px #444; border-radius:5px;float:right;  background-color: #333;  ">
				<tr>
					
					<th style="font:AvantGarde Md BT; font-size:16px ; text-align:center;   border-top-left-radius:5px; border-top-right-radius:5px;">
					<?php echo 'Most Viewed';?></th>
				</tr>	 		
				<tr>
				<?php
				$x=1;
				$i=0;
				foreach ($mostViewedVids as $mostViewedVid): ?>		
				<?php if(($i-3)==1) : ?>
				</tr>
				<tr>
				<td style="text-align:right; padding-top:10px; background:url(../images/pan_bg.png) repeat-x; height:13px;">
					<a href="/videos/list_video/" >
						<img src="../images/morevideos.png" />
					</a>					
				</td>	
				</tr>
				<tr>
				<td style="background:url(../images/eloeel_pan_bot_02.png) repeat-x; border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
										
				</td>	
				</tr>
				<?php break 1; ?> 
				
				<?php endif; ?>
				<tr>
					<td style="text-align:left;color:#328dc7; background:url(../images/pan_bg.png) repeat-x; border:none;" valign="top" >
						<div style="background:url(../images/box02.png);  border:solid 1px #888; border-radius:5px; height: 90px; " >							
							<div style="text-align:left; float:left; padding:5px; ">
								<a href="/videos/archive_view/<?php echo $mostViewedVid['Video']['id'];?>" >
									<img src="..<?php echo $mostViewedVid['Video']['thumbnail_name'];?>" width="110" height="80" style=" border-radius:5px;"/></a>
							</div>						
							<div style="text-align:right; padding:5px;">
							<?php echo $mostViewedVid['Video']['length'] . '.00 SEC';?>	
							<br/>
							<?php echo $mostViewedVid['Video']['video_views'] . ' views';?>
							</div>		
						</div>
						
					</td>	
					</tr>	
				<?php
				$i++;
				$x++;?>
			
				<?php endforeach; ?>
				
				</table>
						
				
			
		</div>
</div>
</div>