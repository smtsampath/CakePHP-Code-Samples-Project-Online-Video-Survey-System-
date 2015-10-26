<div id="content">
    <div id="content_inner">
    <br /><br />
<?php echo $this->Form->create('PaymentDetail');?>
<h2><?php echo __('Add Payment Details'); ?>&nbsp;</h2>
<table style="width:auto;  background-color:#151515; border:solid 0px #151515; padding:10px; border-radius: 0px;">
    
    <tr>
        <td style="text-align:left;width:250px">&nbsp;</td>
        <td style="text-align:left;width:50px">&nbsp;</td>
        <td style="text-align:left;">&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Bank Name'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('bank_name', array('label'=>'', 'size' => '40'));?>&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Branch'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('branch', array('label'=>'', 'size' => '40'));?>&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Account Number'); ?>&nbsp;</td>
        <td style="text-align:left;width:50px">:</td>
        <td style="text-align:left;"><?php echo $this->Form->input('account_number', array('label'=>'', 'size' => '40'));?>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3"  style="text-align:right;padding-right:210px;"><?php echo $this->Form->submit('Submit', array('class' => 'but-color'));?>&nbsp;</td>
    </tr>   
    <tr>
        <td colspan="3"  style="text-align:right;padding-right:210px;"><?php echo $this->Html->link(__('Change Payment Method'), array('controller' => 'users', 'action' => 'payment_method')); ?></td>
    </tr>   
</table>
<?php echo $this->Form->end();?>

    </div><!-- end #main -->
</div><!-- end #content -->
