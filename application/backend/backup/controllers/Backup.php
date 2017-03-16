<?php
/**
* 
*/
class Backup extends BackendController
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		 if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        //$this->checkplugin->index('Backup');
        $this->load->model(array('Backup/Backup_model'));
	}

	public function index(){
		$this->data['head'] = 'Backup Database System';
		$this->data['linkbutton'] = anchor(base_url('backup/download'),'Backup Database','class="btn btn-default"><i class="fa fa-download"></i') ;
		$this->data['message'] = $this->session->flashdata('message');
		$this->template->render_backend('viewbackup',$this->data);
	}

	public function download(){
		$nama_file  = 'trefastcms_database';
		$backup  	= $this->Backup_model->download_database($nama_file);
		//set premission folder backup , restore,archive 
		chmod('database/backup',0777);
		chmod('database/archive',0777);
		$file = write_file('./database/backup/'.$nama_file.'.sql', $backup);
		$filesql = base_url('./database/backup/'.$nama_file.'.sql'); 
		$filezip = base_url('./database/archive/'.$nama_file.'.zip');
		$zip = $this->zip->add_data($nama_file.'.sql',$backup);
		$archive = $this->zip->archive('./database/archive/'.$nama_file.'.zip');

         if(file_exists($file)){
                  @unlink($file);
         }

         if(file_exists($filezip)){
                  @unlink($filezip);
         }
                // Load the download helper and send the file to your desktop
                //$this->load->helper('download');

                $link_download  = $filesql;
                $link_download2 =  $filezip;
                $download = '<a href="'.$link_download.'"> Silahkan Unduh File '.$nama_file.'.sql !</a> atau  Unduh File <a href="'.$link_download2.'"> Silahkan Unduh File '.$nama_file.'.zip !</a> ';
				$this->session->set_flashdata('message','success backup database '.$nama_file.' is create '.$download.' ');
	   redirect('backup?token='.md5($this->security->get_csrf_hash()).'','refresh');
	}
}