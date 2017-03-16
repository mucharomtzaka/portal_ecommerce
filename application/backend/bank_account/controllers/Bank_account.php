<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bank_account extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Bank_account');
        $this->load->model(array('Bank_account/Bank_account_model'));
        $this->load->helper(array('url','language'));
    }

 public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bank_account/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bank_account/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bank_account/index';
            $config['first_url'] = base_url() . 'bank_account/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bank_account_model->total_rows($q);
        $bank_account = $this->Bank_account_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $this->data = array(
            'bank_account_data' => $bank_account,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('bank_account_list', array_merge($this->data ));
    }

    public function read($id) 
    {
        $row = $this->Bank_account_model->get_by_id($id);
        if ($row) {
            $this->data = array(
		'id_bank' => $row->id_bank,
		'nama_bank' => $row->nama_bank,
		'no_rekening' => $row->no_rekening,
		'nama_pemilik' => $row->nama_pemilik,
		'img_bank' => $row->img_bank,
	    );
            $this->template->render_backend('bank_account_read',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank_account'));
        }
    }

    public function create() 
    {
        $this->data = array(
            'button' => 'Create',
            'action' => site_url('bank_account/create_action'),
	    'id_bank' => set_value('id_bank'),
	    'nama_bank' => set_value('nama_bank'),
	    'no_rekening' => set_value('no_rekening'),
	    'nama_pemilik' => set_value('nama_pemilik'),
	    'img_bank' => set_value('img_bank'),
	);
        $this->template->render_backend('bank_account_form',array_merge($this->data ));
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
                        
                        $acak=rand(00000000000,99999999999);
                        $bersih= $_FILES['img_bank']['name'];
                        $nm=str_replace(" ","_","$bersih");
                        $pisah=explode(".",$nm);
                        $nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
                        $nama_murni=date('Ymd-His');
                        $ekstensi_kotor = $pisah[1];
                        
                        $file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
                        $file_type_baru = strtolower($file_type);
                        
                        $ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
                        $n_baru = $ubah.'.'.$file_type_baru;
                        
                        $config['upload_path']  = "./doc/images/bank/";
                        $config['allowed_types']= 'gif|jpg|png|jpeg';
                        $config['file_name'] = $n_baru;
                        $config['max_size']     = '2500';
                        $config['max_width']    = '3000';
                        $config['max_height']   = '3000';
                 
                        $this->load->library('upload', $config);
                 
                        if ($this->upload->do_upload("img_bank")) {
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
                            
                            $img_bank = $data['file_name'];
                 
                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear() ;
                }
                 $data = array(
                        'nama_bank' => $this->input->post('nama_bank',TRUE),
                        'no_rekening' => $this->input->post('no_rekening',TRUE),
                        'nama_pemilik' => $this->input->post('nama_pemilik',TRUE),
                        'img_bank'=>$img_bank
                        );

            $this->Bank_account_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bank_account'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bank_account_model->get_by_id($id);

        if ($row) {
            $this->data = array(
                'button' => 'Update',
                'action' => site_url('bank_account/update_action'),
		'id_bank' => set_value('id_bank', $row->id_bank),
		'nama_bank' => set_value('nama_bank', $row->nama_bank),
		'no_rekening' => set_value('no_rekening', $row->no_rekening),
		'nama_pemilik' => set_value('nama_pemilik', $row->nama_pemilik),
		'img_bank' => set_value('img_bank', $row->img_bank),
	    );
            $this->template->render_backend('bank_account_form',array_merge($this->data ));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank_account'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bank', TRUE));
        } else {
                        $row = $this->Bank_account_model->get_by_id($id);
                        $path_gambar = './doc/images/bank/'.$row->img_bank;
                        if(file_exists($path_gambar)){
                            unlink($path_gambar);
                        }
                         $acak=rand(00000000000,99999999999);
                        $bersih= $_FILES['img_bank']['name'];
                        $nm=str_replace(" ","_","$bersih");
                        $pisah=explode(".",$nm);
                        $nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
                        $nama_murni=date('Ymd-His');
                        $ekstensi_kotor = $pisah[1];
                        
                        $file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
                        $file_type_baru = strtolower($file_type);
                        
                        $ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
                        $n_baru = $ubah.'.'.$file_type_baru;
                        
                        $config['upload_path']  = "./doc/images/bank/";
                        $config['allowed_types']= 'gif|jpg|png|jpeg';
                        $config['file_name'] = $n_baru;
                        $config['max_size']     = '2500';
                        $config['max_width']    = '3000';
                        $config['max_height']   = '3000';
                 
                        $this->load->library('upload', $config);
                 
                        if ($this->upload->do_upload("img_bank")) {
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
                            
                            $img_bank = $data['file_name'];
                 
                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear() ;
                      }
                        $data = array(
                		'nama_bank' => $this->input->post('nama_bank',TRUE),
                		'no_rekening' => $this->input->post('no_rekening',TRUE),
                		'nama_pemilik' => $this->input->post('nama_pemilik',TRUE),
                		'img_bank' => $img_bank,
                	    );
                       

            $this->Bank_account_model->update($this->input->post('id_bank', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bank_account'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bank_account_model->get_by_id($id);

        if ($row) {
            $path_gambar = './doc/images/bank/'.$row->img_bank;
            chmod($path_gambar,0777);
            unlink($path_gambar);
            $this->Bank_account_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bank_account'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank_account'));
        }
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_bank', 'nama bank', 'trim|required');
	$this->form_validation->set_rules('no_rekening', 'no rekening', 'trim|required');
	$this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'trim|required');
	//$this->form_validation->set_rules('img_bank', 'img bank', 'trim|required');

	$this->form_validation->set_rules('id_bank', 'id_bank', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bank_account.php */
/* Location: ./application/backend/bank_account/Bank_account.php */
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

