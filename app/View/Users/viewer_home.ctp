
<?php 
$this->Html->script(array('/js/video.js'), array('inline' => false)); 
$this->Html->script(array('/js/jquery-1.7.2.min.js'), array('inline' => false)); 
$this->Html->script(array('/js/jquery-ui-1.8.22.custom.min.js'), array('inline' => false)); 
//$this->Html->script(array('/js/progressbarjs.js'), array('inline' => false)); 
?>
<link rel="stylesheet" href="../css/progressbar/jquery-ui-1.8.22.custom.css" type="text/css" media="screen" />
<script type="text/javascript"> 
    _V_.options.flash.swf = "/files/video-js.swf";  
</script>
<script>

$(function(){
	// Progressbar
	$("#progressbar").progressbar({
		value: <?php echo $bar;?>
	});

	
});
</script>
<?php  echo $this->element('earning_summery'); ?>
<div id="content">
    <div class="content_inner">
<?php if ($this->Session->read('Auth.User.id')== 36) { $real_user = true; }?>
<?php if ($real_user == true) {?>
		<?php //if ($this->Session->read('Auth.User.id') == 36) {  ?>
		<h2><?php echo 'Latest Videos';?></h2>
		<table style="width:570px;  margin-top:5px; /*background-color:#fff;*/ border:solid 0px #666; border-radius: 5px; padding-top:0px;">
			<tr>
			<?php
			$x=0;
			$i=0;
			foreach ($custVideos as $custVideo): ?>
			<?php  if($custVideo['Video']['status'] == 'PUBLISHED') { ?>
			<?php  if($custVideo['Video']['target'] == 'CUSTOM') : ?>
			<?php  if ($x>2){?>
			</tr>
			<tr>
				<td colspan="3" style="text-align:left;color:#333;border-bottom:solid 1px #ccc; background:url(/images/pan_bg.png) repeat-x; " valign="top" >
					<div style=" border:solid 0px #888; border-radius:5px; height: 80px; " >							
					     <div style="text-align:left; float:left; height: 80px; background-color:#fff; width:auto; ">
							<a href="/videos/view/<?php echo $custVideo['Video']['id'];?>" >
								<img src="../../<?php echo $custVideo['Video']['thumbnail_name'];?>" width="110" height="80" /></a>
						 </div>	
						 <span style="background-color:#333; float:left;color:#fff; width:auto;  padding:1px; margin-top:55px;margin-left:-55px;"><?php echo $custVideosTime[$i];?>	</span>
						 <div style="text-align:left;  float:left; padding-left:10px; background-color:#fff; height: 80px; width:320px; ">
							<a href="/videos/view/<?php echo $custVideo['Video']['id'];?>" ><b style="font-size:15px; color:#333;"><?php echo $custVideo['Video']['title'] ;?></b></a>
							<br/>							
							<?php echo $custVideo['Video']['video_views'] . ' views';?>
						</div>							
						<!--<div style="text-align:center;border-bottom-right-radius: 5px;border-top-right-radius: 5px;  background-color:#fff; /*background:url(/img/box02_stripe.png) repeat-x;*/ height: 80px; ">
								<div style="float:right;text-align:center;border-radius:5px; background-color:#ececec; width:100px; height: 15px; padding:5px;">Vote</div>
								<div style="float:right;text-align:center;border-radius:5px; background-color:#ececec; margin-top:2px; width:100px; height: 15px; padding:5px;">Share</div>
								<div style="float:right;text-align:center;border-radius:5px; background-color:#ececec; margin-top:2px; width:100px; height: 15px; padding:5px;">Like</div>
						</div>-->
					</div>
				</td>
			</tr>
			<?php } else {?>
				<td style="text-align:left;color:#333; border-bottom:solid 1px #ccc;background:url(/images/pan_bg.png) repeat-x; padding:0px; " valign="top" >
					<div style=" border-left:solid 1px #ccc; height: 233px; width:190px;  background-color:#fff; " >						
						<div style=" text-align:left; float:left; width:180px; ">
							<a href="/videos/view/<?php echo $custVideo['Video']['id'];?>" >
							<img src="../../<?php echo $custVideo['Video']['thumbnail_name'];?>" style=" border:solid 5px #fff;" width="180" height="130"/></a>
						</div>
						<span style="background-color:#333; float:right;color:#fff; width:auto;  padding:1px; margin-top:-35px;margin-right:10px;"><?php echo $custVideosTime[$i];?>	</span>
						<div style="border-top:solid 1px #ccc; float:left; height:80px; width:185px; padding: 5px 0 0 5px; text-align:left;">
							<a href="/videos/view/<?php echo $custVideo['Video']['id'];?>" ><b style="font-size:14px; color:#333;"><?php echo $custVideo['Video']['title'] ;?></b></a>
							<br/>
							<?php echo $custVideo['Video']['video_views'] . ' views';?>
						</div>	
					</div>		
					
					
				</td>	
			<?php  } ?>
		    <?php   $x++;
			 endif;
		     $i++;
			}
		    endforeach; ?>
		
		    <?php if($x>2) {?>
			</tr> 
			<?php } ?>
			<?php
			//$x=1;
			$i=0;
			$y=0;
			foreach ($videos as $video): ?>
			<?php if($video['Video']['target'] == 'ALL') : ?>
			<?php  if ($x>2){?>
			<tr>
				<td colspan="3" style="text-align:left;color:#333;border-bottom:solid 1px #ccc; background:url(/images/pan_bg.png) repeat-x; " valign="top" >
					<div style=" border:solid 0px #888; border-radius:5px; height: 80px; " >							
						<div style="text-align:left; float:left; height: 80px; background-color:#fff; width:auto; ">
							<a href="/videos/view/<?php echo $video['Video']['id'];?>" >
							<img src="../../<?php echo $video['Video']['thumbnail_name'];?>" width="110" height="80" /></a>
						</div>
						<span style="background-color:#333; float:left;color:#fff; width:auto;  padding:1px; margin-top:55px;margin-left:-55px;"><?php echo $vidsTime[$i];?>	</span>	
						<div style="text-align:left;  float:left; padding-left:10px; background-color:#fff; height: 80px; width:320px; ">
							<a href="/videos/view/<?php echo $video['Video']['id'];?>" ><b style="font-size:15px; color:#333;"><?php echo $video['Video']['title'] ;?></b></a>
							<br/>
							<?php echo $video['Video']['video_views'] . ' views';?>
						</div>							
						<!--<div style="text-align:center;border-bottom-right-radius: 5px;border-top-right-radius: 5px;  background-color:#fff; /*background:url(/img/box02_stripe.png) repeat-x;*/ height: 80px; ">
							<div style="float:right;text-align:center;border-radius:5px; background-color:#ececec; width:100px; height: 15px; padding:5px;">Vote</div>
							
							<div style="float:right;text-align:center;border-radius:5px; background-color:#ececec; margin-top:2px; width:100px; height: 15px; padding:5px;">Share</div>
							
							<div style="float:right;text-align:center;border-radius:5px; background-color:#ececec; margin-top:2px; width:100px; height: 15px; padding:5px;">Like</div>
						</div>-->
					</div>
				</td>	
			</tr>
							
			<?php } else { ?>
						
				<td style="text-align:left;color:#333; border-bottom:solid 1px #ccc;background:url(/images/pan_bg.png) repeat-x; padding:0px; " valign="top" >
					<div style=" border-left:solid 1px #ccc; height: 233px; width:190px;  background-color:#fff; " >						
						<div style=" text-align:left; float:left; width:180px; ">
							<a href="/videos/view/<?php echo $video['Video']['id'];?>" >
							<img src="../../<?php echo $video['Video']['thumbnail_name'];?>" style=" border:solid 5px #fff;" width="180" height="130"/></a>
						</div>
						<span style="background-color:#333; float:right;color:#fff; width:auto;  padding:1px; margin-top:-35px;margin-right:10px;"><?php echo $vidsTime[$i];?>	</span>
						<div style="border-top:solid 1px #ccc; float:left; height:80px; width:185px; padding: 5px 0 0 5px; text-align:left;">
							<a href="/videos/view/<?php echo $video['Video']['id'];?>" ><b style="font-size:14px; color:#333;"><?php echo $video['Video']['title'] ;?></b></a>
							<br/>
							<?php echo $video['Video']['video_views'] . ' views';?>
						</div>	
					</div>		
		    	</td>	
			<?php  }?>
			<?php
			   $y++;
			   $x++;
			endif;?>
			
			<?php $i++;
			 endforeach; ?>
			</tr>	
		</table>
		
  <?php } else {?>
   <div style=" width: 100%; height: 100px;  background-color: #151515; padding : 20px; border-radius: 0px;">
    <p style="text-align: center;">We hve verified your account details and your information doesn't seem to be in order.<br /> Please check account details. or <a style="color:green" href="/users/accounts">click here</a>
    <br /><br />If this doesnt solve your issue please contact us  <br />Tel: +94 11-7209676 <br />
                        Mob: +94 77-3864064 / +94 77-7741515
    </p>
    </div>
   <?php }?>
		<?php // }else{  ?>
