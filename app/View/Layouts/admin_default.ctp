<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Eloeel.com | Eloeel: Admin');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php echo $this->Html->meta(
		'keywords',
			'eloeel.com, eloeel, watch videos, online money, online surveys, earn cash'
		);
	?>
	<?php echo $this->Html->meta(
		'description',
			'With Eloeel.com, you can earn real cash, instantly by watching ads online and giving your feedback to leading brands by taking brief surveys.'
		);
	?> 
	<meta name="google-site-verification" content="LyqSF9YK93GktYrUXM_AZaH095LZnspzcAxsLAE1fSA" />
	<style>
		@font-face {
		  font-family: 'Yanone Kaffeesatz';
		  font-style: normal;
		  font-weight: 400;
		  src: local('Yanone Kaffeesatz'), url('<?php echo $this->Html->url('/files/font.ttf')?>') format('truetype');
		}

	</style>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('jquery.fancybox');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('admin');
		echo $this->Html->css('admin_video-js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Eloeel.com | Eloeel: Admin</h1>
		</div>
		
		<div class="menu">
        	<ul>        		
        		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('CMS'), array('controller' => 'docs', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Events'), array('controller' => 'events', 'action' => 'index')); ?></li>	
				<li><?php echo $this->Html->link(__('Videos'), array('controller' => 'videos', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Votes'), array('controller' => 'competitions', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Menus'), array('controller' => 'menus', 'action' => 'index')); ?></li>					
				<li><?php echo $this->Html->link(__('View Site'), '/'); ?></li>								
				
            </ul>
        </div>
     
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php //echo $this->Session->flash('auth'); ?>
			<div align="right" style="float:right; margin-right:50px; width: 500px">Welcome <b style="color:#000;"><?php echo $this->Session->read('Auth.User.email'); ?>
			</b>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $this->Html->link(__('Logout'), '/logout/'); ?> </div>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
