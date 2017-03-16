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
        <h2 style="margin-top:0px">Galery Read</h2>
        <table class="table">
	    <tr><td>Id Album</td><td><?php echo $id_album; ?></td></tr>
	    <tr><td>Title Img</td><td><?php echo $title_img; ?></td></tr>
	    <tr><td>Image Url</td><td><?php echo $image_url; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('galery') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>