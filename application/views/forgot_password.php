 <div class="login-box ">
  <!-- /.login-logo -->
  <div class="login-box-header text-center">
    <?php if($message){?>
                    <p><?php echo $message;?></p>
          <?php } ?>
  <h1><?php echo lang('forgot_password_heading');?></h1>
      <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">
     </p> 
   <?php echo form_open_multipart('auth/forget_password?token='.md5($this->security->get_csrf_hash()).'');?>
             <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
              <?php echo form_input($identity);?>
            </p>
        
          <p><?php echo form_submit('submit',lang('forgot_password_submit_btn'),'class="btn btn-primary"><i class="fa fa-send"></i');?></p>
   <?php echo form_close();?>
    <!-- /.social-auth-links -->
  <?php echo anchor(base_url(),'Halaman Depan','class="btn btn-flat"><i class="fa fa-home"></i');?>
  </div>
  <!-- /.login-box-body -->
</div>
