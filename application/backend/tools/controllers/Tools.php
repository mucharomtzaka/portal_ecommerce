<?php
/*
Trefast Development
Trefast Development merupakan Start up Bussiness di bidang 
jasa pengembangan produk teknologi informasi web development
*/
/*
@author: Mucharom
@Email :mucharomtzaka@yahoo.co.id / mucharomtzaka@gmail.com
@Alamat: Jl.Pagersari-Patean , Kendal 51354 Jawa Tengah
@HP/Whatapps:+6289692412261
@https://github.com/mucharomtzaka
@fanspage : https://www.facebook.com/trefast.teknik.indonesia 
homepage coming soon 
*/
class Tools extends BackendController {

    public function __construct() {
        parent::__construct();
        // can only be called from the command line
    }

    public function index(){
       $this->data['title'] = 'Tools CRUD Generator';
       $this->data['table_list'] = $this->modgen->table_list();
       $this->data['message']  =$this->session->flashdata('message');
       $this->template->render_backend('tools',$this->data);
    }

    public  function creator_module(){
            $table_name = safe($_POST['table_name']);
            $location  = safe($_POST['location']);
            $controller = safe($_POST['controller']);
            $model = safe($_POST['model']);
              if ($table_name <> ''){
                    $table_name = $table_name;
                    $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
                    $m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
                    $v_list = $table_name . "_list";
                    $v_read = $table_name . "_read";
                    $v_form = $table_name . "_form";
                    // url
                    $c_url = strtolower($c);
                    // filename
                    $c_file = $c . '.php';
                    $m_file = $m . '.php';
                    $v_list_file = $v_list . '.php';
                    $v_read_file = $v_read . '.php';
                    $v_form_file = $v_form . '.php';

                    //location modules yang akan dibuat secara otomatis 
                    if($location == 'backend'){
                        $path = APPPATH.'backend';
                    }elseif($location == 'frontend'){
                        $path = APPPATH.'frontend';
                    }
                    $path_modules = $path.'/'.$c_url;
                    if(!file_exists($path.'/'.$c_url)){
                        //register modules 
                        $menu_data_register = array('name_addons'=>$c_url,'status_addons'=>0,'technical_support'=>'Trefast Development','description'=>'Module addons '.$c_url.'');
                        $this->db->insert('addons',$menu_data_register);

                        $make_folder_controller  = mkdir($path.'/'.$c_url.'/controllers',0777,TRUE);
                        $make_folder_model  = mkdir($path.'/'.$c_url.'/models',0777,TRUE);
                        $make_folder_view  = mkdir($path.'/'.$c_url.'/views',0777,TRUE);
                        //lokasi setelah generate folder oleh sistem
                        $path_controller = $path.'/'.$c_url.'/controllers';
                        $path_model = $path.'/'.$c_url.'/models';
                        $path_view = $path.'/'.$c_url.'/views';
                        //set premesion folder 
                        chmod($path_controller,0777);
                        chmod($path_model,0777);
                        chmod($path_controller,0777);
                         $pk = $this->modgen->primary_field($table_name);
                         $non_pk = $this->modgen->not_primary_field($table_name);
                         $all =$this->modgen->all_field($table_name); 
                        /*  
                            Include file Views  untuk  generate form,list,read
                        */

                        include APPPATH.'includes/create_view_form.php';
                        include APPPATH.'includes/create_view_read.php';
                        include APPPATH.'includes/create_view_list.php';
                        if($location == 'backend'){
                        $this->make_controller_back($path_controller,$c,$m,$c_file,$c_url,$v_list,$v_read,$v_form,$all,$pk,$non_pk,$location);
                        $this->make_model($path_model,$m,$m_file,$table_name,$pk,$non_pk,$all,$location);
                        }else{
                          $this->make_controller_front($path_controller,$c,$m,$c_file,$c_url,$v_list,$v_read,$v_form,$all,$pk,$non_pk,$location);
                         $this->make_model($path_model,$m,$m_file,$table_name,$pk,$non_pk,$all,$location);  
                        }
                    }else{
                         $this->session->set_flashdata('message','modules is created later');  
                         redirect('tools?token='.md5($this->security->get_csrf_hash()).'','refresh');
                    }
                    
                      $this->session->set_flashdata('message','modules is created location: '.$path_modules.'');  
                      redirect('tools?token='.md5($this->security->get_csrf_hash()).'','refresh');
              }else{
                       // $hasil[] = 'No table selected.';
                         $this->session->set_flashdata('message','No table selected');  
                          redirect('tools?token='.md5($this->security->get_csrf_hash()).'','refresh');
                  } 
    }

    /*
       @make_controller :  function ini digunakan untuk membuat  controllers 
    */

    private function make_controller_back($path_controller,$c,$m,$c_file,$c_url,$v_list,$v_read,$v_form,$all,$pk,$non_pk,$location){
        $string = "<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class " . $c . " extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!\$this->ion_auth->logged_in())redirect('auth', 'refresh');
        \$this->checkplugin->index('$c');
        \$this->load->model(array('$c/$m'));
        \$this->load->helper(array('url','language'));
    }";

    $string .= "\n\n public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));
        
        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$c_url/index?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . '$c_url/index?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . '$c_url/index';
            \$config['first_url'] = base_url() . '$c_url/index';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$this->data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );
         \$this->data['message'] = \$this->session->flashdata('message');
        \$this->template->render_backend('$v_list', array_merge(\$this->data ));
    }";

