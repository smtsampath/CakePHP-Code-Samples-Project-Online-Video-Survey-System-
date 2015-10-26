<?php 
$this->Html->script(array('/js/video.js'), array('inline' => false)); 
$this->Html->script(array('/js/theme/jquery-1.5.1.min.js'), array('inline' => false));
$this->Html->script(array('/js/theme/lectric.js'), array('inline' => false));
$this->Html->script(array('/js/theme/jquery.cycle.all.min.js'), array('inline' => false));
$this->Html->script(array('/js/theme/slider.js'), array('inline' => false));
?>
<?php echo $this->Html->css('lectric');?>
<?php echo $this->element('slider'); ?>	
<?php $img=1;	

?>	
<?php
 $browser = array(
    'version'   => '0.0.0',
    'majorver'  => 0,
    'minorver'  => 0,
    'build'     => 0,
    'name'      => 'unknown',
    'useragent' => ''
  );

  $browsers = array(
    'firefox', 'msie', 'opera', 'chrome', 'safari', 'mozilla', 'seamonkey', 'konqueror', 'netscape',
    'gecko', 'navigator', 'mosaic', 'lynx', 'amaya', 'omniweb', 'avant', 'camino', 'flock', 'aol'
  );

  if (isset($_SERVER['HTTP_USER_AGENT'])) {
    $browser['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $user_agent = strtolower($browser['useragent']);
    foreach($browsers as $_browser) {
      if (preg_match("/($_browser)[\/ ]?([0-9.]*)/", $user_agent, $match)) {
        $browser['name'] = $match[1];
        $browser['version'] = $match[2];
        @list($browser['majorver'], $browser['minorver'], $browser['build']) = explode('.', $browser['version']);
        break;
      }
    }
  }
 //print_r($browser['name']);
 if ($browser['name'] == 'firefox' || $browser['name'] == 'chrome'){ } else {?>
  <div style="width:70%;   margin-top:20px; border-radius:5px; padding: 5px ">
 <p style="font-size: 17px">This website is best viewed on <a style="font-size: 17px" href="http://www.mozilla.org/en-US/firefox/new/" target="_blank">Mozilla Firefox</a>
  <a href="http://www.mozilla.org/en-US/firefox/new/" target="_blank"><img style="margin-bottom:-8px"  width="30px" height="30px" src="../images/mozilla_firefox.png"></a> or <a style="font-size: 17px" href="https://www.google.com/intl/en/chrome/browser/" target="_blank">Google Chrome </a>
  <a href="https://www.google.com/intl/en/chrome/browser/" target="_blank"><img  style="margin-bottom:-8px"  width="30px" height="30px"  src="../images/Chrome.png"></a> </p>
 </div>
 <?php  }?> 
 
<script type="text/javascript">	
	_V_.options.flash.swf = "/files/video-js.swf";	


</script>
<div style="width:100%; background-color: #000; height:150px; margin-top:20px; border-radius:5px; ">
					
					<table style="width:75%; float:left; margin-top:10px; border:solid 0px #444; border-radius:5px;  ">
					<tr height="30px">		
					<?php foreach ($steps as $step) :?>				
						<td valign="middle" style="border:solid 0px #444; width:250px; color:#8fd900; font-size:20px;  text-align:left;"><b><?php echo $step['Doc']['title'];?></b></td>
                    <?php endforeach;?>
					</tr>
					<tr height="50px">	
					<?php $s = 1;
					 foreach ($steps as $step) :?>    
					    <?php if($s == 1) {?> 					
						<td style=" border:solid 0px #444;  text-align:left; line-height:120%; color:#8fd900;  border-right:solid 1px #333; border-bottom-left-radius:5px; border-top-left-radius:5px; width:200px;">
						<?php } elseif ($s == 2) {?>
						<td style=" border:solid 0px #444;  text-align:left; line-height:120%; color:#8fd900; border-right:solid 1px #333; width:200px;">
						<?php } elseif ($s == 3) {?>
						<td style=" border:solid 0px #444;  text-align:left; line-height:120%; color:#8fd900; border-bottom-right-radius:5px; border-top-right-radius:5px; width:200px;">
					   <?php  }?>
					   <?php echo $step['Doc']['body'];?>
						</td>
					<?php $s++;
					 endforeach;?>
					</tr>
					</table>
					<div style="float:right; width:240px; margin-top:20px; height:90px; padding-right:10px; border-radius:5px; background:url(../img/regis_free_bg.png) no-repeat;" >
						<p class="home-register" style="color:#000;  text-align:right;  line-height:190%;font-size:20px;"><b>Register</b></p>
						<p class="home-register" style="color:#000; text-align:right; line-height:120%; font-size:39px;"><b>Free</b></p>
						<a class="buttonSignUp" style="top:270px; margin-left:-10px" href="/register"><img src="../img/click_here_n.png" /></a>
					</div>
					
				</div>
<div id="content">
<div class="content_inner" >
			<?php echo $this->Session->flash(); ?>
		<center> 
				
			<div style="width:100%; "  >
			
			<!--
				
				
					
				<table style="width:200px; margin-top:20px; border:solid 0px #444; border-radius:5px;float:left;  background-color: #333;  ">
				<tr>
					
					<th style="font:AvantGarde Md BT; font-size:16px ; text-align:center;   border-top-left-radius:5px; border-top-right-radius:5px;">
					<?php //echo 'Latest Videos';?></th>
				</tr>			
				<tr>
				<?php
				//$x=1;
				//$i=0;
				//foreach ($latestVids as  $latestVid) : ?>				
				<?php // if(($i-3)==1) : ?>
				</tr>
				<tr>
				<td style="text-align:right; padding-top:10px; background-color:#efefef; /*background:url(../images/pan_bg.png) repeat-x; */height:13px;">
					<a href="/videos/list_video/" >
						<img src="../images/morevideos.png" />
					</a>					
				</td>	
				</tr>
				<tr>
				<td style="background:url(../images/eloeel_pan_bot_02.png) repeat-x; border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
										
				</td>	
				</tr>
				<?php //break 1; ?> 
				
				<?php //endif; ?>
				<tr>
					<td style="text-align:left;color:#888; background:url(../images/pan_bg.png) repeat-x; font-size:10px; border:none;" valign="top" >
						<div style=" border:solid 0px #888; width:200px; height: 80px; " >							
							<div style="text-align:left; float:left; height: 80px; width:110px; background-color:#efefef; width:auto; ">
								<a href="/videos/archive_view/<?php //echo $latestVid['Video']['id'];?>" >
									<img src="../../<?php //echo $latestVid['Video']['thumbnail_name'];?>" width="110" height="80" /></a>
							</div>
							<span style="background-color:#333; float:left;color:#fff; width:auto;  padding:1px; margin-top:55px;margin-left:-50px;">00:00:47<?php //echo $vidsTime[$i];?>	</span>	
							<div style="text-align:left;  float:left; padding-left:10px; background-color:#efefef; height: 80px; width:80px; ">
							<a href="/videos/archive_view/<?php //echo $latestVid['Video']['id'];?>" ><b style="font-size:11px; color:#333;"><?php //echo substr($latestVid['Video']['title'], 0, 20) . '...' ;?></b></a>
							<br/>
							<b style="font-size:11px; color:#333;"><?php // echo $latestVid['Video']['video_views'] . ' views';?></b>
							
							
							
							
							</div>
						</div>
					</td>	
					</tr>	
				<?php
			//	$i++;
				//$x++;?>
			
				<?php //endforeach; ?>
				
				</table>
				
				-->
			<center>	
				<div align="center" style="float:left; margin-left:214px; margin-top:-38px;  height:auto; border-radius:5px; width:513px; border:solid 0px #444; "  >
				<div><img src="/images/eloeel_home.png" /></div>	
				<div style="float:left; height:auto;  padding-top:  23px;border-radius:5px; width:513px; border:solid 1px #7ea910; ">
						<div>		
						  <video id="video_1" class="video-js vjs-default-skin" 
						  		width="480" height="360"
						  		poster="/img/Eloeel_player_background.png"
						  		data-setup='{ "controls": true, "autoplay": false, "preload": "auto"}'>				   
						    <source src="http://eloeel.com/uploaded_videos/eloeel_intro.webm" type='video/webm' />
						    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
						    <p>Your browser does not support the video tag.</p>
						  </video><br />
			<?php
                $currentsite     =  $this->Html->url( null, true );
                $twitter_url     =  "http://twitter.com/share?url=" . $currentsite . "&text=I found this great site at " . $currentsite;
                $facebook_url    =  "http://www.facebook.com/sharer.php?u=" . $currentsite;
            ?>
 
<a href="javascript:popUp('<?php print urlencode($facebook_url); ?>')"><img  height="30px" src="../images/facebook_icon_blue.png" alt="facebook"/></a>
<a href="javascript:popUp('<?php print urlencode($twitter_url); ?>')"><img  height="30px" src="../images/twitter_icon_teal.png" alt="twitter"/></a>       
						 </div><br />
						 <div>
				
				</div>
				</div>
						
				
				</div>
						</center>    		
		<!--<table style="width:200px; margin-top:20px; border:solid 0px #444; border-radius:5px;float:right;  background-color: #333;  ">
				<tr>
					
					<th style="font:AvantGarde Md BT; font-size:16px ; text-align:center;   border-top-left-radius:5px; border-top-right-radius:5px;">
					<?php // echo 'Most Viewed';?></th>
				</tr>	 		
				<tr>
				<?php
				//$x=1;
				//$i=0;
				//foreach ($mostViewedVids as $mostViewedVid): ?>		
				<?php //if(($i-3)==1) : ?>
				</tr>
				<tr>
				<td style="text-align:right; padding-top:10px; background-color:#efefef; height:13px;">
					<a href="/videos/list_video/" >
						<img src="../images/morevideos.png" />
					</a>					
				</td>	
				</tr>
				<tr>
				<td style="background:url(../images/eloeel_pan_bot_02.png) repeat-x; border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
										
				</td>	
				</tr>
				<?php //break 1; ?> 
				
				<?php //endif; ?>
				<tr>
					<td style="text-align:left;color:#888; background:url(../images/pan_bg.png) repeat-x; font-size:10px; border:none;" valign="top" >
						
						<div style=" border:solid 0px #888; width:200px; height: 80px; " >							
							<div style="text-align:left; float:left; height: 80px; width:110px; background-color:#efefef; width:auto; ">
								<a href="/videos/archive_view/<?php //echo $mostViewedVid['Video']['id'];?>" >
									<img src="../../<?php //echo $mostViewedVid['Video']['thumbnail_name'];?>" width="110" height="80" /></a>
							</div>
							<span style="background-color:#333; float:left;color:#fff; width:auto;  padding:1px; margin-top:55px;margin-left:-50px;">00:00:47<?php //echo $vidsTime[$i];?>	</span>	
							<div style="text-align:left;  float:left; padding-left:10px; background-color:#efefef; height: 80px; width:80px; ">
							<a href="/videos/archive_view/<?php //echo $mostViewedVid['Video']['id'];?>" ><b style="font-size:11px; color:#333;"><?php //echo substr($mostViewedVid['Video']['title'], 0, 20) . '...' ;?></b></a>
							<br/>
							<b style="font-size:11px; color:#333;"><?php //echo $mostViewedVid['Video']['video_views'] . ' views';?></b>
							
							
							
							
							</div>
						</div>
						
					</td>	
					</tr>	
				<?php
				////$i++;
				//$x++;?>
			
				<?php //endforeach; ?>
				
				</table>
				-->
				
				<script type="text/javascript">
 function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=500,left = 710,top = 290');");
}
</script>
 
				
			
		</div></center>      
</div>
</div>