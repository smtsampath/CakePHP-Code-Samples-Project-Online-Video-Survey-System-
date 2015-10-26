<?php $this->Html->script(array('https://www.google.com/jsapi'), array('inline' => false)); ?>
<script type="text/javascript">
<!--
var $chart = 0;
//-->
</script>

<div class="users index">
<span style="color:green"><b>There are <?php echo $num_of_active_viewers;?> active viewers out of <?php echo $num_of_viewers;?> viewers.</b></span><br />
<span style="color:orange"><b>There are <?php echo $viewer_profiles;?> viewer profiles.</b></span><br /><br />
<span style="color:blue"><b>There are <?php echo $num_of_advertisers;?> advertiser profiles.</b></span><br />
<span style="color:red"><b>There are <?php echo $num_of_admins;?> admin profiles.</b></span>

<div style="width:70%; height:300px; padding:50px;border-bottom: 2px Solid #000">    
     
<h2><?php echo __('District Break down');?></h2>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Option', 'Value'],
         
          <?php 
          $d =0;
          foreach ($districts_details as $district) :?>   
          <?php if ($d < $district['Num']) {?>
          ['<?php echo $district['Dis']; ?>',  <?php echo $district['Num'];?>],
          <?php } ?>
          <?php 
          endforeach;?>
         
        ]);

        var options = {
          title: 'Options break down'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
     
      
    </script>
    
      <div style="float: right" width="48%"><div id="chart_div1" style="width: 500px; height:250px;"></div></div>
      
</div>      
      
<div style="width:70%;  height:300px;padding:50px; margin-bottom:0px;border-bottom: 2px Solid #000">    
      <h2><?php echo __('Province Break Down');?></h2>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Option', 'Value'],
         
          <?php 
          $d =0;
          foreach ($provinces_details as $province) :?>   
          <?php if ($d < $province['Num']) {?>
          ['<?php echo $province['Prov']; ?>',  <?php echo $province['Num'];?>],
          <?php } ?>
          <?php 
          endforeach;?>
         
        ]);

        var options = {
          title: 'Options break down'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
     
      
    </script>
  <div style="float: right" width="48%"><div id="chart_div2" style="width: 500px; height: 250px;"></div></div>
</div>
<div style="width:70%; height:300px; padding:50px;border-bottom: 2px Solid #000"> 
<h2><?php echo __('Gender Break down');?></h2>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Option', 'Value'],
          ['Males',  <?php echo $genders['Males']; ?>],
          ['Females', <?php echo $genders['Females']; ?>],
          
        ]);

        var options = {
          title: 'Options break down'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
     
      
    </script>
    
      <div style="float: right" width="48%"><div id="chart_div3" style="width: 500px; height:250px;"></div></div>
      
</div> 
<div style="width:70%; height:300px; padding:50px;border-bottom: 2px Solid #000"> 
<h2><?php echo __('Age groups Break down');?></h2>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Option', 'Value'],
          <?php foreach ( $age_groups as $age_group) :?>
          ['<?php echo $age_group['Agegroup'];?>',  <?php  echo $age_group['NumberOfViewers']; ?>],
          <?php endforeach;?>
        ]);

        var options = {
          title: 'Options break down'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
      }
     
      
    </script>
    
      <div style="float: right" width="48%"><div id="chart_div4" style="width: 500px; height:250px;"></div></div>
      
</div> 
</div>
<div class="actions">
    <h3><?php echo __('Navigation'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Add New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Admin Profile'), array('action' => 'profile', $this->Session->read('Auth.User.id'))); ?></li>
        <li><?php echo $this->Html->link(__('Update User Credits'), array('action' => 'credits')); ?> </li>
        <li><?php echo $this->Html->link(__('Update Daily Credit Limit'), array('action' => 'creditlimit')); ?> </li>
        <li><?php echo $this->Html->link(__('Clear Test Logs'), array('controller' => 'video_logs', 'action' => 'clear', 36 )); ?> </li>
        
        <li><?php echo $this->Html->link(__('Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Viewers'), array('controller' => 'viewers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Advertisers'), array('controller' => 'advertisers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Charities'), array('controller' => 'charities', 'action' => 'index')); ?> </li>
        
        <li><?php echo $this->Html->link(__('Credit Logs'), array('controller' => 'credit_logs', 'action' => 'index')); ?> </li>
        
        <li><?php //echo $this->Html->link(__('Payment Details'), array('controller' => 'payment_details', 'action' => 'index')); ?> </li>
        
        
        
        <li><?php echo $this->Html->link(__('Video Logs'), array('controller' => 'video_logs', 'action' => 'index')); ?> </li>

    </ul>
</div>
