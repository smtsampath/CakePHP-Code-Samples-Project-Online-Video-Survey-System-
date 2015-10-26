<div id="content">
<div class="content_inner">

<?php if ($current_pay_method == 'bank'): ?>
    <?php if ($paymentDetails == false): ?>
    <?php // echo $this->Form->create('PaymentDetail', array('url' => array('controller' => 'payment_details','action' => 'add', )));?>
    <h2><?php echo 'Payment Details';?></h2>
    
    <table style="width:550px; margin-top:5px;  background-color:#151515; border:solid 0px #666;border-radius: 0px;">
    
        <tr>
            <td style="text-align:left;width:250px "><?php echo __('Bank Name'); ?>&nbsp;</td>
            <td style="text-align:left;width:50px">:</td>
            <td style="text-align:left;"><?php echo '_ _ _ _ _ _ _ _'; ?></td>
        </tr>
        <tr>
            <td style="text-align:left;"><?php echo __('Branch'); ?>&nbsp;</td>
            <td style="text-align:left;width:50px">:</td>
            <td style="text-align:left;"><?php echo '_ _ _ _ _ _ _ _'; ?></td>
        </tr>
        <tr>
            <td style="text-align:left;"><?php echo __('Account Number'); ?>&nbsp;</td>
            <td style="text-align:left;width:50px">:</td>
            <td style="text-align:left;"><?php echo '_ _ _ _ _ _ _ _'; ?></td>
        </tr>
    
        <tr>
            <td colspan="3" style="text-align:left; border-top:solid 1px #666;">
                <?php echo $this->Html->link(__('Add Payment Details'), array('controller' => 'payment_details', 'action' => 'add')); ?>
            </td>
        </tr>   
        
    </table>
    <?php //echo $this->Form->end();?>
    
    <?php else : ?>
    <h2><?php echo 'Payment Details';?></h2>
    <table style="width:550px; margin-top:5px;  background-color:#151515; border:solid 0px #666;border-radius: 0px;">
        
    <?php foreach ($paymentDetails as $paymentDetail): ?>
        <tr>
            <td style="text-align:left;width:250px "><?php echo __('Bank Name'); ?>&nbsp;</td>
            <td style="text-align:left;width:50px">:</td>
            <td style="text-align:left;"><?php echo h($paymentDetail['PaymentDetail']['bank_name']); ?></td>
        </tr>
        <tr>
            <td style="text-align:left;"><?php echo __('Branch'); ?>&nbsp;</td>
            <td style="text-align:left;width:50px">:</td>
            <td style="text-align:left;"><?php echo h($paymentDetail['PaymentDetail']['branch']); ?></td>
        </tr>
        <tr>
            <td style="text-align:left;"><?php echo __('Account Number'); ?>&nbsp;</td>
            <td style="text-align:left;width:50px">:</td>
            <td style="text-align:left;"><?php echo h($paymentDetail['PaymentDetail']['account_number']); ?></td>
        </tr>
    
        <tr>
            <td colspan="2" style="text-align:left; border-top:solid 1px #666;">
                <?php echo $this->Html->link(__('Edit Payment Details'), array('controller' => 'payment_details', 'action' => 'edit', $paymentDetail['PaymentDetail']['id'])); ?>
            </td>
            <td colspan="1" style="text-align:left; border-top:solid 1px #666;">
                <?php echo $this->Html->link(__('Change Payment Method'), array('controller' => 'users', 'action' => 'payment_method', $this->Session->read('Auth.User.id'))); ?>
            </td>
        </tr>   
    <?php endforeach; ?>
    </table>
    <?php endif; ?>
<?php elseif ($current_pay_method == 'check'): ?>
<h2><?php echo 'Payment Method';?></h2>

<table style="width:550px; margin-top:5px;  background-color:#151515; border:solid 1px #666;border-radius: 0px;">

    <tr>
        <td colspan="3" style="text-align:left; font-size:15px;  border-bottom:solid 1px #666;"><b>Pay me by check</b> </td>
    </tr>
    <tr>
        <td colspan="2" rowspan="5" style="text-align:left;">Your check will be sent to this address</td>
    </tr>
    <tr>
        <td style="text-align:left; width:300px "><?php echo $address1;?></td>
    </tr>
    <tr>
        <td style="text-align:left; "><?php echo $address2;?></td>
    </tr>
    <tr>
        <td style="text-align:left; "><?php echo $city;?></td>
    </tr>
    <tr>
        <td style="text-align:left; "><?php echo $country;?></td>
    </tr>
    <tr>
            <td colspan="3" style="text-align:left; border-top:solid 1px #666;">
                <?php echo $this->Html->link(__('Change Payment Method'), array('controller' => 'users', 'action' => 'payment_method', $this->Session->read('Auth.User.id'))); ?>
            </td>
        </tr>
</table>
<?php else :?>
<h2><?php echo 'Payment Information';?></h2>

<table style="width:550px; margin-top:5px;  background-color:#151515; border:solid 1px #666;border-radius: 0px;">

    
    <tr>
            <td style="text-align:left; ">
                <?php echo $this->Html->link(__('Update Your Payment Method'), array('controller' => 'users', 'action' => 'payment_method', $this->Session->read('Auth.User.id'))); ?>
            </td>
        </tr>
</table>
<?php endif; ?>


<table style="width:auto; background:url(../images/table_td.png) repeat-x; border-radius: 5px; border:none;">
    <tr>
        <td  style="text-align:center; padding:5px; background:url(../img/View_icon.png) no-repeat 5px 5px; height:24px; width: 30px;">
        </td>
        <td  style="text-align:left; padding-bottom:10px; color:#328dc7; width: auto; font-size:16px; "  >
        <a href="/users/payments/reports" ><b style="color:#328dc7;"><?php echo __('Credit Report'); ?></b>&nbsp;</a></td>
        
    </tr>
</table>

</div></div>