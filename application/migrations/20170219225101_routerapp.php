<?php

class Migration_routerapp extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'slug'=>array(
                'type'=>'varchar',
                'constraint'=>'192',
            ),
            'controller'=>array(
                'type'=>'varchar',
                'constraint'=>'64'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('slug');
        $this->dbforge->create_table('routerapp');
    }

    public function down() {
        $this->dbforge->drop_table('routerapp');
    }

}