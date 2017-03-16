
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Partner_team_model extends CI_Model{

public $table = 'partner_team';
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
	$this->db->or_like('team', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('img', $q);
	$this->db->from($this->table);
                 return $this->db->count_all_results();
    }

 // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
    $this->db->order_by($this->id, $this->order);
    $this->db->like('id', $q);
	$this->db->or_like('team', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('img', $q);
	$this->db->limit($limit, $start);
             return $this->db->get($this->table)->result();
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

/* End of file Partner_team_model.php */
/* Location: C:\xampp\htdocs\trefastcms\application\backend/partner_team/models/Partner_team_model.php */
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
                