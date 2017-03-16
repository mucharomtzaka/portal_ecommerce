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
        <h2 style="margin-top:0px">Brand_product <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
      <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Kode Brand </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="kode_brand" id="kode_brand" placeholder="Kode Brand" value="<?php echo $kode_brand; ?>"  readonly/>
            </div>
            <?php echo form_error('kode_brand') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Brand </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_brand" id="nama_brand" placeholder="Nama Brand" value="<?php echo $nama_brand; ?>" />
            </div>
            <?php echo form_error('nama_brand') ?>
        </div>
	   
	    <input type="hidden" name="id_brand" value="<?php echo $id_brand; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('brand_product') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>