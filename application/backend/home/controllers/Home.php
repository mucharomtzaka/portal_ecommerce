<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Home extends BackendController {
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
        parent::__construct();
        if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('home');
    }
	public function index()
	{
		$this->data['jml_artikel'] = $this->db->count_all('articles');
		$this->data['jml_pages'] = $this->db->count_all('pages');
		$this->data['jml_galeri'] = $this->db->count_all('galery');
		$this->data['jml_pesan'] = $this->db->count_all('contact');
		$this->data['jml_order'] = $this->db->count_all('order_pemesan');
		$this->data['jml_produk'] = $this->db->count_all('product');
		$this->data['message']  =$this->session->flashdata('message');
		$this->data['payment']  = $this->db->get_where('confirm_payment',array('tanggal'=>date('Y-m-d H:i:s')))->num_rows();
		$this->template->render_backend('home',$this->data);
	}
}
