

<div id="content">
<div class="content_inner" style="background-color:#151515; padding-top:10px; border-radius: 0px;">

<?php echo $this->Session->flash(); ?>
<table>
<?php echo $this->Form->create('donate');?>
    <tr>
    <td>Enter the amount you would like to donate</td>
    <td><?php echo $this->Form->input('credit'); ?></td>
    </tr>
    <tr>
    <td colspan ="2">
<?php echo $this->Form->end(__('Donate'));?>
</td>
</tr>
</table>

    </div><!-- end #content_inner -->
</div><!-- end #content -->