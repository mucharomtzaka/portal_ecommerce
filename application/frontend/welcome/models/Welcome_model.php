<?php
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
class Welcome_model extends CI_Model
{
	function __construct()
	{
		# code...
		parent::__construct();
	}

	public function get_table_articles(){
		return $this->db->query('SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 4 ')->result_array();
	}

	public function get_iklan_promo(){
		$this->db->order_by('id','DESC');
		$this->db->limit('6');
		return $this->db->get_where('promo_iklan',array('status'=>1))->result_array();
	}

	public function get_iklan_promo_id($group,$slug){
		return $this->db->get_where('promo_iklan',array('status'=>1,'group_product'=>$group,'slug'=>$slug))->row_array();
	}

	public function get_table_articles_lain(){
		return $this->db->query('SELECT * FROM `articles` ORDER BY `id` ASC LIMIT 6')->result_array();
	}
	
	public function links_ex(){
		return $this->db->query('SELECT * FROM `link_external` ORDER BY `id` DESC LIMIT 6  ')->result_array();
	}

	public function list_komentar(){
		return $this->db->query('SELECT * FROM `comment` ORDER BY `id` DESC LIMIT 10 ')->result();
	}

	public function shipping_kurir(){
		return $this->db->query('SELECT * FROM `shipping_kurir` ORDER BY `id_kurir` DESC LIMIT 4  ')->result_array();
	}

	public function galery(){
		return $this->db->query('SELECT * FROM `galery` ORDER BY `id` DESC LIMIT 6')->result_array();
	}

	public function album_galeri($id){
		return $this->db->get_where('galery',array('id_album'=>$id))->result();
	}

	public function detail_album_galeri($q,$kd){
		return $this->db->get_where('galery',array('id_album'=>$q,'id'=>$kd))->row();
	}

	public function get_download(){
		return $this->db->query('SELECT * FROM `download` ORDER BY `id` DESC LIMIT 6')->result_array();
	}

	public function team_partner(){
		return $this->db->query('SELECT * FROM `partner_team` ORDER BY `id` DESC LIMIT 6')->result_array();
	}

	public function get_categori($categori){
		return $this->db->get_where('categori_articles',array('name_categories'=>$categori))->row();
	}

	public function get_group_product($group){
		return $this->db->get_where('group_product',array('id'=>$group))->row();
	}

	public function get_product($slug){
		return $this->db->get_where('product',array('produk'=>$slug))->row_array();
	}

	public function get_dbcategori(){
		return $this->db->get('categori_articles')->result_array();
	}

	public function get_articles($slug){
		return $this->db->get_where('articles',array('slug'=>$slug))->row_array();
	}
	public function group_articles($categori,$limit,$start=0,$q=NULL){
		 $this->db->like('title', $q);
		 $this->db->limit($limit, $start);
		return $this->db->get_where('articles',array('category'=>$categori))->result_array();
	}

	public function sendmessage($data){
		return $this->db->insert('contact',$data);
	}

	public function get_halaman_view($id,$slug){
		return $this->db->get_where('pages',array('slug'=>$slug,'id'=>$id))->row_array();
	}

	public function get_halaman(){
		$this->db->order_by('id','DESC');
		$this->db->limit('6');
		return $this->db->get_where('pages',array('status'=>1))->result();
	}

	public function get_bank_account(){
		return $this->db->get('bank_account')->result();
	}

	public function auto_number_invoice(){
        $auto = 'SELECT MAX(RIGHT(id_order,5)) as kode FROM order_pemesan';
        $queri = $this->db->query($auto)->result();
        foreach($queri as $l){
            $at = $l->kode+1;
            $replace = 'IV000'.$at;
        }
        
        return $replace;
     }
}
