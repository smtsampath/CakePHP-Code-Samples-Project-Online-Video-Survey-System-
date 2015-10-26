<div id="separator"></div><!-- end #separator -->
<div id="content">
	<div id="main">
	<?php echo $this->Session->flash(); ?>
	<div style="background-color: #151515; width: 250px; height:auto; float: left;  padding : 10px;  border-radius: 0px;">
	
					<ul>
						<li class="widget-container">
							<h2 class="widget-title">Information</h2>
							<div class="textwidget" style="width: 240px ;text-align:justify; font-size:11px; color: white; line-height:160% ">
							<?php echo $about; ?>  
							<br />
							</div>
						</li>
					</ul>
					<hr align="left" style="background-color: #666;border: 0; width:100%;">
					<br /><br />	
					<div class="box">
                    <div class="boxHeader">
                        <h3>Contact Info</h3>
                    </div>
                    <ul>
                        <li>Email: <a class="colorlink" href="mailto:info@flipit.lk">info@flipit.lk</a></li>
                        <li>Office: <span>&nbsp;273/5, Vauxhall Street, Colombo 02, 
                        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Sri lanka</span></li>
                        <li>Tel: <span>+94 11-7209676</span></li>
                        <li>Mob: <span>+94 77-3864064</span></li>
                       <!--  <li>
                            <a href="#" title="Follow" style="float:left;"class="button left">Follow Us</a>
                            <a href="#" title="Facebook" style="float:right;"class="button left">Facebook</a>
                        </li> -->
                    </ul>
                </div>
				</div><!-- end #side -->
				<div style="width: 690px; float: right;">
					
					
					<iframe width="680" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.lk/maps/ms?msa=0&amp;msid=218283771080966946958.0004c2f62fed47c0f131e&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=6.921102,79.859619&amp;spn=0.003728,0.007296&amp;z=17&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.lk/maps/ms?msa=0&amp;msid=218283771080966946958.0004c2f62fed47c0f131e&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=6.921102,79.859619&amp;spn=0.003728,0.007296&amp;z=17&amp;source=embed" style="color:#0000FF;text-align:left">Flipit Media (Pvt) Ltd.</a> in a larger map</small>
					
					<br /><br />
					<h2 >Get in touch with us.</h2>
					<div style="width: 600px; height: auto;  padding : 35px; background-color: #151515; border: 0px solid #ededed; border-radius: 0px;">
						  <?php echo $this->Form->create(null, array('action' => 'index')); ?>		
						<table style="border:none;width:auto;">
						    <tr>
						        <td style="text-align:left">Name</td>
						        <td style="text-align:left;"><?php echo $this->Form->input('name', array('label' => false, 'maxlength' => 100, 'size' => 40)); ?></td>
						    </tr>     
						    <tr>
						        <td style="text-align:left">E-Mail</td>
						        <td style="text-align:left"><?php echo $this->Form->input('email', array('label' => false, 'maxlength' => 100, 'size' => 40)); ?></td>
						    </tr>
						    <tr>
						        <td style="text-align:left">Subject</td>
						        <td style="text-align:left"><?php echo $this->Form->input('subject', array('label' => false, 'maxlength' => 100, 'size' => 40)); ?></td>
						    </tr>
						    <tr>
						        <td style="text-align:left" valign="top">Your Message</td>
						        <td style="text-align:left"><?php echo $this->Form->input('message', array('label' => false, 'cols' => 37, 'rows' => 4)); ?></td>
						    </tr>
						    <tr>
						          <td style="text-align:right;padding-right:150px;"  ></td>
						        <td style="text-align:right;padding-right:150px;"  ><?php echo $this->Html->image($this->Html->url(array('controller'=>'contacts', 'action'=>'captcha'), true),array('style'=>'','vspace'=>2)); ?></td>
						    </tr>
						    
						   	<tr>
						        <td style="text-align:left" valign="top">Enter security code shown above:</td>
						        <td style="text-align:left"><?php echo  $this->Form->input('Contact.captcha',array('autocomplete'=>'off','label'=>false,'class'=>'','error'=>__('Failed validating code',true)));?></td>
						    </tr>
						     
						    <tr>
						        <td style="text-align:right; padding-right:223px;" colspan="2" ><br><?php echo $this->Form->submit('Send', array('class' => 'but-color')); ?></td>
						    </tr>
						</table>
						<?php echo $this->Form->end(); ?>
					</div><!-- end #contactform -->
				</div><!-- end #maincontent -->
		
		<div class="clear"></div>
	</div><!-- end #main -->
</div><!-- end #content -->

