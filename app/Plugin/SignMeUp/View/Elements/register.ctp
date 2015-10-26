<div id="content">
	<div id="content_inner">
	<?php echo $this->Session->flash(); ?>
		<div style="float:left; width: 400px; height: 343px;  padding : 20px; background-color: #151515; border: 0px solid #ededed;border-radius: 0px;">
			<div style="font-size: 11px; line-height:300%; color: white;  text-align: justify;">
				<?php echo $registerdoc['Doc']['body']; ?>  
			</div>
		</div>
		<div style="width: 460px; float:right; background-color: #151515; padding : 20px; border-radius: 0px;">
			<h2 style="text-align: center;">Users Sign up</h2>
			<table style="border: 0px;">
				<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'register'))); ?>
				
				<tr >
					<td style="text-align:right; font-size: 12px; height: 50px;">Fullname  : </td>
					<td style="float: left;height: 13px;"> <?php echo $this->Form->input('fullname', array('label'=>'', 'size'=> '40')); ?>  </td>
				</tr>
				<tr style="hover: null;">
					<td style="text-align:right; font-size: 12px; height: 50px;">Email   : </td>
					<td style="float: left;height: 12px;"> <?php echo $this->Form->input('email', array('label'=>'', 'size'=> '40')); ?>  </td>
				</tr>
				<tr style="hover: null;">
					<td style="text-align:right; font-size: 12px; height: 50px;">Password   : </td>
					<td style="float: left;height: 12px;"> <?php echo $this->Form->input('password1', array('label'=>'', 'size'=> '40', 'type' => 'password')); ?>  </td>
				</tr>
				<tr style="hover: null;">
					<td style="text-align:right; font-size: 12px; height: 50px;">Confirm password   : </td>
					<td style="float: left;height: 12px;"> <?php echo $this->Form->input('password2', array('label'=>'', 'size'=> '40' ,'type' => 'password')); ?>  </td>
				</tr>
				 <tr>
				 	
                   <td style="text-align:right; " colspan="2" ><?php 
												                             echo $this->Form->input('terms', array(
												                           'label' => 'I have read and agreed to these '.$this->Html->link("Terms and Conditions.", '/terms', array('target' => '_blank')),
												                           'type' => 'checkbox'
												                        ));        ?>
                    </td>
                </tr>	
				 <tr>
                   <td style="text-align:right; padding-right:150px;" colspan="2" ><?php echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('style'=>'','vspace'=>2)); ?></td>
                </tr>
			    <tr>
                   <td style="text-align:left" valign="top">Enter security code shown above:</td>
                   <td style="text-align:left"><?php echo  $this->Form->input('User.captcha',array('autocomplete'=>'off','label'=>false,'class'=>'','error'=>__('Failed validating code',true)));?></td>
                </tr>			
				<?php // echo $this->Form->input('group_id', array( 'value' => '2'  , 'type' => 'hidden')); ?>
				<tr style="hover: null;">				
					<td colspan="2" style="text-align: center;padding-right:25px;"> <?php echo $this->Form->submit('SignUp', array('class' => 'but-color')); ?>  </td>
				</tr>				
				<tr>
					<td colspan="2" style="text-align: right; padding-right:163px;">
				<?php echo $this->Html->link('Already a member?', '/login');?></td>
				</tr>
			</table>
			<?php echo $this->Form->end();?>		
		</div>
		<div class="clear"></div>
	</div>
</div>