<!--		<img src = "../images/banner02.jpg"/>-->
		<!--<center>    
			<div style="margin-top:20px">       
				<video id="video_1" class="video-js vjs-default-skin" 
					width="480" height="360"
					poster="/img/Eloeel_player_background.png"
					data-setup='{ "controls": true, "autoplay": false, "preload": "auto"}'>                
					<source src="http://mag.demo.flipit.com.lk/uploaded_videos/eloeel_intro.webm" type='video/webm' />
					<track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
					<p>Your browser does not support the video tag.</p>
				</video><br />
				<?php
//				$currentsite     =  $this->Html->url( null, true );
//				$twitter_url     =  "http://twitter.com/share?url=" . $currentsite . "&text=I found this great site at " . $currentsite;
//				$facebook_url    =  "http://www.facebook.com/sharer.php?u=" . $currentsite;
				?>
				<a href="javascript:popUp('<?php //print urlencode($facebook_url); ?>')"><img  height="20px" src="../images/facebook_icon_blue.png" alt="facebook"/></a>
				<a href="javascript:popUp('<?php //print urlencode($twitter_url); ?>')"><img  height="20px" src="../images/twitter_icon_teal.png" alt="twitter"/></a>       
			</div><br />
		</center>  
		--><?php //} ?>
		    
    
    </div>
</div>
                        
                
              