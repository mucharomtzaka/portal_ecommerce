
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Schema_database_model extends CI_Model{

public $table = 'schema_database';


    function __construct(){
      parent::__construct();
    }

// get all
    function get_all(){
      return $this->db->get($this->table)->result();
    }
}

/* End of file Schema_database_model.php */
/* Location: C:\xampp\htdocs\trefastcms\application\backend/schema_database/models/Schema_database_model.php */
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
                