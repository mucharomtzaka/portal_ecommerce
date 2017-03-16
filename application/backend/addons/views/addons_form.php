
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
        <h2 style="margin-top:0px">Addons <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Name Addons </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="name_addons" id="name_addons" placeholder="Name Addons" value="<?php echo $name_addons; ?>" />
            </div>
            <?php echo form_error('name_addons') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Technical Support </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="technical_support" id="technical_support" placeholder="Technical Support" value="<?php echo $technical_support; ?>" />
            </div>
            <?php echo form_error('technical_support') ?>
        </div>
	    <div class="form-group">
            <label for="tinyint" class="col-md-4 control-label">Status Addons </label>
             <div class="col-md-4">
            <!-- <input type="text" class="form-control" name="status_addons" id="status_addons" placeholder="Status Addons" value="<?php echo $status_addons; ?>" /> -->
            <select name="status_addons" class="form-control select2">
                <?php if($status_addons == 1){?>
                <option value="1" selected="selected">Installed</option>
                <?php }else{?>
                <option value="0" selected="selected">Uninstalled</option>
                <?php } ?>
                <option value="1">Installed</option>
                <option value="0">Uninstalled</option>
            </select>
            </div>
            <?php echo form_error('status_addons') ?>
        </div>
	    <div class="form-group">
            <label for="tinytext" class="col-md-4 control-label">Description </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
            </div>
            <?php echo form_error('description') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Icon </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
            </div>
            <?php echo form_error('icon') ?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('addons') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>