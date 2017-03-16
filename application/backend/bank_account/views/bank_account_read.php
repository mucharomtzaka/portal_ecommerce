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
        <h2 style="margin-top:0px">Bank_account Read</h2>
        <table class="table">
	    <tr><td>Nama Bank</td><td><?php echo $nama_bank; ?></td></tr>
	    <tr><td>No Rekening</td><td><?php echo $no_rekening; ?></td></tr>
	    <tr><td>Nama Pemilik</td><td><?php echo $nama_pemilik; ?></td></tr>
	    <tr><td>Img Bank</td><td><?php echo $img_bank; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bank_account') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>