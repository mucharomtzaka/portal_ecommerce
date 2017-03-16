<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Galery extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Galery');
        $this->load->model(array('Galery/Galery_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'galery/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'galery/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'galery/index';
            $config['first_url'] = base_url() . 'galery/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Galery_model->total_rows($q);
        $galery = $this->Galery_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'galery_data' => $galery,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('galery_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Galery_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'id_album' => $row->id_album,
		'title_img' => $row->title_img,
		'image_url' => $row->image_url,
		'description' => $row->description,
		'kategori' => $row->kategori,
		'status' => $row->status,
	    );
            $this->template->render_backend('galery_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galery'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('galery/create_action'),
	    'id' => set_value('id'),
	    'id_album' => set_value('id_album'),
	    'title_img' => set_value('title_img'),
	    'image_url' => set_value('image_url'),
	    'description' => set_value('description'),
	    'kategori' => set_value('kategori'),
	    'status' => set_value('status'),
        'list_album'=>$this->db->get('album_photos')->result()
	);
        $this->template->render_backend('galery_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if($_FILES['image_url']['name'] != ""){
                $path_gambar = 'doc/images/galeri';
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
                if (!$this->upload->do_upload('image_url')){
                   $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                    $this->session->set_flashdata('message',$error);
                    redirect(site_url('album_photos/update/'.$id));
                }else{

                     $image = $this->upload->data();
                    if ($image['file_name']){
                        $data['file1'] = $image['file_name'];
                      }  

                    $galeri = $data['file1'];
                }
                    //$data['image_url'] = $galeri;
            }

            $data = array(
        		'id_album' => $this->input->post('id_album',TRUE),
        		'title_img' => $this->input->post('title_img',TRUE),
        		'image_url' => $galeri,
        		'description' => $this->input->post('description',TRUE),
        		'kategori' => $this->input->post('kategori',TRUE),
        		'status' => $this->input->post('status',TRUE),
            );

            $this->Galery_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('galery'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Galery_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('galery/update_action'),
		'id' => set_value('id', $row->id),
		'id_album' => set_value('id_album', $row->id_album),
		'title_img' => set_value('title_img', $row->title_img),
		'image_url' => set_value('image_url', $row->image_url),
		'description' => set_value('description', $row->description),
		'kategori' => set_value('kategori', $row->kategori),
		'status' => set_value('status', $row->status),
        'list_album'=>$this->db->get('album_photos')->result()
	    );
            $this->template->render_backend('galery_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galery'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

             $id = $this->input->post('id', TRUE);
             $row = $this->Galery_model->get_by_id($id);
                $data = array(
                		'id_album' => $this->input->post('id_album',TRUE),
                		'title_img' => $this->input->post('title_img',TRUE),
                		'description' => $this->input->post('description',TRUE),
                		'kategori' => $this->input->post('kategori',TRUE),
                		'status' => $this->input->post('status',TRUE),
	            );

                      if($_FILES['image_url']['name'] != ""){
                            $path_gambar = 'doc/images/galeri';
                            $config['upload_path'] = chmod($path_gambar,0777);
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $config['max_size'] = '2000';
                            $config['remove_spaces'] = true;
                            $config['overwrite'] = false;
                            $config['encrypt_name'] = true;
                            $config['max_width']  = '';
                            $config['max_height']  = '';
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);            
                            if (!$this->upload->do_upload('image_url')){
                                $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                                $this->session->set_flashdata('message',$error);
                                 redirect(site_url('galery/update/'.$id));
                            }else{
                                $image = $this->upload->data();
                                  $path_gambar =  './doc/images/galeri/'.$row->image_url;
                                 if(file_exists($path_gambar)){
                                      unlink($path_gambar);
                                    }
                                if ($image['file_name']){
                                     $data['image_url'] = $image['file_name'];
                                }      
                            }   
                          }

            $this->Galery_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('galery'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Galery_model->get_by_id($id);

        if ($row) {
            $this->Galery_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('galery'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galery'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('id_album', 'id album', 'trim|required|numeric');
	$this->form_validation->set_rules('title_img', 'title img', 'trim|required');
	//$this->form_validation->set_rules('image_url', 'image url', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required|numeric');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Galery.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/galery/controllers/Galery.php */
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

