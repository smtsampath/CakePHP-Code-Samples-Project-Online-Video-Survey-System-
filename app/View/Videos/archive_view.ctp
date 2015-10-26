<?php $this->Html->script(array('/js/video.js'), array('inline' => false)); ?>
<?php 
 echo $this->Html->css('lectric');

//echo $this->Html->css('inner');
//echo $this->Html->css('color');


?>
<script type="text/javascript">	
	
	_V_.options.flash.swf = "/files/video-js.swf";	
</script>
<div id="content">
<div class="content_inner">
<?php if ($logged_in): ?> 
	

<h2><?php echo 'Title : ' . $video['Video']['title']; ?></h2>
<div style="float:right;width:19.4%;min-height:390px; margin-bottom:5px; padding: 10px 5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;
	font-weight: bold; color:#fff;/*text-transform:uppercase;*/">
		Hello, This is where the Video related advertisement comes.	
</div>
		<div style="width:75%; height:auto; padding: 20px 20px 30px 20px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">	
		<div id="video_view" style="padding:5px; margin-left:40px; margin-top:20px;">
			<div>		
			  <video id="video_<?php echo $video['Video']['id']; ?>" class="video-js vjs-default-skin" 
			  		controls  preload="auto" width="650" height="330" data-setup="{}">				   
			    <source src="<?php echo $video['Video']['url']; ?>" type='video/webm' />
			    
			    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
			    <p>Your browser does not support the video tag.</p>
			  </video>
			 </div>
		</div>

</div>	
<script>
	
		// Ejecutamos la función init una vez se carga el DOM
		document.addEventListener("DOMContentLoaded", init, false);
		
		function init(){
			var video = document.getElementById("video_<?php echo $video['Video']['id']; ?>");
			video.addEventListener("play", videoPlay, false);
			video.addEventListener("pause", videoPause, false);
			video.addEventListener("ended", videoEnd, false);
			console.log(video);
		}
				
		function videoPlay() {
			_gaq.push(['_trackEvent', 'Videos', 'play', '<?php echo $video['Video']['title']; ?>']); 
		}
		
		function videoPause() {
			_gaq.push(['_trackEvent', 'Videos', 'pause', '<?php echo $video['Video']['title']; ?>']); 
		}
		
		function videoEnd() {
			_gaq.push(['_trackEvent', 'Videos', 'ended', '<?php echo $video['Video']['title']; ?>']); 
		}
		
	
	</script>
<div style="width:99%; height:auto;margin-top:3px; padding: 10px 5px; background-color:#151515; color:#fff;border:solid 0px #666;border-radius: 0px;">
<?php echo $video['Video']['description'];?>
	Hello, This is where the Video description comes.
</div>	
<?php else : ?>	

<div style="width:94.9%; padding: 9px 24px; min-height:20px; margin-bottom:20px; background-color:#328dc7; border:solid 0px #666;border-radius: 0px; font-size: 15px;
	font-weight: bold; color:#333;">
	Hurry up and <a href="/register" >Register</a> to get paid!
</div>
<h2><?php echo 'Title : ' . $video['Video']['title']; ?></h2>
<div style="float:right;width:19.4%;min-height:390px; margin-bottom:5px; padding: 10px 5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;
	font-weight: bold; color:#fff;/*text-transform:uppercase;*/">
		Hello, This is where the Video related advertisement comes.	
</div>
		<div style="width:75%; height:auto; padding: 20px 20px 30px 20px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">	
		<div id="video_view" style="padding:5px; margin-left:40px; margin-top:20px;">
			<div>		
			  <video id="video_<?php echo $video['Video']['id']; ?>" class="video-js vjs-default-skin" 
			  		controls  preload="auto" width="650" height="330" data-setup="{}">				   
			    <source src="<?php echo $video['Video']['url']; ?>" type='video/webm' />
			    
			    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
			    <p>Your browser does not support the video tag.</p>
			  </video>
			 </div>
		</div>

</div>	
<div style="width:99%; height:auto;margin-top:3px; padding: 10px 5px; background-color:#151515; color:#fff;border:solid 0px #666;border-radius: 0px;">
<?php echo $video['Video']['description'];?>
	Hello, This is where the Video description comes.
</div>	
		
<?php endif; ?>	

</div>
</div>
<script src="../../js/jquery.js" type="text/javascript"></script>
	<script src="../../js/jquery.history_remote.pack.js" type="text/javascript"></script>
	<script src="../../js/jquery.tabs.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {
			$('#container-1').tabs({ fxFade: true, fxSpeed: 'fast' });
		});
	</script>
	<script src="../../js/common.js" type="text/javascript"></script>	
				
