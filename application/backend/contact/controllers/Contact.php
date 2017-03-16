<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Contact');
        $this->load->model(array('Contact/Contact_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'contact/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contact/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contact/index';
            $config['first_url'] = base_url() . 'contact/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Contact_model->total_rows($q);
        $contact = $this->Contact_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'contact_data' => $contact,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('contact_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Contact_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'fullname' => $row->fullname,
		'email' => $row->email,
		'website' => $row->website,
		'message' => $row->message,
		'date' => $row->date,
		'time' => $row->time,
        'aksi' =>'contact/reply'
	    );
            $this->template->render_backend('contact_read',array_merge($this->data));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact'));
        }
    }

    public function reply(){

        $vstremail      = $this->input->post('email');  
        $subjek         = $this->input->post('subjek');     
        $messagerep     = $this->input->post('message');
        $adminmail = $this->session->userdata('email');  
        $this->load->library('email');           
        $this->email->from($adminmail, 'Trefast Administrators');      
        $this->email->to($vstremail);               
        $this->email->subject($subjek);             
        $this->email->message($messagerep);                     

        if($this->email->send()){           
            $this->session->set_flashdata('message', 'Message is delivered to '.$vstremail.'');
            redirect(site_url('contact'));    
         }else{           
            $error = $this->email->print_debugger(); 
            $this->session->set_flashdata('message', 'Message is undelivered to '.$vstremail.'eror'.$error.'');
            redirect(site_url('contact?error_log=undelivered'));
        }

    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('contact/create_action'),
	    'id' => set_value('id'),
	    'fullname' => set_value('fullname'),
	    'email' => set_value('email'),
	    'website' => set_value('website'),
	    'message' => set_value('message'),
	    'date' => set_value('date'),
	    'time' => set_value('time'),
	);
        $this->template->render_backend('contact_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'fullname' => $this->input->post('fullname',TRUE),
		'email' => $this->input->post('email',TRUE),
		'website' => $this->input->post('website',TRUE),
		'message' => $this->input->post('message',TRUE),
		'date' => $this->input->post('date',TRUE),
		'time' => $this->input->post('time',TRUE),
	    );

            $this->Contact_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contact'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Contact_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('contact/update_action'),
		'id' => set_value('id', $row->id),
		'fullname' => set_value('fullname', $row->fullname),
		'email' => set_value('email', $row->email),
		'website' => set_value('website', $row->website),
		'message' => set_value('message', $row->message),
		'date' => set_value('date', $row->date),
		'time' => set_value('time', $row->time),
	    );
            $this->template->render_backend('contact_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'fullname' => $this->input->post('fullname',TRUE),
		'email' => $this->input->post('email',TRUE),
		'website' => $this->input->post('website',TRUE),
		'message' => $this->input->post('message',TRUE),
		'date' => $this->input->post('date',TRUE),
		'time' => $this->input->post('time',TRUE),
	    );

            $this->Contact_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contact'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Contact_model->get_by_id($id);

        if ($row) {
            $this->Contact_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contact'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('website', 'website', 'trim|required');
	$this->form_validation->set_rules('message', 'message', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required|date');
	$this->form_validation->set_rules('time', 'time', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Contact.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/contact/controllers/Contact.php */
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

