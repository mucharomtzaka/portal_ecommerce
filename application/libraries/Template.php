<?php
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
/**
* 
loader template dinamis 
*/
class Template 
{
	protected $viewdata = array();
	
	function __construct()
	{
		# code...
		$this->CI =& get_instance();
		$this->menu = $this->CI->load->model(array('navigasi_model','settings/setting_model'));
		$this->token = $this->CI->security->get_csrf_hash();
	}
	/*
	  Template render dinamis yang akan ditampilkan views browser 
	*/
	public function render_backend($view, $data=array(), $returnhtml=false){
		//$this->viewdata = (empty($data)) ? $this->data: $data;
		$this->get_menu_backend($data);
		$view_html = $this->CI->load->view('template/backend/header', $this->viewdata);//header
		$view_html = $this->CI->load->view('template/backend/navbar', $this->viewdata);//navbar
		$view_html = $this->CI->load->view($view, $this->viewdata, $returnhtml); //page dinamis 
		$view_html = $this->CI->load->view('template/backend/asidebar', $this->viewdata);
		$view_html = $this->CI->load->view('template/backend/footer', $this->viewdata);//footer
		//if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

	public function render_frontend($view, $data=array(), $returnhtml=false){
		$this->get_menu_frontend($data);
		$view_html = $this->CI->load->view($view, $this->viewdata, $returnhtml); //page dinamis 
		$view_html = $this->CI->load->view('template/frontend/asidebar', $this->viewdata);
		$view_html = $this->CI->load->view('template/frontend/footer', $this->viewdata);//footer
		//if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

	//config custom 

	protected function _config($data){
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$configsite = $this->CI->setting_model->get_all();
		$this->viewdata['credit'] = $this->CI->config->item('credit');
		$this->viewdata['emailist'] =  $this->CI->config->item('Email');
		$this->viewdata['deskripsi'] = $configsite->description;
		$this->viewdata['keyword']	= $configsite->keyword;
		$this->viewdata['favicon']  = $configsite->favicon;
		$this->viewdata['ads'] =$configsite->ads;
		$this->viewdata['google_analyst'] = $configsite->google_analyst;
		$this->viewdata['peta_lokasi'] = $configsite->peta_lokasi;
		$this->viewdata['title'] = $configsite->title_footer;
		$this->viewdata['kontak'] = $configsite->text_contact;
		$this->viewdata['text_profil'] =$configsite->text_profil;
		$this->viewdata['versi']  = $this->CI->config->item('version');
		$this->viewdata['titled'] = $configsite->title_header;
		$this->viewdata['title_footer'] = $configsite->title_footer;
		$this->viewdata['app_id_fb'] =  $configsite->appidfb;
		$this->viewdata['app_secret_fb'] = $configsite->appid_secret;
		$this->viewdata['sosmed_fb'] = $configsite->sosmed_fb;
		$this->viewdata['sosmed_inst'] = $configsite->sosmed_inst;
		$this->viewdata['sosmed_git'] = $configsite->sosmed_git;
		$this->viewdata['sosmed_google'] = $configsite->sosmed_google;
		$this->viewdata['sosmed_tweet'] = $configsite->sosmed_tweet;
		$this->viewdata['sosmed_butc'] = $configsite->sosmed_butc;
		$this->viewdata['runningtext']	 = $configsite->runningtext;
		return array_merge($this->viewdata);
	}

	protected function get_menu_backend($data){
		$this->_config($data);
		$menu = $this->menu->navigasi_model->menubar_backend($this->token);
		$this->viewdata['title_mini'] = 'TrefastAdmin';
		$this->viewdata['menu_top'] = $this->menu->navigasi_model->create_list_top($menu,0);
		$this->viewdata['menu_side'] = $this->menu->navigasi_model->create_list_sidebar($menu,0);
		return array_merge($this->viewdata);
	}

	protected function get_menu_frontend($data){
		$this->_config($data);
		$menubar_backend = $this->menu->navigasi_model->menubar_backend($this->token);
		$menubar_frontend = $this->menu->navigasi_model->menubar_frontend($this->token);
		if($this->CI->ion_auth->is_admin()){
			$this->viewdata['menu_top'] = $this->menu->navigasi_model->create_list_top($menubar_backend,0);
			$this->viewdata['menu_side'] = $this->menu->navigasi_model->create_list_sidebar($menubar_frontend,0);
		}else{
		$this->viewdata['menu_top'] = $this->menu->navigasi_model->create_list_top($menubar_frontend,0);
		$this->viewdata['menu_side'] = $this->menu->navigasi_model->create_list_sidebar($menubar_frontend,0);
		}
		$this->viewdata['title_mini'] = 'TrefastAdmin';
		$view_html = $this->CI->load->view('template/frontend/header', $this->viewdata);//header
		if(!$this->CI->ion_auth->is_admin()){
			$view_html = $this->CI->load->view('template/frontend/navbar', $this->viewdata);//navbar
		}else{
			$view_html = $this->CI->load->view('template/backend/navbar', $this->viewdata);//navbar
		}

		return array_merge($this->viewdata);
	}


}