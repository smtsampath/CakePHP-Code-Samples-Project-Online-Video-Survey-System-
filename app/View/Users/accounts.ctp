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
    <tr>
        <td style="text-align:left;"><?php echo __('Total Credits'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($user['User']['credit']); ?></td>
    </tr>   
<?php endforeach; ?>
    <tr>
        <td style="text-align:left; border-top:solid 1px #666;"><?php echo __('Password'); ?>&nbsp;</td>
        <td style="text-align:left;  border-top:solid 1px #666;">
        <?php echo $this->Html->link(__('Change Your Password'), '/users/accounts/change_password'); ?>
        </td>
    </tr>   
</table>
<?php if(!empty($viewers)) :?>

<h2><?php echo 'User Profile Information';?></h2>
<table style="width:100%;margin-top:5px;background-color:#151515; border:solid 0px #666;border-radius: 0px;"">
    
<?php foreach ($viewers as $viewer): ?>
    <tr>
        <td style="text-align:left;" width="40%"><?php echo __('NIC Number'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['nic']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;" width="40%"><?php echo __('Date Of Birth'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['dob']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Gender'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['gender']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Address'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['address1']); ?><br/>
        <?php echo h($viewer['Viewer']['address2']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('City'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['city']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('District'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['district']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Province'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['province']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Country'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['country']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Contact [Home]'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['contact1']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Contact [Mobile]'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['contact2']); ?></td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Education'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['education']); ?></td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Relationship Status'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['relationship_status']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Kids in My House Hold'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['num_of_kids']); ?></td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;  width:100%;"></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Employement'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['employment']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Designation'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['designation']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Career'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php echo h($viewer['Viewer']['career']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;"><?php echo __('Monthly Income'); ?>&nbsp;</td>
        <td style="text-align:left;"><?php 
        if ($viewer['Viewer']['monthly_income'] == 1){
            echo 'Less than 10,000 LKR';
        }elseif ($viewer['Viewer']['monthly_income'] == 2){
            echo '10,000 LKR - 20,000 LKR';
        }elseif ($viewer['Viewer']['monthly_income'] == 3){
            echo '20,001 LKR - 50,000 LKR';
        }elseif ($viewer['Viewer']['monthly_income'] == 4){
            echo '50,001 LKR - 100,000 LKR';
        }elseif ($viewer['Viewer']['monthly_income'] == 5){
            echo '100,000 LKR and above ';
        }
        ?></td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:left;">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:left; border-top:solid 1px #666;">
            <?php echo $this->Html->link(__('Edit Profile Details'), array('controller' => 'viewers', 'action' => 'edit', $viewer['Viewer']['id'])); ?>
        </td>
    </tr>   
<?php endforeach; ?>
</table>
<?php else : ?>

<table style="width:700px; float:right">
    <tr>
        <td colspan="2" style="text-align:left; border-top:solid 1px #666;">
            <?php echo $this->Html->link(__('Add Profile Details'), array('controller' => 'viewers', 'action' => 'add')); ?>
        </td>
    </tr>   
</table>
<?php endif;?>
</div></div>