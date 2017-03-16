<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Shipping_kurir extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Shipping_kurir');
        $this->load->model(array('Shipping_kurir/Shipping_kurir_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'shipping_kurir/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'shipping_kurir/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'shipping_kurir/index';
            $config['first_url'] = base_url() . 'shipping_kurir/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Shipping_kurir_model->total_rows($q);
        $shipping_kurir = $this->Shipping_kurir_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'shipping_kurir_data' => $shipping_kurir,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('shipping_kurir_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Shipping_kurir_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id_kurir' => $row->id_kurir,
		'name_shipping' => $row->name_shipping,
		'kode_shipping' => $row->kode_shipping,
		'img_shipping' => $row->img_shipping,
	    );
            $this->template->render_backend('shipping_kurir_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shipping_kurir'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('shipping_kurir/create_action'),
	    'id_kurir' => set_value('id_kurir'),
	    'name_shipping' => set_value('name_shipping'),
	    'kode_shipping' => set_value('kode_shipping',$this->auto_number()),
	    'img_shipping' => set_value('img_shipping'),
	);
        $this->template->render_backend('shipping_kurir_form',array_merge($this->data ));
    }
    
    private function auto_number(){
        return $this->Shipping_kurir_model->auto_number();
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name_shipping' => $this->input->post('name_shipping',TRUE),
		'kode_shipping' => $this->input->post('kode_shipping',TRUE),
		//'img_shipping' => $this->input->post('img_shipping',TRUE),
	    );
                    if($_FILES['img_shipping']['name'] != ""){
                        $path_gambar = 'doc/images/kurir';
                        chmod($path_gambar,0777);
                        $config['upload_path'] = $path_gambar;
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = '2000';
                        $config['remove_spaces'] = true;
                        $config['overwrite'] = false;
                        $config['encrypt_name'] = true;
                        $config['max_width']  = '';
                        $config['max_height']  = '';
                        
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);            
                        if (!$this->upload->do_upload('img_shipping')){
                            $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                            $this->session->set_flashdata('message',$error);
                             redirect(site_url('shipping_kurir/update/'.$id));
                        }else{
                        $image = $this->upload->data();
                            if ($image['file_name']){
                                $data['img_shipping'] = $image['file_name'];
                              }             
                        }
                    }

            $this->Shipping_kurir_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('shipping_kurir'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Shipping_kurir_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('shipping_kurir/update_action'),
		'id_kurir' => set_value('id_kurir', $row->id_kurir),
		'name_shipping' => set_value('name_shipping', $row->name_shipping),
		'kode_shipping' => set_value('kode_shipping', $row->kode_shipping),
		'img_shipping' => set_value('img_shipping', $row->img_shipping),
	    );
            $this->template->render_backend('shipping_kurir_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shipping_kurir'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kurir', TRUE));
        } else {
            $data = array(
		'name_shipping' => $this->input->post('name_shipping',TRUE),
		'kode_shipping' => $this->input->post('kode_shipping',TRUE),
		//'img_shipping' => $this->input->post('img_shipping',TRUE),
	    );
                     $id = $this->input->post('id',TRUE);
                     $row = $this->Product_model->get_by_id($id);
                 if($_FILES['img_shipping']['name'] != ""){
                        $path_gambar = 'doc/images/kurir';
                        chmod($path_gambar,0777);
                        $config['upload_path'] = $path_gambar;
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = '2000';
                        $config['remove_spaces'] = true;
                        $config['overwrite'] = false;
                        $config['encrypt_name'] = true;
                        $config['max_width']  = '';
                        $config['max_height']  = '';
                        
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);            
                        if (!$this->upload->do_upload('img_shipping')){
                            $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                            $this->session->set_flashdata('message',$error);
                             redirect(site_url('shipping_kurir/update/'.$id));
                        }else{
                        $image = $this->upload->data();
                            if ($image['file_name']){
                                $data['img_shipping'] = $image['file_name'];
                              }  
                             $path_gambar = './doc/images/kurir/'.$img_shipping;
                                 if(file_exists($path_gambar)){
                                    unlink($path_gambar);  
                                 }                  
                        }
                    }
            $this->Shipping_kurir_model->update($this->input->post('id_kurir', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('shipping_kurir'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Shipping_kurir_model->get_by_id($id);
         $path_gambar = 'doc/images/kurir';
        chmod($path_gambar,0777);
        if ($row) {
            unlink($path_gambar.'/'.$row->img_shipping);
            $this->Shipping_kurir_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('shipping_kurir'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shipping_kurir'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('name_shipping', 'name shipping', 'trim|required');
	$this->form_validation->set_rules('kode_shipping', 'kode shipping', 'trim|required');
	//$this->form_validation->set_rules('img_shipping', 'img shipping', 'trim|required');
	$this->form_validation->set_rules('id_kurir', 'id_kurir', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Shipping_kurir.php */
/* Location: ./application/backend/shipping_kurir/Shipping_kurir.php */
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

