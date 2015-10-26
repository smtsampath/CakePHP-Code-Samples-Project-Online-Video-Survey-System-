	var time_left = 20;
	var cinterval;
	
	function time_dec(){
	  time_left--;
	  document.getElementById('countdown').innerHTML = time_left;
	  if(time_left == 0){
	    clearInterval(cinterval);
	  }
	}	
	cinterval = setInterval('time_dec()', 1000);
	
	setTimeout(function() {
	    $('#video_view').fadeOut('fast');
	}, 20000);
	
	setTimeout(function() {
	    $('#feedback_view').hide('fast');
	});	
	
	setTimeout(function() {
	    $('#feedback_view').show('fast');
	}, 20000);

	setTimeout(function() {
	    $('#video_counter').fadeOut('fast');
	}, 20000);	