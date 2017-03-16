<div class="content-wrapper">
  <section class="content-header">
    <div class="row">
      <h1>
                        Welcome <?php echo $titled;?>
                        <small>Dashboard</small>
      </h1>
      <?php echo $message;?>
    </div>
  </section>
   	<section class="content-body">
   		<div class="box box-success">
   			<div class="box-header with-border">
   				 <div class="box-tools pull-right">
   				 	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              		<i class="fa fa-minus"></i></button>
            		<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
             		 <i class="fa fa-times"></i></button>
   				 </div>
   				  <div class="box-body form-horizontal">
   				  	  <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                       <?php echo $jml_artikel ?>
                                    </h3>
                                    <p>
                                      Articles
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-edit"></i>
                                </div>
                                <a href="<?php echo base_url();?>articles" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
            
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       <?php echo $jml_pages ?>
                                    </h3>
                                    <p>
                                        Pages
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-th"></i>
                                </div>
                                <a href="<?php echo base_url();?>pages" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
            
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                          <?php echo $jml_galeri ?>
                                    </h3>
                                    <p>
                                      Gallery Photos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-camera"></i>
                                </div>
                                <a href="<?php echo base_url();?>galery" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
            
            <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo $jml_pesan ?>
                                    </h3>
                                    <p>
                                      Contact Us
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <a href="<?php echo base_url();?>contact" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
            <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo $jml_order ?>
                                    </h3>
                                    <p>
                                      Order
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-barcode"></i>
                                </div>
                                <a href="<?php echo base_url();?>order_pemesan" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
           <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                        <?php echo $jml_produk ?>
                                    </h3>
                                    <p>
                                      Product
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <a href="<?php echo base_url();?>product" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
            <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h3>
                                        <?php echo $payment ?>
                                    </h3>
                                    <p>
                                     Confirm Payment
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bell-o"></i>
                                </div>
                                <a href="<?php echo base_url();?>confirm_payment" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.row -->
   				  </div>
   			</div>
   		</div>
   	</section>

</div>