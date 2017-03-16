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
        <h2 style="margin-top:0px">Download <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Judul File </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="judul_file" id="judul_file" placeholder="Judul File" value="<?php echo $judul_file; ?>" />
            </div>
            <?php echo form_error('judul_file') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">File </label>
            <img src="#" width="150px" height="150px" id="file">
             <div class="col-md-4">
              <input type="file" class="form-control" name="file" id="file" placeholder="file" onchange="document.getElementById('file').src = window.URL.createObjectURL(this.files[0])">
              <p class="help-block">* Type Berupa pdf/docx/doc/jpg/png/zip/rar</p>
            </div>
            <?php echo form_error('file') ?>
        </div>
	    <div class="form-group">
            <label for="int" class="col-md-4 control-label">Status </label>
             <div class="col-md-4">
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
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
            <label for="int" class="col-md-4 control-label">Group Download </label>
             <div class="col-md-4">
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
             <select name="group_download"  class="form-control select2"  required="required">
               <option value=""> == Pilih list group ===</option>
                <?php foreach($list_download as $h):?>
                  <?php if($group_download == $h->group_download_list){?>
                  <option value="<?php echo $h->group_download_list;?>" selected="selected"><?php echo $h->group_download_list;?></option>
                  <?php }else{?>
                  <option value="<?php echo $h->group_download_list;?>"><?php echo $h->group_download_list;?></option>
                  <?php } ?>
                <?php endforeach;?>
              </select> 
            </div>
            <?php echo form_error('status') ?>
        </div>
        <div class="form-group">
            <label for="int" class="col-md-4 control-label">Premission</label>
             <div class="col-md-4">
            <!-- <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
             <select name="lock_account"  class="form-control select2">
                 <?php if($lock_account == '1'){?>
                 <option value="1" selected="selected"> Lock</option>
                 <?php }else{?>
                  <option value="0" selected="selected"> Unclock</option>
                 <?php } ?>
                  <option value="1"> Lock</option>
                  <option value="0"> Unlock</option>
              </select> 
            </div>
            <?php echo form_error('status') ?>
        </div>
	    <div class="form-group">
            <label for="tanggal" class="col-md-4 control-label">Tanggal </label>
            <div class="col-md-4">
             <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
             <?php echo form_error('tanggal') ?>
            </div>
        </div>
         <div class="form-group">
            <label for="tanggal" class="col-md-4 control-label">Link Demo</label>
            <div class="col-md-4">
             <input type="text" class="form-control" name="link_demo" id="link_demo" placeholder="Link Demo " value="<?php echo $link_demo; ?>" />
            </div>
        </div>
        <div class="form-group">
        <label for="deskripsi" class="col-md-4 control-label">Deskripsi </label>
          <div class="col-md-7">
            <textarea class="form-control textarea" name="deskripsi">
              <?php echo $desk;?>
            </textarea>
          </div>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('download') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>