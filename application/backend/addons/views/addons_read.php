  <div class="content-wrapper">
   <section class="content">
    <div class="box">
 <div class="box-header with-border">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
         <div class="box-body">
        <h2 style="margin-top:0px">Addons Read</h2>
        <table class="table">
	    <tr><td>Name Addons</td><td><?php echo $name_addons; ?></td></tr>
	    <tr><td>Technical Support</td><td><?php echo $technical_support; ?></td></tr>
	    <tr><td>Status Addons</td>
      <?php if($status_addons==1){?>
      <td> Installed</td>
      <?php }else{?>
      <td> Unistalled </td>
      <?php } ?></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Icon</td><td><?php echo $icon; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('addons') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>