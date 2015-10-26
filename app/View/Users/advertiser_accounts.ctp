<div id="content">
<div class="content_inner">

<h2><?php echo 'User Information';?></h2>
<table style="width:100%; margin-top:5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">
    
<?php foreach ($users as $user): ?>
    <tr>
        <td style="text-align:left;" width="40%"><?php echo __('Full Name'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($user['User']['fullname']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Email'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($user['User']['email']); ?></td>
    </tr>  
<?php endforeach; ?>
    <tr>
        <td style="text-align:left; border-top:solid 1px #666;"><?php echo __('Password'); ?>&nbsp;</td>
        <td style="text-align:left;  border-top:solid 1px #666;">
        <?php echo $this->Html->link(__('Change Your Password'), '/users/accounts/change_password'); ?>
        </td>
    </tr>   
</table>

<?php if(!empty($advertisers)) :?>
<h2><?php echo 'Advertiser Company Information';?></h2>
<table style="width:100%; margin-top:5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">
<?php foreach ($advertisers as $advertiser): ?>
    <tr>
        <td style="text-align:left;" width="40%"><?php echo __('Company Name'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($advertiser['Advertiser']['company_name']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Address'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($advertiser['Advertiser']['address1']); ?><br/>
        <?php echo h($advertiser['Advertiser']['address2']); ?></td>
    </tr>
    
    <tr>
        <td style="text-align:left;"><?php echo __('City'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($advertiser['Advertiser']['city']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Country'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($advertiser['Advertiser']['country']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Contact [Office]'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($advertiser['Advertiser']['contact1']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Contact [Mobile]'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($advertiser['Advertiser']['contact2']); ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:left; border-top:solid 1px #666;">
            <?php echo $this->Html->link(__('Edit Company Details'), array('controller' => 'advertisers', 'action' => 'edit', $advertiser['Advertiser']['id'])); ?>
        </td>
    </tr>
        
<?php endforeach; ?>
</table>
<?php else : ?>

<table style="width:700px; float:right">
    <tr>
        <td colspan="2" style="text-align:left; border-top:solid 1px #666;">
            <?php echo $this->Html->link(__('Add Profile Details'), array('controller' => 'advertisers', 'action' => 'add')); ?>
        </td>
    </tr>   
</table>
<?php endif;?>

</div></div>