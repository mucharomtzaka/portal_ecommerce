<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Order_pemesan extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Order_pemesan');
        $this->load->model(array('Order_pemesan/Order_pemesan_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'order_pemesan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'order_pemesan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'order_pemesan/index';
            $config['first_url'] = base_url() . 'order_pemesan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Order_pemesan_model->total_rows($q);
        $order_pemesan = $this->Order_pemesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'order_pemesan_data' => $order_pemesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('order_pemesan_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Order_pemesan_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id_order' => $row->id_order,
		'tanggal' => $row->tanggal,
		'nama_pemesan' => $row->nama_pemesan,
		'email_pemesan' => $row->email_pemesan,
		'contact_pemesan' => $row->contact_pemesan,
		'status_order' => $row->status_order,
	    );
            $this->template->render_backend('order_pemesan_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_pemesan'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('order_pemesan/create_action'),
	    'id_order' => set_value('id_order'),
	    'tanggal' => set_value('tanggal'),
	    'nama_pemesan' => set_value('nama_pemesan'),
	    'email_pemesan' => set_value('email_pemesan'),
	    'contact_pemesan' => set_value('contact_pemesan'),
	    'status_order' => set_value('status_order'),
	);
        $this->template->render_backend('order_pemesan_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
		'email_pemesan' => $this->input->post('email_pemesan',TRUE),
		'contact_pemesan' => $this->input->post('contact_pemesan',TRUE),
		'status_order' => $this->input->post('status_order',TRUE),
        'alamat_pemesan' => $this->input->post('alamat_pemesan',TRUE),
	    );

            $this->Order_pemesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('order_pemesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Order_pemesan_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('order_pemesan/update_action'),
		'id_order' => set_value('id_order', $row->id_order),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nama_pemesan' => set_value('nama_pemesan', $row->nama_pemesan),
		'email_pemesan' => set_value('email_pemesan', $row->email_pemesan),
		'contact_pemesan' => set_value('contact_pemesan', $row->contact_pemesan),
		'status_order' => set_value('status_order', $row->status_order),
        'alamat_pemesan' => set_value('status_order', $row->alamat_pemesan),

	    );
            $this->template->render_backend('order_pemesan_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_pemesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_order', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
		'email_pemesan' => $this->input->post('email_pemesan',TRUE),
		'contact_pemesan' => $this->input->post('contact_pemesan',TRUE),
		'status_order' => $this->input->post('status_order',TRUE),
        'alamat_pemesan' => $this->input->post('alamat_pemesan',TRUE),
	    );

            $this->Order_pemesan_model->update($this->input->post('id_order', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('order_pemesan'));
        }
    }
    
    public function delete($id,$pemesan) 
    {
        $row = $this->Order_pemesan_model->get_by_id($id);

        if ($row) {
            $this->Order_pemesan_model->delete($id);
            $this->db->delete('order_detail_pemesan',array('nama_pemesan'=>$pemesan));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('order_pemesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_pemesan'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nama_pemesan', 'nama pemesan', 'trim|required');
	$this->form_validation->set_rules('email_pemesan', 'email pemesan', 'trim|required');
	$this->form_validation->set_rules('contact_pemesan', 'contact pemesan', 'trim|required');
	$this->form_validation->set_rules('status_order', 'status order', 'trim|required');

	$this->form_validation->set_rules('id_order', 'id_order', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Order_pemesan.php */
/* Location: ./application/backend/order_pemesan/Order_pemesan.php */
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

