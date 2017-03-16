<header class="main-header">
<!-- <a href="<?php echo base_url();?>" class="logo">
  <span class="logo-mini"><b>Trefast</b></span>
  <span class="logo-lg"><b><i class="fa fa-home"></i><?php echo $titled;?></b></span>
  </a> -->

    <nav class="navbar navbar-static-top">
      <div class="container">
      <a href="<?php echo base_url();?>" class="navbar-brand">
        <b><i class="fa fa-home"></i><?php echo $titled;?></b>
      </a>
      <div class="navbar-header">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url();?>#kurir"><i class="fa fa-truck"></i>Expedisi</a></li>
           <li><a href="<?php echo base_url();?>welcome/checkpayment"><i class="fa fa-check"></i>Konfirmasi Pembayaran</a></li>
          <li><a href="<?php echo base_url('welcome/product');?>"><i class="fa fa-th"></i>Produk</a></li>
          <?php if(!$this->ion_auth->logged_in()){?>
          <li> <?php echo anchor(base_url('auth/register'),'Daftar Member','><i class="fa fa-users"></i');?></li>
          <li><a href="<?php echo base_url('auth');?>"><i class="fa fa-sign-in"></i>Masuk</a></li>
          <?php }else{ ?>
            <li><a href="<?php echo base_url();?>welcome/transaksi_order"><i class="fa fa-exchange">Transaksi</i></a></li>
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="fa fa-user"><?php echo $this->session->userdata('email');?></span>
                </a>
                <ul class="dropdown-menu">
                 <li>
                    <a href="<?php echo base_url('auth/change_password');?>" class="">Change Password</a>
                  </li>
                  <li>
                <a href="<?php echo base_url('auth/logout');?>"><i class="fa fa-sign-out"><?php echo lang('link_logout');?></i></a>
              </li>

                </ul>
              </li>
           <?php } ?>
           <li><a href="<?php echo base_url('welcome/order');?>"><i class="glyphicon glyphicon-shopping-cart"></i>Keranjang Belanja<span class="label label-warning"><?php echo $this->cart->total_items();?></span></a></li>
          <li><a href="<?php echo base_url();?>#kontak"><i class="glyphicon glyphicon-earphone"></i>Kontak Kami</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
</header>