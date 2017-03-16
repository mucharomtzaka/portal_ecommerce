
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
        <h2 style="margin-top:0px">Articles <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Title *</label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $titley; ?>" />
            </div>
            <?php echo form_error('title') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Slug *</label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="<?php echo $slug; ?>" />
            </div>
            <?php echo form_error('slug') ?>
        </div>
	    <div class="form-group">
            <label for="date" class="col-md-4 control-label">Date *</label>
            <div class="col-md-4">
             <input type="date" class="form-control" name="date" id="tanggal" placeholder="Date" value="<?php echo $date; ?>" />
             <?php echo form_error('date') ?>
            </div>
        </div>
         <div class="form-group">
            <label for="date" class="col-md-4 control-label">Link Video</label>
            <div class="col-md-4">
             <input type="text" class="form-control" name="link_video" id="link_video" placeholder="URL Link Video  example:http://www.youtube.com/embed/03aw2UyyYGU? " value="<?php echo $link_video; ?>" />
            </div>
        </div>
	    <div class="form-group">
            <label for="time" class="col-md-4 control-label">Time </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo $time; ?>"  readonly/>
            </div>
            <?php echo form_error('time') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Author </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="author"  id="author" placeholder="Author" value="<?php echo $author; ?>" readonly />
            </div>
            <?php echo form_error('author') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Img Header </label>
            <img src="<?php echo base_url('doc/images/blog');?>/<?php echo $img_header; ?>" width="150px" height="150px" id="album_photos">
             <div class="col-md-4">
              <input type="file" class="form-control" name="img_header" id="img_header" placeholder="Image" onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])">
            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
            </div>
            <?php echo form_error('img_header') ?>
        </div>
	    <div class="form-group">
            <label for="content" class="col-md-4 control-label">Content</label>
            <div class="col-md-8">
            <textarea class="form-control textarea" rows="3" cols="10" name="content" id="content" placeholder="Content"><?php echo $content; ?></textarea>
            </div>
            <?php echo form_error('content') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Category *</label>
             <div class="col-md-4">
          <!--   <input type="text" class="form-control" name="category" id="category" placeholder="Category" value="<?php echo $category; ?>" /> -->
                <select name="category" class="select2 form-control">
                    <?php foreach($list_kategori as $rt):?>
                        <?php if($category == $rt->name_categories){?>
                         <option value="<?php echo $rt->name_categories;?>" selected="selected"><?php echo $rt->name_categories;?></option>
                        <?php }else{?>
                        <option value="<?php echo $rt->name_categories;?>"><?php echo $rt->name_categories;?></option>
                        <?php } ?>
                   <?php endforeach;?>
                </select>
            </div>
            <?php echo form_error('category') ?>
        </div>
	    <div class="form-group">
            <label for="int" class="col-md-4 control-label">Status *</label>
             <div class="col-md-4">
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
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('articles') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>