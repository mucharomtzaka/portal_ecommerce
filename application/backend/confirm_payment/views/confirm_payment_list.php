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
        <h2 style="margin-top:0px">Confirm_payment List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
<!--                 <?php echo anchor(site_url('confirm_payment/create'),'Create', 'class="btn btn-primary"><i class="fa fa-plus"></i'); ?> -->
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
                <form action="<?php echo site_url('confirm_payment/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('confirm_payment'); ?>" class="btn btn-default">Reset</a>
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
        <table class="table table-bordered table-hover" id="table1">
            <tr>
                <th>No</th>
		<th>Nama Pengirim</th>
		<th>Email Pengirim</th>
		<th>Bukti Transfer</th>
		<th>No Rekening Dari</th>
		<th>No Rekening Tujuan</th>
		<th>Nama Bank</th>
		<th>Keterangan Lain</th>
		<th>Action</th>
            </tr><?php
            foreach ($confirm_payment_data as $confirm_payment)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $confirm_payment->nama_pengirim ?></td>
			<td><?php echo $confirm_payment->email_pengirim ?></td>
			<td><a href="<?php echo base_url();?>doc/images/payment/<?php echo $confirm_payment->bukti_transfer ?>"><i class="fa fa-eye">Lihat File </i></a></td>
			<td><?php echo $confirm_payment->no_rekening_dari ?></td>
			<td><?php echo $confirm_payment->no_rekening_tujuan ?></td>
			<td><?php echo $confirm_payment->nama_bank ?></td>
			<td><?php echo $confirm_payment->keterangan_lain ?></td>
			<td style="text-align:center">
				<?php 
/*				echo anchor(site_url('confirm_payment/read/'.$confirm_payment->id),'Read',' class="btn btn-default"><i class="fa fa-eye"></i'); 
				echo ' | '; 
				echo anchor(site_url('confirm_payment/update/'.$confirm_payment->id),'Update','class="btn btn-warning"><i class="fa fa-edit"></i'); 
				echo ' | '; */
				echo anchor(site_url('confirm_payment/delete/'.$confirm_payment->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure  to Delete ?\')" class="btn btn-danger"><i class="fa fa-trash"></i'); 
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