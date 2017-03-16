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
        <h2 style="margin-top:0px">Bank_account <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Bank </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" value="<?php echo $nama_bank; ?>" />
            </div>
            <?php echo form_error('nama_bank') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">No Rekening </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" value="<?php echo $no_rekening; ?>" />
            </div>
            <?php echo form_error('no_rekening') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Pemilik </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo $nama_pemilik; ?>" />
            </div>
            <?php echo form_error('nama_pemilik') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Img Bank </label>
            <img src="<?php echo base_url('doc/images/bank');?>/<?php echo $img_bank; ?>" width="150px" height="150px" id="album_photos">
             <div class="col-md-4">
              <input type="file" class="form-control" name="img_bank" id="img_bank" placeholder="Image" onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])" required="required">
            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
            </div>
            <?php echo form_error('img_bank') ?>
        </div>
	    <input type="hidden" name="id_bank" value="<?php echo $id_bank; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bank_account') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>