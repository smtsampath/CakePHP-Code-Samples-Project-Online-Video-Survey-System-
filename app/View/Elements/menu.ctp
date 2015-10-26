				<ul id="topnav">
				<?php if ($logged_in): ?> 
					<?php if ($user_group == 1): ?>							
						<li><?php echo $this->Html->link('Home', '/', array('class' => 'current')); ?></li>
						<li><?php echo $this->Html->link('What is Flipit', '/about'); ?></li>
						<li><?php echo $this->Html->link('Users', '/users'); ?></li>
						<li><?php echo $this->Html->link('Advertisers', '/advertisers'); ?></li>
						<li><?php echo $this->Html->link('Join Us', '/register'); ?></li>
						<li><?php echo $this->Html->link('Contact Us', '/contact'); ?></li>
						<li><?php echo $this->Html->link('Admin', '/admin'); ?></li>                
                	<?php elseif ($user_group == 2): ?>	
                		<?php //if(empty($userProfile)) :?>						
						<li><?php echo $this->Html->link('Home', '/', array('class' => 'current')); ?></li>						
						<li><?php echo $this->Html->link('What is Flipit', '/about'); ?></li>
						<li><?php echo $this->Html->link('Users', '/users'); ?></li>
						<li><?php echo $this->Html->link('Advertisers', '/advertisers'); ?></li>
						<li><?php echo $this->Html->link('Join Us', '/register'); ?></li>
						<li><?php echo $this->Html->link('Contact Us', '/contact'); ?></li>
						<li><?php echo $this->Html->link('Account', '/users/home'); ?></li>	
						<?php //endif;?>
					<?php elseif ($user_group == 3): ?>
						<li><?php echo $this->Html->link('Home', '/', array('class' => 'current')); ?></li>
						<li><?php echo $this->Html->link('What is Flipit', '/about'); ?></li>
						<li><?php echo $this->Html->link('Users', '/users'); ?></li>
						<li><?php echo $this->Html->link('Advertisers', '/advertisers'); ?></li>
						<li><?php echo $this->Html->link('Join Us', '/register'); ?></li>
						<li><?php echo $this->Html->link('Contact Us', '/contact'); ?></li>
						<li><?php echo $this->Html->link('Account', '/advertisers/home'); ?></li>	
					<?php endif; ?>
				<?php else: ?>  
						<li><?php echo $this->Html->link('Home', '/', array('class' => 'current')); ?></li>						
						<li><?php echo $this->Html->link('What is Flipit', '/about'); ?></li>
						<li><?php echo $this->Html->link('Users', '/users'); ?></li>
						<li><?php echo $this->Html->link('Advertisers', '/advertisers'); ?></li>
						<li><?php echo $this->Html->link('Join Us', '/register'); ?></li>
						<li><?php echo $this->Html->link('Contact Us', '/contact'); ?></li>
						<li><?php echo $this->Html->link('Login', '/login'); ?></li>
				<?php endif; ?>	
				</ul>
		