<div class="login-box ">
  <!-- /.login-logo -->
  <div class="login-box-header text-center">
    <?php if($message){?>
                    <p><?php echo $message;?></p>
          <?php } ?>
    <h1> Login Auth</h1>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">
      <div class="form-group has-error">
         <?php if($notif=='error'){?>
         <label class="control-label">
          <p> jika 3 kali memasukan email dan password Salah , Maka Akun Akan Terkunci Otomotis.</p></label>
        <?php }?>
       </div>
     </p>

   <?php echo form_open_multipart('auth/postgetAuth?token='.md5($this->security->get_csrf_hash()).'');?>
      <div class="form-group <?php echo $has_notife;?>">
        <input type="text" class="form-control" placeholder="Email" name="identity">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group <?php echo $has_notife;?>">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> <?php echo lang('login_remember_label');?>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('login_submit_btn');?></button>
        </div>
      
        <!-- /.col -->
      </div>
   <?php echo form_close();?>
    <!-- /.social-auth-links -->
     <?php echo anchor(base_url('auth/forget_password'),'Bantuan Masuk','class="btn btn-flat"><i class="fa fa-bookmark"></i');?>
      <?php echo anchor(base_url(),'Halaman Depan','class="btn btn-flat"><i class="fa fa-home"></i');?>
      <center> <?php echo anchor(base_url('auth/register'),'Daftar','class="btn btn-flat"><i class="fa fa-users"></i');?></center>
  </div>
  <!-- /.login-box-body -->
</div>
