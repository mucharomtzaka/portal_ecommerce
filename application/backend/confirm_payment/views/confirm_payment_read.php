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
        <h2 style="margin-top:0px">Confirm_payment Read</h2>
        <table class="table">
	    <tr><td>Nama Pengirim</td><td><?php echo $nama_pengirim; ?></td></tr>
	    <tr><td>Email Pengirim</td><td><?php echo $email_pengirim; ?></td></tr>
	    <tr><td>Bukti Transfer</td><td><?php echo $bukti_transfer; ?></td></tr>
	    <tr><td>No Rekening Dari</td><td><?php echo $no_rekening_dari; ?></td></tr>
	    <tr><td>No Rekening Tujuan</td><td><?php echo $no_rekening_tujuan; ?></td></tr>
	    <tr><td>Nama Bank</td><td><?php echo $nama_bank; ?></td></tr>
	    <tr><td>Keterangan Lain</td><td><?php echo $keterangan_lain; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('confirm_payment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
       </div>
   </div>
        </section>
</div>