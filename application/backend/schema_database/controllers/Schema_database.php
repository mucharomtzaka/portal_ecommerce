<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Schema_database extends BackendController
{
    function __construct()
    {
        parent::__construct();
         if(!$this->ion_auth->logged_in())redirect('auth', 'refresh');
        $this->checkplugin->index('Schema_database');
        $this->load->model(array('Schema_database/Schema_database_model'));
        $this->load->helper(array('url','language'));
    }

    public function index()
    {
        $schema_database = $this->Schema_database_model->get_all();

        $this->data['schema_database_data'] = $schema_database;
        $this->data['aksi']                 = 'schema_database/migration';
        $this->data['message'] = $this->session->flashdata('message');
        $this->template->render_backend('schema_database_list', array_merge($this->data ));
    }

    public function migration() {
        $name = $this->input->post('name_module',true);
        $this->make_migration_file($name);
     }

    public function migrate($version = null) {
        $this->load->library('migration');

        if ($version != null) {
            if ($this->migration->version($version) === FALSE) {
                //show_error($this->migration->error_string());
                 redirect('schema_database?error=no_found_migration&token='.md5($this->security->get_csrf_hash()).'','refresh');
            } else {
              $this->session->set_flashdata('message','Migrations run successfully');
                redirect('schema_database?token='.md5($this->security->get_csrf_hash()).'','refresh');
            }

            return;
        }

        if ($this->migration->latest() === FALSE) {
           // show_error($this->migration->error_string());
            $this->session->set_flashdata('message','No migrations were found.');
                redirect('schema_database?error=no_found_migration&token='.md5($this->security->get_csrf_hash()).'','refresh');
        } else {
             $this->session->set_flashdata('message','Migrations run successfully');
                redirect('schema_database?token='.md5($this->security->get_csrf_hash()).'','refresh');
        }
    }

    
    private function make_migration_file($name) {
        $date = new DateTime();
        $timestamp = $date->format('YmdHis');

        $table_name = strtolower($name);

        $path = APPPATH . "migrations/$timestamp" . "_" . "$name.php";

        $my_migration = fopen($path, "w") or die("Unable to create migration file!");

        $migration_template = "<?php

class Migration_$name extends CI_Migration {

    public function up() {
        \$this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            )
        ));
        \$this->dbforge->add_key('id', TRUE);
        \$this->dbforge->create_table('$table_name');
    }

    public function down() {
        \$this->dbforge->drop_table('$table_name');
    }

}";

        fwrite($my_migration, $migration_template);

        fclose($my_migration);

       $this->session->set_flashdata('message',''.$path.'migration has successfully been created.');
       redirect('schema_database?token='.md5($this->security->get_csrf_hash()).'','refresh');
    }



    

}

/* End of file Schema_database.php */
/* Location: ./application/C:\xampp\htdocs\trefastcms\application\backend/schema_database/controllers/Schema_database.php */
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

