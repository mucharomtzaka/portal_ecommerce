<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Order_detail_pemesan extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Order_detail_pemesan');
        $this->load->model(array('Order_detail_pemesan/Order_detail_pemesan_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'order_detail_pemesan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'order_detail_pemesan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'order_detail_pemesan/index';
            $config['first_url'] = base_url() . 'order_detail_pemesan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Order_detail_pemesan_model->total_rows($q);
        $order_detail_pemesan = $this->Order_detail_pemesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'order_detail_pemesan_data' => $order_detail_pemesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('order_detail_pemesan_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Order_detail_pemesan_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id_order_detail' => $row->id_order_detail,
		'id_produk' => $row->id_produk,
		'qty' => $row->qty,
		'harga' => $row->harga,
		'nama_pemesan' => $row->nama_pemesan,
		'status' => $row->status,
	    );
            $this->template->render_backend('order_detail_pemesan_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_detail_pemesan'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('order_detail_pemesan/create_action'),
	    'id_order_detail' => set_value('id_order_detail'),
	    'id_produk' => set_value('id_produk'),
	    'qty' => set_value('qty'),
	    'harga' => set_value('harga'),
	    'nama_pemesan' => set_value('nama_pemesan'),
	    'status' => set_value('status'),
	);
        $this->template->render_backend('order_detail_pemesan_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Order_detail_pemesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('order_detail_pemesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Order_detail_pemesan_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('order_detail_pemesan/update_action'),
		'id_order_detail' => set_value('id_order_detail', $row->id_order_detail),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'qty' => set_value('qty', $row->qty),
		'harga' => set_value('harga', $row->harga),
		'nama_pemesan' => set_value('nama_pemesan', $row->nama_pemesan),
		'status' => set_value('status', $row->status),
	    );
            $this->template->render_backend('order_detail_pemesan_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_detail_pemesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_order_detail', TRUE));
        } else {
            $data = array(
		'id_produk' => $this->input->post('id_produk',TRUE),
		'qty' => $this->input->post('qty',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );
        
            $this->Order_detail_pemesan_model->update($this->input->post('id_order_detail', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('order_detail_pemesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Order_detail_pemesan_model->get_by_id($id);

        if ($row) {
            $this->Order_detail_pemesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('order_detail_pemesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_detail_pemesan'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('qty', 'qty', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('nama_pemesan', 'nama pemesan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_order_detail', 'id_order_detail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Order_detail_pemesan.php */
/* Location: ./application/backend/order_detail_pemesan/Order_detail_pemesan.php */
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

