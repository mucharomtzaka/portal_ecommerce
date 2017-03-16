<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Categori_articles extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Categori_articles');
        $this->load->model(array('Categori_articles/Categori_articles_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'categori_articles/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'categori_articles/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'categori_articles/index';
            $config['first_url'] = base_url() . 'categori_articles/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Categori_articles_model->total_rows($q);
        $categori_articles = $this->Categori_articles_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'categori_articles_data' => $categori_articles,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('categori_articles_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Categori_articles_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'name_categories' => $row->name_categories,
	    );
            $this->template->render_backend('categori_articles_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categori_articles'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('categori_articles/create_action'),
	    'id' => set_value('id'),
	    'name_categories' => set_value('name_categories'),
	);
        $this->template->render_backend('categori_articles_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name_categories' => $this->input->post('name_categories',TRUE),
	    );

            $this->Categori_articles_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('categori_articles'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Categori_articles_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('categori_articles/update_action'),
		'id' => set_value('id', $row->id),
		'name_categories' => set_value('name_categories', $row->name_categories),
	    );
            $this->template->render_backend('categori_articles_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categori_articles'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name_categories' => $this->input->post('name_categories',TRUE),
	    );

            $this->Categori_articles_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('categori_articles'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categori_articles_model->get_by_id($id);

        if ($row) {
            $this->Categori_articles_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('categori_articles'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categori_articles'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('name_categories', 'name categories', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Categori_articles.php */
/* Location: ./application/backend/categori_articles/Categori_articles.php */
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

