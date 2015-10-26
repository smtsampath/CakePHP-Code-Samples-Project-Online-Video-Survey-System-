
<div id="content">
	<div id="content_inner">
	<br /><br />
<?php echo $this->Form->create('User');?>
<h2><?php echo __('Change Your Password'); ?>&nbsp;</h2>
<table style="width:auto;  background-color:#151515; border:solid 0px #151515; padding:10px; border-radius: 0px;">
	
	<tr>
		<td style="text-align:left;width:250px">&nbsp;</td>
		<td style="text-align:left;width:50px">&nbsp;</td>
		<td style="text-align:left;">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align:left;"><?php echo __('Current Password   :'); ?>&nbsp;</td>
		<td style="text-align:left;width:50px">:</td>
		<td style="text-align:left;"><?php echo $this->Form->input('old_password', array('type' => 'password', 'label'=>'' , 'size' => 40));?>&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align:left;"><?php echo __('New Password '); ?>&nbsp;</td>
		<td style="text-align:left;width:50px">:</td>
		<td style="text-align:left;"><?php echo $this->Form->input('new_password', array('type' => 'password', 'label'=>'' , 'size' => 40));?>&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align:left;"><?php echo __('Confirm Password'); ?>&nbsp;</td>
		<td style="text-align:left;width:50px">:</td>
		<td style="text-align:left;"><?php echo $this->Form->input('confirm_password', array('type' => 'password', 'label'=>'', 'size' => 40));?>&nbsp;</td>
		
	</tr>
	
	<tr>
		<td colspan="3"  style="text-align:right;padding-right:210px;"><?php echo $this->Form->submit('Submit', array('class' => 'but-color'));?>&nbsp;</td>
	</tr>		
</table>
<?php echo $this->Form->end();?>

	</div><!-- end #main -->
</div><!-- end #content -->
