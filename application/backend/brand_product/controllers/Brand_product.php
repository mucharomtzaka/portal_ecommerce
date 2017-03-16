<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Brand_product extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Brand_product');
        $this->load->model(array('Brand_product/Brand_product_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'brand_product/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'brand_product/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'brand_product/index';
            $config['first_url'] = base_url() . 'brand_product/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Brand_product_model->total_rows($q);
        $brand_product = $this->Brand_product_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'brand_product_data' => $brand_product,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('brand_product_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Brand_product_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id_brand' => $row->id_brand,
		'nama_brand' => $row->nama_brand,
		'kode_brand' => $row->kode_brand,
	    );
            $this->template->render_backend('brand_product_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('brand_product'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('brand_product/create_action'),
	    'id_brand' => set_value('id_brand'),
	    'nama_brand' => set_value('nama_brand'),
	    'kode_brand' => set_value('kode_brand',$this->get_auto_number()),
	);
        $this->template->render_backend('brand_product_form',array_merge($this->data));
    }
    
     private function get_auto_number(){
        return $this->Brand_product_model->auto_number();
     } 

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_brand' => $this->input->post('nama_brand',TRUE),
		'kode_brand' => $this->input->post('kode_brand',TRUE),
	    );

            $this->Brand_product_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('brand_product'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Brand_product_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('brand_product/update_action'),
		'id_brand' => set_value('id_brand', $row->id_brand),
		'nama_brand' => set_value('nama_brand', $row->nama_brand),
		'kode_brand' => set_value('kode_brand', $row->kode_brand),
	    );
            $this->template->render_backend('brand_product_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('brand_product'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_brand', TRUE));
        } else {
            $data = array(
		'nama_brand' => $this->input->post('nama_brand',TRUE),
		'kode_brand' => $this->input->post('kode_brand',TRUE),
	    );

            $this->Brand_product_model->update($this->input->post('id_brand', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('brand_product'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Brand_product_model->get_by_id($id);

        if ($row) {
            $this->Brand_product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('brand_product'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('brand_product'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_brand', 'nama brand', 'trim|required');
	$this->form_validation->set_rules('kode_brand', 'kode brand', 'trim|required');

	$this->form_validation->set_rules('id_brand', 'id_brand', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Brand_product.php */
/* Location: ./application/backend/brand_product/Brand_product.php */
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

