<header class="main-header">
        <a href="<?php echo base_url('home?homepage&token='. md5($this->security->get_csrf_hash()).'');?>" class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-mini"><b>Panel</b></span>
            <span class="logo-lg"><?php echo $title_mini;?></span>
          </a>
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
         <?php echo $menu_top;?>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-home">Homepage</i></a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-gear"></i>Settings</a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('settings');?>"><i class="fa fa-angle-double-right"></i>General</a></li>
            </ul>
            <li><a href="<?php echo base_url('contact');?>"><i class="fa fa-envelope"></i>Contact</a></li>
             <?php if($this->session->userdata('develop') == TRUE){;?>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fire"></i>Tools Develop</a>
             <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('addons');?>"><i class="fa fa-tag"></i>Addons</a></li>
            <li><a href="<?php echo base_url('tools');?>"><i class="fa fa-tag"></i>CRUD Generator</a></li>
              <li><a href="<?php echo base_url('menu_backend');?>"><i class="fa fa-tag"></i>Menus</a></li>
               <li><a href="<?php echo base_url('backup');?>"><i class="fa fa-download"></i>Backup Database</a></li>
               <li><a href="<?php echo base_url('restore');?>"><i class="fa fa-upload"></i>Restore Database</a></li>
               <li><a href="<?php echo base_url('schema_database');?>"><i class="fa fa-exchange"></i>Migrations Database</a></li>
            </ul>
            </li>
            <?php } ?>
            </li>
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