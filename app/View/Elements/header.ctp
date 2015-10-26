	<div id="branding">
    	<h1><a href="/" title="Flipit Media (Pvt) Ltd." class="easy_shopper"><span>Flipit Media (Pvt) Ltd.</span></a></h1>
    	<div class="login">
    	<?php if ($logged_in): ?> 
        <p style="padding-top:45px; font-size:14px"><span>Hi, <strong><?php echo $this->Session->read('Auth.User.fullname'); ?></strong></span>&nbsp; |&nbsp; <?php echo $this->Html->link(__('Logout'), '/logout/'); ?></p>
        <?php else: ?> 
        <!-- 
        <div style="padding-top:10px; display: block; height:auto; width: auto;">
         <a href="/register"><img src="../img/joinnow.png" style="border-radius:5px"/></a> -->
         <div style="padding-top:10px;">
          <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'))); ?>
            <ul>
                <li class="login_heading">Login</li>
                <li>
                	 <?php /*echo $this->Form->input('email', array(
                    													
                	 													'label'=>'', 
													                    'value'=> 'Email Address',
													                    'onmouseout'=> 'hoverOff(this);',
													                    'onmouseover'=> 'hoverOn(this);',
													                    'onclick'=> 'clickclear(this, "Email Address")',
                    													'onblur'=> 'clickrecall(this,"Email Address")',
                    													'class'=> 'hoverOff',
                	 													
                    
                    												));*/ ?>
                    <input type="text" name="data[User][email]" value="Email Address" onmouseout="hoverOff(this);" onmouseover="hoverOn(this);" onclick="clickclear(this, 'Email Address')" onblur="clickrecall(this,'Email Address')" class="hoverOff" />
                </li>
                <li>
                    <?php echo $this->Form->input('password', array(
                    													'label'=>'', 
													                    'value'=> '********',
													                    'onmouseout'=> 'hoverOff(this);',
													                    'onmouseover'=> 'hoverOn(this);',
													                    'onclick'=> 'clickclear(this, "********")',
                    													'onblur'=> 'clickrecall(this,"********")',
                    												     'class'=> 'hoverOff',               
                    												)); ?>
                    <!-- <input type="password" value="********" onmouseout="hoverOff(this);" onmouseover="hoverOn(this);" onclick="clickclear(this, '********')" onblur="clickrecall(this,'********')" class="hoverOff" name="password" />-->
                </li>
                <li>
                	<?php //echo $this->Form->submit('Login'); ?>
                    <input src="../images/login_btn.png" type="image" name="submit" class="login_btn" /> 
                </li>
            </ul>
        <?php echo $this->Form->end(); ?>
       
        </div>
        <?php endif; ?>	
        </div>
    </div>
    <!-- User Home Menu -->	
	<ul id="navigation">
		<?php if ($logged_in): ?> 
			<?php if ($user_group == 1): ?>	
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	        <li><a href="/what-is-eloeel" class="about">What is Eloeel</a></li>
	        <li><a href="/users" class="users">Users</a></li>
	        <li><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li><a href="/register" class="join_us">Join Us</a></li>
	        <li><a href="/contact" class="contact">Contact Us</a></li>
	        <li><a href="/admin" class="admin">Admin</a></li>
	        <?php elseif ($user_group == 2): ?>	
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	        <li><a href="/what-is-eloeel" class="about">What is Flipit</a></li>
	        <li><a href="/users" class="users">Users</a></li>
	        <li><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li><a href="/register" class="join_us">Join Us</a></li>
	        <li><a href="/contact" class="contact">Contact Us</a></li>
	        <li><a href="/users/home" class="account">Account</a></li>
	        <?php elseif ($user_group == 3): ?>	
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	        <li class="border_none"><a href="/about" class="about">What is Flipit</a></li>
	        <li class="border_none"><a href="/users" class="users">Users</a></li>
	        <li class="border_none"><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li class="border_none"><a href="/register" class="join_us">Join Us</a></li>
	        <li class="border_none"><a href="/contact" class="contact">Contact Us</a></li>
	        <li class="border_none"><a href="/advertisers/home" class="account">Account</a></li>
	        <?php endif; ?>
        <?php else: ?> 
	        <li class="border_none"><a href="/" class="home">Home</a></li>
	        <li><a href="/what-is-eloeel" class="about">What is Flipit</a></li>
	        <li><a href="/users" class="users">Users</a></li>
	        <li><a href="/advertisers" class="advertisers">Advertisers</a></li>
	        <li><a href="/register" class="join_us">Join Us</a></li>
	        <li><a href="/contact" class="contact">Contact Us</a></li>
	        <li><a href="/login" class="login">Login</a></li>
        <?php endif; ?>	
    </ul>

<!-- End Menu -->		