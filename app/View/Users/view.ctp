<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Full Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['fullname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Credit'); ?></dt>
		<dd>
			<?php echo h($user['User']['credit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($user['User']['active']? "Yes" : "No" ); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
	
	<?php if($user['Group']['id'] == '2') { ?>

		<h3><?php echo __('User Profile');?></h3>
	<?php if (!empty($user['Viewer'])):?>
		<dl>			
		<dt><?php echo __('Dob');?></dt>
		<dd>
	<?php echo $user['Viewer']['dob'];?>
&nbsp;</dd>
		<dt><?php echo __('Gender');?></dt>
		<dd>
	<?php echo $user['Viewer']['gender'];?>
&nbsp;</dd>
		<dt><?php echo __('Address1');?></dt>
		<dd>
	<?php echo $user['Viewer']['address1'];?>
&nbsp;</dd>
		<dt><?php echo __('Address2');?></dt>
		<dd>
	<?php echo $user['Viewer']['address2'];?>
&nbsp;</dd>
		<dt><?php echo __('City');?></dt>
		<dd>
	<?php echo $user['Viewer']['city'];?>
&nbsp;</dd>
		<dt><?php echo __('Province');?></dt>
		<dd>
	<?php echo $user['Viewer']['province'];?>
&nbsp;</dd>
		<dt><?php echo __('Country');?></dt>
		<dd>
	<?php echo $user['Viewer']['country'];?>
&nbsp;</dd>
		<dt><?php echo __('Contact1');?></dt>
		<dd>
	<?php echo $user['Viewer']['contact1'];?>
&nbsp;</dd>
		<dt><?php echo __('Contact2');?></dt>
		<dd>
	<?php echo $user['Viewer']['contact2'];?>
&nbsp;</dd>
		<dt><?php echo __('Created');?></dt>
		<dd>
	<?php echo $user['Viewer']['created'];?>
&nbsp;</dd>
		<dt><?php echo __('Updated');?></dt>
		<dd>
	<?php echo $user['Viewer']['updated'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Profile Infomation'), array('controller' => 'viewers', 'action' => 'edit', $user['Viewer']['id'])); ?></li>
			</ul>
		</div>

		
<?php } elseif ($user['Group']['id'] == '3')  {?>	
		<h3><?php echo __('Advertise Profile');?></h3>
	<?php if (!empty($user['Advertiser'])):?>
		<dl>			
		<dt><?php echo __('Company Name');?></dt>
		<dd>
	<?php echo $user['Advertiser']['company_name'];?>
&nbsp;</dd>
		<dt><?php echo __('Address1');?></dt>
		<dd>
	<?php echo $user['Advertiser']['address1'];?>
&nbsp;</dd>
		<dt><?php echo __('Address2');?></dt>
		<dd>
	<?php echo $user['Advertiser']['address2'];?>
&nbsp;</dd>
		<dt><?php echo __('City');?></dt>
		<dd>
	<?php echo $user['Advertiser']['city'];?>
&nbsp;</dd>
		<dt><?php echo __('Country');?></dt>
		<dd>
	<?php echo $user['Advertiser']['country'];?>
&nbsp;</dd>
		<dt><?php echo __('Contact1');?></dt>
		<dd>
	<?php echo $user['Advertiser']['contact1'];?>
&nbsp;</dd>
		<dt><?php echo __('Contact2');?></dt>
		<dd>
	<?php echo $user['Advertiser']['contact2'];?>
&nbsp;</dd>
		<dt><?php echo __('Created');?></dt>
		<dd>
	<?php echo $user['Advertiser']['created'];?>
&nbsp;</dd>
		<dt><?php echo __('Updated');?></dt>
		<dd>
	<?php echo $user['Advertiser']['updated'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Profile Infomation'), array('controller' => 'advertisers', 'action' => 'edit', $user['Advertiser']['id'])); ?></li>
			</ul>
		</div>
<?php } ?>		
</div>
<?php if ($user['Group']['id'] == '3') :?>	
<div class="related">
	<h3><?php echo __('Related Videos');?></h3>
	<?php if (!empty($user['Video'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Target'); ?></th>
		<th><?php echo __('Credit Value'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Response Time Length'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Video'] as $video): ?>
		<tr>
			<td><?php echo $video['id'];?></td>
			<td><?php echo $video['title'];?></td>
			<td><?php echo $video['target'];?></td>
			<td><?php echo $video['credit_value'];?></td>
			<td><?php echo $video['start_date'];?></td>
			<td><?php echo $video['end_date'];?></td>
			<td><?php echo $video['status'];?></td>
			<td><?php echo $video['response_time_length'];?></td>
			<td><?php echo $video['tags'];?></td>
			<td><?php echo $video['created'];?></td>
			<td><?php echo $video['updated'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'videos', 'action' => 'view', $video['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'videos', 'action' => 'edit', $video['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'videos', 'action' => 'delete', $video['id']), null, __('Are you sure you want to delete # %s?', $video['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
</div>
<?php endif; ?>

		