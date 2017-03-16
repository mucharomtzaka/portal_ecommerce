<div class="content-wrapper">
  <section class="content-header">
    <div class="row">
      <?php  if($message){?>
                <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <?php echo $message;?>
                    </div>
                      <?php }?>
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
   				  	  <fieldset>
                  <legend><?php echo $titlehead;?></legend>
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <legend>Konfigurasi Website</legend>
                        <?php echo form_open_multipart($aksi,'class="form-horizontal"');?>
                         <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label">Title Header </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="title_header" id="title" placeholder="Title" value="<?php echo $title_header; ?>" />
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="content" class="col-md-4 control-label">Keyword</label>
                              <div class="col-md-7">
                              <textarea class="form-control" rows="3" name="keyword" id="content" placeholder="Content"><?php echo $keyword; ?></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label">Favicon </label>
                              <img src="<?php echo base_url('doc/images/favicon');?>/<?php echo $favicon; ?>" width="150px" height="150px" id="album_photos">
                               <div class="col-md-4">
                                <input type="file" class="form-control" name="favicon" id="favicon" placeholder="Favicon"/ onchange="document.getElementById('album_photos').src = window.URL.createObjectURL(this.files[0])">
                              <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px)</p>
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="content" class="col-md-4 control-label">Description</label>
                              <div class="col-md-7">
                              <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Content"><?php echo $deskripsi; ?></textarea>
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="content" class="col-md-4 control-label">Title Footer</label>
                              <div class="col-md-7">
                              <textarea class="form-control textarea" rows="3" name="title_footer" id="title_footer" placeholder="Content"><?php echo $title_footer; ?></textarea>
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="content" class="col-md-4 control-label">Ads / Banner Iklan</label>
                              <div class="col-md-7">
                              <textarea class="form-control textarea" rows="3" name="ads" id="ads" placeholder="Content"><?php echo $ads; ?></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="content" class="col-md-4 control-label">Profil Company</label>
                              <div class="col-md-7">
                              <textarea class="form-control textarea" rows="3" name="text_profil" id="text_profil" placeholder="Content"><?php echo $text_profil; ?></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="content" class="col-md-4 control-label">Contact Us </label>
                              <div class="col-md-7">
                              <textarea class="form-control textarea" rows="3" name="text_contact" id="contact_text" placeholder="Content"><?php echo $text_contact; ?></textarea>
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="content" class="col-md-4 control-label">Google Analystic</label>
                              <div class="col-md-7">
                              <textarea class="form-control" rows="3" name="google_analyst" id="google_master" placeholder="Content"><?php echo $google_analyst; ?></textarea>
                              </div>
                          </div>
                      </fieldset>
                    </div>
                    <div class="col-md-4">
                     <fieldset>
                       <legend>Peta Lokasi Perusahaan</legend>
                        <div class="form-group">
                              <label for="content" class="col-md-2 control-label"> Code Peta Link Marker </label>
                              <div class="col-md-8">
                              <textarea class="form-control" rows="3" name="peta_link" id="peta_link" placeholder="Content"><?php echo $peta_link; ?></textarea>
                              </div>
                          </div>
                     </fieldset>
                     <fieldset>
                       <legend>APi facebook </legend>
                       <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label">Apps ID </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="appid" id="appid" placeholder="appid" value="<?php echo $appid; ?>"/> 
                              </div>
                      </div>
                      <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label">Apps Secret </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="app_secret" id="app_secret" placeholder="app_secret" value="<?php echo $app_secret; ?>"/> 
                              </div>
                      </div>
                     </fieldset>
                     <fieldset>
                       <legend>Running Text</legend>
                       <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"> HeadLine Text </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="text_running" id="text_running" placeholder="text_running" value="<?php echo $text_running; ?>"/> 
                              </div>
                      </div>
                     </fieldset>
                     <fieldset>
                       <legend>Sosial Media Link</legend>
                       <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"><i class="fa fa-facebook"></i>acebook</label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="fb" id="fb" placeholder="link facebook " value="<?php echo $fb; ?>"/> 
                              </div>
                      </div>
                        <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"><i class="fa fa-twitter"></i>witter</label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="twitter" id="twitter" placeholder="link twitter " value="<?php echo $twitter; ?>"/> 
                              </div>
                      </div>
                       <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"><i class="fa fa-google-plus"></i>Google plus</label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="google_plus" id="google_plus" placeholder="google_plus " value="<?php echo $google_plus; ?>"/> 
                              </div>
                      </div>
                      <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"><i class="fa fa-google-plus"></i>Instagram</label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="instagram" id="instagram" placeholder="instagram " value="<?php echo $instagram; ?>"/> 
                              </div>
                      </div>
                      <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"><i class="fa fa-github-alt"></i>Github</label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="github" id="github" placeholder="github " value="<?php echo $github; ?>"/> 
                              </div>
                      </div>
                       <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"><i class="fa fa-bitbucket-square"></i>Bitbucket</label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="bucket" id="bucket" placeholder="bitbucket " value="<?php echo $bucket; ?>"/> 
                              </div>
                      </div>
                     </fieldset>
                      <fieldset>
                        <legend>Konfigurasi Email</legend>
                            <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label">Protocol </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="protocol" id="protocol" placeholder="protocol" value="<?php echo $protocol; ?>" required="required" /> 
                            </div>
                          </div>
                           <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"> SMTP Host </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="smtp_host" id="smtp_host" placeholder="protocol" value="<?php echo $smtp_host; ?>" required="required" />
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"> SMTP Username </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="smtp_user" id="smtp_user" placeholder="smtp_user" value="<?php echo $smtp_user; ?>" required="required" />
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"> SMTP Password </label>
                               <div class="col-md-7">
                              <input type="password" class="form-control" name="smtp_password" id="smtp_password" placeholder="protocol" value="<?php echo $smtp_password; ?>" required="required" />
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"> SMTP Port </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="smtp_port" id="smtp_port" placeholder="smtp_port" value="<?php echo $smtp_port; ?>" required="required" />
                              </div>
                          </div>
                           <div class="form-group">
                              <label for="varchar" class="col-md-4 control-label"> Newline </label>
                               <div class="col-md-7">
                              <input type="text" class="form-control" name="newline" id="newline" placeholder="newline" value="<?php echo $newline; ?>" required="required" />
                              </div>
                          </div>

                      </fieldset>
                      <button type="submit" class="btn btn-primary"> <i class="fa fa-save"><?php echo $button ?></i></button> 
                        <?php echo form_close();?>
                    </div>
                    <div class="col-md-4">
                      <fieldset>
                        <legend><i>Active Development Tools Assets</i></legend>
                        <p> Mode pengembangan website  digunakan untuk mengaktifkan <i>Tools Development </i>.</p>
                      <?php echo anchor('settings/mode_development/aktive','aktive Development','class="btn btn-primary"><i class="fa fa-link"></i');?>
                       <?php echo anchor('settings/mode_development/nonaktive','nonaktive Development','class="btn btn-primary"><i class="fa fa-link"></i');?>
                      </fieldset>
                    </div>
                  </div>
                </fieldset>
   				  </div>
   			</div>
   		</div>
   	</section>
</div>