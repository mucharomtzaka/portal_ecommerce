<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Album_photos extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Album_photos');
        $this->load->model(array('Album_photos/Album_photos_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'album_photos/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'album_photos/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'album_photos/index';
            $config['first_url'] = base_url() . 'album_photos/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Album_photos_model->total_rows($q);
        $album_photos = $this->Album_photos_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'album_photos_data' => $album_photos,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('album_photos_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Album_photos_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'nama_album' => $row->nama_album,
		'sampul_album' => $row->sampul_album,
	    );
            $this->template->render_backend('album_photos_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('album_photos'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('album_photos/create_action'),
	    'id' => set_value('id'),
	    'nama_album' => set_value('nama_album'),
	    'sampul_album' => set_value('sampul_album'),
	);
        $this->template->render_backend('album_photos_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

                  if($_FILES['sampul_album']['name'] != ""){
                         $path_gambar = 'doc/images/album';
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
                        if (!$this->upload->do_upload('sampul_album')){
                            $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                            $this->session->set_flashdata('message',$error);
                             redirect(site_url('album_photos/create'));
                        }else{
                        $image = $this->upload->data();
                        if ($image['file_name']){
                            $data['file1'] = $image['file_name'];
                        }        
                            $sampul_album = $data['file1'];
                    }
                }

                $data = array(
    		      'nama_album' => $this->input->post('nama_album',TRUE),
                  'sampul_album'=>$sampul_album
    	         );
            $this->Album_photos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('album_photos'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Album_photos_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('album_photos/update_action'),
		'id' => set_value('id', $row->id),
		'nama_album' => set_value('nama_album', $row->nama_album),
		'sampul_album' => set_value('sampul_album', $row->sampul_album),
	    );
            $this->template->render_backend('album_photos_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('album_photos'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
                $id = $this->update($this->input->post('id', TRUE));
                $row = $this->Album_photos_model->get_by_id($id);
                unlink('./doc/images/album'.$row->sampul_album);

                    if($_FILES['sampul_album']['name'] != ""){
                            $path_gambar = 'doc/images/album';
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
                            if (!$this->upload->do_upload('sampul_album')){
                                $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                                $this->session->set_flashdata('message',$error);
                                 redirect(site_url('album_photos/update/'.$id));
                            }else{
                            $image = $this->upload->data();
                                if ($image['file_name']){
                                    $data['file1'] = $image['file_name'];
                                }        
                                $album = $data['file1'];
                            }
                    }

                $data = array(
        		'nama_album' => $this->input->post('nama_album',TRUE),
                'sampul_album'=>$album
        	    );

            $this->Album_photos_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('album_photos'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Album_photos_model->get_by_id($id);
         unlink('./doc/images/album'.$row->sampul_album);
        if ($row) {
            $this->Album_photos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('album_photos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('album_photos'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_album', 'nama album', 'trim|required');
	//$this->form_validation->set_rules('sampul_album', 'sampul album', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Album_photos.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/album_photos/controllers/Album_photos.php */
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

