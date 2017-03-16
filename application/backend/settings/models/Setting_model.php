<?php
/**
* 
*/
class Setting_model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->table = 'settings';
	}

	public function get_all(){
		return $this->db->get($this->table)->row();
	}

	public function save($data){
		$cek = $this->db->set($data);
		return $this->db->update($this->table);
	}
}