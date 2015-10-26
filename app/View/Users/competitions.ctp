<div id="content">
<div class="content_inner">

<h2><?php echo 'Video Compitions';?></h2>
<table style="width:100%;border:none; margin-top:5px; ">
	
	<tr>
	<?php
	
	$i=0;
	foreach ($competitions as $competition) :?>
		<?php if(($i-2)==1) : ?>
		</tr>
		<tr>	
		 
	
		<?php endif; ?>
		
			<td style="width:144px; padding:5px;"  valign="top" >
				<div style="background-color:#328dc7; text-align:center; width:100%; padding-top:12px; border:solid 1px #ccc; border-radius:5px; height:30px;" >		
				<a href="/users/competition/<?php echo $competition['Competition']['id'];?>" ><b style="font-size:13px;"><?php  echo h($competition['Competition']['title']); ?></b></a>		
				</div>	
			</td>		
	<?php
		$i++;
		
	?>
<?php endforeach; ?>
	</tr>
</table>
</div></div>