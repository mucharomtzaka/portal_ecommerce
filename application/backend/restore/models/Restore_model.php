<?php 
/**
* 
*/
class Restore_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		
	}

	public function upload_database($sql_file){
		 $direktori = './database/restore/'; //Folder penyimpanan file
		 chmod($direktori,0777);
         $nama_tmp  = $_FILES['sql']['tmp_name']; //Nama file sementara
         $upload = $direktori . $sql_file;
         move_uploaded_file($nama_tmp, $upload);
         $path_file = './database/restore/'.$sql_file;
         if(!file_exists($path_file)){
             @unlink($path_file);
         }

         return $path_file;

	}
}
