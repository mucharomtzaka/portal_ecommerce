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
                  <div class="row">
                    <div class="col-md-5">
                    <h2 style="margin-top:0px">Contact Read</h2>
                    <table class="table">
                	    <tr><td>Fullname</td><td><?php echo $fullname; ?></td></tr>
                	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                	    <tr><td>Website</td><td><?php echo $website; ?></td></tr>
                	    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
                	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
                	    <tr><td>Time</td><td><?php echo $time; ?></td></tr>
                	    <tr><td></td><td><a href="<?php echo site_url('contact') ?>" class="btn btn-default">Cancel</a>|<a href="#repmessage" class="btn btn-primary" data-toggle="modal" class="btn btn-primary">Balas Pesan</a></td></tr>
            	     </table>
                   </div>
                   <div class="col-md-5">
                    <div class="modal fade" id="repmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Balas Pesan Masuk</h4>
                        </div>
                        <div class="modal-body">
                              <?php echo form_open($aksi);?>
                                  <div class="box-body">
                                  <div class="form-group">
                                   <label for="exampleInputEmail1">Email</label>
                                    <div class="box-body pad">
                                     <input type="text" class="form-control" name="email" value="<?=$email ;?>" readonly="readonly"/>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Isikan Subjek Email</label>
                                      <div class='box-body pad'>
                                         <input type="text" required="" class="form-control" name="subjek" placeholder="Masukan Subjek Email" />
                                      </div>  
                                  </div>

                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Isikan Pesan Balasan</label>
                                      <div class='box-body pad'>
                                          <textarea  class="form-control textarea" name="message" rows="5" cols="30"></textarea>  
                                      </div>  
                                  </div>
                                      
                                  <div class="box-footer">
                                      <button type="submit" class="btn btn-primary">Kirim</button>
                                  </div>
                             <?php echo form_close();?>
                        </div>
                      </div>
                    </div>
                  </div>
                   </div>

            </div>
          </div>
</section>
</div>
        