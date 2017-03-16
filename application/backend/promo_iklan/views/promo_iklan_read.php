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
        <h2 style="margin-top:0px">Promo_iklan Read</h2>
        <table class="table">
	    <tr><td>Title Promo</td><td><?php echo $title_promo; ?></td></tr>
	    <tr><td>Slug</td><td><?php echo $slug; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td>Author</td><td><?php echo $author; ?></td></tr>
	    <tr><td>Content</td><td><?php echo $content; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Group Product</td><td><?php echo $group_product; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('promo_iklan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>