<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Pages');
        $this->load->model(array('Pages/Pages_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pages/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pages/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pages/index';
            $config['first_url'] = base_url() . 'pages/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pages_model->total_rows($q);
        $pages = $this->Pages_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'pages_data' => $pages,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('pages_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Pages_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'titley' => $row->title,
		'slug' => $row->slug,
		'content' => $row->content,
		'status' => $row->status,
	    );
            $this->template->render_backend('pages_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('pages/create_action'),
	    'id' => set_value('id'),
	    'titley' => set_value('title'),
	    'slug' => set_value('slug'),
	    'content' => set_value('content'),
	    'status' => set_value('status'),
	);
        $this->template->render_backend('pages_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'content' => $this->input->post('content',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pages_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pages'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pages_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('pages/update_action'),
		'id' => set_value('id', $row->id),
		'titley' => set_value('title', $row->title),
		'slug' => set_value('slug', $row->slug),
		'content' => set_value('content', $row->content),
		'status' => set_value('status', $row->status),
	    );
            $this->template->render_backend('pages_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'content' => $this->input->post('content',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pages_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pages'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pages_model->get_by_id($id);

        if ($row) {
            $this->Pages_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pages'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pages'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('content', 'content', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pages.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/pages/controllers/Pages.php */
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

