<?php  defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Checkplugin{
	 protected $CI;
	 public $table = 'addons';
     public $modules ='name_addons';
        public function __construct(){
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
        }

	     public function get_by_modules($modules){
			$this->CI->db->where($this->modules, $modules);
	        return $this->CI->db->get($this->table)->row();
		}

		public function index($modules){
			//$this->timeout();
			$ws = $this->get_by_modules($modules);
			if($ws->status_addons == 0){
				$this->CI->session->set_flashdata('notice','Modules '.$modules.' is Disabled!');
				redirect('auth/redirect_alt','refresh');
			}
		}

		/*public function timeout(){
			$time_sess_expiration = 3600;
			$time = $this->CI->session->userdata('last_login');
			$total_session  = time() - $time ;
			if ($total_session > $time_sess_expiration) {
				# code...
				redirect('auth/logout/timeout','refresh');
			}
		}*/
}