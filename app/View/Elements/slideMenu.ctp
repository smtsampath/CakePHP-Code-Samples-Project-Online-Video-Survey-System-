		<?php if ($logged_in): ?> 
		<div id="sidebar" >
            <div id="category" >            	
                <ul  style="border-radius: 10px 10px 0px 0px">
                <?php if ($user_group == 2): ?>
					<li><?php echo $this->Html->link('Overview', '/users/home'); ?></li>
<!--					<li><?php //echo $this->Html->link('Voting Competition', '/users/competitions'); ?></li>-->
					<li><?php echo $this->Html->link('Payments', '/users/payments'); ?></li>
					<li><?php echo $this->Html->link('Account Settings', '/users/accounts'); ?></li>
					<!--<li><?php // echo $this->Html->link('Video Archive', '/videos'); ?></li>
					--><li><?php echo $this->Html->link('Help!', '/help', array('target' => '_blank')); ?></li>
				<?php elseif ($user_group == 3): ?>
					<li><?php echo $this->Html->link('Overview', '/advertisers/home'); ?></li>
					<li><?php echo $this->Html->link('Account Settings', '/advertisers/accounts'); ?></li>
					<li><?php echo $this->Html->link('Reports', '/advertisers/summary'); ?></li>
					<li><?php echo $this->Html->link('Video Archive', '/videos'); ?></li>
					<li><?php echo $this->Html->link('Help!', '/help', array('target' => '_blank')); ?></li>	
				<?php endif; ?>                    
                </ul>
            </div>
            
        
    	</div>        
    	<?php endif; ?> 		
    	
    		