
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
        <h2 style="margin-top:0px">Pages <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Title </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $titley; ?>" />
            </div>
            <?php echo form_error('title') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Slug </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="<?php echo $slug; ?>" />
            </div>
            <?php echo form_error('slug') ?>
        </div>
	    <div class="form-group">
            <label for="content" class="col-md-4 control-label">Content</label>
            <div class="col-md-7">
            <textarea class="form-control textarea" rows="3" cols="5" name="content" id="content" placeholder="Content"><?php echo $content; ?></textarea>
            </div>
            <?php echo form_error('content') ?>
        </div>
	    <div class="form-group">
            <label for="int" class="col-md-4 control-label">Status </label>
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
	    <a href="<?php echo site_url('pages') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>