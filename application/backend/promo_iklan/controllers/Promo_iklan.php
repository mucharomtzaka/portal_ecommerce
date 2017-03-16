<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Promo_iklan extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Promo_iklan');
        $this->load->model(array('Promo_iklan/Promo_iklan_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'promo_iklan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'promo_iklan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'promo_iklan/index';
            $config['first_url'] = base_url() . 'promo_iklan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Promo_iklan_model->total_rows($q);
        $promo_iklan = $this->Promo_iklan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'promo_iklan_data' => $promo_iklan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('promo_iklan_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Promo_iklan_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'title_promo' => $row->title_promo,
		'slug' => $row->slug,
		'date' => $row->date,
		'author' => $row->author,
		'content' => $row->content,
		'status' => $row->status,
		'group_product' => $row->group_product,
        'link_video'=>$row->link_video,
        'banner'=>$row->banner
	    );
            $this->template->render_backend('promo_iklan_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promo_iklan'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('promo_iklan/create_action'),
	    'id' => set_value('id'),
	    'title_promo' => set_value('title_promo'),
	    'slug' => set_value('slug'),
	    'date' => set_value('date',date('Y-m-d H:i:s')),
	    'author' => set_value('author',$this->session->userdata('email')),
	    'content' => set_value('content'),
	    'status' => set_value('status'),
	    'group_product' => set_value('group_product'),
         'list_product_group'  =>$this->db->get('group_product')->result()
	);
        $this->template->render_backend('promo_iklan_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title_promo' => $this->input->post('title_promo',TRUE),
		'slug' => str_replace(' ','-',$this->input->post('slug',TRUE)),
		'date' => $this->input->post('date',TRUE),
		'author' => $this->input->post('author',TRUE),
		'content' => $this->input->post('content',TRUE),
		'status' => $this->input->post('status',TRUE),
		'group_product' => $this->input->post('group_product',TRUE),
        'link_video' => $this->input->post('link_video',TRUE),
	    );
             if($_FILES['img_header']['name'] != ""){
                $acak=rand(00000000000,99999999999);
                        $bersih= $_FILES['img_header']['name'];
                        $nm=str_replace(" ","_","$bersih");
                        $pisah=explode(".",$nm);
                        $nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
                        $nama_murni=date('Ymd-His');
                        $ekstensi_kotor = $pisah[1];
                        
                        $file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
                        $file_type_baru = strtolower($file_type);
                        
                        $ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
                        $n_baru = $ubah.'.'.$file_type_baru;
                        
                        $config['upload_path']  = "./doc/images/iklan/";
                        $config['allowed_types']= 'gif|jpg|png|jpeg';
                        $config['file_name'] = $n_baru;
                        $config['max_size']     = '2500';
                        $config['max_width']    = '3000';
                        $config['max_height']   = '3000';
                 
                        $this->load->library('upload', $config);
                 
                        if ($this->upload->do_upload("img_header")) {
                            $data       = $this->upload->data();
                 
                            /* PATH */
                            $source             = "./doc/images/blog/".$data['file_name'] ;
                            $destination_thumb  = "./doc/images/blog/thumb/" ;
                            $destination_medium = "./doc/images/blog/medium/" ;
                 
                            // Permission Configuration
                            chmod($source, 0777) ;
                 
                            /* Resizing Processing */
                            // Configuration Of Image Manipulation :: Static
                            $this->load->library('image_lib') ;
                            $img['image_library'] = 'GD2';
                            $img['create_thumb']  = TRUE;
                            $img['maintain_ratio']= TRUE;
                 
                            /// Limit Width Resize
                            $limit_medium   = 425 ;
                            $limit_thumb    = 220 ;
                 
                            // Size Image Limit was using (LIMIT TOP)
                            $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
                 
                            // Percentase Resize
                            if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                                $percent_medium = $limit_medium/$limit_use ;
                                $percent_thumb  = $limit_thumb/$limit_use ;
                            }
                 
                            //// Making THUMBNAIL ///////
                            $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                            $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
                 
                            // Configuration Of Image Manipulation :: Dynamic
                            $img['thumb_marker'] = '';
                            $img['quality']      = '100%' ;
                            $img['source_image'] = $source ;
                            $img['new_image']    = $destination_thumb ;
                 
                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear() ;
                 
                            ////// Making MEDIUM /////////////
                            $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
                            $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
                 
                            // Configuration Of Image Manipulation :: Dynamic
                            $img['thumb_marker'] = '';
                            $img['quality']      = '100%' ;
                            $img['source_image'] = $source ;
                            $img['new_image']    = $destination_medium ;
                            
                            $data['banner'] = $data['file_name'];
                 
                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear() ;
                }
            }

            $this->Promo_iklan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('promo_iklan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Promo_iklan_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('promo_iklan/update_action'),
		'id' => set_value('id', $row->id),
		'title_promo' => set_value('title_promo', $row->title_promo),
		'slug' => set_value('slug', $row->slug),
		'date' => set_value('date', $row->date),
		'author' => set_value('author', $row->author),
		'content' => set_value('content', $row->content),
		'status' => set_value('status', $row->status),
		'group_product' => set_value('group_product', $row->group_product),
        'link_video'=>set_value('link_video',$row->link_video),
        'banner'=>$row->banner,
         'list_product_group'  =>$this->db->get('group_product')->result()
	    );
            $this->template->render_backend('promo_iklan_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promo_iklan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                		'title_promo' => $this->input->post('title_promo',TRUE),
                		'slug' => $this->input->post('slug',TRUE),
                		'date' => $this->input->post('date',TRUE),
                		'author' => $this->input->post('author',TRUE),
                		'content' => $this->input->post('content',TRUE),
                		'status' => $this->input->post('status',TRUE),
                		'group_product' => $this->input->post('group_product',TRUE),
                        'link_video'=>$this->input->post('link_video',TRUE),
	    );
             $row = $this->Promo_iklan_model->get_by_id($id);

                        if($_FILES['img_header']['name'] != ""){
                            $path_gambar = './doc/images/iklan';
                            chmod($path_gambar,0777);
                            $config['upload_path'] = $path_gambar;
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $config['max_size'] = '20000';
                            $config['remove_spaces'] = true;
                            $config['overwrite'] = false;
                            $config['encrypt_name'] = true;
                            $config['max_width']  = '';
                            $config['max_height']  = '';
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);            
                            if (!$this->upload->do_upload('img_header')){
                                $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                                $this->session->set_flashdata('message',$error);
                                 redirect(site_url('promo_iklan/update/'.$id));
                            }else{
                                  $image = $this->upload->data();
                                  $pathgambar =  './doc/images/iklan/'.$row->banner;
                                 if(file_exists($pathgambar)){
                                      unlink($pathgambar);
                                    }
                                if ($image['file_name']){
                                     $data['banner'] = $image['file_name'];
                                }      
                            }   
                          }

            $this->Promo_iklan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('promo_iklan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Promo_iklan_model->get_by_id($id);

        if ($row) {
            $this->Promo_iklan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('promo_iklan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promo_iklan'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('title_promo', 'title promo', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('author', 'author', 'trim|required');
	$this->form_validation->set_rules('content', 'content', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
	$this->form_validation->set_rules('group_product', 'group product', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Promo_iklan.php */
/* Location: ./application/backend/promo_iklan/Promo_iklan.php */
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

