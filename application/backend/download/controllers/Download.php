<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Download extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Download');
        $this->load->model(array('Download/Download_model','group_download/group_download_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'download/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'download/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'download/index';
            $config['first_url'] = base_url() . 'download/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Download_model->total_rows($q);
        $download = $this->Download_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'download_data' => $download,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('download_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Download_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id' => $row->id,
		'judul_file' => $row->judul_file,
		'file' => $row->file,
		'status' => $row->status,
		'tanggal' => $row->tanggal,
	    );
            $this->template->render_backend('download_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('download/create_action'),
	    'id' => set_value('id'),
	    'judul_file' => set_value('judul_file'),
	    'file' => set_value('file'),
	    'status' => set_value('status'),
	    'tanggal' => set_value('tanggal'),
        'lock_account'=>set_value('lock_account'),
        'group_download'=>set_value('group_download'),
        'link_demo'=>set_value('link_demo'),
        'list_download'=>$this->group_download_model->get_all()
	);
        $this->template->render_backend('download_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
                $data = array(
        		'judul_file' => $this->input->post('judul_file',TRUE),
        		'status' => $this->input->post('status',TRUE),
        		'tanggal' => $this->input->post('tanggal',TRUE),
                'link_demo' => $this->input->post('link_demo',TRUE),
                'lock_account' => $this->input->post('lock_account',TRUE),
                'deskripsi'=> $this->input->post('deskripsi',TRUE),
                'group_download'=>$this->input->post('group_download',TRUE)
        	    );

                 if($_FILES['file']['name'] != ""){
                    $path_gambar = './doc/file/download';
                    chmod($path_gambar,0777);
                    $config['upload_path'] = $path_gambar;
                    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|doc|zip|rar';
                    $config['max_size']     = 100000000;
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;
                    $config['encrypt_name'] = true;
                    $config['max_width']  = '';
                    $config['max_height']  = '';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);            
                    if (!$this->upload->do_upload('file'))
                    {
                        show_error($this->upload->display_errors());
                        exit();
                    }
                    else
                    {
                    $image = $this->upload->data();
                        if ($image['file_name']){
                            $data['file'] = $image['file_name'];
                        }        
                    }
               }

            $this->Download_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('download'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Download_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('download/update_action'),
		'id' => set_value('id', $row->id),
		'judul_file' => set_value('judul_file', $row->judul_file),
		'file' => set_value('file', $row->file),
		'status' => set_value('status', $row->status),
		'tanggal' => set_value('tanggal', $row->tanggal),
        'lock_account'=>set_value('lock_account',$row->lock_account),
        'desk'=>$row->deskripsi,
        'link_demo'=>set_value('link_demo',$row->link_demo),
        'group_download'=>set_value('group_download',$row->group_download),
        'list_download'=>$this->group_download_model->get_all()
	    );
            $this->template->render_backend('download_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $id = $this->input->post('id',TRUE);
            $row = $this->Download_model->get_by_id($id);
                $data = array(
        		'judul_file' => $this->input->post('judul_file',TRUE),
        		'status' => $this->input->post('status',TRUE),
        		'tanggal' => $this->input->post('tanggal',TRUE),
                'lock_account' => $this->input->post('lock_account',TRUE),
                'deskripsi'=> $this->input->post('deskripsi',TRUE),
                'group_download'=>$this->input->post('group_download',TRUE),
                 'link_demo' => $this->input->post('link_demo',TRUE)
        	    );
                 if($_FILES['file']['name'] != ""){
                    $path_gambar = './doc/file/download';
                    chmod($path_gambar,0777);
                    $config['upload_path'] = $path_gambar;
                    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|doc|zip|rar';
                    $config['max_size']     = 100000000;
                    $config['remove_spaces'] = true;
                    $config['overwrite'] = false;
                    $config['encrypt_name'] = true;
                    $config['max_width']  = '';
                    $config['max_height']  = '';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);            
                    if (!$this->upload->do_upload('file'))
                    {
                        show_error($this->upload->display_errors());
                        exit();
                    }
                    else
                    {
                    unlink("./doc/file/download/".$row->file);
                    $image = $this->upload->data();
                        if ($image['file_name']){
                            $data['file'] = $image['file_name'];
                        }        
                    }
               }

            $this->Download_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('download'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Download_model->get_by_id($id);
        $path_gambar = './doc/file/download/'.$row->file.'';
        chmod($path_gambar,0777);
        unlink($path_gambar);
        if ($row) {
            $this->Download_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('download'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('judul_file', 'judul file', 'trim|required');
	//$this->form_validation->set_rules('file', 'file', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required|date');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Download.php */
/* Location: ./application/backend/download/Download.php */
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

