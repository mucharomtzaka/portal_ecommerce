<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends BackendController {
/*
Trefast Development
Trefast Development merupakan Start up Bussiness di bidang 
jasa pengembangan produk teknologi informasi  web development
*/
/*
@author: Mucharom
@Email :mucharomtzaka@yahoo.co.id / mucharomtzaka@gmail.com
@Alamat: Jl.Pagersari-Patean , Kendal 51354 Jawa Tengah
@HP/Whatapps:+6289692412261
@https://github.com/mucharomtzaka
@fanspage : https://www.facebook.com/trefast.teknik.indonesia 
homepage coming soon 
*/
 function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->load->model(array('settings/setting_model'));
        $this->checkplugin->index('settings');
    }
	public function index()
	{
		$row = $this->setting_model->get_all();
		$this->data['titlehead'] = 'Setting General System';
		$this->data['aksi']  = 'settings/saveconfig';
		$this->data['title_header'] = set_value('title_header',$row->title_header);
		$this->data['keyword'] = set_value('keyword',$row->keyword);
		$this->data['deskripsi'] = set_value('deskripsi',$row->description);
		$this->data['title_footer'] = set_value('keyword',$row->title_footer);
		$this->data['ads'] = set_value('keyword',$row->ads);
		$this->data['google_analyst'] = set_value('google_analyst',$row->google_analyst);
		$this->data['text_contact'] = set_value('text_contact',$row->text_contact);
		$this->data['protocol'] = set_value('protocol',$row->protocol);
		$this->data['smtp_host'] = set_value('smtp_host',$row->smtp_host);
		$this->data['smtp_user'] = set_value('smtp_user',$row->smtp_user);
		$this->data['smtp_password'] = set_value('smtp_password',$row->smtp_password);
		$this->data['smtp_port'] = set_value('smtp_host',$row->smtp_port);
		$this->data['newline'] = set_value('newline',$row->newline);
		$this->data['peta_link'] = set_value('peta_link',$row->peta_lokasi);
		$this->data['text_profil'] = set_value('text_profil',$row->text_profil);
		$this->data['appid'] 		= set_value('appid',$row->appidfb);
		$this->data['app_secret'] 	= set_value('app_secret',$row->appid_secret);
		$this->data['text_running'] = set_value('text_running',$row->runningtext);
		$this->data['fb'] = set_value('fb',$row->sosmed_fb);
		$this->data['twitter'] = set_value('twitter',$row->sosmed_tweet);
		$this->data['google_plus'] = set_value('google_plus',$row->sosmed_google);
		$this->data['instagram'] = set_value('google_plus',$row->sosmed_inst);
		$this->data['github']	= set_value('github',$row->sosmed_git);
		$this->data['bucket']  = set_value('bucket',$row->sosmed_butc);
		$this->data['favicon'] = $row->favicon;
		$this->data['button'] = 'save';
		$this->data['message']  =$this->session->flashdata('message');
		$this->template->render_backend('viewsetting',$this->data);
	}

	public function mode_development($param){
		if($param =='aktive'){
			$data = array('develop'=>TRUE);
		    $this->session->set_userdata($data);
		    $this->session->set_flashdata('message','Mode Development is Active');
		    redirect('settings?mode=active&token='.md5($this->security->get_csrf_hash()).'','refresh');
		}elseif($param == 'nonaktive'){
			$data = array('develop'=>FALSE);
		    $this->session->set_userdata($data);
		    $this->session->set_flashdata('message','Mode Development is Non Active');
		  redirect('settings?mode=non_active&token='.md5($this->security->get_csrf_hash()).'','refresh');
		}
	}

	public function saveconfig(){
		
		 if($_FILES['favicon']['name'] != ""){
                   	$logo = $_FILES['favicon']['name'];
	                $direktori = './doc/images/favicon/'; //Folder penyimpanan file
	                chmod($direktori,0777);
	                //$max_size  = 1000000*10; //Ukuran file maximal 10mb
	                 $nama_file =  $logo ; //Nama file yang akan di Upload
	               // $file_size = $_FILES['file']['size']; //Ukuran file yang akan di Upload
	                 $nama_tmp  = $_FILES['favicon']['tmp_name']; //Nama file sementara
	                 $upload = $direktori . $nama_file;
	                 $row = $this->setting_model->get_all();
					 unlink('./doc/images/favicon/'.$row->favicon);
	                 move_uploaded_file($nama_tmp, $upload);
	                $data['favicon'] =$logo;
          }

		$data['title_header'] = $this->input->post('title_header',TRUE);
		$data['appidfb'] = $this->input->post('appid',TRUE);
		$data['runningtext'] = $this->input->post('text_running',TRUE);
		$data['appid_secret'] = $this->input->post('app_secret',TRUE);
		$data['title_footer'] = $this->input->post('title_footer',TRUE);
		$data['description'] = $this->input->post('deskripsi',TRUE);
		$data['ads'] = $this->input->post('ads',TRUE);
		$data['keyword'] = $this->input->post('keyword',TRUE);
		$data['peta_lokasi'] = $this->input->post('peta_link',TRUE);
		$data['text_contact'] = $this->input->post('text_contact',TRUE);
		$data['text_profil'] = $this->input->post('text_profil',TRUE);
		$data['google_analyst'] = $this->input->post('google_analyst',TRUE);
		$data['sosmed_butc'] = $this->input->post('bucket',TRUE);
		$data['sosmed_fb'] = $this->input->post('fb',TRUE);
		$data['sosmed_git'] = $this->input->post('github',TRUE);
		$data['sosmed_tweet'] = $this->input->post('twitter',TRUE);
		$data['sosmed_google'] = $this->input->post('google_plus',TRUE);
		$data['sosmed_inst'] = $this->input->post('instagram',TRUE);
		$data['newline'] = $this->input->post('newline',TRUE);
		$data['protocol'] = $this->input->post('protocol',TRUE);
		$data['smtp_host'] = $this->input->post('smtp_host',TRUE);
		$data['smtp_password'] = $this->input->post('smtp_password',TRUE);
		$data['smtp_user'] = $this->input->post('smtp_user',TRUE);
		$data['smtp_port'] = $this->input->post('smtp_port',TRUE);
		$this->setting_model->save($data);
$string ="<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
| http://ellislab.com/codeigniter/user-guide/libraries/email.html
|
*/
\$config['mailtype'] = 'html';
\$config['protocol']='".$data['protocol']."';
\$config['smtp_host']='".$data['smtp_host'].".'; //(SMTP server)
\$config['smtp_port']='".$data['smtp_port']."'; //(SMTP port)
\$config['smtp_timeout']='30';
\$config['smtp_user']='".$data['smtp_user']."'; //(user@gmail.com)
\$config['smtp_pass']='".$data['smtp_password']."'; // (gmail password)
\$config['charset'] = 'utf-8';
\$config['newline'] = ".$data['newline'].";


/* End of file email.php */
/* Location: ./application/config/email.php */";
					createFile($string, APPPATH."config/email.php");

		 $this->session->set_flashdata('message','Setting Configuration Web Site is saving');
		  redirect('settings?token='.md5($this->security->get_csrf_hash()).'','refresh');
	}
}
