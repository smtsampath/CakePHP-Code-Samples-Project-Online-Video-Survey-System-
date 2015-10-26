<div id="content">
	<div class="content_inner">
		<h2><?php echo __('Reset Your Password'); ?>&nbsp;</h2>
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Form->create();	?>
		<table align="center" style="width:450px; padding:10px; margin-left:270px; border:0px; background-color:#151515;border-radius:0px ">
			<tr>
				<td colspan="2" style="text-align:center;"><b style="font-size:18px; color:#5B9A2A;">Please enter your email address below</b></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:left;">&nbsp;</td>
			</tr>
			<tr>
				
				<td style="text-align:center; padding-left:50px;  width:200px;"><?php echo $this->Form->input('email', array('label'=>'', 'size'=> '40')); ?></td>
				<td style="text-align:left;  "><?php echo $this->Form->submit('Reset', array('class' => 'but-color'));?>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:left;">&nbsp;</td>
			</tr>
		</table>
	</div>
</div>
