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
        <h2 style="margin-top:0px">Shipping_kurir <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Name Shipping </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="name_shipping" id="name_shipping" placeholder="Name Shipping" value="<?php echo $name_shipping; ?>" />
            </div>
            <?php echo form_error('name_shipping') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Kode Shipping </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="kode_shipping" id="kode_shipping" placeholder="Kode Shipping" value="<?php echo $kode_shipping; ?>" />
            </div>
            <?php echo form_error('kode_shipping') ?>
        </div>
        <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Images Shipping *</label>
            <img src="<?php echo base_url('doc/images/kurir');?>/<?php echo $img_shipping; ?>" width="150px" height="150px" id="album_photos">
             <div class="col-md-4">
              <input type="file" class="form-control" name="img_shipping" id="img_shipping" placeholder="images"onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])"
            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
            </div>
        </div>
	    <input type="hidden" name="id_kurir" value="<?php echo $id_kurir; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('shipping_kurir') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>