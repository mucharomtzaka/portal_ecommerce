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
        <h2 style="margin-top:0px">Contact <?php echo $button ?></h2>
     <?php echo form_open($action,'class="form-horizontal"');?>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Fullname </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $fullname; ?>" />
            </div>
            <?php echo form_error('fullname') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Email </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
            <?php echo form_error('email') ?>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-md-4 control-label">Website </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $website; ?>" />
            </div>
            <?php echo form_error('website') ?>
        </div>
	    <div class="form-group">
            <label for="message" class="col-md-4 control-label">Message</label>
            <div class="col-md-4">
            <textarea class="form-control textarea" rows="3" name="message" id="message" placeholder="Message"><?php echo $message; ?></textarea>
            </div>
            <?php echo form_error('message') ?>
        </div>
	    <div class="form-group">
            <label for="date" class="col-md-4 control-label">Date </label>
            <div class="col-md-4">
             <input type="date" class="form-control" name="date" id="tanggal" placeholder="Date" value="<?php echo $date; ?>" />
             <?php echo form_error('date') ?>
            </div>
        </div>
	    <div class="form-group">
            <label for="time" class="col-md-4 control-label">Time </label>
             <div class="col-md-4">
            <input type="text" class="form-control" name="time" id="time" placeholder="Time" value="<?php echo $time; ?>" />
            </div>
            <?php echo form_error('time') ?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('contact') ?>" class="btn btn-default"><i class="fa fa-cancel"></i>Cancel</a>
	<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>