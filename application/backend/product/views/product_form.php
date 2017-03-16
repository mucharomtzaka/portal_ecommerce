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
        <h2 style="margin-top:0px">Product <?php echo $button ?></h2>
     <?php echo form_open_multipart($action,'class="form-horizontal"');?>
        <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Kode Produk* </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="kdproduct" id="kdproduct" placeholder="Produk" value="<?php echo $kdproduct; ?>" readonly/>
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Produk* </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="produk" id="produk" placeholder="Produk" value="<?php echo $produk; ?>" />
            </div>
            <?php echo form_error('produk') ?>
        </div>
	    <div class="form-group">
            <label for="text" class="col-md-4 control-label">Deskripsi Produk *</label>
             <div class="col-md-6">
            <textarea class="form-control textarea" name="deskripsi_produk" id="deskripsi_produk" placeholder="Deskripsi Produk" value="" /><?php echo $deskripsi_produk; ?></textarea>
            </div>
            <?php echo form_error('deskripsi_produk') ?>
        </div>
         <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Stock* </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" value="<?php echo $stock; ?>"/>
            </div>
        </div>
          <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Harga* </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="harga" id="harga" placeholder="harga" value="<?php echo $harga; ?>"/>
            </div>
        </div>
         <div class="form-group">
            <label for="tinyint" class="col-md-4 control-label">Kategori Produk *</label>
             <div class="col-md-4">
             <select name="group_produk"  class="form-control select2" required="required">
                <option value=""> === pilih group produk ====</option>
                <?php foreach($list_product_group as $rt):?>
                    <?php if($group_produk == $rt->id){?>
                    <option value="<?php echo $rt->id;?>" selected="selected"><?php echo $rt->group_product_name;?></option>
                    <?php }else{?>
                    <option value="<?php echo $rt->id;?>"><?php echo $rt->group_product_name;?></option>
                    <?php } ?>
                <?php endforeach;?>
              </select> 
            </div>
        </div>
        <div class="form-group">
            <label for="tinyint" class="col-md-4 control-label">Brand Produk *</label>
             <div class="col-md-4">
             <select name="brand"  class="form-control select2" required="required">
                <option value=""> === pilih Brand produk ====</option>
                <?php foreach($list_brand as $rt):?>
                    <?php if($brand == $rt->nama_brand){?>
                    <option value="<?php echo $rt->nama_brand;?>" selected="selected"><?php echo $rt->nama_brand;?>-<?php echo $rt->kode_brand;?> </option>
                    <?php }else{?>
                    <option value="<?php echo $rt->nama_brand;?>"><?php echo $rt->nama_brand;?>-<?php echo $rt->kode_brand;?></option>
                    <?php } ?>
                <?php endforeach;?>
              </select> 
            </div>
        </div>
        <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Tanggal </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal" value="<?php echo $tanggal; ?>" />
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Link Video </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="link_video" id="link_video" placeholder="Link Video" value="<?php echo $link_video; ?>" />
            </div>
            <?php echo form_error('link_video') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Url Demo </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="url_demo" id="url_demo" placeholder="Url Demo" value="<?php echo $url_demo; ?>" />
            </div>
            <?php echo form_error('url_demo') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Images Product *</label>
            <img src="<?php echo base_url('doc/images/produk');?>/<?php echo $images; ?>" width="150px" height="150px" id="album_photos">
             <div class="col-md-4">
              <input type="file" class="form-control" name="images" id="images" placeholder="images"onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])"
            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
            </div>
        </div>
	    <div class="form-group">
            <label for="tinyint" class="col-md-4 control-label">Status *</label>
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
	    <a href="<?php echo site_url('product') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>