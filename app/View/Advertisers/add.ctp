<div id="content">
	<div class="content_inner">
		<?php echo $this->Form->create('Advertiser');?>
		<h2><?php echo __('Add Company Information'); ?>&nbsp;</h2>
		<table align="center" style="width:auto; padding:10px; margin-left:175px; float:left;border:0px;background-color:#151515;border-radius:0px ">
			<tr>
				<td style="text-align:left;width:250px">&nbsp;</td>
				<td style="text-align:left;width:50px">&nbsp;</td>
				<td style="text-align:left;">&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left;"><?php echo __('Company Name'); ?>&nbsp;</td>
				<td style="text-align:left;width:50px">:</td>
				<td style="text-align:left;"><?php echo $this->Form->input('company_name', array('label'=>'', 'size' => 40));?>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left;"><?php echo __('Address Line1'); ?>&nbsp;</td>
				<td style="text-align:left;width:50px">:</td>
				<td style="text-align:left;"><?php echo $this->Form->input('address1', array('label'=>'', 'size' => 40));?>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left;"><?php echo __('Address Line2'); ?>&nbsp;</td>
				<td style="text-align:left;width:50px">:</td>
				<td style="text-align:left;"><?php echo $this->Form->input('address2', array('label'=>'', 'size' => 40));?>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left;"><?php echo __('City'); ?>&nbsp;</td>
				<td style="text-align:left;width:50px">:</td>
				<td style="text-align:left;"><?php echo $this->Form->input('city', array('label'=>'', 'size' => 40));?>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left;"><?php echo __('Country'); ?>&nbsp;</td>
				<td style="text-align:left;width:50px">:</td>
				<td style="text-align:left;"><?php echo $this->Form->input('city', array('label'=>'', 'size' => 40));?>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align:left;"><?php echo __('Contact [Office]'); ?>&nbsp;</td>
				<td style="text-align:left;width:50px">:</td>
				<td style="text-align:left;"><?php echo $this->Form->input('contact1', array('label'=>'','maxlength'=>'12'));?>&nbsp;
				<div style=" margin-left: 150px; margin-top: -35px; background-color:#151515; width:auto; height:auto;">Eg: +94112000555</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left;"><?php echo __('Contact [Mobile]'); ?>&nbsp;</td>
				<td style="text-align:left;width:50px">:</td>
				<td style="text-align:left;"><?php echo $this->Form->input('contact2', array('label'=>'','maxlength'=>'12'));?>&nbsp;
				<div style=" margin-left: 150px; margin-top: -35px; background-color:#151515; width:auto; height:auto;">Eg: +94712555555</div>
				</td>
				
			</tr>
			<tr>
				<td colspan="3" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:right;padding-right:212px;"><?php echo $this->Form->submit('Submit', array('class' => 'but-color'));?>&nbsp;</td>
			</tr>
			
		</table>
		<div class="clear"></div>
	</div><!-- end #main -->
</div><!-- end #content -->