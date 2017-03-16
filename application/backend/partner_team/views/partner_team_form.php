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
          <?php echo $message;?>
        </div>
         <div class="box-body">
        <h2 style="margin-top:0px">Partner_team <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Name team </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="team" id="team" placeholder="Team" value="<?php echo $team; ?>" />
            </div>
            <?php echo form_error('team') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Url Link </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
            </div>
            <?php echo form_error('url') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Img </label>
             <img src="<?php echo base_url('doc/images/partner');?>/<?php echo $img; ?>" width="150px" height="150px" id="album_photos">
             <div class="col-md-4">
              <input type="file" class="form-control" name="img" id="img" placeholder="Images Partner"onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])" required="required">
            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
            </div>
            <?php echo form_error('img') ?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('partner_team') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>