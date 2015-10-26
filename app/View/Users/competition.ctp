<div id="content">
<div class="content_inner">
<h2><?php echo $compTitle;?></h2>
<?php 
$i =0;
foreach ($items as $item) :?>

<?php echo $this->Form->create('CompetitionsVote');?>	
<div style="width:auto; padding:10px; height:105px; background-color:#151515; border:solid 1px #333;border-radius: 0px;">
	<?php echo $this->Form->input('external_id',array('type'=>'hidden', 'value' =>  $item['CompetitionExternal']['external_id'])); ?>

		<div style="width:auto;height:105px; float:left; margin-bottom:5px; ">
			<a class="fancybox fancybox.iframe" href="/videos/competition_view/<?php echo $item['CompetitionExternal']['external_id']; ?>" >
			<img src="../..<?php echo $vids[$i]['Video']['thumbnail_name']; ?>" width="150" height="100" style="border:1px solid #cccccc; "/></a>
		</div>
	
		<div style="padding-left:10px;width:450px;height:auto;  margin-left:5px;margin-bottom:5px; float:left;  ">
		<a class="fancybox fancybox.iframe" href="/videos/competition_view/<?php echo $item['CompetitionExternal']['external_id']; ?>" ><b style="font-size:14px;color:#328dc7;"><?php echo $vids[$i]['Video']['title']; ?></b></a>
		
		<br/><br/>	
		<p><?php 	if (!empty($votespervid[$i])) :
				 	//echo $votespervid[$i]; 
				 	echo '<strong>Number of Votes  : </strong>' . $votespervid[$i];
			 	else :
			 		echo '<strong>Number of Votes  : </strong>' . '0'; 
			 		//echo "0" ;
			 	endif;
		?>	
		</p>
		</div>		

	
		<div style="width:80px;height:105px;margin-left:5px;  margin-bottom:5px;float:left; margin-right:10px;  ">
			<?php echo $this->Form->submit('VOTE', array('class' => 'but-color')); ?>
		</div>		
</div>
<?php echo $this->Form->end(); ?>	
<?php 
$i++;
 endforeach;?>

</div></div>