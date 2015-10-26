	<?php $this->Html->script(array('/js/jquery.progressbar.js'), array('inline' => false)); ?>
	<script type="text/javascript">
			var progress_key = '<?= $uuid ?>';

			$(document).ready(function() {
				
				$(".pb5").progressBar({ max: '10000', textFormat: 'fraction', callback: function(data) { if (data.running_value == data.value) { alert("Callback 				example: Target reached!"); } }} );
				$("#uploadprogressbar").progressBar();
			});

			
		</script>
	<div id="branding">
    	<h1><a href="/" title="Flipit Media (Pvt) Ltd." class="easy_shopper"><span>Flipit Media (Pvt) Ltd.</span></a></h1>
    	<div class="summery">
    	<?php if ($logged_in): ?> 
		<table style="width:100%;  border:solid 0px #666;border-radius: 5px;">
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
		<tr>
		<td  style="text-align:left; padding-left:10px; font-size:13px;">Yout trust score:</td>
		<td style="text-align:left;; font-size:13px;"><span class="progressBar pb5">800</span><iframe style="display: none;" name="progressFrame"></iframe></td>
		</tr>
		<?php if ($creditlimitreached): ?>
		<tr>
		<td colspan="2" style="text-align:left; padding-left:10px; font-size:13px;"><b style="color:#F61908;">You Have reached your credit limit</b></td>
		</tr>
		
		<?php endif; ?>
		<tr>
		<td colspan="2" style="text-align:left; padding-left:10px; font-size:13px;"><span>Hi, <strong><?php echo $this->Session->read('Auth.User.fullname'); ?></strong></span>&nbsp; |&nbsp; <?php echo $this->Html->link(__('Logout'), '/logout/'); ?></td>
		</tr>
		</table>
		
        <?php endif; ?> 
    </div>   
    </div>
    <!-- User Home Menu -->	
	<ul id="navigation">
		<?php if ($logged_in): ?> 
			<?php if ($user_group == 1): ?>	
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	        <li><a href="/what-is-eloeel" class="about">What is Eloeel?</a></li>
	        <li><a href="/users" class="users">Users</a></li>
	        <li><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li><a href="/register" class="join_us">Join Us</a></li>
	        <li><a href="/contact" class="contact">Contact Us</a></li>
	        <li><a href="/admin" class="admin">Admin</a></li>
	        <?php elseif ($user_group == 2): ?>	
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	        <li><a href="/what-is-eloeel" class="about">What is Eloeel?</a></li>
	        <li><a href="/users" class="users">Users</a></li>
	        <li><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li><a href="/register" class="join_us">Join Us</a></li>
	        <li><a href="/contact" class="contact">Contact Us</a></li>
	        <li><a href="/users/home" class="account">Account</a></li>
	        <?php elseif ($user_group == 3): ?>	
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	        <li class="border_none"><a href="/what-is-eloeel" class="about">What is Flipit</a></li>
	        <li class="border_none"><a href="/users" class="users">Users</a></li>
	        <li class="border_none"><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li class="border_none"><a href="/register" class="join_us">Join Us</a></li>
	        <li class="border_none"><a href="/contact" class="contact">Contact Us</a></li>
	        <li class="border_none"><a href="/advertisers/home" class="account">Account</a></li>
	        <?php endif; ?>
        <?php else: ?> 
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	         <li><a href="/what-is-eloeel" class="about">What is Eloeel?</a></li>
	        <li><a href="/users" class="users">Users</a></li>
	        <li><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li><a href="/register" class="join_us">Join Us</a></li>
	        <li><a href="/contact" class="contact">Contact Us</a></li>
	        <li><a href="/login" class="login">Login</a></li>
        <?php endif; ?>	
    </ul>

<!-- End Menu -->		