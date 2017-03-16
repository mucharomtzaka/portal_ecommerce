<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends FrontendController {
/*
Trefast Development
Trefast Development merupakan Start up Bussiness di bidang 
jasa pengembangan produk teknologi informasi  web development
*/
/*
@author: Mucharom
@Email :mucharomtzaka@yahoo.co.id / mucharomtzaka@gmail.com
@Alamat: Jl.Pagersari-Patean , Kendal 51354 Jawa Tengah
@HP/Whatapps:+6289692412261
@https://github.com/mucharomtzaka
@fanspage : https://www.facebook.com/trefast.teknik.indonesia 
homepage coming soon 
*/
	function __construct()
	{
		# code...
		parent::__construct();
		$model_plug = array(
			'welcome/welcome_model','product/product_model','galery/galery_model','album_photos/album_photos_model','pages/pages_model','order_pemesan/order_pemesan_model',
			'order_detail_pemesan/order_detail_pemesan_model','bank_account/bank_account_model','confirm_payment/confirm_payment_model','group_product/group_product_model','download/download_model','promo_iklan/promo_iklan_model'
								  );
		$this->load->model($model_plug);
		$this->load->helper(array('xml','text'));
	}
	//halaman utama
	public function index()
	{
		$this->data['aksi']    = 'welcome/send';
		$this->data['bank_akun'] = $this->bank_account_model->get_all();
		$this->data['message']  =$this->session->flashdata('message');
		$this->data['kalender'] = $this->kalender();
		$this->data['groupproduct'] = $this->group_product_model->get_all(4);
		$this->data['product_data'] = $this->product_model->get_limit_data(10);
		$this->data['list_komentar'] = $this->welcome_model->list_komentar();
		$this->slider();
		$this->berita_terbaru();
		$this->links_ex();
		$this->galeri();
		$this->partner();
		$this->promo();
		$this->link_kategori();
		$this->halaman();
		$this->shipping();
		$this->template->render_frontend('welcome_message',$this->data);
	}

	//generate kalender

	private function kalender(){
		$prefs['template'] = array(
        'table_open'           => '<table class="table table-hover">',
        'cal_cell_start'       => '<td class="day">',
        'cal_cell_start_today' => '<td class="today">'
		);

		$this->load->library('calendar', $prefs);
		return $this->calendar->generate();
	}

	//generate slider 

	private function slider(){
		$this->data['slider'] = $this->welcome_model->get_table_articles();
		return $this->data;
	}

	//generate halaman 
	private function halaman(){
		$this->data['halaman'] = $this->welcome_model->get_halaman();
		return $this->data;
	}

	// generate shipping
	private function shipping(){
		$this->data['kurir'] = $this->welcome_model->shipping_kurir();
		return $this->data;
	}

	private function link_kategori(){
		$link_d = $this->welcome_model->get_dbcategori();
		foreach($link_d as $h){
			  $count_link = count($this->welcome_model->group_articles($h['name_categories']));
			   $link[]['name_categories'] = anchor(base_url('welcome/categori/'.$h['name_categories']),$h['name_categories'],'class="btn btn-app"><span class="badge bg-yellow">'.$count_link.'</span');
		}
		$this->data['link_kate'] = $link;
		return $this->data;
	}

	private function promo(){
		$this->data['promo_ads'] = $this->welcome_model->get_iklan_promo();
		return $this->data;
	}

	private function download(){
		$this->data['download'] = $this->welcome_model->get_download();
		return $this->data;
	}

	private function links_ex(){
		$this->data['link_ex'] = $this->welcome_model->links_ex();
		return $this->data;
	}

	private  function galeri(){
		$this->data['galeri']  = $this->welcome_model->galery();
		return $this->data;
	}

	private function partner(){
		$this->data['partner']  = $this->welcome_model->team_partner();
		return $this->data;
	}

	private function berita_terbaru(){
		$this->data['berita_terbaru'] = $this->welcome_model->get_table_articles();
		return $this->data;
	}

	private function berita_lain(){
		$this->data['berita_lain'] = $this->welcome_model->get_table_articles_lain();
		return $this->data;
	}

	//halaman product 
	public function  product(){
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'welcome/product?q='.urlencode($q);
            $config['first_url'] = base_url() . 'welcome/product?q='.urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'welcome/product';
            $config['first_url'] = base_url() . 'welcome/product';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->product_model->total_rows($q);
        $product = $this->product_model->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->data = array(
            'product_data' => $product,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'groupproduct'=>$this->group_product_model->get_all(4)
        );
        $this->links_ex();
		$this->galeri();
		$this->partner();
		$this->promo();
		$this->download();
		$this->link_kategori();
		$this->halaman();
        $this->template->render_frontend('product',$this->data);
	}

	//halaman group product
	public function group_product($group){
		$cek_group = $this->welcome_model->get_group_product($group);
		if($cek_group->id == $group){
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'welcome/group_product/'.$group.'?q='.urlencode($q);
            $config['first_url'] = base_url() . 'welcome/group_product/'.$group.'?q='.urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'welcome/group_product/'.$group;
            $config['first_url'] = base_url() . 'welcome/group_product/'.$group;
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $this->load->library('pagination');
        $this->pagination->initialize($config);
		$this->berita_terbaru();
		$this->berita_lain();
		$this->download();
		$this->links_ex();
		$this->galeri();
		$this->partner();
		$this->promo();
		$this->link_kategori();
		$this->halaman();
		$this->data['q'] = $q;
		$this->data['aksi']    = 'welcome/send';
		$this->data['bank_akun'] = $this->bank_account_model->get_all();
		$this->data['message']  =$this->session->flashdata('message');
		$this->data['groupproduct'] = $this->group_product_model->get_all();
		$this->data['id_group_product'] = $group;
		$this->data['kode_group'] = $cek_group->group_product_name;
        $this->data['group_product_data'] = $this->product_model->get_limit_group($config['per_page'], $start,$group,$q);
        $this->data['gethalaman'] = $this->pagination->create_links();
		$this->template->render_frontend('group_product',$this->data);
	   }else{
	   	    $this->session->set_flashdata('message','Halaman Tidak  ditemukan');
			redirect('welcome/index');
	   }
	}
	
	public function send(){
		    date_default_timezone_set('Asia/Jakarta');
			if($_POST){
				$nama		= $this->input->post('fullname');
				$email		= $this->input->post('email');
				$message	= $this->input->post('message');
				$website	= $this->input->post('website');
				$data 		= array(
					'fullname'	=> $nama,
					'email'		=> $email,
					'message'	=> $message,
					'website'   =>$website,
					'date'		=> date('Y-m-d'),
					'time'	   => date(' H:i:s')
				);

				$this->welcome_model->sendmessage($data);
				$this->session->set_flashdata('message','Your message is deliverd');
				redirect('welcome/index?message=deliverd&token='.md5($this->security->get_csrf_hash()).'');
			}else{
				$this->session->set_flashdata('message',' Error Your Hacked');
				redirect('welcome/index?message=errord&token='.md5($this->security->get_csrf_hash()).'');
			}
	}

	

	public function viewpage($categori,$slug = ''){
		$cek_categori = $this->welcome_model->get_categori($categori);
		if($cek_categori->name_categories ==$categori){
			$this->berita_terbaru();
			$this->berita_lain();
			$this->download();
			$this->links_ex();
			$this->galeri();
			$this->partner();
			$this->link_kategori();
			$this->promo();
			$this->halaman();
			$article =  $this->welcome_model->get_articles($slug);
		    $this->data['aksi']    = 'welcome/send';
		    $this->data['message']  =$this->session->flashdata('message');
		    $this->data['judul'] = $article['title'];
		    $this->data['isi_artikel'] = $article['content'];
		    $this->data['kategori']		= $article['category'];
		    $this->data['author'] = $article['author'];
		    $this->data['tanggal_post'] = $article['date'];
		    $this->data['images'] = $article['img_header'];
		    $this->data['time'] = $article['time'];
		    $this->data['link_video'] = $article['link_video'];
		    $this->data['slug'] = $slug;
		    $this->data['email'] = $this->session->userdata('email');
		    $this->data['bank_akun'] = $this->bank_account_model->get_all();
		    $this->data['product_data'] = $this->product_model->get_limit_data(4);
		    $this->data['groupproduct'] = $this->group_product_model->get_all();
		    $this->data['id_berita'] = $article['id'];
		    $this->data['cap_word'] = $this->create_code();
		    $this->data['list_komentar'] = $this->db->get_where('comment',array('article_id'=>$article['id']),'limit 10')->result();
			$this->template->render_frontend('halaman_artikel',$this->data);
		}else{
			$this->session->set_flashdata('message','Halaman Tidak  ditemukan');
			redirect('welcome/index');
		}
	}

	public  function categori($categori){
		  $cek_categori = $this->welcome_model->get_categori($categori);
		if($cek_categori->name_categories ==$categori){
			$this->berita_terbaru();
			$this->berita_lain();
			$this->download();
			$this->links_ex();
			$this->galeri();
			$this->partner();
			$this->link_kategori();
			$this->promo();
			$this->halaman();
			$q = urldecode($this->input->get('q', TRUE));
	        $start = intval($this->input->get('start'));
	        if ($q <> '') {
	            $config['base_url'] = base_url() . 'welcome/categori/'.$categori.'?q='.urlencode($q);
	            $config['first_url'] = base_url() . 'welcome/categori/'.$categori.'?q='.urlencode($q);
	        } else {
	            $config['base_url'] = base_url() . 'welcome/categori/'.$categori;
	            $config['first_url'] = base_url() . 'welcome/categori/'.$categori;
	        }

	        $config['per_page'] = 10;
	        $config['page_query_string'] = TRUE;
	        $this->load->library('pagination');
	        $this->pagination->initialize($config);
			$this->data['aksi']    = 'welcome/send';
			$this->data['kategori'] = $categori;
			$this->data['w'] =$q;
			$this->data['article'] = $this->welcome_model->group_articles($categori,$config['per_page'],$start,$q);
			$this->data['gethalaman'] = $this->pagination->create_links();
			$this->data['bank_akun'] = $this->bank_account_model->get_all();
			$this->template->render_frontend('group_kategori',$this->data);
		}else{
			$this->session->set_flashdata('message','Halaman Tidak  ditemukan');
			redirect('welcome/index');
		}
	}

	public function detail_produk($group,$slug){
		$cek_group = $this->welcome_model->get_group_product($group);
		if($cek_group->id == $group){
			//$this->product();
			$this->berita_terbaru();
			$this->berita_lain();
			$this->download();
			$this->links_ex();
			$this->galeri();
			$this->partner();
			$this->link_kategori();
			$this->promo();
			$this->halaman();
			$article =  $this->welcome_model->get_product($slug);
		    $this->data['aksi']    = 'welcome/send';
		    $this->data['message']  =$this->session->flashdata('message');
		    $this->data['judul_produk'] = $article['produk'];
		    $this->data['isi_produk'] = $article['decription_product'];
		    $this->data['link_video']		= $article['link_video'];
		    $this->data['url_demo'] = $article['url_demo'];
		    $this->data['tanggal_post'] = $article['tanggal'];
		    $this->data['images'] = $article['images'];
		    $this->data['kode_produk'] = $article['id_produk'];
		    $this->data['id_nota_produk'] = $article['id'];
		    $this->data['stock'] = $article['qty'];
		    $this->data['harga']= $article['harga'];
		    $this->data['brand'] = $article['brand'];
		    $this->data['group'] = $group;
		    $this->data['slug'] = $slug;
		    $this->data['bank_akun'] = $this->bank_account_model->get_all();
		    $this->data['groupproduct'] = $this->group_product_model->get_all(4);
			$this->data['product_data'] = $this->product_model->get_limit_data(10);
		    $this->data['list_komentar'] = $this->db->get_where('comment',array('produk'=>$article['produk']),'limit 10')->result();
		    $this->data['cap_word'] = $this->create_code();
			$this->template->render_frontend('detail_produk',$this->data);
		}else{
			$this->session->set_flashdata('message','Halaman Tidak  ditemukan');
			redirect('welcome/index');
		}
	}

	public function viewpromo($group,$slug){
		$cek_group = $this->welcome_model->get_iklan_promo_id($group,$slug);
		if($cek_group['group_product'] == $group){
			$this->berita_terbaru();
			$this->berita_lain();
			$this->download();
			$this->links_ex();
			$this->galeri();
			$this->partner();
			$this->link_kategori();
			$this->promo();
			$this->halaman();
			$this->data['aksi']    = 'welcome/send';
			$this->data['group'] = $group;
			$this->data['slug'] = $slug;
			$this->data['title_promo'] =  $cek_group['title_promo'];
			$this->data['date']		   =  $cek_group['date'];
			$this->data['isi_content'] =  $cek_group['content'];
			$this->data['link_video']  = $cek_group['link_video'];
			$this->data['banner']      = $cek_group['banner'];
			$this->data['bank_akun'] = $this->bank_account_model->get_all();
			$this->data['groupproduct'] = $this->group_product_model->get_all(4);
			$this->data['product_data'] = $this->product_model->get_limit_data(10);
			$this->template->render_frontend('promosi',$this->data);
		}else{
			$this->session->set_flashdata('message','Halaman Tidak  ditemukan');
			redirect('welcome/index');
		}
	}

	public function view_erro_pages(){
		$peringatan = '<div class="error-page">
						<h2 class="headline text-red"> 404</h2>
							<div class="error-content">
								<p class="alert alert-warning text-center"> Halaman Tidak  ditemukan</p>
							</div>
					</div>';
		$this->session->set_flashdata('message',$peringatan);
			redirect('welcome/index');
	}

	public function gethalaman(){
			$this->data['aksi'] = 'welcome/send';
			$this->datahalamanall();
			$this->partner();
			$this->link_kategori();
			$this->promo();
			$this->berita_terbaru();
			$this->berita_lain();
			$this->download();
			$this->links_ex();
			$this->galeri();
			$this->data['bank_akun'] = $this->bank_account_model->get_all();
		    $this->template->render_frontend('halaman',array_merge($this->data));
	}

	public function datahalamanall(){
		 $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'welcome/gethalaman?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'welcome/gethalaman?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'welcome/gethalaman';
            $config['first_url'] = base_url() . 'welcome/gethalaman?';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->pages_model->total_rows($q);
        $pages = $this->pages_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'pages_data' => $pages,
            'q' => $q,
            'link_halaman' => $this->pagination->create_links(),
            'jml_rows' => $config['total_rows'],
            'start' => $start,
        );
        return $this->data;
	}

	public function getpages($id,$slug){
				if(empty($id)&&empty($slug)){
					redirect('auth/view_erro_pages');
				}else{
					$pages = $this->welcome_model->get_halaman_view($id,$slug);
				    //$this->product();
					$this->berita_terbaru();
					$this->berita_lain();
					$this->download();
					$this->links_ex();
					$this->galeri();
					$this->partner();
					$this->link_kategori();
					$this->promo();
					$this->halaman();
					$this->data['aksi'] = 'welcome/send';
					$this->data['page_title']= $pages['title'];
					$this->data['page_content'] = $pages['content'];
					$this->data['bank_akun'] = $this->bank_account_model->get_all();
					$this->data['groupproduct'] = $this->group_product_model->get_all(4);
				    $this->data['product_data'] = $this->product_model->get_limit_data(4);
		            $this->template->render_frontend('halaman_detail',$this->data);
				}
				
		    
	}

	public function galeries(){
				 $q = urldecode($this->input->get('w', TRUE));
		         $start = intval($this->input->get('start'));
		        if ($q <> '') {
		            $config['base_url'] = base_url() . 'welcome/galeries?q=' . urlencode($q);
		            $config['first_url'] = base_url() . 'welcome/galeries?q=' . urlencode($q);
		        } else {
		            $config['base_url'] = base_url() . 'welcome/galeries';
		            $config['first_url'] = base_url() . 'welcome/galeries';
		        }

		        $config['per_page'] = 10;
		        $config['page_query_string'] = TRUE;
		        $config['total_rows'] = $this->album_photos_model->total_rows($q);
		        $galery = $this->album_photos_model->get_limit_data($config['per_page'], $start, $q);

		        $this->load->library('pagination');
		        $this->pagination->initialize($config);
		   
		        $this->data = array(
		            'album_data' =>$galery,
		            'w' => $q,
		            'pagination' => $this->pagination->create_links(),
		            'total_' => $config['total_rows'],
		            'start' => $start,
		            'message'=>$this->session->flashdata('message'),
		            'aksi'=>'welcome/send',
		            'title_halaman'=>'Galeri'
		        );
		        $this->berita_terbaru();
				$this->berita_lain();
				$this->download();
				$this->links_ex();
				$this->galeri();
				$this->partner();
				$this->link_kategori();
				$this->halaman();
				$this->data['bank_akun'] = $this->bank_account_model->get_all();
				$this->template->render_frontend('galeri',$this->data);
	}

	public function album_galeri($q){
					if($q !=''){
						$df = $this->welcome_model->album_galeri($q);
					}
					if($kd !=''){
						$df = $this->welcome_model->detail_album_galeri($q,$kd);
					}
			        $this->data = array(
			            'album_data' =>$df,
			            'kode'=>$q,
			            'aksi'=>'welcome/send',
			            'title_halaman'=>'Galeri'
			        );
			        $this->berita_terbaru();
					$this->berita_lain();
					$this->download();
					$this->links_ex();
					$this->galeri();
					$this->partner();
					$this->link_kategori();
					$this->halaman();
					$this->data['bank_akun'] = $this->bank_account_model->get_all();
				$this->template->render_frontend('galeri_detail',$this->data);
	}

	public  function detail_album_galeri($q,$kd){
					$df = $this->welcome_model->detail_album_galeri($q,$kd);
					$this->data = array(
			            'title_img' =>$df->title_img,
			            'image_url'=>$df->image_url,
			            'keterangan'=>$df->description,
			            'aksi'=>'welcome/send',
			            'title_halaman'=>'Galeri'
			        );
			        $this->berita_terbaru();
					$this->berita_lain();
					$this->download();
					$this->links_ex();
					$this->galeri();
					$this->partner();
					$this->link_kategori();
					$this->halaman();
					$this->data['bank_akun'] = $this->bank_account_model->get_all();
				$this->template->render_frontend('galeri_detail_album',$this->data);
	}

	public function rss(){
		$f = array(
			'encoding' 			=> 'utf-8',
			'feed_name' 		=> 'trefastsoft.com',
			'feed_url' 			=> base_url().'welcome/rss',
			'page_description' 	=> 'Web Design & Development + Graphic Design Indonesia',
			'page_language' 	=> 'id',
			'creator_email' 	=> 'mucharomtzaka@gmail.com',
			'berita_terbaru'	=> $this->welcome_model->get_table_articles(),
			'halaman'			=>$this->welcome_model->get_halaman(),
			'produk'			=>$this->product_model->get_limit_data(4),
			'menu'				=>$this->navigasi_model->menubar_frontend()
		);
		$this->load->view('welcome/rss',$f);
	}

	public function order(){
					//$this->product();
					$this->berita_terbaru();
					$this->berita_lain();
					$this->download();
					$this->links_ex();
					$this->galeri();
					$this->partner();
					$this->link_kategori();
					$this->halaman();
					$this->promo();
					$this->data['title_or'] = 'Pemesanan';
					$this->data['aksi']    = 'welcome/send';
					$this->data['action_cart'] = 'welcome/cart/update';
					$this->data['message']  =$this->session->flashdata('message');
					$this->data['bank_akun'] = $this->bank_account_model->get_all();
					$this->data['product_data'] = $this->product_model->get_limit_data(4);
					$this->data['groupproduct'] = $this->group_product_model->get_all(4);
				    $this->template->render_frontend('order',$this->data);
	}

	public function checkpayment(){
					$this->berita_terbaru();
					$this->berita_lain();
					$this->download();
					$this->links_ex();
					$this->galeri();
					$this->partner();
					$this->link_kategori();
					$this->halaman();
					$this->data['title_or'] = 'Konfirmasi Pembayaran Via Transfer Bank';
					$this->data['aksi']    = 'welcome/send';//kontak
					$this->data['action']  = 'welcome/send_confirm';
					$this->data['message']  =$this->session->flashdata('message');
					$this->data['bank_akun'] = $this->bank_account_model->get_all();
					$this->template->render_frontend('confirm_payment',$this->data);
	}

	public function send_confirm(){
		if($_POST){
			 	$data = array(
				'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
				'email_pengirim' => $this->input->post('email_pengirim',TRUE),
				'no_rekening_dari' => $this->input->post('no_rekening_dari',TRUE),
				'no_rekening_tujuan' => $this->input->post('no_rekening_tujuan',TRUE),
				'nama_bank' => $this->input->post('nama_bank',TRUE),
				'keterangan_lain' => $this->input->post('keterangan_lain',TRUE),
				'tanggal'=>date('Y-m-d H:i:s')
			    );
			    if($_FILES['bukti_transfer']['name'] != ""){
                    $path_gambar = './doc/images/payment';
                    chmod($path_gambar,0777);
                    $config['upload_path'] = $path_gambar;
                    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|doc|zip|rar';
                    $config['max_size']     = 100000000;
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;
                    $config['encrypt_name'] = true;
                    $config['max_width']  = '';
                    $config['max_height']  = '';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);            
                    if (!$this->upload->do_upload('bukti_transfer'))
                    {
                        show_error($this->upload->display_errors());
                        exit();
                    }
                    else
                    {
                    $image = $this->upload->data();
                        if ($image['file_name']){
                            $data['bukti_transfer'] = $image['file_name'];
                        }        
                    }
               }
            $this->confirm_payment_model->insert($data);
            $this->session->set_flashdata('message','Konfirmasi Pembayaran Telah di Kirim. Terima kasih atas perhatiannya , Kami segera menindak lanjuti pemberitahuan dari Anda');
            redirect('welcome/checkpayment?action=succes&token='.md5($this->security->get_csrf_hash()).'');
		}else{
			$this->session->set_flashdata('message','Error System');
			redirect('welcome/view_erro_pages');
		}
	}

	public function transaksi_order($nama_pemesan){
					$email_pemesan = $this->session->userdata('email');
					$data_pemesan = $this->order_pemesan_model->get_by_name($email_pemesan);
					$this->data['title_transaksi'] = 'Histori Transaksi';
					$this->data['data_transaksi'] = $data_pemesan;
		 			$this->data['message']  =$this->session->flashdata('message');
		 			$this->data['param'] = $nama_pemesan;
		 			if($nama_pemesan){
						$this->data['detail_transaksi'] = $this->order_detail_pemesan_model->get_by_name($nama_pemesan);
		   			}
		   			$this->data['bank_akun'] = $this->bank_account_model->get_all();
		   			$this->berita_terbaru();
					$this->berita_lain();
					$this->download();
					$this->links_ex();
					$this->galeri();
					$this->partner();
					$this->link_kategori();
					$this->halaman();
					$this->template->render_frontend('transaksi',$this->data);
	}

	public function order_detail(){
					$this->berita_terbaru();
					$this->berita_lain();
					$this->download();
					$this->links_ex();
					$this->galeri();
					$this->partner();
					$this->link_kategori();
					$this->halaman();
					$this->promo();
					$number_invoice = $this->welcome_model->auto_number_invoice();
					$this->data['title_or'] = 'Detail Pemesanan';
					$this->data['aksi']    = 'welcome/send';
					$this->data['action_cart'] = 'welcome/cart/send';
					$this->data['tanggal'] = set_value('tanggal',date('Y-m-d H:i:s'));
					$this->data['kode_invoice'] = set_value('kode_invoice',$number_invoice);
					$this->data['contact_pemesan'] = set_value('contact_pemesan');
					$this->data['email_pemesan'] = set_value('email_pemesan',$this->session->userdata('email'));
					$this->data['product_data'] = $this->product_model->get_limit_data(4);
					$this->data['bank_akun']     = $this->welcome_model->get_bank_account();
					$this->data['number_invoice'] = $number_invoice;
					$this->data['groupproduct'] = $this->group_product_model->get_all(4);
					$this->data['message']  =$this->session->flashdata('message');
				    $this->template->render_frontend('order_detail',$this->data);
	}

	//aksi proses keranjang  belanja 
	public function cart($param='',$rowid){
		   $post_data = $this->input->post(NULL,TRUE);
		   $filter_post = $this->security->xss_clean($post_data);
			if($param == 'new'){
				       $data = array(
						        'id'      => $filter_post['id_product'],
						        'qty'     => 1,
						        'price'   => $filter_post['price_product'],
						        'name'    => $filter_post['name_product'],
						        'kd_no'   => $filter_post['id_nota'],
						        'brand'   =>$filter_post['brand_product']
						);
				    $this->cart->insert($data);
					$this->session->set_flashdata('message','New Order');
				    redirect('welcome/order?action=new_order&token='.md5($this->security->get_csrf_hash()).'');
			}elseif ($param =='update') {
						$data = array(
		   						array(
								        'rowid'  =>$filter_post['product']['rowid'],
								        'qty'    =>$filter_post['product']['qty'],
								        'price'  =>$filter_post['product']['price'],
								        'subtotal'  =>$filter_post['product']['subtotal'],
								        'name_product'=>$filter_post['product']['name_product'],
								        'brand_product'=>$filter_post['product']['brand_product']
								        )
		   					    );
				$this->cart->update($data);
				$this->session->set_flashdata('message','Order Telah diupdate');
				redirect('welcome/order?action=update_order&token='.md5($this->security->get_csrf_hash()).'');
			}
			elseif ($param =='delete') {
				# code...
				$data = array(
				        'rowid'  =>$rowid,
				        'qty'    => 0,
				        'price'  => 0,
				);
				$this->cart->update($data);
				$this->session->set_flashdata('message','Order Telah di delete');
				redirect('welcome/order?action=delete_order&token='.md5($this->security->get_csrf_hash()).'');
			}elseif ($param =='send') {
				 if(!$this->ion_auth->logged_in()){
				 	$this->session->set_flashdata('message','Maaf Anda untuk Melakukan transaksi Order atau Pemesan Harus Login Terlebih Dahulu');
				     redirect('welcome/index?action=order_login&token='.md5($this->security->get_csrf_hash()).'');
				 }else{
				 	//update  stock barang 
				 		$qty = $filter_post['product']['qty'];
				 		foreach($filter_post['product']['id_nota'] as $k=>$t){
				 			$rt[] = $this->product_model->get_by_id($t);
				 			
				 		}
				 		foreach($qty as $b=>$e){
					 		foreach($rt as $c){
					 			  $jml_stock = $c->qty;
					 			  $quantitas = intval($jml_stock)-intval($e);
					 			  $data[] = array('id'=>$c->id,
					 			  				   'qty'=>$quantitas,'id_produk'=>$c->id_produk,
					 			  				   'harga'=>$c->harga,'produk'=>$c->produk,'brand'=>$c->brand

					 			  		);
					 			  $kuantitas[]= array('qty'=>$e,'id_produk'=>$c->id_produk,'harga'=>$c->harga,'produk'=>$c->produk,'brand'=>$c->brand);
					 		   }
					 	   }

					 	 //echo json_encode($data);
				 		$update_product = $this->product_model->update_batch($data);
					 	$pemesan =array('nama_pemesan'=>$filter_post['nama_pemesan'],
					 					'kode_invoice_order'=>$filter_post['kode_invoice']);
				 		foreach($kuantitas as $r=>$t){
				 			  $insert_order = array_merge($pemesan,$t);
				 			  $this->db->set($insert_order);
				 			  $this->db->insert('order_detail_pemesan');
				 		}

				 		$insert_detail_pemesan = array('nama_pemesan'=>$filter_post['nama_pemesan'],
				 										'email_pemesan'=>$filter_post['email_pemesan'],
				 										'tanggal'=>$filter_post['tanggal'],
				 										'contact_pemesan'=>$filter_post['contact_pemesan'],
				 										'alamat_pemesan'=>$filter_post['alamat_pemesan'],
				 										'metode_pembayaran'=>$filter_post['metode'],
				 										'kode_invoice_order'=>$filter_post['kode_invoice']
				 									);
				 		$masuk_database_order = $this->db->insert('order_pemesan',$insert_detail_pemesan);
				 		//echo json_encode(array_merge($insert_order));
				 		//menghapus cart sebelumnya 
				 		$this->cart->destroy();
				 		$this->session->set_flashdata('message',' Selamat  transaksi Order atau Pemesan Anda telah dikirim ');
						redirect('welcome/index?action=succces_order&token='.md5($this->security->get_csrf_hash()).'');
				    } 
			}else{
				$this->session->set_flashdata('message','Maaf Anda belum Melakukan transaksi Order atau Pemesan');
				redirect('welcome/index?action=no_order&token='.md5($this->security->get_csrf_hash()).'');
			}	
	}

	// halaman download area
	public function DownloadArea(){
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'welcome/DownloadArea?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'welcome/DownloadArea?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'welcome/DownloadArea?';
            $config['first_url'] = base_url() . 'welcome/DownloadArea?';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->download_model->total_rows($q);
        $download = $this->download_model->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->data = array(
            'download_data' => $download,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'bank_akun'=>$this->bank_account_model->get_all(),
            'aksi'=>'welcome/send',
            'title_download'=>'Download Area',
            'message'=>$this->session->flashdata('message'),
            'pagination' => $this->pagination->create_links(),
        );
        $this->berita_terbaru();
		$this->berita_lain();
		$this->links_ex();
		$this->galeri();
		$this->partner();
		$this->link_kategori();
		$this->halaman();
		$this->promo();
		$this->template->render_frontend('download_area',$this->data);
	}

	//halaman akun 

	public function upgrade_account($file){
		 if($this->ion_auth->logged_in()){
		 	$download_data = $this->download_model->get_file_name($file);
		 	$this->data['title_upgrade'] = ' Upgrade account Premium';
		 	$this->data['message'] = $this->session->flashdata('message');
		 	$this->data['filename'] = $download_data->file;
		 	$this->data['keterangan'] = $download_data->deskripsi;
		 	$this->data['lock'] = $download_data->lock_account;
			$this->data['aksi'] = 'welcome/send';
			$this->berita_terbaru();
			$this->berita_lain();
			$this->links_ex();
			$this->galeri();
			$this->partner();
			$this->link_kategori();
			$this->halaman();
			$this->promo();
			$this->download();
			$this->template->render_frontend('upgrade_premium',$this->data);
		 }else{
		 	redirect('welcome/DownloadArea');
		 }

	}
	//halaman iklan
	public function iklan(){
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'welcome/iklan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'welcome/iklan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'welcome/iklan?';
            $config['first_url'] = base_url() . 'welcome/iklan?';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->promo_iklan_model->total_rows($q);
        $iklan = $this->promo_iklan_model->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->data = array(
            'iklan_data' => $iklan,
            'q' => $q,
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'bank_akun'=>$this->bank_account_model->get_all(),
            'aksi'=>'welcome/send',
            'title_download'=>'Promo Iklan',
            'message'=>$this->session->flashdata('message'),
            'pagination' => $this->pagination->create_links(),
            'groupproduct'=>$this->group_product_model->get_all(4)
        );
        $this->berita_terbaru();
		$this->berita_lain();
		$this->links_ex();
		$this->galeri();
		$this->partner();
		$this->link_kategori();
		$this->halaman();
		$this->template->render_frontend('iklan',$this->data);
	}

	private function create_code() {
			$path_gambar = './doc/captcha/';
			chmod($path_gambar,0777);
			$vals = array(
	        'img_path'      => $path_gambar,
	        'img_url'       => base_url().'doc/captcha/'
			);
		$cap = create_captcha($vals);
		$data = array(
		        'captcha_time'  => $cap['time'],
		        'ip_address'    => $this->input->ip_address(),
		        'word'          => $cap['word']
		);

		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		return $cap['image'];
	}

	function komentar($param){
						$error = false;
						$nama = trim($_POST['nama']);
						$id_berita = trim($_POST['id_berita']);
						$kategori = trim($_POST['berita_kategori']);
						$slug = trim($_POST['slug']);
						$pesan = trim($_POST['pesan']);
						$email = trim($_POST['email']);
						$product = trim($_POST['produk']);
						$gender = trim(($_POST['gender']));
		 if($this->ion_auth->logged_in()){
				if(isset($_POST['kirim'])) {
						$expiration = time() - 7200; // Two hour limit
						$this->db->where('captcha_time < ', $expiration)
						        ->delete('captcha');

						// Then see if a captcha exists:
						$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
						$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
						$query = $this->db->query($sql, $binds);
						$row = $query->row();

						if ($row->count == 0){
						        $da = 'You must submit the word that appears in the image.';
						        $this->session->set_flashdata('message',$da);
							   redirect('welcome/viewpage/'.$kategori.'/'.$slug.'#komentar');
						}
						if($param =='artikel'){

							if (!$error) {
								
								$nama = strip_tags($nama);
								$pesan = strip_tags($pesan);
								$data = array(
												'article_id'=>$id_berita,
												'name'=>$nama,
												'email'=>$email,
												'comment'=>$pesan,
												'date'=>date('Y-m-d H:i:s'),
												'gender'=>$gender
											);

								$this->db->insert('comment',$data);
							}

							$this->session->set_flashdata('message', 'Terima Kasih anda telah berkomentar');
								redirect('welcome/viewpage/'.$kategori.'/'.$slug.'#komentar');
							}elseif ($param =='produk') {
								# code...

								if (!$error) {
								
								$nama = strip_tags($nama);
								$pesan = strip_tags($pesan);
								$data = array(
												'article_id'=>$id_berita,
												'name'=>$nama,
												'email'=>$email,
												'comment'=>$pesan,
												'date'=>date('Y-m-d H:i:s'),
												'produk'=>$product,
												'gender'=>$gender
											);

								$this->db->insert('comment',$data);
							}

							$this->session->set_flashdata('message', 'Terima Kasih anda telah berkomentar');
								redirect('welcome/detail_produk/'.$id_berita.'/'.$slug.'#komentar');

							}
					}

		}else{	
								$this->session->set_flashdata('message', 'Ops Anda harus Login terlebih Dahulu!');
								redirect('welcome/viewpage/'.$kategori.'/'.$slug.'#komentar');
		}

	}
}
