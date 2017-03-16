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
        <h2 style="margin-top:0px">Confirm_payment <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Pengirim </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim" value="<?php echo $nama_pengirim; ?>" />
            </div>
            <?php echo form_error('nama_pengirim') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Email Pengirim </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="email_pengirim" id="email_pengirim" placeholder="Email Pengirim" value="<?php echo $email_pengirim; ?>" />
            </div>
            <?php echo form_error('email_pengirim') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Bukti Transfer </label>
             <div class="col-md-4">
            <input type="file" class="form-control" name="bukti_transfer" id="bukti_transfer" placeholder="Bukti Transfer" value="<?php echo $bukti_transfer; ?>" />
            </div>
            <?php echo form_error('bukti_transfer') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">No Rekening Dari </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="no_rekening_dari" id="no_rekening_dari" placeholder="No Rekening Dari" value="<?php echo $no_rekening_dari; ?>" />
            </div>
            <?php echo form_error('no_rekening_dari') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">No Rekening Tujuan </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="no_rekening_tujuan" id="no_rekening_tujuan" placeholder="No Rekening Tujuan" value="<?php echo $no_rekening_tujuan; ?>" />
            </div>
            <?php echo form_error('no_rekening_tujuan') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Bank </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="<?php echo $nama_bank; ?>" />
            </div>
            <?php echo form_error('nama_bank') ?>
        </div>
	    <div class="form-group">
            <label for="text" class="col-md-4 control-label">Keterangan Lain </label>
             <div class="col-md-4">
            <textarea class="form-control textarea" name="keterangan_lain" id="keterangan_lain" placeholder="Keterangan Lain"/><?php echo $keterangan_lain; ?></textarea>
            </div>
            <?php echo form_error('keterangan_lain') ?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('confirm_payment') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>