<div class="content-wrapper">
<section class="content-header">
    <div class="row text-center">
       		<?php  if($message){?>
                	<div class="alert alert-warning alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <?php echo $message;?>
                    </div>
           <?php }?>
 </div>
 </section>
   <section class="content">
	<div class="box box-success">
		<div class="row">
				<div class="col-md-8">
					<div class="page-title clearfix">
				        <div class="row">
				            <div class="col-md-12">
				                <h6><a href="<?php echo base_url(); ?>">Home</a></h6>
				                <h6><a href="<?php echo base_url('welcome/product'); ?>">Product</a></h6>
				                <h6><span class="page-active"><?=$title_transaksi ?></span></h6>
				            </div>
				        </div>
						<div class="box-body">
						<div class="table-responsive">
						<?php  if(count($data_transaksi) =='0'){?>
						  <table class="table table-hover table-bordered">
						<?php }else{ ?>
						 <table class="table table-hover table-bordered" id="table1">
						<?php } ?>
						  <thead>
						  	<tr>
						  		<th>Tanggal Transkasi</th>
						  		<th>Nama Pemesan </th>
						  		<th>Email</th>
						  		<th>contact</th>
						  		<th>Alamat</th>
						  		<th>Metode Pembayaran</th>
						  		<th>Biaya Pengiriman</th>
						  		<th>Status Order</th>
						  		<th>Detail Produk</th>
						  	</tr>
						  </thead>
						  <tbody>
						  <?php  if(count($data_transaksi) =='0'){?>
						  		<tr>
						  			<td colspan="9">
						  				<p class="alert alert-warning"> Maaf Anda Belum Melakukan Transaksi Order Produk Apapun </p>
						  			</td>
						  		</tr>

						  	<?php }else{?>
						  	<?php foreach($data_transaksi as $wd):?>
						  		<tr>
						  			<td><?php echo $wd->tanggal;?></td>
						  			<td><?php echo $wd->nama_pemesan;?></td>
						  			<td><?php echo $wd->email_pemesan;?></td>
						  			<td><?php echo $wd->contact_pemesan;?></td>
						  			<td><?php echo $wd->alamat_pemesan;?></td>
						  			<td><?php echo $wd->metode_pembayaran;?></td>
						  			<td>Rp.<?php echo $this->cart->format_number($wd->biaya_delivery);?></td>
						  			<td><?php echo $wd->status_order;?></td>
						  			<td><a href="<?php echo base_url();?>welcome/transaksi_order/<?php echo $wd->nama_pemesan;?>" class="btn btn-primary"><i class="fa fa-eye"></i>Detail</a></td>
						  		</tr>
						  	<?php endforeach;?>
						  	<?php } ?>
						  </tbody>
						  </table>
						  <?php if($param):?>
						  	<fieldset>
						  	<legend> Detail Produk Transaksi</legend>
						  		<table class="table table-hover table-bordered">
						  		<thead>
						  			<tr>
						  				<th>Kode Produk</th>
						  				<th>Nama Produk</th>
						  				<th>Brand Produk</th>
						  				<th>jumlah</th>
						  				<th>Harga</th>
						  			</tr>
						  		</thead>
						  		<tbody>
						  			<?php foreach($detail_transaksi as $t):?>
						  				<tr>
						  					<td><?php echo $t->id_produk;?></td>
						  					<td><?php echo $t->produk;?></td>
						  					<td><?php echo $t->brand;?></td>
						  					<td><?php echo $t->qty;?></td>
						  					<td>Rp.<?php echo $this->cart->format_number($t->harga);?></td>
						  				</tr>
						  			<?php endforeach;?>
						  		</tbody>
						  	</table>
						  	</fieldset>
						     <fieldset>
									<legend>Informasi pengiriman </legend>
									<p class="alert alert-info"> Biaya Pengiriman di tanggung oleh Pemesan  berdasarkan area lokasi domilisi setelah produk yang  dipesan ke pelanggan. informasi lebih lanjut bisa ditanyakan ke kantor customer service.</p>
								</fieldset>
						  <?php endif;?>
						  	
						  	
						</div>
					    </div>
				    </div>
				</div>
				<div class="col-md-4">
					<div class="box-body">
					<fieldset>
						<legend><h4 class="widget-title"><i class="fa fa-tags"></i> Berita Terbaru</h4></legend>
						<div class="widget-inner">
							<?php foreach ($berita_terbaru as $s): ?>
								<?php if($s['status'] == 1):?>
								<div class="blog-list-post clearfix">
								 <div class="blog-list-thumb">
									 <a href="<?php echo base_url(); ?>welcome/viewpage/<?=$s['category']?>/<?=$s['slug']?>">
                                            <img src="<?php echo base_url(); ?>doc/images/blog/<?=$s['img_header']?>" alt="<?=$s['title']?>" />
                                     </a>
		                         </div>
		                          <div class="blog-list-details">
		                          	<h5 class="blog-list-title">
                                            <a href="<?php echo base_url(); ?>welcome/viewpage/<?=$s['category']?>/<?=$s['slug']?>"><?=$s['title']?></a>
                                        </h5>
                                        <?php
                                            $tanggal        = $s['date'];
                                            $namahari       = date('D',strtotime($tanggal));

                                            if ($namahari == "Sunday") $namahari = "Minggu";
                                                else if ($namahari == "Mon") $namahari = "Senin";
                                                else if ($namahari == "Tue") $namahari = "Selasa";
                                                else if ($namahari == "Wed") $namahari = "Rabu";
                                                else if ($namahari == "Thu") $namahari = "Kamis";
                                                else if ($namahari == "Fri") $namahari = "Jumat";
                                                else if ($namahari == "Sat") $namahari = "Sabtu";
                                        ?>
                                        <p class="blog-list-meta small-text"><span><a href="#"><?=$namahari ?>, <?=$tanggal ?></a></span></p>
		                          </div>
		                       </div>
		                   <?php endif;?>
							<?php endforeach;?>
						</div>
					</fieldset>
					<fieldset>
						<legend><h4 class="widget-title"><i class="fa fa-tags"></i> Berita Lainnya</h4></legend>
						<div class="widget-inner">
							<?php foreach ($berita_lain as $s): ?>
								<?php if($s['status'] == 1):?>
								<div class="blog-list-post clearfix">
								 <div class="blog-list-thumb">
									 <a href="<?php echo base_url(); ?>welcome/viewpage/<?=$s['category']?>/<?=$s['slug']?>">
                                            <img src="<?php echo base_url(); ?>doc/images/blog/<?=$s['img_header']?>" alt="<?=$s['title']?>" />
                                     </a>
		                         </div>
		                          <div class="blog-list-details">
		                          	<h5 class="blog-list-title">
                                            <a href="<?php echo base_url(); ?>welcome/viewpage/<?=$s['category']?>/<?=$s['slug']?>"><?=$s['title']?></a>
                                        </h5>
                                        <?php
                                            $tanggal        = $s['date'];
                                            $namahari       = date('D',strtotime($tanggal));

                                            if ($namahari == "Sunday") $namahari = "Minggu";
                                                else if ($namahari == "Mon") $namahari = "Senin";
                                                else if ($namahari == "Tue") $namahari = "Selasa";
                                                else if ($namahari == "Wed") $namahari = "Rabu";
                                                else if ($namahari == "Thu") $namahari = "Kamis";
                                                else if ($namahari == "Fri") $namahari = "Jumat";
                                                else if ($namahari == "Sat") $namahari = "Sabtu";
                                        ?>
                                        <p class="blog-list-meta small-text"><span><a href="#"><?=$namahari ?>, <?=$tanggal ?></a></span></p>
		                          </div>
		                       </div>
		                     <?php endif;?>
							<?php endforeach;?>
						</div>
					</fieldset>
					</div>
			   </div>
		</div>
	</div>
  </section>
  <section class="content">
	<div class="box box-success">
		<div class="row">
				<div class="col-md-4">
					<div class="box-body">
					<fieldset>
						<legend><h4 class="widget-title"><i class="fa fa-camera"></i>Galeri Foto</h4></legend>
						<div class="widget-inner">
						<div class="gallery-small-thumbs clearfix">
                        <?php foreach ($galeri as $g): ?>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="<?=site_url(); ?>doc/images/galeri/<?=$g['image_url']?>" title="<?=$g['title_img']?>">
                                    <img src="<?=site_url(); ?>doc/images/galeri/<?=$g['image_url']?>" alt="" width="100px" height="100px">
                                </a>
                            </div>
                        <?php endforeach ?>
                        </div>
                      </div>
					</fieldset>
						<fieldset>
						<legend><h4 class="widget-title"><i class="fa fa-users"></i>Partner Team / Komunitas</h4></legend>
						  <div class="widget-inner">
						   <?php foreach ($partner as $g): ?>
							<div class="blog-list-post clearfix">
								 <div class="blog-list-thumb">
									<a class="fancybox" rel="gallery1" href="<?=site_url(); ?>doc/images/partner/<?=$g['img']?>" title="<?=$g['team']?>" target="new">
			                          <img src="<?=site_url(); ?>doc/images/partner/<?=$g['img']?>" alt="" width="100px" height="100px">      
			                         </a>

		                         </div>
		                          <div class="blog-list-details">
		                          	<p class="blog-list-meta small-text"><a href="<?php echo $g['url'];?>"><?=$g['team'] ?></a></p>
		                          </div>
		                       </div>
        					 <?php endforeach ?> 
                        </div>
						</fieldset>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box-body">
					<fieldset>
							<legend><h4 class="widget-title"><i class="fa fa-link"></i>Eksternal Link</h4></legend>
						<ul class="link">
						  <?php foreach ($link_ex as $l): ?>
						  	<h5 class="blog-list-title"><a target="_blank" href="<?=$l['url']?>">
                            <i class="fa fa-tags"></i> <?=$l['nama_link']?></a></h5>
						  <?php endforeach;?>
						 </ul>
					</fieldset>
					<fieldset>
							<legend><h4 class="widget-title"><i class="fa fa-link"></i>Kategori</h4></legend>
						<ul class="link">
						  <?php foreach ($link_kate as $l): ?>
						 	 <?php echo $l['name_categories'];?>
						  <?php endforeach;?>
						 </ul>
					</fieldset>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-md-4">
					<div class="box-body">
					<fieldset>
						<legend><h4 class="widget-title"><i class="fa fa-link"></i>Download Link</h4></legend>
						<div class="widget-inner">

                                <?php foreach ($download as $d): ?>
                                <?php
                                    $tanggal        = $d['tanggal'];
                                    $namahari       = date('D',strtotime($tanggal));

                                    if ($namahari == "Sunday") $namahari = "Minggu";
                                        else if ($namahari == "Mon") $namahari = "Senin";
                                        else if ($namahari == "Tue") $namahari = "Selasa";
                                        else if ($namahari == "Wed") $namahari = "Rabu";
                                        else if ($namahari == "Thu") $namahari = "Kamis";
                                        else if ($namahari == "Fri") $namahari = "Jumat";
                                        else if ($namahari == "Sat") $namahari = "Sabtu";
                                ?>
                                <div class="blog-list-post clearfix">
                                <?php if(!$this->ion_auth->logged_in()){?>
                                	<div class="blog-list-details">
                                        <h5 class="blog-list-title"><a target="_blank" href="<?php echo base_url('auth/register');?>" onclick="javascript:return confirm(
                                        'Maaf Anda Harus jadi Member terlebih dahulu!');"><i class="fa fa-tag"></i><?=$d['judul_file']?></a></h5>
                                        <p class="blog-list-meta small-text"><span><a href="#"><?= $namahari ?>, <?=$tanggal ?> </a></span></p>
                                    </div>
                                <?php }else{?>
                                <?php if($d['lock_account']==1):?>
                                    <div class="blog-list-details">
                                    	 <h5 class="blog-list-title"><a target="_blank" href="<?php echo base_url('welcome/upgrade_account');?>" onclick="javascript:return confirm(
                                        'Maaf Akun Anda Harus jadi Member premium terlebih dahulu!');"><i class="fa fa-tag"></i><?=$d['judul_file']?></a></h5>
                                        <p class="blog-list-meta small-text"><span><?= $namahari ?>, <?=$tanggal ?></span></p>
                                     </div> 
                                <?php else:?>
                                	<div class="blog-list-details">
                                        <h5 class="blog-list-title"><a target="_blank" href="<?php echo base_url();?>doc/file/download/<?=$d['file']?>"><i class="fa fa-tag"></i><?=$d['judul_file']?></a></h5>
                                        <p class="blog-list-meta small-text"><span><?= $namahari ?>, <?=$tanggal ?></span></p>
                                    </div>
                                <?php endif;?>
                                <?php } ?>
                                </div>
                                <?php endforeach ?>
                            </div> 
					</fieldset>
					</div>
			   </div>
		</div>
	</div>
  </section>
  <section class="content">
	<div class="box box-success" id="kontak">
		<div class="row">
			<div class="col-md-4">
					<div class="box-body">
						<fieldset>
							<legend>Alamat Kantor Pemasaran</legend>
							<?php echo $kontak ?>
						</fieldset>
					</div>
					<fieldset>
						<legend><h4 class="widget-title"><i class="fa fa-map"></i> Peta Lokasi</h4></legend>
						 <iframe src="<?php echo $peta_lokasi;?>" width="320" height="275" frameborder="0" style="border:0"></iframe>
					</fieldset>
			</div>
			<div class="col-md-4">
					<div class="box-body">
						<fieldset>
						<legend><h4 class="widget-title"><i class="fa fa-company"></i>Profil</h4></legend>
						<?php echo $text_profil;?>
						</fieldset>
						<fieldset>
							<legend>Temukan Kami di Sosial Media</legend>
							<ul class="social_icons">
				                <li><a href="<?php echo $sosmed_fb;?>"><i class="fa fa-facebook"></i></a></li>
				                <li><a href="<?php echo $sosmed_tweet;?>"><i class="fa fa-twitter"></i></a></li>
				                <li><a href="<?php echo $sosmed_google;?>"><i class="fa fa-google-plus"></i></a></li>
				                 <li><a href="<?php echo $sosmed_git;?>"><i class="fa fa-github-alt"></i></a></li>
				                 <li><a href="<?php echo $sosmed_inst;?>"><i class="fa fa-instagram"></i></a></li>
				                 <li><a href="<?php echo $sosmed_butc;?>#"><i class="fa fa-bitbucket-square"></i></a></li>
				            </ul> <!-- /.social_icons -->
						</fieldset>
						<?php echo $ads;?>
						<div id="pembayaran_transfer">
						<fieldset>
							<legend><h4 class="widget-title"><i class="fa fa-bank"></i>Pembayaran via Transfer</h4></legend>
							<?php foreach($bank_akun as $bank):?>
								<p class="alert alert-info">
									<b> Nama Akun :<?php echo $bank->nama_pemilik;?></b><br>
									<b> Bank :<?php echo $bank->nama_bank;?></b><br>
									<b> No_rekening :<?php echo $bank->no_rekening;?></b><br>
								</p>
							<?php endforeach;?>
						</fieldset>
						</div>
					</div>
				</div>
			<div class="col-md-4">
					<div class="box-body">
					     <fieldset>
							<legend>Hubungi Kami</legend>
							<?php echo form_open($aksi);?>
							<div class="contact-form clearfix">
		                        <p class="full-row">
		                            <span class="contact-label">
		                                <label>Nama Lengkap:</label>
		                                <span class="small-text">* Inputkan Nama Lengkap Anda</span>
		                            </span>
		                            <input type="text" id="fullname" name="fullname"  required/>
		                        </p>
		                        <p class="full-row"> 
		                            <span class="contact-label">
		                                <label>Email :</label>
		                                <span class="small-text">* Inputkan Email Anda</span>
		                            </span>
		                            <input type="text" id="email" name="email" required/>
		                        </p>
		                        <p class="full-row">
		                            <span class="contact-label">
		                                <label>Website:</label>
		                                <span class="small-text">Inputkan Website Anda Bila Ada</span>
		                            </span>
		                            <input type="text" id="website" name="website" />
		                        </p>
		                        <p class="full-row">
		                            <span class="contact-label">
		                                <label>Pesan :</label>
		                                <span class="small-text">*Inputkan Pesan Anda</span>
		                            </span>
		                            <textarea name="message" id="message" rows="6" required></textarea>
		                        </p>
		                        <p class="full-row">
		                            <input class="mainBtn" type="submit" name="" value="Kirim Pesan" />
		                        </p>
		                    </div>
		                    <?php echo form_close();?>
						</fieldset>
					</div>
			</div>
		</div>
	</div>
  </section>
</div>
