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
 <section class="content-body">
 	<div class="box box-success">
 				<div class="box-header">
 					<?php if($this->ion_auth->logged_in()){?>
 					 <h1 class="widget-title text-center"><i class="fa fa-bullhorn"><?php echo $title_download;?> Member</i></h1>
 					<?php }else{ ?>
 					<h1 class="widget-title text-center"><i class="fa fa-bullhorn"><?php echo $title_download;?></i></h1>
 					<?php } ?>
 				</div>
 				<div class="box-body text-center">
 				<div class="row">
 					<div class="col-md-8">
 						<table class="table table-hover table-bordered">
 						<caption>
 							<a href="#" class="btn btn-primary pull-right">Total Record : <?php echo $total_rows ?></a>
 							<div class="col-md-5">
				                <form action="<?php echo site_url('welcome/DownloadArea'); ?>" class="form-inline" method="get">
				                    <div class="input-group">
				                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
				                        <span class="input-group-btn">
				                            <?php 
				                                if ($q <> '')
				                                {
				                                    ?>
				                                    <a href="<?php echo site_url('welcome/DownloadArea'); ?>" class="btn btn-default">Reset</a>
				                                    <?php
				                                }
				                            ?>
				                          <button class="btn btn-primary" type="submit">Search</button>
				                        </span>
				                    </div>
				                </form>
				            </div>
 						</caption>
 						<thead>
 							<tr style="background-color:green;color:white">
 								<th>#</th>
 								<th>Judul File</th>
 								<th>Tanggal </th>
 								<th>Deskripsi</th>
 								<th>Jenis Akun</th>
 								<th>Kategori</th>
 								<th>Link Demo</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 						<?php if(count($download_data) <>''){?>
 						<?php foreach($download_data as $qs):?>
 							<tr>
 								<td><?php echo ++$start;?></td>
 								<td><?php echo $qs->judul_file;?></td>
 								<td><?php echo $qs->tanggal;?></td>
 								<td><?php echo character_limiter($qs->deskripsi,100);?></td>
 								<?php if($qs->lock_account == 1){?>
 								 <td><i class="fa fa-lock">Premium</i></td>
 								<?php }else{?>
 								<td><i class="fa fa-unlock">Member</i></td>
 								<?php } ?>
 								<td><?php echo $qs->group_download;?></td>
 								<?php if($qs->link_demo !=''):?>
 								<td><a href="<?php echo $qs->link_demo;?>" target="_new"><i class="fa fa-eye"></i></a></td>
 							    <?php else:?>
 							    	<td>-</td>
 							    <?php endif;?>
 								 <?php if(!$this->ion_auth->logged_in()){?>
 								<td><a target="_blank" href="<?php echo base_url('auth/register');?>" onclick="javascript:return confirm(
                                        'Maaf Anda Harus jadi Member terlebih dahulu!');"><i class="fa fa-download"></i><?=$qs->judul_file?></a></td>
 								<?php }else{?>
 								<?php if($qs->lock_account==1):?>
 									<td><a target="_blank" href="<?php echo base_url('welcome/upgrade_account');?>/<?=$qs->file?>" onclick="javascript:return confirm(
                                        'Maaf Akun Anda Harus jadi Member premium terlebih dahulu!');"><i class="fa fa-download"></i></a></td>
 								<?php else:?>
 									<td><a target="_blank" href="<?php echo base_url();?>doc/file/download/<?=$qs->file?>"><i class="fa fa-download"></i></a></td>
 								<?php endif;?>
 								<?php } ?>
 							</tr>
 						<?php endforeach;?>
 						<?php }else{?>
 							<tr>
 								<td colspan="7">
 									<h2 class="headline text-yellow"> 404</h2>
 									Data tidak ditemukan 
							          <a href="javascript:history.go(-1);" class="btn btn-warning"><i class="fa fa-arrow-left"> </i> Back</a>
 								</td>
 							</tr>
 						<?php } ?>
 						</tbody>
 						</table>
 						<?php echo $pagination;?>
 					</div>
 					<div class="col-md-4">
 						<fieldset>
 							<h1 class="widget-title text-center">Iklan/Promosi</h1>
 							<div class="widget-inner">
							<?php foreach ($promo_ads as $s): ?>
								<div class="blog-list-post clearfix">
		                          <div class="blog-list-details">
		                          	<h3 class="blog-list-title">
                                            <a href="<?php echo base_url(); ?>welcome/viewpromo/<?=$s['group_product']?>/<?=$s['slug']?>"><i class="fa fa-eye"></i><?=$s['title_promo']?></a>
                                        </h3>
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
							<?php endforeach;?>
							<?php echo $ads;?>
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