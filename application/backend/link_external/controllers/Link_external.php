<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Link_external extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Link_external');
        $this->load->model(array('Link_external/Link_external_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'link_external/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'link_external/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'link_external/index';
            $config['first_url'] = base_url() . 'link_external/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Link_external_model->total_rows($q);
        $link_external = $this->Link_external_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'link_external_data' => $link_external,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('link_external_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Link_external_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'nama_link' => $row->nama_link,
		'url' => $row->url,
	    );
            $this->template->render_backend('link_external_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('link_external'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('link_external/create_action'),
	    'id' => set_value('id'),
	    'nama_link' => set_value('nama_link'),
	    'url' => set_value('url'),
	);
        $this->template->render_backend('link_external_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_link' => $this->input->post('nama_link',TRUE),
		'url' => $this->input->post('url',TRUE),
	    );

            $this->Link_external_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('link_external'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Link_external_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('link_external/update_action'),
		'id' => set_value('id', $row->id),
		'nama_link' => set_value('nama_link', $row->nama_link),
		'url' => set_value('url', $row->url),
	    );
            $this->template->render_backend('link_external_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('link_external'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_link' => $this->input->post('nama_link',TRUE),
		'url' => $this->input->post('url',TRUE),
	    );

            $this->Link_external_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('link_external'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Link_external_model->get_by_id($id);

        if ($row) {
            $this->Link_external_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('link_external'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('link_external'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_link', 'nama link', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Link_external.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/link_external/controllers/Link_external.php */
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

