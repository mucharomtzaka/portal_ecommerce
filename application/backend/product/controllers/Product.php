<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Product');
        $this->load->model(array('Product/Product_model','brand_product/brand_product_model','group_product/group_product_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'product/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'product/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'product/index';
            $config['first_url'] = base_url() . 'product/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Product_model->total_rows($q);
        $product = $this->Product_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'product_data' => $product,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('product_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Product_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'produk' => $row->produk,
		'deskripsi_produk' => $row->deskripsi_produk,
		'link_video' => $row->link_video,
		'url_demo' => $row->url_demo,
		'images' => $row->images,
		'status' => $row->status,
        'tanggal'=>$row->tanggal,
	    );
            $this->template->render_backend('product_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('product/create_action'),
	    'id' => set_value('id'),
	    'produk' => set_value('produk'),
        'kdproduct' => set_value('kdproduct',$this->get_auto_number()),
	    'deskripsi_produk' => set_value('deskripsi_produk'),
	    'link_video' => set_value('link_video'),
	    'url_demo' => set_value('url_demo'),
	    'images' => set_value('images'),
	    'status' => set_value('status'),
        'tanggal'=>set_value('tanggal',date('Y-m-d')),
        'group_produk' =>set_value('group_produk'),
        'list_product_group'  =>$this->group_product_model->get_all(),
        'list_brand'=>$this->brand_product_model->get_all(),

	  );
         $this->data['message'] = $this->session->flashdata('message');

        $this->template->render_backend('product_form',array_merge($this->data ));
    }

    private function get_auto_number(){
        return $this->Product_model->auto_number();
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
                    $data = array(
                    		'produk' => str_replace(" ","-",$this->input->post('produk',TRUE)),
                    		'deskripsi_produk' => $this->input->post('deskripsi_produk',TRUE),
                    		'link_video' => $this->input->post('link_video',TRUE),
                    		'url_demo' => $this->input->post('url_demo',TRUE),
                    		'status' => $this->input->post('status',TRUE),
                            'tanggal' => $this->input->post('tanggal',TRUE),
                            'group_product' =>$this->input->post('group_produk',TRUE),
                            'brand' =>$this->input->post('brand',TRUE),
                            'qty' =>$this->input->post('stock',TRUE),
                            'id_produk' =>$this->input->post('kdproduct',TRUE),
                            'harga' =>$this->input->post('harga',TRUE),
                            'id_produk' =>$this->input->post('kdproduct',TRUE),
            	    );
                    if($_FILES['images']['name'] != ""){
                        $path_gambar = 'doc/images/produk';
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
                        if (!$this->upload->do_upload('images')){
                            $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                            $this->session->set_flashdata('message',$error);
                             redirect(site_url('product/update/'.$id));
                        }else{
                        $image = $this->upload->data();
                            if ($image['file_name']){
                                $data['images'] = $image['file_name'];
                              }             
                        }
                    }
                     

            $this->Product_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('product'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('product/update_action'),
        		'id' => set_value('id', $row->id),
        		'produk' => set_value('produk', $row->produk),
        		'deskripsi_produk' => set_value('deskripsi_produk', $row->deskripsi_produk),
        		'link_video' => set_value('link_video', $row->link_video),
        		'url_demo' => set_value('url_demo', $row->url_demo),
        		'images' => set_value('images', $row->images),
        		'status' => set_value('status', $row->status),
                'tanggal' => set_value('status', $row->tanggal),
                'harga' => set_value('harga', $row->harga),
                'stock' => set_value('stock', $row->qty),
                'kdproduct' => set_value('kdproduct', $row->id_produk),
                'group_produk' =>set_value('group_produk',$row->group_product),
                'brand'=>set_value('brand',$row->brand),
                'list_product_group'  =>$this->group_product_model->get_all(),
                'list_brand'=>$this->brand_product_model->get_all(),
        	    );
            $this->template->render_backend('product_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
                    $id = $this->input->post('id',TRUE);
                     $row = $this->Product_model->get_by_id($id);
                    $data = array(
            		'produk' => str_replace(" ","-",$this->input->post('produk',TRUE)),
            		'deskripsi_produk' => $this->input->post('deskripsi_produk',TRUE),
            		'link_video' => $this->input->post('link_video',TRUE),
            		'url_demo' => $this->input->post('url_demo',TRUE),
            		'status' => $this->input->post('status',TRUE),
                     'tanggal' => $this->input->post('tanggal',TRUE),
                     'group_product' =>$this->input->post('group_produk',TRUE),
                    'qty' =>$this->input->post('stock',TRUE),
                    'id_produk' =>$this->input->post('kdproduct',TRUE),
                    'harga' =>$this->input->post('harga',TRUE),
                    'brand' =>$this->input->post('brand',TRUE),
            	    );

                 if($_FILES['images']['name'] != ""){
                        $path_gambar = 'doc/images/produk';
                        chmod($path_gambar,0777);
                        $config['upload_path'] =$path_gambar ;
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = '2000';
                        $config['remove_spaces'] = true;
                        $config['overwrite'] = false;
                        $config['encrypt_name'] = true;
                        $config['max_width']  = '';
                        $config['max_height']  = '';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);            
                        if (!$this->upload->do_upload('images')){
                            $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                            $this->session->set_flashdata('message',$error);
                             redirect(site_url('product/update/'.$id));
                        }else{
                             $image = $this->upload->data();
                            if ($image['file_name']){
                                $data['images'] = $image['file_name'];
                              }  
                                $path_gambar = './doc/images/produk/'.$row->images;
                                 if(file_exists($path_gambar)){
                                    unlink($path_gambar);  
                                 }          
                        }
                    }

            $this->Product_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('product'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            unlink('./doc/images/produk/'.$row->images);
            $this->Product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('product'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('produk', 'produk', 'trim|required');
	$this->form_validation->set_rules('deskripsi_produk', 'deskripsi produk', 'trim|required');
	//$this->form_validation->set_rules('link_video', 'link video', 'trim|required');
	//$this->form_validation->set_rules('url_demo', 'url demo', 'trim|required');
	//$this->form_validation->set_rules('images', 'images', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Product.php */
/* Location: ./application/backend/product/Product.php */
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

