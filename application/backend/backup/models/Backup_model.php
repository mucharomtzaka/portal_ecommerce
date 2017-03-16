<?php 
/**
* 
*/
class Backup_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->dbutil();
	}

	function download_database($nama_file){
		$prefs = array(
                        'tables'      => array(),  // Array of tables to backup.
                        'ignore'      => array(),           // List of tables to omit from the backup
                        'format'      => 'txt',             // gzip, zip, txt
                        'filename'    => $nama_file.'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                        'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                        'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                        'newline'     => "\r\n" ,              // Newline character used in backup file
                        'foreign_key_checks'=>TRUE
                      );

                // Backup your entire database and assign it to a variable
        $backup =& $this->dbutil->backup($prefs);
        return $backup;
	}
}
