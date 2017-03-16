<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Addons extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Addons');
        $this->load->model(array('Addons/Addons_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'addons/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'addons/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'addons/index';
            $config['first_url'] = base_url() . 'addons/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Addons_model->total_rows($q);
        $addons = $this->Addons_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'addons_data' => $addons,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('addons_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Addons_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'name_addons' => $row->name_addons,
		'technical_support' => $row->technical_support,
		'status_addons' => $row->status_addons,
		'description' => $row->description,
		'icon' => $row->icon,
	    );
            $this->template->render_backend('addons_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('addons'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('addons/create_action'),
	    'id' => set_value('id'),
	    'name_addons' => set_value('name_addons'),
	    'technical_support' => set_value('technical_support'),
	    'status_addons' => set_value('status_addons'),
	    'description' => set_value('description'),
	    'icon' => set_value('icon'),
	);
        $this->template->render_backend('addons_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name_addons' => $this->input->post('name_addons',TRUE),
		'technical_support' => $this->input->post('technical_support',TRUE),
		'status_addons' => $this->input->post('status_addons',TRUE),
		'description' => $this->input->post('description',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Addons_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('addons'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Addons_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('addons/update_action'),
		'id' => set_value('id', $row->id),
		'name_addons' => set_value('name_addons', $row->name_addons),
		'technical_support' => set_value('technical_support', $row->technical_support),
		'status_addons' => set_value('status_addons', $row->status_addons),
		'description' => set_value('description', $row->description),
		'icon' => set_value('icon', $row->icon),
	    );
            $this->template->render_backend('addons_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('addons'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name_addons' => $this->input->post('name_addons',TRUE),
		'technical_support' => $this->input->post('technical_support',TRUE),
		'status_addons' => $this->input->post('status_addons',TRUE),
		'description' => $this->input->post('description',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Addons_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('addons'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Addons_model->get_by_id($id);

        if ($row) {
            $this->Addons_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('addons'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('addons'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('name_addons', 'name addons', 'trim|required');
	$this->form_validation->set_rules('technical_support', 'technical support', 'trim|required');
	$this->form_validation->set_rules('status_addons', 'status addons', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	/*$this->form_validation->set_rules('icon', 'icon', 'trim|required');*/

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Addons.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/addons/controllers/Addons.php */
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

