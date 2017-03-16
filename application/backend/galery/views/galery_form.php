
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
        <h2 style="margin-top:0px">Galery <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="int" class="col-md-4 control-label">Id Album </label>
             <div class="col-md-4">
            <!-- <input type="text" class="form-control" name="id_album" id="id_album" placeholder="Id Album" value="<?php echo $id_album; ?>" /> -->
            <select name="id_album" class="form-control select2">
              <?php foreach($list_album as $dt):?>
                <?php if($id_album == $dt->id){?>
                 <option value="<?php echo $dt->id;?>" selected="selected"> <?php echo $dt->nama_album;?></option>
                <?php } ?>
               <option value="<?php echo $dt->id;?>"> <?php echo $dt->nama_album;?></option>
              <?php endforeach; ?>
            </select>
            </div>
            <?php echo form_error('id_album') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Title Img </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="title_img" id="title_img" placeholder="Title Img" value="<?php echo $title_img; ?>" />
            </div>
            <?php echo form_error('title_img') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Image Url </label>
             <img src="<?php echo base_url('doc/images/galeri');?>/<?php echo $image_url; ?>" width="150px" height="150px" id="album_photos">
             <div class="col-md-4">
              <input type="file" class="form-control" name="image_url" id="image_url" placeholder="Image"/ onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])">
            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
            </div>
            <?php echo form_error('image_url') ?>
        </div>
	    <div class="form-group">
            <label for="description" class="col-md-4 control-label">Description</label>
            <div class="col-md-4">
            <textarea class="form-control textarea" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
            </div>
            <?php echo form_error('description') ?>
        </div>
      <div class="form-group">
         <label for="int" class="col-md-4 control-label">Status</label>
          <div class="col-md-4">
           <!--  <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
             <select name="status"  class="form-control select2">
                 <?php if($status == '1'){?>
                 <option value="1" selected="selected"> Publish</option>
                 <?php }else{?>
                  <option value="0" selected="selected"> Draft</option>
                 <?php } ?>
                  <option value="1"> Publish</option>
                  <option value="0"> Draft</option>
              </select> 
            </div>
            <?php echo form_error('status') ?>
       </div>
	    <div class="form-group">
            <label for="int" class="col-md-4 control-label">Kategori </label>
             <div class="col-md-4">
           <!--  <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" /> -->
            <select name="kategori"  class="form-control select2">
              <?php if($status =='1'){?>
                <option value="1" selected="selected"> Gallery Photo</option>
              <?php }elseif($status =='2'){?>
              <option value="2" selected="selected"> Portofolio</option>
              <?php }else{?>
               <option value="3" selected="selected"> Other</option>
              <?php } ?>
              <option value="1"> Gallery Photo</option>
              <option value="2"> Portofolio</option>
              <option value="3"> Other</option>
            </div>
            <?php echo form_error('kategori') ?>
        </div>

	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('galery') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>