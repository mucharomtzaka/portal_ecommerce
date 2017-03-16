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
        <h2 style="margin-top:0px">Product Read</h2>
        <table class="table">
	    <tr><td>Produk</td><td><?php echo $produk; ?></td></tr>
	    <tr><td>Deskripsi Produk</td><td><?php echo $deskripsi_produk; ?></td></tr>
	    <tr><td>Link Video</td><td><?php echo $link_video; ?></td></tr>
	    <tr><td>Url Demo</td><td><?php echo $url_demo; ?></td></tr>
	    <tr><td>Images</td><td><?php echo $images; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>