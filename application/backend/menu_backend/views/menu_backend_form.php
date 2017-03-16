
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
        <h2 style="margin-top:0px">Menu_backend <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Menu Backend Title </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="menu_backend_title" id="menu_backend_title" placeholder="Menu Backend Title" value="<?php echo $menu_backend_title; ?>" />
            </div>
            <?php echo form_error('menu_backend_title') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Menu Url Title </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="menu_url_title" id="menu_url_title" placeholder="Menu Url Title" value="<?php echo $menu_url_title; ?>" />
            </div>
            <?php echo form_error('menu_url_title') ?>
        </div>
        <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Menu Backend Parent Title </label>
             <div class="col-md-4">
                <select name="menu_backend_parent" class="select2 form-control">
                    <option value="0">Default</option>
                    <?php foreach($list_menu as $wd):?>
                    <?php  if($menu_backend_parent == $wd->id){?>
                    <option value="<?php echo $wd->id;?>" selected="selected"><?php echo $wd->menu_backend_title;?></option>
                    <?php }else{ ?>
                    <option value="<?php echo $wd->id;?>"><?php echo $wd->menu_backend_title;?></option>
                    <?php } ?>
                    <?php endforeach;?>
                    <?php if($menu_backend_parent =='0') { ?>
                        <option value="0" selected="selected">Default</option>
                        <?php } ?>
                </select>
            </div>
            <?php echo form_error('menu_backend_parent') ?>
        </div>
	    <div class="form-group">
            <label for="tinyint" class="col-md-4 control-label">Menu Backend Status </label>
             <div class="col-md-4">
            <select name="menu_backend_status" class="select2 form-control">
                <?php if($menu_backend_status =='1'){?>
                <option value="1" selected="selected">show</option>
                <?php }else{ ?>
                <option value="0" selected="selected">Hidden</option>
                <?php } ?>
                <option value="1">Show</option>
                <option value="0">Hidden</option>
            </select>
            </div>
            <?php echo form_error('menu_backend_status') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Menu Backend Icon </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="menu_backend_icon" id="menu_backend_icon" placeholder="Menu Backend Icon" value="<?php echo $menu_backend_icon; ?>" />
            </div>
            <?php echo form_error('menu_backend_icon') ?>
        </div>
	    <div class="form-group">
            <label for="tinytext" class="col-md-4 control-label">Menu Backend Description </label>
             <div class="col-md-5">
            <textarea name="menu_backend_description" class="form-control textarea"><?php echo $menu_backend_description; ?></textarea>
            </div>
            <?php echo form_error('menu_backend_description') ?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu_backend') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>