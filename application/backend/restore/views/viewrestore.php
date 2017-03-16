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
        <h2 style="margin-top:0px"><?php echo $titleu;?></h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-10 text-center">
                <div style="margin-top: 8px" id="message">
                 <?php  if($message){?>
                <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <?php echo $message;?>
                    </div>
                      <?php }?>
                </div>
            </div>
        </div>
        <div class="table">
          <?php echo  form_open_multipart($aksi,'class="form-horizontal"')?>
                  <div class="form-group">
                    <label class="col-md-3 control-label">File Sql</label>
                    <div class="col-md-5">
                      <input type="file" name="sql" class="form-control file" required="required">
                    </div>
                     <input type="submit" value="restore" name="restore" class="btn btn-primary" onclick="javascript: return confirm('Are you sure to restore Database. Continue ?')" />
                  </div>
                  <?php echo form_close();?>
        </div>
   </div>
   </div>
        </section>
</div> 