$string .= "\n\n    public function read(\$id) 
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);
        if (\$row) {
            \$this->data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t    );
            \$this->template->render_backend('$v_read',array_merge(\$this->data ));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }

    public function create() 
    {
        \$this->data = array(
            'button' => 'Create',
            'action' => site_url('".$c_url."/create_action'),";
foreach ($all as $row) {
    $string .= "\n\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t);
        \$this->template->render_backend('$v_form',array_merge(\$this->data ));
    }
    
    public function create_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->".$m."->insert(\$data);
            \$this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update(\$id) 
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$this->data = array(
                'button' => 'Update',
                'action' => site_url('".$c_url."/update_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->". $row['column_name']."),";
}
$string .= "\n\t    );
            \$this->template->render_backend('$v_form',array_merge(\$this->data ));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}    
$string .= "\n\t    );

            \$this->".$m."->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function delete(\$id) 
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$this->".$m."->delete(\$id);
            \$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('$c_url'));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }
    public function _rules() 
    {";
foreach ($non_pk as $row) {
    $int = $row['data_type'] == 'int'|| $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
   
    if($row['data_type'] == 'date'){
        $string .= "\n\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required|date');";
    }else{
        
    $string .= "\n\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required$int');";
    }

}    
$string .= "\n\n\t\$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

    $string .= "\n\n}\n\n/* End of file $c_file */
/* Location: ./application/$location/$c_url/$c_file */
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

";

    return createFile($string,$path_controller.'/'.$c_file);

    }

 private function make_controller_front($path_controller,$c,$m,$c_file,$c_url,$v_list,$v_read,$v_form,$all,$pk,$non_pk,$location){
        $string = "<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class " . $c . " extends FrontendController
{
    function __construct()
    {
        parent::__construct(); 
        if(!\$this->ion_auth->logged_in())redirect('auth', 'refresh');
        \$this->checkplugin->index('$c');
        \$this->load->model(array('$c/$m'));
        \$this->load->helper(array('url','language'));
    }";

    $string .= "\n\n public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));
        
        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$c_url/index?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . '$c_url/index?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . '$c_url/index';
            \$config['first_url'] = base_url() . '$c_url/index';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$this->data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );
         \$this->data['message'] = \$this->session->flashdata('message');
        \$this->template->render_frontend('$v_list', array_merge(\$this->data ));
    }";

$string .= "\n\n    public function read(\$id) 
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);
        if (\$row) {
            \$this->data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t    );
            \$this->template->render_frontend('$v_read',array_merge(\$this->data ));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }

    public function create() 
    {
        \$this->data = array(
            'button' => 'Create',
            'action' => site_url('".$c_url."/create_action'),";
foreach ($all as $row) {
    $string .= "\n\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t);
        \$this->template->render_frontend('$v_form',array_merge(\$this->data ));
    }
    
    public function create_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->".$m."->insert(\$data);
            \$this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update(\$id) 
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$this->data = array(
                'button' => 'Update',
                'action' => site_url('".$c_url."/update_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->". $row['column_name']."),";
}
$string .= "\n\t    );
            \$this->template->render_frontend('$v_form',array_merge(\$this->data ));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}    
$string .= "\n\t    );

            \$this->".$m."->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function delete(\$id) 
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$this->".$m."->delete(\$id);
            \$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('$c_url'));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }
    public function _rules() 
    {";
foreach ($non_pk as $row) {
    $int = $row['data_type'] == 'int'|| $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
   
    if($row['data_type'] == 'date'){
        $string .= "\n\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required|date');";
    }else{
        
    $string .= "\n\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required$int');";
    }

}    
$string .= "\n\n\t\$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

    $string .= "\n\n}\n\n/* End of file $c_file */
/* Location: ./application/$location/$c_url/controllers/$c_file */
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

";

    return createFile($string,$path_controller.'/'.$c_file);

    }
/*
       @make_model :  function ini digunakan untuk membuat  model  
    */
private function make_model($path_model,$m,$m_file,$table_name,$pk,$non_pk,$all,$location){
        $string = "
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class " . $m . " extends CI_Model{

public \$table = '$table_name';
public \$id = '$pk';
public \$order = 'DESC';

    function __construct(){
      parent::__construct();
    }

// get all
    function get_all(){
     \$this->db->order_by(\$this->id, \$this->order);
      return \$this->db->get(\$this->table)->result();
    }

// get data by id
    function get_by_id(\$id){
    \$this->db->where(\$this->id, \$id);
     return \$this->db->get(\$this->table)->row();
    }
                    
 // get total rows
    function total_rows(\$q = NULL) {
                \$this->db->like('$pk', \$q);";
    foreach ($non_pk as $row) {
    $string .= "\n\t\$this->db->or_like('" . $row['column_name'] ."', \$q);";
    }    
     $string .= "\n\t\$this->db->from(\$this->table);
                 return \$this->db->count_all_results();
    }

 // get data with limit and search
    function get_limit_data(\$limit, \$start = 0, \$q = NULL) {
    \$this->db->order_by(\$this->id, \$this->order);
    \$this->db->like('$pk', \$q);";
    foreach ($non_pk as $row) {
    $string .= "\n\t\$this->db->or_like('" . $row['column_name'] ."', \$q);";
    }    
    $string .= "\n\t\$this->db->limit(\$limit, \$start);
             return \$this->db->get(\$this->table)->result();
    }

// insert data
    function insert(\$data) {
    \$this->db->insert(\$this->table, \$data);
    }

// update data
    function update(\$id, \$data) {
     \$this->db->where(\$this->id, \$id);
     \$this->db->update(\$this->table, \$data);
     }

// delete data
    function delete(\$id)  {
    \$this->db->where(\$this->id, \$id);
    \$this->db->delete(\$this->table);
     }
}

/* End of file $m_file */
/* Location: $path_model/$m_file */
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
                ";
        return createFile($string,$path_model.'/'. $m_file);
    }

    
}