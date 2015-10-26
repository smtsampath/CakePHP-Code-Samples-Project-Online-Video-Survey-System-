
<?php 

echo $this->Html->css('prettyPhoto');
echo $this->Html->css('inner');

$this->Html->script(array('/js/theme/jquery.prettyPhoto.js'), array('inline' => false));
$this->Html->script(array('/js/theme/fade.js'), array('inline' => false));
$this->Html->script(array('/js/theme/js3.js'), array('inline' => false));	
		
?>

<table style="width:700px; float: right;">
<?php 
		foreach ($videos as $video): ?>
		
  <tr>
   <td><b><?php echo h($video['Video']['title']); ?></b></td>
  	<td><?php echo $this->Html->link(__('Add Filter'), array('controller'=>'videos' , 'action' => 'filterpage', $video['Video']['id'])); ?>
	</td>
  </tr>
  <?php endforeach; ?>
</table>

			
		<div class="clear"></div>
			
