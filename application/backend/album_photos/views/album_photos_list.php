
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
        <h2 style="margin-top:0px">Album_photos List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('album_photos/create'),'Create', 'class="btn btn-primary"><i class="fa fa-plus"></i'); ?>
            </div>
            <div class="col-md-4 text-center">
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
                <form action="<?php echo site_url('album_photos/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('album_photos'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-hover" id="table1" >
            <tr>
                <th>No</th>
		<th>Nama Album</th>
		<th>Sampul Album</th>
		<th>Action</th>
            </tr><?php
            foreach ($album_photos_data as $album_photos)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $album_photos->nama_album ?></td>
      <td><a href="<?=site_url(); ?>doc/images/album/<?php echo $album_photos->sampul_album ?>" target="new"><span class="label label-success">Lihat Gambar</span></a></td>
			<td style="text-align:center">
				<?php 
				echo anchor(site_url('album_photos/read/'.$album_photos->id),'Read',' class="btn btn-default"><i class="fa fa-eye"></i'); 
				echo ' | '; 
				echo anchor(site_url('album_photos/update/'.$album_photos->id),'Update','class="btn btn-warning"><i class="fa fa-edit"></i'); 
				echo ' | '; 
				echo anchor(site_url('album_photos/delete/'.$album_photos->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure  to Delete ?\')" class="btn btn-danger"><i class="fa fa-trash"></i'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
   </div>
   </div>
        </section>
</div> 