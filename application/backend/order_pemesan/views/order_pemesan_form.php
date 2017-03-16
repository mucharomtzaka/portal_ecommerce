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
        <h2 style="margin-top:0px">Order_pemesan <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="datetime" class="col-md-4 control-label">Tanggal </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
            </div>
            <?php echo form_error('tanggal') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Pemesan </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" placeholder="Nama Pemesan" value="<?php echo $nama_pemesan; ?>" />
            </div>
            <?php echo form_error('nama_pemesan') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Email Pemesan </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="email_pemesan" id="email_pemesan" placeholder="Email Pemesan" value="<?php echo $email_pemesan; ?>" />
            </div>
            <?php echo form_error('email_pemesan') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Contact Pemesan </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="contact_pemesan" id="contact_pemesan" placeholder="Contact Pemesan" value="<?php echo $contact_pemesan; ?>" />
            </div>
            <?php echo form_error('contact_pemesan') ?>
        </div>
        <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Alamat Pemesan </label>
             <div class="col-md-4">
            <textarea class="form-control textarea" name="alamat_pemesan" id="alamat_pemesan" placeholder="Alamat Pemesan" /> <?php echo $alamat_pemesan; ?></textarea>
            </div>
        </div>
	    <div class="form-group">
            <label for="enum" class="col-md-4 control-label">Status Order </label>
             <div class="col-md-4">
            <select name="status_order" class="select2 form-control" required="required">
                <?php if($status_order =='pending'){?>
                   <option value="pending" selected="selected"> Pending </option>
                <?php }elseif($status_order =='terkirim') {?>
                   <option value="terkirim" selected="selected"> Terkirim </option>
                 <?php }elseif($status_order =='progres') {?>
                   <option value="progres" selected="selected"> Progres/ Proses  </option> 
                <?php } ?>
                 <option value =''> ==== Pilih</option>
                 <option value="pending"> Pending </option>
                 <option value="terkirim"> Terkirim </option>
                 <option value="progres"> Progres/ Proses </option>
            </select>
            </div>
            <?php echo form_error('status_order') ?>
        </div>
	    <input type="hidden" name="id_order" value="<?php echo $id_order; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('order_pemesan') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>