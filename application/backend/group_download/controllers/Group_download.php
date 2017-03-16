<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Group_download extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Group_download');
        $this->load->model(array('Group_download/Group_download_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'group_download/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'group_download/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'group_download/index';
            $config['first_url'] = base_url() . 'group_download/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Group_download_model->total_rows($q);
        $group_download = $this->Group_download_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'group_download_data' => $group_download,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('group_download_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Group_download_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id_group_download' => $row->id_group_download,
		'group_download_list' => $row->group_download_list,
	    );
            $this->template->render_backend('group_download_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('group_download'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('group_download/create_action'),
	    'id_group_download' => set_value('id_group_download'),
	    'group_download_list' => set_value('group_download_list'),
	);
        $this->template->render_backend('group_download_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'group_download_list' => $this->input->post('group_download_list',TRUE),
	    );

            $this->Group_download_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('group_download'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Group_download_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('group_download/update_action'),
		'id_group_download' => set_value('id_group_download', $row->id_group_download),
		'group_download_list' => set_value('group_download_list', $row->group_download_list),
	    );
            $this->template->render_backend('group_download_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('group_download'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_group_download', TRUE));
        } else {
            $data = array(
		'group_download_list' => $this->input->post('group_download_list',TRUE),
	    );

            $this->Group_download_model->update($this->input->post('id_group_download', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('group_download'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Group_download_model->get_by_id($id);

        if ($row) {
            $this->Group_download_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('group_download'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('group_download'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('group_download_list', 'group download list', 'trim|required');

	$this->form_validation->set_rules('id_group_download', 'id_group_download', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Group_download.php */
/* Location: ./application/backend/group_download/Group_download.php */
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

