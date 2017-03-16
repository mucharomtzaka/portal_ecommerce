
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
        <h2 style="margin-top:0px">Schema_database List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8 text-center">
                <div style="margin-top: 8px" id="message">
                 <?php  if($message){?>
                <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <?php echo $message;?>
                    </div>
                      <?php }?>
                </div>
            </div>
            <div class="col-md-3 text-right">
            </div>
        </div>
        <div class="table-responsive col-md-5">
          <table class="table table-bordered">
                <tr>
                    <th>No</th>
    		            <th>Version</th>
                </tr><?php
                        foreach ($schema_database_data as $schema_database)
                        {
                            ?>
                            <tr>
            			           <td width="80px"><?php echo ++$start ?></td>
            			           <td><?php echo $schema_database->version ?></td>
            		</tr>
                            <?php
                        }
                        ?>
            </table>
        </div>
        <div class="col-md-5">
           <fieldset>
                   <legend><i> Create File Migration</i></legend>
                   
                  <?php echo  form_open_multipart($aksi,'class="form-horizontal"')?>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Nama File Migrasi</label>
                    <div class="col-md-5">
                      <input type="text" name="name_module" class="form-control " required="required">
                    </div>
                     <input type="submit" value="create" name="create" class="btn btn-primary" onclick="javascript: return confirm('Are you sure to Make File Migration. Continue ?')" />
                          <?php echo form_close();?> 
                  </div>
                  <?php echo form_close();?>
                  <p> untuk menjalankan perintah migrasi ke database. silahkan klik <a href="<?php echo base_url('schema_database/migrate');?>" class="btn btn-warning"><i>Migrate</i></a>
                 </fieldset>
        </div>
        </div>
   </div>
   </div>
        </section>
</div> 