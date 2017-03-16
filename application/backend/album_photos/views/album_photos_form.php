
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
        <h2 style="margin-top:0px">Album_photos <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Album </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_album" id="nama_album" placeholder="Nama Album" value="<?php echo $nama_album; ?>" required=""/>
            </div>
            <?php echo form_error('nama_album') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Sampul Album </label>
            <img src="<?php echo base_url('doc/images/album');?>/<?php echo $sampul_album; ?>" width="150px" height="150px" id="album_photos">
             <div class="col-md-4">
              <input type="file" class="form-control" name="sampul_album" id="sampul_album" placeholder="Sampul Album"/ onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])" required="required">
            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
            </div>
            <?php echo form_error('sampul_album') ?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('album_photos') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>