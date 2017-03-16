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
        <h2 style="margin-top:0px">Routerapp <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Slug </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="<?php echo $slug; ?>" />
            </div>
            <?php echo form_error('slug') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Controller </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="controller" id="controller" placeholder="Controller" value="<?php echo $controller; ?>" />
            </div>
            <?php echo form_error('controller') ?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('routerapp') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>