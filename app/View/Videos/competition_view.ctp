<?php $this->Html->script(array('/js/video.js'), array('inline' => false)); ?>
<script type="text/javascript">	
	
	_V_.options.flash.swf = "/files/video-js.swf";	
</script>
<div id="content">
<div class="content_inner">
			<div>		
			  <video id="video_<?php echo $video['Video']['id']; ?>" class="video-js vjs-default-skin" 
			  		controls  preload="auto" width="670" height="330" data-setup="{}">			   
			    <source src="<?php echo $video['Video']['url']; ?>" type='video/webm' />
			    
			    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
			    <p>Your browser does not support the video tag.</p>
			  </video>
			 </div>
</div>
</div>
