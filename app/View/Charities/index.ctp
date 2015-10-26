
<div id="content">
<div class="content_inner" style="background-color:#151515; padding-top:10px; border-radius: 0px;">
<?php foreach ($charities as $charity) :?>
<div style="background-color:#333; width:95%; border-radius:5px">
<h2><?php echo h($charity['Charity']['title']); ?></h2>
<img src = "../charity/<?php echo $charity['Charity']['id'];?>.jpg" width="150px" height="100px">
<div style="line-height:200%; font-size:11px; text-align:justify; width:95%; color:#fff">
    <?php echo $charity['Charity']['description']; ?>
</div>

<?php echo $this->Html->link(__('Donate'), array('action' => 'donate', $charity['Charity']['id']));?>
</div><br /><br />
<?php endforeach;?>
    </div><!-- end #content_inner -->
</div><!-- end #content -->