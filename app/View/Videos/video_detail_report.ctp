<?php $this->Html->script(array('https://www.google.com/jsapi'), array('inline' => false)); ?>
<script type="text/javascript">
<!--
var $chart = 0;
//-->
</script>
<div id="content">
<div class="content_inner">

<h2><?php echo 'Video Information';?></h2>
<table style="width:100%; margin-top:5px; background-color:#151515; border:solid 0px #666;border-radius: 0px;">
    <tr>
        <td style="text-align:left;color: #ececec; font-size:15px;" width="40%"><?php echo __('Title'); ?>&nbsp;</td>
        <td style="text-align:left;color: #ececec; font-size:15px;"><strong><?php echo h($video['Video']['title']); ?></strong></td>
    </tr>
    <tr>
        <td style="text-align:left;color: #ececec; font-size:15px;" width="40%"><?php echo __('Time period'); ?>&nbsp;</td>
        <td style="text-align:left;color: #ececec; font-size:15px;"><?php echo h($video['Video']['start_date']); ?> to <?php echo h($video['Video']['end_date']); ?></td>
    </tr>
    <tr>
        <td style="text-align:left;color: #ececec; font-size:15px;" width="40%"><?php echo __('Status'); ?>&nbsp;</td>
        <td style="text-align:left;color: #ececec; font-size:15px;"><?php echo h($video['Video']['status']); ?></td>
    </tr>
     <tr>
        <td style="text-align:left;color: #ececec; font-size:15px;" width="40%"><?php echo __('Credit/View'); ?>&nbsp;</td>
        <td style="text-align:left;color: #ececec; font-size:15px;"><?php echo h($video['Video']['credit_value']); ?><span style="color:green"> eels</span></td>
    </tr>
     <tr>
        <td  colspan="2" style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;   width:100%;"></td>
    </tr>
    
    <tr>
        <td style="text-align:left;color: #ececec; font-size:15px;" width="40%"><?php echo __('Number of Views'); ?>&nbsp;</td>
        <td style="text-align:left;color: #ececec; font-size:15px;"><?php echo h($video['Video']['video_views']); ?><span style="font-size: 15px"> / </span><?php echo h($video['Video']['max_view'])?></td>
    </tr>
 </table>
 
<h2><?php echo 'Feedback Information';?></h2>
<div style="width:100%; margin-top:5px;  border:solid 0px #666;color: #ececec;border-radius: 0px;">
    <?php $x =0;
    foreach ($video_details as $video_detail) :?>
   <div style="width: 100%; height: 250px;  margin-top: 20px;background-color:#151515; padding : 5px;">
   
        <div style="text-align:left; font-size : 13px " width="40%"><?php echo __('Question'); ?> :
       <?php echo h($video_detail['VideoFeedback']['question']); ?></div>
    
  <div  style="text-align:left;"><hr align="left" style="background-color: #000;border: 0;   width:100%;"></div>    
       
<div width="48%" style="float: left; height: 200px; margin-top: 10px" >
    <?php foreach ($video_details[$x]['VideoFeedback']['VideoFeedbackOption'] as $options) :?>
   
    <?php //    prd($options);?>
    
    
        <div style="text-align:left; font-size: 11px" width="40%"><?php  echo h($options['VideoFeedbackOption']['option']); ?>&nbsp;<br /><br />
        <?php //echo h($options['VideoFeedbackOption']['number_of_records']); ?> </div>
    
    
    <?php  endforeach;?>
    
    </div>
   <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Option', 'Value'],
          <?php $count_record = count($video_details[$x]['VideoFeedback']['VideoFeedbackOption']);
         // prd($count_record);
          ?> 
          <?php 
          $d =0;
          foreach ($video_details[$x]['VideoFeedback']['VideoFeedbackOption'] as $options) :?>   
          <?php if ($d < $count_record) {?>
          ['<?php echo $options['VideoFeedbackOption']['option']; ?>',  <?php echo $options['VideoFeedbackOption']['number_of_records']?>],
          <?php }else { ?>
          ['<?php echo $options['VideoFeedbackOption']['option']; ?>',  <?php echo $options['VideoFeedbackOption']['number_of_records']?>]
          <?php } ?>
          <?php $d++;
          endforeach;?>
         
        ]);

        var options = {
          title: 'Options break down'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'+<?php echo $x;?>));
        chart.draw(data, options);
      }
     
      
    </script>
 
        <div style="float: right" width="48%"><div id="chart_div<?php echo $x; ?>" style="width: 400px; height: 180px;"></div></div>
        
    

       
</div>
     <?php  $x++;
    endforeach;?>
    
 </div>





</div>
</div>