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

$cakeDescription = __d('cake_dev', 'Eloeel.com | Video');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>
		<?php //echo $title_for_layout; ?>
		Eloeel.com | Watch an Ad, Take a Survey, Start Earning.
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
	
	<link rel="stylesheet" href="css/slider_themes/default/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/slider_themes/light/light.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/slider_themes/dark/dark.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/slider_themes/bar/bar.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/slider_style.css" type="text/css" media="screen" />
	<script src="js/ac_runactivecontent.js" type="text/javascript"></script>
	
	<?php

	
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
 ////////////////////////////////// -->
 //      Layout Stylesheets      // -->
 ////////////////////////////////// -->
 	echo $this->Html->css('jquery.fancybox');
	echo $this->Html->css('basic');
	echo $this->Html->css(array('/css/blue/blue.css'), array('inline' => false));
	echo $this->Html->css('jquery.tabs');
	echo $this->Html->css('home_video-js');
	//echo $this->Html->css('style');
	
 ////////////////////////////////// -->
 //      Slider Stylesheets      // -->
 ////////////////////////////////// -->	
 /*	echo $this->Html->css(array('/css/slider_themes/default/default.css'), array('inline' => false, 'media' => 'screen')); 
	echo $this->Html->css(array('/css/slider_themes/light/light.css'), array('media' => 'screen')); 
	echo $this->Html->css(array('/css/slider_themes/dark/dark.css'), array('media' => 'screen')); 
	echo $this->Html->css(array('/css/slider_themes/bar/bar.css'), array('media' => 'screen')); 
	echo $this->Html->css(array('/css/nivo-slider.css'), array('media' => 'screen')); 
	echo $this->Html->css(array('/css/slider_style.css'), array('media' => 'screen')); */
	
	
 ////////////////////////////////// -->
 //      Javascript Files        // -->
 ////////////////////////////////// -->
 		
		$this->Html->script(array('/js/theme/cufon-yui.js'), array('inline' => false));
		$this->Html->script(array('/js/theme/Century_Gothic_400-Century_Gothic_700-Century_Gothic_italic_400.font.js'), array('inline' => false));
		$this->Html->script(array('/js/theme/js1.js'), array('inline' => false));
		
	
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-35250147-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	
</head>
<body >
	
	<div id="wrapper">
		
			<?php  echo $this->element('header'); ?>	
			
			
			<?php  //echo $this->fetch('content'); ?>
			<div id="container">				
			
				<?php echo $this->Session->flash(); ?>					
				<?php  echo $this->fetch('content'); ?>
			</div>	
	
			<div id="footer_inner">			
				<?php echo $this->element('footer'); ?>	
			</div>		
	</div><!-- end #wrapper -->
	
	<script src="js/jquery.history_remote.pack.js" type="text/javascript"></script>
	<script src="js/jquery.tabs.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {
			$('#container-1').tabs({ fxFade: true, fxSpeed: 'fast' });
		});
	</script>
	<script src="js/common.js" type="text/javascript"></script>	
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
</body>
</html>
