<?php $this->Html->script(array('/js/event_video.js'), array('inline' => false)); ?>
<?php $this->Html->script(array('http://code.jquery.com/jquery-1.8.2.js'), array('inline' => false)); ?>
<?php $user_id = $this->Session->read('Auth.User.id');
//prd($user_id);
?>

<script type="text/javascript"> 
    _V_.options.flash.swf = "/files/video-js.swf";  
    
    $(window).blur(function(){

	_V_("video_<?php echo $video['Video']['id']; ?>").ready(function(){

	    var myPlayer = this;

	    myPlayer.pause();

	  });
  
    });
</script>

<script type="text/javascript">

function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=500,left = 710,top = 290');");
}
</script>

<style type="text/css">
<!--
div#feedback_view
{ display: none; }
div#des_view
{ display: none; }
div#output_view
{ display: none; }
div#runout_of_time
{ display: none; }
div#vid_back
{ display: none; }
div#counter
{ display: none; 
-->



</style>
<div id="content">
<div class="content_inner">	
<?php if($isViewed == true) : ?>
<div style="width:95%; padding: 9px 0px; min-height:20px; margin-bottom:20px; border:solid 0px #666;border-radius: 5px; font-size: 15px;
	font-weight: bold; color:#FF0000;">
	You Don't get paid for watching this video!
</div>
<h2><?php echo 'Title : ' . $video['Video']['title']; ?></h2>
<div style="float:right;width:19.4%;min-height:439px; margin-bottom:5px; padding: 10px 5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;
	font-weight: bold; color:#fff;/*text-transform:uppercase;*/">
</div>
		<div style="width:75%;min-height:410px;padding: 20px 20px 30px 20px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">	
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
		<script type="text/javascript">
		
				setTimeout(function() {
					$('#feedback_view').hide('fast');
				},-0000);	
				setTimeout(function() {
                    $('#runout_of_time').hide('fast');
                },-0000);
							
		</script>

</div>	
<div style="width:98.5%; height:auto;margin-top:3px; padding: 10px 5px; background-color:#151515; color:#fff;border:solid 0px #666;border-radius: 0px;">
<?php echo $video['Video']['description'];?>
</div>		
<?php else : ?>
<?php if($creditlimitreached == true) : ?>
<div style="width:95%; padding: 9px 24px; min-height:20px; margin-bottom:20px; border:solid 1px #666;border-radius: 5px; font-size: 15px;
	font-weight: bold; color:#FF0000;">
	Sorry, You Have reached your credit limit!
</div>

<h2><?php echo 'Title : ' . $video['Video']['title']; ?></h2>
<div style="float:right;width:19.4%;min-height:439px; margin-bottom:5px; padding: 10px 5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;
	font-weight: bold; color:#fff;/*text-transform:uppercase;*/">
		
		<img src = "/images/sample_adv.jpg" width="99.8%"/>
</div>
		<div style="width:75%; height:410px;padding: 20px 20px 30px 20px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">	
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
<div style="width:98.5%; height:auto;margin-top:3px; padding: 10px 5px; background-color:#151515; color:#fff;border:solid 0px #666;border-radius: 0px;">
<?php echo $video['Video']['description'];?>
</div>
<?php else : ?>

<h2><?php echo 'Title : ' . $video['Video']['title']; ?></h2>
<div style="float:right;width:19.4%;min-height:439px; margin-bottom:5px; padding: 10px 5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;
	font-weight: bold; color:#fff;/*text-transform:uppercase;*/">
		<img src = "/images/sample_adv.jpg" width="99.8%"/>
</div>
		<div id="vid_back1" style="width:75%; height:410px; padding: 20px 20px 30px 20px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">			
		<div id="video_view" style="padding:5px; margin-left:40px; margin-top:20px;">
			<div>		
			  <video id="video_<?php echo $video['Video']['id']; ?>" class="video-js vjs-default-skin" 
			  		controls  preload="auto" width="650" height="330" data-setup="{}">				   
			    <source src="<?php echo $video['Video']['url']; ?>" type='video/webm' />			    
			    <track kind="captions" src="/files/captions.vtt" srclang="en" label="English" />
			    <p>Your browser does not support the video tag.</p>
			  </video><br />
			         <?php
						$currentsite  = $this->Html->url( null, true );
						$twitter_url  = "http://twitter.com/share?url=" . $currentsite . "&text=I found this great site at " . $currentsite;
						$facebook_url = "http://www.facebook.com/sharer.php?u=" . $currentsite;
					?>
 	
	
	
	<script type="text/javascript">	

	_V_("video_<?php echo $video['Video']['id']; ?>").ready(function(){

	    var videoPlay = function(){
	        //var myPlayer = this;
	    	_gaq.push(["_trackEvent","Video", "play", "video_<?php echo $video['Video']['id']; ?>", "user_id=<?php echo $user_id; ?>&Video_title=<?php echo $video['Video']['title']; ?>"]); 
	    };

	    var videoPause = function(){
	        //var myPlayer = this;
	    	_gaq.push(["_trackEvent","Video", "pause", "video_<?php echo $video['Video']['id']; ?>", "user_id=<?php echo $user_id; ?>&Video_title=<?php echo $video['Video']['title']; ?>"]);
	    };

	    var videoEnd = function(){
	        //var myPlayer = this;
	    	_gaq.push(["_trackEvent","Video", "ended", "video_<?php echo $video['Video']['id']; ?>", "user_id=<?php echo $user_id; ?>&Video_title=<?php echo $video['Video']['title']; ?>"]);
	    };
	    this.addEvent("play", videoPlay);
	    this.addEvent("pause", videoPause);
	    this.addEvent("pause", videoEnd);


    });
	
		
	</script>
<a href="javascript:popUp('<?php print urlencode($facebook_url); ?>')"><img height="30px" src="../../images/facebook_icon_blue.png" alt="facebook"/></a>
<a href="javascript:popUp('<?php print urlencode($twitter_url); ?>')"><img height="30px" src="../../images/twitter_icon_teal.png" alt="twitter"/></a>       
        
			 </div>
		</div>
		<script type="text/javascript">		

				
			///	var sub = 0;
				function myTimer() {
                   //document.getElementById('runout_of_time').style.display='block'; 
                                
                }
				
				_V_("video_<?php echo $video['Video']['id']; ?>").ready(function(){


					this.addEvent("ended", function(){
											
							var count = <?php echo $video['Video']['response_time'] ?>;
							var timer = setInterval(function(){
							   $('#counter').html(count + ' Seconds Remaining...');
							   if (count == 0) {
							       clearInterval(timer);
							   }
							   count--;
							}, 1000);
						
							setTimeout(function() {
						    $('#video_view').fadeOut('fast');
						    document.getElementById('vid_back1').style.display='none'; 
						    document.getElementById('vid_back').style.display='block'; 
						    
							}, 1000);

							setTimeout(function() {
								document.getElementById('counter').style.display='block'
								document.getElementById('feedback_view').style.display='block'; 								
							}, 2000);
							setTimeout(function() {
								$('#counter').fadeOut('fast');	
						      	$('#feedback_view').fadeOut('fast');
						    }, <?php echo $video['Video']['response_time'] . '000'; ?> + 1000);
							
							function myTimer() {
                                document.getElementById('runout_of_time').style.display='block'; 
                                
                        	}
                        
							intervalID = setInterval(function() { myTimer(); }, <?php echo $video['Video']['response_time'] . '000'; ?> + 2000);  
					   					   		   	
					});//counter

						
				});
				 intervalID = setInterval(function() { myTimer(); }, 6000);  
				
		</script>
		<?php 	$id =  $video['Video']['id']; ?>

</div>
	
	
	<div id="vid_back" style="width:75%; min-height:439px;  padding: 20px 20px 30px 20px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">
	<div id='counter' style="color:#FF0000; padding:10px; text-align:center; margin-left:45px; width:630px; background-color:#151515; font-weight: bold; font-size:15px;"></div>
	<center>	
  		<div id="runout_of_time" style="text-align:center; margin-left:20px; background-color:#151515; width:500px;height:300px; border: 5px solid #444;border-radius: 5px; margin-top:0px;">
                    <p>Run Out of time
                    <br /><br />
                    <br /><br />
                    <?php echo $this->Html->link(__('watch again'), array('controller' => 'videos', 'action' => 'view', $id), array('class' => 'but-color')); ?> 
                    </p>
                    
        </div>  		
  		
  	</center>	
  	<center>
  		<div   id="output_view" style="text-align:center; margin-left:20px; width:500px;min-height:380px; background-color:#151515; border: 5px solid #444;border-radius: 5px; margin-top:0px;">
	  		<p style="font-size: 14px;"><strong>Hello <span style="color:#01A9DB"><?php echo $this->Session->read('Auth.User.fullname'); ?></span>
	  		   , you have earned <span style="color:#01DF3A"><?php echo number_format($credit_earned, 2, '.', '');?></span>
	  		   <span style="color:green">eels</span> 
	  		   for this video. Now your total credits balance is 
	  		   <span style="color:#01DF3A"><?php echo number_format($current_total, 2, '.', '');?></span>
	  		   <span style="color:green">eels</span></strong>
	  		</p><br /><br />
	  		<p>
	  		<?php //if ($video['Video']['coupon'] == 1) {?>	  			
<!--		  		<img src="../../coupons/<?php //echo $video['Video']['id'];?>" />-->
		  	<?php //} elseif ($video['Video']['coupon'] == 0){ ?>
		  	    <?php //if ($this->Auth->user('id') == 36) { ?>
<!--		  			<img src="../../images/gift-vouchers.jpg" id="image" width="500px" />-->
		  		<?php //} ?>
		  	<?php //} ?>
		  		<br /><br />
		  		<br /><br />
		  		<?php echo $this->Html->link(__('Back to home page'), array('controller' => 'users', 'action' => 'viewer_home'), array('class' => 'but-color')); ?> 
	  		</p>
<!--			<center>-->
				  		
<!--				<div style="text-align:center;  margin-bottom:10px;width:350px; height:25px; ">
						<div style="float:left;text-align:center; background-color:#ececec; width:100px; height: 15px; padding:5px;"><a href="javascript:image.print">Print</a></div>	
						<div style="margin-left:120px;text-align:center; background-color:#ececec; width:100px; height: 15px; padding:5px;">Send</div>							
						<div style="margin-top:-25px; float:right;text-align:center;background-color:#ececec; width:100px; height: 15px; padding:5px;">Share</div>
			</div>-->	
<!--			</center>	  -->

  		</div>
		</center>
		<center>
		
		<div id="feedback_view" style="text-align:center; margin-left:20px; width:500px; background-color:#151515; border: 1px solid #444;border-radius: 5px; margin-top:0px;">
			
<!--			<div id="countdown_text"><b style="color:#fff">Hi</b></div>	-->
			
			<table style="border: 0px;">
			
										<?php
							 
							    echo $this->Form->create('VideoResponse', array('id' => 'video_response_form',
							    										'url' => array( 
																		'controller' => 'video_logs', 
																		'action' => 'create', 
																		$par1=$id),
																	 'type' =>'post',
																	));
   ?>
														<tr>
					<td colspan="2" style="text-align:left; border-bottom: 1px solid #444; border-top-left-radius:5px; border-top-right-radius:5px;"><b style="color:#328dc7;"><?php echo __('Video Feedbacks'); ?></b>&nbsp;</td>	
				</tr>
				<tr>
					<td>&nbsp;</td>	
				</tr>	
				<?php $x = 1; ?>
  			<?php $questnum = 1;
  						
			foreach ($fullVideos as $fullVideo):?>		
																	
							<tr>
					<td style="text-align:left;"><?php echo $questnum . ': ' . h($fullVideo['VideoFeedback']['question']); ?>&nbsp;</td>
						<?php $feedback_id = $fullVideo['VideoFeedback']['id'];  ?>
							
					<td  style="text-align:left;">
						<?php 
							
						
						$answers	= array();
							array_unshift($answers, array('' => 'SELECT') ) ;
							foreach ( $fullVideo['VideoFeedbackOptions'] as $key => $answer) :
			
					 			$answers[$answer['VideoFeedbackOption']['id']] = $answer['VideoFeedbackOption']['option'];
								
							endforeach;	
				
				 			
					
							echo $this->Form->input('VideoResponse.video_feedback_option_id', 
												array('type'	=>   'select',
													//'options'	=>	$select,
													'options'	=>	$answers,
													'label'		=>	'Possible answers',
													'name' => 'data[VideoResponse]['.$feedback_id.'][video_feedback_option_id]'
											));
											
						//prd($answers);
						?>
					</td>		
				</tr>																
						
							
			<?php $questnum++; 
				endforeach; ?>

				<tr>
					<td>&nbsp;</td>	
				</tr>	
	  			<tr> 
	  				<td colspan="2" style="text-align:right; padding-right:90px;">
<!--	  				<input class="but-color" value="Submit" id="submit" type="submit" />-->
				<?php 
	  				echo $this->Form->Submit('submit');?>
	  				</td>							
	  			</tr>	
			</table>
			 
			<?php		echo $this->Form->end();
   						
		
			?>	
		</div>
		</center>
		</div>
		<div style="width:98.5%; height:auto;margin-top:3px; padding: 10px 5px; background-color:#151515; color:#fff;border:solid 0px #666;border-radius: 0px;">
<?php echo $video['Video']['description'];?>
</div>		
	
		
</div>		
		<?php endif; ?>
<?php endif; ?>


	
</div><!-- end #content --> 
   
<script>

 $('#video_response_form').submit(function() {
	
	//var ob = {};
    //ob.name = 'Sampath';
	
	console.log($('#video_response_form').serialize());
	$.ajax({
	    type      : "POST",
		url       : "/video_logs/create/<?php echo $video['Video']['id']; ?>",
		data      : $('#video_response_form').serialize(),
		dataType  : 'json',
		success   : function(response){
			if (response.error){
				alert('You need to select an option');  
				$('#feedback_view').show();
				
			} else {
				//alert('hey');
				_gaq.push(['_trackEvent', 'VideoFeedbacks', 'Submit', '<?php echo 'video_'.$video['Video']['id']; ?>', '<?php echo "user_id=".$user_id; ?>']);
				$('#feedback_view').fadeOut('fast');
				$('#output_view').show();
				$('#counter').fadeOut('fast');	
				clearInterval(intervalID);		
			   //$('#runout_of_time').hide('fast');
				   
				//document.getElementById('runout_of_time').style.display='none'; 
			} 
		},
		error     : function () {
			$('#output_view').show();  
		} 
	});
	return false;
});


</script>

