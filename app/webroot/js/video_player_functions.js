setTimeout(function() {
    	$('#feedback_view').hide('fast');
	});
	
	
	_V_.options.flash.swf = "/files/video-js.swf";	
    _V_("video_<?php echo $video['Video']['id']; ?>", { 
	        'controls'	: true, 
	        'autoplay'	: false, 
	        'preload'	: 'auto',
        });