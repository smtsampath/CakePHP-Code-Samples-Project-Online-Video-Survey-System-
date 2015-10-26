<div id="content">
<div id="content_inner">
<?php echo $this->Session->flash(); ?>
<center>
<div style=" width: 400px; height: 300px;  background-color: #151515; padding : 20px; border-radius: 0px;">
	<h2 style="text-align: center;">Users Login</h2>
	<table style="border: 0px;">
		<?php echo $this->Form->create('User');?>
		<tr style="hover: null;">
			<td style="text-align: right;font-size: 12px; height: 50px;"">Email   : </td>
			<td style="float: left;height: 13px;"> <?php echo $this->Form->input('email', array('label'=>'', 'size'=> '35')); ?>  </td>
		</tr>		
		<tr>
			<td style="text-align: right;font-size: 12px; height: 50px;"">Password: </td>
			<td style="float: left;height: 13px;"><?php echo $this->Form->input('password', array('label'=>'', 'size'=> '35')); ?></td>
		</tr>
		<!--<tr>
                   <td style="text-align:right; padding-right:110px;" colspan="2" ><?php echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('style'=>'','vspace'=>2)); ?></td>
                </tr>
--><!--                <tr>-->
<!--                   <td style="text-align:left" valign="top">Enter security code shown above:</td>-->
<!--                   <td style="text-align:left"><img id="captcha" src="<?php echo $this->Html->url('/pages/captcha_image');?>" alt="" /></td>-->
<!--                </tr>  -->
<!--                 <tr>-->
<!--                   <td style="text-align:left" valign="top"><a href="javascript:void(0);"-->
<!--onclick="javascript:document.images.captcha.src="<?php // echo $this->Html->url("/pages/captcha_image");?>?" + Math.round(Math.random(0)*1000)+1" >Reset</a>     -->
<!--</td>-->
<!--                   <td style="text-align:left"><img id="captcha" src="<?php //echo $this->Html->url('/pages/captcha_image');?>" alt="" /></td>-->
<!--                </tr>  -->
                		<tr>
			<td colspan="2" style="text-align: right;  padding-right:70px;">
			<?php echo $this->Form->submit('Login', array('class' => 'but-color')); ?></td>
		</tr>
		<?php echo $this->Form->end(); ?>
		<tr>
			<td colspan="2" style="text-align: right;padding-right:70px;">
			<?php echo $this->Form->input('remember_me', array('type' => 'checkbox', 'label' => ' Log me on automatically each visit')); ?></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: right;padding-right:70px;">
			<?php echo $this->Html->link('Forgot your password?', '/forgotten_password/');?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: right;padding-right:70px;">  
			<b style="color:#328dc7;">New to eloeel? </b><a href="/register"><span style="background-color: #5B9A2A; border-radius:2px;padding:5px;">Create an account</span></a></td>
		</tr>
	</table>
</div>
     <div>
         
     
       </div>
</center>

</div>
</div>

				

