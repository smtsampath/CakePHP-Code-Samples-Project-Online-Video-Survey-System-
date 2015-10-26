<div id="content">
<div class="content_inner">

<h2><?php echo 'Videos Summary';?></h2>
<div style="width:100%; margin-top:5px;  border:solid 0px #666;border-radius: 0px;">
   <?php foreach ($videos as $video):?>
   <div style="text-align:left; background-color:#151515; color: #ececec; font-size:15px; width: 80%">
	   <div style="width: 120px; float : left; padding: 5px">
		   <a href="/videos/video_detail_report/<?php echo $video['Video']['id'];?>" >
		   <img src="../../<?php echo $video['Video']['thumbnail_name'];?>" width="110" height="80" /></a>     
	   </div>
	   <div style="width: 70%; float : right; border-top: 0px">
		  <table style="border-top:0px">
		      <tr>
		          <td style="text-align:left;color: #ececec; "> <?php echo __('Title'); ?>&nbsp;</td>
		          <td style="text-align:left;color: #ececec; "><strong><?php echo h($video['Video']['title']); ?></strong></td>
		      </tr>
		       <tr>
                  <td style="text-align:left;color: #ececec; "> <?php echo __('Duration'); ?>&nbsp;</td>
                  <td style="text-align:left;color: #ececec; "><?php echo h($video['Video']['start_date']); ?> to <?php echo h($video['Video']['end_date']); ?></td>
              </tr>
              <tr>
                  <td style="text-align:left;color: #ececec; "> <?php echo __('Status'); ?>&nbsp;</td>
                  <td style="text-align:left;color: #ececec; "><?php echo h($video['Video']['status']); ?> </td>
              </tr>
              <tr>
                  <td style="text-align:left;color: #ececec; "> <?php echo __('Views'); ?>&nbsp;</td>
                  <td style="text-align:left;color: #ececec; "><?php echo h($video['Video']['video_views']); ?> / <?php echo $video['Video']['max_view'];?> </td>
              </tr>
              <tr>
                  <td colspan="2" style="text-align:left;color: #ececec; "><a style="font-size: 16px; color: green" href="/videos/video_detail_report/<?php echo $video['Video']['id'];?>"><b>View full report</b></a></td>
              </tr>
		  
		  
		  </table>
		  
		  
		   
	   </div>
	</div>
	<div class="clear" ></div>
    <?php endforeach;?>
    
</div>
<div class="clear"></div>
<div style="float:right"><a style="color: red" href="/advertisers/reports">Generate Report</a>
    
    </div>

</div>
</div>