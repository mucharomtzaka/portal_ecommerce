<?php
/**
* 
*/
class Restore extends BackendController
{
	
	function __construct()
	{
		# code...
		parent::__construct();
        $this->checkplugin->index('Restore');
        $this->load->model(array('Restore/Restore_model'));
	}

	public function index(){
		if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
		$this->data['aksi']  = 'restore/upload';
		$this->data['titleu'] = 'Restore Database System Trefastsoft';
		$this->data['message'] = $this->session->flashdata('message');
		$this->template->render_backend('viewrestore',$this->data);
	}

	public function upload(){
					 if($sql_file= $_FILES['sql']['name']!=''){
					 	$extensi_file_zip = get_mime_by_extension($sql_file);
					 	$sql_file= $_FILES['sql']['name'];
					  //echo $extensi_file_zip;
					  if($extensi_file_zip =='application/x-zip'){
					  	 //$files = $this->Restore_model->upload_database($sql_file);
					  	 //$get_file  = $this->zip->read_file($files);
					  	// echo json_encode($get_file);
					  }else{
							  	$files = $this->Restore_model->upload_database($sql_file);
							  	 $get_file  = file_get_contents($files);
						         $string_query = rtrim($get_file,"\r\n;");
						         $array_sql = explode(";",$string_query);

						         $this->db->trans_start();

							         foreach ($array_sql as $query) {

							            $this->db->query('SET FOREIGN_KEY_CHECKS=0');
							            $this->db->query($query);
							            $this->db->query('SET FOREIGN_KEY_CHECKS=1');
							           
							         }

						          $this->db->trans_complete();
						         	 if ($this->db->trans_status() === FALSE){
      										show_error('error restore database');
								   }else{
								   	 $this->session->set_flashdata('message','Succes restore database with files '.$sql_file.'');
								   	 $this->index();
								   }
						       
			  			 
				          }
				}else{
					 $this->session->set_flashdata('message','Error restore database ');
					redirect('restore?token='.md5($this->security->get_csrf_hash()),'refresh');
				}
		 }
		  
}