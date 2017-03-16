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
        <h2 style="margin-top:0px">Menu_frontend Read</h2>
        <table class="table">
	    <tr><td>Menu Frontend Title</td><td><?php echo $menu_frontend_title; ?></td></tr>
	    <tr><td>Menu Url Title</td><td><?php echo $menu_url_title; ?></td></tr>
	    <tr><td>Menu Frontend Status</td><td><?php echo $menu_frontend_status; ?></td></tr>
	    <tr><td>Menu Frontend Icon</td><td><?php echo $menu_frontend_icon; ?></td></tr>
	    <tr><td>Menu Frontend Description</td><td><?php echo $menu_frontend_description; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('menu_frontend') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>