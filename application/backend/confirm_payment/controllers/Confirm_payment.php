<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Confirm_payment extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Confirm_payment');
        $this->load->model(array('Confirm_payment/Confirm_payment_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'confirm_payment/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'confirm_payment/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'confirm_payment/index';
            $config['first_url'] = base_url() . 'confirm_payment/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Confirm_payment_model->total_rows($q);
        $confirm_payment = $this->Confirm_payment_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'confirm_payment_data' => $confirm_payment,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('confirm_payment_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Confirm_payment_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'nama_pengirim' => $row->nama_pengirim,
		'email_pengirim' => $row->email_pengirim,
		'bukti_transfer' => $row->bukti_transfer,
		'no_rekening_dari' => $row->no_rekening_dari,
		'no_rekening_tujuan' => $row->no_rekening_tujuan,
		'nama_bank' => $row->nama_bank,
		'keterangan_lain' => $row->keterangan_lain,
	    );
            $this->template->render_backend('confirm_payment_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('confirm_payment'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('confirm_payment/create_action'),
	    'id' => set_value('id'),
	    'nama_pengirim' => set_value('nama_pengirim'),
	    'email_pengirim' => set_value('email_pengirim'),
	    'bukti_transfer' => set_value('bukti_transfer'),
	    'no_rekening_dari' => set_value('no_rekening_dari'),
	    'no_rekening_tujuan' => set_value('no_rekening_tujuan'),
	    'nama_bank' => set_value('nama_bank'),
	    'keterangan_lain' => set_value('keterangan_lain'),
	);
        $this->template->render_backend('confirm_payment_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'email_pengirim' => $this->input->post('email_pengirim',TRUE),
		'bukti_transfer' => $this->input->post('bukti_transfer',TRUE),
		'no_rekening_dari' => $this->input->post('no_rekening_dari',TRUE),
		'no_rekening_tujuan' => $this->input->post('no_rekening_tujuan',TRUE),
		'nama_bank' => $this->input->post('nama_bank',TRUE),
		'keterangan_lain' => $this->input->post('keterangan_lain',TRUE),
	    );

            $this->Confirm_payment_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('confirm_payment'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Confirm_payment_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('confirm_payment/update_action'),
		'id' => set_value('id', $row->id),
		'nama_pengirim' => set_value('nama_pengirim', $row->nama_pengirim),
		'email_pengirim' => set_value('email_pengirim', $row->email_pengirim),
		'bukti_transfer' => set_value('bukti_transfer', $row->bukti_transfer),
		'no_rekening_dari' => set_value('no_rekening_dari', $row->no_rekening_dari),
		'no_rekening_tujuan' => set_value('no_rekening_tujuan', $row->no_rekening_tujuan),
		'nama_bank' => set_value('nama_bank', $row->nama_bank),
		'keterangan_lain' => set_value('keterangan_lain', $row->keterangan_lain),
	    );
            $this->template->render_backend('confirm_payment_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('confirm_payment'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'email_pengirim' => $this->input->post('email_pengirim',TRUE),
		'bukti_transfer' => $this->input->post('bukti_transfer',TRUE),
		'no_rekening_dari' => $this->input->post('no_rekening_dari',TRUE),
		'no_rekening_tujuan' => $this->input->post('no_rekening_tujuan',TRUE),
		'nama_bank' => $this->input->post('nama_bank',TRUE),
		'keterangan_lain' => $this->input->post('keterangan_lain',TRUE),
	    );

            $this->Confirm_payment_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('confirm_payment'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Confirm_payment_model->get_by_id($id);

        if ($row) {
            $path_gambar = './doc/images/payment/'.$row->bukti_transfer;
            chmod($path_gambar,0777);
            if(file_exists($path_gambar)){
                @unlink($path_gambar);
            }
            $this->Confirm_payment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('confirm_payment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('confirm_payment'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pengirim', 'nama pengirim', 'trim|required');
	$this->form_validation->set_rules('email_pengirim', 'email pengirim', 'trim|required');
	$this->form_validation->set_rules('bukti_transfer', 'bukti transfer', 'trim|required');
	$this->form_validation->set_rules('no_rekening_dari', 'no rekening dari', 'trim|required');
	$this->form_validation->set_rules('no_rekening_tujuan', 'no rekening tujuan', 'trim|required');
	$this->form_validation->set_rules('nama_bank', 'nama bank', 'trim|required');
	$this->form_validation->set_rules('keterangan_lain', 'keterangan lain', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Confirm_payment.php */
/* Location: ./application/backend/confirm_payment/Confirm_payment.php */
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

