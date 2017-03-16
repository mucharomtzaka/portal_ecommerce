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
        <h2 style="margin-top:0px">Order_detail_pemesan <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Id Produk </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="Id Produk" value="<?php echo $id_produk; ?>" />
            </div>
            <?php echo form_error('id_produk') ?>
        </div>
	    <div class="form-group">
            <label for="bigint" class="col-md-4 control-label">Qty </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" />
            </div>
            <?php echo form_error('qty') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Harga </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
            </div>
            <?php echo form_error('harga') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Nama Pemesan </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" placeholder="Nama Pemesan" value="<?php echo $nama_pemesan; ?>" />
            </div>
            <?php echo form_error('nama_pemesan') ?>
        </div>
	    <div class="form-group">
            <label for="tinyint" class="col-md-4 control-label">Status </label>
             <div class="col-md-4">
            <select name="status" class="select2 form-control" required="required">
                <?php if($status =='pending'){?>
                   <option value="pending" selected="selected"> Pending </option>
                <?php }elseif($status =='terkirim') {?>
                   <option value="terkirim" selected="selected"> Terkirim </option>
                 <?php }elseif($status =='progres') {?>
                   <option value="progres" selected="selected"> Progres/ Proses  </option> 
                <?php } ?>
                 <option value =''> ==== Pilih</option>
                 <option value="pending"> Pending </option>
                 <option value="terkirim"> Terkirim </option>
                 <option value="progres"> Progres/ Proses </option>
            </select>
            </div>
            <?php echo form_error('status') ?>
        </div>
	    <input type="hidden" name="id_order_detail" value="<?php echo $id_order_detail; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('order_detail_pemesan') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>