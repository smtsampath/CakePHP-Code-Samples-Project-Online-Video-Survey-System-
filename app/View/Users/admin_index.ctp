<div class="users index">
<span style="color:green"><b>There are <?php echo $num_of_active_viewers;?> active viewers out of <?php echo $num_of_viewers;?> viewers.</b></span><br />
<span style="color:orange"><b>There are <?php echo $viewer_profiles;?> viewer profiles.</b></span><br /><br />
<span style="color:blue"><b>There are <?php echo $num_of_advertisers;?> advertiser profiles.</b></span><br />
<span style="color:red"><b>There are <?php echo $num_of_admins;?> admin profiles.</b></span>
	
    <h2><?php echo __('Users');?></h2>
    <div>    
    <?php 
        echo $this->Form->create('', array('action' => 'user_search'));
        echo $this->Form->input("search", array('label' => 'search:'));
        echo $this->Form->end("Search");
    ?> 
    </div>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort('id');?></th>
            <th><?php echo $this->Paginator->sort('group_id');?></th>
            <th><?php echo $this->Paginator->sort('fullname');?></th>
            <th><?php echo $this->Paginator->sort('email');?></th>
            <th>NIC</th>
            <th>DOB</th>
            <th><?php echo $this->Paginator->sort('credit');?></th>
            <th><?php echo $this->Paginator->sort('active');?></th>
            <th><?php echo $this->Paginator->sort('created');?></th>
            
            <th class="actions"><?php echo __('Actions');?></th>
    </tr>
    <?php $x = 0;
    foreach ($users as $user): ?>
    <tr>
        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
        <?php if($user['User']['group_id'] == 1) :?>
        <td>
            <?php echo $this->Html->link('Admin', array('controller' => 'groups', 'action' => 'view', $user['User']['group_id'])); ?>
        </td>
        <?php elseif($user['User']['group_id'] == 2) :?>
        <td>
            <?php echo $this->Html->link('Viewers', array('controller' => 'groups', 'action' => 'view', $user['User']['group_id'])); ?>
        </td>
        <?php elseif($user['User']['group_id'] == 3) :?>
        <td>
            <?php echo $this->Html->link('Advertisers', array('controller' => 'groups', 'action' => 'view', $user['User']['group_id'])); ?>
        </td>
        <?php elseif($user['User']['group_id'] == 4) :?>
        <td>
            <?php echo $this->Html->link('Charities', array('controller' => 'groups', 'action' => 'view', $user['User']['group_id'])); ?>
        </td>
    
          <?php elseif($user['User']['group_id'] == 5) :?>
        <td>
            <?php echo $this->Html->link('Loyalty', array('controller' => 'groups', 'action' => 'view', $user['User']['group_id'])); ?>
        </td>
        <?php endif;?>
        <td><?php echo h($user['User']['fullname']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
        <td><?php echo h($users[$x]['Viewer']['nic']); ?>&nbsp;</td>
        <td><?php echo h($users[$x]['Viewer']['dob']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['credit']); ?>&nbsp;</td>
        <td><?php echo h($user['User']['active']? "Yes" : "No" ); ?>&nbsp;</td>
        <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
        
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
            
        </td>
    </tr>
<?php 
$x++;
endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>  </p>

    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Navigation'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Add New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Admin Profile'), array('action' => 'profile', $this->Session->read('Auth.User.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Update User Credits'), array('action' => 'credits')); ?> </li>
        <li><?php echo $this->Html->link(__('Update Daily Credit Limit'), array('action' => 'creditlimit')); ?> </li>
        <li><?php echo $this->Html->link(__('Clear Test Logs'), array('controller' => 'video_logs', 'action' => 'clear', 36 )); ?> </li>
        <li><?php echo $this->Html->link(__('Check Fake profiles'), array('controller' => 'users', 'action' => 'check_nic' )); ?> </li>
        
        <li><?php echo $this->Html->link(__('Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Viewers'), array('controller' => 'viewers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Advertisers'), array('controller' => 'advertisers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Charities'), array('controller' => 'charities', 'action' => 'index')); ?> </li>
        
        <li><?php echo $this->Html->link(__('Credit Logs'), array('controller' => 'credit_logs', 'action' => 'index')); ?> </li>
        
        <li><?php //echo $this->Html->link(__('Payment Details'), array('controller' => 'payment_details', 'action' => 'index')); ?> </li>
        
        
        
        <li><?php echo $this->Html->link(__('Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>

    </ul>
</div>
