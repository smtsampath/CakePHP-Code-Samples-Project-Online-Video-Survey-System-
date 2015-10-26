<div class="viewers view">
<h2><?php  echo __('Viewer');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($viewer['User']['fullname'], array('controller' => 'users', 'action' => 'view', $viewer['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NIC'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['nic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['district']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact1'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['contact1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact2'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['contact2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['education']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relationship Status'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['relationship_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Of Kids'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['num_of_kids']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employment'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['employment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Career'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['career']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monthly Income'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['monthly_income']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($viewer['Viewer']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Viewer'), array('action' => 'edit', $viewer['Viewer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Viewer'), array('action' => 'delete', $viewer['Viewer']['id']), null, __('Are you sure you want to delete # %s?', $viewer['Viewer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Viewers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Viewer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
