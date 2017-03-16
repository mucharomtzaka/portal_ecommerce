<div class="wrapper">
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
                  <div class="box-body form-horizontal">
                      <div class="col-md-3 " id="generator">
                <h1> Form CRUD Generator</h1>
                <div class="box-border">
                      <?php echo form_open('tools/creator_module?token='.md5($this->security->get_csrf_hash()).'');?>
                      <div class="form-group">
                              <label>Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><i class="glyphicon glyphicon-refresh"></i>Refresh</a></label>
                              <select id="table_name" name="table_name" class="form-control select2" onchange="setname()">
                                  <option value="">Please Select</option>
                                  <?php
                                  foreach ($table_list as $table) {
                                      ?>
                                     <option value="<?php echo $table['table_name'];?>"><?php echo $table['table_name'];?></option>
                                      <?php
                                  }
                                  ?>
                              </select>
                          </div>
                           <div class="form-group">
                              <label><i>Custom Controller Name</i></label>
                              <input type="text" id="controller" name="controller" value="" class="form-control" placeholder="Controller Name" />
                          </div>
                          <div class="form-group">
                              <label><i>Custom Model Name</i></label>
                              <input type="text" id="model" name="model" value="" class="form-control" placeholder="Controller Name" />
                          </div>
                          <div class="form-group">
                              <label><i>Target Location Folder</i></label>
                              <select name="location" class="select2 form-control">
                               <option value="backend">Backend</option>
                               <option value="frontend" disabled="disabled">Frontend</option>
                             </select>
                          </div>
                          <i class="fa fa-plus"> 
                            <input type="submit" value="Generate" name="generate" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" /></i>
                          <?php echo form_close();?>  
                      </div>    
                </div>
                  </div>
              </div>
            </div>
        </section>
  </div>
</div>
<script type="text/javascript">
            function capitalize(s) {
                return s && s[0].toUpperCase() + s.slice(1);
            }

            function setname() {
                var table_named = document.getElementById('table_name').value.toLowerCase();
                if (table_named != '') {
                    document.getElementById('controller').value = capitalize(table_named);
                    document.getElementById('model').value = capitalize(table_named) + '_model';
                } else {
                    document.getElementById('controller').value = '';
                    document.getElementById('model').value = '';
                }
            }
</script>