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
        <h2 style="margin-top:0px">Order_pemesan Read</h2>
        <table class="table">
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Nama Pemesan</td><td><?php echo $nama_pemesan; ?></td></tr>
	    <tr><td>Email Pemesan</td><td><?php echo $email_pemesan; ?></td></tr>
	    <tr><td>Contact Pemesan</td><td><?php echo $contact_pemesan; ?></td></tr>
	    <tr><td>Status Order</td><td><?php echo $status_order; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('order_pemesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>