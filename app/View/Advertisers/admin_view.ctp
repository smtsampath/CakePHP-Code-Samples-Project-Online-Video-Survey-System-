<div class="advertisers view">
<h2><?php  echo __('Advertiser');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($advertiser['User']['fullname'], array('controller' => 'users', 'action' => 'view', $advertiser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact [Mobile]'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['contact1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact [Offcie]'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['contact2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($advertiser['Advertiser']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Advertiser'), array('action' => 'edit', $advertiser['Advertiser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Advertiser'), array('action' => 'delete', $advertiser['Advertiser']['id']), null, __('Are you sure you want to delete # %s?', $advertiser['Advertiser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Advertisers'), array('action' => 'index')); ?> </li>
		
	</ul>
</div>
