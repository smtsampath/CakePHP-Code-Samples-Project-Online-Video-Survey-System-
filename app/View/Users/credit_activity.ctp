<div id="content">
<div class="content_inner">
<h2><?php echo __('Credit Activity'); ?>&nbsp;</h2>
<table style="width:100%; border:none; background-color:#151515; border-radius: 0px;">
	

	<tr>
		<td style="text-align:left; border:solid 1px #333;"><b style="color:#328dc7;">Video title</b></td>
		<td style="text-align:right;  border:solid 1px #333;"><b style="color:#328dc7;">Amount</b></td>
		<td style="text-align:right;  border:solid 1px #333;"><b style="color:#328dc7;">Balance</b></td>
		<td style="text-align:right;  border:solid 1px #333;"><b style="color:#328dc7;">Date</b></td>
	</tr>
	
	
<?php $i=0;
foreach ($creditActivities as $creditActivity) :
?>
	<tr>
		<td style="text-align:left; border-bottom:solid 1px #333;"><?php echo $videoTitles[$i]; ?></td>
		<td style="text-align:right; border-bottom:solid 1px #333;"><?php echo h($creditActivity['CreditLog']['credit_amount']);  ?></td>
		<td style="text-align:right; border-bottom:solid 1px #333;"><?php echo h($creditActivity['CreditLog']['credit_balance']); ?></td>
		<td style="text-align:right; border-bottom:solid 1px #333;"><?php echo h($creditActivity['CreditLog']['created']);  ?></td>
		
	</tr>	
<?php $i++;
endforeach; 
?>
</table>
</div></div>