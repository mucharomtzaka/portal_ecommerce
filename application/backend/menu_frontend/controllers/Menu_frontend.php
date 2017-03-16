<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Menu_frontend extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Menu_frontend');
        $this->load->model(array('Menu_frontend/Menu_frontend_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu_frontend/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu_frontend/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu_frontend/index';
            $config['first_url'] = base_url() . 'menu_frontend/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_frontend_model->total_rows($q);
        $menu_frontend = $this->Menu_frontend_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'menu_frontend_data' => $menu_frontend,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('menu_frontend_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Menu_frontend_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'menu_frontend_parent' => $row->menu_frontend_parent,
		'menu_frontend_title' => $row->menu_frontend_title,
		'menu_url_title' => $row->menu_url_title,
		'menu_frontend_status' => $row->menu_frontend_status,
		'menu_frontend_icon' => $row->menu_frontend_icon,
		'menu_frontend_description' => $row->menu_frontend_description,
	    );
            $this->template->render_backend('menu_frontend_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_frontend'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('menu_frontend/create_action'),
	    'id' => set_value('id'),
	    'menu_frontend_parent' => set_value('menu_frontend_parent'),
	    'menu_frontend_title' => set_value('menu_frontend_title'),
	    'menu_url_title' => set_value('menu_url_title'),
	    'menu_frontend_status' => set_value('menu_frontend_status'),
	    'menu_frontend_icon' => set_value('menu_frontend_icon'),
	    'menu_frontend_description' => set_value('menu_frontend_description'),
        'list_menu'=>$this->Menu_frontend_model->get_all(),
	);
        $this->template->render_backend('menu_frontend_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'menu_frontend_title' => $this->input->post('menu_frontend_title',TRUE),
        'menu_frontend_parent' => $this->input->post('menu_frontend_parent',TRUE),
		'menu_url_title' => $this->input->post('menu_url_title',TRUE),
		'menu_frontend_status' => $this->input->post('menu_frontend_status',TRUE),
		'menu_frontend_icon' => $this->input->post('menu_frontend_icon',TRUE),
		'menu_frontend_description' => $this->input->post('menu_frontend_description',TRUE),
	    );

            $this->Menu_frontend_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu_frontend'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_frontend_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('menu_frontend/update_action'),
		'id' => set_value('id', $row->id),
		'menu_frontend_parent' => set_value('menu_frontend_parent', $row->menu_frontend_parent),
		'menu_frontend_title' => set_value('menu_frontend_title', $row->menu_frontend_title),
		'menu_url_title' => set_value('menu_url_title', $row->menu_url_title),
		'menu_frontend_status' => set_value('menu_frontend_status', $row->menu_frontend_status),
		'menu_frontend_icon' => set_value('menu_frontend_icon', $row->menu_frontend_icon),
		'menu_frontend_description' => set_value('menu_frontend_description', $row->menu_frontend_description),
        'list_menu'=>$this->Menu_frontend_model->get_all(),
	    );
            $this->template->render_backend('menu_frontend_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_frontend'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'menu_frontend_title' => $this->input->post('menu_frontend_title',TRUE),
		'menu_url_title' => $this->input->post('menu_url_title',TRUE),
		'menu_frontend_status' => $this->input->post('menu_frontend_status',TRUE),
		'menu_frontend_icon' => $this->input->post('menu_frontend_icon',TRUE),
		'menu_frontend_description' => $this->input->post('menu_frontend_description',TRUE),
        'menu_frontend_parent' => $this->input->post('menu_frontend_parent',TRUE),
	    );

            $this->Menu_frontend_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu_frontend'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_frontend_model->get_by_id($id);

        if ($row) {
            $this->Menu_frontend_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu_frontend'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_frontend'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('menu_frontend_title', 'menu frontend title', 'trim|required');
	$this->form_validation->set_rules('menu_url_title', 'menu url title', 'trim|required');
	$this->form_validation->set_rules('menu_frontend_status', 'menu frontend status', 'trim|required');
	//$this->form_validation->set_rules('menu_frontend_icon', 'menu frontend icon', 'trim|required');
	//$this->form_validation->set_rules('menu_frontend_description', 'menu frontend description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Menu_frontend.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/menu_frontend/controllers/Menu_frontend.php */
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

