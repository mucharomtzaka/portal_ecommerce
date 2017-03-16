
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Download_model extends CI_Model{

public $table = 'download';
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
	$this->db->or_like('judul_file', $q);
	$this->db->or_like('file', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->from($this->table);
                 return $this->db->count_all_results();
    }

 // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('id', $q);
	$this->db->or_like('judul_file', $q);
	$this->db->or_like('file', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->limit($limit, $start);
             return $this->db->get($this->table)->result();
    }

    function get_file_name($file){
        return $this->db->get_where($this->table,array('file'=>$file))->row();
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

// delete data
    function delete($id)  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
     }
}

/* End of file Download_model.php */
/* Location: C:\xampp\htdocs\trefastcms\application\backend/download/models/Download_model.php */
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
                