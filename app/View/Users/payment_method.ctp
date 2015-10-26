<div id="content">
<div class="content_inner">
<?php echo $this->Form->create('User');?>
<h2><?php echo __('Update Payment Method'); ?>&nbsp;</h2>
<table style="width:auto;  background-color:#151515; border:solid 0px #666; padding:10px; border-radius: 0px;">
	
	<tr>
		<td style="text-align:left;width:250px">&nbsp;</td>
		<td style="text-align:left;width:50px">&nbsp;</td>
		<td style="text-align:left;">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align:left;"><?php echo __('Select Your Payment Method'); ?>&nbsp;</td>
		<td style="text-align:left;width:50px">:</td>
		<td style="text-align:left;"> 
		<?php echo $this->Form->input('id'); ?>
		<?php	echo $this->Form->input('payment_method', 
										array('label'=>'', 'type' => 'select',
											'options' => array(
												'' => '__Select___',
									            'check' => 'Pay me by check ',
									            'bank' => 'Pay me by bank deposit',
				        					),															
										));
		?>
		
		
		</td>
	</tr>
	<tr>
		<td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #666;border: 0;  width:100%;"></td>
	</tr>	
	<tr>
		<td colspan="3"  style="text-align:right;padding-right:103px;"><?php echo $this->Form->submit('Submit', array('class' => 'but-color'));?>&nbsp;</td>
	</tr>		
</table>
<?php echo $this->Form->end();?>


</div></div>
