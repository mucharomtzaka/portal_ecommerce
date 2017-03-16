<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Routerapp extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Routerapp');
        $this->load->model(array('Routerapp/Routerapp_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'routerapp/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'routerapp/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'routerapp/index';
            $config['first_url'] = base_url() . 'routerapp/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Routerapp_model->total_rows($q);
        $routerapp = $this->Routerapp_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'routerapp_data' => $routerapp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('routerapp_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Routerapp_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'slug' => $row->slug,
		'controller' => $row->controller,
	    );
            $this->template->render_backend('routerapp_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('routerapp'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('routerapp/create_action'),
	    'id' => set_value('id'),
	    'slug' => set_value('slug'),
	    'controller' => set_value('controller'),
	);
        $this->template->render_backend('routerapp_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'slug' => $this->input->post('slug',TRUE),
		'controller' => $this->input->post('controller',TRUE),
	    );

            $this->Routerapp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('routerapp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Routerapp_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('routerapp/update_action'),
		'id' => set_value('id', $row->id),
		'slug' => set_value('slug', $row->slug),
		'controller' => set_value('controller', $row->controller),
	    );
            $this->template->render_backend('routerapp_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('routerapp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'slug' => $this->input->post('slug',TRUE),
		'controller' => $this->input->post('controller',TRUE),
	    );

            $this->Routerapp_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('routerapp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Routerapp_model->get_by_id($id);

        if ($row) {
            $this->Routerapp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('routerapp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('routerapp'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('controller', 'controller', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Routerapp.php */
/* Location: ./application/backend/routerapp/Routerapp.php */
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

