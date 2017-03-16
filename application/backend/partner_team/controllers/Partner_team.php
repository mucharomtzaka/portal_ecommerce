<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Partner_team extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Partner_team');
        $this->load->model(array('Partner_team/Partner_team_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'partner_team/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'partner_team/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'partner_team/index';
            $config['first_url'] = base_url() . 'partner_team/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Partner_team_model->total_rows($q);
        $partner_team = $this->Partner_team_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'partner_team_data' => $partner_team,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('partner_team_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Partner_team_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'team' => $row->team,
		'url' => $row->url,
		'img' => $row->img,
	    );
            $this->template->render_backend('partner_team_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partner_team'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('partner_team/create_action'),
	    'id' => set_value('id'),
	    'team' => set_value('team'),
	    'url' => set_value('url'),
	    'img' => set_value('img'),
	);
        $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('partner_team_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

             if($_FILES['img']['name'] != ""){
                        $config['upload_path'] = 'doc/images/partner';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = '2000';
                        $config['remove_spaces'] = true;
                        $config['overwrite'] = false;
                        $config['encrypt_name'] = true;
                        $config['max_width']  = '';
                        $config['max_height']  = '';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);            
                        if (!$this->upload->do_upload('img')){
                            $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                            $this->session->set_flashdata('message',$error);
                             redirect(site_url('partner_team/create'));
                        }else{
                        $image = $this->upload->data();
                        if ($image['file_name']){
                            $data['file1'] = $image['file_name'];
                        }        
                            $img = $data['file1'];
                    }
                }

                $data = array(
        		'team' => $this->input->post('team',TRUE),
        		'url' => $this->input->post('url',TRUE),
        		'img' => $img,
        	    );

            $this->Partner_team_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('partner_team'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Partner_team_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('partner_team/update_action'),
		'id' => set_value('id', $row->id),
		'team' => set_value('team', $row->team),
		'url' => set_value('url', $row->url),
		'img' => set_value('img', $row->img),
	    );
            $this->template->render_backend('partner_team_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partner_team'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
              $id = $this->input->post('id',TRUE);
              $row = $this->Partner_team_model->get_by_id($id);
             unlink('./doc/images/partner/'.$row->img);
            if($_FILES['img']['name'] != ""){
                        $config['upload_path'] = 'doc/images/partner';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = '2000';
                        $config['remove_spaces'] = true;
                        $config['overwrite'] = false;
                        $config['encrypt_name'] = true;
                        $config['max_width']  = '';
                        $config['max_height']  = '';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);            
                        if (!$this->upload->do_upload('img')){
                            $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                            $this->session->set_flashdata('message',$error);
                             redirect(site_url('partner_team/create'));
                        }else{
                        $image = $this->upload->data();
                        if ($image['file_name']){
                            $data['file1'] = $image['file_name'];
                        }        
                            $img = $data['file1'];
                    }
                }
            $data = array(
        		'team' => $this->input->post('team',TRUE),
        		'url' => $this->input->post('url',TRUE),
        		'img' => $img,
        	    );

            $this->Partner_team_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('partner_team'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Partner_team_model->get_by_id($id);

        if ($row) {
            $this->Partner_team_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('partner_team'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partner_team'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('team', 'team', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	//$this->form_validation->set_rules('img', 'img', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Partner_team.php */
/* Location: ./application/backend/partner_team/Partner_team.php */
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

