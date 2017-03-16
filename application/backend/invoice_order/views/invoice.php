<div class="content-wrapper">
   <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?php echo $titled;?>.
            <small class="pull-right">Date: <?php echo $tanggal_order;?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong><?php echo $titled;?></strong><br>
            <?php echo $kontak;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong><?php echo $nama_pemesan;?></strong><br>
            <?php echo $alamat_pemesan;?><br>
            Email: <?php echo $email_pemesan;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice Order :<?php echo $invoice_number;?></b><br>
          <br>
          <b>Order ID:</b> <?php echo $id_order;?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>ID Product</th>
              <th>Product</th>
              <th>Brand</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($detail_pesan as $rows):?>
              <td><?php echo $rows->qty;?></td>
              <td><?php echo $rows->id_produk;?></td>
              <td><?php echo $rows->produk;?></td>
              <td><?php echo $rows->brand;?></td>
              <td><?php echo $rows->harga;?></td>
            <?php 
                endforeach;?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           <?php if($metode_bayar =='transfer'):?>
            Metode pembayaran dengan menggunakan transfer ATM/ Bank Ke rekening Bank :
            <fieldset>
                  <legend>Bank Akun</legend>
                   <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nama Akun</th>
                        <th>Bank</th>
                        <th> No. Rekening</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($bank_akun as $bank):?>
                      <tr>
                        <td><?php echo $bank->nama_pemilik;?></td>
                        <td><?php echo $bank->nama_bank;?></td>
                        <td><?php echo $bank->no_rekening;?></td>
                      </tr>
                    <?php endforeach;?>
                    </tbody>
                   </table>
                </fieldset>
              <?php else:?>
                <?php echo $metode_bayar;?> <br> Alamat tujuan:
               <?php echo $alamat_pemesan;?><br>

           <?php endif;?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rp.<?php echo $jumlah_harga_total;?></td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>Rp.<?php echo $biaya_pengiriman;?></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp.<?php echo $total_bayar;?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
    </section>
    <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" onclick="javascript:window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
       <!--    <a href="<?php echo base_url();?>invoice_order/export_pdf/<?php echo $id_order;?> " class="btn btn-primary"> <i class="fa fa-file"></i> Generate pdf</a> -->
            <a href="javascript:history.go(-1);" class="btn btn-warning"><i class="fa fa-arrow-left"> </i> Back</a>
        </div>
      </div>
</div>
