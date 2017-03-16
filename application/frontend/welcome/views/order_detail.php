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
				                <h6><span><?=$title_or ?></span></h6>
				                <h6><span class="page-active"><?=$number_invoice ?></span></h6>
				            </div>
				        </div>
						<div class="box-body text-center">
							<div class="table-responsive">
							<?php echo form_open($action_cart,'class="form-horizontal"'); ?>
							<div class="clearfix">
							<div class="row">
							<div class="col-md-7">
							<fieldset>
								<legend>Akun Pemesan</legend>
									<div class="form-group">
						            <label for="datetime" class="col-md-3 control-label">Tanggal </label>
							             <div class="col-md-7">
							            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" readonly/>
							            </div>
				       		         </div>
				       		         <div class="form-group">
						            <label for="datetime" class="col-md-3 control-label">Invoice Order </label>
							            <div class="col-md-7">
							            <input type="text" class="form-control" name="kode_invoice" id="kode_invoice" value="<?php echo $kode_invoice; ?>" readonly/>
							            </div>
				       		         </div>
				       		          <div class="form-group">
							            <label for="varchar" class="col-md-3 control-label">Nama Pemesan* </label>
							             <div class="col-md-7">
							            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" placeholder="Nama Pemesan" value="<?php echo $nama_pemesan; ?>" required="required"/>
							            </div>
						        	</div>
						         <div class="form-group">
						            <label for="varchar" class="col-md-3 control-label">Email*</label>
						             <div class="col-md-7">
						            <input type="text" class="form-control" name="email_pemesan" id="email_pemesan" placeholder="Email Pemesan" value="<?php echo $email_pemesan; ?>" required="required"/>
						            </div>
						        </div>
							    <div class="form-group">
						            <label for="varchar" class="col-md-3 control-label"> No Contact *</label>
						             <div class="col-md-4">
						            <input type="text" class="form-control" name="contact_pemesan" id="contact_pemesan" placeholder="Contact Pemesan" value="<?php echo $contact_pemesan; ?>" required="required"/>
						            </div>
						        </div>
						        <div class="form-group">
						            <label for="varchar" class="col-md-3 control-label"> Alamat*</label>
						             <div class="col-md-7">
						            <textarea class="form-control"  rows="5" cols="10" name="alamat_pemesan" id="alamat_pemesan" placeholder=" Alamat Pemesan" required="required"/><?php echo $alamat_pemesan; ?></textarea>
						            </div>
						        </div>
							</fieldset>
							</div>
							<div class="col-md-5">
								<fieldset>
									<legend> Metode Pembayaran</legend>
									<div class="form-group">
							             <div class="col-md-8">
							             <select name="metode" class="form-control" required="required" id="metode">
							             <option value=''>--Pilih Metode Bayar--</option>
							              <option value="transfer">Transfer ATM / Bank </option>
							             </select>
							            </div>
				       		         </div>
								</fieldset>
								<div id="akun_bank" style="display:none;">
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
								<fieldset>
									<legend>Informasi pengiriman </legend>
									<p class="alert alert-info"> Biaya Pengiriman di tanggung oleh Pemesan  berdasarkan area lokasi domilisi setelah produk yang  dipesan ke pelanggan. informasi lebih lanjut bisa ditanyakan ke kantor customer service.</p>
								</fieldset>
								</div>
							</div>
							</div>
								
					        <fieldset>
					        	<legend>List Order Product</legend>
					        	 <table cellpadding="6" class="table table-hover table-bordered ">
							        <tr>
								        <th>QTY</th>
								        <th>Item Description</th>
								        <th>Brand</th>
								        <th>Kode List</th>
								        <th>ID Product</th>
								        <th>Item Price</th>
								        <th>Sub-Total</th>
								    </tr>
								    <?php foreach ($this->cart->contents() as $items): ?>
						 			<?php echo form_hidden('product[rowid][]', $items['rowid']); ?>
						 			<tr>
						 			<td><?php echo form_input(array('name' => 'product[qty][]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','id'=>'qty','readonly'=>'readonly')); ?></td>
						 			<td>
						  			<?php echo form_input(array('name'=>'product[name_product][]','value'=>$items['name'],'readonly'=>'readonly')); ?>
						  			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
						  			 <p>
						    		<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
						    		 <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
						    		<?php endforeach; ?>
						    		</p>
						 			<?php endif; ?>
 									</td>
 									  <td>
									  <?php echo form_input(array('name' => 'product[brand_product]', 'value' => $items['brand'],'id'=>'brand','readonly'=>'readonly')); ?>
									  </td>
 									<td>
 										<?php echo form_input(array('name' => 'product[id_nota][]', 'value' => $items['kd_no'],'id'=>'kd_no','readonly'=>'readonly')); ?>
 									</td>
 									<td><?php echo form_input(array('name' => 'product[id_product][]', 'value' => $items['id'],'id'=>'kode','readonly'=>'readonly')); ?></td>
 									<td style="text-align:right"><?php echo form_input(array('name'=>'product[price][]','value'=>$items['price'],'readonly'=>'readonly','size' => '12','id'=>'price','readonly'=>'readonly')); ?></td>
									<td style="text-align:right"><?php echo form_input(array('name'=>'product[subtotal][]','value'=>$items['subtotal'],'readonly'=>'readonly','size' => '12','id'=>'subtotal','readonly'=>'readonly')); ?></td>
									<?php $i++; ?>
									<?php endforeach; ?>
								<tr>
								        <td colspan="2"> </td>
								        <td class="right"><strong>Total</strong></td>
								        <td class="right">Rp.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
								</tr>
									<?php if($this->cart->total_items() <> 0){?>
									<tr>
										<td><button type="submit" class="btn btn-primary" name="send" onclick="javascript:return confirm('Apakah Anda Yakin untuk melakukan transaksi pemesanan')"> <i class="glyphicon glyphicon-send">Kirim</i></button></td>
									   <td><p><a href="<?php echo base_url('welcome/order');?>" class="btn btn-info">Update Cart</a></p></td>
									</tr>
									<?php } ?>
						        </tr>
							      </table>
					        </fieldset>
							</div>
							<?php echo form_close();?>
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
					<div class="col-md-8">
						<div class="box-body">
							<fieldset>
							<legend><h4 class="widget-title"><i class="fa fa-th"></i>Produk</h4></legend>
							<div class="page-title clearfix">
								<div class="row">
					               				 	<div id="Grid">
					               				 		<?php foreach($product_data as $t):?>
												<?php if($t->status =='1'){?>
													
														
														<div class="col-md-4 mix students" data-cat="3">
															<div class="gallery-item">
																<a href="<?php echo base_url(); ?>welcome/detail_produk/<?php echo $t->group_product;?>/<?php echo $t->produk;?>"><h3 class="timeline-header alert alert-success"><?php echo $t->produk ?></h3>
																</a>
									 <a  class="fancybox" rel="gallery1" href="<?php echo base_url('doc/images/produk')?>/<?php echo $t->images ?>">
										<div class="thumb-small-gallery">
										<img src="<?php echo base_url('doc/images/produk')?>/<?php echo $t->images ?>" alt="<?php echo $t->produk ?>">
										</div>
									</a>

											<div class="blog-list-details">
												<span class="bg-red"><?php echo $t->tanggal ?></span>
												<?php echo character_limiter($t->deskripsi_produk,10);?>
												<?php if($t->qty <> 0){?>
												<p class="alert alert-info">
													Stock : <?php echo $t->qty;?><br>
													Harga : Rp. <?php echo $this->cart->format_number($t->harga);
													?><br>
													Brand : <?php echo $t->brand;?>
												</p>
											<?php }else{?>
												<p class="alert alert-error">
												 Maaf Barang Item jenis Ini telah habis / Sold Out. !!!!!
												</p>
											<?php } ?>
											</div>
																<div class="gallery-content">
																	<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>welcome/detail_produk/<?php echo $t->group_product;?>/<?php echo $t->produk;?>">Read more</a>
																</div>	
															</div>
														</div>
												 <?php } ?>
											<?php endforeach;?>
					               		</div>
					               	</div>
							</div>
				</fieldset>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box-body">
							<fieldset>
							<legend><h4 class="widget-title"><i class="fa fa-exchange"></i>Promo / Iklan</h4></legend>
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
							<fieldset>
							<legend><h4 class="widget-title"><i class="fa fa-list"></i>Jenis Produk</h4></legend>
							<p class="alert alert-success">
								<?php foreach($groupproduct as $k):?>
								   <a href="<?php echo base_url();?>welcome/group_product/<?php echo $k->id;?>"><i class="fa fa-tag"><?php echo $k->group_product_name;?></i></a>
								<?php endforeach;?>
							</p>
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