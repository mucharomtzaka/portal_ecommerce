<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends BackendController
{
 
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Articles');
        $this->load->model(array('Articles/Articles_model'));
        $this->load->helper(array('url','language'));
        date_default_timezone_set('Asia/Jakarta');
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'articles/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'articles/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'articles/index';
            $config['first_url'] = base_url() . 'articles/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Articles_model->total_rows($q);
        $articles = $this->Articles_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'articles_data' => $articles,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('articles_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Articles_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'titley' => $row->title,
		'slug' => $row->slug,
		'date' => $row->date,
		'time' => $row->time,
		'author' => $row->author,
		'img_header' => $row->img_header,
		'content' => $row->content,
		'category' => $row->category,
		'status' => $row->status,
        'link_video' =>$row->link_video
	    );
            $this->template->render_backend('articles_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('articles'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('articles/create_action'),
	    'id' => set_value('id'),
	    'titley' => set_value('title'),
	    'slug' => set_value('slug'),
	    'date' => set_value('date',date('Y-m-d')),
	    'time' => set_value('time',date('H:i:s')),
	    'author' => set_value('author',$this->session->userdata('email')),
	    'img_header' => set_value('img_header'),
	    'content' => set_value('content'),
	    'category' => set_value('category'),
	    'status' => set_value('status'),
        'link_video'=>set_value('link_video'),
        'list_kategori'=>$this->db->get('categori_articles')->result()
	);
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('articles_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'title' => $this->input->post('title',TRUE),
        		'slug' => $this->input->post('slug',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'time' => $this->input->post('time',TRUE),
        		'author' => $this->input->post('author',TRUE),
        		'content' => $this->input->post('content',TRUE),
        		'category' => $this->input->post('category',TRUE),
        		'status' => $this->input->post('status',TRUE),
                'link_video' => $this->input->post('link_video',TRUE),
        	    );

                    if($_FILES['img_header']['name'] != ""){
                            $path_gambar = './doc/images/blog';
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
                            if (!$this->upload->do_upload('img_header')){
                                $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                                $this->session->set_flashdata('message',$error);
                                 redirect(site_url('articles/update/'.$id));
                            }else{
                                if ($image['file_name']){
                                     $data['img_header'] = $image['file_name'];
                                }      
                            }   
                          }

            $this->Articles_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('articles'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Articles_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('articles/update_action'),
		'id' => set_value('id', $row->id),
		'titley' => set_value('title', $row->title),
		'slug' => set_value('slug', $row->slug),
		'date' => set_value('date', $row->date),
		'time' => set_value('time',date('H:i:s')),
		'author' => set_value('author', $row->author),
		'img_header' => set_value('img_header', $row->img_header),
		'content' => set_value('content', $row->content),
		'category' => set_value('category', $row->category),
		'status' => set_value('status', $row->status),
        'link_video'=>set_value('link_video', $row->link_video),
        'list_kategori'=>$this->db->get('categori_articles')->result()
	    );
             $this->data['message'] = $this->session->flashdata('message');
            $this->template->render_backend('articles_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('articles'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $id = $this->input->post('id',TRUE);
            $row = $this->Articles_model->get_by_id($id);

            $data = array(
        		'title' => $this->input->post('title',TRUE),
        		'slug' => $this->input->post('slug',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'time' => $this->input->post('time',TRUE),
        		'author' => $this->input->post('author',TRUE),
        		'content' => $this->input->post('content',TRUE),
        		'category' => $this->input->post('category',TRUE),
        		'status' => $this->input->post('status',TRUE),
                'link_video' => $this->input->post('link_video',TRUE),
        	    );
                     if($_FILES['img_header']['name'] != ""){
                            $path_gambar = './doc/images/blog';
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
                            if (!$this->upload->do_upload('img_header')){
                                $error = 'Ukuran File Terlalu Besar. Maksimal 2Mb';
                                $this->session->set_flashdata('message',$error);
                                 redirect(site_url('articles/update/'.$id));
                            }else{
                                $image = $this->upload->data();
                                  $pathgambar =  './doc/images/blog/'.$row->img_header;
                                 if(file_exists($pathgambar)){
                                      unlink($pathgambar);
                                    }
                                if ($image['file_name']){
                                     $data['img_header'] = $image['file_name'];
                                }      
                            }   
                          }

            $this->Articles_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('articles'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Articles_model->get_by_id($id);

        if ($row) {
            unlink("./doc/images/blog/$row->img_header");
            $this->Articles_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('articles'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('articles'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required|date');
	$this->form_validation->set_rules('time', 'time', 'trim|required');
	$this->form_validation->set_rules('author', 'author', 'trim|required');
	//$this->form_validation->set_rules('img_header', 'img header', 'trim|required');
	$this->form_validation->set_rules('content', 'content', 'trim|required');
	//$this->form_validation->set_rules('category', 'category', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Articles.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/articles/controllers/Articles.php */
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

