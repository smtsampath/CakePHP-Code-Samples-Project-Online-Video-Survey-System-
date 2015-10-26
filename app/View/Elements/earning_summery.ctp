

<div id="summery" style="width:212px; margin-left:-212px;float:left; margin-top:250px">
<table style="width:100%; border:solid 1px #5B9A2A; border-radius:5px;">
        <tr>
		<th colspan="2" style="text-align:left;  text-align:center;  border:solid 1px #5B9A2A; background-color:#000;  border-top-left-radius:5px; border-top-right-radius:5px; padding-left:5px; font-size:13px;">Earning Summery</th>
		</tr>
        <tr>
		<td style="text-align:left; padding-left:5px;  font-size:13px;">Number of Videos watched today :</td>
		<td style="text-align:left;; font-size:13px;"><b style="color:#5B9A2A;"><?php echo $vidsWatchedToday ;?></b></td>
		</tr>
		<tr>
		<td  style="text-align:left; padding-left:5px; font-size:13px;">Total videos watched this month :</td>
		<td style="text-align:left;; font-size:13px;"><b style="color:#5B9A2A;"><?php echo $vidsWatchedThisMonth ;?></b></td>
		</tr>
		<tr>
		<td style="text-align:left; padding-left:5px; font-size:13px;">Total credits :</td>
		<td style="text-align:left;; font-size:13px;"><b style="color:#328dc7;"><?php echo $totalCredits ;?></b></td>
		</tr>
		<tr>
		<td  style="text-align:left; padding-left:5px; font-size:13px;">Your trust score:</td>
		<td style="text-align:left; width:38%; font-size:13px;"><span class="progressBar pb5"><?php echo  $trust.'/16000'?></span><iframe style="display: none;" name="progressFrame"></iframe></td>
		</tr>
		<tr>
		<td colspan="2" style="text-align:left; padding-left:5px; font-size:13px;"><div id="progressbar"></div></td>
		</tr>
		<tr>
        <td colspan="2" style="text-align:left; padding-left:5px; font-size:13px;"><?php echo number_format($bar, 2, '.', '');; ?>%</td>
        </tr>
		<?php if ($creditlimitreached): ?>
		<tr>
		<td colspan="2" style="text-align:left; padding-left:5px; font-size:13px;"><b style="color:#F61908;">You Have reached your credit limit</b></td>
		</tr>
		
		<?php endif; ?>
		<?php if ($skipped): ?>
        <tr>
        <td colspan="2" style="text-align:left; padding-left:5px; font-size:13px;"><b style="color:#F61908;">Your profile is incomplete. </b><a href="/viewers/add">Click here!!</a></td>
        </tr>
        
        <?php endif; ?>
		</table>
        <div>
<!--        <a href="/charities">donate</a>-->

        </div>
        
       <div>
      
     
       </div>
</div> 
