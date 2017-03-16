
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model{

public $table = 'product';
public $id = 'id';
public $order = 'DESC';

    function __construct(){
      parent::__construct();
    }

// get all
    function get_all(){
     $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
    }

// get data by id
    function get_by_id($id){
    $this->db->where($this->id, $id);
     return $this->db->get($this->table)->row();
    }
                    
 // get total rows
    function total_rows($q = NULL) {
                $this->db->like('id', $q);
	$this->db->or_like('produk', $q);
	$this->db->or_like('deskripsi_produk', $q);
    $this->db->or_like('group_product', $q);
	$this->db->or_like('link_video', $q);
	$this->db->or_like('url_demo', $q);
	$this->db->or_like('images', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
                 return $this->db->count_all_results();
    }

 // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('id', $q);
	$this->db->or_like('produk', $q);
	$this->db->or_like('deskripsi_produk', $q);
	$this->db->or_like('link_video', $q);
	$this->db->or_like('url_demo', $q);
    $this->db->or_like('group_product', $q);
	$this->db->or_like('images', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
             return $this->db->get($this->table)->result();
    }

    function get_limit_group($limit,$start=0,$group,$q=NULL){
        $this->db->order_by($this->id, $this->order);
        $this->db->like('produk', $q);
        $this->db->limit($limit, $start);
        return $this->db->get_where($this->table,array('group_product'=>$group))->result();
    }

// insert data
    function insert($data) {
    $this->db->insert($this->table, $data);
    }

// update data
    function update($id, $data) {
     $this->db->where($this->id, $id);
     $this->db->update($this->table, $data);
     }

     function update_batch($data){
        return $this->db->update_batch($this->table,$data,'id');
     }

// delete data
    function delete($id)  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
     }

     function auto_number(){
        $auto = 'SELECT MAX(RIGHT('.$this->id.',5)) as kode FROM '.$this->table.'';
        $queri = $this->db->query($auto)->result();
        foreach($queri as $l){
            $at = $l->kode+1;
            $replace = 'TR0000'.$at;
        }
        
        return $replace;
     }
}

/* End of file Product_model.php */
/* Location: C:\xampp\htdocs\trefastcms\application\backend/product/models/Product_model.php */
/* Please DO NOT modify this information : */
/*
Trefast Development
Trefast Development merupakan Start up Bussiness di bidang 
jasa pengembangan produk teknologi informasi  web development
Email :mucharomtzaka@yahoo.co.id / mucharomtzaka@gmail.com
Alamat: Jl.Pagersari-Patean , Kendal 51354 Jawa Tengah
HP/Whatapps:+6289692412261
https://github.com/mucharomtzaka
*/
                